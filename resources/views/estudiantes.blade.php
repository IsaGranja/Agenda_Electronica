@extends('base') {{-- Hereda el header y el footer de la view base --}}
@section('content')
@if (Session::has('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ Session::get('error') }}</strong>
                    </div>
                    @endif
    <div class="row" style="    margin-bottom: 1%;  margin-top: 1%; margin-left: 1%">
        <div class="col-sm-3">
           
            <H1>ESTUDIANTES</H1>
        </div>
        <div class="col-md-2"></div>  
        <div class="col-md-6">
            <a href="pagEstudiantes/crear"><button type="submit" class="btn btn-primary">Nuevo Estudiante</button></a>
        </div>
        <div class = "col-md-1">
        <a href="/"><button type="submit" class="btn btn-primary">Salir</button></a>
        </div>
    </div>
    <div class="table-container">
        <table  id="myTable" class="table table-hover "  style="width:100%;margin-top:10px">
        <thead class="container">
            <tr>
                <th></th>
                <th ></th>
                <th >Cédula</th>
                <th >Nombre</th>
                <th >Apellido</th>
                <th >e-mail</th>
                <th>Carrera</th>

            </tr>   
        </thead>
        <tbody class="container">
            @if($estudiantes->count())  
            @foreach ($estudiantes as $estudiante)
            <tr>
                <form action="{{action('EstudianteController@destroy', $estudiante->cedestudiante)}}" method="POST" onsubmit="return ConfirmDelete()">
                    @csrf
                    <input name="_method" type="hidden" value="POST">
                    <td><button class='btn btn-danger-glyphicon glyphicon glyphicon-trash'></button></td>
                </form>
                <td><a href="pagEstudiantes/editar/{{$estudiante->cedestudiante}}"><button class='btn btn-warning-glyphicon glyphicon-pencil'></button></a></td>
                <td >
                <label name="estudianteci">{{ $estudiante->cedestudiante }}</label>
                </td>
                
                <td >
                    <label name="estudiantenombre">{{ $estudiante->nomestudiante }}</label>
                </td>
                <td >
                    <label name="estudianteapellido">{{ $estudiante->apeestudiante }}</label>
                </td>
        
                <td >
                    <label name="estudianteemail">{{ $estudiante->correestudiante }}</label>
                </td>
                <td >
                    <label name="estudianteescuela">{{ $estudiante->desccarrera }}</label>
                </td>
            </tr>
            @endforeach
            @else
                            <tr>
                                <td colspan="8">No hay registro !!</td>
                            </tr>
            @endif
            </tbody>
            
        </table>
        {{ $estudiantes->links() }}
    </div>
    </form>
    <script>

$(document).ready(function () {
    $('#myTable').DataTable({   
        "paging": false, 
        "info": false,
        "autoWidth": true,
        "searching": true, // Search box and search function will be actived
        "dom": '<"top"f>rt<"bottom"ilp><"clear">',
        "language": {
            "zeroRecords": "No existe registros",
            "infoEmpty": "No se econtró ningún registro",
            "sSearch": "Buscar:   "
                }
    });
    
});
function ConfirmDelete()
  {
  var x = confirm("¿Esta seguro que desea eliminar este estudiante?");
  if (x)
    return true;
  else
    return false;
  }
</script>
@endsection
