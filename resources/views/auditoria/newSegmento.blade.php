@extends('adminlte::page')
@section('title', 'Segmento')

@section('css')

    <link href="https://cdn.jsdelivr.net/css-toggle-switch/latest/toggle-switch.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Arapey:400,400i,600|Open+Sans:300" rel="stylesheet">
    <link href="{{ asset('css/auditoria.css') }}" rel="stylesheet">
@stop
@section('content')
    <h5><span class="numeros">4</span>SEGMENTO</h5>
    {!! Form::model($puntos_auditoria, [
        'route' => ['segmento.update', $puntos_auditoria->id],
        'method' => 'put',
        'enctype' => 'multipart/form-data',
        'files' => 'true',
    ]) !!}
    <input type="hidden" name="precarga_id" value="{{ $puntos_auditoria->precarga_id }}">
    <p>
    <div class="col-12 material">
        <div class="card">
            <div class="col">
                <div class="col">
                    <div id="divSegmento">
                        {!! Form::label('Segmento Actual') !!}
                        &nbsp;
                        <p>{{ $datos[0] }}</p>
                    </div>
                </div>
                <div class="col">
                    <div id="divOldSegmento" style="display: none">
                        <span><strong>Seleccione el segmento correcto</strong></span>
                        {!! Form::select('segmento', $segmento, null, [
                            'class' => 'form-control',
                            'placeholder' => 'seleccione un segmento diferente a ' . $datos[0],
                            'id' => 'segmento',
                            'required',
                            'disabled',
                        ]) !!}
                    </div>
                </div>
                <div class="col">
                    <br><br>
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="segmento_si" name="state_segmento" type="radio" value="segmento_si" />
                        <label for="segmento_si">SI</label>
                        <input id="segmento_choose" name="state_segmento" type="radio" value="segmento_choose"
                            checked="checked" disabled />
                        <label for="segmento_choose">Es el mismo segmento?</label>
                        <input id="segmento_no" name="state_segmento" type="radio" value="segmento_no" />
                        <label for="segmento_no">NO</label>
                        <a></a>
                    </div>
                    <br><br>
                </div>
                <div id="divBoxes" style="display:none">
                    <div class="col" style="text-align: center">
                        <label class="col-sm-9 flexbox">Cuantas cajas vende en el mes de cervezas</label>
                        <input class="col-sm-9 p-2 boxes" name="caja_cerveza" id="caja_cerveza" value="" type="number"
                            autocomplete="off" maxlength="3" min="0" max="500" onkeypress="if (this.value.length > 2) return false;" required>
                        <br><br><label class="col-sm-9 flexbox">Cuantas cajas vende en el mes de aguardientes</label>
                        <input class="col-sm-9 p-2 boxes" type="number" name="caja_aguardiente" id="caja_aguardiente"
                            autocomplete="off" value="" maxlength="3" min="0"  max="100" onkeypress="if (this.value.length > 2) return false;"  required>
                        <br><br><label class="col-sm-9 flexbox">Cuantas cajas vende en el mes de rones</label>
                        <input class="col-sm-9 p-2 boxes" type="number" id="caja_ron" name="caja_ron" value=""
                            autocomplete="off" maxlength="3" min="0"  max="100" onkeypress="if (this.value.length > 2) return false;"  required>
                        <br><br><label class="col-sm-9 flexbox">Cuantas cajas vende en el mes de whiskey</label>
                        <input class="col-sm-9 p-2 mb-4 boxes" type="number" id="caja_whiskey" name="caja_whiskey" value=""
                            autocomplete="off" maxlength="3" min="0"  max="100" onkeypress="if (this.value.length > 2) return false;"  required>
                            <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="divImgSegmento" style="display: none">
        <div class="row" style="text-align: center">
            <div class="col">
                <blue> <span>Tome una foto panoamica de dentro del establecimiento</span></blue>
                <br>
                <br>
                <green> <span>Fotografia de evidencia de la segmentaci&oacute;n</span></green>
                <br>
                <br>
                <input type="file" id="seleccionsegmento" name="fotosegmento" accept="image/*" required>
                <br><br>
                <img class="card-img-top" id="imagensegmento">
            </div>
        </div>
    </div>
    </p>
    <div id="divSubmit" style="display: none">
        {!! Form::submit('Siguiente', ['class' => 'btn btn-primary', 'id' => 'boton']) !!}
    </div>
    <br><br>
    {!! Form::close() !!}
@stop
@section('js')
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "segmento_no") {
                    $("#divBoxes").show();
                    $("#divImgSegmento").show();
                    $("#divSegmento").show();
                    $("#divSubmit").show();
                    $("#segmentoPic").show();
                    $("#divOldSegmento").show();
                    $("#segmento").prop("disabled", false);
                } else if (valor == "segmento_si") {
                    $("#divBoxes").show();
                    $("#divImgSegmento").show();
                    $("#divSegmento").show();
                    $("#divSubmit").show();
                    $("#segmentoPic").show();
                    $("#divOldSegmento").hide();
                    $("#segmento").prop("disabled", true);
                }
            });
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
@stop
