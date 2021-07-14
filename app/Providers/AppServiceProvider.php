<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        \Validator::extend('typed', 'App\Rules\TesebakiTyped@passes');
        \Validator::extend('confirm_pwd', 'App\Rules\ConfirmPwd@passes');
    }
}
