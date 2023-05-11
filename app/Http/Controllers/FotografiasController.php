<?php

namespace App\Http\Controllers;

use App\Models\Catalogos;
use App\Models\Fotografias;
use Illuminate\Http\Request;

class FotografiasController extends Controller
{
    //
    public function index()
    {
        $Fotografias = Fotografias::all(); //saco todos los Fotografias de la  tabla Fotografias(base de datos)

        $heads = [
            ['label' => 'Nombre', 'width' => 20],
            ['label' => 'Precio', 'width' => 10],
            ['label' => 'Thumbnail', 'width' => 40],
            ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
        ];

        return view('Fotografias.index', compact('Fotografias', 'heads'));
    }

    public function create(Request $request)
    {
        $images = [];
        $id_catalogo = $request->get('id_catalogo');
        return view('Fotografias.create', compact('images', 'id_catalogo'));
    }

    public function store(Request $request)
    {
        $fotos = $request->allFiles();
        foreach ($fotos as $foto) {
            foreach ($foto as $item) {
//            $image_path = Storage::disk('public')->putFile('images', $image);
//                $path = $item->storeAs("public/images/evento", $item->getClientOriginalName());
//                $Fotografia->ruta = $path;
//                $Fotografia->save();

//                $image = Image::make(public_path($path));
//                $image = Image::make($item);
//                $watermarkImage = Image::make(public_path(Fotografias::getWatermarkImagePath()))->opacity(50)
//                    ->resize($image->width() / 2, $image->height() / 2);
//                $image->insert($watermarkImage, 'center');
//                $newPath = public_path('storage/images/watermark/evento'.\Illuminate\Support\Str::uuid().".jpg");
//                $image->save($newPath);
//                $newPath=Storage::disk('public')->putFile('watermark', $image);
                $fotografia = new Fotografias($request->input());
                $path = $item->storeAs("public/images/evento", $item->getClientOriginalName());
                $fotografia->ruta = $path;
                $id_catalogo = $request->get('id_catalogo');
                $fotografia->id_catalogo = $id_catalogo;
                $fotografia->save();
            }
        }

        return redirect()->route('catalogo.show', ['catalogo' => $id_catalogo])->with('success', 'Nuevas fotografias agregadas!');
//        return response()->redirectTo(url('fotografia'))->with('success', 'Nueva foto creado!');
    }

    public function show($id)
    {
        $fotografia = Fotografias::find($id);
        return view('Fotografias.show', compact('fotografia'));
    }

    public function edit($id)
    {
        $Fotografias = Fotografias::find($id);
        return view('Fotografias.edit', compact('Fotografias'));
    }

    public function update(Request $request, $id)
    {
        $Fotografias = Fotografias::find($id);
        $Fotografias->nombre = $request->get('nombre');
        $Fotografias->precio = $request->get('precio');
        $Fotografias->caracteristicas = $request->get('caracteristicas');
        $Fotografias->save();
        return response()->redirectTo(url('fotografia'))->with('success', "Fotografias \"$Fotografias->nombre\" actualizado!");
    }

    public function destroy($id)
    {
        $fotografia = Fotografias::find($id);
        $catalogo = Catalogos::find($fotografia->id_catalogo);
        $fotografia->delete();

        return redirect()->route('catalogo.show', ['catalogo' => $catalogo])->with('success', "Foto eliminada!");
//        return redirect()->to(url('evento/catalogo/' . $fotografia->id_catalogo))->with('success', "Foto eliminada!");
//        return response()->redirectTo(url('fotografia'))->with('success', "Fotografias \"$Fotografias->nombre\" eliminado!");
    }
}

