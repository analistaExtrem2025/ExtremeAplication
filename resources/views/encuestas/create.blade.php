@extends('adminlte::page')
@section('title', 'Nuevo punto')

@section('css')
<link href="{{ asset('css/diageo.css') }}" rel="stylesheet">
@stop

@section('content_header')
    <h1>Click aqui para comenzar</h1>
@stop
@section('content')
<button class="btn btn-info" onclick="getLocation()" id="boton_begin" >Start</button>
<p id="comenzar"></p>

<div>
    {!! Form::open(['route' => 'encuesta.diageo.store', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
    <div id="inicio" style="display: none">
        <input id="star" name="star" type="hidden" value="{{ $now }}">
        @include('encuestas.form')
    </div>
</div>


<input id="Latitude" name="Latitude" type="hidden" value="">
<input id="Longitude" name="Longitude" type="hidden" value="">
<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
{!! Form::close() !!}

@stop


@section('js')
<script>
    var x = document.getElementById("comenzar");
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "la geolocazación no es soportada por su navegador.";
        }
    }
    function showPosition(position) {
        $("#Latitude").val(position.coords.latitude);
        $("#Longitude").val(position.coords.longitude);
        $('#boton_begin').hide();
        $('#inicio').show();
    }
</script>
@stop

