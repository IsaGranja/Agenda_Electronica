@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')
    
    <body>
        <div>
            <form action="">
            
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
                        <button type="submit" class="btn btn-primary">Nuevo</button>
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
                            <th>Codigo</th>
                            <th>Descripción</th>

                            <tbody>
                                @if($provincias->count())  
                                @foreach($provincias as $provincia)  
                                <tr>
                                    <td>edit</td>
                                    <td><button class='glyphicon glyphicon-pencil'></button></td>
                                    <td>{{$provincia->codprovincia}}</td>
                                    <td>{{$provincia->desprovincia}}</td>

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
            </form>
        </div>
    </body>


@endsection
