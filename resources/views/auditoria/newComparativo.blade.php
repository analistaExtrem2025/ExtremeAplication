@extends('adminlte::page')
@section('title', 'Comparativo de marcas')

@section('css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/css-toggle-switch/latest/toggle-switch.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Arapey:400,400i,600|Open+Sans:300" rel="stylesheet">
    <link href="{{ asset('css/auditoria.css') }}" rel="stylesheet">
    <style>
        .noClass {

            width: 0px;
            background: transparent;
            color: transparent;
            border: transparent;

        }
        .card-box-marcas {
            background: #d1ddd3 !important;
            border-radius: 0.75rem;
            height: 300px;
            width: 100%;
            margin: auto;
            margin-bottom: 1rem;
            -webkit-border-radius: 0.75rem;
            -moz-border-radius: 0.75rem;
            -ms-border-radius: 0.75rem;
            -o-border-radius: 0.75rem;
            padding-top: 1rem;
            box-shadow: 22px 20px 42px 4px rgba(96, 92, 115, 0.69);
            -webkit-box-shadow: 22px 20px 42px 4px rgba(96, 92, 115, 0.69);
            -moz-box-shadow: 22px 20px 42px 4px rgba(96, 92, 115, 0.69);
        }

        .img_botellasx3 {
        position: relative;
            display: block;

            width: 160px;


        }

    </style>
@stop
@section('content')

    {!! Form::model($puntos_auditoria, [
        'route' => ['comparativo.update', $puntos_auditoria->id],
        'method' => 'put',
        'enctype' => 'multipart/form-data',
        'files' => 'true',
    ]) !!}
    <h5><span class="numeros">5</span>COMPARATIVO DE MARCAS</h5>
    <input type="hidden" name="precarga_id" value="{{ $puntos_auditoria->precarga_id }}">
    <p>
    <ul>
        <div class="row">
            <div>
                <img class="img_botellasx3 swing" src="{{ asset('/storage/ronx3.png') }}" style="text-align: center" />
            </div>
            <div class="col-12 card-box-double" id="card_double">
                <div class="card-comp">
                    <legend>&iquest; Hay <b>Rones</b> de la competencia?</legend>
                    <fieldset>
                        <label>
                            <input type="radio" onchange="javascript:showContent7()" id="RonesCompSi" name="hay_ron"
                                value="hay_ron_Si">
                            <span>Si</span>
                        </label>
                        <input type="text" class="noClass" id="InputRonesComp" required>
                        <label>
                            <input type="radio" onchange="javascript:showContent7()" id="RonesCompNo" name="hay_ron"
                                value="hay_ron_No" />
                            <span>No</span>
                        </label>
                    </fieldset>
                </div>
                <div id="DivSComRones" style="display: none">
                    {{ Form::label('comp_ron1', 'Primera marca más vendida') }}
                    <select name="comp_ron1" id="comp_ron1" class="form-control" required disabled>
                        <option selected value="">--</option>
                        @foreach ($competenciaRon as $Ron)
                            <option value="{{ $Ron }}">{{ $Ron }} </option>
                        @endforeach
                    </select>
                    {{ Form::label('precio_comp_ron1', 'Precio $$ 750 ml') }}
                    <input type="text" name="precio_comp_ron1" id="precio_comp_ron1" class="form-control"
                        style="border-radius: 0.3rem;" maxlength="6" minlength="1" autocomplete="off" required>
                    <hr>
                    <br><br>
                    <span id="texto14"></span>
                    <br><br>
                    <hr>
                    @include('errors.errors', ['field' => 'precio_comp_ron1'])
                    {{ Form::label('comp_ron2', 'Segunda marca más vendida') }}

                    <select name="comp_ron2" id="comp_ron2" class="form-control" required disabled>
                        <option selected value="">--</option>
                        @foreach ($competenciaRon as $Ron)
                            <option value="{{ $Ron }}">{{ $Ron }} </option>
                        @endforeach
                    </select>
                    {{ Form::label('precio_comp_ron2', 'Precio $$ 750 ml') }}
                    <input type="text" name="precio_comp_ron2" id="precio_comp_ron2" class="form-control"
                        style="border-radius: 0.3rem;" maxlength="6" minlength="1" autocomplete="off" required>
                    <hr>
                    <br><br>
                    <span id="texto15"></span>
                    <br><br>
                    <hr>
                    @include('errors.errors', ['field' => 'precio_comp_ron2'])
                    {{ Form::label('caras_comp_ron', 'Cantidad de caras en el lineal de rones') }}
                    <input type="number" class="form-control" placeholder="" name="caras_comp_ron" id="caras_comp_ron"
                        aria-label="caras_comp_ron" required>
                    @include('errors.errors', ['field' => 'caras_comp_ron'])
                    <br>
                    <div class="ttulo">
                        <green><span>Foto del lineal de ron</span></green>
                    </div>
                    <br>
                    <div class="d-flex justify-content-left">

                        <br>
                        <input type="file" id="seleccionLinealR" name="seleccionLinealR" accept="image/*" required
                            disabled>
                        <br><br>
                        <img class="card-img-top" id="imagenLinearlR">
                    </div>
                </div>
            </div>
        </div>
    </ul>
    <hr>
    <ul>
        <div class="row">
            <div>
            <img class="img_botellasx3 swing" src="{{ asset('/storage/aguardientes.png') }}"
                style="text-align: center" />
            </div>
            <div class="col-12 card-box-double" id="card_double2">
                <div class="card-comp">
                    <legend>&iquest; Hay <b>Aguardientes</b> de la competencia?</legend>
                    <fieldset>
                        <label>
                            <input type="radio" onchange="javascript:showContent8()" id="AguarCompSi"
                                name="hay_aguardiente" value="hay_aguardiente_Si">
                            <span>Si</span>
                        </label>
                        <input type="text" class="noClass" id="InputAguarComp" required>
                        <label>
                            <input type="radio" onchange="javascript:showContent8()" id="AguarCompNo"
                                name="hay_aguardiente" value="hay_aguardiente_No">
                            <span>No</span>
                        </label>
                    </fieldset>
                </div>
                <div id="DivSComAguard" style="display: none">
                    {{ Form::label('comp_aguard1', 'Primera marca más vendida') }}
                    <select name="comp_aguard1" id="comp_aguard1" class="form-control" required disabled>
                        <option selected value="">--</option>
                        @foreach ($competenciaAguardiente as $Agua)
                            <option value="{{ $Agua }}">{{ $Agua }} </option>
                        @endforeach
                    </select>
                    {{ Form::label('precio_comp_aguardiente1', 'Precio $$ 750 ml') }}
                    <input type="text" name="precio_comp_aguardiente1" id="precio_comp_aguardiente1"
                        class="form-control" style="border-radius: 0.3rem;" maxlength="6" minlength="1"
                        autocomplete="off" required>
                    <hr>
                    <br><br>
                    <span id="texto16"></span>
                    <br><br>
                    <hr>
                    @include('errors.errors', ['field' => 'costo_unitario'])
                    {{ Form::label('comp_aguard2', 'Segunda marca más vendida') }}

                    <select name="comp_aguard2" id="comp_aguard2" class="form-control" required disabled>
                        <option selected value="">--</option>
                        @foreach ($competenciaAguardiente as $Agua)
                            <option value="{{ $Agua }}">{{ $Agua }} </option>
                        @endforeach
                    </select>
                    {{ Form::label('precio_comp_aguardiente2', 'Precio $$ 750 ml') }}
                    <input type="text" name="precio_comp_aguardiente2" id="precio_comp_aguardiente2"
                        class="form-control" style="border-radius: 0.3rem;" maxlength="6" minlength="1"
                        autocomplete="off" required>
                    <hr>
                    <br><br>
                    <span id="texto17"></span>
                    <br><br>
                    <hr>
                    @include('errors.errors', ['field' => 'precio_comp_aguardiente2'])
                    {{ Form::label('caras_comp_aguardiente', 'Caras en el lineal de aguardientes') }}
                    <input type="number" class="form-control" placeholder="" name="caras_comp_aguardiente"
                        id="caras_comp_aguardiente" aria-label="caras_comp_aguardiente" required>
                    @include('errors.errors', ['field' => 'caras_comp_aguardiente'])
                    <br>
                    <div class="ttulo">
                        <green><span>Foto del lineal de aguardiente</span></green>
                    </div>
                    <br>
                    <div class="d-flex justify-content-left">

                        <br>
                        <input type="file" id="seleccionLinealA" name="seleccionLinealA" accept="image/*" required
                            disabled>
                        <br><br>
                        <img class="card-img-top" id="imagenLinearlA">
                    </div>
                </div>
            </div>
        </div>
    </ul>

    {!! Form::submit('Siguiente', ['class' => 'btn btn-primary', 'id' => 'boton', 'style' => 'z-index:99999', 'onclick' => 'OcultarButton(this)']) !!}
    {!! Form::close() !!}
    </p>

@stop

@section('js')

    <script>
        function showContent7() {
            element7 = document.getElementById("DivSComRones");
            card_double = document.getElementById("card_double");
            check7 = document.getElementById("RonesCompSi");
            check7no = document.getElementById("RonesCompNo");
            if (check7.checked) {
                element7.style.display = 'block';
                card_double.style.height = "1300px";
                card_double.style.width = "450px";
                $("#comp_ron1").prop('disabled', false);
                $("#comp_ron2").prop('disabled', false);
                $("#precio_comp_ron1").prop('disabled', false);
                $("#precio_comp_ron2").prop('disabled', false);
                $("#caras_comp_ron").prop('disabled', false);
                $("#seleccionLinealR").prop('disabled', false);
                $("#InputRonesComp").val("1");



            } else if (check7no.checked) {
                element7.style.display = 'none';
                card_double.style.height = "200px";
                $("#comp_ron1").prop('disabled', true);
                $("#comp_ron2").prop('disabled', true);
                $("#precio_comp_ron1").prop('disabled', true);
                $("#precio_comp_ron2").prop('disabled', true);
                $("#caras_comp_ron").prop('disabled', true);
                $("#seleccionLinealR").prop('disabled', true);
                $("#InputRonesComp").val("0");
                $("#comp_ron1").val("no hay");
                $("#comp_ron2").val("no hay");


            }
        }
    </script>

    <script>
        function showContent8() {
            element8 = document.getElementById("DivSComAguard");
            card_double = document.getElementById("card_double2");
            check8 = document.getElementById("AguarCompSi");
            check8no = document.getElementById("AguarCompNo");
            if (check8.checked) {
                element8.style.display = 'block';
                card_double.style.height = "1300px";
                card_double.style.width = "450px";
                $("#comp_aguard1").prop('disabled', false);
                $("#comp_aguard2").prop('disabled', false);
                $("#precio_comp_aguardiente1").prop('disabled', false);
                $("#precio_comp_aguardiente2").prop('disabled', false);
                $("#caras_comp_aguardiente").prop('disabled', false);
                $("#seleccionLinealA").prop('disabled', false);
                $("#InputAguarComp").val("1");


            } else if (check8no.checked) {
                element8.style.display = 'none';
                card_double.style.height = "200px";
                $("#comp_aguard1").prop('disabled', true);
                $("#comp_aguard2").prop('disabled', true);
                $("#precio_comp_aguardiente1").prop('disabled', true);
                $("#precio_comp_aguardiente2").prop('disabled', true);
                $("#caras_comp_aguardiente").prop('disabled', true);
                $("#seleccionLinealA").prop('disabled', true);
                $("#InputAguarComp").val("0");
                $("#comp_aguard1").val("no hay");
                $("#comp_aguard2").val("no hay");
            }
        }
    </script>
    <script>
        document.getElementById("precio_comp_ron1").addEventListener("keyup", function(e) {
            document.getElementById("texto14").innerHTML = NumeroALetras(this.value);
        });


        function Unidades(num) {

            switch (num) {
                case 1:
                    return "UN";
                case 2:
                    return "DOS";
                case 3:
                    return "TRES";
                case 4:
                    return "CUATRO";
                case 5:
                    return "CINCO";
                case 6:
                    return "SEIS";
                case 7:
                    return "SIETE";
                case 8:
                    return "OCHO";
                case 9:
                    return "NUEVE";
            }

            return "";
        }

        function Decenas(num) {

            decena = Math.floor(num / 10);
            unidad = num - (decena * 10);

            switch (decena) {
                case 1:
                    switch (unidad) {
                        case 0:
                            return "DIEZ";
                        case 1:
                            return "ONCE";
                        case 2:
                            return "DOCE";
                        case 3:
                            return "TRECE";
                        case 4:
                            return "CATORCE";
                        case 5:
                            return "QUINCE";
                        default:
                            return "DIECI" + Unidades(unidad);
                    }
                case 2:
                    switch (unidad) {
                        case 0:
                            return "VEINTE";
                        default:
                            return "VEINTI" + Unidades(unidad);
                    }
                case 3:
                    return DecenasY("TREINTA", unidad);
                case 4:
                    return DecenasY("CUARENTA", unidad);
                case 5:
                    return DecenasY("CINCUENTA", unidad);
                case 6:
                    return DecenasY("SESENTA", unidad);
                case 7:
                    return DecenasY("SETENTA", unidad);
                case 8:
                    return DecenasY("OCHENTA", unidad);
                case 9:
                    return DecenasY("NOVENTA", unidad);
                case 0:
                    return Unidades(unidad);
            }
        } //Unidades()

        function DecenasY(strSin, numUnidades) {
            if (numUnidades > 0)
                return strSin + " Y " + Unidades(numUnidades)

            return strSin;
        } //DecenasY()

        function Centenas(num) {

            centenas = Math.floor(num / 100);
            decenas = num - (centenas * 100);

            switch (centenas) {
                case 1:
                    if (decenas > 0)
                        return "CIENTO " + Decenas(decenas);
                    return "CIEN";
                case 2:
                    return "DOSCIENTOS " + Decenas(decenas);
                case 3:
                    return "TRESCIENTOS " + Decenas(decenas);
                case 4:
                    return "CUATROCIENTOS " + Decenas(decenas);
                case 5:
                    return "QUINIENTOS " + Decenas(decenas);
                case 6:
                    return "SEISCIENTOS " + Decenas(decenas);
                case 7:
                    return "SETECIENTOS " + Decenas(decenas);
                case 8:
                    return "OCHOCIENTOS " + Decenas(decenas);
                case 9:
                    return "NOVECIENTOS " + Decenas(decenas);
            }

            return Decenas(decenas);
        } //Centenas()

        function Seccion(num, divisor, strSingular, strPlural) {
            cientos = Math.floor(num / divisor)
            resto = num - (cientos * divisor)

            letras = "";

            if (cientos > 0)
                if (cientos > 1)
                    letras = Centenas(cientos) + " " + strPlural;
                else
                    letras = strSingular;

            if (resto > 0)
                letras += "";

            return letras;
        } //Seccion()

        function Miles(num) {
            divisor = 1000;
            cientos = Math.floor(num / divisor)
            resto = num - (cientos * divisor)

            strMiles = Seccion(num, divisor, "MIL", "MIL");
            strCentenas = Centenas(resto);

            if (strMiles == "")
                return strCentenas;

            return strMiles + " " + strCentenas;

            //return Seccion(num, divisor, "UN MIL", "MIL") + " " + Centenas(resto);
        } //Miles()

        function Millones(num) {
            divisor = 1000000;
            cientos = Math.floor(num / divisor)
            resto = num - (cientos * divisor)

            strMillones = Seccion(num, divisor, "UN MILLON", "MILLONES");
            strMiles = Miles(resto);

            if (strMillones == "")
                return strMiles;

            return strMillones + " " + strMiles;

            //return Seccion(num, divisor, "UN MILLON", "MILLONES") + " " + Miles(resto);
        } //Millones()

        function NumeroALetras(num, centavos) {
            var data = {
                numero: num,
                enteros: Math.floor(num),
                centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
                letrasCentavos: "",
            };
            if (centavos == undefined || centavos == false) {
                data.letrasMonedaPlural = "PESOS";
                data.letrasMonedaSingular = "PESO";
            } else {
                data.letrasMonedaPlural = "CENTAVOS";
                data.letrasMonedaSingular = "CENTAVO";
            }

            if (data.centavos > 0)
                data.letrasCentavos = "CON " + NumeroALetras(data.centavos, true);

            if (data.enteros == 0)
                return "CERO " + data.letrasMonedaPlural + " " + data.letrasCentavos;
            if (data.enteros == 1)
                return Millones(data.enteros) + " " + data.letrasMonedaSingular + " " + data.letrasCentavos;
            else
                return Millones(data.enteros) + " " + data.letrasMonedaPlural + " " + data.letrasCentavos;
        } //NumeroALetras()
    </script>
    <script>
        document.getElementById("precio_comp_ron2").addEventListener("keyup", function(e) {
            document.getElementById("texto15").innerHTML = NumeroALetras(this.value);
        });


        function Unidades(num) {

            switch (num) {
                case 1:
                    return "UN";
                case 2:
                    return "DOS";
                case 3:
                    return "TRES";
                case 4:
                    return "CUATRO";
                case 5:
                    return "CINCO";
                case 6:
                    return "SEIS";
                case 7:
                    return "SIETE";
                case 8:
                    return "OCHO";
                case 9:
                    return "NUEVE";
            }

            return "";
        }

        function Decenas(num) {

            decena = Math.floor(num / 10);
            unidad = num - (decena * 10);

            switch (decena) {
                case 1:
                    switch (unidad) {
                        case 0:
                            return "DIEZ";
                        case 1:
                            return "ONCE";
                        case 2:
                            return "DOCE";
                        case 3:
                            return "TRECE";
                        case 4:
                            return "CATORCE";
                        case 5:
                            return "QUINCE";
                        default:
                            return "DIECI" + Unidades(unidad);
                    }
                case 2:
                    switch (unidad) {
                        case 0:
                            return "VEINTE";
                        default:
                            return "VEINTI" + Unidades(unidad);
                    }
                case 3:
                    return DecenasY("TREINTA", unidad);
                case 4:
                    return DecenasY("CUARENTA", unidad);
                case 5:
                    return DecenasY("CINCUENTA", unidad);
                case 6:
                    return DecenasY("SESENTA", unidad);
                case 7:
                    return DecenasY("SETENTA", unidad);
                case 8:
                    return DecenasY("OCHENTA", unidad);
                case 9:
                    return DecenasY("NOVENTA", unidad);
                case 0:
                    return Unidades(unidad);
            }
        } //Unidades()

        function DecenasY(strSin, numUnidades) {
            if (numUnidades > 0)
                return strSin + " Y " + Unidades(numUnidades)

            return strSin;
        } //DecenasY()

        function Centenas(num) {

            centenas = Math.floor(num / 100);
            decenas = num - (centenas * 100);

            switch (centenas) {
                case 1:
                    if (decenas > 0)
                        return "CIENTO " + Decenas(decenas);
                    return "CIEN";
                case 2:
                    return "DOSCIENTOS " + Decenas(decenas);
                case 3:
                    return "TRESCIENTOS " + Decenas(decenas);
                case 4:
                    return "CUATROCIENTOS " + Decenas(decenas);
                case 5:
                    return "QUINIENTOS " + Decenas(decenas);
                case 6:
                    return "SEISCIENTOS " + Decenas(decenas);
                case 7:
                    return "SETECIENTOS " + Decenas(decenas);
                case 8:
                    return "OCHOCIENTOS " + Decenas(decenas);
                case 9:
                    return "NOVECIENTOS " + Decenas(decenas);
            }

            return Decenas(decenas);
        } //Centenas()

        function Seccion(num, divisor, strSingular, strPlural) {
            cientos = Math.floor(num / divisor)
            resto = num - (cientos * divisor)

            letras = "";

            if (cientos > 0)
                if (cientos > 1)
                    letras = Centenas(cientos) + " " + strPlural;
                else
                    letras = strSingular;

            if (resto > 0)
                letras += "";

            return letras;
        } //Seccion()

        function Miles(num) {
            divisor = 1000;
            cientos = Math.floor(num / divisor)
            resto = num - (cientos * divisor)

            strMiles = Seccion(num, divisor, "MIL", "MIL");
            strCentenas = Centenas(resto);

            if (strMiles == "")
                return strCentenas;

            return strMiles + " " + strCentenas;

            //return Seccion(num, divisor, "UN MIL", "MIL") + " " + Centenas(resto);
        } //Miles()

        function Millones(num) {
            divisor = 1000000;
            cientos = Math.floor(num / divisor)
            resto = num - (cientos * divisor)

            strMillones = Seccion(num, divisor, "UN MILLON", "MILLONES");
            strMiles = Miles(resto);

            if (strMillones == "")
                return strMiles;

            return strMillones + " " + strMiles;

            //return Seccion(num, divisor, "UN MILLON", "MILLONES") + " " + Miles(resto);
        } //Millones()

        function NumeroALetras(num, centavos) {
            var data = {
                numero: num,
                enteros: Math.floor(num),
                centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
                letrasCentavos: "",
            };
            if (centavos == undefined || centavos == false) {
                data.letrasMonedaPlural = "PESOS";
                data.letrasMonedaSingular = "PESO";
            } else {
                data.letrasMonedaPlural = "CENTAVOS";
                data.letrasMonedaSingular = "CENTAVO";
            }

            if (data.centavos > 0)
                data.letrasCentavos = "CON " + NumeroALetras(data.centavos, true);

            if (data.enteros == 0)
                return "CERO " + data.letrasMonedaPlural + " " + data.letrasCentavos;
            if (data.enteros == 1)
                return Millones(data.enteros) + " " + data.letrasMonedaSingular + " " + data.letrasCentavos;
            else
                return Millones(data.enteros) + " " + data.letrasMonedaPlural + " " + data.letrasCentavos;
        } //NumeroALetras()
    </script>
    <script>
        document.getElementById("precio_comp_aguardiente1").addEventListener("keyup", function(e) {
            document.getElementById("texto16").innerHTML = NumeroALetras(this.value);
        });


        function Unidades(num) {

            switch (num) {
                case 1:
                    return "UN";
                case 2:
                    return "DOS";
                case 3:
                    return "TRES";
                case 4:
                    return "CUATRO";
                case 5:
                    return "CINCO";
                case 6:
                    return "SEIS";
                case 7:
                    return "SIETE";
                case 8:
                    return "OCHO";
                case 9:
                    return "NUEVE";
            }

            return "";
        }

        function Decenas(num) {

            decena = Math.floor(num / 10);
            unidad = num - (decena * 10);

            switch (decena) {
                case 1:
                    switch (unidad) {
                        case 0:
                            return "DIEZ";
                        case 1:
                            return "ONCE";
                        case 2:
                            return "DOCE";
                        case 3:
                            return "TRECE";
                        case 4:
                            return "CATORCE";
                        case 5:
                            return "QUINCE";
                        default:
                            return "DIECI" + Unidades(unidad);
                    }
                case 2:
                    switch (unidad) {
                        case 0:
                            return "VEINTE";
                        default:
                            return "VEINTI" + Unidades(unidad);
                    }
                case 3:
                    return DecenasY("TREINTA", unidad);
                case 4:
                    return DecenasY("CUARENTA", unidad);
                case 5:
                    return DecenasY("CINCUENTA", unidad);
                case 6:
                    return DecenasY("SESENTA", unidad);
                case 7:
                    return DecenasY("SETENTA", unidad);
                case 8:
                    return DecenasY("OCHENTA", unidad);
                case 9:
                    return DecenasY("NOVENTA", unidad);
                case 0:
                    return Unidades(unidad);
            }
        } //Unidades()

        function DecenasY(strSin, numUnidades) {
            if (numUnidades > 0)
                return strSin + " Y " + Unidades(numUnidades)

            return strSin;
        } //DecenasY()

        function Centenas(num) {

            centenas = Math.floor(num / 100);
            decenas = num - (centenas * 100);

            switch (centenas) {
                case 1:
                    if (decenas > 0)
                        return "CIENTO " + Decenas(decenas);
                    return "CIEN";
                case 2:
                    return "DOSCIENTOS " + Decenas(decenas);
                case 3:
                    return "TRESCIENTOS " + Decenas(decenas);
                case 4:
                    return "CUATROCIENTOS " + Decenas(decenas);
                case 5:
                    return "QUINIENTOS " + Decenas(decenas);
                case 6:
                    return "SEISCIENTOS " + Decenas(decenas);
                case 7:
                    return "SETECIENTOS " + Decenas(decenas);
                case 8:
                    return "OCHOCIENTOS " + Decenas(decenas);
                case 9:
                    return "NOVECIENTOS " + Decenas(decenas);
            }

            return Decenas(decenas);
        } //Centenas()

        function Seccion(num, divisor, strSingular, strPlural) {
            cientos = Math.floor(num / divisor)
            resto = num - (cientos * divisor)

            letras = "";

            if (cientos > 0)
                if (cientos > 1)
                    letras = Centenas(cientos) + " " + strPlural;
                else
                    letras = strSingular;

            if (resto > 0)
                letras += "";

            return letras;
        } //Seccion()

        function Miles(num) {
            divisor = 1000;
            cientos = Math.floor(num / divisor)
            resto = num - (cientos * divisor)

            strMiles = Seccion(num, divisor, "MIL", "MIL");
            strCentenas = Centenas(resto);

            if (strMiles == "")
                return strCentenas;

            return strMiles + " " + strCentenas;

            //return Seccion(num, divisor, "UN MIL", "MIL") + " " + Centenas(resto);
        } //Miles()

        function Millones(num) {
            divisor = 1000000;
            cientos = Math.floor(num / divisor)
            resto = num - (cientos * divisor)

            strMillones = Seccion(num, divisor, "UN MILLON", "MILLONES");
            strMiles = Miles(resto);

            if (strMillones == "")
                return strMiles;

            return strMillones + " " + strMiles;

            //return Seccion(num, divisor, "UN MILLON", "MILLONES") + " " + Miles(resto);
        } //Millones()

        function NumeroALetras(num, centavos) {
            var data = {
                numero: num,
                enteros: Math.floor(num),
                centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
                letrasCentavos: "",
            };
            if (centavos == undefined || centavos == false) {
                data.letrasMonedaPlural = "PESOS";
                data.letrasMonedaSingular = "PESO";
            } else {
                data.letrasMonedaPlural = "CENTAVOS";
                data.letrasMonedaSingular = "CENTAVO";
            }

            if (data.centavos > 0)
                data.letrasCentavos = "CON " + NumeroALetras(data.centavos, true);

            if (data.enteros == 0)
                return "CERO " + data.letrasMonedaPlural + " " + data.letrasCentavos;
            if (data.enteros == 1)
                return Millones(data.enteros) + " " + data.letrasMonedaSingular + " " + data.letrasCentavos;
            else
                return Millones(data.enteros) + " " + data.letrasMonedaPlural + " " + data.letrasCentavos;
        } //NumeroALetras()
    </script>
    <script>
        document.getElementById("precio_comp_aguardiente2").addEventListener("keyup", function(e) {
            document.getElementById("texto17").innerHTML = NumeroALetras(this.value);
        });


        function Unidades(num) {

            switch (num) {
                case 1:
                    return "UN";
                case 2:
                    return "DOS";
                case 3:
                    return "TRES";
                case 4:
                    return "CUATRO";
                case 5:
                    return "CINCO";
                case 6:
                    return "SEIS";
                case 7:
                    return "SIETE";
                case 8:
                    return "OCHO";
                case 9:
                    return "NUEVE";
            }

            return "";
        }

        function Decenas(num) {

            decena = Math.floor(num / 10);
            unidad = num - (decena * 10);

            switch (decena) {
                case 1:
                    switch (unidad) {
                        case 0:
                            return "DIEZ";
                        case 1:
                            return "ONCE";
                        case 2:
                            return "DOCE";
                        case 3:
                            return "TRECE";
                        case 4:
                            return "CATORCE";
                        case 5:
                            return "QUINCE";
                        default:
                            return "DIECI" + Unidades(unidad);
                    }
                case 2:
                    switch (unidad) {
                        case 0:
                            return "VEINTE";
                        default:
                            return "VEINTI" + Unidades(unidad);
                    }
                case 3:
                    return DecenasY("TREINTA", unidad);
                case 4:
                    return DecenasY("CUARENTA", unidad);
                case 5:
                    return DecenasY("CINCUENTA", unidad);
                case 6:
                    return DecenasY("SESENTA", unidad);
                case 7:
                    return DecenasY("SETENTA", unidad);
                case 8:
                    return DecenasY("OCHENTA", unidad);
                case 9:
                    return DecenasY("NOVENTA", unidad);
                case 0:
                    return Unidades(unidad);
            }
        } //Unidades()

        function DecenasY(strSin, numUnidades) {
            if (numUnidades > 0)
                return strSin + " Y " + Unidades(numUnidades)

            return strSin;
        } //DecenasY()

        function Centenas(num) {

            centenas = Math.floor(num / 100);
            decenas = num - (centenas * 100);

            switch (centenas) {
                case 1:
                    if (decenas > 0)
                        return "CIENTO " + Decenas(decenas);
                    return "CIEN";
                case 2:
                    return "DOSCIENTOS " + Decenas(decenas);
                case 3:
                    return "TRESCIENTOS " + Decenas(decenas);
                case 4:
                    return "CUATROCIENTOS " + Decenas(decenas);
                case 5:
                    return "QUINIENTOS " + Decenas(decenas);
                case 6:
                    return "SEISCIENTOS " + Decenas(decenas);
                case 7:
                    return "SETECIENTOS " + Decenas(decenas);
                case 8:
                    return "OCHOCIENTOS " + Decenas(decenas);
                case 9:
                    return "NOVECIENTOS " + Decenas(decenas);
            }

            return Decenas(decenas);
        } //Centenas()

        function Seccion(num, divisor, strSingular, strPlural) {
            cientos = Math.floor(num / divisor)
            resto = num - (cientos * divisor)

            letras = "";

            if (cientos > 0)
                if (cientos > 1)
                    letras = Centenas(cientos) + " " + strPlural;
                else
                    letras = strSingular;

            if (resto > 0)
                letras += "";

            return letras;
        } //Seccion()

        function Miles(num) {
            divisor = 1000;
            cientos = Math.floor(num / divisor)
            resto = num - (cientos * divisor)

            strMiles = Seccion(num, divisor, "MIL", "MIL");
            strCentenas = Centenas(resto);

            if (strMiles == "")
                return strCentenas;

            return strMiles + " " + strCentenas;

            //return Seccion(num, divisor, "UN MIL", "MIL") + " " + Centenas(resto);
        } //Miles()

        function Millones(num) {
            divisor = 1000000;
            cientos = Math.floor(num / divisor)
            resto = num - (cientos * divisor)

            strMillones = Seccion(num, divisor, "UN MILLON", "MILLONES");
            strMiles = Miles(resto);

            if (strMillones == "")
                return strMiles;

            return strMillones + " " + strMiles;

            //return Seccion(num, divisor, "UN MILLON", "MILLONES") + " " + Miles(resto);
        } //Millones()

        function NumeroALetras(num, centavos) {
            var data = {
                numero: num,
                enteros: Math.floor(num),
                centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
                letrasCentavos: "",
            };
            if (centavos == undefined || centavos == false) {
                data.letrasMonedaPlural = "PESOS";
                data.letrasMonedaSingular = "PESO";
            } else {
                data.letrasMonedaPlural = "CENTAVOS";
                data.letrasMonedaSingular = "CENTAVO";
            }

            if (data.centavos > 0)
                data.letrasCentavos = "CON " + NumeroALetras(data.centavos, true);

            if (data.enteros == 0)
                return "CERO " + data.letrasMonedaPlural + " " + data.letrasCentavos;
            if (data.enteros == 1)
                return Millones(data.enteros) + " " + data.letrasMonedaSingular + " " + data.letrasCentavos;
            else
                return Millones(data.enteros) + " " + data.letrasMonedaPlural + " " + data.letrasCentavos;
        } //NumeroALetras()
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
        function OcultarButton(btn)
        {
            $(btn).fadeOut();
        }
      </script>
@stop
