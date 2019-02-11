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
                    <a href="pagPeriodos/crear" ><button type="submit" class="btn btn-primary" onclick="return confirm('¿Está seguro que desea crear un nuevo periodo? Los demás se pondrán en estado inactivo.')">Nuevo</button></a>
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
                        <th>Universidad</th>
                        <th>Sede</th>
                        <th>Periodo</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de fin</th>
                        <th>Estado</th>

                        <tbody>
                            @if($periodos->count())  
                            @foreach($periodos as $periodo)  
                            <tr>
                                <form action="{{action('PeriodosController@destroy', $periodo->codperiodo)}}" method="GET">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <td><button class='btn btn-danger-glyphicon glyphicon glyphicon-trash'></button></td>
                                </form>
                                
                                
                                
                                <td><a href="pagPeriodos/editar/{{$periodo->codperiodo}}"><button class='btn btn-warning-glyphicon glyphicon-pencil'></button></a></td>
                                <td>{{$periodo->descuniversidad}}</td>
                                <td>{{$periodo->descsede}}</td>
                                <td>{{$periodo->codperiodo}}</td>
                                <td>{{$periodo->fecinicioperiodo}}</td>
                                <td>{{$periodo->fecfinalperiodo}}</td>
                                <td>{{$periodo->estperiodo}}</td>
                                
                                                                    
                                </td>
                            </tr>
                            @endforeach 
                            @else
                            <tr>
                                <td colspan="8">No hay registros que mostrar.</td>
                            </tr>
                            @endif
                        </tbody>

                    </thead>           
                </table>   

            </div>
            <script>
                function ConfirmDelete(){
                    var x = confirm("¿Está seguro que desea eliminar este registro?");
                    if (x)
                        return true;
                    else
                        return false;
                }
            </script>
        </div>
    </body>

    
@endsection
