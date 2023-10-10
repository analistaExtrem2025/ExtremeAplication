@extends('adminlte::page')
@section('title', 'Encuestas')
@section('css')
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop
@section('content_header')
    <h1>Auditoria</h1>
    {{--  <a href="{{ route('auditoria.create') }}"><button class="float-right btn btn-primary">Crear Nueva Auditoria</button></a>  --}}
@stop
@section('content')

    <div class="container">
        <table class="table table-bordered data-table" id="encuestas_table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Razon Social</th>
                    <th>Direccion</th>
                    <th>Barrio</th>
                    <th>Segmento</th>
                    <th>Tipologia</th>
                    <th width="105px">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($auditoria as $encu)
                    <tr>
                        <td>{{ $encu->id }}</td>
                        <td>{{ $encu->razonSocial }}</td>
                        <td>{{ $encu->direccion }}</td>
                        <td>{{ $encu->barrio }}</td>
                        <td>{{ $encu->segmento }}</td>
                        <td>{{ $encu->tipologia }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="BasicExample">
                                <a href="{{ url('/Galeria/' . $encu->id) }}" class="btn btn-success btn-sm"><i
                                        class="fas fa-edit"></i></a>
                                        <a href="{{url('myPDF' , $encu->id)}}"><button class="btn btn-c">descargar pdf</button></a>
                                {{--  &nbsp;&nbsp;
                                {!! Form::open(['route' => ['encuesta.diageo.destroy', $encu->id], 'method' => 'DELETE']) !!}
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                {!! Form::close() !!}  --}}
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