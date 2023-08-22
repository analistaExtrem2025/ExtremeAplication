@extends('adminlte::page')
@section('title', 'Nuevo punto')

@section('css')
<link href="{{ asset('css/diageo.css') }}" rel="stylesheet">
@stop

@section('content_header')
    <h1>Validación de Calidad</h1>
@stop
@section('content')




{!! Form::model(['route' => 'encuesta.diageo.update', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}

@include('encuestas.form')



{!! Form::close() !!}



@stop
