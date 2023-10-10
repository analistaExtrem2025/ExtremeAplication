<!DOCTYPE html>
<html>
<head>
    <title>Laravel 10 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
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
                                    {{--  <p class="card-text">{{ $reporte->activacion }}</p>  --}}
                                </div>
                                <div class="col-6 col-sm-4"><label for="">Razon social</label>
                                    {{--  <p class="card-text">{{ $reporte->razonSocial }}</p>  --}}
                                </div>
                                <div class="col-6 col-sm-4"><label for="">Nit o Cedula</label>
                                    {{--  <p class="card-text">{{ $reporte->nit }}</p>  --}}
                                </div>
                                <div class="col-6 col-sm-4"><label for="">Direcci&oacute;n</label>
                                    {{--  <p class="card-text">{{ $reporte->direccion }}</p>  --}}
                                </div>
                                <div class="col-6 col-sm-4"><label for="">Latitud y Longitud</label>
                                    {{--  <p class="card-text">{{ $reporte->latitude }} {{ $reporte->longitude }}</p>  --}}
                                </div>
                                <div class="col-6 col-sm-4"><label for="">Telefono</label>
                                    {{--  <p class="card-text">{{ $reporte->telefono }}</p>  --}}
                                </div>
                                {{--  <div class="col-6 col-sm-4"> <label for="">Municipio</label>  --}}
                                    {{--  <p class="card-text">{{ $reporte->municipio }}</p>  --}}
                                </div>
                                {{--  <div class="col-6 col-sm-4"> <label for="">Barrio</label>  --}}
                                    {{--  <p class="card-text">{{ $reporte->barrio }}</p>  --}}
                                </div>
                                <!-- Force next columns to break to new line at md breakpoint and up -->
                                <div class="w-100 d-none d-md-block"></div>

                                <div class="col-6 col-sm-4">
                                    {{--  @if ($reporte->activacion != 'activo')
                                        <label for="">Causales de no concreci&oacute;n</label>
                                        {{--  <p class="card-text">{{ $reporte->noConcreciones }}</p>  --}}
                                        {{--  @if ($reporte->noConcreciones == 'Otro')
                                            <label for="">Otra causa</label>
                                            {{--  <p class="card-text">{{ $reporte->otro }}</p>  --}}
                                        {{--@endif  --}}
                                        <label for="">Observaciones</label>
                                        {{--  <p>{{ $reporte->observaciones }}</p>  --}}
                                    {{--@endif  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </ul>
</body>
</html>
