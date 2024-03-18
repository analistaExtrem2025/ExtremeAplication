<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GESTION PQR</title>
    <style>
        h4 {
            text-align: center;
            font-weight: bold;
            font-size: 22px;

        }

        span {
            text-align: left;
            font-weight: bold;
            font-size: 18px;

        }

        .dataPqr {
            width: 100%;
            border-radius: 0.75rem;

        }

        .evidencia {

            border: 2px solid rgb(186, 178, 255);
            border-radius: 0.75rem;
        }
    </style>
    @php
        use App\Models\Pqr;

        $area = auth()->user()->area;
        $usuario = auth()->user()->user;

        if (Auth::user()->role == 1 || Auth::user()->role == 2)
          $pqr = Pqr::where('area', $area)
          ->where('estatusRespuesta',  'Caso creado')->get();
        elseif (Auth::user()->role == 3 )
          $pqr = Pqr::where('area', $usuario)
          ->where('estatusRespuesta',  'Punto devuelto')->get();
        elseif (Auth::user()->role == 4 )
          $pqr = Pqr::where('area', $usuario)
          ->where('estatusRespuesta',  'En tramite')->get();
        $rta = Pqr::where('estatusRespuesta', 'Caso cerrado')
            ->where('creado_por', Auth::user()->name)
            ->get();
    @endphp
</head>

<body>

    <h3>Casos creados abiertos o en tramite</h3>
    <div class="container">
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Area</th>
                    <th>Fecha de creación</th>
                    <th>Titulo</th>
                    <th>Estatus del caso</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pqr as $it)
                    <tr>
                        <td>{{ $it->id }}</td>
                        <td>{{ $it->area }}</td>
                        <td>{{ $it->created_at }}</td>
                        <td>{{ $it->tituloReq }}</td>
                        <td>{{ $it->estatusRespuesta }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="BasicExample" title="Responder">
                                <a href="{{ url('notificacionEdit/' . $it->id) }}" class="btnIndexInicio"><i
                                        class="far fa-play-circle"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <h3>Casos gestionados y respuestas</h3>
    <div class="container">
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Area</th>
                    <th>Fecha de creación</th>
                    <th>Titulo</th>
                    <th>Estatus del caso</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rta as $rt)
                    <tr>
                        <td>{{ $rt->id }}</td>
                        <td>{{ $rt->area }}</td>
                        <td>{{ $rt->created_at }}</td>
                        <td>{{ $rt->tituloReq }}</td>
                        <td>{{ $rt->estatusRespuesta }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="BasicExample" title="Responder">
                                <a href="{{ url('notificacionShow/' . $rt->id) }}" class="btnIndexInicio"><i
                                        class="far fa-play-circle"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
