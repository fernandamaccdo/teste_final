<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ld;

// class LdController extends Controller
// {
//     public function like(Request $request)
//     {
//         // Busca o registro da publicação na tabela ld
//         $ld = Ld::where('publicacao_id', $request->publicacao_id)->first();

       
//         if ($ld) {
//             $ld->like_++;
//             $ld->save();
//             return redirect()->back()->with('success', 'Like registrado com sucesso!');
//         }

//         // ignora
//         return redirect()->back()->with('error', 'Publicação não possui contador cadastrado.');
//     }
//} função nao funcionou
