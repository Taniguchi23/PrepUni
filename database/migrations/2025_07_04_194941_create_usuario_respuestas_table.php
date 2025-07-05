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
        Schema::create('usuario_respuestas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('examen_id')->references('id')->on('examenes');
            $table->foreignId('pregunta_id')->references('id')->on('preguntas');
            $table->foreignId('respuesta_id')->references('id')->on('respuestas');
            $table->char('estado',1)->default('A')->comment('A: Activo | I: Inactivo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_respuestas');
    }
};
