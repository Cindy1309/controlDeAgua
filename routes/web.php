<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SuministroController;
use App\Http\Controllers\RegistroCasaController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CasaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\BienvenidaController;
use App\Http\Controllers\DatosController;

// Ruta principal
Route::get('/', function () {
    return view('welcome');
});

// Index
Route::get('/index', [IndexController::class, 'index'])->name('control.index');
Route::get('/bienvenida', [BienvenidaController::class, 'index'])->name('control.bienvenida');
Route::get('/registro', [BienvenidaController::class, 'registro'])->name('registro');

// Rutas de login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('control.login.form');
Route::post('/login', [LoginController::class, 'login'])->name('control.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('control.logout');

// Rutas de registro
Route::get('/registro', [RegistroController::class, 'showRegistrationForm'])->name('control.registro.form');
Route::post('/registro', [RegistroController::class, 'register'])->name('control.registro');

// Rutas de Registro Casa
Route::get('/registroCasa', [RegistroCasaController::class, 'showForm'])->name('registroCasa');
Route::post('/registroCasa', [RegistroCasaController::class, 'store'])->name('registroCasa.store');

// Ruta para administrar casas (solo admins)
Route::get('/admin', [SuministroController::class, 'admin'])->name('control.admin');
Route::get('/admin/datos', [DatosController::class, 'vistaAdmin'])->name('control.admin.datos');

// Rutas para editar, actualizar y eliminar casas (comunes para todos los usuarios)
Route::get('/casas/{id}/edit', [CasaController::class, 'edit'])->name('casas.edit');
Route::put('/casas/{id}', [CasaController::class, 'update'])->name('casas.update');
Route::delete('/casas/{id}', [CasaController::class, 'destroy'])->name('casas.destroy');
Route::get('/boton-admin', [CasaController::class, 'botonAdmin'])->name('botonAdmin');

// Rutas específicas para edición, actualización y eliminación de casas para admins
Route::get('/editar/casa/admin/{id}', [CasaController::class, 'editAdmin'])->name('casas.editAdmin');
Route::put('/casasAdmin/{id}', [CasaController::class, 'updateAdmin'])->name('casas.updateAdmin');
Route::delete('/casasDelete/{id}', [CasaController::class, 'destroyAdmin'])->name('casas.destroyAdmin');

// Rutas de administración de usuarios
Route::get('/adminUsuario', [UsuarioController::class, 'index'])->name('adminUsuario');
Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.editAdmin');
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.updateAdmin');
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroyAdmin');

// Vista de administración (botón)
Route::get('/botonAdmin', function () {
    return view('control.botonAdmin');
});

// Ruta de datos
Route::get('/datos', [DatosController::class, 'vistaDatos'])->name('datos');
Route::get('/admin', [DatosController::class, 'vistaAdmin'])->name('admin');
