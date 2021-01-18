<?php

namespace App\Providers;

use App\Services\BreweryService;
use App\Services\BreweryAddressService;
// use App\Services\HttpService;
use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;

class BreweryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BreweryService::class, function ($app) {
            return new BreweryService(new Client(), new BreweryAddressService());
            //In this we can replace Guzzle clien for own http clien? for example
            //return new BreweryService(new HttpService(), new BreweryAddressService());
        });
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
