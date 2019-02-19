@extends('base')
@section('content')

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ url('js/Proyecto.js') }}"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h2>Glosarios</h2></div>

                <div class="card-body">
                    @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ \Session::get('success') }}</p>
                    </div><br />
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <center><a class="btn btn-primary" href="/glosarios/create">Nuevo</a></center>
                    
                    <table id="tablita" class="table table-striped " cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Palabra</th>
                                <th>Definición</th>
                                <th>Modificar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="cuerpo">
                            @foreach($glosarios as $glosario)     
                            <tr>      
                                <td>{{$glosario['palabraglosario']}}</td>
                                <td>{{$glosario['defglosario']}}</td>
                                <td><a href="{{action('GlosariosController@edit', $glosario['codglosario'])}}" class="btn btn-warning-glyphicon glyphicon-pencil"></a></td>
                                <td>
                                    <form action="{{action('GlosariosController@destroy', $glosario['codglosario'])}}" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger-glyphicon glyphicon glyphicon-trash" type="submit"></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#tablita').dataTable();
} );
</script>

  @stop