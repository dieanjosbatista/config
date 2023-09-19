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
        Schema::create('plano_viagem', function (Blueprint $table) {
            $table->id();
            $table->string('sequencia');
            $table->string('cto');
            $table->string('ponto_parada');
            $table->string('km');
            $table->string('chegada');
            $table->string('partida');
            $table->string('servico');
            $table->string('espera');
            $table->string('livre');
            $table->string('horas');
            $table->string('servicos');
            $table->string('endereco');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plano_viagem');
    }
};
