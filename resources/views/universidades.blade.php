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
        <form  action="/pagUniversidades" method="GET" class="navbar-form navbar-left" role="search">
            <div class= "input-group">
                <input type="text" class="form-control"name="universidad" id="universidad"placeholder="Buscar Universidad"/>
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
            <a href="pagUniversidades/crear"><button type="submit" class="btn btn-primary">Nuevo</button></a>
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
                <th >Universidad</th>
                <th>Categoria</th>
                <th>Direccion 1</th>
                <th>Direccion 2</th>
                <th># Direccion</th>
                <th>Tipo</th>
                <th>Rector</th>
                <th>Vicerrector</th>
                <th>Secretario General</th>
                <th>Ruc</th>

            </tr>
        </thead>
        <tbody>
            @if($universidades->count())  
            @foreach ($universidades as $universidad)
            <tr>
                <form action="{{action('UniversidadesController@destroy', $universidad->coduniversidad)}}" method="POST" onsubmit="return ConfirmDelete()">
                    @csrf
                    <input name="_method" type="hidden" value="POST">
                    <td><button class='btn btn-danger-glyphicon glyphicon glyphicon-trash'></button></td>
                </form>
                <td><a href="pagUniversidades/editar/{{$universidad->coduniversidad}}"><button class='btn btn-warning-glyphicon glyphicon-pencil'></button></a></td>
                <td>{{$universidad->descuniversidad}}</td>
                <td>{{$universidad->categuniversidad}}</td>
                <td>{{$universidad->dir1universidad}}</td>
                <td>{{$universidad->dir2universidad}}</td>
                <td>{{$universidad->numdiruniversidad}}</td>
                <td>{{$universidad->tipouniversidad}}</td>
                <td>{{$universidad->rectuniversidad}}</td>
                <td>{{$universidad->viserecuniversidad}}</td>
                <td>{{$universidad->secregenuniversidad}}</td>
                <td>{{$universidad->rucuniversidad}}</td>
            </tr>
            @endforeach
            @else
                            <tr>
                                <td colspan="8">No hay registro !!</td>
                            </tr>
            @endif
            </tbody>
        </table>
        {{ $universidades->links() }}
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
            
        var x = confirm("¿Esta seguro que desea eliminar esta universidad?");
        if (x)
            return true;
        else
            return false;
        }
     </script>

    
@endsection
