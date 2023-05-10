<?php

namespace App\Http\Controllers;

use App\Models\Catalogos;
use Illuminate\Http\Request;

class CatalogosController extends Controller
{
    public function index()
    {
        $Catalogos = Catalogos::all();

        $heads = [
            ['label' => 'Nombre', 'width' => 20],
            ['label' => 'Descripcion', 'width' => 40],
            ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
        ];

        return view('Catalogos.index', compact('Catalogos', 'heads'));
    }

    public function create()
    {
        return view('Catalogos.create');
    }

    public function store(Request $request)
    {
        $catalogo = new Catalogos($request->input());
        $catalogo->save();

        // Creacion de catalogo automaticamente luego de haberse creado el catalogo
        $catalogo = new Catalogos([
            'nombre' => $catalogo->nombre,
            'descripcion' => $catalogo->descripcion,
            'codigo' => Str::orderedUuid() // generacion de codigo para el catalogo
        ]);
        $catalogo->save();

        return response()->redirectTo(url('catalogo'))->with('success', 'Nuevo catalogo creado!');
    }

    public function show($id)
    {
        $catalogo = Catalogos::find($id);
        return view('Catalogos.show', compact('catalogo'));
    }

    public function edit($id)
    {
        $catalogo = Catalogos::find($id);
        return view('Catalogos.edit', compact('catalogo'));
    }

    public function update(Request $request, $id)
    {
        $catalogo = Catalogos::find($id);
        $catalogo->nombre = $request->get('nombre');
        $catalogo->direccion = $request->get('direccion');
        $catalogo->fecha = $request->get('fecha');
        $catalogo->hora = $request->get('hora');

        $catalogo->save();
        return response()->redirectTo(url('catalogo'))->with('success', "Catalogo \"$catalogo->nombre\" actualizado!");
    }


    public function destroy($id)
    {
        $catalogo = Catalogos::find($id);
        $catalogo->delete();
        return response()->redirectTo(url('catalogo'))->with('success', "Catalogo \"$catalogo->nombre\" eliminado!");
    }

}
