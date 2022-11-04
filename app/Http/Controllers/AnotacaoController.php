<?php

namespace App\Http\Controllers;


use App\Http\Requests\AnotacaoRequest;
use App\Models\Anotacao;
use App\Models\Verse;
use Illuminate\Support\Facades\Auth;

class AnotacaoController extends Controller
{
    public function listarAnotacao()
    {
        $usuario = Auth::id();
        $anotacao = Anotacao::select(
                    "verses.text", "books.name As livro", "verses.book",
                    "verses.chapter", "verses.verse", "verses.id as id_versiculo",
                    "anotacoes.titulo", "anotacoes.anotacao", "anotacoes.id")
            ->join("verses", "anotacoes.id_versiculo", "=", "verses.id")
            ->join("books", "verses.book", "=", "books.id")
            ->where("anotacoes.id_usuario", $usuario)
            ->get();

        return view("anotacoes.listar-anotacao", ["anotacoes" => $anotacao]);
    }

    public function anotacao($versiculo_id)
    {
        $versiculo = Verse::find($versiculo_id);
        $usuario = Auth::id();
        $anotacao = Anotacao::where("id_versiculo", $versiculo_id)
            ->where("id_usuario", $usuario)
            ->first();

        return view("anotacoes.salvar-anotacao", ["versiculo" => $versiculo,"anotacao" => $anotacao]);
    }

    public function salvarAnotacao(AnotacaoRequest $request)
    {
        $usuario = Auth::id();
        $id_anotacao = $request->input("id_anotacao");

        $anotacao = new Anotacao();
        if(!empty($id_anotacao)) {
            $anotacao = Anotacao::find($id_anotacao); // select * from anotacao where id = $id_anotacao limit 1;
        }

        $anotacao->id_usuario = $usuario;
        $anotacao->id_versiculo = $request->input("id_versiculo");
        $anotacao->titulo = $request->input("titulo");
        $anotacao->anotacao = $request->input("anotacao");
        $anotacao->save();

        return ["status" => "success", "id_anotacao" => $anotacao->id];
    }

    public function excluirAnotacao($id_anotacao)
    {
        $anotacao = Anotacao::find($id_anotacao);
        $anotacao->delete();
        return ["status" => "success"];
    }
}
