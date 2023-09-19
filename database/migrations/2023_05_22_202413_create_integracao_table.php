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
        Schema::create('integracao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_situacao_integracao')->default(1)->constrained('integracao_situacao');
            $table->foreignId('id_ficha_tecnica')->constrained('ficha_tecnica');
            $table->foreignId('id_transportadora')->constrained('transportadora');
            $table->foreignId('id_veiculo')->constrained('veiculo');
            $table->foreignId('id_plano_viagem')->constrained('plano_viagem');
            $table->foreignId('id_motorista_1')->constrained('motorista');
            $table->foreignId('id_motorista_2')->nullable()->constrained('motorista');
            $table->foreignId('id_motorista_3')->nullable()->constrained('motorista');
            $table->foreignId('id_motorista_4')->nullable()->constrained('motorista');
            $table->time('periodo_inicial_1');
            $table->time('periodo_final_1');
            $table->time('periodo_inicial_2');
            $table->time('periodo_final_2');
            $table->time('periodo_inicial_3');
            $table->time('periodo_final_3');
            $table->time('periodo_inicial_4');
            $table->time('periodo_final_4');
            $table->dateTime('hora_integracao_correios')->nullable();
            $table->integer('error')->default(0);
            $table->string('erro_integracao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('integracao_situacao_id');
    }
};