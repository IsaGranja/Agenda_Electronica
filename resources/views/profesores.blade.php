@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')
    @if (Session::has('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ Session::get('success') }}</strong>
                    </div>
                    @endif
<div class="row"style="    margin-bottom: 1%;  margin-top: 1%; margin-left: 1%">
        <div class="col-sm-3">
        <form  action="/pagProfesores" method="GET" class="navbar-form navbar-left" role="search">
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
            <a href="pagProfesores/crear"><button type="submit" class="btn btn-primary">Nuevo</button></a>
        </div>
        <div class = "col-md-1">
        <a href="/"><button type="submit" class="btn btn-primary">Salir</button></a>
        </div>
    </div>
    <div>
        <table id="myTable" class="table order-list">
        <thead class="thead-light">
            <tr>
                <th></th>
                <th ></th>
                <th >Cédula</th>
                <th >Nombre</th>
                <th >Apellido</th>
                <th >e-mail</th>
                <th >Celular</th>

                <th>Carrera</th>

            </tr>
        </thead>
        <tbody>
            @if($profesores->count())  
            @foreach ($profesores as $profesor)
            <tr>
                <form action="{{action('ProfesorController@destroy', $profesor->cedprofesor)}}" method="POST" onsubmit="return ConfirmDelete()">
                    @csrf
                    <input name="_method" type="hidden" value="POST">
                    <td><button class='btn btn-danger-glyphicon glyphicon glyphicon-trash'></button></td>
                </form>
                <td><a href="pagProfesores/editar/{{$profesor->cedprofesor}}"><button class='btn btn-warning-glyphicon glyphicon-pencil'></button></a></td>
                <td >
                <label name="estudianteci">{{ $profesor->cedprofesor }}</label>
                </td>
                
                <td >
                    <label name="estudiantenombre">{{ $profesor->nomprofesor }}</label>
                </td>
                <td >
                    <label name="estudianteapellido">{{ $profesor->apeprofesor }}</label>
                </td>
        
                <td >
                    <label name="estudianteemail">{{ $profesor->correprofesor }}</label>
                </td>
                <td >
                    <label name="estudianteemail">{{ $profesor->celuprofesor }}</label>
                </td>
                <td >
                    <label name="estudianteescuela">{{ $profesor->desccarrera }}</label>
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
        {{ $profesores->links() }}
    </div>
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
            
        var x = confirm("¿Esta seguro que desea eliminar este profesor?");
        if (x)
            return true;
        else
            return false;
        }
     </script>

    
@endsection
