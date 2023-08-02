@extends('adminlte::page')
@section('title', 'No Concretados')
@section('content_header')
    <h1>Punto De Venta No Concretado</h1>
@stop
@section('content')
    <button class="btn btn-info" onclick="getLocation()" id="boton_begin" >Comenzar</button>
        <p id="comenzar"></p>
    {!! Form::open(['route' => 'diageo_noactivados.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div id="cerrados" style="display: none">
        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
                    <form runat="server">
                        {!! Form::label('Tome foto de la fachada','Tome foto de la fachada', ['class' => 'form-control']) !!}
                        <input type='file' id="fachada" name="fachada" multiple required/> <br>
                        <img style="display: none" id="facha" src="#" alt="Imagen" />
                    </form>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('Registre el nombre del negocio','', ['class' => 'form-control']) !!}
                    {!! Form::text('razonSocial', null, ['class' => 'form-control', 'placeholder'=> 'persona natural = CEDULA , persona juridica = NIT', 'required']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('Direccion','', ['class' => 'form-control']) !!}
                    {!! Form::text('direccion', null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('Barrio','', ['class' => 'form-control']) !!}
                    {!! Form::text('barrio', null, ['class' => 'form-control', 'required' ]) !!}
                </div>
            </div>
        </div>


        <input id="star" name="star" type="hidden" value="{{ $now }}">
        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('motivo_nc', 'Confirme el motivo', ['class' => 'form-control']) !!}
                    <select name="motivo_nc" id="motivo_nc" class="form-control" required>
                        <option value="" selected>--</option>
                        @foreach ($noConcreciones as $key => $nocon)
                            <option value="{{ $nocon }}">
                                {{ $nocon }}
                            </option>
                        @endforeach

                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
        {!! Form::label('canal', 'Indique el canal', ['class' => 'form-control']) !!}
        {!! Form::select('canal', $canal, null, [
            'placeholder' => '--',
            'id' => 'canal',
            'name' => 'canal',
            'class' => 'form-control ' . ($errors->has('canal') ? 'is-invalid' : ''),
            'required',
        ]) !!}
        <input id="Latitude" name="lat" type="hidden" value="">
        <input id="Longitude" name="lon" type="hidden" value="">
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
            {!! Form::label('Observaciones de cierre', 'Observaciones de cierre', ['class' => 'form-control']) !!}
            {!! Form::textarea('ObsCierre', null, ['class' => ' form-control', 'cols' => 5, 'rows' => 3, 'required']) !!}

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
                    $('#foto').value('src');
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
            $('#cerrados').show();
        }
    </script>

@stop
