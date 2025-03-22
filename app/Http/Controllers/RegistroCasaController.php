<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Casas;  // Asegúrate de importar el modelo correctamente

class RegistroCasaController extends Controller
{
    /**
     * Muestra el formulario de registro de una casa.
     */
    public function showForm()
    {
        return view('control.registroCasa'); // Muestra la vista de registroCasa
    }

    /**
     * Almacena una nueva casa en la base de datos.
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

        // Guardar en la base de datos usando el modelo Casas
        Casas::create([
            'calle' => $request->calle,
            'numero_casa' => $request->numero_casa,
            'tipo_almacenamiento' => $request->tipo_almacenamiento,  // Guardamos el tipo de almacenamiento
            'propietario' => $request->propietario,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('control.index')->with('success', 'Casa registrada con éxito.');
    }
}
