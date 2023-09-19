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
        Schema::create('ficha_tecnica', function (Blueprint $table) {
            $table->id();
            $table->string('origem');
            $table->string('destino');
            $table->string('numero_ft');
            $table->string('numero_linha');
            $table->string('vigencia_inicial');
            $table->string('frequencia');
            $table->string('sentido');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ficha_tecnica');
    }
};
