@extends('adminlte::page')
@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Vista de Eventos</span>
                </div>
                <div class="card-body">
                    <form method=POST action="{{ route('evento.destroy',$evento->id) }}" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <fieldset>
                            <legend>Informacion del evento</legend>



                            <div class="row">
                                <x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre de paquete" value="{{$evento->nombre}}" fgroup-class="col-md-6" disable-feedback disabled />
                            </div>

                            <div class="row">
                                <x-adminlte-input name="direccion" label="Direccion" placeholder="Nombre de direccion" value="{{$evento->direccion}}" fgroup-class="col-md-6" disable-feedback disabled/>
                            </div>

                            <div class="row">
                                <x-adminlte-input name="fecha" label="Fecha" placeholder="YYYY-MM-DD" value="{{$evento->fecha}}" format="YYYY-MM-DD" fgroup-class="col-md-6" disable-feedback disabled/>
                            </div>

                            <div class="row">
                                <x-adminlte-input name="hora" label="Hora" placeholder="HH:mm" value="{{$evento->hora}}" format="24hr" fgroup-class="col-md-6" disable-feedback disabled/>
                            </div>


                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop