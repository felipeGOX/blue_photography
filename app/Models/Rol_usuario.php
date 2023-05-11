<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Jetstream\Role;

class Rol_usuario extends Model
{
    use HasFactory;

    protected $table = 'rol_usuarios';

    protected $fillable =
        [
            'id_usuario',
            'id_rol',
        ];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }

    public function Rol(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'id_rol', 'id');
    }
}
