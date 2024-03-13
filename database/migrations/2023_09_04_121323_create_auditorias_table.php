<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void

    {
        Schema::create(
            'auditorias',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedInteger('precarga_id');
                $table->string('razonSocial', 150);
                $table->bigInteger('nit');
                $table->string('direccion', 150);
                $table->bigInteger('telefono');
                $table->string('departamento', 22);
                $table->string('municipio', 60);
                $table->string('barrio', 60);
                $table->string('activacion', 10);
                $table->string('noConcreciones', 26)->nullable();
                $table->string('cual', 30)->nullable();
                $table->longText('observaciones', 100)->nullable();
                $table->binary('fotoActiv');
                $table->string('latitude', 20);
                $table->string('longitude', 20);
                $table->dateTime('star');
                $table->string('promotor', 100);
                $table->string('state_tipologia', 12)->nullable();
                $table->string('tipologia', 20)->nullable();
                $table->binary('fototipologia')->nullable();
                $table->string('state_segmento', 15)->nullable();
                $table->string('segmento', 20)->nullable();
                $table->binary('fotosegmento')->nullable();
                $table->integer('caja_cerveza')->nullable();
                $table->integer('caja_aguardiente')->nullable();
                $table->integer('caja_ron')->nullable();
                $table->integer('caja_whiskey')->nullable();
                $table->string('cenefa', 10)->nullable();
                $table->string('cenefa_visi', 15)->nullable();
                $table->string('cenefa_colo', 15)->nullable();
                $table->binary('seleccionCenefa')->nullable();
                $table->string('afiche', 15)->nullable();
                $table->string('afiche_visi', 20)->nullable();
                $table->string('afiche_colo', 20)->nullable();
                $table->string('marca_combo', 20)->nullable();
                $table->string('aficheCombotizado', 20)->nullable();
                $table->string('combox1', 20)->nullable();
                $table->string('combox2', 20)->nullable();
                $table->string('combox3', 20)->nullable();
                $table->binary('seleccionAfiche')->nullable();
                $table->string('marco', 8)->nullable();
                $table->string('marco_visi', 15)->nullable();
                $table->string('marco_colo', 15)->nullable();
                $table->binary('seleccionMarco')->nullable();
                $table->string('rompetraficos', 20)->nullable();
                $table->string('prod_rt_visibles', 25)->nullable();
                $table->string('prod_rt_properly', 25)->nullable();
                $table->binary('seleccionRompetrafico')->nullable();
                $table->string('fachadas', 11)->nullable();
                $table->string('fachadas_visi', 20)->nullable();
                $table->string('fachadas_colo', 20)->nullable();
                $table->binary('seleccionFaxada')->nullable();
                $table->string('hielera', 10)->nullable();
                $table->string('hl_con_prod', 25)->nullable();
                $table->string('prod_hl_visible', 25)->nullable();
                $table->string('prod_hl_danadas', 25)->nullable();
                $table->binary('seleccionHielera')->nullable();
                $table->string('bases_h', 10)->nullable();
                $table->string('baseshl_con_prod', 30)->nullable();
                $table->string('prod_baseshl_visible', 30)->nullable();
                $table->string('prod_baseshl_danadas', 30)->nullable();
                $table->binary('seleccionBase_h')->nullable();
                $table->string('dosificadorD', 15)->nullable();
                $table->string('prod_dsD_visibles', 22)->nullable();
                $table->string('prod_dsD_diferentes', 22)->nullable();
                $table->string('prod_dsD_danados', 22)->nullable();
                $table->binary('seleccionDosificadorD')->nullable();
                $table->string('dosificadorS', 15)->nullable();
                $table->string('prod_dsS_visibles', 30)->nullable();
                $table->string('prod_dsS_diferentes', 30)->nullable();
                $table->string('prod_dsS_danados', 30)->nullable();
                $table->binary('seleccionDosificadorS')->nullable();
                $table->string('branding', 11)->nullable();
                $table->string('branding_visible', 30)->nullable();
                $table->string('branding_danados', 30)->nullable();
                $table->binary('seleccionBranding')->nullable();
                $table->string('vasos', 8)->nullable();
                $table->string('vasos_visibles', 30)->nullable();
                $table->string('vasos_quebrados', 30)->nullable();
                $table->binary('seleccionVasos')->nullable();
                $table->string('bAndw1000', 12)->nullable();
                $table->integer('caras_bAndw1000')->nullable();
                $table->string('precio_bAndw1000', 20)->nullable();
                $table->string('bAndw700', 11)->nullable();
                $table->integer('caras_bAndw700')->nullable();
                $table->string('precio_bAndw700', 20)->nullable();
                $table->string('bAndw375', 11)->nullable();
                $table->integer('caras_bAndw375')->nullable();
                $table->string('precio_bAndw375', 20)->nullable();
                $table->string('smirnoff700', 14)->nullable();
                $table->integer('caras_smirnoff700')->nullable();
                $table->string('precio_smirnoff700', 20)->nullable();
                $table->string('smirnoff375', 14)->nullable();
                $table->integer('caras_smirnoff375')->nullable();
                $table->string('precio_smirnoff375', 20)->nullable();
                $table->string('smirnoff_ns700', 14)->nullable();
                $table->integer('caras_smirnoff_ns700')->nullable();
                $table->string('precio_smirnoff_ns700', 20)->nullable();
                $table->string('smirnoff_ns375', 14)->nullable();
                $table->integer('caras_smirnoff_ns375')->nullable();
                $table->string('precio_smirnoff_ns375', 20)->nullable();
                $table->string('jhonnie1000', 14)->nullable();
                $table->integer('caras_jhonnie1000')->nullable();
                $table->string('precio_jhonnie1000', 20)->nullable();
                $table->string('jhonnie700', 13)->nullable();
                $table->integer('caras_jhonnie700')->nullable();
                $table->string('precio_jhonnie700', 20)->nullable();
                $table->string('jhonnie375', 13)->nullable();
                $table->integer('caras_jhonnie375')->nullable();
                $table->string('precio_jhonnie375', 20)->nullable();
                $table->string('oldparr750', 13)->nullable();
                $table->integer('caras_oldparr750')->nullable();
                $table->string('precio_oldparr750', 20)->nullable();
                $table->string('buchannas700', 15)->nullable();
                $table->integer('caras_buchannas700')->nullable();
                $table->string('precio_buchannas700', 20)->nullable();
                $table->string('buchannas375', 15)->nullable();
                $table->integer('caras_buchannas375')->nullable();
                $table->string('precio_buchannas375', 20)->nullable();
                $table->binary('seleccionLinealDiageo')->nullable();
                $table->string('cal_marc_visible', 50)->nullable();
                $table->string('cal_marc_danados', 50)->nullable();
                $table->string('cal_marc_et_danados', 50)->nullable();
                $table->string('hay_ron', 26)->nullable();
                $table->string('comp_ron1', 26)->nullable();
                $table->string('caras_comp_ron')->nullable();
                $table->string('precio_comp_ron1', 20)->nullable();
                $table->string('comp_ron2', 26)->nullable();
                $table->string('precio_comp_ron2', 20)->nullable();
                $table->binary('seleccionLinealR')->nullable();
                $table->string('hay_aguardiente', 30)->nullable();
                $table->string('comp_aguard1', 45)->nullable();
                $table->string('caras_comp_aguardiente')->nullable();
                $table->string('precio_comp_aguardiente1', 20)->nullable();
                $table->string('comp_aguard2', 45)->nullable();
                $table->string('precio_comp_aguardiente2', 20)->nullable();
                $table->binary('seleccionLinealA')->nullable();
                $table->string('ron_byw', 10)->nullable();
                $table->string('bloquebyw', 10)->nullable();
                $table->string('carasbloquebyw', 25)->nullable();
                $table->binary('seleccionron_byw')->nullable();
                $table->string('ron_jhonny', 13)->nullable();
                $table->string('bloquejohnnie', 10)->nullable();
                $table->string('carasbloquejohnnie', 25)->nullable();
                $table->binary('seleccionron_jhonny')->nullable();
                $table->string('aguard_smirnoff', 18)->nullable();
                $table->string('bloquesmirnoff', 10)->nullable();
                $table->string('carasbloquesmirnoff', 25)->nullable();
                $table->binary('seleccionaguard_smirnoff')->nullable();
                $table->string('gift', 7)->nullable();
                $table->integer('cant_gift')->nullable();
                $table->binary('selecciongift')->nullable();
                $table->longtext('observacionesDetallista')->nullable();
                $table->string('revisionCalidad', 600)->nullable();
                $table->date('fechaCalidad')->nullable();
                $table->string('criticidad', 200)->nullable();
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auditorias');
    }
};
