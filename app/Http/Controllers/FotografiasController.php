<?php

namespace App\Http\Controllers;
use App\Models\Fotografias;
use Illuminate\Http\Request;

class FotografiasController extends Controller
{
    //
    public function index()
    {
        $Fotografias = Fotografias::all(); //saco todos los Fotografias de la  tabla Fotografias(base de datos)

        $heads = [
            ['label' => 'Ruta', 'width' => 20],
            ['label' => 'Descripcion', 'width' => 10],
            ['label' => 'Precio', 'width' => 40],
            ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
        ];

        return view('Fotografias.index', compact('Fotografias', 'heads'));
    }
    public function create()
    {
        return view('Fotografias.create');
    }

    public function store(Request $request)
    {
        $Fotografia = new Fotografias($request->input());
        $Fotografia->save();
        return response()->redirectTo(url('fotografia'))->with('success', 'Nueva foto creado!');
    }
    public function show($id)
    {
        $Fotografias = Fotografias::find($id);
        return view('Fotografias.show', compact('Fotografias'));
    }
    public function edit($id)
    {
        $Fotografias = Fotografias::find($id);
        return view('Fotografias.edit', compact('Fotografias'));
    }
    public function update(Request $request, $id)
    {
        $Fotografias = Fotografias::find($id);
        $Fotografias->ruta = $request->get('nombre');
        $Fotografias->descripcion = $request->get('descripcion');
        $Fotografias->precio = $request->get('precio');
        
        $Fotografias->save();
        return response()->redirectTo(url('fotografia'))->with('success', "Fotografias \"$Fotografias->nombre\" actualizado!");
    }
    public function destroy($id)
    {
        $Fotografias = Fotografias::find($id);
        $Fotografias->delete();
        return response()->redirectTo(url('fotografia'))->with('success', "Fotografias \"$Fotografias->nombre\" eliminado!");
    }
}

