<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Catalogos extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'nombre',
            'descripcion',
            'codigo',
        ];

    public function Evento(): BelongsTo
    {
        return $this->belongsTo(Eventos::class, 'id_evento', 'id');
    }
}
