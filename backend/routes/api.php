<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\UserController;


// Public routes
Route::post('/login', [ApiAuthController::class, 'login']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () 
{
    Route::get('/profile', [UserController::class,'profile']);
    Route::post('/logout', [ApiAuthController::class, 'logout']);
    Route::apiResource('/apiProducts', ApiController::class);
});

Route::get('/user', function (Request $request) 
{
    return $request->user();
})->middleware('auth:sanctum');

// api for all products