<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF DE AUDITORIA ID No {{ $auditoriaPdf->precarga_id }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            width: 93.8%;
            margin: 0 0px 0 0px;
            background-color: white;
            padding: 20px 20px 20px 20px;

        }

        hr {
            margin-top: 1 rem;
            margin-bottom: 1 rem;
            height: 6px;
            background-color: rgb(179, 179, 179);
            border: none;
        }

        h1 {

            font-size: 22px;
            font-weight: bold;
        }

        h2 {

            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }

        .pieDePagina {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            color: black;
            text-align: center;
        }

        .page-break {
            page-break-after: always;
        }



        .contenedor-top {

            padding: 1rem;
            height: 5rem;
            margin-bottom: 2rem;
        }

        .contenedor-top .logo {
            width: 140px;
            height: 60px;
        }

        .contenedor-info {

            padding: 1rem;
            height: 4rem;
            margin-bottom: 2rem;
        }

        .contenedor-info h5 {
            font-size: 16px;
            margin-bottom: 22px;
        }

        .contenedor-sencillo {

            padding: 1rem;
            height: 20rem;
            margin-top: 1rem;
            margin-bottom: 1rem;
            width: 213.3px;
            text-align: center;
            display: inline-flex;
            position: relative;
        }


        .contenedor-lineal {

            padding: 1rem;
            height: 20rem;
            margin-top: 1rem;
            margin-bottom: 1rem;
            width: 100%;
            text-align: center;
            display: inline-flex;
            position: relative;
        }

        .contenedor-lineal p {
            font-size: 14px;
            margin-top: 1rem;
            text-align: justify;
            margin-bottom: 2rem;
            padding: 3rem;
        }


        .contenedor-sencillo .tarjeta {
            background: rgb(23, 43, 36);
            height: 80px;
            width: 150px;
            background: rgb(235, 167, 103)03, 235, 235);
            display: block;
        }

        .contenedor-sencillo h3 {
            text-align: center;
            font-size: 22px;
            font-weight: bold;
        }

        .contenedor-sencillo p {
            font-size: 13px;
            margin-top: 1rem;
            text-align: justify;
            margin-bottom: 2rem;
        }

        .imagen-sencillo {
            width: 230px;
            height: 205px;
            border-radius: 0.75rem;
        }

        .imagen-lineal {
            width: 260px;
            height: 215px;

            border-radius: 0.75rem;
        }

        .contenedor-doble-comp {
            padding: 1rem;
            height: 20rem;
            margin-left: 2rem;
            margin-top: 4rem;
            margin-bottom: -4rem;
            width: 300px;
            text-align: center;
            display: inline-flex;
        }

        .contenedor-doble-comp .tarjeta {
            height: 80px;
            width: 150px;
            display: block;
        }


        .contenedor-doble-comp h3 {
            margin-top: 9rem;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
        }

        .contenedor-doble-comp p {
            font-size: 13px;
            margin-top: 1rem;
            text-align: justify;
            margin-bottom: 2rem;
        }

        /**/
        .contenedor-doble {
            padding: 1rem;
            height: 20rem;
            margin-top: 3rem;
            margin-bottom: -4rem;
            width: 213.3px;
            text-align: center;
            display: inline-flex;
        }

        .contenedor-doble .tarjeta {
            height: 80px;
            width: 150px;
            display: block;
        }

        .contenedor-doble h3 {
            margin-top: 9rem;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
        }

        .contenedor-doble p {
            font-size: 13px;
            margin-top: 1rem;
            text-align: justify;
            margin-bottom: 2rem;
        }

        .contenedor-doble small {

            margin-top: -2rem;
            margin-bottom: 1rem;
            color: rgb(105, 104, 104);
            font-size: 11px;
            text-align: left !important;
        }


        .imagen-standard {

            margin-left: 4rem;
            width: 230px;
            height: 205px;
            border-radius: 0.75rem;
        }

        .imagen-comp {

            margin-left: 9rem;
            width: 310px;
            height: 205px;
            border-radius: 0.75rem;
        }

        .imagen-botella {
            margin-left: 4rem;
            width: 60px;
            height: 175px;
            border-radius: 0.75rem;
        }

        .imagen-botella-xs {
            margin-left: 4rem;
            width: 55px;
            height: 175px;
            border-radius: 0.75rem;
        }

        .imagen-botella-small {
            margin-top: 2rem;
            margin-left: 4rem;
            width: 80px;
            height: 160px;
            border-radius: 0.75rem;
        }

        .contenedor-triple-materiales {

            padding: 1rem;
            height: 26rem;
            margin-top: 4rem;
            margin-bottom: -4rem;
            width: 213.3px;
            text-align: center;
            display: inline-flex;
        }


        .contenedor-triple-materiales .tarjeta {

            height: 80px;
            width: 150px;

            display: block;
        }

        .contenedor-triple-materiales h3 {
            margin-top: 9rem;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
        }

        .contenedor-triple-materiales p {
            font-size: 13px;
            margin-top: 1rem;
            text-align: justify;
            margin-bottom: 2rem;
        }

        .contenedor-triple-materiales small {

            margin-top: 1rem;
            color: rgb(105, 104, 104);
            font-size: 11px;
            text-align: left !important;
        }

        .contenedor-triple-disponibilidad {

            padding: 1rem;
            height: 26rem;
            margin-top: 6rem;
            margin-bottom: -4rem;
            width: 213.3px;
            text-align: center;
            display: inline-flex;
            background: rgb(254, 249, 231);
            border-radius: 0.75rem;
        }


        .contenedor-triple-disponibilidad .tarjeta {

            height: 80px;
            width: 150px;

            display: block;
        }

        .contenedor-triple-disponibilidad h3 {
            margin-top: 9rem;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
        }

        .contenedor-triple-disponibilidad p {
            font-size: 13px;
            margin-top: 1rem;
            text-align: justify;
            margin-bottom: 2rem;
        }

        .contenedor-triple-disponibilidad small {

            margin-top: 1rem;
            color: rgb(105, 104, 104);
            font-size: 11px;
            text-align: left !important;
        }

        .imagen-standard {

            margin-left: 4rem;
            width: 230px;
            height: 205px;
            border-radius: 0.75rem;
        }

        blockquote{

            padding: 1rem;
            width: 90%;

            height: 200px;

            color: black;
            text-align: justify;


        }
    </style>

