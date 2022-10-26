<?php

namespace App\Providers;

use App\CurrencyType\CurrencyType;
use App\Services\ExternalConversion\ExternalConversionService;
use Illuminate\Support\ServiceProvider;

class ExternalConversionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(ExternalConversionService::class, fn($app) => new ExternalConversionService(
            config('services.exchange-rate.uri'),
            config('services.exchange-rate.retry'),
            config('services.exchange-rate.retry-milliseconds'),
            $app->get(CurrencyType::class)
        ));
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
