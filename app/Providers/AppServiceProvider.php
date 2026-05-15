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
        View::composer('components.header.client', function ($view) {
            $view->with(app(CartService::class)->getSummary());
        });
        View::composer('components.header.dispatcher', function ($view) {
            $view->with([
                'role' => session('role'),
                'isAuthenticated' => session()->has('user_id'),
            ]);
        });
    }
}
