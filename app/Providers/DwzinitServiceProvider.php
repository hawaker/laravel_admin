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
        $dwz->orderField=request($dwz->pageInfo->orderField,"");
        $dwz->orderDirection=request($dwz->pageInfo->orderDirection,$dwz->orderDirection);
        $dwz->numPerPage=request($dwz->pageInfo->numPerPage,$dwz->numPerPage);
        View::share("dwzFormBase", $dwz->getFormBase());
        View::share("dwzOrderField",$dwz->orderField);
        View::share("dwzOrderDirection",$dwz->orderDirection);
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
