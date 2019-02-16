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
        <form  action="/pagPeriodos" method="GET" class="navbar-form navbar-left" role="search">
            <div class= "input-group">
                <input type="text" class="form-control"name="periodo" id="periodo"placeholder="Buscar periodo"/>
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
        <a href="pagPeriodos/crear" ><button type="submit" class="btn btn-primary" onclick="return confirm('¿Está seguro que desea crear un nuevo periodo? Los anteriores se pondrán en estado inactivo.')">Nuevo</button></a>
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
                <th>Universidad</th>
                <th>Sede</th>
                <th>Periodo</th>
                <th>Fecha de inicio</th>
                <th>Fecha de fin</th>
                <th>Estado</th>

            </tr>
        </thead>
        <tbody>
            @if($periodos->count())  
            @foreach ($periodos as $periodo)
            <tr>
                <form action="{{action('PeriodosController@destroy', $periodo->codperiodo)}}" method="POST" onsubmit="return ConfirmDelete()">
                    @csrf
                    <input name="_method" type="hidden" value="POST">
                    <td><button class='btn btn-danger-glyphicon glyphicon glyphicon-trash'></button></td>
                </form>
                <td><a href="pagPeriodos/editar/{{$periodo->codperiodo}}"><button class='btn btn-warning-glyphicon glyphicon-pencil'></button></a></td>
                <td>{{$periodo->descuniversidad}}</td>
                <td>{{$periodo->descsede}}</td>
                <td>{{$periodo->codperiodo}}</td>
                <td>{{$periodo->fecinicioperiodo}}</td>
                <td>{{$periodo->fecfinalperiodo}}</td>
                <td>{{$periodo->estperiodo}}</td>
            </tr>
            @endforeach
            @else
                            <tr>
                                <td colspan="8">No hay registro !!</td>
                            </tr>
            @endif
            </tbody>
        </table>
        {{ $periodos->links() }}
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
            
        var x = confirm("¿Esta seguro que desea eliminar este periodo?");
        if (x)
            return true;
        else
            return false;
        }
     </script>

    
@endsection
