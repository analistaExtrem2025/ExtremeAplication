@extends('adminlte::page')
@section('title', 'Auditorias')
@section('css')
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        .btnIndexInicio {
            background: #00ff22;
            width: 90px;
            border-radius: 0.5rem;
            -webkit-border-radius: 0.5rem;
            -moz-border-radius: 0.5rem;
            -ms-border-radius: 0.5rem;
            -o-border-radius: 0.5rem;
            color: #001733;
            font-weight: bold;
            text-align: center;
            height: 30px;
            padding: 3px;
        }

        .btnIndexInicio:hover {

            background: #01a217;
            color: #ffffff;

        }

        .btnIndexPendiente {
            background: #f6ff00;
            width: 90px;
            border-radius: 0.5rem;
            -webkit-border-radius: 0.5rem;
            -moz-border-radius: 0.5rem;
            -ms-border-radius: 0.5rem;
            -o-border-radius: 0.5rem;
            color: #ff0000;
            font-weight: bold;
            text-align: center;
            height: 30px;
            padding: 3px;
        }

        .btnIndexPendiente:hover {

            background: #7a7e00;
            color: #ff0000;

        }

        .container {
            margin: 50px;
        }

        /*-------- flex container --------*/
        .flex-container {
            display: flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: -webkit-box;
            display: -webkit-flex;
            justify-content: space-around;
            list-style: none;
            margin: 0;
            padding: 0;
            -webkit-flex-flow: row wrap;
            position: relative;
        }

        .flex-item {
            color: #fff;
            height: 100px;
            margin-top: 5%;
            padding: 0;
            width: 225px;
            position: relative;


        }

        .container-fluid{
            margin-top: -10%;
        }

        .flex-item-inner {
            display: flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: -webkit-box;
            display: -webkit-flex;
            flex-direction: column;
            justify-content: flex-start;
            height: 210px;
            margin: 0;
            padding: 0;
            width: 100%;

        }

        .flex-item-inner a {
            color: #fff;
            cursor: pointer;
        }

        /*-------- cards --------*/
        .card-front,
        .card-back {
            position: absolute;
            top: 0;
            left: 0;
            width: 185px;
            height: 100px;
            padding: 20px;
            margin: 0;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-transition: -webkit-transform 0.3s;
            transition: transform 0.3s;
            justify-content: flex-end;
            border-radius: 0.75rem;
        }
        .card-front.bg-violet {
            background-color: #702082;
        }

        .card-front.bg-magenta {
            background-color: #a79614;
        }

        .card-front.bg-blue {
            background-color: #066683 !important;
        }

        .card-front.bg-green {
            background-color: #00c389;
        }

        .card-back {
            background-color: #1e1e1e;
            -webkit-transform: rotateY(-180deg);
            transform: rotateY(-180deg);
        }



        .card-back.bg-violet {
            background-color: #3c1245;

        }

        .card-back.bg-magenta {
            background-color: #400435;
        }

        .card-back.bg-blue {
            background-color: #0d181c;
        }

        .card-back.bg-green {
            background-color: #02251b !important;
        }

        /*-------- cards / flip effect --------*/
        .flex-item:hover .card-front {
            -webkit-transform: rotateY(-180deg);
            transform: rotateY(-180deg);
        }

        .flex-item:hover .card-back {
            -webkit-transform: rotateY(0);
            transform: rotateY(0);
        }


        .card-front h4{
            color: #ffffff !important;
            font-size: 18px;
            font-weight: bold !important;
        }
        .card-back h4{

            color: #ffffff !important;
            font-size: 18px;
            font-weight: bold !important;
        }
        .card-front .detail{
            color: #ffffff !important;
            font-size: 16px;
            font-weight: bold !important;
        }
        .card-back .detail{

            color: #ffffff !important;
            font-size: 16px;
            font-weight: bold !important;
        }

    </style>
@stop
@section('content_header')
    <h1>Listado de auditorias asignadas</h1>
    <a href="#myModal" class="trigger-btn right" data-toggle="modal">Revisar notificaciones</a>

@stop

@section('content')

<div class="container">
    <div class="row">
        <!-- flex-container -->
        <div class="col-md-12 flex-container">

            <!-- flex-item -->
            <div class="flex-item">
                <div class="flex-item-inner">
                    <!-- card -->
                        <div class="card-front bg-info">
                            <h4>Asignados<br> Hoy</h4>
                            <p class="detail">{{ $asignados }}</p>
                        </div>
                        <div class="card-back bg-violet">
                            <h4>No gestionados <br> otras fechas</h4>
                            <p class="detail">{{ $asignadosNoGestionado }}</p>
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
                        <div class="card-front bg-violet">
                            <h4>Finalizados <br> Hoy</h4>
                            <p class="detail">{{ $finalizadosHoy }}</p>
                        </div>
                        <div class="card-back bg-violet">
                            <h4>Finalizados <br> Acumulados</h4>
                            <p class="detail">{{ $finalizados}}</p>
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
                        <div class="card-front bg-magenta">
                            <h4>Errores de fondo</h4>
                            <p class="detail">{{ $calidadFondo }}</p>
                        </div>
                        <div class="card-back bg-magenta">
                            <h4>Errores de forma</h4>
                            <p class="detail">{{ $calidadForma }}</p>
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
                    <div class="card-front bg-blue">
                            <h4>Errores de fondo y forma</h4>
                            <p class="detail">{{ $calidadAmbos }}</p>
                        </div>
                        <div class="card-back bg-blue">
                            <h4>Casos sin cerrar</h4>
                            <p class="detail">{{ $pendienteCierre }}</p>
                        </div>
                    </a>
                    <!-- /card -->
                </div>
            </div>
            <!-- /flex-item -->
        </div>
        <!-- /flex-container -->
    </div>
</div>


    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-login">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Comunicado No1</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Auditores, en este momento se les ha habilitado, la posibilidad de que sus casos no gestionados por
                        temas de plataforma se puedan concluir desde donde quedaron.</p>
                    <p>Los casos se irán discriminando en colores según el estado de gestión.</p>
                    <img src="{{ asset('img/notices/foto1.jpg') }}" alt="" width="100%">

                    <p>Los verdes, son los puntos que están listos para gestionar y a los que no se les ha realizado ningún
                        ingreso.</p>

                    <img src="{{ asset('img/notices/foto2.jpg') }}" alt="" width="100%">
                    <p>Los amarillos son los puntos que ya tiene algún ingreso y como novedad este botón remitirá
                        directamente a donde se quedaron, para así dar cierre a la gestión del punto.</p>
                    <p>Los casos que ya quedaron gestionados completamente se irán borrando de la lista como ya sucedía
                        anteriomente.</p>
                    <p>Esperamos este cambio repercuta en la mejora de los indicadores de todos y en la optimización de los
                        procesos autogestionables.</p>

                    <p>Saludos Cordiales</p>
                    <br>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table table-bordered data-table" id="auditorias_table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Razon Social</th>
                    <th>Nombre del negocio</th>
                    <th>Direccion</th>
                    <th>Barrio</th>
                    <th>Segmento</th>
                    <th>Tipologia</th>
                    <th width="105px">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($puntos_auditoria as $PdeA)
                    <tr>
                        <td>{{ $PdeA->id }}</td>
                        <td>{{ $PdeA->razonSocial }}</td>
                        <td>{{ $PdeA->nombreNegocio }}</td>
                        <td>{{ $PdeA->direccion }}</td>
                        <td>{{ $PdeA->barrio }}</td>
                        <td>{{ $PdeA->segmentacion }}</td>
                        <td>{{ $PdeA->tipologia }}</td>
                        @if ($PdeA->estatusGestion == 'Asignado')
                            <td>
                                <div class="btn-group" role="group" aria-label="BasicExample" title="inicio">
                                    <a href="{{ url('/auditoria/' . $PdeA->id) }}" class="btnIndexInicio"><i
                                            class="far fa-play-circle"></i></a>
                                </div>
                            </td>
                        @elseif ($PdeA->estatusGestion == 'paso 1 - activacion')
                            <td>
                                <div class="btn-group" role="group" aria-label="BasicExample" title="tipologia">
                                    <a href="{{ url('/tipologia/' . $PdeA->precarga_id) }}" class="btnIndexPendiente"><i
                                            class="fas fa-exclamation-circle"></i></a>
                                </div>
                            </td>
                        @elseif ($PdeA->estatusGestion == 'paso 2 - tipologia')
                            <td>
                                <div class="btn-group" role="group" aria-label="BasicExample" title="segmento">
                                    <a href="{{ url('/segmento/' . $PdeA->precarga_id) }}" class="btnIndexPendiente"><i
                                            class="fas fa-exclamation-circle"></i></a>
                                </div>
                            </td>
                        @elseif ($PdeA->estatusGestion == 'paso 3 - segmento')
                            <td>
                                <div class="btn-group" role="group" aria-label="BasicExample" title="materiales">
                                    <a href="{{ url('/materiales/' . $PdeA->precarga_id) }}" class="btnIndexPendiente"><i
                                            class="fas fa-exclamation-circle"></i></a>
                                </div>
                            </td>
                        @elseif ($PdeA->estatusGestion == 'paso 4 - materiales')
                            <td>
                                <div class="btn-group" role="group" aria-label="BasicExample" title="disponibilidad">
                                    <a href="{{ url('/disponibilidad/' . $PdeA->precarga_id) }}"
                                        class="btnIndexPendiente"><i class="fas fa-exclamation-circle"></i></a>
                                </div>
                            </td>
                        @elseif ($PdeA->estatusGestion == 'paso 5 - disponibilidad')
                            <td>
                                <div class="btn-group" role="group" aria-label="BasicExample" title="exhibicion">
                                    <a href="{{ url('/comparativo/' . $PdeA->precarga_id) }}" class="btnIndexPendiente"><i
                                            class="fas fa-exclamation-circle"></i></a>
                                </div>
                            </td>
                            @elseif ($PdeA->estatusGestion == 'paso 6 - comparativo')
                            <td>
                                <div class="btn-group" role="group" aria-label="BasicExample" title="exhibicion">
                                    <a href="{{ url('/exhibicion/' . $PdeA->precarga_id) }}" class="btnIndexPendiente"><i
                                            class="fas fa-exclamation-circle"></i></a>
                                </div>
                            </td>
                        @elseif ($PdeA->estatusGestion == 'paso 7 - Exhibicion')
                            <td>
                                <div class="btn-group" role="group" aria-label="BasicExample" title="gifts">
                                    <a href="{{ url('/gifts/' . $PdeA->precarga_id) }}" class="btnIndexPendiente"><i
                                            class="fas fa-exclamation-circle"></i></a>
                                </div>
                            </td>
                        @elseif ($PdeA->estatusGestion == 'paso 8 - gift')
                            <td>
                                <div class="btn-group" role="group" aria-label="BasicExample" title="generalidades">
                                    <a href="{{ url('/generalidades/' . $PdeA->precarga_id) }}"
                                        class="btnIndexPendiente"><i class="fas fa-exclamation-circle"></i></a>
                                </div>
                            </td>
                        @endif
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
            $('#auditorias_table').DataTable();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#myModal').modal('toggle')
        });
    </script>

@stop


