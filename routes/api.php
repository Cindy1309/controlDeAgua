<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CasasMainController;

    Route::get('usuarios', [UserController::class, 'index']);
    Route::post('usuarios', [UserController::class, 'store']);


    Route::get('/casas', [CasasMainController::class, 'index']);