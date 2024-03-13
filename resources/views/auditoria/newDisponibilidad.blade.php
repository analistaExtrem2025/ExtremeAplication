@extends('adminlte::page')
@section('title', 'Disponibilidad')

@section('css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/css-toggle-switch/latest/toggle-switch.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Arapey:400,400i,600|Open+Sans:300" rel="stylesheet">
    <link href="{{ asset('css/auditoria.css') }}" rel="stylesheet">
    <style>
        .noClass {

            width: 0px;
            background: transparent;
            color: transparent;
            border: transparent;

        }
    </style>
@stop
@section('content')

    {!! Form::model($puntos_auditoria, [
        'route' => ['disponibilidad.update', $puntos_auditoria->id],
        'method' => 'put',
        'enctype' => 'multipart/form-data',
        'files' => 'true',
    ]) !!}
    <h5><span class="numeros">4</span>DISPONIBILIDAD DE MARCAS</h5>


    <input type="hidden" name="precarga_id" value="{{ $puntos_auditoria->precarga_id }}">


    <p>
    <ul>
        <div class="row">
            <div class="col-sm-2 card-box">
                <div class="card-bottles">
                    <legend>&iquest; Hay <b>Black & White</b>?</legend>
                    <div class="form-check">
                        <img class="img_botellas swing" src="{{ asset('/storage/b&w.png') }}" />
                    </div>
                    <fieldset>
                        <label>
                            <input type="radio" onchange="showContent()" id="BlackywhiteSi" name="Blackywhite"
                                value="BlackywhiteSi">
                            <span>Si</span>
                        </label>
                        <input type="text" class="noClass" id="InputBlackywhite" required>
                        <label>
                            <input type="radio" onchange="showContent()" id="BlackywhiteNo" name="Blackywhite"
                                value="BlackywhiteNo">
                            <span>No</span>
                        </label>
                    </fieldset>
                </div>
            </div>

            <div class="col" style="display: none" id="divBlackywhite">
                <div class="row">
                    <legend class="titulo_interno">confirme la presentaci&oacute;n hallada</legend>
                    <div class="card-box-small">
                        <fieldset>
                            <legend class="double-shadow"><b> 1000 ml</b></legend>
                            <label>
                                <input type="radio" id="bAndw1000_si" name="bAndw1000" value="bAndw1000_si" />
                                <span>Si</span>
                            </label>
                            <input type="text" class="noClass" id="InputbAndw1000" required>
                            <label>
                                <input type="radio" id="bAndw1000_no" name="bAndw1000" value="bAndw1000_no" />
                                <span>No</span>
                            </label>
                            <div style="display: block">
                                <div class="form-group">
                                    <label for="caras_bAndw1000">Caras en el lineal</label>
                                    <input type="text" class="form-control" name="caras_bAndw1000" id="caras_bAndw1000"
                                        style="border-radius:0.3rem;" autocomplete="off" maxlength="2">
                                </div>

                                <div class="form-group">
                                    <label for="precio_bAndw1000">Precio &dollar;</label>
                                    <input type="text" class="form-control" name="precio_bAndw1000" id="precio_bAndw1000"
                                        style="border-radius:0.3rem;" autocomplete="off" maxlength="6" minlength="5">
                                </div>
                                <span id="texto01" style="background: white; color: black;"></span>
                            </div>
                        </fieldset>
                    </div>
                    <div class="card-box-small">
                        <fieldset>
                            <legend class="double-shadow"><b> 700 ml</b></legend>
                            <label>
                                <input type="radio" id="bAndw700_si" name="bAndw700" value="bAndw700_si" />
                                <span>Si</span>
                            </label>
                            <input type="text" class="noClass" id="InputbAndw700" required>
                            <label>
                                <input type="radio" id="bAndw700_no" name="bAndw700" value="bAndw700_no" />
                                <span>No</span>
                            </label>
                            <div style="display: block">
                                <div class="form-group">
                                    <label for="caras_bAndw700">Caras en el lineal</label>
                                    <input type="text" class="form-control" name="caras_bAndw700" id="caras_bAndw700"
                                        style="border-radius:0.3rem;" autocomplete="off" maxlength="2">
                                </div>
                                <div class="form-group">
                                    <label for="precio_bAndw700">Precio &dollar;</label>
                                    <input type="text" class="form-control" name="precio_bAndw700" id="precio_bAndw700"
                                        style="border-radius:0.3rem;" autocomplete="off" maxlength="6" minlength="5">
                                </div>
                                <span id="texto02" style="background: white; color: black;"></span>
                            </div>
                        </fieldset>
                    </div>
                    <div class="card-box-small">
                        <fieldset>
                            <legend class="double-shadow"><b> 375 ml</b></legend>
                            <label>
                                <input type="radio" id="bAndw375_si" name="bAndw375" value="bAndw375_si" />
                                <span>Si</span>
                            </label>
                            <input type="text" class="noClass" id="InputbAndw375">
                            <label>
                                <input type="radio" id="bAndw375_no" name="bAndw375" value="bAndw375_no" />
                                <span>No</span>
                            </label>
                            <div style="display: block">
                                <div class="form-group">
                                    <label for="caras_bAndw375">Caras en el lineal</label>
                                    <input type="text" class="form-control" name="caras_bAndw375" id="caras_bAndw375"
                                        style="border-radius:0.3rem;" autocomplete="off" maxlength="2">
                                </div>
                                <div class="form-group">
                                    <label for="precio_bAndw375">Precio &dollar;</label>
                                    <input type="text" class="form-control" name="precio_bAndw375"
                                        id="precio_bAndw375" style="border-radius:0.3rem;" autocomplete="off"
                                        maxlength="6" minlength="5">
                                </div>
                                <span id="texto03" style="background: white; color: black;"></span>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </ul>

    <hr>
    <ul>
        <div class="row">
            <div class="col-sm-2 card-box">
                <div class="card-bottles">
                    <legend>&iquest; Hay <b>Smirnoff X1</b>?</legend>
                    <div class="form-check">
                        <img class="img_botellas swing" alt="Imagesmirnoff" src="{{ asset('/storage/smirnoff.png') }}" />
                    </div>
                    <fieldset>
                        <label>
                            <input type="radio" onchange="javascript:showContent2()" id="SmirnoffSi" name="Smirnoff"
                                value="SmirnoffSi">
                            <span>Si</span>
                        </label>
                        <input type="text" class="noClass" id="InputSmirnoff" required>
                        <label>
                            <input type="radio" onchange="javascript:showContent2()" id="SmirnoffNo" name="Smirnoff"
                                value="SmirnoffNo">
                            <span>No</span>
                        </label>
                    </fieldset>
                </div>
            </div>
            <div class="col" style="display: none" id="divSmirnoff">
                <div class="row">
                    <legend class="titulo_interno">confirme la presentaci&oacute;n hallada</legend>
                    <div class="card-box-small">
                        <fieldset>
                            <legend class="double-shadow"><b> 700 ml</b></legend>
                            <label>
                                <input type="radio" id="smirnoff700_si" name="smirnoff700" value="smirnoff700_si">
                                <span>Si</span>
                            </label>
                            <input type="text" class="noClass" id="InputSmirnoff700" required>
                            <label>
                                <input type="radio" id="smirnoff700_no" name="smirnoff700" value="smirnoff700_no" />
                                <span>No</span>
                            </label>
                            <div style="display: block">
                                <div class="form-group">
                                    <label for="caras_smirnoff700">Caras en el lineal</label>
                                    <input type="text" class="form-control" name="caras_smirnoff700"
                                        id="caras_smirnoff700" style="border-radius:0.3rem;" autocomplete="off"
                                        maxlength="2" required disabled>
                                </div>
                                <div class="form-group">
                                    <label for="precio_smirnoff700">Precio &dollar;</label>
                                    <input type="text" class="form-control" name="precio_smirnoff700"
                                        id="precio_smirnoff700" style="border-radius:0.3rem;" autocomplete="off"
                                        maxlength="6" minlength="5" required disabled>
                                </div>
                                <span id="texto04" style="background: white; color: black;"></span>
                            </div>
                        </fieldset>
                    </div>

                    <div class="card-box-small">
                        <fieldset>
                            <legend class="double-shadow"><b> 375 ml</b></legend>
                            <label>
                                <input type="radio" id="smirnoff375_si" name="smirnoff375" value="smirnoff375_si" />
                                <span>Si</span>
                            </label>
                            <input type="text" class="noClass" id="InputSmirnoff375" required>
                            <label>
                                <input type="radio" id="smirnoff375_no" name="smirnoff375" value="smirnoff375_no" />
                                <span>No</span>
                            </label>
                            <div style="display: block">
                                <div class="form-group">
                                    <label for="caras_smirnoff375">Caras en el lineal</label>
                                    <input type="text" class="form-control" name="caras_smirnoff375"
                                        id="caras_smirnoff375" style="border-radius:0.3rem;" autocomplete="off"
                                        maxlength="2" required disabled>
                                </div>
                                <div class="form-group">
                                    <label for="precio_smirnoff375">Precio &dollar;</label>
                                    <input type="text" class="form-control" name="precio_smirnoff375"
                                        id="precio_smirnoff375" style="border-radius:0.3rem;" autocomplete="off"
                                        maxlength="6" minlength="5" required disabled>
                                </div>
                                <span id="texto05" style="background: white; color: black;"></span>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </ul>
    <hr>

    <ul>
        <div class="row">
            <div class="col-sm-2 card-box">
                <div class="card-bottles">
                    <legend>&iquest; Hay <b>Smirnoff X1 <br> sin az&uacute;car</b> ?</legend>
                    <div class="form-check">
                        <img class="img_botellas swing" alt="smirnoff_sin_azucar"
                            src="{{ asset('/storage/smirnoff_sin_azucar.png') }}" />
                    </div>
                    <fieldset>
                        <label>
                            <input type="radio" onchange="javascript:showContent3()" id="SmirnoffNsSi"
                                name="SmirnoffNs" value="SmirnoffNsSi">
                            <span>Si</span>
                        </label>
                        <input type="text" class="noClass" id="InputSmirnoffNs" required>
                        <label>
                            <input type="radio" onchange="javascript:showContent3()" id="SmirnoffNsNo"
                                name="SmirnoffNs" value="SmirnoffNsNo">
                            <span>No</span>
                        </label>
                    </fieldset>
                </div>
            </div>
            <div class="col" style="display: none" id="divSmirnoffNs">
                <div class="row">
                    <legend class="titulo_interno">confirme la presentaci&oacute;n hallada</legend>
                    <div class="card-box-small">
                        <fieldset>
                            <legend class="double-shadow"><b> 700 ml</b></legend>
                            <label>
                                <input type="radio" id="smirnoff_ns700_si" name="smirnoff_ns700"
                                    value="smirnoff_ns700_si">
                                <span>Si</span>
                            </label>
                            <input type="text" class="noClass" id="InputSmirnoffNs700" required>
                            <label>
                                <input type="radio" id="smirnoff_ns700_no" name="smirnoff_ns700"
                                    value="smirnoff_ns700_no" />
                                <span>No</span>
                            </label>
                            <div style="display: block">
                                <div class="form-group">
                                    <label for="caras_smirnoff_ns700">Caras en el lineal</label>
                                    <input type="text" class="form-control" name="caras_smirnoff_ns700"
                                        id="caras_smirnoff_ns700" style="border-radius:0.3rem;" autocomplete="off"
                                        maxlength="2" required disabled>
                                </div>
                                <div class="form-group">
                                    <label for="precio_smirnoff_ns700">Precio &dollar;</label>
                                    <input type="text" class="form-control" name="precio_smirnoff_ns700"
                                        id="precio_smirnoff_ns700" style="border-radius:0.3rem;" autocomplete="off"
                                        maxlength="6" minlength="5" required disabled>
                                </div>
                                <span id="texto06" style="background: white; color: black;"></span>
                            </div>
                        </fieldset>
                    </div>
                    <div class="card-box-small">
                        <fieldset>
                            <legend class="double-shadow"><b> 375 ml</b></legend>
                            <label>
                                <input type="radio" id="smirnoff_ns375_si" name="smirnoff_ns375"
                                    value="smirnoff_ns375_si">
                                <span>Si</span>
                            </label>
                            <input type="text" class="noClass" id="InputSmirnoffNs375" required>
                            <label>
                                <input type="radio" id="smirnoff_ns375_no" name="smirnoff_ns375"
                                    value="smirnoff_ns375_no" />
                                <span>No</span>
                            </label>
                            <div style="display: block">
                                <div class="form-group">
                                    <label for="caras_smirnoff_ns375">Caras en el lineal</label>
                                    <input type="text" class="form-control" name="caras_smirnoff_ns375"
                                        id="caras_smirnoff_ns375" style="border-radius:0.3rem;" autocomplete="off"
                                        maxlength="2" required disabled>
                                </div>
                                <div class="form-group">
                                    <label for="precio_smirnoff_ns375">Precio &dollar;</label>
                                    <input type="text" class="form-control" name="precio_smirnoff_ns375"
                                        id="precio_smirnoff_ns375" style="border-radius:0.3rem;" autocomplete="off"
                                        maxlength="6" minlength="5" required disabled>
                                </div>
                                <span id="texto07" style="background: white; color: black;"></span>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </ul>

    <hr>
    <ul>
        <div class="row">
            <div class="col-sm-2 card-box">
                <div class="card-bottles">
                    <legend>&iquest; Hay <b>Johnnie Walker</b>?</legend>
                    <div class="form-check">
                        <img class="img_botellas swing" alt="vasos" src="{{ asset('/storage/jhonie_walker.png') }}" />
                    </div>
                    <fieldset>
                        <label>
                            <input type="radio" onchange="javascript:showContent4()" id="JhonnieSi" name="Jhonnie"
                                value="JhonnieSi">
                            <span>Si</span>
                        </label>
                        <input type="text" class="noClass" id="InputJhonnie" required>
                        <label>
                            <input type="radio" onchange="javascript:showContent4()" id="JhonnieNo" name="Jhonnie"
                                value="JhonnieNo" />
                            <span>No</span>
                        </label>
                    </fieldset>
                </div>
            </div>
            <div class="col" style="display: none" id="divJhonnie">
                <div class="row">
                    <legend class="titulo_interno">confirme la presentaci&oacute;n hallada</legend>
                    <div class="card-box-small">
                        <fieldset>
                            <legend class="double-shadow"><b> 1000 ml</b></legend>
                            <label>
                                <input type="radio" id="jhonnie1000_si" name="jhonnie1000" value="jhonnie1000_si">
                                <span>Si</span>
                            </label>
                            <input type="text" class="noClass" id="InputJhonnie1000" required>
                            <label>
                                <input type="radio" id="jhonnie1000_no" name="jhonnie1000" value="jhonnie1000_no" />
                                <span>No</span>
                            </label>
                            <div style="display: block">
                                <div class="form-group">
                                    <label for="caras_jhonnie1000">Caras en el lineal</label>
                                    <input type="text" class="form-control" name="caras_jhonnie1000"
                                        id="caras_jhonnie1000" style="border-radius:0.3rem;" autocomplete="off"
                                        maxlength="2" required disabled>
                                </div>
                                <div class="form-group">
                                    <label for="precio_jhonnie1000">Precio &dollar;</label>
                                    <input type="text" class="form-control" name="precio_jhonnie1000"
                                        id="precio_jhonnie1000" style="border-radius:0.3rem;" autocomplete="off"
                                        maxlength="6" minlength="5" required disabled>
                                </div>
                                <span id="texto08" style="background: white; color: black;"></span>
                            </div>
                        </fieldset>
                    </div>
                    <div class="card-box-small">
                        <fieldset>
                            <legend class="double-shadow"><b> 700 ml</b></legend>
                            <label>
                                <input type="radio" id="jhonnie700_si" name="jhonnie700" value="jhonnie700_si">
                                <span>Si</span>
                            </label>
                            <input type="text" class="noClass" id="InputJhonnie700" required>
                            <label>
                                <input type="radio" id="jhonnie700_no" name="jhonnie700" value="jhonnie700_no" />
                                <span>No</span>
                            </label>
                            <div style="display: block">
                                <div class="form-group">
                                    <label for="caras_jhonnie700">Caras en el lineal</label>
                                    <input type="text" class="form-control" name="caras_jhonnie700"
                                        id="caras_jhonnie700" style="border-radius:0.3rem;" autocomplete="off"
                                        maxlength="2" required disabled>
                                </div>
                                <div class="form-group">
                                    <label for="precio_jhonnie700">Precio &dollar;</label>
                                    <input type="text" class="form-control" name="precio_jhonnie700"
                                        id="precio_jhonnie700" style="border-radius:0.3rem;" autocomplete="off"
                                        maxlength="6" minlength="5" required disabled>
                                </div>
                                <span id="texto09" style="background: white; color: black;"></span>
                            </div>
                        </fieldset>
                    </div>
                    <div class="card-box-small">
                        <fieldset>
                            <legend class="double-shadow"><b> 375 ml</b></legend>
                            <label>
                                <input type="radio" id="jhonnie375_si" name="jhonnie375" value="jhonnie375_si">
                                <span>Si</span>
                            </label>
                            <input type="text" class="noClass" id="InputJhonnie375" required>
                            <label>
                                <input type="radio" id="jhonnie375_no" name="jhonnie375" value="jhonnie375_no" />
                                <span>No</span>
                            </label>
                            <div style="display: block">
                                <div class="form-group">
                                    <label for="caras_jhonnie375">Caras en el lineal</label>
                                    <input type="text" class="form-control" name="caras_jhonnie375"
                                        id="caras_jhonnie375" style="border-radius:0.3rem;" autocomplete="off"
                                        maxlength="2" required disabled>
                                </div>
                                <div class="form-group">
                                    <label for="precio_jhonnie375">Precio &dollar;</label>
                                    <input type="text" class="form-control" name="precio_jhonnie375"
                                        id="precio_jhonnie375" style="border-radius:0.3rem;" autocomplete="off"
                                        maxlength="6" minlength="5" required disabled>
                                </div>
                                <span id="texto10" style="background: white; color: black;"></span>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </ul>

    <hr>
    <ul>
        <div class="row">
            <div class="col-sm-2 card-box">
                <div class="card-bottles">
                    <legend>&iquest; Hay <b>Old Parr</b>?</legend>
                    <div class="form-check">
                        <img class="img_botellas swing" alt="Old Parr" src="{{ asset('/storage/oldparr.png') }}" />
                    </div>
                    <fieldset>
                        <label>
                            <input type="radio" onchange="javascript:showContent5()" id="OldParrSi" name="OldParr"
                                value="OldParrSi">
                            <span>Si</span>
                        </label>
                        <input type="text" class="noClass" id="InputOldParr" required>
                        <label>
                            <input type="radio" onchange="javascript:showContent5()" id="OldParrNo" name="OldParr"
                                value="OldParrNo" />
                            <span>No</span>
                        </label>
                    </fieldset>
                </div>
            </div>
            <div class="col" style="display: none" id="divOldParr">
                <div class="row">
                    <legend class="titulo_interno">confirme la presentaci&oacute;n hallada</legend>
                    <div class="card-box-small">
                        <fieldset>
                            <legend class="double-shadow"><b> 750 ml</b></legend>
                            <label>
                                <input type="radio" id="oldparr750_si" name="oldparr750" value="oldparr750_si">
                                <span>Si</span>
                            </label>
                            <input type="text" class="noClass" id="InputOldParr750" required>
                            <label>
                                <input type="radio" id="oldparr750_no" name="oldparr750" value="oldparr750_no" />
                                <span>No</span>
                            </label>
                            <div style="display: block">
                                <div class="form-group">
                                    <label for="caras_oldparr750">Caras en el lineal</label>
                                    <input type="text" class="form-control" name="caras_oldparr750"
                                        id="caras_oldparr750" style="border-radius:0.3rem;" autocomplete="off"
                                        maxlength="2" required disabled>
                                </div>
                                <div class="form-group">
                                    <label for="precio_oldparr750">Precio &dollar;</label>
                                    <input type="text" class="form-control" name="precio_oldparr750"
                                        id="precio_oldparr750" style="border-radius:0.3rem;" autocomplete="off"
                                        maxlength="6" minlength="5" required disabled>
                                </div>
                                <span id="texto11" style="background: white; color: black;"></span>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </ul>


    <hr>
    <ul>
        <div class="row">
            <div class="col-sm-2 card-box">
                <div class="card-bottles">
                    <legend>&iquest; Hay <b>Buchannan&acute;s</b>?</legend>
                    <div class="form-check">
                        <img class="img_botellas swing" alt="vasos" src="{{ asset('/storage/buchannas.png') }}" />
                    </div>
                    <fieldset>
                        <label>
                            <input type="radio" onchange="javascript:showContent6()" id="BuchannasSi" name="Buchannas"
                                value="BuchannasSi">
                            <span>Si</span>
                        </label>
                        <input type="text" class="noClass" id="InputBuchannas" required>
                        <label>
                            <input type="radio" onchange="javascript:showContent6()" id="BuchannasNo" name="Buchannas"
                                value="BuchannasNo">
                            <span>No</span>
                        </label>
                    </fieldset>
                </div>
            </div>
            <div class="col" style="display: none" id="divBuchannas">
                <div class="row">
                    <legend class="titulo_interno">confirme la presentaci&oacute;n hallada</legend>
                    <div class="card-box-small">
                        <fieldset>
                            <legend class="double-shadow"><b> 700 ml</b></legend>
                            <label>
                                <input type="radio" id="buchannas700_si" name="buchannas700" value="buchannas700_si">
                                <span>Si</span>
                            </label>
                            <input type="text" class="noClass" id="InputBuchannas700" required>
                            <label>
                                <input type="radio" id="buchannas700_no" name="buchannas700"
                                    value="buchannas700_no" />
                                <span>No</span>
                            </label>
                            <div style="display: block">
                                <div class="form-group">
                                    <label for="caras_buchannas700">Caras en el lineal</label>
                                    <input type="text" class="form-control" name="caras_buchannas700"
                                        id="caras_buchannas700" style="border-radius:0.3rem;" autocomplete="off"
                                        maxlength="2" required disabled>
                                </div>
                                <div class="form-group">
                                    <label for="precio_buchannas700">Precio &dollar;</label>
                                    <input type="text" class="form-control" name="precio_buchannas700"
                                        id="precio_buchannas700" style="border-radius:0.3rem;" autocomplete="off"
                                        maxlength="6" minlength="5" required disabled>
                                </div>
                                <span id="texto12" style="background: white; color: black;"></span>
                            </div>
                        </fieldset>
                    </div>
                    <div class="card-box-small">
                        <fieldset>
                            <legend class="double-shadow"><b> 375 ml</b></legend>
                            <label>
                                <input type="radio" id="buchannas375_si" name="buchannas375" value="buchannas375_si">
                                <span>Si</span>
                            </label>
                            <input type="text" class="noClass" id="InputBuchannas375" required>
                            <label>
                                <input type="radio" id="buchannas375_no" name="buchannas375"
                                    value="buchannas375_no" />
                                <span>No</span>
                            </label>
                            <div style="display: block">
                                <div class="form-group">
                                    <label for="caras_buchannas375">Caras en el lineal</label>
                                    <input type="text" class="form-control" name="caras_buchannas375"
                                        id="caras_buchannas375" style="border-radius:0.3rem;" autocomplete="off"
                                        maxlength="2" required disabled>
                                </div>
                                <div class="form-group">
                                    <label for="precio_buchannas375">Precio &dollar;</label>
                                    <input type="text" class="form-control" name="precio_oldparr750"
                                        id="precio_buchannas375" style="border-radius:0.3rem;" autocomplete="off"
                                        maxlength="6" minlength="5" required disabled>
                                </div>
                                <span id="texto13" style="background: white; color: black;"></span>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </ul>

    <hr>
    <ul>
        <h5>CALIDAD DE LAS MARCAS</h5>
        <div class="row">
            <div class="col-sm-4 card-box-marcas">
                <div class="card-bottles-marcas">
                    <legend class="marcasT">&iquest;Est&aacute;n visibles al consumidor? (no est&aacute;n
                        tapados con otros productos)</legend>
                    <fieldset class="radiosT">
                        <label>
                            <input type="radio" id="cal_marc_visible_si" onchange="javascript:showContent9()"
                                name="cal_marc_visible" value="cal_marc_visible_si">
                            <span>Si</span>
                        </label>
                        <input type="text" class="noClass" id="Inputcal_marc_visible" required>
                        <label>
                            <input type="radio" id="cal_marc_visible_no" onchange="javascript:showContent9()"
                                name="cal_marc_visible" value="cal_marc_visible_no" />
                            <span>No</span>
                        </label>
                    </fieldset>
                </div>
            </div>
            <div class="col-sm-4 card-box-marcas">
                <legend class="marcasT">&iquest;Tienen las etiquetas en buen estado? ( no Est&aacute;n
                    rayadas, levantadas, buen tono de color)</legend>
                <fieldset class="radiosT">
                    <label>
                        <input type="radio" id="cal_marc_danados_si" name="cal_marc_danados"
                            onchange="javascript:showContent10()" value="cal_marc_danados_si">
                        <span>Si</span>
                    </label>
                    <input type="text" class="noClass" id="Inputcal_marc_danados" required>
                    <label>
                        <input type="radio" id="cal_marc_danados_no" name="cal_marc_danados"
                            onchange="javascript:showContent10()" value="cal_marc_danados_no" />
                        <span>No</span>
                    </label>
                </fieldset>
            </div>
            <div class="col-sm-4 card-box-marcas">
                <div class="card-bottles-marcas">
                    <legend class="marcasT">&iquest;Est&aacute;n las etiquetas visibles al
                        consumidor</legend>
                    <fieldset class="radiosT">
                        <label>
                            <input type="radio" id="cal_marc_et_danados_si" name="cal_marc_et_danados"
                                value="cal_marc_et_danados_si" onchange="javascript:showContent11()">
                            <span>Si</span>
                        </label>
                        <input type="text" class="noClass" id="Inputcal_marc_et_danados" required>
                        <label>
                            <input type="radio" id="cal_marc_et_danados_no" name="cal_marc_et_danados"
                                value="cal_marc_et_danados_no" onchange="javascript:showContent11()" />
                            <span>No</span>
                        </label>
                    </fieldset>
                </div>
            </div>
        </div>
    </ul>
    <hr>
    <ul>
        <div class="col-12 card-box" id="divImgCal" style="text-align: center;">
            <div class="card">
                <div class="ttulo">
                    <green><span>Tome foto del lineal donde Est&aacute;n los productos Diageo</span></green>
                </div>
                <div class="col">
                    <br>
                    <input type="file" id="seleccionLinealDiageo" name="seleccionLinealDiageo" accept="image/*"
                        required>
                    <br><br>
                    <img class="card-img-top" id="imagenLinealDiageo">
                    <br><br>
                </div>
            </div>
        </div>
    </ul>


    {!! Form::submit('Siguiente', ['class' => 'btn btn-primary', 'id' => 'boton', 'style' => 'z-index:99999', 'onclick' => 'OcultarButton(this)']) !!}
    {!! Form::close() !!}
    </p>

@stop

@section('js')
    <script>
        function showContent() {
            element = document.getElementById("divBlackywhite");
            check = document.getElementById("BlackywhiteSi");
            checkno = document.getElementById("BlackywhiteNo");
            ByW1000si = document.getElementById("bAndw1000_si");
            ByW1000no = document.getElementById("bAndw1000_no");
            ByW700si = document.getElementById("bAndw700_si");
            ByW700no = document.getElementById("bAndw700_no");
            ByW375si = document.getElementById("bAndw375_si");
            ByW375no = document.getElementById("bAndw375_no");
            texto01 = document.getElementById("texto01");
            texto02 = document.getElementById("texto02");
            texto03 = document.getElementById("texto03");

            if (check.checked) {
                element.style.display = 'block';
                $("#InputBlackywhite").val("1");
                element.prop('disabled', false);
                $("#caras_bAndw1000").prop('disabled', false);
                $("#precio_bAndw1000").prop('disabled', false);
                $("#caras_bAndw700").prop('disabled', false);
                $("#precio_bAndw700").prop('disabled', false);
                $("#caras_bAndw375").prop('disabled', false);
                $("#precio_bAndw375").prop('disabled', false);

            } else if (checkno.checked) {

                element.style.display = 'none';
                $("#InputBlackywhite").val("0");
                $("#InputbAndw1000").val("0");
                $("#InputbAndw700").val("0");
                $("#InputbAndw375").val("0");
                $("#caras_bAndw1000").val("0");
                $("#precio_bAndw1000").val("0");
                $("#caras_bAndw700").val("0");
                $("#precio_bAndw700").val("0");
                $("#caras_bAndw375").val("0");
                $("#precio_bAndw375").val("0");
                $("#caras_bAndw1000").prop('disabled', true);
                $("#precio_bAndw1000").prop('disabled', true);
                $("#caras_bAndw700").prop('disabled', true);
                $("#precio_bAndw700").prop('disabled', true);
                $("#caras_bAndw375").prop('disabled', true);
                $("#precio_bAndw375").prop('disabled', true);
                element.prop('disabled', true);
                ByW1000si.checked = false;
                ByW1000no.checked = false;
                ByW700si.checked = false;
                ByW700no.checked = false;
                ByW375si.checked = false;
                ByW375no.checked = false;
                ByW1000si.prop('disabled', true);
                ByW1000no.prop('disabled', true);
                ByW700si.prop('disabled', true);
                ByW700no.prop('disabled', true);
                ByW375si.prop('disabled', true);
                ByW375no.prop('disabled', true);
                texto01.style.display = 'none';
                texto02.style.display = 'none';
                texto03.style.display = 'none';
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                texto01 = document.getElementById("texto01");
                var valor = $(event.target).val();
                if (valor == "bAndw1000_si") {
                    $("#caras_bAndw1000").prop('disabled', false);
                    $("#precio_bAndw1000").prop('disabled', false);
                    $("#caras_bAndw1000").val("");
                    $("#precio_bAndw1000").val("");
                    $("#caras_bAndw1000").focus();
                    $("#InputbAndw1000").val("1");
                    texto01.style.display = 'block';
                } else if (valor == "bAndw1000_no") {
                    $("#caras_bAndw1000").val("");
                    $("#precio_bAndw1000").val("");
                    $("#caras_bAndw1000").prop('disabled', true);
                    $("#precio_bAndw1000").prop('disabled', true);
                    texto01.style.display = 'none';
                    $("#InputbAndw1000").val("0");
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                texto02 = document.getElementById("texto02");
                var valor = $(event.target).val();
                if (valor == "bAndw700_si") {
                    $("#caras_bAndw700").prop('disabled', false);
                    $("#precio_bAndw700").prop('disabled', false);
                    $("#caras_bAndw700").val("");
                    $("#precio_bAndw700").val("");
                    $("#caras_bAndw700").focus();
                    $("#InputbAndw700").val("1");
                    texto02.style.display = 'block';
                } else if (valor == "bAndw700_no") {
                    $("#caras_bAndw700").val("");
                    $("#precio_bAndw700").val("");
                    $("#caras_bAndw700").prop('disabled', true);
                    $("#precio_bAndw700").prop('disabled', true);
                    texto02.style.display = 'none';
                    $("#InputbAndw700").val("0");
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                texto03 = document.getElementById("texto03");
                var valor = $(event.target).val();
                if (valor == "bAndw375_si") {
                    $("#caras_bAndw375").prop('disabled', false);
                    $("#precio_bAndw375").prop('disabled', false);
                    $("#caras_bAndw375").val("");
                    $("#precio_bAndw375").val("");
                    $("#caras_bAndw375").focus();
                    texto03.style.display = 'block';
                    $("#InputbAndw375").val("1");
                } else if (valor == "bAndw375_no") {
                    $("#caras_bAndw375").val("");
                    $("#precio_bAndw375").val("");
                    $("#caras_bAndw375").prop('disabled', true);
                    $("#precio_bAndw375").prop('disabled', true);
                    texto03.style.display = 'none';
                    $("#InputbAndw375").val("0");
                }
            });
        });
    </script>
    <script>
        function showContent2() {
            element2 = document.getElementById("divSmirnoff");
            check2 = document.getElementById("SmirnoffSi");
            check2no = document.getElementById("SmirnoffNo");
            Smir700si = document.getElementById("smirnoff700_si");
            Smir700no = document.getElementById("smirnoff700_no");
            Smir375si = document.getElementById("smirnoff375_si");
            Smir375no = document.getElementById("smirnoff375_no");
            texto04 = document.getElementById("texto04");
            texto05 = document.getElementById("texto05");
            if (check2.checked) {
                element2.style.display = 'block';
                $("#InputSmirnoff").val("1");
            } else if (check2no.checked) {
                element2.style.display = 'none';
                $("#caras_smirnoff700").val("");
                $("#precio_smirnoff700").val("");
                $("#caras_smirnoff375").val("");
                $("#precio_smirnoff375").val("");
                $("#caras_smirnoff700").prop('disabled', true);
                $("#precio_smirnoff700").prop('disabled', true);
                $("#caras_smirnoff375").prop('disabled', true);
                $("#precio_smirnoff375").prop('disabled', true);
                Smir700si.checked = false;
                Smir700no.checked = false;
                Smir375si.checked = false;
                Smir375no.checked = false;
                texto04.style.display = 'none';
                texto05.style.display = 'none';
                $("#InputSmirnoff").val("0");
                $("#InputSmirnoff700").val("0");
                $("#InputSmirnoff375").val("0");
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "smirnoff700_si") {
                    $("#caras_smirnoff700").prop('disabled', false);
                    $("#precio_smirnoff700").prop('disabled', false);
                    $("#caras_smirnoff700").val("");
                    $("#precio_smirnoff700").val("");
                    $("#caras_smirnoff700").focus();
                    $("#InputSmirnoff700").val("1");
                    texto04.style.display = 'block';
                } else if (valor == "smirnoff700_no") {
                    $("#caras_smirnoff700").val("");
                    $("#precio_smirnoff700").val("");
                    $("#caras_smirnoff700").prop('disabled', true);
                    $("#precio_smirnoff700").prop('disabled', true);
                    texto04.style.display = 'none';
                    $("#InputSmirnoff700").val("0");
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "smirnoff375_si") {
                    $("#caras_smirnoff375").prop('disabled', false);
                    $("#precio_smirnoff375").prop('disabled', false);
                    $("#caras_smirnoff375").val("");
                    $("#precio_smirnoff375").val("");
                    $("#caras_smirnoff375").focus();
                    $("#InputSmirnoff375").val("1");
                    texto05.style.display = 'block';
                } else if (valor == "smirnoff375_no") {
                    $("#caras_smirnoff375").val("");
                    $("#precio_smirnoff375").val("");
                    $("#caras_smirnoff375").prop('disabled', true);
                    $("#precio_smirnoff375").prop('disabled', true);
                    texto05.style.display = 'none';
                    $("#InputSmirnoff375").val("0");
                }
            });
        });
    </script>
    <script>
        function showContent3() {
            element3 = document.getElementById("divSmirnoffNs");
            check3 = document.getElementById("SmirnoffNsSi");
            check3no = document.getElementById("SmirnoffNsNo");
            Smir700NSsi = document.getElementById("smirnoff_ns700_si");
            Smir700NSno = document.getElementById("smirnoff_ns700_no");
            Smir375NSsi = document.getElementById("smirnoff_ns375_si");
            Smir375NSno = document.getElementById("smirnoff_ns375_no");
            texto06 = document.getElementById("texto06");
            texto07 = document.getElementById("texto07");
            if (check3.checked) {
                element3.style.display = 'block';
                $("#InputSmirnoffNs").val("1");
            } else if (check3no.checked) {
                element3.style.display = 'none';
                $("#caras_smirnoff_ns700").val("");
                $("#precio_smirnoff_ns700").val("");
                $("#caras_smirnoff_ns375").val("");
                $("#precio_smirnoff_ns375").val("");
                $("#caras_smirnoff_ns700").prop('disabled', true);
                $("#precio_smirnoff_ns700").prop('disabled', true);
                $("#caras_smirnoff_ns375").prop('disabled', true);
                $("#precio_smirnoff_ns375").prop('disabled', true);
                Smir700NSsi.checked = false;
                Smir700NSno.checked = false;
                Smir375NSsi.checked = false;
                Smir375NSno.checked = false;
                texto06.style.display = 'none';
                texto07.style.display = 'none';
                $("#InputSmirnoffNs").val("0");
                $("#InputSmirnoffNs700").val("0");
                $("#InputSmirnoffNs375").val("0");
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "smirnoff_ns700_si") {
                    $("#caras_smirnoff_ns700").prop('disabled', false);
                    $("#precio_smirnoff_ns700").prop('disabled', false);
                    $("#caras_smirnoff_ns700").val("");
                    $("#precio_smirnoff_ns700").val("");
                    $("#caras_smirnoff_ns700").focus();
                    texto06.style.display = 'block';
                    $("#InputSmirnoffNs700").val("1");
                } else if (valor == "smirnoff_ns700_no") {
                    $("#caras_smirnoff_ns700").val("");
                    $("#precio_smirnoff_ns700").val("");
                    $("#caras_smirnoff_ns700").prop('disabled', true);
                    $("#precio_smirnoff_ns700").prop('disabled', true);
                    texto06.style.display = 'none';
                    $("#InputSmirnoffNs700").val("0");
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "smirnoff_ns375_si") {
                    $("#caras_smirnoff_ns375").prop('disabled', false);
                    $("#precio_smirnoff_ns375").prop('disabled', false);
                    $("#caras_smirnoff_ns375").val("");
                    $("#precio_smirnoff_ns375").val("");
                    $("#caras_smirnoff_ns375").focus();
                    $("#InputSmirnoffNs375").val("1");
                    texto07.style.display = 'block';
                } else if (valor == "smirnoff_ns375_no") {
                    $("#caras_smirnoff_ns375").val(" ");
                    $("#precio_smirnoff_ns375").val(" ");
                    $("#caras_smirnoff_ns375").prop('disabled', true);
                    $("#precio_smirnoff_ns375").prop('disabled', true);
                    texto07.style.display = 'none';
                    $("#InputSmirnoffNs375").val("0");
                }
            });
        });
    </script>
    <script>
        function showContent4() {
            element4 = document.getElementById("divJhonnie");
            check4 = document.getElementById("JhonnieSi");
            check4no = document.getElementById("JhonnieNo");
            Johnnie1000si = document.getElementById("jhonnie1000_si");
            Johnnie1000no = document.getElementById("jhonnie1000_no");
            Johnnie700si = document.getElementById("jhonnie700_si");
            Johnnie700no = document.getElementById("jhonnie700_no");
            Johnnie375si = document.getElementById("jhonnie375_si");
            Johnnie375no = document.getElementById("jhonnie375_no");
            texto08 = document.getElementById("texto08");
            texto09 = document.getElementById("texto09");
            texto10 = document.getElementById("texto10");
            if (check4.checked) {
                element4.style.display = 'block';
                $("#InputJhonnie").val("1");
            } else if (check4no.checked) {
                element4.style.display = 'none';
                $("#caras_jhonnie1000").val("");
                $("#precio_jhonnie1000").val("");
                $("#caras_jhonnie700").val("");
                $("#precio_jhonnie700").val("");
                $("#caras_jhonnie375").val("");
                $("#precio_jhonnie375").val("");
                $("#caras_jhonnie1000").prop('disabled', true);
                $("#precio_jhonnie1000").prop('disabled', true);
                $("#caras_jhonnie700").prop('disabled', true);
                $("#precio_jhonnie700").prop('disabled', true);
                $("#caras_jhonnie375").prop('disabled', true);
                $("#precio_jhonnie375").prop('disabled', true);
                Johnnie1000si.checked = false;
                Johnnie1000no.checked = false;
                Johnnie700si.checked = false;
                Johnnie700no.checked = false;
                Johnnie375si.checked = false;
                Johnnie375no.checked = false;
                texto08.style.display = 'none';
                texto09.style.display = 'none';
                texto10.style.display = 'none';
                $("#InputJhonnie").val("0");
                $("#InputJhonnie1000").val("0");
                $("#InputJhonnie700").val("0");
                $("#InputJhonnie375").val("0");
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                texto08 = document.getElementById("texto08");
                var valor = $(event.target).val();
                if (valor == "jhonnie1000_si") {
                    $("#caras_jhonnie1000").prop('disabled', false);
                    $("#precio_jhonnie1000").prop('disabled', false);
                    $("#caras_jhonnie1000").val("");
                    $("#precio_jhonnie1000").val("");
                    $("#caras_jhonnie1000").focus();
                    texto08.style.display = 'block';
                    $("#InputJhonnie1000").val("1");
                } else if (valor == "jhonnie1000_no") {
                    $("#caras_jhonnie1000").val("0");
                    $("#precio_jhonnie1000").val("0");
                    $("#caras_jhonnie1000").prop('disabled', true);
                    $("#precio_jhonnie1000").prop('disabled', true);
                    texto08.style.display = 'none';
                    $("#InputJhonnie1000").val("0");
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                texto09 = document.getElementById("texto09");
                var valor = $(event.target).val();
                if (valor == "jhonnie700_si") {
                    $("#caras_jhonnie700").prop('disabled', false);
                    $("#precio_jhonnie700").prop('disabled', false);
                    $("#caras_jhonnie700").val("");
                    $("#precio_jhonnie700").val("");
                    $("#caras_jhonnie700").focus();
                    $("#InputJhonnie700").val("1");
                    texto09.style.display = 'block';
                } else if (valor == "jhonnie700_no") {
                    $("#caras_jhonnie700").val("0");
                    $("#precio_jhonnie700").val("0");
                    $("#caras_jhonnie700").prop('disabled', true);
                    $("#precio_jhonnie700").prop('disabled', true);
                    texto09.style.display = 'none';
                    $("#InputJhonnie700").val("0");
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                texto10 = document.getElementById("texto10");
                var valor = $(event.target).val();
                if (valor == "jhonnie375_si") {
                    $("#caras_jhonnie375").prop('disabled', false);
                    $("#precio_jhonnie375").prop('disabled', false);
                    $("#caras_jhonnie375").val("");
                    $("#precio_jhonnie375").val("");
                    $("#caras_jhonnie375").focus();
                    $("#InputJhonnie375").val("1")
                    texto10.style.display = 'block';
                } else if (valor == "jhonnie375_no") {
                    $("#caras_jhonnie375").val("0");
                    $("#precio_jhonnie375").val("0");
                    $("#caras_jhonnie375").prop('disabled', true);
                    $("#precio_jhonnie375").prop('disabled', true);
                    texto10.style.display = 'none';
                    $("#InputJhonnie375").val("0");
                }
            });
        });
    </script>
    <script>
        function showContent5() {
            element5 = document.getElementById("divOldParr");
            check5 = document.getElementById("OldParrSi");
            check5no = document.getElementById("OldParrNo");
            OldParr750si = document.getElementById("oldparr750_si");
            OldParr750no = document.getElementById("oldparr750_no");
            texto11 = document.getElementById("texto11");
            if (check5.checked) {
                element5.style.display = 'block';
                $("#InputOldParr").val("1");
            } else if (check5no.checked) {
                element5.style.display = 'none';
                $("#caras_oldparr750").val("");
                $("#precio_oldparr750").val("");
                $("#caras_oldparr750").prop('disabled', true);
                $("#precio_oldparr750").prop('disabled', true);
                OldParr750si.checked = false;
                OldParr750no.checked = false;
                texto11.style.display = 'none';
                $("#InputOldParr").val("0");
                $("#InputOldParr750 ").val("0");
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                texto11 = document.getElementById("texto11");
                var valor = $(event.target).val();
                if (valor == "oldparr750_si") {
                    $("#caras_oldparr750").prop('disabled', false);
                    $("#precio_oldparr750").prop('disabled', false);
                    $("#caras_oldparr750").val("");
                    $("#precio_oldparr750").val("");
                    $("#caras_oldparr750").focus();
                    texto11.style.display = 'block';
                    $("#InputOldParr750 ").val("1");
                } else if (valor == "oldparr750_no") {
                    $("#caras_oldparr750").val("");
                    $("#precio_oldparr750").val("");
                    $("#caras_oldparr750").prop('disabled', true);
                    $("#precio_oldparr750").prop('disabled', true);
                    texto11.style.display = 'none';
                    $("#InputOldParr750 ").val("0");
                }
            });
        });
    </script>
    <script>
        function showContent6() {
            element6 = document.getElementById("divBuchannas");
            check6 = document.getElementById("BuchannasSi");
            check6no = document.getElementById("BuchannasNo");
            buchannas700si = document.getElementById("buchannas700_si");
            buchannas700no = document.getElementById("buchannas700_no");
            buchannas375si = document.getElementById("buchannas375_si");
            buchannas375no = document.getElementById("buchannas375_no");
            texto12 = document.getElementById("texto12");
            texto13 = document.getElementById("texto13");
            if (check6.checked) {
                element6.style.display = 'block';
                $("#InputBuchannas ").val("1");
            } else if (check6no.checked) {
                element6.style.display = 'none';
                $("#caras_buchannas700").val("");
                $("#precio_buchannas700").val("");
                $("#caras_buchannas375").val("");
                $("#precio_buchannas375").val("");
                $("#caras_buchannas700").prop('disabled', true);
                $("#precio_buchannas700").prop('disabled', true);
                $("#caras_buchannas375").prop('disabled', true);
                $("#precio_buchannas375").prop('disabled', true);
                buchannas700si.checked = false;
                buchannas700no.checked = false;
                buchannas375si.checked = false;
                buchannas375no.checked = false;
                texto12.style.display = 'none';
                texto13.style.display = 'none';
                $("#InputBuchannas ").val("0");
                $("#InputBuchannas700 ").val("0");
                $("#InputBuchannas375 ").val("0");
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                texto12 = document.getElementById("texto12");
                var valor = $(event.target).val();
                if (valor == "buchannas700_si") {
                    $("#caras_buchannas700").prop('disabled', false);
                    $("#precio_buchannas700").prop('disabled', false);
                    $("#caras_buchannas700").val("");
                    $("#precio_buchannas700").val("");
                    $("#caras_buchannas700").focus();
                    texto12.style.display = 'block';
                    $("#InputBuchannas700 ").val("1");
                } else if (valor == "buchannas700_no") {
                    $("#caras_buchannas700").val("");
                    $("#precio_buchannas700").val("");
                    $("#caras_buchannas700").prop('disabled', true);
                    $("#precio_buchannas700").prop('disabled', true);
                    texto12.style.display = 'none';
                    $("#InputBuchannas700").val("0");
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                texto13 = document.getElementById("texto13");
                var valor = $(event.target).val();
                if (valor == "buchannas375_si") {
                    $("#caras_buchannas375").prop('disabled', false);
                    $("#precio_buchannas375").prop('disabled', false);
                    $("#caras_buchannas375").val("");
                    $("#precio_buchannas375").val("");
                    $("#caras_buchannas375").focus();
                    texto13.style.display = 'block';
                    $("#InputBuchannas375 ").val("1");
                } else if (valor == "buchannas375_no") {
                    $("#caras_buchannas375").val("");
                    $("#precio_buchannas375").val("");
                    $("#caras_buchannas375").prop('disabled', true);
                    $("#precio_buchannas375").prop('disabled', true);
                    texto13.style.display = 'none';
                    $("#InputBuchannas375 ").val("0");
                }
            });
        });
    </script>

    <script>
        function showContent7() {
            element7 = document.getElementById("DivSComRones");
            card_double = document.getElementById("card_double");
            check7 = document.getElementById("RonesCompSi");
            check7no = document.getElementById("RonesCompNo");
            if (check7.checked) {
                element7.style.display = 'block';
                card_double.style.height = "1000px";
                card_double.style.width = "400px";
                $("#comp_ron1").prop('disabled', false);
                $("#comp_ron2").prop('disabled', false);
                $("#precio_comp_ron1").prop('disabled', false);
                $("#precio_comp_ron2").prop('disabled', false);
                $("#caras_comp_ron").prop('disabled', false);
                $("#seleccionLinealR").prop('disabled', false);
                $("#InputRonesComp").val("1");



            } else if (check7no.checked) {
                element7.style.display = 'none';
                card_double.style.height = "200px";
                $("#comp_ron1").prop('disabled', true);
                $("#comp_ron2").prop('disabled', true);
                $("#precio_comp_ron1").prop('disabled', true);
                $("#precio_comp_ron2").prop('disabled', true);
                $("#caras_comp_ron").prop('disabled', true);
                $("#seleccionLinealR").prop('disabled', true);
                $("#InputRonesComp").val("0");
                $("#comp_ron1").val("n/a");
                $("#comp_ron2").val("n/a");


            }
        }
    </script>

    <script>
        function showContent8() {
            element8 = document.getElementById("DivSComAguard");
            card_double = document.getElementById("card_double2");
            check8 = document.getElementById("AguarCompSi");
            check8no = document.getElementById("AguarCompNo");
            if (check8.checked) {
                element8.style.display = 'block';
                card_double.style.height = "1000px";
                card_double.style.width = "400px";
                $("#comp_aguard1").prop('disabled', false);
                $("#comp_aguard2").prop('disabled', false);
                $("#precio_comp_aguardiente1").prop('disabled', false);
                $("#precio_comp_aguardiente2").prop('disabled', false);
                $("#caras_comp_aguardiente").prop('disabled', false);
                $("#seleccionLinealA").prop('disabled', false);
                $("#InputAguarComp").val("1");


            } else if (check8no.checked) {
                element8.style.display = 'none';
                card_double.style.height = "200px";
                $("#comp_aguard1").prop('disabled', true);
                $("#comp_aguard2").prop('disabled', true);
                $("#precio_comp_aguardiente1").prop('disabled', true);
                $("#precio_comp_aguardiente2").prop('disabled', true);
                $("#caras_comp_aguardiente").prop('disabled', true);
                $("#seleccionLinealA").prop('disabled', true);
                $("#InputAguarComp").val("0");
                $("#comp_aguard1").val("n/a");
                $("#comp_aguard2").val("n/a");
            }
        }
    </script>


    <script>
        function showContent9() {
            check9 = document.getElementById("cal_marc_visible_si");
            check9no = document.getElementById("cal_marc_visible_no");
            if (check9.checked) {
                $("#Inputcal_marc_visible").val("1");
            } else if (check9no.checked) {
                $("#Inputcal_marc_visible").val("0");
            }
        }
    </script>
    <script>
        function showContent10() {
            check10 = document.getElementById("cal_marc_danados_si");
            check10no = document.getElementById("cal_marc_danados_no");
            if (check10.checked) {
                $("#Inputcal_marc_danados").val("1");
            } else if (check10no.checked) {
                $("#Inputcal_marc_danados ").val("0");
            }
        }
    </script>
    <script>
        function showContent11() {
            check11 = document.getElementById("cal_marc_et_danados_si");
            check11no = document.getElementById("cal_marc_et_danados_no");
            if (check11.checked) {
                $("#Inputcal_marc_et_danados").val("1");
            } else if (check11no.checked) {
                $("#Inputcal_marc_et_danados ").val("0");
            }
        }
    </script>


    <script>
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
            document.getElementById("texto01").innerHTML = NumeroALetras(this.value);
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
        document.getElementById("precio_smirnoff_ns700").addEventListener("keyup", function(e) {
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
        document.getElementById("precio_smirnoff_ns375").addEventListener("keyup", function(e) {
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
        document.getElementById("precio_jhonnie700").addEventListener("keyup", function(e) {
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
        document.getElementById("precio_oldparr750").addEventListener("keyup", function(e) {
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
        document.getElementById("precio_buchannas700").addEventListener("keyup", function(e) {
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
        document.getElementById("precio_buchannas375").addEventListener("keyup", function(e) {
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
        function OcultarButton(btn)
        {
            $(btn).fadeOut();
        }
      </script>
@stop
