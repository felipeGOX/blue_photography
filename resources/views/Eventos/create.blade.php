@extends('adminlte::page')
@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Registrar Evento</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('evento.store') }}" role="form" enctype="multipart/form-data">
                        @csrf
                        <fieldset>

                            <legend>Crea un nuevo evento</legend>
                            <div class="row">
                                <x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre de evento" fgroup-class="col-md-6" disable-feedback />
                            </div>
                            <div class="row">
                                <x-adminlte-input name="direccion" label="Direccion" placeholder="Nombre de direccion" fgroup-class="col-md-6" disable-feedback />
                            </div>

                            <div class="row">
                                <x-adminlte-input name="fecha" label="Fecha" placeholder="YYYY-MM-DD" format="YYYY-MM-DD" fgroup-class="col-md-6" disable-feedback />
                            </div>

                            <div class="row">
                                <x-adminlte-input name="hora" label="Hora" placeholder="HH:mm" format="24hr" fgroup-class="col-md-6" disable-feedback />
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop