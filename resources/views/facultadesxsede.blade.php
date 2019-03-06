@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')
    
<body>
        <div>
            
            <div class="row">
                <div class="col-sm-11">
                    <h2>Facultades por Sedes</h2>
                </div>
                

                <div class="col-md-2">
                    <a href="pagFacultadesxSede/crear"><button type="submit" class="btn btn-info">Nuevo</button></a>
                </div>  


                <div class = "col-md-1">
                    <button type="submit" class="btn btn-info">Salir</button>
                </div>

            </div>

            <div class="table-container">
                <table id="myTable" class="table table-hover "  style="width:100%; margin-top:10px">
                    <thead class="thead-light">
                        <th></th>
                        <th>Universidad</th>
                        <th>Sede</th>
                        <th>Facultad</th>                        
                            <tbody>                            
                                @foreach($facus as $facu)
                                    <tr>
                                        <form action="{{action('FacultadxSedeController@destroy', $facu->codfacultad)}}" method="GET" onsubmit="return ConfirmDelete()">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <td><button class='btn btn-danger-glyphicon glyphicon glyphicon-trash'></button></td>
                                        </form>

                                        <td>{{$facu->descuniversidad}}</td>
                                        <td>{{$facu->descsede}}</td>
                                        <td>{{$facu->descfacultad}}</td>
                                    </tr>
                                @endforeach                       
                            </tbody>
                    </thead>           
                </table>   

            </div>
            <script>
                 $(document).ready(function () {
                    $('#myTable').DataTable({
                        "paging": false, 
                    "info": false,
                    "autoWidth": true,
                    "searching": true, // Search box and search function will be actived
                    "dom": '<"top"f>rt<"bottom"ilp><"clear">',
                    "language": {
                    "zeroRecords": "No existe registros",
                    "infoEmpty": "No se econtró ningún registro",
                    "sSearch": "Buscar:   "
                        }
                    });
                });
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
