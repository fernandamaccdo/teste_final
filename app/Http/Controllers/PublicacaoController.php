<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicacaoController extends Controller
{
    // Retorna a view da página de comentários
    public function listarComentarios()
    {
        return view('publicacao');
    }
}

   