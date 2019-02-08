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
                <a class="btn btn-primary" href="/pagAsigxEstu/create">Nuevo</a>
                

                    
                <table class="table table-striped">
    <thead>
      <tr>
        
        <th>Cedula de Estudiante</th>
        <th>Nombre de Estudiante</th>
        <th>Apellido de Estudiante</th>
        <th>Carrera</th>
        <th>Correo de Estudiante</th>
        
        <th colspan="2">Accion</th>
      </tr>
    </thead>
    <tbody>

      @foreach($estudiantes as $estudiante)
      
      <tr>
        
        <td>{{$estudiante['cedestudiante']}}</td>
        <td>{{$estudiante['nomestudiante']}}</td>
        <td>{{$estudiante['apeestudiante']}}</td>
        <td>{{$estudiante['codcarrera']}}</td>
        <td>{{$estudiante['correestudiante']}}</td>

        <td><a href="{{action('AsignaturaXEstudianteController@edit', $estudiante['cedestudiante'])}}" class="btn btn-warning">Modificar</a></td>
        <td>
          <form action="{{action('AsignaturaXEstudianteController@destroy', $estudiante['cedestudiante'])}}" method="post">
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