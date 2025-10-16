@extends('layouts.app')
@section('title', 'Turma')
@section('content')
    <h1>Dados da Turma</h1>
    <p>Descrição: {{ $turma->descricao}}</p>
    <p>Curso: {{$turma->curso->nome}}</p>
@endsection 