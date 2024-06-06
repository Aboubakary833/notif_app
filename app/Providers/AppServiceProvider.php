<?php

namespace App\Providers;

use App\Contracts\SmsAPI;
use App\Services\TwilioService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(SmsAPI::class, fn() => new TwilioService(config("twilio")));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
