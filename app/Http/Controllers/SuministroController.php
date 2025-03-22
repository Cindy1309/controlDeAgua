<?php

namespace App\Http\Controllers;

use App\Models\Casas; // Importa el modelo Casas
use Illuminate\Http\Request;

class SuministroController extends Controller
{
    public function admin()
    {
        // Obtener todas las casas registradas
        $casas = Casas::all();

        // Pasar los datos a la vista del administrador
        return view('control.admin', compact('casas'));
    }
}
