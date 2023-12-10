<?php

use App\Http\Controllers\Api\PegawaiController;
use App\Http\Controllers\Api\PasienController;
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

//Route::get('Pegawai', [PegawaiController::class, 'index']);
//Route::get('Pegawai/{id}', [PegawaiController::class, 'show']);
//Route::post('Pegawai', [PegawaiController::class, 'store']);
//Route::put('Pegawai/{id}', [PegawaiController::class, 'update']);
//Route::delete('Pegawai/{id}', [PegawaiController::class, 'destroy']);

Route::group(['prefix' => 'Pegawai'], function () {
    Route::get('/', [PegawaiController::class, 'index']);
    Route::get('/{id}', [PegawaiController::class, 'show']);
    Route::post('/', [PegawaiController::class, 'store']);
    Route::put('/{id}', [PegawaiController::class, 'update']);
    Route::delete('/{id}', [PegawaiController::class, 'destroy']);
});

//Route::get('Pasien', [PasienController::class, 'index']);
//Route::get('Pasien/{id}', [PasienController::class, 'show']);
//Route::post('Pasien', [PasienController::class, 'store']);
//Route::put('Pasien/{id}', [PasienController::class, 'update']);
//Route::delete('Pasien/{id}', [PasienController::class, 'destroy']);

Route::group(['prefix' => 'Pasien'], function () {
    Route::get('/', [PasienController::class, 'index']);
    Route::get('/{id}', [PasienController::class, 'show']);
    Route::post('/', [PasienController::class, 'store']);
    Route::put('/{id}', [PasienController::class, 'update']);
    Route::delete('/{id}', [PasienController::class, 'destroy']);
});