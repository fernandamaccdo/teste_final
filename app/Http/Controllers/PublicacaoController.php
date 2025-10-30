<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacao;
use App\Models\Ld;
use Illuminate\Support\Facades\Auth;

class PublicacaoController extends Controller
{
    public function comentarios($id)
    {
        $publicacao = Publicacao::with('avaliacoes.usuario')->findOrFail($id);
        $comentarios = $publicacao->avaliacoes()->orderByDesc('id')->get();

        return view('publicacao', compact('publicacao', 'comentarios'));
    }

    public function index()
    {
        
        $user = Auth::user();

    
        if (!$user) {
            return redirect()->route('login')->with('error', 'Você precisa estar logado.');
        }

        
        $publicacoes = Publicacao::select('id', 'foto', 'titulo_prato', 'local_', 'cidade')
            ->orderBy('id', 'asc')
            ->get();

        //conta likes/deslikes 
        foreach ($publicacoes as $pub) {
            $pub->like_count = Ld::where('publicacao_id', $pub->id)->sum('like_');
            $pub->deslike_count = Ld::where('publicacao_id', $pub->id)->sum('deslike_');
        }

        // total de likes/deslikes
        $user->total_likes = Ld::whereIn('publicacao_id', $publicacoes->pluck('id'))->sum('like_');
        $user->total_deslikes = Ld::whereIn('publicacao_id', $publicacoes->pluck('id'))->sum('deslike_');

        return view('dashboard', compact('publicacoes', 'user'));
    }

    public function dashboard()
    {
        return $this->index();
    }

    public function like(Request $request)
    {
        $request->validate([
            'publicacao_id' => 'required|integer|exists:publicacao,id',
        ]);

        $pubId = $request->publicacao_id;

        $ld = Ld::firstOrCreate(
            ['publicacao_id' => $pubId],
            ['like_' => 0, 'deslike_' => 0]
        );

        $ld->like_ = ($ld->like_ ?? 0) + 1;
        $ld->update();

        return back()->with('success', 'Like registrado com sucesso!');
    }

    public function deslike(Request $request)
    {
        $request->validate([
            'publicacao_id' => 'required|integer|exists:publicacao,id',
        ]);

        $pubId = $request->publicacao_id;

        $ld = Ld::firstOrCreate(
            ['publicacao_id' => $pubId],
            ['like_' => 0, 'deslike_' => 0]
        );

        $ld->deslike_ = ($ld->deslike_ ?? 0) + 1;
        $ld->update();

        return back()->with('success', 'Deslike registrado com sucesso!');
    }

    public function show($id)
    {
        $publicacao = Publicacao::with('avaliacoes.usuario')->findOrFail($id);
        return view('publicacao', compact('publicacao'));
    }
    
}
