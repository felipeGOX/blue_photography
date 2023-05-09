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
                                <a href="{{ route('evento.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                            <x-adminlte-datatable id="tabla_eventos" :heads="$heads" head-theme="dark" striped hoverable bordered compressed>
                                @foreach($Eventos as $Evento)
                                    <tr>
                                        <td>{{ $Evento->nombre }}</td>
                                        <td>{{ $Evento->direccion }}</td>
                                        <td>{{ $Evento->fecha }}</td>
                                        <td>{{ $Evento->hora }}</td>
                                        <td>
                                            <a class="btn btn-xs btn-default text-teal mx-1 shadow" title="Ver"
                                               href="{{url("evento/$Evento->id")}}">
                                                <i class="fa fa-lg fa-fw fa-eye"></i>
                                            </a>
                                            <a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar"
                                               href="{{url("evento/$Evento->id/edit")}}">
                                                <i class="fa fa-lg fa-fw fa-pen"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </x-adminlte-datatable>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
