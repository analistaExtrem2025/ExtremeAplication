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
                    <div id="divTipologia">
                        {!! Form::label('Tipologia Actual') !!}
                        &nbsp;
                        <p>{{ $datos[0] }}</p>
                    </div>
                </div>

                <div id="divOldtipologia" style="display: none">
                    <div class="col">
                        {!! Form::label('Seleccione la tipología correcta') !!}
                        {!! Form::select('tipologia', $tipologia, null, [
                            'class' => 'form-control mb-4',
                            'placeholder' => 'seleccione una tipologia diferente a ' . $datos[0],
                            'id' => 'tipologia',
                            'onchange' => 'editor()',
                            'required',
                            'disabled',
                        ]) !!}
                    </div>
                    <div class="input" id="divOtroCual" style="display: none">
                        {!! Form::label('¿Cual?') !!}

                        <select name="OtraTipologia" class="form-control textar" id="cual" required disabled>
                            <option value="" disabled selected>Seleccione una opción</option>
                            @foreach ($otros as $otro)
                                <option value="{{ $otro }}">{{ $otro }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <br><br>
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="tipologia_si" name="state_tipologia" type="radio" value="tipologia_si"
                            required="required" />
                        <label for="tipologia_si">SI</label>
                        <input id="tipologia_choose" name="state_tipologia" type="radio" value="tipologia_choose"
                            checked="checked" disabled />
                        <label for="tipologia_choose" disabled class="disabled">¿Es la misma tipología?</label>
                        <input id="tipologia_no" name="state_tipologia" type="radio" value="tipologia_no" />
                        <label for="tipologia_no">NO</label>
                        <a></a>
                    </div>
                    <br><br>
                </div>

                <br>

            </div>
        </div>
    </div>
    <div id="divImgTipologia" style="display: none">
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
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $("input[name=state_tipologia]").click(function() {
                if ($('input:radio[name=state_tipologia]:checked').val() == 'tipologia_no') {
                    $("#divImgTipologia").show();
                    $("#divSubmit").show();
                    $("#divtipologia").show();
                    $("#divOldtipologia").show();
                    $('#tipologia').prop("disabled", false);
                } else {
                    $("#divtipologia").hide();
                    $("#divImgTipologia").show();
                    $("#divSubmit").show();
                    $("#divOldtipologia").hide();
                    $('#tipologia').prop("disabled", true);
                }
            });
        });
    </script>


    <script>
        function editor() {
            var opcion = $('#tipologia').val();
            if (opcion == 'Otro') {
                $('#divOtroCual').show();
                $('#cual').prop("disabled", false);
            } else {
                $('#divOtroCual').hide();
                $('#cual').prop("disabled", true);
            }
        }
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
