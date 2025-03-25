<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Casas;

class CasaController extends Controller
{
    public function mostrarCasa()
    {
        // Obtener al usuario autenticado
        $usuario = Auth::user();

        // Obtener la casa asociada al usuario
        $casa = $usuario->casa;  // Usamos la relación definida en el modelo User

        // Si no tiene casa registrada
        if (!$casa) {
            return response()->json(['mensaje' => 'No tienes una casa registrada.'], 404);
        }

        // Retornar la casa
        return response()->json($casa);
    }
}
