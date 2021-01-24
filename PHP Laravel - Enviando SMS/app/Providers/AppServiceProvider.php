<?php

namespace App\Providers;

use App\Services\SMS\InfoBipProvider;
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
        $this->app->singleton('App\Services\SMS\SmsServiceInterface', function($app){
            $token = config('services.infobip.token');
            $url = config('services.infobip.url');
            return new InfoBipProvider($token, $url);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
