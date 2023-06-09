<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotografias extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'ruta',
            'descripcion',
            'precio',
        ];

    /*
   public function getRutaAttribute()
   {
       return asset('storage/' . $this->attributes['ruta']);
   }

   En este ejemplo, se agrega un atributo "ruta" al modelo y
   se define una función "getRutaAttribute" para generar dinámicamente
    la ruta completa de la imagen a partir del campo "ruta" almacenado
     en la base de datos. La función utiliza la función "asset"
     de Laravel para construir la ruta completa de la imagen en función
      del almacenamiento utilizado en tu aplicación.
   */
    public static function getWatermarkImagePath(): string
    {
        return "/img/watermark.png";
    }
}
