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
        Schema::create('fotografias', function (Blueprint $table) {
            $table->id();
            $table->string('direccion_img');
            $table->string('precio');
          //  $table->unsignedBigInteger('id_catalogo');
          //  $table->foreign('id_catalogo')->references('id')->on('catalogos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fotografias');
    }
};
