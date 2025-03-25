<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;

class Casas extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'casas'; // Esta colección ya no es necesaria, pero puedes mantenerla para referencia

    protected $fillable = [
        'calle',
        'numero_casa',
        'tipo_almacenamiento',
        'propietario',
        'litros_asignados',
    ];

    // La lógica del almacenamiento y los litros asignados permanece igual
    public static $almacenamientoPermitido = ['Tinaco'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($casas) {
            if ($casas->tipo_almacenamiento === 'Tinaco') {
                $casas->litros_asignados = 20;
            }
        });

        static::updating(function ($casas) {
            if ($casas->tipo_almacenamiento === 'Tinaco') {
                $casas->litros_asignados = 20;
            }
        });
    }
}
