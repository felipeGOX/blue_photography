@extends('adminlte::page')
@section('plugins.BsCustomFileInput', true)
@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Sube una fotografia</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('fotografia.store',['id_catalogo'=>$id_catalogo]) }}"
                          role="form" enctype="multipart/form-data">
                        @csrf
                        <fieldset>

                            <legend>Sube una fotografia</legend>
                            <div class="row">
                                <x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre de la foto"
                                                  fgroup-class="col-md-6" disable-feedback/>
                            </div>
                            <div class="row">
                                <x-adminlte-input name="descripcion" label="Descripcion" placeholder="Descripcion "
                                                  fgroup-class="col-md-6" disable-feedback/>
                            </div>

                            <div class="row">
                                <x-adminlte-input name="precio" label="Precio" placeholder="Precio de la foto"
                                                  type="number" igroup-size="md" min=1 fgroup-class="col-md-6">
                                    <x-slot name="appendSlot">
                                        <div class="input-group-text bg-dark">
                                            <i class="fas fa-hashtag"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
                            </div>

                            <div class="row">
                                <x-adminlte-input-file id="fotos" name="fotos[]" label="Subir fotografias"
                                                       fgroup-class="col-md-6" legend="Subir"
                                                       placeholder="Selecciona las imagenes..." igroup-size="md"
                                                       multiple>
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text text-primary">
                                            <i class="fas fa-upload"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input-file>
                            </div>
                            <button type="submit" class="btn btn-primary">Subir</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
