<?php

use App\Services\LibraryItemService;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function () {
    app(LibraryItemService::class)->removeMovieExpired();
})->daily();

Artisan::command('library:clean', function () {
    app(LibraryItemService::class)->removeMovieExpired();
    $this->info('Expired library items removed!');
});
