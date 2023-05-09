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

        $heads = [
            ['label' => 'Nombre', 'width' => 20],
            ['label' => 'Direccion', 'width' => 10],
            ['label' => 'Fecha', 'width' => 40],
            ['label' => 'Hora', 'width' => 40],
            ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
        ];

        return view('Eventos.index', compact('Eventos', 'heads'));
    }

    public function create()
    {
        return view('Eventos.create');
    }

    public function store(Request $request)
    {
        $evento = new Eventos($request->input());
        $evento->save();
        return response()->redirectTo(url('evento'))->with('success', 'Nuevo evento creado!');

    }
    public function show($id)
    {
        $evento = Eventos::find($id);
        return view('Eventos.show', compact('evento'));
    }
    public function edit($id)
    {
        $evento = Eventos::find($id);
        return view('Eventos.edit', compact('evento'));
    }

    
    public function update(Request $request, $id)
    {
        $evento = Eventos::find($id);
        $evento->nombre = $request->get('nombre');
        $evento->direccion = $request->get('direccion');
        $evento->fecha = $request->get('fecha');
        $evento->hora = $request->get('hora');

        $evento->save();
        return response()->redirectTo(url('evento'))->with('success', "Evento \"$evento->nombre\" actualizado!");
    }


    public function destroy($id)
    {
        $evento = Eventos::find($id);
        $evento->delete();
        return response()->redirectTo(url('evento'))->with('success', "Evento \"$evento->nombre\" eliminado!");
    }
   
}
