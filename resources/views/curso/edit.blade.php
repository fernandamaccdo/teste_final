@extends('layouts.app')
@section('title', 'Editar curso')
@section('content')
    <h1>Editar curso</h1>
    <form action= "{{ route("curso.update", $curso->id) }}" method="post" enctype="multipart/form-data">
    @csrf 
    @method('PUT')
     <label for="">Nome:</label>   
     <input type="text" name="nome" id="nome" value="{{$curso->nome}}">
     <button type="submit">Enviar</button> 
    </form>
@endsection