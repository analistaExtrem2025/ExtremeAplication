@extends('adminlte::page')
@section('title', 'Administracion auditorias')
@section('css')
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop
@section('content_header')
    <h1>Panel de administración de auditorias</h1>

@stop
@section('content')

    <div class="container">
        <table class="table table-bordered data-table" id="encuestas_table">
            <thead>
                <tr>
                    <th width="10px">id</th>
                    <th width="10px">id precarga</th>
                    <th width="10px">Auditor</th>
                    <th width="10px">fecha de creacion</th>
                    <th width="10px">Encargado Calidad</th>
                    <th width="10px">Observaciones Calidad</th>
                    <th width="10px">Fecha de revisión</th>
                    <th width="10px">Criticidad</th>
                    <th width="105px">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($puntos_auditoria as $p_a)
                    <tr>
                        <td>{{ $p_a->id }}</td>
                        <td>{{ $p_a->precarga_id }}</td>
                        <td>{{ $p_a->promotor }}</td>
                        <td>{{ $p_a->created_at }}</td>
                        <td>{{ $p_a->revisadoPor }}</td>
                        <td>{{ $p_a->revisionCalidad }}</td>
                        <td>{{ $p_a->fechaCalidad }}</td>
                        <td>{{ $p_a->criticidad }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="BasicExample">
                                <a href="{{ url('/Galeria/' . $p_a->id) }}" class="btn btn-success btn-sm"><i
                                    class="fas fa-edit"></i></a>
                            </div>
                            <div class="btn-group" role="group" aria-label="BasicExample">
                                <a href="{{ url('/asignaciones/' . $p_a->id) }}" class="btn btn-info btn-sm"><i class="fas fa-shoe-prints"></i></a>

                            </div>
                            <div class="btn-group" role="group" aria-label="BasicExample">
                            {!! Form::open(['route' => ['Galeria.destroy', $p_a->id], 'method' => 'DELETE']) !!}
                            <button class="btn btn-dark btn-sm"><i class="fas fa-skull-crossbones"></i></button>
                            {!! Form::close() !!}
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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
            $('#encuestas_table').DataTable();
        });
    </script>
@stop
