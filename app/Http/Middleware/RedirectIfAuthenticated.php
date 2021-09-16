<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
//        ddd($guard);
        switch($guard){
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect('/admin');
                }
                break;
            case 'affiliate':
                if(Auth::guard($guard)->check()) {
//                    ddd('hello world');
                    return redirect('/affiliate');
                }
//                ddd(Auth::guard($guard)->check());
                break;
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect('/');
                }
                break;
        }
        return $next($request);
    }
}
