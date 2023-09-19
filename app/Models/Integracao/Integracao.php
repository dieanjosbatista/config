<?php

namespace App\Models\Integracao;

use App\Models\Cadastro\Ficha_Tecnica;
use App\Models\Cadastro\Motorista;
use App\Models\Cadastro\Plano_Viagem;
use App\Models\Cadastro\Transportadora;
use App\Models\Cadastro\Veiculo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Integracao extends Model
{
    use HasFactory;
    protected $table = 'integracao';

    protected $fillable = [
        'id_situacao_integracao',
        'id_ficha_tecnica',
        'id_transportadora',
        'id_veiculo',
        'id_plano_viagem',
        'id_motorista_1',
        'id_motorista_2',
        'id_motorista_3',
        'id_motorista_4',
        'periodo_inicial_1',
        'periodo_final_1',
        'periodo_inicial_2',
        'periodo_final_2',
        'periodo_inicial_3',
        'periodo_final_3',
        'periodo_inicial_4',
        'periodo_final_4',
    ];

    protected $casts = [
        'created_at' => 'date:d/m/Y H:i', // Define o cast para o atributo 'data' no formato d/m/Y
    ];

    public function situacao(){
        return $this->belongsTo(Integracao_Situacao::class, 'id_situacao_integracao');
    }
    public function fichaTecnica(){
        return $this->belongsTo(Ficha_Tecnica::class, 'id_ficha_tecnica');
    }
    public function trasportadora(){
        return $this->belongsTo(Transportadora::class, 'id_transportadora');
    }
    public function veiculo(){
        return $this->belongsTo(Veiculo::class, 'id_veiculo');
    }

    public function planoViagem(){
        return $this->belongsTo(Plano_Viagem::class, 'id_plano_viagem');
    }

    public function motorista1(){
        return $this->belongsTo(Motorista::class, 'id_motorista_1');
    }

    public function motorista2(){
        return $this->belongsTo(Motorista::class, 'id_motorista_1');
    }

    public function motorista3(){
        return $this->belongsTo(Motorista::class, 'id_motorista_1');
    }

    public function motorista4(){
        return $this->belongsTo(Motorista::class, 'id_motorista_1');
    }
}
