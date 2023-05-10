@extends('adminlte::page')
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Fotografia</span>
                    </div>
                    <div class="card-body">
                        <form method=POST action="{{ route('fotografia.update',$fotografia->id) }}" role="form"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <fieldset>
                                <legend>Edita foto</legend>
                                <div class="row">
                                <x-adminlte-input-file name="ruta" label="Imagen" fgroup-class="col-md-6" placeholder="Seleccione una imagen" value="{{$fotografia->ruta}}" accept="image/*" :max-file-size="10" disable-feedback />
                            </div>
                            <div class="row">
                                <x-adminlte-input name="descripcion" label="Descripcion" placeholder="Descripcion " value="{{$fotografia->descripcion}}" fgroup-class="col-md-6" disable-feedback />
                            </div>

                            <div class="row">
                                <x-adminlte-input name="precio" label="Precio" placeholder="Precio de la foto" value="{{$fotografia->precio}}" type="number" igroup-size="sm" min=1 fgroup-class="col-md-6">
                                    <x-slot name="appendSlot">
                                        <div class="input-group-text bg-dark">
                                            <i class="fas fa-hashtag"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>
                            </div>

                           

                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
