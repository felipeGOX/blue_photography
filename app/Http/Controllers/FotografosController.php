<?php

namespace App\Http\Controllers;

use App\Models\User;

class FotografosController extends Controller
{
    public function index()
    {
        $fotografos = User::getAllFotografos();

        $heads = [
            ['label' => 'Nombre', 'width' => 20],
            ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
        ];

        return view('Fotografo.index', compact('fotografos', 'heads'));
    }
}
