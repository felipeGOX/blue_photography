@extends('adminlte::page')
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Paquete</span>
                    </div>
                    <div class="card-body">
                        <form method=POST action="{{ route('paquetes.update',$paquete->id) }}" role="form"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <fieldset>
                                <legend>Modificar paquete existente</legend>
                                <div class="row">
                                    <x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre de paquete"
                                                      value="{{$paquete->nombre}}"
                                                      fgroup-class="col-md-6" disable-feedback/>
                                </div>
                                <div class="row">
                                    <x-adminlte-input name="precio" label="Precio" placeholder="Precio del paquete"
                                                      type="number" value="{{$paquete->precio}}"
                                                      igroup-size="sm" min=1 fgroup-class="col-md-6">
                                        <x-slot name="appendSlot">
                                            <div class="input-group-text bg-dark">
                                                <i class="fas fa-hashtag"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                                <div class="row">
                                    <x-adminlte-textarea name="caracteristicas" label="Caracteristicas"
                                                         placeholder="Resumen del paquete"
                                                         fgroup-class="col-md-6">
                                        {{$paquete->caracteristicas}}
                                    </x-adminlte-textarea>
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
