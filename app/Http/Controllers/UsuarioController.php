<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
    public function index()
    {
        // Obtener todos los usuarios desde MongoDB
        $usuarios = User::all()->map(function ($usuario) {
            return [
                'id' => $usuario->_id,
                'nombre' => $usuario->name,
                'email' => $usuario->email,
                'casas' => $usuario->casas->toArray(),  // Convertir las casas a un arreglo
                'creado_en' => $usuario->created_at,
            ];
        });

        // Pasar los usuarios a la vista
        return view('control.adminUsuarios', compact('usuarios'));
    }
    public function edit($id)
    {
        // Obtener el usuario por su ID
        $usuario = User::findOrFail($id);
        
        // Pasar los datos a la vista
        return view('control.editAdmin', compact('usuario'));
    }
    public function update(Request $request, $id)
    {
        // Validación de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6|confirmed',
            'casas' => 'required|array', // Validación para las casas
        ]);

        // Obtener el usuario por su ID
        $usuario = User::findOrFail($id);

        // Actualizar los datos del usuario
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');

        // Si se ha ingresado una nueva contraseña, se actualiza
        if ($request->input('password')) {
            $usuario->password = bcrypt($request->input('password'));
        }

        // Actualizar las casas
        $usuario->casas = $request->input('casas');

        // Guardar el usuario actualizado
        $usuario->save();

        // Redirigir de nuevo a la lista de usuarios
        return redirect()->route('adminUsuario')->with('success', 'Usuario actualizado con éxito.');
    }
    public function botonAdmin()
{
    return view('control.botonAdmin'); // Asegúrate de tener esta vista creada
}
}
