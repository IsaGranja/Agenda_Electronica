@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')
    <body>
        <div>
            
            <div class="row" style="    margin-bottom: 1%;  margin-top: 1%; margin-left: 1%">

            <div class="col-sm-3">
                <form  action="/pagCiudades" method="GET" class="navbar-form navbar-left" role="search">
                    <div class= "input-group">
                        <input type="text" class="form-control"name="ciudad" id="ciudad"placeholder="Buscar Cédula"/>
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
                    <a href="pagCiudades/crear"><button type="submit" class="btn btn-primary">Nuevo</button></a>
                </div>

                <div class = "col-md-1">
                <a href="/"><button type="submit" class="btn btn-primary">Salir</button></a>
                </div>

            </div>

            <div class="table-container">

                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
                        <th></th>
                        <th></th>
                        <th>Código Provincia</th>
                        <th>Código Ciudad</th>
                        <th>Ciudad</th>

                        <tbody>
                            @if($ciudades->count())  
                            @foreach($ciudades as $ciudad)  
                            <tr>     
                                <form action="{{action('CiudadController@destroy', $ciudad->codciudad)}}" method="DELETE" onsubmit="return ConfirmDelete()">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <td><button class='btn btn-danger-glyphicon glyphicon glyphicon-trash'></button></td>
                                </form>
                                <td><a href="pagCiudades/editar/{{$ciudad->codciudad}}"><button class='btn btn-warning-glyphicon glyphicon-pencil'></button></a></td>
                                <td>{{$ciudad->codprovincia}}</td>
                                <td>{{$ciudad->codciudad}}</td>
                                <td>{{$ciudad->descciudad}}</td>
                                                                    
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
                {{ $ciudades->links() }}

            </div>
            <script>
                function ConfirmDelete(){
                    var x = confirm("¿Esta seguro que desea eliminar la ciudad?");
                    if (x)
                        return true;
                    else
                        return false;
                }
            </script>
        </div>
    </body>


@endsection
