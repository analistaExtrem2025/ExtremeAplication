@extends('adminlte::page')
@section('title', 'Comparativo de marcas')
@section('css')
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="{{ asset('css/dash.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arapey:400,400i,600|Open+Sans:300" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

@stop

@section('content')

    <div class="row">
        <div class="card full-card">
            <table class="statuspqr table table-bordered" id="pqr_table" >
                <thead>
                    <th style="background: #D9D2C1 !important;" class="th1 actTh3">ID DEL CASO</th>
                    <th style="background: #D9D2C1 !important;" class="th1 actTh3">AREA DE DESTINO</th>
                    <th style="background: #D9D2C1 !important;" class="th1 actTh3">SOLICITANTE</th>
                    <th style="background: #D9D2C1 !important;" class="th1 actTh3">DETALLES</th>
                    <th style="background: #D9D2C1 !important;" class="th1 actTh3">ESTATUS</th>
                    <th style="background: #D9D2C1 !important;" class="th1 actTh3">FECHA DE CREACIÓN</th>
                    <th style="background: #D9D2C1 !important;" class="th1 actTh3">DIAS TRANSCURRIDOS</th>
                    <th style="background: #D9D2C1 !important;" class="th1 actTh3">RESPUESTA</th>
                </thead>
                <tbody>
                    @foreach ($pqr as $key => $pq)
                        <tr>
                            <td>{{ $pq->id }}</td>
                            <td>{{ $pq->area }}</td>
                            <td>{{ $pq->creado_por }}</td>
                            <td style="text-align: left">{{ $pq->detalle }}</td>
                            <td>{{ $pq->estatusRespuesta }}</td>
                            <td>{{ $pq->created_at->format('d-m-Y') }}</td>
                            @if ($pq->estatusRespuesta == 'Caso cerrado')
                                <td class="silverColor"><i class="far fa-check-circle"></i></td>
                            @elseif ($pq->estatusRespuesta == 'En tramite')
                                @if ($pq->created_at->diffInDays($today) < 5)
                                    <td class="greenTop">{{ $pq->created_at->diffInDays($today) }}</td>
                                @elseif($pq->created_at->diffInDays($today) == 5)
                                    <td class="yellowTop">{{ $pq->created_at->diffInDays($today) }}</td>
                                @elseif($pq->created_at->diffInDays($today) > 6)
                                    <td class="redTop">{{ $pq->created_at->diffInDays($today) }}</td>
                                @endif
                            @elseif($pq->estatusRespuesta == 'Caso creado')
                                @if ($pq->created_at->diffInDays($today) < 5)
                                    <td class="greenTop">{{ $pq->created_at->diffInDays($today) }}</td>
                                @elseif($pq->created_at->diffInDays($today) == 5)
                                    <td class="yellowTop">{{ $pq->created_at->diffInDays($today) }}</td>
                                @elseif($pq->created_at->diffInDays($today) > 6)
                                    <td class="redTop">{{ $pq->created_at->diffInDays($today) }}</td>
                                @endif
                            @endif
                            <td>{{ $pq->observaciones }}</td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#pqr_table').DataTable();
        });
    </script>
@stop
