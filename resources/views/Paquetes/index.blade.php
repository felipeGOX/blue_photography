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
                            <x-adminlte-datatable id="tabla_paquetes" :heads="$heads" head-theme="dark" striped hoverable bordered compressed>
                                @foreach($Paquetes as $Paquete)
                                    <tr>
                                        <td>{{ $Paquete->nombre }}</td>
                                        <td>{{ $Paquete->precio }}</td>
                                        <td>{{ $Paquete->caracteristicas }}</td>
                                        <td>
                                            <a class="btn btn-xs btn-default text-teal mx-1 shadow" title="Ver"
                                               href="{{url("paquetes/$Paquete->id")}}">
                                                <i class="fa fa-lg fa-fw fa-eye"></i>
                                            </a>
                                            <a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar"
                                               href="{{url("paquetes/$Paquete->id/edit")}}">
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
