<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;  // Necesitamos el modelo User

class IndexController extends Controller
{
    /**
     * Muestra el índice con las casas registradas para el usuario autenticado.
     */
   public function index()
{
    $user = auth()->user();
    $casas = $user->casas;

    return view('control.index', compact('casas'));
}

    /**
     * Edita una casa del usuario autenticado.
     */
    public function edit($id)
    {
        // Obtener el usuario autenticado
        $user = auth()->user();
    
        // Buscar la casa dentro del array 'casas' del usuario
        $casa = collect($user->casas)->firstWhere('_id', new \MongoDB\BSON\ObjectId($id));
    
        // Verificar si se encontró la casa
        if (!$casa) {
            return redirect()->route('index')->with('error', 'Casa no encontrada');
        }
    
        // Pasar la casa a la vista de edición
        return view('control.editarCasa', compact('casa'));
    }
    

    /**
     * Actualiza los datos de una casa.
     */
    public function update(Request $request, $id)
    {
        // Validación de datos
        $request->validate([
            'calle' => 'required|string|max:255',
            'numero_casa' => 'required|string|max:255',
            'tipo_almacenamiento' => 'required|in:Tinaco',
            'propietario' => 'required|string|max:255',
        ]);

        // Obtener el usuario autenticado
        $user = auth()->user();

        // Buscar la casa en el subdocumento 'casas' del usuario
        $casa = $user->casas()->where('_id', $id)->first();

        // Verificar si se encontró la casa
        if (!$casa) {
            return redirect()->route('control.index')->with('error', 'Casa no encontrada');
        }

        // Actualizar los datos de la casa
        $casa->update([
            'calle' => $request->calle,
            'numero_casa' => $request->numero_casa,
            'tipo_almacenamiento' => $request->tipo_almacenamiento,
            'propietario' => $request->propietario,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('control.index')->with('success', 'Casa actualizada con éxito.');
    }

    /**
     * Elimina una casa del usuario autenticado.
     */
    public function destroy($id)
    {
        
        $user = auth()->user();

        
        $casa = $user->casas()->where('_id', $id)->first();

       
        if (!$casa) {
            return redirect()->route('index')->with('error', 'Casa no encontrada');
        }

       
        $casa->delete();

       
        return redirect()->route('index')->with('success', 'Casa eliminada con éxito.');
    }
}
