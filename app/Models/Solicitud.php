<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitudes';
    protected $fillable =
        [
            'Estado'
        ];

    public function Evento(): HasOne
    {
        return $this->hasOne(Eventos::class, 'id_evento', 'id');
    }

    public function Organizador(): HasOne
    {
        return $this->hasOne(User::class, 'id_organizador', 'id');
    }

    public function Fotografo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_fotografo', 'id');
    }
}
