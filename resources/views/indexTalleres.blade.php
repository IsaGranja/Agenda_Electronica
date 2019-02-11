@extends('base')
@section('content')





  
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ \Session::get('success') }}</p>
                    </div><br />
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger">
                        <p>{{Session('error') }}</p>
                    </div><br />
                    @endif
                <a class="btn btn-primary" href="/talleres/create">Nuevo</a>
                

                
  <table class="table table-striped" id="myTable">
    <thead>
      <tr>
        
        <th>Tema</th>
        <th>Archivo Taller</th>
        <th>Archivo Solución</th>
        
        <th>Modificar</th>
        <th>Eliminar</th>
      </tr>
    </thead>
    <tbody>

      @foreach($talleres as $taller)
      
      <tr>
      <td>@foreach($tema as $dato)
        @if($dato->codtema == $taller->codtema)
        {{$dato->desctema}}
        @endif
        @endforeach</td>
        <td>{{$taller->archivotaller}}</td>
        <td>{{$taller->archivosolucion}}</td>
        <td><a href="{{action('TalleresController@edit', $taller->codtaller)}}" class="btn btn-warning">Modificar</a></td>
        <td>
          <form action="{{action('TalleresController@destroy', $taller->codtaller)}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Eliminar</button>
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
    $('#myTable').DataTable({
      "pageLength": 10
    });
} );

</script>
  @stop