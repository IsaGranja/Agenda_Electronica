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

<br />
<form method="post" action="{{url('glosarios')}}" class="form-horizontal card" data-toggle="validator"
    enctype="multipart/form-data">
    @csrf
    <div class="card-header"><h2>Glosarios</h2></div>
    <div class="form-horizontal card-body">
 

        <div class="form-group row">
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

        <div class="form-group row">
            <label class="control-label col-sm-3" for="asignatura">Asignatura</label>
            <div class="col-sm-6">
                <select class="form-control" id="asignatura" name="asignatura" onchange="cambioAsignatura()">
                    <option></option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="control-label col-sm-3" for="tema">Tema</label>
            <div class="col-sm-6">
                <select class="form-control" id="tema" name="tema" onchange="cambioTema()">
                    <option></option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="control-label col-sm-3" for="contenido">Contenido</label>
            <div class="col-sm-6">
                <select class="form-control" id="contenido" name="contenido" onchange="cambioContenido()">
                    <option></option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="button" id="addglosario"
                    class="btn btn-primary btn-save">Nuevo</button>
            </div>
        </div>
        <div>
            <table class="table table-striped" id="myTable">
                <thead>
                    <tr>
                        <th>Palabra</th>
                        <th>Definición</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col-md-5"></div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-primary btn-save">Guardar</button>
            </div>
        </div>
</form>

<script>

$(document).ready(function(){
    cambioCarrera();
});

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
function cambioTema(){
    var tema;
    var contenido;
    var $contenidoCombo = $("#contenido");
    $contenidoCombo.empty(); // remove old options
    <?php if(isset($contenido)){
		echo 'contenido = '.json_encode($contenido, JSON_HEX_TAG).';'; }?>
    <?php if(isset($tema)){
           echo 'tema = '.json_encode($tema, JSON_HEX_TAG).';'; }?>
    tema.forEach(function(tema){    
       if(tema.codtema==document.getElementById('tema').value){
            contenido.forEach(function(contenido){
                if(contenido.codtema==tema.codtema)
                {
                    var texto=contenido.textocontenido;
                    //alert(texto);
                    var option = $('<option></option>').attr("value", contenido.codcontenido).html(texto);
                    $contenidoCombo.append(option);
                }
        })
       }
    })
}
var counter = 0;
$("#addglosario").on("click", function () {
            var newRow = $("<tr>");
            var cols = "";
            cols += '<td><input type="text" class="form-control" name="palabraglosario[]"></td>';
            cols += '<td><input type="text" class="form-control" name="defglosario[]"></td>';
            cols += '<td><div class="form-group col-md-4"><button type="button" class="btn ibtnDel btn-danger"><span class="glyphicon glyphicon-remove-sign"></span></button></div></div></div></td></tr>';
            newRow.append(cols);
            $("#myTable").append(newRow);
            counter++;
        });

        $("#myTable").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();       
            counter -= 1
        });
    
</script>
@stop

</html>