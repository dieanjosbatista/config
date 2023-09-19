<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('transportadora', function (Blueprint $table) {
            $table->id();
            $table->string('razao_social');
            $table->string('nome_fantasia');
            $table->string('cep', 10);
            $table->string('endereco');
            $table->string('complemento');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('cnpj', 20);
            $table->string('contato', 20);
            $table->string('email');
            $table->string('responsavel_nome');
            $table->string('responsavel_email');
            $table->string('responsavel_cpf');
            $table->string('responsavel_rg');
            $table->string('responsavel_contato');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('transportadora');
    }
};
