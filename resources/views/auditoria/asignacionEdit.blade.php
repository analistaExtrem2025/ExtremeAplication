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
                                <select name="asignadoA" id="asignadoA" class="form-control selectpicker selector"
                                    data-style="btn-primary" title="Seleccionar" required>
                                    <option disabled selected value="--" required>Seleccione un promotor </option>
                                    @foreach ($usuarios as $user)
                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col"><input class="form-control" type="date" name="fechaAsignado"></div>
                            <input type="text" value="Asignado">
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
                                <select name="asignadoA" id="asignadoA" class="form-control selectpicker selector"
                                    data-style="btn-primary" title="Seleccionar" required>
                                    <option disabled selected value="--">Seleccione un promotor </option>
                                    @foreach ($usuarios as $user)
                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col"><input class="form-control" type="date" name="fechaAsignado" id="fechaAsignado"></b></div>
                            <div class="col">
                                <div class="col">
                                    <input type="text" class="form-control" value="Asignado" readonly>
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
                        <select name="estatusGestion" id="estatusGestion" required class="form-control">
                        <option value=" "selected disabled> Indica la razón de la eliminacíon </option>
                        <option value=" ">Se debe gestionar de nuevo</option>
                        <option value="sin cobertura">Punto sin cobertura</option>
                        <option value="zona roja">Zona roja </option>
                        <option value=" ">Sin promotor en la zona</option>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="asignadoA" value="null">
                <input type="hidden" name="fechaAsignado" value="0000-00-00">


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
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "nueva") {
                    $("#nuevaRuta").show();
                    $("#editRuta").hide();
                    $("#borrarRuta").hide();
                } else if (valor == "edita") {
                    $("#nuevaRuta").hide();
                    $("#editRuta").show();
                    $("#borrarRuta").hide();
                } else if (valor == "elimina") {
                    $("#nuevaRuta").hide();
                    $("#editRuta").hide();
                    $("#borrarRuta").show();
                }
            });
        });
    </script>
@stop
