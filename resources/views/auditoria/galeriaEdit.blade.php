@extends('adminlte::page')
@section('title', 'Reporte fotografico')

@section('css')
    <link href="{{ asset('css/galeria.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo asset('css/auditoria.css'); ?>" type="text/css">
@stop
@section('content')

    <!-- Activacion -->
    <div id="simple_gallery">
        <h1>Activaci&oacute;n</h1>
        <ul>
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <li>
                                    <button class="boto" id="rotateActiv" onclick="rotateImageActiv()"
                                        title="Girar imagen"><i class="fas fa-sync"></i></button>
                                    <img id="rotatedActiv" src="{{ asset($reporte->fotoActiv) }}" />
                                </li>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="card">
                        <h2><strong>Fachada</strong></h2>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-6 col-sm-4"><label for="">Estado</label>
                                    <p class="card-text">{{ $reporte->activacion }}</p>
                                </div>
                                <div class="col-6 col-sm-4"><label for="">Razon social</label>
                                    <p class="card-text">{{ $reporte->razonSocial }}</p>
                                </div>
                                <div class="col-6 col-sm-4"><label for="">Nit o Cedula</label>
                                    <p class="card-text">{{ $reporte->nit }}</p>
                                </div>
                                <div class="col-6 col-sm-4"><label for="">Direcci&oacute;n</label>
                                    <p class="card-text">{{ $reporte->direccion }}</p>
                                </div>
                                <div class="col-6 col-sm-4"><label for="">Latitud y Longitud</label>
                                    <p class="card-text">{{ $reporte->latitude }} {{ $reporte->longitude }}</p>
                                </div>
                                <div class="col-6 col-sm-4"><label for="">Telefono</label>
                                    <p class="card-text">{{ $reporte->telefono }}</p>
                                </div>
                                <div class="col-6 col-sm-4"> <label for="">Municipio</label>
                                    <p class="card-text">{{ $reporte->municipio }}</p>
                                </div>
                                <div class="col-6 col-sm-4"> <label for="">Barrio</label>
                                    <p class="card-text">{{ $reporte->barrio }}</p>
                                </div>
                                <!-- Force next columns to break to new line at md breakpoint and up -->
                                <div class="w-100 d-none d-md-block"></div>

                                <div class="col-6 col-sm-4">
                                    @if ($reporte->activacion != 'activo')
                                        <label for="">Causales de no concreci&oacute;n</label>
                                        <p class="card-text">{{ $reporte->noConcreciones }}</p>
                                        @if ($reporte->noConcreciones == 'Otro')
                                            <label for="">Otra causa</label>
                                            <p class="card-text">{{ $reporte->otro }}</p>
                                        @endif
                                        <label for="">Observaciones</label>
                                        <p>{{ $reporte->observaciones }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </ul>
        <!-- Segmento -->
        <div id="simple_gallery">
            <h1>Segmento</h1>
            <ul>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <li><button class="boto" id="rotateSegmento" onclick="rotateImageSeg()"
                                            title="Girar imagen"><i class="fas fa-sync"></i></button><img
                                            id="rotatedSegmento" src="{{ asset($reporte->fotosegmento) }}" />
                                    </li>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="card">
                            <h2><strong>Segmento Actual</strong></h2>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 col-sm-4">
                                        <p class="card-text">{{ $reporte->segmento }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </ul>
    </div>
    <!-- Tipologia -->
    <div id="simple_gallery">
        <h1>Tipologia</h1>
        <ul>
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <li><button class="boto" id="rotateTipologia" onclick="rotateImageTipo()"
                                        title="Girar imagen"><i class="fas fa-sync"></i></button><img id="rotatedTipologia"
                                        src="{{ asset($reporte->fototipologia) }}" />
                                </li>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="card">
                        <h2><strong>Tipologia Actual</strong></h2>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 col-sm-4">
                                    <p class="card-text">{{ $reporte->tipologia }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </ul>
    </div>
    <!-- Materiales -->
    <div id="simple_gallery">
        <h1>Foto de exito</h1>
        <ul class="fotoExito">
            @if ($reporte->cenefa == 'cenefa_si')
                <li class="parrafo"><button class="boto" id="rotateCenefa" onclick="rotateImageCenefa()"
                        title="Girar imagen"><i class="fas fa-sync"></i></button><span>Cenefa</span><img
                        id="rotatedCenefa" src="{{ asset($reporte->seleccionCenefa) }}" />
                    <p>
                        @if ($reporte->cenefa_visi == 'cenefa_visi_si')
                            la cenefa esta visible al publico
                        @else
                            la cenefa no es visible para el publico</span>
                        @endif

                        @if ($reporte->cenefa_colo == 'cenefa_colo_si')
                            la colocacion de la cenefa esta correcta
                        @else
                            la colocacion de la cenefa no es la apropiada
                        @endif
                    </p>
                </li>
            @else
                <li class="parafo">
                    <span>No hay Cenefa</span>
                    <img src="{{ asset('img/no_diponible.png') }}" />
                    <span><br></span>
                </li>
            @endif

            @if ($reporte->afiche == 'afiche_si')
                <li class="parrafo">
                    <button class="boto" id="rotateAfiche" onclick="rotateImageAfiche()" title="Girar imagen"><i
                            class="fas fa-sync"></i></button><span>Afiche</span> <img id="rotatedAfiche"
                        src="{{ asset($reporte->seleccionAfiche) }}" />


                    <p>El afiche esta visible al publico,

                        @if ($reporte->afiche_colo == 'afiche_colo_si')
                            La colocacion del afiche es correcta.
                    </p>
                @else
                    La colocacion del afiche no es la apropiada.
            @endif
            @if ($reporte->aficheCombotizado == 'afiche_combo_si')
                El afiche esta combotizado con la marca <strong>{{ $reporte->marca_combo }}</strong>
                @if ($reporte->combox1 == 'combox1_si')
                    los productos de la marca estan junto a otros productos,
                @else
                    Los productos de la marca no estan junto a otros productos,
                @endif
                @if ($reporte->combox2 == 'combox2_si')
                    los productos de la marca indican el precio,
                @else
                    Los productos de la marca no indican el precio,
                @endif
                @if ($reporte->combox3 == 'combox3_si')
                    Esta combotizado con un gift.
                @else
                    No esta combotizado con un gift.
                @endif
                </p>
            @else
                <p class="refe">El afiche no se combotizo.</p>
            @endif
            </li>
        @else
            <li>
                <span>No hay Afiche</span>
                <img src="{{ asset('img/no_diponible.png') }}" />
            </li>

            @endif


            @if ($reporte->marco == 'marco_si')
                <li class="parrafo"><button class="boto" id="rotateMarco" onclick="rotateImageMarco()"
                        title="Girar imagen"><i class="fas fa-sync"></i></button>
                    <span>Marco</span><img id="rotatedMarco" src="{{ asset($reporte->seleccionMarco) }}" />
                    @if ($reporte->marco_visi == 'marco_visi_si')
                        <p>El marco esta visible al publico
                        @else
                        <p>El marco no es visible para el publico
                    @endif
                    @if ($reporte->marco_colo == 'marco_colo_si')
                        la colocacion del marco esta correcta</p>
                    @else
                        la colocacion del marco no es el apropiada</p>
                    @endif
                </li>
            @else
                <li>
                    <p>No hay marco</p>
                    <img src="{{ asset('img/no_diponible.png') }}" />
                </li>
            @endif
            @if ($reporte->rompetraficos == 'rompetraficos_si')
                <li class="parrafo"><button class="boto" id="rotaterompetrafico" onclick="rotateImageRompetrafico()"
                        title="Girar imagen"><i class="fas fa-sync"></i></button>
                    <span>rompetrafico</span><img id="rotatedRompetrafico"
                        src="{{ asset($reporte->seleccionRompetrafico) }}" />
                    @if ($reporte->prod_rt_visibles == 'prod_rt_visibles_si')
                        <p>El rompetrafico esta visible al publico,
                        @else
                        <p>El rompetrafico no esta visible para el publico,
                    @endif
                    @if ($reporte->prod_rt_properly == 'prod_rt_properly_si')
                        la colocaci&oacute;n es considerada la correcta.</p>
                    @else
                        su colocaci&oacute;n no es la apropiada.</p>
                    @endif
                </li>
            @else
                <li>
                    <span>No hay rompetrafico</span>
                    <img src="{{ asset('img/no_diponible.png') }}" />
                </li>
            @endif
            @if ($reporte->fachadas == 'fachadas_si')
                <li class="parrafo">
                    <button class="boto" id="rotateFaxada" onclick="rotateImageFaxada()" title="Girar imagen"><i
                            class="fas fa-sync"></i></button><span>Fachada</span><img id="rotatedFaxada"
                        src="{{ asset($reporte->seleccionFaxada) }}" />
                    @if ($reporte->fachadas_visi == 'fachadas_visi_si')
                        <p>la fachada y avisos estan visibles al consumidor,
                        @else
                        <p>la fachada y avisos no esta visibles al consumidor,
                    @endif

                    @if ($reporte->fachadas_colo == 'fachadas_colo_si')
                        y se encuentran en buen estado.</p>
                    @else
                        no estan en buen estado, estan tapadas o dañadas.</p>
                    @endif
                </li>
            @else
                <li>
                    <p>No hay fachadas marcadas</p>
                    <img src="{{ asset('img/no_diponible.png') }}" />
                </li>
            @endif
            @if ($reporte->hielera == 'hielera_si')
                <li class="parrafo">
                    <button class="boto" id="rotateHielera" onclick="rotateImageHielera()" title="Girar imagen"><i
                            class="fas fa-sync"></i></button><span>Hieleras</span><img id="rotatedHielera"
                        src="{{ asset($reporte->seleccionHielera) }}" />
                    @if ($reporte->hl_con_prod == 'hl_con_prod_si')
                        <p>Las hieleras cuentan con productos DIAGEO,
                        @else
                        <p>Las hieleras no cuentan con productos DIAGEO,
                    @endif
                    @if ($reporte->prod_hl_visible == 'prod_hl_visible_si')
                        estan visibles al consumidor,
                    @else
                        estan tapadas por otros productos o marcas,
                    @endif
                    @if ($reporte->prod_hl_danadas == 'prod_hl_danadas_si')
                        y se encuentran en buen estado.</p>
                    @else
                        estan quebradas, ralladas, en mal estado.</p>
                    @endif
                </li>
            @else
                <li>
                    <p>No hay Hieleras</p>
                    <img src="{{ asset('img/no_diponible.png') }}" />
                </li>
            @endif

            @if ($reporte->bases_h == 'bases_h_si')
                <li class="parrafo">
                    <button class="boto" id="rotateBase_h" onclick="rotateImageBase_h()" title="Girar imagen"><i
                            class="fas fa-sync"></i></button><span>Bases Hielera</span><img id="rotatedBase_h"
                        src="{{ asset($reporte->seleccionBase_h) }}" />
                    @if ($reporte->baseshl_con_prod == 'baseshl_con_prod_si')
                        <p>Las bases de las hieleras cuentan con productos DIAGEO,
                        @else
                        <p>Las bases de las hieleras no cuentan con productos DIAGEO,
                    @endif
                    @if ($reporte->prod_baseshl_visible == 'prod_baseshl_visible_si')
                        estan visibles al consumidor,
                    @else
                        estan tapadas por otros productos o marcas,
                    @endif
                    @if ($reporte->prod_baseshl_danadas == 'prod_baseshl_danadas_si')
                        y se encuentran en buen estado. </p>
                    @else
                        estan quebradas, ralladas, en mal estado. </p>
                    @endif
                </li>
            @else
                <li>
                    <p>No hay bases de hieleras</p>
                    <img src="{{ asset('img/no_diponible.png') }}" />
                </li>
            @endif
            @if ($reporte->dosificadorD == 'dosificadorD_si')
                <li class="parrafo">
                    <button class="boto" id="rotateDosificadorD" onclick="rotateImageDosificadorD()"
                        title="Girar imagen"><i class="fas fa-sync"></i></button><span>Dosificador Doble</span><img
                        id="rotatedDosificadorD" src="{{ asset($reporte->seleccionDosificadorD) }}" />
                    @if ($reporte->prod_dsD_visibles == 'prod_dsD_visibles_si')
                        <p>El dosificador doble esta visible al consumidor,
                        @else
                        <p>El dosificador doble no esta visible al consumidor,
                    @endif
                    @if ($reporte->prod_dsD_diferentes == 'prod_dsD_diferentes_si')
                        esta exhibido con productos Diageo
                    @else
                        esta exhibido con productos diferentes a la marca
                    @endif
                    @if ($reporte->prod_dsD_danados == 'prod_dsD_danados_si')
                        y se encuentra en buen estado.</p>
                    @else
                        tienen polvo, esta sucio o las etiquetas estan en mal estado.</p>
                    @endif
                </li>
            @else
                <li>
                    <p>No hay doficadores dobles</p>
                    <img src="{{ asset('img/no_diponible.png') }}" />
                </li>
            @endif

            @if ($reporte->dosificadorS == 'dosificadorS_si')
                <li class="parrafo">
                    <button class="boto" id="rotateDosificadorS" onclick="rotateImageDosificadorS()"
                        title="Girar imagen"><i class="fas fa-sync"></i></button><span>Dosificador Sencillo</span><img
                        id="rotatedDosificadorS" src="{{ asset($reporte->seleccionDosificadorS) }}" />
                    @if ($reporte->prod_dsS_visibles == 'prod_dsS_visibles_si')
                        <p> El dosificador sencillo esta visible al consumidor,
                        @else
                        <p> El dosificador sencillo no esta visible al consumidor,
                    @endif
                    @if ($reporte->prod_dsS_diferentes == 'prod_dsS_diferentes_si')
                        esta exhibido con productos Diageo
                    @else
                        esta exhibido con productos diferentes a la marca
                    @endif
                    @if ($reporte->prod_dsS_danados == 'prod_dsS_danados_si')
                        y se encuentra en buen estado. </p>
                    @else
                        tienen polvo, esta sucio o la etiqueta esta en mal
                        estado. </p>
                    @endif
                </li>
            @else
                <li>
                    <span>No hay doficadores dobles</span>
                    <img src="{{ asset('img/no_diponible.png') }}" />
                </li>
            @endif
            @if ($reporte->branding == 'branding_si')
                <li class="parrafo">
                    <button class="boto" id="rotateBranding" onclick="rotateImageBranding()" title="Girar imagen"><i
                            class="fas fa-sync"></i></button><span>Branding</span><img id="rotatedBranding"
                        src="{{ asset($reporte->seleccionBranding) }}" />
                    @if ($reporte->branding_visible == 'branding_visible_si')
                        <p>El branding esta visible,
                        @else
                        <p>El branding no esta visible,
                    @endif

                    @if ($reporte->branding_danados == 'branding_danados_si')
                        se encuentra en buen estado. </p>
                    @else
                        no se encuentra en buen estado. </p>
                    @endif
                </li>
            @else
                <li>
                    <p>No hay Branding</p>
                    <img src="{{ asset('img/no_diponible.png') }}" />
                </li>
            @endif

            @if ($reporte->vasos == 'vasos_si')
                <li class="parrafo">
                    <button class="boto" id="rotateVasos" onclick="rotateImageVasos()" title="Girar imagen"><i
                            class="fas fa-sync"></i></button><span>Vasos y copas</span><img id="rotatedVasos"
                        src="{{ asset($reporte->seleccionVasos) }}" />
                    @if ($reporte->vasos_visibles == 'vasos_visibles_si')
                        <p>los vasos y copas estan visibles,
                        @else
                        <p>los vasos y copas no estan visibles,
                    @endif
                    @if ($reporte->vasos_quebrados == 'vasos_quebrados_si')
                        se encuentran en buen estado. </p>
                    @else
                        no estan en buenas condiciones, estan rotas o averiadas. </p>
                    @endif
                </li>
            @else
                <li>
                    <span>No hay vasos o copas</span>
                    <img src="{{ asset('img/no_diponible.png') }}" />
                </li>
            @endif
        </ul>
        <div class="clear"></div>
    </div>
    <!-- Disponibilidad -->
    <div id="simple_gallery">
        <h1>Disponibilidad</h1>
        <ul>
            <div class="row row-cols-3">
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('/storage/b&w.png') }}" class="img_botellas swing"
                            alt="Hollywood Sign on The Hill" />
                        <div class="card-body">
                            <h5 class="double-shadow">Black & White</h5>
                            <p class="card-text">
                            <table class="table table-hover">
                                <thead class="table-success">
                                    <tr>
                                        <th>Presentaci&oacute;n</th>
                                        <th>Caras</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($reporte->bAndw1000 == 'bAndw1000_si')
                                        <tr>
                                            <td>1000 ml</td>
                                            <td>{{ $reporte->caras_bAndw1000 }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif
                                    @if ($reporte->bAndw700 == 'bAndw700_si')
                                        <tr>
                                            <td>700 ml</td>
                                            <td>{{ $reporte->caras_bAndw700 }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif
                                    @if ($reporte->bAndw375 == 'bAndw375_si')
                                        <tr>
                                            <td>375 ml</td>
                                            <td>{{ $reporte->caras_bAndw375 }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('/storage/smirnoff.png') }}" class="img_botellas swing"
                            alt="Hollywood Sign on The Hill" />
                        <div class="card-body">
                            <h5 class="double-shadow">Smirnoff x1</h5>
                            <p class="card-text">

                            <table class="table table-hover">
                                <thead class="table-success">
                                    <tr>
                                        <th>Presentaci&oacute;n</th>
                                        <th>Caras</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($reporte->smirnoff700 == 'smirnoff700_si')
                                        <tr>
                                            <td>700 ml</td>
                                            <td>{{ $reporte->caras_smirnoff700 }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif
                                    @if ($reporte->smirnoff375 == 'smirnoff375_si')
                                        <tr>
                                            <td>375 ml</td>
                                            <td>{{ $reporte->caras_smirnoff375 }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td><br></td>
                                        <td><br></td>
                                    </tr>
                                </tbody>
                            </table>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('/storage/jhonie_walker.png') }}" class="img_botellas swing"
                            alt="Los Angeles Skyscrapers" />
                        <div class="card-body">
                            <h5 class="double-shadow">Jhonnie Walker</h5>
                            <p class="card-text">
                            <table class="table table-hover">
                                <thead class="table-success">
                                    <tr>
                                        <th>Presentaci&oacute;n</th>
                                        <th>Caras</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($reporte->jhonnie1000 == 'jhonnie1000_si')
                                        <tr>
                                            <td>1000 ml</td>
                                            <td>{{ $reporte->caras_jhonnie1000 }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif
                                    @if ($reporte->jhonnie700 == 'jhonnie700_si')
                                        <tr>
                                            <td>700 ml</td>
                                            <td>{{ $reporte->caras_jhonnie700 }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif
                                    @if ($reporte->jhonnie375 == 'jhonnie375_si')
                                        <tr>
                                            <td>375 ml</td>
                                            <td>{{ $reporte->caras_jhonnie375 }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('/storage/oldparr.png') }}" class="img_botellas swing" alt="Skyscrapers" />
                        <div class="card-body">
                            <h5 class="double-shadow">Old Parr</h5>
                            <p class="card-text">
                            <table class="table table-hover">
                                <thead class="table-success">
                                    <tr>
                                        <th>Presentaci&oacute;n</th>
                                        <th>Caras</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($reporte->oldparr750 == 'oldparr750_si')
                                        <tr>
                                            <td>750 ml</td>
                                            <td>{{ $reporte->caras_oldparr750 }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td><br></td>
                                        <td><br></td>
                                    </tr>

                                </tbody>
                            </table>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('/storage/buchannas.png') }}" class="img_botellas swing" alt="Skyscrapers" />
                        <div class="card-body">
                            <h5 class="double-shadow">Buchanna&acute;s</h5>
                            <p class="card-text">

                            <table class="table table-hover">
                                <thead class="table-success">
                                    <tr>
                                        <th>Presentaci&oacute;n</th>
                                        <th>Caras</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($reporte->buchannas700 == 'buchannas700_si')
                                        <tr>
                                            <td>700 ml</td>
                                            <td>{{ $reporte->caras_buchannas700 }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif
                                    @if ($reporte->buchannas375 == 'buchannas375_si')
                                        <tr>
                                            <td>375 ml</td>
                                            <td>{{ $reporte->caras_buchannas375 }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <li><button class="boto" id="rotateLinealDiageo" onclick="rotateImageLinealDiageo()"
                    title="Girar imagen"><i class="fas fa-sync"></i></button><span>Lineal donde estan exhibidos los
                    productos de Diageo</span><img id="rotatedLinealDiageo"
                    src="{{ asset($reporte->seleccionLinealDiageo) }}" />
            </li>
            <li class="parrafo"><button class="boto" id="rotateLinealR" onclick="rotateImageLinealR()"
                    title="Girar imagen"><i class="fas fa-sync"></i></button><span>Lineal Rones</span><img
                    id="rotatedLinealR" src="{{ asset($reporte->seleccionLinealR) }}" />
                <p> La marca de ron mas vendida en el punto es <strong>{{ $reporte->comp_ron1 }} </strong> y la segunda
                    mas
                    vendida es
                    <strong>{{ $reporte->comp_ron2 }}</strong>, ambas ocupan {{ $reporte->caras_comp_ron }} caras.
                </p>
            </li>
            <li class="parrafo"><button class="boto" id="rotateLinealA" onclick="rotateImageLinealA()"
                    title="Girar imagen"><i class="fas fa-sync"></i></button><span>Lineal Aguardientes</span><img
                    id="rotatedLinealA" src="{{ asset($reporte->seleccionLinealA) }}" />
                <p>
                    La marca mas vendida de aguardientes es <strong>{{ $reporte->comp_aguard1 }}</strong> y la segunda
                    es <strong>{{ $reporte->comp_aguard2 }}</strong>,
                    ambas ocupan {{ $reporte->caras_comp_aguardiente }} caras.
                </p>
            </li>
        </ul>
        <div class="clear"></div>
    </div>
    <!-- Materiales -->
    <div id="simple_gallery">
        <h1>Exhibici&oacute;n</h1>
        <ul>
            <li class="parrafo"><button class="boto" id="rotateron_byw" onclick="rotateImageron_byw()"
                    title="Girar imagen"><i class="fas fa-sync"></i></button><span>Ron junto a B&W</span><img
                    id="rotatedron_byw" src="{{ asset($reporte->seleccionron_byw) }}" />

                @if ($reporte->ron_byw == 'ron_byw_si')
                    <p>La marca <strong> Black & White </strong> esta ubicada correctamente junto a los
                        rones de la competencia </p>
                @else
                    <p>La marca <strong> Black & White </strong> no esta correctamente ubicada junto a
                        los rones de la competencia </p>
                @endif
            </li>
            @if ($reporte->seleccionron_jhonny != null)
                <li class="parrafo"><button class="boto" id="rotateron_jhonny" onclick="rotateImageron_jhonny()"
                        title="Girar imagen"><i class="fas fa-sync"></i></button><span>Ron junto a Jhonnie
                        Walker</span><img id="rotatedron_jhonny" src="{{ asset($reporte->seleccionron_jhonny) }}" />
                    @if ($reporte->ron_jhonny == 'ron_jhonny_si')
                        <p>La marca <strong> Jhonnie Walker</strong> esta ubicada correctamente junto a
                            los rones de la competencia. </p>
                    @else
                        <p>La marca <strong> Jhonnie Walker</strong> no esta correctamente ubicada junto
                            a los rones de la competencia. </p>
                    @endif
                </li>
            @endif
            <li class="parrafo"><button class="boto" id="rotateaguard_smirnoff" onclick="rotateImageaguard_smirnoff()"
                    title="Girar imagen"><i class="fas fa-sync"></i></button><span>Aguardiente junto a Smirnoff
                    x1</span><img id="rotatedaguard_smirnoff" src="{{ asset($reporte->seleccionaguard_smirnoff) }}" />
                @if ($reporte->aguard_smirnoff == 'aguard_smirnoff_si')
                    <p>La marca <strong>Smirnoff X1</strong> esta ubicada correctamente junto a los
                        aguardientes de la competencia</p>
                @else
                    <p>La marca <strong>Smirnoff X1</strong> no esta correctamente ubicada junto a los
                        aguardientes de la competencia</p>
                @endif
            </li>
        </ul>
        <div class="clear"></div>
    </div>
    <!-- Gifts -->
    <div id="simple_gallery">
        <h1>Gifts</h1>
        <ul>
            @if ($reporte->gift == 'gift_si')
            <li class="parrafo"><button class="boto" id="rotategift" onclick="rotateImagegift()"
                    title="Girar imagen"><i class="fas fa-sync"></i></button><span>Gift</span><img id="rotatedgift"
                    src="{{ asset($reporte->selecciongift) }}" />
                <p>
                    @if ($reporte->gift == 'gift_si')
                        la entrega de {{ $reporte->cant_gift }} gift, se evidencia con la
                        fotografia.
                    @endif
                </p>
            </li>
            @else
            <li class="parafo">
                <span> no se entrego ning&uacute;n gift.</span>
                <img src="{{ asset('img/no_gift.png') }}" />
                <span><br></span>
            </li>
        @endif
        </ul>
        <div class="clear"></div>
    </div>

    <div id="overflow">
        <i id="close" class="fa fa-window-close"></i>
        <img src="">
    </div>
    <!-- END Gallery -->
@stop

@section('js')
    <script>
        jQuery(document).ready(function() {
            $("#simple_gallery ul li img").click(function() {
                var url = $(this).attr("src");
                $("#overflow img").attr("src", url);
                $("#overflow").show();
            });
            //Close overlay
            $("#overflow, #overflow img, #close").click(function() {
                $("#overflow").hide();
            });
        });
    </script>
    <script>
        // Access DOM element object
        const rotatedActiv = document.getElementById('rotatedActiv');
        // Variable to hold the current angle of rotation
        let rotation = 0;
        // How much to rotate the image at a time
        const angle = 90;

        function rotateImageActiv() {
            // Ensure angle range of 0 to 359 with "%" operator,
            // e.g., 450 -> 90, 360 -> 0, 540 -> 180, etc.
            rotation = (rotation + angle) % 360;
            rotatedActiv.style.transform = `rotate(${rotation}deg)`;
        }
    </script>

    <script>
        // Access DOM element object
        const rotatedTipologia = document.getElementById('rotatedTipologia');
        // Variable to hold the current angle of rotation
        let rotTip = 0;
        // How much to rotate the image at a time
        const angleTip = 90;

        function rotateImageTipo() {
            // Ensure angle range of 0 to 359 with "%" operator,
            // e.g., 450 -> 90, 360 -> 0, 540 -> 180, etc.
            rotTip = (rotTip + angleTip) % 360;
            rotatedTipologia.style.transform = `rotate(${rotTip}deg)`;
        }
    </script>

    <script>
        // Access DOM element object
        const rotatedSegmento = document.getElementById('rotatedSegmento');
        // Variable to hold the current angle of rotation
        let rotSeg = 0;
        // How much to rotate the image at a time
        const angleSeg = 90;

        function rotateImageSeg() {
            // Ensure angle range of 0 to 359 with "%" operator,
            // e.g., 450 -> 90, 360 -> 0, 540 -> 180, etc.
            rotSeg = (rotSeg + angleSeg) % 360;
            rotatedSegmento.style.transform = `rotate(${rotSeg}deg)`;
        }
    </script>

    <script>
        // Access DOM element object
        const rotatedCenefa = document.getElementById('rotatedCenefa');
        // Variable to hold the current angle of rotation
        let rotCenefa = 0;
        // How much to rotate the image at a time
        const angleCenefa = 90;

        function rotateImageCenefa() {
            // Ensure angle range of 0 to 359 with "%" operator,
            // e.g., 450 -> 90, 360 -> 0, 540 -> 180, etc.
            rotCenefa = (rotCenefa + angleCenefa) % 360;
            rotatedCenefa.style.transform = `rotate(${rotCenefa}deg)`;
        }
    </script>

    <script>
        // Access DOM element object
        const rotatedAfiche = document.getElementById('rotatedAfiche');
        // Variable to hold the current angle of rotation
        let rotAfiche = 0;
        // How much to rotate the image at a time
        const angleAfiche = 90;

        function rotateImageAfiche() {
            // Ensure angle range of 0 to 359 with "%" operator,
            // e.g., 450 -> 90, 360 -> 0, 540 -> 180, etc.
            rotAfiche = (rotAfiche + angleAfiche) % 360;
            rotatedAfiche.style.transform = `rotate(${rotAfiche}deg)`;
        }
    </script>


    <script>
        // Access DOM element object
        const rotatedMarco = document.getElementById('rotatedMarco');
        // Variable to hold the current angle of rotation
        let rotMarco = 0;
        // How much to rotate the image at a time
        const angleMarco = 90;

        function rotateImageMarco() {
            // Ensure angle range of 0 to 359 with "%" operator,
            // e.g., 450 -> 90, 360 -> 0, 540 -> 180, etc.
            rotMarco = (rotMarco + angleMarco) % 360;
            rotatedMarco.style.transform = `rotate(${rotMarco}deg)`;
        }
    </script>





    <script>
        // Access DOM element object
        const rotatedRompetrafico = document.getElementById('rotatedRompetrafico');
        // Variable to hold the current angle of rotation
        let rotRompetrafico = 0;
        // How much to rotate the image at a time
        const angleRompetrafico = 90;

        function rotateImageRompetrafico() {
            // Ensure angle range of 0 to 359 with "%" operator,
            // e.g., 450 -> 90, 360 -> 0, 540 -> 180, etc.
            rotRompetrafico = (rotRompetrafico + angleRompetrafico) % 360;
            rotatedRompetrafico.style.transform = `rotate(${rotRompetrafico}deg)`;
        }
    </script>

    <script>
        // Access DOM element object
        const rotatedFaxada = document.getElementById('rotatedFaxada');
        // Variable to hold the current angle of rotation
        let rotFaxada = 0;
        // How much to rotate the image at a time
        const angleFaxada = 90;

        function rotateImageFaxada() {
            // Ensure angle range of 0 to 359 with "%" operator,
            // e.g., 450 -> 90, 360 -> 0, 540 -> 180, etc.
            rotFaxada = (rotFaxada + angleFaxada) % 360;
            rotatedFaxada.style.transform = `rotate(${rotFaxada}deg)`;
        }
    </script>

    <script>
        // Access DOM element object
        const rotatedHielera = document.getElementById('rotatedHielera');
        // Variable to hold the current angle of rotation
        let rotHielera = 0;
        // How much to rotate the image at a time
        const angleHielera = 90;

        function rotateImageHielera() {
            // Ensure angle range of 0 to 359 with "%" operator,
            // e.g., 450 -> 90, 360 -> 0, 540 -> 180, etc.
            rotHielera = (rotHielera + angleHielera) % 360;
            rotatedHielera.style.transform = `rotate(${rotHielera}deg)`;
        }
    </script>
    <script>
        // Access DOM element object
        const rotatedBase_h = document.getElementById('rotatedBase_h');
        // Variable to hold the current angle of rotation
        let rotBase_h = 0;
        // How much to rotate the image at a time
        const angleBase_h = 90;

        function rotateImageBase_h() {
            // Ensure angle range of 0 to 359 with "%" operator,
            // e.g., 450 -> 90, 360 -> 0, 540 -> 180, etc.
            rotBase_h = (rotBase_h + angleBase_h) % 360;
            rotatedBase_h.style.transform = `rotate(${rotBase_h}deg)`;
        }
    </script>
    <script>
        // Access DOM element object
        const rotatedDosificadorD = document.getElementById('rotatedDosificadorD');
        // Variable to hold the current angle of rotation
        let rotDosificadorD = 0;
        // How much to rotate the image at a time
        const angleDosificadorD = 90;

        function rotateImageDosificadorD() {
            // Ensure angle range of 0 to 359 with "%" operator,
            // e.g., 450 -> 90, 360 -> 0, 540 -> 180, etc.
            rotDosificadorD = (rotDosificadorD + angleDosificadorD) % 360;
            rotatedDosificadorD.style.transform = `rotate(${rotDosificadorD}deg)`;
        }
    </script>
    <script>
        // Access DOM element object
        const rotatedDosificadorS = document.getElementById('rotatedDosificadorS');
        // Variable to hold the current angle of rotation
        let rotDosificadorS = 0;
        // How much to rotate the image at a time
        const angleDosificadorS = 90;

        function rotateImageDosificadorS() {
            // Ensure angle range of 0 to 359 with "%" operator,
            // e.g., 450 -> 90, 360 -> 0, 540 -> 180, etc.
            rotDosificadorS = (rotDosificadorS + angleDosificadorS) % 360;
            rotatedDosificadorS.style.transform = `rotate(${rotDosificadorS}deg)`;
        }
    </script>



    <script>
        // Access DOM element object
        const rotatedBranding = document.getElementById('rotatedBranding');
        // Variable to hold the current angle of rotation
        let rotBranding = 0;
        // How much to rotate the image at a time
        const angleBranding = 90;

        function rotateImageBranding() {
            // Ensure angle range of 0 to 359 with "%" operator,
            // e.g., 450 -> 90, 360 -> 0, 540 -> 180, etc.
            rotBranding = (rotBranding + angleBranding) % 360;
            rotatedBranding.style.transform = `rotate(${rotBranding}deg)`;
        }
    </script>

    <script>
        // Access DOM element object
        const rotatedVasos = document.getElementById('rotatedVasos');
        // Variable to hold the current angle of rotation
        let rotVasos = 0;
        // How much to rotate the image at a time
        const angleVasos = 90;

        function rotateImageVasos() {
            // Ensure angle range of 0 to 359 with "%" operator,
            // e.g., 450 -> 90, 360 -> 0, 540 -> 180, etc.
            rotVasos = (rotVasos + angleVasos) % 360;
            rotatedVasos.style.transform = `rotate(${rotVasos}deg)`;
        }
    </script>



    <script>
        // Access DOM element object
        const rotatedLinealDiageo = document.getElementById('rotatedLinealDiageo');
        // Variable to hold the current angle of rotation
        let rotLinealDiageo = 0;
        // How much to rotate the image at a time
        const angleLinealDiageo = 90;

        function rotateImageLinealDiageo() {
            // Ensure angle range of 0 to 359 with "%" operator,
            // e.g., 450 -> 90, 360 -> 0, 540 -> 180, etc.
            rotLinealDiageo = (rotLinealDiageo + angleLinealDiageo) % 360;
            rotatedLinealDiageo.style.transform = `rotate(${rotLinealDiageo}deg)`;
        }
    </script>

    <script>
        // Access DOM element object
        const rotatedLinealR = document.getElementById('rotatedLinealR');
        // Variable to hold the current angle of rotation
        let rotLinealR = 0;
        // How much to rotate the image at a time
        const angleLinealR = 90;

        function rotateImageLinealR() {
            // Ensure angle range of 0 to 359 with "%" operator,
            // e.g., 450 -> 90, 360 -> 0, 540 -> 180, etc.
            rotLinealR = (rotLinealR + angleLinealR) % 360;
            rotatedLinealR.style.transform = `rotate(${rotLinealR}deg)`;
        }
    </script>

    <script>
        // Access DOM element object
        const rotatedLinealA = document.getElementById('rotatedLinealA');
        // Variable to hold the current angle of rotation
        let rotLinealA = 0;
        // How much to rotate the image at a time
        const angleLinealA = 90;

        function rotateImageLinealA() {
            // Ensure angle range of 0 to 359 with "%" operator,
            // e.g., 450 -> 90, 360 -> 0, 540 -> 180, etc.
            rotLinealA = (rotLinealA + angleLinealA) % 360;
            rotatedLinealA.style.transform = `rotate(${rotLinealA}deg)`;
        }
    </script>

    <script>
        // Access DOM element object
        const rotatedron_byw = document.getElementById('rotatedron_byw');
        // Variable to hold the current angle of rotation
        let rotron_byw = 0;
        // How much to rotate the image at a time
        const angleron_byw = 90;

        function rotateImageron_byw() {
            // Ensure angle range of 0 to 359 with "%" operator,
            // e.g., 450 -> 90, 360 -> 0, 540 -> 180, etc.
            rotron_byw = (rotron_byw + angleron_byw) % 360;
            rotatedron_byw.style.transform = `rotate(${rotron_byw}deg)`;
        }
    </script>

    <script>
        // Access DOM element object
        const rotatedaguard_smirnoff = document.getElementById('rotatedaguard_smirnoff');
        // Variable to hold the current angle of rotation
        let rotaguard_smirnoff = 0;
        // How much to rotate the image at a time
        const angleaguard_smirnoff = 90;

        function rotateImageaguard_smirnoff() {
            // Ensure angle range of 0 to 359 with "%" operator,
            // e.g., 450 -> 90, 360 -> 0, 540 -> 180, etc.
            rotaguard_smirnoff = (rotaguard_smirnoff + angleaguard_smirnoff) % 360;
            rotatedaguard_smirnoff.style.transform = `rotate(${rotaguard_smirnoff}deg)`;
        }
    </script>








    <script>
        // Access DOM element object
        const rotatedron_jhonny = document.getElementById('rotatedron_jhonny');
        // Variable to hold the current angle of rotation
        let rotron_jhonny = 0;
        // How much to rotate the image at a time
        const angleron_jhonny = 90;

        function rotateImageron_jhonny() {
            // Ensure angle range of 0 to 359 with "%" operator,
            // e.g., 450 -> 90, 360 -> 0, 540 -> 180, etc.
            rotron_jhonny = (rotron_jhonny + angleron_jhonny) % 360;
            rotatedron_jhonny.style.transform = `rotate(${rotron_jhonny}deg)`;
        }
    </script>

    <script>
        // Access DOM element object
        const rotatedgift = document.getElementById('rotatedgift');
        // Variable to hold the current angle of rotation
        let rotgift = 0;
        // How much to rotate the image at a time
        const anglegift = 90;

        function rotateImagegift() {
            // Ensure angle range of 0 to 359 with "%" operator,
            // e.g., 450 -> 90, 360 -> 0, 540 -> 180, etc.
            rotgift = (rotgift + anglegift) % 360;
            rotatedgift.style.transform = `rotate(${rotgift}deg)`;
        }
    </script>





@stop
