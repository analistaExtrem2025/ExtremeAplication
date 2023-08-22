<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="{{ asset('css/diageo.css') }}" rel="stylesheet">
<div class="row">
    <div class="form-group col-md-12">
        <div class="col-md-12">
            {!! Form::label('se activa el punto?') !!}
            <br>
            <div class="input-group mb-12" style="display: inline-grid">
                <div class="input-group-prepend contenedor">
                    <div class="input-group-text radios">
                        {!! Form::radio('estado', 'si', null, ['class' => 'form-control', 'id' => 'si']) !!}
                        {!! Form::label('estado', 'Si', ['class' => 'form-control']) !!}
                        {!! Form::radio('estado', 'no', null, ['class' => 'form-control', 'id' => 'no']) !!}
                        {!! Form::label('estado', 'No', ['class' => 'form-control']) !!}
                        {!! Form::radio('estado', 'cerrado', null, ['class' => 'form-control', 'id' => 'cerrado']) !!}
                        {!! Form::label('estado', 'Esta Cerrado', ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "cerrado") {
                    $("#focoCerrado").show();
                    $("#no_concret").hide();
                    $("#efectivo").hide();
                    window.location.href= "/diageo_cerrados/create"
                } else if (valor == "no") {
                    $("#no_concret").show();
                    $('#canal').prop('disabled', false)
                    $('#motivo_de_no_concrecion').prop('disabled', false)
                    $('#observations').prop('disabled', false)
                    $('#dtamento').prop('disabled', false)
                    $("#focoCerrado").hide();
                    $("#efectivo").hide();
                    window.location.href= "/diageo_noactivados/create"
                } else if (valor == "si") {
                    $("#efectivo").show();
                    $("#focoCerrado").hide();
                    $("#no_concret").hide();
                    window.location.href= "/diageo_activados/create"
                } else {
                    $("#efectivo").hide();
                    $("#focoCerrado").hide();
                    $("#no_concret").hide();
                }
            });
        });
    </script>

