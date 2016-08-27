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
