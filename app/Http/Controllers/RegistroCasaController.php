<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;  // Cambiamos a User para guardar la casa dentro del usuario

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
        // Validación de datos
        $request->validate([
            'calle' => 'required|string|max:255',
            'numero_casa' => 'required|string|max:255',
            'tipo_almacenamiento' => 'required|in:tinaco', // Solo permite 'tinaco'
            'propietario' => 'required|string|max:255',
        ]);

        // Obtener el usuario autenticado
        $user = auth()->user();

        // Crear la casa
        $casa = [
            'calle' => $request->calle,
            'numero_casa' => $request->numero_casa,
            'tipo_almacenamiento' => $request->tipo_almacenamiento,
            'propietario' => $request->propietario,
        ];

        // Si el tipo de almacenamiento es "Tinaco", asignamos 20 litros
        if ($request->tipo_almacenamiento === 'tinaco') {
            $casa['litros_asignados'] = 20;
        }

        // Guardar la casa en el array de casas del usuario
        $user->casas()->create($casa);  // Guarda la casa dentro del usuario autenticado

        // Redirigir con mensaje de éxito
        return redirect()->route('control.index')->with('success', 'Casa registrada con éxito.');
    }
}
