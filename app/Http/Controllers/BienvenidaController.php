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
        return view('control.bienvenida');
    }
    public function registro()
    {
        return view('control.registro');  
    }
}
