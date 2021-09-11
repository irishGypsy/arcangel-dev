<?php

namespace App\Providers;

use App\Models\Product;
use Cart;
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
        View::composer('site.partials.nav', function ($view) {
//            $view->with('categories', Category::orderByRaw('-name ASC')->get()->nest());
        });
        View::composer('site.partials.header', function ($view) {
            $view->with('cartCount', Cart::getContent()->count());
        });
        View::composer('site.partials.nav', function ($view) {
            $view->with('header_posts', DB::table('posts')
                                            ->where([
                                                ['menu_placement','=','Header'],

                                                ['status','=','Active']])
                                            ->get());
        });

        View::composer('site.partials.footer', function ($view) {
            $view->with('footer_posts', DB::table('posts')
                ->where('status','=','Active')
                ->get());
        });

        View::composer('site.partials.carousel', function ($view) {
            $view->with('banners', DB::table('banners')
                ->where('status','=','Active')
                ->get());
        });

        View::composer('site.partials.featured', function ($view) {
            $view->with('products', Product::where('popular','=','1')
                ->get());
        });
    }
}
