@extends('adminlte::page')
@section('title', 'Tipologia')

@section('css')

    <link href="https://cdn.jsdelivr.net/css-toggle-switch/latest/toggle-switch.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Arapey:400,400i,600|Open+Sans:300" rel="stylesheet">
    <link href="{{ asset('css/auditoria.css') }}" rel="stylesheet">
@stop
@section('content')
    <h5><span class="numeros">3</span>TIPOLOGIA</h5>

    {!! Form::model($puntos_auditoria, [
        'route' => ['tipologia.update', $puntos_auditoria->id],
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
                        {!! Form::label('Tipologia Actual') !!}
                        &nbsp;
                        <p>{{ $datos[0] }}</p>
                    </div>
                </div>

                <div class="col">
                    <br><br>
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="tipologia_si" name="state_tipologia" type="radio" value="tipologia_si" required />
                        <label for="tipologia_si">SI</label>
                        <input id="tipologia_choose" name="state_tipologia" type="radio" value="tipologia_choose" checked disabled />
                        <label for="tipologia_choose" class="disabled">¿Es la misma tipología?</label>
                        <input id="tipologia_no" name="state_tipologia" type="radio" value="tipologia_no" required />
                        <label for="tipologia_no">NO</label>
                        <a></a>
                    </div>
                    <br><br>
                </div>

                <div class="col">
                    <div id="divtipologia" style="display: none">
                        {!! Form::label('Seleccione la tipología correcta') !!}
                        {!! Form::select('tipologia', $tipologia, null, [
                            'class' => 'form-control',
                            'placeholder' => 'seleccione una tipologia diferente a ' . $datos[0],
                        ]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row" style="text-align: center">
        <div class="col">
            <blue> <span>La foto debe ser tomada dentro del establecimiento</span></blue>
            <br>
            <br>
            <green> <span>Fotografia de evidencia de la tipologia</span></green>
            <br>
            <br>
            <input type="file" id="selecciontipologia" name="fototipologia" accept="image/*" required>
            <br><br>
            <img class="card-img-top" id="imagentipologia">
            <script src="script.js"></script>
        </div>
    </div>
    </p>
    {!! Form::submit('Siguiente', ['class' => 'btn btn-primary', 'id' => 'boton']) !!}
    <br><br>
    {!! Form::close() !!}
@stop
@section('js')
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
@stop
