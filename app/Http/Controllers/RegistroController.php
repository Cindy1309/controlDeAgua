<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 

class RegistroController extends Controller
{
    public function showRegistrationForm()
    {
        return view('control.registro');
    }

    public function register(Request $request)
    {
      
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email', 
            'password' => 'required|string|min:8|confirmed', 
        ]);

        
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']), 
        ]);

        
        return redirect()->route('control.login')->with('message', 'Cuenta creada exitosamente. Ahora puedes iniciar sesión.');
    }
}
