@extends('adminlte::page')

@section('title', 'Eventos')

@section('content_header')
    <h1>Catalogos</h1>
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
                            {{ __('Catalogos') }}
                        </span>

                            <x-adminlte-modal id="modalCustom" title="Account Policy" size="lg" theme="teal"
                                              icon="fas fa-bell" v-centered static-backdrop scrollable>
                                <div style="height:800px;">Read the account policies...</div>
                                <x-slot name="footerSlot">
                                    <x-adminlte-button class="mr-auto" theme="success" label="Accept"/>
                                    <x-adminlte-button theme="danger" label="Dismiss" data-dismiss="modal"/>
                                </x-slot>
                            </x-adminlte-modal>
                            <div class="float-right">
                                <x-adminlte-button label="Buscar Catalogo" data-toggle="modal"
                                                   data-target="#modalCustom" class="bg-primary"/>
                                {{--                            <a href="{{ route('evento.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">--}}
                                {{--                                    {{ __('Buscar Catalogo') }}--}}
                                {{--                                </a>--}}
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
                            <x-adminlte-datatable id="tabla_eventos" :heads="$heads" head-theme="dark" striped hoverable
                                                  bordered compressed>
                                @foreach($Eventos as $evento)
                                    <tr>
                                        <td>{{$evento->catalogo->nombre}}</td>
                                        <td>{{$evento->catalogo->codigo}}</td>
                                        <td>
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
