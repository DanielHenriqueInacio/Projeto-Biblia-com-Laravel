<?php

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
Route::get("/favoritos", [FavoritosController::class, "listarFavoritos"])->name("listar_favoritos");
Route::get("/login", [AuthController::class, "login"])->name("login");
Route::get("/cadastrar", [UsuarioController::class, "cadastrar"])->name("cadastrar");

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
