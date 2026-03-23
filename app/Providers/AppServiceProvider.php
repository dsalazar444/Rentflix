<?php

/** Made by: Samuel Martínez Arteaga */

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Services\CartService;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('components.header.client', function ($view) {
            $view->with(app(CartService::class)->getSummary());
        });
    }
}
