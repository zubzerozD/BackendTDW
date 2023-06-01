<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix("perro")->group(function () {
    Route::post("create", "App\Http\Controllers\PerroController@createPerro");
    Route::post("view", "App\Http\Controllers\PerroController@viewPerro");
    Route::post("getall", "App\Http\Controllers\PerroController@getallPerros");
    Route::post("update", "App\Http\Controllers\PerroController@updatePerro");
    Route::post("delete", "App\Http\Controllers\PerroController@deletePerro");
});

Route::prefix("interaccion")->group(function () {
    Route::post("create", "App\Http\Controllers\InteraccionController@createInteraccion");
    Route::post("getall", "App\Http\Controllers\InteraccionController@getallInteracciones");
    Route::post("update", "App\Http\Controllers\InteraccionController@updateInteraccion");
    Route::post("delete", "App\Http\Controllers\InteraccionController@deleteInteraccion");
});
