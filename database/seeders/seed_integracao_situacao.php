<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class seed_integracao_situacao extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('integracao_situacao')->insert([
            'nome' => 'Integração Pendente'        
        ]);
        DB::table('integracao_situacao')->insert([
            'nome' => 'Integração Hoje'        
        ]);
        DB::table('integracao_situacao')->insert([
            'nome' => 'Integração Amanhã'        
        ]);
        DB::table('integracao_situacao')->insert([
            'nome' => 'Integração Concluída'        
        ]);
    }
}
