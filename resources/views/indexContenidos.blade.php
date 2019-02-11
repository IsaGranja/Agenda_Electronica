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
                <a class="btn btn-primary" href="/contenidos/create">Nuevo</a>
                

                    
<table id="myTable" class="table table-striped">
    <thead>
      <tr>
        <th>Tema</th>
        <th>Información de Apoyo</th>
        <th>Imagen Contenido</th>
        <th>Audio Contenido</th>
        <th>Video Contenido</th>
        
        <th>Modificar</th>
        <th>Eliminar</th>
      </tr>
    </thead>
    <tbody>

      @foreach($contenidos as $contenido)
      
      <tr>
        <td>@foreach($tema as $dato)
        @if($dato->codtema == $contenido->codtema)
        {{$dato->desctema}}
        @endif
        @endforeach</td>
        <td>{{$contenido->infoapoyocontenido}}</td>
        <td>{{$contenido->imagencontenido}}</td>
        <td>{{$contenido->audiocontenido}}</td>
        <td>{{$contenido->videocontenido}}</td>

        <td><a href="{{action('ContenidosController@edit', $contenido['codcontenido'])}}" class="btn btn-warning">Modificar</a></td>
        <td>
          <form action="{{action('ContenidosController@destroy', $contenido['codcontenido'])}}" method="post">
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