@extends('layouts.app')
@section('title', 'Lista de Professores')
@section('content')
    <h1>Lista de Professores</h1>
      <div>
        <h1>Professores com começo João e final Silva</h1>
        @foreach ($professores_js as $professor)
            <p>Nome: {{ $professor->nome }}</p>
        @endforeach
    </div>

    <a class="btn btn-primary" href="{{ route('professor.create') }}">Cadastrar</a>
    <table  class="table table-bordered table-hover">
        <thead class= "thead-light">
           <th>Nome</th>
           <th>Disciplina</th>
           <th>Email</th>
           <th>Telefone</th>
           <th>Opções</th>
        </thead>
        <tbody>
            @foreach ($professores as $professor)
            <tr>
            <td>{{$professor->nome}}</td>
            <td>{{$professor->disciplina}}</td>
            <td>{{$professor->contatoProfessor?->email}}</td>
            <td>{{$professor->contatoProfessor?->telefone}}</td>
            <td> 
                <div class="d-flex">
                 <div class = "m-1">
                   <a class="btn btn-success" href="{{ route('professor.edit', $professor->id) }}">Editar</a>
                 </div>   
                <div class="m-1">
                  <a class="btn btn-info" href="{{ route('professor.show', $professor->id) }}">Visualizar</a>
                </div>
                <div class="m-1">
                  <form action="{{route ('professor.destroy', $professor->id)}}" method="post" >
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Excluir</button>  
                </div>
                  </td>
                  </div>  
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection