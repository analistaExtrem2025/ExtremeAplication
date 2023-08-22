@extends('adminlte::page')
@section('title', 'Inicio')
@section('css')
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    {{--  <link href="{{ asset('css/diageo_inicio.css') }}" type="text/css" rel="stylesheet">  --}}
@stop
@section('content_header')
    {{--  <div class="container">
        <div class="row">
            <!-- flex-container -->
            <div class="col-md-12 flex-container">
                <!-- flex-item -->
                <div class="flex-item">
                    <div class="flex-item-inner">
                        <!-- card -->
                        <a href="{{ route('diageo_activados.create') }}">
                            <div class="card-front bg-violet">
                                <h4>Activados <br> Hoy</h4>
                                <p class="detail">{{ $activadosHoy }}</p>
                            </div>
                            <div class="card-back bg-violet">
                                <h4>Activados Acumulados</h4>
                                <p class="detail">{{ $activados }}</p>
                            </div>
                        </a>
                        <!-- /card -->
                    </div>
                </div>
                <!-- /flex-item -->

                <!-- flex-item -->
                <div class="flex-item">
                    <div class="flex-item-inner">
                        <!-- card -->
                        <a href="{{ route('diageo_noactivados.create') }}">
                            <div class="card-front bg-magenta">
                                <h4>No Concretados Hoy</h4>
                                <p class="detail">{{ $noactivadosHoy }}</p>
                            </div>
                            <div class="card-back bg-magenta">
                                <h4>No Concretados Acumulados</h4>
                                <p class="detail">{{ $noactivados }}</p>
                            </div>
                        </a>
                        <!-- /card -->
                    </div>
                </div>
                <!-- /flex-item -->
                <!-- flex-item -->
                <div class="flex-item">
                    <div class="flex-item-inner">
                        <!-- card -->
                        <a href="#">
                            <div class="card-front bg-blue">
                                <h4>Femsa <br> Hoy</h4>
                                <p class="detail">{{ $femsaHoy }}</p>
                            </div>
                            <div class="card-back bg-blue">
                                <h4>Femsa Acumulados</h4>
                                <p class="detail">{{ $femsa }}</p>
                            </div>
                        </a>
                        <!-- /card -->
                    </div>
                </div>
                <!-- /flex-item -->

                <!-- flex-item -->
                <div class="flex-item">
                    <div class="flex-item-inner">
                        <!-- card -->
                        <a href="{{ route('diageo_cerrados.create') }}">
                            <div class="card-front bg-green">
                                <h4>Cerrados <br> Hoy</h4>
                                <p class="detail">{{ $cerradosHoy }}</p>
                            </div>
                            <div class="card-back bg-green">
                                <h4>Cerrados Acumulados</h4>
                                <p class="detail">{{ $cerrados }}</p>
                            </div>
                        </a>
                        <!-- /card -->
                    </div>
                </div>
                <!-- flex-item -->
            </div>
            <!-- /flex-container -->
        </div>
    </div> --}}

@endsection
@section('content')

    <div class="container">
        <table class="table table-bordered data-table" id="encuestas_table">
            <thead>
                <tr>
                    @can('encuesta.diageo.edit')
                        <th>id</th>
                        <th>Razon Social</th>
                        <th>Estatus de Calidad</th>
                        <th>Proceso</th>
                        {{--  <th>Motivo</th>  --}}
                        {{--  <th>Estatus Calidad</th>  --}}
                        <th width="105px">Acciones</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($encuestas as $encu)
                    <tr>
                        @can('encuesta.diageo.edit')
                            <td>{{ $encu->id }}</td>
                            <td>{{ $encu->razonSocial }}</td>
                            <td>{{ $encu->estadoEnvio }}</td>
                            <td>{{ $encu->respuestaEnvio }}</td>
                            {{--  <td>{{ $encu->estadoCarga }}</td>  --}}
                            {{--  <td>{{ $encu->estatusCalidad }}</td>  --}}
                            <td>
                                <div class="btn-group" role="group" aria-label="BasicExample">
                                    <a href="{{ url('/encuestas/' . $encu->id . '/edit') }}" class="btn btn-success btn-sm"><i
                                            class="fas fa-edit"></i></a>
                                    &nbsp;&nbsp;
                                    @can('admin.diageo')
                                        {!! Form::open(['route' => ['encuesta.diageo.destroy', $encu->id], 'method' => 'DELETE']) !!}
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
@endsection

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
