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
                <a class="btn btn-primary" href="/contenidos/create">Nuevo</a>
                

                    
                <table class="table table-striped">
    <thead>
      <tr>
        <th>Texto Contenido</th>
        <th>Imagen Contenido</th>
        <th>Audio Contenido</th>
        <th>Video Contenido</th>
        
        <th colspan="2">Accion</th>
      </tr>
    </thead>
    <tbody>

      @foreach($contenidos as $contenido)
      
      <tr>
        <td>{{$contenido['textocontenido']}}</td>
        <td>{{$contenido['imagencontenido']}}</td>
        <td>{{$contenido['audiocontenido']}}</td>
        <td>{{$contenido['videocontenido']}}</td>

        <!--<td><a href="{{action('ContenidosController@edit', $contenido['codcontenido'])}}" class="btn btn-warning">Modificar</a></td>-->
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



  @stop