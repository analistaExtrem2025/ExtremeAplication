@extends('adminlte::page')

@section('title', 'Activacion de Clientes')

@section('content_header')
    <h1>Activacion de Punto de Venta</h1>
@stop

@section('content')
    <div class="form-group">
        <div class="col-sm-12">
            {!! Form::label('tipoCliente', 'Es cliente FEMSA?', ['class' => 'form-control']) !!}
            <div class="form-check radiosD">
                {!! Form::label('clienteFemsa', 'Si', ['class' => 'form-check-label']) !!}
                {!! Form::radio('clienteFemsa', 'si', '', null, ['class' => 'form-check-input circulo']) !!}
                {!! Form::label('clienteFemsa', 'No', ['class' => 'form-check-label']) !!}
                {!! Form::radio('clienteFemsa', 'no', '', null, ['class' => 'form-check-input circulo']) !!}
            </div>
        </div>
    </div>
<div id="inic" style="display: none">
    <button class="btn btn-info" onclick="getLocation()" id="boton_begin">Comenzar</button>
    <p id="comenzar"></p>
</div>
    {!! Form::open(['route' => 'diageo_activados.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div id="siCliente"  style="display: none">
        <input id="Latitude" name="lat" type="hidden" value="">
        <input id="Longitude" name="lon" type="hidden" value="">
        <input id="star" name="star" type="hidden" value="{{ $now }}">

        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
                    <form runat="server">
                        {!! Form::label('Tome foto de la fachada', 'Tome foto de la fachada', ['class' => 'form-control']) !!}
                        <input type='file' id="fachada" name="fotoActiv" multiple required /> <br>
                        <img style="display: none" id="facha" src="#" alt="Imagen" />
                    </form>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('Tipo de Documento', 'Tipo de Documento', ['class' => 'form-control']) !!}
                    {!! Form::select('Tipo de Documento', $tipoD, null, [
                        'class' => 'form-control',
                        'placeholder' => 'Seleccione un tipo de documento',
                        'required'
                    ]) !!}
                </div>
            </div>
        </div>
        <div class="form-group" id="nDocumento">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('nDocumento', 'Numero de Documento', ['class' => 'form-control']) !!}
                    {!! Form::number('nDocumento', null, [
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
                    {!! Form::label('Registre la Razon Social', 'Registre la Razon Social', ['class' => 'form-control']) !!}
                    {!! Form::text('razonSocial', null, ['class' => 'form-control', 'placeholder'=> 'persona natural = CEDULA , persona juridica = NIT', 'required']) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('Nombre del Negocio', 'Nombre del Negocio', ['class' => 'form-control']) !!}
                    {!! Form::text('nombreNegocio', null, ['class' => 'form-control', 'required']) !!}
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
        <div class="form-group" id="nFijo">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('nFijo', 'Telefono Fijo', ['class' => 'form-control']) !!}
                    {!! Form::number('nFijo', null, [
                        'class' => 'form-control',
                        'maxlength' => 10,
                        'minlength' => 7,
                        'oninput' => 'if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)',
                        'max' => 6099999999,
                        'min' => 1,
                    ]) !!}
                </div>
            </div>
        </div>

        <div class="form-group" id="nCelular">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('nCelular', 'Numero Celular', ['class' => 'form-control']) !!}
                    {!! Form::number('nCelular', null, [
                        'class' => 'form-control',
                        'maxlength' => 10,
                        'minlength' => 10,
                        'oninput' => 'if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)',
                        'max' => 3999999999,
                        'min' => 3000000000,
                        'required',
                    ]) !!}
                </div>
            </div>
        </div>
        <div class="form-group" id="Email">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('Correo electronico', 'Correo electronico', ['class' => 'form-control']) !!}
                    {!! Form::email('email', null, ['class' => 'form-control', 'required', 'pattern'=> '[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}']) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('localidad', 'Confirme la Localidad', ['class' => 'form-control' ]) !!}
                    <select name="localidad" id="localidad" class="form-control"  required>
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
                    {!! Form::label('barrio', 'Barrio', ['class' => 'form-control']) !!}
                    {!! Form::text('barrio', null, ['class' => ' form-control', 'required']) !!}
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
                    {!! Form::label('canal', 'Confirme el Canal', ['class' => 'form-control']) !!}
                    <select name="canal" id="canal" class="form-control" required>
                        <option value="" selected>--</option>
                        @foreach ($canal as $key => $can)
                            <option value="{{ $can }}">
                                {{ $can }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('nombre_contacto', 'Nombres del Contacto', ['class' => 'form-control']) !!}
                    {!! Form::text('nombre_contacto', null, ['class' => ' form-control', 'required']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('apellidos_contacto', 'Apellidos del Contacto', ['class' => 'form-control']) !!}
                    {!! Form::text('apellidos_contacto', null, ['class' => ' form-control', 'required']) !!}
                </div>
            </div>
        </div>

        <div class="form-group" id="telContacto">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('telContacto', 'Numero Contacto', ['class' => 'form-control', 'required']) !!}
                    {!! Form::number('telContacto', null, [
                        'class' => 'form-control',
                        'maxlength' => 10,
                        'minlength' => 10,
                        'oninput' => 'if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)',
                        'max' => 3999999999,
                        'min' => 3000000000,
                        'required',
                    ]) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12">
                {!! Form::label('mane_licores', 'Maneja Licores?', ['class' => 'form-control', 'required']) !!}
                <div class="form-check radiosD">
                    {!! Form::label('mane_licores', 'Si', ['class' => 'form-check-label']) !!}
                    {!! Form::radio('mane_licores', 'si_maneja', '', null, ['class' => 'form-check-input circulo']) !!}
                    {!! Form::label('mane_licores', 'No', ['class' => 'form-check-label']) !!}
                    {!! Form::radio('mane_licores', 'no_maneja', '', null, ['class' => 'form-check-input circulo']) !!}
                </div>
            </div>
        </div>
        <div class="form-group" id="divVenta" style="display: none">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('ventaPesos', 'Venta en pesos $$$', ['class' => 'form-control' ]) !!}
                    <select name="ventaPesos" id="venta" class="form-control" 'required' : 'nullable'>
                        <option value="" selected>--</option>
                        @foreach ($venta as $key => $vent)
                            <option value="{{ $vent }}">
                                {{ $vent }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('tamañoEst', 'Tamaño del establecimiento', ['class' => 'form-control', 'required']) !!}
                    <select name="tamañoEst" id="tamañoEst" class="form-control">
                        <option value="" selected>--</option>
                        @foreach ($tamaño as $key => $tam)
                            <option value="{{ $tam }}">
                                {{ $tam }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group portafolio">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    {{ Form::label('portafolioDiageo', 'Seleccione los productos visibles de este catalogo ') }}
                    <div class="col">
                        <input type="checkbox" name="portafolioDiageo[]" value="Johnnie Walker"
                        id="">&nbsp;<label for="">Johnnie Walker</label><br>
                        <input type="checkbox" name="portafolioDiageo[]" value="Old Parr"
                        id="">&nbsp;<label for="">Old Parr</label><br>
                        <input type="checkbox" name="portafolioDiageo[]" value="Buchanan´s"
                        id="">&nbsp;<label for="">Buchanan´s</label><br>
                        <input type="checkbox" name="portafolioDiageo[]" value="Black & White"
                        id="">&nbsp;<label for="">Black & White</label><br>
                        <input type="checkbox" name="portafolioDiageo[]" value="Smirnoff X1"
                        id="">&nbsp;<label for="">Smirnoff X1</label><br>
                        <input type="checkbox" name="portafolioDiageo[]" value="Smirnoff Ice"
                        id="">&nbsp;<label for="">Smirnoff Ice</label><br>
                        <input type="checkbox" name="portafolioDiageo[]" value="Passport"
                        id="">&nbsp;<label for="">Passport</label><br>
                        <input type="checkbox" name="portafolioDiageo[]" value="Chivas"
                        id="">&nbsp;<label for="">Chivas</label><br>
                        <input type="checkbox" name="portafolioDiageo[]" value="Something Special"
                        id="">&nbsp;<label for="">Something Special</label><br>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-check">
            {{ Form::label('seleccione si entrego gif', 'Seleccione si entrego gif') }}
            <label class="switch">

                <input type="checkbox" name="gift" id="gift" value="si">
                <span class="slider round"></span>
            </label>
        </div>
        <div id="entregaGift">
            <div id="fotgif" style="display: none">


                <input type="file" name="fotoGifts" class="form-control" required>
                <input type="hidden" name="cantidad" id="cantidad" value="">
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
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary', 'id' => 'boton']) !!}
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

                $("#siCliente").show();
            } else {
                x.innerHTML = "la geolocazación no es soportada por su navegador.";
            }
        }
        function showPosition(position) {
            $("#Latitude").val(position.coords.latitude);
            $("#Longitude").val(position.coords.longitude);
            $("#boton_begin").hide();
            $("#div_activacion").show();
        }
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "si") {
                    window.location.href = "/diageo_clienteFemsa/create"
                } else if (valor == "no") {
                $("#inic").show();
                } else {

                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "si_maneja") {
                    $("#divVenta").show();
                } else if (valor == "no_maneja") {
                    $("#divVenta").hide();

                }
            });
        });
    </script>
    <script>


        var inputCant = document.getElementById("cantidad");
        $(document).ready(function() {
            $("#gift").click(function(evento) {
                var valor = $(this).val();
                if (valor == 'si') {
                    $("#fotgif").show();
                    inputCant.value = "1";
                } else if (valor == 0) {
                    $("#fotgif").hide();
                };
            });
        });
    </script>



    <script>

        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
          })
    </script>

@stop
