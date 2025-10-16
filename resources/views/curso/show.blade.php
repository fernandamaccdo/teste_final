@extends('layouts.app')
@section('title', 'Curso')
@section('content')
    <h1>Dados do Curso</h1>
    <p>Nome: {{ $curso->nome}}</p>
@endsection 