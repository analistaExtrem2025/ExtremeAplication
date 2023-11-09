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
            'calidad_auditorias',
            function (Blueprint $table) {
                $table->increments("id");
                $table->integer('precarga_id');
                $table->string('auditadoPor');
                $table->longText('comentarios');
                $table->longText('observacionesCalidad');
                $table->string('criticidad');
                $table->date('fechaRevision');
                $table->string('revisadoPor');
                $table->string('estadoCalidad');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calidad_auditorias');
    }
};
