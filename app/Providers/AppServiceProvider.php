<?php

// Made by: Samuel Martínez Arteaga

namespace App\Providers;

use App\Services\CartService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('header.client', function ($view) {
            $view->with(app(CartService::class)->getSummary());
        });
    }
}
