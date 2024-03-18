@extends('adminlte::page')
@section('title', 'notificaciones y pqr')

@section('css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/css-toggle-switch/latest/toggle-switch.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Arapey:400,400i,600|Open+Sans:300" rel="stylesheet">
    <link href="{{ asset('css/auditoria.css') }}" rel="stylesheet">
@stop
@php
    use Illuminate\Http\Request;
    $estatus = [
        'En tramite' => 'En tramite',
        'Caso cerrado' => 'Caso cerrado',
    ];
@endphp
@section('content')
    <div class="container">
        <h4>DATOS DEL CASO</h4>
        <br>
        <span>Solicitado por:</span>
        <p class="dataPqr">{{ $pqr->creado_por }}</p>
        <br>
        <span>Destinatario</span>
        <p class="dataPqr">{{ $pqr->area }}</p>
        <br>
        <span>Codigo femsa</span>
        <p class="dataPqr">{{ $pqr->femsa_id }}</p>
        <br>
        <span>Requerimiento</span>
        <p class="dataPqr">{{ $pqr->tituloReq }}</p>
        <br>
        <span>Detalle</span>
        <p class="dataPqr">{{ $pqr->detalle }}</p>
        <br>
        <span>Evidencia PQR</span>
        @if ($pqr->evidenciapqr == 'no registra evidencia' || $pqr->evidenciapqr == NULL )

        <img src="{{ asset('img/sinEvidencia.png') }}" alt="">

        @else
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('PQR_' . $pqr->id . '.png'))) }}"
        class="evidencia" />
        @endif
        <br>
        <span>Estatus actual</span>
        <p class="dataPqr">{{ $pqr->estatusRespuesta }}</p>
        <br>
        {!! Form::model($pqr, [
            'route' => ['PqryRtas.update', $pqr->id],
            'method' => 'PATCH',
            'enctype' => 'multipart/form-data',
            'files' => 'true',
        ]) !!}
        <span>Estatus de respuesta</span>
        <select name="estatusRespuesta" class="dataPqr" required>
            <option value="" disabled selected>Seleccione el estatus</option>
            @foreach ($estatus as $est)
                <option value="{{ $est }}">{{ $est }}</option>
            @endforeach
        </select>
        <br><br>
        <span>Observaciones</span>
        <textarea class="dataPqr" name="observaciones" id="" cols="30" rows="10" required></textarea>
        <br><br>

        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}

    </div>
    {!! Form::close() !!}
@stop
