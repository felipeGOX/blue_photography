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
                    <form method="POST" action="{{ route('eventos.store') }}" role="form" enctype="multipart/form-data">
                        @csrf
                        <form>
                            <fieldset>
                                <legend>Crea un nuevo evento</legend>

                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="input" name="nombre" id="nombre" placeholder="nombre">
                                </div>
                                <div class="mb-3">
                                    <label for="direccion" class="form-label">Dirección</label>
                                    <input type="input" name="direccion" id="direccion" placeholder="dirección">
                                </div>
                                <div class="mb-3">
                                    <label for="fecha" class="form-label">Fecha</label>
                                    <input type="date" name="fecha" id="fecha">
                                </div>
                                <div class="mb-3">
                                    <label for="hora" class="form-label">Hora</label>
                                    <input type="time" name="hora" id="hora">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                                
                            </fieldset>

                        </form>


                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop