<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Testament;
use App\Models\Verse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BibliaController extends Controller
{
    public function index()
    {
//        $livros = Book::all();
//        return view("biblia.index", ["livros" => $livros]);

        $testamentos = Testament::all();

        return view("biblia.index", ["testamentos" => $testamentos]);
    }


    public function listarLivros($testamento_id = false)
    {
        $testamentos = [
            "antigo-testamento" => [
                "id" => 1,
                "nome" => "Antigo Testamento"
            ],
            "novo-testamento" => [
                "id" => 2,
                "nome" => "Novo Testamento"
            ],
            false => [
                "id" => null,
                "nome" => "Todos os Livros"
            ]
        ];

        $testamento = $testamentos[$testamento_id];

        if ($testamento_id === false) {
            $livros = Book::all();
        } else {
            $livros = Book::where("testament", $testamento["id"])->get();
        }

        return view("biblia.listar-livros", ["livros" => $livros, "nomeTestamento" => $testamento["nome"]]);
    }

    public function listarVersiculos($livro, $capitulo = 1)
    {
        $versiculos = Verse::where([
            ["book", "=", $livro],
            ["chapter", "=", $capitulo]
        ])->get();

        $totalCapitulos = Verse::where("book", "=", $livro)->max("chapter");

        return view("biblia.listar-versiculos", [
            "versiculos" => $versiculos,
            "totalCapitulos" => $totalCapitulos,
            "livro" => $livro,
            "capitulo" => $capitulo
        ]);
    }
}

