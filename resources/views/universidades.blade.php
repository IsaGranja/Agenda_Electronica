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
                    <a href="pagUniversidades/crear"><button type="submit" class="btn btn-primary">Nuevo</button></a>
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
                        <!--<th>Código</th>-->
                        <th>Universidad</th>
                        <th>Categoria</th>
                        <th>Direccion 1</th>
                        <th>Direccion 2</th>
                        <th># Direccion</th>
                        <th>Tipo</th>
                        <th>Rector</th>
                        <th>Vicerrector</th>
                        <th>Secretario General</th>
                        <th>Ruc</th>

                        <tbody>
                            @if($universidades->count())  
                            @foreach($universidades as $universidad)  
                            <tr>     
                                
                                <td><button class='btn btn-danger-glyphicon glyphicon glyphicon-trash'></button></td>
                                
                                <td><a><button class='btn btn-warning-glyphicon glyphicon-pencil'></button></a></td>
                                <!--<td>{{$universidad->coduniversidad}}</td>-->
                                <td>{{$universidad->descuniversidad}}</td>
                                <td>{{$universidad->categuniversidad}}</td>
                                <td>{{$universidad->dir1universidad}}</td>
                                <td>{{$universidad->dir2universidad}}</td>
                                <td>{{$universidad->numdiruniversidad}}</td>
                                <td>{{$universidad->tipouniversidad}}</td>
                                <td>{{$universidad->rectuniversidad}}</td>
                                <td>{{$universidad->viserecuniviersidad}}</td>
                                <td>{{$universidad->secregenuniversidad}}</td>
                                <td>{{$universidad->rucuniversidad}}</td>
                                                                    
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
