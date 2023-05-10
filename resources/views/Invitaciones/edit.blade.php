@extends('adminlte::page')
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar invitacion</span>
                    </div>
                    <div class="card-body">
                        <form method=POST action="{{ route('invitacion.update', $Invitacion->id) }}" role="form"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <fieldset>
                                <legend>Crea un nuevo invitacion</legend>

                                
                                <div class="row">
                                <x-adminlte-input name="codigo" label="Codigo" placeholder="" value="{{$Invitacion->codigo}}" fgroup-class="col-md-6" disable-feedback />
                            </div>

                            <div class="row">
                                <x-adminlte-input name="descripcion" label="Descripcion" placeholder="Descripcion" value="{{$Invitacion->descripcion}}" fgroup-class="col-md-6" disable-feedback />
                            </div>
                            
                           
                            <div class="row">
                                @php
                                    $config = [
                                        'format' => 'YYYY-MM-DD',
                                        'dayViewHeaderFormat' => 'MMM YYYY',
                                        'minDate' => "js:moment().startOf('month')",
                                    ];
                                @endphp
                                <x-adminlte-input-date name="fecha" label="Fecha" igroup-size="sm"
                                                       fgroup-class="col-md-6"
                                                       :config="$config" placeholder="Fecha del evento" value="{{$Invitacion->fecha}}" >
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-dark">
                                            <i class="fas fa-calendar-day"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input-date>
                            </div>

                            <div class="row">
                                @php
                                    $config = ['format'=>'HH:mm'];
                                @endphp
                                <x-adminlte-input-date name="hora" label="Hora" :config="$config" igroup-size="sm" format="24hr"
                                                       fgroup-class="col-md-6" placeholder="Hora del evento" value="{{$Invitacion->hora}}">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-gradient-info">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input-date>
                            </div>


                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
