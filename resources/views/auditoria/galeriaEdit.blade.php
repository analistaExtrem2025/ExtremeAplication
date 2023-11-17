@extends('adminlte::page')
@section('title', 'Validación de Calidad')
@section('css')
    <link href="{{ asset('css/galeria.css') }}" rel="stylesheet">
    {{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo asset('css/auditoria.css'); ?>" type="text/css">
@stop
@section('content')
    {!! Form::model($reporte, [
        'route' => ['Galeria.update', $reporte->precarga_id],
        'method' => 'PUT',
        'enctype' => 'multipart/form-data',
    ]) !!}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="container">
        <ul>
            <div class="col-sm-12">
                <div class="card">
                    <h2><strong>INFORMACIÓN DEL PUNTO</strong></h2>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 col-sm-4"><label>Id del cliente</label>
                                <p class="card-text">{{ $reporte->precarga_id }}</p>
                            </div>
                            <div class="col-6 col-sm-4"><label>Estado</label>
                                <p class="card-text">{{ $reporte->activacion }}</p>
                            </div>
                            <div class="col-6 col-sm-4"><label>Razon social</label>
                                <p class="card-text">{{ $reporte->razonSocial }}</p>
                            </div>
                            <div class="col-6 col-sm-4"><label>Nombre del negocio</label>
                                <p class="card-text">{{ $reporte->nombreNegocio }}</p>
                            </div>
                            <div class="col-6 col-sm-4"><label>Nit o Cedula</label>
                                <p class="card-text">{{ $reporte->nit }}</p>
                            </div>
                            <div class="col-6 col-sm-4"><label>Direcci&oacute;n</label>
                                <p class="card-text">{{ $reporte->direccion }}</p>
                            </div>
                            <div class="col-6 col-sm-4"><label>Latitud y Longitud</label>
                                <p class="card-text">{{ $reporte->latitude }} {{ $reporte->longitude }}</p>
                            </div>
                            <div class="col-6 col-sm-4"><label>Telefono</label>
                                <p class="card-text">{{ $reporte->telefono }}</p>
                            </div>
                            <div class="col-6 col-sm-4"> <label>Municipio</label>
                                <p class="card-text">{{ $reporte->municipio }}</p>
                            </div>
                            <div class="col-6 col-sm-4"> <label>Barrio</label>
                                <p class="card-text">{{ $reporte->barrio }}</p>
                            </div>
                            <!-- Force next columns to break to new line at md breakpoint and up -->
                            <div class="w-100 d-none d-md-block"></div>
                            <div class="col-6 col-sm-4"> <label>Promotor</label>
                                <p class="card-text">{{ $reporte->promotor }}</p>
                            </div>
                            <div class="col-6 col-sm-4"> <label>Visitado el:</label>
                                <p class="card-text">{{ $reporte->star }}</p>
                            </div>
                            <div class="col-6 col-sm-4">
                                @if ($reporte->activacion != 'activo')
                                    <label for="">Causales de no concreci&oacute;n</label>
                                    <p class="card-text">{{ $reporte->noConcreciones }}</p>
                                    @if ($reporte->noConcreciones == 'Otro motivo')
                                        <label for="">Cual</label>
                                        <p class="card-text">{{ $reporte->cual }}</p>
                                    @endif
                                    <label for="">Observaciones</label>
                                    <p>{{ $reporte->observaciones }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </ul>
        <hr>
        {{--  <!-- Activacion -->  --}}
        <ul>
            <div class="row">
                <div class="col card-box">
                    <h5>ESTADO DE ACTIVACI&Oacute;N : <STRONG>{{ $reporte->activacion }}</STRONG></h5>
                    <div class="toggle-wrapper">
                        <div class="toggle checkcross">
                            <input id="checkcross" type="checkbox" style="display: none">
                            <label class="toggle-item" for="checkcross">
                                <div class="check"></div>
                            </label>
                        </div>
                        <div class="name">Desaprueba</div>
                        <div class="name1">Aprueba</div>
                    </div>
                    <nat class="bt-menu">
                        <ul>
                            <li class="bt_li"><button type="button" class="botOn js-zoom-in"><i class="fas fa-plus"
                                        alt="acercar"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-zoom-out"><i class="fas fa-minus"
                                        alt="alejar"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-rotate-right"><i class="fas fa-redo"
                                        alt="giro derecha"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-rotate-left"><i class="fas fa-undo"
                                        alt="giro izquierda"></i></button></li>
                        </ul>
                        <div id="msgFachada">
                            <red>Calidad dice:</red>
                        </div>
                        <input class="noClass" type="text" id="inpFachada" name="activacion" value="" required>
                    </nat>
                </div>
                <div class="col-8">
                    <img id="image"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/activacion_' . $reporte->precarga_id . '.png'))) }}" />
                </div>
            </div>
        </ul>
        <input type="hidden" name="auditoria_id" value="{{ $reporte->id }}">
        <input type="hidden" name="precarga_id" value="{{ $reporte->precarga_id }}">
        <input type="hidden" name="activacionState" value="{{ $reporte->activacion }}">
        <input type="hidden" name="auditadoPor" value="{{ $reporte->promotor }}">
        @if ($reporte->activacion == 'activo')
            {{--  <!-- Segmento -->  --}}
            <hr>

            <ul>

                <div class="row">
                    <div class="col card-box-xxl">
                        <h5>SEGMENTO ACTUAL: <strong>{{ $reporte->segmento }}</strong></h5>
                        <div class="toggle-wrapper">
                            <div class="toggle checkcross2">
                                <input id="checkcross2" type="checkbox" style="display: none">
                                <label class="toggle-item" for="checkcross2">
                                    <div class="check"></div>
                                </label>
                            </div>
                            <div class="name">No es <br>{{ $reporte->segmento }}</div>
                            <div class="name1">Es {{ $reporte->segmento }}</div>
                        </div>
                        <br>
                        <div style="display: none" id="EditSegmento">
                            <hr>
                                <select  name="segmento[]" id="segmento" class="form-control selectpicker selector "
                                data-style="btn-primary" title="Seleccionar segmento"  required disabled>
                                <option disabled  value="old{'segmento'}" checked>Seleccione una opción </option>
                                @foreach ( $segmento as $seg )
                                    <option  value="{{ $seg }}">{{ $seg }}</option>
                                    @endforeach
                                </select>
                        </div>
                        <hr>
                        <div class="toggle-wrapper">
                            <div class="toggle checkcrossBox">
                                <input id="checkcrossBox" type="checkbox" style="display: none">
                                <label class="toggle-item" for="checkcrossBox">
                                    <div class="check"></div>
                                </label>
                            </div>
                            <div class="name">numero de <br>cajas no<br> coinciden</div>
                            <div class="name1">numero de <br>cajas <br>Coinciden</div>
                        </div>
                        <br>
                        <hr>
                        <div style="display: none" id="EditCaja">
                            <hr>
                            <h6 class="cantidadesLabel">Ajuste las cantidades necesarias</h6>
                            <input type="text" name="caja_cerveza" class="cantidades"
                                value="{{ old('caja_cerveza', $reporte->caja_cerveza) }}">
                            <input type="text" name="caja_aguardiente" class="cantidades"
                                value="{{ old('caja_aguardiente', $reporte->caja_aguardiente) }}">
                            <input type="text" name="caja_ron" class="cantidades"
                                value="{{ old('caja_ron', $reporte->caja_ron) }}">
                            <input type="text" name="caja_whiskey" class="cantidades"
                                value="{{ old('caja_whiskey', $reporte->caja_whiskey) }}">
                        </div>
                        <hr>
                        <h5 class="center">CANTIDADES:</h5>
                        <div class="tableBox">
                            <table>
                                <thead>
                                    <tr class="center tableCaja">
                                        <th>cajas cerveza</th>
                                        <th>cajas aguardiente</th>
                                        <th>cajas ron</th>
                                        <th>cajas whisky</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="center datosCaja">
                                        <td>{{ $reporte->caja_cerveza }}</td>
                                        <td>{{ $reporte->caja_aguardiente }}</td>
                                        <td>{{ $reporte->caja_ron }}</td>
                                        <td>{{ $reporte->caja_whiskey }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <nat class="bt-menu">
                            <ul>
                                <li class="bt_li"><button type="button" class="botOn js-zoom-in1"><i
                                            class="fas fa-plus" alt="acercar"></i></button></li>
                                <li class="bt_li"><button type="button" class="botOn js-zoom-out1"><i
                                            class="fas fa-minus" alt="alejar"></i></button></li>
                                <li class="bt_li"><button type="button" class="botOn js-rotate-right1"><i
                                            class="fas fa-redo" alt="giro derecha"></i></button></li>
                                <li class="bt_li"><button type="button" class="botOn js-rotate-left1"><i
                                            class="fas fa-undo" alt="giro izquierda"></i></button></li>
                            </ul>
                            <div id="msgSegmento">
                                <red>Calidad dice:</red>
                            </div>
                            <div id="msgCantidades">
                                <red>Calidad dice:</red>
                            </div>
                            <input class="noClass" type="text" id="inpSegmento" name="segmento" required>
                            <input class="noClass" type="text" id="inpCantidades" name="cantidadCajas" required>
                        </nat>

                    </div>



                    <div class="col-8">
                        <img id="imageSegmento"
                            src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/segmento_' . $reporte->precarga_id . '.png'))) }}" />
                    </div>

                </div>
            </ul>
            {{--  <!-- Tipologia -->  --}}
            <hr>
            <ul>
                <div class="row">
                    <div class="col card-box">
                        <h5>TIPOLOGIA ACTUAL: <strong>{{ $reporte->tipologia }}</strong></h5>

                        <div class="toggle-wrapper">
                            <div class="toggle checkcross3">
                                <input id="checkcross3" type="checkbox" style="display: none">
                                <label class="toggle-item" for="checkcross3">
                                    <div class="check"></div>
                                </label>
                            </div>
                            <div class="name"> Tipoloigia<br> no <br>coincide</div>
                            <div class="name1">Tipoloigia <br>coincide</div>
                        </div>
                        <br>
                        <div style="display: none" id="EditTipologia">
                            <hr>
                                <select  name="tipologia[]" id="tipologia" class="form-control selectpicker selector"
                                data-style="btn-primary" title="Seleccionar tipologia"  required disabled>
                                <option disabled  value="old{'tipologia'}" checked>Seleccione una opción </option>
                                @foreach ( $tipologia as $tip )
                                    <option  value="{{ $tip }}">{{ $tip }}</option>
                                    @endforeach
                                </select>
                        </div>

                        <nat class="bt-menu">
                            <ul>
                                <li class="bt_li"><button type="button" class="botOn js-zoom-in2"><i
                                            class="fas fa-plus" alt="acercar"></i></button></li>
                                <li class="bt_li"><button type="button" class="botOn js-zoom-out2"><i
                                            class="fas fa-minus" alt="alejar"></i></button></li>
                                <li class="bt_li"><button type="button" class="botOn js-rotate-right2"><i
                                            class="fas fa-redo" alt="giro derecha"></i></button></li>
                                <li class="bt_li"><button type="button" class="botOn js-rotate-left2"><i
                                            class="fas fa-undo" alt="giro izquierda"></i></button></li>
                            </ul>
                            <div id="msgTipologia">

                                <red>Calidad dice:</red>
                            </div>
                            <input class="noClass" type="text" id="inpTipologia" name="tipologia" required>
                        </nat>
                    </div>
                    <div class="col-8">

                        <img id="imageTipologia"
                            src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/tipologia_' . $reporte->precarga_id . '.png'))) }}" />
                    </div>
                </div>
            </ul>
            <hr>
            <div class="col-12" style="margin: 1rem; background: rgb(193, 243, 250); text-align: center;">
                <h1 style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">FOTO DE &Eacute;XITO Y
                    MATERIALES</h1>
            </div>
            <hr>

            {{--  <!-- Cenefa -->  --}}

            @if ($reporte->cenefa == 'cenefa_si')

                <ul>
                    <div class="row">
                        <div class="col card-box-xl">
                            <h5 class="center">CENEFA</h5>
                            <p class= "parrafoJustificado">
                                <span>
                                    <blue>Auditor dice:</blue>
                                </span>
                                @if ($reporte->cenefa_visi == 'cenefa_visi_si')
                                    la cenefa está visible al público
                                @else
                                    la cenefa no es visible para el público
                                @endif
                                @if ($reporte->cenefa_colo == 'cenefa_colo_si')
                                    la colocación de la cenefa es la correcta
                                @else
                                    la colocación de la cenefa no es la apropiada
                                @endif
                            </p>

                            <div class="col">
                                <div class="toggle-wrapper">
                                    <div class="toggle checkcross4">
                                        <input id="checkcross4" type="checkbox" style="display: none">
                                        <label class="toggle-item" for="checkcross4">
                                            <div class="check"></div>
                                        </label>
                                    </div>
                                    <div class="name">Audito<br>mal la<br>visibiliad</div>
                                    <div class="name1">Audito<br>bien la<br>visibiliad</div>
                                </div>
                            <br>
                                <div style="display: none" id="EditCenefaVisi">
                                    <hr>
                                        <select  name="cenefa_visi[]" id="cenefa_visi" class="form-control selectpicker selector"
                                        data-style="btn-primary" title="Seleccionar visibilidad cenefa"  required disabled>
                                        <option disabled  value="old{'cenefa_visi'}" checked>Seleccione una opción </option>
                                        @foreach ( $cenefa_visi as $cenVis )
                                            <option  value="{{ $cenVis }}">{{ $cenVis }}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <br>
                                <br>
                                <div class="toggle-wrapper">
                                    <div class="toggle checkcross5">
                                        <input id="checkcross5" type="checkbox" style="display: none">
                                        <label class="toggle-item" for="checkcross5">
                                            <div class="check"></div>
                                        </label>
                                    </div>
                                    <div class="name">Audito<br>mal la<br>colocación</div>
                                    <div class="name1">Audito<br>bien la<br>colocación</div>
                                </div>
                                <br>
                                <div style="display: none" id="EditCenefaColo">
                                    <hr>
                                        <select  name="cenefa_colo[]" id="cenefa_colo" class="form-control selectpicker selector"
                                        data-style="btn-primary" title="Seleccionar colocación cenefa"  required disabled>
                                        <option disabled  value="old{'cenefa_colo'}" checked>Seleccione una opción </option>
                                        @foreach ( $cenefa_colo as $cenCol )
                                            <option  value="{{ $cenCol }}">{{ $cenCol }}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <br>
                                <br>
                            </div>
                            {{--  <div id="msgCenefa"><red>Calidad dice:</red></div>  --}}
                            <nat class="bt-menu">
                                <ul>
                                    <li class="bt_li"><button type="button" class="botOn js-zoom-in4"><i
                                                class="fas fa-plus" alt="acercar"></i></button></li>
                                    <li class="bt_li"><button type="button" class="botOn js-zoom-out4"><i
                                                class="fas fa-minus" alt="alejar"></i></button></li>
                                    <li class="bt_li"><button type="button" class="botOn js-rotate-right4"><i
                                                class="fas fa-redo" alt="giro derecha"></i></button></li>
                                    <li class="bt_li"><button type="button" class="botOn js-rotate-left4"><i
                                                class="fas fa-undo" alt="giro izquierda"></i></button></li>
                                </ul>
                                <div id="msgCenefaVisi">

                                    <red>Calidad dice:</red>
                                </div>
                                <div id="msgCenefaColo">

                                    <red>Calidad dice:</red>
                                </div>
                                <input type="hidden" value="{{ $reporte->cenefa }}" name="stateCenefa">
                                <input class="noClass" type="text" id="inpCenefaVisi" name="CenefaVisi" required>
                                <input class="noClass" type="text" id="inpCenefaColo" name="CenefaColo" required>
                            </nat>
                        </div>
                        <div class="col-8">
                            <img id="imageCenefa"
                                src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/Cenefa_' . $reporte->precarga_id . '.png'))) }}" />
                        </div>

                    </div>

                </ul>
            @else
                <ul>
                    <span>No Hay Cenefa</span>
                    <img id="imageNoDisponible" src="{{ asset('img/no_diponible.png') }}" />
                </ul>
            @endif


            <hr>


            {{--  <!-- Afiche -->  --}}



            @if ($reporte->afiche == 'afiche_si')
                <ul>
                    <div class="row">
                        <div class="col card-box-xxl">
                            <h5 class="center">AFICHE</h5>
                            <p class= "parrafoJustificado">
                                <span>
                                    <blue>Auditor dice:</blue>
                                </span>
                                @if ($reporte->afiche_visi == 'afiche_visi_si')
                                    El afiche es visible al público,
                                @else
                                    El afiche no es visible para el público,
                                @endif
                                @if ($reporte->afiche_colo == 'afiche_colo_si')
                                    su colocación es la correcta,
                                @else
                                    no se aprecia correctamente, ya que su colocación no es correcta,
                                @endif

                                @if ($reporte->aficheCombotizado == 'afiche_combo_si')
                                    La referencia de la combotización es <strong>{{ $reporte->marca_combo }}</strong>,
                                    @if ($reporte->combox1 == 'combox1_si')
                                        la combotización incluye otros productos,
                                    @else
                                        la combotización no incluye otro producto,
                                    @endif
                                    @if ($reporte->combox2 == 'combox2_si')
                                        hay promoción de precio en el combo,
                                    @else
                                        el precio no está incluido en esta,
                                    @endif
                                    @if ($reporte->combox3 == 'combox3_si')
                                        adiciona un gift.
                                    @else
                                        no incluye gift.
                                    @endif
                            </p>
                        @else
                            <p class="refe">El afiche no se combotizó.</p>
            @endif
            </p>
            <div class="col">
                <div class="toggle-wrapper">
                    <div class="toggle checkcross6">
                        <input id="checkcross6" type="checkbox" style="display: none">
                        <label class="toggle-item" for="checkcross6">
                            <div class="check"></div>
                        </label>
                    </div>
                    <div class="name">Audito<br>mal la<br>visibiliad</div>
                    <div class="name1">Audito<br>bien la<br>visibiliad</div>
                </div>
                <br>
                <div style="display: none" id="EditAficheVisi">
                    <hr>
                        <select  name="afiche_visi[]" id="afiche_visi" class="form-control selectpicker selector"
                        data-style="btn-primary" title="Seleccionar visibiliad afiche"  required disabled>
                        <option disabled  value="old{'afiche_visi'}" checked>Seleccione una opción </option>
                        @foreach ( $AficheVisi as $afivisi )
                            <option  value="{{ $afivisi }}">{{ $afivisi }}</option>
                            @endforeach
                        </select>
                </div>


                <br>
                <div class="toggle-wrapper">
                    <div class="toggle checkcross7">
                        <input id="checkcross7" type="checkbox" style="display: none">
                        <label class="toggle-item" for="checkcross7">
                            <div class="check"></div>
                        </label>
                    </div>
                    <div class="name">Audito<br>mal la<br>colocación</div>
                    <div class="name1">Audito<br>bien la<br>colocación</div>
                </div>
                <br>
                <div style="display: none" id="EditAficheColo">
                    <hr>
                        <select  name="afiche_colo[]" id="afiche_colo" class="form-control selectpicker selector"
                        data-style="btn-primary" title="Seleccionar colocación afiche"  required disabled>
                        <option disabled  value="old{'afiche_colo'}" checked>Seleccione una opción </option>
                        @foreach ( $AficheColo as $afiColo )
                            <option  value="{{ $afiColo }}">{{ $afiColo }}</option>
                            @endforeach
                        </select>
                </div>

                <br>
                <div class="toggle-wrapper">
                    <div class="toggle checkcross8">
                        <input id="checkcross8" type="checkbox" style="display: none">
                        <label class="toggle-item" for="checkcross8">
                            <div class="check"></div>
                        </label>
                    </div>
                    <div class="name">Audito<br>mal la<br>combotización</div>
                    <div class="name1">Audito<br>bien la<br>combotización</div>
                </div>
                <br>
                <div style="display: none" id="EditAficheCombo">
                    <hr>
                        <select  name="afiche_combo[]" id="afiche_combo" class="form-control selectpicker selector"
                        data-style="btn-primary" title="Seleccionar combotizacion afiche"  required disabled>
                        <option disabled  value="old{'afiche_combo'}" checked>Seleccione una opción </option>
                        @foreach ( $AficheCombo as $afiCombo )
                            <option  value="{{ $afiCombo }}">{{ $afiCombo }}</option>
                            @endforeach
                        </select>
                </div>


                <br>
                <nat class="bt-menu">
                    <ul>
                        <li class="bt_li"><button type="button" class="botOn js-zoom-in5"><i class="fas fa-plus"
                                    alt="acercar"></i></button></li>
                        <li class="bt_li"><button type="button" class="botOn js-zoom-out5"><i class="fas fa-minus"
                                    alt="alejar"></i></button></li>
                        <li class="bt_li"><button type="button" class="botOn js-rotate-right5"><i class="fas fa-redo"
                                    alt="giro derecha"></i></button></li>
                        <li class="bt_li"><button type="button" class="botOn js-rotate-left5"><i class="fas fa-undo"
                                    alt="giro izquierda"></i></button></li>
                    </ul>
                    <div id="msgAficheVisi">

                        <red>Calidad dice:</red>
                    </div>
                    <div id="msgAficheColo">

                        <red>Calidad dice:</red>
                    </div>
                    <div id="msgAficheCombo">

                        <red>Calidad dice:</red>
                    </div>
                    <input type="hidden" name="stateAfiche" value="{{ $reporte->afiche }}">
                    <input type="hidden" name="aficheCombo" value="{{ $reporte->aficheCombotizado }}">
                    <input class="noClass" type="text" id="inpAficheVisi" name="aficheVis" required>
                    <input class="noClass" type="text" id="inpAficheColo" name="aficheColo" required>
                    <input class="noClass" type="text" id="inpAficheCombo" name="aficheCombo" required>
                </nat>
            </div>
    </div>
    <div class="col-8">
        <img id="imageAfiche"
            src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/Afiche_' . $reporte->precarga_id . '.png'))) }}" />
    </div>
    </div>

    </ul>
@else
    <ul>
        <span>No Hay Afiche</span>
        <img id="imageNoDisponible" src="{{ asset('img/no_diponible.png') }}" />
    </ul>
    @endif

    <hr>

    {{--  <!-- marco  -->  --}}

    @if ($reporte->marco == 'marco_si')
        <ul>
            <div class="row">
                <div class="col card-box-xl">
                    <h5 class="center">MARCO</h5>
                    <p class= "parrafoJustificado">
                        <span>
                            <blue>Auditor dice:</blue>
                        </span>
                        @if ($reporte->marco_visi == 'marco_visi_si')
                            el marco esta visible al público
                        @else
                            el marco no es visible para el público
                        @endif
                        @if ($reporte->marco_colo == 'marco_colo_si')
                            la colocación del marco es la correcta
                        @else
                            la colocación del marco no es la apropiada
                        @endif
                    </p>


                    <div class="col">
                        <div class="toggle-wrapper">
                            <div class="toggle checkcross9">
                                <input id="checkcross9" type="checkbox" style="display: none">
                                <label class="toggle-item" for="checkcross9">
                                    <div class="check"></div>
                                </label>
                            </div>
                            <div class="name">No<br> es visible</div>
                            <div class="name1">Es <br>visible</div>
                        </div>


                        <br>
                        <div class="toggle-wrapper">
                            <div class="toggle checkcross10">
                                <input id="checkcross10" type="checkbox" style="display: none">
                                <label class="toggle-item" for="checkcross10">
                                    <div class="check"></div>
                                </label>
                            </div>
                            <div class="name">Mal <br>colocada</div>
                            <div class="name1">Bien <br>colocada</div>
                        </div>



                    </div>
                    <nat class="bt-menu">
                        <ul>
                            <li class="bt_li"><button type="button" class="botOn js-zoom-in6"><i class="fas fa-plus"
                                        alt="acercar"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-zoom-out6"><i class="fas fa-minus"
                                        alt="alejar"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-rotate-right6"><i
                                        class="fas fa-redo" alt="giro derecha"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-rotate-left6"><i
                                        class="fas fa-undo" alt="giro izquierda"></i></button></li>
                        </ul>
                        <div id="msgMarcoVisi">

                            <red>Calidad dice:</red>
                        </div>

                        <div id="msgMarcoColo">

                            <red>Calidad dice:</red>
                        </div>
                        <input type="hidden" value="{{ $reporte->marco }}" name="stateMarco">
                        <input class="noClass" type="text" id="inpMarcoVisi" name="marcoVisi" required>
                        <input class="noClass" type="text" id="inpMarcoColo" name="marcoColo" required>
                    </nat>
                </div>
                <div class="col-8">
                    <img id="imageMarco"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/Marco_' . $reporte->precarga_id . '.png'))) }}" />
                </div>
            </div>
        </ul>
    @else
        <ul>
            <span>No Hay Cenefa</span>
            <img id="imageNoDisponible" src="{{ asset('img/no_diponible.png') }}" />
        </ul>
    @endif

    <hr>
    {{--  <!-- rompetraficos -->  --}}
    @if ($reporte->rompetraficos == 'rompetraficos_si')

        <ul>
            <div class="row">
                <div class="col card-box-xl">
                    <h5 class="center">ROMPETRAFICO</h5>
                    <p class= "parrafoJustificado">
                        <span>
                            <blue>Auditor dice:</blue>
                        </span>
                        @if ($reporte->prod_rt_visibles == 'prod_rt_visibles_si')
                            El rompetrafico esta visible al publico,
                        @else
                            El rompetrafico no esta visible para el publico,
                        @endif
                        @if ($reporte->prod_rt_properly == 'prod_rt_properly_si')
                            la colocaci&oacute;n es considerada la correcta.
                        @else
                            su colocaci&oacute;n no es la apropiada.
                        @endif
                    </p>


                    <div class="col">
                        <div class="toggle-wrapper">
                            <div class="toggle checkcross11">
                                <input id="checkcross11" type="checkbox" style="display: none">
                                <label class="toggle-item" for="checkcross11">
                                    <div class="check"></div>
                                </label>
                            </div>
                            <div class="name">No<br> es visible</div>
                            <div class="name1">Es <br>visible</div>
                        </div>


                        <br>
                        <div class="toggle-wrapper">
                            <div class="toggle checkcross12">
                                <input id="checkcross12" type="checkbox" style="display: none">
                                <label class="toggle-item" for="checkcross12">
                                    <div class="check"></div>
                                </label>
                            </div>
                            <div class="name">Mal <br>colocada</div>
                            <div class="name1">Bien <br>colocada</div>
                        </div>



                    </div>

                    <nat class="bt-menu">
                        <ul>
                            <li class="bt_li"><button type="button" class="botOn js-zoom-in7"><i class="fas fa-plus"
                                        alt="acercar"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-zoom-out7"><i class="fas fa-minus"
                                        alt="alejar"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-rotate-right7"><i
                                        class="fas fa-redo" alt="giro derecha"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-rotate-left7"><i
                                        class="fas fa-undo" alt="giro izquierda"></i></button></li>
                        </ul>
                        <div id="msgRompeVisi">

                            <red>Calidad dice:</red>
                        </div>
                        <div id="msgRompeColo">

                            <red>Calidad dice:</red>
                        </div>
                        <input type="hidden" value="{{ $reporte->rompetraficos }}" name="stateRompetrafico">
                        <input class="noClass" type="text" id="inpRompeVisi" name="rompeVisi" required>
                        <input class="noClass" type="text" id="inpRompeColo" name="rompeColo" required>
                    </nat>
                </div>
                <div class="col-8">
                    <img id="imageRompetrafico"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/Rompetrafico_' . $reporte->precarga_id . '.png'))) }}" />
                </div>
            </div>
        </ul>
    @else
        <ul>
            <span>No Hay Rompetrafico</span>
            <img id="imageNoDisponible" src="{{ asset('img/no_diponible.png') }}" />
        </ul>
    @endif



    <hr>
    {{--  <!-- fachadas -->  --}}
    @if ($reporte->fachadas == 'fachadas_si')

        <ul>
            <div class="row">
                <div class="col card-box-xl">
                    <h5 class="center">FACHADAS Y AVISOS</h5>
                    <p class= "parrafoJustificado">
                        <span>
                            <blue>Auditor dice:</blue>
                        </span>
                        @if ($reporte->fachadas_visi == 'fachadas_visi_si')
                            la fachada y avisos estan visibles al consumidor,
                        @else
                            la fachada y avisos no esta visibles al consumidor,
                        @endif
                        @if ($reporte->fachadas_colo == 'fachadas_colo_si')
                            y se encuentran en buen estado.
                        @else
                            no estan en buen estado, estan tapadas o da&ntilde;adas.
                        @endif
                    </p>
                    <div class="col">
                        <div class="toggle-wrapper">
                            <div class="toggle checkcross13">
                                <input id="checkcross13" type="checkbox" style="display: none">
                                <label class="toggle-item" for="checkcross13">
                                    <div class="check"></div>
                                </label>
                            </div>
                            <div class="name">No<br> es visible</div>
                            <div class="name1">Es <br>visible</div>
                        </div>


                        <br>
                        <div class="toggle-wrapper">
                            <div class="toggle checkcross14">
                                <input id="checkcross14" type="checkbox" style="display: none">
                                <label class="toggle-item" for="checkcross14">
                                    <div class="check"></div>
                                </label>
                            </div>
                            <div class="name">Mal <br>estado</div>
                            <div class="name1">Buen <br>estado</div>
                        </div>


                    </div>
                    <nat class="bt-menu">
                        <ul>
                            <li class="bt_li"><button type="button" class="botOn js-zoom-in8"><i class="fas fa-plus"
                                        alt="acercar"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-zoom-out8"><i class="fas fa-minus"
                                        alt="alejar"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-rotate-right8"><i
                                        class="fas fa-redo" alt="giro derecha"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-rotate-left8"><i
                                        class="fas fa-undo" alt="giro izquierda"></i></button></li>
                        </ul>
                        <div id="msgFaxadaVisi">

                            <red>Calidad dice:</red>
                        </div>
                        <div id="msgAFaxadaEstado">

                            <red>Calidad dice:</red>
                        </div>
                        <input type="hidden" value="{{ $reporte->fachadas }}" name="stateFachadas">
                        <input class="noClass" type="text" id="inpFaxadaVisi" name="faxadaVisi" required>
                        <input class="noClass" type="text" id="inpAFaxadaEstado" name="faxadaEstado" required>
                    </nat>
                </div>
                <div class="col-8">
                    <img id="imageFaxada"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/Faxada_' . $reporte->precarga_id . '.png'))) }}" />
                </div>
            </div>
        </ul>
    @else
        <ul>
            <span>No Hay fachada ni avisos de la marca</span>
            <img id="imageNoDisponible" src="{{ asset('img/no_diponible.png') }}" />
        </ul>
    @endif



    <hr>
    {{--  <!-- hieleras -->  --}}
    @if ($reporte->hielera == 'hielera_si')



        <ul>
            <div class="row">
                <div class="col card-box-xxl">
                    <h5 class="center">HIELERAS</h5>
                    <p class= "parrafoJustificado">
                        <span>
                            <blue>Auditor dice:</blue>
                        </span>
                        @if ($reporte->hl_con_prod == 'hl_con_prod_si')
                            Las hieleras cuentan con productos DIAGEO,
                        @else
                            Las hieleras no cuentan con productos DIAGEO,
                        @endif
                        @if ($reporte->prod_hl_visible == 'prod_hl_visible_si')
                            estan visibles al consumidor,
                        @else
                            estan tapadas por otros productos o marcas,
                        @endif

                        @if ($reporte->prod_hl_danadas == 'prod_hl_danadas_si')
                            y se encuentran en buen estado.
                        @else
                            estan quebradas, ralladas, en mal estado.
                        @endif
                    </p>
                    <div class="col">
                        <div class="toggle-wrapper">
                            <div class="toggle checkcross15">
                                <input id="checkcross15" type="checkbox" style="display: none">
                                <label class="toggle-item" for="checkcross15">
                                    <div class="check"></div>
                                </label>
                            </div>
                            <div class="name">Sin<br> producto<br> de la<br> marca</div>
                            <div class="name1">Con<br> producto <br>de la <br>marca</div>
                        </div>


                        <br>
                        <div class="toggle-wrapper">
                            <div class="toggle checkcross16">
                                <input id="checkcross16" type="checkbox" style="display: none">
                                <label class="toggle-item" for="checkcross16">
                                    <div class="check"></div>
                                </label>
                            </div>
                            <div class="name">Estan <br>tapados</div>
                            <div class="name1">Estan <br>destapados</div>
                        </div>


                        <br>
                        <div class="toggle-wrapper">
                            <div class="toggle checkcross17">
                                <input id="checkcross17" type="checkbox" style="display: none">
                                <label class="toggle-item" for="checkcross17">
                                    <div class="check"></div>
                                </label>
                            </div>
                            <div class="name">Mal <br>estado</div>
                            <div class="name1">Buen <br>estado</div>
                        </div>


                    </div>
                    <nat class="bt-menu">
                        <ul>
                            <li class="bt_li"><button type="button" class="botOn js-zoom-in9"><i class="fas fa-plus"
                                        alt="acercar"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-zoom-out9"><i class="fas fa-minus"
                                        alt="alejar"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-rotate-right9"><i
                                        class="fas fa-redo" alt="giro derecha"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-rotate-left9"><i
                                        class="fas fa-undo" alt="giro izquierda"></i></button></li>
                        </ul>
                        <div id="msgHieleraProd">

                            <red>Calidad dice:</red>
                        </div>
                        <div id="msgHieleraVisi">

                            <red>Calidad dice:</red>
                        </div>
                        <div id="msgHieleraEstado">

                            <red>Calidad dice:</red>
                        </div>
                        <input type="hidden" value="{{ $reporte->hielera }}" name="stateHielera">
                        <input class="noClass" type="text" id="inpHieleraProd" name="hieleraProd" required>
                        <input class="noClass" type="text" id="inpHieleraVisi" name="hieleraVisi" required>
                        <input class="noClass" type="text" id="inpHieleraEstado" name="hieleraEstado" required>
                    </nat>
                </div>
                <div class="col-8">
                    <img id="imageHielera"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/Hielera_' . $reporte->precarga_id . '.png'))) }}" />
                </div>
            </div>
        </ul>
    @else
        <ul>
            <span>No Hay hieleras de la marca</span>
            <img id="imageNoDisponible" src="{{ asset('img/no_diponible.png') }}" />
        </ul>
    @endif
    <hr>

    {{--  <!-- Bases de hielera -->  --}}
    @if ($reporte->bases_h == 'bases_h_si')
        <ul>


            <div class="row">
                <div class="col card-box-xxl">
                    <h5 class="center">BASES PARA HIELERAS</h5>
                    <p class= "parrafoJustificado">
                        <span>
                            <blue>Auditor dice:</blue>
                        </span>
                        @if ($reporte->baseshl_con_prod == 'baseshl_con_prod_si')
                            Las bases de las hieleras cuentan con productos DIAGEO,
                        @else
                            Las bases de las hieleras no cuentan con productos DIAGEO,
                        @endif
                        @if ($reporte->prod_baseshl_visible == 'prod_baseshl_visible_si')
                            estan visibles al consumidor,
                        @else
                            estan tapadas por otros productos o marcas,
                        @endif

                        @if ($reporte->prod_baseshl_danadas == 'prod_baseshl_danadas_si')
                            y se encuentran en buen estado.
                        @else
                            estan quebradas, ralladas, en mal estado.
                        @endif
                    </p>
                    <div class="col">
                        <div class="toggle-wrapper">
                            <div class="toggle checkcross18">
                                <input id="checkcross18" type="checkbox" style="display: none">
                                <label class="toggle-item" for="checkcross18">
                                    <div class="check"></div>
                                </label>
                            </div>
                            <div class="name">Base<br>sin<br> producto<br>Diageo</div>
                            <div class="name1">Base<br>con<br>producto<br>Diageo</div>
                        </div>


                        <br>
                        <div class="toggle-wrapper">
                            <div class="toggle checkcross19">
                                <input id="checkcross19" type="checkbox" style="display: none">
                                <label class="toggle-item" for="checkcross19">
                                    <div class="check"></div>
                                </label>
                            </div>
                            <div class="name">No es <br>visible</div>
                            <div class="name1">Es <br>visible</div>
                        </div>


                        <br>
                        <div class="toggle-wrapper">
                            <div class="toggle checkcross20">
                                <input id="checkcross20" type="checkbox" style="display: none">
                                <label class="toggle-item" for="checkcross20">
                                    <div class="check"></div>
                                </label>
                            </div>
                            <div class="name">Mal<br>estado</div>
                            <div class="name1">Buen<br>estado</div>
                        </div>


                    </div>
                    <nat class="bt-menu">
                        <ul>
                            <li class="bt_li"><button type="button" class="botOn js-zoom-in10"><i class="fas fa-plus"
                                        alt="acercar"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-zoom-out10"><i
                                        class="fas fa-minus" alt="alejar"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-rotate-right10"><i
                                        class="fas fa-redo" alt="giro derecha"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-rotate-left10"><i
                                        class="fas fa-undo" alt="giro izquierda"></i></button></li>
                        </ul>
                        <div id="msgBsHieProd">

                            <red>Calidad dice:</red>
                        </div>
                        <div id="msgBsHieVisi">

                            <red>Calidad dice:</red>
                        </div>
                        <div id="msgBsHieEstado">

                            <red>Calidad dice:</red>
                        </div>
                        <input type="hidden" value="{{ $reporte->bases_h }}" name="stateBaseHielera">
                        <input class="noClass" type="text" id="inpBsHieProd" name="basesHieProd" required>
                        <input class="noClass" type="text" id="inpBsHieVisi" name="basesHieVisi" required>
                        <input class="noClass" type="text" id="inpBsHieEstado" name="basesHieEstado" required>
                    </nat>
                </div>
                <div class="col-8">
                    <img id="imageBase_h"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/Base_h_' . $reporte->precarga_id . '.png'))) }}" />
                </div>
            </div>
        </ul>
    @else
        <ul>
            <span>No hay bases para hieleras</span>
            <img id="imageNoDisponible" src="{{ asset('img/no_diponible.png') }}" />
        </ul>
    @endif
    <hr>


    {{--  <!-- Dosificador Doble -->  --}}

    @if ($reporte->dosificadorD == 'dosificadorD_si')
        <ul>

            <div class="row">
                <div class="col card-box-xxl">
                    <h5 class="center">DOSIFICADOR DOBLE</h5>
                    <p class= "parrafoJustificado">
                        <span>
                            <blue>Auditor dice:</blue>
                        </span>
                        @if ($reporte->prod_dsD_visibles == 'prod_dsD_visibles_si')
                            El dosificador doble esta visible al consumidor,
                        @else
                            El dosificador doble no esta visible al consumidor,
                        @endif
                        @if ($reporte->prod_dsD_diferentes == 'prod_dsD_diferentes_si')
                            esta exhibido con productos Diageo
                        @else
                            esta exhibido con productos diferentes a la marca
                        @endif

                        @if ($reporte->prod_dsD_danados == 'prod_dsD_danados_si')
                            y se encuentra en buen estado.
                        @else
                            tienen polvo, esta sucio o las etiquetas estan en mal estado.
                        @endif
                    </p>
                    <div class="col">
                        <div class="toggle-wrapper">
                            <div class="toggle checkcross21">
                                <input id="checkcross21" type="checkbox" style="display: none">
                                <label class="toggle-item" for="checkcross21">
                                    <div class="check"></div>
                                </label>
                            </div>
                            <div class="name">No<br> es visible</div>
                            <div class="name1">Es <br>visible</div>
                        </div>


                        <br>
                        <div class="toggle-wrapper">
                            <div class="toggle checkcross22">
                                <input id="checkcross22" type="checkbox" style="display: none">
                                <label class="toggle-item" for="checkcross22">
                                    <div class="check"></div>
                                </label>
                            </div>
                            <div class="name">sin<br>productos<br>marca<br>Diageo</div>
                            <div class="name1">con<br>productos<br>marca<br>Diageo</div>
                        </div>


                        <br>
                        <div class="toggle-wrapper">
                            <div class="toggle checkcross23">
                                <input id="checkcross23" type="checkbox" style="display: none">
                                <label class="toggle-item" for="checkcross23">
                                    <div class="check"></div>
                                </label>
                            </div>
                            <div class="name">Mal <br>estado</div>
                            <div class="name1">Buen <br>estado</div>
                        </div>


                    </div>
                    <nat class="bt-menu">
                        <ul>
                            <li class="bt_li"><button type="button" class="botOn js-zoom-in11"><i class="fas fa-plus"
                                        alt="acercar"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-zoom-out11"><i
                                        class="fas fa-minus" alt="alejar"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-rotate-right11"><i
                                        class="fas fa-redo" alt="giro derecha"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-rotate-left11"><i
                                        class="fas fa-undo" alt="giro izquierda"></i></button></li>
                        </ul>
                        <div id="msgDsDVisi">

                            <red>Calidad dice:</red>
                        </div>
                        <div id="msgDsDProd">

                            <red>Calidad dice:</red>
                        </div>
                        <div id="msgDsDEstado">

                            <red>Calidad dice:</red>
                        </div>
                        <input type="hidden" value="{{ $reporte->dosificadorD }}" name="stateDosificadorD">
                        <input class="noClass" type="text" id="inpDsDVisi" name="dosiDVisi" required>
                        <input class="noClass" type="text" id="inpDsDProd" name="dosiDProd" required>
                        <input class="noClass" type="text" id="inpDsDEstado" name="dosiDEstado" required>
                    </nat>
                </div>
                <div class="col-8">
                    <img id="imageDosificadorD"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/DosificadorD_' . $reporte->precarga_id . '.png'))) }}" />
                </div>
            </div>
        </ul>
    @else
        <ul>
            <span>No hay dosificador doble</span>
            <img id="imageNoDisponible" src="{{ asset('img/no_diponible.png') }}" />
        </ul>
    @endif


    <hr>
    {{--  <!-- Dosificador Sencillo -->  --}}

    @if ($reporte->dosificadorS == 'dosificadorS_si')
        <ul>

            <div class="row">
                <div class="col card-box-xxl">
                    <h5 class="center">DOSIFICADOR SENCILLO</h5>
                    <p class= "parrafoJustificado">
                        <span>
                            <blue>Auditor dice:</blue>
                        </span>
                        @if ($reporte->prod_dsS_visibles == 'prod_dsS_visibles_si')
                            El dosificador sencillo esta visible al consumidor,
                        @else
                            El dosificador sencillo no esta visible al consumidor,
                        @endif
                        @if ($reporte->prod_dsS_diferentes == 'prod_dsS_diferentes_si')
                            esta exhibido con productos Diageo
                        @else
                            esta exhibido con productos diferentes a la marca
                        @endif

                        @if ($reporte->prod_dsS_danados == 'prod_dsS_danados_si')
                            y se encuentra en buen estado.
                        @else
                            tienen polvo, esta sucio o las etiquetas estan en mal estado.
                        @endif
                    </p>
                    <div class="col">
                        <div class="toggle-wrapper">
                            <div class="toggle checkcross24">
                                <input id="checkcross24" type="checkbox" style="display: none">
                                <label class="toggle-item" for="checkcross24">
                                    <div class="check"></div>
                                </label>
                            </div>
                            <div class="name">No<br> es visible</div>
                            <div class="name1">Es <br>visible</div>
                        </div>


                        <br>
                        <div class="toggle-wrapper">
                            <div class="toggle checkcross25">
                                <input id="checkcross25" type="checkbox" style="display: none">
                                <label class="toggle-item" for="checkcross25">
                                    <div class="check"></div>
                                </label>
                            </div>
                            <div class="name">sin<br>productos<br>marca<br>Diageo</div>
                            <div class="name1">con<br>productos<br>marca<br>Diageo</div>
                        </div>


                        <br>
                        <div class="toggle-wrapper">
                            <div class="toggle checkcross26">
                                <input id="checkcross26" type="checkbox" style="display: none">
                                <label class="toggle-item" for="checkcross26">
                                    <div class="check"></div>
                                </label>
                            </div>
                            <div class="name">Mal <br>estado</div>
                            <div class="name1">Buen <br>estado</div>
                        </div>


                    </div>
                    <nat class="bt-menu">
                        <ul>
                            <li class="bt_li"><button type="button" class="botOn js-zoom-in12"><i class="fas fa-plus"
                                        alt="acercar"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-zoom-out12"><i
                                        class="fas fa-minus" alt="alejar"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-rotate-right12"><i
                                        class="fas fa-redo" alt="giro derecha"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-rotate-left12"><i
                                        class="fas fa-undo" alt="giro izquierda"></i></button></li>
                        </ul>
                        <div id="msgDsSVisi">

                            <red>Calidad dice:</red>
                        </div>
                        <div id="msgDsSProd">

                            <red>Calidad dice:</red>
                        </div>
                        <div id="msgDsSEstado">

                            <red>Calidad dice:</red>
                        </div>
                        <input type="hidden" value="{{ $reporte->dosificadorS }}" name="stateDosificadorS">
                        <input class="noClass" type="text" name="dosiSVisi" id="inpDsSVisi" required>
                        <input class="noClass" type="text" name="dosiSProd" id="inpDsSProd" required>
                        <input class="noClass" type="text" name="dosiSEstado" id="inpDsSEstado" required>
                    </nat>
                </div>
                <div class="col-8">
                    <img id="imageDosificadorS"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/DosificadorS_' . $reporte->precarga_id . '.png'))) }}" />
                </div>
            </div>
        </ul>
    @else
        <ul>
            <span>No hay dosificador sencillo</span>
            <img id="imageNoDisponible" src="{{ asset('img/no_diponible.png') }}" />
        </ul>
    @endif
    <hr>


    {{--  <!-- branding -->  --}}
    @if ($reporte->branding == 'branding_si')
        <ul>
            <div class="row">
                <div class="col card-box-xxl">
                    <h5 class="center">BRANDING</h5>
                    <p class= "parrafoJustificado">
                        <span>
                            <blue>Auditor dice:</blue>
                        </span>
                        @if ($reporte->branding_visible == 'branding_visible_si')
                            El branding esta visible,
                        @else
                            El branding no esta visible,
                        @endif
                        @if ($reporte->branding_danados == 'branding_danados_si')
                            se encuentra en buen estado.
                        @else
                            no se encuentra en buen estado.
                        @endif
                    </p>


                    <div class="col">
                        <div class="toggle-wrapper">
                            <div class="toggle checkcross27">
                                <input id="checkcross27" type="checkbox" style="display: none">
                                <label class="toggle-item" for="checkcross27">
                                    <div class="check"></div>
                                </label>
                            </div>
                            <div class="name">No<br> es visible</div>
                            <div class="name1">Es <br>visible</div>
                        </div>


                        <br>
                        <div class="toggle-wrapper">
                            <div class="toggle checkcross28">
                                <input id="checkcross28" type="checkbox" style="display: none">
                                <label class="toggle-item" for="checkcross28">
                                    <div class="check"></div>
                                </label>
                            </div>
                            <div class="name">Mal <br>colocado</div>
                            <div class="name1">Bien <br>colocado</div>
                        </div>


                    </div>
                    <nat class="bt-menu">
                        <ul>
                            <li class="bt_li"><button type="button" class="botOn js-zoom-in13"><i class="fas fa-plus"
                                        alt="acercar"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-zoom-out13"><i
                                        class="fas fa-minus" alt="alejar"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-rotate-right13"><i
                                        class="fas fa-redo" alt="giro derecha"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-rotate-left13"><i
                                        class="fas fa-undo" alt="giro izquierda"></i></button></li>
                        </ul>
                        <div id="msgBrandingVisi">

                            <red>Calidad dice:</red>
                        </div>
                        <div id="msgBrandingEstado">

                            <red>Calidad dice:</red>
                        </div>
                        <input type="hidden" value="{{ $reporte->branding }}" name="stateBranding">
                        <input class="noClass" type="text" id="inpBrandingVisi" name="brandingVisi" required>
                        <input class="noClass" type="text" id="inpBrandingEstado" name="brandingEstado" required>
                    </nat>
                </div>
                <div class="col-8">
                    <img id="imageBranding"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/Branding_' . $reporte->precarga_id . '.png'))) }}" />
                </div>
            </div>
        </ul>
    @else
        <ul>
            <span>No hay Branding</span>
            <img id="imageNoDisponible" src="{{ asset('img/no_diponible.png') }}" />
        </ul>
    @endif
    <hr>



    {{--  <!-- vasos -->  --}}
    @if ($reporte->vasos == 'vasos_si')
        <ul>
            <div class="row">
                <div class="col card-box-xxl">
                    <h5 class="center">VASOS Y COPAS</h5>
                    <p class= "parrafoJustificado">
                        <span>
                            <blue>Auditor dice:</blue>
                        </span>
                        @if ($reporte->vasos_visibles == 'vasos_visibles_si')
                            los vasos y copas estan visibles,
                        @else
                            los vasos y copas no estan visibles,
                        @endif
                        @if ($reporte->vasos_quebrados == 'vasos_quebrados_si')
                            se encuentran en buen estado.
                        @else
                            no estan en buenas condiciones, estan rotas o averiadas.
                        @endif
                    </p>


                    <div class="col">
                        <div class="toggle-wrapper">
                            <div class="toggle checkcross29">
                                <input id="checkcross29" type="checkbox" style="display: none">
                                <label class="toggle-item" for="checkcross29">
                                    <div class="check"></div>
                                </label>
                            </div>
                            <div class="name">No<br> es visible</div>
                            <div class="name1">Es <br>visible</div>
                        </div>


                        <br>
                        <div class="toggle-wrapper">
                            <div class="toggle checkcross30">
                                <input id="checkcross30" type="checkbox" style="display: none">
                                <label class="toggle-item" for="checkcross30">
                                    <div class="check"></div>
                                </label>
                            </div>
                            <div class="name">Mal <br>estado</div>
                            <div class="name1">Buen <br>estado</div>
                        </div>


                    </div>
                    <nat class="bt-menu">
                        <ul>
                            <li class="bt_li"><button type="button" class="botOn js-zoom-in14"><i class="fas fa-plus"
                                        alt="acercar"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-zoom-out14"><i
                                        class="fas fa-minus" alt="alejar"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-rotate-right14"><i
                                        class="fas fa-redo" alt="giro derecha"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-rotate-left14"><i
                                        class="fas fa-undo" alt="giro izquierda"></i></button></li>
                        </ul>
                        <div id="msgVasosVisi">

                            <red>Calidad dice:</red>
                        </div>
                        <div id="msgVasosEstado">

                            <red>Calidad dice:</red>
                        </div>
                        <input type="hidden" value="{{ $reporte->vasos }}" name="stateVasos">
                        <input class="noClass" type="text" id="inpVasosVisi" name="vasosVisi" required>
                        <input class="noClass" type="text" id="inpVasosEstado" name="vasosEstado" required>
                    </nat>
                </div>
                <div class="col-8">
                    <img id="imageVasos"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/Vasos_' . $reporte->precarga_id . '.png'))) }}" />
                </div>
            </div>
        </ul>
    @else
        <ul>
            <span>No hay vasos ni copas </span>
            <img id="imageNoDisponible" src="{{ asset('img/no_diponible.png') }}" />
        </ul>
    @endif

    {{--  DISPONIBILIDAD   --}}
    <hr>
    <div class="col-12" style="margin: 1rem; background: rgb(193, 243, 250); text-align: center;">
        <h1 style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">DISPONIBILIDAD</h1>
    </div>
    <hr>


    <div id="simple_gallery">
        <ul>
            <div class="row row-cols-3">
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('/storage/b&w.png') }}" class="img_botellasNs swing" />
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
                        <img src="{{ asset('/storage/smirnoff.png') }}" class="img_botellasNs swing" />
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
                        <img src="{{ asset('/storage/smirnoff_sin_azucar.png') }}" class="img_botellasNs swing" />
                        <div class="card-body">
                            <h5 class="double-shadow">Smirnoff x1 sin az&uacute;car</h5>
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
                        <img src="{{ asset('/storage/jhonie_walker.png') }}" class="img_botellasNs swing" />
                        {{--  <img src="{{ Storage::url('/storage/jhonie_walker.png') }}" class="img_botellas swing"
                            alt="Los Angeles Skyscrapers" />  --}}
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
                        <img src="{{ asset('/storage/oldparr.png') }}" class="img_botellasPq swing"
                            alt="Skyscrapers" />
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
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('/storage/buchannas.png') }}" class="img_botellasPq swing"
                            alt="Skyscrapers" />
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
        </ul>
    </div>
    <hr>
    <div class="col-12" style="margin: 1rem; background: rgb(193, 243, 250); text-align: center;">
        <h1 style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">EXHIBICI&Oacute;N</h1>
    </div>
    <hr>
    {{--  <!-- CALIDAD DE LA MARCA -->  --}}
    <ul>
        <div class="row">
            <div class="col card-box-xxl">
                <h5 class="center">CALIDAD DE LA MARCA</h5>
                <p class= "parrafoJustificado">
                    <span>
                        <blue>Auditor dice:</blue>
                    </span>
                    @if ($reporte->cal_marc_visible == 'cal_marc_visible_si')
                        Los productos de la marca son visibles,
                    @else
                        los productos de la marca no son visibles,
                    @endif
                    @if ($reporte->cal_marc_danados == 'cal_marc_danados_si')
                        estos se encuentran dañados, averiados o en mal estado,
                    @else
                        se encuentran en optimas condiciones,
                    @endif

                    @if ($reporte->cal_marc_et_danados == 'cal_marc_et_danados_si')
                        sus etiquetas estan dañadas o sucias.
                    @else
                        sus etiquetas estan en perfectas condiciones.
                    @endif
                </p>
                <div class="col">
                    <div class="toggle-wrapper">
                        <div class="toggle checkcross31">
                            <input id="checkcross31" type="checkbox" style="display: none">
                            <label class="toggle-item" for="checkcross31">
                                <div class="check"></div>
                            </label>
                        </div>
                        <div class="name">No<br> es visible</div>
                        <div class="name1">Es <br>visible</div>
                    </div>
                    <br>
                    <div class="toggle-wrapper">
                        <div class="toggle checkcross32">
                            <input id="checkcross32" type="checkbox" style="display: none">
                            <label class="toggle-item" for="checkcross32">
                                <div class="check"></div>
                            </label>
                        </div>
                        <div class="name">sin<br>productos<br>marca<br>Diageo</div>
                        <div class="name1">con<br>productos<br>marca<br>Diageo</div>
                    </div>
                    <br>
                    <div class="toggle-wrapper">
                        <div class="toggle checkcross33">
                            <input id="checkcross33" type="checkbox" style="display: none">
                            <label class="toggle-item" for="checkcross33">
                                <div class="check"></div>
                            </label>
                        </div>
                        <div class="name">Mal <br>estado</div>
                        <div class="name1">Buen <br>estado</div>
                    </div>
                </div>
                <nat class="bt-menu">
                    <ul>
                        <li class="bt_li"><button type="button" class="botOn js-zoom-in15"><i class="fas fa-plus"
                                    alt="acercar"></i></button></li>
                        <li class="bt_li"><button type="button" class="botOn js-zoom-out15"><i
                                    class="fas fa-minus" alt="alejar"></i></button></li>
                        <li class="bt_li"><button type="button" class="botOn js-rotate-right15"><i
                                    class="fas fa-redo" alt="giro derecha"></i></button></li>
                        <li class="bt_li"><button type="button" class="botOn js-rotate-left15"><i
                                    class="fas fa-undo" alt="giro izquierda"></i></button></li>
                    </ul>
                    <div id="msgCalMarcVisi">
                        <red>Calidad dice:</red>
                    </div>
                    <div id="msgCalMarcEstado">
                        <red>Calidad dice:</red>
                    </div>
                    <div id="msgCalMarcEtiqueta">
                        <red>Calidad dice:</red>
                    </div>
                    <input class="noClass" type="text" name="calMarcVisi" id="inpCalMarcVisi" required>
                    <input class="noClass" type="text" name="calMarcEstado" id="inpCalMarcEstado" required>
                    <input class="noClass" type="text" name="calMarcEtiqueta" id="inpCalMarcEtiqueta" required>
                </nat>
            </div>
            @if ($reporte->seleccionLinealDiageo = !null)
                <div class="col-8">
                    <img id="imageLinealDiageo"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/LinealDiageoLinealDg_' . $reporte->precarga_id . '.png'))) }}" />
                </div>
        </div>
    </ul>
