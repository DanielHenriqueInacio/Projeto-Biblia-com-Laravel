<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Favorito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavoritosController extends Controller
{

    public function listarFavoritos()
    {
        $idUsuario = Auth::id();
        $favoritos = DB::table("favoritos")
            ->select("verses.text", "books.name As livro", "verses.book", "verses.chapter", "verses.verse", "verses.id as id_versiculo")
            ->join("verses", "favoritos.id_versiculo", "=", "verses.id")
            ->join("books", "verses.book", "=", "books.id")
            ->where("favoritos.id_usuario", "=", $idUsuario)
            ->get();

        return view("favoritos.listar-favoritos", ["favoritos" => $favoritos]);
    }

    public function salvarFavoritos(Request $request)
    {
        $usuario = Auth::id();
        $versiculo = $request->input("versiculo", false);

        $favorito = new Favorito();
        $favorito->id_usuario = $usuario;
        $favorito->id_versiculo = $versiculo;
        $favorito->save();

        return ["status" => "success"];
    }

    public function excluirFavoritos($versiculo_id)
    {
        $usuario = Auth::id();
        $favorito = Favorito::where("id_usuario", $usuario)->where("id_versiculo", $versiculo_id);
        $favorito->delete();
        return ["status" => "success"];
    }

}
