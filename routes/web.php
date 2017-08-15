<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('', 'HomeController@index')->name('home');
    Route::get('users', 'UsersController@index');
    Route::post('users', 'UsersController@store');

    Route::get('authenticated-user', function() {
        return Auth::user();
    });

    Route::get('logout', function() {
        Auth::logout();
        return redirect()->home();
    });
});

