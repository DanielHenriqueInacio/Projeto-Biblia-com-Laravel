<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view("autenticacao.login");
    }

    public function logar(Request $request)
    {

        $autenticacao = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"]
        ]);

        $auth = Auth::attempt($autenticacao);

        if ($auth) {
            $request->session()->regenerate();
            return redirect()->intended("/");
        }
        return back()->withErrors([
            'email' => 'As credenciais que foram informadas não correndem com nosso banco de dados',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {

        Auth::logout();

        return redirect('/');
    }
}
