<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UsuarioAdministrativoController extends Controller
{
    public function index(){
        return Inertia::render('Cadastro/UsuarioAdministrativo/Index');
    }
}
