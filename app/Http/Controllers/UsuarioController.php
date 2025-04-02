<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
    public function index()
    {
        
        $usuarios = User::all()->map(function ($usuario) {
            return [
                'id' => $usuario->_id,
                'nombre' => $usuario->name,
                'email' => $usuario->email,
                'casas' => $usuario->casas->toArray(),  
                'creado_en' => $usuario->created_at,
            ];
        });

       
        return view('control.adminUsuarios', compact('usuarios'));
    }
    public function edit($id)
    {
       
        $usuario = User::findOrFail($id);
        
       
        return view('control.editAdmin', compact('usuario'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6|confirmed',
            'casas' => 'required|array', 
        ]);

        
        $usuario = User::findOrFail($id);

      
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');

        
        if ($request->input('password')) {
            $usuario->password = bcrypt($request->input('password'));
        }

      
        $usuario->casas = $request->input('casas');

        
        $usuario->save();

       
        return redirect()->route('adminUsuario')->with('success', 'Usuario actualizado con éxito.');
    }
    public function botonAdmin()
{
    return view('control.botonAdmin');
}
public function destroy($id)
{
    
    $user = User::find($id);

    
    if (!$user) {
        return redirect()->route('usuarios.index')->with('error', 'Usuario no encontrado');
    }

   
    $user->delete();

   
    return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente');
}

}
