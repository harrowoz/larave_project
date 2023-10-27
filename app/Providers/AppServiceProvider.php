<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

     public $cat;
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
        view()->composer('layouts.main', function($view) {
            $view->with(['category' =>Category::all() ]);
        });
        Paginator::useBootstrap();
        // view()->composer('layouts.main', function($view) {
        //     $view->with(['category' =>Category::all() ]);
        // });
    }
}
