@extends('adminlte::page')
@section('title', 'Exhibicion de materiales')

@section('css')

    <link href="https://cdn.jsdelivr.net/css-toggle-switch/latest/toggle-switch.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Arapey:400,400i,600|Open+Sans:300" rel="stylesheet">
    <link href="{{ asset('css/auditoria.css') }}" rel="stylesheet">
@stop
@section('content')
    <h5><span class="numeros">5 </span>VISIBILIDAD DE PRODUCTO</h5>
    {!! Form::model($puntos_auditoria, [
        'route' => ['exhibicion.update', $puntos_auditoria->id],
        'method' => 'put',
        'enctype' => 'multipart/form-data',
        'files' => 'true',
    ]) !!}
    <input type="hidden" name="precarga_id" value="{{ $puntos_auditoria->precarga_id }}">
    <p>
    <div class="col-12 material">
        <div class="card">
            <div class="ttulo">
                <green><span>Confirme si Black & White exhibido junto rones</span></green>
            </div>
            <div class="col card-box-exhi">
                <div class="col">
                    <img class="img_afiche" src="{{ asset('/storage/ron_b&w.png') }}" />
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="ron_byw_si" name="ron_byw" type="radio" value="ron_byw_si" onchange="showContent1()" />
                        <label for="ron_byw_si">SI</label>
                        <input id="ron_byw_choose" name="ron_byw" type="radio" value="ron_byw_choose" checked="checked"
                            disabled />
                        <label for="ron_byw_choose">Ron junto a B&W</label>
                        <input id="ron_byw_no" name="ron_byw" type="radio" value="ron_byw_no" onchange="showContent1()" />
                        <label for="ron_byw_no">NO</label>
                        <a></a>
                    </div>
                </div>
                <div id="card1" style="display: none">
                    <div class="box_cont">
                        <input type="text" class="noClass" id="mtronblack" style="text-align: center"
                            placeholder="indique si hay ron junto a black & white" value="" required>
                    </div>
                    <div class="row" style="text-align: center">
                        <div class="col">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Indique si B&W esta
                                        ubicada en bloque en la estanteria</span>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label" for="bloquebyw">
                                        Si
                                    </label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" id="bloquebyw" name="bloquebyw"
                                        value="bloquebyw_si">
                                    <br>
                                    <br>
                                    <label class="form-check-label" for="bloquebyw">
                                        No
                                    </label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" id="bloquebyw" name="bloquebyw"
                                        value="bloquebyw_no">
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Cuantas caras en bloque
                                        tiene B&W</span>
                                </div>
                                <div class="form-check">
                                    <select name="carasbloquebyw" id="" class="custom-select">
                                        <option value="" selected disabled>--</option>
                                        @foreach ($caras as $cara)
                                            <option value="{{ $cara }}">{{ $cara }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <hr>
                            <div class="col" id="divron_byw" style="display: block">
                                <input type="file" id="seleccionron_byw" name="seleccionron_byw" accept="image/*"
                                    required disabled>
                                <img class="card-img-mate" id="imagenron_byw">
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <hr>
    @if ($usuario == 'MEDELLIN')
        <div class="col-12 material">
            <div class="card">
                <div class="ttulo">
                    <green><span>Confirme si Jhonnie Walker exhibido junto rones</span></green>
                </div>
                <div class="col card-box-exhi">
                    <div class="col">
                        <img class="img_afiche" src="{{ asset('/storage/ron_jhonny.png') }}" />
                        <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                            <input id="ron_jhonny_si" name="ron_jhonny" type="radio" value="ron_jhonny_si"
                                onchange="showContent2()" />
                            <label for="ron_jhonny_si">SI</label>
                            <input id="ron_jhonny_choose" name="ron_jhonny" type="radio" value="ron_jhonny_choose"
                                checked="checked" disabled />
                            <label for="ron_jhonny_choose">Ron junto a Johnnie Walker Red</label>
                            <input id="ron_jhonny_no" name="ron_jhonny" type="radio" value="ron_jhonny_no"
                                onchange="showContent2()" />
                            <label for="ron_jhonny_no">NO</label>
                            <a></a>
                        </div>
                    </div>

                    <div id="card2" style="display: none">
                        <div class="box_cont">
                            <input type="text" class="noClass" id="mtronjohnnie" style="text-align: center"
                                placeholder="indique si hay ron junto a johnnie walker" value="" required>
                        </div>
                        <div class="row" style="text-align: center">
                            <div class="col">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Indique si Johnnie
                                            Walker esta ubicada en bloque en la estanteria</span>
                                    </div>
                                    <div class="form-check">

                                        <label class="form-check-label" for="bloquejohnnie">
                                            Si
                                        </label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input class="form-check-input" type="radio" id="bloquejohnnie"
                                            name="bloquejohnnie" value="bloquejohnnie_si">
                                        <br>
                                        <br>

                                        <label class="form-check-label" for="bloquejohnnie">
                                            No
                                        </label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input class="form-check-input" type="radio" id="bloquejohnnie"
                                            name="bloquejohnnie" value="bloquejohnnie_no">
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Cuantas caras en
                                            bloque tiene Johnnie Walker</span>
                                    </div>
                                    <div class="form-check">
                                        <select name="carasbloquejohnnie" id="" class="custom-select">
                                            <option value="" selected disabled>--</option>
                                            @foreach ($caras as $cara)
                                                <option value="{{ $cara }}">{{ $cara }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br><br>
                                <div class="col" id="divron_jhonny" style="display: block">
                                    <input type="file" id="seleccionron_jhonny" name="seleccionron_jhonny"
                                        accept="image/*" required disabled>
                                    <img class="card-img-mate" id="imagenron_jhonny">
                                    <br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="col-12 material">
        <div class="card">
            <div class="ttulo">
                <green><span>Confirme si Smirnoff x1 exhibido junto a aguardientes</span></green>
            </div>
            <div class="col card-box-exhi">
                <div class="col">
                    <img class="img_afiche" src="{{ asset('/storage/aguardiente_smirnoff.png') }}" />
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="aguard_smirnoff_si" name="aguard_smirnoff" type="radio" value="aguard_smirnoff_si"
                            onchange="showContent3()" />
                        <label for="aguard_smirnoff_si">SI</label>
                        <input id="aguard_smirnoff_choose" name="aguard_smirnoff" type="radio"
                            value="aguard_smirnoff_choose" checked="checked" disabled />
                        <label for="aguard_smirnoff_choose">Aguardiente junto a Smirnoff x1</label>
                        <input id="aguard_smirnoff_no" name="aguard_smirnoff" type="radio" value="aguard_smirnoff_no"
                            onchange="showContent3()" />
                        <label for="aguard_smirnoff_no">NO</label>
                        <a></a>
                    </div>
                </div>
                <div id="card3" style="display: none">
                    <div class="box_cont">
                        <input type="text" class="noClass" id="mtaguasmirnoff" style="text-align: center"
                            placeholder="indique si hay aguardiente junto a smirnoff" value="" required>
                    </div>
                    <div class="row" style="text-align: center">
                        <div class="col">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Indique si Smirnoff esta
                                        ubicada en bloque en la estanteria</span>
                                </div>
                                <div class="form-check">

                                    <label class="form-check-label" for="bloquesmirnoff">
                                        Si
                                    </label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" id="bloquesmirnoff"
                                        name="bloquesmirnoff" value="bloquesmirnoff_si">
                                    <br>
                                    <br>

                                    <label class="form-check-label" for="bloquesmirnoff">
                                        No
                                    </label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" id="bloquesmirnoff"
                                        name="bloquesmirnoff" value="bloquesmirnoff_no">
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Cuantas caras en bloque
                                        tiene Smirnoff</span>
                                </div>
                                <div class="form-check">
                                    <select name="carasbloquesmirnoff" id="" class="custom-select">
                                        <option value="" selected disabled>--</option>
                                        @foreach ($caras as $cara)
                                            <option value="{{ $cara }}">{{ $cara }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <hr>
                            <div class="col" id="divaguard_smirnoff" style="display: block">
                                <input type="file" id="seleccionaguard_smirnoff" name="seleccionaguard_smirnoff"
                                    accept="image/*" required disabled>
                                <img class="card-img-mate" id="imagenaguard_smirnoff">
                                <br><br>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {!! Form::submit('Siguiente', [
        'class' => 'btn btn-primary',
        'id' => 'boton',
        'onclick' => 'OcultarButton(this)',
    ]) !!}
    <br><br>
    </p>
    {!! Form::close() !!}
@stop
@section('js')

    <script>
        function showContent1() {
            check1 = document.getElementById("ron_byw_si");
            check1no = document.getElementById("ron_byw_no");
            card1 = document.getElementById("card1");
            var inputronblack = document.getElementById('mtronblack');
            if (check1.checked) {
                $("#seleccionron_byw").prop('disabled', false)
                card1.style.display = "block";
                inputronblack.value = "ron junto a b&w ok";
            } else if (check1no.checked) {
                $("#seleccionron_byw").prop('disabled', false)
                card1.style.display = "block";
                inputronblack.value = "ron junto a b&w ok";
            }
        }
    </script>


    <script>
        function showContent2() {
            check2 = document.getElementById("ron_jhonny_si");
            check2no = document.getElementById("ron_jhonny_no");
            card2 = document.getElementById("card2");
            var inputronjohnnie = document.getElementById('mtronjohnnie');
            if (check2.checked) {
                inputronjohnnie.value = "ron junto a johnnie ok";
                $("#seleccionron_jhonny").prop('disabled', false)
                card2.style.display = "block";
            } else if (check2no.checked) {
                inputronjohnnie.value = "ron junto a johnnie ok";
                $("#seleccionron_jhonny").prop('disabled', false)
                card2.style.display = "block";
            }
        }
    </script>

    <script>
        function showContent3() {
            check3 = document.getElementById("aguard_smirnoff_si");
            check3no = document.getElementById("aguard_smirnoff_no");
            card3 = document.getElementById("card3");
            var inputaguasmirnoff = document.getElementById('mtaguasmirnoff');
            if (check3.checked) {
                inputaguasmirnoff.value = "aguardient junto a smirnoff ok";
                $("#seleccionaguard_smirnoff").prop('disabled', false)
                card3.style.display = "block";
            } else if (check3no.checked) {
                inputaguasmirnoff.value = "aguardient junto a smirnoff ok";
                $("#seleccionaguard_smirnoff").prop('disabled', false)
                card3.style.display = "block";
            }
        }
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
        function OcultarButton(btn) {
            $(btn).fadeOut();
        }
    </script>
@stop
