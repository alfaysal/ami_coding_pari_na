<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['prefix' => 'khojthesearch', 'middleware' => 'auth'], function () {

    Route::get('/home','KhojTheSearchController@index')->name('index');
    Route::post('/find','KhojTheSearchController@findValues')->name('find_khoj_the_search_value');

   
});