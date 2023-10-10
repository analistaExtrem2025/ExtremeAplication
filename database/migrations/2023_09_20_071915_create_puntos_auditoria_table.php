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
            'puntos_auditoria',
            function (Blueprint $table) {
                $table->id();
                $table->bigInteger('id_femsa');
                $table->bigInteger('codigo_femsa');
                $table->string('tipoDocumento');
                $table->bigInteger('nit');
                $table->string('nombreNegocio');
                $table->string('razonSocial');
                $table->string('direccion');
                $table->string('latitude');
                $table->string('longitude');
                $table->bigInteger('telFijo');
                $table->bigInteger('telCelular');
                $table->string('mail');
                $table->string('departamento');
                $table->string('municipio');
                $table->string('barrio');
                $table->string('tipologia');
                $table->string('segmentacion');
                $table->string('nombreContacto');
                $table->string('apellidoContacto');
                $table->string('telContacto');
                $table->string('asignadoA');
                $table->string('estatusGestion');
                $table->date('fechaAsignado');
                $table->date('fechaFiializado');
                $table->timestamps();


            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puntos_auditoria');
    }
};
