@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')
    
<body>
        <div>
            
            <div class="row">

                <div class="col-sm-3">
                    <div class= "input-group">
                        <input type="text" class="form-control" placeholder="Busqueda rápida"/>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info">
                                Buscar
                            </button>
                        </span>
                    </div>
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
                        <th>Código</th>
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

                                <td>{{$facu->codfacultad}}</td>
                                <td>{{$facu->descfacultad}}</td>
                                <td>{{$facu->decafacultad}}</td>
                                <td>{{$facu->subdecfacultad}}</td>
                                <td>{{$facu->secreabogfacultad}}</td>

                                </td>
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
