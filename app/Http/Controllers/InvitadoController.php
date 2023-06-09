<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use App\Models\Fotografias;
use Illuminate\Http\Request;

class InvitadoController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $Eventos = [];
        if ($user->Rol()->nombre == 'Invitado') {
            $Eventos = Eventos::with('Catalogo')->select('eventos.*')
                ->join('invitaciones', 'invitaciones.id_evento', '=', 'eventos.id')
                ->join('catalogos', 'invitaciones.codigo', '=', 'catalogos.codigo')
                ->where('invitaciones.id_invitado', '=', $user->id)
                ->get();
        }

        $heads = [
            ['label' => 'Catalogo', 'width' => 20],
            ['label' => 'Codigo', 'width' => 20],
            ['label' => 'Acciones', 'no-export' => true, 'width' => 10],
        ];

        return view('invitado.eventos', compact('Eventos', 'heads'));
    }

    public function checkout(Request $request)
    {
        $fotografia = Fotografias::find($request->get('id_fotografia'));

        return view('checkout.checkout_1',compact('fotografia'));
    }
}
