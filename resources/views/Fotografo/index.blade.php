@extends('adminlte::page')

@section('title', 'Fotografos')

@section('content_header')
    <h1>Fotografos</h1>
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
                                {{ __('Fotografos') }}
                            </span>
                        </div>
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
                                @foreach($fotografos as $fotografo)
                                    <tr>
                                        <td>{{ $fotografo->name }}</td>
                                        <td>
                                            <a class="btn btn-xs btn-default text-teal mx-1 shadow" title="Ver"
                                               href="{{url("fotografo/$fotografo->id")}}">
                                                <i class="fa fa-lg fa-fw fa-eye"></i>
                                            </a>
                                            <a class="btn btn-xs btn-default text-primary mx-1 shadow"
                                               title="Ver Paquetes"
                                               href="#">
                                                <i class="fa fa-lg fa-fw fa-file"></i>
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
