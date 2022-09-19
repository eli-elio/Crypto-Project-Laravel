<?php

namespace App\Providers;

use App\Repositories\CryptoNewsApiArticleRepository;
use App\Repositories\CryptoNewsRepository;
use Illuminate\Support\ServiceProvider;

class CryptoNewsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CryptoNewsRepository::class, function ($app) {
            return new CryptoNewsApiArticleRepository();
        });
    }

    public function boot()
    {

    }
}
