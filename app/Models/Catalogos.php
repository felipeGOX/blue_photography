<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogos extends Model
{
    use HasFactory;
   // protected $table = 'catalogos';
    protected $fillable = 
    [
    'id',  
    'id_evento',
    ];


}
