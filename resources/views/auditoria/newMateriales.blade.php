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

    <table class="table table-ligth" style="text-align: center;">
        <thead>
            <tr>
                <th>
                    <button type="button" id="botonCenefa" class="btnMat" data-toggle="modal" data-target="#cenefaModal"
                        onclick="seeCenefa()">
                        Audite la existencia del material CENEFA
                    </button>
                    <input type="text" class="inputRequired" id="mtcenefa" placeholder="diligencie la cenefa"
                        value="" required>
                </th>

            </tr>
        </thead>
        <tbody>
            <th>
                <button type="button" id="botonAfiche" class="btnMat" data-toggle="modal" data-target="#aficheModal"
                    onclick="seeAfiche()">
                    Audite la existencia del material AFICHE
                </button>
                <input type="text" class="inputRequired" id="mtafiche" placeholder="diligencie el afiche" value=""
                    required>
            </th>
        </tbody>
        <tbody>
            <th>
                <button type="button" id="botonMarco" class="btnMat" data-toggle="modal" data-target="#marcoModal"
                    onclick="seeMarco()">
                    Audite la existencia del material MARCO
                </button>
                <input type="text" class="inputRequired" id="mtmarco" placeholder="diligencie el marco" value=""
                    required>
            </th>
        </tbody>
        <tbody>
            <th>
                <button type="button" id="botonRompetrafico" class="btnMat" data-toggle="modal"
                    data-target="#rompetraficoModal" onclick="seeRompetrafico()">
                    Audite la existencia del material ROMPETRAFICO
                </button>
                <input type="text" class="inputRequired" id="mtrompetrafico" placeholder="diligencie el rompetrafico"
                    value="" required>
            </th>
        </tbody>
        <tbody>
            <th>
                <button type="button" id="botonFachada" class="btnMat" data-toggle="modal" data-target="#fachadaModal"
                    onclick="seeFachada()">
                    Audite la existencia del material FACHADA Y AVISOS
                </button>
                <input type="text" class="inputRequired" id="mtfachada" placeholder="diligencie la fachada"
                    value="" required>
            </th>
        </tbody>
        <tbody>
            <th>
                <button type="button" id="botonHielera" class="btnMat" data-toggle="modal" data-target="#hieleraModal"
                    onclick="seeHielera()">
                    Audite la existencia del material HIELERA
                </button>
                <input type="text" class="inputRequired" id="mthielera" placeholder="diligencie la hielera"
                    value="" required>
            </th>
        </tbody>

        <tbody>
            <th>
                <button type="button" id="botonBasesHielera" class="btnMat" data-toggle="modal" data-target="#baseshieleraModal"
                    onclick="seeBasesHielera()">
                    Audite la existencia del material BASES DE HIELERAS
                </button>
                <input type="text" class="inputRequired" id="mtBhielera" placeholder="diligencie las bases de las hieleras"
                    value="" required>
            </th>
        </tbody>

        <tbody>
            <th>
                <button type="button" id="botonDosificadorD" class="btnMat" data-toggle="modal" data-target="#dosificadorDModal"
                    onclick="seeDosificadorD()">
                    Audite la existencia del material DOSIFICADOR DOBLE
                </button>
                <input type="text" class="inputRequired" id="mtDosificadorD" placeholder="diligencie el dosificador doble"
                    value="" required>
            </th>
        </tbody>

        <tbody>
            <th>
                <button type="button" id="botonDosificadorS" class="btnMat" data-toggle="modal" data-target="#dosificadorSModal"
                    onclick="seeDosificadorS()">
                    Audite la existencia del material DOSIFICADOR SENCILLO
                </button>
                <input type="text" class="inputRequired" id="mtDosificadorS" placeholder="diligencie el dosificador sencillo"
                    value="" required>
            </th>
        </tbody>
        <tbody>
            <th>
                <button type="button" id="botonBranding" class="btnMat" data-toggle="modal" data-target="#brandingModal"
                    onclick="seeBranding()">
                    Audite la existencia del material BRANDING
                </button>
                <input type="text" class="inputRequired" id="mtBranding" placeholder="diligencie el branding"
                    value="" required>
            </th>
        </tbody>

        <tbody>
            <th>
                <button type="button" id="botonVasos" class="btnMat" data-toggle="modal" data-target="#vasosModal"
                    onclick="seeVasos()">
                    Audite la existencia del material VASOS Y COPAS
                </button>
                <input type="text" class="inputRequired" id="mtVasos" placeholder="diligencie los vasos"
                    value="" required>
            </th>
        </tbody>
    </table>

    <ul>
        <!-- Modal -->
        <div class="modal fade" id="cenefaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="ttulo">
                            <green><span>Confirme si hay cenefa</span></green>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <br><br>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="col">
                                <div class="container">
                                    <img class="img_cenefa" src="{{ asset('/storage/cenefa.png') }}" />
                                    <CENTER>
                                        <h4>HAY CENEFA?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="cenefa" id="cenefa_si"
                                            value="cenefa_si" disabled>
                                        <label class="form-check-label" for="cenefa_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="cenefa" id="cenefa_no"
                                            value="cenefa_no" disabled>
                                        <label class="form-check-label" for="cenefa_no">NO</label>
                                    </div>
                                </div>
                                <br><br>


                                <div class="container" id="divCenefaPregunta1" style="display: none">
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
                                <div class="container" id="divCenefaPregunta2" style="display: none">
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
                                <input type="hidden" id="seleccionCenefa2" name="seleccionCenefa"
                                    value="public\img\no_diponible.png" disabled>
                                <div id="divCenefa_Img" style="display: none">
                                    <div class="row" style="text-align: center">
                                        <div class="col">
                                            <br><br>
                                            <hr>
                                            <green> <span>Tome foto del cenefa</span></green>
                                            <input type="file" name="seleccionCenefa" id="seleccionCenefa"
                                                accept="image/*" onclick="cierreCenefa()"
                                                value="auditorias_pics/Cenefa_ {{ $puntos_auditoria->precarga_id }} .png"
                                                required disabled>
                                            <img class="card-img-mate" id="imagenCenefa">
                                            <br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Continuar</button>
                    </div>
                </div>
            </div>
        </div>
    </ul>

    <ul>
        <!-- Modal -->
        <div class="modal fade" id="aficheModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="ttulo">
                            <green><span>Confirme si hay afiche</span></green>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <br><br>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="col">
                                <div class="container">
                                    <img class="img_afiche" alt="afiche" src="{{ asset('/storage/afiche.png') }}" />
                                    <CENTER>
                                        <h4>HAY AFICHE?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="afiche" id="afiche_si"
                                            value="afiche_si" disabled>
                                        <label class="form-check-label" for="afiche_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="afiche" id="afiche_no"
                                            value="afiche_no" disabled>
                                        <label class="form-check-label" for="afiche_no">NO</label>
                                    </div>
                                </div>
                                <br><br>


                                <div class="container" id="divAfichePregunta1" style="display: none">
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
                                <div class="container" id="divAfichePregunta2" style="display: none">
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


                                <div class="container" id="divAfichePregunta3" style="display: none">
                                    <CENTER>
                                        <h4>EL AFICHE ESTA COMBOTIZADO?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="aficheCombotizado"
                                            id="afiche_combo_si" value="afiche_combo_si" disabled>
                                        <label class="form-check-label" for="afiche_combo_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="aficheCombotizado"
                                            id="afiche_combo_no" value="afiche_combo_no" disabled>
                                        <label class="form-check-label" for="afiche_combo_no">NO</label>
                                    </div>
                                </div>

                                <div class="container" id="divAfichePregunta3a" style="display: none">
                                    <CENTER>
                                        <h4>INDIQUE LA MARCA CON LA QUE SE COMBOTIZO EL AFICHE</h4>
                                    </CENTER>
                                    <div class="form-control">
                                        {!! Form::select('marca_combo', $diageoMarca, null, [
                                            'class' => 'form-control',
                                            'placeholder' => 'Seleccione la marca',
                                            'id' => 'marca_combo',
                                            'required',
                                            'disabled',
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="container" id="divAfichePregunta3b" style="display: none">
                                    <CENTER>
                                        <h4>DIAGEO + OTRO PRODUCTO</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="combox1" id="combox1_si"
                                            value="combox1_si" disabled>
                                        <label class="form-check-label" for="combox1_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="combox1" id="combox1_no"
                                            value="combox1_no" disabled>
                                        <label class="form-check-label" for="combox1_no">NO</label>
                                    </div>
                                </div>


                                <div class="container" id="divAfichePregunta3c" style="display: none">
                                    <CENTER>
                                        <h4>DIAGEO INDICANDO EL PRECIO</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="combox2" id="combox2_si"
                                            value="combox2_si" disabled>
                                        <label class="form-check-label" for="combox2_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="combox2" id="combox2_no"
                                            value="combox2_no" disabled>
                                        <label class="form-check-label" for="combox2_no">NO</label>
                                    </div>
                                </div>

                                <div class="container" id="divAfichePregunta3d" style="display: none">
                                    <CENTER>
                                        <h4>DIAGEO + GIFT</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="combox3" id="combox3_si"
                                            value="combox3_si" disabled>
                                        <label class="form-check-label" for="combox3_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="combox3" id="combox3_no"
                                            value="combox3_no" disabled>
                                        <label class="form-check-label" for="combox3_no">NO</label>
                                    </div>
                                </div>


                                <input type="hidden" id="seleccionAfiche2" name="seleccionAfiche"
                                    value="public\img\no_diponible.png" disabled>
                                <div id="divAfiche_Img" style="display: none">
                                    <div class="row" style="text-align: center">
                                        <div class="col">
                                            <br><br>
                                            <hr>
                                            <green> <span>Tome foto del cenefa</span></green>
                                            <input type="file" name="seleccionAfiche" id="seleccionAfiche"
                                                accept="image/*" onclick="cierreAfiche()"
                                                value="auditorias_pics/Afiche_ {{ $puntos_auditoria->precarga_id }} .png"
                                                required disabled>
                                            <img class="card-img-mate" id="imagenAfiche">
                                            <br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Continuar</button>
                    </div>
                </div>
            </div>
        </div>
    </ul>

    <ul>
        <!-- Modal -->
        <div class="modal fade" id="marcoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="ttulo">
                            <green><span>Confirme si hay marco</span></green>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <br><br>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="col">
                                <div class="container">
                                    <img class="img_marco" src="{{ asset('/storage/marco.png') }}" />
                                    <CENTER>
                                        <h4>HAY MARCO?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="marco" id="marco_si"
                                            value="marco_si" disabled>
                                        <label class="form-check-label" for="marco_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="marco" id="marco_no"
                                            value="marco_no" disabled>
                                        <label class="form-check-label" for="marco_no">NO</label>
                                    </div>
                                </div>
                                <br><br>


                                <div class="container" id="divMarcoPregunta1" style="display: none">
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
                                <div class="container" id="divMarcoPregunta2" style="display: none">
                                    <CENTER>
                                        <h4>EL MARCO ESTA BIEN COLOCADA?</h4>
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
                                <input type="hidden" id="seleccionMarco2" name="seleccionMarco"
                                    value="public\img\no_diponible.png" disabled>
                                <div id="divMarco_Img" style="display: none">
                                    <div class="row" style="text-align: center">
                                        <div class="col">
                                            <br><br>
                                            <hr>
                                            <green> <span>Tome foto del marco</span></green>
                                            <input type="file" name="seleccionMarco" id="seleccionMarco"
                                                accept="image/*" onclick="cierreMarco()"
                                                value="auditorias_pics/Marco_ {{ $puntos_auditoria->precarga_id }} .png"
                                                required disabled>
                                            <img class="card-img-mate" id="imagenMarco">
                                            <br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Continuar</button>
                    </div>
                </div>
            </div>
        </div>
    </ul>

    <ul>
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
                        <br><br>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="col">
                                <div class="container">
                                    <img class="img_rompetraficos" src="{{ asset('/storage/rompetraficos.png') }}" />
                                    <CENTER>
                                        <h4>HAY ROMPETRAFICO?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rompetraficos"
                                            id="rompetraficos_si" value="rompetraficos_si" disabled>
                                        <label class="form-check-label" for="rompetraficos_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rompetraficos"
                                            id="rompetraficos_no" value="rompetraficos_no" disabled>
                                        <label class="form-check-label" for="rompetraficos_no">NO</label>
                                    </div>
                                </div>
                                <br><br>


                                <div class="container" id="divRompetraficoPregunta1" style="display: none">
                                    <CENTER>
                                        <h4>EL ROMPETRAFICO ES VISIBLE?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prod_rt_visibles"
                                            id="prod_rt_visibles_si" value="prod_rt_visibles_si" disabled>
                                        <label class="form-check-label" for="prod_rt_visibles_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prod_rt_visibles"
                                            id="prod_rt_visibles_no" value="prod_rt_visibles_no" disabled>
                                        <label class="form-check-label" for="prod_rt_visibles_no">NO</label>
                                    </div>
                                </div>
                                <div class="container" id="divRompetraficoPregunta2" style="display: none">
                                    <CENTER>
                                        <h4>EL ROMPETRAFICO ESTA BIEN COLOCADO?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prod_rt_properly"
                                            id="prod_rt_properly_si" value="prod_rt_properly_si" disabled>
                                        <label class="form-check-label" for="prod_rt_properly_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prod_rt_properly"
                                            id="prod_rt_properly_no" value="prod_rt_properly_no" disabled>
                                        <label class="form-check-label" for="prod_rt_properly_no">NO</label>
                                    </div>
                                </div>
                                <input type="hidden" id="seleccionRompetrafico2" name="seleccionRompetrafico"
                                    value="public\img\no_diponible.png" disabled>
                                <div id="divRompetrafico_Img" style="display: none">
                                    <div class="row" style="text-align: center">
                                        <div class="col">
                                            <br><br>
                                            <hr>
                                            <green> <span>Tome foto del marco</span></green>
                                            <input type="file" name="seleccionRompetrafico" id="seleccionRompetrafico"
                                                accept="image/*" onclick="cierreRompetrafico()"
                                                value="auditorias_pics/Rompetrafico_ {{ $puntos_auditoria->precarga_id }} .png"
                                                required disabled>
                                            <img class="card-img-mate" id="imagenRompetrafico">
                                            <br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Continuar</button>
                    </div>
                </div>
            </div>
        </div>
    </ul>


    <ul>
        <!-- Modal -->
        <div class="modal fade" id="fachadaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="ttulo">
                            <green><span>Confirme si hay fachadas y avisos</span></green>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <br><br>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="col">
                                <div class="container">
                                    <img class="img_fachadas" src="{{ asset('/storage/fachada.png') }}" />
                                    <CENTER>
                                        <h4>HAY FACHADA Y AVISOS DE LA MARCA?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fachadas" id="fachadas_si"
                                            value="fachadas_si" disabled>
                                        <label class="form-check-label" for="fachadas_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fachadas" id="fachadas_no"
                                            value="fachadas_no" disabled>
                                        <label class="form-check-label" for="fachadas_no">NO</label>
                                    </div>
                                </div>
                                <br><br>


                                <div class="container" id="divFachadaPregunta1" style="display: none">
                                    <CENTER>
                                        <h4>LA FACHADA Y LOS AVISOS SON VISIBLES?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fachadas_visi"
                                            id="fachadas_visi_si" value="fachadas_visi_si" disabled>
                                        <label class="form-check-label" for="fachadas_visi_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fachadas_visi"
                                            id="fachadas_visi_no" value="fachadas_visi_no" disabled>
                                        <label class="form-check-label" for="fachadas_visi_no">NO</label>
                                    </div>
                                </div>
                                <div class="container" id="divFachadaPregunta2" style="display: none">
                                    <CENTER>
                                        <h4>LA FACHADA Y LOS AVISOS ESTA BIEN COLOCADOS?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fachadas_colo"
                                            id="fachadas_colo_si" value="fachadas_colo_si" disabled>
                                        <label class="form-check-label" for="fachadas_colo_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fachadas_colo"
                                            id="fachadas_colo_no" value="fachadas_colo_no" disabled>
                                        <label class="form-check-label" for="fachadas_colo_no">NO</label>
                                    </div>
                                </div>
                                <input type="hidden" id="seleccionFaxada2" name="seleccionFaxada"
                                    value="public\img\no_diponible.png" disabled>
                                <div id="divFachada_Img" style="display: none">
                                    <div class="row" style="text-align: center">
                                        <div class="col">
                                            <br><br>
                                            <hr>
                                            <green> <span>Tome foto de la fachada y los avisos </span></green>
                                            <input type="file" name="seleccionFaxada" id="seleccionFaxada"
                                                accept="image/*" onclick="cierreFachada()"
                                                value="auditorias_pics/Faxada_ {{ $puntos_auditoria->precarga_id }} .png"
                                                required disabled>
                                            <img class="card-img-mate" id="imagenFachada">
                                            <br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Continuar</button>
                    </div>
                </div>
            </div>
        </div>
    </ul>

    <ul>
        <!-- Modal -->
        <div class="modal fade" id="hieleraModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="ttulo">
                            <green><span>Confirme si hay hieleras</span></green>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <br><br>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="col">
                                <div class="container">
                                    <img class="img_hieler" src="{{ asset('/storage/hieler.png') }}" />
                                    <CENTER>
                                        <h4>HAY HIELERAS?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="hielera" id="hielera_si"
                                            value="hielera_si" disabled>
                                        <label class="form-check-label" for="hielera_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="hielera" id="hielera_no"
                                            value="hielera_no" disabled>
                                        <label class="form-check-label" for="hielera_no">NO</label>
                                    </div>
                                </div>
                                <br><br>


                                <div class="container" id="divHieleraPregunta1" style="display: none">
                                    <CENTER>
                                        <h4>LAS HIELERAS SON VISIBLES?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prod_hl_visible"
                                            id="prod_hl_visible_si" value="prod_hl_visible_si" disabled>
                                        <label class="form-check-label" for="prod_hl_visible_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prod_hl_visible"
                                            id="prod_hl_visible_no" value="prod_hl_visible_no" disabled>
                                        <label class="form-check-label" for="prod_hl_visible_no">NO</label>
                                    </div>
                                </div>
                                <div class="container" id="divHieleraPregunta2" style="display: none">
                                    <CENTER>
                                        <h4>LAS HIELERAS ESTAN EN BUEN ESTADO?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prod_hl_danadas"
                                            id="prod_hl_danadas_si" value="prod_hl_danadas_si" disabled>
                                        <label class="form-check-label" for="prod_hl_danadas_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prod_hl_danadas"
                                            id="prod_hl_danadas_no" value="prod_hl_danadas_no" disabled>
                                        <label class="form-check-label" for="prod_hl_danadas_no">NO</label>
                                    </div>
                                </div>
                                <div class="container" id="divHieleraPregunta3" style="display: none">
                                    <CENTER>
                                        <h4>LAS HIELERAS ESTAN SIENDO UTILIZADAS CON PRODUCTOS DIAGEO?</h4>
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
                                <input type="hidden" id="seleccionHielera2" name="seleccionHielera"
                                    value="public\img\no_diponible.png" disabled>
                                <div id="divHielera_Img" style="display: none">
                                    <div class="row" style="text-align: center">
                                        <div class="col">
                                            <br><br>
                                            <hr>
                                            <green> <span>Tome foto de la hielera </span></green>
                                            <input type="file" name="seleccionHielera" id="seleccionHielera"
                                                accept="image/*" onclick="cierreHielera()"
                                                value="auditorias_pics/Hielera_ {{ $puntos_auditoria->precarga_id }} .png"
                                                required disabled>
                                            <img class="card-img-mate" id="imagenHielera">
                                            <br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Continuar</button>
                    </div>
                </div>
            </div>
        </div>
    </ul>

    <ul>
        <!-- Modal -->
        <div class="modal fade" id="baseshieleraModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="ttulo">
                            <green><span>Confirme si hay bases de hieleras</span></green>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <br><br>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="col">
                                <div class="container">
                                    <img class="img_bases_h" src="{{ asset('/storage/bases_h.png') }}" />
                                    <CENTER>
                                        <h4>HAY BASES DE HIELERAS?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="bases_h" id="bases_h_si"
                                            value="bases_h_si" disabled>
                                        <label class="form-check-label" for="bases_h_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="bases_h" id="bases_h_no"
                                            value="bases_h_no" disabled>
                                        <label class="form-check-label" for="bases_h_no">NO</label>
                                    </div>
                                </div>
                                <br><br>


                                <div class="container" id="diBHieleraPregunta1" style="display: none">
                                    <CENTER>
                                        <h4>LAS BASES DE LAS HIELERAS SON VISIBLES?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prod_baseshl_visible"
                                            id="prod_baseshl_visible_si" value="prod_baseshl_visible_si" disabled>
                                        <label class="form-check-label" for="prod_baseshl_visible_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prod_baseshl_visible"
                                            id="prod_baseshl_visible_no" value="prod_baseshl_visible_no" disabled>
                                        <label class="form-check-label" for="prod_baseshl_visible_no">NO</label>
                                    </div>
                                </div>
                                <div class="container" id="divBHieleraPregunta2" style="display: none">
                                    <CENTER>
                                        <h4>LAS BASES DE LAS HIELERAS ESTAN EN BUEN ESTADO?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prod_baseshl_danadas"
                                            id="prod_baseshl_danadas_si" value="prod_baseshl_danadas_si" disabled>
                                        <label class="form-check-label" for="prod_baseshl_danadas_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prod_baseshl_danadas"
                                            id="prod_baseshl_danadas_no" value="prod_baseshl_danadas_no" disabled>
                                        <label class="form-check-label" for="prod_baseshl_danadas_no">NO</label>
                                    </div>
                                </div>
                                <div class="container" id="divBHieleraPregunta3" style="display: none">
                                    <CENTER>
                                        <h4>LAS BASES DE LAS HIELERAS ESTAN SIENDO UTILIZADAS CON PRODUCTOS DIAGEO?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="baseshl_con_prod"
                                            id="baseshl_con_prod_si" value="baseshl_con_prod_si" disabled>
                                        <label class="form-check-label" for="baseshl_con_prod_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="baseshl_con_prod"
                                            id="baseshl_con_prod_no" value="baseshl_con_prod_no" disabled>
                                        <label class="form-check-label" for="baseshl_con_prod_no">NO</label>
                                    </div>
                                </div>
                                <input type="hidden" id="seleccionBHielera2" name="seleccionBase_h"
                                    value="public\img\no_diponible.png" disabled>
                                <div id="divBHielera_Img" style="display: none">
                                    <div class="row" style="text-align: center">
                                        <div class="col">
                                            <br><br>
                                            <hr>
                                            <green> <span>Tome foto de la hielera </span></green>
                                            <input type="file" name="seleccionBase_h" id="seleccionBase_h"
                                                accept="image/*" onclick="cierreBasesHielera()"
                                                value="auditorias_pics/Base_h_ {{ $puntos_auditoria->precarga_id }} .png"
                                                required disabled>
                                            <img class="card-img-mate" id="imagenBase_h">
                                            <br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Continuar</button>
                    </div>
                </div>
            </div>
        </div>
    </ul>


    <ul>
        <!-- Modal -->
        <div class="modal fade" id="dosificadorDModal" tabindex="-1" role="dialog"
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
                        <br><br>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="col">
                                <div class="container">
                                    <img class="img_bases_h" src="{{ asset('/storage/dosificador_doble.png') }}" />
                                    <CENTER>
                                        <h4>HAY DOSIFICADOR DOBLES?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="dosificadorD"
                                            id="dosificadorD_si" value="dosificadorD_si" disabled>
                                        <label class="form-check-label" for="dosificadorD_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="dosificadorD"
                                            id="dosificadorD_no" value="dosificadorD_no" disabled>
                                        <label class="form-check-label" for="dosificadorD_no">NO</label>
                                    </div>
                                </div>
                                <br><br>


                                <div class="container" id="divDosificadorDPregunta1" style="display: none">
                                    <CENTER>
                                        <h4>EL DOSIFICADOR DOBLE ES VISIBLE?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prod_dsD_visibles"
                                            id="prod_dsD_visibles_si" value="prod_dsD_visibles_si" disabled>
                                        <label class="form-check-label" for="prod_dsD_visibles_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prod_dsD_visibles"
                                            id="prod_dsD_visibles_no" value="prod_dsD_visibles_no" disabled>
                                        <label class="form-check-label" for="prod_dsD_visibles_no">NO</label>
                                    </div>
                                </div>
                                <div class="container" id="divDosificadorDPregunta2" style="display: none">
                                    <CENTER>
                                        <h4>EL DOSIFICADOR DOBLE ESTA SIENDO UTILIZADO CON PRODUCTOS DIAGEO?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prod_dsD_diferentes"
                                            id="prod_dsD_diferentes_si" value="prod_dsD_diferentes_si" disabled>
                                        <label class="form-check-label" for="prod_dsD_diferentes_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prod_dsD_diferentes"
                                            id="prod_dsD_diferentes_no" value="prod_dsD_diferentes_no" disabled>
                                        <label class="form-check-label" for="prod_dsD_diferentes_no">NO</label>
                                    </div>
                                </div>
                                <div class="container" id="divDosificadorDPregunta3" style="display: none">

                                    <CENTER>
                                        <h4>EL DOSIFICADOR DOBLE ESTA EN BUEN ESTADO?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prod_dsD_danados"
                                            id="prod_dsD_danados_si" value="prod_dsD_danados_si" disabled>
                                        <label class="form-check-label" for="prod_dsD_danados_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prod_dsD_danados"
                                            id="prod_dsD_danados_no" value="prod_dsD_danados_no" disabled>
                                        <label class="form-check-label" for="prod_dsD_danados_no">NO</label>
                                    </div>
                                </div>
                                <input type="hidden" id="seleccionDosificadorD2" name="seleccionDosificadorD"
                                    value="public\img\no_diponible.png" disabled>
                                <div id="divDosificadorD_Img" style="display: none">
                                    <div class="row" style="text-align: center">
                                        <div class="col">
                                            <br><br>
                                            <hr>
                                            <green> <span>Tome foto del dosificador doble</span></green>
                                            <input type="file" name="seleccionDosificadorD" id="seleccionDosificadorD"
                                                accept="image/*" onclick="cierreDosificadorD()"
                                                value="auditorias_pics/DosificadorD_ {{ $puntos_auditoria->precarga_id }} .png"
                                                required disabled>
                                            <img class="card-img-mate" id="imagenDosificadorD">
                                            <br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Continuar</button>
                    </div>
                </div>
            </div>
        </div>
    </ul>

    <ul>
        <!-- Modal -->
        <div class="modal fade" id="dosificadorSModal" tabindex="-1" role="dialog"
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
                        <br><br>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="col">
                                <div class="container">
                                    <img class="img_bases_h" src="{{ asset('/storage/dosificador_sencillo.png') }}" />
                                    <CENTER>
                                        <h4>HAY DOSIFICADOR SENCILLO?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="dosificadorS"
                                            id="dosificadorS_si" value="dosificadorS_si" disabled>
                                        <label class="form-check-label" for="dosificadorS_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="dosificadorS"
                                            id="dosificadorS_no" value="dosificadorS_no" disabled>
                                        <label class="form-check-label" for="dosificadorS_no">NO</label>
                                    </div>
                                </div>
                                <br><br>


                                <div class="container" id="divDosificadorSPregunta1" style="display: none">
                                    <CENTER>
                                        <h4>EL DOSIFICADOR SENCILLO ES VISIBLE?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prod_dsS_visibles"
                                            id="prod_dsS_visibles_si" value="prod_dsS_visibles_si" disabled>
                                        <label class="form-check-label" for="prod_dsS_visibles_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prod_dsS_visibles"
                                            id="prod_dsS_visibles_no" value="prod_dsS_visibles_no" disabled>
                                        <label class="form-check-label" for="prod_dsS_visibles_no">NO</label>
                                    </div>
                                </div>
                                <div class="container" id="divDosificadorSPregunta2" style="display: none">
                                    <CENTER>
                                        <h4>EL DOSIFICADOR SENCILLO ESTA SIENDO UTILIZADO CON PRODUCTOS DIAGEO?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prod_dsS_diferentes"
                                            id="prod_dsS_diferentes_si" value="prod_dsS_diferentes_si" disabled>
                                        <label class="form-check-label" for="prod_dsS_diferentes_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prod_dsS_diferentes"
                                            id="prod_dsS_diferentes_no" value="prod_dsS_diferentes_no" disabled>
                                        <label class="form-check-label" for="prod_dsS_diferentes_no">NO</label>
                                    </div>
                                </div>
                                <div class="container" id="divDosificadorSPregunta3" style="display: none">

                                    <CENTER>
                                        <h4>EL DOSIFICADOR SENCILLO ESTA EN BUEN ESTADO?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prod_dsS_danados"
                                            id="prod_dsS_danados_si" value="prod_dsS_danados_si" disabled>
                                        <label class="form-check-label" for="prod_dsS_danados_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="prod_dsS_danados"
                                            id="prod_dsS_danados_no" value="prod_dsS_danados_no" disabled>
                                        <label class="form-check-label" for="prod_dsS_danados_no">NO</label>
                                    </div>
                                </div>
                                <input type="hidden" id="seleccionDosificadorS2" name="seleccionDosificadorS"
                                    value="public\img\no_diponible.png" disabled>
                                <div id="divDosificadorS_Img" style="display: none">
                                    <div class="row" style="text-align: center">
                                        <div class="col">
                                            <br><br>
                                            <hr>
                                            <green> <span>Tome foto del dosificador sencillo</span></green>
                                            <input type="file" name="seleccionDosificadorS"
                                                id="seleccionDosificadorS" accept="image/*"
                                                onclick="cierreDosificadorS()"
                                                value="auditorias_pics/DosificadorS_ {{ $puntos_auditoria->precarga_id }} .png"
                                                required disabled>
                                            <img class="card-img-mate" id="imagenDosificadorS">
                                            <br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Continuar</button>
                    </div>
                </div>
            </div>
        </div>
    </ul>

    <ul>
        <!-- Modal -->
        <div class="modal fade" id="brandingModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="ttulo">
                            <green><span>Confirme si hay branding de mesas</span></green>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <br><br>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="col">
                                <div class="container">
                                    <img class="img_branding" src="{{ asset('/storage/branding_mesas.png') }}" />
                                    <CENTER>
                                        <h4>HAY BRANDING DE MESAS?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="branding"
                                            id="branding_si" value="branding_si" disabled>
                                        <label class="form-check-label" for="branding_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="branding"
                                            id="branding_no" value="branding_no" disabled>
                                        <label class="form-check-label" for="branding_no">NO</label>
                                    </div>
                                </div>
                                <br><br>


                                <div class="container" id="divBrandingPregunta1" style="display: none">
                                    <CENTER>
                                        <h4>EL BRANDING DE MESA ES VISIBLE?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="branding_visible"
                                            id="branding_visible_si" value="branding_visible_si" disabled>
                                        <label class="form-check-label" for="branding_visible_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="branding_visible"
                                            id="branding_visible_no" value="branding_visible_no" disabled>
                                        <label class="form-check-label" for="branding_visible_no">NO</label>
                                    </div>
                                </div>
                                <div class="container" id="divBrandingPregunta2" style="display: none">
                                    <CENTER>
                                        <h4>EL BRANDING DE MESA ESTA EN BUEN ESTADO?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="branding_danados"
                                            id="branding_danados_si" value="branding_danados_si" disabled>
                                        <label class="form-check-label" for="branding_danados_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="branding_danados"
                                            id="branding_danados_no" value="branding_danados_no" disabled>
                                        <label class="form-check-label" for="branding_danados_no">NO</label>
                                    </div>
                                </div>
                                <input type="hidden" id="seleccionBranding2" name="seleccionBranding"
                                    value="public\img\no_diponible.png" disabled>
                                <div id="divBranding_Img" style="display: none">
                                    <div class="row" style="text-align: center">
                                        <div class="col">
                                            <br><br>
                                            <hr>
                                            <green> <span>Tome foto del brading de mesas</span></green>
                                            <input type="file" name="seleccionBranding" id="seleccionBranding"
                                                accept="image/*" onclick="cierreBranding()"
                                                value="auditorias_pics/Branding_{{ $puntos_auditoria->precarga_id }}.png"
                                                required disabled>
                                            <img class="card-img-mate" id="imagenBranding">
                                            <br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Continuar</button>
                    </div>
                </div>
            </div>
        </div>
    </ul>


    <ul>
        <!-- Modal -->
        <div class="modal fade" id="vasosModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="ttulo">
                            <green><span>Confirme si hay vasos y copas</span></green>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <br><br>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="col">
                                <div class="container">
                                    <img class="img_vasos" src="{{ asset('/storage/vasos_copas.png') }}" />
                                    <CENTER>
                                        <h4>HAY VASOS Y COPAS?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vasos"
                                            id="vasos_si" value="vasos_si" disabled>
                                        <label class="form-check-label" for="vasos_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vasos"
                                            id="vasos_no" value="vasos_no" disabled>
                                        <label class="form-check-label" for="vasos_no">NO</label>
                                    </div>
                                </div>
                                <br><br>


                                <div class="container" id="divVasosPregunta1" style="display: none">
                                    <CENTER>
                                        <h4>VASOS Y COPAS SON VISIBLE?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vasos_visibles"
                                            id="vasos_visibles_si" value="vasos_visibles_si" disabled>
                                        <label class="form-check-label" for="vasos_visibles_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vasos_visibles"
                                            id="vasos_visibles_no" value="vasos_visibles_no" disabled>
                                        <label class="form-check-label" for="vasos_visibles_no">NO</label>
                                    </div>
                                </div>
                                <div class="container" id="divVasosPregunta2" style="display: none">
                                    <CENTER>
                                        <h4>LOS VASOS Y COPAS ESTAN EN BUEN ESTADO?</h4>
                                    </CENTER>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vasos_quebrados"
                                            id="vasos_quebrados_si" value="vasos_quebrados_si" disabled>
                                        <label class="form-check-label" for="vasos_quebrados_si">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vasos_quebrados"
                                            id="vasos_quebrados_no" value="vasos_quebrados_no" disabled>
                                        <label class="form-check-label" for="vasos_quebrados_no">NO</label>
                                    </div>
                                </div>
                                <input type="hidden" id="seleccionVasos2" name="seleccionVasos"
                                    value="public\img\no_diponible.png" disabled>
                                <div id="divVasos_Img" style="display: none">
                                    <div class="row" style="text-align: center">
                                        <div class="col">
                                            <br><br>
                                            <hr>
                                            <green> <span>Tome foto de los vasos y copas</span></green>
                                            <input type="file" name="seleccionVasos" id="seleccionVasos"
                                                accept="image/*" onclick="cierreVasos()"
                                                value="auditorias_pics/Vasos_{{ $puntos_auditoria->precarga_id }}.png"
                                                required disabled>
                                            <img class="card-img-mate" id="imagenVasos">
                                            <br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Continuar</button>
                    </div>
                </div>
            </div>
        </div>
    </ul>


    <div id="divSubmit" style="display: block">
        {!! Form::submit('Siguiente', ['class' => 'btn btn-primary', 'id' => 'boton']) !!}
    </div>
    <br><br>
    {!! Form::close() !!}
@stop
@section('js')
    <script>
        function seeCenefa() {
            $("#cenefa_si").prop('disabled', false);
            $("#cenefa_no").prop('disabled', false);
        }
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var inputCenefa = document.getElementById('mtcenefa');
                var valor = $(event.target).val();
                if (valor == "cenefa_si") {
                    $('#divCenefaPregunta1').show();
                    $("#cenefa_visi_si").prop('disabled', false);
                    $("#cenefa_visi_no").prop('disabled', false);
                } else if (valor == "cenefa_no") {
                    $("#cenefa_visi_si").prop('disabled', true);
                    $("#cenefa_visi_no").prop('checked', true)
                    $("#cenefa_colo_si").prop('disabled', true);
                    $("#cenefa_colo_no").prop('checked', true)
                    $("#seleccionCenefa").prop('disabled', true);
                    $("#seleccionCenefa2").prop('disabled', false);
                    $('#botonCenefa').removeClass("btnMat");
                    $('#botonCenefa').addClass("btnProcess");
                    botonCenefa.innerHTML = "El material CENEFA ya se registro";

                    inputCenefa.value = "cenefa ok";
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "cenefa_visi_si") {
                    $("#divCenefaPregunta2").show();
                    $("#cenefa_colo_si").prop('disabled', false);
                    $("#cenefa_colo_no").prop('disabled', false);
                } else if (valor == "cenefa_visi_no") {
                    $("#divCenefaPregunta2").show();
                    $("#cenefa_colo_si").prop('disabled', false);
                    $("#cenefa_colo_no").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "cenefa_colo_si") {
                    $("#divCenefa_Img").show();
                    $("#seleccionCenefa").prop('disabled', false);
                } else if (valor == "cenefa_colo_no") {
                    $("#divCenefa_Img").show();
                    $("#seleccionCenefa").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        function cierreCenefa() {
            var inputCenefa = document.getElementById('mtcenefa');
            $('#botonCenefa').removeClass("btnMat");
            $('#botonCenefa').addClass("btnProcess");
            botonCenefa.innerHTML = "El material CENEFA ya se registro";
            inputCenefa.value = "cenefa ok";
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
        function seeAfiche() {
            $("#afiche_si").prop('disabled', false);
            $("#afiche_no").prop('disabled', false);
        }
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var inputAfiche = document.getElementById('mtafiche');
                var valor = $(event.target).val();
                if (valor == "afiche_si") {
                    $('#divAfichePregunta1').show();
                    $("#afiche_visi_si").prop('disabled', false);
                    $("#afiche_visi_no").prop('disabled', false);
                } else if (valor == "afiche_no") {
                    $("#afiche_visi_si").prop('disabled', true);
                    $("#afiche_visi_no").prop('checked', true)
                    $("#afiche_colo_si").prop('disabled', true);
                    $("#afiche_colo_no").prop('checked', true)
                    $("#seleccionAfiche").prop('disabled', true);
                    $("#seleccionAfiche2").prop('disabled', false);
                    $('#botonAfiche').removeClass("btnMat");
                    $('#botonAfiche').addClass("btnProcess");
                    botonAfiche.innerHTML = "El material AFICHE ya se registro";
                    inputAfiche.value = "afiche ok";
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "afiche_visi_si") {
                    $("#divAfichePregunta2").show();
                    $("#afiche_colo_si").prop('disabled', false);
                    $("#afiche_colo_no").prop('disabled', false);
                } else if (valor == "afiche_visi_no") {
                    $("#divAfichePregunta2").show();
                    $("#afiche_colo_si").prop('disabled', false);
                    $("#afiche_colo_no").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "afiche_colo_si") {
                    $("#divAfichePregunta3").show();
                    $("#afiche_combo_si").prop('disabled', false);
                    $("#afiche_combo_no").prop('disabled', false);
                } else if (valor == "afiche_colo_no") {
                    $("#divAfichePregunta3").show();
                    $("#afiche_combo_si").prop('disabled', false);
                    $("#afiche_combo_no").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "afiche_combo_si") {
                    $("#divAfichePregunta3a").show();
                    $("#marca_combo").prop('disabled', false);
                    $("#divAfichePregunta3b").show();
                    $("#combox1_si").prop('disabled', false);
                    $("#combox1_no").prop('disabled', false);
                } else if (valor == "afiche_combo_no") {
                    $("#divAfichePregunta3a").hide();
                    $("#marca_combo").prop('disabled', true);
                    $("#divAfichePregunta3b").hide();
                    $("#combox1_si").prop('disabled', true);
                    $("#combox1_no").prop('disabled', true);
                    $("#divAfichePregunta3c").hide();
                    $("#combox2_si").prop('disabled', true);
                    $("#combox2_no").prop('disabled', true);
                    $("#divAfichePregunta3d").hide();
                    $("#combox3_si").prop('disabled', true);
                    $("#combox3_no").prop('disabled', true);
                    $("#divAfiche_Img").show();

                    $("#seleccionAfiche").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "combox1_si") {
                    $("#divAfichePregunta3c").show();
                    $("#combox2_si").prop('disabled', false);
                    $("#combox2_no").prop('disabled', false);
                } else if (valor == "combox1_no") {
                    $("#divAfichePregunta3c").show();
                    $("#combox2_si").prop('disabled', false);
                    $("#combox2_no").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "combox2_si") {
                    $("#divAfichePregunta3d").show();
                    $("#combox3_si").prop('disabled', false);
                    $("#combox3_no").prop('disabled', false);
                } else if (valor == "combox2_no") {
                    $("#divAfichePregunta3d").show();
                    $("#combox3_si").prop('disabled', false);
                    $("#combox3_no").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "combox3_si") {
                    $("#divAfiche_Img").show();
                    $("#seleccionAfiche").prop('disabled', false);
                } else if (valor == "combox3_no") {
                    $("#divAfiche_Img").show();
                    $("#seleccionAfiche").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        function cierreAfiche() {
            var inputAfiche = document.getElementById('mtafiche');
            $('#botonAfiche').removeClass("btnMat");
            $('#botonAfiche').addClass("btnProcess");
            botonAfiche.innerHTML = "El material AFICHE ya se registro";
            inputAfiche.value = "afiche ok";
        }
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
        function seeMarco() {
            $("#marco_si").prop('disabled', false);
            $("#marco_no").prop('disabled', false);
        }
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var inputMarco = document.getElementById('mtmarco');
                var valor = $(event.target).val();
                if (valor == "marco_si") {
                    $('#divMarcoPregunta1').show();
                    $("#marco_visi_si").prop('disabled', false);
                    $("#marco_visi_no").prop('disabled', false);
                } else if (valor == "marco_no") {
                    $("#marco_visi_si").prop('disabled', true);
                    $("#marco_visi_no").prop('checked', true)
                    $("#marco_colo_si").prop('disabled', true);
                    $("#marco_colo_no").prop('checked', true)
                    $("#seleccionMarco").prop('disabled', true);
                    $("#seleccionMarco2").prop('disabled', false);
                    $('#botonMarco').removeClass("btnMat");
                    $('#botonMarco').addClass("btnProcess");
                    botonMarco.innerHTML = "El material MARCO ya se registro";

                    inputMarco.value = "marco ok";
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "marco_visi_si") {
                    $("#divMarcoPregunta2").show();
                    $("#marco_colo_si").prop('disabled', false);
                    $("#marco_colo_no").prop('disabled', false);
                } else if (valor == "marco_visi_no") {
                    $("#divMarcoPregunta2").show();
                    $("#marco_colo_si").prop('disabled', false);
                    $("#marco_colo_no").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "marco_colo_si") {
                    $("#divMarco_Img").show();
                    $("#seleccionMarco").prop('disabled', false);
                } else if (valor == "marco_colo_no") {
                    $("#divMarco_Img").show();
                    $("#seleccionMarco").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        function cierreMarco() {
            var inputMarco = document.getElementById('mtmarco');
            $('#botonMarco').removeClass("btnMat");
            $('#botonMarco').addClass("btnProcess");
            botonMarco.innerHTML = "El material MARCO ya se registro";
            inputMarco.value = "marco ok";
        }
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
        function seeRompetrafico() {
            $("#rompetraficos_si").prop('disabled', false);
            $("#rompetraficos_no").prop('disabled', false);
        }
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var inputRompetrafico = document.getElementById('mtrompetrafico');
                var valor = $(event.target).val();
                if (valor == "rompetraficos_si") {
                    $('#divRompetraficoPregunta1').show();
                    $("#prod_rt_visibles_si").prop('disabled', false);
                    $("#prod_rt_visibles_no").prop('disabled', false);
                } else if (valor == "rompetraficos_no") {
                    $("#prod_rt_visibles_si").prop('disabled', true);
                    $("#prod_rt_visibles_no").prop('checked', true)
                    $("#prod_rt_properly_si").prop('disabled', true);
                    $("#prod_rt_properly_no").prop('checked', true)
                    $("#seleccionRompetrafico").prop('disabled', true);
                    $("#seleccionRompetrafico2").prop('disabled', false);
                    $('#botonRompetrafico').removeClass("btnMat");
                    $('#botonRompetrafico').addClass("btnProcess");
                    botonRompetrafico.innerHTML = "El material ROMPETRAFICO ya se registro";
                    inputRompetrafico.value = "rompetrafico ok";
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "prod_rt_visibles_si") {
                    $("#divRompetraficoPregunta2").show();
                    $("#prod_rt_properly_si").prop('disabled', false);
                    $("#prod_rt_properly_no").prop('disabled', false);
                } else if (valor == "prod_rt_visibles_no") {
                    $("#divRompetraficoPregunta2").show();
                    $("#prod_rt_properly_si").prop('disabled', false);
                    $("#prod_rt_properly_no").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "prod_rt_properly_si") {
                    $("#divRompetrafico_Img").show();
                    $("#seleccionRompetrafico").prop('disabled', false);
                } else if (valor == "prod_rt_properly_no") {
                    $("#divRompetrafico_Img").show();
                    $("#seleccionRompetrafico").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        function cierreRompetrafico() {
            var inputRompetrafico = document.getElementById('mtrompetrafico');
            $('#botonRompetrafico').removeClass("btnMat");
            $('#botonRompetrafico').addClass("btnProcess");
            botonRompetrafico.innerHTML = "El material ROMPETRAFICO ya se registro";
            inputRompetrafico.value = "rompetrafico ok";
        }
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
        function seeFachada() {
            $("#fachadas_si").prop('disabled', false);
            $("#fachadas_no").prop('disabled', false);
        }
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var inputFachada = document.getElementById('mtfachada');
                var valor = $(event.target).val();
                if (valor == "fachadas_si") {
                    $('#divFachadaPregunta1').show();
                    $("#fachadas_visi_si").prop('disabled', false);
                    $("#fachadas_visi_no").prop('disabled', false);
                } else if (valor == "fachadas_no") {
                    $("#fachadas_visi_si").prop('disabled', true);
                    $("#fachadas_visi_no").prop('checked', true)
                    $("#fachadas_colo_si").prop('disabled', true);
                    $("#fachadas_colo_no").prop('checked', true)
                    $("#seleccionFaxada").prop('disabled', true);
                    $("#seleccionFaxada2").prop('disabled', false);
                    $('#botonFachada').removeClass("btnMat");
                    $('#botonFachada').addClass("btnProcess");
                    botonFachada.innerHTML = "El material FACHADAS ya se registro";
                    inputFachada.value = "fachada ok";
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "fachadas_visi_si") {
                    $("#divFachadaPregunta2").show();
                    $("#fachadas_colo_si").prop('disabled', false);
                    $("#fachadas_colo_no").prop('disabled', false);
                } else if (valor == "fachadas_visi_no") {
                    $("#divFachadaPregunta2").show();
                    $("#fachadas_colo_si").prop('disabled', false);
                    $("#fachadas_colo_no").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "fachadas_colo_si") {
                    $("#divFachada_Img").show();
                    $("#seleccionFaxada").prop('disabled', false);
                } else if (valor == "fachadas_colo_no") {
                    $("#divFachada_Img").show();
                    $("#seleccionFaxada").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        function cierreFachada() {
            var inputFachada = document.getElementById('mtfachada');
            $('#botonFachada').removeClass("btnMat");
            $('#botonFachada').addClass("btnProcess");
            botonFachada.innerHTML = "El material FACHADAS ya se registro";
            inputFachada.value = "fachada ok";
        }
    </script>
    <script>
        const $seleccionFachada = document.querySelector("#seleccionFaxada"),
            $imagenFachada = document.querySelector("#imagenFachada");
        $seleccionFachada.addEventListener("change", () => {
            const archivos = $seleccionFachada.files;
            if (!archivos || !archivos.length) {
                $imagenFachada.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenFachada.src = objectURL;
        });
    </script>
    <script>
        function seeHielera() {
            $("#hielera_si").prop('disabled', false);
            $("#hielera_no").prop('disabled', false);
        }
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var inputHielera = document.getElementById('mthielera');
                var valor = $(event.target).val();
                if (valor == "hielera_si") {
                    $('#divHieleraPregunta1').show();
                    $("#prod_hl_visible_si").prop('disabled', false);
                    $("#prod_hl_visible_no").prop('disabled', false);
                } else if (valor == "hielera_no") {
                    $("#prod_hl_visible_si").prop('disabled', true);
                    $("#prod_hl_visible_no").prop('checked', true);
                    $("#prod_hl_danadas_si").prop('disabled', true);
                    $("#prod_hl_danadas_no").prop('checked', true);
                    $("#hl_con_prod_si").prop('disabled', true);
                    $("#hl_con_prod_no").prop('checked', true);
                    $("#seleccionHielera").prop('disabled', true);
                    $("#seleccionHielera2").prop('disabled', false);
                    $('#botonHielera').removeClass("btnMat");
                    $('#botonHielera').addClass("btnProcess");
                    botonHielera.innerHTML = "El material HIELERA ya se registro";
                    inputHielera.value = "hielera ok";
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "prod_hl_visible_si") {
                    $("#divHieleraPregunta2").show();
                    $("#prod_hl_danadas_si").prop('disabled', false);
                    $("#prod_hl_danadas_no").prop('disabled', false);
                } else if (valor == "prod_hl_visible_no") {
                    $("#divHieleraPregunta2").show();
                    $("#prod_hl_danadas_si").prop('disabled', false);
                    $("#prod_hl_danadas_no").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "prod_hl_danadas_si") {
                    $("#divHieleraPregunta3").show();
                    $("#hl_con_prod_si").prop('disabled', false);
                    $("#hl_con_prod_no").prop('disabled', false);
                } else if (valor == "prod_hl_danadas_no") {
                    $("#divHieleraPregunta3").show();
                    $("#hl_con_prod_si").prop('disabled', false);
                    $("#hl_con_prod_no").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "hl_con_prod_si") {
                    $("#divHielera_Img").show();
                    $("#seleccionHielera").prop('disabled', false);
                } else if (valor == "hl_con_prod_no") {
                    $("#divHielera_Img").show();
                    $("#seleccionHielera").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        function cierreHielera() {
            var inputHielera = document.getElementById('mthielera');
            $('#botonHielera').removeClass("btnMat");
            $('#botonHielera').addClass("btnProcess");
            botonHielera.innerHTML = "El material HIELERA ya se registro";
            inputHielera.value = "hielera ok";
        }
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
        function seeBasesHielera() {
            $("#bases_h_si").prop('disabled', false);
            $("#bases_h_no").prop('disabled', false);
        }
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var inputBHielera = document.getElementById('mtBhielera');
                var valor = $(event.target).val();
                if (valor == "bases_h_si") {
                    $('#diBHieleraPregunta1').show();
                    $("#prod_baseshl_visible_si").prop('disabled', false);
                    $("#prod_baseshl_visible_no").prop('disabled', false);
                } else if (valor == "bases_h_no") {
                    $("#prod_baseshl_visible_si").prop('disabled', true);
                    $("#prod_baseshl_visible_no").prop('checked', true);
                    $("#prod_baseshl_danadas_si").prop('disabled', true);
                    $("#prod_baseshl_danadas_no").prop('checked', true);
                    $("#baseshl_con_prod_si").prop('disabled', true);
                    $("#baseshl_con_prod_no").prop('checked', true);
                    $("#seleccionBase_h").prop('disabled', true);
                    $("#seleccionBase_h2").prop('disabled', false);
                    $('#botonBasesHielera').removeClass("btnMat");
                    $('#botonBasesHielera').addClass("btnProcess");
                    botonBasesHielera.innerHTML = "El material BASES HIELERA ya se registro";
                    inputBHielera.value = "bases de hielera ok";
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "prod_baseshl_visible_si") {
                    $("#divBHieleraPregunta2").show();
                    $("#prod_baseshl_danadas_si").prop('disabled', false);
                    $("#prod_baseshl_danadas_no").prop('disabled', false);
                } else if (valor == "prod_baseshl_visible_no") {
                    $("#divBHieleraPregunta2").show();
                    $("#prod_baseshl_danadas_si").prop('disabled', false);
                    $("#prod_baseshl_danadas_no").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "prod_baseshl_danadas_si") {
                    $("#divBHieleraPregunta3").show();
                    $("#baseshl_con_prod_si").prop('disabled', false);
                    $("#baseshl_con_prod_no").prop('disabled', false);
                } else if (valor == "prod_baseshl_danadas_no") {
                    $("#divBHieleraPregunta3").show();
                    $("#baseshl_con_prod_si").prop('disabled', false);
                    $("#baseshl_con_prod_no").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "baseshl_con_prod_si") {
                    $("#divBHielera_Img").show();
                    $("#seleccionBase_h").prop('disabled', false);
                } else if (valor == "baseshl_con_prod_no") {
                    $("#divBHielera_Img").show();
                    $("#seleccionBase_h").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        function cierreBasesHielera() {
            var inputBHielera = document.getElementById('mtBhielera');
            $('#botonBasesHielera').removeClass("btnMat");
            $('#botonBasesHielera').addClass("btnProcess");
            botonBasesHielera.innerHTML = "El material BASES HIELERA ya se registro";
            inputBHielera.value = "bases de hielera ok";
        }
    </script>
    <script>
        const $seleccionBHielera = document.querySelector("#seleccionBase_h"),
            $imagenBHielera = document.querySelector("#imagenBase_h");
        $seleccionBHielera.addEventListener("change", () => {
            const archivos = $seleccionBHielera.files;
            if (!archivos || !archivos.length) {
                $imagenBHielera.src = "";
                return;
            }
            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenBHielera.src = objectURL;
        });
    </script>

    <script>
        function seeDosificadorD() {
            $("#dosificadorD_si").prop('disabled', false);
            $("#dosificadorD_no").prop('disabled', false);
        }
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var inputDosificadorD = document.getElementById('mtDosificadorD');
                var valor = $(event.target).val();
                if (valor == "dosificadorD_si") {
                    $('#divDosificadorDPregunta1').show();
                    $("#prod_dsD_visibles_si").prop('disabled', false);
                    $("#prod_dsD_visibles_no").prop('disabled', false);
                } else if (valor == "dosificadorD_no") {
                    $("#prod_dsD_visibles_si").prop('disabled', true);
                    $("#prod_dsD_visibles_no").prop('checked', true);
                    $("#prod_dsD_diferentes_si").prop('disabled', true);
                    $("#prod_dsD_diferentes_no").prop('checked', true);
                    $("#prod_dsD_danados_si").prop('disabled', true);
                    $("#prod_dsD_danados_no").prop('checked', true);
                    $("#seleccionDosificadorD").prop('disabled', true);
                    $("#seleccionDosificadorD2").prop('disabled', false);
                    $('#botonDosificadorD').removeClass("btnMat");
                    $('#botonDosificadorD').addClass("btnProcess");
                    botonDosificadorD.innerHTML = "El material DOSIFICADOR DOBLE ya se registro";
                    inputDosificadorD.value = "dosificador doble ok";
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "prod_dsD_visibles_si") {
                    $("#divDosificadorDPregunta2").show();
                    $("#prod_dsD_diferentes_si").prop('disabled', false);
                    $("#prod_dsD_diferentes_no").prop('disabled', false);
                } else if (valor == "prod_dsD_visibles_no") {
                    $("#divDosificadorDPregunta2").show();
                    $("#prod_dsD_diferentes_si").prop('disabled', false);
                    $("#prod_dsD_diferentes_no").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "prod_dsD_diferentes_si") {
                    $("#divDosificadorDPregunta3").show();
                    $("#prod_dsD_danados_si").prop('disabled', false);
                    $("#prod_dsD_danados_no").prop('disabled', false);
                } else if (valor == "prod_dsD_diferentes_no") {
                    $("#divDosificadorDPregunta3").show();
                    $("#prod_dsD_danados_si").prop('disabled', false);
                    $("#prod_dsD_danados_no").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "prod_dsD_danados_si") {
                    $("#divDosificadorD_Img").show();
                    $("#seleccionDosificadorD").prop('disabled', false);
                } else if (valor == "prod_dsD_danados_no") {
                    $("#divDosificadorD_Img").show();
                    $("#seleccionDosificadorD").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        function cierreDosificadorD() {
            var inputDosificadorD = document.getElementById('mtDosificadorD');
            $('#botonDosificadorD').removeClass("btnMat");
            $('#botonDosificadorD').addClass("btnProcess");
            botonDosificadorD.innerHTML = "El material DOSIFICADOR DOBLE ya se registro";
            inputDosificadorD.value = "dosificador doble ok";
        }
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
        function seeDosificadorS() {
            $("#dosificadorS_si").prop('disabled', false);
            $("#dosificadorS_no").prop('disabled', false);
        }
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var inputDosificadorS = document.getElementById('mtDosificadorS');
                var valor = $(event.target).val();
                if (valor == "dosificadorS_si") {
                    $('#divDosificadorSPregunta1').show();
                    $("#prod_dsS_visibles_si").prop('disabled', false);
                    $("#prod_dsS_visibles_no").prop('disabled', false);
                } else if (valor == "dosificadorS_no") {
                    $("#prod_dsS_visibles_si").prop('disabled', true);
                    $("#prod_dsS_visibles_no").prop('checked', true);
                    $("#prod_dsS_diferentes_si").prop('disabled', true);
                    $("#prod_dsS_diferentes_no").prop('checked', true);
                    $("#prod_dsS_danados_si").prop('disabled', true);
                    $("#prod_dsS_danados_no").prop('checked', true);
                    $("#seleccionDosificadorS").prop('disabled', true);
                    $("#seleccionDosificadorS2").prop('disabled', false);
                    $('#botonDosificadorS').removeClass("btnMat");
                    $('#botonDosificadorS').addClass("btnProcess");
                    botonDosificadorS.innerHTML = "El material DOSIFICADOR SENCILLO ya se registro";
                    inputDosificadorS.value = "dosificador sencillo ok";
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "prod_dsS_visibles_si") {
                    $("#divDosificadorSPregunta2").show();
                    $("#prod_dsS_diferentes_si").prop('disabled', false);
                    $("#prod_dsS_diferentes_no").prop('disabled', false);
                } else if (valor == "prod_dsS_visibles_no") {
                    $("#divDosificadorSPregunta2").show();
                    $("#prod_dsS_diferentes_si").prop('disabled', false);
                    $("#prod_dsS_diferentes_no").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "prod_dsS_diferentes_si") {
                    $("#divDosificadorSPregunta3").show();
                    $("#prod_dsS_danados_si").prop('disabled', false);
                    $("#prod_dsS_danados_no").prop('disabled', false);
                } else if (valor == "prod_dsS_diferentes_no") {
                    $("#divDosificadorSPregunta3").show();
                    $("#prod_dsS_danados_si").prop('disabled', false);
                    $("#prod_dsS_danados_no").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "prod_dsS_danados_si") {
                    $("#divDosificadorS_Img").show();
                    $("#seleccionDosificadorS").prop('disabled', false);
                } else if (valor == "prod_dsS_danados_no") {
                    $("#divDosificadorS_Img").show();
                    $("#seleccionDosificadorS").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        function cierreDosificadorS() {
            var inputDosificadorS = document.getElementById('mtDosificadorS');
            $('#botonDosificadorS').removeClass("btnMat");
            $('#botonDosificadorS').addClass("btnProcess");
            botonDosificadorS.innerHTML = "El material DOSIFICADOR SENCILLO ya se registro";
            inputDosificadorS.value = "dosificadores sencillo ok";
        }
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
        function seeBranding() {
            $("#branding_si").prop('disabled', false);
            $("#branding_no").prop('disabled', false);
        }
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var inputBranding = document.getElementById('mtBranding');
                var valor = $(event.target).val();
                if (valor == "branding_si") {
                    $('#divBrandingPregunta1').show();
                    $("#branding_visible_si").prop('disabled', false);
                    $("#branding_visible_no").prop('disabled', false);
                } else if (valor == "branding_no") {
                    $("#branding_visible_si").prop('disabled', true);
                    $("#branding_visible_no").prop('checked', true);
                    $("#branding_danados_si").prop('disabled', true);
                    $("#branding_danados_no").prop('checked', true);
                    $("#seleccionBranding").prop('disabled', true);
                    $("#seleccionBranding2").prop('disabled', false);
                    $('#botonBranding').removeClass("btnMat");
                    $('#botonBranding').addClass("btnProcess");
                    botonBranding.innerHTML = "El material BRADING DE MESAS ya se registro";
                    inputBranding.value = "branding de mesa ok";
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "branding_visible_si") {
                    $("#divBrandingPregunta2").show();
                    $("#branding_danados_si").prop('disabled', false);
                    $("#branding_danados_no").prop('disabled', false);
                } else if (valor == "branding_visible_no") {
                    $("#divBrandingPregunta2").show();
                    $("#branding_danados_si").prop('disabled', false);
                    $("#branding_danados_no").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("input[type=radio]").click(function(event) {
                var valor = $(event.target).val();
                if (valor == "branding_danados_si") {
                    $("#divBranding_Img").show();
                    $("#seleccionBranding").prop('disabled', false);
                } else if (valor == "branding_danados_no") {
                    $("#divBranding_Img").show();
                    $("#seleccionBranding").prop('disabled', false);
                }
            });
        });
    </script>
    <script>
        function cierreBranding() {
            var inputBranding = document.getElementById('mtBranding');
            $('#botonBranding').removeClass("btnMat");
            $('#botonBranding').addClass("btnProcess");
            botonBranding.innerHTML = "El material BRANDING DE MESAS ya se registro";
            inputBranding.value = "branding de mesas ok";
        }
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
    function seeVasos() {
        $("#vasos_si").prop('disabled', false);
        $("#vasos_no").prop('disabled', false);
    }
</script>
<script>
    $(document).ready(function() {
        $("input[type=radio]").click(function(event) {
            var inputVasos = document.getElementById('mtVasos');
            var valor = $(event.target).val();
            if (valor == "vasos_si") {
                $('#divVasosPregunta1').show();
                $("#vasos_visibles_si").prop('disabled', false);
                $("#vasos_visibles_no").prop('disabled', false);
            } else if (valor == "vasos_no") {
                $("#vasos_visibles_si").prop('disabled', true);
                $("#vasos_visibles_no").prop('checked', true);
                $("#vasos_quebrados_si").prop('disabled', true);
                $("#vasos_quebrados_no").prop('checked', true);
                $("#seleccionVasos").prop('disabled', true);
                $("#seleccionVasos2").prop('disabled', false);
                $('#botonVasos').removeClass("btnMat");
                $('#botonVasos').addClass("btnProcess");
                botonVasos.innerHTML = "El material VASOS Y COPAS ya se registro";
                inputVasos.value = "vasos y copas ok";
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("input[type=radio]").click(function(event) {
            var valor = $(event.target).val();
            if (valor == "vasos_visibles_si") {
                $("#divVasosPregunta2").show();
                $("#vasos_quebrados_si").prop('disabled', false);
                $("#vasos_quebrados_no").prop('disabled', false);
            } else if (valor == "vasos_visibles_no") {
                $("#divVasosPregunta2").show();
                $("#vasos_quebrados_si").prop('disabled', false);
                $("#vasos_quebrados_no").prop('disabled', false);
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("input[type=radio]").click(function(event) {
            var valor = $(event.target).val();
            if (valor == "vasos_quebrados_si") {
                $("#divVasos_Img").show();
                $("#seleccionVasos").prop('disabled', false);
            } else if (valor == "vasos_quebrados_no") {
                $("#divVasos_Img").show();
                $("#seleccionVasos").prop('disabled', false);
            }
        });
    });
</script>
<script>
    function cierreVasos() {
        var inputVasos = document.getElementById('mtVasos');
        $('#botonVasos').removeClass("btnMat");
        $('#botonVasos').addClass("btnProcess");
        botonVasos.innerHTML = "El material VASOS Y COPAS ya se registro";
        inputVasos.value = "vasos y copas ok";
    }
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
