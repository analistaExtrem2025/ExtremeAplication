@extends('adminlte::page')
@section('title', 'Disponibilidad')

@section('css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/css-toggle-switch/latest/toggle-switch.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Arapey:400,400i,600|Open+Sans:300" rel="stylesheet">
    <link href="{{ asset('css/auditoria.css') }}" rel="stylesheet">
@stop
@section('content')
    <h5><span class="numeros">4</span>DISPONIBILIDAD DE MARCAS</h5>
    {!! Form::model($puntos_auditoria, [
        'route' => ['disponibilidad.update', $puntos_auditoria->id],
        'method' => 'put',
        'enctype' => 'multipart/form-data',
        'files' => 'true',
    ]) !!}
    <input type="hidden" name="precarga_id" value="{{ $puntos_auditoria->precarga_id }}">
    <p>
    <div class="col-12">
        <div class="card">
            <div class="ttulo" style="text-align: center">
                <green><span>Indique la existencia de Black & White</span></green>
            </div>
            <div class="row">
                <div class="row">
                    <img class="img_botellas swing" src="{{ asset('/storage/b&w.png') }}" />
                    <div class="col">
                        <div id="bw1000" style="display: block">
                            <div class="form-group">
                                <div class="row">
                                    <div class="switch-toggle switch-3 switch-candy">
                                        <input id="bAndw1000_si" name="bAndw1000" type="radio" value="bAndw1000_si"
                                            required />
                                        <label for="bAndw1000_si">SI</label>
                                        <input id="bAndw1000_choose" name="bAndw1000" type="radio"
                                            value="bAndw1000_choose" checked="checked" disabled />
                                        <label for="bAndw1000_choose">Black & White 1000 ml</label>
                                        <input id="bAndw1000_no" name="bAndw1000" type="radio" value="bAndw1000_no"
                                            />
                                        <label for="bAndw1000_no">NO</label>
                                        <a></a>
                                    </div><br><br>
                                    <div id="divbaw1000" style="display: none" class="mt-2">
                                        &nbsp;&nbsp;<label for="caras_bAndw1000">Caras en el lineal</label>&nbsp;&nbsp;
                                        <input type="text" name="caras_bAndw1000" id="caras_bAndw1000"
                                            style="width: 50px; height: 35px; border-radius:0.3rem;" autocomplete="off"
                                            maxlength="2" required disabled >
                                        &nbsp;&nbsp;<label for="precio_bAndw1000">Precio &dollar; </label>&nbsp;&nbsp;
                                        <input type="text" name="precio_bAndw1000" id="precio_bAndw1000"
                                            style="width: 85px; height: 35px; border-radius: 0.3rem;" maxlength="6"
                                            minlength="5" autocomplete="off" onkeypress="see01()" required disabled
                                            >
                                        <span id="texto"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="bw700" style="display: none">
                            <div class="form-group">
                                <div class="row">
                                    <div class="switch-toggle switch-3 switch-candy">
                                        <input id="bAndw700_si" name="bAndw700" type="radio" value="bAndw700_si" required
                                            disabled  />
                                        <label for="bAndw700_si">SI</label>
                                        <input id="bAndw700_choose" name="bAndw700" type="radio" value="bAndw700_choose"
                                            checked="checked" disabled />
                                        <label for="bAndw700_choose">Black & White 700 ml</label>
                                        <input id="bAndw700_no" name="bAndw700" type="radio" value="bAndw700_no"
                                             />
                                        <label for="bAndw700_no">NO</label>
                                        <a></a>
                                    </div><br><br>
                                    <div id="divbaw700" style="display: none" class="mt-2">
                                        &nbsp;&nbsp;<label for="caras_bAndw700">Caras en el lineal</label>&nbsp;&nbsp;
                                        <input type="text" name="caras_bAndw700" id="caras_bAndw700" maxlength="2"
                                            style="width: 50px; height: 35px; border-radius:0.3rem;" autocomplete="off"
                                            required disabled >
                                        &nbsp;&nbsp;<label for="precio_bAndw700">Precio &dollar; </label>&nbsp;&nbsp;
                                        <input type="text" name="precio_bAndw700" id="precio_bAndw700"
                                            style="width: 85px; height: 35px; border-radius: 0.3rem;" maxlength="6"
                                            minlength="5" autocomplete="off" onkeypress="see02()" required disabled
                                            >
                                        <span id="texto02"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="bw375" style="display: none">
                            <div class="form-group">
                                <div class="row">
                                    <div class="switch-toggle switch-3 switch-candy">
                                        <input id="bAndw375_si" name="bAndw375" type="radio" value="bAndw375_si"
                                            required disabled />
                                        <label for="bAndw375_si">SI</label>
                                        <input id="bAndw375_choose" name="bAndw375" type="radio"
                                            value="bAndw375_choose" checked="checked" disabled />
                                        <label for="bAndw375_choose">Black & White 375 ml</label>
                                        <input id="bAndw375_no" name="bAndw375" type="radio" value="bAndw375_no" />
                                        <label for="bAndw375_no">NO</label>
                                        <a></a>
                                    </div><br><br>
                                    <div id="divbaw375" style="display: none" class="mt-2">
                                        &nbsp;&nbsp;<label for="caras_bAndw375">Caras en el lineal</label>&nbsp;&nbsp;
                                        <input type="text" name="caras_bAndw375" id="caras_bAndw375" maxlength="2"
                                            style="width: 50px; height: 35px; border-radius:0.3rem;" autocomplete="off"
                                            required disabled>
                                        &nbsp;&nbsp;<label for="precio_bAndw375">Precio &dollar;</label>&nbsp;&nbsp;
                                        <input type="text" name="precio_bAndw375" id="precio_bAndw375"
                                            style="width: 85px; height: 35px; border-radius: 0.3rem;" maxlength="6"
                                            minlength="5" autocomplete="off" onkeypress="see03()" required disabled>
                                        <span id="texto03"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12" id="smirDiv" style="display: none">
        <div class="card">
            <div class="ttulo" style="text-align: center; display: none" id="title_sm">
                <green><span>Indique la existencia de Smirnoff</span></green>
            </div>
            <br>
            <div class="row">
                <div class="row">
                    <img class="img_botellas swing" alt="vasos" src="{{ asset('/storage/smirnoff.png') }}" />
                    <div class="col">
                        <div class="form-group">
                            <div class="row">
                                <div id="sm700" style="display: none">
                                    <div class="switch-toggle switch-3 switch-candy">
                                        <input id="smirnoff700_si" name="smirnoff700" type="radio"
                                            value="smirnoff700_si" required disabled />
                                        <label for="smirnoff700_si">SI</label>
                                        <input id="smirnoff700_choose" name="smirnoff700" type="radio"
                                            value="smirnoff700_choose"checked="checked" disabled />
                                        <label for="smirnoff700_choose">Smirnoff 700 ml</label>
                                        <input id="smirnoff700_no" name="smirnoff700" type="radio"
                                            value="smirnoff700_no" />
                                        <label for="smirnoff700_no">NO</label>
                                        <a></a>
                                    </div>
                                </div>

                                <div id="divSmirnoff700" style="display: none" class="mt-2">
                                    &nbsp;&nbsp;<label for="caras_smirnoff700">Caras en el lineal</label>&nbsp;&nbsp;
                                    <input type="text" name="caras_smirnoff700" id="caras_smirnoff700" maxlength="2"
                                        style="width: 50px; height: 35px; border-radius:0.3rem;" autocomplete="off"
                                        required disabled>
                                    &nbsp;&nbsp;<label for="precio_smirnoff700">Precio &dollar;</label>&nbsp;&nbsp;
                                    <input type="text" name="precio_smirnoff700" id="precio_smirnoff700"
                                        style="width: 85px; height: 35px; border-radius: 0.3rem;" maxlength="6"
                                        minlength="5" autocomplete="off" onkeypress="see04()" required disabled>
                                    <span id="texto04"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div id="sm375" style="display: none">
                                    <div class="switch-toggle switch-3 switch-candy">
                                        <input id="smirnoff375_si" name="smirnoff375" type="radio"
                                            value="smirnoff375_si" />
                                        <label for="smirnoff375_si">SI</label>
                                        <input id="smirnoff375_choose" name="smirnoff375" type="radio"
                                            value="smirnoff375_choose"checked="checked" disabled />
                                        <label for="smirnoff375_choose">Smirnoff 375 ml</label>
                                        <input id="smirnoff375_no" name="smirnoff375" type="radio"
                                            value="smirnoff375_no" />
                                        <label for="smirnoff375_no">NO</label>
                                        <a></a>
                                    </div>
                                </div>

                                <div id="divSmirnoff375" style="display: none" class="mt-2">
                                    &nbsp;&nbsp;<label for="caras_smirnoff375">Caras en el lineal</label>&nbsp;&nbsp;
                                    <input type="text" name="caras_smirnoff375" maxlength="2" id="caras_smirnoff375"
                                        style="width: 50px; height: 35px; border-radius:0.3rem;" autocomplete="off"
                                        required disabled>
                                    &nbsp;&nbsp;<label for="precio_smirnoff375">Precio &dollar;</label>&nbsp;&nbsp;
                                    <input type="text" name="precio_smirnoff375" id="precio_smirnoff375"
                                        style="width: 85px; height: 35px; border-radius: 0.3rem;" maxlength="6"
                                        minlength="5" autocomplete="off" onkeypress="see05()" required disabled>
                                    <span id="texto05"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12" id="smirDiv1" style="display: none">
        <div class="card">
            <div class="ttulo" style="text-align: center; display: none" id="title_smns">
                <green><span>Indique la existencia de Smirnoff x1 sin az&uacute;car</span></green>
            </div>
            <br>
            <div class="row">
                <div class="row">
                    <img class="img_botellas swing" alt="smirnoff_sin_azucar"
                        src="{{ asset('/storage/smirnoff_sin_azucar.png') }}" />
                    <div class="col">
                        <div class="form-group">
                            <div class="row">
                                <div id="sm_ns700" style="display: none">
                                    <div class="switch-toggle switch-3 switch-candy">
                                        <input id="smirnoff_ns700_si" name="smirnoff_ns700" type="radio"
                                            value="smirnoff_ns700_si" required disabled />
                                        <label for="smirnoff_ns700_si">SI</label>
                                        <input id="smirnoff_ns700_choose" name="smirnoff_ns700" type="radio"
                                            value="smirnoff_ns700_choose"checked="checked" disabled />
                                        <label for="smirnoff_ns700_choose">Smirnoff sin az&uacute;car 700 ml</label>
                                        <input id="smirnoff_ns700_no" name="smirnoff_ns700" type="radio"
                                            value="smirnoff_ns700_no" />
                                        <label for="smirnoff_ns700_no">NO</label>
                                        <a></a>
                                    </div>
                                </div>
                                <div id="divSmirnoff_ns700" style="display: none" class="mt-2">
                                    &nbsp;&nbsp;<label for="caras_smirnoff_ns700">Caras en el lineal</label>&nbsp;&nbsp;
                                    <input type="text" name="caras_smirnoff_ns700" id="caras_smirnoff_ns700"
                                        maxlength="2" style="width: 50px; height: 35px; border-radius:0.3rem;"
                                        autocomplete="off" required disabled>
                                    &nbsp;&nbsp;<label for="precio_smirnoff_ns700">Precio &dollar;</label>&nbsp;&nbsp;
                                    <input type="text" name="precio_smirnoff_ns700" id="precio_smirnoff_ns700"
                                        style="width: 85px; height: 35px; border-radius: 0.3rem;" maxlength="6"
                                        minlength="5" autocomplete="off" onkeypress="see06()" required disabled>
                                    <span id="textons"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div id="sm_ns375" style="display: none">
                                    <div class="switch-toggle switch-3 switch-candy">
                                        <input id="smirnoff_ns375_si" name="smirnoff_ns375" type="radio"
                                            value="smirnoff_ns375_si" disabled required />
                                        <label for="smirnoff_ns375_si">SI</label>
                                        <input id="smirnoff_ns375_choose" name="smirnoff_ns375" type="radio"
                                            value="smirnoff_ns375_choose"checked="checked" disabled />
                                        <label for="smirnoff_ns375_choose">Smirnoff sin az&uacute;car 375 ml</label>
                                        <input id="smirnoff_ns375_no" name="smirnoff_ns375" type="radio"
                                            value="smirnoff_ns375_no" />
                                        <label for="smirnoff_ns375_no">NO</label>
                                        <a></a>
                                    </div>
                                </div>
                                <div id="divSmirnoff_ns375" style="display: none" class="mt-2">
                                    &nbsp;&nbsp;<label for="caras_smirnoff_ns375">Caras en el lineal</label>&nbsp;&nbsp;
                                    <input type="text" name="caras_smirnoff_ns375" id="caras_smirnoff_ns375"
                                        maxlength="2" style="width: 50px; height: 35px; border-radius:0.3rem;"
                                        autocomplete="off" required disabled>
                                    &nbsp;&nbsp;<label for="precio_smirnoff_ns375">Precio &dollar;</label>&nbsp;&nbsp;
                                    <input type="text" name="precio_smirnoff_ns375" id="precio_smirnoff_ns375"
                                        style="width: 85px; height: 35px; border-radius: 0.3rem;" maxlength="6"
                                        minlength="5" autocomplete="off" required disabled onkeypress="see07()">
                                    <span id="texto375ns"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($usuario == 'MEDELLIN')
        <div class="col-12" id="smirDiv2" style="display: none">
            <div class="card">
                <div class="ttulo" style="text-align: center; display: none" id="title_jw">
                    <green><span>Indique la existencia de Johnnie Walker</span></green>
                </div>
                <div class="row">
                    <div class="row">
                        <img class="img_botellas swing" alt="vasos" src="{{ asset('/storage/jhonie_walker.png') }}" />
                        <div class="col">
                            <div class="form-group">
                                <div class="row">

                                    <div id="jw_1000" style="display: none">
                                        <div class="switch-toggle switch-3 switch-candy">
                                            <input id="jhonnie1000_si" name="jhonnie1000" type="radio"
                                                value="jhonnie1000_si" disabled required />
                                            <label for="jhonnie1000_si">SI</label>
                                            <input id="jhonnie1000_choose" name="jhonnie1000" type="radio"
                                                value="jhonnie1000_choose"checked="checked" disabled />
                                            <label for="jhonnie1000_choose">Johnnie Walker Red 1000 ml</label>
                                            <input id="jhonnie1000_no" name="jhonnie1000" type="radio"
                                                value="jhonnie1000_no" />
                                            <label for="jhonnie1000_no">NO</label>
                                            <a></a>
                                        </div>
                                    </div>
                                    <div id="divjhonnie1000" style="display: none" class="mt-2">
                                        &nbsp;&nbsp;<label for="caras_jhonnie1000">Caras en el
                                            lineal</label>&nbsp;&nbsp;
                                        <input type="text" name="caras_jhonnie1000" id="caras_jhonnie1000"
                                            maxlength="2" style="width: 50px; height: 35px; border-radius:0.3rem;"
                                            autocomplete="off" disabled required>
                                        &nbsp;&nbsp;<label for="precio_jhonnie1000">Precio &dollar;</label>&nbsp;&nbsp;
                                        <input type="text" name="precio_jhonnie1000" id="precio_jhonnie1000"
                                            style="width: 85px; height: 35px; border-radius: 0.3rem;" maxlength="6"
                                            minlength="5" autocomplete="off" onkeypress="see08()" disabled required>
                                        <span id="texto06"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div id="js_700" style="display: none">
                                        <div class="switch-toggle switch-3 switch-candy">
                                            <input id="jhonnie700_si" name="jhonnie700" type="radio"
                                                value="jhonnie700_si" disabled required />
                                            <label for="jhonnie700_si">SI</label>
                                            <input id="jhonnie700_choose" name="jhonnie700" type="radio"
                                                value="jhonnie700_choose"checked="checked" disabled />
                                            <label for="jhonnie700_choose">Johnnie Walker Red 700 ml</label>
                                            <input id="jhonnie700_no" name="jhonnie700" type="radio"
                                                value="jhonnie700_no" />
                                            <label for="jhonnie700_no">NO</label>
                                            <a></a>
                                        </div>
                                    </div>
                                    <div id="divjhonnie700" style="display: none" class="mt-2">
                                        &nbsp;&nbsp;<label for="caras_jhonnie700">Caras en el
                                            lineal</label>&nbsp;&nbsp;
                                        <input type="text" name="caras_jhonnie700" id="caras_jhonnie700"
                                            maxlength="2" style="width: 50px; height: 35px; border-radius:0.3rem;"
                                            autocomplete="off" required disabled>
                                        &nbsp;&nbsp;<label for="precio_jhonnie700">Precio &dollar;</label>&nbsp;&nbsp;
                                        <input type="text" name="precio_jhonnie700" id="precio_jhonnie700"
                                            style="width: 85px; height: 35px; border-radius: 0.3rem;" maxlength="6"
                                            minlength="5" autocomplete="off" required disabled onkeypress="see09()">
                                        <span id="texto07"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div id="js_375" style="display: none">
                                        <div class="switch-toggle switch-3 switch-candy">
                                            <input id="jhonnie375_si" name="jhonnie375" type="radio"
                                                value="jhonnie375_si" required disabled />
                                            <label for="jhonnie375_si">SI</label>
                                            <input id="jhonnie375_choose" name="jhonnie375" type="radio"
                                                value="jhonnie375_choose"checked="checked" disabled />
                                            <label for="jhonnie375_choose">Johnnie Walker Red 375 ml</label>
                                            <input id="jhonnie375_no" name="jhonnie375" type="radio"
                                                value="jhonnie375_no" />
                                            <label for="jhonnie375_no">NO</label>
                                            <a></a>
                                        </div>
                                    </div>
                                    <div id="divjhonnie375" style="display: none" class="mt-2">
                                        &nbsp;&nbsp;<label for="caras_jhonnie375">Caras en el
                                            lineal</label>&nbsp;&nbsp;
                                        <input type="text" name="caras_jhonnie375" id="caras_jhonnie375"
                                            maxlength="2" style="width: 50px; height: 35px; border-radius:0.3rem;"
                                            autocomplete="off" required disabled>
                                        &nbsp;&nbsp;<label for="precio_jhonnie375">Precio &dollar;</label>&nbsp;&nbsp;
                                        <input type="text" name="precio_jhonnie375" id="precio_jhonnie375"
                                            style="width: 85px; height: 35px; border-radius: 0.3rem;" maxlength="6"
                                            minlength="5" autocomplete="off" required disabled onkeypress="see10()">
                                        <span id="texto08"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="col-12" id="smirDiv3" style="display: none">
        <div class="card">
            <div class="ttulo" style="text-align: center; display: none" id="title_op">
                <green><span>Indique la existencia de Old Parr</span></green>
            </div>
            <div class="row">
                <div class="row">
                    <img class="img_botellas swing" alt="vasos" src="{{ asset('/storage/oldparr.png') }}" />
                    <div class="col">
                        <div class="form-group">
                            <div class="row">
                                <div id="ol750" style="display: none">
                                    <div class="switch-toggle switch-3 switch-candy">
                                        <input id="oldparr750_si" name="oldparr750" type="radio" value="oldparr750_si"
                                            required disabled />
                                        <label for="oldparr750_si">SI</label>
                                        <input id="oldparr750_choose" name="oldparr750" type="radio"
                                            value="oldparr750_choose"checked="checked" disabled />
                                        <label for="oldparr750_choose">oldparr 750 ml</label>
                                        <input id="oldparr750_no" name="oldparr750" type="radio"
                                            value="oldparr750_no" />
                                        <label for="oldparr750_no">NO</label>
                                        <a></a>
                                    </div>
                                </div>
                                <div id="divOldparr750" style="display: none" class="mt-2">
                                    &nbsp;&nbsp;<label for="caras_oldparr750">Caras en el lineal</label>&nbsp;&nbsp;
                                    <input type="text" name="caras_oldparr750" id="caras_oldparr750" maxlength="2"
                                        style="width: 50px; height: 35px; border-radius:0.3rem;" autocomplete="off"
                                        required disabled>
                                    &nbsp;&nbsp;<label for="precio_oldparr750">Precio &dollar;</label>&nbsp;&nbsp;
                                    <input type="text" name="precio_oldparr750" id="precio_oldparr750"
                                        style="width: 85px; height: 35px; border-radius: 0.3rem;" maxlength="6"
                                        minlength="5" autocomplete="off" required disabled onkeypress="see11()">
                                    <span id="texto09"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12" id="smirDiv4" style="display: none">
        <div class="card">
            <div class="ttulo" style="text-align: center; display: none" id="title_bc">
                <green><span>Indique la existencia de Buchanna&lsquo;s</span></green>
            </div>
            <div class="row">
                <div class="row">
                    <img class="img_botellas swing" alt="vasos" src="{{ asset('/storage/buchannas.png') }}" />
                    <div class="col">
                        <div class="form-group">
                            <div class="row">
                                <div id="bc700" style="display: none">
                                    <div class="switch-toggle switch-3 switch-candy">
                                        <input id="buchannas700_si" name="buchannas700" type="radio"
                                            value="buchannas700_si" required disabled />
                                        <label for="buchannas700_si">SI</label>
                                        <input id="buchannas700_choose" name="buchannas700" type="radio"
                                            value="buchannas700_choose"checked="checked" disabled />
                                        <label for="buchannas700_choose">buchannas 700 ml</label>
                                        <input id="buchannas700_no" name="buchannas700" type="radio"
                                            value="buchannas700_no" />
                                        <label for="buchannas700_no">NO</label>
                                        <a></a>
                                    </div>
                                </div>
                                <div id="divBuchannas700" style="display: none" class="mt-2">
                                    &nbsp;&nbsp;<label for="caras_buchannas700">Caras en el
                                        lineal</label>&nbsp;&nbsp;
                                    <input type="text" name="caras_buchannas700" id="caras_buchannas700"
                                        maxlength="2" style="width: 50px; height: 35px; border-radius:0.3rem;"
                                        autocomplete="off" required disabled>
                                    &nbsp;&nbsp;<label for="precio_buchannas700">Precio &dollar;</label>&nbsp;&nbsp;
                                    <input type="text" name="precio_buchannas700" id="precio_buchannas700"
                                        style="width: 85px; height: 35px; border-radius: 0.3rem;" maxlength="6"
                                        minlength="5" autocomplete="off" required disabled onkeypress="see12()">
                                    <span id="texto10"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div id="bc_375" style="display: none">
                                    <div class="switch-toggle switch-3 switch-candy">
                                        <input id="buchannas375_si" name="buchannas375" type="radio"
                                            value="buchannas375_si" required disabled />
                                        <label for="buchannas375_si">SI</label>
                                        <input id="buchannas375_choose" name="buchannas375" type="radio"
                                            value="buchannas375_choose"checked="checked" disabled />
                                        <label for="buchannas375_choose">buchannas 375 ml</label>
                                        <input id="buchannas375_no" name="buchannas375" type="radio"
                                            value="buchannas375_no" />
                                        <label for="buchannas375_no">NO</label>
                                        <a></a>
                                    </div>
                                </div>
                                <div id="divBuchannas375" style="display: none" class="mt-2">
                                    &nbsp;&nbsp;<label for="caras_buchannas375">Caras en el
                                        lineal</label>&nbsp;&nbsp;
                                    <input type="text" name="caras_buchannas375" id="caras_buchannas375"
                                        maxlength="2" style="width: 50px; height: 35px; border-radius:0.3rem;"
                                        autocomplete="off" required disabled>
                                    &nbsp;&nbsp;<label for="precio_buchannas375">Precio &dollar;</label>&nbsp;&nbsp;
                                    <input type="text" name="precio_buchannas375" id="precio_buchannas375"
                                        style="width: 85px; height: 35px; border-radius: 0.3rem;" maxlength="6"
                                        minlength="5" autocomplete="off" required disabled onkeypress="see13()">
                                    <span id="texto11"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-12 material" style="display: none" id="calimarc">
        <div class="card">
            <div class="ttulo" style="display: none" id="title_cmv">
                <h5><strong>CALIDAD DE MARCAS</strong></h5>
                <green><span>Valide la calidad de las marcas obligatorias del segmento</span></green>
            </div>
            <div class="col">
                <div class="col" id="divCal_marc_v" style="display: none">
                    <br>
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="cal_marc_visible_si" name="cal_marc_visible" type="radio"
                            value="cal_marc_visible_si" disabled required />
                        <label for="cal_marc_visible_si">SI</label>
                        <input id="cal_marc_visible_choose" name="cal_marc_visible" type="radio"
                            value="cal_marc_visible_choose" checked="checked" disabled />
                        <label for="cal_marc_visible_choose">&iquest;Est&aacute;n visibles al consumidor? (no Est&aacute;n
                            tapados con otros productos)
                        </label>
                        <input id="cal_marc_visible_no" name="cal_marc_visible" type="radio"
                            value="cal_marc_visible_no" />
                        <label for="cal_marc_visible_no">NO</label>
                        <a></a>
                    </div>
                </div>
                <br><br>
                <br><br>
                <div class="col" id="divCal_marc_d" style="display: none">
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="cal_marc_danados_si" name="cal_marc_danados" type="radio"
                            value="cal_marc_danados_si" required disabled />
                        <label for="cal_marc_danados_si">SI</label>
                        <input id="cal_marc_danados_choose" name="cal_marc_danados" type="radio"
                            value="cal_marc_danados_choose" checked="checked" disabled />
                        <label for="cal_marc_danados_choose">&iquest;Tienen las etiquetas en buen estado? ( no Est&aacute;n
                            rayadas, levantadas, buen tono de color)</label>
                        <input id="cal_marc_danados_no" name="cal_marc_danados" type="radio"
                            value="cal_marc_danados_no" />
                        <label for="cal_marc_danados_no">NO</label>
                        <a></a>
                    </div>
                </div>
                <br><br>
                <br><br>
                <div class="col" id="divCal_marc_etd" style="display: none">
                    <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                        <input id="cal_marc_et_danados_si" name="cal_marc_et_danados" type="radio"
                            value="cal_marc_et_danados_si" required disabled />
                        <label for="cal_marc_et_danados_si">SI</label>
                        <input id="cal_marc_et_danados_choose" name="cal_marc_et_danados" type="radio"
                            value="cal_marc_et_danados_choose" checked="checked" disabled />
                        <label for="cal_marc_et_danados_choose">&iquest;Est&aacute;n las etiquetas visibles al
                            consumidor</label>
                        <input id="cal_marc_et_danados_no" name="cal_marc_et_danados" type="radio"
                            value="cal_marc_et_danados_no" />
                        <label for="cal_marc_et_danados_no">NO</label>
                        <a></a>
                    </div>
                </div>
                <br><br>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-12" id="divImgCal" style="display: none; text-align: center;">
        <div class="card">
            <div class="ttulo">
                <green><span>Tome foto del lineal donde Est&aacute;n los productos Diageo</span></green>
            </div>
            <div class="col">
                <br>
                <input type="file" id="seleccionLinealDiageo" name="seleccionLinealDiageo" accept="image/*" required
                    disabled onclick="seeRones()">
                <br><br>
                <img class="card-img-top" id="imagenLinealDiageo">
                <br><br>
                <br><br>
            </div>
        </div>
    </div>
    <hr>
    <div id="divRonesTitulo" style="display: none">
        <h2 style="text-align: center;">Competencia</h2>
        <div class="col">
            <br><br>
            <div class="ttulo">
                <green><span>Indique si hay presencia de Rones de la competencia en el lineal</span></green>
            </div>
            <br><br>
            <div class="col">
                <br>
                <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                    <input id="hay_ron_si" name="hay_ron" type="radio" value="hay_ron_si" required disabled />
                    <label for="hay_ron_si">SI</label>
                    <input id="hay_ron_choose" name="hay_ron" type="radio" value="hay_ron_choose" checked="checked"
                        disabled />
                    <label for="hay_ron_choose">&iquest;hay presencia de rones de la competencia?</label>
                    <input id="hay_ron_no" name="hay_ron" type="radio" value="hay_ron_no" disabled />
                    <label for="hay_ron_no">NO</label>
                    <a></a>
                </div>
                <br><br>
            </div>
        </div>
    </div>
    <br>
    <div style="display: none" id="divRones">
        <div style="display: none" id="divRones" class="d-flex justify-content-center">
            <blue>
                <span>Registre la información de rones de la competencia, indague con cliente cual es la primer y segunda
                    marca
                    mas vendida en pdv y registre precio de sku de 750 ml</span>
            </blue>
        </div>
        <br>
        <div class="col-12">
            <div class="card">
                <div class="ttulo">
                    <green><span>Seleccione la marca de la competencia en ron y la informacion adicional</span></green>
                </div>
                <div class="col">
                    <img class="img_botellasx3 swing" src="{{ asset('/storage/ronx3.png') }}"
                        style="text-align: center" />
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="ttulo">
                            <green><span>Marca de ron 1</span></green>
                        </div>
                    </div>
                    <div class="col-md-3">
                        {!! Form::select('comp_ron1', $competenciaRon, null, [
                            'class' => 'form-control',
                            'placeholder' => 'Seleccione marca',
                            'id' => 'comp_ron1',
                            'required',
                            'disabled',
                        ]) !!}
                    </div>
                    <div class="col-md-3">
                        <div class="ttulo">
                            <green><span>Precio 750 ml &dollar;</span></green>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="precio_comp_ron1" id="precio_comp_ron1" class="form-control"
                            style="border-radius: 0.3rem;" maxlength="6" minlength="5" autocomplete="off" required
                            disabled>
                        <span id="texto12"></span>
                    </div>
                    <div class="col-md-3">
                        <div class="ttulo">
                            <green><span>Marca de ron 2</span></green>
                        </div>
                    </div>

                    <div class="col-md-3">
                        {!! Form::select('comp_ron2', $competenciaRon, null, [
                            'class' => 'form-control',
                            'placeholder' => 'Seleccione marca',
                            'id' => 'comp_ron2',
                            'required',
                            'disabled',
                        ]) !!}
                    </div>
                    <div class="col-md-3">
                        <div class="ttulo">
                            <green><span>Precio 750 ml &dollar;</span></green>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="precio_comp_ron2" id="precio_comp_ron2" class="form-control"
                            style="border-radius: 0.3rem;" maxlength="6" minlength="5" autocomplete="off" required
                            disabled>
                        <span id="texto13"></span>
                    </div>
                    <div class="col-md-3">
                        <div class="ttulo">
                            <green><span>Caras en el lineal de rones</span></green>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <input name="caras_comp_ron" id="caras_comp_ron" type="text" class="form-control"
                            maxlength="2" required disabled>
                    </div>
                </div>
                <br><br>
                <div class="d-flex justify-content-center">
                    <div class="ttulo">
                        <green><span>Foto del lineal de ron</span></green>
                    </div>
                    <br>
                    <input type="file" id="seleccionLinealR" name="seleccionLinealR" accept="image/*" required
                        disabled onclick="see15()">
                    <br><br>
                    <img class="card-img-top" id="imagenLinearlR">
                </div>
                <br><br>

            </div>
        </div>

    </div>
    <br>
    <div id="aguardientesDiv" style="display: none">
        <div class="col">
            <br><br>
            <div class="ttulo">
                <green><span>Indique si hay presencia de Aguardientes de la competencia en el lineal</span></green>
            </div>
            <br><br>
            <div class="col">
                <br>
                <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                    <input id="hay_aguardiente_si" name="hay_aguardiente" type="radio" value="hay_aguardiente_si"
                        required disabled />
                    <label for="hay_aguardiente_si">SI</label>
                    <input id="hay_aguardiente_choose" name="hay_aguardiente" type="radio"
                        value="hay_aguardiente_choose" checked="checked" disabled />
                    <label for="hay_aguardiente_choose">&iquest;hay presencia de aguardientes de la
                        competencia?</label>
                    <input id="hay_aguardiente_no" name="hay_aguardiente" type="radio"
                        value="hay_aguardiente_no" />
                    <label for="hay_aguardiente_no">NO</label>
                    <a></a>
                </div>
                <br><br>
            </div>
        </div>
    </div>
    <div style="display: none" id="divAguardiente">
        <div class="d-flex justify-content-center">
            <blue>
                <span>Registre la información de aguardientes de la competencia, indague con cliente cual es la
                    primer y
                    segunda marca
                    mas vendida en pdv y registre precio de sku de 750 ml</span>
            </blue>
        </div>
        <br>
        <div class="col-12">
            <div class="card">
                <div class="ttulo">
                    <green><span>Seleccione la marca de la competencia en aguardiente y la informaci&oacute;n
                            adicional</span></green>
                </div>
                <div class="col">
                    <img class="img_botellasx3 swing" src="{{ asset('/storage/aguardientes.png') }}"
                        style="text-align: center" />
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="ttulo">
                            <green><span>Marca de aguardiente 1</span></green>
                        </div>
                    </div>

                    <div class="col-md-3">
                        {!! Form::select('comp_aguard1', $competenciaAguardiente, null, [
                            'class' => 'form-control',
                            'placeholder' => 'Seleccione marca',
                            'id' => 'comp_aguard1',
                            'required',
                            'disabled',
                        ]) !!}
                    </div>
                    <div class="col-md-3">
                        <div class="ttulo">
                            <green><span>Precio 750 ml &dollar;</span></green>
                        </div>
                    </div>
                    <div class="col-md-3">

                        <input type="text" name="precio_comp_aguardiente1" id="precio_comp_aguardiente1"
                            class="form-control" style="border-radius: 0.3rem;" maxlength="6" minlength="5"
                            autocomplete="off">
                        <span id="texto14"></span>
                    </div>
                    <div class="col-md-3">
                        <div class="ttulo">
                            <green><span>Marca de aguardiente 2</span></green>
                        </div>
                    </div>
                    <div class="col-md-3">
                        {!! Form::select('comp_aguard2', $competenciaAguardiente, null, [
                            'class' => 'form-control',
                            'placeholder' => 'Seleccione marca',
                            'id' => 'comp_aguard2',
                            'required',
                            'disabled',
                        ]) !!}
                    </div>
                    <div class="col-md-3">
                        <div class="ttulo">
                            <green><span>Precio 750 ml &dollar;</span></green>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="precio_comp_aguardiente2" id="precio_comp_aguardiente2"
                            class="form-control" style="border-radius: 0.3rem;" maxlength="6" minlength="5"
                            autocomplete="off">
                        <span id="texto15"></span>
                    </div>
                    <div class="col-md-3">
                        <div class="ttulo">
                            <green><span>Caras en el lineal de aguardientes</span></green>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <input name="caras_comp_aguardiente" id="caras_comp_aguardiente" type="text"
                            class="form-control" maxlength="2">
                    </div>
                </div>
                <br><br>
                <div class="d-flex justify-content-center">
                    <div class="ttulo">
                        <green><span>Foto del lineal de aguardiente</span></green>
                    </div>
                    <br>
                    <input type="file" id="seleccionLinealA" name="seleccionLinealA" accept="image/*"
                        onclick="see16()" required disabled>
                    <br><br>
                    <img class="card-img-top" id="imagenLinearlA">
                </div>
            </div>
        </div>
    </div>

    </div>

    <br>
    <div id="divSubmit" style="display: none">
        {!! Form::submit('Siguiente', ['class' => 'btn btn-primary', 'id' => 'boton']) !!}
        <br><br>
    </div>

    </p>
    {!! Form::close() !!}
@stop

@section('js')
    <script>
        const $seleccionLinealDiageo = document.querySelector("#seleccionLinealDiageo"),
            $imagenLinealDiageo = document.querySelector("#imagenLinealDiageo");

        $seleccionLinealDiageo.addEventListener("change", () => {
            const archivos = $seleccionLinealDiageo.files;
            if (!archivos || !archivos.length) {
                $imagenLinearlR.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenLinealDiageo.src = objectURL;
        });
    </script>




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
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "bAndw1000_si") {
                    $("#divbaw1000").show();
                    $("#caras_bAndw1000").prop('disabled', false);
                    $("#precio_bAndw1000").prop('disabled', false);
                    $("#caras_bAndw1000").focus();
                } else if (valor == "bAndw1000_no") {
                    $("#divbaw1000").hide();
                    $("#bw700").show();
                    $("#bAndw700_si").prop('disabled', false);
                    $("#bAndw700_no").prop('disabled', false);
                    $("#caras_bAndw1000").prop('disabled', true);
                    $("#precio_bAndw1000").prop('disabled', true);
                }
            });
        });
    </script>
    <script>
        function see01() {
            $("#bw700").show();
            $("#bAndw700_si").prop('disabled', false);
            $("#bAndw700_no").prop('disabled', false);
        }
    </script>

    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "bAndw700_si") {
                    $("#divbaw700").show();
                    $("#caras_bAndw700").prop('disabled', false);
                    $("#precio_bAndw700").prop('disabled', false);
                    $("#caras_bAndw700").focus();
                } else if (valor == "bAndw700_no") {
                    $("#divbaw700").hide();
                    $("#bw375").show();
                    $("#bAndw375_si").prop('disabled', false);
                    $("#bAndw375_no").prop('disabled', false);
                    $("#caras_bAndw700").prop('disabled', true);
                    $("#precio_bAndw700").prop('disabled', true);
                }
            });
        });
    </script>
    <script>
        function see02() {
            $("#bw375").show();
            $("#bAndw375_si").prop('disabled', false);
            $("#bAndw375_no").prop('disabled', false);
        }
    </script>


    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "bAndw375_si") {
                    $("#divbaw375").show();
                    $("#caras_bAndw375").prop('disabled', false);
                    $("#precio_bAndw375").prop('disabled', false);
                    $("#caras_bAndw375").focus();
                } else if (valor == "bAndw375_no") {
                    $("#divbaw375").hide();
                    $("#caras_bAndw375").prop('disabled', true);
                    $("#precio_bAndw375").prop('disabled', true);
                    $("#sm700").show();
                    $("#title_sm").show()
                    $("#smirnoff700_si").prop('disabled', false);
                    $("#smirnoff700_no").prop('disabled', false);
                    $("#smirDiv").show();
                }
            });
        });
    </script>
    <script>
        function see03() {
            $("#sm700").show();
            $("#title_sm").show()
            $("#smirnoff700_si").prop('disabled', false);
            $("#smirnoff700_no").prop('disabled', false);
            $("#smirDiv").show();
        }
    </script>

    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "smirnoff700_si") {
                    $("#divSmirnoff700").show();
                    $("#caras_smirnoff700").prop('disabled', false);
                    $("#precio_smirnoff700").prop('disabled', false);
                    $("#caras_smirnoff700").focus();
                    $("#sm375").show();
                    $("#smirnoff375_si").prop('disabled', false);
                    $("#smirnoff375_no").prop('disabled', false);
                } else if (valor == "smirnoff700_no") {
                    $("#divSmirnoff700").hide();
                    $("#sm375").show();
                    $("#caras_smirnoff700").prop('disabled', true);
                    $("#precio_smirnoff700").prop('disabled', true);
                    $("#smirDiv1").show();
                }
            });
        });
    </script>
    <script>
        function see04() {
            $("#sm375").show();
            $("#smirnoff375_si").prop('disabled', false);
            $("#smirnoff375_no").prop('disabled', false);
            $("#smirDiv1").show();
        }
    </script>



    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "smirnoff375_si") {
                    $("#divSmirnoff375").show();
                    $("#caras_smirnoff375").prop('disabled', false);
                    $("#precio_smirnoff375").prop('disabled', false);
                    $("#caras_smirnoff375").focus();
                } else if (valor == "smirnoff375_no") {
                    $("#divSmirnoff375").hide();
                    $("#caras_smirnoff375").prop('disabled', true);
                    $("#precio_smirnoff375").prop('disabled', true);
                    $("#sm_ns700").show();
                    $("#title_smns").show();
                    $("#smirDiv1").show();
                    $("#smirnoff_ns700_si").prop('disabled', false);
                    $("#smirnoff_ns700_no").prop('disabled', false);
                }
            });
        });
    </script>

    <script>
        function see05() {
            $("#sm_ns700").show();
            $("#title_smns").show();
            $("#smirDiv1").show();
            $("#smirnoff_ns700_si").prop('disabled', false);
            $("#smirnoff_ns700_no").prop('disabled', false);
        }
    </script>

    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "smirnoff_ns700_si") {
                    $("#divSmirnoff_ns700").show();
                    $("#caras_smirnoff_ns700").prop('disabled', false);
                    $("#precio_smirnoff_ns700").prop('disabled', false);
                    $("#caras_smirnoff_ns700").focus();
                } else if (valor == "smirnoff_ns700_no") {
                    $("#divSmirnoff_ns700").hide();
                    $("#caras_smirnoff_ns700").prop('disabled', true);
                    $("#precio_smirnoff_ns700").prop('disabled', true);
                    $("#sm_ns375").show();
                    $("#smirnoff_ns375_si").prop('disabled', false);
                    $("#smirnoff_ns375_no").prop('disabled', false);
                    $("#smirDiv2").show();
                    $("#smirDiv3").show();
                }
            });
        });
    </script>
    <script>
        function see06() {
            $("#sm_ns375").show();
            $("#smirnoff_ns375_si").prop('disabled', false);
            $("#smirnoff_ns375_no").prop('disabled', false);
            $("#smirDiv2").show();
            $("#smirDiv3").show();
        }
    </script>


    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "smirnoff_ns375_si") {
                    $("#divSmirnoff_ns375").show();
                    $("#caras_smirnoff_ns375").prop('disabled', false);
                    $("#precio_smirnoff_ns375").prop('disabled', false);
                    $("#caras_smirnoff_ns375").focus();
                } else if (valor == "smirnoff_ns375_no") {
                    $("#divSmirnoff_ns375").hide();
                    $("#caras_smirnoff_ns375").prop('disabled', true);
                    $("#precio_smirnoff_ns375").prop('disabled', true);
                    $("#jw_1000").show();
                    $("#title_jw").show()
                    $("#jhonnie1000_si").prop('disabled', false);
                    $("#jhonnie1000_no").prop('disabled', false);
                    $("#ol750").show();
                    $("#title_op").show()
                    $("#oldparr750_si").prop('disabled', false);
                    $("#oldparr750_no").prop('disabled', false);
                }
            });
        });
    </script>

    <script>
        function see07() {
            $("#jw_1000").show();
            $("#title_jw").show()
            $("#jhonnie1000_si").prop('disabled', false);
            $("#jhonnie1000_no").prop('disabled', false);
            $("#ol750").show();
            $("#title_op").show()
            $("#oldparr750_si").prop('disabled', false);
            $("#oldparr750_no").prop('disabled', false);
        }
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "jhonnie1000_si") {
                    $("#divjhonnie1000").show();
                    $("#caras_jhonnie1000").prop('disabled', false);
                    $("#precio_jhonnie1000").prop('disabled', false);
                    $("#caras_jhonnie1000").focus();
                } else if (valor == "jhonnie1000_no") {
                    $("#divjhonnie1000").hide();
                    $("#caras_jhonnie1000").prop('disabled', true);
                    $("#precio_jhonnie1000").prop('disabled', true);
                    $("#js_700").show();
                    $("#jhonnie700_si").prop('disabled', false);
                    $("#jhonnie700_no").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        function see08() {
            $("#js_700").show();
            $("#jhonnie700_si").prop('disabled', false);
            $("#jhonnie700_no").prop('disabled', false);
        }
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "jhonnie700_si") {
                    $("#divjhonnie700").show();
                    $("#caras_jhonnie700").prop('disabled', false);
                    $("#precio_jhonnie700").prop('disabled', false);
                    $("#caras_jhonnie700").focus();
                } else if (valor == "jhonnie700_no") {
                    $("#divjhonnie700").hide();
                    $("#caras_jhonnie700").prop('disabled', true);
                    $("#precio_jhonnie700").prop('disabled', true);
                    $("#js_375").show();
                    $("#jhonnie375_si").prop('disabled', false);
                    $("#jhonnie375_no").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        function see09() {
            $("#js_375").show();
            $("#jhonnie375_si").prop('disabled', false);
            $("#jhonnie375_no").prop('disabled', false);
        }
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "jhonnie375_si") {
                    $("#divjhonnie375").show();
                    $("#caras_jhonnie375").prop('disabled', false);
                    $("#precio_jhonnie375").prop('disabled', false);
                    $("#caras_jhonnie375").focus();
                } else if (valor == "jhonnie375_no") {
                    $("#divjhonnie375").hide();
                    $("#caras_jhonnie375").prop('disabled', true);
                    $("#precio_jhonnie375").prop('disabled', true);
                    $("#ol750").show();
                    $("#title_op").show()
                    $("#oldparr750_si").prop('disabled', false);
                    $("#oldparr750_no").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        function see10() {
            $("#ol750").show();
            $("#title_op").show()
            $("#oldparr750_si").prop('disabled', false);
            $("#oldparr750_no").prop('disabled', false);
        }
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "oldparr750_si") {
                    $("#divOldparr750").show();
                    $("#caras_oldparr750").prop('disabled', false);
                    $("#precio_oldparr750").prop('disabled', false);
                    $("#caras_oldparr750").focus();
                } else if (valor == "oldparr750_no") {
                    $("#divOldparr750").hide();
                    $("#caras_oldparr750").prop('disabled', true);
                    $("#precio_oldparr750").prop('disabled', true);
                    $("#bc700").show();
                    $("#title_bc").show()
                    $("#buchannas700_si").prop('disabled', false);
                    $("#buchannas700_no").prop('disabled', false);
                    $("#smirDiv4").show();
                }
            });
        });
    </script>
    <script>
        function see11() {
            $("#bc700").show();
            $("#smirDiv4").show();
            $("#title_bc").show()
            $("#buchannas700_si").prop('disabled', false);
            $("#buchannas700_no").prop('disabled', false);
        }
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "buchannas700_si") {
                    $("#divBuchannas700").show();
                    $("#caras_buchannas700").prop('disabled', false);
                    $("#precio_buchannas700").prop('disabled', false);
                    $("#caras_buchannas700").focus();
                } else if (valor == "buchannas700_no") {
                    $("#divBuchannas700").hide();
                    $("#divBuchannas700").hide();

                    $("#caras_buchannas700").prop('disabled', true);
                    $("#precio_buchannas700").prop('disabled', true);
                    $("#bc_375").show();
                    $("#buchannas375_si").prop('disabled', false);
                    $("#buchannas375_no").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        function see12() {
            $("#bc_375").show();
            $("#buchannas375_si").prop('disabled', false);
            $("#buchannas375_no").prop('disabled', false);
        }
    </script>


    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "buchannas375_si") {
                    $("#divBuchannas375").show();
                    $("#caras_buchannas375").prop('disabled', false);
                    $("#precio_buchannas375").prop('disabled', false);
                    $("#caras_buchannas375").focus();
                } else if (valor == "buchannas375_no") {
                    $("#divBuchannas375").hide();
                    $("#caras_buchannas375").prop('disabled', true);
                    $("#precio_buchannas375").prop('disabled', true);
                    $("#divCal_marc_v").show();
                    $("#title_cmv").show()
                    $("#cal_marc_visible_si").prop('disabled', false);
                    $("#cal_marc_visible_no").prop('disabled', false);
                    $("#calimarc").show();


                }
            });
        });
    </script>

    <script>
        function see13() {


            $("#divCal_marc_v").show();
            $("#title_cmv").show();
            $("#calimarc").show();
            $("#cal_marc_visible_si").prop('disabled', false);
            $("#cal_marc_visible_no").prop('disabled', false);
        }
    </script>

    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "cal_marc_visible_si") {
                    $("#divCal_marc_d").show();
                    $("#cal_marc_danados_si").prop('disabled', false);
                    $("#cal_marc_danados_no").prop('disabled', false);
                } else if (valor == "cal_marc_visible_no") {
                    $("#divCal_marc_d").show();
                    $("#cal_marc_danados_si").prop('disabled', false);
                    $("#cal_marc_danados_no").prop('disabled', false);
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "cal_marc_danados_si") {
                    $("#divCal_marc_etd").show();
                    $("#cal_marc_et_danados_si").prop('disabled', false);
                    $("#cal_marc_et_danados_no").prop('disabled', false);
                } else if (valor == "cal_marc_danados_no") {
                    $("#divCal_marc_etd").show();
                    $("#cal_marc_et_danados_si").prop('disabled', false);
                    $("#cal_marc_et_danados_no").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "cal_marc_et_danados_si") {
                    $("#seleccionLinealDiageo").prop('disabled', false);
                    $("#hay_ron_no").prop('disabled', false);
                    $("#hay_ron_si").prop('disabled', false);
                    $("#precio_comp_ron1").prop('disabled', false);
                    $("#precio_comp_ron2").prop('disabled', false);
                    $("#caras_comp_ron").prop('disabled', false);
                    $("#divImgCal").show();
                } else if (valor == "cal_marc_et_danados_no") {
                    $("#seleccionLinealDiageo").prop('disabled', false);
                    $("#hay_ron_no").prop('disabled', false);
                    $("#hay_ron_si").prop('disabled', false);
                    $("#divImgCal").show();
                }
            });
        });
    </script>
    <script>
        function seeRones() {
            var y = document.getElementById("divRonesTitulo");
            y.style.display = 'block';
            $("#hay_ron_si").prop('disabled', false);
            $("#hay_ron_no").prop('disabled', false);
        }
    </script>

    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "hay_ron_si") {
                    $("#divRones").show();
                    $("#comp_ron1").prop('disabled', false);
                    $("#comp_ron2").prop('disabled', false);
                    $("#seleccionLinealR").prop('disabled', false);
                    $("#precio_comp_ron1").prop('disabled', false);
                    $("#caras_comp_ron").prop('disabled', false);
                    $("#precio_comp_ron2").prop('disabled', false);

                } else if (valor == "hay_ron_no") {
                    $("#divRones").hide();
                    $("#comp_ron1").prop('disabled', true);
                    $("#comp_ron2").prop('disabled', true);
                    $("#seleccionLinealR").prop('disabled', true);
                    $("#precio_comp_ron1").prop('disabled', true);
                    $("#caras_comp_ron").prop('disabled', true);
                    $("#precio_comp_ron2").prop('disabled', true);
                    $("#aguardientesDiv").show();
                    $("#hay_aguardiente_si").prop('disabled', false);
                    $("#hay_aguardiente_no").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        function see15() {
            $("#aguardientesDiv").show();
            $("#hay_aguardiente_si").prop('disabled', false);
            $("#hay_aguardiente_no").prop('disabled', false);
        }
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "hay_aguardiente_si") {
                    $("#divAguardiente").show();
                    $("#comp_aguard1").prop('disabled', false);
                    $("#comp_aguard2").prop('disabled', false);
                    $("#seleccionLinealA").prop('disabled', false);
                } else if (valor == "hay_aguardiente_no") {
                    $("#divImgCal").show();
                    $("#comp_aguard1").prop('disabled', false);
                    $("#comp_aguard2").prop('disabled', false);
                    $("#seleccionLinealA").prop('disabled', true);
                }
            });
        });
    </script>
    <script>
        function see16() {
            $("#divSubmit").show();
        }
    </script>




    <script>
        // Jquery Dependency

        $("input[data-type='currency']").on({
            keyup: function() {
                formatCurrency($(this));
            },
            blur: function() {
                formatCurrency($(this), "blur");
            }
        });


        function formatNumber(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        }


        function formatCurrency(input, blur) {
            // appends $ to value, validates decimal side
            // and puts cursor back in right position.

            // get input value
            var input_val = input.val();

            // don't validate empty input
            if (input_val === "") {
                return;
            }

            // original length
            var original_len = input_val.length;

            // initial caret position
            var caret_pos = input.prop("selectionStart");

            // check for decimal
            if (input_val.indexOf(".") >= 0) {

                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(".");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumber(right_side);

                // On blur make sure 2 numbers after decimal
                if (blur === "blur") {
                    right_side += "";
                }

                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 0);

                // join number by .
                input_val = "$" + left_side + "." + right_side;


            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);
                input_val = "$" + input_val;

                // final formatting
                if (blur === "blur") {
                    input_val += "";
                }
            }

            // send updated string to input
            input.val(input_val);

            // put caret back in the right position
            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input[0].setSelectionRange(caret_pos, caret_pos);
        }
    </script>
    <script>
        document.getElementById("precio_bAndw1000").addEventListener("keyup", function(e) {
            document.getElementById("texto").innerHTML = NumeroALetras(this.value);
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
        document.getElementById("precio_bAndw700").addEventListener("keyup", function(e) {
            document.getElementById("texto02").innerHTML = NumeroALetras(this.value);
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
        document.getElementById("precio_bAndw375").addEventListener("keyup", function(e) {
            document.getElementById("texto03").innerHTML = NumeroALetras(this.value);
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
        document.getElementById("precio_smirnoff700").addEventListener("keyup", function(e) {
            document.getElementById("texto04").innerHTML = NumeroALetras(this.value);
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
        document.getElementById("precio_smirnoff_ns700").addEventListener("keyup", function(e) {
            document.getElementById("textons").innerHTML = NumeroALetras(this.value);
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
        document.getElementById("precio_smirnoff375").addEventListener("keyup", function(e) {
            document.getElementById("texto05").innerHTML = NumeroALetras(this.value);
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
        document.getElementById("precio_smirnoff_ns375").addEventListener("keyup", function(e) {
            document.getElementById("texto375ns").innerHTML = NumeroALetras(this.value);
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
        document.getElementById("precio_jhonnie1000").addEventListener("keyup", function(e) {
            document.getElementById("texto06").innerHTML = NumeroALetras(this.value);
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
        document.getElementById("precio_jhonnie700").addEventListener("keyup", function(e) {
            document.getElementById("texto07").innerHTML = NumeroALetras(this.value);
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
        document.getElementById("precio_jhonnie1000").addEventListener("keyup", function(e) {
            document.getElementById("texto06").innerHTML = NumeroALetras(this.value);
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
        document.getElementById("precio_jhonnie700").addEventListener("keyup", function(e) {
            document.getElementById("texto07").innerHTML = NumeroALetras(this.value);
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
        document.getElementById("precio_oldparr750").addEventListener("keyup", function(e) {
            document.getElementById("texto09").innerHTML = NumeroALetras(this.value);
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
        document.getElementById("precio_jhonnie375").addEventListener("keyup", function(e) {
            document.getElementById("texto08").innerHTML = NumeroALetras(this.value);
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
        document.getElementById("precio_oldparr750").addEventListener("keyup", function(e) {
            document.getElementById("texto09").innerHTML = NumeroALetras(this.value);
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
        document.getElementById("precio_buchannas700").addEventListener("keyup", function(e) {
            document.getElementById("texto10").innerHTML = NumeroALetras(this.value);
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
        document.getElementById("precio_comp_ron1").addEventListener("keyup", function(e) {
            document.getElementById("texto12").innerHTML = NumeroALetras(this.value);
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
        document.getElementById("precio_comp_ron2").addEventListener("keyup", function(e) {
            document.getElementById("texto13").innerHTML = NumeroALetras(this.value);
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
        document.getElementById("precio_buchannas375").addEventListener("keyup", function(e) {
            document.getElementById("texto11").innerHTML = NumeroALetras(this.value);
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
@stop
