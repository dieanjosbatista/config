<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use App\Models\Cadastro\Motorista;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class MotoristaController extends Controller
{
    public function index()
    {
        $motorista = Motorista::get();
        return Inertia::render('Cadastro/Motorista/Index', ['motorista' => $motorista]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'file' => 'required',
            'cpf' => 'required',
            'rg' => 'required',
            'pai' => 'required',
            'mae' => 'required',
            'endereco' => 'required',
            'contato' => 'required'
            

        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $directory = 'public/Anexo_CNH';

            $fileName = time() . '.' . $file->getClientOriginalExtension();

            $path = $file->storeAs($directory, $fileName);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            Motorista::updateOrCreate(
                ['id' => $request->id],
                [
                    ...$request->all(),
                    'cnh' => $fileName
                ],
            );
            return redirect()->back()->with('message', ['type' => 'success', 'text' => 'Cadastro feito com sucesso']);
        }
    }

    public function destroy($motorista)
    {
        $motorista = Motorista::find($motorista);
        if ($motorista === null) {
            return Redirect::back()->withErrors(["Erro ao remover registro"]);
        } else {
            $motorista->delete();
            return Redirect::back()->with('message', ['type' => 'success', 'text' => 'Excluido com sucesso']);
        }
    }
}
