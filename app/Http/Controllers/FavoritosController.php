<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritosController extends Controller
{

    public function listarFavoritos()
    {
        return view("favoritos.listar-favoritos");
    }

    public function salvarFavoritos()
    {
        return view("favoritos.");
    }

    public function excluirFavoritos()
    {
        return view("favoritos.");
    }

}
