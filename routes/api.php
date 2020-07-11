<?php

use Illuminate\Http\Request;
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

Route::group([ 'prefix' => 'auth'], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

    Route::get('user/show/{id}', 'UserController@show');
    Route::get('user/list', 'UserController@list');
    Route::post('user/create', 'UserController@store');
    Route::post('user/edit', 'UserController@update');
    Route::delete('user/{id}/delete/', 'UserController@destroy');
    Route::post('user/addrole/', 'UserController@addRole');

    Route::post('user/addrole/', 'UserController@addRole');

});

