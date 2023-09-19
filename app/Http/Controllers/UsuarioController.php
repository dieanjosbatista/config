<?php

namespace App\Http\Controllers;

use App\Models\UsuarioModel;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UsuarioController extends Controller
{
    public function index(){
      $usuario = UsuarioModel::orderBy('id', 'asc')->get();
      return Inertia::render("Usuario/Index", compact("usuario"));
    }
    public function consultarUsuario(){
        echo "consultando usuário";
    }

    public function salvar(Request $r){
        // dd($r->all());

        UsuarioModel::updateOrCreate(
            ["id" => $r->id],
            $r->all()
        );
    }
    public function excluir(Request $r){
        $usuario = UsuarioModel::find($r->id);
        $usuario->delete();
    }
}
