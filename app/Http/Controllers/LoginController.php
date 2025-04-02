<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    
    public function showLoginForm()
    {
        return view('control.login'); 
    }

    
    public function login(Request $request)
    {
       
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

       
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
          
            if (Auth::user()->email == 'correo@example.com') {
                return redirect()->route('control.adminUsuario'); 
            }

           
            return redirect()->route('control.index'); 
        }

        
        return back()->withErrors(['email' => 'Las credenciales no son correctas.']);
    }

    
    public function logout()
    {
        Auth::logout(); 
        return redirect()->route('control.login.form'); 
    }
}
