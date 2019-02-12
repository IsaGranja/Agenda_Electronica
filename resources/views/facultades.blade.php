@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')
    
<body>
        <div>
            
            <div class="row">
                <div class="col-sm-11">
                    <h2>Facultad</h2>
                </div>
                <div class="col-sm-3">
                    <form  action="/pagFacultades" method="GET" class="navbar-form navbar-left" role="search">
                        <div class= "input-group">
                            <input type="text" class="form-control"name="buscardesc" id="buscardesc"placeholder="buscar por Descripción"/>
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
                    <a href="pagFacultades/crear"><button type="submit" class="btn btn-info">Nuevo</button></a>
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
                        <th>Descripción</th>
                        <th>Decano</th>
                        <th>Subdecano</th>
                        <th>Secretario Abogado</th>
                        <tbody>
                        @foreach($facus as $facu)
                            <tr>
                                <form action="{{action('FacultadController@destroy', $facu->codfacultad)}}" method="GET" onsubmit="return ConfirmDelete()">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <td><button class='btn btn-danger-glyphicon glyphicon glyphicon-trash'></button></td>
                                </form>
                                
                                <td><a href = "pagFacultades/editar/{{$facu->codfacultad}}"><button class='btn btn-warning-glyphicon glyphicon-pencil'></button></a></td>
                                <td>{{$facu->descfacultad}}</td>
                                <td>{{$facu->decafacultad}}</td>
                                <td>{{$facu->subdecfacultad}}</td>
                                <td>{{$facu->secreabogfacultad}}</td>
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
