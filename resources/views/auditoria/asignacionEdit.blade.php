@extends('adminlte::page')

@section('title', 'Edición de rutas')
@section('css')
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@stop
@section('content_header')
    <h1 class="head-title">Edición de rutas y asignaciones</h1>
@stop
@section('content')
    <ul>
        <div class="row">
            <div class="col card-box">
                <ul>
                    <div class="col-sm-12 inner">
                        <div class="card">
                            <h2><strong>INFORMACIÓN DEL PUNTO</strong></h2>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 col-sm-4"><label>Id del cliente</label>
                                        <p class="card-text">{{ $puntos_auditoria->id }}</p>
                                    </div>
                                    <div class="col-6 col-sm-4"><label>Razon social</label>
                                        <p class="card-text">{{ $puntos_auditoria->razonSocial }}</p>
                                    </div>
                                    <div class="col-6 col-sm-4"><label>Nombre del negocio</label>
                                        <p class="card-text">{{ $puntos_auditoria->nombreNegocio }}</p>
                                    </div>
                                    <div class="col-6 col-sm-4"><label>Nit o Cedula</label>
                                        <p class="card-text">{{ $puntos_auditoria->nit }}</p>
                                    </div>
                                    <div class="col-6 col-sm-4"><label>Direcci&oacute;n</label>
                                        <p class="card-text">{{ $puntos_auditoria->direccion }}</p>
                                    </div>
                                    <div class="col-6 col-sm-4"><label>Latitud y Longitud</label>
                                        <p class="card-text">{{ $puntos_auditoria->latitude }}
                                            {{ $puntos_auditoria->longitude }}</p>
                                    </div>
                                    <div class="col-6 col-sm-4"> <label>Departamento</label>
                                        <p class="card-text">{{ $puntos_auditoria->departamento }}</p>
                                    </div>

                                    <div class="col-6 col-sm-4"> <label>Municipio</label>
                                        <p class="card-text">{{ $puntos_auditoria->municipio }}</p>
                                    </div>
                                    <div class="col-6 col-sm-4"> <label>Barrio</label>
                                        <p class="card-text">{{ $puntos_auditoria->barrio }}</p>
                                    </div>
                                    @if ($puntos_auditoria->estatusGestion != null)
                                        <div class="col-6 col-sm-4"> <label>Asigando a:</label>
                                            <p class="card-text">{{ $puntos_auditoria->asignadoA }}</p>
                                        </div>
                                        <div class="col-6 col-sm-4"> <label>Fecha asignación</label>
                                            <p class="card-text">{{ $puntos_auditoria->fechaAsignado }}</p>
                                        </div>
                                        <div class="col-6 col-sm-4"> <label>Estatus de gestión</label>
                                            <p class="card-text">{{ $puntos_auditoria->estatusGestion }}</p>
                                        </div>
                                    @else
                                        <div class="col-6 col-sm-4"> <label>Asigando a:</label>
                                            <p class="card-text">Sin asignar</p>
                                        </div>
                                        <div class="col-6 col-sm-4"> <label>Fecha asignación</label>
                                            <p class="card-text">Sin asignar</p>
                                        </div>
                                        <div class="col-6 col-sm-4"> <label>Estatus de gestión</label>
                                            <p class="card-text">Sin asignar</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </ul>

            </div>
        </div>
    </ul>
    {!! Form::model($puntos_auditoria, [
        'route' => ['asignaciones.update', $puntos_auditoria->id],
        'method' => 'PUT',
    ]) !!}
    @if (Auth::user()->role == 1 || Auth::user()->role == 2)


        <hr>
        <h2>&iquest;Que desea hacer?</h2>
        <ul>
            <div class="radio-buttons">
                <div class="form-group form-check-inline">
                    <input class="inpRadio" type="radio" id="nueva" value="nueva" name="sele" />
                    <label class="labelradio" for="nueva">ASIGNAR NUEVA RUTA</label>
                </div>
                <div class="form-group form-check-inline">
                    <input class="inpRadio" type="radio" id="edita" value="edita" name="sele" />
                    <label class="labelradio" for="edita">EDITAR UNA RUTA</label>
                </div>
                <div class="form-group form-check-inline">
                    <input class="inpRadio" type="radio" id="elimina" value="elimina" name="sele" />
                    <label class="labelradio" for="elimina">ELIMINAR RUTA</label>
                </div>
            </div>
        </ul>

        <ul>
            <div id="nuevaRuta" style="display: none">
                <div class="row">
                    <div class="col card-box">

                        <div class="row">
                            <div class="col">Asignado a :</div>
                            <div class="col">Fecha de asignación:</div>
                            <hr>
                            <div class="w-100"></div>
                            <div class="col">
                                <select name="asignadoA" id="asignadoA1" class="form-control selectpicker selector"
                                    data-style="btn-primary" title="Seleccionar" required disabled>
                                    <option disabled selected value="--" required>Seleccione un promotor </option>
                                    @foreach ($usuarios as $user)
                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <input class="form-control" type="date" id="fechaAsignado1" name="fechaAsignado" disabled>
                            </div>
                            <input type="hidden" value="Asignado" id="estatusGestion1" id="estatusGestion1" name="estatusGestion" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </ul>
        <hr>
        <ul>
            <div id="editRuta" style="display: none">
                <div class="row">
                    <div class="col card-box">
                        <div class="row">
                            <div class="col">Asignado a :</div>
                            <div class="col">Fecha de asignación:</div>
                            <div class="col">Estatus de gestión:</div>
                            <hr>
                            <div class="w-100"></div>
                            <div class="col"><b> {{ $puntos_auditoria->asignadoA }}</b></div>
                            <div class="col"><b> {{ $puntos_auditoria->fechaAsignado }}</b></div>
                            <div class="col"><b> {{ $puntos_auditoria->estatusGestion }}</b></div>
                            <hr>
                            <div class="w-100"></div>
                            <div class="col">Nueva asignacion a:</div>
                            <div class="col">Fecha de asignación: </div>
                            <div class="col">el estatus de gestión se actualizara a : </div>
                            <hr>
                            <div class="w-100"></div>
                            <div class="col">
                                <select name="asignadoA" id="asignadoA2" class="form-control selectpicker selector"
                                    data-style="btn-primary" title="Seleccionar" required disabled>
                                    <option disabled selected value="--">Seleccione un promotor </option>
                                    @foreach ($usuarios as $user)
                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <input class="form-control" type="date" name="fechaAsignado" id="fechaAsignado2" disabled>
                            </div>
                            <div class="col">
                                <div class="col">
                                    <input type="text" class="form-control" value="Asignado" name="estatusGestion" id="estatusGestion2" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </ul>
        <hr>
        <ul>
            <div id="borrarRuta" style="display: none">
                <div class="row">
                    <div class="col card-box">
                        <select name="estatusGestion" id="estatusGestion3"  class="form-control" required disabled>
                        <option value=" "selected disabled> Indica la razón de la eliminacíon </option>
                        <option value=" ">Se debe gestionar de nuevo</option>
                        <option value="sin cobertura">Punto sin cobertura</option>
                        <option value="zona roja">Zona roja </option>
                        <option value=" ">Sin promotor en la zona</option>
                        </select>
                    </div>
                    <input type="hidden" name="asignadoA" id="asignadoA3" disabled value="">
                    <input type="hidden" name="fechaAsignado" id="fechaAsignado3" disabled value="">
                    <input type="hidden" name="fechaFinalizado" id="fechaFinalizado" disabled value="">

                </div>
            </div>
        </ul>
        <hr>

    @endif
    {!! Form::submit('Finalizar', ['class' => 'btn btn-primary', 'id' => 'boton']) !!}
    {!! Form::close() !!}
