@extends('layouts.app')
@section('title', 'Lista de Cursos')
@section('content')
  <h1>Lista de Cursos</h1>
  <!-- <div>
        <h1>Cursos que não sejam informática</h1>
        @foreach ($curso_ninformatica as $curso)
            <p>Nome: {{ $curso->nome }}</p>
        @endforeach
    </div> -->
  <div>
        <h1>Listar cursos de administração ou gestão</h1>
        @foreach ($curso_adm_g as $curso)
            <p>Nome: {{ $curso->nome }}</p>
        @endforeach
    </div>
    
    <a class="btn btn-primary" href="{{ route('curso.create') }}">Cadastrar</a>
    <table  class="table table-bordered table-hover"> 
        <thead class= "thead-light" >
            <th>Nome</th>
            <th>Opções</th>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
            <tr>
               <td>{{$curso->nome}}</td>
               <td>
                <div class="d-flex">
                 <div class="m-1">
                <a class="btn btn-success" href="{{ route('curso.edit', $curso->id) }}">Editar</a>
                </div>   
                <div class="m-1">
                <a class="btn btn-info" href="{{ route('curso.show', $curso->id) }}">Visualizar</a>
                </div>
                <div class="m-1">
                <form action="{{route ('curso.destroy', $curso->id)}}" method="post" >
                  @csrf
                  @method('DELETE')
                  <button  class="btn btn-danger" type="submit">Excluir</button>
                </div>
                </div>  
                </form>
            </td>
            </tr>   
            @endforeach
        </tbody>
    </table>
@endsection    
