<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\Plano_Viagem;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PlanoViagemController extends Controller
{
    public function index(){
        $planoViagem = Plano_Viagem::get();
        return Inertia::render('Cadastro/PlanoViagem/Index', ['planoViagem' => $planoViagem]);
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $validator = Validator::make($request->all(), [
            

        ]);

        if ($validator->fails()) {
            // Redirecionar de volta ao formulário com os erros de validação
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Se a validação passar, criar o registro na tabela

        Plano_Viagem::updateOrCreate(
            ['id' => $request->id],
            $request->all());

        // Redirecionar ou retornar uma resposta JSON, se necessário
        return redirect()->back()->with('message', ['type' => 'success', 'text' => 'Cadastro feito com sucesso']);
    }

    public function destroy($planoViagem){
        $planoViagem = Plano_Viagem::find($planoViagem);
        if ($planoViagem === null){
            return Redirect::back()->withErrors(["Erro ao remover registro"]);

        }
        else{
            $planoViagem->delete();
            return Redirect::back()->with('message',['type' => 'success', 'text' => 'Excluido com sucesso']);
        }
    }
}
