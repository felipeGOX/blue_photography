<?php

namespace App\Http\Controllers;

use App\Models\Paquetes;
use Illuminate\Http\Request;

class PaquetesController extends Controller
{
    public function index()
    {
        $Paquetes = Paquetes::all(); //saco todos los paquetes de la  tabla paquetes(base de datos)
        return view('Paquetes.index_adminlte', compact('Paquetes')); //retorno a la vista y envio una variable con todos los paquetes
    }
    public function create()
    {
        return view('Paquetes.create');
    }

    public function store(Request $request)
    {

    }
    public function show($id)
    {
    }
    public function edit($id)
    {
    }
    public function update(Request $request, $id)
    {
    }
    public function destroy($id)
    {
    }
}
