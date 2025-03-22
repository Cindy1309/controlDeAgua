<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;

class Casas extends Eloquent
{
    // La colección se llama 'casas' en MongoDB
    protected $collection = 'casas';

    // Los campos que se pueden asignar masivamente
    protected $fillable = [
        'calle',
        'numero_casa',
        'tipo_almacenamiento',
        'propietario',
        'litros_asignados', // Aquí añadimos el campo de litros asignados
    ];

    // Si no usas _id como clave primaria, puedes cambiarla si lo necesitas
    protected $primaryKey = '_id';

    // Si el tipo de almacenamiento solo debe ser "Tinaco"
    public static $almacenamientoPermitido = ['Tinaco']; // Limita a "Tinaco"

    // Al crear o actualizar el modelo, asignar los 20 litros si el tipo de almacenamiento es Tinaco
    public static function boot()
    {
        parent::boot();

        static::creating(function ($casas) {
            // Verifica si el tipo de almacenamiento es Tinaco
            if ($casas->tipo_almacenamiento === 'Tinaco') {
                // Asigna 20 litros al campo litros_asignados
                $casas->litros_asignados = 20;
            }
        });

        static::updating(function ($casas) {
            // También asegurarse de que los 20 litros se mantengan al actualizar
            if ($casas->tipo_almacenamiento === 'Tinaco') {
                $casas->litros_asignados = 20;
            }
        });
    }
}
