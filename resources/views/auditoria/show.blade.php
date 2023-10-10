@extends('adminlte::page')
@section('title', 'Nueva Auditoria')

@section('css')
    <link href="{{ asset('css/auditoria.css') }}" rel="stylesheet">
@stop
@section('content')
    <button class="btn btn-info" onclick="getLocation()" id="boton_begin">Comenzar</button>
    <p id="comenzar"></p>
    @include('auditoria.form')
@stop
@section('js')

    <script>
        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').trigger('focus')
        })
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
            $("#divTitulo").show();
            $("#divSeccion1").show();
            $("#divSeccion2").show();
        }
    </script>
    <script>
        var foto = document.getElementById("fachada");
        var div = document.getElementById("divOtroCual");
        var observaciones = document.getElementById("divObservaciones");

        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "inactivo") {
                    $("#activate").hide();
                    $("#noConcre").show();
                    $("#Concre").show();
                    $("#divObservaciones").show();
                    $("#divFachada").show();
                    $("#divSave").show();

                } else if (valor == "activo") {
                    $("#noConcre").hide();
                    $("#activate").show();
                    $("#Concre").show();
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
            } else {
                div.style.display = "none";
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

    <script>
        var acordion = document.getElementsByClassName('accordion');
        var i;
        var len = acordion.length;
        for (i = 0; i < len; i++) {
            acordion[i].addEventListener('click', function() {
                this.classList.toggle('active');
                var panal = this.nextElementSibling;
                if (panal.style.maxHeight) {
                    panal.style.maxHeight = null;
                } else {
                    panal.style.maxHeight = panal.scrollHeight + 'px';
                }
            })
        }
    </script>
@stop
