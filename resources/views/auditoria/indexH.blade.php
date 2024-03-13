@extends('adminlte::page')

@section('title', 'Listado de auditorias descargables')

@section('content_header')
    <h1>Listado de auditorias descargables</h1>
    @can('auditoria.indexH')
        <a href="{{ url('pdf') }}">ir a auditorias actuales</a>
    @endcan

@stop
@section('content')
    <div class="container">
        <table class="table table-bordered data-table" id="pdf_table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Id precarga</th>
                    <th>Raz&oacute;n Social</th>
                    <th>Estado de activacion </th>
                    <th>Segmento</th>
                    <th>Tipolog&iacute;a</th>
                    <th>Creaci&oacute;n</th>
                    <th width="105px">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($historico as $encu)
                    <tr>
                        <td>{{ $encu->id }}</td>
                        <td>{{ $encu->precarga_id }}</td>
                        <td>{{ $encu->razonSocial }}</td>
                        <td>{{ $encu->activacion }}</td>
                        <td>{{ $encu->segmento }}</td>
                        <td>{{ $encu->tipologia }}</td>
                        <td>{{ $encu->created_at }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="BasicExample">
                                <a href="{{ url('/pdfExport/' . $encu->id . '/edit') }}" class="btn btn-success btn-sm"><i
                                        class="fas fa-file-pdf"></i></a>
                            </div>
                            <div class="btn-group" role="group" aria-label="BasicExample">
                                <a href="{{ url('downloadPdfCalidad', $encu->id) }}" class="btn btn-info btn-sm"><i
                                        class="fas fa-file-download"></i></a>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    14602
    29635



@stop
@section('css')

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

@stop
