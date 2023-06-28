<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerroController;
use App\Http\Controllers\InteraccionController;

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
    Route::get("view", "App\Http\Controllers\PerroController@viewPerro");
    Route::get("getall", "App\Http\Controllers\PerroController@getallPerros");
    Route::put("update", "App\Http\Controllers\PerroController@updatePerro");
    Route::delete("delete", "App\Http\Controllers\PerroController@deletePerro");
});

Route::prefix("interaccion")->group(function () {
    Route::post("create", "App\Http\Controllers\InteraccionController@createInteraccion");
    Route::get("getall", "App\Http\Controllers\InteraccionController@getallInteracciones");
    Route::put("update", "App\Http\Controllers\InteraccionController@updateInteraccion");
    Route::delete("delete", "App\Http\Controllers\InteraccionController@deleteInteraccion");
});
