<?php

namespace App\Http\Controllers;

use App\Models\Catalogos;
use App\Models\Eventos;
use App\Models\Solicitud;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventosController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $Eventos = [];
        if ($user->Rol()->nombre == 'Organizador') {
            $Eventos = Eventos::with('catalogo')->where('id_organizador', '=', $user->id)->get();
        }
        if ($user->Rol()->nombre == 'Fotografo') {
            $Eventos = Eventos::with('catalogo')->select('eventos.*')
                ->join('solicitudes', 'solicitudes.id_evento', '=', 'eventos.id')
                ->join('paquetes', 'solicitudes.id_paquete', '=', 'paquetes.id')
                ->join('users', 'paquetes.id_fotografo', '=', 'users.id')
                ->where('users.id', '=', $user->id)
                ->get();
        }

        $heads = [
            ['label' => 'Nombre', 'width' => 20],
            ['label' => 'Direccion', 'width' => 20],
            ['label' => 'Fecha', 'width' => 10],
            ['label' => 'Hora', 'width' => 10],
            ['label' => 'Catalogo', 'width' => 20],
            ['label' => 'Acciones', 'no-export' => true, 'width' => 10],
        ];

        return view('Eventos.index', compact('Eventos', 'heads'));
    }

    public function create()
    {
        $fotografos = User::getAllFotografos();
        return view('Eventos.create', compact('fotografos'));
    }

    public function store(Request $request)
    {
        $evento = new Eventos($request->input());
        $evento->id_organizador = auth()->user()->id;
        $evento->save();

        // Creacion de catalogo automaticamente luego de haberse creado el evento
        $catalogo = new Catalogos([
            'nombre' => $evento->nombre,
            'descripcion' => "Catalogo del evento $evento->nombre",
            'codigo' => str_split(Str::orderedUuid(), 13)[0] // generacion de codigo para el catalogo
        ]);
        $catalogo->id_evento = $evento->id;
        $catalogo->save();

        $evento->id_catalogo = $catalogo->id;
        $evento->save();


        // Guardar la solicitud
        $solicitud = new Solicitud(['estado' => 1]);
        $solicitud->id_organizador = auth()->user()->id;
        $solicitud->id_paquete = $request->get('paquete');
        $solicitud->id_evento = $evento->id;
        $solicitud->save();

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
