<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Para obtener todos los usuarios (GET)
    public function index()
    {
        // Retorna todos los usuarios
        return response()->json(User::all(), 200);
    }

    // Para crear un nuevo usuario (POST)
    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        // Crear un nuevo usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Encriptar la contraseña
        ]);

        return response()->json($user, 201); // Devuelve el usuario creado
    }
}
