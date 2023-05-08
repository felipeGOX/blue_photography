@extends('adminlte::page')

@section('title', 'Paquetes')

@section('content_header')
    <h1>Paquetes</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Paquetes') }}
                        </span>

                        <div class="float-right">
                        <a href="{{ route('paquetes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                               {{ __('Create New') }}
                         </a>
                        </div>

                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>Nombre</th>
                                    <th>precio</th>
                                    <th>cantidad de fotos</th>
                                    <th>Descripcion</th>
                                    <th>Acciones</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ( $Paquetes as $Paquete )
                                <tr>
                                    <td>{{ $Paquete->nombre }}</td>
                                    <td>{{ $Paquete->precio }}</td>
                                    <td>{{ $Paquete->cantidad_fotos }}</td>
                                    <td>{{ $Paquete->descripcion }}</td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@stop
