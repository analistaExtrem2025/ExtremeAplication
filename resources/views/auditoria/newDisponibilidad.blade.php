@extends('adminlte::page')
@section('title', 'Disponibilidad')

@section('css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/css-toggle-switch/latest/toggle-switch.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Arapey:400,400i,600|Open+Sans:300" rel="stylesheet">
    <link href="{{ asset('css/auditoria.css') }}" rel="stylesheet">
@stop
@section('content')
    <h5><span class="numeros">4</span>DISPONIBILIDAD DE MARCA</h5>
    {!! Form::model($puntos_auditoria, [
        'route' => ['disponibilidad.update', $puntos_auditoria->id],
        'method' => 'put',
        'enctype' => 'multipart/form-data',
        'files' => 'true',
    ]) !!}
    <img src="" alt="">
    <input type="hidden" name="precarga_id" value="{{ $puntos_auditoria->precarga_id }}">
    <p>
    <div class="col-12">
        <div class="card">
            <div class="ttulo" style="text-align: center">
                <green><span>Indique la existencia de Black & White</span></green>
            </div>
            <div class="row">
                <div class="row">
                    <img class="img_botellas" alt="vasos" src="{{ asset('/storage/b&w.png') }}" />
                    <div class="col">
                        <div class="form-group">
                            <div class="row">
                                <div class="switch-toggle switch-3 switch-candy">
                                    <input id="bAndw1000_si" name="bAndw1000" type="radio" value="bAndw1000_si" />
                                    <label for="bAndw1000_si">SI</label>
                                    <input id="bAndw1000_choose" name="bAndw1000" type="radio" value="bAndw1000_choose"
                                        checked="checked" disabled />
                                    <label for="bAndw1000_choose">Black & White 1000 ml</label>
                                    <input id="bAndw1000_no" name="bAndw1000" type="radio" value="bAndw1000_no" />
                                    <label for="bAndw1000_no">NO</label>
                                    <a></a>
                                </div><br><br>
                                <div id="divbaw1000" style="display: none" class="mt-2">
                                    &nbsp;&nbsp;<label for="">Caras en el lineal</label>&nbsp;&nbsp;
                                    <input type="text" name="caras_bAndw1000"
                                        style="width: 50px; height: 35px; border-radius:0.3rem;" autocomplete="off"
                                        maxlength="2    ">
                                    &nbsp;&nbsp;<label for="">Precio &dollar; </label>&nbsp;&nbsp;
                                    <input type="text" name="precio_bAndw1000" id="precio_bAndw1000"
                                        style="width: 85px; height: 35px; border-radius: 0.3rem;" maxlength="6"
                                        minlength="5" autocomplete="off">
                                    <span id="texto"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="switch-toggle switch-3 switch-candy">
                                    <input id="bAndw700_si" name="bAndw700" type="radio" value="bAndw700_si" />
                                    <label for="bAndw700_si">SI</label>
                                    <input id="bAndw700_choose" name="bAndw700" type="radio" value="bAndw700_choose"
                                        checked="checked" disabled />
                                    <label for="bAndw700_choose">Black & White 700 ml</label>
                                    <input id="bAndw700_no" name="bAndw700" type="radio" value="bAndw700_no" />
                                    <label for="bAndw700_no">NO</label>
                                    <a></a>
                                </div><br><br>
                                <div id="divbaw700" style="display: none" class="mt-2">
                                    &nbsp;&nbsp;<label for="">Caras en el lineal</label>&nbsp;&nbsp;
                                    <input type="text" name="caras_bAndw700"
                                        style="width: 50px; height: 35px; border-radius:0.3rem;" autocomplete="off">
                                    &nbsp;&nbsp;<label for="">Precio &dollar; </label>&nbsp;&nbsp;
                                    <input type="text" name="precio_bAndw700" id="precio_bAndw700"
                                        style="width: 85px; height: 35px; border-radius: 0.3rem;" maxlength="6"
                                        minlength="5" autocomplete="off">
                                    <span id="texto02"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="switch-toggle switch-3 switch-candy">
                                    <input id="bAndw375_si" name="bAndw375" type="radio" value="bAndw375_si" />
                                    <label for="bAndw375_si">SI</label>
                                    <input id="bAndw375_choose" name="bAndw375" type="radio" value="bAndw375_choose"
                                        checked="checked" disabled />
                                    <label for="bAndw375_choose">Black & White 375 ml</label>
                                    <input id="bAndw375_no" name="bAndw375" type="radio" value="bAndw375_no" />
                                    <label for="bAndw375_no">NO</label>
                                    <a></a>
                                </div><br><br>
                                <div id="divbaw375" style="display: none" class="mt-2">
                                    &nbsp;&nbsp;<label for="">Caras en el lineal</label>&nbsp;&nbsp;
                                    <input type="text" name="caras_bAndw375"
                                        style="width: 50px; height: 35px; border-radius:0.3rem;" autocomplete="off">
                                    &nbsp;&nbsp;<label for="">Precio &dollar;</label>&nbsp;&nbsp;
                                    <input type="text" name="precio_bAndw375" id="precio_bAndw375"
                                        style="width: 85px; height: 35px; border-radius: 0.3rem;" maxlength="6"
                                        minlength="5" autocomplete="off">
                                    <span id="texto03"></span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="ttulo" style="text-align: center">
                <green><span>Indique la existencia de Smirnoff</span></green>
            </div>
            <div class="row">
                <div class="row">
                    <img class="img_botellas" alt="vasos" src="{{ asset('/storage/smirnoff.png') }}" />
                    <div class="col">
                        <div class="form-group">
                            <div class="row">
                                <div class="switch-toggle switch-3 switch-candy">
                                    <input id="smirnoff700_si" name="smirnoff700" type="radio"
                                        value="smirnoff700_si" />
                                    <label for="smirnoff700_si">SI</label>
                                    <input id="smirnoff700_choose" name="smirnoff700" type="radio"
                                        value="smirnoff700_choose"checked="checked" disabled />
                                    <label for="smirnoff700_choose">Smirnoff 700 ml</label>
                                    <input id="smirnoff700_no" name="smirnoff700" type="radio"
                                        value="smirnoff700_no" />
                                    <label for="smirnoff700_no">NO</label>
                                    <a></a>
                                </div>
                                <div id="divSmirnoff700" style="display: none" class="mt-2">
                                    &nbsp;&nbsp;<label for="">Caras en el lineal</label>&nbsp;&nbsp;
                                    <input type="text" name="caras_smirnoff700"
                                        style="width: 50px; height: 35px; border-radius:0.3rem;" autocomplete="off">
                                    &nbsp;&nbsp;<label for="">Precio &dollar;</label>&nbsp;&nbsp;
                                    <input type="text" name="precio_smirnoff700" id="precio_smirnoff700"
                                        style="width: 85px; height: 35px; border-radius: 0.3rem;" maxlength="6"
                                        minlength="5" autocomplete="off">
                                    <span id="texto04"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
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
                                <div id="divSmirnoff375" style="display: none" class="mt-2">
                                    &nbsp;&nbsp;<label for="">Caras en el lineal</label>&nbsp;&nbsp;
                                    <input type="text" name="caras_smirnoff375"
                                        style="width: 50px; height: 35px; border-radius:0.3rem;" autocomplete="off">
                                    &nbsp;&nbsp;<label for="">Precio &dollar;</label>&nbsp;&nbsp;
                                    <input type="text" name="precio_smirnoff375" id="precio_smirnoff375"
                                        style="width: 85px; height: 35px; border-radius: 0.3rem;" maxlength="6"
                                        minlength="5" autocomplete="off">
                                    <span id="texto05"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($usuario == 'MEDELLIN')
        <div class="col-12">
            <div class="card">
                <div class="ttulo" style="text-align: center">
                    <green><span>Indique la existencia de Johnnie Walker</span></green>
                </div>
                <div class="row">
                    <div class="row">
                        <img class="img_botellas" alt="vasos" src="{{ asset('/storage/jhonie_walker.png') }}" />
                        <div class="col">
                            <div class="form-group">
                                <div class="row">
                                    <div class="switch-toggle switch-3 switch-candy">
                                        <input id="jhonnie1000_si" name="jhonnie1000" type="radio"
                                            value="jhonnie1000_si" />
                                        <label for="jhonnie1000_si">SI</label>
                                        <input id="jhonnie1000_choose" name="jhonnie1000" type="radio"
                                            value="jhonnie1000_choose"checked="checked" disabled />
                                        <label for="jhonnie1000_choose">Johnnie Walker Red 1000 ml</label>
                                        <input id="jhonnie1000_no" name="jhonnie1000" type="radio"
                                            value="jhonnie1000_no" />
                                        <label for="jhonnie1000_no">NO</label>
                                        <a></a>
                                    </div>
                                    <div id="divjhonnie1000" style="display: none" class="mt-2">
                                        &nbsp;&nbsp;<label for="">Caras en el
                                            lineal</label>&nbsp;&nbsp;
                                        <input type="text" name="caras_jhonnie1000"
                                            style="width: 50px; height: 35px; border-radius:0.3rem;" autocomplete="off">
                                        &nbsp;&nbsp;<label for="">Precio &dollar;</label>&nbsp;&nbsp;
                                        <input type="text" name="precio_jhonnie1000" id="precio_jhonnie1000"
                                            style="width: 85px; height: 35px; border-radius: 0.3rem;" maxlength="6"
                                            minlength="5" autocomplete="off">
                                        <span id="texto06"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="switch-toggle switch-3 switch-candy">
                                        <input id="jhonnie700_si" name="jhonnie700" type="radio"
                                            value="jhonnie700_si" />
                                        <label for="jhonnie700_si">SI</label>
                                        <input id="jhonnie700_choose" name="jhonnie700" type="radio"
                                            value="jhonnie700_choose"checked="checked" disabled />
                                        <label for="jhonnie700_choose">Johnnie Walker Red 700 ml</label>
                                        <input id="jhonnie700_no" name="jhonnie700" type="radio"
                                            value="jhonnie700_no" />
                                        <label for="jhonnie700_no">NO</label>
                                        <a></a>
                                    </div>
                                    <div id="divjhonnie700" style="display: none" class="mt-2">
                                        &nbsp;&nbsp;<label for="">Caras en el
                                            lineal</label>&nbsp;&nbsp;
                                        <input type="text" name="caras_jhonnie700"
                                            style="width: 50px; height: 35px; border-radius:0.3rem;" autocomplete="off">
                                        &nbsp;&nbsp;<label for="">Precio &dollar;</label>&nbsp;&nbsp;
                                        <input type="text" name="precio_jhonnie700" id="precio_jhonnie700"
                                            style="width: 85px; height: 35px; border-radius: 0.3rem;" maxlength="6"
                                            minlength="5" autocomplete="off">
                                        <span id="texto07"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="switch-toggle switch-3 switch-candy">
                                        <input id="jhonnie375_si" name="jhonnie375" type="radio"
                                            value="jhonnie375_si" />
                                        <label for="jhonnie375_si">SI</label>
                                        <input id="jhonnie375_choose" name="jhonnie375" type="radio"
                                            value="jhonnie375_choose"checked="checked" disabled />
                                        <label for="jhonnie375_choose">Johnnie Walker Red 375 ml</label>
                                        <input id="jhonnie375_no" name="jhonnie375" type="radio"
                                            value="jhonnie375_no" />
                                        <label for="jhonnie375_no">NO</label>
                                        <a></a>
                                    </div>
                                    <div id="divjhonnie375" style="display: none" class="mt-2">
                                        &nbsp;&nbsp;<label for="">Caras en el
                                            lineal</label>&nbsp;&nbsp;
                                        <input type="text" name="caras_jhonnie375"
                                            style="width: 50px; height: 35px; border-radius:0.3rem;" autocomplete="off">
                                        &nbsp;&nbsp;<label for="">Precio &dollar;</label>&nbsp;&nbsp;
                                        <input type="text" name="precio_jhonnie375" id="precio_jhonnie375"
                                            style="width: 85px; height: 35px; border-radius: 0.3rem;" maxlength="6"
                                            minlength="5" autocomplete="off">
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
    <div class="col-12">
        <div class="card">
            <div class="ttulo" style="text-align: center">
                <green><span>Indique la existencia de Old Parr</span></green>
            </div>
            <div class="row">
                <div class="row">
                    <img class="img_botellas" alt="vasos" src="{{ asset('/storage/oldparr.png') }}" />
                    <div class="col">
                        <div class="form-group">
                            <div class="row">
                                <div class="switch-toggle switch-3 switch-candy">
                                    <input id="oldparr750_si" name="oldparr750" type="radio" value="oldparr750_si" />
                                    <label for="oldparr750_si">SI</label>
                                    <input id="oldparr750_choose" name="oldparr750" type="radio"
                                        value="oldparr750_choose"checked="checked" disabled />
                                    <label for="oldparr750_choose">oldparr 750 ml</label>
                                    <input id="oldparr750_no" name="oldparr750" type="radio" value="oldparr750_no" />
                                    <label for="oldparr750_no">NO</label>
                                    <a></a>
                                </div>
                                <div id="divOldparr750" style="display: none" class="mt-2">
                                    &nbsp;&nbsp;<label for="">Caras en el lineal</label>&nbsp;&nbsp;
                                    <input type="text" name="caras_oldparr750"
                                        style="width: 50px; height: 35px; border-radius:0.3rem;" autocomplete="off">
                                    &nbsp;&nbsp;<label for="">Precio &dollar;</label>&nbsp;&nbsp;

                                    <input type="text" name="precio_oldparr750" id="precio_oldparr750"
                                        style="width: 85px; height: 35px; border-radius: 0.3rem;" maxlength="6"
                                        minlength="5" autocomplete="off">
                                    <span id="texto09"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="ttulo">
                <green><span>Indique la existencia de Buchanna&lsquo;s</span></green>
            </div>
            <div class="row">
                <div class="row">
                    <img class="img_botellas" alt="vasos" src="{{ asset('/storage/buchannas.png') }}" />
                    <div class="col">
                        <div class="form-group">
                            <div class="row">
                                <div class="switch-toggle switch-3 switch-candy">
                                    <input id="buchannas700_si" name="buchannas700" type="radio"
                                        value="buchannas700_si" />
                                    <label for="buchannas700_si">SI</label>
                                    <input id="buchannas700_choose" name="buchannas700" type="radio"
                                        value="buchannas700_choose"checked="checked" disabled />
                                    <label for="buchannas700_choose">buchannas 700 ml</label>
                                    <input id="buchannas700_no" name="buchannas700" type="radio"
                                        value="buchannas700_no" />
                                    <label for="buchannas700_no">NO</label>
                                    <a></a>
                                </div>
                                <div id="divBuchannas700" style="display: none" class="mt-2">
                                    &nbsp;&nbsp;<label for="">Caras en el
                                        lineal</label>&nbsp;&nbsp;
                                    <input type="text" name="caras_buchannas700"
                                        style="width: 50px; height: 35px; border-radius:0.3rem;" autocomplete="off">
                                    &nbsp;&nbsp;<label for="">Precio &dollar;</label>&nbsp;&nbsp;
                                    <input type="text" name="precio_buchannas700" id="precio_buchannas700"
                                        style="width: 85px; height: 35px; border-radius: 0.3rem;" maxlength="6"
                                        minlength="5" autocomplete="off">
                                    <span id="texto10"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="switch-toggle switch-3 switch-candy">
                                    <input id="buchannas375_si" name="buchannas375" type="radio"
                                        value="buchannas375_si" />
                                    <label for="buchannas375_si">SI</label>
                                    <input id="buchannas375_choose" name="buchannas375" type="radio"
                                        value="buchannas375_choose"checked="checked" disabled />
                                    <label for="buchannas375_choose">buchannas 375 ml</label>
                                    <input id="buchannas375_no" name="buchannas375" type="radio"
                                        value="buchannas375_no" />
                                    <label for="buchannas375_no">NO</label>
                                    <a></a>
                                </div>
                                <div id="divBuchannas375" style="display: none" class="mt-2">
                                    &nbsp;&nbsp;<label for="">Caras en el
                                        lineal</label>&nbsp;&nbsp;
                                    <input type="text" name="caras_buchannas375"
                                        style="width: 50px; height: 35px; border-radius:0.3rem;" autocomplete="off">
                                    &nbsp;&nbsp;<label for="">Precio &dollar;</label>&nbsp;&nbsp;

                                    <input type="text" name="precio_buchannas375" id="precio_buchannas375"
                                        style="width: 85px; height: 35px; border-radius: 0.3rem;" maxlength="6"
                                        minlength="5" autocomplete="off">
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
    <div class="col-12">
        <div class="card">
            <div class="ttulo">
                <green><span>Tome foto del lineal donde estan los productos Diageo</span></green>
            </div>

            <div class="col">
                <br>
                <input type="file" id="seleccionLinealDiageo" name="seleccionLinealDiageo" accept="image/*">
                <br><br>
                <img class="card-img-top" id="imagenLinealDiageo">

            </div>
        </div>
    </div>
    <hr>
    <h2>Competencia</h2>
    <blue>
        <span>Registre la información de la competencia, indague con cliente cual es la primer y segunda marca
            mas vendida en pdv y registre precio de sku de 750 ml</span>
    </blue>
    <br>
    <div class="col">
        <br><br>
        <div class="ttulo">
            <green><span>Indique si hay presencia de  Rones de la competencia en el lineal</span></green>
        </div>
        <br><br>
        <div class="col">
            <br>
            <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                <input id="hay_ron_si" name="hay_ron" type="radio" value="hay_ron_si" />
                <label for="hay_ron_si">SI</label>
                <input id="hay_ron_choose" name="hay_ron" type="radio" value="hay_ron_choose"
                    checked="checked" disabled />
                <label for="hay_ron_choose">&iquest;hay presencia de rones de la competencia?</label>
                <input id="hay_ron_no" name="hay_ron" type="radio" value="hay_ron_no" />
                <label for="hay_ron_no">NO</label>
                <a></a>
            </div>
            <br><br>
        </div>
    </div>
    <br>
    <div style="display: none" id="divRones">
    <div class="col-12">
        <div class="card">
            <div class="ttulo">
                <green><span>Seleccione la marca de la competencia en ron y la informacion adicional</span></green>
            </div>
            <div class="row">
                <div class="row">
                    <img class="img_botellasx3" src="{{ asset('/storage/ronx3.png') }}" />

                    <div class="col">
                        <div class="form-group">
                            <div class="row">
                                <div class="row mb-3">
                                    <div class="ttulo">
                                        <green><span>Marca de ron 1</span></green>
                                    </div>
                                    <div class="col-sm-10">
                                        {!! Form::select('comp_ron1', $competenciaRon, null, [
                                            'class' => 'form-control',
                                            'placeholder' => 'Seleccione marca',
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="ttulo">
                                        <green><span>Precio 750 ml &dollar;</span></green>
                                    </div>

                                    <input type="text" name="precio_comp_ron1" id="precio_comp_ron1" class="form-control"
                                        style="border-radius: 0.3rem;" maxlength="6"
                                        minlength="5" autocomplete="off">
                                    <span id="texto12"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="row mb-3">
                                    <div class="ttulo">
                                        <green><span>Marca de ron 2</span></green>
                                    </div>
                                    <div class="col-sm-10">
                                        {!! Form::select('comp_ron2', $competenciaRon, null, [
                                            'class' => 'form-control',
                                            'placeholder' => 'Seleccione marca',
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="ttulo">
                                        <green><span>Precio 750 ml &dollar;</span></green>
                                    </div>
                                    <input type="text" name="precio_comp_ron2" id="precio_comp_ron2" class="form-control"
                                        style="border-radius: 0.3rem;" maxlength="6"
                                        minlength="5" autocomplete="off">
                                    <span id="texto13"></span>
                                </div>
                                <div class="row mb-3">
                                    <div class="ttulo">
                                        <green><span>Caras en el lineal de rones</span></green>
                                    </div>
                                    <div class="col-sm-10">
                                        <input name="caras_comp_ron" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="ttulo">
                                        <green><span>Foto del lineal de ron</span></green>
                                    </div>
                                    <br>
                                    <input type="file" id="seleccionLinealR" name="seleccionLinealR" accept="image/*">
                                    <br><br>
                                    <img class="card-img-top" id="imagenLinearlR">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="col">
        <br><br>
        <div class="ttulo">
            <green><span>Indique si hay presencia de  Aguardientes de la competencia en el lineal</span></green>
        </div>
        <br><br>
        <div class="col">
            <br><br>
            <div class="switch-toggle switch-3 switch-candy" style="height: 50%; width:80%">
                <input id="hay_aguardiente_si" name="hay_aguardiente" type="radio" value="hay_aguardiente_si" />
                <label for="hay_aguardiente_si">SI</label>
                <input id="hay_aguardiente_choose" name="hay_aguardiente" type="radio" value="hay_aguardiente_choose"
                    checked="checked" disabled />
                <label for="hay_aguardiente_choose">&iquest;hay presencia de aguardientes de la competencia?</label>
                <input id="hay_aguardiente_no" name="hay_aguardiente" type="radio" value="hay_aguardiente_no" />
                <label for="hay_aguardiente_no">NO</label>
                <a></a>
            </div>
            <br><br>
        </div>
    <div style="display: none" id="divAguardiente">
    <div class="col-12">
        <div class="card">
            <div class="ttulo">
                <green><span>Seleccione la marca de la competencia en aguardiente y la informaci&oacute;n adicional</span></green>
            </div>

            </div>
            <br>
            <div class="row">
                <div class="row">
                    <img class="img_botellasx3" src="{{ asset('/storage/aguardientes.png') }}" />
                    <div class="col">
                        <div class="form-group">
                            <div class="row">
                                <div class="row mb-3">
                                    <div class="ttulo">
                                        <green><span>Marca de aguardiente 1</span></green>
                                    </div>
                                    <div class="col-sm-10">
                                        {!! Form::select('comp_aguard1', $competenciaAguardiente, null, [
                                            'class' => 'form-control',
                                            'placeholder' => 'Seleccione marca',
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="ttulo">
                                        <green><span>Precio 750 ml &dollar;</span></green>
                                    </div>
                                    <input type="text" name="precio_comp_aguardiente1" id="precio_comp_aguardiente1" class="form-control"
                                        style="border-radius: 0.3rem;" maxlength="6"
                                        minlength="5" autocomplete="off">
                                    <span id="texto14"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="row mb-3">
                                    <div class="ttulo">
                                        <green><span>Marca de aguardiente 2</span></green>
                                    </div>
                                    <div class="col-sm-10">
                                        {!! Form::select('comp_aguard2', $competenciaAguardiente, null, [
                                            'class' => 'form-control',
                                            'placeholder' => 'Seleccione marca',
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="ttulo">
                                        <green><span>Precio 750 ml &dollar;</span></green>
                                    </div>
                                    <input type="text" name="precio_comp_aguardiente2" id="precio_comp_aguardiente2" class="form-control"
                                        style="border-radius: 0.3rem;" maxlength="6"
                                        minlength="5" autocomplete="off">
                                    <span id="texto15"></span>
                                </div>
                                <div class="row mb-3">
                                    <div class="ttulo">
                                        <green><span>Caras en el lineal de aguardientes</span></green>
                                    </div>
                                    <div class="col-sm-10">
                                        <input name="caras_comp_aguardiente" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="ttulo">
                                        <green><span>Foto del lineal de ron</span></green>
                                    </div>
                                    <br>
                                    <input type="file" id="seleccionLinealA" name="seleccionLinealA" accept="image/*">
                                    <br><br>
                                    <img class="card-img-top" id="imagenLinearlA">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                } else if (valor == "bAndw1000_no") {
                    $("#divbaw1000").hide();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "bAndw700_si") {
                    $("#divbaw700").show();
                } else if (valor == "bAndw700_no") {
                    $("#divbaw700").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "bAndw375_si") {
                    $("#divbaw375").show();
                } else if (valor == "bAndw375_no") {
                    $("#divbaw375").hide();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "smirnoff375_si") {
                    $("#divSmirnoff375").show();
                } else if (valor == "smirnoff375_no") {
                    $("#divSmirnoff375").hide();
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "smirnoff700_si") {
                    $("#divSmirnoff700").show();
                } else if (valor == "smirnoff700_no") {
                    $("#divSmirnoff700").hide();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "jhonnie1000_si") {
                    $("#divjhonnie1000").show();
                } else if (valor == "jhonnie1000_no") {
                    $("#divjhonnie1000").hide();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "jhonnie700_si") {
                    $("#divjhonnie700").show();
                } else if (valor == "jhonnie700_no") {
                    $("#divjhonnie700").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "jhonnie375_si") {
                    $("#divjhonnie375").show();
                } else if (valor == "jhonnie375_no") {
                    $("#divjhonnie375").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "oldparr750_si") {
                    $("#divOldparr750").show();
                } else if (valor == "oldparr750_no") {
                    $("#divOldparr750").hide();
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "buchannas700_si") {
                    $("#divBuchannas700").show();
                } else if (valor == "buchannas700_no") {
                    $("#divBuchannas700").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "buchannas375_si") {
                    $("#divBuchannas375").show();
                } else if (valor == "buchannas375_no") {
                    $("#divBuchannas375").hide();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "buchannas_si") {
                    $("#divBuchannas").show();
                } else if (valor == "buchannas_no") {
                    $("#divBuchannas").hide();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "hay_ron_si") {
                    $("#divRones").show();
                } else if (valor == "hay_ron_no") {
                    $("#divRones").hide();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "hay_aguardiente_si") {
                    $("#divAguardiente").show();
                } else if (valor == "hay_aguardiente_no") {
                    $("#divAguardiente").hide();
                }
            });
        });
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
