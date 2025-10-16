@extends('layouts.app')
@section('title', 'Lista de Alunos')
@section('content')
  <h1>Lista de alunos</h1>
  <!-- <div>
        <h1>Alunos que fazem aniversário da data de 05/10/2005</h1>
        @foreach ($alunos_data_nascimento_0510 as $aluno)
            <p>Nome: {{ $aluno->nome }}</p>
        @endforeach
    </div> -->

    <!-- <div>
        <h1>Alunos com data de nascimento anterior 01/01/2006</h1>
        @foreach ($alunos_0101 as $aluno)
            <p>Nome: {{ $aluno->nome }}</p>
        @endforeach
    </div>  -->

    <!-- <div>
        <h1>Alunos com data de nascimento entre 01/01/2004 e 31/12/2006</h1>
        @foreach ($alunos_0406 as $aluno)
            <p>Nome: {{ $aluno->nome }}</p>
        @endforeach
    </div>  -->

    <!-- <div>
        <h1>Alunos com o nome Silva</h1>
        @foreach ($alunos_silva as $aluno)
            <p>Nome: {{ $aluno->nome }}</p>
        @endforeach
    </div>  -->

    <!-- <div>
        <h1>Alunos com o nome Silva</h1>
        @foreach ($alunos_silva as $aluno)
            <p>Nome: {{ $aluno->nome }}</p>
        @endforeach
    </div>  -->
<!-- 
    <div>
        <h1>Alunos com data apos 01-01-2005 e com gmail</h1>
        @foreach ($alunos_dt_email as $aluno)
            <p>Nome: {{ $aluno->nome }}</p>
        @endforeach
    </div>  -->

    <a class="btn btn-primary" href="{{ route('aluno.create') }}">Cadastrar</a>
    <table  class="table table-bordered table-hover"> 
        <thead class= "thead-light" >
            <th>Matrícula</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Data de Nascimento</th>
            <th>Opções</th>
        </thead>
        <tbody>
            @foreach ($alunos as $aluno)
            <tr>
               <td>{{$aluno->matricula}}</td>
               <td>{{$aluno->nome}}</td>
               <td>{{$aluno->email}}</td>
               <td>{{$aluno->data_nascimento}}</td>
               <td>
                <div class="d-flex">
                 <div class="m-1">
                <a class="btn btn-success" href="{{ route('aluno.edit', $aluno->id) }}">Editar</a>
                </div>   
                <div class="m-1">
                <a class="btn btn-info" href="{{ route('aluno.show', $aluno->id) }}">Visualizar</a>
                </div>
                <div class="m-1">
                <form action="{{route ('aluno.destroy', $aluno->id)}}" method="post" >
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
