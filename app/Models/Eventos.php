<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Eventos extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'nombre',
            'direccion',
            'fecha',
            'hora'
        ];

    public function Catalogo(): hasOne
    {
        return $this->hasOne(Catalogos::class, 'id_evento', 'id');
    }
}
