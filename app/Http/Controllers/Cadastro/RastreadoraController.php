<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use App\Models\Cadastro\Rastreadora;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class RastreadoraController extends Controller
{
    public function index(){
        $rastreadora = Rastreadora::get();
        return Inertia::render('Cadastro/Rastreadora/Index', ['rastreadora' => $rastreadora]);
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

        Rastreadora::updateOrCreate(
            ['id' => $request->id],
            $request->all());

        // Redirecionar ou retornar uma resposta JSON, se necessário
        return redirect()->back()->with('message', ['type' => 'success', 'text' => 'Cadastro feito com sucesso']);
    }

    public function destroy($rastreadora){
        $rastreadora = Rastreadora::find($rastreadora);
        if ($rastreadora === null){
            return Redirect::back()->withErrors(["Erro ao remover registro"]);

        }
        else{
            $rastreadora->delete();
            return Redirect::back()->with('message',['type' => 'success', 'text' => 'Excluido com sucesso']);
        }
    }
}

