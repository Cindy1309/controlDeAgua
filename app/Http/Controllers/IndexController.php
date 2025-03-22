<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Casas;  // Modelo para las casas
use App\Models\Suministro;  // Modelo para los suministros, si es necesario
use Illuminate\Support\Facades\Auth;  // Para usar el Auth y obtener el usuario autenticado

class IndexController extends Controller
{
    /**
     * Muestra el índice con los datos de la casa del usuario y el suministro de agua.
     */
    public function index()
{
    // Filtrar las casas por el propietario (usuario autenticado)
    $casas = Casas::where('propietario', auth()->user()->name)->get();

    
    // Pasar los datos a la vista
    return view('control.index', compact('casas'));
}

}
