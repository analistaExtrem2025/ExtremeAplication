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
        Schema::create('encuestas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('clienteFemsa')->nullable();
            $table->unsignedBigInteger('codigo')->nullable();
            $table->string('razonSocial', 80)->nullable();
            $table->string('tipoD', 40)->nullable();
            $table->unsignedBigInteger('nDocumento')->nullable();
            $table->string('nombreNegocio', 80)->nullable();
            $table->unsignedBigInteger('nFijo')->nullable();
            $table->unsignedBigInteger('nCelular')->nullable();
            $table->string('email', 40)->nullable();
            $table->string('departamento', 50);
            $table->string('municipio', 50);
            $table->string('localidad', 50);
            $table->string('barrio', 80);
            $table->string('direccion', 150);
            $table->string('latitude', 20);
            $table->string('longitude', 20);
            $table->dateTime('star');
            $table->string('promotor', 100);
            $table->string('canal', 35)->nullable();
            $table->string('nombre_contacto', 60)->nullable();
            $table->string('apellidos_contacto', 60)->nullable();
            $table->unsignedBigInteger('telContacto')->nullable();
            $table->boolean('mane_licores')->nullable();
            $table->string('venta_$$$', 25)->nullable();
            $table->string('tamañoEst')->nullable();
            $table->string('estadoCarga')->nullable();
            $table->string('motivo_nc')->nullable();
            $table->string('gestionActual');
            $table->date('fechaCalidad')->nullable();
            $table->string('usuarioCalidad')->nullable();
            $table->longText('obsCierre')->nullable();
            $table->boolean('gift')->nullable();
            $table->integer('cantidad')->nullable();
            $table->string('portafolioDiageo', 250)->nullable();
            $table->string('fotoActiv')->nullable();
            $table->string('fotoDocs')->nullable();
            $table->string('fotoGifts')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encuestas');
    }
};
