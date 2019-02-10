@extends('base') {{-- Hereda el header y el footer de la view base --}}

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
                    <a href="/pagTemas/crear"><button type="submit" class="btn btn-primary">Nuevo</button></a>
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
                        <th>Unidad</th>
                        <th>Código</th>

                        <tbody>
                            @if($test->count())  
                            @foreach($test as $tema)  
                            <tr>     
                                <form action="{{action('TemasController@destroy', $tema->codtema)}}" method="GET" onsubmit="return ConfirmDelete()">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <td><button class='btn btn-danger-glyphicon glyphicon glyphicon-trash'></button></td>
                                </form>
                                    
                                <td><a href="/pagTemas/editar/{{$tema->codtema}}/{{$tema->codunidad}}"><button class='btn btn-warning-glyphicon glyphicon-pencil'></button></a></td>
                                <td>{{$tema->descuniversidad}}-{{$tema->descsede}}-{{$tema->descfacultad}}-{{$tema->descescuela}}-{{$tema->desccarrera}}</td>
                                <td>{{$tema->descasignatura}}</td>
                                <td>{{$tema->numunidad}}</td>
                                <td>{{$tema->codtema}}</td>
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
