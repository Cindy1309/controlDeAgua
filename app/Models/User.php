<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Notifications\Notifiable;

class User extends Eloquent implements AuthenticatableContract
{
    use Notifiable, Authenticatable;

    protected $connection = 'mongodb';
    protected $collection = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'casas',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function casas()
    {
        return $this->embedsMany(Casas::class);  
    }
}

