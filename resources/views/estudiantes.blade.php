@extends('base') {{-- Hereda el header y el footer de la view base --}}
@section('content')
    <div class="row" style="    margin-bottom: 1%;  margin-top: 1%; margin-left: 1%">
        <div class="col-sm-3">
            <form  action="/pagEstudiantes" method="GET" class="navbar-form navbar-left" role="search">
                <div class= "input-group">
                    <input type="text" class="form-control"name="cedula" id="cedula"placeholder="Buscar Cédula"/>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-info">
                            Buscar
                        </button>
                    </span>
                </div>
            </form>

        </div>
        <div class="col-md-2"></div>  
        <div class="col-md-6">
            <a href="pagEstudiantes/crear"><button type="submit" class="btn btn-primary">Nuevo</button></a>
        </div>
        <div class = "col-md-1">
        <a href="/"><button type="submit" class="btn btn-primary">Salir</button></a>
        </div>
    </div>
    <div>
        <table  class="table table-bordred table-striped">
        <thead >
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
        <tbody>
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
        "language": {
            "url": "/json/Spanish.json"
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
