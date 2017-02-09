<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('btc_address', 'App\Http\Validators\BTCValidator@validateAddress');
        date_default_timezone_set('America/New_York');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
