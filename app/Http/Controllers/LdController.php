<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ld;

class LdController extends Controller
{
    public function like(Request $request)
    {
        // registro
        $ld = Ld::firstOrCreate(
            ['publicacao_id' => $request->publicacao_id],
            ['like_' => 0, 'deslike_' => 0]
        );

        //incremento
        $ld->like_ = ($ld->like_ ?? 0) + 1;
        $ld->update();

        return redirect()->back()->with('success', 'Like registrado com sucesso!'); //atualiza a pagina
    }

    public function deslike(Request $request)
    {
        
        $ld = Ld::firstOrCreate(
            ['publicacao_id' => $request->publicacao_id],
            ['like_' => 0, 'deslike_' => 0]
        );

        $ld->deslike_ = ($ld->deslike_ ?? 0) + 1;
        $ld->update();

        return redirect()->back()->with('success', 'Deslike registrado com sucesso!');
    }
}


