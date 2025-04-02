<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Suministro;

class SuministroController extends Controller
{
    public function index()
    {
        $suministros = Suministro::all();

        return view('control.datos', compact('suministros'));
    }
    public function datos()
    {
        return redirect()->route('botonAdmin');
    }
    public function vista()
    {
        $suministros = Suministro::all();

        return response()->json($suministros);
    }
    
}
