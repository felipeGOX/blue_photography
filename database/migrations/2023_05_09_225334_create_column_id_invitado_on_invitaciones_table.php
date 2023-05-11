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
        Schema::table('invitaciones', function (Blueprint $table) {
            $table->unsignedBigInteger('id_invitado');
            $table->date('fecha')->nullable()->change();
            $table->time('hora')->nullable()->change();
            $table->text('descripcion')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invitaciones', function($table) {
            $table->dropColumn('id_invitado');
            $table->date('fecha')->nullable()->change();
            $table->time('hora')->nullable()->change();
            $table->text('descripcion')->nullable()->change();
        });
    }
};
