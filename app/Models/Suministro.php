<?php

namespace App\Models;


use MongoDB\Laravel\Eloquent\Model as Eloquent;

class Suministro extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'suministros';
}
