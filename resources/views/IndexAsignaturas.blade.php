@extends('base')
@section('content')




<!------ Include the above in your HEAD tag ---------->



<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>


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
                @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                
                <a class="btn btn-primary" href="/pagAsignaturas/create">Nuevo</a>
                    
                <table id="tablita" class="table table-striped " cellspacing="0" width="100%">
                <thead>
						<tr>
							<th>Carrera</th>
							<th>Codigo Asignatura</th>
							<th>Asignatura</th>
							<th>Creditos</th>
							<th>Nivel</th>	
                            <th>Modificar</th>
                            <th>Eliminar</th>
						</tr>
					</thead>
					<tbody id="cuerpo">
						

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





<script>
$(document).ready(function() {


    $('#tablita').dataTable();

    
} );
</script>

@stop