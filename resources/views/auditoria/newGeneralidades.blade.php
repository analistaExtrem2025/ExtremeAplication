@extends('adminlte::page')
@section('title', 'Generalidades')
@section('css')
    <link href="https://cdn.jsdelivr.net/css-toggle-switch/latest/toggle-switch.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Arapey:400,400i,600|Open+Sans:300" rel="stylesheet">
    <link href="{{ asset('css/auditoria.css') }}" rel="stylesheet">
@stop
@section('content')
    <br><br>
    <h5><span class="numeros">8</span>GENERALIDADES DEL DETALLISTA</h5>
    {!! Form::model($puntos_auditoria, [
        'route' => ['generalidades.update', $puntos_auditoria->id],
        'method' => 'put',
        'enctype' => 'multipart/form-data',
        'files' => 'true',
    ]) !!}
    <input type="hidden" name="precarga_id" value="{{ $puntos_auditoria->precarga_id }}">
    <p>
    <div class="col-12 material">
        <div class="card">
            <div class="ttulo">
                <green><span>Registre las generalidades del punto </span></green>
            </div>
            <div class="col">
                <br><br>
                <div class="col">
            <label for="Observaciones"></label>
            {!! Form::textarea('observacionesDetallista', null, ['class' => 'form-control', 'col' => 2, 'row' => 2, 'placeholder' => 'Observaciones', 'required' ])  !!}<span class="badge bg-primary float-right" id="characterCount">0/200</span>
               </div>
            </div>
        </div>
    </div>
    </p>
    {!! Form::submit('Finalizar', ['class' => 'btn btn-primary', 'id' => 'boton']) !!}
    {!! Form::close() !!}
@stop
@push('js')
    <script>
        $('textarea').keyup(function() {
            $('#characterCount').text($(this).val().length + "/200")
        })
    </script>
@endpush
