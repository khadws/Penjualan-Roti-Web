<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Footer;
use Illuminate\Support\Facades\View;

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
        // $footer = Footer::latest()->first();

        // // Share data footer ke semua view
        // View::share('layouts.footer', $footer);

        View::composer('layouts.footer', function($view) {
            $footer = Footer::latest()->first();
            $view->with('footer', $footer); 
        });
    }
}