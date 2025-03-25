<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CasasMainController;
use App\Http\Controllers\BombaController;

    Route::get('usuarios', [UserController::class, 'index']);
    Route::post('usuarios', [UserController::class, 'store']);


    Route::get('/casas', [CasasMainController::class, 'index']);

    Route::post('/control-bomba', [BombaController::class, 'controlBomba']);
    Route::get('/control/bomba/estado', [BombaController::class, 'obtenerEstadoBomba']);