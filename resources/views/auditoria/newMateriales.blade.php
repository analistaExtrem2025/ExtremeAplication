@extends('adminlte::page')
@section('title', 'Materiales')

@section('css')

    <link href="https://cdn.jsdelivr.net/css-toggle-switch/latest/toggle-switch.css" rel="stylesheet" />
   {{--   <link href="https://fonts.googleapis.com/css?family=Arapey:400,400i,600|Open+Sans:300" rel="stylesheet">  --}}
    <link href="{{ asset('css/auditoria.css') }}" rel="stylesheet">
@stop
@section('content')
    <br><br>
    <h5><span class="numeros">5</span>VISIBILIDAD FOTO DE EXITO Y CALIDAD</h5>
    {!! Form::model($puntos_auditoria, [
        'route' => ['materiales.update', $puntos_auditoria->id],
        'method' => 'put',
        'enctype' => 'multipart/form-data',
        'files' => 'true',
    ]) !!}

    <input type="hidden" name="precarga_id" value="{{ $puntos_auditoria->precarga_id }}">
    <p>
    <div class="col-12 material">
        <div class="card">
            <div class="ttulo">
                <green><span>Confirme si hay cenefa</span></green>
            </div>
            <div class="col">
                <div class="col">
                    <img class="img_cenefa" src="{{ asset('/storage/cenefa.png') }}" />
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="cenefa_si" name="cenefa" type="radio" value="cenefa_si" />
                        <label for="cenefa_si">SI</label>
                        <input id="cenefa_choose" name="cenefa" type="radio" value="cenefa_choose" checked="checked"
                            disabled />
                        <label for="cenefa_choose">&iquest;Hay Cenefa?</label>
                        <input id="cenefa_no" name="cenefa" type="radio" value="cenefa_no" />
                        <label for="cenefa_no">NO</label>
                        <a></a>
                    </div>
                </div>
                <br>
                <div id="divCenefa" style="display: none">



                    <div class="col">
                        <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                            <input id="cenefa_visi_si" name="cenefa_visi" type="radio" value="cenefa_visi_si" />
                            <label for="cenefa_visi_si">SI</label>
                            <input id="cenefa_visi_choose" name="cenefa_visi" type="radio" value="cenefa_visi_choose"
                                checked="checked" disabled />
                            <label for="cenefa_choose">&iquest;Esta visible al consumidor?</label>
                            <input id="cenefa_visi_no" name="cenefa_visi" type="radio" value="cenefa_visi_no" />
                            <label for="cenefa_visi_no">NO</label>
                            <a></a>
                        </div>
                    </div>
                    <br>
                    <div class="col">
                        <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                            <input id="cenefa_colo_si" name="cenefa_colo" type="radio" value="cenefa_colo_si" />
                            <label for="cenefa_colo_si">SI</label>
                            <input id="cenefa_colo_choose" name="cenefa_colo" type="radio" value="cenefa_colo_choose"
                                checked="checked" disabled />
                            <label for="cenefa_choose">&iquest;Esta colocada de manera adecuada pegado, resaltando y enmarcando productos Diageo?</label>
                            <input id="cenefa_colo_no" name="cenefa_colo" type="radio" value="cenefa_colo_no" />
                            <label for="cenefa_colo_no">NO</label>
                            <a></a>
                        </div>
                        <br><br>
                    </div>
                    <div class="row" style="text-align: center">
                        <div class="col">
                            <br><br>
                            <hr>
                            <green> <span>Tome foto de la cenefa </span></green>
                            <input type="file" id="seleccionCenefa" name="seleccionCenefa" accept="image/*">
                            <img class="card-img-mate" id="imagenCenefa">

                            <br><br>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-12 material">
        <div class="card">
            <div class="col">
                <div class="ttulo">
                    <red><span>El afiche debe estar bien diligenciado de acuerdo a combotizacion</span></red>
                </div>
                <div class="col">
                    <div class="ttulo">
                        <green><span>Confirme si hay afiche</span></green>
                    </div>
                    <br>
                    <center><img class="img_afiche" alt="afiche" src="{{ asset('/storage/afiche.png') }}" /></center>
                    <br><br>
                    <div class="col">
                        <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                            <input id="afiche_si" name="afiche" type="radio" value="afiche_si" />
                            <label for="afiche_si">SI</label>
                            <input id="afiche_choose" name="afiche" type="radio" value="afiche_choose"
                                checked="checked" disabled />
                            <label for="afiche_choose">&iquest;Hay Afiche?</label>
                            <input id="afiche_no" name="afiche" type="radio" value="afiche_no" />
                            <label for="afiche_no">NO</label>
                            <a></a>
                        </div>
                    </div>
                    <br>
                    <div id="divAfiche" style="display: none">
                        <div class="col">
                            <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                                <input id="afiche_visi_si" name="afiche_visi" type="radio" value="afiche_visi_si" />
                                <label for="afiche_visi_si">SI</label>
                                <input id="afiche_visi_choose" name="afiche_visi" type="radio"
                                    value="afiche_visi_choose" checked="checked" disabled />
                                <label for="afiche_visi_choose">&iquest;Está visible al consumidor?</label>
                                <input id="afiche_visi_no" name="afiche_visi" type="radio" value="afiche_visi_no" />
                                <label for="afiche_visi_no">NO</label>
                                <a></a>
                            </div>
                        </div>
                        <br>
                        <div class="col">
                            <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                                <input id="afiche_colo_si" name="afiche_colo" type="radio" value="afiche_colo_si" />
                                <label for="afiche_colo_si">SI</label>
                                <input id="afiche_colo_choose" name="afiche_colo" type="radio"
                                    value="afiche_colo_choose" checked="checked" disabled />
                                <label for="afiche_colo_choose">&iquest;Está colocado de manera adecuada: Pegados?</label>
                                <input id="afiche_colo_no" name="afiche_colo" type="radio" value="afiche_colo_no" />
                                <label for="afiche_colo_no">NO</label>
                                <a></a>
                            </div>
                        </div>

                        <div class="col ttulo">
                            <br>
                            <br>
                            <label for="">Afiche combo esta diligenciados con información de combotización, si es
                                así
                                seleccionar marca y el tipo de combo</label>
                            <br>
                            <br>
                        </div>
                        <div class="col">
                            <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                                <input id="afiche_combo_si" name="aficheCombotizado" type="radio"
                                    value="afiche_combo_si" />
                                <label for="afiche_combo_si">SI</label>
                                <input id="afiche_combo_choose" name="aficheCombotizado" type="radio"
                                    value="afiche_combo_choose" checked="checked" disabled />
                                <label for="afiche_combo_choose">&iquest;Esta diligenciados con información de
                                    combotización?</label>
                                <input id="afiche_combo_no" name="aficheCombotizado" type="radio"
                                    value="afiche_combo_no" />
                                <label for="afiche_combo_no">NO</label>
                                <a></a>
                            </div>
                        </div>
                        <br>
                        <div style="display: none" id="divCombos">
                        <div class="col comboPadre" id="selectCombo" style="display: none" >
                            <label for="">Indique la marca con la que se combotizo</label>
                            {!! Form::select('marca_combo', $diageoMarca, null, [
                                'class' => 'form-control combo',
                                'placeholder' => '--',
                                'width' => '100%',
                            ]) !!}
                        </div>
                        <br>

                            <div class="col">
                                <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                                    <input id="combox1_si" name="combox1" type="radio" value="combox1_si" />
                                    <label for="combox1_si">SI</label>
                                    <input id="combox1_choose" name="combox1" type="radio" value="combox1_choose"
                                        checked="checked" disabled />
                                    <label for="combox1_choose">Diageo + otro producto</label>
                                    <input id="combox1_no" name="combox1" type="radio" value="combox1_no" />
                                    <label for="combox1_no">NO</label>
                                    <a></a>
                                </div>
                            </div>
                            <br>
                            <div class="col">
                                <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                                    <input id="combox2_si" name="combox2" type="radio" value="combox2_si" />
                                    <label for="combox2_si">SI</label>
                                    <input id="combox2_choose" name="combox2" type="radio" value="combox2_choose"
                                        checked="checked" disabled />
                                    <label for="combox2_choose">Diageo indicando precio</label>
                                    <input id="combox2_no" name="combox2" type="radio" value="combox2_no" />
                                    <label for="combox2_no">NO</label>
                                    <a></a>
                                </div>
                            </div>
                            <br>
                            <div class="col">
                                <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                                    <input id="combox3_si" name="combox3" type="radio" value="combox3_si" />
                                    <label for="combox3_si">SI</label>
                                    <input id="combox3_choose" name="combox3" type="radio" value="combox3_choose"
                                        checked="checked" disabled />
                                    <label for="combox3_choose">Diageo + gift</label>
                                    <input id="combox3_no" name="combox3" type="radio" value="combox3_no" />
                                    <label for="combox3_no">NO</label>
                                    <a></a>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="row" style="text-align: center">
                            <div class="col">
                                <br>
                                <hr>
                                <green> <span>Tome foto del afiche </span></green>
                                <input type="file" id="seleccionAfiche" name="seleccionAfiche" accept="image/*">
                                <img class="card-img-mate" id="imagenAfiche">

                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 material">
        <div class="card">
            <div class="ttulo">
                <green><span>Confirme si hay marco</span></green>
            </div>
            <div class="col">
                <div class="form-group">
                    <img class="img_marco" alt="marco" src="{{ asset('/storage/marco.png') }}" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                            <input id="marco_si" name="marco" type="radio" value="marco_si" />
                            <label for="marco_si">SI</label>
                            <input id="marco_choose" name="marco" type="radio" value="marco_choose"
                                checked="checked" disabled />
                            <label for="marco_choose">Marco</label>
                            <input id="marco_no" name="marco" type="radio" value="marco_no" />
                            <label for="marco_no">NO</label>
                            <a></a>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div style="display: none" id="divMarco">
                <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                    <input id="marco_visi_si" name="marco_visi" type="radio" value="marco_visi_si" />
                    <label for="marco_visi_si">SI</label>
                    <input id="marco_visi_choose" name="marco_visi" type="radio" value="marco_visi_choose"
                        checked="checked" disabled />
                    <label for="marco_choose">&iquest;Esta visible al consumidor?</label>
                    <input id="marco_visi_no" name="marco_visi" type="radio" value="marco_visi_no" />
                    <label for="marco_visi_no">NO</label>
                    <a></a>
                </div>
                <br>
                <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                    <input id="marco_colo_si" name="marco_colo" type="radio" value="marco_colo_si" />
                    <label for="marco_colo_si">SI</label>
                    <input id="marco_colo_choose" name="marco_colo" type="radio" value="marco_colo_choose"
                        checked="checked" disabled />
                    <label for="marco_choose">&iquest;Esta colocada de manera adecuada pegado, resaltando y enmarcando productos Diageo?</label>
                    <input id="marco_colo_no" name="marco_colo" type="radio" value="marco_colo_no" />
                    <label for="marco_colo_no">NO</label>
                    <a></a>
                </div>
                <div class="row" style="text-align: center">
                    <div class="col" id="divMarcoPic" style="display: none">
                        <br><br>
                        <hr>
                        <green> <span>Tome foto del marco </span></green>
                        <input type="file" id="seleccionMarco" name="seleccionMarco" accept="image/*">
                        <img class="card-img-mate" id="imagenMarco">

                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 material">
        <div class="card">
            <div class="ttulo">
                <green><span>Confirme si hay Rompetraficos</span></green>
            </div>
            <div class="col">
                <div class="col">
                    <img class="img_rompetraficos" alt="rompetraficos" src="{{ asset('/storage/rompetraficos.png') }}" />
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="rompetraficos_si" name="rompetraficos" type="radio" value="rompetraficos_si" />
                        <label for="rompetraficos_si">SI</label>
                        <input id="rompetraficos_choose" name="rompetraficos" type="radio"
                            value="rompetraficos_choose" checked="checked" disabled />
                        <label for="rompetraficos_choose">Rompetráfico</label>
                        <input id="rompetraficos_no" name="rompetraficos" type="radio" value="rompetraficos_no" />
                        <label for="rompetraficos_no">NO</label>
                        <a></a>
                    </div>
                </div>
                <br>

                <div class="col" id="divRtVisibles" style="display: none">
                    <br>
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="prod_rt_visibles_si" name="prod_rt_visibles" type="radio"
                            value="prod_rt_visibles_si"  />
                        <label for="prod_rt_visibles_si">SI</label>
                        <input id="prod_rt_visibles_choose" name="prod_rt_visibles" type="radio"
                            value="prod_rt_visibles_choose" checked="checked" disabled />
                        <label for="prod_rt_visibles_choose">&iquest;esta visible al consumidor?</label>
                        <input id="prod_rt_visibles_no" name="prod_rt_visibles" type="radio"
                            value="prod_rt_visibles_no"  />
                        <label for="prod_rt_visibles_no">NO</label>
                        <a></a>
                    </div>
                </div>

                <div class="col" id="divRtProperly" style="display: none">
                    <br>
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="prod_rt_properly_si" name="prod_rt_properly" type="radio"
                            value="prod_rt_properly_si"  />
                        <label for="prod_rt_properly_si">SI</label>
                        <input id="prod_rt_properly_choose" name="prod_rt_properly" type="radio"
                            value="prod_rt_properly_choose" checked="checked" disabled />
                        <label for="prod_rt_properly_choose">&iquest;Los rompetraficos estan colocados correctamente,
                            atornillado y/o pegados?</label>
                        <input id="prod_rt_properly_no" name="prod_rt_properly" type="radio"
                            value="prod_rt_properly_no"  />
                        <label for="prod_rt_properly_no">NO</label>
                        <a></a>
                    </div>
                    <br><br><br>
                </div>
                <div class="row" style="text-align: center">
                    <div class="col" id="divRtImg" style="display: none">
                        <br><br>
                        <hr>
                        <green> <span>Tome foto del rompetrafico</span></green>
                        <input type="file" id="seleccionRompetrafico" name="seleccionRompetrafico" accept="image/*">
                        <img class="card-img-mate" id="imagenRompetrafico">

                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 material">
        <div class="card">
            <div class="ttulo">
                <green><span>Confirme si la fachada esta identificada</span></green>
            </div>
            <div class="col">
                <div class="col">
                    <img class="img_fachadas" alt="fachadas" src="{{ asset('/storage/fachada.png') }}" />
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="fachadas_si" name="fachadas" type="radio" value="fachadas_si" />
                        <label for="fachadas_si">SI</label>
                        <input id="fachadas_choose" name="fachadas" type="radio" value="fachadas_choose"
                            checked="checked" disabled />
                        <label for="fachadas_choose">&iquest;hay Fachada  y/o aviso?
                        </label>
                        <input id="fachadas_no" name="fachadas" type="radio" value="fachadas_no" />
                        <label for="fachadas_no">NO</label>
                        <a></a>
                    </div>
                </div>
                <br>
                <div id="divFaxada" style="display: none">
                    <div class="col">
                        <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                            <input id="fachadas_visi_si" name="fachadas_visi" type="radio" value="fachadas_visi_si" />
                            <label for="fachadas_visi_si">SI</label>
                            <input id="fachadas_visi_choose" name="fachadas_visi" type="radio"
                                value="fachadas_visi_choose" checked="checked" disabled />
                            <label for="fachadas_choose">&iquest;las fachada y/o avisos esta visibles al consumidor?, no
                                tapados por otras marcas</label>
                            <input id="fachadas_visi_no" name="fachadas_visi" type="radio" value="fachadas_visi_no" />
                            <label for="fachadas_visi_no">NO</label>
                            <a></a>
                        </div>
                        <br><br><br>
                    </div>
                    <br>
                    <div class="col">
                        <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                            <input id="fachadas_colo_si" name="fachadas_colo" type="radio" value="fachadas_colo_si" />
                            <label for="fachadas_colo_si">SI</label>
                            <input id="fachadas_colo_choose" name="fachadas_colo" type="radio"
                                value="fachadas_colo_choose" checked="checked" disabled />
                            <label for="fachadas_choose">&iquest;Estan en buen estado? sin rayaduras,stickers, sucios,
                                desgastado</label>
                            <input id="fachadas_colo_no" name="fachadas_colo" type="radio" value="fachadas_colo_no" />
                            <label for="fachadas_colo_no">NO</label>
                            <a></a>
                        </div>
                        <br>
                    </div>

                    <div class="row" style="text-align: center">
                        <br>
                        <div class="col">
                            <br>
                            <hr>
                            <green> <span>Tome foto de la fachada</span></green>
                            <input type="file" id="seleccionFaxada" name="seleccionFaxada" accept="image/*">
                            <img class="card-img-mate" id="imagenFaxada">

                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 material">
        <div class="card">
            <div class="ttulo">
                <green><span>Confirme si cuentan con hieleras</span></green>
            </div>
            <div class="col">
                <div class="col">
                    <img class="img_hieler" alt="hieler" src="{{ asset('/storage/hieler.png') }}" />
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="hielera_si" name="hielera" type="radio" value="hielera_si" />
                        <label for="hielera_si">SI</label>
                        <input id="hielera_choose" name="hielera" type="radio" value="hielera_choose"
                            checked="checked" disabled />
                        <label for="hielera_choose">&iquest;Hay hieleras?</label>
                        <input id="hielera_no" name="hielera" type="radio" value="hielera_no" />
                        <label for="hielera_no">NO</label>
                        <a></a>
                    </div>
                    <br><br>
                </div>
                <div class="col" id="divHielera" style="display: none">
                    <br>
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="hl_con_prod_si" name="hl_con_prod" type="radio" value="hl_con_prod_si"
                             />
                        <label for="hl_con_prod_si">SI</label>
                        <input id="hl_con_prod_choose" name="hl_con_prod" type="radio" value="hl_con_prod_choose"
                            checked="checked" disabled />
                        <label for="hl_con_prod_choose">&iquest;Cuentan con productos Diageo?</label>
                        <input id="hl_con_prod_no" name="hl_con_prod" type="radio" value="hl_con_prod_no"
                             />
                        <label for="hl_con_prod_no">NO</label>
                        <a></a>
                    </div>
                    <br>
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="prod_hl_visible_si" name="prod_hl_visible" type="radio" value="prod_hl_visible_si"
                             />
                        <label for="prod_hl_visible_si">SI</label>
                        <input id="prod_hl_visible_choose" name="prod_hl_visible" type="radio"
                            value="prod_hl_visible_choose" checked="checked" disabled />
                        <label for="prod_hl_visible_choose">&iquest;Estan visibles al consumidor?</label>
                        <input id="prod_hl_visible_no" name="prod_hl_visible" type="radio" value="prod_hl_visible_no"
                             />
                        <label for="prod_hl_visible_no">NO</label>
                        <a></a>
                    </div>
                    <br>
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="prod_hl_danadas_si" name="prod_hl_danadas" type="radio" value="prod_hl_danadas_si"
                             />
                        <label for="prod_hl_danadas_si">SI</label>
                        <input id="prod_hl_danadas_choose" name="prod_hl_danadas" type="radio"
                            value="prod_hl_danadas_choose" checked="checked" disabled />
                        <label for="prod_hl_danadas_choose">&iquest;Estan las hieleras de Diageo quebradas, ralladas,
                            etc?</label>
                        <input id="prod_hl_danadas_no" name="prod_hl_danadas" type="radio" value="prod_hl_danadas_no"
                             />
                        <label for="prod_hl_danadas_no">NO</label>
                        <a></a>
                    </div>
                    <br><br>

                    <div class="row" style="text-align: center">
                        <div class="col">
                            <br>
                            <hr>
                            <green> <span>Tome foto de la hielera</span></green>
                            <input type="file" id="seleccionHielera" name="seleccionHielera" accept="image/*">
                            <img class="card-img-mate" id="imagenHielera">

                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 material">
        <div class="card">
            <div class="ttulo">
                <green><span>Confirme si las hieleras tienen bases</span></green>
            </div>
            <div class="col">
                <div class="col">
                    <img class="img_bases_h" alt="bases_h" src="{{ asset('/storage/bases_h.png') }}" />
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="bases_h_si" name="bases_h" type="radio" value="bases_h_si" />
                        <label for="bases_h_si">SI</label>
                        <input id="bases_h_choose" name="bases_h" type="radio" value="bases_h_choose"
                            checked="checked" disabled />
                        <label for="bases_h_choose">&iquest;Hay Bases para las hielera?</label>
                        <input id="bases_h_no" name="bases_h" type="radio" value="bases_h_no" />
                        <label for="bases_h_no">NO</label>
                        <a></a>
                    </div>
                    <br>
                </div>

                <div class="col" id="divBase_h" style="display: none">
                    <br>
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="baseshl_con_prod_si" name="baseshl_con_prod" type="radio"
                            value="baseshl_con_prod_si"  />
                        <label for="baseshl_con_prod_si">SI</label>
                        <input id="baseshl_con_prod_choose" name="baseshl_con_prod" type="radio"
                            value="baseshl_con_prod_choose" checked="checked" disabled />
                        <label for="baseshl_con_prod_choose">Están colocados de manera adecuada: Pegados</label>
                        <input id="baseshl_con_prod_no" name="baseshl_con_prod" type="radio"
                            value="baseshl_con_prod_no"  />
                        <label for="baseshl_con_prod_no">NO</label>
                        <a></a>
                    </div>
                    <br><br>


                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="prod_baseshl_visible_si" name="prod_baseshl_visible" type="radio"
                            value="prod_baseshl_visible_si"  />
                        <label for="prod_baseshl_visible_si">SI</label>
                        <input id="prod_baseshl_visible_choose" name="prod_baseshl_visible" type="radio"
                            value="prod_baseshl_visible_choose" checked="checked" disabled />
                        <label for="prod_baseshl_visible_choose">&iquest;Estan visibles al consumidor?</label>
                        <input id="prod_baseshl_visible_no" name="prod_baseshl_visible" type="radio"
                            value="prod_baseshl_visible_no"  />
                        <label for="prod_baseshl_visible_no">NO</label>
                        <a></a>
                    </div>
                    <br>
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="prod_baseshl_danadas_si" name="prod_baseshl_danadas" type="radio"
                            value="prod_baseshl_danadas_si"  />
                        <label for="prod_baseshl_danadas_si">SI</label>
                        <input id="prod_baseshl_danadas_choose" name="prod_baseshl_danadas" type="radio"
                            value="prod_baseshl_danadas_choose" checked="checked" disabled />
                        <label for="prod_baseshl_danadas_choose">&iquest;Estan en buen estado (no estan quebradas, ni
                            ralladas etc)?</label>
                        <input id="prod_baseshl_danadas_no" name="prod_baseshl_danadas" type="radio"
                            value="prod_baseshl_danadas_no"  />
                        <label for="prod_baseshl_danadas_no">NO</label>
                        <a></a>
                    </div>
                    <br><br>
                    <div class="row" style="text-align: center">
                        <div class="col">
                            <br>
                            <hr>
                            <green> <span>Tome foto de la base de las hieleras</span></green>
                            <input type="file" id="seleccionBase_h" name="seleccionBase_h" accept="image/*">
                            <img class="card-img-mate" id="imagenBase_h">

                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 material">
        <div class="card">
            <div class="ttulo">
                <green><span>Confirme si hay dosificadores dobles</span></green>
            </div>
            <div class="col">
                <div class="col">
                    <img class="img_dosificadorD" alt="dosificadorD"
                        src="{{ asset('/storage/dosificador_doble.png') }}" />
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="dosificadorD_si" name="dosificadorD" type="radio" value="dosificadorD_si" />
                        <label for="dosificadorD_si">SI</label>
                        <input id="dosificadorD_choose" name="dosificadorD" type="radio" value="dosificadorD_choose"
                            checked="checked" disabled />
                        <label for="dosificadorD_choose">&iquest;Hay dosificador Dobles</label>
                        <input id="dosificadorD_no" name="dosificadorD" type="radio" value="dosificadorD_no" />
                        <label for="dosificadorD_no">NO</label>
                        <a></a>
                    </div>
                </div>
                <br>

                <div class="col" id="divDosifD" style="display: none">
                    <br>
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="prod_dsD_visibles_si" name="prod_dsD_visibles" type="radio"
                            value="prod_dsD_visibles_si"  />
                        <label for="prod_dsD_visibles_si">SI</label>
                        <input id="prod_dsD_visibles_choose" name="prod_dsD_visibles" type="radio"
                            value="prod_dsD_visibles_choose" checked="checked" disabled />
                        <label for="prod_dsD_visibles_choose">&iquest;Estan visibles al consumidor?</label>
                        <input id="prod_dsD_visibles_no" name="prod_dsD_visibles" type="radio"
                            value="prod_dsD_visibles_no"  />
                        <label for="prod_dsD_visibles_no">NO</label>
                        <a></a>
                    </div>
                    <br>
                </div>

                <div class="col" id="divDosifD2" style="display: none">
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="prod_dsD_diferentes_si" name="prod_dsD_diferentes" type="radio"
                            value="prod_dsD_diferentes_si"  />
                        <label for="prod_dsD_diferentes_si">SI</label>
                        <input id="prod_dsD_diferentes_choose" name="prod_dsD_diferentes" type="radio"
                            value="prod_dsD_diferentes_choose" checked="checked" disabled />
                        <label for="prod_dsD_diferentes_choose">&iquest;Tienen exhibidos productos Diageo?</label>
                        <input id="prod_dsD_diferentes_no" name="prod_dsD_diferentes" type="radio"
                            value="prod_dsD_diferentes_no"  />
                        <label for="prod_dsD_diferentes_no">NO</label>
                        <a></a>
                    </div>
                </div>
                <br>
                <div class="col" id="divDosifD3" style="display: none">
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="prod_dsD_danados_si" name="prod_dsD_danados" type="radio"
                            value="prod_dsD_danados_si" />
                        <label for="prod_dsD_danados_si">SI</label>
                        <input id="prod_dsD_danados_choose" name="prod_dsD_danados" type="radio"
                            value="prod_dsD_danados_choose" checked="checked" disabled />
                        <label for="prod_dsD_danados_choose">&iquest;Están en perfectas condiciones?sin polvo, sucios,
                            etiqueta en mal estado?</label>
                        <input id="prod_dsD_danados_no" name="prod_dsD_danados" type="radio"
                            value="prod_dsD_danados_no" />
                        <label for="prod_dsD_danados_no">NO</label>
                        <a></a>
                    </div>
                    <br>
                </div>
                <div class="row" style="text-align: center">
                    <div class="col" id="divDosificadorD" style="display: none">
                        <br><br><br>
                        <hr>
                        <green> <span>Tome foto del dosificador doble</span></green>
                        <input type="file" id="seleccionDosificadorD" name="seleccionDosificadorD" accept="image/*">
                        <img class="card-img-mate" id="imagenDosificadorD">

                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 material">
        <div class="card">
            <div class="ttulo">
                <green><span>Confirme si hay dosificadores sencillos</span></green>
            </div>
            <div class="col">
                <div class="col">
                    <img class="img_dosificadorS" alt="dosificadorS"
                        src="{{ asset('/storage/dosificador_sencillo.png') }}" />
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="dosificadorS_si" name="dosificadorS" type="radio" value="dosificadorS_si" />
                        <label for="dosificadorS_si">SI</label>
                        <input id="dosificadorS_choose" name="dosificadorS" type="radio" value="dosificadorS_choose"
                            checked="checked" disabled />
                        <label for="dosificadorS_choose">&iquest;Hay dosificador sencillo?</label>
                        <input id="dosificadorS_no" name="dosificadorS" type="radio" value="dosificadorS_no" />
                        <label for="dosificadorS_no">NO</label>
                        <a></a>
                    </div>
                    <br>
                </div>
                <div class="col" id="divDosifS" style="display: none">

                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="prod_dsS_visibles_si" name="prod_dsS_visibles" type="radio"
                            value="prod_dsS_visibles_si"  />
                        <label for="prod_dsS_visibles_si">SI</label>
                        <input id="prod_dsS_visibles_choose" name="prod_dsS_visibles" type="radio"
                            value="prod_dsS_visibles_choose" checked="checked" disabled />
                        <label for="prod_dsS_visibles_choose">&iquest;Estan visibles al consumidor?</label>
                        <input id="prod_dsS_visibles_no" name="prod_dsS_visibles" type="radio"
                            value="prod_dsS_visibles_no"  />
                        <label for="prod_dsS_visibles_no">NO</label>
                        <a></a>
                    </div>
                    <br>


                    <div class="col">
                        <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                            <input id="prod_dsS_diferentes_si" name="prod_dsS_diferentes" type="radio"
                                value="prod_dsS_diferentes_si"  />
                            <label for="prod_dsS_diferentes_si">SI</label>
                            <input id="prod_dsS_diferentes_choose" name="prod_dsS_diferentes" type="radio"
                                value="prod_dsS_diferentes_choose" checked="checked" disabled />
                            <label for="prod_dsS_diferentes_choose">&iquest;Tienen exhibidos productos Diageo?</label>
                            <input id="prod_dsS_diferentes_no" name="prod_dsS_diferentes" type="radio"
                                value="prod_dsS_diferentes_no"  />
                            <label for="prod_dsS_diferentes_no">NO</label>
                            <a></a>
                        </div>
                    </div>
                    <br>
                    <div class="col">
                        <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                            <input id="prod_dsS_danados_si" name="prod_dsS_danados" type="radio"
                                value="prod_dsS_danados_si" />
                            <label for="prod_dsS_danados_si">SI</label>
                            <input id="prod_dsS_danadoss_choose" name="prod_dsS_danados" type="radio"
                                value="prod_dsS_danados_choose" checked="checked" disabled />
                            <label for="prod_dsS_danados_choose">&iquest;Están en perfectas condiciones?sin polvo, sucios,
                                etiqueta en mal estado?</label>
                            <input id="prod_dsS_danados_no" name="prod_dsS_danados" type="radio"
                                value="prod_dsS_danados_no" />
                            <label for="prod_dsS_danados_no">NO</label>
                            <a></a>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="row" style="text-align: center">
                    <div class="col" id="divDosificadorS" style="display: none">

                        <br><br>
                        <hr>
                        <green> <span>Tome foto del dosificador sencillo</span></green>
                        <br><br>
                        <input type="file" id="seleccionDosificadorS" name="seleccionDosificadorS" accept="image/*">
                        <img class="card-img-mate" id="imagenDosificadorS">

                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 material">
        <div class="card">
            <div class="ttulo">
                <green><span>Confirme hay branding</span></green>
            </div>
            <div class="col">
                <div class="col">
                    <img class="img_branding" alt="branding" src="{{ asset('/storage/branding_mesas.png') }}" />
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="branding_si" name="branding" type="radio" value="branding_si" />
                        <label for="branding_si">SI</label>
                        <input id="branding_choose" name="branding" type="radio" value="branding_choose"
                            checked="checked" disabled />
                        <label for="branding_choose">&iquest;Hay branding en las mesas?</label>
                        <input id="branding_no" name="branding" type="radio" value="branding_no" />
                        <label for="branding_no">NO</label>
                        <a></a>
                    </div>
                    <br>
                </div>
                <div class="col" id="divBranding" style="display: none">
                    <br>
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="branding_visible_si" name="branding_visible" type="radio"
                            value="branding_visible_si"  />
                        <label for="branding_visible_si">SI</label>
                        <input id="branding_visible_choose" name="branding_visible" type="radio"
                            value="branding_visible_choose" checked="checked" disabled />
                        <label for="branding_visible_choose">&iquest;Utilización adecuada? (Si hay presencia esta siendo
                            utilizada con productos Diageo)</label>
                        <input id="branding_visible_no" name="branding_visible" type="radio"
                            value="branding_visible_no"  />
                        <label for="branding_visible_no">NO</label>
                        <a></a>
                    </div>
                    <br><br>
                    <br><br>
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="branding_danados_si" name="branding_danados" type="radio"
                            value="branding_danados_si"  />
                        <label for="branding_danados_si">SI</label>
                        <input id="branding_danados_choose" name="branding_danados" type="radio"
                            value="branding_danados_choose" checked="checked" disabled />
                        <label for="branding_danados_choose">&iquest;Utilización adecuada? (Si hay presencia esta siendo
                            utilizada con productos Diageo)</label>
                        <input id="branding_danados_no" name="branding_danados" type="radio"
                            value="branding_danados_no"  />
                        <label for="branding_danados_no">NO</label>
                        <a></a>
                    </div>
                    <br><br>

                    <div class="row" style="text-align: center">
                        <div class="col">
                            <br>
                            <hr>
                            <green> <span>Tome foto del branding</span></green>
                            <input type="file" id="seleccionBranding" name="seleccionBranding" accept="image/*">
                            <img class="card-img-mate" id="imagenBranding">

                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 material">
        <div class="card">
            <div class="ttulo">
                <green><span>Confirme si hay vasos y mesas</span></green>
            </div>

            <div class="col">
                <div class="col">
                    <img class="img_vasos" alt="vasos" src="{{ asset('/storage/vasos_copas.png') }}" />
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="vasos_si" name="vasos" type="radio" value="vasos_si" />
                        <label for="vasos_si">SI</label>
                        <input id="vasos_choose" name="vasos" type="radio" value="vasos_choose" checked="checked"
                            disabled />
                        <label for="vasos_choose">&iquest;Hay vasos B&W o Copas X1?</label>
                        <input id="vasos_no" name="vasos" type="radio" value="vasos_no" />
                        <label for="vasos_no">NO</label>
                        <a></a>
                    </div>
                    <br>
                </div>
                <div id="divVasos" style="display: none">
                    <div class="col" id="divBranding" style="display: block">
                        <br>
                        <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                            <input id="vasos_visibles_si" name="vasos_visibles" type="radio" value="vasos_visibles_si"
                                 />
                            <label for="vasos_visibles_si">SI</label>
                            <input id="vasos_visibles_choose" name="vasos_visibles" type="radio"
                                value="vasos_visibles_choose" checked="checked" disabled />
                            <label for="vasos_visibles_choose">&iquest;Utilización adecuada? (Si hay presencia esta siendo
                                utilizada con productos Diageo)</label>
                            <input id="vasos_visibles_no" name="vasos_visibles" type="radio"
                                value="vasos_visibles_no"  />
                            <label for="vasos_visibles_no">NO</label>
                            <a></a>
                        </div>
                        <br><br>
                        <br><br>
                        <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                            <input id="vasos_quebrados_si" name="vasos_quebrados" type="radio"
                                value="vasos_quebrados_si"  />
                            <label for="vasos_quebrados_si">SI</label>
                            <input id="vasos_quebrados_choose" name="vasos_quebrados" type="radio"
                                value="vasos_quebrados_choose" checked="checked" disabled />
                            <label for="vasos_quebrados_choose">&iquest;Estan en buen estado? (no estan quebradas, ni
                                ralladas etc)</label>
                            <input id="vasos_quebrados_no" name="vasos_quebrados" type="radio"
                                value="vasos_quebrados_no"  />
                            <label for="vasos_quebrados_no">NO</label>
                            <a></a>
                        </div>
                        <br><br>
                    </div>
                    <div class="row" style="text-align: center">
                        <div class="col">
                            <green> <span>Tome foto de los vasos y copas</span></green>
                            <input type="file" id="seleccionVasos" name="seleccionVasos" accept="image/*">
                            <img class="card-img-mate" id="imagenVasos">

                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </p>
    {!! Form::submit('Siguiente', ['class' => 'btn btn-primary', 'id' => 'boton']) !!}
    <br><br>
    {!! Form::close() !!}
