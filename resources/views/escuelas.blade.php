@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')
    
<body>
        <div>
            
            <div class="row">
                <div class="col-sm-11">
                    <h2>Escuelas</h2>
                </div>
                <div class="col-sm-3">
                <form  action="/pagEscuelas" method="GET" class="navbar-form navbar-left" role="search">
                    <div class= "input-group">
                        <input type="text" class="form-control"name="escuelabuscar" id="escuelabuscar"placeholder="Buscar por Escuela"/>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-info">
                                Buscar
                            </button>
                        </span>
                    </div>
                </form>
                </div>

                <div class="col-md-2"></div>  

                <div class="col-md-2">
                    <a href="pagEscuelas/crear"><button type="submit" class="btn btn-info">Nuevo</button></a>
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
                        <th>Universidad - Sede - Facultad</th>
                        <th>Escuela</th>
                        <th>Director</th>                        
                        <tbody>
                            <tr>                                
                                @foreach($escuelas as $escu)
                                    <tr>
                                        <form action="{{action('EscuelasController@destroy', $escu->codescuela)}}" method="GET" onsubmit="return ConfirmDelete()">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <td><button class='btn btn-danger-glyphicon glyphicon glyphicon-trash'></button></td>
                                        </form>
                                        
                                        <td><a href = "pagEscuelas/editar/{{$escu->codescuela}}"><button class='btn btn-warning-glyphicon glyphicon-pencil'></button></a></td>


                                        <td>{{$escu->descuniversidad}}-{{$escu->descsede}}-{{$escu->descfacultad}}</td>
                                        <td>{{$escu->descescuela}}</td>
                                        <td>{{$escu->directorescuela}}</td>
                                    </tr>
                                @endforeach
                            </tr>                        
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
