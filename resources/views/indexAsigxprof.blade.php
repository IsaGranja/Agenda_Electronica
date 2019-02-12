@extends('base')
@section('content')





<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

  

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Asignaturas por porfesor</div>

                <div class="card-body">
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
                @endif
                @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <a class="btn btn-primary" href="/pagAsigxProf/create">Nuevo Asignaturas por Profesor</a>
                
                <table id="tablita" class="table table-striped " cellspacing="0" width="100%">
<thead>
						<tr>
            <th>Cedula de Profesor</th>
        <th>Nombre de Profesor</th>
        <th>Apellido de Profesor</th>
        <th>Modificar</th>
        <th>Eliminar</th>
       
						</tr>
					</thead>
					<tbody id="cuerpo">
						

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



  <script>
$(document).ready(function() {


    $('#tablita').dataTable();

    
} );
</script>

  @stop