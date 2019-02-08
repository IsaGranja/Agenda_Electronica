@extends('base')
@section('content')





  
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
                @endif
                <a class="btn btn-primary" href="/pagAsigxProf/create">Nuevo</a>
                

                    
                <table class="table table-striped">
    <thead>
      <tr>
        
        <th>Cedula de Profesor</th>
        <th>Nombre de Profesor</th>
        <th>Apellido de Profesor</th>
        
        <th colspan="2">Accion</th>
      </tr>
    </thead>
    <tbody>

      @foreach($profesores as $profesor)
      
      <tr>
        
        <td>{{$profesor['cedprofesor']}}</td>
        <td>{{$profesor['nomprofesor']}}</td>
        <td>{{$profesor['apeprofesor']}}</td>

        <td><a href="{{action('AsignaturaXProfesorController@edit', $profesor['cedprofesor'])}}" class="btn btn-warning">Modificar</a></td>
        <td>
          <form action="{{action('AsignaturaXProfesorController@destroy', $profesor['cedprofesor'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Eliminar</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>


                </div>
            </div>
        </div>
    </div>
</div>



  @stop