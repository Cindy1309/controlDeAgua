<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BienvenidaController extends Controller
{
    /**
     * Muestra la página de bienvenida.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Aquí puedes agregar lógica adicional si es necesario, como pasar datos a la vista.
        return view('control.bienvenida');
    }
    public function registro()
    {
        return view('control.registro');  // Asegúrate de que la vista 'registro.blade.php' esté dentro de 'resources/views/control/'
    }
}
