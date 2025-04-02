<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;  

class RegistroCasaController extends Controller
{
    /**
     * Muestra el formulario de registro de una casa.
     */
    public function showForm()
    {
        return view('control.registroCasa');
    }

    /**
     * Almacena una nueva casa dentro del documento del usuario.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'calle' => 'required|string|max:255',
            'numero_casa' => 'required|string|max:255',
            'tipo_almacenamiento' => 'required|in:tinaco', 
            'propietario' => 'required|string|max:255',
        ]);

        
        $user = auth()->user();

        
        $casa = [
            'calle' => $request->calle,
            'numero_casa' => $request->numero_casa,
            'tipo_almacenamiento' => $request->tipo_almacenamiento,
            'propietario' => $request->propietario,
        ];


        if ($request->tipo_almacenamiento === 'tinaco') {
            $casa['litros_asignados'] = 20;
        }

       
        $user->casas()->create($casa);  

      
        return redirect()->route('control.index')->with('success', 'Casa registrada con éxito.');
    }
}
