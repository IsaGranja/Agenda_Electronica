@extends('base')
@section('content')





  
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Asignaturas</div>

                <div class="card-body">
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
                @endif
                <a class="btn btn-primary" href="/pagAsignaturas/create">Nuevo</a>
                

                    
                <table class="table table-striped">
    <thead>
      <tr>
        
        <th>Carrera</th>
        <th>Codigo</th>
        <th>Asignatura</th>
        <th># creditos</th>
        <th>Nivel</th>
        
        
        
        <th colspan="2">Accion</th>
      </tr>
    </thead>
    <tbody>

      @foreach($asignaturas as $asignatura)
      
      <tr>
        
        <td>{{$asignatura['codcarrera']}}</td>
        <td>{{$asignatura['codasignatura']}}</td>
        <td>{{$asignatura['descasignatura']}}</td>
        <td>{{$asignatura['credasignatura']}}</td>
        <td>{{$asignatura['nivelasignatura']}}</td>

        <td><a href="{{action('AsignaturaController@edit', $asignatura['codasignatura'])}}" class="btn btn-warning">Modificar</a></td>
        <td>
          <form action="{{action('AsignaturaController@destroy', $asignatura['codasignatura'])}}" method="post">
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