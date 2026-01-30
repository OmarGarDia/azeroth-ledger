<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Api\CharacterController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\GoldController;

Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/characters', [CharacterController::class, 'store']);
    Route::post('/items', [ItemController::class, 'store']);
    Route::post('/gold/purchase', [GoldController::class, 'purchase']);
    Route::post('/gold/sale', [GoldController::class, 'sale']);
    Route::get('/characters/{character}/gold', [GoldController::class, 'history']);
});
