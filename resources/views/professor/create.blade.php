@extends('layouts.app')
@section('title', 'Cadastro Professor')
@section('content')
<h1>Cadastro de Profesor</h1>
<form action= "{{ route('professor.store') }}" method="post">
@csrf 
  <div class="form-row align-items-center">
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInput">Nome</label>
      <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Nome Completo" id="nome" name="nome">
    </div>
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup">Disciplina</label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Disciplina" id="disciplina" name="disciplina">
      </div>
    </div>
    <div class="col-auto">
       <label class="sr-only" for="foto">Foto</label>
     <input class="form-control" id="inlineFormInputGroup" type="file" name="foto" id="foto">
    </div>

    <div class="col-auto">
      <label class="sr-only" for="inlineFormInput">Email:</label>
      <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Email" id="email" name="email">
    </div>

    <div class="col-auto">
      <label class="sr-only" for="inlineFormInput">Telefone:</label>
      <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Telefone" id="telefone" name="telefone">
    </div>

    <div class="col-auto"> 
      <button type="submit" class="btn btn-primary mb-2">Enviar</button>
    </div>
    


  </div>
</form>
  @endsection