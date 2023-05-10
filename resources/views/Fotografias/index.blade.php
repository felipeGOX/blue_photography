@extends('adminlte::page')

@section('title', 'Fotografias')

@section('content_header')
    <h1>Fotografias</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Fotografias') }}
                        </span>

                        <div class="float-right">
                                <a href="{{ route('fotografia.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                            <x-adminlte-datatable id="tabla_Fotografias" :heads="$heads" head-theme="dark" striped hoverable bordered compressed>
                                @foreach($Fotografias as $Fotografia)
                                    <tr>
                                        <td>{{ $Fotografia->nombre }}</td>
                                        <td>{{ $Fotografia->descripcion }}</td>
                                        <td>{{ $Fotografia->precio }}</td>
                                        <td>{{ $Fotografia->ruta }}</td>
                                        <td>
                                            <a class="btn btn-xs btn-default text-teal mx-1 shadow" title="Ver"
                                               href="{{url("fotografia/$Fotografia->id")}}">
                                                <i class="fa fa-lg fa-fw fa-eye"></i>
                                            </a>
                                            <a class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar"
                                               href="{{url("fotografia/$Fotografia->id/edit")}}">
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
