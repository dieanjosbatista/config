<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cadastro\Transportadora;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class TransportadoraController extends Controller
{
    public function index()
    {
        $transportadoras = Transportadora::get();
        return Inertia::render('Cadastro/Transportadora/Index', ['transportadora' => $transportadoras]);
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $validator = Validator::make($request->all(), [
            'razao_social' => 'required',
            'cnpj' => 'required',

        ]);

        if ($validator->fails()) {
            // Redirecionar de volta ao formulário com os erros de validação
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Se a validação passar, criar o registro na tabela

        Transportadora::updateOrCreate(
            ['id' => $request->id],
            $request->all());

        // Redirecionar ou retornar uma resposta JSON, se necessário
        return redirect()->back()->with('message', ['type' => 'success', 'text' => 'Cadastro feito com sucesso']);
    }

    public function destroy($transportadora){
        $transportadora = Transportadora::find($transportadora);
        if ($transportadora === null){
            return Redirect::back()->withErrors(["Erro ao remover registro"]);

        }
        else{
            $transportadora->delete();
            return Redirect::back()->with('message',['type' => 'success', 'text' => 'Excluido com sucesso']);
        }
    }
}
