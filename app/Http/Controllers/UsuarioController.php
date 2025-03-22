<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('control.adminUsuarios', compact('usuarios'));
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return view('control.usuariosEdit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->update($request->only(['name', 'email']));

        return redirect()->route('adminUsuario')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('adminUsuario')->with('success', 'Usuario eliminado correctamente.');
    }

}
