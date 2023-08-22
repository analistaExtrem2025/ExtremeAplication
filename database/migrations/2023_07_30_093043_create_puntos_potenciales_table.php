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
        Schema::create('puntos_potenciales', function (Blueprint $table) {
            $table->id();
            $table->string('fachada');
            $table->string('canal');
            $table->string('lat');
            $table->string('lon');
            $table->string('registradoPor');
            $table->string('departamento');
            $table->string('municipio');
            $table->string('localidad');
            $table->string('gestionCalidad')->nullable();
            $table->string('estatusCalidad')->nullable();
            $table->string('ObsCalidad')->nullable();
            $table->string('responsableCalidad')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puntos_potenciales');
    }
};
