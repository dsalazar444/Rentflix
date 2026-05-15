<?php

// Made by: Laura Andrea Castrillón Fajardo

namespace App\Providers;

use App\Interfaces\ImageStorage;
use App\Utils\ImageLocalStorage;
use App\Utils\ImageGCPStorage;
use Illuminate\Support\ServiceProvider;

class ImageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ImageStorage::class, function ($app, $parameters) {
            $storage = $parameters['storage'] ?? 'gcp' ;
            if ($storage === 'gcp') {
                return new ImageGCPStorage;
            }
            else if ($storage === 'local') {
                return new ImageLocalStorage;
            }
        });
    }
}
