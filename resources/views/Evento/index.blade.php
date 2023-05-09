@extends('adminlte::page')

@section('title', 'Eventos')

@section('content_header')
    <h1>Eventos</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Eventos') }}
                        </span>

                        <div class="float-right">
                        <a href="{{ route('Eventos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                    <th>Direccion</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Acciones</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ( $Eventos as $Evento )
                                <tr>
                                    <td>{{ $Evento->nombre }}</td>
                                    <td>{{ $Evento->direccion }}</td>
                                    <td>{{ $Evento->fecha }}</td>
                                    <td>{{ $Evento->hora }}</td>
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
