@extends('adminlte::page')
@section('title', 'Cerrados')
@section('content_header')
    <h1>Edicion de Punto de Venta Cerrado</h1>
@stop
@section('content')
{!! Form::model($cerrados, ['route' => ['diageo_cerrados.update', $cerrados->id], 'method' => 'put']) !!}

    <div class="card-group">
        <div class="card">
            <img class="card-img-top" src="{{ Storage::url($cerrados->fachada) }}" alt="Foto de activación">
            <div class="card-body">
                <h5 class="card-title">Foto de la Fachada</h5>
            </div>
        </div>
    </div>
    <h3>Datos del Punto</h3>
    <div class="container-fluid">
        <div class="row row-cols-auto">
            <div class="col">
                {!! Form::label('canal', 'Canal') !!}
                {!! Form::select('canal', $canal, $cerrados->canal, ['class' => 'form-control']) !!}
            </div>
            <div class="col">
                {!! Form::label('Direccion', 'Direccion', ['class' => 'form-control']) !!}
                {!! Form::text('direccion', $cerrados->direccion, ['class' => ' form-control', 'required']) !!}
            </div>
            <div class="col">
                {!! Form::label('registradoPor', 'Registrado por') !!}
                {!! Form::text('registradoPor', $cerrados->registradoPor, ['class' => 'form-control', 'disabled']) !!}
            </div>
        </div>
    </div>
        <div class="container-fluid">
            <div class="row row-cols-auto">
                <div class="col">
                    {!! Form::label('localidad', 'Localidad') !!}
                    {!! Form::text('localidad', $cerrados->localidad, ['class' => 'form-control']) !!}
                </div>
                <div class="col">
                    {!! Form::label('Barrio', 'Barrio', ['class' => 'form-control']) !!}
                    {!! Form::text('barrio', $cerrados->barrio, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('Gestion de Calidad') !!}
                    {!! Form::select('gestionCalidad', $statusClose, null, [
                        'class' => 'form-control',
                        'placeholder' => '--',
                        'required',
                    ]) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <div class="card">
                    {!! Form::label('Observaciones de calidad', 'Observaciones de calidad', ['class' => 'form-control']) !!}
                    {!! Form::textarea('ObsCalidad', null, ['class' => ' form-control', 'required', 'cols' => 5, 'rows' => 3]) !!}
                </div>
            </div>
        </div>
        {!! Form::hidden('estatusCalidad', 'Gestionado Calidad') !!}
        {!! Form::hidden('usuarioCalidad', Auth::user()->name) !!}
        {!! Form::hidden('fechaCalidad', $now) !!}
        {!! Form::submit('Guardar Cambios', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
    <br>
    @include('diageo_cerrados.map')
@stop
@section('css')
    <link href="{{ asset('css/diageo.css') }}" rel="stylesheet">
    <style>


  .card-img-top {

    padding: 1rem;
    width: 320px;
    height: 320px;
    border: 1px solid blue;
    border-radius: 0.75rem;

}
.card-title {
    font-weight: bold;
    margin-left: 3rem;
}

    </style>
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
