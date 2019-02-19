@extends('base')
@section('content')
<html>

<head>
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
</head>

<div style="margin-top:80px" id="showcase">

    <h1><b>Contenidos</b></h1>

</div>

<br />
<form method="post" action="{{url('contenidos')}}" class="form-horizontal" data-toggle="validator"
    enctype="multipart/form-data">
    @csrf
    <div class="form-horizontal">
        <input type="hidden" id="codcontenido" class="form-control" name="codcontenido" >

        <div class="form-group">
            <label class="control-label col-sm-3" for="unies">Universidad-Carrera</label>
            <div class="col-sm-6">
                <select class="form-control" id="codcarrera" name="codcarrera" onchange="cambioCarrera()">
                    @foreach ($carreras as $carrera)
                    <option value="{{$carrera->codcarrera}}">{{$carrera->descuniversidad}} - {{$carrera->descsede}} -
                        {{$carrera->descfacultad}} - {{$carrera->descescuela}}
                        - {{$carrera->desccarrera}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="asignatura">Asignatura</label>
            <div class="col-sm-6">
                <select class="form-control" id="asignatura" name="asignatura" onchange="cambioAsignatura()">
                    <option></option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="tema">Tema</label>
            <div class="col-sm-6">
                <select class="form-control" id="tema" name="tema" onchange="cambioTema()">
                    <option></option>
                </select>
            </div>
        </div>

        <div class="form-group" style="width:1000px; margin-left: 1%;">
            <h6>Texto</h6>
            <textarea name="textocontenido" id="summernote"></textarea>
        </div>

        <div class="form-group" style="width:1000px; margin-left: 1%;">
            <h6>Información de Apoyo</h6>
            <textarea style= "height: 100px;
            width: 1000px;" name="infoapoyo" id="infoapoyo"></textarea>
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
            <br/>
        </div>


        <div class="row">
            <div class="col-md-3"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-primary btn-save">Guardar</button>
            </div>
        </div>

</form>

<script>

$(document).ready(function(){

    $('#summernote').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 2,
            height: 100,
            width: 1000
        });

    var codcontenido = null;
    var contenidos;

<?php if(isset($contenidos)){
       echo 'contenidos = '.json_encode($contenidos, JSON_HEX_TAG).';'; }?>
    Array.from(contenidos).forEach(function(contenido){
        if(document.getElementById('tema').value==contenido.codtema)
        {
            codcontenido = contenido.codcontenido;
        }
    })
    document.getElementById('codcontenido').value = codcontenido;

    cambioCarrera();
})

function cambioTema(){
    var codcontenido = null;
    var contenidos;

<?php if(isset($contenidos)){
       echo 'contenidos = '.json_encode($contenidos, JSON_HEX_TAG).';'; }?>

Array.from(contenidos).forEach(function(contenido){
        if(document.getElementById('tema').value==contenido.codtema)
        {
            codcontenido = contenido.codcontenido;
        }
    })
    document.getElementById('codcontenido').value = codcontenido;
}

function cambioCarrera(){
    var asignaturas;
    var carreras;
    var $asigCombo = $("#asignatura");
    $asigCombo.empty(); // remove old options
    <?php if(isset($asignaturas)){
		echo 'asignaturas = '.json_encode($asignaturas, JSON_HEX_TAG).';'; }?>
    <?php if(isset($carreras)){
           echo 'carreras = '.json_encode($carreras, JSON_HEX_TAG).';'; }?>
        
    carreras.forEach(function(carrera){
        
       if(carrera.codcarrera==document.getElementById('codcarrera').value){
        
        asignaturas.forEach(function(asignatura){
            if(asignatura.codcarrera==carrera.codcarrera)
            {
                var option = $('<option></option>').attr("value", asignatura.codasignatura).text(asignatura.descasignatura);
                $asigCombo.append(option);
            }
        })
       }
    })
    cambioAsignatura();
}

function cambioAsignatura(){
    var asignaturas;
    var temas;
    var $temaCombo = $("#tema");
    $temaCombo.empty(); // remove old options
    <?php if(isset($asignaturas)){
		echo 'asignaturas = '.json_encode($asignaturas, JSON_HEX_TAG).';'; }?>
    <?php if(isset($tema)){
           echo 'temas = '.json_encode($tema, JSON_HEX_TAG).';'; }?>
        
    asignaturas.forEach(function(asignatura){
        
       if(asignatura.codasignatura==document.getElementById('asignatura').value){
        
        temas.forEach(function(tema){
            if(tema.codasignatura==asignatura.codasignatura)
            {
                var option = $('<option></option>').attr("value", tema.codtema).text(tema.desctema);
                $temaCombo.append(option);
            }
        })
       }
    })
    cambioTema();
}
</script>




@stop

</html>