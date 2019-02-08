@extends('base')
@section('content')


    <div  style="margin-top:80px" id="showcase">

    <h1><b>Talleres</b></h1>
    
  </div>



<br/>
<form   method="post"  action="{{url('talleres')}}" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
@csrf
    <div class="form-horizontal">
        

            <!--<button class="btn btn-danger" formmethod ="post" formaction="{{URL::to('/eliminarTaller')}}" type="submit">Eliminar</button>-->
    <input type="hidden" id="codtaller" class="form-control" name="codtaller" value="{{$talleres->codtaller}}">

    <div class="form-group">
        <label class="control-label col-sm-3" for="unies">Universidad-Carrera</label>
        <div class="col-sm-6">
        <select class="form-control" id="unies" name="unies">
    @foreach($datos as $dato)
            <option>{{$dato->descuniversidad}}-{{$dato->desccarrera}}</option>
    @endforeach
        </select>
            </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-3" for="asignatura">Asignatura</label>
        <div class="col-sm-6">
        <select class="form-control" id="asignatura" name="asignatura">
    @foreach($asignaturas as $dato)
            <option>{{$dato->descasignatura}}</option>
    @endforeach
        </select>
            </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-3" for="tema">Tema</label>
        <div class="col-sm-6">
        <select class="form-control" id="tema" name="tema">
    @foreach($tema as $dato)
            <option value="{{$dato->codtema}}">{{$dato->desctema}}</option>
    @endforeach
        </select>
            </div>
    </div>


  
    <div class="form-group" style="width:800px; margin-left: 1%;">
    <h6>Archivo de taller</h6>
        {{ csrf_field() }}
        @foreach($datos as $dato)
        @if($dato->archivotaller != "")
        <a href="/taller/{{$dato->archivotaller}}" width="300">Descargar: {{$dato->archivotaller}}</a>
        <br/>
        @endif
        @endforeach
        <div class="form-group">
        <table class="table">
        <tr>
        <td><label>Seleccione el Archivo</label></td>
        <td><input type="file" name="archivotaller" /></td>
        <td><span class="text-muted">Solo archivos con extención .pdf</span></td>
        </tr>
        </table>
        </div>
    <br />
    </div>

    <div class="form-group" style="width:800px; margin-left: 1%;">
    <h6>Archivo de solucion</h6>
        {{ csrf_field() }}
        @foreach($datos as $dato)
        @if($dato->archivosolucion != "")
        <a href="/soluciones/{{$dato->archivosolucion}}" width="300">Descargar: {{$dato->archivosolucion}}</a>
        <br/>
        @endif
        @endforeach
        <div class="form-group">
        <table class="table">
        <tr>
        <td><label>Seleccione el Archivo</label></td>
        <td><input type="file" name="archivosolucion" /></td>
        <td><span class="text-muted">Solo archivos con extención .pdf</span></td>
        </tr>
        </table>
        </div>
    <br />
    </div>
       

        <div class="row">
          <div class="col-md-3"></div>
          <div class="form-group col-md-4" >
          <button type="submit" class="btn btn-primary btn-save">Guardar</button>
          </div>
        </div>


</form>


@stop
