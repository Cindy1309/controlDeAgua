<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index()
    {
    
        return response()->json(User::all(), 200);
    }

   
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

      
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), 
        ]);

        return response()->json($user, 201); 
    }
   
   
    public function login(Request $request)
{
    
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        
        return response()->json([
            'message' => 'Login successful.',
            'user' => Auth::user()
        ], 200);
    }

   
    return response()->json(['error' => 'Invalid credentials.'], 401);
}
}