@else
    <span>No hay foto del lineal</span>
    <img id="imageNoDisponible" src="{{ asset('img/no_diponible.png') }}" />
    </ul>
    @endif
    <hr>
    <ul>
        <div class="row">
            <div class="col card-box-xs">
                <h5 class="center">RONES DE LA COMPETENCIA</h5>
                <p class= "parrafoJustificado">
                    <span>
                        <blue>Auditor dice:</blue>
                    </span>
                    La marca de ron mas vendida en el punto es <strong>{{ $reporte->comp_ron1 }} </strong> y la segunda
                    mas
                    vendida es
                    <strong>{{ $reporte->comp_ron2 }}</strong>, ambas ocupan {{ $reporte->caras_comp_ron }} caras.
                </p>
                <nat class="bt-menu">
                    <ul>
                        <li class="bt_li"><button type="button" class="botOn js-zoom-in16"><i class="fas fa-plus"
                                    alt="acercar"></i></button></li>
                        <li class="bt_li"><button type="button" class="botOn js-zoom-out16"><i
                                    class="fas fa-minus" alt="alejar"></i></button></li>
                        <li class="bt_li"><button type="button" class="botOn js-rotate-right16"><i
                                    class="fas fa-redo" alt="giro derecha"></i></button></li>
                        <li class="bt_li"><button type="button" class="botOn js-rotate-left16"><i
                                    class="fas fa-undo" alt="giro izquierda"></i></button></li>
                    </ul>
                </nat>
            </div>
            <div class="col-8">
                @if (isset($data['seleccionLinealR']))
                    <img id="imageRones"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/Ron_' . $reporte->precarga_id . '.png'))) }}" />
                @else
                    <img id="imageNoDisponible" src="{{ asset('img/no_diponible.png') }}" />
                @endif
            </div>
        </div>
    </ul>
    <hr>
    <ul>
        <div class="row">
            <div class="col card-box-xs">
                <h5 class="center">AGUARDIENTE DE LA COMPETENCIA</h5>
                <p class="parrafoJustificado">
                    <span>
                        <blue>Auditor dice:</blue>
                    </span>
                    La marca mas vendida de aguardientes es <strong>{{ $reporte->comp_aguard1 }}</strong> y la segunda
                    es <strong>{{ $reporte->comp_aguard2 }}</strong>,
                    ambas ocupan {{ $reporte->caras_comp_aguardiente }} caras.
                </p>
                <nat class="bt-menu">
                    <ul>
                        <li class="bt_li"><button type="button" class="botOn js-zoom-in17"><i class="fas fa-plus"
                                    alt="acercar"></i></button></li>
                        <li class="bt_li"><button type="button" class="botOn js-zoom-out17"><i
                                    class="fas fa-minus" alt="alejar"></i></button></li>
                        <li class="bt_li"><button type="button" class="botOn js-rotate-right17"><i
                                    class="fas fa-redo" alt="giro derecha"></i></button></li>
                        <li class="bt_li"><button type="button" class="botOn js-rotate-left17"><i
                                    class="fas fa-undo" alt="giro izquierda"></i></button></li>
                    </ul>
                </nat>
            </div>
            <div class="col-8">
                @if (isset($data['seleccionLinealR']))
                    <img id="imageAguardiente"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/Aguardiente_' . $reporte->precarga_id . '.png'))) }}" />
                @else
                    <img id="imageNoDisponible" src="{{ asset('img/no_diponible.png') }}" />
                @endif
            </div>
        </div>
    </ul>
    <hr>
    <div class="col-12" style="margin: 1rem; background: rgb(193, 243, 250); text-align: center;">
        <h1 style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">VISIBILIDAD DE LA MARCA</h1>
    </div>
    <hr>
    <ul>
        <div class="row">
            <div class="col card-box-xm">
                <h5 class="center">RONES JUNTO A BLACK & WHITE</h5>
                <p class= "parrafoJustificado">
                    <span>
                        <blue>Auditor dice:</blue>
                    </span>
                    @if ($reporte->ron_byw == 'ron_byw_si')
                        La marca <strong> Black & White </strong> esta ubicada correctamente junto a los
                        rones de la competencia
                    @else
                        La marca <strong> Black & White </strong> no esta correctamente ubicada junto a
                        los rones de la competencia
                    @endif
                </p>
                <div class="toggle-wrapper">
                    <div class="toggle checkcross34">
                        <input id="checkcross34" type="checkbox" style="display: none">
                        <label class="toggle-item" for="checkcross34">
                            <div class="check"></div>
                        </label>
                    </div>
                    <div class="name">No<br>se<br>cumple</div>
                    <div class="name1">Se<br>cumple</div>
                </div>
                <nat class="bt-menu">
                    <ul>
                        <li class="bt_li"><button type="button" class="botOn js-zoom-in18"><i class="fas fa-plus"
                                    alt="acercar"></i></button></li>
                        <li class="bt_li"><button type="button" class="botOn js-zoom-out18"><i
                                    class="fas fa-minus" alt="alejar"></i></button></li>
                        <li class="bt_li"><button type="button" class="botOn js-rotate-right18"><i
                                    class="fas fa-redo" alt="giro derecha"></i></button></li>
                        <li class="bt_li"><button type="button" class="botOn js-rotate-left18"><i
                                    class="fas fa-undo" alt="giro izquierda"></i></button></li>
                    </ul>
                    <div id="msgRonBlack">
                        <red>Calidad dice:</red>
                    </div>
                    <input class="noClass" type="text" id="inpRonBlack" name="RonBlack" required>
                </nat>
            </div>
            <div class="col-8">
                <img id="imageRonBlack"
                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/ron_byw_' . $reporte->precarga_id . '.png'))) }}" />
            </div>
        </div>
    </ul>
    <hr>
    <ul>
        <div class="row">
            <div class="col card-box-xm">
                <h5 class="center">RONES JUNTO A JHONNIE WALKER</h5>
                <p class= "parrafoJustificado">
                    <span>
                        <blue>Auditor dice:</blue>
                    </span>
                    @if ($reporte->ron_jhonny == 'ron_jhonny_si')
                        La marca <strong> Jhonnie Walker</strong> esta ubicada correctamente junto a
                        los rones de la competencia.
                    @else
                        La marca <strong> Jhonnie Walker</strong> no esta correctamente ubicada junto
                        a los rones de la competencia.
                    @endif
                </p>
                <div class="toggle-wrapper">
                    <div class="toggle checkcross35">
                        <input id="checkcross35" type="checkbox" style="display: none">
                        <label class="toggle-item" for="checkcross35">
                            <div class="check"></div>
                        </label>
                    </div>
                    <div class="name">No<br>se<br>cumple</div>
                    <div class="name1">Se<br>cumple</div>
                </div>
                <nat class="bt-menu">
                    <ul>
                        <li class="bt_li"><button type="button" class="botOn js-zoom-in19"><i class="fas fa-plus"
                                    alt="acercar"></i></button></li>
                        <li class="bt_li"><button type="button" class="botOn js-zoom-out19"><i
                                    class="fas fa-minus" alt="alejar"></i></button></li>
                        <li class="bt_li"><button type="button" class="botOn js-rotate-right19"><i
                                    class="fas fa-redo" alt="giro derecha"></i></button></li>
                        <li class="bt_li"><button type="button" class="botOn js-rotate-left19"><i
                                    class="fas fa-undo" alt="giro izquierda"></i></button></li>
                    </ul>
                    <div id="msgJhonnie">
                        <input class="noClass" type="text" id="inpJhonnie" name="ronVsJhonnie" required>
                        <red>Calidad dice:</red>
                    </div>
                </nat>
            </div>
            <div class="col-8">
                @if ($reporte->seleccion_jhonny != null)
                    <img id="imageNoDisponible" src="{{ asset('img/no_diponible.png') }}" />
                @else
                    <img id="imageJhonnie"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/ron_jhonny_' . $reporte->precarga_id . '.png'))) }}" />
                @endif
            </div>
        </div>
    </ul>
    <hr>
    <ul>
        <div class="row">
            <div class="col card-box-xm">
                <h5 class="center">AGUARDIENTE JUNTO A SMIRNOFF</h5>
                <p class= "parrafoJustificado">
                    <span>
                        <blue>Auditor dice:</blue>
                    </span>
                    @if ($reporte->aguard_smirnoff == 'aguard_smirnoff_si')
                        La marca <strong>Smirnoff X1</strong> esta ubicada correctamente junto a los
                        aguardientes de la competencia
                    @else
                        La marca <strong>Smirnoff X1</strong> no esta correctamente ubicada junto a los
                        aguardientes de la competencia
                    @endif
                </p>
                <div class="toggle-wrapper">
                    <div class="toggle checkcross36">
                        <input id="checkcross36" type="checkbox" style="display: none">
                        <label class="toggle-item" for="checkcross36">
                            <div class="check"></div>
                        </label>
                    </div>
                    <div class="name">No<br>es<br>correcto</div>
                    <div class="name1">Se<br>confirma</div>
                </div>
                <nat class="bt-menu">
                    <ul>
                        <li class="bt_li"><button type="button" class="botOn js-zoom-in20"><i class="fas fa-plus"
                                    alt="acercar"></i></button></li>
                        <li class="bt_li"><button type="button" class="botOn js-zoom-out20"><i
                                    class="fas fa-minus" alt="alejar"></i></button></li>
                        <li class="bt_li"><button type="button" class="botOn js-rotate-right20"><i
                                    class="fas fa-redo" alt="giro derecha"></i></button></li>
                        <li class="bt_li"><button type="button" class="botOn js-rotate-left20"><i
                                    class="fas fa-undo" alt="giro izquierda"></i></button></li>
                    </ul>
                    <div id="msgSmirnoff">
                        <input class="noClass" type="text" id="inpSmirnoff" name="aguVsSmirnoff" required>
                        <red>Calidad dice:</red>
                    </div>
                </nat>
            </div>
            <div class="col-8">
                <img id="imageSmirnoff"
                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/aguard_smirnoff_' . $reporte->precarga_id . '.png'))) }}" />
            </div>
        </div>
    </ul>
    <hr>
    <div class="col-12" style="margin: 1rem; background: rgb(193, 243, 250); text-align: center;">
        <h1 style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">GIFT</h1>
    </div>
    <hr>
    <ul>
        <div class="row">
            <div class="col card-box-xs">
                <h5 class="center">ENTREGA DE OBSEQUIO</h5>
                <p class= "parrafoJustificado">
                    <span>
                        <blue>Auditor dice:</blue>
                    </span>
                    @if ($reporte->gift == 'gift_si')
                        la entrega de {{ $reporte->cant_gift }} gift, se evidencia con la
                        fotografía.
                    @else
                        no se entrego ning&uacute;n gift.no se entrego ning&uacute;n gift.
                    @endif
                </p>
                <div class="toggle-wrapper">
                    <div class="toggle checkcross37">
                        <input id="checkcross37" type="checkbox" style="display: none" onchange>
                        <label class="toggle-item" for="checkcross37">
                            <div class="check"></div>
                        </label>
                    </div>
                    <div class="name">No<br>se<br>cumple</div>
                    <div class="name1">Se<br>cumple</div>
                </div>
                <nat class="bt-menu">
                    <ul>
                        <li class="bt_li"><button type="button" class="botOn js-zoom-in21"><i class="fas fa-plus"
                                    alt="acercar"></i></button></li>
                        <li class="bt_li"><button type="button" class="botOn js-zoom-out21"><i
                                    class="fas fa-minus" alt="alejar"></i></button></li>
                        <li class="bt_li"><button type="button" class="botOn js-rotate-right21"><i
                                    class="fas fa-redo" alt="giro derecha"></i></button></li>
                        <li class="bt_li"><button type="button" class="botOn js-rotate-left21"><i
                                    class="fas fa-undo" alt="giro izquierda"></i></button></li>
                    </ul>
                    <div id="msgGift">
                        <input class="noClass" type="text" id="inpGift" name="gift" required>
                        <red>Calidad dice:</red>
                    </div>
                </nat>
            </div>
            <div class="col-8">
                @if ($reporte->gift == 'gift_si')
                    <img id="imageGift"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/Gift_' . $reporte->precarga_id . '.png'))) }}" />
                @else
                    <img id= "imageNotGift" src="{{ asset('img/no_gift.png') }}" alt="">
                @endif
            </div>
        </div>
    </ul>
    @endif
    <hr>
    <ul>
        <div class="row">
            <div class="col card-box">
                <h5 class="center">OBSEVACIONES DE CIERRE</h5>
                <blue>Auditor dice:</blue>
                <p class="parrafoJustificado detalle">
                    {{ $reporte->observacionesDetallista }}
                </p>
            </div>
        </div>
    </ul>
    <hr>
    <div>
        <span>
            <input type="hidden" style="width: 65px;" value="0" id="criticidadSegmento">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadCantidades">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadTipologia">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadCenefaVisi">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadCenefaColo">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadAfiche_visi">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadAfiche_colo">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadAfiche_combo">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadMarcoVisi">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadMarcoColo">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadRompeVisi">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadRompeColo">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadfachadas_visi">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadfachadas_colo">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadHieleraProd">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadHieleraVisi">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadHieleraEstado">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadBsHieProd">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadBsHieVisi">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadBsHieEstado">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadDosiDVisi">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadDosiDProd">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadDosiDEstado">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadDosiSVisi">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadDosiSProd">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadDosiSEstado">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadBrandingVisi">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadBrandingEstado">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadVasosVisi">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadVasosEstado">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadCalMarcVisi">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadCalMarcEstado">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadCalMarcEtiqueta">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadRonBlack">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadRonVsJhonnie">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadAguVsSmirnoff">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadGift">
            <input type="hidden" style="width: 65px;" value="0" id="criticidadFachada">
        </span>
    </div>
    <hr>
    <ul>
        <button class="btn btn-info" type="button" onclick="Suma()">Valide el numero de errores</button>
        <span>Se encontraron :</span><input type="text" style="width: 65px;" id="ResultadoSuma"
            name="ResultadoSuma" onKeyUp="calcular(this);" placeholder=""><span> errores</span>
        <input type="text" class="criticidad" id="spanFachada" disabled>
        <div id="DivCriticidadA" style="display: none">
            <input type="text" class="form-control" id = "criticidad1" name="criticidad"
                value="error critico de fondo" disabled>
        </div>
        <div id="DivCriticidadB" style="display: none">
            <input type="text" class="form-control" id = "criticidad2" name="criticidad"
                value="error critico de forma" disabled>
        </div>
        <div id="DivCriticidadC" style="display: none">
            <input type="text" class="form-control" id = "criticidad3" name="criticidad"
                value="errores criticos de fondo y forma" disabled>
        </div>
        <div id="DivCriticidadD" style="display: none">
            <input type="text" class="form-control" id = "criticidad4" name="criticidad" value="sin errores">
        </div>
    </ul>
    <hr>
    <ul>
        <div class="row">
            <div class="col card-box">
                <h5 class="center">OBSERVACIONES DE CALIDAD</h5>
                <p class="parrafoJustificado">
                    <textarea class="comentario" placeholder="Observaciones de calidad" id="observacionesCalidad"
                        name="observacionesCalidad" rows="8" maxlength="300" minlength="10" required></textarea>
                    <span class="badge bg-primary float-right" id="characterCount">0/300</span>
                </p>
                <br><br>
            </div>
        </div>
    </ul>
    <hr>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <br><br>
    <hr>
    {!! Form::close() !!}
