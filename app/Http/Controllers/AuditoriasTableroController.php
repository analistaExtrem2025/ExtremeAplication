<?php

namespace App\Http\Controllers;

use App\Models\Asignaciones;
use App\Models\Auditoria;
use App\Models\AuditoriasTablero;
use App\Models\PuntosAuditoria;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Format;

use function Laravel\Prompts\select;
use function PHPUnit\Framework\isEmpty;

class AuditoriasTableroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hoy = Carbon::now()->format('d-m-Y');
        $hora = Carbon::now()->format('g:i A');
        $today = Carbon::now()->format('d-m-Y');
        $puntos = PuntosAuditoria::all();
        $totalPuntos = $puntos->count();
        $auditoria = Auditoria::all();
        $asignaciones = Asignaciones::all();
        $totalAuditorias = $auditoria->count();
        $pendientes = $totalPuntos - $totalAuditorias;
        $cumpliVisitas =  $totalAuditorias / $totalPuntos * 100;
        $auditoriaCount = Auditoria::select('tipologia')->whereNotNUll('tipologia')->count();
        $usuarios = User::where('role', 3)->orderBy('municipio')->get();
        $user = User::where('role', 3)->get()->toJson();


        $activos = Auditoria::where('activacion', 'activo')->get()->count();
        $activosBta = Auditoria::where('activacion', 'activo')
            ->where('municipio', 'BOGOTA')
            ->get()
            ->count();
        $inactivosBta = Auditoria::where('activacion', 'inactivo')
            ->where('municipio', 'BOGOTA')
            ->get()
            ->count();

        $activosMed = Auditoria::where('activacion', 'activo')
            ->where('municipio', 'MEDELLIN')
            ->get()
            ->count();
        $inactivosMed = Auditoria::where('activacion', 'inactivo')
            ->where('municipio', 'MEDELLIN')
            ->get()
            ->count();

        $activosBar = Auditoria::where('activacion', 'activo')
            ->where('municipio', 'BARRANQUILLA')
            ->get()
            ->count();
        $inactivosBar = Auditoria::where('activacion', 'inactivo')
            ->where('municipio', 'BARRANQUILLA')
            ->get()
            ->count();

        $activosBuc = Auditoria::where('activacion', 'activo')
            ->where('municipio', 'BUCARAMANGA')
            ->get()
            ->count();
        $inactivosBuc = Auditoria::where('activacion', 'inactivo')
            ->where('municipio', 'BUCARAMANGA')
            ->get()
            ->count();

        $activosCal = Auditoria::where('activacion', 'activo')
            ->where('municipio', 'CALI')
            ->get()
            ->count();
        $inactivosCal = Auditoria::where('activacion', 'inactivo')
            ->where('municipio', 'CALI')
            ->get()
            ->count();

        $sumActivos =  $activosBta + $activosMed + $activosBar + $activosBuc + $activosCal;
        $sumInactivos =  $inactivosBta + $inactivosMed + $inactivosBar + $inactivosBuc + $inactivosCal;


        $usuarioBta = DB::table('users')->select(['municipio'])
            ->where('role', 3)
            ->where('municipio', 'BOGOTA')
            ->get();
        $usuarioBtaCount = $usuarioBta->count();

        $usuarioMed = DB::table('users')->select(['municipio'])
            ->where('role', 3)
            ->where('municipio', 'MEDELLIN')
            ->get();
        $usuarioMedCount = $usuarioMed->count();

        $usuarioBar = DB::table('users')->select(['municipio'])
            ->where('role', 3)
            ->where('municipio', 'BARRANQUILLA')
            ->get();
        $usuarioBarCount = $usuarioBar->count();

        $usuarioBuc = DB::table('users')->select(['municipio'])
            ->where('role', 3)
            ->where('municipio', 'BUCARAMANGA')
            ->get();
        $usuarioBucCount = $usuarioBuc->count();

        $usuarioCal = DB::table('users')->select(['municipio'])
            ->where('role', 3)
            ->where('municipio', 'CALI')
            ->get();
        $usuarioCalCount = $usuarioCal->count();

        $totalUsuarios = ($usuarioBtaCount + $usuarioMedCount + $usuarioBarCount + $usuarioBucCount + $usuarioCalCount);

        $inactivos = Auditoria::where('activacion', 'inactivo')->get()->count();
        $tipoJuegos = Auditoria::where('tipologia', 'Juegos tipicos')->get()->count();
        $tipoJuegosPercent = $tipoJuegos * 100 / $auditoriaCount;
        $tipoJuegosPercent = sprintf("%01.0f", $tipoJuegosPercent);

        $tipoTienda = Auditoria::where('tipologia', 'Tienda de consumo')->get()->count();
        $tipoTiendaPercent = $tipoTienda * 100 / $auditoriaCount;
        $tipoTiendaPercent = sprintf("%01.0f", $tipoTiendaPercent);

        $tipoBar = Auditoria::where('tipologia', 'Bar estandar')->get()->count();
        $tipoBarPercent = $tipoBar * 100 / $auditoriaCount;
        $tipoBarPercent = sprintf("%01.0f", $tipoBarPercent);

        $tipoLico = Auditoria::where('tipologia', 'Licobares')->get()->count();
        $tipoLicoPercent = $tipoLico * 100 / $auditoriaCount;
        $tipoLicoPercent = sprintf("%01.0f", $tipoLicoPercent);

        $tipoOtro = Auditoria::where('tipologia', 'Otro')->get()->count();
        $tipoOtroPercent = $tipoOtro * 100 / $auditoriaCount;
        $tipoOtroPercent = sprintf("%01.0f", $tipoOtroPercent);

        $oro = Auditoria::where('segmento', 'like', '%gold%')->get()->count();
        $plata = Auditoria::where('segmento', 'like', '%silver%')->get()->count();
        $bronce = Auditoria::where('segmento', 'like', '%bronce%')->get()->count();

        $oroB1 = PuntosAuditoria::where('segmentacion', 'gold')->get()->count();
        $plataB1 = PuntosAuditoria::where('segmentacion', 'silver')->get()->count();
        $bronceB1 = PuntosAuditoria::where('segmentacion', 'bronce')->get()->count();

        $cumpliGold = $oro / $oroB1 * 100;
        $cumpliGold = sprintf("%01.2f", $cumpliGold) . "%";

        $cumpliSilver = $plata / $plataB1 * 100;
        $cumpliSilver = sprintf("%01.2f", $cumpliSilver) . "%";

        $cumpliBronce = $bronce / $bronceB1 * 100;
        $cumpliBronce = sprintf("%01.2f", $cumpliBronce) . "%";

        $cumpliTotal = $totalAuditorias / $totalPuntos * 100;
        $cumpliTotal = sprintf("%01.2f", $cumpliTotal) . "%";

        $asignados = $asignaciones->where('direccion', '<>', NULL)->count();
        //dd($asignados);

        $diligenciados = $puntos->where('estatusGestion', 'Diligenciado')->count();
        $noConcretados = $puntos->where('estatusGestion', 'gestionado - no concretado')->count();
        $disponibles = $puntos->where('estatusGestion', '=',  NULL)
            ->count();
        $enTramite = PuntosAuditoria::where('estatusGestion', 'paso 1 - activacion')
            ->orWhere('estatusGestion', '=', 'paso 2 - tipologia')
            ->orWhere('estatusGestion', '=', 'paso 3 - segmento')
            ->orWhere('estatusGestion', '=', 'paso 4 - materiales')
            ->orWhere('estatusGestion', '=', 'paso 5 - disponibilidad')
            ->orWhere('estatusGestion', '=', 'paso 6 - comparativo')
            ->orWhere('estatusGestion', '=', 'paso 7 - Exhibicion')
            ->orWhere('estatusGestion', '=', 'paso 8 - gift')
            ->count();

        $asignadosG = $puntos->where('segmentacion', 'gold')->where('estatusGestion', 'Asignado')->count();
        $diligenciadosG = $puntos->where('segmentacion', 'gold')->where('estatusGestion', 'Diligenciado')->count();
        $noConcretadosG = $puntos->where('segmentacion', 'gold')->where('estatusGestion', 'gestionado - no concretado')->count();
        $disponiblesG = $puntos->where('segmentacion', 'gold')->where('estatusGestion', '=',  NULL)
            ->count();
        $enTramiteG = PuntosAuditoria::where('segmentacion', 'gold')
            ->where('estatusGestion', 'like', '%paso %')
            ->count();
        // estatus bta
        $oroBog = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'BOGOTA')->count();
        $plataBog = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'BOGOTA')->count();
        $bronceBog = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'BOGOTA')->count();
        $totalBog = $oroBog + $plataBog + $bronceBog;

        // estatus med
        $oroMed = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'MEDELLIN')->count();
        $plataMed = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'MEDELLIN')->count();
        $bronceMed = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'MEDELLIN')->count();
        $totalMed = $oroMed + $plataMed + $bronceMed;

        // estatus bar
        $oroBar = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'BARRANQUILLA')->count();
        $plataBar = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'BARRANQUILLA')->count();
        $bronceBar = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'BARRANQUILLA')->count();
        $totalBar = $oroBar + $plataBar + $bronceBar;

        // estatus BUCARAMANGA
        $oroBuc = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'BUCARAMANGA')->count();
        $plataBuc = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'BUCARAMANGA')->count();
        $bronceBuc = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'BUCARAMANGA')->count();
        $totalBuc = $oroBuc + $plataBuc + $bronceBuc;



        // estatus CALI
        $oroCal = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'CALI')->count();
        $plataCal = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'CALI')->count();
        $bronceCal = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'CALI')->count();
        $totalCal = $oroCal + $plataCal + $bronceCal;

        $asignadosBtaG = $puntos->where('segmentacion', 'gold')->where('municipio', 'BOGOTA')->where('estatusGestion', 'Asignado')->count();
        $diligenciadosBtaG = $puntos->where('segmentacion', 'gold')->where('municipio', 'BOGOTA')->where('estatusGestion', 'Diligenciado')->count();
        $noConcretadosBtaG = $puntos->where('segmentacion', 'gold')->where('municipio', 'BOGOTA')->where('estatusGestion', 'gestionado - no concretado')->count();
        $disponiblesBtaG = $puntos->where('segmentacion', 'gold')->where('municipio', 'BOGOTA')->where('estatusGestion', '=',  NULL)
            ->count();
        $enTramiteBtaG = PuntosAuditoria::where('segmentacion', 'gold')
            ->where('municipio', 'BOGOTA')
            ->where('estatusGestion', 'like', '%paso %')
            ->count();
        //Status medellin
        $asignadosMedG = $puntos->where('segmentacion', 'gold')->where('municipio', 'MEDELLIN')->where('estatusGestion', 'Asignado')->count();
        $diligenciadosMedG = $puntos->where('segmentacion', 'gold')->where('municipio', 'MEDELLIN')->where('estatusGestion', 'Diligenciado')->count();
        $noConcretadosMedG = $puntos->where('segmentacion', 'gold')->where('municipio', 'MEDELLIN')->where('estatusGestion', 'gestionado - no concretado')->count();
        $disponiblesMedG = $puntos->where('segmentacion', 'gold')->where('municipio', 'MEDELLIN')->where('estatusGestion', '=',  NULL)
            ->count();
        $enTramiteMedG = PuntosAuditoria::where('segmentacion', 'gold')
            ->where('municipio', 'MEDELLIN')
            ->where('estatusGestion', 'like', '%paso %')
            ->count();
        //Status barranquilla

        $asignadosBarG = $puntos->where('segmentacion', 'gold')->where('municipio', 'BARRANQUILLA')->where('estatusGestion', 'Asignado')->count();
        $diligenciadosBarG = $puntos->where('segmentacion', 'gold')->where('municipio', 'BARRANQUILLA')->where('estatusGestion', 'Diligenciado')->count();
        $noConcretadosBarG = $puntos->where('segmentacion', 'gold')->where('municipio', 'BARRANQUILLA')->where('estatusGestion', 'gestionado - no concretado')->count();
        $disponiblesBarG = $puntos->where('segmentacion', 'gold')->where('municipio', 'BARRANQUILLA')->where('estatusGestion', '=',  NULL)
            ->count();
        $enTramiteBarG = PuntosAuditoria::where('segmentacion', 'gold')
            ->where('municipio', 'BARRANQUILLA')
            ->where('estatusGestion', 'like', '%paso %')
            ->count();
        //status bucaramanga

        $asignadosBucG = $puntos->where('segmentacion', 'gold')->where('municipio', 'BUCARAMANGA')->where('estatusGestion', 'Asignado')->count();
        $diligenciadosBucG = $puntos->where('segmentacion', 'gold')->where('municipio', 'BUCARAMANGA')->where('estatusGestion', 'Diligenciado')->count();
        $noConcretadosBucG = $puntos->where('segmentacion', 'gold')->where('municipio', 'BUCARAMANGA')->where('estatusGestion', 'gestionado - no concretado')->count();
        $disponiblesBucG = $puntos->where('segmentacion', 'gold')->where('municipio', 'BUCARAMANGA')->where('estatusGestion', '=',  NULL)
            ->count();
        $enTramiteBucG = PuntosAuditoria::where('segmentacion', 'gold')
            ->where('municipio', 'BUCARAMANGA')
            ->where('estatusGestion', 'like', '%paso %')
            ->count();
        //STATUS CALI
        $asignadosCalG = $puntos->where('segmentacion', 'gold')->where('municipio', 'CALI')->where('estatusGestion', 'Asignado')->count();
        $diligenciadosCalG = $puntos->where('segmentacion', 'gold')->where('municipio', 'CALI')->where('estatusGestion', 'Diligenciado')->count();
        $noConcretadosCalG = $puntos->where('segmentacion', 'gold')->where('municipio', 'CALI')->where('estatusGestion', 'gestionado - no concretado')->count();
        $disponiblesCalG = $puntos->where('segmentacion', 'gold')->where('municipio', 'CALI')->where('estatusGestion', '=',  NULL)
            ->count();
        $enTramiteCalG = PuntosAuditoria::where('segmentacion', 'gold')
            ->where('municipio', 'CALI')
            ->where('estatusGestion', 'like', '%paso %')
            ->count();


        $asignadosS = $puntos->where('segmentacion', 'silver')->where('estatusGestion', 'Asignado')->count();
        $diligenciadosS = $puntos->where('segmentacion', 'silver')->where('estatusGestion', 'Diligenciado')->count();
        $noConcretadosS = $puntos->where('segmentacion', 'silver')->where('estatusGestion', 'gestionado - no concretado')->count();
        $disponiblesS = $puntos->where('segmentacion', 'silver')->where('estatusGestion', '=',  NULL)
            ->count();
        $enTramiteS = PuntosAuditoria::where('segmentacion', 'silver')
            ->where('estatusGestion', 'like', '%paso %')
            ->count();

        // estatus bta silver
        $asignadosBtaS = $puntos->where('segmentacion', 'silver')->where('municipio', 'BOGOTA')->where('estatusGestion', 'Asignado')->count();
        $diligenciadosBtaS = $puntos->where('segmentacion', 'silver')->where('municipio', 'BOGOTA')->where('estatusGestion', 'Diligenciado')->count();
        $noConcretadosBtaS = $puntos->where('segmentacion', 'silver')->where('municipio', 'BOGOTA')->where('estatusGestion', 'gestionado - no concretado')->count();
        $disponiblesBtaS = $puntos->where('segmentacion', 'silver')->where('municipio', 'BOGOTA')->where('estatusGestion', '=',  NULL)
            ->count();
        $enTramiteBtaS = PuntosAuditoria::where('segmentacion', 'silver')
            ->where('municipio', 'BOGOTA')
            ->where('estatusGestion', 'like', '%paso %')
            ->count();
        //Status medellin
        $asignadosMedS = $puntos->where('segmentacion', 'silver')->where('municipio', 'MEDELLIN')->where('estatusGestion', 'Asignado')->count();
        $diligenciadosMedS = $puntos->where('segmentacion', 'silver')->where('municipio', 'MEDELLIN')->where('estatusGestion', 'Diligenciado')->count();
        $noConcretadosMedS = $puntos->where('segmentacion', 'silver')->where('municipio', 'MEDELLIN')->where('estatusGestion', 'gestionado - no concretado')->count();
        $disponiblesMedS = $puntos->where('segmentacion', 'silver')->where('municipio', 'MEDELLIN')->where('estatusGestion', '=',  NULL)
            ->count();
        $enTramiteMedS = PuntosAuditoria::where('segmentacion', 'silver')
            ->where('municipio', 'MEDELLIN')
            ->where('estatusGestion', 'like', '%paso %')
            ->count();
        //Status barranquilla

        $asignadosBarS = $puntos->where('segmentacion', 'silver')->where('municipio', 'BARRANQUILLA')->where('estatusGestion', 'Asignado')->count();
        $diligenciadosBarS = $puntos->where('segmentacion', 'silver')->where('municipio', 'BARRANQUILLA')->where('estatusGestion', 'Diligenciado')->count();
        $noConcretadosBarS = $puntos->where('segmentacion', 'silver')->where('municipio', 'BARRANQUILLA')->where('estatusGestion', 'gestionado - no concretado')->count();
        $disponiblesBarS = $puntos->where('segmentacion', 'silver')->where('municipio', 'BARRANQUILLA')->where('estatusGestion', '=',  NULL)
            ->count();
        $enTramiteBarS = PuntosAuditoria::where('segmentacion', 'silver')
            ->where('municipio', 'BARRANQUILLA')
            ->where('estatusGestion', 'like', '%paso %')
            ->count();
        //status bucaramanga

        $asignadosBucS = $puntos->where('segmentacion', 'silver')->where('municipio', 'BUCARAMANGA')->where('estatusGestion', 'Asignado')->count();
        $diligenciadosBucS = $puntos->where('segmentacion', 'silver')->where('municipio', 'BUCARAMANGA')->where('estatusGestion', 'Diligenciado')->count();
        $noConcretadosBucS = $puntos->where('segmentacion', 'silver')->where('municipio', 'BUCARAMANGA')->where('estatusGestion', 'gestionado - no concretado')->count();
        $disponiblesBucS = $puntos->where('segmentacion', 'silver')->where('municipio', 'BUCARAMANGA')->where('estatusGestion', '=',  NULL)
            ->count();
        $enTramiteBucS = PuntosAuditoria::where('segmentacion', 'silver')
            ->where('municipio', 'BUCARAMANGA')
            ->where('estatusGestion', 'like', '%paso %')
            ->count();
        //STATUS CALI
        $asignadosCalS = $puntos->where('segmentacion', 'silver')->where('municipio', 'CALI')->where('estatusGestion', 'Asignado')->count();
        $diligenciadosCalS = $puntos->where('segmentacion', 'silver')->where('municipio', 'CALI')->where('estatusGestion', 'Diligenciado')->count();
        $noConcretadosCalS = $puntos->where('segmentacion', 'silver')->where('municipio', 'CALI')->where('estatusGestion', 'gestionado - no concretado')->count();
        $disponiblesCalS = $puntos->where('segmentacion', 'silver')->where('municipio', 'CALI')->where('estatusGestion', '=',  NULL)
            ->count();
        $enTramiteCalS = PuntosAuditoria::where('segmentacion', 'silver')
            ->where('municipio', 'CALI')
            ->where('estatusGestion', 'like', '%paso %')
            ->count();

        $asignadosB = $puntos->where('segmentacion', 'bronce')->where('estatusGestion', 'Asignado')->count();
        $diligenciadosB = $puntos->where('segmentacion', 'bronce')->where('estatusGestion', 'Diligenciado')->count();
        $noConcretadosB = $puntos->where('segmentacion', 'bronce')->where('estatusGestion', 'gestionado - no concretado')->count();
        $disponiblesB = $puntos->where('segmentacion', 'bronce')->where('estatusGestion', '=',  NULL)
            ->count();
        $enTramiteB = PuntosAuditoria::where('segmentacion', 'bronce')
            ->where('estatusGestion', 'like', '%paso %')
            ->count();
        // estatus bta bronce
        $asignadosBtaB = $puntos->where('segmentacion', 'bronce')->where('municipio', 'BOGOTA')->where('estatusGestion', 'Asignado')->count();
        $diligenciadosBtaB = $puntos->where('segmentacion', 'bronce')->where('municipio', 'BOGOTA')->where('estatusGestion', 'Diligenciado')->count();
        $noConcretadosBtaB = $puntos->where('segmentacion', 'bronce')->where('municipio', 'BOGOTA')->where('estatusGestion', 'gestionado - no concretado')->count();
        $disponiblesBtaB = $puntos->where('segmentacion', 'bronce')->where('municipio', 'BOGOTA')->where('estatusGestion', '=',  NULL)
            ->count();
        $enTramiteBtaB = PuntosAuditoria::where('segmentacion', 'bronce')
            ->where('municipio', 'BOGOTA')
            ->where('estatusGestion', 'like', '%paso %')
            ->count();
        //Status medellin
        $asignadosMedB = $puntos->where('segmentacion', 'bronce')->where('municipio', 'MEDELLIN')->where('estatusGestion', 'Asignado')->count();
        $diligenciadosMedB = $puntos->where('segmentacion', 'bronce')->where('municipio', 'MEDELLIN')->where('estatusGestion', 'Diligenciado')->count();
        $noConcretadosMedB = $puntos->where('segmentacion', 'bronce')->where('municipio', 'MEDELLIN')->where('estatusGestion', 'gestionado - no concretado')->count();
        $disponiblesMedB = $puntos->where('segmentacion', 'bronce')->where('municipio', 'MEDELLIN')->where('estatusGestion', '=',  NULL)
            ->count();
        $enTramiteMedB = PuntosAuditoria::where('segmentacion', 'bronce')
            ->where('municipio', 'MEDELLIN')
            ->where('estatusGestion', 'like', '%paso %')
            ->count();
        //Status barranquilla

        $asignadosBarB = $puntos->where('segmentacion', 'bronce')->where('municipio', 'BARRANQUILLA')->where('estatusGestion', 'Asignado')->count();
        $diligenciadosBarB = $puntos->where('segmentacion', 'bronce')->where('municipio', 'BARRANQUILLA')->where('estatusGestion', 'Diligenciado')->count();
        $noConcretadosBarB = $puntos->where('segmentacion', 'bronce')->where('municipio', 'BARRANQUILLA')->where('estatusGestion', 'gestionado - no concretado')->count();
        $disponiblesBarB = $puntos->where('segmentacion', 'bronce')->where('municipio', 'BARRANQUILLA')->where('estatusGestion', '=',  NULL)
            ->count();
        $enTramiteBarB = PuntosAuditoria::where('segmentacion', 'bronce')
            ->where('municipio', 'BARRANQUILLA')
            ->where('estatusGestion', 'like', '%paso %')
            ->count();
        //status bucaramanga

        $asignadosBucB = $puntos->where('segmentacion', 'bronce')->where('municipio', 'BUCARAMANGA')->where('estatusGestion', 'Asignado')->count();
        $diligenciadosBucB = $puntos->where('segmentacion', 'bronce')->where('municipio', 'BUCARAMANGA')->where('estatusGestion', 'Diligenciado')->count();
        $noConcretadosBucB = $puntos->where('segmentacion', 'bronce')->where('municipio', 'BUCARAMANGA')->where('estatusGestion', 'gestionado - no concretado')->count();
        $disponiblesBucB = $puntos->where('segmentacion', 'bronce')->where('municipio', 'BUCARAMANGA')->where('estatusGestion', '=',  NULL)
            ->count();
        $enTramiteBucB = PuntosAuditoria::where('segmentacion', 'bronce')
            ->where('municipio', 'BUCARAMANGA')
            ->where('estatusGestion', 'like', '%paso %')
            ->count();
        //STATUS CALI
        $asignadosCalB = $puntos->where('segmentacion', 'bronce')->where('municipio', 'CALI')->where('estatusGestion', 'Asignado')->count();
        $diligenciadosCalB = $puntos->where('segmentacion', 'bronce')->where('municipio', 'CALI')->where('estatusGestion', 'Diligenciado')->count();
        $noConcretadosCalB = $puntos->where('segmentacion', 'bronce')->where('municipio', 'CALI')->where('estatusGestion', 'gestionado - no concretado')->count();
        $disponiblesCalB = $puntos->where('segmentacion', 'bronce')->where('municipio', 'CALI')->where('estatusGestion', '=', (NULL))
            ->count();
        $enTramiteCalB = PuntosAuditoria::where('segmentacion', 'bronce')
            ->where('municipio', 'CALI')
            ->where('estatusGestion', 'like', '%paso %')
            ->count();
        //sección de calidad
        $sinError = Auditoria::where('criticidad', 'sin errores')->count();
        $fondo = Auditoria::where('criticidad', 'error critico de fondo')->count();
        $forma = Auditoria::where('criticidad', 'error critico de forma')->count();
        $ambos = Auditoria::where('criticidad', 'errores criticos de fondo y forma')->count();
        $pendiente = Auditoria::where('criticidad', 'Pendiente Calidad')->count();
        $totalCalidad = ($sinError + $fondo + $forma + $ambos + $pendiente);

        //calidad bogota

        $sinErrorBta = Auditoria::where('criticidad', 'sin errores')->where('municipio', 'BOGOTA')->count();
        $fondoBta = Auditoria::where('criticidad', 'error critico de fondo')->where('municipio', 'BOGOTA')->count();
        $formaBta = Auditoria::where('criticidad', 'error critico de forma')->where('municipio', 'BOGOTA')->count();
        $ambosBta = Auditoria::where('criticidad', 'errores criticos de fondo y forma')->where('municipio', 'BOGOTA')->count();
        $pendienteBta = Auditoria::where('criticidad', 'Pendiente Calidad')->where('municipio', 'BOGOTA')->count();
        $totalBta = ($sinErrorBta + $fondoBta + $formaBta + $ambosBta + $pendienteBta);


        $sinErrorBtaG = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'BOGOTA')->where('criticidad', 'sin errores')->count();
        $fondoBtaG = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'BOGOTA')->where('criticidad', 'error critico de fondo')->count();
        $formaBtaG = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'BOGOTA')->where('criticidad', 'error critico de forma')->count();
        $ambosBtaG = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'BOGOTA')->where('criticidad', 'errores criticos de fondo y forma')->count();
        $pendienteBtaG = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'BOGOTA')->where('criticidad', 'Pendiente Calidad')->count();
        $totalBtaG = ($sinErrorBtaG + $fondoBtaG + $formaBtaG + $ambosBtaG + $pendienteBtaG);


        $sinErrorBtaS = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'BOGOTA')->where('criticidad', 'sin errores')->count();
        $fondoBtaS = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'BOGOTA')->where('criticidad', 'error critico de fondo')->count();
        $formaBtaS = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'BOGOTA')->where('criticidad', 'error critico de forma')->count();
        $ambosBtaS = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'BOGOTA')->where('criticidad', 'errores criticos de fondo y forma')->count();
        $pendienteBtaS = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'BOGOTA')->where('criticidad', 'Pendiente Calidad')->count();
        $totalBtaS = ($sinErrorBtaS + $fondoBtaS + $formaBtaS + $ambosBtaS + $pendienteBtaS);


        $sinErrorBtaB = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'BOGOTA')->where('criticidad', 'sin errores')->count();
        $fondoBtaB = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'BOGOTA')->where('criticidad', 'error critico de fondo')->count();
        $formaBtaB = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'BOGOTA')->where('criticidad', 'error critico de forma')->count();
        $ambosBtaB = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'BOGOTA')->where('criticidad', 'errores criticos de fondo y forma')->count();
        $pendienteBtaB = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'BOGOTA')->where('criticidad', 'Pendiente Calidad')->count();
        $totalBtaB = ($sinErrorBtaB + $fondoBtaB + $formaBtaB + $ambosBtaB + $pendienteBtaB);


        //calidad medellin

        $sinErrorMed = Auditoria::where('criticidad', 'sin errores')->where('municipio', 'MEDELLIN')->count();
        $fondoMed = Auditoria::where('criticidad', 'error critico de fondo')->where('municipio', 'MEDELLIN')->count();
        $formaMed = Auditoria::where('criticidad', 'error critico de forma')->where('municipio', 'MEDELLIN')->count();
        $ambosMed = Auditoria::where('criticidad', 'errores criticos de fondo y forma')->where('municipio', 'MEDELLIN')->count();
        $pendienteMed = Auditoria::where('criticidad', 'Pendiente Calidad')->where('municipio', 'MEDELLIN')->count();
        $totalMed = ($sinErrorMed + $fondoMed + $formaMed + $ambosMed + $pendienteMed);


        $sinErrorMedG = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'MEDELLIN')->where('criticidad', 'sin errores')->count();
        $fondoMedG = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'MEDELLIN')->where('criticidad', 'error critico de fondo')->count();
        $formaMedG = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'MEDELLIN')->where('criticidad', 'error critico de forma')->count();
        $ambosMedG = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'MEDELLIN')->where('criticidad', 'errores criticos de fondo y forma')->count();
        $pendienteMedG = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'MEDELLIN')->where('criticidad', 'Pendiente Calidad')->count();
        $totalMedG = ($sinErrorMedG + $fondoMedG + $formaMedG + $ambosMedG + $pendienteMedG);

        $sinErrorMedS = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'MEDELLIN')->where('criticidad', 'sin errores')->count();
        $fondoMedS = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'MEDELLIN')->where('criticidad', 'error critico de fondo')->count();
        $formaMedS = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'MEDELLIN')->where('criticidad', 'error critico de forma')->count();
        $ambosMedS = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'MEDELLIN')->where('criticidad', 'errores criticos de fondo y forma')->count();
        $pendienteMedS = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'MEDELLIN')->where('criticidad', 'Pendiente Calidad')->count();
        $totalMedS = ($sinErrorMedS + $fondoMedS + $formaMedS + $ambosMedS + $pendienteMedS);

        $sinErrorMedB = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'MEDELLIN')->where('criticidad', 'sin errores')->count();
        $fondoMedB = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'MEDELLIN')->where('criticidad', 'error critico de fondo')->count();
        $formaMedB = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'MEDELLIN')->where('criticidad', 'error critico de forma')->count();
        $ambosMedB = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'MEDELLIN')->where('criticidad', 'errores criticos de fondo y forma')->count();
        $pendienteMedB = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'MEDELLIN')->where('criticidad', 'Pendiente Calidad')->count();
        $totalMedB = ($sinErrorMedB + $fondoMedB + $formaMedB + $ambosMedB + $pendienteMedB);

        //calidad BARRANQUILLA

        $sinErrorBar = Auditoria::where('criticidad', 'sin errores')->where('municipio', 'BARRANQUILLA')->count();
        $fondoBar = Auditoria::where('criticidad', 'error critico de fondo')->where('municipio', 'BARRANQUILLA')->count();
        $formaBar = Auditoria::where('criticidad', 'error critico de forma')->where('municipio', 'BARRANQUILLA')->count();
        $ambosBar = Auditoria::where('criticidad', 'errores criticos de fondo y forma')->where('municipio', 'BARRANQUILLA')->count();
        $pendienteBar = Auditoria::where('criticidad', 'Pendiente Calidad')->where('municipio', 'BARRANQUILLA')->count();
        $totalBar = ($sinErrorBar + $fondoBar + $formaBar + $ambosBar + $pendienteBar);

        $sinErrorBarG = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'BARRANQUILLA')->where('criticidad', 'sin errores')->count();
        $fondoBarG = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'BARRANQUILLA')->where('criticidad', 'error critico de fondo')->count();
        $formaBarG = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'BARRANQUILLA')->where('criticidad', 'error critico de forma')->count();
        $ambosBarG = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'BARRANQUILLA')->where('criticidad', 'errores criticos de fondo y forma')->count();
        $pendienteBarG = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'BARRANQUILLA')->where('criticidad', 'Pendiente Calidad')->count();
        $totalBarG = ($sinErrorBarG + $fondoBarG + $formaBarG + $ambosBarG + $pendienteBarG);

        $sinErrorBarS = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'BARRANQUILLA')->where('criticidad', 'sin errores')->count();
        $fondoBarS = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'BARRANQUILLA')->where('criticidad', 'error critico de fondo')->count();
        $formaBarS = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'BARRANQUILLA')->where('criticidad', 'error critico de forma')->count();
        $ambosBarS = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'BARRANQUILLA')->where('criticidad', 'errores criticos de fondo y forma')->count();
        $pendienteBarS = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'BARRANQUILLA')->where('criticidad', 'Pendiente Calidad')->count();
        $totalBarS = ($sinErrorBarS + $fondoBarS + $formaBarS + $ambosBarS + $pendienteBarS);

        $sinErrorBarB = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'BARRANQUILLA')->where('criticidad', 'sin errores')->count();
        $fondoBarB = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'BARRANQUILLA')->where('criticidad', 'error critico de fondo')->count();
        $formaBarB = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'BARRANQUILLA')->where('criticidad', 'error critico de forma')->count();
        $ambosBarB = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'BARRANQUILLA')->where('criticidad', 'errores criticos de fondo y forma')->count();
        $pendienteBarB = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'BARRANQUILLA')->where('criticidad', 'Pendiente Calidad')->count();
        $totalBarB = ($sinErrorBarB + $fondoBarB + $formaBarB + $ambosBarB + $pendienteBarB);

        //calidad BUCARAMANGA

        $sinErrorBuc = Auditoria::where('criticidad', 'sin errores')->where('municipio', 'BUCARAMANGA')->count();
        $fondoBuc = Auditoria::where('criticidad', 'error critico de fondo')->where('municipio', 'BUCARAMANGA')->count();
        $formaBuc = Auditoria::where('criticidad', 'error critico de forma')->where('municipio', 'BUCARAMANGA')->count();
        $ambosBuc = Auditoria::where('criticidad', 'errores criticos de fondo y forma')->where('municipio', 'BUCARAMANGA')->count();
        $pendienteBuc = Auditoria::where('criticidad', 'Pendiente Calidad')->where('municipio', 'BUCARAMANGA')->count();
        $totalBuc = ($sinErrorBuc + $fondoBuc + $formaBuc + $ambosBuc + $pendienteBuc);

        $sinErrorBucG = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'BUCARAMANGA')->where('criticidad', 'sin errores')->count();
        $fondoBucG = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'BUCARAMANGA')->where('criticidad', 'error critico de fondo')->count();
        $formaBucG = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'BUCARAMANGA')->where('criticidad', 'error critico de forma')->count();
        $ambosBucG = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'BUCARAMANGA')->where('criticidad', 'errores criticos de fondo y forma')->count();
        $pendienteBucG = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'BUCARAMANGA')->where('criticidad', 'Pendiente Calidad')->count();
        $totalBucG = ($sinErrorBucG + $fondoBucG + $formaBucG + $ambosBucG + $pendienteBucG);

        $sinErrorBucS = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'BUCARAMANGA')->where('criticidad', 'sin errores')->count();
        $fondoBucS = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'BUCARAMANGA')->where('criticidad', 'error critico de fondo')->count();
        $formaBucS = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'BUCARAMANGA')->where('criticidad', 'error critico de forma')->count();
        $ambosBucS = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'BUCARAMANGA')->where('criticidad', 'errores criticos de fondo y forma')->count();
        $pendienteBucS = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'BUCARAMANGA')->where('criticidad', 'Pendiente Calidad')->count();
        $totalBucS = ($sinErrorBucS + $fondoBucS + $formaBucS + $ambosBucS + $pendienteBucS);

        $sinErrorBucB = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'BUCARAMANGA')->where('criticidad', 'sin errores')->count();
        $fondoBucB = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'BUCARAMANGA')->where('criticidad', 'error critico de fondo')->count();
        $formaBucB = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'BUCARAMANGA')->where('criticidad', 'error critico de forma')->count();
        $ambosBucB = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'BUCARAMANGA')->where('criticidad', 'errores criticos de fondo y forma')->count();
        $pendienteBucB = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'BUCARAMANGA')->where('criticidad', 'Pendiente Calidad')->count();
        $totalBucB = ($sinErrorBucB + $fondoBucB + $formaBucB + $ambosBucB + $pendienteBucB);

        //calidad CALI

        $sinErrorCal = Auditoria::where('criticidad', 'sin errores')->where('municipio', 'CALI')->count();
        $fondoCal = Auditoria::where('criticidad', 'error critico de fondo')->where('municipio', 'CALI')->count();
        $formaCal = Auditoria::where('criticidad', 'error critico de forma')->where('municipio', 'CALI')->count();
        $ambosCal = Auditoria::where('criticidad', 'errores criticos de fondo y forma')->where('municipio', 'CALI')->count();
        $pendienteCal = Auditoria::where('criticidad', 'Pendiente Calidad')->where('municipio', 'CALI')->count();
        $totalCali = ($sinErrorCal + $fondoCal + $formaCal + $ambosCal + $pendienteCal);

        $sinErrorCalG = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'CALI')->where('criticidad', 'sin errores')->count();
        $fondoCalG = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'CALI')->where('criticidad', 'error critico de fondo')->count();
        $formaCalG = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'CALI')->where('criticidad', 'error critico de forma')->count();
        $ambosCalG = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'CALI')->where('criticidad', 'errores criticos de fondo y forma')->count();
        $pendienteCalG = Auditoria::where('segmento', 'like', '%gold%')->where('municipio', 'CALI')->where('criticidad', 'Pendiente Calidad')->count();
        $totalCalG = ($sinErrorCalG + $fondoCalG + $formaCalG + $ambosCalG + $pendienteCalG);

        $sinErrorCalS = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'CALI')->where('criticidad', 'sin errores')->count();
        $fondoCalS = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'CALI')->where('criticidad', 'error critico de fondo')->count();
        $formaCalS = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'CALI')->where('criticidad', 'error critico de forma')->count();
        $ambosCalS = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'CALI')->where('criticidad', 'errores criticos de fondo y forma')->count();
        $pendienteCalS = Auditoria::where('segmento', 'like', '%silver%')->where('municipio', 'CALI')->where('criticidad', 'Pendiente Calidad')->count();
        $totalCalS = ($sinErrorCalS + $fondoCalS + $formaCalS + $ambosCalS + $pendienteCalS);

        $sinErrorCalB = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'CALI')->where('criticidad', 'sin errores')->count();
        $fondoCalB = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'CALI')->where('criticidad', 'error critico de fondo')->count();
        $formaCalB = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'CALI')->where('criticidad', 'error critico de forma')->count();
        $ambosCalB = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'CALI')->where('criticidad', 'errores criticos de fondo y forma')->count();
        $pendienteCalB = Auditoria::where('segmento', 'like', '%bronce%')->where('municipio', 'CALI')->where('criticidad', 'Pendiente Calidad')->count();
        $totalCalB = ($sinErrorCalB + $fondoCalB + $formaCalB + $ambosCalB + $pendienteCalB);

        $sinErrorG = Auditoria::where('segmento', 'like', '%gold%')->where('criticidad', 'sin errores')->count();
        $fondoG = Auditoria::where('segmento', 'like', '%gold%')->where('criticidad', 'error critico de fondo')->count();
        $formaG = Auditoria::where('segmento', 'like', '%gold%')->where('criticidad', 'error critico de forma')->count();
        $ambosG = Auditoria::where('segmento', 'like', '%gold%')->where('criticidad', 'errores criticos de fondo y forma')->count();
        $pendienteG = Auditoria::where('segmento', 'like', '%gold%')->where('criticidad', 'Pendiente Calidad')->count();
        $totalGolds = ($sinErrorG + $fondoG + $formaG + $ambosG + $pendienteG);

        $sinErrorS = Auditoria::where('segmento', 'like', '%silver%')->where('criticidad', 'sin errores')->count();
        $fondoS = Auditoria::where('segmento', 'like', '%silver%')->where('criticidad', 'error critico de fondo')->count();
        $formaS = Auditoria::where('segmento', 'like', '%silver%')->where('criticidad', 'error critico de forma')->count();
        $ambosS = Auditoria::where('segmento', 'like', '%silver%')->where('criticidad', 'errores criticos de fondo y forma')->count();
        $pendienteS = Auditoria::where('segmento', 'like', '%silver%')->where('criticidad', 'Pendiente Calidad')->count();
        $totalSilvers = ($sinErrorS + $fondoS + $formaS + $ambosS + $pendienteS);

        $sinErrorB = Auditoria::where('segmento', 'like', '%bronce%')->where('criticidad', 'sin errores')->count();
        $fondoB = Auditoria::where('segmento', 'like', '%bronce%')->where('criticidad', 'error critico de fondo')->count();
        $formaB = Auditoria::where('segmento', 'like', '%bronce%')->where('criticidad', 'error critico de forma')->count();
        $ambosB = Auditoria::where('segmento', 'like', '%bronce%')->where('criticidad', 'errores criticos de fondo y forma')->count();
        $pendienteB = Auditoria::where('segmento', 'like', '%bronce%')->where('criticidad', 'Pendiente Calidad')->count();
        $totalBronces = ($sinErrorB + $fondoB + $formaB + $ambosB + $pendienteB);

        $auditorCal = $auditoria->pluck('revisadoPor')->countBy();


        $hoy = Carbon::now();
        $hoy = $hoy->format('Y-m-d');
        //dd($hoy);
        $hoy2 = Carbon::now();
        $hoy2 = $hoy2->format('Y-m-d');

        $hoy3 = Carbon::now();
        $hoy3 = $hoy3->format('l jS \\of D Y h:i:s A');



        //$promotor1 = "Fernando Alexander Carillo Leon";
        $promotor1 = "BRAYAN ESTEBAN ARAQUE ENCISO";
        // $promotor2 = "CAREN ISABEL CASTAÑEDA CARRILLO";
        $promotor3 = "DAVID ELIECER TORRES BETANCOUR";

        $promotor4 =  "EDWUIN ANDRES MARMOLEJO GIRALDO";
        $promotor5 = "JEFERSON ALEXANDER MENDOZA CALLE";
        $promotor6 = "YORMAN ANDRES OSORIO DIAZ";
        $promotor7 = "NESTOR RAUL FAJARDO PEÑA";
        // $promotor8 = "RAMSES RESTREPO CANO";
        $promotor9 = "YADIRA GARCIA HERNANDEZ";

        $prom1Ope = PuntosAuditoria::where('asignadoA', $promotor1)->whereDate('fechaAsignado', $hoy)->count();
        // $prom2Ope = PuntosAuditoria::where('asignadoA', $promotor2)->whereDate('fechaAsignado', $hoy)->count();
        $prom3Ope = PuntosAuditoria::where('asignadoA', $promotor3)->whereDate('fechaAsignado', $hoy)->count();
        $prom4Ope = PuntosAuditoria::where('asignadoA', $promotor4)->whereDate('fechaAsignado', $hoy)->count();
        $prom5Ope = PuntosAuditoria::where('asignadoA', $promotor5)->whereDate('fechaAsignado', $hoy)->count();
        $prom6Ope = PuntosAuditoria::where('asignadoA', $promotor6)->whereDate('fechaAsignado', $hoy)->count();
        $prom7Ope = PuntosAuditoria::where('asignadoA', $promotor7)->whereDate('fechaAsignado', $hoy)->count();
        // $prom8Ope = PuntosAuditoria::where('asignadoA', $promotor8)->whereDate('fechaAsignado', $hoy)->count();
        $prom9Ope = PuntosAuditoria::where('asignadoA', $promotor9)->whereDate('fechaAsignado', $hoy)->count();
        $totalCargaDia = (
            $prom1Ope +
            // $prom2Ope +
            $prom3Ope +
            $prom4Ope +
            // $prom5Ope +
            $prom6Ope +
            $prom7Ope +
            // $prom8Ope +
            $prom9Ope
        );

        $prom1OpeGl = PuntosAuditoria::where('asignadoA', $promotor1)->where('segmentacion', 'gold')->whereDate('fechaAsignado', $hoy)->count();
        // $prom2OpeGl = PuntosAuditoria::where('asignadoA', $promotor2)->where('segmentacion', 'gold')->whereDate('fechaAsignado', $hoy)->count();
        $prom3OpeGl = PuntosAuditoria::where('asignadoA', $promotor3)->where('segmentacion', 'gold')->whereDate('fechaAsignado', $hoy)->count();
        $prom4OpeGl = PuntosAuditoria::where('asignadoA', $promotor4)->where('segmentacion', 'gold')->whereDate('fechaAsignado', $hoy)->count();
        $prom5OpeGl = PuntosAuditoria::where('asignadoA', $promotor5)->where('segmentacion', 'gold')->whereDate('fechaAsignado', $hoy)->count();
        $prom6OpeGl = PuntosAuditoria::where('asignadoA', $promotor6)->where('segmentacion', 'gold')->whereDate('fechaAsignado', $hoy)->count();
        $prom7OpeGl = PuntosAuditoria::where('asignadoA', $promotor7)->where('segmentacion', 'gold')->whereDate('fechaAsignado', $hoy)->count();
        // $prom8OpeGl = PuntosAuditoria::where('asignadoA', $promotor8)->where('segmentacion', 'gold')->whereDate('fechaAsignado', $hoy)->count();
        $prom9OpeGl = PuntosAuditoria::where('asignadoA', $promotor9)->where('segmentacion', 'gold')->whereDate('fechaAsignado', $hoy)->count();

        $totalpromOpeGl = (
            $prom1OpeGl +
            // $prom2OpeGl +
            $prom3OpeGl +
            $prom4OpeGl +
            $prom5OpeGl +
            $prom6OpeGl +
            $prom7OpeGl +
            // $prom8OpeGl +
            $prom9OpeGl
        );



        $prom1OpeSl = PuntosAuditoria::where('asignadoA', $promotor1)->where('segmentacion', 'silver')->whereDate('fechaAsignado', $hoy)->count();
        // $prom2OpeSl = PuntosAuditoria::where('asignadoA', $promotor2)->where('segmentacion', 'silver')->whereDate('fechaAsignado', $hoy)->count();
        $prom3OpeSl = PuntosAuditoria::where('asignadoA', $promotor3)->where('segmentacion', 'silver')->whereDate('fechaAsignado', $hoy)->count();
        $prom4OpeSl = PuntosAuditoria::where('asignadoA', $promotor4)->where('segmentacion', 'silver')->whereDate('fechaAsignado', $hoy)->count();
        $prom5OpeSl = PuntosAuditoria::where('asignadoA', $promotor5)->where('segmentacion', 'silver')->whereDate('fechaAsignado', $hoy)->count();
        $prom6OpeSl = PuntosAuditoria::where('asignadoA', $promotor6)->where('segmentacion', 'silver')->whereDate('fechaAsignado', $hoy)->count();
        $prom7OpeSl = PuntosAuditoria::where('asignadoA', $promotor7)->where('segmentacion', 'silver')->whereDate('fechaAsignado', $hoy)->count();
        // $prom8OpeSl = PuntosAuditoria::where('asignadoA', $promotor8)->where('segmentacion', 'silver')->whereDate('fechaAsignado', $hoy)->count();
        $prom9OpeSl = PuntosAuditoria::where('asignadoA', $promotor9)->where('segmentacion', 'silver')->whereDate('fechaAsignado', $hoy)->count();

        $totalpromOpeSl = (
            $prom1OpeSl +
            // $prom2OpeSl +
            $prom3OpeSl +
            $prom4OpeSl +
            $prom5OpeSl +
            $prom6OpeSl +
            $prom7OpeSl +
            // $prom8OpeSl +
            $prom9OpeSl
        );

        $prom1OpeBr = PuntosAuditoria::where('asignadoA', $promotor1)->where('segmentacion', 'bronce')->whereDate('fechaAsignado', $hoy)->count();
        // $prom2OpeBr = PuntosAuditoria::where('asignadoA', $promotor2)->where('segmentacion', 'bronce')->whereDate('fechaAsignado', $hoy)->count();
        $prom3OpeBr = PuntosAuditoria::where('asignadoA', $promotor3)->where('segmentacion', 'bronce')->whereDate('fechaAsignado', $hoy)->count();
        $prom4OpeBr = PuntosAuditoria::where('asignadoA', $promotor4)->where('segmentacion', 'bronce')->whereDate('fechaAsignado', $hoy)->count();
        $prom5OpeBr = PuntosAuditoria::where('asignadoA', $promotor5)->where('segmentacion', 'bronce')->whereDate('fechaAsignado', $hoy)->count();
        $prom6OpeBr = PuntosAuditoria::where('asignadoA', $promotor6)->where('segmentacion', 'bronce')->whereDate('fechaAsignado', $hoy)->count();
        $prom7OpeBr = PuntosAuditoria::where('asignadoA', $promotor7)->where('segmentacion', 'bronce')->whereDate('fechaAsignado', $hoy)->count();
        // $prom8OpeBr = PuntosAuditoria::where('asignadoA', $promotor8)->where('segmentacion', 'bronce')->whereDate('fechaAsignado', $hoy)->count();
        $prom9OpeBr = PuntosAuditoria::where('asignadoA', $promotor9)->where('segmentacion', 'bronce')->whereDate('fechaAsignado', $hoy)->count();

        $totalpromOpeBr = (
            $prom1OpeBr +
            // $prom2OpeBr +
            $prom3OpeBr +
            $prom4OpeBr +
            $prom5OpeBr +
            $prom6OpeBr +
            $prom7OpeBr +
            // $prom8OpeBr +
            $prom9OpeBr
        );

        $prom1OpeAcum = Asignaciones::where('asignadoA', $promotor1)->count();
        // $prom2OpeAcum = Asignaciones::where('asignadoA', $promotor2)->count();
        $prom3OpeAcum = Asignaciones::where('asignadoA', $promotor3)->count();
        $prom4OpeAcum = Asignaciones::where('asignadoA', $promotor4)->count();
        $prom5OpeAcum = Asignaciones::where('asignadoA', $promotor5)->count();
        $prom6OpeAcum = Asignaciones::where('asignadoA', $promotor6)->count();
        $prom7OpeAcum = Asignaciones::where('asignadoA', $promotor7)->count();
        // $prom8OpeAcum = Asignaciones::where('asignadoA', $promotor8)->count();
        $prom9OpeAcum = Asignaciones::where('asignadoA', $promotor9)->count();

        $totalCargaMes = (
            $prom1OpeAcum +
            //$prom2OpeAcum +
            $prom3OpeAcum +
            $prom4OpeAcum +
            $prom6OpeAcum +
            $prom7OpeAcum +
            //$prom8OpeAcum +
            $prom9OpeAcum
        );


        $prom1Ges = Auditoria::where('promotor', $promotor1)->whereDate('star', $hoy2)->count();
        //$prom2Ges = Auditoria::where('promotor', $promotor2)->whereDate('star', $hoy2)->count();
        $prom3Ges = Auditoria::where('promotor', $promotor3)->whereDate('star', $hoy2)->count();
        $prom4Ges = Auditoria::where('promotor', $promotor4)->whereDate('star', $hoy2)->count();
        $prom5Ges = Auditoria::where('promotor', $promotor5)->whereDate('star', $hoy2)->count();
        $prom6Ges = Auditoria::where('promotor', $promotor6)->whereDate('star', $hoy2)->count();
        $prom7Ges = Auditoria::where('promotor', $promotor7)->whereDate('star', $hoy2)->count();
        //$prom8Ges = Auditoria::where('promotor', $promotor8)->whereDate('star', $hoy2)->count();
        $prom9Ges = Auditoria::where('promotor', $promotor9)->whereDate('star', $hoy2)->count();



        $prom1GesGl = Auditoria::where('promotor', $promotor1)->where('segmento', 'like', '%gold%')->whereDate('star', $hoy2)->count();
        //$prom2GesGl = Auditoria::where('promotor', $promotor2)->where('segmento', 'like', '%gold%')->whereDate('star', $hoy2)->count();
        $prom3GesGl = Auditoria::where('promotor', $promotor3)->where('segmento', 'like', '%gold%')->whereDate('star', $hoy2)->count();
        $prom4GesGl = Auditoria::where('promotor', $promotor4)->where('segmento', 'like', '%gold%')->whereDate('star', $hoy2)->count();
        $prom5GesGl = Auditoria::where('promotor', $promotor5)->where('segmento', 'like', '%gold%')->whereDate('star', $hoy2)->count();
        $prom6GesGl = Auditoria::where('promotor', $promotor6)->where('segmento', 'like', '%gold%')->whereDate('star', $hoy2)->count();
        $prom7GesGl = Auditoria::where('promotor', $promotor7)->where('segmento', 'like', '%gold%')->whereDate('star', $hoy2)->count();
        //$prom8GesGl = Auditoria::where('promotor', $promotor8)->where('segmento', 'like', '%gold%')->whereDate('star', $hoy2)->count();
        $prom9GesGl = Auditoria::where('promotor', $promotor9)->where('segmento', 'like', '%gold%')->whereDate('star', $hoy2)->count();

        $totalpromGesGl = (
            $prom1GesGl +
            //$prom2GesGl +
            $prom3GesGl +
            $prom4GesGl +
            $prom5GesGl +
            $prom6GesGl +
            $prom7GesGl +
            //$prom8GesGl +
            $prom9GesGl
        );


        $prom1GesSl = Auditoria::where('promotor', $promotor1)->where('segmento', 'like', '%silver%')->whereDate('star', $hoy2)->count();
        //$prom2GesSl = Auditoria::where('promotor', $promotor2)->where('segmento', 'like', '%silver%')->whereDate('star', $hoy2)->count();
        $prom3GesSl = Auditoria::where('promotor', $promotor3)->where('segmento', 'like', '%silver%')->whereDate('star', $hoy2)->count();
        $prom4GesSl = Auditoria::where('promotor', $promotor4)->where('segmento', 'like', '%silver%')->whereDate('star', $hoy2)->count();
        $prom5GesSl = Auditoria::where('promotor', $promotor5)->where('segmento', 'like', '%silver%')->whereDate('star', $hoy2)->count();
        $prom6GesSl = Auditoria::where('promotor', $promotor6)->where('segmento', 'like', '%silver%')->whereDate('star', $hoy2)->count();
        $prom7GesSl = Auditoria::where('promotor', $promotor7)->where('segmento', 'like', '%silver%')->whereDate('star', $hoy2)->count();
        //$prom8GesSl = Auditoria::where('promotor', $promotor8)->where('segmento', 'like', '%silver%')->whereDate('star', $hoy2)->count();
        $prom9GesSl = Auditoria::where('promotor', $promotor9)->where('segmento', 'like', '%silver%')->whereDate('star', $hoy2)->count();
        $totalpromGesSl = (
            $prom1GesSl +
            //$prom2GesSl +
            $prom3GesSl +
            $prom4GesSl +
            $prom5GesSl +
            $prom6GesSl +
            $prom7GesSl +
            //$prom8GesSl +
            $prom9GesSl
        );


        $prom1GesBr = Auditoria::where('promotor', $promotor1)->where('segmento', 'like', '%bronce%')->whereDate('star', $hoy2)->count();
        //$prom2GesBr = Auditoria::where('promotor', $promotor2)->where('segmento', 'like', '%bronce%')->whereDate('star', $hoy2)->count();
        $prom3GesBr = Auditoria::where('promotor', $promotor3)->where('segmento', 'like', '%bronce%')->whereDate('star', $hoy2)->count();
        $prom4GesBr = Auditoria::where('promotor', $promotor4)->where('segmento', 'like', '%bronce%')->whereDate('star', $hoy2)->count();
        $prom5GesBr = Auditoria::where('promotor', $promotor5)->where('segmento', 'like', '%bronce%')->whereDate('star', $hoy2)->count();
        $prom6GesBr = Auditoria::where('promotor', $promotor6)->where('segmento', 'like', '%bronce%')->whereDate('star', $hoy2)->count();
        $prom7GesBr = Auditoria::where('promotor', $promotor7)->where('segmento', 'like', '%bronce%')->whereDate('star', $hoy2)->count();
       // $prom8GesBr = Auditoria::where('promotor', $promotor8)->where('segmento', 'like', '%bronce%')->whereDate('star', $hoy2)->count();
        $prom9GesBr = Auditoria::where('promotor', $promotor9)->where('segmento', 'like', '%bronce%')->whereDate('star', $hoy2)->count();
        $totalpromGesBr = (
            $prom1GesBr +
            //$prom2GesBr +
            $prom3GesBr +
            $prom4GesBr +
            $prom5GesBr +
            $prom6GesBr +
            $prom7GesBr +
            //$prom8GesBr +
            $prom9GesBr
        );


        if ($totalpromOpeGl != 0) {
            $totalpromOpeDiaGl =   $totalpromGesGl / $totalpromOpeGl * 100;
            $prom1CumpDiaCrudoG =    $totalpromGesGl / $totalpromOpeGl * 100;
            $totalpromOpeDiaGl = sprintf("%01.2f", $totalpromOpeDiaGl) . "%";
        } else {
            $totalpromOpeDiaGl = "0%";
            $prom1CumpDiaCrudoG =  "0%";
        }

        if ($totalpromOpeSl != 0) {
            $totalpromOpeDiaSl =   $totalpromGesSl / $totalpromOpeSl * 100;
            $prom1CumpDiaCrudoS =  $totalpromGesSl / $totalpromOpeSl * 100;
            $totalpromOpeDiaSl = sprintf("%01.2f", $totalpromOpeDiaSl) . "%";
        } else {
            $totalpromOpeDiaSl = "0%";
            $prom1CumpDiaCrudoS =  "0%";
        }

        if ($totalpromOpeBr != 0) {
            $totalpromOpeDiaBr =   $totalpromGesBr / $totalpromOpeBr * 100;
            $prom1CumpDiaCrudoB =  $totalpromGesBr / $totalpromOpeBr * 100;
            $totalpromOpeDiaBr = sprintf("%01.2f", $totalpromOpeDiaBr) . "%";
        } else {
            $totalpromOpeDiaBr = "0%";
            $prom1CumpDiaCrudoB =  "0%";
        }

        $prom1GesAct = Auditoria::where('promotor', $promotor1)->where('activacion', 'activo')->whereDate('star', $hoy2)->count();
        //$prom2GesAct = Auditoria::where('promotor', $promotor2)->where('activacion', 'activo')->whereDate('star', $hoy2)->count();
        $prom3GesAct = Auditoria::where('promotor', $promotor3)->where('activacion', 'activo')->whereDate('star', $hoy2)->count();
        $prom4GesAct = Auditoria::where('promotor', $promotor4)->where('activacion', 'activo')->whereDate('star', $hoy2)->count();
        $prom5GesAct = Auditoria::where('promotor', $promotor5)->where('activacion', 'activo')->whereDate('star', $hoy2)->count();
        $prom6GesAct = Auditoria::where('promotor', $promotor6)->where('activacion', 'activo')->whereDate('star', $hoy2)->count();
        $prom7GesAct = Auditoria::where('promotor', $promotor7)->where('activacion', 'activo')->whereDate('star', $hoy2)->count();
        //$prom8GesAct = Auditoria::where('promotor', $promotor8)->where('activacion', 'activo')->whereDate('star', $hoy2)->count();
        $prom9GesAct = Auditoria::where('promotor', $promotor9)->where('activacion', 'activo')->whereDate('star', $hoy2)->count();

        $sumpromGesAct = (
            $prom1GesAct +
            //$prom2GesAct +
            $prom3GesAct +
            $prom4GesAct +
            $prom5GesAct +
            $prom6GesAct +
            $prom7GesAct +
            //$prom8GesAct +
            $prom9GesAct
        );

        $prom1GesIn = Auditoria::where('promotor', $promotor1)->where('activacion', 'inactivo')->whereDate('star', $hoy2)->count();
        //$prom2GesIn = Auditoria::where('promotor', $promotor2)->where('activacion', 'inactivo')->whereDate('star', $hoy2)->count();
        $prom3GesIn = Auditoria::where('promotor', $promotor3)->where('activacion', 'inactivo')->whereDate('star', $hoy2)->count();
        $prom4GesIn = Auditoria::where('promotor', $promotor4)->where('activacion', 'inactivo')->whereDate('star', $hoy2)->count();
        $prom5GesIn = Auditoria::where('promotor', $promotor5)->where('activacion', 'inactivo')->whereDate('star', $hoy2)->count();
        $prom6GesIn = Auditoria::where('promotor', $promotor6)->where('activacion', 'inactivo')->whereDate('star', $hoy2)->count();
        $prom7GesIn = Auditoria::where('promotor', $promotor7)->where('activacion', 'inactivo')->whereDate('star', $hoy2)->count();
        //$prom8GesIn = Auditoria::where('promotor', $promotor8)->where('activacion', 'inactivo')->whereDate('star', $hoy2)->count();
        $prom9GesIn = Auditoria::where('promotor', $promotor9)->where('activacion', 'inactivo')->whereDate('star', $hoy2)->count();

        $sumpromGesIn = (
            $prom1GesIn +
            //$prom2GesIn +
            $prom3GesIn +
            $prom4GesIn +
            $prom5GesIn +
            $prom6GesIn +
            $prom7GesIn +
            //$prom8GesIn +
            $prom9GesIn
        );



        $totalGestionDia =
            (
                $prom1Ges +
                //$prom2Ges +
                $prom3Ges +
                $prom4Ges +
                $prom5Ges +
                $prom6Ges +
                $prom7Ges +
                //$prom8Ges +
                $prom9Ges
            );

        //$prom5GesAcum = Auditoria::where('promotor', $promotor5)->count();

        $prom1GesAcum = Auditoria::where('promotor', $promotor1)->count();
        //$prom2GesAcum = Auditoria::where('promotor', $promotor2)->count();
        $prom3GesAcum = Auditoria::where('promotor', $promotor3)->count();
        $prom4GesAcum = Auditoria::where('promotor', $promotor4)->count();
        $prom5GesAcum = Auditoria::where('promotor', $promotor5)->count();
        $prom6GesAcum = Auditoria::where('promotor', $promotor6)->count();
        $prom7GesAcum = Auditoria::where('promotor', $promotor7)->count();
        //$prom8GesAcum = Auditoria::where('promotor', $promotor8)->count();
        $prom9GesAcum = Auditoria::where('promotor', $promotor9)->count();



        $totalGestionMes =
            (
                $prom1GesAcum +
                //$prom2GesAcum +
                $prom3GesAcum +
                $prom4GesAcum +
                $prom5GesAcum +
                $prom6GesAcum +
                $prom7GesAcum +
                //$prom8GesAcum +
                $prom9GesAcum
            );


        if ($prom1GesGl != 0) {
            $prom1CumpG =   $prom1GesGl / $prom1OpeGl * 100;
            $prom1CumpCrudoG =    $prom1GesGl / $prom1OpeGl * 100;
            $prom1CumpG = sprintf("%01.2f", $prom1CumpG) . "%";
        } else {
            $prom1CumpG = "0%";
            $prom1CumpCrudoG =  "0%";
        }

      // if ($prom2GesGl != 0) {
      //     $prom2CumpG =   $prom2GesGl / $prom2OpeGl * 100;
      //     $prom2CumpCrudoG =    $prom2GesGl / $prom2OpeGl * 100;
      //     $prom2CumpG = sprintf("%01.2f", $prom2CumpG) . "%";
      // } else {
      //     $prom2CumpG = "0%";
      //     $prom2CumpCrudoG =  "0%";
      // }

        if ($prom3GesGl != 0) {
            $prom3CumpG =   $prom3GesGl / $prom3OpeGl * 100;
            $prom3CumpCrudoG =    $prom3GesGl / $prom3OpeGl * 100;
            $prom3CumpG = sprintf("%01.2f", $prom3CumpG) . "%";
        } else {
            $prom3CumpG = "0%";
            $prom3CumpCrudoG =  "0%";
        }

        if ($prom4GesGl != 0) {
            $prom4CumpG =   $prom4GesGl / $prom4OpeGl * 100;
            $prom4CumpCrudoG =    $prom4GesGl / $prom4OpeGl * 100;
            $prom4CumpG = sprintf("%01.2f", $prom4CumpG) . "%";
        } else {
            $prom4CumpG = "0%";
            $prom4CumpCrudoG =  "0%";
        }

        if ($prom5GesGl != 0) {
            $prom5CumpG =   $prom5GesGl / $prom5OpeGl * 100;
            $prom5CumpCrudoG =    $prom5GesGl / $prom5OpeGl * 100;
            $prom5CumpG = sprintf("%01.2f", $prom5CumpG) . "%";
        } else {
            $prom5CumpG = "0%";
            $prom5CumpCrudoG =  "0%";
        }


        if ($prom6GesGl != 0) {
            $prom6CumpG =   $prom6GesGl / $prom6OpeGl * 100;
            $prom6CumpCrudoG =    $prom6GesGl / $prom6OpeGl * 100;
            $prom6CumpG = sprintf("%01.2f", $prom6CumpG) . "%";
        } else {
            $prom6CumpG = "0%";
            $prom6CumpCrudoG =  "0%";
        }

        if ($prom7GesGl != 0) {
            $prom7CumpG =   $prom7GesGl / $prom7OpeGl * 100;
            $prom7CumpCrudoG =    $prom7GesGl / $prom7OpeGl * 100;
            $prom7CumpG = sprintf("%01.2f", $prom7CumpG) . "%";
        } else {
            $prom7CumpG = "0%";
            $prom7CumpCrudoG =  "0%";
        }


       // if ($prom8GesGl != 0) {
       //     $prom8CumpG =   $prom8GesGl / $prom8OpeGl * 100;
       //     $prom8CumpCrudoG =    $prom8GesGl / $prom8OpeGl * 100;
       //     $prom8CumpG = sprintf("%01.2f", $prom8CumpG) . "%";
       // } else {
       //     $prom8CumpG = "0%";
       //     $prom8CumpCrudoG =  "0%";
       // }


        if ($prom9GesGl != 0) {
            $prom9CumpG =   $prom9GesGl / $prom9OpeGl * 100;
            $prom9CumpCrudoG =    $prom9GesGl / $prom9OpeGl * 100;
            $prom9CumpG = sprintf("%01.2f", $prom9CumpG) . "%";
        } else {
            $prom9CumpG = "0%";
            $prom9CumpCrudoG =  "0%";
        }




        if ($prom1GesSl != 0) {
            $prom1CumpS =   $prom1GesSl / $prom1OpeSl * 100;
            $prom1CumpCrudoS =    $prom1GesSl / $prom1OpeSl * 100;
            $prom1CumpS = sprintf("%01.2f", $prom1CumpS) . "%";
        } else {
            $prom1CumpS = "0%";
            $prom1CumpCrudoS =  "0%";
        }

      //if ($prom2GesSl != 0) {
      //    $prom2CumpS =   $prom2GesSl / $prom2OpeSl * 100;
      //    $prom2CumpCrudoS =    $prom2GesSl / $prom2OpeSl * 100;
      //    $prom2CumpS = sprintf("%01.2f", $prom2CumpS) . "%";
      //} else {
      //    $prom2CumpS = "0%";
      //    $prom2CumpCrudoS =  "0%";
      //}

        if ($prom3GesSl != 0) {
            $prom3CumpS =   $prom3GesSl / $prom3OpeSl * 100;
            $prom3CumpCrudoS =    $prom3GesSl / $prom3OpeSl * 100;
            $prom3CumpS = sprintf("%01.2f", $prom3CumpS) . "%";
        } else {
            $prom3CumpS = "0%";
            $prom3CumpCrudoS =  "0%";
        }
        if ($prom4GesSl != 0) {
            $prom4CumpS =   $prom4GesSl / $prom4OpeSl * 100;
            $prom4CumpCrudoS =    $prom4GesSl / $prom4OpeSl * 100;
            $prom4CumpS = sprintf("%01.2f", $prom4CumpS) . "%";
        } else {
            $prom4CumpS = "0%";
            $prom4CumpCrudoS =  "0%";
        }

        if ($prom5GesSl != 0) {
            $prom5CumpS =   $prom5GesSl / $prom5OpeSl * 100;
            $prom5CumpCrudoS =    $prom5GesSl / $prom5OpeSl * 100;
            $prom5CumpS = sprintf("%01.2f", $prom5CumpS) . "%";
        } else {
            $prom5CumpS = "0%";
            $prom5CumpCrudoS =  "0%";
        }


        if ($prom6GesSl != 0) {
            $prom6CumpS =   $prom6GesSl / $prom6OpeSl * 100;
            $prom6CumpCrudoS =    $prom6GesSl / $prom6OpeSl * 100;
            $prom6CumpS = sprintf("%01.2f", $prom6CumpS) . "%";
        } else {
            $prom6CumpS = "0%";
            $prom6CumpCrudoS =  "0%";
        }

        if ($prom7GesSl != 0) {
            $prom7CumpS =   $prom7GesSl / $prom7OpeSl * 100;
            $prom7CumpCrudoS =    $prom7GesSl / $prom7OpeSl * 100;
            $prom7CumpS = sprintf("%01.2f", $prom7CumpS) . "%";
        } else {
            $prom7CumpS = "0%";
            $prom7CumpCrudoS =  "0%";
        }


       //if ($prom8GesSl != 0) {
       //    $prom8CumpS =   $prom8GesSl / $prom8OpeSl * 100;
       //    $prom8CumpCrudoS =    $prom8GesSl / $prom8OpeSl * 100;
       //    $prom8CumpS = sprintf("%01.2f", $prom8CumpS) . "%";
       //} else {
       //    $prom8CumpS = "0%";
       //    $prom8CumpCrudoS =  "0%";
       //}

        if ($prom9GesSl != 0) {
            $prom9CumpS =   $prom9GesSl / $prom9OpeSl * 100;
            $prom9CumpCrudoS =    $prom9GesSl / $prom9OpeSl * 100;
            $prom9CumpS = sprintf("%01.2f", $prom9CumpS) . "%";
        } else {
            $prom9CumpS = "0%";
            $prom9CumpCrudoS =  "0%";
        }



        if ($prom1GesBr != 0) {
            $prom1CumpB =   $prom1GesBr / $prom1OpeBr * 100;
            $prom1CumpCrudoB =    $prom1GesBr / $prom1OpeBr * 100;
            $prom1CumpB = sprintf("%01.2f", $prom1CumpB) . "%";
        } else {
            $prom1CumpB = "0%";
            $prom1CumpCrudoB =  "0%";
        }

       //if ($prom2GesBr != 0) {
       //    $prom2CumpB =   $prom2GesBr / $prom2OpeBr * 100;
       //    $prom2CumpCrudoB =    $prom2GesBr / $prom2OpeBr * 100;
       //    $prom2CumpB = sprintf("%01.2f", $prom2CumpB) . "%";
       //} else {
       //    $prom2CumpB = "0%";
       //    $prom2CumpCrudoB =  "0%";
       //}

        if ($prom3GesBr != 0) {
            $prom3CumpB =   $prom3GesBr / $prom3OpeBr * 100;
            $prom3CumpCrudoB =    $prom3GesBr / $prom3OpeBr * 100;
            $prom3CumpB = sprintf("%01.2f", $prom3CumpB) . "%";
        } else {
            $prom3CumpB = "0%";
            $prom3CumpCrudoB =  "0%";
        }
        if ($prom4GesBr != 0) {
            $prom4CumpB =   $prom4GesBr / $prom4OpeBr * 100;
            $prom4CumpCrudoB =    $prom4GesBr / $prom4OpeBr * 100;
            $prom4CumpB = sprintf("%01.2f", $prom4CumpB) . "%";
        } else {
            $prom4CumpB = "0%";
            $prom4CumpCrudoB =  "0%";
        }

        if ($prom5GesBr != 0) {
            $prom5CumpB =   $prom5GesBr / $prom5OpeBr * 100;
            $prom5CumpCrudoB =    $prom5GesBr / $prom5OpeBr * 100;
            $prom5CumpB = sprintf("%01.2f", $prom5CumpB) . "%";
        } else {
            $prom5CumpB = "0%";
            $prom5CumpCrudoB =  "0%";
        }


        if ($prom6GesBr != 0) {
            $prom6CumpB =   $prom6GesBr / $prom6OpeBr * 100;
            $prom6CumpCrudoB =    $prom6GesBr / $prom6OpeBr * 100;
            $prom6CumpB = sprintf("%01.2f", $prom6CumpB) . "%";
        } else {
            $prom6CumpB = "0%";
            $prom6CumpCrudoB =  "0%";
        }

        if ($prom7GesBr != 0) {
            $prom7CumpB =   $prom7GesBr / $prom7OpeBr * 100;
            $prom7CumpCrudoB =    $prom7GesBr / $prom7OpeBr * 100;
            $prom7CumpB = sprintf("%01.2f", $prom7CumpB) . "%";
        } else {
            $prom7CumpB = "0%";
            $prom7CumpCrudoB =  "0%";
        }

      // if ($prom8GesBr != 0) {
      //     $prom8CumpB =   $prom8GesBr / $prom8OpeBr * 100;
      //     $prom8CumpCrudoB =    $prom8GesBr / $prom8OpeBr * 100;
      //     $prom8CumpB = sprintf("%01.2f", $prom8CumpB) . "%";
      // } else {
      //     $prom8CumpB = "0%";
      //     $prom8CumpCrudoB =  "0%";
      // }


        if ($prom9GesBr != 0) {
            $prom9CumpB =   $prom9GesBr / $prom9OpeBr * 100;
            $prom9CumpCrudoB =    $prom9GesBr / $prom9OpeBr * 100;
            $prom9CumpB = sprintf("%01.2f", $prom9CumpB) . "%";
        } else {
            $prom9CumpB = "0%";
            $prom9CumpCrudoB =  "0%";
        }



        if ($totalGestionDia != 0) {
            $cumplimientoDia =    $totalGestionDia / $totalCargaDia  * 100;
            $cumplimientoDiaCrudo = $totalGestionDia / $totalCargaDia  * 100;
            $cumplimientoDia = sprintf("%01.2f", $cumplimientoDia) . "%";
        } else {
            $cumplimientoDiaCrudo = "0%";
            $cumplimientoDia = "0%";
        }
        if ($totalGestionMes != 0) {
            $cumplimientoMes =     $totalGestionMes / $totalCargaMes  * 100;
            $cumplimientoMesCrudo =  $totalGestionMes / $totalCargaMes  * 100;
            $cumplimientoMes = sprintf("%01.2f", $cumplimientoMes) . "%";
        } else {
            $cumplimientoMes = "0%";
            $cumplimientoMesCrudo = "0%";
        }
        //dd($prom1Ope);
        if ($prom1Ope != 0) {
            $prom1Cump = $prom1Ges / $prom1Ope  * 100;
            $prom1CumpCrudo =  $prom1Ges / $prom1Ope  * 100;
            $prom1Cump = sprintf("%01.2f", $prom1Cump) . "%";
        } else {
            $prom1Cump = "0%";
            $prom1CumpCrudo =  "0%";
        }

      // if ($prom2Ope != 0) {
      //     $prom2Cump = $prom2Ges / $prom2Ope  * 100;
      //     $prom2CumpCrudo =  $prom2Ges / $prom2Ope  * 100;
      //     $prom2Cump = sprintf("%01.2f", $prom2Cump) . "%";
      // } else {
      //     $prom2Cump = "0%";
      //     $prom2CumpCrudo =  "0%";
      // }

        if ($prom3Ope != 0) {
            $prom3Cump = $prom3Ges / $prom3Ope  * 100;
            $prom3CumpCrudo =  $prom3Ges / $prom3Ope  * 100;
            $prom3Cump = sprintf("%01.2f", $prom3Cump) . "%";
        } else {
            $prom3Cump = "0%";
            $prom3CumpCrudo =  "0%";
        }

        if ($prom4Ope != 0) {
            $prom4Cump = $prom4Ges / $prom4Ope  * 100;
            $prom4CumpCrudo =  $prom4Ges / $prom4Ope  * 100;
            $prom4Cump = sprintf("%01.2f", $prom4Cump) . "%";
        } else {
            $prom4Cump = "0%";
            $prom4CumpCrudo =  "0%";
        }

        if ($prom5Ope != 0) {
            $prom5Cump = $prom5Ges / $prom5Ope  * 100;
            $prom5CumpCrudo =  $prom5Ges / $prom5Ope  * 100;
            $prom5Cump = sprintf("%01.2f", $prom5Cump) . "%";
        } else {
            $prom5Cump = "0%";
            $prom5CumpCrudo =  "0%";
        }

        if ($prom6Ope != 0) {
            $prom6Cump = $prom6Ges / $prom6Ope  * 100;
            $prom6CumpCrudo =  $prom6Ges / $prom6Ope  * 100;
            $prom6Cump = sprintf("%01.2f", $prom6Cump) . "%";
        } else {
            $prom6Cump = "0%";
            $prom6CumpCrudo =  "0%";
        }
        if ($prom7Ope != 0) {
            $prom7Cump = $prom7Ges / $prom7Ope  * 100;
            $prom7CumpCrudo =  $prom7Ges / $prom7Ope  * 100;
            $prom7Cump = sprintf("%01.2f", $prom7Cump) . "%";
        } else {
            $prom7Cump = "0%";
            $prom7CumpCrudo =  "0%";
        }
        //if ($prom8Ope != 0) {
        //    $prom8Cump = $prom8Ges / $prom8Ope  * 100;
        //    $prom8CumpCrudo =  $prom8Ges / $prom8Ope  * 100;
        //    $prom8Cump = sprintf("%01.2f", $prom8Cump) . "%";
        //} else {
        //    $prom8Cump = "0%";
        //    $prom8CumpCrudo =  "0%";
        //}
        if ($prom9Ope != 0) {
            $prom9Cump = $prom9Ges / $prom9Ope  * 100;
            $prom9CumpCrudo =  $prom9Ges / $prom9Ope  * 100;
            $prom9Cump = sprintf("%01.2f", $prom9Cump) . "%";
        } else {
            $prom9Cump = "0%";
            $prom9CumpCrudo =  "0%";
        }
        if ($prom1OpeAcum != 0) {
            $prom1CumpAcum = $prom1GesAcum / $prom1OpeAcum  * 100;
            $prom1CumpAcumCrudo = $prom1GesAcum / $prom1OpeAcum  * 100;
            $prom1CumpAcum = sprintf("%01.2f", $prom1CumpAcum) . "%";
        } else {
            $prom1CumpAcum = "0%";
            $prom1CumpAcumCrudo = "0%";
        }

       //if ($prom2OpeAcum != 0) {
       //    $prom2CumpAcum = $prom2GesAcum / $prom2OpeAcum  * 100;
       //    $prom2CumpAcumCrudo = $prom2GesAcum / $prom2OpeAcum  * 100;
       //    $prom2CumpAcum = sprintf("%01.2f", $prom2CumpAcum) . "%";
       //} else {
       //    $prom2CumpAcum = "0%";
       //    $prom2CumpAcumCrudo = "0%";
       //}

        if ($prom3OpeAcum != 0) {
            $prom3CumpAcum = $prom3GesAcum / $prom3OpeAcum  * 100;
            $prom3CumpAcumCrudo = $prom3GesAcum / $prom3OpeAcum  * 100;
            $prom3CumpAcum = sprintf("%01.2f", $prom3CumpAcum) . "%";
        } else {
            $prom3CumpAcum = "0%";
            $prom3CumpAcumCrudo = "0%";
        }

        if ($prom4OpeAcum != 0) {
            $prom4CumpAcum = $prom4GesAcum / $prom4OpeAcum  * 100;
            $prom4CumpAcumCrudo = $prom4GesAcum / $prom4OpeAcum  * 100;
            $prom4CumpAcum = sprintf("%01.2f", $prom4CumpAcum) . "%";
        } else {
            $prom4CumpAcum = "0%";
            $prom4CumpAcumCrudo = "0%";
        }

        if ($prom5OpeAcum != 0) {
            $prom5CumpAcum = $prom5GesAcum / $prom5OpeAcum  * 100;
            $prom5CumpAcumCrudo = $prom5GesAcum / $prom5OpeAcum  * 100;
            $prom5CumpAcum = sprintf("%01.2f", $prom5CumpAcum) . "%";
        } else {
            $prom5CumpAcum = "0%";
            $prom5CumpAcumCrudo = "0%";
        }

        if ($prom6OpeAcum != 0) {
            $prom6CumpAcum = $prom6GesAcum / $prom6OpeAcum  * 100;
            $prom6CumpAcumCrudo = $prom6GesAcum / $prom6OpeAcum  * 100;
            $prom6CumpAcum = sprintf("%01.2f", $prom6CumpAcum) . "%";
        } else {
            $prom6CumpAcum = "0%";
            $prom6CumpAcumCrudo = "0%";
        }

        if ($prom7OpeAcum != 0) {
            $prom7CumpAcum = $prom7GesAcum / $prom7OpeAcum  * 100;
            $prom7CumpAcumCrudo = $prom7GesAcum / $prom7OpeAcum  * 100;
            $prom7CumpAcum = sprintf("%01.2f", $prom7CumpAcum) . "%";
        } else {
            $prom7CumpAcum = "0%";
            $prom7CumpAcumCrudo = "0%";
        }

        //if ($prom8OpeAcum != 0) {
        //    $prom8CumpAcum = $prom8GesAcum / $prom8OpeAcum  * 100;
        //    $prom8CumpAcumCrudo = $prom8GesAcum / $prom8OpeAcum  * 100;
        //    $prom8CumpAcum = sprintf("%01.2f", $prom8CumpAcum) . "%";
        //} else {
        //    $prom8CumpAcum = "0%";
        //    $prom8CumpAcumCrudo = "0%";
        //}

        if ($prom9OpeAcum != 0) {
            $prom9CumpAcum = $prom9GesAcum / $prom9OpeAcum  * 100;
            $prom9CumpAcumCrudo = $prom9GesAcum / $prom9OpeAcum  * 100;
            $prom9CumpAcum = sprintf("%01.2f", $prom9CumpAcum) . "%";
        } else {
            $prom9CumpAcum = "0%";
            $prom9CumpAcumCrudo = "0%";
        }

        $auditorOpe = PuntosAuditoria::where('fechaAsignado', $hoy)->pluck('asignadoA')->countBy();
        // $auditorGes = Auditoria::select('star')->whereDate('star', $hoy)->get();
        $auditorGes = Auditoria::whereDate('star', $hoy2)->pluck('promotor')->countBy();


        $auditorOpeAcum = PuntosAuditoria::pluck('asignadoA')->countBy();
        // $auditorGes = Auditoria::select('star')->whereDate('star', $hoy)->get();
        $auditorGesAcum = Auditoria::pluck('promotor')->countBy();

        //dd($auditorGes);


        $usuario1 = "MARIA ALEJANDRA LEMUS CASTIBLANCO";
        $usuario2 = "FLORALBA RINCON ROMERO";

        $sinErrorUs1 = Auditoria::where('criticidad', 'sin errores')->where('revisadoPor', $usuario1)->count();
        $fondoUs1 = Auditoria::where('criticidad', 'error critico de fondo')->where('revisadoPor', $usuario1)->count();
        $formaUs1 = Auditoria::where('criticidad', 'error critico de forma')->where('revisadoPor', $usuario1)->count();
        $ambosUs1 = Auditoria::where('criticidad', 'errores criticos de fondo y forma')->where('revisadoPor', $usuario1)->count();
        $pendienteUs1 = Auditoria::where('criticidad', 'Pendiente Calidad')->where('revisadoPor', $usuario1)->count();
        $casosUs1 =  $sinErrorUs1 + $fondoUs1 + $formaUs1 + $ambosUs1 + $pendienteUs1;

        $sinErrorUs2 = Auditoria::where('criticidad', 'sin errores')->where('revisadoPor', $usuario2)->count();
        $fondoUs2 = Auditoria::where('criticidad', 'error critico de fondo')->where('revisadoPor', $usuario2)->count();
        $formaUs2 = Auditoria::where('criticidad', 'error critico de forma')->where('revisadoPor', $usuario2)->count();
        $ambosUs2 = Auditoria::where('criticidad', 'errores criticos de fondo y forma')->where('revisadoPor', $usuario2)->count();
        $pendienteUs2 = Auditoria::where('criticidad', 'Pendiente Calidad')->where('revisadoPor', $usuario2)->count();
        $casosUs2 =  $sinErrorUs2 + $fondoUs2 + $formaUs2 + $ambosUs2 + $pendienteUs2;

        return view('auditoria.dash', compact(
            'totalpromOpeDiaGl',
            'prom1CumpDiaCrudoG',
            'totalpromOpeDiaSl',
            'prom1CumpDiaCrudoS',
            'totalpromOpeDiaBr',
            'prom1CumpDiaCrudoB',
            'totalpromOpeDiaGl',
            'totalpromOpeDiaSl',
            'totalpromOpeDiaBr',
            'prom1CumpG',
            'prom1CumpCrudoG',
            //'prom2CumpG',
            //prom2CumpCrudoG',
            'prom3CumpG',
            'prom3CumpCrudoG',
            'prom4CumpG',
            'prom4CumpCrudoG',
            'prom5CumpG',
            'prom5CumpCrudoG',
            'prom6CumpG',
            'prom6CumpCrudoG',
            'prom7CumpG',
            'prom7CumpCrudoG',
            //'prom8CumpG',
            //'prom8CumpCrudoG',
            'prom9CumpG',
            'prom9CumpCrudoG',


            'prom1CumpS',
            'prom1CumpCrudoS',
            //'prom2CumpS',
            //'prom2CumpCrudoS',
            'prom3CumpS',
            'prom3CumpCrudoS',
            'prom4CumpS',
            'prom4CumpCrudoS',
            'prom5CumpS',
            'prom5CumpCrudoS',
            'prom6CumpS',
            'prom6CumpCrudoS',
            'prom7CumpS',
            'prom7CumpCrudoS',
            //'prom8CumpS',
            //'prom8CumpCrudoS',
            'prom9CumpS',
            'prom9CumpCrudoS',

            'prom1CumpB',
            'prom1CumpCrudoB',
            //'prom2CumpB',
            //'prom2CumpCrudoB',
            'prom3CumpB',
            'prom3CumpCrudoB',
            'prom4CumpB',
            'prom4CumpCrudoB',
            'prom5CumpB',
            'prom5CumpCrudoB',
            'prom6CumpB',
            'prom6CumpCrudoB',
            'prom7CumpB',
            'prom7CumpCrudoB',
            //'prom8CumpB',
            //'prom8CumpCrudoB',
            'prom9CumpB',
            'prom9CumpCrudoB',



            'prom1GesGl',
            //'prom2GesGl',
            'prom3GesGl',
            'prom4GesGl',
            'prom5GesGl',
            'prom6GesGl',
            'prom7GesGl',
            //'prom8GesGl',
            'prom9GesGl',
            'totalpromGesGl',
            'prom1GesSl',
            //'prom2GesSl',
            'prom3GesSl',
            'prom4GesSl',
            'prom5GesSl',
            'prom6GesSl',
            'prom7GesSl',
            //'prom8GesSl',
            'prom9GesSl',
            'totalpromGesSl',
            'prom1GesBr',
            //'prom2GesBr',
            'prom3GesBr',
            'prom4GesBr',
            'prom5GesBr',
            'prom6GesBr',
            'prom7GesBr',
            //'prom8GesBr',
            'prom9GesBr',
            'totalpromGesBr',
            'totalpromOpeGl',
            'totalpromOpeSl',
            'totalpromOpeBr',
            'prom1OpeGl',
            //'prom2OpeGl',
            'prom3OpeGl',
            'prom4OpeGl',
            'prom5OpeGl',
            'prom6OpeGl',
            'prom7OpeGl',
            //'prom8OpeGl',
            'prom9OpeGl',
            'prom1OpeSl',
            //'prom2OpeSl',
            'prom3OpeSl',
            'prom4OpeSl',
            'prom5OpeSl',
            'prom6OpeSl',
            'prom7OpeSl',
            //'prom8OpeSl',
            'prom9OpeSl',
            'prom1OpeBr',
            //'prom2OpeBr',
            'prom3OpeBr',
            'prom4OpeBr',
            'prom5OpeBr',
            'prom6OpeBr',
            'prom7OpeBr',
            //'prom8OpeBr',
            'prom9OpeBr',
            'asignaciones',
            'sumpromGesAct',
            'sumpromGesIn',
            'prom1GesAct',
            //'prom2GesAct',
            'prom3GesAct',
            'prom4GesAct',
            'prom5GesAct',
            'prom6GesAct',
            'prom7GesAct',
            //'prom8GesAct',
            'prom9GesAct',
            'prom1GesIn',
            //'prom2GesIn',
            'prom3GesIn',
            'prom4GesIn',
            'prom5GesIn',
            'prom6GesIn',
            'prom7GesIn',
            //'prom8GesIn',
            'prom9GesIn',
            'totalUsuarios',
            'cumplimientoDiaCrudo',
            'cumplimientoMesCrudo',
            'today',
            'totalCargaDia',
            'totalCargaMes',
            'totalGestionDia',
            'totalGestionMes',
            'cumplimientoDia',
            'cumplimientoMes',
            'hoy3',
            'prom1OpeAcum',
            //'prom2OpeAcum',
            'prom3OpeAcum',
            'prom4OpeAcum',
            'prom5OpeAcum',
            'prom6OpeAcum',
            'prom7OpeAcum',
            //'prom8OpeAcum',
            'prom9OpeAcum',
            'prom1GesAcum',
            //'prom2GesAcum',
            'prom3GesAcum',
            'prom4GesAcum',
            'prom5GesAcum',
            'prom6GesAcum',
            'prom7GesAcum',
            //'prom8GesAcum',
            'prom9GesAcum',
            'prom1CumpCrudo',
            //'prom2CumpCrudo',
            'prom3CumpCrudo',
            'prom4CumpCrudo',
            'prom5CumpCrudo',
            'prom6CumpCrudo',
            'prom7CumpCrudo',
            //'prom8CumpCrudo',
            'prom9CumpCrudo',
            'prom1CumpAcum',
            //'prom2CumpAcum',
            'prom3CumpAcum',
            'prom4CumpAcum',
            'prom5CumpAcum',
            'prom6CumpAcum',
            'prom7CumpAcum',
            //'prom8CumpAcum',
            'prom9CumpAcum',

            'prom1CumpAcumCrudo',
            //'prom2CumpAcumCrudo',
            'prom3CumpAcumCrudo',
            'prom4CumpAcumCrudo',
            'prom5CumpAcumCrudo',
            'prom6CumpAcumCrudo',
            'prom7CumpAcumCrudo',
            //'prom8CumpAcumCrudo',
            'prom9CumpAcumCrudo',
            'prom1Ope',
            //'prom2Ope',
            'prom3Ope',
            'prom4Ope',
            'prom5Ope',
            'prom6Ope',
            'prom7Ope',
            //'prom8Ope',
            'prom9Ope',
            'prom1Ges',
            //'prom2Ges',
            'prom3Ges',
            'prom4Ges',
            'prom5Ges',
            'prom6Ges',
            'prom7Ges',
            //'prom8Ges',
            'prom9Ges',
            'prom1Cump',
            //'prom2Cump',
            'prom3Cump',
            'prom4Cump',
            'prom5Cump',
            'prom6Cump',
            'prom7Cump',
            //'prom8Cump',
            'prom9Cump',

            'promotor1',
            //'promotor2',
            'promotor3',
            'promotor4',
            'promotor5',
            'promotor6',
            'promotor7',
            //'promotor8',
            'promotor9',
            'auditorOpeAcum',
            'auditorGesAcum',
            'sinErrorUs1',
            'fondoUs1',
            'formaUs1',
            'ambosUs1',
            'pendienteUs1',
            'auditorOpe',
            'auditorGes',
            'casosUs1',
            'casosUs2',
            'sinErrorUs2',
            'fondoUs2',
            'formaUs2',
            'ambosUs2',
            'pendienteUs2',
            'usuario1',
            'usuario2',
            'auditorCal',
            'hoy',
            'hora',
            'puntos',
            'auditoria',
            'usuarios',
            'activos',
            'inactivos',
            'tipoJuegos',
            'tipoJuegosPercent',
            'tipoTiendaPercent',
            'tipoBarPercent',
            'tipoLicoPercent',
            'tipoOtroPercent',
            'tipoBar',
            'tipoTienda',
            'tipoLico',
            'tipoOtro',
            'oro',
            'plata',
            'bronce',
            'user',
            'asignados',
            'diligenciados',
            'noConcretados',
            'disponibles',
            'enTramite',
            'asignadosG',
            'diligenciadosG',
            'noConcretadosG',
            'disponiblesG',
            'enTramiteG',
            'asignadosS',
            'diligenciadosS',
            'noConcretadosS',
            'disponiblesS',
            'enTramiteS',
            'asignadosB',
            'diligenciadosB',
            'noConcretadosB',
            'disponiblesB',
            'enTramiteB',
            'sinError',
            'fondo',
            'forma',
            'ambos',
            'pendiente',
            'sinErrorG',
            'fondoG',
            'formaG',
            'ambosG',
            'pendienteG',
            'sinErrorS',
            'fondoS',
            'formaS',
            'ambosS',
            'pendienteS',
            'sinErrorB',
            'fondoB',
            'formaB',
            'ambosB',
            'pendienteB',
            'usuarioBta',
            'usuarioBtaCount',
            'usuarioMed',
            'usuarioMedCount',
            'usuarioBar',
            'usuarioBarCount',
            'usuarioBuc',
            'usuarioBucCount',
            'usuarioCal',
            'usuarioCalCount',
            'activosBta',
            'inactivosBta',
            'activosMed',
            'inactivosMed',
            'activosBar',
            'inactivosBar',
            'activosBuc',
            'inactivosBuc',
            'activosCal',
            'inactivosCal',
            'sumActivos',
            'sumInactivos',
            'totalAuditorias',
            'totalPuntos',
            'pendientes',
            'cumpliVisitas',
            'auditoriaCount',
            'oroB1',
            'plataB1',
            'bronceB1',
            'cumpliGold',
            'cumpliSilver',
            'cumpliBronce',
            'cumpliTotal',
            'asignadosBtaG',
            'diligenciadosBtaG',
            'noConcretadosBtaG',
            'disponiblesBtaG',
            'enTramiteBtaG',
            'asignadosMedG',
            'diligenciadosMedG',
            'noConcretadosMedG',
            'disponiblesMedG',
            'enTramiteMedG',
            'asignadosBarG',
            'diligenciadosBarG',
            'noConcretadosBarG',
            'disponiblesBarG',
            'enTramiteBarG',
            'asignadosBucG',
            'diligenciadosBucG',
            'noConcretadosBucG',
            'disponiblesBucG',
            'enTramiteBucG',
            'asignadosCalG',
            'diligenciadosCalG',
            'noConcretadosCalG',
            'disponiblesCalG',
            'enTramiteCalG',
            'asignadosBtaS',
            'diligenciadosBtaS',
            'noConcretadosBtaS',
            'disponiblesBtaS',
            'enTramiteBtaS',
            'asignadosMedS',
            'diligenciadosMedS',
            'noConcretadosMedS',
            'disponiblesMedS',
            'enTramiteMedS',
            'asignadosBarS',
            'diligenciadosBarS',
            'noConcretadosBarS',
            'disponiblesBarS',
            'enTramiteBarS',
            'asignadosBucS',
            'diligenciadosBucS',
            'noConcretadosBucS',
            'disponiblesBucS',
            'enTramiteBucS',
            'asignadosCalS',
            'diligenciadosCalS',
            'noConcretadosCalS',
            'disponiblesCalS',
            'enTramiteCalS',
            'asignadosBtaB',
            'diligenciadosBtaB',
            'noConcretadosBtaB',
            'disponiblesBtaB',
            'enTramiteBtaB',
            'asignadosMedB',
            'diligenciadosMedB',
            'noConcretadosMedB',
            'disponiblesMedB',
            'enTramiteMedB',
            'asignadosBarB',
            'diligenciadosBarB',
            'noConcretadosBarB',
            'disponiblesBarB',
            'enTramiteBarB',
            'asignadosBucB',
            'diligenciadosBucB',
            'noConcretadosBucB',
            'disponiblesBucB',
            'enTramiteBucB',
            'asignadosCalB',
            'diligenciadosCalB',
            'noConcretadosCalB',
            'disponiblesCalB',
            'enTramiteCalB',
            'sinErrorBta',
            'fondoBta',
            'formaBta',
            'ambosBta',
            'pendienteBta',
            'sinErrorMed',
            'fondoMed',
            'formaMed',
            'ambosMed',
            'pendienteMed',
            'sinErrorBar',
            'fondoBar',
            'formaBar',
            'ambosBar',
            'pendienteBar',
            'sinErrorBuc',
            'fondoBuc',
            'formaBuc',
            'ambosBuc',
            'pendienteBuc',
            'sinErrorCal',
            'fondoCal',
            'formaCal',
            'ambosCal',
            'pendienteCal',
            'oroBog',
            'plataBog',
            'bronceBog',
            'totalBog',
            'oroMed',
            'plataMed',
            'bronceMed',
            'totalMed',
            'oroBar',
            'plataBar',
            'bronceBar',
            'totalBar',
            'oroBuc',
            'plataBuc',
            'bronceBuc',
            'totalBuc',
            'oroCal',
            'plataCal',
            'bronceCal',
            'totalCal',
            'totalCalidad',
            'totalBta',
            'totalMed',
            'totalBar',
            'totalBuc',
            'totalCali',
            'sinErrorBtaG',
            'fondoBtaG',
            'formaBtaG',
            'ambosBtaG',
            'pendienteBtaG',
            'totalBtaG',
            'sinErrorMedG',
            'fondoMedG',
            'formaMedG',
            'ambosMedG',
            'pendienteMedG',
            'totalMedG',
            'sinErrorBarG',
            'fondoBarG',
            'formaBarG',
            'ambosBarG',
            'pendienteBarG',
            'totalBarG',
            'sinErrorBucG',
            'fondoBucG',
            'formaBucG',
            'ambosBucG',
            'pendienteBucG',
            'totalBucG',
            'sinErrorCalG',
            'fondoCalG',
            'formaCalG',
            'ambosCalG',
            'pendienteCalG',
            'totalCalG',
            'totalGolds',
            'sinErrorBtaS',
            'fondoBtaS',
            'formaBtaS',
            'ambosBtaS',
            'pendienteBtaS',
            'totalBtaS',
            'sinErrorMedS',
            'fondoMedS',
            'formaMedS',
            'ambosMedS',
            'pendienteMedS',
            'totalMedS',
            'sinErrorBarS',
            'fondoBarS',
            'formaBarS',
            'ambosBarS',
            'pendienteBarS',
            'totalBarS',
            'sinErrorBucS',
            'fondoBucS',
            'formaBucS',
            'ambosBucS',
            'pendienteBucS',
            'totalBucS',
            'sinErrorCalS',
            'fondoCalS',
            'formaCalS',
            'ambosCalS',
            'pendienteCalS',
            'totalCalS',
            'totalSilvers',
            'sinErrorBtaB',
            'fondoBtaB',
            'formaBtaB',
            'ambosBtaB',
            'pendienteBtaB',
            'totalBtaB',
            'sinErrorMedB',
            'fondoMedB',
            'formaMedB',
            'ambosMedB',
            'pendienteMedB',
            'totalMedB',
            'sinErrorBarB',
            'fondoBarB',
            'formaBarB',
            'ambosBarB',
            'pendienteBarB',
            'totalBarB',
            'sinErrorBucB',
            'fondoBucB',
            'formaBucB',
            'ambosBucB',
            'pendienteBucB',
            'totalBucB',
            'sinErrorCalB',
            'fondoCalB',
            'formaCalB',
            'ambosCalB',
            'pendienteCalB',
            'totalCalB',
            'totalBronces',
        ));
    }
}
