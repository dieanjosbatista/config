<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use App\Models\Cadastro\Ficha_Tecnica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class FichaTecnicaController extends Controller
{
    public function index(){

        $fichaTecnica = Ficha_Tecnica::get();
        return Inertia::render('Cadastro/FichaTecnica/Index', ['fichaTecnica' => $fichaTecnica]);
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

        Ficha_Tecnica::updateOrCreate(
            ['id' => $request->id],
            $request->all());

        // Redirecionar ou retornar uma resposta JSON, se necessário
        return redirect()->back()->with('message', ['type' => 'success', 'text' => 'Cadastro feito com sucesso']);
    }

    public function destroy($fichaTecnica){
        $fichaTecnica = Ficha_Tecnica::find($fichaTecnica);
        if ($fichaTecnica === null){
            return Redirect::back()->withErrors(["Erro ao remover registro"]);

        }
        else{
            $fichaTecnica->delete();
            return Redirect::back()->with('message',['type' => 'success', 'text' => 'Excluido com sucesso']);
        }
    }
}
