<?php

// Made by: Samuel Martínez Arteaga

namespace App\Providers;

use App\Services\CartService;
use Google\Cloud\Storage\StorageClient;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem as Flysystem;
use League\Flysystem\GoogleCloudStorage\GoogleCloudStorageAdapter;
use League\Flysystem\GoogleCloudStorage\UniformBucketLevelAccessVisibility;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Storage::extend('gcs', function ($app, array $config) {
            $client = new StorageClient([
                'projectId' => $config['project_id'] ?? null,
                'keyFile' => $config['key_file'] ?? null,
                'apiEndpoint' => $config['storage_api_uri'] ?? null,
            ]);

            $bucket = $client->bucket($config['bucket']);

            $adapter = new GoogleCloudStorageAdapter(
                $bucket,
                '',
                new UniformBucketLevelAccessVisibility,
                '',
            );

            return new FilesystemAdapter(
                new Flysystem($adapter, Arr::only($config, [
                    'directory_visibility',
                    'temporary_url',
                    'url',
                ])),
                $adapter,
                $config,
            );
        });

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
