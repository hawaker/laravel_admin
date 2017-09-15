<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Dwz\Dwz;
use Illuminate\Support\Facades\View;

class DwzinitServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Dwz $dwz) {
        View::share("dwzFormBase", $dwz->getFormBase());
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        $this->app->singleton(Dwz::class, function($app) {
            return new Dwz(config("dwz"));
        });
    }
}
