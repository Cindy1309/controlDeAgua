<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Casas;

class CasaController extends Controller
{
    public function mostrarCasa()
    {
       
        $usuario = Auth::user();

        
        $casa = $usuario->casa;  

        
        if (!$casa) {
            return response()->json(['mensaje' => 'No tienes una casa registrada.'], 404);
        }

        return response()->json($casa);
    }
}
