<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MahasiswaController;
use App\Http\Controllers\Api\DosenController;
use App\Http\Controllers\Api\MakulController;

/*
|----------------------------------------------------------------------
| API Routes
|----------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Authentication Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
// Mahasiswa Routes
Route::prefix('mahasiswa')->group(function () {
    Route::post('create', [MahasiswaController::class, 'create']);
    Route::get('read', [MahasiswaController::class, 'read']);
    Route::put('update/{id}', [MahasiswaController::class, 'update']);
    Route::delete('delete/{id}', [MahasiswaController::class, 'delete']);
});

// Dosen Routes
Route::prefix('dosen')->group(function () {
    Route::post('create', [DosenController::class, 'create']);
    Route::get('read', [DosenController::class, 'read']);
    Route::put('update/{id}', [DosenController::class, 'update']);
    Route::delete('delete/{id}', [DosenController::class, 'delete']);
});

// Makul Routes
Route::prefix('makul')->group(function () {
    Route::post('create', [MakulController::class, 'create']);
    Route::get('read', [MakulController::class, 'read']);
    Route::put('update/{id}', [MakulController::class, 'update']);
    Route::delete('delete/{id}', [MakulController::class, 'delete']);
});