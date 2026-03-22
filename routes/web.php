<?php

use Illuminate\Support\Facades\Route;

// Admin routes
Route::get('/admin/movie', 'App\Http\Controllers\MovieController@index')->name('admin.movie.index');
Route::post('/admin/movie/save', 'App\Http\Controllers\MovieController@save')->name('admin.movie.save');
Route::delete('/admin/movie/delete/{id}', 'App\Http\Controllers\MovieController@delete')->name('admin.movie.delete');
Route::put('/admin/movie/update/{id}', 'App\Http\Controllers\MovieController@update')->name('admin.movie.update');
Route::get('/admin/bill', 'App\Http\Controllers\BillController@index')->name('admin.bill.index');

// Catalog routes
Route::get('/', 'App\Http\Controllers\CatalogController@index')->name('catalog.index');
Route::get('/catalog/movie/{id}', 'App\Http\Controllers\CatalogController@show')->name('catalog.show');

// User routes
Route::get('/users', 'App\Http\Controllers\UserController@index')->name('user.index');
Route::post('/users', 'App\Http\Controllers\UserController@create')->name('user.create');

Route::get('/collections/library', 'App\Http\Controllers\LibraryItemController@index')->name('collections.library');
Route::get('/collections/wishlist', 'App\Http\Controllers\WishlistItemController@index')->name('collections.wishlist');

Route::get('/auth', 'App\Http\Controllers\AuthController@index')->name('auth.index');
Route::post('/auth/register', 'App\Http\Controllers\AuthController@create')->name('auth.create');
Route::post('/auth/login', 'App\Http\Controllers\AuthController@login')->name('auth.login');
Route::get('/auth/logout', 'App\Http\Controllers\AuthController@logout')->name('auth.logout');

