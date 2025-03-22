<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    // Mostrar el formulario de login
    public function showLoginForm()
    {
        return view('control.login'); // Muestra la vista login
    }

    // Procesar el login
    public function login(Request $request)
    {
        // Validar los datos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Si el correo es el específico, redirigir a la página de administración
            if (Auth::user()->email == 'correo@example.com') {
                return redirect()->route('control.admin'); // Redirige a la vista del administrador
            }

            // Redirigir al índice después de un login exitoso
            return redirect()->route('control.index'); // Redirige a la vista index
        }

        // Si el login falla
        return back()->withErrors(['email' => 'Las credenciales no son correctas.']);
    }

    // Método para cerrar sesión
    public function logout()
    {
        Auth::logout(); // Cierra la sesión
        return redirect()->route('control.login.form'); // Redirige al formulario de login
    }
}
