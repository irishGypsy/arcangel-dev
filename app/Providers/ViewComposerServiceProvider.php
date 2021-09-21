<?php

namespace App\Providers;

use App\Models\Product;
use Cart;
use Auth;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{

//    use Cart;
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
//        View::composer('site.partials.nav', function ($view) {
//            $view->with('categories', Category::orderByRaw('-name ASC')->get()->nest());
//        });
//        View::composer('site.partials.header', function ($view) {
//            $view->with('cartCount', function() {
//                if(Cart::session(Auth::guard()->user()->getContent()->count() == 0)){
//                    return '0';
//                }
//                else{
//
//                    return Cart::session(Auth::guard()->user()->id)->getContent()->count();
//                }
//            });
//        });
        View::composer('site.partials.nav', function ($view) {
            $view->with('header_posts', DB::table('posts')
                ->where([
                    ['menu_placement', '=', 'Header'],

                    ['status', '=', 'Active']])
                ->get());
        });

        View::composer('site.partials.footer', function ($view) {
            $view->with('footer_posts', DB::table('posts')
                ->where('status', '=', 'Active')
                ->get());
        });

        View::composer('site.partials.carousel', function ($view) {
            $view->with('banners', DB::table('banners')
                ->where('status', '=', 'Active')
                ->get());
        });

        View::composer('site.partials.featured', function ($view) {
            $view->with('products', Product::where('popular', '=', '1')
                ->get());
        });

        View::composer('auth.register', function ($view) {
            $view->with('states', DB::table('state_codes')
                ->get())
                ->with('countrycodes', DB::table('country_codes')
                    ->get());
        });

        View::composer('admin.dashboard.index', function ($view) {
            $view->with('ordercount', DB::table('orders')->count())
                ->with('ordersum', DB::table('orders')->sum('grand_total'));


        });

        View::composer('admin.app', function ($view) {

            $view->with('labels', DB::table('orders')
                ->selectRaw('YEAR(created_at),MONTH(created_at),LEFT(MONTHNAME(created_at),3) as month,count(*) as count')
                ->groupByRaw('YEAR(created_at), MONTH(created_at)')
                ->orderByRaw('YEAR(created_at),MONTH(created_at)')
                ->get()->pluck('month')->toJson())
                ->with('data', DB::table('orders')
                    ->selectRaw('YEAR(created_at),MONTH(created_at),MONTHNAME(created_at) as month,count(*) as count')
                    ->groupByRaw('YEAR(created_at), MONTH(created_at)')
                    ->orderByRaw('YEAR(created_at),MONTH(created_at)')
                    ->get()->pluck('count')->toJson());

        });
    }
}
