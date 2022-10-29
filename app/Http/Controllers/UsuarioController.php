<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function cadastrar(Request $request)
    {
        $validated = $request->validate([
            "nome" => ["required"],
            "email" => ["required", "email"],
            "password" => ["required"]
        ]);

        $password = Hash::make($request->password);
        $token = md5(time() . uniqid());
        $usuario = new Usuario();
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->password = $password;
        $usuario->token = $token;
        $usuario->save();

        $request->session()->flash("success", "Seu usuario foi criado com sucesso!");
        return redirect()->route("login");
    }

    public function registrar()
    {
        return view("usuario.cadastrar");
    }

    public function lembrarSenha()
    {
        return view("usuario.cadastrar");
    }
}
