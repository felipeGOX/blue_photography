<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol_usuario extends Model
{
    use HasFactory;

    protected $table = 'rol_usuarios';

    protected $fillable =
        [
            'id_usuario',
            'id_rol',
        ];
}
