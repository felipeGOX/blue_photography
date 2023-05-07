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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_evento');
            $table->string('direccion');
            $table->date('fecha');
            $table->time('hora');
            $table->string('estado')->nullable();
            $table->unsignedBigInteger('id_fotografo');
            $table->foreign('id_fotografo')->references('id')->on('fotografos');
            $table->unsignedBigInteger('id_organizador');
            $table->foreign('id_organizador')->references('id')->on('organizadores');
            $table->unsignedBigInteger('id_paquete')->nullable();
            $table->foreign('id_paquete')->references('id')->on('paquetes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
