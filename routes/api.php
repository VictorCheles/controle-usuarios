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

Route::middleware(['apiJwt'])->group(function(){
    Route::post('/logout', 'App\Http\Controllers\Auth\API\AuthControllerAPI@logout');
    Route::post('/refresh', 'App\Http\Controllers\Auth\API\AuthControllerAPI@refresh');
    Route::post('/me', 'App\Http\Controllers\Auth\API\AuthControllerAPI@me');
});