</head>

<body>
    <div class="contenedor-top">
        <img class="logo"
            src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/extrem_logo.png'))) }}" />
        <center>
            <h1>AUDITORIA PUNTO No {{ $auditoriaPdf->precarga_id }}</h1>
        </center>
    </div>


    <div class="contenedor-info">
        <h5>IDENTIFICADOR DEL PUNTO</h5>

        <p>El punto ha sido designado con el id <b>{{ $auditoriaPdf->id }}</b>,
            adicionalemente al momento de ser precargado, se le asigno el id
            <b>{{ $auditoriaPdf->precarga_id }}</b>, la visita fue registrada el
            {{ $auditoriaPdf->star->format('d-m-Y') }} a
            las {{ $auditoriaPdf->star->format('H:m:i') }}.
        </p>
    </div>
    <hr>
    <ul>
        <div class="contenedor-sencillo">
            <div class="tarjeta">
                <img class="imagen-sencillo"
                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/activacion_' . $auditoriaPdf->precarga_id . '.png'))) }}" />
            </div>
            <h3>ACTIVACION</h3>
            <p class="texo-info">Este punto está ubicado en la ciudad de <b> {{ $auditoriaPdf->municipio }}</b>, fué
                registrado como
                @if ($auditoriaPdf->activacion != 'activo')
                 <b style="text-transform: uppercase;">{{ $auditoriaPdf->activacion }}</b>, las causales reportadas fueron,
                    <b>{{ $auditoriaPdf->noConcreciones }}</b>
                    @if ($auditoriaPdf->noConcreciones == 'Otro motivo')
                        y estan se definieron como <b>{{ $auditoriaPdf->cual }}</b>
                    @endif
                    indicando el auditor <b>"{{ $auditoriaPdf->observaciones }}"</b>.
                @else
                    <b style="text-transform: uppercase;">{{ $auditoriaPdf->activacion }}</b>
                @endif
        </div>
    </ul>
    <ul>

        @if ($auditoriaPdf->activacion == 'activo')
            <div class="contenedor-doble">
                <div class="tarjeta">
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/tipologia_' . $auditoriaPdf->precarga_id . '.png'))) }}" />
                </div>
                <h3>TIPOLOGIA</h3>
                <p class="card-text">
                    @if ($auditoriaPdf->tipologia == 'tipologia_si')
                    Se Confirmó que la tipologia <b>{{ $auditoriaPdf->tipologia }} </b> estaba acertada
                    @else
                    Luego de la validación se modificó el punto a  <b>
                        {{ $auditoriaPdf->tipologia }}</b>, en la base originalmente se había registrado como {{ $tip[0] }}
                    @endif

                </p>
            </div>
            <div class="contenedor-doble">
                <div class="tarjeta">
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/segmento_' . $auditoriaPdf->precarga_id . '.png'))) }}" />
                </div>
                <h3>SEGMENTO</h3>
                <p class="card-text">
                    @if ($auditoriaPdf->segmento == 'segmento_si')
                    Se confirmó que  el segmento del punto era <b>
                        {{ $auditoriaPdf->segmento }}</b>
                        @else
                            Luego de la validación se modificó el punto a  <b>
                                {{ $auditoriaPdf->segmento }}</b>, en la base originalmente se había registrado como {{ $seg[0]}}
                        @endif
                    se indagó sobre la venta de cajas de cerveza {{ $auditoriaPdf->caja_cerveza }}, aguardiente
                    {{ $auditoriaPdf->caja_aguardiente }}, ron {{ $auditoriaPdf->caja_ron }} y whisky
                    {{ $auditoriaPdf->caja_whiskey }}
                </p>
            </div>

    </ul>



    <div class="page-break"></div>
    <ul>
        <br><br>
        <h2>FOTO DE EXITO Y MATERIALES</h2>
    </ul>
    <br>
    <br>
    <ul>
        <div class="contenedor-triple-materiales">
            <div class="tarjeta">
                @if ($auditoriaPdf->cenefa == 'cenefa_si')
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/cenefa_' . $auditoriaPdf->precarga_id . '.png'))) }}" />
                @else
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/no_diponible.png'))) }}" />
                @endif
            </div>

            <h3>CENEFA</h3>
            <p class="card-text">
                @if ($auditoriaPdf->cenefa == 'cenefa_si')
                    @if ($auditoriaPdf->cenefa_visi == 'cenefa_visi_si')
                        se evidecia que la ceneda está visible al público,
                    @else
                        se evidecia que la ceneda no es visible para el público,
                    @endif
                    @if ($auditoriaPdf->cenefa_colo == 'cenefa_colo_si')
                        su colocación es la correcta
                    @else
                        ademas que su colocación no es la apropiada.
                    @endif
                @else
                    este material no fue encontrado en el punto de venta.
                @endif
            </p>

        </div>

        <div class="contenedor-triple-materiales">
            <div class="tarjeta">
                @if ($auditoriaPdf->afiche == 'afiche_si')
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/afiche_' . $auditoriaPdf->precarga_id . '.png'))) }}" />
                @else
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/no_diponible.png'))) }}" />
                @endif
            </div>
            <h3>AFICHE</h3>
            <p class="card-text">
                @if ($auditoriaPdf->afiche == 'afiche_si')

                    @if ($auditoriaPdf->afiche_visi == 'afiche_visi_si')
                        El afiche es visible al público,
                    @else
                        El afiche no es visible para el público,
                    @endif
                    @if ($auditoriaPdf->afiche_colo == 'afiche_colo_si')
                        su colocación es la correcta,
                    @else
                        no se aprecia correctamente, ya que su colocación no es correcta,
                    @endif

                    @if ($auditoriaPdf->aficheCombotizado == 'afiche_combo_si')
                        La referencia de la combotización es
                        <strong>{{ $auditoriaPdf->marca_combo }}</strong>,
                        @if ($auditoriaPdf->combox1 == 'combox1_si')
                            la combotización incluye otros productos,
                        @else
                            la combotización no incluye otro producto,
                        @endif
                        @if ($auditoriaPdf->combox2 == 'combox2_si')
                            hay promoción de precio en el combo,
                        @else
                            el precio no está incluido en esta,
                        @endif
                        @if ($auditoriaPdf->combox3 == 'combox3_si')
                            adiciona un gift.
                        @else
                            no incluye gift.
                        @endif
                    @else
                        <p class="refe">El afiche no se combotizó.
                    @endif
                @else
                    este material no fue encontrado en el punto de venta.
                @endif



            </p>
        </div>
        <div class="contenedor-triple-materiales">
            <div class="tarjeta">
                @if ($auditoriaPdf->marco == 'marco_si')
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/marco_' . $auditoriaPdf->precarga_id . '.png'))) }}" />
                @else
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/no_diponible.png'))) }}" />
                @endif

            </div>
            <h3>MARCO</h3>
            <p class="card-text">
                @if ($auditoriaPdf->marco == 'marco_si')
                    @if ($auditoriaPdf->marco_visi == 'marco_visi_si')
                        el marco esta visible al público
                    @else
                        el marco no es visible para el público
                    @endif
                    @if ($auditoriaPdf->marco_colo == 'marco_colo_si')
                        la colocación del marco es la correcta
                    @else
                        la colocación del marco no es la apropiada
                    @endif
                @else
                    este material no fue encontrado en el punto de venta.
                @endif
            </p>
        </div>

    </ul>
    <ul>
        <div class="contenedor-triple-materiales">
            <div class="tarjeta">
                @if ($auditoriaPdf->rompetraficos == 'rompetraficos_si')
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/Rompetrafico_' . $auditoriaPdf->precarga_id . '.png'))) }}" />
                @else
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/no_diponible.png'))) }}" />
                @endif
            </div>

            <h3>ROMPETRAFICOS</h3>
            <br>
            <p class="card-text">
                @if ($auditoriaPdf->rompetraficos == 'rompetraficos_si')
                    @if ($auditoriaPdf->prod_rt_visibles == 'prod_rt_visibles_si')
                        El rompetrafico esta visible al publico,
                    @else
                        El rompetrafico no esta visible para el publico,
                    @endif
                    @if ($auditoriaPdf->prod_rt_properly == 'prod_rt_properly_si')
                        la colocaci&oacute;n es considerada la correcta.
                    @else
                        su colocaci&oacute;n no es la apropiada.
                    @endif
                @else
                    este material no fue encontrado en el punto de venta.
                @endif
            </p>

        </div>

        <div class="contenedor-triple-materiales">
            <div class="tarjeta">
                @if ($auditoriaPdf->fachadas == 'fachadas_si')
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/Faxada_' . $auditoriaPdf->precarga_id . '.png'))) }}" />
                @else
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/no_diponible.png'))) }}" />
                @endif
            </div>
            <h3>FACHADAS Y AVISOS</h3>
            <p class="card-text">
                @if ($auditoriaPdf->fachadas == 'fachadas_si')

                    @if ($auditoriaPdf->fachadas_visi == 'fachadas_visi_si')
                        la fachada y avisos estan visibles al consumidor,
                    @else
                        la fachada y avisos no esta visibles al consumidor,
                    @endif
                    @if ($auditoriaPdf->fachadas_colo == 'fachadas_colo_si')
                        y se encuentran en buen estado.
                    @else
                        no estan en buen estado, estan tapadas o da&ntilde;adas.
                    @endif
                @else
                    este material no fue encontrado en el punto de venta.
                @endif

            </p>
        </div>
        <div class="contenedor-triple-materiales">
            <div class="tarjeta">
                @if ($auditoriaPdf->hielera == 'hielera_si')
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/marco_' . $auditoriaPdf->precarga_id . '.png'))) }}" />
                @else
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/no_diponible.png'))) }}" />
                @endif
            </div>
            <h3>HIELERA</h3>
            <br>
            <p class="card-text">
                @if ($auditoriaPdf->hielera == 'hielera_si')
                    @if ($auditoriaPdf->hl_con_prod == 'hl_con_prod_si')
                        Las hieleras cuentan con productos DIAGEO,
                    @else
                        Las hieleras no cuentan con productos DIAGEO,
                    @endif
                    @if ($auditoriaPdf->prod_hl_visible == 'prod_hl_visible_si')
                        estan visibles al consumidor,
                    @else
                        estan tapadas por otros productos o marcas,
                    @endif

                    @if ($auditoriaPdf->prod_hl_danadas == 'prod_hl_danadas_si')
                        y se encuentran en buen estado.
                    @else
                        estan quebradas, ralladas, en mal estado.
                    @endif
                @else
                    este material no fue encontrado en el punto de venta.
                @endif
            </p>
        </div>
    </ul>
    <div class="page-break"></div>

    <ul>
        <div class="contenedor-triple-materiales">
            <div class="tarjeta">
                @if ($auditoriaPdf->bases_h == 'bases_h_si')
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/Base_h_' . $auditoriaPdf->precarga_id . '.png'))) }}" />
                @else
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/no_diponible.png'))) }}" />
                @endif
            </div>

            <h3>BASES DE HIELERAS</h3>

            <p class="card-text">
                @if ($auditoriaPdf->bases_h == 'bases_h_si')
                    @if ($auditoriaPdf->baseshl_con_prod == 'baseshl_con_prod_si')
                        Las bases de las hieleras cuentan con productos DIAGEO,
                    @else
                        Las bases de las hieleras no cuentan con productos DIAGEO,
                    @endif
                    @if ($auditoriaPdf->prod_baseshl_visible == 'prod_baseshl_visible_si')
                        estan visibles al consumidor,
                    @else
                        estan tapadas por otros productos o marcas,
                    @endif

                    @if ($auditoriaPdf->prod_baseshl_danadas == 'prod_baseshl_danadas_si')
                        y se encuentran en buen estado.
                    @else
                        estan quebradas, ralladas, en mal estado.
                    @endif
                @else
                    este material no fue encontrado en el punto de venta.
                @endif
            </p>

        </div>

        <div class="contenedor-triple-materiales">
            <div class="tarjeta">
                @if ($auditoriaPdf->dosificadorS == 'dosificadorS_si')
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/DosificadorS_' . $auditoriaPdf->precarga_id . '.png'))) }}" />
                @else
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/no_diponible.png'))) }}" />
                @endif
            </div>
            <h3>DOSIFICADOR SENCILLO</h3>
            <p class="card-text">
                @if ($auditoriaPdf->dosificadorS == 'dosificadorS_si')
                    @if ($auditoriaPdf->prod_dsS_visibles == 'prod_dsS_visibles_si')
                        El dosificador sencillo esta visible al consumidor,
                    @else
                        El dosificador sencillo no esta visible al consumidor,
                    @endif
                    @if ($auditoriaPdf->prod_dsS_diferentes == 'prod_dsS_diferentes_si')
                        esta exhibido con productos Diageo
                    @else
                        esta exhibido con productos diferentes a la marca
                    @endif

                    @if ($auditoriaPdf->prod_dsS_danados == 'prod_dsS_danados_si')
                        y se encuentra en buen estado.
                    @else
                        tienen polvo, esta sucio o las etiquetas estan en mal estado.
                    @endif
                @else
                    este material no fue encontrado en el punto de venta.
                @endif
            </p>
        </div>
        <div class="contenedor-triple-materiales">
            <div class="tarjeta">
                @if ($auditoriaPdf->dosificadorD == 'dosificadorD_si')
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/DosificadorD_' . $auditoriaPdf->precarga_id . '.png'))) }}" />
                @else
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/no_diponible.png'))) }}" />
                @endif
            </div>
            <h3>DOSIFICADOR DOBLE</h3>

            <p class="card-text">
                @if ($auditoriaPdf->dosificadorD == 'dosificadorD_si')
                    @if ($auditoriaPdf->prod_dsD_visibles == 'prod_dsD_visibles_si')
                        El dosificador doble esta visible al consumidor,
                    @else
                        El dosificador doble no esta visible al consumidor,
                    @endif
                    @if ($auditoriaPdf->prod_dsD_diferentes == 'prod_dsD_diferentes_si')
                        esta exhibido con productos Diageo
                    @else
                        esta exhibido con productos diferentes a la marca
                    @endif

                    @if ($auditoriaPdf->prod_dsD_danados == 'prod_dsD_danados_si')
                        y se encuentra en buen estado.
                    @else
                        tienen polvo, esta sucio o las etiquetas estan en mal estado.
                    @endif
                @else
                    este material no fue encontrado en el punto de venta.
                @endif
            </p>
        </div>
    </ul>
    <ul>
        <div class="contenedor-doble">
            <div class="tarjeta">
                @if ($auditoriaPdf->branding == 'branding_si')
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/Branding_' . $auditoriaPdf->precarga_id . '.png'))) }}" />
                @else
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/no_diponible.png'))) }}" />
                @endif
            </div>

            <h3>BRANDING</h3>

            <p class="card-text">
                @if ($auditoriaPdf->branding == 'branding_si')
                    @if ($auditoriaPdf->branding_visible == 'branding_visible_si')
                        El branding esta visible,
                    @else
                        El branding no esta visible,
                    @endif
                    @if ($auditoriaPdf->branding_danados == 'branding_danados_si')
                        se encuentra en buen estado.
                    @else
                        no se encuentra en buen estado.
                    @endif
                @else
                    este material no fue encontrado en el punto de venta.
                @endif
            </p>

        </div>

        <div class="contenedor-doble">
            <div class="tarjeta">
                @if ($auditoriaPdf->vasos == 'vasos_si')
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/Vasos_' . $auditoriaPdf->precarga_id . '.png'))) }}" />
                @else
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/no_diponible.png'))) }}" />
                @endif
            </div>
            <h3>VASOS Y COPAS</h3>
            <p class="card-text">
                @if ($auditoriaPdf->vasos == 'vasos_si')

                    @if ($auditoriaPdf->vasos_visibles == 'vasos_visibles_si')
                        los vasos y copas estan visibles,
                    @else
                        los vasos y copas no estan visibles,
                    @endif
                    @if ($auditoriaPdf->vasos_quebrados == 'vasos_quebrados_si')
                        se encuentran en buen estado.
                    @else
                        no estan en buenas condiciones, estan rotas o averiadas.
                    @endif
                @else
                    este material no fue encontrado en el punto de venta.
                @endif
            </p>
        </div>

    </ul>
    <div class="page-break"></div>

    <br><br>
    <ul>
        <h2>DISPONIBILIDAD DE PRODUCTOS DE LA MARCA</h2>
    </ul>
    <br><br>
    <ul>
        <div class="contenedor-triple-disponibilidad">
            <div class="tarjeta">
                <img class="imagen-botella"
                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/storage/b&w.png'))) }}" />
            </div>
            <h3>BLACK & WHITE</h3>
            <p></p>
            <p class="card-text">
                @if ($auditoriaPdf->bAndw1000 == 'bAndw1000_si')
                    Durante la visita se encontró Black & White en su presentación de 1000 ml,
                @else
                    Durante la visita no se encontró Black & White en su presentación de 1000 ml,
                @endif
                @if ($auditoriaPdf->bAndw700 == 'bAndw700_si')
                    se encontró la presentación de 700 ml en el lineal,
                @else
                    respecto a la presentación de 700 ml no se encontró producto,
                @endif
                @if ($auditoriaPdf->bAndw375 == 'bAndw375_si')
                    la presentación de 375 ml se encontró exhibida.
                @else
                    no se encontró exhibida la presentación de 375 ml.
                @endif
            </p>
        </div>
        <div class="contenedor-triple-disponibilidad">
            <div class="tarjeta">
                <img class="imagen-botella"
                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/storage/smirnoff.png'))) }}" />
            </div>
            <h3>SMIRNOFF X1</h3>
            <p></p>
            <p class="card-text">
                @if ($auditoriaPdf->smirnoff700 == 'smirnoff700_si')
                    Durante la visita se encontró Smirnoff X1 en su presentación de 700 ml,
                @else
                    Durante la visita no se encontró Smirnoff X1 en su presentación de 700 ml,
                @endif
                @if ($auditoriaPdf->smirnoff375 == 'smirnoff375_si')
                    la presentación de 375 ml se encontró exhibida.
                @else
                    no se encontró exhibida la presentación de 375 ml.
                @endif
            </p>
        </div>
        <div class="contenedor-triple-disponibilidad">
            <div class="tarjeta">
                <img class="imagen-botella-xs"
                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/storage/smirnoff_sin_azucar.png'))) }}" />
            </div>
            <h3>SMIRNOFF SIN AZ&Uacute;CAR</h3>
            <p class="card-text">
                @if ($auditoriaPdf->smirnoff_ns700 == 'smirnoff_ns700_si')
                    Durante la visita se encontró Smirnoff sin azúcar en su presentación de 700 ml,
                @else
                    Durante la visita no se encontró Smirnoff sin azúcar en su presentación de 700 ml,
                @endif
                @if ($auditoriaPdf->smirnoff_ns375 == 'smirnoff_ns375_si')
                    la presentación de 375 ml se encontró exhibida.
                @else
                    no se encontró exhibida la presentación de 375 ml.
                @endif
            </p>
        </div>

    </ul>
    <ul>
        <div class="contenedor-triple-disponibilidad">
            <div class="tarjeta">
                <img class="imagen-botella"
                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/storage/jhonie_walker.png'))) }}" />
            </div>
            <h3>JHONNIE WALKER</h3>

            <p class="card-text">
                @if ($auditoriaPdf->jhonnie1000 == 'jhonnie1000_si')
                    Durante la visita se encontró Black & White en su presentación de 1000 ml,
                @else
                    Durante la visita no se encontró Black & White en su presentación de 1000 ml,
                @endif
                @if ($auditoriaPdf->jhonnie700 == 'jhonnie700_si')
                    respecto a la presentación de 700 ml se encotraron unidades del producto,
                @else
                    respecto a la presentación de 700 ml no se encontró producto,
                @endif
                @if ($auditoriaPdf->jhonnie375 == 'jhonnie375_si')
                    la presentación de 375 ml se encontró exhibida.
                @else
                    no se encontró exhibida la presentación de 375 ml.
                @endif
            </p>
        </div>
        <div class="contenedor-triple-disponibilidad">
            <div class="tarjeta">
                <img class="imagen-botella-small"
                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/storage/oldparr.png'))) }}" />
            </div>
            <h3>OLD PARR</h3>

            <p class="card-text">
                @if ($auditoriaPdf->oldparr750 == 'oldparr750_si')
                    Durante la visita se encontró Old Parr en su presentación de 750 ml.
                @else
                    Durante la visita no se encontró Old Parr en su presentación de 750 ml.
                @endif
            </p>
        </div>
        <div class="contenedor-triple-disponibilidad">
            <div class="tarjeta">
                <img class="imagen-botella-small"
                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/storage/buchannas.png'))) }}" />
            </div>
            <h3>BUCCHANNA&acute;S</h3>
            <p class="card-text">
                @if ($auditoriaPdf->buchannas700 == 'buchannas700_si')
                    Durante la visita se encontró Buchanna&acute;s en su presentación de 700 ml,
                @else
                    Durante la visita no se encontró Buchanna&acute;s en su presentación de 700 ml,
                @endif
                @if ($auditoriaPdf->buchannas375 == 'buchannas375_si')
                    la presentación de 375 ml fue hallada en el lineal.
                @else
                    no se encontró exhibida la presentación de 375 ml.
                @endif
            </p>
        </div>
    </ul>>>

    <div class="page-break"></div>

    <ul>
        <br><br>
        <h2>CALIDAD DE LOS PRODUCTOS DE LA MARCA</h2>
    </ul>
    <br>
    <br>
    <ul>
        <div class="contenedor-lineal">
            <div class="tarjeta">

                @if ($auditoriaPdf->cal_marc_visible != null)
                    <img class="imagen-lineal"
                            src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/LinealDiageoLinealDg_' . $auditoriaPdf->precarga_id . '.png'))) }}" />
                @else
                    <img class="imagen-lineal"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/no_diponible.png'))) }}" />
                @endif
            </div>
            <p class="texto-info">
                @if ($auditoriaPdf->cal_marc_visible == 'cal_marc_visible_si')
