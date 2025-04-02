<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SuministroController;
use App\Http\Controllers\RegistroCasaController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\BienvenidaController;
use App\Http\Controllers\DatosController;
use App\Http\Controllers\CasaController;
use App\Http\Controllers\BombaController;

// Ruta principal
Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->get('/mi-casa', [CasaController::class, 'mostrarCasa'])->name('casa.mostrar');
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
Route::get('/admin-usuarios', [UsuarioController::class, 'index'])->name('control.adminUsuario');
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroyAdmin');
Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.editAdmin');
Route::get('/botonAdmin', [UsuarioController::class, 'botonAdmin'])->name('botonAdmin');




// Rutas de administración de usuarios
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.editAdmin');
// Ruta para actualizar el usuario
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.updateAdmin');
Route::get('/admin/usuarios', [UsuarioController::class, 'index'])->name('adminUsuario');

// Vista de administración (botón)



// Ruta para editar una casa

Route::get('casas/{id}/edit', [IndexController::class, 'edit'])->name('casas.edit');
Route::put('/casas/{id}', [IndexController::class, 'update'])->name('casas.update');
Route::delete('/casas/{id}', [IndexController::class, 'destroy'])->name('casas.destroy');

// Rutas de Bomba
Route::prefix('bomba')->group(function () {
    Route::post('/control', [BombaController::class, 'controlBomba'])->name('api.control.bomba');
    Route::get('/estado', [BombaController::class, 'obtenerEstadoBomba'])->name('api.control.bomba.estado');
});


Route::get('/suministros', [SuministroController::class, 'index'])->name('suministros.index');
Route::get('/suministros/datos', [SuministroController::class, 'datos'])->name('suministros.datos');
