<?php

use App\Http\Controllers\Backend\CategoryController;
use Illuminate\Support\Facades\Route;

Route::namespace('Frontend')->group(function () {
	Route::get('/', 'HomeController@index');
    Route::get('search', 'SearchController@index');
    Route::get('{slug}/product', 'ProductController@show');
    Route::get('{slug}/post', 'PostController@show');
	Route::get('{slug}', 'CategoryController@index');


});