Luego de la visita se confirma que los productos de la marca no son visibles,
                @else
                    Luego de la visita se confirma que los productos de la marca son visibles,
                @endif
                @if ($auditoriaPdf->cal_marc_danados == 'cal_marc_danados_si')
                    se evidencia que estan dañados o presentan averias
                @else
                    se encuentran en óptimas condiciones,
                @endif

                @if ($auditoriaPdf->cal_marc_et_danados == 'cal_marc_et_danados_si')
                    al verificar el estado de sus etiquetas estas están dañadas o sucias.
                @else
                    al verificar el estado de sus etiquetas estas están en perfectas condiciones.
                @endif
        </div>
    </ul>
    <ul>
        <br><br>
        <h2>COMPETENCIA DE LA MARCA</h2>
    </ul>
    <br>
    <br>

    <ul>


        <div class="contenedor-doble-comp">
            <div class="tarjeta">
                @if ($auditoriaPdf->hay_ron == 'hay_ron_si')
                    <img class="imagen-comp"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/Ron_' . $auditoriaPdf->precarga_id . '.png'))) }}" />
                @else
                    <img class="imagen-comp"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/no_diponible.png'))) }}" />
                @endif
            </div>
            <h3>RONES DE LA COMPETENCIA</h3>
            <p class="card-text">
                @if ($auditoriaPdf->hay_ron == 'hay_ron_si')
                    Se indagó acerca de la marca de ron mas vendida en el punto y se confirma que es
                    <strong>{{ $auditoriaPdf->comp_ron1 }} </strong>, la
                    segunda más vendida es <strong>{{ $auditoriaPdf->comp_ron2 }}</strong>, ambas
                    ocupan
                    {{ $auditoriaPdf->caras_comp_ron }} caras.
                @else
                    No se encontraron rones de la competencia para poder realizar este comparativo.
                @endif
            </p>
        </div>
        <div class="contenedor-doble-comp">
            <div class="tarjeta">

                @if ($auditoriaPdf->hay_aguardiente == 'hay_aguardiente_si')
                    <img class="imagen-comp"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/Aguardiente_' . $auditoriaPdf->precarga_id . '.png'))) }}" />
                @else
                    <img class="imagen-comp"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/no_diponible.png'))) }}" />
                @endif

            </div>
            <h3>AGUARDIENTE DE LA COMPETENCIA</h3>
            <p class="card-text">
                @if ($auditoriaPdf->hay_aguardiente == 'hay_aguardiente_si')
                    Se indagó acerca de la marca de aguardiente mas vendida en el punto y se confirma
                    que es <strong>{{ $auditoriaPdf->comp_aguard1 }} </strong>, la
                    segunda más vendida es <strong>{{ $auditoriaPdf->comp_aguard2 }}</strong>, ambas
                    ocupan
                    {{ $auditoriaPdf->caras_comp_aguardiente }} caras.
                @else
                    No se encontraron aguardientes de la competencia para poder realizar este
                    comparativo.
                @endif
            </p>

        </div>

    </ul>

    <div class="page-break"></div>

    <ul>
        <br><br>
        <h2>VISIBILIDAD DE LA MARCA</h2>
    </ul>
    <br>
    <br>

    <ul>
        <div class="contenedor-triple-materiales">
            <div class="tarjeta">
                @if ($auditoriaPdf->ron_byw == 'ron_byw_si')
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/ron_byw_' . $auditoriaPdf->precarga_id . '.png'))) }}" />
                @else
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/no_diponible.png'))) }}" />
                @endif

            </div>

            <h3>RONES<br> JUNTO A <br>BLACK & WHITE</h3>



            <p class="card-text">
                @if ($auditoriaPdf->ron_byw == 'ron_byw_si')
                    Durante la visita se confirma que la marca <strong> Black & White </strong> esta
                    ubicada correctamente junto a
                    los rones de la competencia.
                @else
                    Durante la visita se confirma que la marca <strong> Black & White </strong> no esta
                    correctamente ubicada junto
                    a los rones de la competencia.
                @endif
            </p>

        </div>

        <div class="contenedor-triple-materiales">
            <div class="tarjeta">

                @if ($auditoriaPdf->ron_jhonny == 'ron_jhonny_si')
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/ron_jhonny_' . $auditoriaPdf->precarga_id . '.png'))) }}" />
                @else
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/no_diponible.png'))) }}" />
                @endif
            </div>
            <h3>RONES <br>JUNTO A <br>JHONNIE WALKER</h3>


            <p class="card-text">
                @if ($auditoriaPdf->ron_jhonny == 'ron_jhonny_si')
                    Durante la visita se confirma que la marca <strong> Jhonnie Walker </strong> esta
                    ubicada correctamente junto a
                    los rones de la competencia.
                @else
                    Durante la visita se confirma que la marca <strong> Jhonnie Walker </strong> no esta
                    correctamente ubicada junto
                    a los rones de la competencia.
                @endif
            </p>
        </div>
        <div class="contenedor-triple-materiales">
            <div class="tarjeta">

                @if ($auditoriaPdf->aguard_smirnoff == 'aguard_smirnoff_si')
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/aguard_smirnoff_' . $auditoriaPdf->precarga_id . '.png'))) }}" />
                @else
                    <img class="imagen-standard"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/no_diponible.png'))) }}" />
                @endif
            </div>
            <h3>AGUARDIENTE JUNTO A SMIRNOFF</h3>

            <p class="card-text">
                @if ($auditoriaPdf->aguard_smirnoff == 'aguard_smirnoff_si')
                    Durante la visita se confirma que la marca <strong> Smirnoff X1 </strong> esta
                    ubicada correctamente junto a
                    los rones de la competencia.
                @else
                    Durante la visita se confirma que la marca <strong> Smirnoff X1 </strong> no esta
                    correctamente ubicada junto
                    a los rones de la competencia.
                @endif
            </p>
        </div>
    </ul>
    @endif
    <br><br>
    <ul>
        <h2>OBSERVACIONES</h2>

        <blockquote>

            El comentario de cierre se registro de la siguiente forma : <em> "

             {{ $auditoriaPdf->observacionesDetallista }} ".</em>
        </blockquote>


    </ul>
<hr>
</body>

</html>
