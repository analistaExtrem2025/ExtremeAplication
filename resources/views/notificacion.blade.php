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
        $pqr = Pqr::where('area', Auth::user()->area)
        ->whereNot('estatusRespuesta', 'Caso cerrado')
        ->get();


    @endphp
</head>
<body>
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
                    <td>{{ $it->id  }}</td>
                    <td>{{ $it->area }}</td>
                    <td>{{ $it->created_at  }}</td>
                    <td>{{ $it->tituloReq  }}</td>
                    <td>{{ $it->estatusRespuesta }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="BasicExample" title="Responder">
                            <a href="{{ url('notificacionEdit/' . $it->id ) }}" class="btnIndexInicio"><i
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
