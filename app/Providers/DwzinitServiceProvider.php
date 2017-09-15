<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Dwz\DwzUI;

class DwzinitServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Dwz::class,function($app){
           return new DwzUI(config("dwz")); 
        });
    }
}
