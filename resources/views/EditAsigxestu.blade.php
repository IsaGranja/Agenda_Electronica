@extends('base')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Asignaturas por estudiante</div>

                <div class="card-body">
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
                @endif

                
<form    method="post" action="{{URL::to('/actualizarAsigxestu')}}" enctype="multipart/form-data">
@csrf
    <div class="form-horizontal">
        

        
    

    @foreach($periodos as $periodo)
    <div class="form-group row">
        <label class="control-label col-sm-3" for="codperiodo">Periodo</label>
        <div class="col-sm-6">
            <input type="text" id="codperiodo" class="form-control" name="codperiodo" value="{{$periodo->codperiodo}}">
            </div>
        </div>
    @endforeach

   
    @foreach($estudiantes as $estudiante)

    <div class="form-group row">
        <label class="control-label col-sm-3" for="cedestudiante">Cedula del profesor</label>
        <div class="col-sm-6">
            <input type="text" id="cedestudiante" class="form-control" name="cedestudiante" value="{{$estudiante->cedestudiante}}">
            </div>
    </div>


    <div class="form-group row">
        <label class="control-label col-sm-3" for="nombreapellido">Nombre</label>
        <div class="col-sm-6">
            <input type="text" id="nombreapellido" class="form-control" name="nombreapellido" readonly value="{{$estudiante->nomestudiante}}' '{{$estudiante->apeestudiante}}">
            </div>
    </div>

    <div class="form-group row">
        <label class="control-label col-sm-3" for="desccarrera">Carrera</label>
        <div class="col-sm-6">
            <input type="text" id="desccarrera" class="form-control" name="desccarrera" readonly>
            </div>
    </div>
    @endforeach


    <div class="form-group row">
        <div class="col-sm-10">
        <button type="button" id="addasignatura" class="btn btn-primary btn-save">Nuevo</button>
            </div>
        </div>
        
   
        


    <div>
  <table id="tabla" class=" table order-list">
  <thead class="thead-light">
    <tr>
            <th>Asignatura</th>
            <th>Profesores</th>
            <th>Accion</th>
    </tr>
  </thead>
  <tbody id="cuerpo">
    @foreach($asignaturasxestudiantes as $ass)
    <tr>


    <td><div class="form-row"><div class="form-group col-md-12">
    <select class="selectpicker form-control " name="asignaturas[]" data-live-search="true" required novalidate>
    <option value="{{$ass->descasignatura}}">{{$ass->descasignatura}}</option>
    @foreach ($asignaturas as $asig)
    <option value="{{$asig->descasignatura}}">{{$asig->descasignatura}}</option>
    @endforeach
    </select></div></td>
    <td><div class="form-row"><div class="form-group col-md-12">
    <select class="selectpicker form-control " name="profesores[]" data-live-search="true" required novalidate>'+
    <option value='{{$ass->cedprofesor}}'>{{$ass->nomprofesor}} {{$ass->apeprofesor}}</option>
    @foreach ($profesores as $prof)
    <option value="{{$prof->cedprofesor}}">{{$prof->nomprofesor}} {{$prof->apeprofesor}} </option>@endforeach
    </select></div></td>
    <td><div class="form-group col-md-4"><button type="button" class="btn ibtnDel btn-danger"><span class="glyphicon glyphicon-remove-sign">Remover</span></button></div></div></div></td>

    </tr>
    @endforeach
  </tbody>
</table>
  </div>

<div class="row">
          <div class="col-md-5"></div>
          <div class="form-group col-md-4" >
          <button type="submit" class="btn btn-primary btn-save">Guardar</button>
          </div>
        </div>


</form>


                </div>
            </div>
        </div>
    </div>
</div>


  







<script>
var counter = 0;

$("#addasignatura").on("click", function () {
    var newRow = $("<tr>");
    var cols = "";
    cols += '<td><div class="form-row"><div class="form-group col-md-12"><select class="selectpicker form-control " name="asignaturas[]" data-live-search="true" required novalidate>'+
    '<option disabled selected value> -- Seleccione una asignatura -- </option>'+
    '@foreach ($asignaturas as $asig)'+
    '<option value="{{$asig->descasignatura}}">{{$asig->descasignatura}}</option>@endforeach</select></div></td>';
    cols += '<td><div class="form-row"><div class="form-group col-md-12"><select class="selectpicker form-control " name="profesores[]" data-live-search="true" required novalidate>'+
    '<option disabled selected value> -- Seleccione un profesor -- </option>'+
    '@foreach ($profesores as $prof)'+
    '<option value="{{$prof->cedprofesor}}">{{$prof->nomprofesor}} {{$prof->apeprofesor}} </option>@endforeach</select></div></td>';
    
    
    cols += '<td><div class="form-group col-md-4"><button type="button" class="btn ibtnDel btn-danger"><span class="glyphicon glyphicon-remove-sign">Remover</span></button></div></div></div></td></tr>';
    newRow.append(cols);
    $("table.order-list").append(newRow);
    counter++;
});



$("table.order-list").on("click", ".ibtnDel", function (event) {
    $(this).closest("tr").remove();       
    counter -= 1
});
</script>


<script>

$(document).ready(function(){
    var estudiantes;
var carreras;
<?php if(isset($estudiantes)){
    echo 'estudiantes = '.json_encode($estudiantes, JSON_HEX_TAG).';'; }?>
<?php if(isset($carreras)){
       echo 'carreras = '.json_encode($carreras, JSON_HEX_TAG).';'; }?>

estudiantes.forEach(function(estudiante){
    
   if(estudiante.cedestudiante==document.getElementById('cedestudiante').value){
    
    carreras.forEach(function(carrera){
        if(carrera.codcarrera==estudiante.codcarrera)
            document.getElementById('desccarrera').value = carrera.desccarrera
    })
    document.getElementById('nombreapellido').value = estudiante.nomestudiante +' '+ estudiante.apeestudiante
   
   }
})
})
$("#cedestudiante").on("change", function () {

var estudiantes;
var carreras;
<?php if(isset($estudiantes)){
    echo 'estudiantes = '.json_encode($estudiantes, JSON_HEX_TAG).';'; }?>
<?php if(isset($carreras)){
       echo 'carreras = '.json_encode($carreras, JSON_HEX_TAG).';'; }?>

estudiantes.forEach(function(estudiante){
    
   if(estudiante.cedestudiante==document.getElementById('cedestudiante').value){
    
    carreras.forEach(function(carrera){
        if(carrera.codcarrera==estudiante.codcarrera)
            document.getElementById('desccarrera').value = carrera.desccarrera
    })
    document.getElementById('nombreapellido').value = estudiante.nomestudiante +' '+ estudiante.apeestudiante
   
   }
})
})
</script>




@stop

