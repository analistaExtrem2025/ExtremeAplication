@extends('adminlte::page')
@section('title', 'Cerrados')
@section('content_header')
    <h1>Punto De Venta Cerrado</h1>
@stop
@section('content')
    <button class="btn btn-info" onclick="getLocation()" id="boton_begin" >Comenzar</button>
        <p id="comenzar"></p>
    {!! Form::open(['route' => 'diageo_cerrados.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div id="cerrados" style="display: none">
        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
                    <form runat="server">
                        {!! Form::label('Tome foto de la fachada', 'Tome foto de la fachada' , ['class' => 'form-control', 'required']) !!}
                        <input type='file' id="fachada" name="fachada" multiple required /> <br>
                        <img style="display: none" id="facha" src="#" alt="Imagen" />
                    </form>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
        {!! Form::label('canal', 'Indique el canal', ['class' => 'form-control']) !!}
        {!! Form::select('canal', $canal, null, [
            'placeholder' => '--',
            'id' => 'canal',
            'name' => 'canal',
            'class' => 'form-control ' . ($errors->has('canal') ? 'is-invalid' : ''),
            'required',
        ]) !!}
        <input id="Latitude" name="lat" type="hidden" value="">
        <input id="Longitude" name="lon" type="hidden" value="">
    </div>
</div>
</div>
        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('localidad', 'Confirme la localidad', ['class' => 'form-control']) !!}
                    <select name="localidad" id="localidad" class="form-control" required>
                        <option value="" selected>--</option>
                        @foreach ($localidad as $key => $local)
                            <option value="{{ $local }}">
                                {{ $local }}
                            </option>
                        @endforeach

                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('Direccion', 'Direccion', ['class' => 'form-control']) !!}
                    {!! Form::text('direccion', null, ['class' => ' form-control', 'required']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('Barrio', 'Barrio', ['class' => 'form-control']) !!}
                    {!! Form::text('barrio', null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
        </div>
        <br>
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary' , 'id'=> 'btn-ok']) !!}
    </div>
    {!! Form::close() !!}
@stop
@section('css')
    <link href="{{ asset('css/diageo.css') }}" rel="stylesheet">
@stop
@section('js')
    <script src="sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) { //Revisamos que el input tenga contenido
                var reader = new FileReader(); //Leemos el contenido
                $('#facha').show();
                reader.onload = function(e) { //Al cargar el contenido lo pasamos como atributo de la imagen de arriba
                    $('#facha').attr('src', e.target.result);
                    $('#foto').value('src');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#fachada").change(
            function() { //Cuando el input cambie (se cargue un nuevo archivo) se va a ejecutar de nuevo el cambio de imagen y se verá reflejado.
                readURL(this);
            });
    </script>



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
            $('#cerrados').show();
        }
    </script>

    <script>

        $(document).ready(function() {
            $('form #btn-ok').click(function(e) {
                let $form = $(this).closest('form');

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false,
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you  sure?',
                    text: "Check plz",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'OK',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        swalWithBootstrapButtons.fire(
                                'Finished',
                                'Success',
                                'success',
                            );
                        $form.submit();
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Canceled',
                            'Do corrections and then retry :)',
                            'error'
                        );
                    }
                });

            });
    </script>

@stop
