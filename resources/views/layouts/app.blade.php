@extends('adminlte::page', ['iFrameEnabled' => true])

@section('title', 'Blue_Photography')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p></p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@stack('modals')

@section('js')
    <script> console.log('Hi!'); </script>
@stop
