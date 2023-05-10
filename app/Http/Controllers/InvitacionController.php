<?php

namespace App\Http\Controllers;

use App\Models\Invitacion;
use Illuminate\Http\Request;

class InvitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Invitaciones = Invitacion::all();

        $heads = [
            ['label' => 'Codigo', 'width' => 20],
            ['label' => 'Descripcion', 'width' => 10],
            ['label' => 'Fecha', 'width' => 40],
        ];

        return view('Invitaciones.index', compact('Invitaciones', 'heads'));
    }

    public function create()
    {
        return view('Invitaciones.create');
    }

    public function store(Request $request)
    {
        $Invitacion = new Invitacion($request->input());
        $Invitacion->save();
        return response()->redirectTo(url('invitacion'))->with('success', 'Nuevo Invitacion creado!');

    }
    public function show($id)
    {
        $Invitacion = Invitacion::find($id);
        return view('Invitaciones.show', compact('Invitacion'));
    }
    public function edit($id)
    {
        $Invitacion = Invitacion::find($id);
        return view('Invitaciones.edit', compact('Invitacion'));
    }

    public function update(Request $request, $id)
    {
        $Invitacion = Invitacion::find($id);
        $Invitacion->nombre = $request->get('codigo');
        $Invitacion->direccion = $request->get('descripcion');
        $Invitacion->fecha = $request->get('fecha');

        $Invitacion->save();
        return response()->redirectTo(url('invitacion'))->with('success', "Invitacion \"$Invitacion->nombre\" actualizado!");
    }


    public function destroy($id)
    {
        $Invitacion = Invitacion::find($id);
        $Invitacion->delete();
        return response()->redirectTo(url('invitacion'))->with('success', "Invitacion \"$Invitacion->nombre\" eliminado!");
    }
}
