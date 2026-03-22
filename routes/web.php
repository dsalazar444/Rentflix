<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin/movies', 'App\Http\Controllers\MovieController@index')->name('admin.movie.index');
Route::post('/admin/movies/save', 'App\Http\Controllers\MovieController@save')->name('admin.movie.save');
Route::delete('/movie/delete/{id}', 'App\Http\Controllers\MovieController@delete')->name('movie.delete');

