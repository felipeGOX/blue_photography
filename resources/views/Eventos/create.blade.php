@extends('adminlte::page')
@section('plugins.TempusDominusBs4', true)
@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Registrar Evento</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('evento.store') }}" role="form" enctype="multipart/form-data">
                        @csrf
                        <fieldset>

                            <legend>Crea un nuevo evento</legend>
                            <div class="row">
                                <x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre de evento" fgroup-class="col-md-6" disable-feedback />
                            </div>
                            <div class="row">
                                <x-adminlte-input name="direccion" label="Direccion" placeholder="Nombre de direccion" fgroup-class="col-md-6" disable-feedback />
                            </div>

                            <div class="row">
                                @php
                                    $config = [
                                        'format' => 'YYYY-MM-DD',
                                        'dayViewHeaderFormat' => 'MMM YYYY',
                                        'minDate' => "js:moment().startOf('month')",
                                    ]
                                @endphp
                                <x-adminlte-input-date name="fecha" label="Fecha" igroup-size="sm"
                                                       fgroup-class="col-md-6"
                                                       :config="$config" placeholder="Fecha del evento">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-dark">
                                            <i class="fas fa-calendar-day"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input-date>
                            </div>

                            <div class="row">
                                @php
                                    $config = ['format'=>'HH:mm']
                                @endphp
                                <x-adminlte-input-date name="hora" label="Hora" :config="$config" igroup-size="sm"
                                                       format="24hr"
                                                       fgroup-class="col-md-6" placeholder="Hora del evento">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-gradient-info">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input-date>
                            </div>

                            <div class="row">
                                <x-adminlte-select2 id="paquete" name="paquete" fgroup-class="col-md-6"
                                                    label="Fotografo">
                                    @foreach($fotografos as $fotografo)
                                        <option disabled>{{$fotografo->name}}</option>
                                        @foreach($fotografo->paquetes as $paquete)
                                            <option value="{{$paquete->id}}">
                                                <x-adminlte-info-box title="{{$paquete->nombre}}"
                                                                     text="{{$paquete->precio}}"
                                                                     icon="fas fa-lg fa-user-plus text-primary"
                                                                     theme="gradient-primary" icon-theme="white"/>
                                            </option>
                                        @endforeach
                                    @endforeach
                                </x-adminlte-select2>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
