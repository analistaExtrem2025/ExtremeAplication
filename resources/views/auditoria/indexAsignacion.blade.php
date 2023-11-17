@extends('adminlte::page')
@section('title', 'Asignacion auditorias')
@section('css')
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop
@section('content_header')
    <h1>Listado de auditorias para asignar o editar asignación</h1>



@stop
@section('content')

    <div class="container">
        <table class="table table-bordered data-table" id="encuestas_table">
            <thead>
                <tr>
                    <th width="10px">id</th>
                    <th width="10px">Direccion</th>
                    <th width="10px">Depa y Mun</th>
                    <th width="10px">Barrio</th>
                    <th width="10px">Asignado a</th>
                    <th width="10px">Estatus de gestión</th>
                    <th width="10px">Fecha de asignacion</th>
                    <th width="10px">Fecha de finzalización</th>
                    <th width="105px">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($puntos_auditoria as $p_a)
                    <tr>
                        <td>{{ $p_a->id }}</td>
                        <td>{{ $p_a->direccion }}</td>
                        <td>{{ $p_a->departamento }} {{ $p_a->municipio }}</td>
                        <td>{{ $p_a->barrio }}</td>
                        <td>{{ $p_a->asignadoA }}</td>
                        <td>{{ $p_a->estatusGestion }}</td>
                        <td>{{ $p_a->fechaAsignado }}</td>
                        <td>{{ $p_a->fechaFinalizado }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="BasicExample">
                                <a href="{{ url('/asignaciones/' . $p_a->id) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>

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
