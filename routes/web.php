<?php

use App\Http\Controllers\{AuthController, HomeController};
use App\Http\Controllers\Cadastro\FichaTecnicaController;
use App\Http\Controllers\Cadastro\MotoristaController;
use App\Http\Controllers\Cadastro\PlanoDeViagemController;
use App\Http\Controllers\Cadastro\PlanoViagemController;
use App\Http\Controllers\Cadastro\RastreadoraController;
use App\Http\Controllers\Cadastro\TransportadoraController;
use App\Http\Controllers\Cadastro\UsuarioAdministrativoController;
use App\Http\Controllers\Cadastro\VeiculoController;
use App\Http\Controllers\Integracao\IntegracaoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Rota do Form de Login
Route::get('login', [AuthController::class, 'login_form'])->name('login');
Route::post('login', [AuthController::class, 'authenticate'])->name('autenticar');

Route::get("Usuario", [UsuarioController::class, 'index'])->name('usuario');
Route::get("ConsultarUsuario", [UsuarioController::class, 'consultarUsuario'])->name('consultar.usuario');
Route::post("salvar", [UsuarioController::class, "salvar"])->name("user.store");
Route::post("excluir", [UsuarioController::class,"excluir"])->name("user.excluir");

Route::middleware('auth')->group(function () {

    // Home Page
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Rota de Logout
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');


    // Rotas módulo de cadastro
    Route::prefix('cadastro')->group(function () {

        // Cadastro Integração
        Route::prefix('integracao')->controller(IntegracaoController::class)->group(function () {
            Route::post('store', 'store')->name('integracao.store');
        });

        // Usuário Administrativo
        Route::prefix('usuarioAdmistrativo')->controller(UsuarioAdministrativoController::class)->group(function () {
            Route::get('', 'index')->name('usuarioAdministrativo');
        });

        // Transportadora
        Route::prefix('transportadora')->controller(TransportadoraController::class)->group(function () {
            Route::get('', 'index')->name('transportadora');
            Route::post('/store', 'store')->name('transportadora.store');
            Route::delete('/destroy/{id}', 'destroy')->name('transportadora.destroy');
        });

        // Motorista
        Route::prefix('motorista')->controller(MotoristaController::class)->group(function () {
            Route::get('', 'index')->name('motorista');
            Route::post('/store', 'store')->name('motorista.store');
            Route::delete('/destroy/{id}', 'destroy')->name('motorista.destroy');
        });

        // Veiculo
        Route::prefix('veiculo')->controller(VeiculoController::class)->group(function () {
            Route::get('', 'index')->name('veiculo');
            Route::post('/store', 'store')->name('veiculo.store');
            Route::delete('/destroy/{id}', 'destroy')->name('veiculo.destroy');
        });

        // Ficha Técnica
        Route::prefix('fichaTecnica')->controller(FichaTecnicaController::class)->group(function () {
            Route::get('', 'index')->name('fichaTecnica');
            Route::post('/store', 'store')->name('fichaTecnica.store');
            Route::delete('/destroy/{id}', 'destroy')->name('fichaTecnica.destroy');
        });

        // Plano de Viagem
        Route::prefix('planoViagem')->controller(PlanoViagemController::class)->group(function () {
            Route::get('', 'index')->name('planoViagem');
            Route::post('/store', 'store')->name('planoViagem.store');
            Route::delete('/destroy/{id}', 'destroy')->name('planoViagem.destroy');
        });

        //Rastreadora
        Route::prefix('rastreadora')->controller(RastreadoraController::class)->group(function () {
            Route::get('', 'index')->name('rastreadora');
            Route::post('/store', 'store')->name('rastreadora.store');
            Route::delete('/destroy/{id}', 'destroy')->name('rastreadora.destroy');
        });
    });
});
