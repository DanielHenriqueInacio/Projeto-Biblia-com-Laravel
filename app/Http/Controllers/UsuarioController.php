<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function cadastrar()
    {
        return view("usuario.cadastrar");
    }

    public function lembrarSenha()
    {
        return view("usuario.cadastrar");
    }
}
