@extends('adminlte::page')
@section('title', 'Nueva Auditoria')

@section('css')
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
        @include('auditoria.form')
    </div>
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
                    $("#Observaciones").show();
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

    <script>
// Jquery Dependency

$("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() {
      formatCurrency($(this), "blur");
    }
});


function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.

  // get input value
  var input_val = input.val();

  // don't validate empty input
  if (input_val === "") { return; }

  // original length
  var original_len = input_val.length;

  // initial caret position
  var caret_pos = input.prop("selectionStart");

  // check for decimal
  if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);

    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
      right_side += "00";
    }

    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 0);

    // join number by .
    input_val = "$" + left_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val = "$" + input_val;

    // final formatting
    if (blur === "blur") {
      input_val += ".00";
    }
  }

  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}



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
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor1 = $(event.target).val();
                if (valor1 == "tipologia_no") {
                    $("#divtipologia").show();
                    $("#divOldTipologia").hide();
                } else if (valor1 == "tipologia_si") {
                    $("#divtipologia").hide();
                    $("#divOldTipologia").show();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "segmento_no") {
                    $("#divSegmento").hide();
                    $("#segmentoPic").show();
                    $("#divOldSegmento").show();
                } else if (valor == "segmento_si") {
                    $("#divSegmento").show();
                    $("#divOldSegmento").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "cenefa_si") {
                    $("#divCenefa").show();
                } else if (valor == "cenefa_no") {
                    $("#divCenefa").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "afiche_si") {
                    $("#divAfiche").show();
                } else if (valor == "afiche_no") {
                    $("#divAfiche").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "marco_si") {
                    $("#divMarco").show();
                } else if (valor == "marco_no") {
                    $("#divMarco").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "rompetraficos_si") {
                    $("#divRompetrafico").show();
                } else if (valor == "rompetraficos_no") {
                    $("#divRompetrafico").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "fachadas_si") {
                    $("#divFaxada").show();
                } else if (valor == "fachadas_no") {
                    $("#divFaxada").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "hielera_si") {
                    $("#divHielera").show();
                } else if (valor == "hielera_no") {
                    $("#divHielera").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "bases_h_si") {
                    $("#divBase_h").show();
                } else if (valor == "bases_h_no") {
                    $("#divBase_h").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "dosificadorD_si") {
                    $("#divDosificadorD").show();
                } else if (valor == "dosificadorD_no") {
                    $("#divDosificadorD").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "dosificadorS_si") {
                    $("#divDosificadorS").show();
                } else if (valor == "dosificadorS_no") {
                    $("#divDosificadorS").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "branding_si") {
                    $("#divBranding").show();
                } else if (valor == "branding_no") {
                    $("#divBranding").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "vasos_si") {
                    $("#divVasos").show();
                } else if (valor == "vasos_no") {
                    $("#divVasos").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "bAndw1000_si") {
                    $("#divbaw1000").show();
                } else if (valor == "bAndw1000_no") {
                    $("#divbaw1000").hide();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "bAndw700_si") {
                    $("#divbaw700").show();
                } else if (valor == "bAndw700_no") {
                    $("#divbaw700").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "bAndw375_si") {
                    $("#divbaw375").show();
                } else if (valor == "bAndw375_no") {
                    $("#divbaw375").hide();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "smirnoff375_si") {
                    $("#divSmirnoff375").show();
                } else if (valor == "smirnoff375_no") {
                    $("#divSmirnoff375").hide();
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "smirnoff700_si") {
                    $("#divSmirnoff700").show();
                } else if (valor == "smirnoff700_no") {
                    $("#divSmirnoff700").hide();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "jhonnie1000_si") {
                    $("#divjhonnie1000").show();
                } else if (valor == "jhonnie1000_no") {
                    $("#divjhonnie1000").hide();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "jhonnie700_si") {
                    $("#divjhonnie700").show();
                } else if (valor == "jhonnie700_no") {
                    $("#divjhonnie700").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "jhonnie375_si") {
                    $("#divjhonnie375").show();
                } else if (valor == "jhonnie375_no") {
                    $("#divjhonnie375").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "oldparr750_si") {
                    $("#divOldparr750").show();
                } else if (valor == "oldparr750_no") {
                    $("#divOldparr750").hide();
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "buchannas700_si") {
                    $("#divBuchannas700").show();
                } else if (valor == "buchannas700_no") {
                    $("#divBuchannas700").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "buchannas375_si") {
                    $("#divBuchannas375").show();
                } else if (valor == "buchannas375_no") {
                    $("#divBuchannas375").hide();
                }
            });
        });
    </script>





    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "buchannas_si") {
                    $("#divBuchannas").show();
                } else if (valor == "buchannas_no") {
                    $("#divBuchannas").hide();
                }
            });
        });
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
        const $selecciontipologia = document.querySelector("#selecciontipologia"),
            $imagentipologia = document.querySelector("#imagentipologia");
        $selecciontipologia.addEventListener("change", () => {
            const archivos = $selecciontipologia.files;
            if (!archivos || !archivos.length) {
                $imagentipologia.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagentipologia.src = objectURL;
        });
    </script>
    <script>
        const $seleccionsegmento = document.querySelector("#seleccionsegmento"),
            $imagensegmento = document.querySelector("#imagensegmento");

        $seleccionsegmento.addEventListener("change", () => {
            const archivos = $seleccionsegmento.files;
            if (!archivos || !archivos.length) {
                $imagensegmento.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagensegmento.src = objectURL;
        });
    </script>

    <script>
        const $seleccionCenefa = document.querySelector("#seleccionCenefa"),
            $imagenCenefa = document.querySelector("#imagenCenefa");

        $seleccionCenefa.addEventListener("change", () => {
            const archivos = $seleccionCenefa.files;
            if (!archivos || !archivos.length) {
                $imagenCenefa.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenCenefa.src = objectURL;
        });
    </script>
    <script>
        const $seleccionMarco = document.querySelector("#seleccionMarco"),
            $imagenMarco = document.querySelector("#imagenMarco");
        $seleccionMarco.addEventListener("change", () => {
            const archivos = $seleccionMarco.files;
            if (!archivos || !archivos.length) {
                $imagenMarco.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenMarco.src = objectURL;
        });
    </script>
    <script>
        const $seleccionFaxada = document.querySelector("#seleccionFaxada"),
            $imagenFaxada = document.querySelector("#imagenFaxada");
        $seleccionFaxada.addEventListener("change", () => {
            const archivos = $seleccionFaxada.files;
            if (!archivos || !archivos.length) {
                $imagenFaxada.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenFaxada.src = objectURL;
        });
    </script>

    <script>
        // Obtener referencia al input y a la imagen

        const $seleccionHielera = document.querySelector("#seleccionHielera"),
            $imagenHielera = document.querySelector("#imagenHielera");
        // Escuchar cuando cambie
        $seleccionHielera.addEventListener("change", () => {
            // Los archivos seleccionados, pueden ser muchos o uno
            const archivos = $seleccionHielera.files;
            // Si no hay archivos salimos de la función y quitamos la imagen
            if (!archivos || !archivos.length) {
                $imagenHielera.src = "";
                return;
            }
            // Ahora tomamos el primer archivo, el cual vamos a previsualizar
            const primerArchivo = archivos[0];
            // Lo convertimos a un objeto de tipo objectURL
            const objectURL = URL.createObjectURL(primerArchivo);
            // Y a la fuente de la imagen le ponemos el objectURL
            $imagenHielera.src = objectURL;
        });
    </script>

    <script>
        // Obtener referencia al input y a la imagen

        const $seleccionBase_h = document.querySelector("#seleccionBase_h"),
            $imagenBase_h = document.querySelector("#imagenBase_h");
        // Escuchar cuando cambie
        $seleccionBase_h.addEventListener("change", () => {
            // Los archivos seleccionados, pueden ser muchos o uno
            const archivos = $seleccionBase_h.files;
            // Si no hay archivos salimos de la función y quitamos la imagen
            if (!archivos || !archivos.length) {
                $imagenBase_h.src = "";
                return;
            }
            // Ahora tomamos el primer archivo, el cual vamos a previsualizar
            const primerArchivo = archivos[0];
            // Lo convertimos a un objeto de tipo objectURL
            const objectURL = URL.createObjectURL(primerArchivo);
            // Y a la fuente de la imagen le ponemos el objectURL
            $imagenBase_h.src = objectURL;
        });
    </script>








    <script>
        // Obtener referencia al input y a la imagen

        const $seleccionBase_h = document.querySelector("#seleccionBase_h"),
            $imagenBase_h = document.querySelector("#imagenBase_h");
        // Escuchar cuando cambie
        $seleccionBase_h.addEventListener("change", () => {
            // Los archivos seleccionados, pueden ser muchos o uno
            const archivos = $seleccionBase_h.files;
            // Si no hay archivos salimos de la función y quitamos la imagen
            if (!archivos || !archivos.length) {
                $imagenBase_h.src = "";
                return;
            }
            // Ahora tomamos el primer archivo, el cual vamos a previsualizar
            const primerArchivo = archivos[0];
            // Lo convertimos a un objeto de tipo objectURL
            const objectURL = URL.createObjectURL(primerArchivo);
            // Y a la fuente de la imagen le ponemos el objectURL
            $imagenBase_h.src = objectURL;
        });
    </script>
    <script>
        // Obtener referencia al input y a la imagen

        const $seleccionAfiche = document.querySelector("#seleccionAfiche"),
            $imagenAfiche = document.querySelector("#imagenAfiche");
        // Escuchar cuando cambie
        $seleccionAfiche.addEventListener("change", () => {
            // Los archivos seleccionados, pueden ser muchos o uno
            const archivos = $seleccionAfiche.files;
            // Si no hay archivos salimos de la función y quitamos la imagen
            if (!archivos || !archivos.length) {
                $imagenAfiche.src = "";
                return;
            }
            // Ahora tomamos el primer archivo, el cual vamos a previsualizar
            const primerArchivo = archivos[0];
            // Lo convertimos a un objeto de tipo objectURL
            const objectURL = URL.createObjectURL(primerArchivo);
            // Y a la fuente de la imagen le ponemos el objectURL
            $imagenAfiche.src = objectURL;
        });
    </script>
    <script>
        // Obtener referencia al input y a la imagen

        const $seleccionRompetrafico = document.querySelector("#seleccionRompetrafico"),
            $imagenRompetrafico = document.querySelector("#imagenRompetrafico");
        // Escuchar cuando cambie
        $seleccionRompetrafico.addEventListener("change", () => {
            // Los archivos seleccionados, pueden ser muchos o uno
            const archivos = $seleccionRompetrafico.files;
            // Si no hay archivos salimos de la función y quitamos la imagen
            if (!archivos || !archivos.length) {
                $imagenRompetrafico.src = "";
                return;
            }
            // Ahora tomamos el primer archivo, el cual vamos a previsualizar
            const primerArchivo = archivos[0];
            // Lo convertimos a un objeto de tipo objectURL
            const objectURL = URL.createObjectURL(primerArchivo);
            // Y a la fuente de la imagen le ponemos el objectURL
            $imagenRompetrafico.src = objectURL;
        });
    </script>
    <script>
        // Obtener referencia al input y a la imagen

        const $seleccionDosificadorD = document.querySelector("#seleccionDosificadorD"),
            $imagenDosificadorD = document.querySelector("#imagenDosificadorD");
        // Escuchar cuando cambie
        $seleccionDosificadorD.addEventListener("change", () => {
            // Los archivos seleccionados, pueden ser muchos o uno
            const archivos = $seleccionDosificadorD.files;
            // Si no hay archivos salimos de la función y quitamos la imagen
            if (!archivos || !archivos.length) {
                $imagenDosificadorD.src = "";
                return;
            }
            // Ahora tomamos el primer archivo, el cual vamos a previsualizar
            const primerArchivo = archivos[0];
            // Lo convertimos a un objeto de tipo objectURL
            const objectURL = URL.createObjectURL(primerArchivo);
            // Y a la fuente de la imagen le ponemos el objectURL
            $imagenDosificadorD.src = objectURL;
        });
    </script>
    <script>
        // Obtener referencia al input y a la imagen

        const $seleccionDosificadorS = document.querySelector("#seleccionDosificadorS"),
            $imagenDosificadorS = document.querySelector("#imagenDosificadorS");
        // Escuchar cuando cambie
        $seleccionDosificadorS.addEventListener("change", () => {
            // Los archivos seleccionados, pueden ser muchos o uno
            const archivos = $seleccionDosificadorS.files;
            // Si no hay archivos salimos de la función y quitamos la imagen
            if (!archivos || !archivos.length) {
                $imagenDosificadorS.src = "";
                return;
            }
            // Ahora tomamos el primer archivo, el cual vamos a previsualizar
            const primerArchivo = archivos[0];
            // Lo convertimos a un objeto de tipo objectURL
            const objectURL = URL.createObjectURL(primerArchivo);
            // Y a la fuente de la imagen le ponemos el objectURL
            $imagenDosificadorS.src = objectURL;
        });
    </script>
    <script>
        // Obtener referencia al input y a la imagen

        const $seleccionBranding = document.querySelector("#seleccionBranding"),
            $imagenBranding = document.querySelector("#imagenBranding");
        // Escuchar cuando cambie
        $seleccionBranding.addEventListener("change", () => {
            // Los archivos seleccionados, pueden ser muchos o uno
            const archivos = $seleccionBranding.files;
            // Si no hay archivos salimos de la función y quitamos la imagen
            if (!archivos || !archivos.length) {
                $imagenBranding.src = "";
                return;
            }
            // Ahora tomamos el primer archivo, el cual vamos a previsualizar
            const primerArchivo = archivos[0];
            // Lo convertimos a un objeto de tipo objectURL
            const objectURL = URL.createObjectURL(primerArchivo);
            // Y a la fuente de la imagen le ponemos el objectURL
            $imagenBranding.src = objectURL;
        });
    </script>
    <script>
        const $seleccionVasos = document.querySelector("#seleccionVasos"),
            $imagenVasos = document.querySelector("#imagenVasos");
        $seleccionVasos.addEventListener("change", () => {
            const archivos = $seleccionVasos.files;
            if (!archivos || !archivos.length) {
                $imagenVasos.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenVasos.src = objectURL;
        });
    </script>
    <script>
        const $seleccionProd_tapados = document.querySelector("#seleccionProd_tapados"),
            $imagenProd_tapados = document.querySelector("#imagenProd_tapados");
        $seleccionProd_tapados.addEventListener("change", () => {
            const archivos = $seleccionProd_tapados.files;
            if (!archivos || !archivos.length) {
                $imagenProd_tapados.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenProd_tapados.src = objectURL;
        });
    </script>
    <script>
        const $seleccionprod_danados = document.querySelector("#seleccionprod_danados"),
            $imagenprod_danados = document.querySelector("#imagenprod_danados");
        $seleccionprod_danados.addEventListener("change", () => {
            const archivos = $seleccionprod_danados.files;
            if (!archivos || !archivos.length) {
                $imagenprod_danados.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenprod_danados.src = objectURL;
        });
    </script>
    <script>
        const $seleccionprod_visibles = document.querySelector("#seleccionprod_visibles"),
            $imagenprod_visibles = document.querySelector("#imagenprod_visibles");
        $seleccionprod_visibles.addEventListener("change", () => {
            const archivos = $seleccionprod_visibles.files;
            if (!archivos || !archivos.length) {
                $imagenprod_visibles.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenprod_visibles.src = objectURL;
        });
    </script>
    <script>
        const $seleccionprod_rt_visibles = document.querySelector("#seleccionprod_rt_visibles"),
            $imagenprod_rt_visibles = document.querySelector("#imagenprod_rt_visibles");
        $seleccionprod_rt_visibles.addEventListener("change", () => {
            const archivos = $seleccionprod_rt_visibles.files;
            if (!archivos || !archivos.length) {
                $imagenprod_rt_visibles.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenprod_rt_visibles.src = objectURL;
        });
    </script>
    <script>
        const $seleccionprod_rt_properly = document.querySelector("#seleccionprod_rt_properly"),
            $imagenprod_rt_properly = document.querySelector("#imagenprod_rt_properly");
        $seleccionprod_rt_properly.addEventListener("change", () => {
            const archivos = $seleccionprod_rt_properly.files;
            if (!archivos || !archivos.length) {
                $imagenprod_rt_properly.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenprod_rt_properly.src = objectURL;
        });
    </script>
    <script>
        const $seleccionprod_hl_danadas = document.querySelector("#seleccionprod_hl_danadas"),
            $imagenprod_hl_danadas = document.querySelector("#imagenprod_hl_danadas");
        $seleccionprod_hl_danadas.addEventListener("change", () => {
            const archivos = $seleccionprod_hl_danadas.files;
            if (!archivos || !archivos.length) {
                $imagenprod_hl_danadas.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenprod_hl_danadas.src = objectURL;
        });
    </script>
    <script>
        const $seleccionprod_vs_quebrados = document.querySelector("#seleccionprod_vs_quebrados"),
            $imagenprod_vs_quebrados = document.querySelector("#imagenprod_vs_quebrados");
        $seleccionprod_vs_quebrados.addEventListener("change", () => {
            const archivos = $seleccionprod_vs_quebrados.files;
            if (!archivos || !archivos.length) {
                $imagenprod_vs_quebrados.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenprod_vs_quebrados.src = objectURL;
        });
    </script>
    <script>
        const $seleccionprod_ds_visibles = document.querySelector("#seleccionprod_ds_visibles"),
            $imagenprod_ds_visibles = document.querySelector("#imagenprod_ds_visibles");
        $seleccionprod_ds_visibles.addEventListener("change", () => {
            const archivos = $seleccionprod_ds_visibles.files;
            if (!archivos || !archivos.length) {
                $imagenprod_ds_visibles.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenprod_ds_visibles.src = objectURL;
        });
    </script>
    <script>
        const $seleccionprod_ds_diferentes = document.querySelector("#seleccionprod_ds_diferentes"),
            $imagenprod_ds_diferentes = document.querySelector("#imagenprod_ds_diferentes");
        $seleccionprod_ds_diferentes.addEventListener("change", () => {
            const archivos = $seleccionprod_ds_diferentes.files;
            if (!archivos || !archivos.length) {
                $imagenprod_ds_diferentes.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenprod_ds_diferentes.src = objectURL;
        });
    </script>
    <script>
        const $seleccionprod_ds_danados = document.querySelector("#seleccionprod_ds_danados"),
            $imagenprod_ds_danados = document.querySelector("#imagenprod_ds_danados");
        $seleccionprod_ds_danados.addEventListener("change", () => {
            const archivos = $seleccionprod_ds_danados.files;
            if (!archivos || !archivos.length) {
                $imagenprod_ds_danados.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenprod_ds_danados.src = objectURL;
        });
    </script>
    <script>
        const $seleccionhl_con_prod = document.querySelector("#seleccionhl_con_prod"),
            $imagenhl_con_prod = document.querySelector("#imagenhl_con_prod");
        $seleccionhl_con_prod.addEventListener("change", () => {
            const archivos = $seleccionhl_con_prod.files;
            if (!archivos || !archivos.length) {
                $imagenhl_con_prod.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenhl_con_prod.src = objectURL;
        });
    </script>
    <script>
        const $seleccioncp_con_prod = document.querySelector("#seleccioncp_con_prod"),
            $imagencp_con_prod = document.querySelector("#imagencp_con_prod");
        $seleccioncp_con_prod.addEventListener("change", () => {
            const archivos = $seleccioncp_con_prod.files;
            if (!archivos || !archivos.length) {
                $imagencp_con_prod.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagencp_con_prod.src = objectURL;
        });
    </script>

    <script>
        const $seleccionron_jhonny = document.querySelector("#seleccionron_jhonny"),
            $imagenron_jhonny = document.querySelector("#imagenron_jhonny");
        $seleccionron_jhonny.addEventListener("change", () => {
            const archivos = $seleccionron_jhonny.files;
            if (!archivos || !archivos.length) {
                $imagenron_jhonny.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenron_jhonny.src = objectURL;
        });
    </script>

    <script>
        const $seleccionron_byw = document.querySelector("#seleccionron_byw"),
            $imagenron_byw = document.querySelector("#imagenron_byw");
        $seleccionron_byw.addEventListener("change", () => {
            const archivos = $seleccionron_byw.files;
            if (!archivos || !archivos.length) {
                $imagenron_byw.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenron_byw.src = objectURL;
        });
    </script>


    <script>
        const $seleccionaguard_smirnoff = document.querySelector("#seleccionaguard_smirnoff"),
            $imagenaguard_smirnoff = document.querySelector("#imagenaguard_smirnoff");
        $seleccionaguard_smirnoff.addEventListener("change", () => {
            const archivos = $seleccionaguard_smirnoff.files;
            if (!archivos || !archivos.length) {
                $imagenaguard_smirnoff.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenaguard_smirnoff.src = objectURL;
        });
    </script>







    <script>
        const $selecciongift = document.querySelector("#selecciongift"),
            $imagengift = document.querySelector("#imagengift");
        $selecciongift.addEventListener("change", () => {
            const archivos = $selecciongift.files;
            if (!archivos || !archivos.length) {
                $imagengift.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagengift.src = objectURL;
        });
    </script>
    <script>
        const $seleccionLinealA = document.querySelector("#seleccionLinealA"),
            $imagenLinearlA = document.querySelector("#imagenLinearlA");
        $seleccionLinealA.addEventListener("change", () => {
            const archivos = $seleccionLinealA.files;
            if (!archivos || !archivos.length) {
                $imagenLinearlA.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenLinearlA.src = objectURL;
        });
    </script>

    <script>
        const $seleccionLinealR = document.querySelector("#seleccionLinealR"),
            $imagenLinearlR = document.querySelector("#imagenLinearlR");
        $seleccionLinealR.addEventListener("change", () => {
            const archivos = $seleccionLinealR.files;
            if (!archivos || !archivos.length) {
                $imagenLinearlR.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenLinearlR.src = objectURL;
        });
    </script>




    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "prod_tapados_si") {
                    $("#ingreso1").val(1);
                } else if (valor == "prod_tapados_no") {
                    $("#ingreso1").val(0);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "prod_danados_si") {
                    $("#ingreso2").val(1);
                } else if (valor == "prod_danados_no") {
                    $("#ingreso2").val(0);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "prod_visibles_si") {
                    $("#ingreso3").val(1);
                } else if (valor == "prod_visibles_no") {
                    $("#ingreso3").val(0);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "prod_rt_visibles_si") {
                    $("#ingreso4").val(1);
                } else if (valor == "prod_rt_visibles_no") {
                    $("#ingreso4").val(0);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "prod_rt_properly_si") {
                    $("#ingreso5").val(1);
                } else if (valor == "prod_rt_properly_no") {
                    $("#ingreso5").val(0);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "prod_hl_danadas_si") {
                    $("#ingreso6").val(1);
                } else if (valor == "prod_hl_danadas_no") {
                    $("#ingreso6").val(0);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "prod_vs_quebrados_si") {
                    $("#ingreso7").val(1);
                } else if (valor == "prod_vs_quebrados_no") {
                    $("#ingreso7").val(0);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "prod_ds_visibles_si") {
                    $("#ingreso8").val(1);
                } else if (valor == "prod_ds_visibles_no") {
                    $("#ingreso8").val(0);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "prod_ds_diferentes_si") {
                    $("#ingreso9").val(1);
                } else if (valor == "prod_ds_diferentes_no") {
                    $("#ingreso9").val(0);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "prod_ds_danados_si") {
                    $("#ingreso10").val(1);
                } else if (valor == "prod_ds_danados_no") {
                    $("#ingreso10").val(0);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "hl_con_prod_si") {
                    $("#ingreso11").val(1);
                } else if (valor == "hl_con_prod_no") {
                    $("#ingreso11").val(0);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "cp_con_prod_si") {
                    $("#ingreso12").val(1);
                } else if (valor == "cp_con_prod_no") {
                    $("#ingreso12").val(0);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "cp_con_prod_si") {
                    $("#ingreso12").val(1);
                } else if (valor == "cp_con_prod_no") {
                    $("#ingreso12").val(0);
                }
            });
        });
    </script>
    <script>
        //Función que realiza la suma
        function Suma() {
            var ingreso1 = document.calculadora.ingreso1.value;
            var ingreso2 = document.calculadora.ingreso2.value;
            var ingreso3 = document.calculadora.ingreso3.value;
            var ingreso4 = document.calculadora.ingreso4.value;
            var ingreso5 = document.calculadora.ingreso5.value;
            var ingreso6 = document.calculadora.ingreso6.value;
            var ingreso7 = document.calculadora.ingreso7.value;
            var ingreso8 = document.calculadora.ingreso8.value;
            var ingreso9 = document.calculadora.ingreso9.value;
            var ingreso10 = document.calculadora.ingreso10.value;
            var ingreso11 = document.calculadora.ingreso11.value;
            var ingreso12 = document.calculadora.ingreso12.value;
            try {
                ingreso1 = (isNaN(parseInt(ingreso1))) ? 0 : parseInt(ingreso1);
                ingreso2 = (isNaN(parseInt(ingreso2))) ? 0 : parseInt(ingreso2);
                ingreso3 = (isNaN(parseInt(ingreso3))) ? 0 : parseInt(ingreso3);
                ingreso4 = (isNaN(parseInt(ingreso4))) ? 0 : parseInt(ingreso4);
                ingreso5 = (isNaN(parseInt(ingreso5))) ? 0 : parseInt(ingreso5);
                ingreso6 = (isNaN(parseInt(ingreso6))) ? 0 : parseInt(ingreso6);
                ingreso7 = (isNaN(parseInt(ingreso7))) ? 0 : parseInt(ingreso7);
                ingreso8 = (isNaN(parseInt(ingreso8))) ? 0 : parseInt(ingreso8);
                ingreso9 = (isNaN(parseInt(ingreso9))) ? 0 : parseInt(ingreso9);
                ingreso10 = (isNaN(parseInt(ingreso10))) ? 0 : parseInt(ingreso10);
                ingreso11 = (isNaN(parseInt(ingreso11))) ? 0 : parseInt(ingreso11);
                ingreso12 = (isNaN(parseInt(ingreso12))) ? 0 : parseInt(ingreso12);

                document.calculadora.resultado.value = parseFloat(ingreso1) + parseInt(ingreso2) + parseInt(ingreso3) +
                    parseInt(ingreso4) + parseInt(ingreso5) + parseInt(ingreso6) + parseInt(ingreso7) + parseInt(ingreso8) +
                    parseInt(ingreso9) + parseInt(ingreso10) + parseInt(ingreso11) + parseInt(ingreso12);
                //document.calculadora.resultado.value = ingreso1+ingreso2+ingreso3+ingreso4+ingreso5+ingreso6+ingreso7+ingreso8+ingreso9+ingreso10+ingreso11+ingreso12;
            }
            //Si se produce un error no hacemos nada
            catch (e) {}
        }
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
