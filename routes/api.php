<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

Route::prefix('/products')->group(function () {
    Route::get('', [ProductController::class, 'index']);
    Route::get('/category/[id}', [ProductController::class, 'byCategory']);
    Route::get('/{id}', [ProductController::class, 'byId']);
    Route::post('', [ProductController::class, 'store']);
});

Route::prefix('/users')->group(function () {
    Route::get('/{user}', [UserController::class, 'show']);
    Route::get('/{user}/purchases', [UserController::class, 'purchases'])->middleware('auth:sanctum');
});

Route::post('/login', [LoginController::class, 'login']);

Route::get('/auth', [LoginController::class, 'checkAuth'])->middleware('auth:sanctum');

Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');

// Route::get('/me', [UserController::class, 'me'])->middleware('auth:sanctum');
