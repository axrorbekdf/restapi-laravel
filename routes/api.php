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


Route::get('{resource}', [RestapiLaravel\Controllers\ResourceController::class, 'index']);
Route::post('{resource}', [RestapiLaravel\Controllers\ResourceController::class, 'store']);
Route::get('{resource}/{id}', [RestapiLaravel\Controllers\ResourceController::class, 'show']);
Route::put('{resource}/{id}', [RestapiLaravel\Controllers\ResourceController::class, 'update']);
Route::delete('{resource}/{id}', [RestapiLaravel\Controllers\ResourceController::class, 'destroy']);
