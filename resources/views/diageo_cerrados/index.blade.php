@extends('adminlte::page')
@section('title', 'Lista de Cerrados')
@section('content_header')
@section('content')
    <div class="container">
        <table class="table table-bordered data-table" id="cerrados_table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Canal</th>
                    <th>Direccion</th>
                    <th>Municipio</th>
                    <th>Localidad</th>
                    <th>Barrio</th>
                    @can('encuesta.diageo.edit')
                        <th>Estatus Calidad</th>
                        <th>Gestión de Calidad </th>
                        <th width="105px">Acciones</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($cerrados as $close)
                    <tr>
                        <td>{{ $close->id }}</td>
                        <td>{{ $close->canal }}</td>
                        <td>{{ $close->direccion }}</td>
                        <td>{{ $close->municipio }}</td>
                        <td>{{ $close->localidad }}</td>
                        <td>{{ $close->barrio }}</td>
                        @can('encuesta.diageo.edit')
                            <td>{{ $close->estatusCalidad }}</td>
                            <td>{{ $close->gestionCalidad }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="BasicExample">
                                    <a href="{{ url('/diageo_cerrados/' . $close->id . '/edit') }}"
                                        class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>&nbsp;
                                    @can('admin.diageo')
                                        {!! Form::open(['route' => ['diageo_cerrados.destroy', $close->id], 'method' => 'DELETE']) !!}
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                        {!! Form::close() !!}
                                    @endcan
                                </div>
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
@section('js')
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#cerrados_table').DataTable();
        });
    </script>
@stop