@stop

@section('js')
    <script>
        function Suma() {
            var suma = parseInt(document.getElementById("criticidadSegmento").value);
            var suma2 = parseInt(document.getElementById("criticidadCantidades").value);
            var suma3 = parseInt(document.getElementById("criticidadTipologia").value);
            var suma4 = parseInt(document.getElementById("criticidadCenefaVisi").value);
            var suma5 = parseInt(document.getElementById("criticidadCenefaColo").value);
            var suma6 = parseInt(document.getElementById("criticidadAfiche_visi").value);
            var suma7 = parseInt(document.getElementById("criticidadAfiche_colo").value);
            var suma8 = parseInt(document.getElementById("criticidadAfiche_combo").value);
            var suma9 = parseInt(document.getElementById("criticidadMarcoVisi").value);
            var suma10 = parseInt(document.getElementById("criticidadMarcoColo").value);
            var suma11 = parseInt(document.getElementById("criticidadRompeVisi").value);
            var suma12 = parseInt(document.getElementById("criticidadRompeColo").value);
            var suma13 = parseInt(document.getElementById("criticidadfachadas_visi").value);
            var suma14 = parseInt(document.getElementById("criticidadfachadas_colo").value);
            var suma15 = parseInt(document.getElementById("criticidadHieleraProd").value);
            var suma16 = parseInt(document.getElementById("criticidadHieleraVisi").value);
            var suma17 = parseInt(document.getElementById("criticidadHieleraEstado").value);
            var suma18 = parseInt(document.getElementById("criticidadBsHieProd").value);
            var suma19 = parseInt(document.getElementById("criticidadBsHieVisi").value);
            var suma20 = parseInt(document.getElementById("criticidadBsHieEstado").value);
            var suma21 = parseInt(document.getElementById("criticidadDosiDVisi").value);
            var suma22 = parseInt(document.getElementById("criticidadDosiDProd").value);
            var suma23 = parseInt(document.getElementById("criticidadDosiDEstado").value);
            var suma24 = parseInt(document.getElementById("criticidadDosiSVisi").value);
            var suma25 = parseInt(document.getElementById("criticidadDosiSProd").value);
            var suma26 = parseInt(document.getElementById("criticidadDosiSEstado").value);
            var suma27 = parseInt(document.getElementById("criticidadBrandingVisi").value);
            var suma28 = parseInt(document.getElementById("criticidadBrandingEstado").value);
            var suma29 = parseInt(document.getElementById("criticidadVasosVisi").value);
            var suma30 = parseInt(document.getElementById("criticidadVasosEstado").value);
            var suma31 = parseInt(document.getElementById("criticidadCalMarcVisi").value);
            var suma32 = parseInt(document.getElementById("criticidadCalMarcEstado").value);
            var suma33 = parseInt(document.getElementById("criticidadCalMarcEtiqueta").value);
            var suma34 = parseInt(document.getElementById("criticidadRonBlack").value);
            var suma35 = parseInt(document.getElementById("criticidadRonVsJhonnie").value);
            var suma36 = parseInt(document.getElementById("criticidadFachada").value);
            var suma37 = parseInt(document.getElementById("criticidadAguVsSmirnoff").value);
            var suma38 = parseInt(document.getElementById("criticidadGift").value);


            var DivCriticidadA = document.getElementById('DivCriticidadA');
            var DivCriticidadB = document.getElementById('DivCriticidadB');
            var DivCriticidadC = document.getElementById('DivCriticidadC');
            var DivCriticidadD = document.getElementById('DivCriticidadD');

            var resultado =
                parseInt(suma) + parseInt(suma2) + parseInt(suma3) + parseInt(suma4) + parseInt(suma5) + parseInt(suma6) +
                parseInt(suma7) + parseInt(suma8) + parseInt(suma9) + parseInt(suma10) + parseInt(suma11) + parseInt(
                    suma12) +
                parseInt(suma13) + parseInt(suma14) + parseInt(suma15) + parseInt(suma16) + parseInt(suma17) + parseInt(
                    suma18) +
                parseInt(suma19) + parseInt(suma20) + parseInt(suma21) + parseInt(suma22) + parseInt(suma23) + parseInt(
                    suma24) +
                parseInt(suma25) + parseInt(suma26) + parseInt(suma27) + parseInt(suma28) + parseInt(suma29) + parseInt(
                    suma30) +
                parseInt(suma31) + parseInt(suma32) + parseInt(suma33) + parseInt(suma34) + parseInt(suma35) + parseInt(
                    suma36) +
                parseInt(suma37) + parseInt(suma38);
            document.getElementById("ResultadoSuma").value = resultado;
            if (resultado == suma36 && resultado == 1) {
                DivCriticidadA.style.display = "block";
                $("#criticidad1").prop('disabled', false);
                $("#criticidad2").prop('disabled', true);
                $("#criticidad3").prop('disabled', true);
                $("#criticidad4").prop('disabled', true);
                DivCriticidadB.style.display = "none";
                DivCriticidadC.style.display = "none";
                DivCriticidadD.style.display = "none";
            } else if (resultado >= 1 && suma36 == 0) {
                DivCriticidadB.style.display = "block";
                $("#criticidad2").prop('disabled', false);
                $("#criticidad1").prop('disabled', true);
                $("#criticidad3").prop('disabled', true);
                $("#criticidad4").prop('disabled', true);
                DivCriticidadA.style.display = "none";
                DivCriticidadC.style.display = "none";
                DivCriticidadD.style.display = "none";
            } else if (resultado >= 2 && suma36 == 1) {
                DivCriticidadC.style.display = "block";
                $("#criticidad3").prop('disabled', false);
                $("#criticidad1").prop('disabled', true);
                $("#criticidad2").prop('disabled', true);
                $("#criticidad4").prop('disabled', true);
                DivCriticidadA.style.display = "none";
                DivCriticidadB.style.display = "none";
                DivCriticidadD.style.display = "none";
            } else if (resultado == 0) {
                DivCriticidadD.style.display = "block";
                $("#criticidad4").prop('disabled', false);
                $("#criticidad1").prop('disabled', true);
                $("#criticidad2").prop('disabled', true);
                $("#criticidad3").prop('disabled', true);
                DivCriticidadA.style.display = "none";
                DivCriticidadB.style.display = "none";
                DivCriticidadC.style.display = "none";
            }
        }
    </script>
    <script>
        $('textarea').keyup(function() {
            $('#characterCount').text($(this).val().length + "/300")
        })
    </script>
    <script>
        var miCheckbox = document.getElementById('checkcross');
        var msgFachada = document.getElementById('msgFachada');
        var inpFachada = document.getElementById('inpFachada');

        const auditor = @json($reporte->promotor);
        var message = "error Critico, devolver este caso a su auditor: " + auditor;
        var inpCriticidadFachada = document.getElementById('criticidadFachada');
        if (miCheckbox != null) {
            miCheckbox.addEventListener('click', function() {
                if (miCheckbox.checked) {
                    msgFachada.innerText = 'La condicional de activación no corresponde según la fotografía';
                    if (miCheckbox.checked = "true") {
                        inpFachada.value = "se audito mal la activación";
                        inpCriticidadFachada.value = 1;
                        spanFachada.value = message;


                    }
                } else {
                    msgFachada.innerText = 'Según la validación, se tipificó la activación correctamente.';
                    inpFachada.value = "Se audito bien la activación";
                    inpCriticidadFachada.value = 0;

                    spanFachada.value = " ";

                }
            });
        }
    </script>
    <script>
        var miCheckbox2 = document.getElementById('checkcross2');
        var msgSegmento = document.getElementById('msgSegmento');
        var inpSegmento = document.getElementById('inpSegmento');
        var inpCriticidadSegmento = document.getElementById('criticidadSegmento');
        var divSegmento = document.getElementById('EditSegmento');



        if (miCheckbox2 != null) {
            miCheckbox2.addEventListener('click', function() {
                if (miCheckbox2.checked) {
                    msgSegmento.innerText = 'la foto del segmento no es correcta';
                    if (miCheckbox2.checked = "true") {
                        inpSegmento.value = "se audito mal el segmento";
                        inpCriticidadSegmento.value = 1;
                        divSegmento.style.display = "block";
                        $('#segmento').prop("disabled", false);
                    }


                } else {
                    msgSegmento.innerText = 'Según la validación, el segmento corresponde';
                    inpSegmento.value = "se audito bien el segmento";
                    inpCriticidadSegmento.value = 0;
                    divSegmento.style.display = "none";
                    $('#segmento').prop("disabled", true);
                }
            });
        }
    </script>

    <script>
        var miCheckboxBox = document.getElementById('checkcrossBox');
        var msgCantidades = document.getElementById('msgCantidades');
        var inpCantidades = document.getElementById('inpCantidades');
        var divCajas = document.getElementById('EditCaja');
        var inpCriticidadCantidades = document.getElementById('criticidadCantidades');
        if (miCheckboxBox != null) {
            miCheckboxBox.addEventListener('click', function() {
                if (miCheckboxBox.checked) {
                    msgCantidades.innerText =
                        'las cantidades reportadas de las cajas no coinciden';
                    if (miCheckboxBox.checked = "true") {
                        inpCantidades.value =
                            "se audito mal la cantidad de cajas reportadas";
                        inpCriticidadCantidades.value = 1;
                        divCajas.style.display = "block";
                    }
                } else {
                    msgCantidades.innerText =
                        'las cantidades reportadas de cajas, coinciden con lo auditado';
                    inpCantidades.value = "se audito bien la cantidad de cajas reportadas";
                    inpCriticidadCantidades.value = 0;
                    divCajas.style.display = "none";

                }
            });
        }
    </script>


    <script>
        var miCheckbox3 = document.getElementById('checkcross3');
        var msgTipologia = document.getElementById('msgTipologia');
        var inpTipologia = document.getElementById('inpTipologia');
        var inpCriticidadTipologia = document.getElementById('criticidadTipologia');
        var divTipologia = document.getElementById('EditTipologia');
        if (miCheckbox3 != null) {
            miCheckbox3.addEventListener('click', function() {
                if (miCheckbox3.checked) {
                    msgTipologia.innerText = 'la foto de la tipologia no es correcta';
                    if (miCheckbox3.checked = "true") {
                        inpTipologia.value = "se audito mal la tipologia";
                        inpCriticidadTipologia.value = 1;
                        divTipologia.style.display = "block";
                        $('#tipologia').prop("disabled", false);
                    }
                } else {
                    msgTipologia.innerText = 'Según la validación, la tipologia corresponde';
                    inpTipologia.value = "se audito bien la tipologia";
                    inpCriticidadTipologia.value = 0;
                    divTipologia.style.display = "none";
                    $('#tipologia').prop("disabled", true);
                }
            });
        }
    </script>
    <script>
        var miCheckbox4 = document.getElementById('checkcross4');
        var msgCenefaVisi = document.getElementById('msgCenefaVisi');
        var inpCenefaVisi = document.getElementById('inpCenefaVisi');
        var inpCriticidadCenefaVisi = document.getElementById('criticidadCenefaVisi');
        var EditCenefaVisi = document.getElementById('EditCenefaVisi');
        if (miCheckbox4 != null) {
            miCheckbox4.addEventListener('click', function() {
                if (miCheckbox4.checked) {
                    msgCenefaVisi.innerText = 'se confirma que la cenefa no es visible';
                    if (miCheckbox4.checked = "true") {
                        inpCenefaVisi.value = "se audito mal la visibilidad de la cenafa";
                        inpCriticidadCenefaVisi.value = 1;
                        EditCenefaVisi.style.display = "block";
                        $('#cenefa_visi').prop("disabled", false);
                    }
                } else {
                    msgCenefaVisi.innerText = 'Según la validación, la cenefa es visible';
                    inpCenefaVisi.value = "se audito bien la visibilidad de la cenefa";
                    inpCriticidadCenefaVisi.value = 0;
                    EditCenefaVisi.style.display = "none";
                    $('#cenefa_visi').prop("disabled", true);
                }
            });
        }
    </script>

    <script>
        var miCheckbox5 = document.getElementById('checkcross5');
        var msgCenefaColo = document.getElementById('msgCenefaColo');
        var inpCenefaColo = document.getElementById('inpCenefaColo');
        var inpCriticidadCenefaColo = document.getElementById('criticidadCenefaColo');
        var EditCenefaColo = document.getElementById('EditCenefaColo');
        if (miCheckbox5 != null) {
            miCheckbox5.addEventListener('click', function() {
                if (miCheckbox5.checked) {
                    msgCenefaColo.innerText = 'Se confirma que la cenefa no esta bien colocada, ';
                    if (miCheckbox5.checked = "true") {
                        inpCenefaColo.value = "se audito mal la colocación de la cenefa";
                        inpCriticidadCenefaColo.value = 1;
                        EditCenefaColo.style.display = "block";
                        $('#cenefa_colo').prop("disabled", false);
                    }
                } else {
                    msgCenefaColo.innerText = 'La cenefa esta bien colocada';
                    inpCenefaColo.value = "se audito bien la colocación de la cenefa";
                    inpCriticidadCenefaColo.value = 0;
                    EditCenefaColo.style.display = "none";
                    $('#cenefa_colo').prop("disabled", true);
                }
            });
        }
    </script>


    <script>
        var miCheckbox6 = document.getElementById('checkcross6');
        var msgAficheVisi = document.getElementById('msgAficheVisi');
        var inpAficheVisi = document.getElementById('inpAficheVisi');
        var criticidadAfiche_visi = document.getElementById('criticidadAfiche_visi');
        var EditAficheVisi = document.getElementById('EditAficheVisi');

        if (miCheckbox6 != null) {
            miCheckbox6.addEventListener('click', function() {
                if (miCheckbox6.checked) {
                    msgAficheVisi.innerText = 'se confirma que el afiche no esta visible';
                    if (miCheckbox6.checked = "true") {
                        inpAficheVisi.value = "se audito mal la visibilidad del afiche";
                        criticidadAfiche_visi.value = 1;
                        EditAficheVisi.style.display = "block";
                        $('#afiche_visi').prop("disabled", false);
                    }
                } else {
                    msgAficheVisi.innerText = 'Según la validación, el afiche es visible';
                    inpAficheVisi.value = "se audito bien la visibilidad del afiche";
                    criticidadAfiche_visi.value = 0;
                    EditAficheVisi.style.display = "none";
                    $('#afiche_visi').prop("disabled", true);
                }
            });
        }
    </script>
    <script>
        var miCheckbox7 = document.getElementById('checkcross7');
        var msgAficheColo = document.getElementById('msgAficheColo');
        var inpAficheColo = document.getElementById('inpAficheColo');
        var criticidadAfiche_colo = document.getElementById('criticidadAfiche_colo');
        var EditAficheColo = document.getElementById('EditAficheColo');

        if (miCheckbox7 != null) {
            miCheckbox7.addEventListener('click', function() {
                if (miCheckbox7.checked) {
                    msgAficheColo.innerText = 'se confirma que el afiche no esta bien colocado';
                    if (miCheckbox7.checked = "true") {
                        inpAficheColo.value = "se audito mal la colocación del afiche";
                        criticidadAfiche_colo.value = 1;
                        EditAficheColo.style.display = "block";
                        $('#afiche_colo').prop("disabled", false);
                    }
                } else {
                    msgAficheColo.innerText = 'El afiche esta bien colocado';
                    inpAficheColo.value = "se audito bien la colocación del afiche";
                    criticidadAfiche_colo.value = 0;
                    EditAficheColo.style.display = "none";
                    $('#afiche_colo').prop("disabled", true);

                }
            });
        }
    </script>
    <script>
        var miCheckbox8 = document.getElementById('checkcross8');
        var msgAficheCombo = document.getElementById('msgAficheCombo');
        var inpAficheCombo = document.getElementById('inpAficheCombo');
        var criticidadAfiche_combo = document.getElementById('criticidadAfiche_combo');

        if (miCheckbox8 != null) {
            miCheckbox8.addEventListener('click', function() {
                if (miCheckbox8.checked) {
                    msgAficheCombo.innerText = 'la descripcion de la combotizacion esta errada';
                    if (miCheckbox8.checked = "true") {
                        inpAficheCombo.value = "se audito mal la combotizacion";
                        criticidadAfiche_combo.value = 1;
                    }
                } else {
                    msgAficheCombo.innerText = 'La combotización es correcta';
                    inpAficheCombo.value = "se audito bien la combotización";
                    criticidadAfiche_combo.value = 0;
                }
            });
        }
    </script>

    {{--  /*9*/  --}}
    <script>
        var miCheckbox9 = document.getElementById('checkcross9');
        var msgMarcoVisi = document.getElementById('msgMarcoVisi');
        var inpMarcoVisi = document.getElementById('inpMarcoVisi');
        var criticidadMarcoVisi = document.getElementById('criticidadMarcoVisi');

        if (miCheckbox9 != null) {
            miCheckbox9.addEventListener('click', function() {
                if (miCheckbox9.checked) {
                    msgMarcoVisi.innerText = 'se confirma que el marco no es visible';
                    if (miCheckbox9.checked = "true") {
                        inpMarcoVisi.value = "se audito mal la visibilidad del marco";
                        criticidadMarcoVisi.value = 1;
                    }
                } else {
                    msgMarcoVisi.innerText = 'Según la validación, el marco es visible';
                    inpMarcoVisi.value = "se audito bien la visibilidad del marco";
                    criticidadMarcoVisi.value = 0;
                }
            });
        }
    </script>
    {{--  /*10*/  --}}
    <script>
        var miCheckbox10 = document.getElementById('checkcross10');
        var msgMarcoColo = document.getElementById('msgMarcoColo');
        var inpMarcoColo = document.getElementById('inpMarcoColo');
        var criticidadMarcoColo = document.getElementById('criticidadMarcoColo');
        if (miCheckbox10 != null) {
            miCheckbox10.addEventListener('click', function() {
                if (miCheckbox10.checked) {
                    msgMarcoColo.innerText = 'se confirma que el marco no esta bien colocado';
                    if (miCheckbox10.checked = "true") {
                        inpMarcoColo.value = "se tipificico mal la colocación del marco";
                        criticidadMarcoColo.value = 1;
                    }
                } else {
                    msgMarcoColo.innerText = 'Según la validación, el marco esta bien colocado';
                    inpMarcoColo.value = "se audito bien la colocación del marco";
                    criticidadMarcoColo.value = 0;
                }
            });
        }
    </script>
    {{--  /*11*/  --}}
    <script>
        var miCheckbox11 = document.getElementById('checkcross11');
        var msgRompeVisi = document.getElementById('msgRompeVisi');
        var inpRompeVisi = document.getElementById('inpRompeVisi');
        var criticidadRompeVisi = document.getElementById('criticidadRompeVisi');
        if (miCheckbox11 != null) {
            miCheckbox11.addEventListener('click', function() {
                if (miCheckbox11.checked) {
                    msgRompeVisi.innerText = 'se confirma que el rompetrafico no es visible';
                    if (miCheckbox11.checked = "true") {
                        inpRompeVisi.value = "se audito mal la visibilidad del rompetrafico";
                        criticidadRompeVisi.value = 1;
                    }
                } else {
                    msgRompeVisi.innerText = 'Según la validación, el rompetrafico esta visible';
                    inpRompeVisi.value = "se audito bien la visibilidad del rompetrafico";
                    criticidadRompeVisi.value = 0;
                }
            });
        }
    </script>

    {{--  /*12*/  --}}
    <script>
        var miCheckbox12 = document.getElementById('checkcross12');
        var msgRompeColo = document.getElementById('msgRompeColo');
        var inpRompeColo = document.getElementById('inpRompeColo');
        var criticidadRompeColo = document.getElementById('criticidadRompeColo');
        if (miCheckbox12 != null) {
            miCheckbox12.addEventListener('click', function() {
                if (miCheckbox12.checked) {
                    msgRompeColo.innerText = 'se confirma que el rompetrafico no esta bien colocado';
                    if (miCheckbox12.checked = "true") {
                        inpRompeColo.value = "se audito mal la colocación del rompetrafico";
                        criticidadRompeColo.value = 1;
                    }
                } else {
                    msgRompeColo.innerText = 'Según la validación, el rompetrafico esta bien colocado';
                    inpRompeColo.value = "se audito bien la colocación del rompetrafico";
                    criticidadRompeColo.value = 0;
                }
            });
        }
    </script>

    {{--  /*13*/  --}}
    <script>
        var miCheckbox13 = document.getElementById('checkcross13');
        var msgFaxadaVisi = document.getElementById('msgFaxadaVisi');
        var inpFaxadaVisi = document.getElementById('inpFaxadaVisi');
        var criticidadfachadas_visi = document.getElementById('criticidadfachadas_visi');

        if (miCheckbox13 != null) {
            miCheckbox13.addEventListener('click', function() {
                if (miCheckbox13.checked) {
                    msgFaxadaVisi.innerText = 'se confirma que la fachada y los afiches no estan visibles';
                    if (miCheckbox13.checked = "true") {
                        inpFaxadaVisi.value = "se audito mal la visibilidad de la fachada y los avisos";
                        criticidadfachadas_visi.value = 1;
                    }
                } else {
                    msgFaxadaVisi.innerText = 'Según la validación, la fachada y los avisos estan visibles';
                    inpFaxadaVisi.value = "se audito bien la visibilidad de la fachada y los avisos";
                    criticidadfachadas_visi.value = 0;
                }
            });
        }
    </script>

    {{--  /*14*/  --}}
    <script>
        var miCheckbox14 = document.getElementById('checkcross14');
        var msgAFaxadaEstado = document.getElementById('msgAFaxadaEstado');
        var inpAFaxadaEstado = document.getElementById('inpAFaxadaEstado');
        var criticidadfachadas_colo = document.getElementById('criticidadfachadas_colo');

        if (miCheckbox14 != null) {
            miCheckbox14.addEventListener('click', function() {
                if (miCheckbox14.checked) {
                    msgAFaxadaEstado.innerText = 'se confirma que la fachada y los afiches estan en mal estado';
                    if (miCheckbox14.checked = "true") {
                        inpAFaxadaColo.value = "se audito mal el estado de la fachada y los avisos";
                        criticidadfachadas_colo.value = 1;
                    }
                } else {
                    msgAFaxadaEstado.innerText =
                        'Según la validación, la fachada y los avisos estan en buen estado';
                    inpAFaxadaEstado.value = "se audito bien el estado de la fachada y los afiches";
                    criticidadfachadas_colo.value = 0;
                }
            });
        }
    </script>

    {{--  /*15*/  --}}
    <script>
        var miCheckbox15 = document.getElementById('checkcross15');
        var msgHieleraProd = document.getElementById('msgHieleraProd');
        var inpHieleraProd = document.getElementById('inpHieleraProd');
        var criticidadHieleraProd = document.getElementById('criticidadHieleraProd');

        if (miCheckbox15 != null) {
            miCheckbox15.addEventListener('click', function() {
                if (miCheckbox15.checked) {
                    msgHieleraProd.innerText = 'se confirma que la hielera no cuenta con producto de la marca';
                    if (miCheckbox15.checked = "true") {
                        inpHieleraProd.value = "se audito mal el contenido de la hielera";
                        criticidadHieleraProd.value = 1;
                    }
                } else {
                    msgHieleraProd.innerText = 'Según la validación, la hielera cuenta con producto de la marca';
                    inpHieleraProd.value = "se audito bien el contenido de la hielera";
                    criticidadHieleraProd.value = 0;
                }
            });
        }
    </script>
    {{--  /*16*/  --}}
    <script>
        var miCheckbox16 = document.getElementById('checkcross16');
        var msgHieleraVisi = document.getElementById('msgHieleraVisi');
        var inpHieleraVisi = document.getElementById('inpHieleraVisi');
        var criticidadHieleraVisi = document.getElementById('criticidadHieleraVisi');

        if (miCheckbox16 != null) {
            miCheckbox16.addEventListener('click', function() {
                if (miCheckbox16.checked) {
                    msgHieleraVisi.innerText = 'se confirma que la hielera no es visible al publico';
                    if (miCheckbox16.checked = "true") {
                        inpHieleraVisi.value = "se audito mal la visibilidad de la hielera";
                        criticidadHieleraVisi.value = 1;
                    }
                } else {
                    msgHieleraVisi.innerText = 'Según la validación, la hielera esta visible al publico';
                    inpHieleraVisi.value = "se audito bien la visibilidad de la hielera";
                    criticidadHieleraVisi.value = 0;
                }
            });
        }
    </script>

    {{--  /*17*/  --}}
    <script>
        var miCheckbox17 = document.getElementById('checkcross17');
        var msgHieleraEstado = document.getElementById('msgHieleraEstado');
        var inpHieleraEstado = document.getElementById('inpHieleraEstado');
        var criticidadHieleraEstado = document.getElementById('criticidadHieleraEstado');

        if (miCheckbox17 != null) {
            miCheckbox17.addEventListener('click', function() {
                if (miCheckbox17.checked) {
                    msgHieleraEstado.innerText = 'se confirma que la hielera no esta en buen estado';
                    if (miCheckbox17.checked = "true") {
                        inpHieleraEstado.value = "se audito mal el estado de la hielera";
                        criticidadHieleraEstado.value = 1;
                    }
                } else {
                    msgHieleraEstado.innerText = 'Según la validación, la hielera esta en buen estado';
                    inpHieleraEstado.value = "se audito bien el estado de la hielera";
                    criticidadHieleraEstado.value = 0;
                }
            });
        }
    </script>


    {{--  /*18*/  --}}
    <script>
        var miCheckbox18 = document.getElementById('checkcross18');
        var msgBsHieProd = document.getElementById('msgBsHieProd');
        var inpBsHieProd = document.getElementById('inpBsHieProd');
        var criticidadBsHieProd = document.getElementById('criticidadBsHieProd');

        if (miCheckbox18 != null) {
            miCheckbox18.addEventListener('click', function() {
                if (miCheckbox18.checked) {
                    msgBsHieProd.innerText = 'la base de la hielera no tiene producto DIAGEO';
                    if (miCheckbox18.checked = "true") {
                        inpBsHieProd.value = "se audito mal el contenido de la base de la hielera";
                        criticidadBsHieProd.value = 1;
                    }
                } else {
                    msgBsHieProd.innerText =
                        'Según la validación, la base de la hielera cuenta con producto de la marca';
                    inpBsHieProd.value = "se audito bien el contenido de la base de la hielera";
                    criticidadBsHieProd.value = 0;
                }
            });
        }
    </script>

    {{--  /*19*/  --}}
    <script>
        var miCheckbox19 = document.getElementById('checkcross19');
        var msgBsHieVisi = document.getElementById('msgBsHieVisi');
        var inpBsHieVisi = document.getElementById('inpBsHieVisi');
        var criticidadBsHieVisi = document.getElementById('criticidadBsHieVisi');

        if (miCheckbox19 != null) {
            miCheckbox19.addEventListener('click', function() {
                if (miCheckbox19.checked) {
                    msgBsHieVisi.innerText = 'se confirma que la base de hielera no esta en buen estado';
                    if (miCheckbox19.checked = "true") {
                        inpBsHieVisi.value = "se tipificico mal el estado la base de la hielera";
                        criticidadBsHieVisi.value = 1;
                    }
                } else {
                    msgBsHieVisi.innerText = 'Según la validación, la base de la hielera esta en buen estado';
                    inpBsHieVisi.value = "se audito bien el estado de la base de la hielera";
                    criticidadBsHieVisi.value = 0;
                }
            });
        }
    </script>

    {{--  /*20*/  --}}
    <script>
        var miCheckbox20 = document.getElementById('checkcross20');
        var msgBsHieEstado = document.getElementById('msgBsHieEstado');
        var inpBsHieEstado = document.getElementById('inpBsHieEstado');
        var criticidadBsHieEstado = document.getElementById('criticidadBsHieEstado');
        if (miCheckbox20 != null) {
            miCheckbox20.addEventListener('click', function() {
                if (miCheckbox20.checked) {
                    msgBsHieEstado.innerText = 'se confirma que la base de la hielera no esta en buen estado';
                    if (miCheckbox20.checked = "true") {
                        inpBsHieEstado.value = "se audito mal el estado de la base de la hielera";
                        criticidadBsHieEstado.value = 1;
                    }
                } else {
                    msgBsHieEstado.innerText = 'Según la validación, la base de la hielera esta en buen estado';
                    inpBsHieEstado.value = "se audito bien el estado de la base de la hielera";
                    criticidadBsHieEstado.value = 0;
                }
            });
        }
    </script>

    {{--  /*21*/  --}}
    <script>
        var miCheckbox21 = document.getElementById('checkcross21');
        var msgDsDVisi = document.getElementById('msgDsDVisi');
        var inpDsDVisi = document.getElementById('inpDsDVisi');
        var criticidadDosiDVisi = document.getElementById('criticidadDosiDVisi');
        if (miCheckbox21 != null) {
            miCheckbox21.addEventListener('click', function() {
                if (miCheckbox21.checked) {
                    msgDsDVisi.innerText = 'el dosificador doble no es visible';
                    if (miCheckbox21.checked = "true") {
                        inpDsDVisi.value = "Se audito mal la visibilidad del el dosificador doble";
                        criticidadDosiDVisi.value = 1;
                    }
                } else {
                    msgDsDVisi.innerText = 'El dosificador doble es visible';
                    inpDsDVisi.value = "se audito bien la visibilidad del dosificador doble";
                    criticidadDosiDVisi.value = 0;
                }
            });
        }
    </script>

    {{--  /*22*/  --}}
    <script>
        var miCheckbox22 = document.getElementById('checkcross22');
        var msgDsDProd = document.getElementById('msgDsDProd');
        var inpDsDProd = document.getElementById('inpDsDProd');
        var criticidadDosiDProd = document.getElementById('criticidadDosiDProd');
        if (miCheckbox22 != null) {
            miCheckbox22.addEventListener('click', function() {
                if (miCheckbox22.checked) {
                    msgDsDProd.innerText = 'se confirma que el dosificador doble no cuenta con producto Diageo';
                    if (miCheckbox22.checked = "true") {
                        inpDsDProd.value = "se audito mal el contenido del dosificador doble";
                        criticidadDosiDProd.value = 1;
                    }
                } else {
                    msgDsDProd.innerText = 'cuenta con productos Diageo';
                    inpDsDProd.value = "se audito bien contenido del dosificador doble";
                    criticidadDosiDProd.value = 0;
                }
            });
        }
    </script>
    {{--  /*23*/  --}}
    <script>
        var miCheckbox23 = document.getElementById('checkcross23');
        var msgDsDEstado = document.getElementById('msgDsDEstado');
        var inpDsDEstado = document.getElementById('inpDsDEstado');
        var criticidadDosiDEstado = document.getElementById('criticidadDosiDEstado');
        if (miCheckbox23 != null) {
            miCheckbox23.addEventListener('click', function() {
                if (miCheckbox23.checked) {
                    msgDsDEstado.innerText = 'se confirma que el dosificador doble no esta en buen estado';
                    if (miCheckbox23.checked = "true") {
                        inpDsDEstado.value = "se audito mal el estado del dosificador doble";
                        criticidadDosiDEstado.value = 1;
                    }
                } else {
                    msgDsDEstado.innerText = 'en general esta en buen estado';
                    inpDsDEstado.value = "se audito bien el estado del dosificador doble";
                    criticidadDosiDEstado.value = 0;
                }
            });
        }
    </script>
    {{--  /*24*/  --}}
    <script>
        var miCheckbox24 = document.getElementById('checkcross24');
        var msgDsSVisi = document.getElementById('msgDsSVisi');
        var inpDsSVisi = document.getElementById('inpDsSVisi');
        var criticidadDosiSVisi = document.getElementById('criticidadDosiSVisi');
        if (miCheckbox24 != null) {
            miCheckbox24.addEventListener('click', function() {
                if (miCheckbox24.checked) {
                    msgDsSVisi.innerText = 'El dosificador sencillo no es visible';
                    if (miCheckbox24.checked = "true") {
                        inpDsSVisi.value = "se audito mal la visibilidad del dosificador sencillo";
                        criticidadDosiSVisi.value = 1;
                    }
                } else {
                    msgDsSVisi.innerText = 'El dosificador sencillo es visible, ';
                    inpDsSVisi.value = "se audito bien la visibilidad del dosificador sencillo";
                    criticidadDosiSVisi.value = 0;
                }
            });
        }
    </script>
    {{--  /*25*/  --}}
    <script>
        var miCheckbox25 = document.getElementById('checkcross25');
        var msgDsSProd = document.getElementById('msgDsSProd');
        var inpDsSProd = document.getElementById('inpDsSProd');
        var criticidadDosiSProd = document.getElementById('criticidadDosiSProd');
        if (miCheckbox25 != null) {
            miCheckbox25.addEventListener('click', function() {
                if (miCheckbox25.checked) {
                    msgDsSProd.innerText = 'no cuenta con producto Diageo, ';
                    if (miCheckbox25.checked = "true") {
                        inpDsSProd.value = "se audito mal el contenido del dosificador sencillo";
                        criticidadDosiSProd.value = 1;
                    }
                } else {
                    msgDsSProd.innerText = 'cuenta con productos de la marca';
                    inpDsSProd.value = "se audito bien el contenido del dosificador sencillo";
                    criticidadDosiSProd.value = 0;
                }
            });
        }
    </script>
    {{--  /*26*/  --}}
    <script>
        var miCheckbox26 = document.getElementById('checkcross26');
        var msgDsSEstado = document.getElementById('msgDsSEstado');
        var inpDsSEstado = document.getElementById('inpDsSEstado');
        var criticidadDosiSEstado = document.getElementById('criticidadDosiSEstado');
        if (miCheckbox26 != null) {
            miCheckbox26.addEventListener('click', function() {
                if (miCheckbox26.checked) {
                    msgDsSEstado.innerText = 'se evidencia deterioro de el dosificador sencillo';
                    if (miCheckbox26.checked = "true") {
                        inpDsSEstado.value = "se audito mal el estado del dosificador sencillo";
                        criticidadDosiSEstado.value = 1;
                    }
                } else {
                    msgDsSEstado.innerText = 'en general esta en buen estado.';
                    inpDsSEstado.value = "se audito bien el estado del dosificador sencillo";
                    criticidadDosiSEstado.value = 0;
                }
            });
        }
    </script>
    {{--  /*27*/  --}}

    <script>
        var miCheckbox27 = document.getElementById('checkcross27');
        var msgBrandingVisi = document.getElementById('msgBrandingVisi');
        var inpBrandingVisi = document.getElementById('inpBrandingVisi');
        var criticidadBrandingVisi = document.getElementById('criticidadBrandingVisi');
        if (miCheckbox27 != null) {
            miCheckbox27.addEventListener('click', function() {
                if (miCheckbox27.checked) {
                    msgBrandingVisi.innerText = 'se confirma que el branding esta visible';
                    if (miCheckbox27.checked = "true") {
                        inpBrandingVisi.value = "se audito mal la visibilidad del branding";
                        criticidadBrandingVisi.value = 1;
                    }
                } else {
                    msgBrandingVisi.innerText = 'Según la validación, el branding es visible';
                    inpBrandingVisi.value = "se audito bien la visibilidad del branding";
                    criticidadBrandingVisi.value = 0;
                }
            });
        }
    </script>
    {{--  /*28*/  --}}
    <script>
        var miCheckbox28 = document.getElementById('checkcross28');
        var msgBrandingEstado = document.getElementById('msgBrandingEstado');
        var inpBrandingEstado = document.getElementById('inpBrandingEstado');
        var criticidadBrandingEstado = document.getElementById('criticidadBrandingEstado');
        if (miCheckbox28 != null) {
            miCheckbox28.addEventListener('click', function() {
                if (miCheckbox28.checked) {
                    msgBrandingEstado.innerText = 'El branding se encuentra en mal estado';
                    if (miCheckbox28.checked = "true") {
                        inpBrandingColo.value = "se audito mal el estado del branding";
                        criticidadBrandingEstado.value = 1;
                    }
                } else {
                    msgBrandingEstado.innerText = 'Según la validación, el branding esta en buen estado';
                    inpBrandingEstado.value = "se audito bien el estado del branding";
                    criticidadBrandingEstado.value = 0;
                }
            });
        }
    </script>

    {{--  /*29*/  --}}

    <script>
        var miCheckbox29 = document.getElementById('checkcross29');
        var msgVasosVisi = document.getElementById('msgVasosVisi');
        var inpVasosVisi = document.getElementById('inpVasosVisi');
        var criticidadVasosVisi = document.getElementById('criticidadVasosVisi');
        if (miCheckbox29 != null) {
            miCheckbox29.addEventListener('click', function() {
                if (miCheckbox29.checked) {
                    msgVasosVisi.innerText = 'Los vasos y las copas no son visibles';
                    if (miCheckbox29.checked = "true") {
                        inpVasosVisi.value = "se audito mal la visibilidad de los vasos y copas";
                        criticidadVasosVisi.value = 1;
                    }
                } else {
                    msgVasosVisi.innerText = 'Según la validación, los vasos y las copas son visibles';
                    inpVasosVisi.value = "se audito bien la visibilidad de los vasos y copas";
                    criticidadVasosVisi.value = 0;
                }
            });
        }
    </script>

    {{--  /*30*/  --}}
    <script>
        var miCheckbox30 = document.getElementById('checkcross30');
        var msgVasosEstado = document.getElementById('msgVasosEstado');
        var inpVasosEstado = document.getElementById('inpVasosEstado');
        var criticidadVasosEstado = document.getElementById('criticidadVasosEstado');
        if (miCheckbox30 != null) {
            miCheckbox30.addEventListener('click', function() {
                if (miCheckbox30.checked) {
                    msgVasosEstado.innerText = 'Los vasos y copas estan en mal estado';
                    if (miCheckbox30.checked = "true") {
                        inpVasosColo.value = "se audito mal el estado de los vasos y copas";
                        criticidadVasosEstado.value = 1;
                    }
                } else {
                    msgVasosEstado.innerText = 'Los vasos y las copas estan en optimas condiciones';
                    inpVasosEstado.value = "se audito bien el estado de los vasos y copas";
                    criticidadVasosEstado.value = 0;
                }
            });
        }
    </script>

    {{--  /*31*/  --}}
    <script>
        var miCheckbox31 = document.getElementById('checkcross31');
        var msgCalMarcVisi = document.getElementById('msgCalMarcVisi');
        var inpCalMarcVisi = document.getElementById('inpCalMarcVisi');
        var criticidadCalMarcVisi = document.getElementById('criticidadCalMarcVisi');
        if (miCheckbox31 != null) {
            miCheckbox31.addEventListener('click', function() {
                if (miCheckbox31.checked) {
                    msgCalMarcVisi.innerText = 'La foto del lineal no muestra los productos DIAGEO correctamente';
                    if (miCheckbox31.checked = "true") {
                        inpCalMarcVisi.value = "se audito mal la visibilidad de los productos del lineal Diageo";
                        criticidadCalMarcVisi.value = 1;
                    }
                } else {
                    msgCalMarcVisi.innerText = 'Se pueden apreciar correctamente los productos de la marca';
                    inpCalMarcVisi.value = "se audito bien la visibilidad de los productos del lineal Diageo";
                    criticidadCalMarcVisi.value = 0;
                }
            });
        }
    </script>

    {{--  /*32*/  --}}
    <script>
        var miCheckbox32 = document.getElementById('checkcross32');
        var msgCalMarcEstado = document.getElementById('msgCalMarcEstado');
        var inpCalMarcEstado = document.getElementById('inpCalMarcEstado');
        var criticidadCalMarcEstado = document.getElementById('criticidadCalMarcEstado');
        if (miCheckbox32 != null) {
            miCheckbox32.addEventListener('click', function() {
                if (miCheckbox32.checked) {
                    msgCalMarcEstado.innerText = 'Los productos de la marca no estan en buen estado';
                    if (miCheckbox32.checked = "true") {
                        inpCalMarcEstado.value = "se audito mal el estado de los productos del lineal Diageo";
                        criticidadCalMarcEstado.value = 1;
                    }
                } else {
                    msgCalMarcEstado.innerText = 'Los productos de la marca se encuentran en optimas condiciones';
                    inpCalMarcEstado.value = "se audito bien el estado de los productos del lineal Diageo";
                    criticidadCalMarcEstado.value = 0;
                }
            });
        }
    </script>
    {{--  /*33*/  --}}
    <script>
        var miCheckbox33 = document.getElementById('checkcross33');
        var msgCalMarcEtiqueta = document.getElementById('msgCalMarcEtiqueta');
        var inpCalMarcEtiqueta = document.getElementById('inpCalMarcEtiqueta');
        var criticidadCalMarcEtiqueta = document.getElementById('criticidadCalMarcEtiqueta');
        if (miCheckbox33 != null) {
            miCheckbox33.addEventListener('click', function() {
                if (miCheckbox33.checked) {
                    msgCalMarcEtiqueta.innerText =
                        'La foto del lineal no muestra los productos DIAGEO correctamente';
                    if (miCheckbox33.checked = "true") {
                        inpCalMarcEtiqueta.value = "se auditor mal el estado de las etiquetas de la marca Diageo";
                        criticidadCalMarcEtiqueta.value = 1;
                    }
                } else {
                    msgCalMarcEtiqueta.innerText = 'Se pueden apreciar correctamente los productos de la marca';
                    inpCalMarcEtiqueta.value = "se auditor bien el estado de las etiquetas de la marca Diageo";
                    criticidadCalMarcEtiqueta.value = 0;
                }
            });
        }
    </script>

    {{--  /*34*/  --}}
    <script>
        var miCheckbox34 = document.getElementById('checkcross34');
        var msgRonBlack = document.getElementById('msgRonBlack');
        var inpRonBlack = document.getElementById('inpRonBlack');
        var criticidadRonBlack = document.getElementById('criticidadRonBlack');
        if (miCheckbox34 != null) {
            miCheckbox34.addEventListener('click', function() {
                if (miCheckbox34.checked) {
                    msgRonBlack.innerText =
                        'No se cumple la exhibición de Black & White junto a los rones';
                    if (miCheckbox34.checked = "true") {
                        inpRonBlack.value =
                            "se audito mal la ubicacion de los rones junto al Black & white";
                        criticidadRonBlack.value = 1;
                    }
                } else {
                    msgRonBlack.innerText =
                        'La marca Black & White esta ubicada correctamente junto a los rones de la competencia';
                    inpRonBlack.value = "se audito bien la ubicacion de los rones junto al Black & white";
                    criticidadRonBlack.value = 0;
                }
            });
        }
    </script>

    {{--  /*35*/  --}}
    <script>
        var miCheckbox35 = document.getElementById('checkcross35');
        var msgJhonnie = document.getElementById('msgJhonnie');
        var inpJhonnie = document.getElementById('inpJhonnie');
        var criticidadRonVsJhonnie = document.getElementById('criticidadRonVsJhonnie');
        if (miCheckbox35 != null) {
            miCheckbox35.addEventListener('click', function() {
                if (miCheckbox35.checked) {
                    msgJhonnie.innerText =
                        'No se cumple la exhibición de Jhonnie Walker junto a los rones';
                    if (miCheckbox35.checked = "true") {
                        inpJhonnie.value =
                            "se audito mal la ubicacion de los rones junto a jhonny walker";
                        criticidadRonVsJhonnie.value = 1;
                    }
                } else {
                    msgJhonnie.innerText =
                        'La marca Jhonnie Walker esta ubicada correctamente junto a los rones de la competencia';
                    inpJhonnie.value = "se audito bien la ubicacion de los rones junto a jhonny walker";
                    criticidadRonVsJhonnie.value = 0;
                }
            });
        }
    </script>

    {{--  /*65*/  --}}
    <script>
        var miCheckbox36 = document.getElementById('checkcross36');
        var msgSmirnoff = document.getElementById('msgSmirnoff');
        var inpSmirnoff = document.getElementById('inpSmirnoff');
        var criticidadAguVsSmirnoff = document.getElementById('criticidadAguVsSmirnoff');
        if (miCheckbox36 != null) {
            miCheckbox36.addEventListener('click', function() {
                if (miCheckbox36.checked) {
                    msgSmirnoff.innerText =
                        'No se cumple la exhibición de Smirnoff junto a los aguardientes';
                    if (miCheckbox36.checked = "true") {
                        inpSmirnoff.value =
                            "se audito mal la ubicacion de los aguardiantes junto al smirnoff";
                        criticidadAguVsSmirnoff.value = 1;
                    }
                } else {
                    msgSmirnoff.innerText =
                        'La marca Smirnoff esta ubicada correctamente junto a los aguardientes de la competencia';
                    inpSmirnoff.value = "se audito bien la ubicacion de los aguardiantes junto al smirnoff";
                    criticidadAguVsSmirnoff.value = 0;
                }
            });
        }
    </script>


    {{--  /*37*/  --}}
    <script>
        var miCheckbox37 = document.getElementById('checkcross37');
        var msgGift = document.getElementById('msgGift');
        var inpGift = document.getElementById('inpGift');
        var criticidadGift = document.getElementById('criticidadGift');
        if (miCheckbox37 != null) {
            miCheckbox37.addEventListener('click', function() {
                if (miCheckbox37.checked) {
                    msgGift.innerText =
                        'no se entrego gift';
                    if (miCheckbox37.checked = "true") {
                        inpGift.value =
                            "se audito mal la entrega del gift";
                        $("#ingreso11").val(0);

                        criticidadGift.value = 1;
                    }
                } else {
                    msgGift.innerText =
                        'La entrega del gift se confirma con la foto';
                    inpGift.value = "se audito bien la entrega del gift";
                    $("#ingreso11").val(0);

                    criticidadGift.value = 0;
                }
            });
        }
    </script>

    <script>
        var angle = 0;
        var zindex = 0;
        var scale = 1;
        var $img = $('#image');

        $img.on('transform', function() {
            $img.css('transform', `rotate(${angle}deg) scale(${scale})`);
        });

        $('.js-rotate-right').on('click', function() {
            angle += 15;
            $img.trigger('transform');
        });

        $('.js-rotate-left').on('click', function() {
            angle -= 15;
            $img.trigger('transform');
        });

        $('.js-zoom-in').on('click', function() {
            scale += 0.25;
            if (scale == 2.25) {
                scale = 4;
                zindex = 999;
            };
            $img.trigger('transform');
        });

        $('.js-zoom-out').on('click', function() {
            scale -= 0.25;
            if (scale == 0) {
                scale = 0.25;
                zindex = 999;
            }
            $img.trigger('transform');
        });
    </script>

    <script>
        var angle = 0;
        var zindex = 0;
        var scale = 1;
        var $imgSegmento = $('#imageSegmento');

        $imgSegmento.on('transform', function() {
            $imgSegmento.css('transform', `rotate(${angle}deg) scale(${scale})`);
        });

        $('.js-rotate-right1').on('click', function() {
            angle += 15;
            $imgSegmento.trigger('transform');
        });

        $('.js-rotate-left1').on('click', function() {
            angle -= 15;
            $imgSegmento.trigger('transform');
        });

        $('.js-zoom-in1').on('click', function() {
            scale += 0.25;
            if (scale == 2.25) {
                scale = 4;
                zindex = 999;
            };
            $imgSegmento.trigger('transform');
        });

        $('.js-zoom-out1').on('click', function() {
            scale -= 0.25;
            if (scale == 0) {
                scale = 0.25;
                zindex = 999;
            }
            $imgSegmento.trigger('transform');
        });
    </script>

    <script>
        var angle = 0;
        var zindex = 0;
        var scale = 1;
        var $imgTiplogia = $('#imageTipologia');

        $imgTiplogia.on('transform', function() {
            $imgTiplogia.css('transform', `rotate(${angle}deg) scale(${scale})`);
        });

        $('.js-rotate-right2').on('click', function() {
            angle += 15;
            $imgTiplogia.trigger('transform');
        });

        $('.js-rotate-left2').on('click', function() {
            angle -= 15;
            $imgTiplogia.trigger('transform');
        });

        $('.js-zoom-in2').on('click', function() {
            scale += 0.25;
            if (scale == 2.25) {
                scale = 4;
                zindex = 999;
            };
            $imgTiplogia.trigger('transform');
        });

        $('.js-zoom-out2').on('click', function() {
            scale -= 0.25;
            if (scale == 0) {
                scale = 0.25;
                zindex = 999;
            }
            $imgTiplogia.trigger('transform');
        });
    </script>
    <script>
        var angle = 0;
        var zindex = 0;
        var scale = 1;
        var $imgCenefa = $('#imageCenefa');

        $imgCenefa.on('transform', function() {
            $imgCenefa.css('transform', `rotate(${angle}deg) scale(${scale})`);
        });

        $('.js-rotate-right4').on('click', function() {
            angle += 15;
            $imgCenefa.trigger('transform');
        });

        $('.js-rotate-left4').on('click', function() {
            angle -= 15;
            $imgCenefa.trigger('transform');
        });

        $('.js-zoom-in4').on('click', function() {
            scale += 0.25;
            if (scale == 2.25) {
                scale = 4;
                zindex = 999;
            };
            $imgCenefa.trigger('transform');
        });

        $('.js-zoom-out4').on('click', function() {
            scale -= 0.25;
            if (scale == 0) {
                scale = 0.25;
                zindex = 999;
            }
            $imgCenefa.trigger('transform');
        });
    </script>

    <script>
        var angle = 0;
        var zindex = 0;
        var scale = 1;
        var $imgAfiche = $('#imageAfiche');

        $imgAfiche.on('transform', function() {
            $imgAfiche.css('transform', `rotate(${angle}deg) scale(${scale})`);
        });

        $('.js-rotate-right5').on('click', function() {
            angle += 15;
            $imgAfiche.trigger('transform');
        });

        $('.js-rotate-left5').on('click', function() {
            angle -= 15;
            $imgAfiche.trigger('transform');
        });

        $('.js-zoom-in5').on('click', function() {
            scale += 0.25;
            if (scale == 2.25) {
                scale = 4;
                zindex = 999;
            };
            $imgAfiche.trigger('transform');
        });

        $('.js-zoom-out5').on('click', function() {
            scale -= 0.25;
            if (scale == 0) {
                scale = 0.25;
                zindex = 999;
            }
            $imgAfiche.trigger('transform');
        });
    </script>

    <script>
        var angle = 0;
        var zindex = 0;
        var scale = 1;
        var $imgMarco = $('#imageMarco');

        $imgMarco.on('transform', function() {
            $imgMarco.css('transform', `rotate(${angle}deg) scale(${scale})`);
        });

        $('.js-rotate-right6').on('click', function() {
            angle += 15;
            $imgMarco.trigger('transform');
        });

        $('.js-rotate-left6').on('click', function() {
            angle -= 15;
            $imgMarco.trigger('transform');
        });

        $('.js-zoom-in6').on('click', function() {
            scale += 0.25;
            if (scale == 2.25) {
                scale = 4;
                zindex = 999;
            };
            $imgMarco.trigger('transform');
        });

        $('.js-zoom-out6').on('click', function() {
            scale -= 0.25;
            if (scale == 0) {
                scale = 0.25;
                zindex = 999;
            }
            $imgMarco.trigger('transform');
        });
    </script>

    <script>
        var angle = 0;
        var zindex = 0;
        var scale = 1;
        var $imgRompetrafico = $('#imageRompetrafico');

        $imgRompetrafico.on('transform', function() {
            $imgRompetrafico.css('transform', `rotate(${angle}deg) scale(${scale})`);
        });

        $('.js-rotate-right7').on('click', function() {
            angle += 15;
            $imgRompetrafico.trigger('transform');
        });

        $('.js-rotate-left7').on('click', function() {
            angle -= 15;
            $imgRompetrafico.trigger('transform');
        });

        $('.js-zoom-in7').on('click', function() {
            scale += 0.25;
            if (scale == 2.25) {
                scale = 4;
                zindex = 999;
            };
            $imgRompetrafico.trigger('transform');
        });

        $('.js-zoom-out7').on('click', function() {
            scale -= 0.25;
            if (scale == 0) {
                scale = 0.25;
                zindex = 999;
            }
            $imgRompetrafico.trigger('transform');
        });
    </script>



    <script>
        var angle = 0;
        var zindex = 0;
        var scale = 1;
        var $imgFaxada = $('#imageFaxada');

        $imgFaxada.on('transform', function() {
            $imgFaxada.css('transform', `rotate(${angle}deg) scale(${scale})`);
        });

        $('.js-rotate-right8').on('click', function() {
            angle += 15;
            $imgFaxada.trigger('transform');
        });

        $('.js-rotate-left8').on('click', function() {
            angle -= 15;
            $imgFaxada.trigger('transform');
        });

        $('.js-zoom-in8').on('click', function() {
            scale += 0.25;
            if (scale == 2.25) {
                scale = 4;
                zindex = 999;
            };
            $imgFaxada.trigger('transform');
        });

        $('.js-zoom-out8').on('click', function() {
            scale -= 0.25;
            if (scale == 0) {
                scale = 0.25;
                zindex = 999;
            }
            $imgFaxada.trigger('transform');
        });
    </script>
    <script>
        var angle = 0;
        var zindex = 0;
        var scale = 1;
        var $imgHielera = $('#imageHielera');

        $imgHielera.on('transform', function() {
            $imgHielera.css('transform', `rotate(${angle}deg) scale(${scale})`);
        });

        $('.js-rotate-right9').on('click', function() {
            angle += 15;
            $imgHielera.trigger('transform');
        });

        $('.js-rotate-left9').on('click', function() {
            angle -= 15;
            $imgHielera.trigger('transform');
        });

        $('.js-zoom-in9').on('click', function() {
            scale += 0.25;
            if (scale == 2.25) {
                scale = 4;
                zindex = 999;
            };
            $imgHielera.trigger('transform');
        });

        $('.js-zoom-out9').on('click', function() {
            scale -= 0.25;
            if (scale == 0) {
                scale = 0.25;
                zindex = 999;
            }
            $imgHielera.trigger('transform');
        });
    </script>

    <script>
        var angle = 0;
        var zindex = 0;
        var scale = 1;
        var $imgBases_h = $('#imageBase_h');

        $imgBases_h.on('transform', function() {
            $imgBases_h.css('transform', `rotate(${angle}deg) scale(${scale})`);
        });

        $('.js-rotate-right10').on('click', function() {
            angle += 15;
            $imgBases_h.trigger('transform');
        });

        $('.js-rotate-left10').on('click', function() {
            angle -= 15;
            $imgBases_h.trigger('transform');
        });

        $('.js-zoom-in10').on('click', function() {
            scale += 0.25;
            if (scale == 2.25) {
                scale = 4;
                zindex = 999;
            };
            $imgBases_h.trigger('transform');
        });

        $('.js-zoom-out10').on('click', function() {
            scale -= 0.25;
            if (scale == 0) {
                scale = 0.25;
                zindex = 999;
            }
            $imgBases_h.trigger('transform');
        });
    </script>
    <script>
        var angle = 0;
        var zindex = 0;
        var scale = 1;
        var $imgDosificadorD = $('#imageDosificadorD');

        $imgDosificadorD.on('transform', function() {
            $imgDosificadorD.css('transform', `rotate(${angle}deg) scale(${scale})`);
        });

        $('.js-rotate-right11').on('click', function() {
            angle += 15;
            $imgDosificadorD.trigger('transform');
        });

        $('.js-rotate-left11').on('click', function() {
            angle -= 15;
            $imgDosificadorD.trigger('transform');
        });

        $('.js-zoom-in11').on('click', function() {
            scale += 0.25;
            if (scale == 2.25) {
                scale = 4;
                zindex = 999;
            };
            $imgDosificadorD.trigger('transform');
        });

        $('.js-zoom-out11').on('click', function() {
            scale -= 0.25;
            if (scale == 0) {
                scale = 0.25;
                zindex = 999;
            }
            $imgDosificadorD.trigger('transform');
        });
    </script>
    <script>
        var angle = 0;
        var zindex = 0;
        var scale = 1;
        var $imgDosificadorS = $('#imageDosificadorS');

        $imgDosificadorS.on('transform', function() {
            $imgDosificadorS.css('transform', `rotate(${angle}deg) scale(${scale})`);
        });

        $('.js-rotate-right12').on('click', function() {
            angle += 15;
            $imgDosificadorS.trigger('transform');
        });

        $('.js-rotate-left12').on('click', function() {
            angle -= 15;
            $imgDosificadorS.trigger('transform');
        });

        $('.js-zoom-in12').on('click', function() {
            scale += 0.25;
            if (scale == 2.25) {
                scale = 4;
                zindex = 999;
            };
            $imgDosificadorS.trigger('transform');
        });

        $('.js-zoom-out12').on('click', function() {
            scale -= 0.25;
            if (scale == 0) {
                scale = 0.25;
                zindex = 999;
            }
            $imgDosificadorS.trigger('transform');
        });
    </script>
    <script>
        var angle = 0;
        var zindex = 0;
        var scale = 1;
        var $imgBranding = $('#imageBranding');

        $imgBranding.on('transform', function() {
            $imgBranding.css('transform', `rotate(${angle}deg) scale(${scale})`);
        });

        $('.js-rotate-right13').on('click', function() {
            angle += 15;
            $imgBranding.trigger('transform');
        });

        $('.js-rotate-left13').on('click', function() {
            angle -= 15;
            $imgBranding.trigger('transform');
        });

        $('.js-zoom-in13').on('click', function() {
            scale += 0.25;
            if (scale == 2.25) {
                scale = 4;
                zindex = 999;
            };
            $imgBranding.trigger('transform');
        });

        $('.js-zoom-out13').on('click', function() {
            scale -= 0.25;
            if (scale == 0) {
                scale = 0.25;
                zindex = 999;
            }
            $imgBranding.trigger('transform');
        });
    </script>

    <script>
        var angle = 0;
        var zindex = 0;
        var scale = 1;
        var $imgVasos = $('#imageVasos');

        $imgVasos.on('transform', function() {
            $imgVasos.css('transform', `rotate(${angle}deg) scale(${scale})`);
        });

        $('.js-rotate-right14').on('click', function() {
            angle += 15;
            $imgVasos.trigger('transform');
        });

        $('.js-rotate-left14').on('click', function() {
            angle -= 15;
            $imgVasos.trigger('transform');
        });

        $('.js-zoom-in14').on('click', function() {
            scale += 0.25;
            if (scale == 2.25) {
                scale = 4;
                zindex = 999;
            };
            $imgVasos.trigger('transform');
        });

        $('.js-zoom-out14').on('click', function() {
            scale -= 0.25;
            if (scale == 0) {
                scale = 0.25;
                zindex = 999;
            }
            $imgVasos.trigger('transform');
        });
    </script>




    <script>
        var angle = 0;
        var zindex = 0;
        var scale = 1;
        var $imgLinealDiageo = $('#imageLinealDiageo');

        $imgLinealDiageo.on('transform', function() {
            $imgLinealDiageo.css('transform', `rotate(${angle}deg) scale(${scale})`);
        });

        $('.js-rotate-right15').on('click', function() {
            angle += 15;
            $imgLinealDiageo.trigger('transform');
        });

        $('.js-rotate-left15').on('click', function() {
            angle -= 15;
            $imgLinealDiageo.trigger('transform');
        });

        $('.js-zoom-in15').on('click', function() {
            scale += 0.25;
            if (scale == 2.25) {
                scale = 4;
                zindex = 999;
            };
            $imgLinealDiageo.trigger('transform');
        });

        $('.js-zoom-out15').on('click', function() {
            scale -= 0.25;
            if (scale == 0) {
                scale = 0.25;
                zindex = 999;
            }
            $imgLinealDiageo.trigger('transform');
        });
    </script>



    <script>
        var angle = 0;
        var zindex = 0;
        var scale = 1;
        var $imgRones = $('#imageRones');

        $imgRones.on('transform', function() {
            $imgRones.css('transform', `rotate(${angle}deg) scale(${scale})`);
        });

        $('.js-rotate-right16').on('click', function() {
            angle += 15;
            $imgRones.trigger('transform');
        });

        $('.js-rotate-left16').on('click', function() {
            angle -= 15;
            $imgRones.trigger('transform');
        });

        $('.js-zoom-in16').on('click', function() {
            scale += 0.25;
            if (scale == 2.25) {
                scale = 4;
                zindex = 999;
            };
            $imgRones.trigger('transform');
        });

        $('.js-zoom-out16').on('click', function() {
            scale -= 0.25;
            if (scale == 0) {
                scale = 0.25;
                zindex = 999;
            }
            $imgRones.trigger('transform');
        });
    </script>

    <script>
        var angle = 0;
        var zindex = 0;
        var scale = 1;
        var $imgAguardiente = $('#imageAguardiente');

        $imgAguardiente.on('transform', function() {
            $imgAguardiente.css('transform', `rotate(${angle}deg) scale(${scale})`);
        });

        $('.js-rotate-right17').on('click', function() {
            angle += 15;
            $imgAguardiente.trigger('transform');
        });

        $('.js-rotate-left17').on('click', function() {
            angle -= 15;
            $imgAguardiente.trigger('transform');
        });

        $('.js-zoom-in17').on('click', function() {
            scale += 0.25;
            if (scale == 2.25) {
                scale = 4;
                zindex = 999;
            };
            $imgAguardiente.trigger('transform');
        });

        $('.js-zoom-out17').on('click', function() {
            scale -= 0.25;
            if (scale == 0) {
                scale = 0.25;
                zindex = 999;
            }
            $imgAguardiente.trigger('transform');
        });
    </script>


    <script>
        var angle = 0;
        var zindex = 0;
        var scale = 1;
        var $imgRonBlack = $('#imageRonBlack');

        $imgRonBlack.on('transform', function() {
            $imgRonBlack.css('transform', `rotate(${angle}deg) scale(${scale})`);
        });

        $('.js-rotate-right18').on('click', function() {
            angle += 15;
            $imgRonBlack.trigger('transform');
        });

        $('.js-rotate-left18').on('click', function() {
            angle -= 15;
            $imgRonBlack.trigger('transform');
        });

        $('.js-zoom-in18').on('click', function() {
            scale += 0.25;
            if (scale == 2.25) {
                scale = 4;
                zindex = 999;
            };
            $imgRonBlack.trigger('transform');
        });

        $('.js-zoom-out18').on('click', function() {
            scale -= 0.25;
            if (scale == 0) {
                scale = 0.25;
                zindex = 999;
            }
            $imgRonBlack.trigger('transform');
        });
    </script>

    <script>
        var angle = 0;
        var zindex = 0;
        var scale = 1;
        var $imgJhonnie = $('#imageJhonnie');

        $imgJhonnie.on('transform', function() {
            $imgJhonnie.css('transform', `rotate(${angle}deg) scale(${scale})`);
        });

        $('.js-rotate-right19').on('click', function() {
            angle += 15;
            $imgJhonnie.trigger('transform');
        });

        $('.js-rotate-left19').on('click', function() {
            angle -= 15;
            $imgJhonnie.trigger('transform');
        });

        $('.js-zoom-in19').on('click', function() {
            scale += 0.25;
            if (scale == 2.25) {
                scale = 4;
                zindex = 999;
            };
            $imgJhonnie.trigger('transform');
        });

        $('.js-zoom-out19').on('click', function() {
            scale -= 0.25;
            if (scale == 0) {
                scale = 0.25;
                zindex = 999;
            }
            $imgJhonnie.trigger('transform');
        });
    </script>

    <script>
        var angle = 0;
        var zindex = 0;
        var scale = 1;
        var $imgSmirnoff = $('#imageSmirnoff');

        $imgSmirnoff.on('transform', function() {
            $imgSmirnoff.css('transform', `rotate(${angle}deg) scale(${scale})`);
        });

        $('.js-rotate-right20').on('click', function() {
            angle += 15;
            $imgSmirnoff.trigger('transform');
        });

        $('.js-rotate-left20').on('click', function() {
            angle -= 15;
            $imgSmirnoff.trigger('transform');
        });

        $('.js-zoom-in20').on('click', function() {
            scale += 0.25;
            if (scale == 2.25) {
                scale = 4;
                zindex = 999;
            };
            $imgSmirnoff.trigger('transform');
        });

        $('.js-zoom-out20').on('click', function() {
            scale -= 0.25;
            if (scale == 0) {
                scale = 0.25;
                zindex = 999;
            }
            $imgSmirnoff.trigger('transform');
        });
    </script>

    <script>
        var angle = 0;
        var zindex = 0;
        var scale = 1;
        var $imgGift = $('#imageGift');

        $imgGift.on('transform', function() {
            $imgGift.css('transform', `rotate(${angle}deg) scale(${scale})`);
        });

        $('.js-rotate-right21').on('click', function() {
            angle += 15;
            $imgGift.trigger('transform');
        });

        $('.js-rotate-left21').on('click', function() {
            angle -= 15;
            $imgGift.trigger('transform');
        });

        $('.js-zoom-in21').on('click', function() {
            scale += 0.25;
            if (scale == 2.25) {
                scale = 4;
                zindex = 999;
            };
            $imgGift.trigger('transform');
        });

        $('.js-zoom-out21').on('click', function() {
            scale -= 0.25;
            if (scale == 0) {
                scale = 0.25;
                zindex = 999;
            }
            $imgGift.trigger('transform');
        });
    </script>



@stop
