<?php

namespace App\Http\Controllers;

use App\Models\Catalogos;
use App\Models\Invitaciones;
use Illuminate\Http\Request;

class InvitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Invitaciones = Invitaciones::all();

        $heads = [
            ['label' => 'Codigo', 'width' => 20],
            ['label' => 'Descripcion', 'width' => 10],
            ['label' => 'Fecha', 'width' => 40],
            ['label' => 'Hora', 'width' => 40],
        ];

        return view('Invitaciones.index', compact('Invitaciones', 'heads'));
    }

    public function create()
    {
        return view('Invitaciones.create');
    }

    public function store(Request $request)
    {
        $invitacion = Invitaciones::where('codigo', '=', $request->get('codigo', ''))->first();
        if (is_null($invitacion)) {
            $invitacion = new Invitaciones($request->input());
            $catalogo = Catalogos::with('evento')
                ->where('codigo', '=', $invitacion->codigo)
                ->first();

            if (!is_null($catalogo)) {
                $invitacion->id_invitado = auth()->user()->id;
                $invitacion->id_evento = $catalogo->evento->id;
                $invitacion->save();
                return response()->redirectTo(url('invitado'))->with('success', 'Invitacion aceptada!');
            }
            return response()->redirectTo(url('invitado'))->with('alert', 'Catalogo no encontrado!');
        }
        return response()->redirectTo(url('invitado'))->with('success', 'Invitacion aceptada!');
    }

    public function show($id)
    {
        $Invitacion = Invitaciones::find($id);
        return view('Invitaciones.show', compact('Invitacion'));
    }

    public function edit($id)
    {
        $Invitacion = Invitaciones::find($id);
        return view('Invitaciones.edit', compact('Invitacion'));
    }

    public function update(Request $request, $id)
    {
        $Invitacion = Invitaciones::find($id);
        $Invitacion->codigo = $request->get('codigo');
        $Invitacion->descripcion = $request->get('descripcion');
        $Invitacion->fecha = $request->get('fecha');
        $Invitacion->hora = $request->get('hora');

        $Invitacion->save();
        return response()->redirectTo(url('invitacion'))->with('success', "Invitacion \"$Invitacion->nombre\" actualizado!");
    }


    public function destroy($id)
    {
        $Invitacion = Invitaciones::find($id);
        $Invitacion->delete();
        return response()->redirectTo(url('invitacion'))->with('success', "Invitacion \"$Invitacion->nombre\" eliminado!");
    }
}
