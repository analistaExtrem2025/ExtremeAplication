@extends('adminlte::page')
@section('title', 'Nueva Auditoria')
@section('css')

    <link href="https://cdn.jsdelivr.net/css-toggle-switch/latest/toggle-switch.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" />

    <link href="{{ asset('css/auditoria.css') }}" rel="stylesheet">
@stop
@section('content')
    <button class="btn btn-info" onclick="getLocation()" id="boton_begin">Comenzar</button>
    <p id="comenzar"></p>
    {!! Form::open(['route' => 'auditoria.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div id="inicio" style="display: none">
        <input id="Latitude" name="lat" type="hidden" value="">
        <input id="Longitude" name="lon" type="hidden" value="">
        <input id="star" name="star" type="hidden" value="{{ $now }}">
        div class="container">
        <h2 class="titulo" id="divTitulo" style="display: none">Auditoria</h2>
        <div class="accordion" id="divSeccion1" style="display: none">
            <h5> <span class="numeros">1</span> Datos del Punto de Venta</h5>
            <i class="fas fa-minus"></i>
            <i class="fas fa-plus"></i>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="panal">
            <main>

                <input type="hidden" name="precarga_id" id="precarga_id" value="{{ $puntos_auditoria->id }}" readonly>

                <div class="input">
                    <label for="razonSocial">Nombre de la razon social</label>
                    <input type="text" name="razonSocial" id="razonSocial" value="{{ $puntos_auditoria->razonSocial }}"
                        readonly>
                </div>
                <div class="input">
                    <label for="nit">Cedula o Nit</label>
                    <input type="text" name="nit" id="nit" type="text" value="{{ $puntos_auditoria->nit }}"
                        readonly>
                </div>

                <div class="input">
                    <label for="direccion">Dirección</label>
                    <input type="text" name="direccion" id="direccion" type="text"
                        value="{{ $puntos_auditoria->direccion }}"readonly>
                </div>
                <div class="input">
                    <label for="telefono">Telefono Fijo</label>
                    <input type="text" name="telefono" id="telefono" type="text"
                        value="{{ $puntos_auditoria->telFijo }}" readonly>
                </div>
                <div class="input">
                    <label for="telefono">Telefono Celular</label>
                    <input type="text" name="telefono" id="telefono" type="text"
                        value="{{ $puntos_auditoria->telCelular }}" readonly>
                </div>
                <div class="input">
                    <label for="departamento">Departamento</label>
                    <input type="text" name="departamento" id="departamento" type="text"
                        value="{{ $puntos_auditoria->departamento }}" readonly>
                </div>
                <div class="input">
                    <label for="municipio">Municipio</label>
                    <input type="text" name="municipio" id="municipio" type="text"
                        value="{{ $puntos_auditoria->municipio }}" readonly>
                </div>
                <div class="input">
                    <label for="localidad">Localidad</label>
                    <input type="text" name="barrio" id="barrio" type="text"
                        value="{{ $puntos_auditoria->barrio }}" readonly>
                </div>
            </main>
        </div>

        <div class="accordion" id="divSeccion2" style="display: none">
            <h5 data-toggle="modal" data-target="#activateModal"><span class="numeros">2</span>¿Se activa el punto?</h5>
            <i class="fas fa-minus"></i>
            <i class="fas fa-plus"></i>
        </div>
        <div class="panal">
            <!-- Modal -->
            <div class="modal fade" id="activateModal" tabindex="-1" role="dialog"
                aria-labelledby="activateModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 data-toggle="modal" data-target="#activateModal"><span class="numeros">2</span>¿Se activa
                                el punto?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <p>
                            <div class="input">
                                <div class="switch-toggle switch-3 switch-candy">
                                    <input id="activo" name="activacion" type="radio" value="activo"
                                        checked="" required="required" />
                                    <label for="activo">Se activó</label>
                                    <input id="na" name="activacion" type="radio" disabled value=""
                                        checked="checked" />
                                    <label for="na" class="disabled">¿Se activó el PDV?</label>
                                    <input id="inactivo" name="activacion" type="radio" value="inactivo" />
                                    <label for="inactivo">No se activó</label>
                                    <a></a>
                                </div>
                            </div>
                            <div class="input" id="noConcre" style="display: none">
                                <br>
                                <br>
                                <div class="row" style="text-align: center">
                                    <div class="col">
                                        <green> <span>Indique el motivo de no concreción</span></green>
                                        <br>
                                        <br>
                                        {!! Form::select('noConcreciones', $noConcreciones, null, [
                                            'class' => 'form-control',
                                            'placeholder' => '--',
                                            'id' => 'noConcreciones',
                                            'onchange' => 'ShowSelected()',
                                            'required',
                                            'disabled',
                                        ]) !!}

                                    </div>
                                </div>
                            </div>
                            <div class="input" id="divOtroCual" style="display: none">
                                {!! Form::label('¿Cual?') !!}
                                {!! Form::text('cual', null, [
                                    'class' => 'form-control textar',
                                    'autocomplete' => 'off',
                                    'id' => 'cual',
                                    'required',
                                    'disabled',
                                ]) !!}
                            </div>
                            <div class="input" id="divObservaciones" style="display: none">
                                {!! Form::label('observaciones', 'Observaciones') !!}
                                {!! Form::textarea('observaciones', null, [
                                    'class' => 'form-control textar',
                                    'col' => 3,
                                    'rows' => 3,
                                    'id' => 'observaciones',
                                    'required',
                                    'disabled',
                                ]) !!}
                            </div>
                            <div class="input" id="divFachada" style="display: none">
                                <br>
                                <br>
                                <div class="row" style="text-align: center">
                                    <div class="col">
                                        <blue> <span>Tome foto de la fachada</span></blue>
                                        <br>
                                        <br>
                                        <input type="file" id="seleccionFachada" name="fotoActiv" accept="image/*"
                                            required>
                                        <br><br>
                                        <img class="card-img-top" id="imagenFachada">

                                    </div>
                                </div>
                            </div>
                            </p>
                            {!! Form::submit('Siguiente', ['class' => 'btn btn-primary', 'id' => 'boton']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
    {!! Form::close() !!}
@stop
@section('js')

    <script>
        const radios = document.getElementsByName('activacion');

        for (var i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
                console.log(radios[i].value);
                break;
            }
        }
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
            $('#inicio').show();
        }
    </script>
    <script>
        var foto = document.getElementById("fachada");
        var div = document.getElementById("divOtroCual");
        var observaciones = document.getElementById("divObservaciones");
        var noConcre = document.getElementById("noConcreciones");
        var obs = document.getElementById('observaciones');
        const act = document.getElementByName('activacion');
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "inactivo") {
                    $("#activate").hide();
                    $("#noConcre").show();
                    $("#Observaciones").show();
                    $("#divFachada").show();
                    $("#divSave").show();
                    $('#noConcreciones').prop("disabled", false);
                    $('#observaciones').prop("disabled", false);
                } else if (valor == "activo") {
                    $("#noConcre").hide();
                    $("#activate").show();
                    $("#divObservaciones").hide();
                    $("#divFachada").show();
                    div.style.display = "none";
                }
            });
        });
    </script>
    <script type="text/javascript">
        function ShowSelected() {
            /* Para obtener el valor */
            var cod = document.getElementById("noConcreciones").value;
            var div = document.getElementById("divOtroCual");
            if (cod == "Otro motivo") {
                div.style.display = "block";
            } else if (cod != "Otro motivo") {
                div.style.display = "none";

                $('#cual').attr("required", "required");
            } else {
                div.style.display = "none";
                $('#cual').removeAttr("required", "required");
            }
        }
    </script>
    <script>
        const $seleccionFachada = document.querySelector("#seleccionFachada"),
            $imagenFachada = document.querySelector("#imagenFachada");
        $seleccionFachada.addEventListener("change", () => {
            const archivos = $seleccionFachada.files;
            if (!archivos || !archivos.length) {
                $imagenFachada.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenFachada.src = objectURL;
        });
    </script>
@stop
