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
                                <x-adminlte-input name="nombre" label="Nombre" value="{{$evento->nombre}}" placeholder="Nombre de evento" fgroup-class="col-md-6" disable-feedback />
                            </div>
                            <div class="row">
                                <x-adminlte-input name="direccion" label="Direccion" placeholder="Nombre de direccion" value="{{$evento->direccion}}" fgroup-class="col-md-6" disable-feedback />
                            </div>

                            <div class="row">
                                <x-adminlte-input name="fecha" label="Fecha" placeholder="YYYY-MM-DD" value="{{$evento->fecha}}" format="YYYY-MM-DD" fgroup-class="col-md-6" disable-feedback />
                            </div>

                            <div class="row">
                                <x-adminlte-input name="hora" label="Hora" placeholder="HH:mm" value="{{$evento->hora}}" format="24hr" fgroup-class="col-md-6" disable-feedback />
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
