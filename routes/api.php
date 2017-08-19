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

Route::post('authenticate', 'Auth\AuthenticateController@authenticate');

Route::middleware('jwt.auth')->get('users', 'API\UsersAPIController@index');
Route::middleware('jwt.auth')->get('clients', 'API\ClientsAPIController@index');

Route::get('dialogs/{id}', 'API\DialogsAPIController@show');
Route::post('dialogs', 'API\DialogsAPIController@store');
