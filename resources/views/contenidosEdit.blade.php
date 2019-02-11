@extends('base')
@section('content')
<html>
    <head>
>
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

<!-- include summernote css/js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>
    <script>$(document).ready(function(){
    $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 100,
        width: 1000
      });
});</script>
</head>

    <div  style="margin-top:80px" id="showcase">

    <h1><b>Contenidos</b></h1>
    
  </div>



<br/>
<form   method="post"  action="{{URL::to('/actualizarContenidos')}}" class="form-horizontal" data-toggle="valicontenidosr" enctype="multipart/form-data">
@csrf
    <div class="form-horizontal">
        
    <input type="hidden" id="codcontenido" class="form-control" name="codcontenido" value="{{$contenidos['codcontenido']}}">
    <input type="hidden" id="tema" class="form-control" name="tema" value="{{$tema['codtema']}}">
    <input type="hidden" id="codasignatura" class="form-control" name="codasignatura" value="{{$asignaturas['codasignatura']}}">
   
    <div class="form-group">
        <label class="control-label col-sm-3" for="unies">Universidad-Carrera</label>
        <div class="col-sm-6">
        <select disabled class="form-control" id="codcarrera" name="codcarrera">
                    @foreach ($carreras as $carrera)
                    @if($carrera->codcarrera == $asignaturas['codcarrera'])
                    <option value="{{$carrera->codcarrera}}">{{$carrera->descuniversidad}} - {{$carrera->descsede}} -
                        {{$carrera->descfacultad}} - {{$carrera->descescuela}}
                        - {{$carrera->desccarrera}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
    </div>

    <div class="form-group">
            <label class="control-label col-sm-3" for="asignatura">Asignatura</label>
            <div class="col-sm-6">
                <select disabled class="form-control" id="asignatura" name="asignatura">
                    <option>{{$asignaturas['descasignatura']}}</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="tema">Tema</label>
            <div class="col-sm-6">
                <select disabled class="form-control" id="selecttema" name="selecttema">
                    <option>{{$tema['desctema']}}</option>
                </select>
            </div>
        </div>
    

    <div class="form-group" style="width:1000px; margin-left: 1%;">
        <h6>Texto</h6>
        <textarea id="summernote"  name="textocontenido" >
        {{$contenidos['textocontenido']}}
        </textarea>
        
    </div>    
    
    <div class="form-group" style="width:1000px; margin-left: 1%;">
        <h6>Texto</h6>
        <textarea id="infoapoyo"  name="infoapoyo" style= "height: 100px;
            width: 1000px;">
        {{$contenidos['infoapoyocontenido']}}
        </textarea>
        
    </div> 
  
    <div class="form-group" style="width:800px; margin-left: 1%;">
    <h6>Imagen</h6>
        {{ csrf_field() }}
        <div id="contenidoImagen">
        @if($contenidos['imagencontenido'] != "")
        <img src="/images/{{$contenidos['imagencontenido']}}" width="300" />
        @endif
        </div>
        <div class="form-group">
        <table class="table">
        <tr>
        <td><label>Seleccione la imagen</label></td>
        <td><input type="file" name="imagencontenido" /></td>
        <td><span class="text-muted">Solo imagenes con extención .jpg</span></td>
        </tr>
        </table>
        </div>
    <br />
    </div>

    <div class="form-group" style="width:800px; margin-left: 1%;">
    <h6>Audio</h6>
        {{ csrf_field() }}
        <div id="contenidoAudio">
        @if($contenidos['audiocontenido'] != "")
        <audio controls>
        <source src="/audio/{{$contenidos['audiocontenido']}}"  type="audio/mpeg" width="300" />
        </audio>
        @endif
        </div>
        <div class="form-group">
        <table class="table">
        <tr>
        <td><label>Seleccione el audio</label></td>
        <td><input type="file" name="audiocontenido" /></td>
        <td><span class="text-muted">Solo audios con extención .mp3 y tamaño de 2MB</span></td>
        </tr>
        </table>
        </div>
    <br />
    </div>

    <div class="form-group" style="width:800px; margin-left: 1%;">
    <h6>Video</h6>
        {{ csrf_field() }}
        <div id="contenidoVideo">
        @if($contenidos['videocontenido'] != "")
        <video controls>
        <source src="/video/{{$contenidos['videocontenido']}}"  type="video/mp4" width="500" />
        </video>
        @endif
        </div>
        <div class="form-group">
        <table class="table">
        <tr>
        <td><label>Seleccione el video</label></td>
        <td><input type="file" name="videocontenido" /></td>
        <td><span class="text-muted">Solo videos con extención .mp4</span></td>
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
</html>