@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <a href="{{ route('encuesta.diageo.create') }}" class="btn btn-primary float-right">Nuevo Punto
    </a><br><br>
@stop
@section('content')



    <div class="container">

        <table class="table table-bordered data-table" id="encuestas_table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre de Negocio</th>
                    <th>Direccion</th>
                    <th>Proceso</th>
                    <th>Estado</th>
                    <th width="105px">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($encuestas as $encu)
                    <tr>
                        <td>{{ $encu->id }}</td>
                        <td>{{ $encu->razonSocial }}</td>
                        <td>{{ $encu->direccion }}</td>
                        <td>{{ $encu->gestionActual}}</td>
                        <td>{{ $encu->estadoCarga}}</td>

                        @can('encuesta.diageo.edit')


                        <td>
                            <a href="{{ url('/encuestas/'.$encu->id.'/edit') }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                        </td>
                        @endcan
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
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
            $('#encuestas_table').DataTable();
        });
    </script>
@stop
