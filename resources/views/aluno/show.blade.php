@extends('layouts.app')
@section('title', 'Dados do aluno')
@section('content')
    <h1>Dados do Aluno</h1>
     
    <p>Matrícula: {{ $aluno->matricula}}</p>
    <p>Nome: {{ $aluno->nome}}</p>
    <p>Email: {{ $aluno->email}}</p>
    <p>Data de nascimento: {{ $aluno->data_nascimento}}</p>
    <img src="{{ asset($aluno->foto)}}" alt="" style="max-width:400px">
    <p>Telefone: {{ $aluno->contatoAluno->telefone}}</p>

@endsection    
