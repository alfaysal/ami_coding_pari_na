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
| is assigned the "jwt.auth" middleware group.
|
*/

Route::group(['middleware' => 'jwt.auth'], function () {

    Route::post('/logout','Api\Auth\AuthController@logout')->name('logout');
    Route::post('/refresh','Api\Auth\AuthController@refresh')->name('refresh');
    


});

Route::post('/khoj','Api\ApiController@getApiResult');

Route::post('/login','Api\Auth\AuthController@login');


