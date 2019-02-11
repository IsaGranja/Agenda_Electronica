@extends('base')
@section('content')
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
<div style="margin-top:80px" id="showcase">

    <h1><b>Talleres</b></h1>

</div>



<br />
<form method="post" action="{{url('talleres')}}" class="form-horizontal" data-toggle="validator"
    enctype="multipart/form-data">
    @csrf
    <div class="form-horizontal">


        <!--<button class="btn btn-danger" formmethod ="post" formaction="{{URL::to('/eliminarTaller')}}" type="submit">Eliminar</button>-->
        <input type="hidden" id="codtaller" class="form-control" name="codtaller" >

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



        <div class="form-group" style="width:800px; margin-left: 1%;">
            <h6>Archivo de taller</h6>
            {{ csrf_field() }}
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
            <h6>Archivo de solución</h6>
            {{ csrf_field() }}
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
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-primary btn-save">Guardar</button>
            </div>
        </div>

</form>

<script>

$(document).ready(function(){
    var codtaller = null;
    var talleres;

<?php if(isset($talleres)){
       echo 'talleres = '.json_encode($talleres, JSON_HEX_TAG).';'; }?>
    Array.from(talleres).forEach(function(taller){
        if(document.getElementById('tema').value==taller.codtema)
        {
            codtaller = taller.codtaller;
        }
    })
    document.getElementById('codtaller').value = codtaller;

    cambioCarrera();
})

function cambioTema(){
    var codtaller = null;
    var talleres;

<?php if(isset($talleres)){
       echo 'talleres = '.json_encode($talleres, JSON_HEX_TAG).';'; }?>


    Array.from(talleres).forEach(function(taller){
        if(document.getElementById('tema').value==taller.codtema)
        {
            codtaller = taller.codtaller;
        }
    })
    
    document.getElementById('codtaller').value = codtaller; 
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