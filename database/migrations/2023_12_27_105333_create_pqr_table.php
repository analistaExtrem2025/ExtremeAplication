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
        Schema::create('pqr', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('area', 50);
            $table->bigInteger('femsa_id')->nullable();
            $table->string('tituloReq', 150);
            $table->longText('detalle', 600);
            $table->string('evidenciapqr')->nullable();
            $table->string('estatusRespuesta', 100);
            $table->string('creado_por', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pqr');
    }
};
