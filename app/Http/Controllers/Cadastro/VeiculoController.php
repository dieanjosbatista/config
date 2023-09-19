<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use App\Models\Cadastro\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

class VeiculoController extends Controller
{
    public function index()
    { 
        $veiculo = Veiculo::get();
        return Inertia::render('Cadastro/Veiculo/Index', ['veiculo' => $veiculo]);
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $validator = Validator::make($request->all(), [
            'placa' => 'required',
            'chassi' => 'required',
            'renavam' => 'required',

        ]);

        if ($validator->fails()) {
            // Redirecionar de volta ao formulário com os erros de validação
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Se a validação passar, criar o registro na tabela

        Veiculo::updateOrCreate(
            ['id' => $request->id],
            $request->all());

        // Redirecionar ou retornar uma resposta JSON, se necessário
        return redirect()->back()->with('message', ['type' => 'success', 'text' => 'Cadastro feito com sucesso']);
    }

    public function destroy($veiculo){
        $veiculo = Veiculo::find($veiculo);
        if ($veiculo === null){
            return Redirect::back()->withErrors(["Erro ao remover registro"]);

        }
        else{
            $veiculo->delete();
            return Redirect::back()->with('message',['type' => 'success', 'text' => 'Excluido com sucesso']);
        }
    }
}
