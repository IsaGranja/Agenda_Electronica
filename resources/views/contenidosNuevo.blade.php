@extends('base')
@section('content')
<html>

<head>
    >


    <!-- include summernote css/js -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>
    <script>
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 100,
            width: 1000
        });
    });
    </script>
</head>

<div style="margin-top:80px" id="showcase">

    <h1><b>Contenidos</b></h1>

</div>



<br />
<form method="post" action="{{url('contenidos')}}" class="form-horizontal" data-toggle="validator"
    enctype="multipart/form-data">
    @csrf
    <div class="form-horizontal">


        <input type="hidden" id="codcontenido" class="form-control" name="codcontenido"
            value="{{$contenido->codcontenido}}">

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
                    <option value="{{$dato->codasignatura}}">{{$dato->descasignatura}}</option>
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



        <div class="form-group" style="width:1000px; margin-left: 1%;">
            <h6>Texto</h6>
            <textarea name="textocontenido" id="summernote"></textarea>
        </div>



        <div class="form-group" style="width:800px; margin-left: 1%;">
            <h6>Imagen</h6>
            {{ csrf_field() }}
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
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-primary btn-save">Guardar</button>
            </div>
        </div>

</form>







@stop

</html>