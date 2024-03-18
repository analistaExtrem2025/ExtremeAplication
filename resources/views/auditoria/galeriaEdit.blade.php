@extends('adminlte::page')
@section('title', 'Validación de Calidad')
@section('css')
    <link href="{{ asset('css/galeria.css') }}" rel="stylesheet">
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

    <input type="hidden" name="star" value="{{ $star }}">
    <input type="hidden" name="precarga_id" value="{{ $reporte->precarga_id }}">
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
        <input type="hidden" name="id" value="{{ $reporte->id }}">
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
                            <select name="segmento" id="segmento" class="form-control selectpicker selector"
                                data-style="btn-primary" title="Seleccionar segmento" required disabled>
                                <option disabled value="old{'segmento'}" checked>Seleccione una opción </option>
                                @foreach ($segmento as $seg)
                                    <option value="{{ $seg }}">{{ $seg }}</option>
                                @endforeach
                            </select>
                            @include('errors.errors', ['field' => 'segmento'])
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
                            <h6 class="cantidadesLabel" style=" margin: auto; padding:1rem">Ajuste las cantidades
                                necesarias</h6>
                            <input type="text" name="caja_cerveza" class="cantidades"
                                value="{{ old('caja_cerveza', $reporte->caja_cerveza) }}"
                                style="width: 55px;  border-radius: 0.75rem;  text-align: center;">
                            <input type="text" name="caja_aguardiente" class="cantidades"
                                value="{{ old('caja_aguardiente', $reporte->caja_aguardiente) }}"
                                style="width: 55px;  border-radius: 0.75rem;  text-align: center;">
                            <input type="text" name="caja_ron" class="cantidades"
                                value="{{ old('caja_ron', $reporte->caja_ron) }}"
                                style="width: 55px;  border-radius: 0.75rem;  text-align: center;">
                            <input type="text" name="caja_whiskey" class="cantidades"
                                value="{{ old('caja_whiskey', $reporte->caja_whiskey) }}"
                                style="width: 55px;  border-radius: 0.75rem;  text-align: center;">
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
                            <input class="noClass" type="text" id="inpSegmento" name="Calsegmento" required>
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
                            <div class="name"> Tipologia<br> no <br>coincide</div>
                            <div class="name1">Tipologia <br>coincide</div>
                        </div>
                        <br>
                        <div style="display: none" id="EditTipologia">
                            <hr>

                            <select name="tipologia" id="tipologia" class="form-control selectpicker selector"
                                onchange="editor()" data-style="btn-primary" title="Seleccionar tipologia" required
                                disabled>
                                <option disabled selected value="--" required>Seleccione la tipologia correcta
                                </option>
                                @foreach ($tipologia as $tip)
                                    <option value="{{ $tip }}">{{ $tip }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input" id="divOtroCual" style="display: none">
                            {!! Form::label('¿Cual?') !!}

                            <select name="OtraTipologia" class="form-control textar" id="cual" required disabled>
                                <option value="" disabled selected>Seleccione una opción</option>
                                @foreach ($otros as $otro)
                                    <option value="{{ $otro }}">{{ $otro }}</option>
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
                            <input class="noClass" type="text" id="inpTipologia" name="Caltipologia" required>
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
                        <div class="col card-box-xxl">
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
                                    <select name="cenefa_visi" id="cenefa_visi"
                                        class="form-control selectpicker selector" data-style="btn-primary"
                                        title="Seleccionar visibilidad cenefa" required disabled>
                                        <option disabled value="old{'cenefa_visi'}" checked>Seleccione una opción </option>
                                        @foreach ($cenefa_visi as $cenVis)
                                            <option value="{{ $cenVis }}">{{ $cenVis }}</option>
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
                                    <select name="cenefa_colo" id="cenefa_colo"
                                        class="form-control selectpicker selector " data-style="btn-primary"
                                        title="Seleccionar colocación cenefa" required disabled>
                                        <option disabled value="old{'cenefa_colo'}" checked>Seleccione una opción </option>
                                        @foreach ($cenefa_colo as $cenCol)
                                            <option value="{{ $cenCol }}">{{ $cenCol }}</option>
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
                                <input class="noClass" type="text" id="inpCenefaVisi" name="CalCenefaVisi" required>
                                <input class="noClass" type="text" id="inpCenefaColo" name="CalCenefaColo" required>
                            </nat>
                        </div>
                        @include('errors.errors', ['field' => 'cenefa_visi'])
                        @include('errors.errors', ['field' => 'cenefa_colo'])
                        <div class="col-8">
                            <img id="imageCenefa"
                                src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/Cenefa_' . $reporte->precarga_id . '.png'))) }}" />

                        </div>
                    </div>
                </ul>
            @else
                <ul>
                    <span>Según la auditoria no hay cenefa</span>
                    <br><br>

                    <!-- Button trigger modal -->
                    <button type="button" class="btnMat" data-toggle="modal" data-target="#cenefaModal"
                        onclick="seeCenefa()">
                        Modificar presencia del material
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="cenefaModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="ttulo">
                                        <green><span>Confirme si hay cenefa</span></green>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="col">
                                            <div class="col">
                                                <img class="img_cenefa" src="{{ asset('/storage/cenefa.png') }}" />
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="checkbox" class="custom-control-input" checked>
                                                    <input type="hidden" name="cenefa" id="cenefa"
                                                        value="cenefa_si" disabled>
                                                    <label class="custom-control-label" for="cenefa_si">Si hay
                                                        cenefa</label>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <CENTER>
                                                    <h4>LA CENEFA ES VISIBLE?</h4>
                                                </CENTER>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="cenefa_visi"
                                                        id="cenefa_visi_si" value="cenefa_visi_si" disabled>
                                                    <label class="form-check-label" for="cenefa_visi_si">SI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="cenefa_visi"
                                                        id="cenefa_visi_no" value="cenefa_visi_no" disabled>
                                                    <label class="form-check-label" for="cenefa_visi_no">NO</label>
                                                </div>
                                            </div>


                                            <div class="container">
                                                <CENTER>
                                                    <h4>LA CENEFA ESTA BIEN COLOCADA?</h4>
                                                </CENTER>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="cenefa_colo"
                                                        id="cenefa_colo_si" value="cenefa_colo_si" disabled>
                                                    <label class="form-check-label" for="cenefa_colo_si">SI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="cenefa_colo"
                                                        id="cenefa_colo_no" value="cenefa_colo_no" disabled>
                                                    <label class="form-check-label" for="cenefa_colo_no">NO</label>
                                                </div>
                                            </div>

                                            <div id="divCenefa_Img" style="display: block">
                                                <div class="row" style="text-align: center">
                                                    <div class="col">
                                                        <br><br>
                                                        <hr>
                                                        <green> <span>Tome foto del cenefa</span></green>
                                                        <input type="file" id="seleccionCenefa" name="seleccionCenefa"
                                                            accept="image/*" required disabled>
                                                        <img class="card-img-mate" id="imagenCenefa">
                                                        <br><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Continuar</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <img id="imageNoDisponible" src="{{ asset('img/no_diponible.png') }}" />
                </ul>
            @endif
            <hr>
            {{--  <!-- Afiche 2-->  --}}
            @if ($reporte->afiche == 'afiche_si')
                <ul>
                    <div class="row">
                        <div class="col card-box-extraxl" id="cardAfiche">
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
                                @else
                                    <p class="refe">El afiche no se combotizó.
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
                                    <select name="afiche_visi" id="afiche_visi"
                                        class="form-control selectpicker selector" data-style="btn-primary"
                                        title="Seleccionar visibiliad afiche" required disabled>
                                        <option disabled value="old{'afiche_visi'}" checked>Seleccione una opción </option>
                                        @foreach ($afiche_visi as $afivisi)
                                            <option value="{{ $afivisi }}">{{ $afivisi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
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
                                    <select name="afiche_colo" id="afiche_colo"
                                        class="form-control selectpicker selector" data-style="btn-primary"
                                        title="Seleccionar colocación afiche" required disabled>
                                        <option disabled value="old{'afiche_colo'}" checked>Seleccione una opción </option>
                                        @foreach ($aficheColo as $afiColo)
                                            <option value="{{ $afiColo }}">{{ $afiColo }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <br>
                            </div>
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


                            <nat class="bt-menu">
                                <ul>
                                    <li class="bt_li"><button type="button" class="botOn js-zoom-in5"><i
                                                class="fas fa-plus" alt="acercar"></i></button></li>
                                    <li class="bt_li"><button type="button" class="botOn js-zoom-out5"><i
                                                class="fas fa-minus" alt="alejar"></i></button></li>
                                    <li class="bt_li"><button type="button" class="botOn js-rotate-right5"><i
                                                class="fas fa-redo" alt="giro derecha"></i></button></li>
                                    <li class="bt_li"><button type="button" class="botOn js-rotate-left5"><i
                                                class="fas fa-undo" alt="giro izquierda"></i></button></li>
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
                                <ul>
                                    <div style="display: none" id="EditAficheCombotizado" class="bt-sub-menu">
                                        <hr>
                                        <select name="aficheCombotizado" id="afiche_combo"
                                            class="form-control selectpicker selector" data-style="btn-primary"
                                            title="Seleccionar combotizacion afiche" required disabled>
                                            <option disabled value="old{'aficheCombotizado'}" checked>Seleccione una opción
                                            </option>
                                            @foreach ($aficheCombotizado as $afiCombo)
                                                <option value="{{ $afiCombo }}">{{ $afiCombo }}</option>
                                            @endforeach
                                        </select>
                                        <hr>
                                        <select name="marca_combo" id="marca_combo"
                                            class="form-control selectpicker selector" data-style="btn-primary"
                                            title="Seleccionar marca con la que se combotizo" required disabled>
                                            <option disabled value="old{'marca_combo'}" checked>Seleccione una opción
                                            </option>
                                            @foreach ($marca_combo as $diageoM)
                                                <option value="{{ $diageoM }}">{{ $diageoM }}</option>
                                            @endforeach
                                        </select>
                                        <hr>
                                        <select name="combox1" id="combox1" class="form-control selectpicker selector"
                                            data-style="btn-primary" title="Seleccionar combotizacion afiche" required
                                            disabled>
                                            <option disabled value="old{'combox1'}" checked>Seleccione una opción </option>
                                            @foreach ($Combox1 as $x1)
                                                <option value="{{ $x1 }}">{{ $x1 }}</option>
                                            @endforeach
                                        </select>
                                        <hr>
                                        <select name="combox2" id="combox2" class="form-control selectpicker selector"
                                            data-style="btn-primary" title="Seleccionar combotizacion afiche" required
                                            disabled>
                                            <option disabled value="old{'combox2'}" checked>Seleccione una opción </option>
                                            @foreach ($Combox2 as $x2)
                                                <option value="{{ $x2 }}">{{ $x2 }}</option>
                                            @endforeach
                                        </select>
                                        <hr>
                                        <select name="combox3" id="combox3" class="form-control selectpicker selector"
                                            data-style="btn-primary" title="Seleccionar combotizacion afiche" required
                                            disabled>
                                            <option disabled value="old{'combox3'}" checked>Seleccione una opción </option>
                                            @foreach ($Combox3 as $x3)
                                                <option value="{{ $x3 }}">{{ $x3 }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <br>
                                    </div>
                                </ul>

                                <input type="hidden" name="stateAfiche" value="{{ $reporte->afiche }}">
                                <input type="hidden" name="aficheCombo" value="{{ $reporte->aficheCombotizado }}">
                                <input class="noClass" type="text" id="inpAficheVisi" name="CalaficheVis" required>
                                <input class="noClass" type="text" id="inpAficheColo" name="CalaficheColo" required>
                                <input class="noClass" type="text" id="inpAficheCombo" name="CalaficheCombo"
                                    required>
                            </nat>
                        </div>
                        <div class="col-8">
                            <img id="imageAfiche"
                                src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/Afiche_' . $reporte->precarga_id . '.png'))) }}" />


                        </div>

                </ul>
            @else
                <ul>
                    <span>Según la auditoria no hay afiche</span>
                    <br><br>

                    <!-- Button trigger modal -->
                    <button type="button" class="btnMat" data-toggle="modal" data-target="#aficheModal"
                        onclick="seeAfiche()">
                        Modificar presencia del material
                    </button>
                    <div class="modal fade" id="aficheModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="ttulo">
                                        <green><span>Confirme si hay afiche</span></green>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="col">
                                            <div class="col">
                                                <img class="img_afiche" src="{{ asset('/storage/afiche.png') }}" />

                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="checkbox" class="custom-control-input" checked>

                                                    <input type="hidden" name="afiche" id="afiche"
                                                        value="afiche_si" disabled>
                                                    <label class="custom-control-label" for="afiche_si">Si hay
                                                        afiche</label>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <CENTER>
                                                    <h4>EL AFICHE ES VISIBLE?</h4>
                                                </CENTER>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="afiche_visi"
                                                        id="afiche_visi_si" value="afiche_visi_si" disabled>
                                                    <label class="form-check-label" for="afiche_visi_si">SI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="afiche_visi"
                                                        id="afiche_visi_no" value="afiche_visi_no" disabled>
                                                    <label class="form-check-label" for="afiche_visi_no">NO</label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="container">
                                                <CENTER>
                                                    <h4>EL AFICHE ESTA BIEN COLOCADO?</h4>
                                                </CENTER>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="afiche_colo"
                                                        id="afiche_colo_si" value="afiche_colo_si" disabled>
                                                    <label class="form-check-label" for="afiche_colo_si">SI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="afiche_colo"
                                                        id="afiche_colo_no" value="afiche_colo_no" disabled>
                                                    <label class="form-check-label" for="afiche_colo_no">NO</label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="container">
                                                <CENTER>
                                                    <h4>&iquest;Esta diligenciado con información de
                                                        combotización?</h4>
                                                </CENTER>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="aficheCombotizado" id="afiche_combo_si"
                                                        value="afiche_combo_si" disabled>
                                                    <label class="form-check-label" for="afiche_combo_si">SI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="aficheCombotizado" id="afiche_combo_no"
                                                        value="afiche_combo_no" disabled>
                                                    <label class="form-check-label" for="afiche_combo_no">NO</label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="container">
                                                <center>
                                                    <h4> CON QUE MARCA FUE COMBOTIZADO</h4>
                                                </center>
                                                <div>
                                                    <select name="marca_combo" id="marca_combo" class="form-control"
                                                        disabled>
                                                        <option value=" " disabled selected>Seleccione una marca
                                                        </option>
                                                        @foreach ($diageoMarca as $marca)
                                                            <option value="{{ $marca }}">{{ $marca }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="container">
                                            <CENTER>
                                                <h4>Diageo + otro producto</h4>
                                            </CENTER>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="combox1"
                                                    id="combox1_si" value="combox1_si" disabled>
                                                <label class="form-check-label" for="combox1_si">SI</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="combox1"
                                                    id="combox1_no" value="combox1_no" disabled>
                                                <label class="form-check-label" for="combox1_no">NO</label>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="container">
                                            <CENTER>
                                                <h4>Diageo indicando precio</h4>
                                            </CENTER>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="combox2"
                                                    id="combox2_si" value="combox2_si" disabled>
                                                <label class="form-check-label" for="combox2_si">SI</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="combox2"
                                                    id="combox2_no" value="combox2_no" disabled>
                                                <label class="form-check-label" for="combox2_no">NO</label>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="container">
                                            <CENTER>
                                                <h4>Diageo + gift</h4>
                                            </CENTER>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="combox3"
                                                    id="combox3_si" value="combox3_si" disabled>
                                                <label class="form-check-label" for="combox3_si">SI</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="combox3"
                                                    id="combox3_no" value="combox3_no" disabled>
                                                <label class="form-check-label" for="combox3_no">NO</label>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <br>
                                    <div class="row" style="text-align: center">
                                        <div class="col">
                                            <green> <span>Tome foto del afiche </span></green>
                                            <input type="file" id="seleccionAfiche" name="seleccionAfiche"
                                                accept="image/*" required disabled>
                                            <img class="card-img-mate" id="imagenAfiche">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Continuar</button>
                            </div>
                        </div>
                    </div>
                    <img id="imageNoDisponible" src="{{ asset('img/no_diponible.png') }}" />
                </ul>
            @endif
            <hr>
            {{--  <!-- marco  -->  --}}
            @if ($reporte->marco == 'marco_si')
                <ul>
                    <div class="row">
                        <div class="col card-box-xxl">
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
                                    <div class="name">Audito<br>mal la<br>visibiliad</div>
                                    <div class="name1">Audito<br>bien la<br>visibiliad</div>
                                </div>
                                <br>
                                <div style="display: none" id="EditMarcoVisi">
                                    <hr>
                                    <select name="marco_visi" id="marco_visi" class="form-control selectpicker selector"
                                        data-style="btn-primary" title="Seleccionar visibilidad del marco" required
                                        disabled>
                                        <option disabled value="old{'marco_visi'}" checked>Seleccione una opción </option>
                                        @foreach ($marco_visi as $marVis)
                                            <option value="{{ $marVis }}">{{ $marVis }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <br>
                                <div class="toggle-wrapper">
                                    <div class="toggle checkcross10">
                                        <input id="checkcross10" type="checkbox" style="display: none">
                                        <label class="toggle-item" for="checkcross10">
                                            <div class="check"></div>
                                        </label>
                                    </div>
                                    <div class="name">Audito<br>mal la<br>colocación</div>
                                    <div class="name1">Audito<br>bien la<br>colocación</div>
                                </div>
                                <br>
                                <div style="display: none" id="EditMarcoColo">
                                    <hr>
                                    <select name="marco_colo" id="marco_colo" class="form-control selectpicker selector"
                                        data-style="btn-primary" title="Seleccionar colocación marco" required disabled>
                                        <option disabled value="old{'marco_colo'}" checked>Seleccione una opción </option>
                                        @foreach ($marco_colo as $marCol)
                                            <option value="{{ $marCol }}">{{ $marCol }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <br>
                            </div>
                            <nat class="bt-menu">
                                <ul>
                                    <li class="bt_li"><button type="button" class="botOn js-zoom-in6"><i
                                                class="fas fa-plus" alt="acercar"></i></button></li>
                                    <li class="bt_li"><button type="button" class="botOn js-zoom-out6"><i
                                                class="fas fa-minus" alt="alejar"></i></button></li>
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
                                <input class="noClass" type="text" id="inpMarcoVisi" name="CalmarcoVisi" required>
                                <input class="noClass" type="text" id="inpMarcoColo" name="CalmarcoColo" required>
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
                    <span>Según la auditoria no hay marco</span>
                    <br><br>


                    <!-- Button trigger modal -->
                    <button type="button" class="btnMat" data-toggle="modal" data-target="#marcoModal"
                        onclick="seeMarco()">
                        Modificar presencia del material
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="marcoModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="ttulo">
                                        <green><span>Confirme si hay marco</span></green>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="col">
                                            <div class="col">
                                                <img class="img_cenefa" src="{{ asset('/storage/marco.png') }}" />
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="checkbox" class="custom-control-input" checked>
                                                    <input type="hidden" name="marco" id="marco" value="marco_si"
                                                        disabled>
                                                    <label class="custom-control-label" for="marco_si">Si hay
                                                        marco</label>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <CENTER>
                                                    <h4>EL MARCO ES VISIBLE?</h4>
                                                </CENTER>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="marco_visi"
                                                        id="marco_visi_si" value="marco_visi_si" disabled>
                                                    <label class="form-check-label" for="marco_visi_si">SI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="marco_visi"
                                                        id="marco_visi_no" value="marco_visi_no" disabled>
                                                    <label class="form-check-label" for="marco_visi_no">NO</label>
                                                </div>
                                            </div>


                                            <div class="container">
                                                <CENTER>
                                                    <h4>EL MARCO ESTA BIEN COLOCADO?</h4>
                                                </CENTER>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="marco_colo"
                                                        id="marco_colo_si" value="marco_colo_si" disabled>
                                                    <label class="form-check-label" for="marco_colo_si">SI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="marco_colo"
                                                        id="marco_colo_no" value="marco_colo_no" disabled>
                                                    <label class="form-check-label" for="marco_colo_no">NO</label>
                                                </div>
                                            </div>

                                            <div id="divMarco_Img" style="display: none">
                                                <div class="row" style="text-align: center">
                                                    <div class="col">
                                                        <br><br>
                                                        <hr>
                                                        <green> <span>Tome foto del marco </span></green>
                                                        <input type="file" id="seleccionMarco" name="seleccionMarco"
                                                            accept="image/*" required disabled>
                                                        <img class="card-img-mate" id="imagenMarco">
                                                        <br><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Continuar</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <img id="imageNoDisponible" src="{{ asset('img/no_diponible.png') }}" />
                </ul>
            @endif
            <hr>
            {{--  <!-- rompetraficos -->  --}}
            @if ($reporte->rompetraficos == 'rompetraficos_si')
                <ul>
                    <div class="row">
                        <div class="col card-box-xxl">
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
                                    <div class="name">Audito<br>mal la<br>visibiliad</div>
                                    <div class="name1">Audito<br>bien la<br>visibiliad</div>
                                </div>
                                <br>
                                <div style="display: none" id="EditRompeVisi">
                                    <hr>
                                    <select name="prod_rt_visibles" id="rompe_visi"
                                        class="form-control selectpicker selector" data-style="btn-primary"
                                        title="Seleccionar visibilidad rompetrafico" required disabled>
                                        <option disabled value="old{'prod_rt_visibles'}" checked>Seleccione una opción
                                        </option>
                                        @foreach ($rompe_visi as $romVis)
                                            <option value="{{ $romVis }}">{{ $romVis }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <br>
                                <div class="toggle-wrapper">
                                    <div class="toggle checkcross12">
                                        <input id="checkcross12" type="checkbox" style="display: none">
                                        <label class="toggle-item" for="checkcross12">
                                            <div class="check"></div>
                                        </label>
                                    </div>
                                    <div class="name">Audito<br>mal la<br>colocación</div>
                                    <div class="name1">Audito<br>bien la<br>colocación</div>
                                </div>
                                <br>
                                <div style="display: none" id="EditRompeColo">
                                    <hr>
                                    <select name="prod_rt_properly" id="rompe_colo"
                                        class="form-control selectpicker selector" data-style="btn-primary"
                                        title="Seleccionar colocación rompetrafico" required disabled>
                                        <option disabled value="old{'prod_rt_properly'}" checked>Seleccione una opción
                                        </option>
                                        @foreach ($rompe_colo as $marCol)
                                            <option value="{{ $marCol }}">{{ $marCol }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <br>
                            </div>

                            <nat class="bt-menu">
                                <ul>
                                    <li class="bt_li"><button type="button" class="botOn js-zoom-in7"><i
                                                class="fas fa-plus" alt="acercar"></i></button></li>
                                    <li class="bt_li"><button type="button" class="botOn js-zoom-out7"><i
                                                class="fas fa-minus" alt="alejar"></i></button></li>
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
                                <input class="noClass" type="text" id="inpRompeColo" name="CalrompeColo" required>
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
                    <span>Según la auditoria no hay rompetrafico</span>
                    <br><br>

                    <!-- Button trigger modal -->
                    <button type="button" class="btnMat" data-toggle="modal" data-target="#rompetraficoModal"
                        onclick="seeRompetrafico()">
                        Modificar presencia del material
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="rompetraficoModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="ttulo">
                                        <green><span>Confirme si hay rompetrafico</span></green>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="col">
                                            <div class="col">
                                                <img class="img_rompetrafico"
                                                    src="{{ asset('/storage/rompetraficos.png') }}" />
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="checkbox" class="custom-control-input" checked>
                                                    <input type="hidden" name="rompetraficos" id="rompetraficos"
                                                        value="rompetraficos_si" disabled>
                                                    <label class="custom-control-label" for="rompetraficos_si">Si hay
                                                        rompetraficos</label>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <CENTER>
                                                    <h4>EL ROMPETRAFICO ES VISIBLE?</h4>
                                                </CENTER>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="prod_rt_visibles" id="prod_rt_visibles_si"
                                                        value="prod_rt_visibles_si" disabled>
                                                    <label class="form-check-label" for="prod_rt_visibles_si">SI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="prod_rt_visibles" id="prod_rt_visibles_no"
                                                        value="prod_rt_visibles_no" disabled>
                                                    <label class="form-check-label" for="prod_rt_visibles_no">NO</label>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <CENTER>
                                                    <h4>LOS ROMPETRAFICOS ESTAN COLOCADOS CORRECTAMENTE, ATORNILLADO Y/O
                                                        PEGADOS?</h4>
                                                </CENTER>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="prod_rt_properly" id="prod_rt_properly_si"
                                                        value="prod_rt_properly_si" disabled>
                                                    <label class="form-check-label" for="prod_rt_properly_si">SI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="prod_rt_properly" id="prod_rt_properly_no"
                                                        value="prod_rt_properly_no" disabled>
                                                    <label class="form-check-label" for="prod_rt_properly_no">NO</label>
                                                </div>
                                            </div>
                                            <div id="divRompetrafico_Img" style="display: none">
                                                <div class="row" style="text-align: center">
                                                    <div class="col">
                                                        <br><br>
                                                        <hr>
                                                        <green> <span>Tome foto del rompetrafico </span></green>
                                                        <input type="file" id="seleccionRompetrafico"
                                                            name="seleccionRompetrafico" accept="image/*" required
                                                            disabled>
                                                        <img class="card-img-mate" id="imagenRompetrafico">
                                                        <br><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Continuar</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                    <div class="name">Audito<br>mal la<br>visibiliad</div>
                                    <div class="name1">Audito<br>bien la<br>visibiliad</div>
                                </div>
                                <br>
                                <div style="display: none" id="EditFaxadaVisi">
                                    <hr>
                                    <select name="fachadas_visi" id="fachadas_visi"
                                        class="form-control selectpicker selector" data-style="btn-primary"
                                        title="Seleccionar visibilidad fachada y avisos" required disabled>
                                        <option disabled value="old{'fachadas_visi'}" checked>Seleccione una opción
                                        </option>
                                        @foreach ($fachadas_visi as $fachVis)
                                            <option value="{{ $fachVis }}">{{ $fachVis }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <br>
                                <div class="toggle-wrapper">
                                    <div class="toggle checkcross14">
                                        <input id="checkcross14" type="checkbox" style="display: none">
                                        <label class="toggle-item" for="checkcross14">
                                            <div class="check"></div>
                                        </label>
                                    </div>
                                    <div class="name">Audito<br>mal el<br>estado</div>
                                    <div class="name1">Audito<br>bien el<br>estado</div>
                                </div>
                                <br>
                                <div style="display: none" id="EditFaxadaColo">
                                    <hr>
                                    <select name="fachadas_colo" id="fachadas_colo"
                                        class="form-control selectpicker selector" data-style="btn-primary"
                                        title="Seleccionar colocación fachada y avisos" required disabled>
                                        <option disabled value="old{'fachadas_colo'}" checked>Seleccione una opción
                                        </option>
                                        @foreach ($fachadas_colo as $fachCol)
                                            <option value="{{ $fachCol }}">{{ $fachCol }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <br>
                            </div>
                            <nat class="bt-menu">
                                <ul>
                                    <li class="bt_li"><button type="button" class="botOn js-zoom-in8"><i
                                                class="fas fa-plus" alt="acercar"></i></button></li>
                                    <li class="bt_li"><button type="button" class="botOn js-zoom-out8"><i
                                                class="fas fa-minus" alt="alejar"></i></button></li>
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
                                <input class="noClass" type="text" id="inpFaxadaVisi" name="CalfaxadaVisi"
                                    required>
                                <input class="noClass" type="text" id="inpAFaxadaEstado" name="CalfaxadaEstado"
                                    required>
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
                    <span>Según la auditoria no hay fachada con la marca ni avisos</span>

                    <br><br>
                    <!-- Button trigger modal -->
                    <button type="button" class="btnMat" data-toggle="modal" data-target="#faxadaModal"
                        onclick="seeFaxada()">
                        Modificar presencia del material
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="faxadaModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="ttulo">
                                        <green><span>Confirme si hay fachadas y avisos</span></green>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="col">
                                            <div class="col">
                                                <img class="img_fachada" src="{{ asset('/storage/fachada.png') }}" />
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="checkbox" class="custom-control-input" checked>
                                                    <input type="hidden" name="fachadas" id="fachadas"
                                                        value="fachadas_si" disabled>
                                                    <label class="custom-control-label" for="fachadas_si">Si hay
                                                        fachadas y avisos</label>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <CENTER>
                                                    <h4>LAS FACHADAS Y AVISOS SON VISIBLES?</h4>
                                                </CENTER>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="fachadas_visi" id="fachadas_visi_si"
                                                        value="fachadas_visi_si" disabled>
                                                    <label class="form-check-label" for="fachadas_visi_si">SI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="fachadas_visi" id="fachadas_visi_no"
                                                        value="fachadas_visi_no" disabled>
                                                    <label class="form-check-label" for="fachadas_visi_no">NO</label>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <CENTER>
                                                    <h4>LAS FACHADAS Y AVISOS ESTAN EN BUEN ESTADO? SIN RAYADURAS, STIKERS,
                                                        NO ESTAN SUCIOS NI DESGASTADOS? </h4>
                                                </CENTER>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="fachadas_colo" id="fachadas_colo_si"
                                                        value="fachadas_colo_si" disabled>
                                                    <label class="form-check-label" for="fachadas_colo_si">SI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="fachadas_colo" id="fachadas_colo_no"
                                                        value="fachadas_colo_no" disabled>
                                                    <label class="form-check-label" for="fachadas_colo_no">NO</label>
                                                </div>
                                            </div>
                                            <div id="divFachada_Img" style="display: none">
                                                <div class="row" style="text-align: center">
                                                    <div class="col">
                                                        <br><br>
                                                        <hr>
                                                        <green> <span>Tome foto del rompetrafico </span></green>
                                                        <input type="file" id="seleccionFaxada"
                                                            name="seleccionFaxada" accept="image/*" required disabled>
                                                        <img class="card-img-mate" id="imagenFaxada">
                                                        <br><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Continuar</button>
                                </div>
                            </div>
                        </div>
                    </div>


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
                                    <div class="name">Audito <br>mal el <br>contenido de las <br>hieleras</div>
                                    <div class="name1">Audito <br>bien el <br>contenido de las <br>hieleras</div>
                                </div>
                                <br>
                                <div style="display: none" id="EditHieleraProd">
                                    <hr>
                                    <select name="hl_con_prod" id="hielera_prod"
                                        class="form-control selectpicker selector" data-style="btn-primary"
                                        title="Seleccionar hay producto en la hielera" required disabled>
                                        <option disabled value="old{'hl_con_prod'}" checked>Seleccione una opción
                                        </option>
                                        @foreach ($hielera_prod as $hieprod)
                                            <option value="{{ $hieprod }}">{{ $hieprod }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <br>
                                <div class="toggle-wrapper">
                                    <div class="toggle checkcross16">
                                        <input id="checkcross16" type="checkbox" style="display: none">
                                        <label class="toggle-item" for="checkcross16">
                                            <div class="check"></div>
                                        </label>
                                    </div>
                                    <div class="name">Audito <br>mal la <br>visibilidad de las <br>hieleras</div>
                                    <div class="name1">Audito <br>bien la <br>visibilidad de las <br>hieleras</div>
                                </div>
                                <br>
                                <div style="display: none" id="EditHieleraVisi">
                                    <hr>
                                    <select name="prod_hl_visible" id="hielera_visi"
                                        class="form-control selectpicker selector" data-style="btn-primary"
                                        title="Seleccionar hielera es visible" required disabled>
                                        <option disabled value="old{'prod_hl_visible'}" checked>Seleccione una opción
                                        </option>
                                        @foreach ($hielera_visi as $hievisi)
                                            <option value="{{ $hievisi }}">{{ $hievisi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <br>
                                <div class="toggle-wrapper">
                                    <div class="toggle checkcross17">
                                        <input id="checkcross17" type="checkbox" style="display: none">
                                        <label class="toggle-item" for="checkcross17">
                                            <div class="check"></div>
                                        </label>
                                    </div>
                                    <div class="name"> Audito <br>mal el <br>estado de las <br>hieleras</div>
                                    <div class="name1"> Audito <br>bien el <br>estado de las <br>hieleras</div>
                                </div>
                                <br>
                                <div style="display: none" id="EditHieleraEstado">
                                    <hr>
                                    <select name="prod_hl_danadas" id="hielera_esta"
                                        class="form-control selectpicker selector" data-style="btn-primary"
                                        title="Seleccionar estado de la hielera" required disabled>
                                        <option disabled value="old{'prod_hl_danadas'}" checked>Seleccione una opción
                                        </option>
                                        @foreach ($hielera_esta as $hieesta)
                                            <option value="{{ $hieesta }}">{{ $hieesta }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <br>


                            </div>
                            <nat class="bt-menu">
                                <ul>
                                    <li class="bt_li"><button type="button" class="botOn js-zoom-in9"><i
                                                class="fas fa-plus" alt="acercar"></i></button></li>
                                    <li class="bt_li"><button type="button" class="botOn js-zoom-out9"><i
                                                class="fas fa-minus" alt="alejar"></i></button></li>
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
                                <input class="noClass" type="text" id="inpHieleraProd" name="CalhieleraProd"
                                    required>
                                <input class="noClass" type="text" id="inpHieleraVisi" name="CalhieleraVisi"
                                    required>
                                <input class="noClass" type="text" id="inpHieleraEstado" name="CalhieleraEstado"
                                    required>
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
                    <span>Según la auditoria no hay hieleras de la marca</span>
                    <br><br>
                    <!-- Button trigger modal -->
                    <button type="button" class="btnMat" data-toggle="modal" data-target="#hieleraModal"
                        onclick="seeHielera()">
                        Modificar presencia del material
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="hieleraModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="ttulo">
                                        <green><span>Confirme si hay hieleras</span></green>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="col">
                                            <div class="col">
                                                <img class="img_fachada" src="{{ asset('/storage/hieler.png') }}" />
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="checkbox" class="custom-control-input" checked>
                                                    <input type="hidden" name="hielera" id="hielera"
                                                        value="hielera_si" disabled>
                                                    <label class="custom-control-label" for="hielera_si">Si hay
                                                        hieleras</label>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <CENTER>
                                                    <h4>LAS HIELERAS TIENEN PRODUCTOS DIAGEO?</h4>
                                                </CENTER>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="hl_con_prod"
                                                        id="hl_con_prod_si" value="hl_con_prod_si" disabled>
                                                    <label class="form-check-label" for="hl_con_prod_si">SI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="hl_con_prod"
                                                        id="hl_con_prod_no" value="hl_con_prod_no" disabled>
                                                    <label class="form-check-label" for="hl_con_prod_no">NO</label>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <CENTER>
                                                    <h4>LAS HIELRAS SON VISIBLES?</h4>
                                                </CENTER>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="prod_hl_visible" id="prod_hl_visible_si"
                                                        value="prod_hl_visible_si" disabled>
                                                    <label class="form-check-label" for="prod_hl_visible_si">SI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="prod_hl_visible" id="prod_hl_visible_no"
                                                        value="prod_hl_visible_no" disabled>
                                                    <label class="form-check-label" for="prod_hl_visible_no">NO</label>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <CENTER>
                                                    <h4>LAS HIELRAS ESTAN EN BUEN ESTADO? SIN RAYADURAS, STIKERS, NO ESTAN
                                                        SUCIOS NI DESGASTADOS? </h4>
                                                </CENTER>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="prod_hl_danadas" id="prod_hl_danadas_si"
                                                        value="prod_hl_danadas_si" disabled>
                                                    <label class="form-check-label" for="prod_hl_danadas_si">SI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="prod_hl_danadas" id="prod_hl_danadas_no"
                                                        value="prod_hl_danadas_no" disabled>
                                                    <label class="form-check-label" for="prod_hl_danadas_no">NO</label>
                                                </div>
                                            </div>
                                            <div id="divHielera_Img" style="display: none">
                                                <div class="row" style="text-align: center">
                                                    <div class="col">
                                                        <br><br>
                                                        <hr>
                                                        <green> <span>Tome foto de la hielera </span></green>
                                                        <input type="file" id="seleccionHielera"
                                                            name="seleccionHielera" accept="image/*" required disabled>
                                                        <img class="card-img-mate" id="imagenHielera">
                                                        <br><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Continuar</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                    <div class="name">Se audito<br> mal el <br>contenido</div>
                                    <div class="name1">Se audito<br> bien el <br>contenido</div>
                                </div>
                                <br>
                                <div style="display: none" id="EditBaseHieleraProd">
                                    <hr>
                                    <select name="baseshl_con_prod" id="baseshl_con_prod"
                                        class="form-control selectpicker selector" data-style="btn-primary"
                                        title="Seleccionar producto en la base hielera" required disabled>
                                        <option disabled value="old{'baseshl_con_prod'}" checked>Seleccione una opción
                                        </option>
                                        @foreach ($baseshl_con_prod as $hieprod)
                                            <option value="{{ $hieprod }}">{{ $hieprod }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <br>
                                <div class="toggle-wrapper">
                                    <div class="toggle checkcross19">
                                        <input id="checkcross19" type="checkbox" style="display: none">
                                        <label class="toggle-item" for="checkcross19">
                                            <div class="check"></div>
                                        </label>
                                    </div>
                                    <div class="name">Se audito<br> mal la <br>visibilidad</div>
                                    <div class="name1">Se audito<br> bien la <br>visibilidad</div>
                                </div>
                                <br>
                                <div style="display: none" id="EditBaseHieleraVisi">
                                    <hr>
                                    <select name="prod_baseshl_visible" id="prod_baseshl_visible"
                                        class="form-control selectpicker selector" data-style="btn-primary"
                                        title="Seleccionar base de hielera es visible" required disabled>
                                        <option disabled value="old{'prod_baseshl_visible'}" checked>Seleccione una opción
                                        </option>
                                        @foreach ($prod_baseshl_visible as $Basehievisi)
                                            <option value="{{ $Basehievisi }}">{{ $Basehievisi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <br>
                                <div class="toggle-wrapper">
                                    <div class="toggle checkcross20">
                                        <input id="checkcross20" type="checkbox" style="display: none">
                                        <label class="toggle-item" for="checkcross20">
                                            <div class="check"></div>
                                        </label>
                                    </div>
                                    <div class="name">Se audito<br> mal el <br>estado</div>
                                    <div class="name1">Se audito<br> bien el <br>estado</div>
                                </div>
                                <br>
                                <div style="display: none" id="EditBaseHieleraEstado">
                                    <hr>
                                    <select name="prod_baseshl_danadas" id="prod_baseshl_danadas"
                                        class="form-control selectpicker selector" data-style="btn-primary"
                                        title="Seleccionar estado de la base de la hielera" required disabled>
                                        <option disabled value="old{'prod_baseshl_danadas'}" checked>Seleccione una opción
                                        </option>
                                        @foreach ($prod_baseshl_danadas as $Basehieesta)
                                            <option value="{{ $Basehieesta }}">{{ $Basehieesta }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <br>
                            </div>
                            <nat class="bt-menu">
                                <ul>
                                    <li class="bt_li"><button type="button" class="botOn js-zoom-in10"><i
                                                class="fas fa-plus" alt="acercar"></i></button></li>
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
                                <input class="noClass" type="text" id="inpBsHieProd" name="CalbasesHieProd"
                                    required>
                                <input class="noClass" type="text" id="inpBsHieVisi" name="CalbasesHieVisi"
                                    required>
                                <input class="noClass" type="text" id="inpBsHieEstado" name="CalbasesHieEstado"
                                    required>
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

                    <span>Según la auditoria no hay bases para las hieleras</span>

                    <br><br>
                    <!-- Button trigger modal -->
                    <button type="button" class="btnMat" data-toggle="modal" data-target="#BasesHieleraModal"
                        onclick="seeBase_H()">
                        Modificar presencia del material
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="BasesHieleraModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="ttulo">
                                        <green><span>Confirme si hay hieleras</span></green>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="col">
                                            <div class="col">
                                                <img class="img_fachada" src="{{ asset('/storage/bases_h.png') }}" />
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="checkbox" class="custom-control-input" checked>
                                                    <input type="hidden" name="bases_h" id="bases_h"
                                                        value="bases_h_si" disabled>
                                                    <label class="custom-control-label" for="bases_h_si">Si hay
                                                        bases para hieleras</label>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <CENTER>
                                                    <h4>LAS BASES PARA HIELRAS SON VISIBLES?</h4>
                                                </CENTER>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="prod_baseshl_visible" id="prod_baseshl_visible_si"
                                                        value="prod_baseshl_visible_si" disabled>
                                                    <label class="form-check-label"
                                                        for="prod_baseshl_visible_si">SI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="prod_baseshl_visible" id="prod_baseshl_visible_no"
                                                        value="prod_baseshl_visible_no" disabled>
                                                    <label class="form-check-label"
                                                        for="prod_baseshl_visible_no">NO</label>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <CENTER>
                                                    <h4>LAS BASES PARA HIELRAS ESTAN EN BUEN ESTADO? SIN RAYADURAS,
                                                        STIKERS, NO ESTAN SUCIOS NI DESGASTADOS? </h4>
                                                </CENTER>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="prod_baseshl_danadas" id="prod_baseshl_danadas_si"
                                                        value="prod_baseshl_danadas_si" disabled>
                                                    <label class="form-check-label"
                                                        for="prod_baseshl_danadas_si">SI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="prod_baseshl_danadas" id="prod_baseshl_danadas_no"
                                                        value="prod_baseshl_danadas_no" disabled>
                                                    <label class="form-check-label"
                                                        for="prod_baseshl_danadas_no">NO</label>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <CENTER>
                                                    <h4>LAS BASES PARA HIELERAS TIENEN PRODUCTOS DIAGEO?</h4>
                                                </CENTER>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="baseshl_con_prod" id="baseshl_con_prod_si"
                                                        value="baseshl_con_prod_si" disabled>
                                                    <label class="form-check-label" for="baseshl_con_prod_si">SI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="baseshl_con_prod" id="baseshl_con_prod_no"
                                                        value="baseshl_con_prod_no" disabled>
                                                    <label class="form-check-label" for="baseshl_con_prod_no">NO</label>
                                                </div>
                                            </div>


                                            <div id="divBaseHielera_Img" style="display: none">
                                                <div class="row" style="text-align: center">
                                                    <div class="col">
                                                        <br><br>
                                                        <hr>
                                                        <green> <span>Tome foto de las bases para hielera </span>
                                                        </green>
                                                        <input type="file" id="seleccionBase_h"
                                                            name="seleccionBase_h" accept="image/*" required disabled>
                                                        <img class="card-img-mate" id="imagenBase_h">
                                                        <br><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Continuar</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                    <div class="name">Se audito<br> mal la <br>visibilidad</div>
                                    <div class="name1">Se audito<br> bien la <br>visibilidad</div>
                                </div>
                                <br>
                                <div style="display: none" id="EditDosDbVisi">
                                    <hr>
                                    <select name="prod_dsD_visibles" id="prod_dsD_visibles"
                                        class="form-control selectpicker selector" data-style="btn-primary"
                                        title="Seleccionar si el dosificador es visible " required disabled>
                                        <option disabled value="old{'prod_dsD_visibles'}" checked>Seleccione una opción
                                        </option>
                                        @foreach ($prod_dsD_visibles as $dosDVisi)
                                            <option value="{{ $dosDVisi }}">{{ $dosDVisi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <br>
                                <div class="toggle-wrapper">
                                    <div class="toggle checkcross22">
                                        <input id="checkcross22" type="checkbox" style="display: none">
                                        <label class="toggle-item" for="checkcross22">
                                            <div class="check"></div>
                                        </label>
                                    </div>
                                    <div class="name">se audito <br> mal el<br>contenido</div>
                                    <div class="name1">se audito <br> bien el<br> contenido</div>
                                </div>
                                <br>
                                <div style="display: none" id="EditDosDbProd">
                                    <hr>
                                    <select name="prod_dsD_diferentes" id="prod_dsD_diferentes"
                                        class="form-control selectpicker selector" data-style="btn-primary"
                                        title="Seleccionar el contedido de los dosificadores" required disabled>
                                        <option disabled value="old{'prod_dsD_diferentes'}" checked>Seleccione una opción
                                        </option>
                                        @foreach ($prod_dsD_diferentes as $dosiDif)
                                            <option value="{{ $dosiDif }}">{{ $dosiDif }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <br>
                                <div class="toggle-wrapper">
                                    <div class="toggle checkcross23">
                                        <input id="checkcross23" type="checkbox" style="display: none">
                                        <label class="toggle-item" for="checkcross23">
                                            <div class="check"></div>
                                        </label>
                                    </div>
                                    <div class="name">Se audito<br> mal el <br>estado</div>
                                    <div class="name1">Se audito<br> bien el <br>estado</div>
                                </div>
                                <br>
                                <div style="display: none" id="EditDosDbEstado">
                                    <hr>
                                    <select name="prod_dsD_danados" id="prod_dsD_danados"
                                        class="form-control selectpicker selector" data-style="btn-primary"
                                        title="Seleccionar estado del dosificador" required disabled>
                                        <option disabled value="old{'prod_dsD_danados'}" checked>Seleccione una opción
                                        </option>
                                        @foreach ($prod_dsD_danados as $dsDdanado)
                                            <option value="{{ $dsDdanado }}">{{ $dsDdanado }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <br>
                            </div>
                            <nat class="bt-menu">
                                <ul>
                                    <li class="bt_li"><button type="button" class="botOn js-zoom-in11"><i
                                                class="fas fa-plus" alt="acercar"></i></button></li>
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
                                <input class="noClass" type="text" id="inpDsDVisi" name="CaldosiDVisi" required>
                                <input class="noClass" type="text" id="inpDsDProd" name="CaldosiDProd" required>
                                <input class="noClass" type="text" id="inpDsDEstado" name="CaldosiDEstado"
                                    required>
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
                    <span>Según la auditoria no hay dosificador doble</span>

                    <br><br>
                    <!-- Button trigger modal -->
                    <button type="button" class="btnMat" data-toggle="modal" data-target="#DosifiacadorDobleModal"
                        onclick="seeDosificadorD()">
                        Modificar presencia del material
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="DosifiacadorDobleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="ttulo">
                                        <green><span>Confirme si hay dosificador doble</span></green>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="col">
                                            <div class="col">
                                                <img class="img_fachada"
                                                    src="{{ asset('/storage/dosificador_doble.png') }}" />
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="checkbox" class="custom-control-input" checked>
                                                    <input type="hidden" name="dosificadorD" id="dosificadorD"
                                                        value="dosificadorD_si" disabled>
                                                    <label class="custom-control-label" for="dosificadorD_si">Si hay
                                                        dosificador doble</label>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <CENTER>
                                                    <h4>EL DOSIFICADOR DOBLE ES VISIBLE?</h4>
                                                </CENTER>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="prod_dsD_visibles" id="prod_dsD_visibles_si"
                                                        value="prod_dsD_visibles_si" disabled>
                                                    <label class="form-check-label"
                                                        for="prod_dsD_visibles_si">SI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="prod_dsD_visibles" id="prod_dsD_visibles_no"
                                                        value="prod_dsD_visibles_no" disabled>
                                                    <label class="form-check-label"
                                                        for="prod_dsD_visibles_no">NO</label>
                                                </div>
                                            </div>

                                            <div class="container">
                                                <CENTER>
                                                    <h4>EL DOSIFICADOR DOBLE ESTA EN PERFECTAS CONDICIONES? SIN POLVO, SIN
                                                        SUCIEDAD? LAS ETIQUETAS ESTAN EN BUEN ESTADO?</h4>
                                                </CENTER>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="prod_dsD_danados" id="prod_dsD_danados_si"
                                                        value="prod_dsD_danados_si" disabled>
                                                    <label class="form-check-label" for="prod_dsD_danados_si">SI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="prod_dsD_danados" id="prod_dsD_danados_no"
                                                        value="prod_dsD_danados_no" disabled>
                                                    <label class="form-check-label" for="prod_dsD_danados_no">NO</label>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <CENTER>
                                                    <h4>EL DOSIFICADOR DOBLE ESTA SIENDO UTILIZADO CON PRODUCTOS DIAGEO?
                                                    </h4>
                                                </CENTER>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="prod_dsD_diferentes" id="prod_dsD_diferentes_si"
                                                        value="prod_dsD_diferentes_si" disabled>
                                                    <label class="form-check-label"
                                                        for="prod_dsD_diferentes_si">SI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="prod_dsD_diferentes" id="prod_dsD_diferentes_no"
                                                        value="prod_dsD_diferentes_no" disabled>
                                                    <label class="form-check-label"
                                                        for="prod_dsD_diferentes_no">NO</label>
                                                </div>
                                            </div>

                                            <div id="divDosificadorD" style="display: none">
                                                <div class="row" style="text-align: center">
                                                    <div class="col">
                                                        <br><br>
                                                        <hr>
                                                        <green><span>Tome foto del dosificador doble</span>
                                                        </green>
                                                        <input type="file" id="seleccionDosificadorD"
                                                            name="seleccionDosificadorD" accept="image/*" required
                                                            disabled>
                                                        <img class="card-img-mate" id="imagenDosificadorD">
                                                        <br><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Continuar</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                    <div class="name">Se audito <br>mal la <br>visibilidad</div>
                                    <div class="name1">Se audito <br>bien la <br>visibilidad</div>
                                </div>
                                <br>
                                <div style="display: none" id="EditDosSVisi">
                                    <hr>
                                    <select name="prod_dsS_visibles" id="prod_dsS_visibles"
                                        class="form-control selectpicker selector" data-style="btn-primary"
                                        title="Seleccionar si el dosificador es visible " required disabled>
                                        <option disabled value="old{'prod_dsS_visibles'}" checked>Seleccione una opción
                                        </option>
                                        @foreach ($prod_dsS_visibles as $dosSVisi)
                                            <option value="{{ $dosSVisi }}">{{ $dosSVisi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <br>
                                <div class="toggle-wrapper">
                                    <div class="toggle checkcross25">
                                        <input id="checkcross25" type="checkbox" style="display: none">
                                        <label class="toggle-item" for="checkcross25">
                                            <div class="check"></div>
                                        </label>
                                    </div>
                                    <div class="name">se audito<br> bien el <br>contedio del <br>dosificador</div>
                                    <div class="name1">se audito<br> bien el <br>contedio del <br>dosificador</div>
                                </div>
                                <br>
                                <div style="display: none" id="EditDosSnProd">
                                    <hr>
                                    <select name="prod_dsS_diferentes" id="prod_dsS_diferentes"
                                        class="form-control selectpicker selector" data-style="btn-primary"
                                        title="Seleccionar el contedido de los dosificadores" required disabled>
                                        <option disabled value="old{'prod_dsS_diferentes'}" checked>Seleccione una opción
                                        </option>
                                        @foreach ($prod_dsS_diferentes as $dosiDif)
                                            <option value="{{ $dosiDif }}">{{ $dosiDif }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <br>
                                <div class="toggle-wrapper">
                                    <div class="toggle checkcross26">
                                        <input id="checkcross26" type="checkbox" style="display: none">
                                        <label class="toggle-item" for="checkcross26">
                                            <div class="check"></div>
                                        </label>
                                    </div>
                                    <div class="name">Se audito<br> mal el <br>estado</div>
                                    <div class="name1">Se audito<br> bien el <br>estado</div>
                                </div>
                                <br>
                                <div style="display: none" id="EditDosSbEstado">
                                    <hr>
                                    <select name="prod_dsS_danados" id="prod_dsS_danados"
                                        class="form-control selectpicker selector" data-style="btn-primary"
                                        title="Seleccionar estado de la base del dosificador" required disabled>
                                        <option disabled value="old{'prod_dsS_danados'}" checked>Seleccione una opción
                                        </option>
                                        @foreach ($prod_dsS_danados as $dsDdanado)
                                            <option value="{{ $dsDdanado }}">{{ $dsDdanado }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <br>
                            </div>
                            <nat class="bt-menu">
                                <ul>
                                    <li class="bt_li"><button type="button" class="botOn js-zoom-in12"><i
                                                class="fas fa-plus" alt="acercar"></i></button></li>
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
                                <input class="noClass" type="text" id="inpDsSVisi" name="CaldosiSVisi" required>
                                <input class="noClass" type="text" id="inpDsSProd" name="CaldosiSProd" required>
                                <input class="noClass" type="text" id="inpDsSEstado"
                                    name="CaldosiSEstado"required>
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
                    <span>Según la auditoria no hay dosificador sencillo</span>

                    <br><br>
                    <!-- Button trigger modal -->
                    <button type="button" class="btnMat" data-toggle="modal"
                        data-target="#DosifiacadorSencilloModal" onclick="seeDosificadorS()">
                        Modificar presencia del material
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="DosifiacadorSencilloModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="ttulo">
                                        <green><span>Confirme si hay dosificador sencillo</span></green>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="col">
                                            <div class="col">
                                                <img class="img_fachada"
                                                    src="{{ asset('/storage/dosificador_sencillo.png') }}" />
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="checkbox" class="custom-control-input" checked>
                                                    <input type="hidden" name="dosificadorS" id="dosificadorS"
                                                        value="dosificadorS_si" disabled>
                                                    <label class="custom-control-label" for="dosificadorS_si">Si hay
                                                        dosificador sencillo</label>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <CENTER>
                                                    <h4>EL DOSIFICADOR SENCILLO ES VISIBLE?</h4>
                                                </CENTER>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="prod_dsS_visibles" id="prod_dsS_visibles_si"
                                                        value="prod_dsS_visibles_si" disabled>
                                                    <label class="form-check-label"
                                                        for="prod_dsS_visibles_si">SI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="prod_dsS_visibles" id="prod_dsS_visibles_no"
                                                        value="prod_dsS_visibles_no" disabled>
                                                    <label class="form-check-label"
                                                        for="prod_dsS_visibles_no">NO</label>
                                                </div>
                                            </div>

                                            <div class="container">
                                                <CENTER>
                                                    <h4>EL DOSIFICADOR SENCILLO ESTA EN PERFECTAS CONDICIONES? SIN POLVO,
                                                        SIN SUCIEDAD? LAS ETIQUETAS ESTAN EN BUEN ESTADO?</h4>
                                                </CENTER>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="prod_dsS_danados" id="prod_dsS_danados_si"
                                                        value="prod_dsS_danados_si" disabled>
                                                    <label class="form-check-label" for="prod_dsS_danados_si">SI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="prod_dsS_danados" id="prod_dsS_danados_no"
                                                        value="prod_dsS_danados_no" disabled>
                                                    <label class="form-check-label" for="prod_dsS_danados_no">NO</label>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <CENTER>
                                                    <h4>EL DOSIFICADOR SENCILLO ESTA SIENDO UTILIZADO CON PRODUCTOS DIAGEO?
                                                    </h4>
                                                </CENTER>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="prod_dsS_diferentes" id="prod_dsS_diferentes_si"
                                                        value="prod_dsS_diferentes_si" disabled>
                                                    <label class="form-check-label"
                                                        for="prod_dsS_diferentes_si">SI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="prod_dsS_diferentes" id="prod_dsS_diferentes_no"
                                                        value="prod_dsS_diferentes_no" disabled>
                                                    <label class="form-check-label"
                                                        for="prod_dsS_diferentes_no">NO</label>
                                                </div>
                                            </div>
                                            <div id="divDosificadorS" style="display: none">
                                                <div class="row" style="text-align: center">
                                                    <div class="col">
                                                        <br><br>
                                                        <hr>
                                                        <green><span>Tome foto del dosificador sencillo</span>
                                                        </green>
                                                        <input type="file" id="seleccionDosificadorS"
                                                            name="seleccionDosificadorS" accept="image/*" required
                                                            disabled>
                                                        <img class="card-img-mate" id="imagenDosificadorS">
                                                        <br><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Continuar</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                    <div class="name">Se audito <br>mal la <br>visibilidad</div>
                                    <div class="name1">Se audito <br>bien la <br>visibilidad</div>
                                </div>
                                <br>
                                <div style="display: none" id="EditBrandingVisi">
                                    <hr>
                                    <select name="branding_visible" id="branding_visible"
                                        class="form-control selectpicker selector" data-style="btn-primary"
                                        title="Seleccionar visibilidad branding" required disabled>
                                        <option disabled value="old{'branding_visible'}" checked>Seleccione una opción
                                        </option>
                                        @foreach ($branding_visible as $braVis)
                                            <option value="{{ $braVis }}">{{ $braVis }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <br>
                                <div class="toggle-wrapper">
                                    <div class="toggle checkcross28">
                                        <input id="checkcross28" type="checkbox" style="display: none">
                                        <label class="toggle-item" for="checkcross28">
                                            <div class="check"></div>
                                        </label>
                                    </div>
                                    <div class="name">Audito<br>mal el<br>estado</div>
                                    <div class="name1">Audito<br>bien el<br>estado</div>
                                </div>
                                <br>
                                <div style="display: none" id="EditBrandingEstado">
                                    <hr>
                                    <select name="branding_danados" id="branding_danados"
                                        class="form-control selectpicker selector" data-style="btn-primary"
                                        title="Seleccionar estado branding" required disabled>
                                        <option disabled value="old{'branding_danados'}" checked>Seleccione una opción
                                        </option>
                                        @foreach ($branding_danados as $braDan)
                                            <option value="{{ $braDan }}">{{ $braDan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <br>
                            </div>

                            <nat class="bt-menu">
                                <ul>
                                    <li class="bt_li"><button type="button" class="botOn js-zoom-in13"><i
                                                class="fas fa-plus" alt="acercar"></i></button></li>
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
                                <input class="noClass" type="text" id="inpBrandingVisi" name="CalbrandingVisi"
                                    required>
                                <input class="noClass" type="text" id="inpBrandingEstado"
                                    name="CalbrandingEstado" required>
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
                    <span>Según la auditoria no hay Branding</span>
                    <br><br>
                    <!-- Button trigger modal -->
                    <button type="button" class="btnMat" data-toggle="modal" data-target="#brandingModal"
                        onclick="seeBranding()">
                        Modificar presencia del material
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="brandingModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="ttulo">
                                        <green><span>Confirme si hay branding</span></green>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="col">
                                            <div class="col">
                                                <img class="img_cenefa"
                                                    src="{{ asset('/storage/branding_mesas.png') }}" />
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="checkbox" class="custom-control-input" checked>
                                                    <input type="hidden" name="branding" id="branding"
                                                        value="branding_si" disabled>
                                                    <label class="custom-control-label" for="branding_si">Si hay
                                                        branding</label>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <CENTER>
                                                    <h4>EL BRANDING DE LAS MESAS ES VISIBLE?</h4>
                                                </CENTER>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="branding_visible" id="branding_visible_si"
                                                        value="branding_visible_si" disabled>
                                                    <label class="form-check-label" for="branding_visible_si">SI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="branding_visible" id="branding_visible_no"
                                                        value="branding_visible_no" disabled>
                                                    <label class="form-check-label" for="branding_visible_no">NO</label>
                                                </div>
                                            </div>

                                            <div class="container">
                                                <CENTER>
                                                    <h4>EL BRANDING DE LAS MESAS ESTA EN BUENAS CONDICIONES?</h4>
                                                </CENTER>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="branding_danados" id="branding_danados_si"
                                                        value="branding_danados_si" disabled>
                                                    <label class="form-check-label" for="branding_danados_si">SI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="branding_danados" id="branding_danados_no"
                                                        value="branding_danados_no" disabled>
                                                    <label class="form-check-label" for="branding_danados_no">NO</label>
                                                </div>
                                            </div>

                                            <div id="divBrandingPic" style="display: none">
                                                <div class="row" style="text-align: center">
                                                    <div class="col">
                                                        <br><br>
                                                        <hr>
                                                        <green> <span>Tome foto del branding</span></green>
                                                        <input type="file" id="seleccionBranding"
                                                            name="seleccionBranding" accept="image/*" required disabled>
                                                        <img class="card-img-mate" id="imagenBranding">
                                                        <br><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Continuar</button>
                                </div>

                            </div>
                        </div>
                    </div>











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
                                    <div class="name">Se audito <br>mal la <br>visibilidad</div>
                                    <div class="name1">Se audito <br>bien la <br>visibilidad</div>
                                </div>
                                <br>
                                <div style="display: none" id="EditVasosVisi">
                                    <hr>
                                    <select name="vasos_visibles" id="vasos_visibles"
                                        class="form-control selectpicker selector" data-style="btn-primary"
                                        title="Seleccionar visibilidad branding" required disabled>
                                        <option disabled value="old{'vasos_visibles'}" checked>Seleccione una opción
                                        </option>
                                        @foreach ($vasos_visibles as $braVis)
                                            <option value="{{ $braVis }}">{{ $braVis }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
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
                                <br>
                                <div style="display: none" id="EditVasosEstado">
                                    <hr>
                                    <select name="vasos_quebrados" id="vasos_quebrados"
                                        class="form-control selectpicker selector" data-style="btn-primary"
                                        title="Seleccionar estado branding" required disabled>
                                        <option disabled value="old{'vasos_quebrados'}" checked>Seleccione una opción
                                        </option>
                                        @foreach ($vasos_quebrados as $VasDan)
                                            <option value="{{ $VasDan }}">{{ $VasDan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <nat class="bt-menu">
                                <ul>
                                    <li class="bt_li"><button type="button" class="botOn js-zoom-in14"><i
                                                class="fas fa-plus" alt="acercar"></i></button></li>
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
                                <input class="noClass" type="text" id="inpVasosVisi" name="CalvasosVisi"
                                    required>
                                <input class="noClass" type="text" id="inpVasosEstado" name="CalasosEstado"
                                    required>
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
                    <span>Según la auditoria no hay vasos ni copas</span>

                    <br><br>
                    <!-- Button trigger modal -->
                    <button type="button" class="btnMat" data-toggle="modal" data-target="#vasosModal"
                        onclick="seeVasos()">
                        Modificar presencia del material
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="vasosModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="ttulo">
                                        <green><span>Confirme si hay vasos y copas de la marca </span></green>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="col">
                                            <div class="col">
                                                <img class="img_cenefa"
                                                    src="{{ asset('/storage/vasos_copas.png') }}" />
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="checkbox" class="custom-control-input" checked>
                                                    <input type="hidden" name="vasos" id="vasos"
                                                        value="vasos_si" disabled>
                                                    <label class="custom-control-label" for="vasos_si">Si hay
                                                        vasos</label>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <CENTER>
                                                    <h4>LOS VASOS Y COPAS DE LA MARCA SON VISIBLES?</h4>
                                                </CENTER>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="vasos_visibles" id="vasos_visibles_si"
                                                        value="vasos_visibles_si" disabled>
                                                    <label class="form-check-label" for="vasos_visibles_si">SI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="vasos_visibles" id="vasos_visibles_no"
                                                        value="vasos_visibles_no" disabled>
                                                    <label class="form-check-label" for="vasos_visibles_no">NO</label>
                                                </div>
                                            </div>

                                            <div class="container">
                                                <CENTER>
                                                    <h4>LOS VASOS Y LAS COPAS ESTA EN BUENAS CONDICIONES?</h4>
                                                </CENTER>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="vasos_quebrados" id="vasos_quebrados_si"
                                                        value="vasos_quebrados_si" disabled>
                                                    <label class="form-check-label" for="vasos_quebrados_si">SI</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="vasos_quebrados" id="vasos_quebrados_no"
                                                        value="vasos_quebrados_no" disabled>
                                                    <label class="form-check-label" for="vasos_quebrados_no">NO</label>
                                                </div>
                                            </div>

                                            <div id="divVasosPic" style="display: none">
                                                <div class="row" style="text-align: center">
                                                    <div class="col">
                                                        <br><br>
                                                        <hr>
                                                        <green> <span>Tome foto de los vasos y copas</span></green>
                                                        <input type="file" id="seleccionVasos"
                                                            name="seleccionVasos" accept="image/*" disabled>
                                                        <img class="card-img-mate" id="imagenVasos">
                                                        <br><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Continuar</button>
                                </div>

                            </div>
                        </div>
                    </div>





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
                                <p><br></p>
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
                                                <tr>
                                                    <button type="button" class="btnCant" data-toggle="modal"
                                                        data-target="#Byw1000Modal">
                                                        Modificar caras del producto
                                                    </button>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <button type="button" class="btnCant" data-toggle="modal"
                                                        data-target="#Byw1000Modal">
                                                        Modificar cantidad de caras
                                                    </button>
                                                </tr>
                                            @endif
                                            <!-- Modal -->
                                            <div class="modal fade" id="Byw1000Modal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="ttulo">
                                                                <green><span>Modifique las cantidades si es necesario</span>
                                                                </green>
                                                            </div>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card">
                                                                <div class="col">
                                                                    <div class="col">
                                                                        <img src="{{ asset('/storage/b&w.png') }}"
                                                                            class="img_botellasNs" />
                                                                    </div>
                                                                    <div class="container">
                                                                        <CENTER>
                                                                            <h4>PRESENTACION DE 1000 ML</h4>
                                                                        </CENTER>
                                                                        <input type="button" onclick="seeBlack1000()"
                                                                            class="btnCantModal"
                                                                            value="INGRESAR CANTIDAD" id="btnblack1000">
                                                                        <div id="divBlack1000" style="display: none">
                                                                            <input name="caras_bAndw1000"
                                                                                id="caras_bAndw1000"
                                                                                class="form-control" type="number"
                                                                                value="{{ old('caras_bAndw1000, $reporte->caras_bAndw1000') }}"
                                                                                disabled>
                                                                            <input type="hidden" name="bAndw1000"
                                                                                id="bAndw1000" value="bAndw1000_si"
                                                                                disabled>
                                                                        </div>
                                                                    </div><br>

                                                                    <div class="container">
                                                                        <CENTER>
                                                                            <h4>PRESENTACION DE 700 ML</h4>
                                                                        </CENTER>
                                                                        <input type="button" onclick="seeBlack700()"
                                                                            class="btnCantModal"
                                                                            value="INGRESAR CANTIDAD" id="btnblack700">
                                                                        <div id="divBlack700" style="display: none">
                                                                            <input name="caras_bAndw700"
                                                                                id="caras_bAndw700" class="form-control"
                                                                                type="number"
                                                                                value="{{ old('caras_bAndw700, $reporte->caras_bAndw700') }}"
                                                                                disabled>
                                                                            <input type="hidden" name="bAndw700"
                                                                                id="bAndw700" value="bAndw700_si"
                                                                                disabled>
                                                                        </div>
                                                                    </div><br>

                                                                    <div class="container">
                                                                        <CENTER>
                                                                            <h4>PRESENTACION DE 375 ML</h4>
                                                                        </CENTER>
                                                                        <input type="button" onclick="seeBlack375()"
                                                                            class="btnCantModal"
                                                                            value="INGRESAR CANTIDAD" id="btnblack375">
                                                                        <div id="divBlack375" style="display: none">
                                                                            <input name="caras_bAndw375"
                                                                                id="caras_bAndw375" class="form-control"
                                                                                type="number"
                                                                                value="{{ old('caras_bAndw375, $reporte->caras_bAndw375') }}"
                                                                                disabled>
                                                                            <input type="hidden" name="bAndw375"
                                                                                id="bAndw375" value="bAndw375_si"
                                                                                disabled>
                                                                        </div>
                                                                    </div><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Continuar</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
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
                                <p><br></p>
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
                                                <tr>
                                                    <button type="button" class="btnCant" data-toggle="modal"
                                                        data-target="#Smirnoff700Modal">
                                                        Modificar caras del producto
                                                    </button>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <button type="button" class="btnCant" data-toggle="modal"
                                                        data-target="#Smirnoff700Modal">
                                                        Modificar caras del producto
                                                    </button>
                                                </tr>
                                            @endif
                                            <!-- Modal -->
                                            <div class="modal fade" id="Smirnoff700Modal" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="ttulo">
                                                                <green><span>Modifique las cantidades si es necesario</span>
                                                                </green>
                                                            </div>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card">
                                                                <div class="col">
                                                                    <div class="col">
                                                                        <img src="{{ asset('/storage/smirnoff.png') }}"
                                                                            class="img_botellasNs" />

                                                                    </div>
                                                                    <div class="container">
                                                                        <CENTER>
                                                                            <h4>PRESENTACION DE 700 ML</h4>
                                                                        </CENTER>
                                                                        <input type="button" onclick="seeSmirnoff700()"
                                                                            class="btnCantModal"
                                                                            value="INGRESAR CANTIDAD"
                                                                            id="btnsmirnoff700">
                                                                        <div id="divSmirnoff700" style="display: none">
                                                                            <input name="caras_smirnoff700"
                                                                                id="caras_smirnoff700"
                                                                                class="form-control" type="number"
                                                                                value="{{ old('caras_smirnoff700, $reporte->caras_smirnoff700') }}"
                                                                                disabled>
                                                                            <input type="hidden" name="smirnoff700"
                                                                                id="smirnoff700" value="smirnoff700_si"
                                                                                disabled>
                                                                        </div>
                                                                    </div><br>

                                                                    <div class="container">
                                                                        <CENTER>
                                                                            <h4>PRESENTACION DE 375 ML</h4>
                                                                        </CENTER>
                                                                        <input type="button" onclick="seeSmirnoff375()"
                                                                            class="btnCantModal"
                                                                            value="INGRESAR CANTIDAD"
                                                                            id="btnsmirnoff375">
                                                                        <div id="divSmirnoff375" style="display: none">
                                                                            <input name="caras_smirnoff375"
                                                                                id="caras_smirnoff375"
                                                                                class="form-control" type="number"
                                                                                value="{{ old('caras_smirnoff375, $reporte->caras_smirnoff375') }}"
                                                                                disabled>
                                                                            <input type="hidden" name="smirnoff375"
                                                                                id="smirnoff375" value="smirnoff375_si"
                                                                                disabled>
                                                                        </div>
                                                                    </div><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Continuar</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
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
                                <img src="{{ asset('/storage/smirnoff_sin_azucar.png') }}"
                                    class="img_botellasNs swing" />
                                <p><br></p>
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
                                            @if ($reporte->smirnoff_ns700 == 'smirnoff_ns700_si')
                                                <tr>
                                                    <td>700 ml</td>
                                                    <td>{{ $reporte->caras_smirnoff_ns700 }}</td>
                                                </tr>
                                                <tr>
                                                    <button type="button" class="btnCant" data-toggle="modal"
                                                        data-target="#Smirnoff_nsModal">
                                                        Modificar caras del producto
                                                    </button>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <button type="button" class="btnCant" data-toggle="modal"
                                                        data-target="#Smirnoff_nsModal">
                                                        Modificar caras del producto
                                                    </button>
                                                </tr>
                                            @endif
                                            <!-- Modal -->
                                            <div class="modal fade" id="Smirnoff_nsModal" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="ttulo">
                                                                <green><span>Modifique las cantidades si es necesario</span>
                                                                </green>
                                                            </div>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card">
                                                                <div class="col">
                                                                    <div class="col">
                                                                        <img src="{{ asset('/storage/smirnoff_sin_azucar.png') }}"
                                                                            class="img_botellasNs" />
                                                                    </div>
                                                                    <div class="container">
                                                                        <CENTER>
                                                                            <h4>PRESENTACION DE 700 ML</h4>
                                                                        </CENTER>
                                                                        <input type="button"
                                                                            onclick="seeSmirnoff_ns700()"
                                                                            class="btnCantModal"
                                                                            value="INGRESAR CANTIDAD"
                                                                            id="btnsmirnoff_ns700">
                                                                        <div id="divSmirnoff_ns700"
                                                                            style="display: none">
                                                                            <input name="caras_smirnoff_ns700"
                                                                                id="caras_smirnoff_ns700"
                                                                                class="form-control" type="number"
                                                                                value="{{ old('caras_smirnoff_ns700, $reporte->caras_smirnoff_ns700') }}"
                                                                                disabled>
                                                                            <input type="hidden" name="smirnoff_ns700"
                                                                                id="smirnoff_ns700"
                                                                                value="smirnoff_ns700_si" disabled>
                                                                        </div>
                                                                    </div><br>

                                                                    <div class="container">
                                                                        <CENTER>
                                                                            <h4>PRESENTACION DE 375 ML</h4>
                                                                        </CENTER>
                                                                        <input type="button"
                                                                            onclick="seeSmirnoff_ns375()"
                                                                            class="btnCantModal"
                                                                            value="INGRESAR CANTIDAD"
                                                                            id="btnsmirnoff_ns375">
                                                                        <div id="divSmirnoff_ns375"
                                                                            style="display: none">
                                                                            <input name="caras_smirnoff_ns375"
                                                                                id="caras_smirnoff_ns375"
                                                                                class="form-control" type="number"
                                                                                value="{{ old('caras_smirnoff_ns375 , $reporte->caras_smirnoff_ns375') }}"
                                                                                disabled>
                                                                            <input type="hidden" name="smirnoff_ns375"
                                                                                id="smirnoff_ns375"
                                                                                value="smirnoff_ns375_si" disabled>
                                                                        </div>
                                                                    </div><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Continuar</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            @if ($reporte->smirnoff_ns375 == 'smirnoff_ns375_si')
                                                <tr>
                                                    <td>375 ml</td>
                                                    <td>{{ $reporte->caras_smirnoff_ns375 }}</td>
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
                                <p><br></p>
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
                                                <tr>
                                                    <button type="button" class="btnCant" data-toggle="modal"
                                                        data-target="#JhonnieModal">
                                                        Modificar caras del producto
                                                    </button>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <button type="button" class="btnCant" data-toggle="modal"
                                                        data-target="#JhonnieModal">
                                                        Modificar caras del producto
                                                    </button>
                                                </tr>
                                            @endif
                                            <!-- Modal -->
                                            <div class="modal fade" id="JhonnieModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="ttulo">
                                                                <green><span>Modifique las cantidades si es necesario</span>
                                                                </green>
                                                            </div>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card">
                                                                <div class="col">
                                                                    <div class="col">
                                                                        <img src="{{ asset('/storage/jhonie_walker.png') }}"
                                                                            class="img_botellasNs" />
                                                                    </div>
                                                                    <div class="container">
                                                                        <CENTER>
                                                                            <h4>PRESENTACION DE 1000 ML</h4>
                                                                        </CENTER>
                                                                        <input type="button" onclick="seeJhonnie1000()"
                                                                            class="btnCantModal"
                                                                            value="INGRESAR CANTIDAD"
                                                                            id="btnJhonnie1000">
                                                                        <div id="divjhonnie1000" style="display: none">
                                                                            <input name="caras_jhonnie1000"
                                                                                id="caras_jhonnie1000"
                                                                                class="form-control" type="number"
                                                                                value="{{ old('caras_jhonnie1000, $reporte->caras_jhonnie1000') }}"
                                                                                disabled>
                                                                            <input type="hidden" name="jhonnie1000"
                                                                                id="jhonnie1000" value="jhonnie1000_si"
                                                                                disabled>
                                                                        </div>
                                                                    </div><br>
                                                                    <div class="container">
                                                                        <CENTER>
                                                                            <h4>PRESENTACION DE 700 ML</h4>
                                                                        </CENTER>
                                                                        <input type="button" onclick="seeJhonnie700()"
                                                                            class="btnCantModal"
                                                                            value="INGRESAR CANTIDAD"
                                                                            id="btnJhonnie700">
                                                                        <div id="divJhonnie700" style="display: none">
                                                                            <input name="caras_jhonnie700"
                                                                                id="caras_jhonnie700"
                                                                                class="form-control" type="number"
                                                                                value="{{ old('caras_jhonnie700, $reporte->caras_jhonnie700') }}"
                                                                                disabled>
                                                                            <input type="hidden" name="jhonnie700"
                                                                                id="jhonnie700" value="jhonnie700_si"
                                                                                disabled>
                                                                        </div>
                                                                    </div><br>

                                                                    <div class="container">
                                                                        <CENTER>
                                                                            <h4>PRESENTACION DE 375 ML</h4>
                                                                        </CENTER>
                                                                        <input type="button" onclick="seeJhonnie375()"
                                                                            class="btnCantModal"
                                                                            value="INGRESAR CANTIDAD"
                                                                            id="btnJhonnie375">
                                                                        <div id="divJhonnie375" style="display: none">
                                                                            <input name="caras_jhonnie375"
                                                                                id="caras_jhonnie375"
                                                                                class="form-control" type="number"
                                                                                value="{{ old('caras_jhonnie375 , $reporte->caras_jhonnie375') }}"
                                                                                disabled>
                                                                            <input type="hidden" name="jhonnie375"
                                                                                id="jhonnie375" value="jhonnie375_si"
                                                                                disabled>
                                                                        </div>
                                                                    </div><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Continuar</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
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
                                <p><br></p>
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
                                                <tr>
                                                    <button type="button" class="btnCant" data-toggle="modal"
                                                        data-target="#OldParrModal">
                                                        Modificar caras del producto
                                                    </button>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td></td>
                                                <tr>
                                                    <button type="button" class="btnCant" data-toggle="modal"
                                                        data-target="#OldParrModal">
                                                        Modificar caras del producto
                                                    </button>
                                                </tr>
                                                </tr>
                                            @endif
                                            <!-- Modal -->
                                            <div class="modal fade" id="OldParrModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="ttulo">
                                                                <green><span>Modifique las cantidades si es necesario</span>
                                                                </green>
                                                            </div>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card">
                                                                <div class="col">
                                                                    <div class="col">
                                                                        <img src="{{ asset('/storage/oldparr.png') }}"
                                                                            class="img_botellasPq" />
                                                                    </div>
                                                                    <div class="container">
                                                                        <CENTER>
                                                                            <h4>PRESENTACION DE 750 ML</h4>
                                                                        </CENTER>
                                                                        <input type="button" onclick="seeOldParr700()"
                                                                            class="btnCantModal"
                                                                            value="INGRESAR CANTIDAD"
                                                                            id="btnOldParr750">
                                                                        <div id="divOldParr750" style="display: none">
                                                                            <input name="caras_oldparr750"
                                                                                id="caras_oldparr750"
                                                                                class="form-control" type="number"
                                                                                value="{{ old('caras_oldparr750, $reporte->caras_oldparr750') }}"
                                                                                disabled>
                                                                            <input type="hidden" name="oldparr750"
                                                                                id="oldparr750" value="oldparr750_si"
                                                                                disabled>
                                                                        </div>
                                                                    </div><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Continuar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                <p><br></p>
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
                                                <tr>
                                                    <button type="button" class="btnCant" data-toggle="modal"
                                                        data-target="#BuchannasModal">
                                                        Modificar caras del producto
                                                    </button>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <button type="button" class="btnCant" data-toggle="modal"
                                                        data-target="#BuchannasModal">
                                                        Modificar caras del producto
                                                    </button>
                                                </tr>
                                            @endif
                                            <!-- Modal -->
                                            <div class="modal fade" id="BuchannasModal" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="ttulo">
                                                                <green><span>Modifique las cantidades si es necesario</span>
                                                                </green>
                                                            </div>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card">
                                                                <div class="col">
                                                                    <div class="col">
                                                                        <img src="{{ asset('/storage/buchannas.png') }}"
                                                                            class="img_botellasPq" />
                                                                    </div>
                                                                    <div class="container">
                                                                        <CENTER>
                                                                            <h4>PRESENTACION DE 750 ML</h4>
                                                                        </CENTER>
                                                                        <input type="button"
                                                                            onclick="seeBuchannas700()"
                                                                            class="btnCantModal"
                                                                            value="INGRESAR CANTIDAD"
                                                                            id="btnBuchannas700">
                                                                        <div id="divBuchannas700" style="display: none">
                                                                            <input name="caras_buchannas700"
                                                                                id="caras_buchannas700"
                                                                                class="form-control" type="number"
                                                                                value="{{ old('caras_buchannas700, $reporte->caras_buchannas700') }}"
                                                                                disabled>
                                                                            <input type="hidden" name="buchannas700"
                                                                                id="buchannas700"
                                                                                value="buchannas700_si" disabled>
                                                                        </div>
                                                                    </div><br>
                                                                    <div class="container">
                                                                        <CENTER>
                                                                            <h4>PRESENTACION DE 375 ML</h4>
                                                                        </CENTER>
                                                                        <input type="button"
                                                                            onclick="seeBuchannas375()"
                                                                            class="btnCantModal"
                                                                            value="INGRESAR CANTIDAD"
                                                                            id="btnBuchannas375">
                                                                        <div id="divBuchannas375" style="display: none">
                                                                            <input name="caras_buchannas375"
                                                                                id="caras_buchannas375"
                                                                                class="form-control" type="number"
                                                                                value="{{ old('caras_buchannas375, $reporte->caras_buchannas375') }}"
                                                                                disabled>
                                                                            <input type="hidden" name="buchannas375"
                                                                                id="buchannas375"
                                                                                value="buchannas375_si" disabled>
                                                                        </div>
                                                                    </div><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Continuar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                <div class="name">Se audito mal<br> la visibilidad <br>de la marca</div>
                                <div class="name1">Se audito bien<br> la visibilidad <br>de la marca</div>
                            </div>
                            <br>
                            <div style="display: none" id="EditCalVisi">
                                <hr>
                                <select name="cal_marc_visible" id="cal_marc_visible"
                                    class="form-control selectpicker selector " data-style="btn-primary"
                                    title="Seleccionar visibilidad de la marca" required disabled>
                                    <option disabled value="old{'cal_marc_visible'}" checked>Seleccione una opción
                                    </option>
                                    @foreach ($cal_marc_visible as $calVisi)
                                        <option value="{{ $calVisi }}">{{ $calVisi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <hr>
                            <br>
                            <div class="toggle-wrapper">
                                <div class="toggle checkcross32">
                                    <input id="checkcross32" type="checkbox" style="display: none">
                                    <label class="toggle-item" for="checkcross32">
                                        <div class="check"></div>
                                    </label>
                                </div>
                                <div class="name">Se audito mal<br> el estado <br>de la marca</div>
                                <div class="name1">Se audito bien<br> el estado <br>de la marca</div>
                            </div>
                            <br>
                            <div style="display: none" id="EditCalEstado">
                                <hr>
                                <select name="cal_marc_danados" id="cal_marc_danados"
                                    class="form-control selectpicker selector " data-style="btn-primary"
                                    title="Seleccionar visibilidad de la marca" required disabled>
                                    <option disabled value="old{'cal_marc_danados'}" checked>Seleccione una opción
                                    </option>
                                    @foreach ($cal_marc_danados as $calEst)
                                        <option value="{{ $calEst }}">{{ $calEst }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <hr>
                            <br>
                            <div class="toggle-wrapper">
                                <div class="toggle checkcross33">
                                    <input id="checkcross33" type="checkbox" style="display: none">
                                    <label class="toggle-item" for="checkcross33">
                                        <div class="check"></div>
                                    </label>
                                </div>
                                <div class="name">Se audito mal<br> el estado <br>de las etiquetas</div>
                                <div class="name1">Se audito bien<br> el estado <br>de las etiquetas</div>
                            </div>
                            <br>
                            <div style="display: none" id="EditCalEtiquetas">
                                <hr>
                                <select name="cal_marc_et_danados" id="cal_marc_et_danados"
                                    class="form-control selectpicker selector " data-style="btn-primary"
                                    title="Seleccionar calidad de las etiquetas de la marcas" required disabled>
                                    <option disabled value="old{'cal_marc_et_danados'}" checked>Seleccione una opción
                                    </option>
                                    @foreach ($cal_marc_et_danados as $calMarEt)
                                        <option value="{{ $calMarEt }}">{{ $calMarEt }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <hr>

                        </div>

                        <nat class="bt-menu">
                            <ul>
                                <li class="bt_li"><button type="button" class="botOn js-zoom-in15"><i
                                            class="fas fa-plus" alt="acercar"></i></button></li>
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
                            <input class="noClass" type="text" name="calMarcEstado" id="inpCalMarcEstado"
                                required>
                            <input class="noClass" type="text" name="calMarcEtiqueta" id="inpCalMarcEtiqueta"
                                required>
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
                        La marca de ron mas vendida en el punto es <strong>{{ $reporte->comp_ron1 }} </strong> y la
                        segunda
                        mas
                        vendida es
                        <strong>{{ $reporte->comp_ron2 }}</strong>, ambas ocupan {{ $reporte->caras_comp_ron }} caras.
                    </p>
                    <p>
                        <input type="button" value="Modificar el comparativo de rones" data-target="#CompRonModal"
                            data-toggle="modal" class="btnCompModal" onclick="seeCompRon()">
                    </p>
                    <!-- Modal -->
                    <div class="modal fade" id="CompRonModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="ttulo">
                                        <green><span>Ajuste el reporte </span>
                                        </green>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="col">
                                            <div class="col">
                                                <img src="{{ asset('/storage/ronx3.png') }}"
                                                    class="img_botellasComp" />
                                            </div>
                                            <div class="container">
                                                <ul>
                                                    <div class="row">
                                                        <div class="col-sm-12" style="background: rgb(224, 248, 224)">
                                                            <div
                                                                class="custom-control custom-radio custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    checked>
                                                                <input type="hidden" name="hay_ron" id="hay_ron"
                                                                    value="hay_ron_si" disabled>
                                                                <label class="custom-control-label" for="hay_ron_si">Hay
                                                                    rones de la competencia</label>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-8 col-sm-6"
                                                                    style="background: rgb(198, 198, 235)">
                                                                    {{ Form::label('comp_ron1', 'Primera marca más vendida') }}
                                                                    <select name="comp_ron1" id="comp_ron1"
                                                                        class="form-control" required disabled>
                                                                        <option selected value="">--</option>
                                                                        @foreach ($competenciaRon as $Ron)
                                                                            <option value="{{ $Ron }}">
                                                                                {{ $Ron }} </option>
                                                                        @endforeach
                                                                    </select>
                                                                    {{ Form::label('precio_comp_ron1', 'Precio $$ 750 ml') }}
                                                                    <input type="text" name="precio_comp_ron1"
                                                                        id="precio_comp_ron1" class="form-control"
                                                                        style="border-radius: 0.3rem;" maxlength="6"
                                                                        minlength="1" autocomplete="off" required
                                                                        disabled>
                                                                    <hr>
                                                                    <span id="texto14"></span>
                                                                    <hr>
                                                                    @include('errors.errors', [
                                                                        'field' => 'precio_comp_ron1',
                                                                    ])
                                                                </div>
                                                                <div class="col-4 col-sm-6"
                                                                    style="background: rgb(240, 240, 200)">
                                                                    {{ Form::label('comp_ron2', 'Segunda marca más vendida') }}

                                                                    <select name="comp_ron2" id="comp_ron2"
                                                                        class="form-control" required disabled>
                                                                        <option selected value="">--</option>
                                                                        @foreach ($competenciaRon as $Ron)
                                                                            <option value="{{ $Ron }}">
                                                                                {{ $Ron }} </option>
                                                                        @endforeach
                                                                    </select>
                                                                    {{ Form::label('precio_comp_ron2', 'Precio $$ 750 ml') }}
                                                                    <input type="text" name="precio_comp_ron2"
                                                                        id="precio_comp_ron2" class="form-control"
                                                                        style="border-radius: 0.3rem;" maxlength="6"
                                                                        minlength="1" autocomplete="off" required
                                                                        disabled>
                                                                    <hr>
                                                                    <span id="texto15"></span>
                                                                    <hr>
                                                                    @include('errors.errors', [
                                                                        'field' => 'precio_comp_ron2',
                                                                    ])

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            {{ Form::label('caras_comp_ron', 'Cantidad de caras en el lineal de rones') }}
                                                            <input type="number" class="form-control" placeholder=""
                                                                name="caras_comp_ron" id="caras_comp_ron"
                                                                aria-label="caras_comp_ron" required disabled>
                                                            @include('errors.errors', [
                                                                'field' => 'caras_comp_ron',
                                                            ])
                                                            <br>
                                                            <div class="d-flex justify-content-center">
                                                                <div class="ttulo">
                                                                    <green><span>Foto del lineal de ron</span></green>
                                                                </div>
                                                                <br>
                                                                <input type="file" id="seleccionLinealR"
                                                                    accept="image/*" required disabled>
                                                                <input type="hidden" value="{{ $seleccionLinealR }}"
                                                                    name="seleccionLinealR">
                                                                <br><br>
                                                                <img class="card-img-top" id="imagenLinearlR">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </ul>
                                            </div><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Continuar</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <nat class="bt-menu">
                        <ul>
                            <li class="bt_li"><button type="button" class="botOn js-zoom-in16"><i
                                        class="fas fa-plus" alt="acercar"></i></button></li>
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
                    @if (file_exists($reporte->seleccionLinealR))
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


                    <p>
                        <input type="button" value="Modificar el comparativo de aguardiente"
                            data-target="#CompAguaModal" data-toggle="modal" class="btnCompModal"
                            onclick="seeCompAgua()">
                    </p>
                    <!-- Modal -->
                    <div class="modal fade" id="CompAguaModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="ttulo">
                                        <green><span>Ajuste el reporte </span>
                                        </green>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="col">
                                            <div class="col">
                                                <img src="{{ asset('/storage/aguardientes.png') }}"
                                                    class="img_botellasComp" />
                                            </div>
                                            <div class="container">
                                                <ul>
                                                    <div class="row">
                                                        <div class="col-sm-12" style="background: rgb(224, 248, 224)">
                                                            <div
                                                                class="custom-control custom-radio custom-control-inline">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    checked>
                                                                <input type="hidden" name="hay_aguardiente"
                                                                    id="hay_aguardiente" value="hay_aguardiente_si"
                                                                    disabled>
                                                                <label class="custom-control-label"
                                                                    for="hay_aguardiente_si">Hay
                                                                    aguardientes de la competencia</label>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-8 col-sm-6"
                                                                    style="background: rgb(198, 198, 235)">
                                                                    {{ Form::label('comp_aguard1', 'Primera marca más vendida') }}
                                                                    <select name="comp_aguard1" id="comp_aguard1"
                                                                        class="form-control" required disabled>
                                                                        <option selected value="">--</option>
                                                                        @foreach ($competenciaAguardiente as $Agua)
                                                                            <option value="{{ $Agua }}">
                                                                                {{ $Agua }} </option>
                                                                        @endforeach
                                                                    </select>
                                                                    {{ Form::label('precio_comp_aguardiente1', 'Precio $$ 750 ml') }}
                                                                    <input type="text"
                                                                        name="precio_comp_aguardiente1"
                                                                        id="precio_comp_aguardiente1"
                                                                        class="form-control"
                                                                        style="border-radius: 0.3rem;" maxlength="6"
                                                                        minlength="1" autocomplete="off" required
                                                                        disabled>
                                                                    <hr>
                                                                    <span id="texto16"></span>
                                                                    <hr>
                                                                    @include('errors.errors', [
                                                                        'field' => 'precio_comp_aguardiente1',
                                                                    ])
                                                                </div>
                                                                <div class="col-4 col-sm-6"
                                                                    style="background: rgb(240, 240, 200)">
                                                                    {{ Form::label('comp_aguard2', 'Segunda marca más vendida') }}

                                                                    <select name="comp_aguard2" id="comp_aguard2"
                                                                        class="form-control" required disabled>
                                                                        <option selected value="">--</option>
                                                                        @foreach ($competenciaAguardiente as $Agua)
                                                                            <option value="{{ $Agua }}">
                                                                                {{ $Agua }} </option>
                                                                        @endforeach
                                                                    </select>
                                                                    {{ Form::label('precio_comp_aguardiente2', 'Precio $$ 750 ml') }}
                                                                    <input type="text"
                                                                        name="precio_comp_aguardiente2"
                                                                        id="precio_comp_aguardiente2"
                                                                        class="form-control"
                                                                        style="border-radius: 0.3rem;" maxlength="6"
                                                                        minlength="1" autocomplete="off" required
                                                                        disabled>
                                                                    <hr>
                                                                    <span id="texto17"></span>
                                                                    <hr>
                                                                    @include('errors.errors', [
                                                                        'field' => 'precio_comp_aguardiente2',
                                                                    ])
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            {{ Form::label('caras_comp_aguardiente', 'Cantidad de caras en el lineal de aguardientes') }}
                                                            <input type="number" class="form-control" placeholder=""
                                                                name="caras_comp_aguardiente"
                                                                id="caras_comp_aguardiente"
                                                                aria-label="caras_comp_aguardiente" required disabled>
                                                            @include('errors.errors', [
                                                                'field' => 'caras_comp_aguardiente',
                                                            ])
                                                            <br>
                                                            <div class="d-flex justify-content-center">
                                                                <div class="ttulo">
                                                                    <green><span>Foto del lineal de aguardientes</span>
                                                                    </green>
                                                                </div>
                                                                <br>

                                                                <input type="hidden" id="fotoLinealA"
                                                                    name="seleccionLinealA"
                                                                    value="auditorias_pics/Aguardiente_{{ $reporte->precarga_id }}.png"
                                                                    required disabled>
                                                                <input type="file" id="seleccionLinealA"
                                                                    name="fotoLinealA" accept="image/*" disabled>
                                                                <br><br>
                                                                <img class="card-img-top" id="imagenLinearlA">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </ul>
                                            </div><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Continuar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nat class="bt-menu">
                        <ul>
                            <li class="bt_li"><button type="button" class="botOn js-zoom-in17"><i
                                        class="fas fa-plus" alt="acercar"></i></button></li>
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
                    @if (file_exists($reporte->seleccionLinealA))
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
        <ul>
            <div class="row">
                <div class="col-4 card-box-mid">
                    <h5 class="center">RONES JUNTO A BLACK & WHITE</h5>
                    <p class= "parrafoJustificado">
                        <span>
                            <blue>Auditor dice:</blue>
                        </span>
                        @if ($reporte->ron_byw == 'ron_byw_si')
                            La marca <strong> Black & White </strong> esta ubicada correctamente junto a
                            los rones de la competencia
                            @if ($reporte->bloquebyw == 'bloquebyw_si')
                                estan dispuestas en bloque
                            @elseif ($reporte->bloquebyw == 'bloquebyw_no')
                                no estan dispuestas en bloque
                            @endif
                            @if ($reporte->carasbloquebyw == "Ninguna")
                            no hay ninguna cara registrada
                            @elseif ($reporte->carasbloquebyw == "Mas de cinco")
                            hay mas de cinco caras
                            @elseif ($reporte->carasbloquebyw > 0 || $reporte->carasbloquebyw < 6 )
                            hay {{ $reporte->carasbloquebyw}} caras
                            @endif
                        @elseif ($reporte->ron_byw == 'ron_byw_no')
                            La marca <strong> Black & White </strong> no esta ubicada junto a
                            los rones de la competencia
                            @if ($reporte->bloquebyw == 'bloquebyw_si')
                                estan dispuestas en bloque
                            @elseif ($reporte->bloquebyw == 'bloquebyw_no')
                                no estan dispuestas en bloque
                            @endif
                            @if ($reporte->carasbloquebyw == "Ninguna")
                            no hay ninguna cara registrada
                            @elseif ($reporte->carasbloquebyw == "Mas de cinco")
                            hay mas de cinco caras dispersas
                            @elseif ($reporte->carasbloquebyw > 0 || $reporte->carasbloquebyw < 6 )
                            se encontraron {{ $reporte->carasbloquebyw}} caras dispersas,
                            @endif
                        @endif
                    </p>
                    <br>
                    <input type="button" value="Modificar rones junto a B&W" data-target="#CompRonvsBlackModal"
                        data-toggle="modal" class="btnComp2Modal" onclick="seeCompRonBlack()">
                    <br>
                    <div class="modal fade" id="CompRonvsBlackModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="ttulo">
                                        <green><span>Ajuste la respuesta según la evidencia </span>
                                        </green>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="col">
                                            <div class="col">
                                                <img src="{{ asset('/storage/ron_b&w.png') }}"
                                                    class="img_botellasComp" />
                                            </div>
                                            <div class="container">
                                                <ul>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <CENTER>
                                                                <h4>BLACK & WHITE ESTA EXHIBIDO JUNTO A LOS RONES DE LA
                                                                    COMPETENCIA?</h4>
                                                            </CENTER>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="ron_byw" id="ron_byw_si" value="ron_byw_si"
                                                                    disabled>
                                                                <label class="form-check-label"
                                                                    for="ron_byw_si">SI</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="ron_byw" id="ron_byw_no" value="ron_byw_no"
                                                                    disabled>
                                                                <label class="form-check-label"
                                                                    for="ron_byw_no">NO</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <CENTER>
                                                                <h4> BLACK & WHITE ESTA UBICADA EN BLOQUE EN LA ESTANTERIA?</h4>
                                                            </CENTER>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="bloquebyw" id="bloquebyw_si" value="bloquebyw_si"
                                                                    disabled>
                                                                <label class="form-check-label"
                                                                    for="bloquebyw_si">SI</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="bloquebyw" id="bloquebyw_no" value="bloquebyw_no"
                                                                    disabled>
                                                                <label class="form-check-label"
                                                                    for="bloquebyw_no">NO</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <CENTER>
                                                                <h4> INDIQUE EL NUMERO DE CARAS QUE ESTAN EN BLOQUE</h4>
                                                            </CENTER>

                                                            <div class="field__body">
                                                                <div class="select-box">
                                                                    <select class="custom-select"  name="carasbloquebyw" id="carasbloquebyw">
                                                                        <option value="" selected disabled>Seleccione las caras que estan en bloque</option>
                                                                        @foreach ($caras as $cara)
                                                                        <option value="{{$cara}}">{{$cara}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                              </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" style="text-align: center">
                                                        <div class="col">
                                                            <br><br>
                                                            <hr>
                                                            <green> <span>Tome foto del producto de la marca</span></green>
                                                            <input type="hidden" id="fotoron_byw"
                                                                name="seleccionron_byw"
                                                                value="auditorias_pics/ron_byw_{{ $reporte->precarga_id }}.png"
                                                                required disabled>
                                                            <input type="file" id="seleccionron_byw"
                                                                name="fotoron_byw" accept="image/*" disabled>
                                                            <img class="card-img-mate" id="imagenron_byw">
                                                            <br><br>
                                                        </div>
                                                    </div>

                                                </ul>
                                            </div><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Continuar</button>
                                </div>
                            </div>
                        </div>
                    </div>


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
                            <li class="bt_li"><button type="button" class="botOn js-zoom-in18"><i
                                        class="fas fa-plus" alt="acercar"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-zoom-out18"><i
                                        class="fas fa-minus" alt="alejar"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-rotate-right18"><i
                                        class="fas fa-redo" alt="giro derecha"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-rotate-left18"><i
                                        class="fas fa-undo" alt="giro izquierda"></i></button></li>
                        </ul>
                        <div style="margin-left: 0.5rem;" id="msgRonBlack">
                            <red>Calidad dice:</red>
                        </div>
                        <input class="noClass" type="text" id="inpRonBlack" name="RonBlack" required>
                    </nat>
                </div>
                <div class="col-8">

                    @if ($reporte->ron_byw == 'ron_byw_si')
                        <img id="imageRonBlack"
                            src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/ron_byw_' . $reporte->precarga_id . '.png'))) }}" />
                    @else
                        <img id="imageNoDisponible" src="{{ asset('img/no_diponible.png') }}" />
                    @endif

                    {{--  @if ($reporte->seleccionron_byw == "public\img\no_diponible.png")
            <img id="imageNoDisponible" src="{{ asset('img/no_diponible.png') }}" />
            @else
            <img id="imageRonBlack"
            src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/ron_byw_' . $reporte->precarga_id . '.png'))) }}" />

            @endif  --}}

                </div>
            </div>
        </ul>
        <hr>
        <ul>
            <div class="row">
                <div class="col-4 card-box-mid">
                    <h5 class="center">RONES JUNTO A JHONNIE WALKER</h5>
                    <p class= "parrafoJustificado">
                        <span>
                            <blue>Auditor dice:</blue>
                        </span>
                        @if ($reporte->ron_jhonny == 'ron_jhonny_si')
                            La marca <strong> Johnnie Walker </strong> esta ubicada correctamente junto a
                            los rones de la competencia
                            @if ($reporte->bloquejohnnie == 'bloquejohnnie_si')
                                estan dispuestas en bloque
                            @elseif ($reporte->bloquejohnnie == 'bloquejohnnie_no')
                                no estan dispuestas en bloque
                            @endif
                            @if ($reporte->carasbloquejohnnie == "Ninguna")
                            no hay ninguna cara registrada
                            @elseif ($reporte->carasbloquejohnnie == "Mas de cinco")
                            hay mas de cinco caras
                            @elseif ($reporte->carasbloquejohnnie > 0 || $reporte->carasbloquejohnnie < 6 )
                            hay {{ $reporte->carasbloquejohnnie}} caras
                            @endif
                        @elseif ($reporte->ron_jhonny == 'ron_jhonny_no')
                            La marca <strong> Johnnie Walker </strong> no esta ubicada junto a
                            los rones de la competencia
                            @if ($reporte->bloquejohnnie == 'bloquejohnnie_si')
                                estan dispuestas en bloque
                            @elseif ($reporte->bloquejohnnie == 'bloquejohnnie_no')
                                no estan dispuestas en bloque
                            @endif
                            @if ($reporte->carasbloquejohnnie == "Ninguna")
                            no hay ninguna cara registrada
                            @elseif ($reporte->carasbloquejohnnie == "Mas de cinco")
                            hay mas de cinco caras dispersas
                            @elseif ($reporte->carasbloquejohnnie > 0 || $reporte->carasbloquejohnnie < 6 )
                            se encontraron {{ $reporte->carasbloquejohnnie}} caras dispersas,
                            @endif
                        @endif
                    </p>
                    <br>
                    <input type="button" value="Modificar rones junto a Jhonnie Walker"
                        data-target="#CompRonvsJhonnieModal" data-toggle="modal" class="btnComp2Modal"
                        onclick="seeCompRonJhonnie()">
                    <br>
                    <div class="modal fade" id="CompRonvsJhonnieModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="ttulo">
                                        <green><span>Ajuste la respuesta según la evidencia </span>
                                        </green>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="col">
                                            <div class="col">
                                                <img src="{{ asset('/storage/ron_jhonny.png') }}"
                                                    class="img_botellasComp" />
                                            </div>
                                            <div class="container">
                                                <ul>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <CENTER>
                                                                <h4>JHONNIE WALKER ESTA EXHIBIDO JUNTO A LOS RONES DE LA
                                                                    COMPETENCIA?</h4>
                                                            </CENTER>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="ron_jhonny" id="ron_jhonny_si"
                                                                    value="ron_jhonny_si" disabled>
                                                                <label class="form-check-label"
                                                                    for="ron_jhonny_si">SI</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="ron_jhonny" id="ron_jhonny_no"
                                                                    value="ron_jhonny_no" disabled>
                                                                <label class="form-check-label"
                                                                    for="ron_jhonny_no">NO</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <CENTER>
                                                                <h4> JOHNNIE WALKER ESTA UBICADA EN BLOQUE EN LA ESTANTERIA?</h4>
                                                            </CENTER>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="bloquejohnnie" id="bloquejohnnie_si" value="bloquejohnnie_si"
                                                                    disabled>
                                                                <label class="form-check-label"
                                                                    for="bloquejohnnie_si">SI</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="bloquejohnnie" id="bloquejohnnie_no" value="bloquejohnnie_no"
                                                                    disabled>
                                                                <label class="form-check-label"
                                                                    for="bloquejohnnie_no">NO</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <CENTER>
                                                                <h4> INDIQUE EL NUMERO DE CARAS QUE ESTAN EN BLOQUE</h4>
                                                            </CENTER>

                                                            <div class="field__body">
                                                                <div class="select-box">
                                                                    <select class="custom-select"  name="carasbloquejohnnie" id="carasbloquejohnnie">
                                                                        <option value="" selected disabled>Seleccione las caras que estan en bloque</option>
                                                                        @foreach ($caras as $cara)
                                                                        <option value="{{$cara}}">{{$cara}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                              </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" style="text-align: center">
                                                        <div class="col">
                                                            <br><br>
                                                            <hr>
                                                            <green> <span>Tome foto de los rones junto a jhonnie walker
                                                                </span></green>
                                                            <input type="hidden" id="fotoron_jhonny"
                                                                name="seleccionron_jhonny"
                                                                value="auditorias_pics/ron_jhonny_{{ $reporte->precarga_id }}.png"
                                                                required disabled>
                                                            <input type="file" id="seleccionron_jhonny"
                                                                name="fotoron_jhonny" accept="image/*" disabled>
                                                            <img class="card-img-mate" id="imagenron_jhonny">
                                                            <br><br>
                                                        </div>
                                                    </div>

                                                </ul>
                                            </div><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Continuar</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
                            <li class="bt_li"><button type="button" class="botOn js-zoom-in19"><i
                                        class="fas fa-plus" alt="acercar"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-zoom-out19"><i
                                        class="fas fa-minus" alt="alejar"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-rotate-right19"><i
                                        class="fas fa-redo" alt="giro derecha"></i></button></li>
                            <li class="bt_li"><button type="button" class="botOn js-rotate-left19"><i
                                        class="fas fa-undo" alt="giro izquierda"></i></button></li>
                        </ul>
                        <div style="margin-left: 0.5rem;" id="msgJhonnie">
                            <input class="noClass" type="text" id="inpJhonnie" name="ronVsJhonnie" required>
                            <red>Calidad dice:</red>
                        </div>
                    </nat>
                </div>
                <div class="col-8">
                    @if ($reporte->ron_jhonny == 'ron_jhonny_si')
                        <img id="imageJhonnie"
                            src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/ron_jhonny_' . $reporte->precarga_id . '.png'))) }}" />
                    @else
                        <img id="imageNoDisponible" src="{{ asset('img/no_diponible.png') }}" />
                    @endif
                </div>
            </div>
        </ul>
        <hr>
        <ul>
            <div class="row">
                <div class="col-4 card-box-mid">
                    <h5 class="center">AGUARDIENTE JUNTO A SMIRNOFF</h5>
                    <p class= "parrafoJustificado">
                        <span>
                            <blue>Auditor dice:</blue>
                        </span>
                        @if ($reporte->aguard_smirnoff == 'aguard_smirnoff_si')
                            La marca <strong> Smirnoff X1 </strong> esta ubicada correctamente junto a
                            los rones de la competencia
                            @if ($reporte->bloquesmirnoff == 'bloquesmirnoff_si')
                                estan dispuestas en bloque
                            @elseif ($reporte->bloquesmirnoff == 'bloquesmirnoff_no')
                                no estan dispuestas en bloque
                            @endif
                            @if ($reporte->carasbloquesmirnoff == "Ninguna")
                            no hay ninguna cara registrada
                            @elseif ($reporte->carasbloquesmirnoff == "Mas de cinco")
                            hay mas de cinco caras
                            @elseif ($reporte->carasbloquesmirnoff > 0 || $reporte->carasbloquesmirnoff < 6 )
                            hay {{ $reporte->carasbloquesmirnoff}} caras
                            @endif
                        @elseif ($reporte->aguard_smirnoff == 'aguard_smirnoff_no')
                            La marca <strong> Smirnoff X1 </strong> no esta ubicada junto a
                            los rones de la competencia
                            @if ($reporte->bloquesmirnoff == 'bloquesmirnoff_si')
                                estan dispuestas en bloque
                            @elseif ($reporte->bloquesmirnoff == 'bloquesmirnoff_no')
                                no estan dispuestas en bloque
                            @endif
                            @if ($reporte->carasbloquesmirnoff == "Ninguna")
                            no hay ninguna cara registrada
                            @elseif ($reporte->carasbloquesmirnoff == "Mas de cinco")
                            hay mas de cinco caras dispersas
                            @elseif ($reporte->carasbloquesmirnoff > 0 || $reporte->carasbloquesmirnoff < 6 )
                            se encontraron {{ $reporte->carasbloquesmirnoff}} caras dispersas,
                            @endif
                        @endif




                    </p>
                    <br>
                    <input type="button" value="Modificar aguardientes junto a Smirnoff"
                        data-target="#CompAguavsSmirModal" data-toggle="modal" class="btnComp2Modal"
                        onclick="seeCompAguaSmir()">
                    <br>
                    <div class="modal fade" id="CompAguavsSmirModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="ttulo">
                                        <green><span>Ajuste la respuesta según la evidencia </span>
                                        </green>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="col">
                                            <div class="col">
                                                <img src="{{ asset('/storage/aguardiente_smirnoff.png') }}"
                                                    class="img_botellasComp" />
                                            </div>
                                            <div class="container">
                                                <ul>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <CENTER>
                                                                <h4>SMIRNOFF ESTA EXHIBIDO JUNTO A LOS AGUARDIENTES DE LA
                                                                    COMPETENCIA?</h4>
                                                            </CENTER>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="aguard_smirnoff" id="aguard_smirnoff_si"
                                                                    value="aguard_smirnoff_si" disabled>
                                                                <label class="form-check-label"
                                                                    for="aguard_smirnoff_si">SI</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="aguard_smirnoff" id="aguard_smirnoff_no"
                                                                    value="aguard_smirnoff_no" disabled>
                                                                <label class="form-check-label"
                                                                    for="aguard_smirnoff_no">NO</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <CENTER>
                                                                <h4> SMIRNOFF ESTA UBICADA EN BLOQUE EN LA ESTANTERIA?</h4>
                                                            </CENTER>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="bloquesmirnoff" id="bloquesmirnoff_si" value="bloquesmirnoff_si"
                                                                    disabled>
                                                                <label class="form-check-label"
                                                                    for="bloquesmirnoff_si">SI</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="bloquesmirnoff" id="bloquesmirnoff_no" value="bloquesmirnoff_no"
                                                                    disabled>
                                                                <label class="form-check-label"
                                                                    for="bloquesmirnoff_no">NO</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <CENTER>
                                                                <h4> INDIQUE EL NUMERO DE CARAS QUE ESTAN EN BLOQUE</h4>
                                                            </CENTER>

                                                            <div class="field__body">
                                                                <div class="select-box">
                                                                    <select class="custom-select"  name="carasbloquesmirnoff" id="carasbloquesmirnoff">
                                                                        <option value="" selected disabled>Seleccione las caras que estan en bloque</option>
                                                                        @foreach ($caras as $cara)
                                                                        <option value="{{$cara}}">{{$cara}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                              </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" style="text-align: center">
                                                        <div class="col">
                                                            <br><br>
                                                            <hr>
                                                            <green> <span>Tome foto de aguardientes junto a Smirnoff </span>
                                                            </green>
                                                            <input type="hidden" id="fotoaguard_smirnoff"
                                                                name="seleccionaguard_smirnoff"
                                                                value="auditorias_pics/aguard_smirnoff_{{ $reporte->precarga_id }}.png"
                                                                required disabled>
                                                            <input type="file" id="seleccionaguard_smirnoff"
                                                                name="fotoaguard_smirnoff" accept="image/*" disabled>
                                                            <img class="card-img-mate" id="imagenaguard_smirnoff">
                                                            <br><br>
                                                        </div>
                                                    </div>
                                                </ul>
                                            </div><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Continuar</button>
                                </div>
                            </div>
                        </div>
                    </div>


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
                            <li class="bt_li"><button type="button" class="botOn js-zoom-in20"><i
                                        class="fas fa-plus" alt="acercar"></i></button></li>
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

                    @if ($reporte->aguard_smirnoff == 'aguard_smirnoff_si')
                        {
                        <img id="imageSmirnoff"
                            src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('auditorias_pics/aguard_smirnoff_' . $reporte->precarga_id . '.png'))) }}" />
                        }
                    @else
                        <img id="imageNoDisponible" src="{{ asset('img/no_diponible.png') }}" />
                    @endif
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
                            <li class="bt_li"><button type="button" class="botOn js-zoom-in21"><i
                                        class="fas fa-plus" alt="acercar"></i></button></li>
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
                        <textarea name="observacionesDetallista" id="observacionesDetallista" cols="60" rows="7">{{ $reporte->observacionesDetallista }}</textarea>
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
                <input type="text" class="form-control" id = "criticidad4" name="criticidad"
                    value="sin errores">
            </div>
        </ul>
        <hr>
        <ul>
            <div class="row">
                <div class="col card-box">
                    <h5 class="center">OBSERVACIONES DE CALIDAD</h5>
                    <p class="parrafoJustificado">
                        <textarea class="comentario" placeholder="Observaciones de calidad" id="observacionesCalidad"
                            name="revisionCalidad" rows="8" maxlength="300" minlength="10" required></textarea>
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
    </div>


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
        function editor() {
            var opcion = $('#tipologia').val();
            if (opcion == 'Otro') {
                $('#divOtroCual').show();
                $('#cual').prop("disabled", false);
            } else {
                $('#divOtroCual').hide();
                $('#cual').prop("disabled", true);
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
                        $('#segmento').prop('disabled', false);
                    }
                } else {
                    msgSegmento.innerText = 'Según la validación, el segmento corresponde';
                    inpSegmento.value = "se audito bien el segmento";
                    inpCriticidadSegmento.value = 0;
                    divSegmento.style.display = "none";
                    $('#segmento').prop('disabled', true);
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
        var divOtroCual = document.getElementById('divOtroCual');
        if (miCheckbox3 != null) {
            miCheckbox3.addEventListener('click', function() {
                if (miCheckbox3.checked) {
                    msgTipologia.innerText = 'la foto de la tipologia no es correcta';
                    if (miCheckbox3.checked = "true") {
                        inpTipologia.value = "se audito mal la tipologia";
                        inpCriticidadTipologia.value = 1;
                        divTipologia.style.display = "block";
                        $('#tipologia').prop('disabled', false);
                    }
                } else {
                    msgTipologia.innerText = 'Según la validación, la tipologia corresponde';
                    inpTipologia.value = "se audito bien la tipologia";
                    inpCriticidadTipologia.value = 0;
                    divTipologia.style.display = "none";
                    divOtroCual.style.display = "none";
                    $('#tipologia').prop('disabled', true);
                }
            });
        }
    </script>

    <script>
        function seeCenefa() {
            $("#cenefa").prop('disabled', false);
            $("#cenefa_visi_si").prop('disabled', false);
            $("#cenefa_visi_no").prop('disabled', false);
            $("#cenefa_colo_si").prop('disabled', false);
            $("#cenefa_colo_no").prop('disabled', false);
            $("#seleccionCenefa").prop('disabled', false);
        }
    </script>

    <script>
        function seeAfiche() {
            $("#afiche").prop('disabled', false);
            $("#afiche_visi_si").prop('disabled', false);
            $("#afiche_visi_no").prop('disabled', false);
            $("#afiche_colo_si").prop('disabled', false);
            $("#afiche_colo_no").prop('disabled', false);
            $("#afiche_combo_si").prop('disabled', false);
            $("#afiche_combo_no").prop('disabled', false);
            $("#marca_combo").prop('disabled', false);
            $("#combox1_si").prop('disabled', false);
            $("#combox1_no").prop('disabled', false);
            $("#combox2_si").prop('disabled', false);
            $("#combox2_no").prop('disabled', false);
            $("#combox3_si").prop('disabled', false);
            $("#combox3_no").prop('disabled', false);
            $("#seleccionAfiche").prop('disabled', false);
        }
    </script>

    <script>
        function seeMarco() {
            $("#marco").prop('disabled', false);
            $("#marco_visi_si").prop('disabled', false);
            $("#marco_visi_no").prop('disabled', false);
            $("#marco_colo_si").prop('disabled', false);
            $("#marco_colo_no").prop('disabled', false);
            $("#divMarco_Img").show();
            $("#seleccionMarco").prop('disabled', false);
        }
    </script>

    <script>
        function seeRompetrafico() {
            $("#rompetraficos").prop('disabled', false);
            $("#prod_rt_visibles_si").prop('disabled', false);
            $("#prod_rt_visibles_no").prop('disabled', false);
            $("#prod_rt_properly_si").prop('disabled', false);
            $("#prod_rt_properly_no").prop('disabled', false);
            $("#divRompetrafico_Img").show();
            $("#seleccionRompetrafico").prop('disabled', false);
        }
    </script>
    <script>
        function seeFaxada() {
            $("#fachadas").prop('disabled', false);
            $("#fachadas_visi_si").prop('disabled', false);
            $("#fachadas_visi_no").prop('disabled', false);
            $("#fachadas_colo_si").prop('disabled', false);
            $("#fachadas_colo_no").prop('disabled', false);
            $("#divFachada_Img").show();
            $("#seleccionFaxada").prop('disabled', false);
        }
    </script>

    <script>
        function seeHielera() {
            $("#hielera").prop('disabled', false);
            $("#hl_con_prod_si").prop('disabled', false);
            $("#hl_con_prod_no").prop('disabled', false);
            $("#prod_hl_visible_si").prop('disabled', false);
            $("#prod_hl_visible_no").prop('disabled', false);
            $("#prod_hl_danadas_si").prop('disabled', false);
            $("#prod_hl_danadas_no").prop('disabled', false);
            $("#divHielera_Img").show();
            $("#seleccionHielera").prop('disabled', false);
        }
    </script>
    <script>
        function seeBase_H() {
            $("#bases_h").prop('disabled', false);
            $("#prod_baseshl_visible_si").prop('disabled', false);
            $("#prod_baseshl_visible_no").prop('disabled', false);
            $("#prod_baseshl_danadas_si").prop('disabled', false);
            $("#prod_baseshl_danadas_no").prop('disabled', false);
            $("#baseshl_con_prod_si").prop('disabled', false);
            $("#baseshl_con_prod_no").prop('disabled', false);
            $("#divBaseHielera_Img").show();
            $("#seleccionBase_h").prop('disabled', false);
        }
    </script>


    <script>
        function seeDosificadorD() {
            $("#dosificadorD").prop('disabled', false);
            $("#prod_dsD_visibles_si").prop('disabled', false);
            $("#prod_dsD_visibles_no").prop('disabled', false);
            $("#prod_dsD_danados_si").prop('disabled', false);
            $("#prod_dsD_danados_no").prop('disabled', false);
            $("#prod_dsD_diferentes_si").prop('disabled', false);
            $("#prod_dsD_diferentes_no").prop('disabled', false);
            $("#divDosificadorD").show();
            $("#seleccionDosificadorD").prop('disabled', false);
        }
    </script>
    <script>
        function seeDosificadorS() {
            $("#dosificadorS").prop('disabled', false);
            $("#prod_dsS_visibles_si").prop('disabled', false);
            $("#prod_dsS_visibles_no").prop('disabled', false);
            $("#prod_dsS_danados_si").prop('disabled', false);
            $("#prod_dsS_danados_no").prop('disabled', false);
            $("#prod_dsS_diferentes_si").prop('disabled', false);
            $("#prod_dsS_diferentes_no").prop('disabled', false);
            $("#divDosificadorS").show();
            $("#seleccionDosificadorS").prop('disabled', false);
        }
    </script>
    <script>
        function seeBranding() {
            $("#branding").prop('disabled', false);
            $("#branding_visible_si").prop('disabled', false);
            $("#branding_visible_no").prop('disabled', false);
            $("#branding_danados_si").prop('disabled', false);
            $("#branding_danados_no").prop('disabled', false);
            $("#divBrandingPic").show();
            $("#seleccionBranding").prop('disabled', false);
        }
    </script>

    <script>
        function seeVasos() {
            $("#vasos").prop('disabled', false);
            $("#vasos_visibles_si").prop('disabled', false);
            $("#vasos_visibles_no").prop('disabled', false);
            $("#vasos_quebrados_si").prop('disabled', false);
            $("#vasos_quebrados_no").prop('disabled', false);
            $("#divVasosPic").show();
            $("#seleccionVasos").prop('disabled', false);
        }
    </script>



    <script>
        function seeBlack1000() {
            $("#divBlack1000").show();
            $("#caras_bAndw1000").prop('disabled', false);
            $("#bAndw1000").prop('disabled', false);
            $("#btnblack1000").hide();
        }
    </script>
    <script>
        function seeBlack700() {
            $("#divBlack700").show();
            $("#caras_bAndw700").prop('disabled', false);
            $("#bAndw700").prop('disabled', false);
            $("#btnblack700").hide();
        }
    </script>
    <script>
        function seeBlack375() {
            $("#divBlack375").show();
            $("#caras_bAndw375").prop('disabled', false);
            $("#bAndw375").prop('disabled', false);
            $("#btnblack375").hide();
        }
    </script>

    <script>
        function seeSmirnoff700() {
            $("#divSmirnoff700").show();
            $("#caras_smirnoff700").prop('disabled', false);
            $("#smirnoff700").prop('disabled', false);
            $("#btnsmirnoff700").hide();
        }
    </script>
    <script>
        function seeSmirnoff375() {
            $("#divSmirnoff375").show();
            $("#caras_smirnoff375").prop('disabled', false);
            $("#smirnoff375").prop('disabled', false);
            $("#btnsmirnoff375").hide();
        }
    </script>

    <script>
        function seeSmirnoff_ns700() {
            $("#divSmirnoff_ns700").show();
            $("#caras_smirnoff_ns700").prop('disabled', false);
            $("#smirnoff_ns700").prop('disabled', false);
            $("#btnsmirnoff_ns700").hide();
        }
    </script>
    <script>
        function seeSmirnoff_ns375() {
            $("#divSmirnoff_ns375").show();
            $("#caras_smirnoff_ns375").prop('disabled', false);
            $("#smirnoff_ns375").prop('disabled', false);
            $("#btnsmirnoff_ns375").hide();
        }
    </script>



    <script>
        function seeJhonnie1000() {
            $("#divjhonnie1000").show();
            $("#caras_jhonnie1000").prop('disabled', false);
            $("#jhonnie1000").prop('disabled', false);
            $("#btnJhonnie1000").hide();
        }
    </script>
    <script>
        function seeJhonnie700() {
            $("#divJhonnie700").show();
            $("#caras_jhonnie700").prop('disabled', false);
            $("#jhonnie700").prop('disabled', false);
            $("#btnJhonnie700").hide();
        }
    </script>
    <script>
        function seeJhonnie375() {
            $("#divJhonnie375").show();
            $("#caras_jhonnie375").prop('disabled', false);
            $("#jhonnie375").prop('disabled', false);
            $("#btnJhonnie375").hide();
        }
    </script>

    <script>
        function seeOldParr700() {
            $("#divOldParr750").show();
            $("#caras_oldparr750").prop('disabled', false);
            $("#oldparr750").prop('disabled', false);
            $("#btnOldParr750").hide();
        }
    </script>



    <script>
        function seeBuchannas700() {
            $("#divBuchannas700").show();
            $("#caras_buchannas700").prop('disabled', false);
            $("#buchannas700").prop('disabled', false);
            $("#btnBuchannas700").hide();
        }
    </script>
    <script>
        function seeBuchannas375() {
            $("#divBuchannas375").show();
            $("#caras_buchannas375").prop('disabled', false);
            $("#buchannas375").prop('disabled', false);
            $("#btnBuchannas375").hide();
        }
    </script>
    <script>
        function seeCompRon() {
            $("#hay_ron").prop('disabled', false);
            $("#comp_ron1").prop('disabled', false);
            $("#precio_comp_ron1").prop('disabled', false);
            $("#comp_ron2").prop('disabled', false);
            $("#precio_comp_ron2").prop('disabled', false);
            $("#caras_comp_ron").prop('disabled', false);
            $("#seleccionLinealR").prop('disabled', false);
        }
    </script>
    <script>
        function seeCompAgua() {
            $("#hay_aguardiente").prop('disabled', false);
            $("#comp_aguard1").prop('disabled', false);
            $("#precio_comp_aguardiente1").prop('disabled', false);
            $("#comp_aguard2").prop('disabled', false);
            $("#precio_comp_aguardiente2").prop('disabled', false);
            $("#caras_comp_aguardiente").prop('disabled', false);
            $("#seleccionLinealA").prop('disabled', false);
            $("#fotoLinealA").prop('disabled', false);
        }
    </script>
    <script>
        function seeCompRonBlack() {
            $("#ron_byw_si").prop('disabled', false);
            $("#bloquebyw_si").prop('disabled', false);
            $("#bloquebyw_no").prop('disabled', false);
            $("#carasbloquebyw").prop('disabled', false);
            $("#ron_byw_no").prop('disabled', false);
            $("#seleccionron_byw").prop('disabled', false);
            $("#fotoron_byw").prop('disabled', false);
        }
    </script>
    <script>
        function seeCompRonJhonnie() {
            $("#ron_jhonny_si").prop('disabled', false);
            $("#ron_jhonny_no").prop('disabled', false);
            $("#bloquejohnnie_si").prop('disabled', false);
            $("#bloquejohnnie_no").prop('disabled', false);
            $("#carasbloquejohnnie").prop('disabled', false);
            $("#seleccionron_jhonny").prop('disabled', false);
            $("#fotoron_jhonny").prop('disabled', false);
        }
    </script>

    <script>
        function seeCompAguaSmir() {
            $("#aguard_smirnoff_si").prop('disabled', false);
            $("#aguard_smirnoff_no").prop('disabled', false);
            $("#bloquesmirnoff_si").prop('disabled', false);
            $("#bloquesmirnoff_no").prop('disabled', false);
            $("#carasbloquesmirnoff").prop('disabled', false);
            $("#seleccionaguard_smirnoff").prop('disabled', false);
            $("#fotoaguard_smirnoff").prop('disabled', false);
        }
    </script>



    <script>
        document.getElementById("precio_comp_ron1").addEventListener("keyup", function(e) {
            document.getElementById("texto14").innerHTML = NumeroALetras(this.value);
        });


        function Unidades(num) {

            switch (num) {
                case 1:
                    return "UN";
                case 2:
                    return "DOS";
                case 3:
                    return "TRES";
                case 4:
                    return "CUATRO";
                case 5:
                    return "CINCO";
                case 6:
                    return "SEIS";
                case 7:
                    return "SIETE";
                case 8:
                    return "OCHO";
                case 9:
                    return "NUEVE";
            }

            return "";
        }

        function Decenas(num) {

            decena = Math.floor(num / 10);
            unidad = num - (decena * 10);

            switch (decena) {
                case 1:
                    switch (unidad) {
                        case 0:
                            return "DIEZ";
                        case 1:
                            return "ONCE";
                        case 2:
                            return "DOCE";
                        case 3:
                            return "TRECE";
                        case 4:
                            return "CATORCE";
                        case 5:
                            return "QUINCE";
                        default:
                            return "DIECI" + Unidades(unidad);
                    }
                case 2:
                    switch (unidad) {
                        case 0:
                            return "VEINTE";
                        default:
                            return "VEINTI" + Unidades(unidad);
                    }
                case 3:
                    return DecenasY("TREINTA", unidad);
                case 4:
                    return DecenasY("CUARENTA", unidad);
                case 5:
                    return DecenasY("CINCUENTA", unidad);
                case 6:
                    return DecenasY("SESENTA", unidad);
                case 7:
                    return DecenasY("SETENTA", unidad);
                case 8:
                    return DecenasY("OCHENTA", unidad);
                case 9:
                    return DecenasY("NOVENTA", unidad);
                case 0:
                    return Unidades(unidad);
            }
        } //Unidades()

        function DecenasY(strSin, numUnidades) {
            if (numUnidades > 0)
                return strSin + " Y " + Unidades(numUnidades)

            return strSin;
        } //DecenasY()

        function Centenas(num) {

            centenas = Math.floor(num / 100);
            decenas = num - (centenas * 100);

            switch (centenas) {
                case 1:
                    if (decenas > 0)
                        return "CIENTO " + Decenas(decenas);
                    return "CIEN";
                case 2:
                    return "DOSCIENTOS " + Decenas(decenas);
                case 3:
                    return "TRESCIENTOS " + Decenas(decenas);
                case 4:
                    return "CUATROCIENTOS " + Decenas(decenas);
                case 5:
                    return "QUINIENTOS " + Decenas(decenas);
                case 6:
                    return "SEISCIENTOS " + Decenas(decenas);
                case 7:
                    return "SETECIENTOS " + Decenas(decenas);
                case 8:
                    return "OCHOCIENTOS " + Decenas(decenas);
                case 9:
                    return "NOVECIENTOS " + Decenas(decenas);
            }

            return Decenas(decenas);
        } //Centenas()

        function Seccion(num, divisor, strSingular, strPlural) {
            cientos = Math.floor(num / divisor)
            resto = num - (cientos * divisor)

            letras = "";

            if (cientos > 0)
                if (cientos > 1)
                    letras = Centenas(cientos) + " " + strPlural;
                else
                    letras = strSingular;

            if (resto > 0)
                letras += "";

            return letras;
        } //Seccion()

        function Miles(num) {
            divisor = 1000;
            cientos = Math.floor(num / divisor)
            resto = num - (cientos * divisor)

            strMiles = Seccion(num, divisor, "MIL", "MIL");
            strCentenas = Centenas(resto);

            if (strMiles == "")
                return strCentenas;

            return strMiles + " " + strCentenas;

            //return Seccion(num, divisor, "UN MIL", "MIL") + " " + Centenas(resto);
        } //Miles()

        function Millones(num) {
            divisor = 1000000;
            cientos = Math.floor(num / divisor)
            resto = num - (cientos * divisor)

            strMillones = Seccion(num, divisor, "UN MILLON", "MILLONES");
            strMiles = Miles(resto);

            if (strMillones == "")
                return strMiles;

            return strMillones + " " + strMiles;

            //return Seccion(num, divisor, "UN MILLON", "MILLONES") + " " + Miles(resto);
        } //Millones()

        function NumeroALetras(num, centavos) {
            var data = {
                numero: num,
                enteros: Math.floor(num),
                centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
                letrasCentavos: "",
            };
            if (centavos == undefined || centavos == false) {
                data.letrasMonedaPlural = "PESOS";
                data.letrasMonedaSingular = "PESO";
            } else {
                data.letrasMonedaPlural = "CENTAVOS";
                data.letrasMonedaSingular = "CENTAVO";
            }

            if (data.centavos > 0)
                data.letrasCentavos = "CON " + NumeroALetras(data.centavos, true);

            if (data.enteros == 0)
                return "CERO " + data.letrasMonedaPlural + " " + data.letrasCentavos;
            if (data.enteros == 1)
                return Millones(data.enteros) + " " + data.letrasMonedaSingular + " " + data.letrasCentavos;
            else
                return Millones(data.enteros) + " " + data.letrasMonedaPlural + " " + data.letrasCentavos;
        } //NumeroALetras()
    </script>

    <script>
        document.getElementById("precio_comp_ron2").addEventListener("keyup", function(e) {
            document.getElementById("texto15").innerHTML = NumeroALetras(this.value);
        });


        function Unidades(num) {

            switch (num) {
                case 1:
                    return "UN";
                case 2:
                    return "DOS";
                case 3:
                    return "TRES";
                case 4:
                    return "CUATRO";
                case 5:
                    return "CINCO";
                case 6:
                    return "SEIS";
                case 7:
                    return "SIETE";
                case 8:
                    return "OCHO";
                case 9:
                    return "NUEVE";
            }

            return "";
        }

        function Decenas(num) {

            decena = Math.floor(num / 10);
            unidad = num - (decena * 10);

            switch (decena) {
                case 1:
                    switch (unidad) {
                        case 0:
                            return "DIEZ";
                        case 1:
                            return "ONCE";
                        case 2:
                            return "DOCE";
                        case 3:
                            return "TRECE";
                        case 4:
                            return "CATORCE";
                        case 5:
                            return "QUINCE";
                        default:
                            return "DIECI" + Unidades(unidad);
                    }
                case 2:
                    switch (unidad) {
                        case 0:
                            return "VEINTE";
                        default:
                            return "VEINTI" + Unidades(unidad);
                    }
                case 3:
                    return DecenasY("TREINTA", unidad);
                case 4:
                    return DecenasY("CUARENTA", unidad);
                case 5:
                    return DecenasY("CINCUENTA", unidad);
                case 6:
                    return DecenasY("SESENTA", unidad);
                case 7:
                    return DecenasY("SETENTA", unidad);
                case 8:
                    return DecenasY("OCHENTA", unidad);
                case 9:
                    return DecenasY("NOVENTA", unidad);
                case 0:
                    return Unidades(unidad);
            }
        } //Unidades()

        function DecenasY(strSin, numUnidades) {
            if (numUnidades > 0)
                return strSin + " Y " + Unidades(numUnidades)

            return strSin;
        } //DecenasY()

        function Centenas(num) {

            centenas = Math.floor(num / 100);
            decenas = num - (centenas * 100);

            switch (centenas) {
                case 1:
                    if (decenas > 0)
                        return "CIENTO " + Decenas(decenas);
                    return "CIEN";
                case 2:
                    return "DOSCIENTOS " + Decenas(decenas);
                case 3:
                    return "TRESCIENTOS " + Decenas(decenas);
                case 4:
                    return "CUATROCIENTOS " + Decenas(decenas);
                case 5:
                    return "QUINIENTOS " + Decenas(decenas);
                case 6:
                    return "SEISCIENTOS " + Decenas(decenas);
                case 7:
                    return "SETECIENTOS " + Decenas(decenas);
                case 8:
                    return "OCHOCIENTOS " + Decenas(decenas);
                case 9:
                    return "NOVECIENTOS " + Decenas(decenas);
            }

            return Decenas(decenas);
        } //Centenas()

        function Seccion(num, divisor, strSingular, strPlural) {
            cientos = Math.floor(num / divisor)
            resto = num - (cientos * divisor)

            letras = "";

            if (cientos > 0)
                if (cientos > 1)
                    letras = Centenas(cientos) + " " + strPlural;
                else
                    letras = strSingular;

            if (resto > 0)
                letras += "";

            return letras;
        } //Seccion()

        function Miles(num) {
            divisor = 1000;
            cientos = Math.floor(num / divisor)
            resto = num - (cientos * divisor)

            strMiles = Seccion(num, divisor, "MIL", "MIL");
            strCentenas = Centenas(resto);

            if (strMiles == "")
                return strCentenas;

            return strMiles + " " + strCentenas;

            //return Seccion(num, divisor, "UN MIL", "MIL") + " " + Centenas(resto);
        } //Miles()

        function Millones(num) {
            divisor = 1000000;
            cientos = Math.floor(num / divisor)
            resto = num - (cientos * divisor)

            strMillones = Seccion(num, divisor, "UN MILLON", "MILLONES");
            strMiles = Miles(resto);

            if (strMillones == "")
                return strMiles;

            return strMillones + " " + strMiles;

            //return Seccion(num, divisor, "UN MILLON", "MILLONES") + " " + Miles(resto);
        } //Millones()

        function NumeroALetras(num, centavos) {
            var data = {
                numero: num,
                enteros: Math.floor(num),
                centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
                letrasCentavos: "",
            };
            if (centavos == undefined || centavos == false) {
                data.letrasMonedaPlural = "PESOS";
                data.letrasMonedaSingular = "PESO";
            } else {
                data.letrasMonedaPlural = "CENTAVOS";
                data.letrasMonedaSingular = "CENTAVO";
            }

            if (data.centavos > 0)
                data.letrasCentavos = "CON " + NumeroALetras(data.centavos, true);

            if (data.enteros == 0)
                return "CERO " + data.letrasMonedaPlural + " " + data.letrasCentavos;
            if (data.enteros == 1)
                return Millones(data.enteros) + " " + data.letrasMonedaSingular + " " + data.letrasCentavos;
            else
                return Millones(data.enteros) + " " + data.letrasMonedaPlural + " " + data.letrasCentavos;
        } //NumeroALetras()
    </script>
    <script>
        document.getElementById("precio_comp_aguardiente1").addEventListener("keyup", function(e) {
            document.getElementById("texto16").innerHTML = NumeroALetras(this.value);
        });


        function Unidades(num) {

            switch (num) {
                case 1:
                    return "UN";
                case 2:
                    return "DOS";
                case 3:
                    return "TRES";
                case 4:
                    return "CUATRO";
                case 5:
                    return "CINCO";
                case 6:
                    return "SEIS";
                case 7:
                    return "SIETE";
                case 8:
                    return "OCHO";
                case 9:
                    return "NUEVE";
            }

            return "";
        }

        function Decenas(num) {

            decena = Math.floor(num / 10);
            unidad = num - (decena * 10);

            switch (decena) {
                case 1:
                    switch (unidad) {
                        case 0:
                            return "DIEZ";
                        case 1:
                            return "ONCE";
                        case 2:
                            return "DOCE";
                        case 3:
                            return "TRECE";
                        case 4:
                            return "CATORCE";
                        case 5:
                            return "QUINCE";
                        default:
                            return "DIECI" + Unidades(unidad);
                    }
                case 2:
                    switch (unidad) {
                        case 0:
                            return "VEINTE";
                        default:
                            return "VEINTI" + Unidades(unidad);
                    }
                case 3:
                    return DecenasY("TREINTA", unidad);
                case 4:
                    return DecenasY("CUARENTA", unidad);
                case 5:
                    return DecenasY("CINCUENTA", unidad);
                case 6:
                    return DecenasY("SESENTA", unidad);
                case 7:
                    return DecenasY("SETENTA", unidad);
                case 8:
                    return DecenasY("OCHENTA", unidad);
                case 9:
                    return DecenasY("NOVENTA", unidad);
                case 0:
                    return Unidades(unidad);
            }
        } //Unidades()

        function DecenasY(strSin, numUnidades) {
            if (numUnidades > 0)
                return strSin + " Y " + Unidades(numUnidades)

            return strSin;
        } //DecenasY()

        function Centenas(num) {

            centenas = Math.floor(num / 100);
            decenas = num - (centenas * 100);

            switch (centenas) {
                case 1:
                    if (decenas > 0)
                        return "CIENTO " + Decenas(decenas);
                    return "CIEN";
                case 2:
                    return "DOSCIENTOS " + Decenas(decenas);
                case 3:
                    return "TRESCIENTOS " + Decenas(decenas);
                case 4:
                    return "CUATROCIENTOS " + Decenas(decenas);
                case 5:
                    return "QUINIENTOS " + Decenas(decenas);
                case 6:
                    return "SEISCIENTOS " + Decenas(decenas);
                case 7:
                    return "SETECIENTOS " + Decenas(decenas);
                case 8:
                    return "OCHOCIENTOS " + Decenas(decenas);
                case 9:
                    return "NOVECIENTOS " + Decenas(decenas);
            }

            return Decenas(decenas);
        } //Centenas()

        function Seccion(num, divisor, strSingular, strPlural) {
            cientos = Math.floor(num / divisor)
            resto = num - (cientos * divisor)

            letras = "";

            if (cientos > 0)
                if (cientos > 1)
                    letras = Centenas(cientos) + " " + strPlural;
                else
                    letras = strSingular;

            if (resto > 0)
                letras += "";

            return letras;
        } //Seccion()

        function Miles(num) {
            divisor = 1000;
            cientos = Math.floor(num / divisor)
            resto = num - (cientos * divisor)

            strMiles = Seccion(num, divisor, "MIL", "MIL");
            strCentenas = Centenas(resto);

            if (strMiles == "")
                return strCentenas;

            return strMiles + " " + strCentenas;

            //return Seccion(num, divisor, "UN MIL", "MIL") + " " + Centenas(resto);
        } //Miles()

        function Millones(num) {
            divisor = 1000000;
            cientos = Math.floor(num / divisor)
            resto = num - (cientos * divisor)

            strMillones = Seccion(num, divisor, "UN MILLON", "MILLONES");
            strMiles = Miles(resto);

            if (strMillones == "")
                return strMiles;

            return strMillones + " " + strMiles;

            //return Seccion(num, divisor, "UN MILLON", "MILLONES") + " " + Miles(resto);
        } //Millones()

        function NumeroALetras(num, centavos) {
            var data = {
                numero: num,
                enteros: Math.floor(num),
                centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
                letrasCentavos: "",
            };
            if (centavos == undefined || centavos == false) {
                data.letrasMonedaPlural = "PESOS";
                data.letrasMonedaSingular = "PESO";
            } else {
                data.letrasMonedaPlural = "CENTAVOS";
                data.letrasMonedaSingular = "CENTAVO";
            }

            if (data.centavos > 0)
                data.letrasCentavos = "CON " + NumeroALetras(data.centavos, true);

            if (data.enteros == 0)
                return "CERO " + data.letrasMonedaPlural + " " + data.letrasCentavos;
            if (data.enteros == 1)
                return Millones(data.enteros) + " " + data.letrasMonedaSingular + " " + data.letrasCentavos;
            else
                return Millones(data.enteros) + " " + data.letrasMonedaPlural + " " + data.letrasCentavos;
        } //NumeroALetras()
    </script>


    <script>
        document.getElementById("precio_comp_aguardiente2").addEventListener("keyup", function(e) {
            document.getElementById("texto17").innerHTML = NumeroALetras(this.value);
        });


        function Unidades(num) {

            switch (num) {
                case 1:
                    return "UN";
                case 2:
                    return "DOS";
                case 3:
                    return "TRES";
                case 4:
                    return "CUATRO";
                case 5:
                    return "CINCO";
                case 6:
                    return "SEIS";
                case 7:
                    return "SIETE";
                case 8:
                    return "OCHO";
                case 9:
                    return "NUEVE";
            }

            return "";
        }

        function Decenas(num) {

            decena = Math.floor(num / 10);
            unidad = num - (decena * 10);

            switch (decena) {
                case 1:
                    switch (unidad) {
                        case 0:
                            return "DIEZ";
                        case 1:
                            return "ONCE";
                        case 2:
                            return "DOCE";
                        case 3:
                            return "TRECE";
                        case 4:
                            return "CATORCE";
                        case 5:
                            return "QUINCE";
                        default:
                            return "DIECI" + Unidades(unidad);
                    }
                case 2:
                    switch (unidad) {
                        case 0:
                            return "VEINTE";
                        default:
                            return "VEINTI" + Unidades(unidad);
                    }
                case 3:
                    return DecenasY("TREINTA", unidad);
                case 4:
                    return DecenasY("CUARENTA", unidad);
                case 5:
                    return DecenasY("CINCUENTA", unidad);
                case 6:
                    return DecenasY("SESENTA", unidad);
                case 7:
                    return DecenasY("SETENTA", unidad);
                case 8:
                    return DecenasY("OCHENTA", unidad);
                case 9:
                    return DecenasY("NOVENTA", unidad);
                case 0:
                    return Unidades(unidad);
            }
        } //Unidades()

        function DecenasY(strSin, numUnidades) {
            if (numUnidades > 0)
                return strSin + " Y " + Unidades(numUnidades)

            return strSin;
        } //DecenasY()

        function Centenas(num) {

            centenas = Math.floor(num / 100);
            decenas = num - (centenas * 100);

            switch (centenas) {
                case 1:
                    if (decenas > 0)
                        return "CIENTO " + Decenas(decenas);
                    return "CIEN";
                case 2:
                    return "DOSCIENTOS " + Decenas(decenas);
                case 3:
                    return "TRESCIENTOS " + Decenas(decenas);
                case 4:
                    return "CUATROCIENTOS " + Decenas(decenas);
                case 5:
                    return "QUINIENTOS " + Decenas(decenas);
                case 6:
                    return "SEISCIENTOS " + Decenas(decenas);
                case 7:
                    return "SETECIENTOS " + Decenas(decenas);
                case 8:
                    return "OCHOCIENTOS " + Decenas(decenas);
                case 9:
                    return "NOVECIENTOS " + Decenas(decenas);
            }

            return Decenas(decenas);
        } //Centenas()

        function Seccion(num, divisor, strSingular, strPlural) {
            cientos = Math.floor(num / divisor)
            resto = num - (cientos * divisor)

            letras = "";

            if (cientos > 0)
                if (cientos > 1)
                    letras = Centenas(cientos) + " " + strPlural;
                else
                    letras = strSingular;

            if (resto > 0)
                letras += "";

            return letras;
        } //Seccion()

        function Miles(num) {
            divisor = 1000;
            cientos = Math.floor(num / divisor)
            resto = num - (cientos * divisor)

            strMiles = Seccion(num, divisor, "MIL", "MIL");
            strCentenas = Centenas(resto);

            if (strMiles == "")
                return strCentenas;

            return strMiles + " " + strCentenas;

            //return Seccion(num, divisor, "UN MIL", "MIL") + " " + Centenas(resto);
        } //Miles()

        function Millones(num) {
            divisor = 1000000;
            cientos = Math.floor(num / divisor)
            resto = num - (cientos * divisor)

            strMillones = Seccion(num, divisor, "UN MILLON", "MILLONES");
            strMiles = Miles(resto);

            if (strMillones == "")
                return strMiles;

            return strMillones + " " + strMiles;

            //return Seccion(num, divisor, "UN MILLON", "MILLONES") + " " + Miles(resto);
        } //Millones()

        function NumeroALetras(num, centavos) {
            var data = {
                numero: num,
                enteros: Math.floor(num),
                centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
                letrasCentavos: "",
            };
            if (centavos == undefined || centavos == false) {
                data.letrasMonedaPlural = "PESOS";
                data.letrasMonedaSingular = "PESO";
            } else {
                data.letrasMonedaPlural = "CENTAVOS";
                data.letrasMonedaSingular = "CENTAVO";
            }

            if (data.centavos > 0)
                data.letrasCentavos = "CON " + NumeroALetras(data.centavos, true);

            if (data.enteros == 0)
                return "CERO " + data.letrasMonedaPlural + " " + data.letrasCentavos;
            if (data.enteros == 1)
                return Millones(data.enteros) + " " + data.letrasMonedaSingular + " " + data.letrasCentavos;
            else
                return Millones(data.enteros) + " " + data.letrasMonedaPlural + " " + data.letrasCentavos;
        } //NumeroALetras()
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
                        inpCenefaVisi.value = "se audito mal la visibilidad de la cenefa";
                        inpCriticidadCenefaVisi.value = 1;
                        EditCenefaVisi.style.display = "block";
                        $('#cenefa_visi').prop('disabled', false);
                    }
                } else {
                    msgCenefaVisi.innerText = 'Según la validación, la cenefa es visible';
                    inpCenefaVisi.value = "se audito bien la visibilidad de la cenefa";
                    inpCriticidadCenefaVisi.value = 0;
                    EditCenefaVisi.style.display = "none";
                    $('#cenefa_visi').prop('disabled', true);
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
                        $('#cenefa_colo').prop('disabled', false);
                    }
                } else {
                    msgCenefaColo.innerText = 'La cenefa esta bien colocada';
                    inpCenefaColo.value = "se audito bien la colocación de la cenefa";
                    inpCriticidadCenefaColo.value = 0;
                    EditCenefaColo.style.display = "none";
                    $('#cenefa_colo').prop('disabled', true);
                }
            });
        }
    </script>


    <script>
        const $seleccionCenefa = document.querySelector("#seleccionCenefa"),
            $imagenCenefa = document.querySelector("#imagenCenefa");
        $seleccionCenefa.addEventListener("change", () => {
            const archivos = $seleccionCenefa.files;
            if (!archivos || !archivos.length) {
                $imagenCenefa.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenCenefa.src = objectURL;
        });
    </script>
    <script>
        const $seleccionAfiche = document.querySelector("#seleccionAfiche"),
            $imagenAfiche = document.querySelector("#imagenAfiche");
        $seleccionAfiche.addEventListener("change", () => {
            const archivos = $seleccionAfiche.files;
            if (!archivos || !archivos.length) {
                $imagenAfiche.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenAfiche.src = objectURL;
        });
    </script>
    <script>
        const $seleccionMarco = document.querySelector("#seleccionMarco"),
            $imagenMarco = document.querySelector("#imagenMarco");
        $seleccionMarco.addEventListener("change", () => {
            const archivos = $seleccionMarco.files;
            if (!archivos || !archivos.length) {
                $imagenMarco.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenMarco.src = objectURL;
        });
    </script>
    <script>
        const $seleccionRompetrafico = document.querySelector("#seleccionRompetrafico"),
            $imagenRompetrafico = document.querySelector("#imagenRompetrafico");
        $seleccionRompetrafico.addEventListener("change", () => {
            const archivos = $seleccionRompetrafico.files;
            if (!archivos || !archivos.length) {
                $imagenRompetrafico.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenRompetrafico.src = objectURL;
        });
    </script>
    <script>
        const $seleccionFaxada = document.querySelector("#seleccionFaxada"),
            $imagenFaxada = document.querySelector("#imagenFaxada");
        $seleccionFaxada.addEventListener("change", () => {
            const archivos = $seleccionFaxada.files;
            if (!archivos || !archivos.length) {
                $imagenFaxada.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenFaxada.src = objectURL;
        });
    </script>
    <script>
        const $seleccionHielera = document.querySelector("#seleccionHielera"),
            $imagenHielera = document.querySelector("#imagenHielera");
        $seleccionHielera.addEventListener("change", () => {
            const archivos = $seleccionHielera.files;
            if (!archivos || !archivos.length) {
                $imagenHielera.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenHielera.src = objectURL;
        });
    </script>

    <script>
        const $seleccionBase_h = document.querySelector("#seleccionBase_h"),
            $imagenBase_h = document.querySelector("#imagenBase_h");
        $seleccionBase_h.addEventListener("change", () => {
            const archivos = $seleccionBase_h.files;
            if (!archivos || !archivos.length) {
                $imagenBase_h.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenBase_h.src = objectURL;
        });
    </script>
    <script>
        const $seleccionDosificadorD = document.querySelector("#seleccionDosificadorD"),
            $imagenDosificadorD = document.querySelector("#imagenDosificadorD");
        $seleccionDosificadorD.addEventListener("change", () => {
            const archivos = $seleccionDosificadorD.files;
            if (!archivos || !archivos.length) {
                $imagenDosificadorD.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenDosificadorD.src = objectURL;
        });
    </script>
    <script>
        const $seleccionDosificadorS = document.querySelector("#seleccionDosificadorS"),
            $imagenDosificadorS = document.querySelector("#imagenDosificadorS");
        $seleccionDosificadorS.addEventListener("change", () => {
            const archivos = $seleccionDosificadorS.files;
            if (!archivos || !archivos.length) {
                $imagenDosificadorS.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenDosificadorS.src = objectURL;
        });
    </script>
    <script>
        const $seleccionBranding = document.querySelector("#seleccionBranding"),
            $imagenBranding = document.querySelector("#imagenBranding");
        $seleccionBranding.addEventListener("change", () => {
            const archivos = $seleccionBranding.files;
            if (!archivos || !archivos.length) {
                $imagenBranding.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenBranding.src = objectURL;
        });
    </script>
    <script>
        const $seleccionVasos = document.querySelector("#seleccionVasos"),
            $imagenVasos = document.querySelector("#imagenVasos");
        $seleccionVasos.addEventListener("change", () => {
            const archivos = $seleccionVasos.files;
            if (!archivos || !archivos.length) {
                $imagenVasos.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenVasos.src = objectURL;
        });
    </script>
    php
    <script>
        const $seleccionLinealR = document.querySelector("#seleccionLinealR"),
            $imagenLinearlR = document.querySelector("#imagenLinearlR");

        $seleccionLinealR.addEventListener("change", () => {
            const archivos = $seleccionLinealR.files;
            if (!archivos || !archivos.length) {
                $imagenLinearlR.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenLinearlR.src = objectURL;
        });
    </script>
    <script>
        const $seleccionLinealA = document.querySelector("#seleccionLinealA"),
            $imagenLinearlA = document.querySelector("#imagenLinearlA");

        $seleccionLinealA.addEventListener("change", () => {
            const archivos = $seleccionLinealA.files;
            if (!archivos || !archivos.length) {
                $imagenLinearlA.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenLinearlA.src = objectURL;
        });
    </script>
    <script>
        const $seleccionron_jhonny = document.querySelector("#seleccionron_jhonny"),
            $imagenron_jhonny = document.querySelector("#imagenron_jhonny");
        $seleccionron_jhonny.addEventListener("change", () => {
            const archivos = $seleccionron_jhonny.files;
            if (!archivos || !archivos.length) {
                $imagenron_jhonny.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenron_jhonny.src = objectURL;
        });
    </script>
    <script>
        const $seleccionron_byw = document.querySelector("#seleccionron_byw"),
            $imagenron_byw = document.querySelector("#imagenron_byw");
        $seleccionron_byw.addEventListener("change", () => {
            const archivos = $seleccionron_byw.files;
            if (!archivos || !archivos.length) {
                $imagenron_byw.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenron_byw.src = objectURL;
        });
    </script>
    <script>
        const $seleccionaguard_smirnoff = document.querySelector("#seleccionaguard_smirnoff"),
            $imagenaguard_smirnoff = document.querySelector("#imagenaguard_smirnoff");
        $seleccionaguard_smirnoff.addEventListener("change", () => {
            const archivos = $seleccionaguard_smirnoff.files;
            if (!archivos || !archivos.length) {
                $imagenaguard_smirnoff.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenaguard_smirnoff.src = objectURL;
        });
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
                        $('#afiche_visi').prop('disabled', false);
                    }
                } else {
                    msgAficheVisi.innerText = 'Según la validación, el afiche es visible';
                    inpAficheVisi.value = "se audito bien la visibilidad del afiche";
                    criticidadAfiche_visi.value = 0;
                    EditAficheVisi.style.display = "none";
                    $('#afiche_visi').prop('disabled', true);
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
                        $('#afiche_colo').prop('disabled', false);
                    }
                } else {
                    msgAficheColo.innerText = 'El afiche esta bien colocado';
                    inpAficheColo.value = "se audito bien la colocación del afiche";
                    criticidadAfiche_colo.value = 0;
                    EditAficheColo.style.display = "none";
                    $('#afiche_colo').prop('disabled', true);

                }
            });
        }
    </script>
    <script>
        var miCheckbox8 = document.getElementById('checkcross8');
        var msgAficheCombo = document.getElementById('msgAficheCombo');
        var inpAficheCombo = document.getElementById('inpAficheCombo');
        var criticidadAfiche_combo = document.getElementById('criticidadAfiche_combo');
        var EditAficheCombotizado = document.getElementById('EditAficheCombotizado');
        var cardAfiche = document.getElementById('cardAfiche');

        if (miCheckbox8 != null) {
            miCheckbox8.addEventListener('click', function() {
                if (miCheckbox8.checked) {
                    msgAficheCombo.innerText = 'la descripcion de la combotizacion esta errada';
                    if (miCheckbox8.checked = "true") {
                        inpAficheCombo.value = "se audito mal la combotizacion";
                        criticidadAfiche_combo.value = 1;
                        EditAficheCombotizado.style.display = "block";
                        $('#afiche_combo').prop('disabled', false);
                        $('#marca_combo').prop('disabled', false);
                        $('#combox1').prop('disabled', false);
                        $('#combox2').prop('disabled', false);
                        $('#combox3').prop('disabled', false);

                        cardAfiche.style.height = '1500px';
                    }
                } else {
                    msgAficheCombo.innerText = 'La combotización es correcta';
                    inpAficheCombo.value = "se audito bien la combotización";
                    criticidadAfiche_combo.value = 0;
                    EditAficheCombotizado.style.display = "none";
                    $('#afiche_combo').prop('disabled', true);
                    $('#marca_combo').prop('disabled', true);
                    $('#combox1').prop('disabled', true);
                    $('#combox2').prop('disabled', true);
                    $('#combox3').prop('disabled', true);
                    cardAfiche.style.height = '1000px';
                }
            });
        }
    </script>

    {{--  /*9*/  --}}
    <script>
        var miCheckbox9 = document.getElementById('checkcross9');
        var msgMarcoVisi = document.getElementById('msgMarcoVisi');
        var inpMarcoVisi = document.getElementById('inpMarcoVisi');
        var EditMarcoVisi = document.getElementById('EditMarcoVisi');
        var criticidadMarcoVisi = document.getElementById('criticidadMarcoVisi');

        if (miCheckbox9 != null) {
            miCheckbox9.addEventListener('click', function() {
                if (miCheckbox9.checked) {
                    msgMarcoVisi.innerText = 'se confirma que el marco no es visible';
                    if (miCheckbox9.checked = "true") {
                        inpMarcoVisi.value = "se audito mal la visibilidad del marco";
                        criticidadMarcoVisi.value = 1;
                        EditMarcoVisi.style.display = "block";
                        $('#marco_visi').prop('disabled', false);
                    }
                } else {
                    msgMarcoVisi.innerText = 'Según la validación, el marco es visible';
                    inpMarcoVisi.value = "se audito bien la visibilidad del marco";
                    criticidadMarcoVisi.value = 0;
                    EditMarcoVisi.style.display = "none";
                    $('#marco_visi').prop('disabled', true);
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
        var EditMarcoColo = document.getElementById('EditMarcoColo');
        if (miCheckbox10 != null) {
            miCheckbox10.addEventListener('click', function() {
                if (miCheckbox10.checked) {
                    msgMarcoColo.innerText = 'se confirma que el marco no esta bien colocado';
                    if (miCheckbox10.checked = "true") {
                        inpMarcoColo.value = "se tipificico mal la colocación del marco";
                        criticidadMarcoColo.value = 1;
                        EditMarcoColo.style.display = "block";
                        $('#marco_colo').prop('disabled', false);
                    }
                } else {
                    msgMarcoColo.innerText = 'Según la validación, el marco esta bien colocado';
                    inpMarcoColo.value = "se audito bien la colocación del marco";
                    criticidadMarcoColo.value = 0;
                    EditMarcoColo.style.display = "none";
                    $('#marco_colo').prop('disabled', true);
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
        var EditRompeVisi = document.getElementById('EditRompeVisi');
        if (miCheckbox11 != null) {
            miCheckbox11.addEventListener('click', function() {
                if (miCheckbox11.checked) {
                    msgRompeVisi.innerText = 'se confirma que el rompetrafico no es visible';
                    if (miCheckbox11.checked = "true") {
                        inpRompeVisi.value = "se audito mal la visibilidad del rompetrafico";
                        criticidadRompeVisi.value = 1;
                        EditRompeVisi.style.display = "block";
                        $('#rompe_visi').prop('disabled', false);

                    }
                } else {
                    msgRompeVisi.innerText = 'Según la validación, el rompetrafico esta visible';
                    inpRompeVisi.value = "se audito bien la visibilidad del rompetrafico";
                    criticidadRompeVisi.value = 0;
                    EditRompeVisi.style.display = "none";
                    $('#rompe_visi').prop('disabled', true);


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
        var EditRompeColo = document.getElementById('EditRompeColo');

        if (miCheckbox12 != null) {
            miCheckbox12.addEventListener('click', function() {
                if (miCheckbox12.checked) {
                    msgRompeColo.innerText = 'se confirma que el rompetrafico no esta bien colocado';
                    if (miCheckbox12.checked = "true") {
                        inpRompeColo.value = "se audito mal la colocación del rompetrafico";
                        criticidadRompeColo.value = 1;
                        EditRompeColo.style.display = "block";
                        $('#rompe_colo').prop('disabled', false);
                    }
                } else {
                    msgRompeColo.innerText = 'Según la validación, el rompetrafico esta bien colocado';
                    inpRompeColo.value = "se audito bien la colocación del rompetrafico";
                    criticidadRompeColo.value = 0;
                    EditRompeColo.style.display = "none";
                    $('#rompe_colo').prop('disabled', true);
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
        var EditFaxadaVisi = document.getElementById('EditFaxadaVisi');

        if (miCheckbox13 != null) {
            miCheckbox13.addEventListener('click', function() {
                if (miCheckbox13.checked) {
                    msgFaxadaVisi.innerText = 'se confirma que la fachada y los afiches no estan visibles';
                    if (miCheckbox13.checked = "true") {
                        inpFaxadaVisi.value = "se audito mal la visibilidad de la fachada y los avisos";
                        criticidadfachadas_visi.value = 1;
                        EditFaxadaVisi.style.display = "block";
                        $('#fachadas_visi').prop('disabled', false);

                    }
                } else {
                    msgFaxadaVisi.innerText = 'Según la validación, la fachada y los avisos estan visibles';
                    inpFaxadaVisi.value = "se audito bien la visibilidad de la fachada y los avisos";
                    criticidadfachadas_visi.value = 0;
                    EditFaxadaVisi.style.display = "none";
                    $('#fachadas_visi').prop('disabled', true);
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
        var EditFaxadaColo = document.getElementById('EditFaxadaColo');

        if (miCheckbox14 != null) {
            miCheckbox14.addEventListener('click', function() {
                if (miCheckbox14.checked) {
                    msgAFaxadaEstado.innerText = 'se confirma que la fachada y los afiches estan en mal estado';
                    if (miCheckbox14.checked = "true") {
                        inpAFaxadaColo.value = "se audito mal el estado de la fachada y los avisos";
                        criticidadfachadas_colo.value = 1;
                        EditFaxadaColo.style.display = "block";
                        $('#fachadas_colo').prop('disabled', false);
                    }
                } else {
                    msgAFaxadaEstado.innerText =
                        'Según la validación, la fachada y los avisos estan en buen estado';
                    inpAFaxadaEstado.value = "se audito bien el estado de la fachada y los afiches";
                    criticidadfachadas_colo.value = 0;
                    EditFaxadaColo.style.display = "none";
                    $('#fachadas_colo').prop('disabled', true);
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
        var EditHieleraProd = document.getElementById('EditHieleraProd');


        if (miCheckbox15 != null) {
            miCheckbox15.addEventListener('click', function() {
                if (miCheckbox15.checked) {
                    msgHieleraProd.innerText = 'se confirma que la hielera no cuenta con producto de la marca';
                    if (miCheckbox15.checked = "true") {
                        inpHieleraProd.value = "se audito mal el contenido de la hielera";
                        criticidadHieleraProd.value = 1;
                        EditHieleraProd.style.display = "block";
                        $("#hielera_prod").prop('disabled', false);
                    }
                } else {
                    msgHieleraProd.innerText = 'Según la validación, la hielera cuenta con producto de la marca';
                    inpHieleraProd.value = "se audito bien el contenido de la hielera";
                    criticidadHieleraProd.value = 0;
                    EditHieleraProd.style.display = "none";
                    $("#hielera_prod").prop('disabled', true);
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
        var EditHieleraVisi = document.getElementById('EditHieleraVisi');

        if (miCheckbox16 != null) {
            miCheckbox16.addEventListener('click', function() {
                if (miCheckbox16.checked) {
                    msgHieleraVisi.innerText = 'se confirma que la hielera no es visible al publico';
                    if (miCheckbox16.checked = "true") {
                        inpHieleraVisi.value = "se audito mal la visibilidad de la hielera";
                        criticidadHieleraVisi.value = 1;
                        EditHieleraVisi.style.display = "block";
                        $("#hielera_visi").prop('disabled', false);

                    }
                } else {
                    msgHieleraVisi.innerText = 'Según la validación, la hielera esta visible al publico';
                    inpHieleraVisi.value = "se audito bien la visibilidad de la hielera";
                    criticidadHieleraVisi.value = 0;
                    EditHieleraVisi.style.display = "none";
                    $("#hielera_visi").prop('disabled', true);

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
        var EditHieleraEstado = document.getElementById('EditHieleraEstado');

        if (miCheckbox17 != null) {
            miCheckbox17.addEventListener('click', function() {
                if (miCheckbox17.checked) {
                    msgHieleraEstado.innerText = 'se confirma que la hielera no esta en buen estado';
                    if (miCheckbox17.checked = "true") {
                        inpHieleraEstado.value = "se audito mal el estado de la hielera";
                        criticidadHieleraEstado.value = 1;
                        EditHieleraEstado.style.display = "block";
                        $("#hielera_esta").prop('disabled', false);

                    }
                } else {
                    msgHieleraEstado.innerText = 'Según la validación, la hielera esta en buen estado';
                    inpHieleraEstado.value = "se audito bien el estado de la hielera";
                    criticidadHieleraEstado.value = 0;
                    EditHieleraEstado.style.display = "none";
                    $("#hielera_esta").prop('disabled', true);

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
        var EditBaseHieleraProd = document.getElementById('EditBaseHieleraProd');


        if (miCheckbox18 != null) {
            miCheckbox18.addEventListener('click', function() {
                if (miCheckbox18.checked) {
                    msgBsHieProd.innerText = 'la base de la hielera no tiene producto DIAGEO';
                    if (miCheckbox18.checked = "true") {
                        inpBsHieProd.value = "se audito mal el contenido de la base de la hielera";
                        criticidadBsHieProd.value = 1;
                        EditBaseHieleraProd.style.display = "block";
                        $("#baseshl_con_prod").prop('disabled', false);
                    }
                } else {
                    msgBsHieProd.innerText =
                        'Según la validación, la base de la hielera cuenta con producto de la marca';
                    inpBsHieProd.value = "se audito bien el contenido de la base de la hielera";
                    criticidadBsHieProd.value = 0;
                    EditBaseHieleraProd.style.display = "none";
                    $("#baseshl_con_prod").prop('disabled', true);
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
        var EditBaseHieleraVisi = document.getElementById('EditBaseHieleraVisi');


        if (miCheckbox19 != null) {
            miCheckbox19.addEventListener('click', function() {
                if (miCheckbox19.checked) {
                    msgBsHieVisi.innerText = 'se confirma que la base de hielera no esta en buen estado';
                    if (miCheckbox19.checked = "true") {
                        inpBsHieVisi.value = "se tipificico mal el estado la base de la hielera";
                        criticidadBsHieVisi.value = 1;
                        EditBaseHieleraVisi.style.display = "block";
                        $("#prod_baseshl_visible").prop('disabled', false);

                    }
                } else {
                    msgBsHieVisi.innerText = 'Según la validación, la base de la hielera esta en buen estado';
                    inpBsHieVisi.value = "se audito bien el estado de la base de la hielera";
                    criticidadBsHieVisi.value = 0;
                    EditBaseHieleraVisi.style.display = "none";
                    $("#prod_baseshl_visible").prop('disabled', true);

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
        var EditBaseHieleraEstado = document.getElementById('EditBaseHieleraEstado');

        if (miCheckbox20 != null) {
            miCheckbox20.addEventListener('click', function() {
                if (miCheckbox20.checked) {
                    msgBsHieEstado.innerText = 'se confirma que la base de la hielera no esta en buen estado';
                    if (miCheckbox20.checked = "true") {
                        inpBsHieEstado.value = "se audito mal el estado de la base de la hielera";
                        criticidadBsHieEstado.value = 1;
                        EditBaseHieleraEstado.style.display = "block";
                        $("#prod_baseshl_danadas").prop('disabled', false);

                    }
                } else {
                    msgBsHieEstado.innerText = 'Según la validación, la base de la hielera esta en buen estado';
                    inpBsHieEstado.value = "se audito bien el estado de la base de la hielera";
                    criticidadBsHieEstado.value = 0;
                    EditBaseHieleraEstado.style.display = "none";
                    $("#prod_baseshl_danadas").prop('disabled', true);

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
        var EditDosDbVisi = document.getElementById('EditDosDbVisi');
        if (miCheckbox21 != null) {
            miCheckbox21.addEventListener('click', function() {
                if (miCheckbox21.checked) {
                    msgDsDVisi.innerText = 'el dosificador doble no es visible';
                    if (miCheckbox21.checked = "true") {
                        inpDsDVisi.value = "Se audito mal la visibilidad del el dosificador doble";
                        criticidadDosiDVisi.value = 1;
                        EditDosDbVisi.style.display = "block";
                        $("#prod_dsD_visibles").prop('disabled', false);

                    }
                } else {
                    msgDsDVisi.innerText = 'El dosificador doble es visible';
                    inpDsDVisi.value = "se audito bien la visibilidad del dosificador doble";
                    criticidadDosiDVisi.value = 0;
                    EditDosDbVisi.style.display = "none";
                    $("#prod_dsD_visibles").prop('disabled', true);

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
        var EditDosDbProd = document.getElementById('EditDosDbProd');

        if (miCheckbox22 != null) {
            miCheckbox22.addEventListener('click', function() {
                if (miCheckbox22.checked) {
                    msgDsDProd.innerText = 'se confirma que el dosificador doble no cuenta con producto Diageo';
                    if (miCheckbox22.checked = "true") {
                        inpDsDProd.value = "se audito mal el contenido del dosificador doble";
                        criticidadDosiDProd.value = 1;
                        EditDosDbProd.style.display = "block";
                        $("#prod_dsD_diferentes").prop('disabled', false);
                    }
                } else {
                    msgDsDProd.innerText = 'cuenta con productos Diageo';
                    inpDsDProd.value = "se audito bien contenido del dosificador doble";
                    criticidadDosiDProd.value = 0;
                    EditDosDbProd.style.display = "none";
                    $("#prod_dsD_diferentes").prop('disabled', true);
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
        var EditDosDbEstado = document.getElementById('EditDosDbEstado');

        if (miCheckbox23 != null) {
            miCheckbox23.addEventListener('click', function() {
                if (miCheckbox23.checked) {
                    msgDsDEstado.innerText = 'se confirma que el dosificador doble no esta en buen estado';
                    if (miCheckbox23.checked = "true") {
                        inpDsDEstado.value = "se audito mal el estado del dosificador doble";
                        criticidadDosiDEstado.value = 1;
                        EditDosDbEstado.style.display = "block";
                        $("#prod_baseshl_danadas").prop('disabled', false);


                    }
                } else {
                    msgDsDEstado.innerText = 'en general esta en buen estado';
                    inpDsDEstado.value = "se audito bien el estado del dosificador doble";
                    criticidadDosiDEstado.value = 0;
                    EditDosDbEstado.style.display = "none";
                    $("#prod_baseshl_danadas").prop('disabled', true);


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
        var EditDosSVisi = document.getElementById('EditDosSVisi');

        if (miCheckbox24 != null) {
            miCheckbox24.addEventListener('click', function() {
                if (miCheckbox24.checked) {
                    msgDsSVisi.innerText = 'El dosificador sencillo no es visible';
                    if (miCheckbox24.checked = "true") {
                        inpDsSVisi.value = "se audito mal la visibilidad del dosificador sencillo";
                        criticidadDosiSVisi.value = 1;
                        EditDosSVisi.style.display = "block";
                        $("#prod_dsS_visibles").prop('disabled', false);
                    }
                } else {
                    msgDsSVisi.innerText = 'El dosificador sencillo es visible, ';
                    inpDsSVisi.value = "se audito bien la visibilidad del dosificador sencillo";
                    criticidadDosiSVisi.value = 0;
                    EditDosSVisi.style.display = "none";
                    $("#prod_dsS_visibles").prop('disabled', true);

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
        var EditDosSnProd = document.getElementById('EditDosSnProd');
        if (miCheckbox25 != null) {
            miCheckbox25.addEventListener('click', function() {
                if (miCheckbox25.checked) {
                    msgDsSProd.innerText = 'no cuenta con producto Diageo, ';
                    if (miCheckbox25.checked = "true") {
                        inpDsSProd.value = "se audito mal el contenido del dosificador sencillo";
                        criticidadDosiSProd.value = 1;
                        EditDosSnProd.style.display = "block";
                        $("#prod_dsS_diferentes").prop('disabled', false);

                    }
                } else {
                    msgDsSProd.innerText = 'cuenta con productos de la marca';
                    inpDsSProd.value = "se audito bien el contenido del dosificador sencillo";
                    criticidadDosiSProd.value = 0;
                    EditDosSnProd.style.display = "none";
                    $("#prod_dsS_diferentes").prop('disabled', true);

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
        var EditDosSbEstado = document.getElementById('EditDosSbEstado');

        if (miCheckbox26 != null) {
            miCheckbox26.addEventListener('click', function() {
                if (miCheckbox26.checked) {
                    msgDsSEstado.innerText = 'se evidencia deterioro de el dosificador sencillo';
                    if (miCheckbox26.checked = "true") {
                        inpDsSEstado.value = "se audito mal el estado del dosificador sencillo";
                        criticidadDosiSEstado.value = 1;
                        EditDosSbEstado.style.display = "block";
                        $("#prod_dsS_danados").prop('disabled', false);

                    }
                } else {
                    msgDsSEstado.innerText = 'en general esta en buen estado.';
                    inpDsSEstado.value = "se audito bien el estado del dosificador sencillo";
                    criticidadDosiSEstado.value = 0;
                    EditDosSbEstado.style.display = "none";
                    $("#prod_dsS_danados").prop('disabled', true);

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
        var EditBrandingVisi = document.getElementById('EditBrandingVisi');
        if (miCheckbox27 != null) {
            miCheckbox27.addEventListener('click', function() {
                if (miCheckbox27.checked) {
                    msgBrandingVisi.innerText = 'se confirma que el branding no esta visible';
                    if (miCheckbox27.checked = "true") {
                        inpBrandingVisi.value = "se audito mal la visibilidad del branding";
                        criticidadBrandingVisi.value = 1;
                        EditBrandingVisi.style.display = "block";
                        $("#branding_visible").prop('disabled', false);
                    }
                } else {
                    msgBrandingVisi.innerText = 'Según la validación, el branding es visible';
                    inpBrandingVisi.value = "se audito bien la visibilidad del branding";
                    criticidadBrandingVisi.value = 0;
                    EditBrandingVisi.style.display = "none";
                    $("#branding_visible").prop('disabled', true);
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
        var EditBrandingEstado = document.getElementById('EditBrandingEstado');
        if (miCheckbox28 != null) {
            miCheckbox28.addEventListener('click', function() {
                if (miCheckbox28.checked) {
                    msgBrandingEstado.innerText = 'El branding se encuentra en mal estado';
                    if (miCheckbox28.checked = "true") {
                        inpBrandingEstado.value = "se audito mal el estado del branding";
                        criticidadBrandingEstado.value = 1;
                        EditBrandingEstado.style.display = "block";
                        $("#branding_danados").prop('disabled', false);
                    }
                } else {
                    msgBrandingEstado.innerText = 'Según la validación, el branding esta en buen estado';
                    inpBrandingEstado.value = "se audito bien el estado del branding";
                    criticidadBrandingEstado.value = 0;
                    EditBrandingEstado.style.display = "none";
                    $("#branding_danados").prop('disabled', true);
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
        var EditVasosVisi = document.getElementById('EditVasosVisi');
        if (miCheckbox29 != null) {
            miCheckbox29.addEventListener('click', function() {
                if (miCheckbox29.checked) {
                    msgVasosVisi.innerText = 'Los vasos y las copas no son visibles';
                    if (miCheckbox29.checked = "true") {
                        inpVasosVisi.value = "se audito mal la visibilidad de los vasos y copas";
                        criticidadVasosVisi.value = 1;
                        EditVasosVisi.style.display = "block";
                        $('#vasos_visibles').prop('disabled', false)

                    }
                } else {
                    msgVasosVisi.innerText = 'Según la validación, los vasos y las copas son visibles';
                    inpVasosVisi.value = "se audito bien la visibilidad de los vasos y copas";
                    criticidadVasosVisi.value = 0;
                    EditVasosVisi.style.display = "none";
                    $('#vasos_visibles').prop('disabled', true)

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
        var EditVasosEstado = document.getElementById('EditVasosEstado');

        if (miCheckbox30 != null) {
            miCheckbox30.addEventListener('click', function() {
                if (miCheckbox30.checked) {
                    msgVasosEstado.innerText = 'Los vasos y copas estan en mal estado';
                    if (miCheckbox30.checked = "true") {
                        inpVasosEstado.value = "se audito mal el estado de los vasos y copas";
                        criticidadVasosEstado.value = 1;
                        EditVasosEstado.style.display = "block";
                        $('#vasos_quebrados').prop('disabled', false)

                    }
                } else {
                    msgVasosEstado.innerText = 'Los vasos y las copas estan en optimas condiciones';
                    inpVasosEstado.value = "se audito bien el estado de los vasos y copas";
                    criticidadVasosEstado.value = 0;
                    EditVasosEstado.style.display = "none";
                    $('#vasos_quebrados').prop('disabled', true)

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
        var EditCalVisi = document.getElementById('EditCalVisi');

        if (miCheckbox31 != null) {
            miCheckbox31.addEventListener('click', function() {
                if (miCheckbox31.checked) {
                    msgCalMarcVisi.innerText = 'La foto del lineal no muestra los productos DIAGEO correctamente';
                    if (miCheckbox31.checked = "true") {
                        inpCalMarcVisi.value = "se audito mal la visibilidad de los productos del lineal Diageo";
                        criticidadCalMarcVisi.value = 1;
                        EditCalVisi.style.display = "block";
                        $('#cal_marc_visible').prop('disabled', false);

                    }
                } else {
                    msgCalMarcVisi.innerText = 'Se pueden apreciar correctamente los productos de la marca';
                    inpCalMarcVisi.value = "se audito bien la visibilidad de los productos del lineal Diageo";
                    criticidadCalMarcVisi.value = 0;
                    EditCalVisi.style.display = "none";
                    $('#cal_marc_visible').prop('disabled', true);

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
        var EditCalEstado = document.getElementById('EditCalEstado');


        if (miCheckbox32 != null) {
            miCheckbox32.addEventListener('click', function() {
                if (miCheckbox32.checked) {
                    msgCalMarcEstado.innerText = 'Los productos de la marca no estan en buen estado';
                    if (miCheckbox32.checked = "true") {
                        inpCalMarcEstado.value = "se audito mal el estado de los productos del lineal Diageo";
                        criticidadCalMarcEstado.value = 1;
                        EditCalEstado.style.display = "block";
                        $('#cal_marc_danados').prop('disabled', false);

                    }
                } else {
                    msgCalMarcEstado.innerText = 'Los productos de la marca se encuentran en optimas condiciones';
                    inpCalMarcEstado.value = "se audito bien el estado de los productos del lineal Diageo";
                    criticidadCalMarcEstado.value = 0;
                    EditCalEstado.style.display = "none";
                    $('#cal_marc_danados').prop('disabled', true);

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
        var EditCalEtiquetas = document.getElementById('EditCalEtiquetas');
        if (miCheckbox33 != null) {
            miCheckbox33.addEventListener('click', function() {
                if (miCheckbox33.checked) {
                    msgCalMarcEtiqueta.innerText =
                        "La foto del lineal no muestra los productos DIAGEO correctamente";
                    if (miCheckbox33.checked = "true") {
                        criticidadCalMarcEtiqueta.value = 1;
                        inpCalMarcEtiqueta.value = "se audito mal el estado de las etiquetas de la marca Diageo";
                        EditCalEtiquetas.style.display = ("block");
                        $('#cal_marc_et_danados').prop('disabled', false);

                    }
                } else {
                    msgCalMarcEtiqueta.innerText = 'Se pueden apreciar correctamente los productos de la marca';
                    inpCalMarcEtiqueta.value = "se auditor bien el estado de las etiquetas de la marca Diageo";
                    criticidadCalMarcEtiqueta.value = 0;
                    EditCalEtiquetas.style.display = ("none");
                    $('#cal_marc_et_danados').prop('disabled', true);

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
                        'se reporto mal la entrega del gift';
                    if (miCheckbox37.checked = "true") {
                        inpGift.value =
                            "se audito mal la entrega del gift";
                        $("#ingreso11").val(0);

                        criticidadGift.value = 1;
                    }
                } else {
                    msgGift.innerText =
                        'se registro bien la entrega del gift';
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
