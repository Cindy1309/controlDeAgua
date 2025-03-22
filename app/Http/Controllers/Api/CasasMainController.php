<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Casas;
use Illuminate\Http\Request;

class CasasMainController extends Controller
{
    // Para obtener todas las casas (GET)
    public function index()
    {
        // Retorna todas las casas de la colección 'casas'
        return response()->json(Casas::all(), 200);
    }

    // Para crear una nueva casa (POST)
    public function store(Request $request)
    {
        // Validación de los campos
        $request->validate([
            'numero_casa' => 'required|string',
            'calle' => 'required|string',
            'tipo_almacenamiento' => 'required|in:Tinaco', // Solo permite 'Tinaco'
            'propietario' => 'required|string',
        ]);

        // Crear una nueva casa
        $casa = Casas::create([
            'numero_casa' => $request->numero_casa,
            'calle' => $request->calle,
            'tipo_almacenamiento' => $request->tipo_almacenamiento,
            'propietario' => $request->propietario,
            'litros_asignados' => 20, // Asignar 20 litros de forma predeterminada
        ]);

        // Retorna la casa creada
        return response()->json($casa, 201);
    }
}
