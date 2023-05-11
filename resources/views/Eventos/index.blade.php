@extends('adminlte::page')

@section('title', 'Eventos')

@section('content_header')
    <h1>Eventos</h1>
@stop
@section('plugins.DatatablesPlugin', true)
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
                        @if(auth()->user()->Rol()->nombre=='Organizador')
                        <div class="float-right">
                                <a href="{{ route('evento.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <x-adminlte-datatable id="tabla_eventos" :heads="$heads" head-theme="dark" striped hoverable
                                                  bordered compressed>
                                @foreach($Eventos as $evento)
                                    <tr>
                                        <td>{{ $evento->nombre }}</td>
                                        <td>{{ $evento->direccion }}</td>
                                        <td>{{ $evento->fecha }}</td>
                                        <td>{{ $evento->hora }}</td>
                                        <td>{{$evento->catalogo->codigo}}</td>
                                        <td>
                                            @if(auth()->user()->Rol()->nombre=='Organizador')
                                                <a class="btn btn-xs btn-default text-teal mx-1 shadow" title="Ver"
                                                   href="{{url("evento/$evento->id")}}">
                                                    <i class="fa fa-lg fa-fw fa-eye"></i>
                                                </a>
                                                <a class="btn btn-xs btn-default text-primary mx-1 shadow"
                                                   title="Editar"
                                                   href="{{url("evento/$evento->id/edit")}}">
                                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                                </a>
                                            @endif
                                            <a class="btn btn-xs btn-default text-primary mx-1 shadow"
                                               title="Ver Catalogo"
                                               href="{{url("evento/catalogo/".$evento->catalogo->id)}}">
                                                <i class="fa fa-lg fa-fw fa-images"></i>
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
