<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    //
    public function index()
    {
        $Eventos = Eventos::all(); //saco todos los paquetes de la  tabla paquetes(base de datos)
        return view('Evento.index_adminlte', compact('Eventos')); //retorno a la vista y envio una variable con todos los paquetes
    }
    public function create()
    {
        return view('Evento.create');
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
