<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Paquetes extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'nombre',
            'precio',
            'caracteristicas',
        ];

    public function Fotografo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_fotografo', 'id');
    }
}
