<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BombaController extends Controller
{
    public function controlBomba(Request $request)
    {
        $estado = $request->input('estado');
        if (!in_array($estado, ['on', 'off'])) {
            return response()->json(['success' => false, 'message' => 'Estado no válido. Debe ser "on" o "off".']);
        }

        
        $fechaHora = Carbon::now('America/Mexico_City');

       
        try {
            $registro = [
                'estado' => $estado,  
                'fecha_hora' => $fechaHora->toDateTimeString()
            ];

            DB::connection('mongodb')->collection('suministros')->insert($registro);

          
            return response()->json(['success' => true, 'message' => 'Estado actualizado', 'data' => $registro]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al guardar en la base de datos.', 'error' => $e->getMessage()]);
        }
    }

   
    public function obtenerEstadoBomba()
    {  
    $registro = DB::connection('mongodb')->collection('suministros')->orderBy('fecha_hora', 'desc')->first();

    if ($registro) {
        return response()->json(['estado' => $registro['estado']]);
    } else {
        return response()->json(['estado' => 'off']);
    }
}
}
