@extends('adminlte::page')
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Evento</span>
                    </div>
                    <div class="card-body">
                        <form method=POST action="{{ route('evento.update',$evento->id) }}" role="form"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <fieldset>
                                <legend>Crea un nuevo evento</legend>
                            <div class="row">
                                <x-adminlte-input name="codigo" label="codigo" value="{{$invitacion->codigo}}" placeholder="Ponga un codigo" fgroup-class="col-md-6" disable-feedback />
                            </div>
                            <div class="row">
                                <x-adminlte-input name="descripcion" label="Descripcion" placeholder="Escriba descripcion" value="{{$invitacion->descripcion}}" fgroup-class="col-md-6" disable-feedback />
                            </div>

                            <div class="row">
                                <x-adminlte-input name="fecha" label="Fecha" placeholder="YYYY-MM-DD" value="{{$evento->fecha}}" format="YYYY-MM-DD" fgroup-class="col-md-6" disable-feedback />
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
