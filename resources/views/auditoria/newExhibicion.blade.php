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
            <div class="col">
                <div class="col">
                    <img class="img_afiche" src="{{ asset('/storage/ron_b&w.png') }}" />
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="ron_byw_si" name="ron_byw" type="radio" value="ron_byw_si" />
                        <label for="ron_byw_si">SI</label>
                        <input id="ron_byw_choose" name="ron_byw" type="radio" value="ron_byw_choose" checked="checked"  disabled/>
                        <label for="ron_byw_choose">Ron junto a B&W</label>
                        <input id="ron_byw_no" name="ron_byw" type="radio" value="ron_byw_no" />
                        <label for="ron_byw_no">NO</label>
                        <a></a>
                    </div>
                </div>
                <div class="row" style="text-align: center">
                    <div class="col">
                        <br><br>
                        <hr>
                        <div class="col" id="divron_byw" style="display: block">
                            <input type="file" id="seleccionron_byw" name="seleccionron_byw" accept="image/*">
                            <img class="card-img-mate" id="imagenron_byw">
                            <script src="script.js"></script>
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
            @if ($usuario == 'MEDELLIN')
                <div class="col-12 material">
                    <div class="card">
                        <div class="ttulo">
                            <green><span>Confirme si Jhonnie Walker exhibido junto rones</span></green>
                        </div>
                        <div class="col">
                            <div class="col">
                                <img class="img_afiche" src="{{ asset('/storage/ron_jhonny.png') }}" />
                                <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                                    <input id="ron_jhonny_si" name="ron_jhonny" type="radio" value="ron_jhonny_si" />
                                    <label for="ron_jhonny_si">SI</label>
                                    <input id="ron_jhonny_choose" name="ron_jhonny" type="radio" value="ron_jhonny_choose"
                                        checked="checked"  disabled/>
                                    <label for="ron_jhonny_choose">Ron junto a Johnnie Walker Red</label>
                                    <input id="ron_jhonny_no" name="ron_jhonny" type="radio" value="ron_jhonny_no" />
                                    <label for="ron_jhonny_no">NO</label>
                                    <a></a>
                                </div>
                            </div>
                            <div class="row" style="text-align: center">
                                <div class="col">
                                    <br><br>
                                    <hr>
                                    <div class="col" id="divron_jhonny" style="display: block">
                                        <input type="file" id="seleccionron_jhonny" name="seleccionron_jhonny"
                                            accept="image/*">
                                        <img class="card-img-mate" id="imagenron_jhonny">
                                        <script src="script.js"></script>
                                        <br><br>
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
                    <div class="col">
                        <div class="col">
                            <img class="img_afiche" src="{{ asset('/storage/aguardiente_smirnoff.png') }}" />
                            <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                                <input id="aguard_smirnoff_si" name="aguard_smirnoff" type="radio"
                                    value="aguard_smirnoff_si" />
                                <label for="aguard_smirnoff_si">SI</label>
                                <input id="aguard_smirnoff_choose" name="aguard_smirnoff" type="radio"
                                    value="aguard_smirnoff_choose" checked="checked"  disabled/>
                                <label for="aguard_smirnoff_choose">Aguardiente junto a Smirnoff x1</label>
                                <input id="aguard_smirnoff_no" name="aguard_smirnoff" type="radio"
                                    value="aguard_smirnoff_no" />
                                <label for="aguard_smirnoff_no">NO</label>
                                <a></a>
                            </div>
                        </div>
                        <div class="row" style="text-align: center">
                            <div class="col">
                                <br><br>
                                <hr>
                                <div class="col" id="divaguard_smirnoff" style="display: block">
                                    <input type="file" id="seleccionaguard_smirnoff" name="seleccionaguard_smirnoff"
                                        accept="image/*">
                                    <img class="card-img-mate" id="imagenaguard_smirnoff">
                                    <script src="script.js"></script>
                                    <br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

            {!! Form::submit('Siguiente', ['class' => 'btn btn-primary', 'id' => 'boton']) !!}
            <br><br>
        </p>
            {!! Form::close() !!}
        @stop
        @section('js')
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
        @stop
