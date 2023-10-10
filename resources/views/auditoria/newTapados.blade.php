@extends('adminlte::page')
@section('title', 'Presentacion de productos')

@section('css')

    <link href="https://cdn.jsdelivr.net/css-toggle-switch/latest/toggle-switch.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Arapey:400,400i,600|Open+Sans:300" rel="stylesheet">
    <link href="{{ asset('css/auditoria.css') }}" rel="stylesheet">
@stop
@section('content')
    {!! Form::model($puntos_auditoria, [
        'route' => ['tapados.update', $puntos_auditoria->id],
        'method' => 'put',
        'enctype' => 'multipart/form-data',
        'files' => 'true',
    ]) !!}
    <p>
    {{--  <form name="calculadora">  --}}
        <div class="col-12">
            <div class="card">
                <div class="row">
                    <div class="row">
                        <div class="switch-toggle switch-3 switch-candy" style="height: 24px;">
                            <input id="prod_tapados_si" name="prod_tapados" type="radio" value="prod_tapados_si"
                                onchange="Suma()" />
                            <label for="prod_tapados_si">SI</label>
                            <input id="prod_tapados_choose" name="prod_tapados" type="radio" value="prod_tapados_choose"
                                checked="checked" />
                            <label for="prod_tapados_choose">¿Estan <blue>tapados</blue> los productos Diageo
                                por otras
                                marcas?</label>
                            <input id="prod_tapados_no" name="prod_tapados" type="radio" value="prod_tapados_no"
                                onchange="Suma()" />
                            <label for="prod_tapados_no">NO</label>
                            <a></a>
                        </div>
                    </div>
                    <input type="hidden" id="ingreso1" name="ingreso1" onchange="Suma()">
                    <br><br><br><br><br><br><br>
                    <div class="col" id="divProd_tapados" style="display: block">
                        <input type="file" id="seleccionProd_tapados" name="seleccionProd_tapados" accept="image/*">
                        <img class="card-img-mate" id="imagenProd_tapados">
                        <script src="script.js"></script>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="row">
                    <div class="row">
                        <div class="switch-toggle switch-3 switch-candy" style="height: 24px;">
                            <input id="prod_danados_si" name="prod_danados" type="radio" value="prod_danados_si"
                                onchange="Suma()" />
                            <label for="prod_danados_si">SI</label>
                            <input id="prod_danados_choose" name="prod_danados" type="radio" value="prod_danados_choose"
                                checked="checked" />
                            <label for="prod_danados_choose">¿Estan <blue>dañadas</blue> a etiquetas de los
                                productos
                                Diageo?</label>
                            <input id="prod_danados_no" name="prod_danados" type="radio" value="prod_danados_no"
                                onchange="Suma()" />
                            <label for="prod_danados_no">NO</label>
                            <a></a>
                        </div>
                    </div>
                    <input type="hidden" id="ingreso2" name="ingreso2" onchange="Suma()">
                    <br><br><br><br><br><br><br>
                    <div class="col" id="divProd_danados" style="display: block">
                        <input type="file" id="seleccionprod_danados" name="seleccionprod_danados" accept="image/*">
                        <img class="card-img-mate" id="imagenprod_danados">
                        <script src="script.js"></script>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="row">
                    <div class="row">
                        <div class="switch-toggle switch-3 switch-candy" style="height: 24px;">
                            <input id="prod_visibles_si" name="prod_visibles" type="radio" value="prod_visibles_si"
                                onchange="Suma()" />
                            <label for="prod_visibles_si">SI</label>
                            <input id="prod_visibles_choose" name="prod_visibles" type="radio"
                                value="prod_visibles_choose" checked="checked" />
                            <label for="prod_visibles_choose">¿Estan <blue>visibles</blue> las etiquetas de
                                los productos
                                Diageo
                                al
                                consumidor?</label>
                            <input id="prod_visibles_no" name="prod_visibles" type="radio" value="prod_visibles_no"
                                onchange="Suma()" />
                            <label for="prod_visibles_no">NO</label>
                            <a></a>
                        </div>
                    </div>
                    <input type="hidden" id="ingreso3" name="ingreso3" onchange="Suma()">
                    <br><br><br><br><br><br><br>
                    <div class="col" id="divProd_visibles" style="display: block">
                        <input type="file" id="seleccionprod_visibles" name="seleccionprod_visibles"
                            accept="image/*">
                        <img class="card-img-mate" id="imagenprod_visibles">
                        <script src="script.js"></script>
                    </div>
                </div>
            </div>
        </div>



        @if ($puntos_auditoria->dosificadorS == 'dosificadorS_si' or $puntos_auditoria->dosificadorD == 'dosificadorD_si')
            <div class="col-12" id="divDosif">
                <div class="card">
                    <div class="row">
                        <div class="row">
                            <div class="switch-toggle switch-3 switch-candy" style="height: 24px;">
                                <input id="prod_ds_visibles_si" name="prod_ds_visibles" type="radio"
                                    value="prod_ds_visibles_si" onchange="Suma()" />
                                <label for="prod_ds_visibles_si">SI</label>
                                <input id="prod_ds_visibles_choose" name="prod_ds_visibles" type="radio"
                                    value="prod_ds_visibles_choose" checked="checked" />
                                <label for="prod_ds_visibles_choose">¿Estan los dosificadores <blue>visibles
                                    </blue> al
                                    consumidor?</label>
                                <input id="prod_ds_visibles_no" name="prod_ds_visibles" type="radio"
                                    value="prod_ds_visibles_no" onchange="Suma()" />
                                <label for="prod_ds_visibles_no">NO</label>
                                <a></a>
                            </div>
                        </div>
                        <input type="hidden" id="ingreso8" name="ingreso8" onchange="Suma()">
                        <br><br><br><br><br><br><br>
                        <div class="col" id="divprod_ds_visibles" style="display: block">
                            <input type="file" id="seleccionprod_ds_visibles" name="seleccionprod_ds_visibles"
                                accept="image/*">
                            <img class="card-img-mate" id="imagenprod_ds_visibles">
                            <script src="script.js"></script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12" id="divDosif2">
                <div class="card">
                    <div class="row">
                        <div class="row">
                            <div class="switch-toggle switch-3 switch-candy" style="height: 24px;">
                                <input id="prod_ds_diferentes_si" name="prod_ds_diferentes" type="radio"
                                    value="prod_ds_diferentes_si" onchange="Suma()" />
                                <label for="prod_ds_diferentes_si">SI</label>
                                <input id="prod_ds_diferentes_choose" name="prod_ds_diferentes" type="radio"
                                    value="prod_ds_diferentes_choose" checked="checked" />
                                <label for="prod_ds_diferentes_choose">¿los dosificadores estan con <blue>
                                        productos
                                        diferentes</blue> de
                                    Diageo?</label>
                                <input id="prod_ds_diferentes_no" name="prod_ds_diferentes" type="radio"
                                    value="prod_ds_diferentes_no" onchange="Suma()" />
                                <label for="prod_ds_diferentes_no">NO</label>
                                <a></a>
                            </div>
                        </div>
                        <input type="hidden" id="ingreso9" name="ingreso9" onchange="Suma()">
                        <br><br><br><br><br><br><br>
                        <div class="col" id="divprod_ds_diferentes" style="display: block">
                            <input type="file" id="seleccionprod_ds_diferentes" name="seleccionprod_ds_diferentes"
                                accept="image/*">
                            <img class="card-img-mate" id="imagenprod_ds_diferentes">
                            <script src="script.js"></script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12" id="divDosif3">
                <div class="card">
                    <div class="row">
                        <div class="row">
                            <div class="switch-toggle switch-3 switch-candy" style="height: 24px;">
                                <input id="prod_ds_danados_si" name="prod_ds_danados" type="radio"
                                    value="prod_ds_danados_si"onchange="Suma()" />
                                <label for="prod_ds_danados_si">SI</label>
                                <input id="prod_ds_danados_choose" name="prod_ds_danados" type="radio"
                                    value="prod_ds_danados_choose" checked="checked" />
                                <label for="prod_ds_danados_choose">¿estan los dosificadores de Diageo <blue>
                                        dañados,
                                        sucios
                                        o en mal
                                        estado</blue>?</label>
                                <input id="prod_ds_danados_no" name="prod_ds_danados" type="radio"
                                    value="prod_ds_danados_no"onchange="Suma()" />
                                <label for="prod_ds_danados_no">NO</label>
                                <a></a>
                            </div>
                        </div>
                        <input type="hidden" id="ingreso10" name="ingreso10" onchange="Suma()">
                        <br><br><br><br><br><br><br><br>
                        <div class="col" id="divprod_ds_danados" style="display: block">
                            <input type="file" id="seleccionprod_ds_danados" name="seleccionprod_ds_danados"
                                accept="image/*">
                            <img class="card-img-mate" id="imagenprod_ds_danados">
                            <script src="script.js"></script>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        @if ($puntos_auditoria->hielera == 'hielera_si')
            <div class="col-12" id="divHiele">
                <div class="card">
                    <div class="row">
                        <div class="row">
                            <div class="switch-toggle switch-3 switch-candy" style="height: 24px;">
                                <input id="hl_con_prod_si" name="hl_con_prod" type="radio" value="hl_con_prod_si"
                                    onchange="Suma()" />
                                <label for="hl_con_prod_si">SI</label>
                                <input id="hl_con_prod_choose" name="hl_con_prod" type="radio"
                                    value="hl_con_prod_choose" checked="checked" />
                                <label for="hl_con_prod_choose">¿Las hieleras <blue>cuentan con productos</blue>
                                    Diageo?</label>
                                <input id="hl_con_prod_no" name="hl_con_prod" type="radio" value="hl_con_prod_no"
                                    onchange="Suma()" />
                                <label for="hl_con_prod_no">NO</label>
                                <a></a>
                            </div>
                        </div>
                        <input type="hidden" id="ingreso11" name="ingreso11" onchange="Suma()">
                        <br><br><br><br><br><br><br>
                        <div class="col" id="divhl_con_prod" style="display: block">
                            <input type="file" id="seleccionhl_con_prod" name="seleccionhl_con_prod"
                                accept="image/*">
                            <img class="card-img-mate" id="imagenhl_con_prod">
                            <script src="script.js"></script>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12" id="divHiele2">
                <div class="card">
                    <div class="row">
                        <div class="row">
                            <div class="switch-toggle switch-3 switch-candy" style="height: 24px;">
                                <input id="prod_hl_danadas_si" name="prod_hl_danadas" type="radio"
                                    value="prod_hl_danadas_si" onchange="Suma()" />
                                <label for="prod_hl_danadas_si">SI</label>
                                <input id="prod_hl_danadas_choose" name="prod_hl_danadas" type="radio"
                                    value="prod_hl_danadas_choose" checked="checked" />
                                <label for="prod_hl_danadas_choose">¿Estan las hieleras de Diageo <blue>quebradas,
                                        ralladas,</blue> etc?</label>
                                <input id="prod_hl_danadas_no" name="prod_hl_danadas" type="radio"
                                    value="prod_hl_danadas_no" onchange="Suma()" />
                                <label for="prod_hl_danadas_no">NO</label>
                                <a></a>
                            </div>
                        </div>
                        <input type="hidden" id="ingreso6" name="ingreso6" onchange="Suma()">
                        <br><br><br><br><br><br><br>
                        <div class="col" id="divProd_hl_danadas" style="display: block">
                            <input type="file" id="seleccionprod_hl_danadas" name="seleccionprod_hl_danadas"
                                accept="image/*">
                            <img class="card-img-mate" id="imagenprod_hl_danadas">
                            <script src="script.js"></script>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($puntos_auditoria->vasos == 'vasos_si')
            <div class="col-12" id="divCopa">
                <div class="card">
                    <div class="row">
                        <div class="row">
                            <div class="switch-toggle switch-3 switch-candy" style="height: 24px;">
                                <input id="cp_con_prod_si" name="cp_con_prod" type="radio" value="cp_con_prod_si"
                                    onchange="Suma()" />
                                <label for="cp_con_prod_si">SI</label>
                                <input id="cp_con_prod_choose" name="cp_con_prod" type="radio"
                                    value="cp_con_prod_choose" checked="checked" />
                                <label for="cp_con_prod_choose">¿Las copas y vasos <blue>cuentan con productos
                                    </blue>
                                    Diageo?</label>
                                <input id="cp_con_prod_no" name="cp_con_prod" type="radio" value="cp_con_prod_no"
                                    onchange="Suma()" />
                                <label for="cp_con_prod_no">NO</label>
                                <a></a>
                            </div>
                        </div>
                        <input type="hidden" id="ingreso12" name="ingreso12" onchange="Suma()">
                        <br><br><br><br><br><br><br>
                        <div class="col" id="divcp_con_prod" style="display: block">
                            <input type="file" id="seleccioncp_con_prod" name="seleccioncp_con_prod"
                                accept="image/*">
                            <img class="card-img-mate" id="imagencp_con_prod">
                            <script src="script.js"></script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12" id="divCopa2">
                <div class="card">
                    <div class="row">
                        <div class="row">
                            <div class="switch-toggle switch-3 switch-candy" style="height: 24px;">
                                <input id="prod_vs_quebrados_si" name="prod_vs_quebrados" type="radio"
                                    value="prod_vs_quebrados_si" onchange="Suma()" />
                                <label for="prod_vs_quebrados_si">SI</label>
                                <input id="prod_vs_quebrados_choose" name="prod_vs_quebrados" type="radio"
                                    value="prod_vs_quebrados_choose" checked="checked" />
                                <label for="prod_vs_quebrados_choose">¿Estan las copas y vasos de Diageo
                                    <blue>quebrados,
                                        rallados,</blue>
                                    etc?
                                </label>
                                <input id="prod_vs_quebrados_no" name="prod_vs_quebrados" type="radio"
                                    value="prod_vs_quebrados_no" onchange="Suma()" />
                                <label for="prod_vs_quebrados_no">NO</label>
                                <a></a>
                            </div>
                        </div>
                        <input type="hidden" id="ingreso7" name="ingreso7" onchange="Suma()">
                        <br><br><br><br><br><br><br>
                        <div class="col" id="divProd_vs_quebrados" style="display: block">
                            <input type="file" id="seleccionprod_vs_quebrados" name="seleccionprod_vs_quebrados"
                                accept="image/*">
                            <img class="card-img-mate" id="imagenprod_vs_quebrados">
                            <script src="script.js"></script>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        {{--  <input type="hidden" name="resultado" disabled><br>
    </form>  --}}
    </p>

    {!! Form::submit('Siguiente', ['class' => 'btn btn-primary', 'id' => 'boton']) !!}
    {!! Form::close() !!}
@stop

@section('js')

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
@stop
