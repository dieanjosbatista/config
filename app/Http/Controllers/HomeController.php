<?php

namespace App\Http\Controllers;

use App\Models\Cadastro\Ficha_Tecnica;
use App\Models\Cadastro\Motorista;
use App\Models\Cadastro\Plano_Viagem;
use App\Models\Cadastro\Transportadora;
use App\Models\Cadastro\Veiculo;
use App\Models\Integracao\Integracao_Situacao;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $fichaTecnicas = Ficha_Tecnica::get();
        $transportadora = Transportadora::get();
        $veiculo = Veiculo::get();
        $motorista = Motorista::get();
        $planoViagem = Plano_Viagem::get();
        $integracao = Integracao_Situacao::with(
            'cartao',
            'cartao.situacao',
            'cartao.fichaTecnica',
            'cartao.trasportadora',
            'cartao.veiculo',
            'cartao.planoViagem',
            'cartao.motorista1',
            'cartao.motorista2',
            'cartao.motorista3',
            'cartao.motorista4',

        )->get();

      

        return Inertia::render(
            'Home',
            compact(
                'fichaTecnicas',
                'transportadora',
                'veiculo',
                'planoViagem',
                'motorista',
                'integracao'
            )
        );
    }
}