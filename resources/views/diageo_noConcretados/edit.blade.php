@extends('adminlte::page')

@section('title', 'Verificacion de Calidad Punto No Activado')

@section('content_header')
    <span class="float-right"> Fecha de creacion : {{ $encuestas->star }}</span>
    <h1 style="text-transform: capitalize">Revisión de Punto NO activado</h1>
@stop
@section('css')
<link href="{{ asset('css/diageo.css') }}" rel="stylesheet">
@stop
@section('content')
{!! Form::model($encuestas, ['route' => ['diageo_noactivados.update', $encuestas->id], 'method' => 'put']) !!}
    <div class="card-group">
        <div class="card">
            <img class="card-img-top" src="{{ Storage::url($encuestas->fotoActiv) }}" alt="Foto de activación">
            <div class="card-body">
                <h5 class="card-title">Foto de la Fachada</h5>
            </div>
        </div>
    </div>
    <h3>Datos del Punto</h3>
    <div class="container-fluid">
        <div class="row row-cols-auto">
            <div class="col">
                {!! Form::label('nombreNegocio', 'Nombre del Negocio') !!}
                {!! Form::text('nombreNegocio', $encuestas->nombreNegocio, ['class' => 'form-control']) !!}
            </div>
            <div class="col">
                {!! Form::label('direccion', 'Direccion') !!}
                {!! Form::text('direccion', $encuestas->direccion, ['class' => 'form-control']) !!}
            </div>
        </div>
        <br>
        <hr>
        <div class="row row-cols-auto">
            <div class="col">
                {!! Form::label('departamento', 'Departamento') !!}
                {!! Form::text('departamento', $encuestas->departamento, ['class' => 'form-control']) !!}
            </div>
            <div class="col">
                {!! Form::label('municipio', 'Municipio') !!}
                {!! Form::text('municipio', $encuestas->municipio, ['class' => 'form-control']) !!}
            </div>
            <div class="col">
                {!! Form::label('localidad', 'Localidad') !!}
                {!! Form::text('localidad', $encuestas->localidad, ['class' => 'form-control']) !!}
            </div>
            <div class="col">
                {!! Form::label('barrio', 'Barrio') !!}
                {!! Form::text('barrio', $encuestas->barrio, ['class' => 'form-control']) !!}
            </div>

        </div>
        <br>
        <hr>
        <div class="row row-cols-auto">
            <div class="col">
                {!! Form::label('promotor', 'Promotor') !!}
                {!! Form::text('promotor', $encuestas->promotor, ['class' => 'form-control', 'disabled']) !!}
            </div>
            <div class="col" >
                {!! Form::label('latitude', 'Latitude') !!}
                {!! Form::text('latitude', $encuestas->latitude, ['class' => 'form-control']) !!}
            </div>
            <div class="col" >
                {!! Form::label('longitude', 'Longitude') !!}
                {!! Form::text('longitude', $encuestas->longitude, ['class' => 'form-control']) !!}
            </div>
            <div class="col">
                {!! Form::label('canal', 'Canal') !!}
                {!! Form::select('canal', $canal, $encuestas->canal, ['class' => 'form-control']) !!}
            </div>

            <div class="col">
                {!! Form::label('motivo_nc', 'Motivo de no concreción') !!}
                {!! Form::text('motivo_nc', $encuestas->motivo_nc, ['class' => 'form-control']) !!}
            </div>

        </div>
        <br>
        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('Observaciones de cierre', 'Observaciones de cierre', ['class' => 'form-control']) !!}
                    {!! Form::textarea('ObsCierre', $encuestas->obsCierre, [
                        'class' => ' form-control',
                        'required',
                        'cols' => 5,
                        'rows' => 3,
                        'disabled',
                    ]) !!}
                </div>
            </div>
        </div>
        <br>
        <hr>
        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('Status de Calidad', 'Status de Calidad', ['class' => 'form-control']) !!}
                    {!! Form::select('estatusCalidad', $statusN, null, ['class' => 'form-control', 'placeholder' => '--', 'required']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('Observaciones de calidad', 'Observaciones de calidad', ['class' => 'form-control']) !!}
                    {!! Form::textarea('ObsCalidad', null, ['class' => ' form-control', 'required', 'cols' => 5, 'rows' => 3]) !!}
                </div>
            </div>
        </div>
{!! Form::hidden('estadoCarga', 'Gestionado Calidad' ) !!}
{!! Form::hidden('usuarioCalidad', Auth::user()->name ) !!}
{!! Form::hidden('fechaCalidad', $now ) !!}
        {!! Form::submit('Guardar Cambios', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    <br>
    @include('diageo_activados.map')
@stop
