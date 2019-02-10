@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')
    
<body>
        <div>
            
            <div class="row">

                <div class="col-sm-3">
                    <div class= "input-group">
                        <input type="text" class="form-control" placeholder="Busqueda por Descripción"/>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info">
                                Buscar
                            </button>
                        </span>
                    </div>
                </div>

                <div class="col-md-2"></div>  

                <div class="col-md-2">
                    <a href="pagCarreras/crear"><button type="submit" class="btn btn-info">Nuevo</button></a>
                </div>  


                <div class = "col-md-1">
                    <button type="submit" class="btn btn-info">Salir</button>
                </div>

            </div>

            <div class="table-container">

                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
                        <th></th>
                        <th></th>
                        <th>Universidad-Sede-Facultad-Escuela</th>
                        <th>Carrera</th>
                        <th># Niveles</th>
                        <th>Director</th>
                        <tbody>
                        @foreach($carreras as $carrera)
                            <tr>
                                <form action="{{action('CarrerasController@destroy', $carrera->codcarrera)}}" method="GET" onsubmit="return ConfirmDelete()">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <td><button class='btn btn-danger-glyphicon glyphicon glyphicon-trash'></button></td>
                                </form>
                                
                                <td><a href = "pagCarreras/editar/{{$carrera->codcarrera}}"><button class='btn btn-warning-glyphicon glyphicon-pencil'></button></td>
                                
                                <td>{{$carrera->descuniversidad}}-{{$carrera->descsede}}-{{$carrera->descfacultad}}-{{$carrera->descescuela}}</td>
                                <td>{{$carrera->desccarrera}}</td>
                                <td>{{$carrera->nivcarrera}}</td>
                                <td>{{$carrera->direccarrera}}</td>
                            </tr>
                        @endforeach
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