@stop
@section('js')
    <script>
        $(document).ready(function() {

            element1 = document.getElementById("nuevaRuta");
            element2 = document.getElementById("editRuta");
            element3 = document.getElementById("borrarRuta");
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "nueva") {
                    element1.style.display = 'block';
                    $("#asignadoA1").prop('disabled', false);
                    $("#fechaAsignado1").prop('disabled', false);
                    $("#estatusGestion1").prop('disabled', false);
                    element2.style.display = 'none';
                    $("#asignadoA2").prop('disabled', true);
                    $("#fechaAsignado2").prop('disabled', true);
                    $("#estatusGestion2").prop('disabled', true);
                    element3.style.display = 'none';
                    $("#asignadoA3").prop('disabled', true);
                    $("#estatusGestion3").prop('disabled', true);


                } else if (valor == "edita") {
                    element1.style.display = 'none';
                    $("#asignadoA1").prop('disabled', true);
                    $("#fechaAsignado1").prop('disabled', true);
                    $("#estatusGestion1").prop('disabled', true);
                    element2.style.display = 'block';
                    $("#asignadoA2").prop('disabled', false);
                    $("#fechaAsignado2").prop('disabled', false);
                    $("#estatusGestion2").prop('disabled', false);
                    element3.style.display = 'none';
                    $("#asignadoA3").prop('disabled', true);
                    $("#estatusGestion3").prop('disabled', true);
                } else if (valor == "elimina") {
                    element1.style.display = 'none';
                    $("#asignadoA1").prop('disabled', true);
                    $("#fechaAsignado1").prop('disabled', true);
                    $("#estatusGestion1").prop('disabled', true);
                    element2.style.display = 'none';
                    $("#asignadoA2").prop('disabled', true);
                    $("#fechaAsignado2").prop('disabled', true);
                    $("#estatusGestion2").prop('disabled', true);
                    element3.style.display = 'block';
                    $("#asignadoA3").prop('disabled', false);
                    $("#asignadoA3").val('');
                    $("#estatusGestion3").prop('disabled', false);
                    $("#fechaAsignado3").prop('disabled', false);
                    $("#fechaFinalizado").prop('disabled', false);
                    $("#fechaFinalizado").val('0000-00-00');
                    $("#fechaAsignado3").val('0000-00-00');

                }
            });
        });
    </script>
@stop
