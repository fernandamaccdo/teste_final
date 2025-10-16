@extends('layouts.app')
@section('title', 'Cadastro Aluno')
@section('content')
    <h1>Cadastro de Aluno</h1>
    <form action= "{{ route('aluno.store') }}" method="post" enctype="multipart/form-data">
    @csrf 
     <label for="">Matrícula</label>   
     <input type="text" name="matricula" id="matricula">
     <label for="">Nome</label>   
     <input type="text" name="nome" id="nome">
     <label for="">Email</label>   
     <input type="text" name="email" id="email">
     <label for="">Data de Nascimento</label>   
     <input type="date" name="data_nascimento" id="data_nascimento">
     <label for="foto">Foto</label>
     <input type="file" name="foto" id="foto">
     <label for="">Turma:</label>
     <select name="turma_id" id="turma_id">
        <option value="">Selecione</option>
      @foreach ($turmas as $turma)  
        <option value="{{$turma->id}}">{{$turma->descricao}}</option>
      @endforeach
     </select>
     <label for="">Telefone:</label>
     <input type="text" name="telefone" id="telefone">
     <button type="submit">Enviar</button>
     
       
    </form>
@endsection