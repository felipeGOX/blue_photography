<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotografos extends Model
{
    use HasFactory;
    protected $fillable =
        [
            'razon_social'
        ];
}
