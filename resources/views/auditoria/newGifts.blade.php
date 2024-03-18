@extends('adminlte::page')
@section('title', 'Entrega de Gifts')

@section('css')

    <link href="https://cdn.jsdelivr.net/css-toggle-switch/latest/toggle-switch.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Arapey:400,400i,600|Open+Sans:300" rel="stylesheet">
    <link href="{{ asset('css/auditoria.css') }}" rel="stylesheet">
@stop
@section('content')
    <br><br>
    <h5><span class="numeros">7</span>ENTREGA GIFT</h5>
    {!! Form::model($puntos_auditoria, [
        'route' => ['gifts.update', $puntos_auditoria->id],
        'method' => 'put',
        'enctype' => 'multipart/form-data',
        'files' => 'true',
    ]) !!}
    <input type="hidden" name="precarga_id" value="{{ $puntos_auditoria->precarga_id }}">
    <p>
    <div class="col-12 material">
        <div class="card">
            <div class="ttulo">
                <green><span>Confirme si se entrego Gift</span></green>
            </div>
            <div class="col">
                <br><br>
                <div class="col">
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="gift_si" name="gift" type="radio" value="gift_si" />
                        <label for="gift_si">SI</label>
                        <input id="gift_choose" name="gift" type="radio" value="gift_choose" checked="checked"
                            disabled />
                        <label for="gift_choose">¿Entrego gift en el PDV?</label>
                        <input id="gift_no" name="gift" type="radio" value="gift_no" />
                        <label for="gift_no">NO</label>
                        <a></a>
                    </div>
                </div>
                <br><br>
                <div class="box_cont">
                    <input type="text" class="noClass" id="mtgift" style="text-align: center"
                        placeholder="indique si hay gift" value="" required>
                </div>

                <div id="divCantGif" style="display: none">
                    <div class="row" style="text-align: center">

                        <label for="">Cantidad entrgada</label>
                        <input class="form-control" type="number" name="cant_gift" id="cant_gift" autocomplete="off"
                            required disabled min="1">
                        <br><br><br><br>
                        <div class="col" id="divgift" style="display: block">
                            <input type="file" id="selecciongift" name="selecciongift" accept="image/*" required
                                disabled>
                            <img class="card-img-mate" id="imagengift">
                            <script src="script.js"></script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </p>
    {!! Form::submit('Siguiente', ['class' => 'btn btn-primary', 'id' => 'boton', 'onclick' => 'OcultarButton(this)']) !!}
    {!! Form::close() !!}
@stop
@section('js')
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var inputgift = document.getElementById('mtgift');
                var valor1 = $(event.target).val();
                if (valor1 == "gift_no") {
                    $("#divCantGif").hide();
                    inputgift.value = "gift ok";
                    $("#cant_gift").prop('disabled', true)
                    $("#selecciongift").prop('disabled', true)
                } else if (valor1 == "gift_si") {
                    $("#divCantGif").show();
                    inputgift.value = "gift ok";
                    $("#cant_gift").prop('disabled', false)
                    $("#selecciongift").prop('disabled', false)


                }
            });
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
        function OcultarButton(btn)
        {
            $(btn).fadeOut();
        }
      </script>
@stop
