@extends('adminlte::page')

@section('title', 'Catalogo')

@section('content_header')
    <h1>Catalogo {{$catalogo->nombre}}</h1>
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
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="col-md-2">
                            <div class="d-flex flex-wrap">
                                @foreach($Fotografias as $Fotografia)
                                    <div class="flex-fill">
                                        <x-adminlte-card theme="dark"
                                                         class="elevation-3" body-class="bg-dark" header-class="bg-dark"
                                                         footer-class="bg-dark rounded border-dark">
                                            <x-slot name="toolsSlot">
                                                <img src="{{ Storage::url($Fotografia->ruta) }}"
                                                     alt="{{ $Fotografia->nombre }}"
                                                     class="card-img-top">
                                            </x-slot>
                                            <x-slot name="footerSlot">
                                                <a class="btn btn-block btn-primary text-primary" title="Comprar"
                                                   href="#">
                                                    <i class="fa fa-lg fa-fw fa-dollar-sign"></i> {{__('Comprar')}}
                                                </a>
                                            </x-slot>
                                        </x-adminlte-card>
                                    </div>

                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
