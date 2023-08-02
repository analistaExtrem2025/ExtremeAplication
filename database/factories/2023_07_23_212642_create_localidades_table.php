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
            $table->integer('id_localidad');
            $table->unsignedBigInteger('ciudad_id');
            $table->foreign('ciudad_id')
                ->references('id_ciudad')
                ->on('ciudad')
                ->onDelete('cascade');
            $table->string('localidades');
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
