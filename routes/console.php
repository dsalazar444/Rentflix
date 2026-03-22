<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Services\LibraryItemService;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function () {
    app(LibraryItemService::class)->removeExpired();
})->daily();

Artisan::command('library:clean', function () {
    app(LibraryItemService::class)->removeExpired();
    $this->info('Expired library items removed!');
});

