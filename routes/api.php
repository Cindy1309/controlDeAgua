<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CasasMainController;
use App\Http\Controllers\BombaController;
use App\Http\Controllers\SuministroController;

    Route::get('usuarios', [UserController::class, 'index']);
    Route::post('usuarios', [UserController::class, 'store']);


    Route::post('/control-bomba', [BombaController::class, 'controlBomba']);
    Route::get('/control/bomba/estado', [BombaController::class, 'obtenerEstadoBomba']);


    Route::post('login', [UserController::class, 'login']);

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/suministrosApi', [SuministroController::class, 'vista']);