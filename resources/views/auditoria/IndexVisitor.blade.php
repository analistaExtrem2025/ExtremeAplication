@extends('adminlte::page')

@section('title', ' Bienvenidos')

@section('content_header')
    <h1>Auditorias</h1>
@stop
@section('content')

    <div class="row">
        <div class="col">
            <!-- Large modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".todos">Todos los registros</button>
            <hr>
            <h3>Segmento</h3>
            <!-- Large modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".gold">Segmento Gold</button>
            <!-- Large modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".silver">Segmento
                Silver</button>
            <!-- Large modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bronce">Segmento
                Bronce</button>
            <hr>
            <h3>Tipologia</h3>
            <!-- Large modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bar">Bar estándar</button>
            <!-- Large modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".tienda">Tienda de
                consumo</button>
            <!-- Large modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".lico">Licobares</button>
            <!-- Large modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".juegos">Juegos típicos</button>
            <!-- Large modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".otro">Otro</button>
        </div>
        <div class="col-3">
            <div class="card">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".pqr">Generar un
                    PQR</button>
            </div>
        </div>

    </div>





    <div class="modal fade todos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="container">

                    <table class="table table-bordered data-table" id="pdf_table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>codigo femsa</th>
                                <th>Raz&oacute;n Social</th>
                                <th>Estado de activacion </th>
                                <th>Segmento</th>
                                <th>Tipolog&iacute;a</th>
                                <th>Creaci&oacute;n</th>
                                <th width="105px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($todos as $encu)
                                <tr>
                                    <td>{{ $encu->id }}</td>
                                    <td>{{ $encu->codigo_femsa }}</td>
                                    <td>{{ $encu->razonSocial }}</td>
                                    <td>{{ $encu->activacion }}</td>
                                    <td>{{ $encu->segmento }}</td>
                                    <td>{{ $encu->tipologia }}</td>
                                    <td>{{ $encu->created_at }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="BasicExample">
                                            <a href="{{ url('/pdfExport/' . $encu->id) }}" class="btn btn-success btn-sm"><i
                                                    class="fas fa-file-pdf"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade gold" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container">
                    <table class="table table-bordered data-table" id="gold_table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>codigo femsa</th>
                                <th>Raz&oacute;n Social</th>
                                <th>Estado de activacion </th>
                                <th>Segmento</th>
                                <th>Tipolog&iacute;a</th>
                                <th>Creaci&oacute;n</th>
                                <th width="105px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gold as $encu)
                                <tr>
                                    <td>{{ $encu->id }}</td>
                                    <td>{{ $encu->codigo_femsa }}</td>
                                    <td>{{ $encu->razonSocial }}</td>
                                    <td>{{ $encu->activacion }}</td>
                                    <td>{{ $encu->segmento }}</td>
                                    <td>{{ $encu->tipologia }}</td>
                                    <td>{{ $encu->created_at }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="BasicExample">
                                            <a href="{{ url('/pdfExport/' . $encu->id) }}"
                                                class="btn btn-success btn-sm"><i class="fas fa-file-pdf"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade silver" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container">
                    <table class="table table-bordered data-table" id="silver_table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>codigo femsa</th>
                                <th>Raz&oacute;n Social</th>
                                <th>Estado de activacion </th>
                                <th>Segmento</th>
                                <th>Tipolog&iacute;a</th>
                                <th>Creaci&oacute;n</th>

                                <th width="105px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($silver as $encu)
                                <tr>
                                    <td>{{ $encu->id }}</td>
                                    <td>{{ $encu->codigo_femsa }}</td>
                                    <td>{{ $encu->razonSocial }}</td>
                                    <td>{{ $encu->activacion }}</td>
                                    <td>{{ $encu->segmento }}</td>
                                    <td>{{ $encu->tipologia }}</td>
                                    <td>{{ $encu->created_at }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="BasicExample">
                                            <a href="{{ url('/pdfExport/' . $encu->id) }}"
                                                class="btn btn-success btn-sm"><i class="fas fa-file-pdf"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bronce" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container">
                    <table class="table table-bordered data-table" id="bronce_table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>codigo femsa</th>
                                <th>Raz&oacute;n Social</th>
                                <th>Estado de activacion </th>
                                <th>Segmento</th>
                                <th>Tipolog&iacute;a</th>
                                <th>Creaci&oacute;n</th>

                                <th width="105px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bronce as $encu)
                                <tr>
                                    <td>{{ $encu->id }}</td>
                                    <td>{{ $encu->codigo_femsa }}</td>
                                    <td>{{ $encu->razonSocial }}</td>
                                    <td>{{ $encu->activacion }}</td>
                                    <td>{{ $encu->segmento }}</td>
                                    <td>{{ $encu->tipologia }}</td>
                                    <td>{{ $encu->created_at }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="BasicExample">
                                            <a href="{{ url('/pdfExport/' . $encu->id) }}"
                                                class="btn btn-success btn-sm"><i class="fas fa-file-pdf"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container">
                    <table class="table table-bordered data-table" id="bar_table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>codigo femsa</th>
                                <th>Raz&oacute;n Social</th>
                                <th>Estado de activacion </th>
                                <th>Segmento</th>
                                <th>Tipolog&iacute;a</th>
                                <th>Creaci&oacute;n</th>

                                <th width="105px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bar as $encu)
                                <tr>
                                    <td>{{ $encu->id }}</td>
                                    <td>{{ $encu->codigo_femsa }}</td>
                                    <td>{{ $encu->razonSocial }}</td>
                                    <td>{{ $encu->activacion }}</td>
                                    <td>{{ $encu->segmento }}</td>
                                    <td>{{ $encu->tipologia }}</td>
                                    <td>{{ $encu->created_at }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="BasicExample">
                                            <a href="{{ url('/pdfExport/' . $encu->id) }}"
                                                class="btn btn-success btn-sm"><i class="fas fa-file-pdf"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade tienda" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container">
                    <table class="table table-bordered data-table" id="tienda_table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>codigo femsa</th>
                                <th>Raz&oacute;n Social</th>
                                <th>Estado de activacion </th>
                                <th>Segmento</th>
                                <th>Tipolog&iacute;a</th>
                                <th>Creaci&oacute;n</th>

                                <th width="105px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tienda as $encu)
                                <tr>
                                    <td>{{ $encu->id }}</td>
                                    <td>{{ $encu->codigo_femsa }}</td>
                                    <td>{{ $encu->razonSocial }}</td>
                                    <td>{{ $encu->activacion }}</td>
                                    <td>{{ $encu->segmento }}</td>
                                    <td>{{ $encu->tipologia }}</td>
                                    <td>{{ $encu->created_at }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="BasicExample">
                                            <a href="{{ url('/pdfExport/' . $encu->id) }}"
                                                class="btn btn-success btn-sm"><i class="fas fa-file-pdf"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade lico" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container">
                    <table class="table table-bordered data-table" id="lico_table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>codigo femsa</th>
                                <th>Raz&oacute;n Social</th>
                                <th>Estado de activacion </th>
                                <th>Segmento</th>
                                <th>Tipolog&iacute;a</th>
                                <th>Creaci&oacute;n</th>

                                <th width="105px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lico as $encu)
                                <tr>
                                    <td>{{ $encu->id }}</td>
                                    <td>{{ $encu->codigo_femsa }}</td>
                                    <td>{{ $encu->razonSocial }}</td>
                                    <td>{{ $encu->activacion }}</td>
                                    <td>{{ $encu->segmento }}</td>
                                    <td>{{ $encu->tipologia }}</td>
                                    <td>{{ $encu->created_at }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="BasicExample">
                                            <a href="{{ url('/pdfExport/' . $encu->id) }}"
                                                class="btn btn-success btn-sm"><i class="fas fa-file-pdf"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade juegos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container">
                    <table class="table table-bordered data-table" id="juegos_table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>codigo femsa</th>
                                <th>Raz&oacute;n Social</th>
                                <th>Estado de activacion </th>
                                <th>Segmento</th>
                                <th>Tipolog&iacute;a</th>
                                <th>Creaci&oacute;n</th>

                                <th width="105px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($juegos as $encu)
                                <tr>
                                    <td>{{ $encu->id }}</td>
                                    <td>{{ $encu->codigo_femsa }}</td>
                                    <td>{{ $encu->razonSocial }}</td>
                                    <td>{{ $encu->activacion }}</td>
                                    <td>{{ $encu->segmento }}</td>
                                    <td>{{ $encu->tipologia }}</td>
                                    <td>{{ $encu->created_at }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="BasicExample">
                                            <a href="{{ url('/pdfExport/' . $encu->id) }}"
                                                class="btn btn-success btn-sm"><i class="fas fa-file-pdf"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade otro" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container">
                    <table class="table table-bordered data-table" id="otro_table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>codigo femsa</th>
                                <th>Raz&oacute;n Social</th>
                                <th>Estado de activacion </th>
                                <th>Segmento</th>
                                <th>Tipolog&iacute;a</th>
                                <th>Creaci&oacute;n</th>

                                <th width="105px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($otro as $encu)
                                <tr>
                                    <td>{{ $encu->id }}</td>
                                    <td>{{ $encu->codigo_femsa }}</td>
                                    <td>{{ $encu->razonSocial }}</td>
                                    <td>{{ $encu->activacion }}</td>
                                    <td>{{ $encu->segmento }}</td>
                                    <td>{{ $encu->tipologia }}</td>
                                    <td>{{ $encu->created_at }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="BasicExample">
                                            <a href="{{ url('/pdfExport/' . $encu->id) }}"
                                                class="btn btn-success btn-sm"><i class="fas fa-file-pdf"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade pqr" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container modal-form">

                    {!! Form::open(['route' => 'storeVisitor', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <h1 style="text-align: center">GESTOR DE PQRS</h1>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Area</span>
                        </div>
                        <select name="area" id="area" class="form-control" aria-label="area"
                            aria-describedby="basic-addon1" required>
                            <option value="" disabled selected>Seleccione el area a la que va el requerimiento
                            </option>
                            @foreach ($area as $ar)
                                <option value="{{ $ar }}">{{ $ar }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="femsa_id" placeholder="ingrese el id FEMSA"
                            aria-label="id femsa" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">id FEMSA</span>
                        </div>
                    </div>


                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="tituloReq"
                            placeholder="titule su requerimiento" aria-label="titulo requerimiento"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">Requerimiento</span>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Detalle</span>
                        </div>
                        <textarea class="form-control" name="detalle" aria-label="amplie la solicitud"></textarea>
                    </div>
                    <br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Adjunte una imagen</span>
                        </div>
                        <input type="file" name="evidenciapqr">
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Enviar">
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
@section('css')
    <style>
        .modal-form {

            padding: 2rem;
        }

        .modal-content .container {

            padding: 3rem;
        }
    </style>
@stop
@section('js')
    {{--  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#pdf_table').DataTable();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#gold_table').DataTable();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#silver_table').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#bronce_table').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#bar_table').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#tienda_table').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#lico_table').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#juegos_table').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#otro_table').DataTable();
        });
    </script>
@stop
