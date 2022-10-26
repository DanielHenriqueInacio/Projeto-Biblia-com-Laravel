<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view("autenticacao.login");
    }

    public function logout()
    {
        return view("autenticacao.login");
    }
}
