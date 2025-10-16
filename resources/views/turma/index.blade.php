@extends('layouts.app')
@section('title', 'Lista de Turmas')
@section('content')
  <h1>Lista de Turmas</h1>
  <!-- <div>
        <h1>Turmas com id maior que 10</h1>
        @foreach ($turma_10 as $turma)
            <p>Nome: {{ $turma->descricao }}</p>
        @endforeach
    </div>  -->

  <div>
        <h1>Contagem turmas: {{ $turmas_contagem}}</h1>
         
    </div>

    <a class="btn btn-primary" href="{{ route('turma.create') }}">Cadastrar</a>
    <table  class="table table-bordered table-hover"> 
        <thead class= "thead-light" >
            <th>Descrição</th>
            <th>Curso:</th>
            <th>Opções</th>
        </thead>
        <tbody>
            @foreach ($turmas as $turma)
            <tr>
               <td>{{$turma->descricao}}</td>
               <td>{{$turma->curso->nome?? 'Sem curso'}}</td>
               <td>
                <div class="d-flex">
                 <div class="m-1">
                <a class="btn btn-success" href="{{ route('turma.edit', $turma->id) }}">Editar</a>
                </div>   
                <div class="m-1">
                <a class="btn btn-info" href="{{ route('turma.show', $turma->id) }}">Visualizar</a>
                </div>
                <div class="m-1">

                <form action="{{route ('turma.destroy', $turma->id)}}" method="post" >
                  @csrf
                  @method('DELETE')
                  <button  class="btn btn-danger" type="submit">Excluir</button>
                </div>
               <td>
                </div>  
                </form>
            </td>
            </tr>   
            @endforeach
        </tbody>
    </table>
@endsection  