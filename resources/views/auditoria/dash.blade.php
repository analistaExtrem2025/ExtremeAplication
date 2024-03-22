@extends('adminlte::page')
@section('title', 'Dashboard Operativo')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}" />
    <link href="{{ asset('css/dash.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arapey:400,400i,600|Open+Sans:300" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
@stop
@section('content')

    <div id="contenedor_reloj"
        style="width: 400px; font-size:30px; font-family: Lucida Console, Courier New , monospace; text-align:center; margin-left:0;">
    </div>
    <button class="refresh" onClick="history.go(0)" onload="mueveReloj()"><svg class="icon" height="24"
            viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
            <path
                d="m23.8995816 10.3992354c0 .1000066-.1004184.1000066-.1004184.2000132 0 0 0 .1000066-.1004184.1000066-.1004184.1000066-.2008369.2000132-.3012553.2000132-.1004184.1000066-.3012552.1000066-.4016736.1000066h-6.0251046c-.6025105 0-1.0041841-.4000264-1.0041841-1.00006592 0-.60003954.4016736-1.00006591 1.0041841-1.00006591h3.5146443l-2.8117154-2.60017136c-.9037657-.90005932-1.9079498-1.50009886-3.0125523-1.90012523-2.0083682-.70004614-4.2175733-.60003954-6.12552305.30001977-2.0083682.90005932-3.41422594 2.50016478-4.11715481 4.5002966-.20083682.50003295-.80334728.80005275-1.30543933.60003954-.50209205-.10000659-.80334728-.70004613-.60251046-1.20007909.90376569-2.60017136 2.71129707-4.60030318 5.12133891-5.70037568 2.41004184-1.20007909 5.12133894-1.30008569 7.63179914-.40002637 1.4058578.50003296 2.7112971 1.30008569 3.7154812 2.40015819l3.0125523 2.70017795v-3.70024386c0-.60003955.4016736-1.00006591 1.0041841-1.00006591s1.0041841.40002636 1.0041841 1.00006591v6.00039545.10000662c0 .1000066 0 .2000132-.1004184.3000197zm-3.1129707 3.7002439c-.5020921-.2000132-1.1046025.1000066-1.3054394.6000396-.4016736 1.1000725-1.0041841 2.200145-1.9079497 3.0001977-1.4058578 1.5000989-3.5146444 2.3001516-5.623431 2.3001516-2.10878662 0-4.11715482-.8000527-5.72384938-2.4001582l-2.81171548-2.6001714h3.51464435c.60251046 0 1.0041841-.4000263 1.0041841-1.0000659 0-.6000395-.40167364-1.0000659-1.0041841-1.0000659h-6.0251046c-.10041841 0-.10041841 0-.20083682 0s-.10041841 0-.20083682 0c0 0-.10041841 0-.10041841.1000066-.10041841 0-.20083682.1000066-.20083682.2000132s0 .1000066-.10041841.1000066c0 .1000066-.10041841.1000066-.10041841.2000132v.2000131.1000066 6.0003955c0 .6000395.40167364 1.0000659 1.0041841 1.0000659s1.0041841-.4000264 1.0041841-1.0000659v-3.7002439l2.91213389 2.8001846c1.80753138 2.0001318 4.31799163 3.0001977 7.02928871 3.0001977 2.7112971 0 5.2217573-1.0000659 7.1297071-2.9001911 1.0041841-1.0000659 1.9079498-2.3001516 2.4100418-3.7002439.1004185-.6000395-.2008368-1.2000791-.7029288-1.3000857z"
                transform="" />
        </svg></button>




    <h2 class="t1">DATOS DE GESTION GENERAL</h2>
    <marquee behavior="scroll" direction="left">
        INFORMACION GENERADA EL {{ $today }} A LAS {{ $hora }}
    </marquee>
    <div class="container">
        <div class="row">
            <div class="col card top-card">
                <h3 class="t1">DISTRIBUCIÓN DE PROMOTORES</h3>
                <table class="TableTop">
                    <thead class="userTableTop">
                        <th class="cityName">Ciudad</th>
                        <th class="cityName">Cantidad</th>
                    </thead>
                    <tbody class="userTable">
                        <tr class="actTr1">
                            <th scope="row" class="nameCity">BOGOTA</th>
                            <td style=" text-align: center;">{{ $usuarioBtaCount }}</td>
                        </tr>
                        <tr class="actTr1">
                            <th scope="row" class="nameCity">MEDELLIN</th>
                            <td style=" text-align: center;">{{ $usuarioMedCount }}</td>
                        </tr>
                        <tr class="actTr1">
                            <th scope="row" class="nameCity">BARRANQUILLA</th>
                            <td style=" text-align: center;">{{ $usuarioBarCount }}</td>
                        </tr>
                        <tr class="actTr1">
                            <th scope="row" class="nameCity">BUCARAMANGA</th>
                            <td style=" text-align: center;">{{ $usuarioBucCount }}</td>
                        </tr>
                        <tr class="actTr1">
                            <th scope="row" class="nameCity">CALI</th>
                            <td style=" text-align: center;">{{ $usuarioCalCount }}</td>
                        </tr>
                    </tbody>

                    <tfoot class="activeTable">
                        <th scope="row">TOTAL</th>
                        <td class="totalCityLigth">{{ $totalUsuarios }}</td>
                    </tfoot>
                </table>
                <table class="TableTop table-hover">
                    <thead class="userTableTop table-striped">
                        <th class="cityName">Ciudad</th>
                        <th class="cityName">Nombre</th>
                    </thead>
                    @foreach ($usuarios as $us)
                        <tbody class="userTable">
                            <td class="nameCity">{{ $us->municipio }}</td>
                            <td class="userName">{{ $us->name }}</td>
                        </tbody>
                    @endforeach
                </table>
            </div>
            <div class="col card top-card">
                <h3 class="t1">VISITAS DE AUDITORIAS </h3>
                <canvas id="activados"></canvas>
                <table class="TableTop">
                    <thead class="userTableTop">
                        <th class="cityName">Ciudad</th>
                        <th class="cityName">Activos</th>
                        <th class="cityName">Inactivos</th>
                    </thead>
                    <tbody class="userTable">
                        <tr class="actTr1">
                            <th scope="row" class="nameCity">BOGOTA</th>
                            <td style=" text-align: center;">{{ $activosBta }}</td>
                            <td style=" text-align: center;">{{ $inactivosBta }}</td>
                        </tr>
                        <tr class="actTr2">
                            <th scope="row" class="nameCity">MEDELLIN</th>
                            <td style=" text-align: center;">{{ $activosMed }}</td>
                            <td style=" text-align: center;">{{ $inactivosMed }}</td>
                        </tr>
                        <tr class="actTr1">
                            <th scope="row" class="nameCity">BARRANQUILLA</th>
                            <td style=" text-align: center;">{{ $activosBar }}</td>
                            <td style=" text-align: center;">{{ $inactivosBar }}</td>
                        </tr>
                        <tr class="actTr2">
                            <th scope="row" class="nameCity">BUCARAMANGA</th>
                            <td style=" text-align: center;">{{ $activosBuc }}</td>
                            <td style=" text-align: center;">{{ $inactivosBuc }}</td>
                        </tr>
                        <tr class="actTr1">
                            <th scope="row" class="nameCity">CALI</th>
                            <td style=" text-align: center;">{{ $activosCal }}</td>
                            <td style=" text-align: center;">{{ $inactivosCal }}</td>
                        </tr>
                    </tbody>
                    <tfoot class="activeTable">
                        <th scope="row">TOTAL</th>
                        <td class="totalCityLigth">{{ $sumActivos }}</td>
                        <td class="totalCityLigth">{{ $sumInactivos }}</td>
                    </tfoot>
                </table>
                <br>
            </div>
            <div class="card-B">
                <div class="cont">
                    <R>Puntos</R>
                    <ul>
                        <li>Visitados <t>{{ $totalAuditorias }}</t>
                        </li>
                        <li>Proyectados <t>{{ $totalPuntos }}</t>
                        </li>
                        <li>Pendientes <t>{{ $pendientes }}</t>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card full-card">
            <h2>CUMPLIMIENTO DE GESTION OPERATIVA DIARIA </h2>
            <body class="reloj" onload="mueveReloj()">
                <form name="form_reloj">
                    <div class="row">
                        <input type="text" class="inputFecha" name="f1t1" id="f1t1">
                        <input type="text" class="inputReloj" name="reloj"
                            onfocus="window.document.form_reloj.reloj.blur()">
                    </div>
                </form>
            </body>
            <table class="statusXl">
                <thead>
                    <th class="th1 actTh3">Promotor</th>
                    <th colspan="3" class="th1 actTh3">Segmento Cargado</th>
                    <th class="th1 actTh3">Total Cargados</th>
                    <th colspan="3" class="th1 actTh3">Segmento Gestionado</th>
                    <th class="th1 actTh3">Total Gestionados</th>
                    <th class="th1 actTh3 totalAvery">% Cum Gold</th>
                    <th class="th1 actTh3 totalAvery">% Cum Silver</th>
                    <th class="th1 actTh3 totalAvery">% Cum Bronce</th>
                    <th class="th1 actTh3 totalAvery">% Cum Total</th>
                    <th class="th1 actTh3">Activos</th>
                    <th class="th1 actTh3">Inctivos</th>
                </thead>
                <tbody>
                    <tr>
                        <td style="background: linear-gradient(90deg, rgba(183,183,183,1) 0%, rgba(224,224,237,1) 46%, rgba(172,172,172,1) 100%);"
                            class="none"></td>
                        <td><img style="width: 30px; heigth: 30px;" class="imgOro" src="{{ asset('img/oro.png') }}"
                                alt=""></td>
                        <td><img style="width: 30px; heigth: 30px;" class="imgPlata" src="{{ asset('img/plata.png') }}"
                                alt=""></td>
                        <td><img style="width: 30px; heigth: 30px;" class="imgBronce"
                                src="{{ asset('img/bronce.png') }}" alt=""></td>
                        <td style="background: linear-gradient(90deg, rgba(183,183,183,1) 0%, rgba(224,224,237,1) 46%, rgba(172,172,172,1) 100%);"
                            class="none"></td>
                        <td><img style="width: 30px; heigth: 30px;" class="imgOro" src="{{ asset('img/oro.png') }}"
                                alt=""></td>
                        <td><img style="width: 30px; heigth: 30px;" class="imgPlata" src="{{ asset('img/plata.png') }}"
                                alt=""></td>
                        <td><img style="width: 30px; heigth: 30px;" class="imgBronce"
                                src="{{ asset('img/bronce.png') }}" alt=""></td>
                        <td style="background: linear-gradient(90deg, rgba(183,183,183,1) 0%, rgba(224,224,237,1) 46%, rgba(172,172,172,1) 100%);"
                            class="none"></td>
                        <td><img style="width: 30px; heigth: 30px;" class="imgOro" src="{{ asset('img/oro.png') }}"
                                alt=""></td>
                        <td><img style="width: 30px; heigth: 30px;" class="imgPlata" src="{{ asset('img/plata.png') }}"
                                alt=""></td>
                        <td><img style="width: 30px; heigth: 30px;" class="imgBronce"
                                src="{{ asset('img/bronce.png') }}" alt=""></td>
                        <td style="background: linear-gradient(90deg, rgba(183,183,183,1) 0%, rgba(224,224,237,1) 46%, rgba(172,172,172,1) 100%);"
                            class="none"></td>
                        <td style="background: linear-gradient(90deg, rgba(183,183,183,1) 0%, rgba(224,224,237,1) 46%, rgba(172,172,172,1) 100%);"
                            class="none"></td>
                        <td style="background: linear-gradient(90deg, rgba(183,183,183,1) 0%, rgba(224,224,237,1) 46%, rgba(172,172,172,1) 100%);"
                            class="none"></td>
                    </tr>
                    <tr>
                        <td class="citys prom">{{ $promotor1 }}</td>
                        <td class="actTh2A">{{ $prom1OpeGl }}</td>
                        <td class="actTh2A">{{ $prom1OpeSl }}</td>
                        <td class="actTh2A">{{ $prom1OpeBr }}</td>
                        <td class="actTh2A">{{ $prom1Ope }}</td>
                        <td class="actTh2B">{{ $prom1GesGl }}</td>
                        <td class="actTh2B">{{ $prom1GesSl }}</td>
                        <td class="actTh2B">{{ $prom1GesBr }}</td>
                        <td class="actTh2B">{{ $prom1Ges }}</td>
                        @if ($prom1CumpCrudoG >= 90.0)
                            <td class="greenTop">{{ $prom1CumpG }}</td>
                        @elseif ($prom1CumpCrudoG >= 69.9)
                            <td class="yellowTop">{{ $prom1CumpG }}</td>
                        @elseif ($prom1CumpCrudoG <= 70.0)
                            <td class="redTop">{{ $prom1CumpG }}</td>
                        @endif
                        @if ($prom1CumpCrudoS >= 90.0)
                            <td class="greenTop">{{ $prom1CumpS }}</td>
                        @elseif ($prom1CumpCrudoS >= 69.9)
                            <td class="yellowTop">{{ $prom1CumpS }}</td>
                        @elseif ($prom1CumpCrudoS <= 70.0)
                            <td class="redTop">{{ $prom1CumpS }}</td>
                        @endif
                        @if ($prom1CumpCrudoB >= 90.0)
                            <td class="greenTop">{{ $prom1CumpB }}</td>
                        @elseif ($prom1CumpCrudoB >= 69.9)
                            <td class="yellowTop">{{ $prom1CumpB }}</td>
                        @elseif ($prom1CumpCrudoB <= 70.0)
                            <td class="redTop">{{ $prom1CumpB }}</td>
                        @endif
                        @if ($prom1CumpCrudo >= 90.0)
                            <td class="greenTop">{{ $prom1Cump }}</td>
                        @elseif ($prom1CumpCrudo >= 69.9)
                            <td class="yellowTop">{{ $prom1Cump }}</td>
                        @elseif ($prom1CumpCrudo <= 70.0)
                            <td class="redTop">{{ $prom1Cump }}</td>
                        @endif
                        <td class="th6">{{ $prom1GesAct }}</td>
                        <td class="th7">{{ $prom1GesIn }}</td>
                    </tr>
                    {{--  <tr>
                        <td class="citys prom">{{ $promotor2 }}</td>
                        <td class="actTh2A">{{ $prom2OpeGl }}</td>
                        <td class="actTh2A">{{ $prom2OpeSl }}</td>
                        <td class="actTh2A">{{ $prom2OpeBr }}</td>
                        <td class="actTh2A">{{ $prom2Ope }}</td>
                        <td class="actTh2B">{{ $prom2GesGl }}</td>
                        <td class="actTh2B">{{ $prom2GesSl }}</td>
                        <td class="actTh2B">{{ $prom2GesBr }}</td>
                        <td class="actTh2B">{{ $prom2Ges }}</td>
                        @if ($prom2CumpCrudoG >= 90.0)
                            <td class="greenTop">{{ $prom2CumpG }}</td>
                        @elseif ($prom2CumpCrudoG >= 69.9)
                            <td class="yellowTop">{{ $prom2CumpG }}</td>
                        @elseif ($prom2CumpCrudoG <= 70.0)
                            <td class="redTop">{{ $prom2CumpG }}</td>
                        @endif
                        @if ($prom2CumpCrudoS >= 90.0)
                            <td class="greenTop">{{ $prom2CumpS }}</td>
                        @elseif ($prom2CumpCrudoS >= 69.9)
                            <td class="yellowTop">{{ $prom2CumpS }}</td>
                        @elseif ($prom2CumpCrudoS <= 70.0)
                            <td class="redTop">{{ $prom2CumpS }}</td>
                        @endif
                        @if ($prom2CumpCrudoB >= 90.0)
                            <td class="greenTop">{{ $prom2CumpB }}</td>
                        @elseif ($prom2CumpCrudoB >= 69.9)
                            <td class="yellowTop">{{ $prom2CumpB }}</td>
                        @elseif ($prom2CumpCrudoB <= 70.0)
                            <td class="redTop">{{ $prom2CumpB }}</td>
                        @endif
                        @if ($prom2CumpCrudo >= 90.0)
                            <td class="greenTop">{{ $prom2Cump }}</td>
                        @elseif ($prom2CumpCrudo >= 69.9)
                            <td class="yellowTop">{{ $prom2Cump }}</td>
                        @elseif ($prom2CumpCrudo <= 70.0)
                            <td class="redTop">{{ $prom2Cump }}</td>
                        @endif
                        <td class="th6">{{ $prom2GesAct }}</td>
                        <td class="th7">{{ $prom2GesIn }}</td>
                    </tr>  --}}
                    <tr>
                        <td class="citys prom">{{ $promotor3 }}</td>
                        <td class="actTh2A">{{ $prom3OpeGl }}</td>
                        <td class="actTh2A">{{ $prom3OpeSl }}</td>
                        <td class="actTh2A">{{ $prom3OpeBr }}</td>
                        <td class="actTh2A">{{ $prom3Ope }}</td>
                        <td class="actTh2B">{{ $prom3GesGl }}</td>
                        <td class="actTh2B">{{ $prom3GesSl }}</td>
                        <td class="actTh2B">{{ $prom3GesBr }}</td>
                        <td class="actTh2B">{{ $prom3Ges }}</td>
                        @if ($prom3CumpCrudoG >= 90.0)
                            <td class="greenTop">{{ $prom3CumpG }}</td>
                        @elseif ($prom3CumpCrudoG >= 69.9)
                            <td class="yellowTop">{{ $prom3CumpG }}</td>
                        @elseif ($prom3CumpCrudoG <= 70.0)
                            <td class="redTop">{{ $prom3CumpG }}</td>
                        @endif
                        @if ($prom3CumpCrudoS >= 90.0)
                            <td class="greenTop">{{ $prom3CumpS }}</td>
                        @elseif ($prom3CumpCrudoS >= 69.9)
                            <td class="yellowTop">{{ $prom3CumpS }}</td>
                        @elseif ($prom3CumpCrudoS <= 70.0)
                            <td class="redTop">{{ $prom3CumpS }}</td>
                        @endif
                        @if ($prom3CumpCrudoB >= 90.0)
                            <td class="greenTop">{{ $prom3CumpB }}</td>
                        @elseif ($prom3CumpCrudoB >= 69.9)
                            <td class="yellowTop">{{ $prom3CumpB }}</td>
                        @elseif ($prom3CumpCrudoB <= 70.0)
                            <td class="redTop">{{ $prom3CumpB }}</td>
                        @endif
                        @if ($prom3CumpCrudo >= 90.0)
                            <td class="greenTop">{{ $prom3Cump }}</td>
                        @elseif ($prom3CumpCrudo >= 69.9)
                            <td class="yellowTop">{{ $prom3Cump }}</td>
                        @elseif ($prom3CumpCrudo <= 70.0)
                            <td class="redTop">{{ $prom3Cump }}</td>
                        @endif
                        <td class="th6">{{ $prom3GesAct }}</td>
                        <td class="th7">{{ $prom3GesIn }}</td>
                    </tr>
                    <tr>
                        <td class="citys prom">{{ $promotor4 }}</td>
                        <td class="actTh2A">{{ $prom4OpeGl }}</td>
                        <td class="actTh2A">{{ $prom4OpeSl }}</td>
                        <td class="actTh2A">{{ $prom4OpeBr }}</td>
                        <td class="actTh2A">{{ $prom4Ope }}</td>
                        <td class="actTh2B">{{ $prom4GesGl }}</td>
                        <td class="actTh2B">{{ $prom4GesSl }}</td>
                        <td class="actTh2B">{{ $prom4GesBr }}</td>
                        <td class="actTh2B">{{ $prom4Ges }}</td>
                        @if ($prom4CumpCrudoG >= 90.0)
                            <td class="greenTop">{{ $prom4CumpG }}</td>
                        @elseif ($prom4CumpCrudoG >= 69.9)
                            <td class="yellowTop">{{ $prom4CumpG }}</td>
                        @elseif ($prom4CumpCrudoG <= 70.0)
                            <td class="redTop">{{ $prom4CumpG }}</td>
                        @endif
                        @if ($prom4CumpCrudoS >= 90.0)
                            <td class="greenTop">{{ $prom4CumpS }}</td>
                        @elseif ($prom4CumpCrudoS >= 69.9)
                            <td class="yellowTop">{{ $prom4CumpS }}</td>
                        @elseif ($prom4CumpCrudoS <= 70.0)
                            <td class="redTop">{{ $prom4CumpS }}</td>
                        @endif
                        @if ($prom4CumpCrudoB >= 90.0)
                            <td class="greenTop">{{ $prom4CumpB }}</td>
                        @elseif ($prom4CumpCrudoB >= 69.9)
                            <td class="yellowTop">{{ $prom4CumpB }}</td>
                        @elseif ($prom4CumpCrudoB <= 70.0)
                            <td class="redTop">{{ $prom4CumpB }}</td>
                        @endif
                        @if ($prom4CumpCrudo >= 90.0)
                            <td class="greenTop">{{ $prom4Cump }}</td>
                        @elseif ($prom4CumpCrudo >= 69.9)
                            <td class="yellowTop">{{ $prom4Cump }}</td>
                        @elseif ($prom4CumpCrudo <= 70.0)
                            <td class="redTop">{{ $prom4Cump }}</td>
                        @endif
                        <td class="th6">{{ $prom4GesAct }}</td>
                        <td class="th7">{{ $prom4GesIn }}</td>
                    </tr>
                    <tr>
                        <td class="citys prom">{{ $promotor5 }}</td>
                        <td class="actTh2A">{{ $prom5OpeGl }}</td>
                        <td class="actTh2A">{{ $prom5OpeSl }}</td>
                        <td class="actTh2A">{{ $prom5OpeBr }}</td>
                        <td class="actTh2A">{{ $prom5Ope }}</td>
                        <td class="actTh2B">{{ $prom5GesGl }}</td>
                        <td class="actTh2B">{{ $prom5GesSl }}</td>
                        <td class="actTh2B">{{ $prom5GesBr }}</td>
                        <td class="actTh2B">{{ $prom5Ges }}</td>
                        @if ($prom5CumpCrudoG >= 90.0)
                            <td class="greenTop">{{ $prom5CumpG }}</td>
                        @elseif ($prom5CumpCrudoG >= 69.9)
                            <td class="yellowTop">{{ $prom5CumpG }}</td>
                        @elseif ($prom5CumpCrudoG <= 70.0)
                            <td class="redTop">{{ $prom5CumpG }}</td>
                        @endif
                        @if ($prom5CumpCrudoS >= 90.0)
                            <td class="greenTop">{{ $prom5CumpS }}</td>
                        @elseif ($prom5CumpCrudoS >= 69.9)
                            <td class="yellowTop">{{ $prom5CumpS }}</td>
                        @elseif ($prom5CumpCrudoS <= 70.0)
                            <td class="redTop">{{ $prom5CumpS }}</td>
                        @endif
                        @if ($prom5CumpCrudoB >= 90.0)
                            <td class="greenTop">{{ $prom5CumpB }}</td>
                        @elseif ($prom5CumpCrudoB >= 69.9)
                            <td class="yellowTop">{{ $prom5CumpB }}</td>
                        @elseif ($prom5CumpCrudoB <= 70.0)
                            <td class="redTop">{{ $prom5CumpB }}</td>
                        @endif
                        @if ($prom5CumpCrudo >= 90.0)
                            <td class="greenTop">{{ $prom5Cump }}</td>
                        @elseif ($prom5CumpCrudo >= 69.9)
                            <td class="yellowTop">{{ $prom5Cump }}</td>
                        @elseif ($prom5CumpCrudo <= 70.0)
                            <td class="redTop">{{ $prom5Cump }}</td>
                        @endif
                        <td class="th6">{{ $prom5GesAct }}</td>
                        <td class="th7">{{ $prom5GesIn }}</td>
                    </tr>

                    <tr>
                        <td class="citys prom">{{ $promotor6 }}</td>
                        <td class="actTh2A">{{ $prom6OpeGl }}</td>
                        <td class="actTh2A">{{ $prom6OpeSl }}</td>
                        <td class="actTh2A">{{ $prom6OpeBr }}</td>
                        <td class="actTh2A">{{ $prom6Ope }}</td>
                        <td class="actTh2B">{{ $prom6GesGl }}</td>
                        <td class="actTh2B">{{ $prom6GesSl }}</td>
                        <td class="actTh2B">{{ $prom6GesBr }}</td>
                        <td class="actTh2B">{{ $prom6Ges }}</td>
                        @if ($prom6CumpCrudoG >= 90.0)
                            <td class="greenTop">{{ $prom6CumpG }}</td>
                        @elseif ($prom6CumpCrudoG >= 69.9)
                            <td class="yellowTop">{{ $prom6CumpG }}</td>
                        @elseif ($prom6CumpCrudoG <= 70.0)
                            <td class="redTop">{{ $prom6CumpG }}</td>
                        @endif
                        @if ($prom6CumpCrudoS >= 90.0)
                            <td class="greenTop">{{ $prom6CumpS }}</td>
                        @elseif ($prom6CumpCrudoS >= 69.9)
                            <td class="yellowTop">{{ $prom6CumpS }}</td>
                        @elseif ($prom6CumpCrudoS <= 70.0)
                            <td class="redTop">{{ $prom6CumpS }}</td>
                        @endif
                        @if ($prom6CumpCrudoB >= 90.0)
                            <td class="greenTop">{{ $prom6CumpB }}</td>
                        @elseif ($prom6CumpCrudoB >= 69.9)
                            <td class="yellowTop">{{ $prom6CumpB }}</td>
                        @elseif ($prom6CumpCrudoB <= 70.0)
                            <td class="redTop">{{ $prom6CumpB }}</td>
                        @endif
                        @if ($prom6CumpCrudo >= 90.0)
                            <td class="greenTop">{{ $prom6Cump }}</td>
                        @elseif ($prom6CumpCrudo >= 69.9)
                            <td class="yellowTop">{{ $prom6Cump }}</td>
                        @elseif ($prom6CumpCrudo <= 70.0)
                            <td class="redTop">{{ $prom6Cump }}</td>
                        @endif
                        <td class="th6">{{ $prom6GesAct }}</td>
                        <td class="th7">{{ $prom6GesIn }}</td>
                    </tr>
                    <tr>
                        <td class="citys prom">{{ $promotor7 }}</td>
                        <td class="actTh2A">{{ $prom7OpeGl }}</td>
                        <td class="actTh2A">{{ $prom7OpeSl }}</td>
                        <td class="actTh2A">{{ $prom7OpeBr }}</td>
                        <td class="actTh2A">{{ $prom7Ope }}</td>
                        <td class="actTh2B">{{ $prom7GesGl }}</td>
                        <td class="actTh2B">{{ $prom7GesSl }}</td>
                        <td class="actTh2B">{{ $prom7GesBr }}</td>
                        <td class="actTh2B">{{ $prom7Ges }}</td>
                        @if ($prom7CumpCrudoG >= 90.0)
                            <td class="greenTop">{{ $prom7CumpG }}</td>
                        @elseif ($prom7CumpCrudoG >= 69.9)
                            <td class="yellowTop">{{ $prom7CumpG }}</td>
                        @elseif ($prom7CumpCrudoG <= 70.0)
                            <td class="redTop">{{ $prom7CumpG }}</td>
                        @endif
                        @if ($prom7CumpCrudoS >= 90.0)
                            <td class="greenTop">{{ $prom7CumpS }}</td>
                        @elseif ($prom7CumpCrudoS >= 69.9)
                            <td class="yellowTop">{{ $prom7CumpS }}</td>
                        @elseif ($prom7CumpCrudoS <= 70.0)
                            <td class="redTop">{{ $prom7CumpS }}</td>
                        @endif
                        @if ($prom7CumpCrudoB >= 90.0)
                            <td class="greenTop">{{ $prom7CumpB }}</td>
                        @elseif ($prom7CumpCrudoB >= 69.9)
                            <td class="yellowTop">{{ $prom7CumpB }}</td>
                        @elseif ($prom7CumpCrudoB <= 70.0)
                            <td class="redTop">{{ $prom7CumpB }}</td>
                        @endif
                        @if ($prom7CumpCrudo >= 90.0)
                            <td class="greenTop">{{ $prom7Cump }}</td>
                        @elseif ($prom7CumpCrudo >= 69.9)
                            <td class="yellowTop">{{ $prom7Cump }}</td>
                        @elseif ($prom7CumpCrudo <= 70.0)
                            <td class="redTop">{{ $prom7Cump }}</td>
                        @endif
                        <td class="th6">{{ $prom7GesAct }}</td>
                        <td class="th7">{{ $prom7GesIn }}</td>
                    </tr>
                    {{--  <tr>
                        <td class="citys prom">{{ $promotor8 }}</td>
                        <td class="actTh2A">{{ $prom8OpeGl }}</td>
                        <td class="actTh2A">{{ $prom8OpeSl }}</td>
                        <td class="actTh2A">{{ $prom8OpeBr }}</td>
                        <td class="actTh2A">{{ $prom8Ope }}</td>
                        <td class="actTh2B">{{ $prom8GesGl }}</td>
                        <td class="actTh2B">{{ $prom8GesSl }}</td>
                        <td class="actTh2B">{{ $prom8GesBr }}</td>
                        <td class="actTh2B">{{ $prom8Ges }}</td>
                        @if ($prom8CumpCrudoG >= 90.0)
                            <td class="greenTop">{{ $prom8CumpG }}</td>
                        @elseif ($prom8CumpCrudoG >= 69.9)
                            <td class="yellowTop">{{ $prom8CumpG }}</td>
                        @elseif ($prom8CumpCrudoG <= 70.0)
                            <td class="redTop">{{ $prom8CumpG }}</td>
                        @endif
                        @if ($prom8CumpCrudoS >= 90.0)
                            <td class="greenTop">{{ $prom8CumpS }}</td>
                        @elseif ($prom8CumpCrudoS >= 69.9)
                            <td class="yellowTop">{{ $prom8CumpS }}</td>
                        @elseif ($prom8CumpCrudoS <= 70.0)
                            <td class="redTop">{{ $prom8CumpS }}</td>
                        @endif
                        @if ($prom8CumpCrudoB >= 90.0)
                            <td class="greenTop">{{ $prom8CumpB }}</td>
                        @elseif ($prom8CumpCrudoB >= 69.9)
                            <td class="yellowTop">{{ $prom8CumpB }}</td>
                        @elseif ($prom8CumpCrudoB <= 70.0)
                            <td class="redTop">{{ $prom8CumpB }}</td>
                        @endif
                        @if ($prom8CumpCrudo >= 90.0)
                            <td class="greenTop">{{ $prom8Cump }}</td>
                        @elseif ($prom8CumpCrudo >= 69.9)
                            <td class="yellowTop">{{ $prom8Cump }}</td>
                        @elseif ($prom8CumpCrudo <= 70.0)
                            <td class="redTop">{{ $prom8Cump }}</td>
                        @endif
                        <td class="th6">{{ $prom8GesAct }}</td>
                        <td class="th7">{{ $prom8GesIn }}</td>
                    </tr>  --}}
                    <tr>
                        <td class="citys prom">{{ $promotor9 }}</td>
                        <td class="actTh2A">{{ $prom9OpeGl }}</td>
                        <td class="actTh2A">{{ $prom9OpeSl }}</td>
                        <td class="actTh2A">{{ $prom9OpeBr }}</td>
                        <td class="actTh2A">{{ $prom9Ope }}</td>
                        <td class="actTh2B">{{ $prom9GesGl }}</td>
                        <td class="actTh2B">{{ $prom9GesSl }}</td>
                        <td class="actTh2B">{{ $prom9GesBr }}</td>
                        <td class="actTh2B">{{ $prom9Ges }}</td>
                        @if ($prom9CumpCrudoG >= 90.0)
                            <td class="greenTop">{{ $prom9CumpG }}</td>
                        @elseif ($prom9CumpCrudoG >= 69.9)
                            <td class="yellowTop">{{ $prom9CumpG }}</td>
                        @elseif ($prom9CumpCrudoG <= 70.0)
                            <td class="redTop">{{ $prom9CumpG }}</td>
                        @endif
                        @if ($prom9CumpCrudoS >= 90.0)
                            <td class="greenTop">{{ $prom9CumpS }}</td>
                        @elseif ($prom9CumpCrudoS >= 69.9)
                            <td class="yellowTop">{{ $prom9CumpS }}</td>
                        @elseif ($prom9CumpCrudoS <= 70.0)
                            <td class="redTop">{{ $prom9CumpS }}</td>
                        @endif
                        @if ($prom9CumpCrudoB >= 90.0)
                            <td class="greenTop">{{ $prom9CumpB }}</td>
                        @elseif ($prom9CumpCrudoB >= 69.9)
                            <td class="yellowTop">{{ $prom9CumpB }}</td>
                        @elseif ($prom9CumpCrudoB <= 70.0)
                            <td class="redTop">{{ $prom9CumpB }}</td>
                        @endif
                        @if ($prom9CumpCrudo >= 90.0)
                            <td class="greenTop">{{ $prom9Cump }}</td>
                        @elseif ($prom9CumpCrudo >= 69.9)
                            <td class="yellowTop">{{ $prom9Cump }}</td>
                        @elseif ($prom9CumpCrudo <= 70.0)
                            <td class="redTop">{{ $prom9Cump }}</td>
                        @endif
                        <td class="th6">{{ $prom9GesAct }}</td>
                        <td class="th7">{{ $prom9GesIn }}</td>
                    </tr>
                <tfoot>
                    <td class="actThG">TOTAL</td>
                    <td class="tcalA">{{ $totalpromOpeGl }}</td>
                    <td class="tcalA">{{ $totalpromOpeSl }}</td>
                    <td class="tcalA">{{ $totalpromOpeBr }}</td>
                    <td class="tcalA">{{ $totalCargaDia }}</td>
                    <td class="tcalA">{{ $totalpromGesGl }}</td>
                    <td class="tcalA">{{ $totalpromGesSl }}</td>
                    <td class="tcalA">{{ $totalpromGesBr }}</td>
                    <td class="tcalA">{{ $totalGestionDia }}</td>
                    @if ($prom1CumpDiaCrudoG >= 90.0)
                        <td class="greenTop totalAvery" style="border-color:black; border-style: ridge;">
                            {{ $totalpromOpeDiaGl }}</td>
                    @elseif ($prom1CumpDiaCrudoG >= 69.9)
                        <td class="yellowTop totalAvery" style="border-color:black; border-style: ridge;">
                            {{ $totalpromOpeDiaGl }}</td>
                    @elseif ($prom1CumpDiaCrudoG <= 70.0)
                        <td class="redTop totalAvery" style="border-color:black; border-style: ridge;">
                            {{ $totalpromOpeDiaGl }}</td>
                    @endif
                    @if ($prom1CumpDiaCrudoS >= 90.0)
                        <td class="greenTop totalAvery" style="border-color:black; border-style: ridge;">
                            {{ $totalpromOpeDiaSl }}</td>
                    @elseif ($prom1CumpDiaCrudoS >= 69.9)
                        <td class="yellowTop totalAvery" style="border-color:black; border-style: ridge;">
                            {{ $totalpromOpeDiaSl }}</td>
                    @elseif ($prom1CumpDiaCrudoS <= 70.0)
                        <td class="redTop totalAvery" style="border-color:black; border-style: ridge;">
                            {{ $totalpromOpeDiaSl }}</td>
                    @endif
                    @if ($prom1CumpDiaCrudoB >= 90.0)
                        <td class="greenTop totalAvery" style="border-color:black; border-style: ridge;">
                            {{ $totalpromOpeDiaBr }}</td>
                    @elseif ($prom1CumpDiaCrudoB >= 69.9)
                        <td class="yellowTop totalAvery" style="border-color:black; border-style: ridge;">
                            {{ $totalpromOpeDiaBr }}</td>
                    @elseif ($prom1CumpDiaCrudoB <= 70.0)
                        <td class="redTop totalAvery" style="border-color:black; border-style: ridge;">
                            {{ $totalpromOpeDiaBr }}</td>
                    @endif
                    @if ($cumplimientoDiaCrudo >= 90.0)
                        <td class="greenTop totalAvery" style="border-color:black; border-style: ridge;">
                            {{ $cumplimientoDia }}</td>
                    @elseif ($cumplimientoDiaCrudo >= 69.9)
                        <td class="yellowTop totalAvery" style="border-color:black; border-style: ridge;">
                            {{ $cumplimientoDia }}</td>
                    @elseif ($cumplimientoDiaCrudo <= 70.0)
                        <td class="redTop totalAvery" style="border-color:black; border-style: ridge;">
                            {{ $cumplimientoDia }}</td>
                    @endif
                    <td class="tcalA">{{ $sumpromGesAct }}</td>
                    <td class="tcalA">{{ $sumpromGesIn }}</td>
                </tfoot>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="card full-card">
            <h2>CUMPLIMIENTO DE GESTION OPERATIVA ACUMULADA</h2>
            {{--  <div id="reportrange" class="dataPick">
                <i class="fa fa-calendar"></i>&nbsp;
                <span></span> <i class="fa fa-caret-down"></i>
            </div>  --}}
            <table class="statusXl">
                <thead>
                    <th class="th1 actTh3">Promotor</th>
                    <th class="th1 actTh3">Casos Cargados</th>
                    <th class="th1 actTh3">Casos Gestionados</th>
                    <th class="th1 actTh3 totalAvery">% Cumplimiento</th>
                </thead>
                <tbody>
                    <tr>
                        <td class="citys prom">{{ $promotor1 }}</td>
                        <td class= "actTh2A">{{ $prom1OpeAcum }}</td>
                        <td class="actTh2B">{{ $prom1GesAcum }}</td>
                        @if ($prom1CumpAcumCrudo >= 90.0)
                            <td class="greenTop">{{ $prom1CumpAcum }}</td>
                        @elseif ($prom1CumpAcumCrudo >= 69.9)
                            <td class="yellowTop">{{ $prom1CumpAcum }}</td>
                        @elseif ($prom1CumpAcumCrudo <= 70.0)
                            <td class="redTop">{{ $prom1CumpAcum }}</td>
                        @endif
                    </tr>
                    {{--  <tr>
                        <td class="citys prom">{{ $promotor2 }}</td>
                        <td class= "actTh2A">{{ $prom2OpeAcum }}</td>
                        <td class="actTh2B">{{ $prom2GesAcum }}</td>
                        @if ($prom2CumpAcumCrudo >= 90.0)
                            <td class="greenTop">{{ $prom2CumpAcum }}</td>
                        @elseif ($prom2CumpAcumCrudo >= 69.9)
                            <td class="yellowTop">{{ $prom2CumpAcum }}</td>
                        @elseif ($prom2CumpAcumCrudo <= 70.0)
                            <td class="redTop">{{ $prom2CumpAcum }}</td>
                        @endif
                    </tr>  --}}
                    <tr>
                        <td class="citys prom">{{ $promotor3 }}</td>
                        <td class= "actTh2A">{{ $prom3OpeAcum }}</td>
                        <td class="actTh2B">{{ $prom3GesAcum }}</td>
                        @if ($prom3CumpAcumCrudo >= 90.0)
                            <td class="greenTop">{{ $prom3CumpAcum }}</td>
                        @elseif ($prom3CumpAcumCrudo >= 69.9)
                            <td class="yellowTop">{{ $prom3CumpAcum }}</td>
                        @elseif ($prom3CumpAcumCrudo <= 70.0)
                            <td class="redTop">{{ $prom3CumpAcum }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="citys prom">{{ $promotor4 }}</td>
                        <td class= "actTh2A">{{ $prom4OpeAcum }}</td>
                        <td class="actTh2B">{{ $prom4GesAcum }}</td>
                        @if ($prom4CumpAcumCrudo >= 90.0)
                            <td class="greenTop">{{ $prom4CumpAcum }}</td>
                        @elseif ($prom4CumpAcumCrudo >= 69.9)
                            <td class="yellowTop">{{ $prom4CumpAcum }}</td>
                        @elseif ($prom4CumpAcumCrudo <= 70.0)
                            <td class="redTop">{{ $prom4CumpAcum }}</td>
                        @endif
                    </tr>

                    <tr>
                        <td class="citys prom">{{ $promotor5 }}</td>
                        <td class= "actTh2A">{{ $prom5OpeAcum }}</td>
                        <td class="actTh2B">{{ $prom5GesAcum }}</td>
                        @if ($prom5CumpAcumCrudo >= 90.0)
                            <td class="greenTop">{{ $prom5CumpAcum }}</td>
                        @elseif ($prom5CumpAcumCrudo >= 69.9)
                            <td class="yellowTop">{{ $prom5CumpAcum }}</td>
                        @elseif ($prom5CumpAcumCrudo <= 70.0)
                            <td class="redTop">{{ $prom5CumpAcum }}</td>
                        @endif
                    </tr>

                    <tr>
                        <td class="citys prom">{{ $promotor6 }}</td>
                        <td class= "actTh2A">{{ $prom6OpeAcum }}</td>
                        <td class="actTh2B">{{ $prom6GesAcum }}</td>
                        @if ($prom6CumpAcumCrudo >= 90.0)
                            <td class="greenTop">{{ $prom6CumpAcum }}</td>
                        @elseif ($prom6CumpAcumCrudo >= 69.9)
                            <td class="yellowTop">{{ $prom6CumpAcum }}</td>
                        @elseif ($prom6CumpAcumCrudo <= 70.0)
                            <td class="redTop">{{ $prom6CumpAcum }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="citys prom">{{ $promotor7 }}</td>
                        <td class= "actTh2A">{{ $prom7OpeAcum }}</td>
                        <td class="actTh2B">{{ $prom7GesAcum }}</td>
                        @if ($prom7CumpAcumCrudo >= 90.0)
                            <td class="greenTop">{{ $prom7CumpAcum }}</td>
                        @elseif ($prom7CumpAcumCrudo >= 69.9)
                            <td class="yellowTop">{{ $prom7CumpAcum }}</td>
                        @elseif ($prom7CumpAcumCrudo <= 70.0)
                            <td class="redTop">{{ $prom7CumpAcum }}</td>
                        @endif
                    </tr>
                    {{--  <tr>
                        <td class="citys prom">{{ $promotor8 }}</td>
                        <td class= "actTh2A">{{ $prom8OpeAcum }}</td>
                        <td class="actTh2B">{{ $prom8GesAcum }}</td>
                        @if ($prom8CumpAcumCrudo >= 90.0)
                            <td class="greenTop">{{ $prom8CumpAcum }}</td>
                        @elseif ($prom8CumpAcumCrudo >= 69.9)
                            <td class="yellowTop">{{ $prom8CumpAcum }}</td>
                        @elseif ($prom8CumpAcumCrudo <= 70.0)
                            <td class="redTop">{{ $prom8CumpAcum }}</td>
                        @endif
                    </tr>  --}}
                    <tr>
                        <td class="citys prom">{{ $promotor9 }}</td>
                        <td class="actTh2A">{{ $prom9OpeAcum }}</td>
                        <td class="actTh2B">{{ $prom9GesAcum }}</td>
                        @if ($prom9CumpAcumCrudo >= 90.0)
                            <td class="greenTop">{{ $prom9CumpAcum }}</td>
                        @elseif ($prom9CumpAcumCrudo >= 69.9)
                            <td class="yellowTop">{{ $prom9CumpAcum }}</td>
                        @elseif ($prom9CumpAcumCrudo <= 70.0)
                            <td class="redTop">{{ $prom9CumpAcum }}</td>
                        @endif
                    </tr>
                <tfoot>
                    <td class="actThG">TOTAL</td>
                    <td class="tcalA">{{ $totalCargaMes }}</td>
                    <td class="tcalA">{{ $totalGestionMes }}</td>
                    @if ($cumplimientoMesCrudo >= 90.0)
                        <td class="greenTop totalAvery">{{ $cumplimientoMes }}</td>
                    @elseif ($cumplimientoMesCrudo >= 69.9)
                        <td class="yellowTop totalAvery">{{ $cumplimientoMes }}</td>
                    @elseif ($cumplimientoMesCrudo <= 70.0)
                        <td class="redTop totalAvery">{{ $cumplimientoMes }}</td>
                    @endif
                </tfoot>
                </tbody>
            </table>
        </div>
    </div>


    <h2 class="t1">ESTATUS DE PUNTOS EN OPERACIÓN</h2>
    <div class="row">
        <div class="card full-card">
            <canvas id="statusCases"></canvas>
            <table class="TableTop table-hover">
                <thead class="userTableSeg">
                    <th class="th1">Ciudad</th>
                    <th class="th2">Gold</th>
                    <th class="th3">Silver</th>
                    <th class="th4">Bronce</th>
                    <th class="th5">Total</th>
                </thead>
                <tbody>
                    <tr class="actTr3">
                        <th scope="row" class="citys">Bogot&aacute;</th>
                        <td class="actTh3">{{ $oroBog }} </td>
                        <td class="actTh3">{{ $plataBog }}</td>
                        <td class="actTh3">{{ $bronceBog }}</td>
                        <td class="actTh2">{{ $totalBog }}</td>
                    </tr>
                    <tr class="actTr4">
                        <th scope="row" class="citys">Medell&iacute;n</th>
                        <td class="actTh3">{{ $oroMed }} </td>
                        <td class="actTh3">{{ $plataMed }}</td>
                        <td class="actTh3">{{ $bronceMed }}</td>
                        <td class="actTh2">{{ $totalMed }}</td>
                    </tr>
                    <tr class="actTr3">
                        <th scope="row" class="citys">Barranquilla</th>
                        <td class="actTh3">{{ $oroBar }} </td>
                        <td class="actTh3">{{ $plataBar }}</td>
                        <td class="actTh3">{{ $bronceBar }}</td>
                        <td class="actTh2">{{ $totalBar }}</td>
                    </tr>
                    <tr class="actTr4">
                        <th scope="row" class="citys">Bucaramanga</th>
                        <td class="actTh3">{{ $oroBuc }} </td>
                        <td class="actTh3">{{ $plataBuc }}</td>
                        <td class="actTh3">{{ $bronceBuc }}</td>
                        <td class="actTh2">{{ $totalBuc }}</td>
                    </tr>
                    <tr class="actTr3">
                        <th scope="row" class="citys">Cali</th>
                        <td class="actTh3">{{ $oroCal }} </td>
                        <td class="actTh3">{{ $plataCal }}</td>
                        <td class="actTh3">{{ $bronceCal }}</td>
                        <td class="actTh2">{{ $totalCal }}</td>
                    </tr>
                    <tr class="actTr4">
                        <th class="totales2" scope="row">Total Gestionados</th>
                        <td class="actTh3"> {{ $asignadosTotalesG }} </td>
                        <td class="actTh3"> {{ $asignadosTotalesS }} </td>
                        <td class="actTh3"> {{ $asignadosTotalesB }} </td>
                        <td class="actTh2"> {{ $totalAuditorias }} </td>
                    </tr>
                    <tr class="actTr4">
                        <th class="totales1" scope="row">Total Cargados</th>
                        <td class="actTh3"> {{ $oroB1 }} </td>
                        <td class="actTh3"> {{ $plataB1 }} </td>
                        <td class="actTh3"> {{ $bronceB1 }} </td>
                        <td class="actTh2"> {{ $totalPuntos }} </td>
                    </tr>
                </tbody>
                <tfoot class="actTr5">
                    <th class="citys totales3" scope="row">Cumplimiento %</th>
                    <td class="actThG"> {{ $cumpliGold }} </td>
                    <td class="actThS"> {{ $cumpliSilver }} </td>
                    <td class="actThB"> {{ $cumpliBronce }} </td>
                    <td class="actTh2"> {{ $cumpliTotal }} </td>
                </tfoot>
            </table>
            <table class="status">
                <thead>
                    <th class ="operativo1">Asignados </th>
                    <th class ="operativo2">Concretados </th>
                    <th class ="operativo3">No concretados</th>
                    <th class ="operativo4">Sin asignar</th>
                    <th class ="operativo5">En tramite</th>
                </thead>
                <tbody>
                    <td class="canGen">{{ $asignados }}</td>
                    <td class="canGen">{{ $diligenciados }}</td>
                    <td class="canGen">{{ $noConcretados }}</td>
                    <td class="canGen">{{ $disponibles }}</td>
                    <td class="canGen">{{ $enTramite }}</td>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="card three-card">
            <canvas id="statusCasesGold"></canvas>
            <table class="status">
                <thead>
                    <th class="th1 actTh3">Ciudad </th>
                    <th class ="operativo1">Asignados </th>
                    <th class ="operativo2">Concretados </th>
                    <th class ="operativo3">No concretados</th>
                    <th class ="operativo4">Sin asignar</th>
                    <th class ="operativo5">En tramite</th>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="citys">Bogot&aacute;</th>
                        <td class="actTh3">{{ $asignadosBtaG }}</td>
                        <td class="actTh3">{{ $diligenciadosBtaG }}</td>
                        <td class="actTh3">{{ $noConcretadosBtaG }}</td>
                        <td class="actTh3">{{ $disponiblesBtaG }}</td>
                        <td class="actTh3">{{ $enTramiteBtaG }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="citys">Medell&iacute;n</th>
                        <td class="actTh3">{{ $asignadosMedG }}</td>
                        <td class="actTh3">{{ $diligenciadosMedG }}</td>
                        <td class="actTh3">{{ $noConcretadosMedG }}</td>
                        <td class="actTh3">{{ $disponiblesMedG }}</td>
                        <td class="actTh3">{{ $enTramiteMedG }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="citys">Barranquilla</th>
                        <td class="actTh3">{{ $asignadosBarG }}</td>
                        <td class="actTh3">{{ $diligenciadosBarG }}</td>
                        <td class="actTh3">{{ $noConcretadosBarG }}</td>
                        <td class="actTh3">{{ $disponiblesBarG }}</td>
                        <td class="actTh3">{{ $enTramiteBarG }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="citys">Bucaramanga</th>
                        <td class="actTh3">{{ $asignadosBucG }}</td>
                        <td class="actTh3">{{ $diligenciadosBucG }}</td>
                        <td class="actTh3">{{ $noConcretadosBucG }}</td>
                        <td class="actTh3">{{ $disponiblesBucG }}</td>
                        <td class="actTh3">{{ $enTramiteBucG }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="citys">Cali</th>
                        <td class="actTh3">{{ $asignadosCalG }}</td>
                        <td class="actTh3">{{ $diligenciadosCalG }}</td>
                        <td class="actTh3">{{ $noConcretadosCalG }}</td>
                        <td class="actTh3">{{ $disponiblesCalG }}</td>
                        <td class="actTh3">{{ $enTramiteCalG }}</td>
                    </tr>
                </tbody>
                <tfoot>
                    <th class="citys actTh3" scope="row">Total</th>
                    <td class="actThG">{{ $asignadosG }}</td>
                    <td class="actThG">{{ $diligenciadosG }}</td>
                    <td class="actThG">{{ $noConcretadosG }}</td>
                    <td class="actThG">{{ $disponiblesG }}</td>
                    <td class="actThG">{{ $enTramiteG }}</td>
                </tfoot>
            </table>
        </div>
        <div class="card three-card">
            <canvas id="statusCasesSilver"></canvas>
            <table class="status">
                <thead>
                    <th class="th1 actTh3">Ciudad </th>
                    <th class ="operativo1">Asignados </th>
                    <th class ="operativo2">Concretados </th>
                    <th class ="operativo3">No concretados</th>
                    <th class ="operativo4">Sin asignar</th>
                    <th class ="operativo5">En tramite</th>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="citys">Bogot&aacute;</th>
                        <td class="actTh3">{{ $asignadosBtaS }}</td>
                        <td class="actTh3">{{ $diligenciadosBtaS }}</td>
                        <td class="actTh3">{{ $noConcretadosBtaS }}</td>
                        <td class="actTh3">{{ $disponiblesBtaS }}</td>
                        <td class="actTh3">{{ $enTramiteBtaS }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="citys">Medell&iacute;n</th>
                        <td class="actTh3">{{ $asignadosMedS }}</td>
                        <td class="actTh3">{{ $diligenciadosMedS }}</td>
                        <td class="actTh3">{{ $noConcretadosMedS }}</td>
                        <td class="actTh3">{{ $disponiblesMedS }}</td>
                        <td class="actTh3">{{ $enTramiteMedS }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="citys">Barranquilla</th>
                        <td class="actTh3">{{ $asignadosBarS }}</td>
                        <td class="actTh3">{{ $diligenciadosBarS }}</td>
                        <td class="actTh3">{{ $noConcretadosBarS }}</td>
                        <td class="actTh3">{{ $disponiblesBarS }}</td>
                        <td class="actTh3">{{ $enTramiteBarS }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="citys">Bucaramanga</th>
                        <td class="actTh3">{{ $asignadosBucS }}</td>
                        <td class="actTh3">{{ $diligenciadosBucS }}</td>
                        <td class="actTh3">{{ $noConcretadosBucS }}</td>
                        <td class="actTh3">{{ $disponiblesBucS }}</td>
                        <td class="actTh3">{{ $enTramiteBucS }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="citys">Cali</th>
                        <td class="actTh3">{{ $asignadosCalS }}</td>
                        <td class="actTh3">{{ $diligenciadosCalS }}</td>
                        <td class="actTh3">{{ $noConcretadosCalS }}</td>
                        <td class="actTh3">{{ $disponiblesCalS }}</td>
                        <td class="actTh3">{{ $enTramiteCalS }}</td>
                    </tr>
                </tbody>
                <tfoot>
                    <th class="citys actTh3" scope="row">Total</th>
                    <td class="actThS">{{ $asignadosS }}</td>
                    <td class="actThS">{{ $diligenciadosS }}</td>
                    <td class="actThS">{{ $noConcretadosS }}</td>
                    <td class="actThS">{{ $disponiblesS }}</td>
                    <td class="actThS">{{ $enTramiteS }}</td>
                </tfoot>
            </table>
        </div>
        <div class="card three-card">
            <canvas id="statusCasesBronce"></canvas>
            <table class="status">
                <thead>
                    <th class="th1 actTh3">Ciudad </th>
                    <th class ="operativo1">Asignados </th>
                    <th class ="operativo2">Concretados </th>
                    <th class ="operativo3">No concretados</th>
                    <th class ="operativo4">Sin asignar</th>
                    <th class ="operativo5">En tramite</th>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="citys">Bogot&aacute;</th>
                        <td class="actTh3">{{ $asignadosBtaB }}</td>
                        <td class="actTh3">{{ $diligenciadosBtaB }}</td>
                        <td class="actTh3">{{ $noConcretadosBtaB }}</td>
                        <td class="actTh3">{{ $disponiblesBtaB }}</td>
                        <td class="actTh3">{{ $enTramiteBtaB }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="citys">Medell&iacute;n</th>
                        <td class="actTh3">{{ $asignadosMedB }}</td>
                        <td class="actTh3">{{ $diligenciadosMedB }}</td>
                        <td class="actTh3">{{ $noConcretadosMedB }}</td>
                        <td class="actTh3">{{ $disponiblesMedB }}</td>
                        <td class="actTh3">{{ $enTramiteMedB }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="citys">Barranquilla</th>
                        <td class="actTh3">{{ $asignadosBarB }}</td>
                        <td class="actTh3">{{ $diligenciadosBarB }}</td>
                        <td class="actTh3">{{ $noConcretadosBarB }}</td>
                        <td class="actTh3">{{ $disponiblesBarB }}</td>
                        <td class="actTh3">{{ $enTramiteBarB }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="citys">Bucaramanga</th>
                        <td class="actTh3">{{ $asignadosBucB }}</td>
                        <td class="actTh3">{{ $diligenciadosBucB }}</td>
                        <td class="actTh3">{{ $noConcretadosBucB }}</td>
                        <td class="actTh3">{{ $disponiblesBucB }}</td>
                        <td class="actTh3">{{ $enTramiteBucB }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="citys">Cali</th>
                        <td class="actTh3">{{ $asignadosCalB }}</td>
                        <td class="actTh3">{{ $diligenciadosCalB }}</td>
                        <td class="actTh3">{{ $noConcretadosCalB }}</td>
                        <td class="actTh3">{{ $disponiblesCalB }}</td>
                        <td class="actTh3">{{ $enTramiteCalB }}</td>
                    </tr>
                </tbody>
                <tfoot>
                    <th class="citys actTh3" scope="row">Total</th>
                    <td class="actThB">{{ $asignadosB }}</td>
                    <td class="actThB">{{ $diligenciadosB }}</td>
                    <td class="actThB">{{ $noConcretadosB }}</td>
                    <td class="actThB">{{ $disponiblesB }}</td>
                    <td class="actThB">{{ $enTramiteB }}</td>
                </tfoot>
            </table>
        </div>
    </div>
    <h2 class="t1">PROCESOS DE CALIDAD</h2>
    <div class="row">
        <div class="card full-card">
            <canvas id="qualityCases"></canvas>
            <table class="status">
                <thead>
                    <th class="th1 actTh3">Ciudad </th>
                    <th class ="calidad1">Sin errores </th>
                    <th class ="calidad2">Error de fondo </th>
                    <th class ="calidad3">Error de forma</th>
                    <th class ="calidad4">Fondo y forma</th>
                    <th class ="calidad5">Pendientes</th>
                    <th class ="th1 actTh3">Total</th>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="citys">Bogot&aacute;</th>
                        <td class="actTh3">{{ $sinErrorBta }}</td>
                        <td class="actTh3">{{ $fondoBta }}</td>
                        <td class="actTh3">{{ $formaBta }}</td>
                        <td class="actTh3">{{ $ambosBta }}</td>
                        <td class="actTh3">{{ $pendienteBta }}</td>
                        <td class="actTh2">{{ $totalBta }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="citys">Medell&iacute;n</th>
                        <td class="actTh3">{{ $sinErrorMed }}</td>
                        <td class="actTh3">{{ $fondoMed }}</td>
                        <td class="actTh3">{{ $formaMed }}</td>
                        <td class="actTh3">{{ $ambosMed }}</td>
                        <td class="actTh3">{{ $pendienteMed }}</td>
                        <td class="actTh2">{{ $totalMed }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="citys">Barranquilla</th>
                        <td class="actTh3">{{ $sinErrorBar }}</td>
                        <td class="actTh3">{{ $fondoBar }}</td>
                        <td class="actTh3">{{ $formaBar }}</td>
                        <td class="actTh3">{{ $ambosBar }}</td>
                        <td class="actTh3">{{ $pendienteBar }}</td>
                        <td class="actTh2">{{ $totalBar }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="citys">Bucaramanga</th>
                        <td class="actTh3">{{ $sinErrorBuc }}</td>
                        <td class="actTh3">{{ $fondoBuc }}</td>
                        <td class="actTh3">{{ $formaBuc }}</td>
                        <td class="actTh3">{{ $ambosBuc }}</td>
                        <td class="actTh3">{{ $pendienteBuc }}</td>
                        <td class="actTh2">{{ $totalBuc }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="citys">Cali</th>
                        <td class="actTh3">{{ $sinErrorCal }}</td>
                        <td class="actTh3">{{ $fondoCal }}</td>
                        <td class="actTh3">{{ $formaCal }}</td>
                        <td class="actTh3">{{ $ambosCal }}</td>
                        <td class="actTh3">{{ $pendienteCal }}</td>
                        <td class="actTh2">{{ $totalCali }}</td>
                    </tr>
                </tbody>
                <tfoot>
                    <th class="citys actTh3" scope="row">Total</th>
                    <td class="calidad1" style="font-size: 14px !important;">{{ $sinError }}</td>
                    <td class="calidad2" style="font-size: 14px !important;">{{ $fondo }}</td>
                    <td class="calidad3" style="font-size: 14px !important;">{{ $forma }}</td>
                    <td class="calidad4" style="font-size: 14px !important;">{{ $ambos }}</td>
                    <td class="calidad5" style="font-size: 14px !important;">{{ $pendiente }}</td>
                    <td class="actTh2" style="font-size: 14px !important;">{{ $totalCalidad }}</td>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="card three-card">
            <canvas id="qualityCasesG"></canvas>
            <table class="status">
                <thead>
                    <th class="th1 actTh3">Ciudad </th>
                    <th class ="calidad1" style="font-size: 11px !important;">Sin errores </th>
                    <th class ="calidad2" style="font-size: 11px !important;">Error de fondo </th>
                    <th class ="calidad3" style="font-size: 11px !important;">Error de forma</th>
                    <th class ="calidad4" style="font-size: 11px !important;">Fondo y forma</th>
                    <th class ="calidad5" style="font-size: 11px !important;">Pendientes</th>
                    <th class ="th5">Total</th>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="citys">Bogot&aacute;</th>
                        <td class="actTh3">{{ $sinErrorBtaG }}</td>
                        <td class="actTh3">{{ $fondoBtaG }}</td>
                        <td class="actTh3">{{ $formaBtaG }}</td>
                        <td class="actTh3">{{ $ambosBtaG }}</td>
                        <td class="actTh3">{{ $pendienteBtaG }}</td>
                        <td class="actTh2">{{ $totalBtaG }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="citys">Medell&iacute;n</th>
                        <td class="actTh3">{{ $sinErrorMedG }}</td>
                        <td class="actTh3">{{ $fondoMedG }}</td>
                        <td class="actTh3">{{ $formaMedG }}</td>
                        <td class="actTh3">{{ $ambosMedG }}</td>
                        <td class="actTh3">{{ $pendienteMedG }}</td>
                        <td class="actTh2">{{ $totalMedG }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="citys">Barranquilla</th>
                        <td class="actTh3">{{ $sinErrorBarG }}</td>
                        <td class="actTh3">{{ $fondoBarG }}</td>
                        <td class="actTh3">{{ $formaBarG }}</td>
                        <td class="actTh3">{{ $ambosBarG }}</td>
                        <td class="actTh3">{{ $pendienteBarG }}</td>
                        <td class="actTh2">{{ $totalBarG }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="citys">Bucaramanga</th>
                        <td class="actTh3">{{ $sinErrorBucG }}</td>
                        <td class="actTh3">{{ $fondoBucG }}</td>
                        <td class="actTh3">{{ $formaBucG }}</td>
                        <td class="actTh3">{{ $ambosBucG }}</td>
                        <td class="actTh3">{{ $pendienteBucG }}</td>
                        <td class="actTh2">{{ $totalBucG }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="citys">Cali</th>
                        <td class="actTh3">{{ $sinErrorCalG }}</td>
                        <td class="actTh3">{{ $fondoCalG }}</td>
                        <td class="actTh3">{{ $formaCalG }}</td>
                        <td class="actTh3">{{ $ambosCalG }}</td>
                        <td class="actTh3">{{ $pendienteCalG }}</td>
                        <td class="actTh2">{{ $totalCalG }} </td>
                    </tr>
                </tbody>
                <tfoot>
                    <th class="citys actTh3" scope="row">Total</th>
                    <td class="calidad1" style="font-size: 14px !important;">{{ $sinErrorG }}</td>
                    <td class="calidad2" style="font-size: 14px !important;">{{ $fondoG }}</td>
                    <td class="calidad3" style="font-size: 14px !important;">{{ $formaG }}</td>
                    <td class="calidad4" style="font-size: 14px !important;">{{ $ambosG }}</td>
                    <td class="calidad5" style="font-size: 14px !important;">{{ $pendienteG }}</td>
                    <td class="actTh2" style="font-size: 14px !important;">{{ $totalGolds }}</td>
                </tfoot>
            </table>
        </div>
        <div class="card three-card">
            <canvas id="qualityCasesS"></canvas>
            <table class="status">
                <thead>
                    <th class="th1 actTh3">Ciudad </th>
                    <th class ="calidad1" style="font-size: 11px !important;">Sin errores </th>
                    <th class ="calidad2" style="font-size: 11px !important;">Error de fondo </th>
                    <th class ="calidad3" style="font-size: 11px !important;">Error de forma</th>
                    <th class ="calidad4" style="font-size: 11px !important;">Fondo y forma</th>
                    <th class ="calidad5" style="font-size: 11px !important;">Pendientes</th>
                    <th class ="th5">Total</th>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="citys">Bogot&aacute;</th>
                        <td class="actTh3">{{ $sinErrorBtaS }}</td>
                        <td class="actTh3">{{ $fondoBtaS }}</td>
                        <td class="actTh3">{{ $formaBtaS }}</td>
                        <td class="actTh3">{{ $ambosBtaS }}</td>
                        <td class="actTh3">{{ $pendienteBtaS }}</td>
                        <td class="actTh2">{{ $totalBtaS }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="citys">Medell&iacute;n</th>
                        <td class="actTh3">{{ $sinErrorMedS }}</td>
                        <td class="actTh3">{{ $fondoMedS }}</td>
                        <td class="actTh3">{{ $formaMedS }}</td>
                        <td class="actTh3">{{ $ambosMedS }}</td>
                        <td class="actTh3">{{ $pendienteMedS }}</td>
                        <td class="actTh2">{{ $totalMedS }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="citys">Barranquilla</th>
                        <td class="actTh3">{{ $sinErrorBarS }}</td>
                        <td class="actTh3">{{ $fondoBarS }}</td>
                        <td class="actTh3">{{ $formaBarS }}</td>
                        <td class="actTh3">{{ $ambosBarS }}</td>
                        <td class="actTh3">{{ $pendienteBarS }}</td>
                        <td class="actTh2">{{ $totalBarS }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="citys">Bucaramanga</th>
                        <td class="actTh3">{{ $sinErrorBucS }}</td>
                        <td class="actTh3">{{ $fondoBucS }}</td>
                        <td class="actTh3">{{ $formaBucS }}</td>
                        <td class="actTh3">{{ $ambosBucS }}</td>
                        <td class="actTh3">{{ $pendienteBucS }}</td>
                        <td class="actTh2">{{ $totalBucS }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="citys">Cali</th>
                        <td class="actTh3">{{ $sinErrorCalS }}</td>
                        <td class="actTh3">{{ $fondoCalS }}</td>
                        <td class="actTh3">{{ $formaCalS }}</td>
                        <td class="actTh3">{{ $ambosCalS }}</td>
                        <td class="actTh3">{{ $pendienteCalS }}</td>
                        <td class="actTh2">{{ $totalCalS }} </td>
                    </tr>
                </tbody>
                <tfoot>
                    <th class="citys actTh3" scope="row">Total</th>
                    <td class="calidad1" style="font-size: 14px !important;">{{ $sinErrorS }}</td>
                    <td class="calidad2" style="font-size: 14px !important;">{{ $fondoS }}</td>
                    <td class="calidad3" style="font-size: 14px !important;">{{ $formaS }}</td>
                    <td class="calidad4" style="font-size: 14px !important;">{{ $ambosS }}</td>
                    <td class="calidad5" style="font-size: 14px !important;">{{ $pendienteS }}</td>
                    <td class="actTh2" style="font-size: 14px !important;">{{ $totalSilvers }}</td>
                </tfoot>
            </table>
        </div>
        <div class="card three-card">
            <canvas id="qualityCasesB"></canvas>
            <table class="status">
                <thead>
                    <th class="th1 actTh3">Ciudad </th>
                    <th class ="calidad1" style="font-size: 11px !important;">Sin errores </th>
                    <th class ="calidad2" style="font-size: 11px !important;">Error de fondo </th>
                    <th class ="calidad3" style="font-size: 11px !important;">Error de forma</th>
                    <th class ="calidad4" style="font-size: 11px !important;">Fondo y forma</th>
                    <th class ="calidad5" style="font-size: 11px !important;">Pendientes</th>
                    <th class ="th5">Total</th>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="citys">Bogot&aacute;</th>
                        <td class="actTh3">{{ $sinErrorBtaB }}</td>
                        <td class="actTh3">{{ $fondoBtaB }}</td>
                        <td class="actTh3">{{ $formaBtaB }}</td>
                        <td class="actTh3">{{ $ambosBtaB }}</td>
                        <td class="actTh3">{{ $pendienteBtaB }}</td>
                        <td class="actTh2">{{ $totalBtaB }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="citys">Medell&iacute;n</th>
                        <td class="actTh3">{{ $sinErrorMedB }}</td>
                        <td class="actTh3">{{ $fondoMedB }}</td>
                        <td class="actTh3">{{ $formaMedB }}</td>
                        <td class="actTh3">{{ $ambosMedB }}</td>
                        <td class="actTh3">{{ $pendienteMedB }}</td>
                        <td class="actTh2">{{ $totalMedB }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="citys">Barranquilla</th>
                        <td class="actTh3">{{ $sinErrorBarB }}</td>
                        <td class="actTh3">{{ $fondoBarB }}</td>
                        <td class="actTh3">{{ $formaBarB }}</td>
                        <td class="actTh3">{{ $ambosBarB }}</td>
                        <td class="actTh3">{{ $pendienteBarB }}</td>
                        <td class="actTh2">{{ $totalBarB }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="citys">Bucaramanga</th>
                        <td class="actTh3">{{ $sinErrorBucB }}</td>
                        <td class="actTh3">{{ $fondoBucB }}</td>
                        <td class="actTh3">{{ $formaBucB }}</td>
                        <td class="actTh3">{{ $ambosBucB }}</td>
                        <td class="actTh3">{{ $pendienteBucB }}</td>
                        <td class="actTh2">{{ $totalBucB }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="citys">Cali</th>
                        <td class="actTh3">{{ $sinErrorCalB }}</td>
                        <td class="actTh3">{{ $fondoCalB }}</td>
                        <td class="actTh3">{{ $formaCalB }}</td>
                        <td class="actTh3">{{ $ambosCalB }}</td>
                        <td class="actTh3">{{ $pendienteCalB }}</td>
                        <td class="actTh2">{{ $totalCalB }} </td>
                    </tr>
                </tbody>
                <tfoot>
                    <th class="citys actTh3" scope="row">Total</th>
                    <td class="calidad1" style="font-size: 14px !important;">{{ $sinErrorB }}</td>
                    <td class="calidad2" style="font-size: 14px !important;">{{ $fondoB }}</td>
                    <td class="calidad3" style="font-size: 14px !important;">{{ $formaB }}</td>
                    <td class="calidad4" style="font-size: 14px !important;">{{ $ambosB }}</td>
                    <td class="calidad5" style="font-size: 14px !important;">{{ $pendienteB }}</td>
                    <td class="actTh2" style="font-size: 14px !important;">{{ $totalBronces }}</td>
                </tfoot>
            </table>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="card three-card">
            <canvas id="qualityCasesUserAll"></canvas>
            <table class="status">
                <thead>
                    <th class="th1 actTh3">Revisor de calidad</th>
                    <th class="th1 actTh3" style="font-size: 11px !important;">Casos asignados</th>
                </thead>
                <tbody>
                    @foreach ($auditorCal as $key => $auCal)
                        <tr>
                            <td class="citys">{{ $key }}</td>
                            <td class="actTh2A">{{ $auCal }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card three-card">
            <canvas id="qualityCasesUser1"></canvas>
            <table class="status">
                <thead>
                    <tr>
                        <th class="citysA">{{ $usuario1 }}</th>
                        <th class="calidad1">Sin errores </th>
                        <th class="calidad2">Error de fondo </th>
                        <th class="calidad3">Error de forma</th>
                        <th class="calidad4">Fondo y forma</th>
                        <th class="calidad5">Pendientes</th>
                        <th class="citys actTh3">Total</th>
                    </tr>
                    </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td class="tcalA">{{ $sinErrorUs1 }}</td>
                        <td class="tcalA">{{ $fondoUs1 }}</td>
                        <td class="tcalA">{{ $formaUs1 }}</td>
                        <td class="tcalA">{{ $ambosUs1 }}</td>
                        <td class="tcalA">{{ $pendienteUs1 }}</td>
                        <td class="actTh2">{{ $casosUs1 }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="card three-card">
            <canvas id="qualityCasesUser2"></canvas>
            <table class="status">
                <thead>
                    <tr>
                        <th class="citysA">{{ $usuario2 }}</th>
                        <th class="calidad1">Sin errores </th>
                        <th class="calidad2">Error de fondo </th>
                        <th class="calidad3">Error de forma</th>
                        <th class="calidad4">Fondo y forma</th>
                        <th class="calidad5">Pendientes</th>
                        <th class="citys actTh3">Total</th>
                    </tr>
                    </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td class="tcalA">{{ $sinErrorUs2 }}</td>
                        <td class="tcalA">{{ $fondoUs2 }}</td>
                        <td class="tcalA">{{ $formaUs2 }}</td>
                        <td class="tcalA">{{ $ambosUs2 }}</td>
                        <td class="tcalA">{{ $pendienteUs2 }}</td>
                        <td class="actTh2">{{ $casosUs2 }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>






@stop
@section('js')

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <script type="text/javascript">
        $(function() {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }

            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Hoy': [moment(), moment()],
                    'Ayer': [moment().subtract(1, 'dia'), moment().subtract(1, 'dia')],
                    'Ultimos 7 Dias': [moment().subtract(6, 'dia'), moment()],
                    'Ultimos 30 Dias': [moment().subtract(29, 'dia'), moment()],
                    'Este mes': [moment().startOf('mes'), moment().endOf('mes')],
                    'Ultimo Mes': [moment().subtract(1, 'mes').startOf('mes'), moment().subtract(1,
                        'month').endOf('mes')]
                }
            }, cb);

            cb(start, end);

        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script>
        $('.refresh').on 'click', - >
            $(this).toggleClass 'loading'
    </script>
    <script>
        var xValues = ["Activos", "Inactivos"];
        var activos = {!! json_encode($activos) !!};
        var inactivos = {!! json_encode($inactivos) !!};

        var barColors = [
            "#DAF7A6",
            "#C70039"
        ];

        new Chart("activados", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: [activos, inactivos],
                }],
            },
            options: {
                legend: {
                    display: true,
                    labels: {
                        fontColor: '#232323'
                    },
                    position: 'right'
                }
            }

        });
    </script>
    <script>
        var asignados = {!! json_encode($asignados) !!};
        var diligenciados = {!! json_encode($diligenciados) !!};
        var noConcretados = {!! json_encode($noConcretados) !!};
        var disponibles = {!! json_encode($disponibles) !!};
        var enTramite = {!! json_encode($enTramite) !!};

        var xValues = ["Asignados", "Concretados", "No concretados", "Sin asignar", "En tramite"];
        var textSize = 22;
        var textColor = "#2AFF00";
        var yValues = [asignados, diligenciados, noConcretados, disponibles, enTramite];
        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#0BEF20",
            "#EAFD01"
        ];
        var textColor = "#AF02FF";

        new Chart("statusCases", {
            type: "doughnut",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'ESTATUS GLOBAL DE PUNTOS',
                    fontColor: textColor,
                    fontSize: 22,
                },
                legend: {
                    display: true,
                    labels: {
                        fontColor: '#232323'
                    },
                    position: 'right'
                }
            }
        });
    </script>
    <script>
        var asignadosG = {!! json_encode($asignadosG) !!};
        var diligenciadosG = {!! json_encode($diligenciadosG) !!};
        var noConcretadosG = {!! json_encode($noConcretadosG) !!};
        var disponiblesG = {!! json_encode($disponiblesG) !!};
        var enTramiteG = {!! json_encode($enTramiteG) !!};

        var xValues = ["Asignados", "Concretados", "No concretados", "Sin asignar", "En tramite"];
        var textSize = 22;
        var textColor = "#2AFF00";
        var yValues = [asignadosG, diligenciadosG, noConcretadosG, disponiblesG, enTramiteG];
        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#0BEF20",
            "#EAFD01"
        ];
        var textColor = "#FADD03";

        new Chart("statusCasesGold", {
            type: "doughnut",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'PUNTOS GOLD',
                    fontColor: textColor,
                    fontSize: 22,
                },
                legend: {
                    display: true,
                    labels: {
                        fontColor: '#232323'
                    },
                    position: 'right'
                }
            }
        });
    </script>
    <script>
        var asignadosS = {!! json_encode($asignadosS) !!};
        var diligenciadosS = {!! json_encode($diligenciadosS) !!};
        var noConcretadosS = {!! json_encode($noConcretadosS) !!};
        var disponiblesS = {!! json_encode($disponiblesS) !!};
        var enTramiteS = {!! json_encode($enTramiteS) !!};

        var xValues = ["Asignados", "Concretados", "No concretados", "Sin asignar", "En tramite"];
        var textSize = 22;
        var yValues = [asignadosS, diligenciadosS, noConcretadosS, disponiblesS, enTramiteS];
        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#0BEF20",
            "#EAFD01"
        ];
        var textColor = "#23434C";

        new Chart("statusCasesSilver", {
            type: "doughnut",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'PUNTOS SILVER',
                    fontColor: textColor,
                    fontSize: 22,
                },
                legend: {
                    display: true,
                    labels: {
                        fontColor: '#232323'
                    },
                    position: 'right'
                }
            }
        });
    </script>
    <script>
        var asignadosB = {!! json_encode($asignadosB) !!};
        var diligenciadosB = {!! json_encode($diligenciadosB) !!};
        var noConcretadosB = {!! json_encode($noConcretadosB) !!};
        var disponiblesB = {!! json_encode($disponiblesB) !!};
        var enTramiteB = {!! json_encode($enTramiteB) !!};

        var xValues = ["Asignados", "Concretados", "No concretados", "Sin asignar", "En tramite"];
        var textSize = 22;
        var yValues = [asignadosB, diligenciadosB, noConcretadosB, disponiblesB, enTramiteB];
        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#0BEF20",
            "#EAFD01"
        ];
        var textColor = "#E76318";

        new Chart("statusCasesBronce", {
            type: "doughnut",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'PUNTOS BRONCE',
                    fontColor: textColor,
                    fontSize: 22,
                },
                legend: {
                    display: true,
                    labels: {
                        fontColor: '#232323'
                    },
                    position: 'right'
                }
            }
        });
    </script>
    <script>
        var sinError = {!! json_encode($sinError) !!};
        var fondo = {!! json_encode($fondo) !!};
        var forma = {!! json_encode($forma) !!};
        var ambos = {!! json_encode($ambos) !!};
        var pendiente = {!! json_encode($pendiente) !!};

        var xValues = ["Sin errores", "Error de Fondo", "Error de Forma", "Error de fondo y forma", "Pendiente calidad"];
        var textSize = 22;
        var yValues = [sinError, fondo, forma, ambos, pendiente];
        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#0BEF20",
            "#EAFD01"
        ];
        var textColor = "#00544A";

        new Chart("qualityCases", {
            type: "doughnut",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'GESTION GENERAL DE CALIDAD',
                    fontColor: textColor,
                    fontSize: 22,
                },
                legend: {
                    display: true,
                    labels: {
                        fontColor: '#232323'
                    },
                    position: 'right'
                }
            }
        });
    </script>
    <script>
        var sinErrorG = {!! json_encode($sinErrorG) !!};
        var fondoG = {!! json_encode($fondoG) !!};
        var formaG = {!! json_encode($formaG) !!};
        var ambosG = {!! json_encode($ambosG) !!};
        var pendienteG = {!! json_encode($pendienteG) !!};

        var xValues = ["Sin errores", "Error de Fondo", "Error de Forma", "Error de fondo y forma", "Pendiente calidad"];
        var textSize = 22;
        var yValues = [sinErrorG, fondoG, formaG, ambosG, pendienteG];
        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#0BEF20",
            "#EAFD01"
        ];
        var textColor = "#F7F9F9";

        new Chart("qualityCasesG", {
            type: "doughnut",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'GESTION CALIDAD PUNTOS GOLD',
                    fontColor: textColor,
                    fontSize: 22,
                },
                legend: {
                    display: true,
                    labels: {
                        fontColor: '#F7F9F9'
                    },
                    position: 'right'
                }
            }
        });
    </script>
    <script>
        var sinErrorS = {!! json_encode($sinErrorS) !!};
        var fondoS = {!! json_encode($fondoS) !!};
        var formaS = {!! json_encode($formaS) !!};
        var ambosS = {!! json_encode($ambosS) !!};
        var pendienteS = {!! json_encode($pendienteS) !!};

        var xValues = ["Sin errores", "Error de Fondo", "Error de Forma", "Error de fondo y forma", "Pendiente calidad"];
        var textSize = 22;
        var yValues = [sinErrorS, fondoS, formaS, ambosS, pendienteS];
        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#0BEF20",
            "#EAFD01"
        ];
        var textColor = "#F7F9F9";

        new Chart("qualityCasesS", {
            type: "doughnut",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'GESTION CALIDAD PUNTOS SILVER',
                    fontColor: textColor,
                    fontSize: 22,
                },
                legend: {
                    display: true,
                    labels: {
                        fontColor: '#232323'
                    },
                    position: 'right'
                }
            }
        });
    </script>
    <script>
        var sinErrorB = {!! json_encode($sinErrorB) !!};
        var fondoB = {!! json_encode($fondoB) !!};
        var formaB = {!! json_encode($formaB) !!};
        var ambosB = {!! json_encode($ambosB) !!};
        var pendienteB = {!! json_encode($pendienteB) !!};

        var xValues = ["Sin errores", "Error de Fondo", "Error de Forma", "Error de fondo y forma", "Pendiente calidad"];
        var textSize = 22;
        var yValues = [sinErrorB, fondoB, formaB, ambosB, pendienteB];
        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#0BEF20",
            "#EAFD01"
        ];
        var textColor = "#F7F9F9";

        new Chart("qualityCasesB", {
            type: "doughnut",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'GESTION CALIDAD PUNTOS BRONCE',
                    fontColor: textColor,
                    fontSize: 22,
                },
                legend: {
                    display: true,
                    labels: {
                        fontColor: '#232323'
                    },
                    position: 'right'
                }
            }
        });
    </script>
    <script>
        var sinError = {!! json_encode($sinError) !!};
        var fondo = {!! json_encode($fondo) !!};
        var forma = {!! json_encode($forma) !!};
        var ambos = {!! json_encode($ambos) !!};
        var pendiente = {!! json_encode($pendiente) !!};

        var xValues = ["Sin errores", "Error de Fondo", "Error de Forma", "Error de fondo y forma", "Pendiente calidad"];
        var textSize = 22;
        var yValues = [sinError, fondo, forma, ambos, pendiente];
        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#0BEF20",
            "#EAFD01"
        ];
        var textColor = "#F7F9F9";

        new Chart("qualityCasesUserAll", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'GESTION GENERAL DE CALIDAD',
                    fontColor: textColor,
                    fontSize: 22,
                },
                legend: {
                    display: true,
                    labels: {
                        fontColor: '#F7F9F9'
                    },
                    position: 'right'
                }
            }
        });
    </script>
    <script>
        var sinErrorUs1 = {!! json_encode($sinErrorUs1) !!};
        var fondoUs1 = {!! json_encode($fondoUs1) !!};
        var formaUs1 = {!! json_encode($formaUs1) !!};
        var ambosUs1 = {!! json_encode($ambosUs1) !!};
        var pendienteUs1 = {!! json_encode($pendienteUs1) !!};
        var usuario1 = {!! json_encode($usuario1) !!}



        var xValues = ["Sin errores", "Error de Fondo", "Error de Forma", "Error de fondo y forma", "Pendiente calidad"];
        var textSize = 22;
        var yValues = [sinErrorUs1, fondoUs1, formaUs1, ambosUs1, pendienteUs1];
        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#0BEF20",
            "#EAFD01"
        ];
        var textColor = "#F7F9F9";

        new Chart("qualityCasesUser1", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'GESTION DE ' + usuario1,
                    fontColor: textColor,
                    fontSize: 22,
                },
                legend: {
                    display: true,
                    labels: {
                        fontColor: '#F7F9F9'
                    },
                    position: 'right'
                }
            }
        });
    </script>
    <script>
        var sinErrorUs2 = {!! json_encode($sinErrorUs2) !!};
        var fondoUs2 = {!! json_encode($fondoUs2) !!};
        var formaUs2 = {!! json_encode($formaUs2) !!};
        var ambosUs2 = {!! json_encode($ambosUs2) !!};
        var pendienteUs2 = {!! json_encode($pendienteUs2) !!};
        var usuario2 = {!! json_encode($usuario2) !!}

        var xValues = ["Sin errores", "Error de Fondo", "Error de Forma", "Error de fondo y forma", "Pendiente calidad"];
        var textSize = 22;
        var yValues = [sinErrorUs2, fondoUs2, formaUs2, ambosUs2, pendienteUs2];
        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#0BEF20",
            "#EAFD01"
        ];
        var textColor = "#F7F9F9";

        new Chart("qualityCasesUser2", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'GESTION DE ' + usuario2,
                    fontColor: textColor,
                    fontSize: 22,
                },
                legend: {
                    display: true,
                    labels: {
                        fontColor: '#F7F9F9'
                    },
                    position: 'right'
                }
            }
        });
    </script>

    <script>
        const fecha = new Date();
        const opciones = {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        const fechaFormateada = fecha.toLocaleString('es-ES', opciones);
        $("#f1t1").val(fechaFormateada);
    </script>

    <script language="JavaScript">
        function mueveReloj() {
            momentoActual = new Date()
            hora = momentoActual.getHours()
            minuto = momentoActual.getMinutes()
            segundo = momentoActual.getSeconds()

            horaImprimible = hora + " : " + minuto + " : " + segundo

            document.form_reloj.reloj.value = horaImprimible

            setTimeout("mueveReloj()", 1000)
        }
    </script>

    <script type="text/javascript">
        setTimeout(function() {
            location.reload("contenedor_reloj");
        }, 300000);
    </script>
@stop
