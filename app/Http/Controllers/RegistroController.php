<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Asegúrate de que el modelo esté importado correctamente

class RegistroController extends Controller
{
    public function showRegistrationForm()
    {
        return view('control.registro');
    }

    public function register(Request $request)
    {
        // Validar los datos
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email', // Verifica que el email sea único
            'password' => 'required|string|min:8|confirmed', // Verifica que la contraseña esté confirmada
        ]);

        // Crear el nuevo usuario y guardarlo en MongoDB
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']), // Cifra la contraseña
        ]);

        // Redirigir al login con un mensaje de éxito
        return redirect()->route('control.login')->with('message', 'Cuenta creada exitosamente. Ahora puedes iniciar sesión.');
    }
}
