<?php

namespace App\Http\Controllers;

use App\Models\Paquetes;
use Illuminate\Http\Request;

class PaquetesController extends Controller
{
    public function index()
    {
        $Paquetes = Paquetes::all(); //saco todos los paquetes de la  tabla paquetes(base de datos)

        $heads = [
            ['label' => 'Nombre', 'width' => 20],
            ['label' => 'Precio', 'width' => 10],
            ['label' => 'Caracteristicas', 'width' => 40],
            ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
        ];

        return view('Paquetes.index', compact('Paquetes', 'heads'));
    }
    public function create()
    {
        return view('Paquetes.create');
    }

    public function store(Request $request)
    {
        $paquete = new Paquetes($request->input());
        $paquete->save();
        return response()->redirectTo(url('paquetes'))->with('success', 'Nuevo paquete creado!');

    }
    public function show($id)
    {
        $paquete = Paquetes::find($id);
        return view('Paquetes.show', compact('paquete'));
    }
    public function edit($id)
    {
        $paquete = Paquetes::find($id);
        return view('Paquetes.edit', compact('paquete'));
    }
    public function update(Request $request, $id)
    {
        $paquete = Paquetes::find($id);
        $paquete->nombre = $request->get('nombre');
        $paquete->precio = $request->get('precio');
        $paquete->caracteristicas = $request->get('caracteristicas');
        $paquete->save();
        return response()->redirectTo(url('paquetes'))->with('success', "Paquete \"$paquete->nombre\" actualizado!");
    }
    public function destroy($id)
    {
        $paquete = Paquetes::find($id);
        $paquete->delete();
        return response()->redirectTo(url('paquetes'))->with('success', "Paquete \"$paquete->nombre\" eliminado!");
    }

}