@stop
@section('js')
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "cenefa_si") {
                    $("#divCenefa").show();
                } else if (valor == "cenefa_no") {
                    $("#divCenefa").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "afiche_si") {
                    $("#divAfiche").show();
                } else if (valor == "afiche_no") {
                    $("#divAfiche").hide();
                    $("#divCombos").hide();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "afiche_combo_si") {
                    $("#divCombos").show();
                    $("#selectCombo").show();
                } else if (valor == "afiche_combo_no") {
                    $("#divCombos").hide();
                    $("#selectCombo").value('');
                    $("#selectCombo").hide();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "marco_si") {
                    $("#divMarco").show();
                    $("#divMarcoPic").show();
                } else if (valor == "marco_no") {
                    $("#divMarco").hide();
                    $("#divMarcoPic").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "rompetraficos_si") {
                    $("#divRtVisibles").show();
                    $("#divRtProperly").show();
                    $("#divRtImg").show();

                } else if (valor == "rompetraficos_no") {
                    $("#divRtVisibles").hide();
                    $("#divRtProperly").hide();
                    $("#divRtImg").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "fachadas_si") {
                    $("#divFaxada").show();
                } else if (valor == "fachadas_no") {
                    $("#divFaxada").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "hielera_si") {
                    $("#divHielera").show();
                    $("#divHiele").show();

                } else if (valor == "hielera_no") {
                    $("#divHielera").hide();
                    $("#divHiele").hide();

                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "bases_h_si") {
                    $("#divBase_h").show();
                } else if (valor == "bases_h_no") {
                    $("#divBase_h").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "dosificadorD_si") {
                    $("#divDosificadorD").show();
                    $("#divDosifD").show();
                    $("#divDosifD2").show();
                    $("#divDosifD3").show();
                } else if (valor == "dosificadorD_no") {
                    $("#divDosificadorD").hide();
                    $("#divDosifD").hide();
                    $("#divDosifD2").hide();
                    $("#divDosifD3").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "dosificadorS_si") {
                    $("#divDosificadorS").show();
                    $("#divDosifS").show();
                    $("#divDosif2S").show();
                    $("#divDosif3S").show();
                } else if (valor == "dosificadorS_no") {
                    $("#divDosificadorS").hide();
                    $("#divDosifS").hide();
                    $("#divDosif2S").hide();
                    $("#divDosif3S").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "branding_si") {
                    $("#divBranding").show();
                } else if (valor == "branding_no") {
                    $("#divBranding").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "vasos_si") {
                    $("#divVasos").show();
                    $("#divCopa").show();
                    $("#divCopa2").show();
                } else if (valor == "vasos_no") {
                    $("#divVasos").hide();
                    $("#divCopa").hide();
                    $("#divCopa2").hide();
                }
            });
        });
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
        // Escuchar cuando cambie
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



@stop
