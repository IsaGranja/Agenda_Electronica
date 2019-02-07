@extends('master')

@section('content-izq')
    <h6 class="dropdown-header colorHeaderToggle">Asignatura</h6>
    <a class= "dropdown-item colorToggle" href="#">Tema 1</a>  
    <a class= "dropdown-item colorToggle" href="#">Tema 2</a>
@endsection

@section('content')
    <div class="container">
        <img class="imagen" src="{{ url('img/beagle.jpg') }}">
    </div>
@endsection

@section('content-der')
    <div class="imagen colorHeaderToggle" style="font-size:14px">
      <label for="comment">Anotaciones del Estudiante: </label>
      <textarea class="form-control" name="anotaciones" id="comment" rows="19" autofocus></textarea>
    </div>
@endsection