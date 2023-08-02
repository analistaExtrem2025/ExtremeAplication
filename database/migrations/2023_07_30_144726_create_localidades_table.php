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
        Schema::create('localidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('departamento_id');
            $table->unsignedInteger('municipio_id');

            $table->foreign('departamento_id')
                ->references('id')->on('departamentos');
            $table->foreign('municipio_id')->references('id')->on('municipios');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('localidades');
    }
};
