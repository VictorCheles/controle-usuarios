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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'App\Http\Controllers\Auth\API\AuthControllerAPI@login');
Route::post('/register/user', 'App\Http\Controllers\Users\UsersController@store');

Route::middleware(['apiJwt'])->group(function(){
    
    Route::post('/show/user/{id}', 'App\Http\Controllers\Users\UsersController@show');
    Route::post('/edit/user/{user}', 'App\Http\Controllers\Users\UsersController@update');
    Route::delete('/destroy/user/{user}', 'App\Http\Controllers\Users\UsersController@destroy');
    Route::get('/list/users', 'App\Http\Controllers\Users\UsersController@index');

    Route::post('/logout', 'App\Http\Controllers\Auth\API\AuthControllerAPI@logout');
    Route::post('/refresh', 'App\Http\Controllers\Auth\API\AuthControllerAPI@refresh');
    Route::get('/me', 'App\Http\Controllers\Auth\API\AuthControllerAPI@me');
});