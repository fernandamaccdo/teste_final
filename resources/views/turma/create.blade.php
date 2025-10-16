@extends('layouts.app')
@section('title', 'Cadastro Turma')
@section('content')
    <h1>Cadastro de Turma</h1>
    <form action= "{{ route('turma.store') }}" method="post">
    @csrf 
     <label for="">Descrição:</label>   
     <input type="text" name="descricao" id="descricao">
     <label for="curso">Curso:</label>
    <select name="curso_id" id="curso_id">
        <option value="">Selecione</option>
      @foreach  ($cursos as $curso)
        <option value="{{$curso->id}}">{{$curso->nome}}</option>
      @endforeach
    </select>
     <button type="submit">Enviar</button>
     
    </form>
@endsection