<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Suministro;

class SuministroController extends Controller
{
    public function index()
    {
        // Obtener todos los registros de la colección 'suministros' de MongoDB
        $suministros = Suministro::all(); 

        // Pasar los datos a la vista 'suministros.index'
        return view('control.datos', compact('suministros'));
    }
    public function datos()
    {
        // Aquí puedes agregar la lógica que necesites, como obtener datos de la base de datos
        // y luego devolver la vista de datos. Por ejemplo:
        
        return redirect()->route('botonAdmin');
    }
    
}
