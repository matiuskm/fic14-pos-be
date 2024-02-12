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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function () {
    Route::post('login', 'App\Http\Controllers\Api\AuthController@login');
    // Route::post('register', 'App\Http\Controllers\Api\AuthController@register');
    Route::middleware('auth:sanctum')->post('logout', 'App\Http\Controllers\Api\AuthController@logout');
    // Route::middleware('auth:sanctum')->get('user', 'App\Http\Controllers\Api\AuthController@user');
    Route::middleware('auth:sanctum')->apiResource('category', App\Http\Controllers\Api\CategoryController::class);
    Route::middleware('auth:sanctum')->apiResource('product', App\Http\Controllers\Api\ProductController::class);
});
