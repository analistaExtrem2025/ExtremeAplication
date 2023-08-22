@extends('adminlte::page')
@section('title', 'Cliente Femsa')
@section('content_header')
    <h1>Cliente Femsa</h1>
@stop
@section('content')
    <button class="btn btn-info" onclick="getLocation()" id="boton_begin">Comenzar</button>
    <p id="comenzar"></p>
    {!! Form::open(['route' => 'diageo_clienteFemsa.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <input id="Latitude" name="lat" type="hidden" value="">
    <input id="Longitude" name="lon" type="hidden" value="">
    <input id="star" name="star" type="hidden" value="{{ $now }}">
    <div id="siCliente" style="display: none">
        <div class="form-group" id="codigo">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('codigo', 'Codigo Femsa', ['class' => 'form-control']) !!}
                    {!! Form::number('codigo', null, [
                        'class' => 'form-control',
                        'maxlength' => 10,
                        'minlength' => 7,
                        'oninput' => 'if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)',
                        'max' => 9999999999,
                        'min' => 1,
                        'required',
                    ]) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('Nombre del Negocio', 'Nombre del Negocio', ['class' => 'form-control']) !!}
                    {!! Form::text('nombreNegocio', "", ['class' => ' form-control', 'required']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('Direccion', 'Direccion', ['class' => 'form-control']) !!}
                    {!! Form::text('direccion', null, ['class' => ' form-control', 'required']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('Barrio', 'Barrio',['class'=> 'form-control']) !!}
                    {!! Form::text('barrio', null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('localidad', 'Confirme la localidad', ['class' => 'form-control']) !!}
                    <select name="localidad" id="localidad" class="form-control" required>
                        <option value="" selected>--</option>
                        @foreach ($localidad as $key => $local)
                            <option value="{{ $local }}">
                                {{ $local }}
                            </option>
                        @endforeach

                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
                    <form runat="server">
                        {!! Form::label('foto femsa', 'Confirme con una foto que es cliente Femsa', ['class' => 'form-control']) !!}
                        <input type='file' id="fachada" name="fachada" required /> <br>
                        <img style="display: none" id="facha" src="#" alt="Imagen" />
                    </form>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
                    <div id="fotoDoc">
                        <div id="fotoDocs">
                            {!! Form::label('Tome una foto de los documentos', 'Tome una foto de los documentos', ['class' => 'form-control']) !!}
                            <input type="file" name="fotoDocs" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('Observaciones de cierre', 'Observaciones de cierre', ['class' => 'form-control']) !!}
                    {!! Form::textarea('ObsCierre', null, ['class' => ' form-control','required', 'cols' => 5, 'rows' => 3 ]) !!}
                </div>
            </div>
        </div>
        <br>
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop
@section('css')
    <link href="{{ asset('css/diageo.css') }}" rel="stylesheet">
@stop
@section('js')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) { //Revisamos que el input tenga contenido
                var reader = new FileReader(); //Leemos el contenido
                $('#facha').show();
                reader.onload = function(e) { //Al cargar el contenido lo pasamos como atributo de la imagen de arriba
                    $('#facha').attr('src', e.target.result);
                    $('#foto').val('src');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#fachada").change(
            function() { //Cuando el input cambie (se cargue un nuevo archivo) se va a ejecutar de nuevo el cambio de imagen y se verá reflejado.
                readURL(this);
            });
    </script>



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
            $('#siCliente').show();
        }
    </script>

@stop
