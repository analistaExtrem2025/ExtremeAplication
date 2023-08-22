@extends('adminlte::page')
@section('title', 'Verificacion de Calidad Punto Activados Femsa')
@section('content_header')
    <h1 style="text-transform: capitalize">Revisión de Punto FEMSA</h1>
@stop
@section('css')
    <link href="{{ asset('css/diageo.css') }}" rel="stylesheet">
@stop
@section('content')

        {!! Form::model($encuestas, ['route' => ['encuesta.reemplazo.update', $encuestas->id], 'method' => 'put', 'enctype'=>'multipart/form-data', 'files'  => 'true']) !!}
        <div>
        <div class="card-group">
            <div class="card">
                <img class="card-img-top" src="{{ Storage::url($encuestas->fotoDocs) }}" alt="Foto de evidencia">
                <div class="card-body">
                    <h5 class="card-title">Foto de la evidencia</h5>
                </div>
            </div>
            <div class="card">

                    <img class="card-img-top" src="{{ Storage::url($encuestas->fotoActiv) }}" alt="Foto de activación">
                    <div class="card-body">
                        <h5 class="card-title">Foto de la Fachada</h5>
                    </div>


                <form runat="server">
                    {!! Form::label('Tome foto de la fachada', 'Tome foto de la fachada', ['class' => 'form-control']) !!}
                    <input type='file' id="fachada" name="fotoActiv" multiple required /> <br>
                    <img style="display: none" id="facha" src="#" alt="Imagen" />
                </form>

            </div>
        </div>
        <h3>Datos del Punto</h3>

            <div class="row row-cols-auto">
                <div class="col">
                    {!! Form::label('codigo', 'Codigo Femsa') !!}
                    {!! Form::text('codigo', $encuestas->codigo, ['class' => 'form-control']) !!}
                </div>
            </div>
            <br>
            <hr>

        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}



            {!! Form::close() !!}
        <br>

    @stop
    @section('js')
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) { //Revisamos que el input tenga contenido
                    var reader = new FileReader(); //Leemos el contenido
                    $('#facha').show();
                    reader.onload = function(e) { //Al cargar el contenido lo pasamos como atributo de la imagen de arriba
                        $('#facha').attr('src', e.target.result);
                        $('#facha').value('src');
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#fachada").change(
                function() { //Cuando el input cambie (se cargue un nuevo archivo) se va a ejecutar de nuevo el cambio de imagen y se verá reflejado.
                    readURL(this);
                });
        </script>

    @stop
