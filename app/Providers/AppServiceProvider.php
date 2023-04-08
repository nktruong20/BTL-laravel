<?php

namespace App\Providers;

use App\Helper\Cart;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap(); // bs3
        // Paginator::useBootstrapFive(); // b5
        // Paginator::useBootstrapFour(); // b4
        view()->composer('*',function($view){
            $catslog = Category::all();
            $cart = new Cart();
            $view->with(compact('catslog','cart'));
        });
    }
}
