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

//Route::get('/',array('as'=>'home', 'uses' =>'App\Http\Controllers\UserController@home'));
Route::get('/',array('as'=>'home', 'uses' =>'App\Http\Controllers\UserController@home'));
Route::post('/login',array('as'=>'Sign in' , 'uses' =>'App\Http\Controllers\UserController@authPostLogin'));

Route::group(['middleware' => ['auth']], function () {
    Route::get('/customers', array('as' => 'view', 'uses' => 'App\Http\Controllers\CustomerController@index'));
    Route::get('/customer', array('as' => 'view', 'uses' => 'App\Http\Controllers\CustomerController@add'));
    Route::get('/logout', array('as' => 'view', 'uses' => 'App\Http\Controllers\UserController@authLogout'));
    Route::post('/save', array('as' => 'add', 'uses' => 'App\Http\Controllers\CustomerController@store'));
});
