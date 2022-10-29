<?php

namespace App\Http\Controllers;

use App\Models\Verse;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function index(Request $request)
    {
        $busca = $request->query("busca", false); // $_GET['busca'] ?? false;
        $versiculos = [];
        if($busca !== false){
            $versiculos = Verse::where("text", "like", "%$busca%")->paginate(20);
            $versiculos->appends(["busca" => $busca]);
        }

        return view("default.index", ["versiculos" => $versiculos, "busca" => $busca]);
    }
}
