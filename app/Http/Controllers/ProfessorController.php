<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professores = Professor::all();
        $professores_js=Professor::where('nome','like','João%')
        ->where('nome','like','%Silva')
        ->get();
        return view('professor.index', compact('professores', 'professores_js')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('professor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $foto = null;
        if($request->hasFile('foto')){
        $nome_arquivo = pathinfo($request->foto->getClientOriginalName(),PATHINFO_FILENAME);
        $extensao_arquivo = $request->foto->getClientOriginalExtension();
        $foto = $nome_arquivo.'-'.time().'.'.$extensao_arquivo;
        
        $request->foto->move(public_path('imagens'),$foto);
     }

      $professor = Professor ::create([
        'nome' => $request->nome,
        'disciplina' => $request->disciplina,
        'foto' =>'imagens/' .isset($foto)? $foto : $professor->foto

       ]);
         
        
       $professor->contatoProfessor()->create([
           'email' => $request->email,
           'telefone' => $request->telefone,
           
       ]);

        return redirect()->route('professor.index'); 

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $professor= Professor::find($id);
        return view('professor.show', compact('professor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $professor = Professor::find($id);
        return view('professor.edit', compact ('professor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $foto = null;
        if($request->hasFile('foto')){
        $nome_arquivo = pathinfo($request->foto->getClientOriginalName(),PATHINFO_FILENAME);
        $extensao_arquivo = $request->foto->getClientOriginalExtension();
        $foto = $nome_arquivo.'-'.time().'.'.$extensao_arquivo;
        
        $request->foto->move(public_path('imagens'),$foto);

        }   
        
        $professor = Professor::find($id);
        $professor->update([
        'nome' => $request->nome,
        'disciplina' => $request->disciplina,
        'foto' =>'imagens/' .isset($foto)? $foto : $professor->foto
]);

        $professor->contatoProfessor()->update
([
        'email'=> $request->email,
        'telefone' => $request->telefone
        
 ]);

        return redirect()->route('professor.index'); 


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $professor = Professor::find($id);
        $professor->contatoProfessor()->delete();
        $professor->delete();
        return redirect()->route('professor.index');
    }
}
