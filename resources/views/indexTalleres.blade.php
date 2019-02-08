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
                <a class="btn btn-primary" href="/talleres/create">Nuevo</a>
                

                    
                <table class="table table-striped">
    <thead>
      <tr>
        
        <th>Tema</th>
        
        <th colspan="2">Accion</th>
      </tr>
    </thead>
    <tbody>

      @foreach($talleres as $taller)
      
      <tr>
        
        <td>{{$taller['archivotaller']}}</td>

        <!--<td><a href="{{action('TalleresController@edit', $taller['codtaller'])}}" class="btn btn-warning">Modificar</a></td>-->
        <td>
          <form action="{{action('TalleresController@destroy', $taller['codtaller'])}}" method="post">
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