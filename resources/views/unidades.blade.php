@extends('base')

@section('content')
<body>
        <div>

            <div class="row">

                <div class="col-sm-3">
                    <div class= "input-group">
                        <input type="text" class="form-control" placeholder="Código del informe"/>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info">
                                Buscar
                            </button>
                        </span>
                    </div>
                </div>

                <div class="col-md-2"></div>  

                <div class="col-md-6">
                    <a href="/pagUnidades/crear"><button type="submit" class="btn btn-primary">Nuevo</button></a>
                </div>

                <div class = "col-md-1">
                    <button type="submit" class="btn btn-primary">Salir</button>
                </div>

            </div>

            <div class="table-container">

                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
                        <th></th>
                        <th></th>
                        <th>Universidad-Carrera</th>
                        <th>Asignatura</th>
                        <th># de Unidad</th>
                        <th>Unidad</th>

                        <tbody>
                            @if($unidades->count())  
                            @foreach($unidades as $unidad)  
                            <tr>     

                                <form action="{{action('UnidadesController@destroy', $unidad->codunidad)}}" method="GET" onsubmit="return ConfirmDelete()">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <td><button class='btn btn-danger-glyphicon glyphicon glyphicon-trash'></button></td>
                                </form>
                                
                                <td><a href="/pagUnidades/editar/{{$unidad->codunidad}}"><button class='btn btn-warning-glyphicon glyphicon-pencil'></button></a></td>
                                <td>{{$unidad->descuniversidad}}-{{$unidad->descsede}}-{{$unidad->descfacultad}}-{{$unidad->descescuela}}-{{$unidad->desccarrera}}</td>
                                <td>{{$unidad->descasignatura}}</td>
                                <td>{{$unidad->descunidad}}</td>
                                <td>{{$unidad->numunidad}}</td>

                                </td>
                            </tr>
                            @endforeach 
                            @else
                            <tr>
                                <td colspan="8">No hay registro !!</td>
                            </tr>
                            @endif
                        </tbody>

                    </thead>           
                </table>   

            </div>
            <script>
                function ConfirmDelete(){
                    var x = confirm("¿Esta seguro que desea eliminar este registro?");
                    if (x)
                        return true;
                    else
                        return false;
                }
            </script>
        </div>
    </body>

@endsection
