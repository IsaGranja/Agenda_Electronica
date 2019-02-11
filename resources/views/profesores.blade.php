@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')
    @if (Session::has('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ Session::get('error') }}</strong>
                    </div>
                    @endif
<div class="row"style="    margin-bottom: 1%;  margin-top: 1%; margin-left: 1%">
        <div class="col-sm-3">
            <h1>PROFESORES</h1>
        </div>
        <div class="col-md-2"></div>  
        <div class="col-md-6">
                <a href="pagProfesores/crear"><button type="submit" class="btn btn-primary">Nuevo</button></a>
            </div>
            <div class = "col-md-1">
            <a href="/"><button type="submit" class="btn btn-primary">Salir</button></a>
            </div>
        </div>
    <div class="table-container">
        <table id="myTable" class="table table-hover "  style="width:100%; margin-top:10px">
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
            
        var x = confirm("¿Esta seguro que desea eliminar este profesor?");
        if (x)
            return true;
        else
            return false;
        }
     </script>

    
@endsection
