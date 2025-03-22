<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatosController extends Controller
{
    // Método para la vista "datos"
    public function vistaDatos()
    {
        return view('control.datos'); // Asegúrate de tener la vista "datos.blade.php" en resources/views
    }

    // Método para la vista "admin"
    public function vistaAdmin()
    {
        return view('control.admin'); // Asegúrate de tener la vista "admin.blade.php" en resources/views
    }
}
