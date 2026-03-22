<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\MovieController@index')->name('movie.index');

Route::get('/users', 'App\Http\Controllers\UserController@index')->name('user.index');
Route::post('/users/login', 'App\Http\Controllers\UserController@create')->name('user.create');
Route::post('/users/register', 'App\Http\Controllers\UserController@login')->name('user.login');