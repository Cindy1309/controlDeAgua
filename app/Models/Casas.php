<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;

class Casas extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'casas'; 

    protected $fillable = [
        'calle',
        'numero_casa',
        'tipo_almacenamiento',
        'propietario',
        'litros_asignados',
    ];

    
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
