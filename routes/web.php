<?php

use App\Http\Controllers\AnotacaoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BibliaController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\FavoritosController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [DefaultController::class, "index"])->name("home");
Route::get("/biblia", [BibliaController::class, "index"]);
Route::get("/livros/{testamento_id?}", [BibliaController::class, "listarLivros"])->name("livros_biblia");
// parâmetros da rota são valores que podem ser passados na url de forma variável. É escrito dentre {}. Caso o valor
// for opcional, se coloca um ? no final do parametro. Ex. /livros/{testamento?}

Route::get("/versiculos/{livro}/{capitulo?}", [BibliaController::class, "listarVersiculos"])->name("versiculos_biblia");
Route::get("/meus-versiculos-favoritos", [FavoritosController::class, "listarFavoritos"])->name("listar_favoritos")->middleware("auth");
Route::post("/favoritos", [FavoritosController::class, "salvarFavoritos"])->name("salvar_favoritos")->middleware("auth");
Route::delete("/favoritos/{versiculo}", [FavoritosController::class, "excluirFavoritos"])->name("excluir_favoritos")->middleware("auth");

Route::get("/minhas-anotacoes", [AnotacaoController::class, "listarAnotacao"])->name("listar_anotacao")->middleware("auth");
Route::get("/anotacao/{versiculo_id}", [AnotacaoController::class, "anotacao"])->name("modal_anotacao")->middleware("auth");
Route::post("/anotacao/salvar", [AnotacaoController::class, "salvarAnotacao"])->name("salvar_anotacao")->middleware("auth");
Route::delete("/anotacao/{id}", [AnotacaoController::class, "excluirAnotacao"])->name("excluir_anotacao")->middleware("auth");

Route::get("/login", [AuthController::class, "login"])->name("login");
Route::post("/logar", [AuthController::class, "logar"])->name("logar");

Route::get("/novo-usuario", [UsuarioController::class, "registrar"])->name("registrar");
Route::post("/cadastrar", [UsuarioController::class, "cadastrar"])->name("cadastrar");
Route::get("/logout", [AuthController::class, "logout"])->name("sair");

//Route::get("/apenas-para-visualizar-o-nome-da-rota/{codigo}", [DefaultController::class, "index"])->name("rota_teste");

//Route::get("/produtos/listar");
//Route::get("/produtos/visualizar/{id}");
//Route::post("/produtos/cadastrar");
//Route::put("/produtos/editar/{id}");
//Route::delete("/produtos/deletar/{id}");

//Route::prefix("produtos")->group(function(){
//    Route::get("/listar");
//    Route::get("/visualizar/{id}");
//    Route::post("/cadastrar");
//    Route::put("/editar/{id}");
//    Route::delete("/deletar/{id}");
//});

/*

    /produtos/listar
    /produtos/cadastrar
    /produtos/deletar/1]
    /produtos/atualizar/1

 * */
