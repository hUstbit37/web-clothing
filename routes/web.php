<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([ 'verify' => true ]);

Route::middleware('verified.custom')->get('/home', 'HomeController@index')->name('home');

Route::middleware('verified.custom')->namespace('Frontend')->group(function () {
    Route::prefix('cart')->group(function () {
        Route::get('/', 'CartController@index')->name('cart.index');
        Route::get('store/{id}', 'CartController@store')->name('cart.store');
        Route::put('update', 'CartController@update')->name('cart.update');
        Route::get('delete/{id}', 'CartController@destroy')->name('cart.delete');

    });

	Route::get('/', 'HomeController@index');
    Route::get('search', 'SearchController@index');
    Route::get('{slug}/product', 'ProductController@show');
    Route::get('{slug}/post', 'PostController@show');
	Route::get('{slug}', 'CategoryController@index');

});


