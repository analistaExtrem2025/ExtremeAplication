@extends('adminlte::page')

@section('title', 'Bienvenido')

@section('content_header')
    <h1>Bienvenido</h1>

@stop

@section('content')

    @if (Auth::user()->role == 1 || Auth::user()->role == 2)
        <p>
            clic <a href="{{ route('auditorias.excel') }}">Aqui</a>
            para descargar en Excel la base de Auditorias
        </p>
        <p>
            clic <a href="{{ route('puntos.excel') }}">Aqui</a>
            para descargar en Excel la base de Puntos precargados
        </p>
    @endif


@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
@stop
