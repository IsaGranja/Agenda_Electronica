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
        <form  action="/pagSedes" method="GET" class="navbar-form navbar-left" role="search">
            <div class= "input-group">
                <input type="text" class="form-control"name="sede" id="sede"placeholder="Buscar Sede"/>
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
            <a href="pagSedes/crear"><button type="submit" class="btn btn-primary">Nuevo</button></a>
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
                <th>Ciudad</th>
                <th>Descripción</th>
                <th>Prerector</th>
                <th>Secretario General</th>

            </tr>
        </thead>
        <tbody>
            @if($sedes->count())  
            @foreach ($sedes as $sede)
            <tr>
                <form action="{{action('SedesController@destroy', $sede->codsede)}}" method="POST" onsubmit="return ConfirmDelete()">
                    @csrf
                    <input name="_method" type="hidden" value="POST">
                    <td><button class='btn btn-danger-glyphicon glyphicon glyphicon-trash'></button></td>
                </form>
                <td><a href="pagSedes/editar/{{$sede->codsede}}"><button class='btn btn-warning-glyphicon glyphicon-pencil'></button></a></td>
                <td>{{$sede->descuniversidad}}</td>
                <td>{{$sede->descciudad}}</td>
                <td>{{$sede->descsede}}</td>
                <td>{{$sede->prerectsede}}</td>
                <td>{{$sede->secregensede}}</td>
            </tr>
            @endforeach
            @else
                            <tr>
                                <td colspan="8">No hay registro !!</td>
                            </tr>
            @endif
            </tbody>
        </table>
        {{ $sedes->links() }}
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
            
        var x = confirm("¿Esta seguro que desea eliminar esta sede?");
        if (x)
            return true;
        else
            return false;
        }
     </script>

    
@endsection
