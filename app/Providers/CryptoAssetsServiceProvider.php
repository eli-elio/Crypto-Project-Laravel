<?php

namespace App\Providers;

use App\Repositories\CoinMarketCapCryptoCoinsRepository;
use App\Repositories\CryptoAssetsRepository;
use Illuminate\Support\ServiceProvider;

class CryptoAssetsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(CryptoAssetsRepository::class, function ($app) {
            return new CoinMarketCapCryptoCoinsRepository();
        });
    }

    public function boot()
    {
        //
    }
}
