<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'auth',
], function (): void {
    Route::group([
        'middleware' => 'guest'
    ], function (): void {
        Route::post('login', 'Auth\LoginController@login');
        Route::post('register', 'Auth\RegisterController@register');
    });

    Route::group([
        'middleware' => 'auth'
    ], function (): void {
        Route::post('logout', 'Auth\LoqoutController@logout');
        Route::post('refresh', 'Auth\RefreshController@refresh');
        Route::get('startup', 'StartupController@startup');
    });
});

Route::group([
    'middleware' => 'auth',
    'prefix' => 'categories'
], function (): void {
    Route::get('', 'CategoryController@index');
    Route::post('', 'CategoryController@create');
    Route::get('{id}', 'CategoryController@show');
    Route::put('{id}', 'CategoryController@update');
    Route::delete('{id}', 'CategoryController@delete');
});

Route::group([
    'middleware' => 'auth',
    'prefix' => 'products'
], function (): void {
    Route::get('', 'ProductController@index');
    Route::post('', 'ProductController@create');
    Route::get('{id}', 'ProductController@show');
    Route::put('{id}', 'ProductController@update');
    Route::put('{id}/categories', 'ProductCategoryController@update');
    Route::delete('{id}', 'ProductController@delete');
});
