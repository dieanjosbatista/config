<?php

namespace App\Http\Controllers\Integracao;

use App\Http\Controllers\Controller;
use App\Models\Integracao\Integracao;
use Illuminate\Http\Request;

class IntegracaoController extends Controller
{
    //

    public function store(Request $request){
        

        Integracao::updateOrCreate(
            ['id' => $request->id],
            $request->all());

        // Redirecionar ou retornar uma resposta JSON, se necessário
        return redirect()->back()->with('message', ['type' => 'success', 'text' => 'Cadastro feito com sucesso']);
    }
}
