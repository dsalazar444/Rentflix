<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\MovieController@index')->name('movie.index');