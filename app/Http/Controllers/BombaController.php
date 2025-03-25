<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BombaController extends Controller
{
    public function controlBomba(Request $request)
    {
        // Validar que el estado sea 'on' o 'off'
        $estado = $request->input('estado');
        if (!in_array($estado, ['on', 'off'])) {
            return response()->json(['success' => false, 'message' => 'Estado no válido. Debe ser "on" o "off".']);
        }

        // Definir la fecha y hora actual
        $fechaHora = Carbon::now('America/Mexico_City');

        // Guardar en la base de datos MongoDB Atlas
        try {
            $registro = [
                'estado' => $estado,  // "on" o "off"
                'fecha_hora' => $fechaHora->toDateTimeString()
            ];

            DB::connection('mongodb')->collection('suministros')->insert($registro);

            // Respuesta JSON para el botón
            return response()->json(['success' => true, 'message' => 'Estado actualizado', 'data' => $registro]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al guardar en la base de datos.', 'error' => $e->getMessage()]);
        }
    }

    // Nueva función para obtener el último estado de la bomba
    public function obtenerEstadoBomba()
    {
        // Aquí debes obtener el estado de la bomba desde la base de datos
    // Suponiendo que el estado se guarda en la colección 'suministros' en MongoDB
    $registro = DB::connection('mongodb')->collection('suministros')->orderBy('fecha_hora', 'desc')->first();

    // Verificar si se encontró un registro y devolver el estado
    if ($registro) {
        return response()->json(['estado' => $registro['estado']]);
    } else {
        // Si no hay registros, devolver un estado por defecto (apagado)
        return response()->json(['estado' => 'off']);
    }
}
}
