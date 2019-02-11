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
                    @if (session('error'))
                    <div class="alert alert-danger">
                        <p>{{Session('error') }}</p>
                    </div><br />
                    @endif

                
<form    method="post" action="{{URL::to('/actualizarAsigxestu')}}" enctype="multipart/form-data">
@csrf

<div class="form-horizontal">
                            <div class="form-group row">
                                <label class="control-label col-sm-3" for="cedestudiante">Cedula del estudiante</label>
                                <div class="col-sm-6">
                                    <input type="text" id="cedestudiante" class="form-control" name="cedestudiante" 
                                    value="{{$estudiantes['cedestudiante']}}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-sm-3" for="descfacultad">Facultad</label>
                                <div class="col-sm-6">
                                    <input type="text" id="descfacultad" class="form-control" name="descfacultad"
                                    value="{{$facultades['descfacultad']}}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-sm-3" for="descescuela">Escuela</label>
                                <div class="col-sm-6">
                                    <input type="text" id="descescuela" class="form-control" name="descescuela"
                                    value="{{$escuelas['descescuela']}}"readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-sm-3" for="desccarrera">Carrera</label>
                                <div class="col-sm-6">
                                    <input type="text" id="desccarrera" class="form-control" name="desccarrera"
                                    value="{{$carreras['desccarrera']}}" readonly>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="control-label col-sm-3" for="nombreapellido">Nombre</label>
                                <div class="col-sm-6">
                                    <input type="text" id="nombreapellido" class="form-control" name="nombreapellido"
                                    value="{{$estudiantes['nomestudiante']}} {{$estudiantes['apeestudiante']}}" readonly>
                                </div>
                            </div>


    <div class="form-group row">
        <div class="col-sm-10">
        <button type="button" id="addasignatura" class="btn btn-primary btn-save">Nuevo</button>
            </div>
        </div>
        
   
        


    <div>
  <table id="myTable" class="table table-striped">
  <thead class="thead-light">
    <tr>
            <th>Asignatura</th>
            <th>Profesores</th>
            <th>Periodo</th>
            <th>Accion</th>
    </tr>
  </thead>
  <tbody>
    @foreach($asignaturasxestudiantes as $ass)
    @foreach($periodos as $periodo)
    @if($ass->codperiodo == $periodo->codperiodo && $periodo->estperiodo == "A")
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
    <td><div class="form-row"><div class="form-group col-md-12">
    <select class="selectpicker form-control " name="periodos[]" data-live-search="true" required novalidate>
    <option selected value='{{$ass->codperiodo}}'>{{$ass->codperiodo}}</option>
    </select></div></td>
    <td><div class="form-group col-md-4"><button type="button" class="btn ibtnDel btn-danger"><span class="glyphicon glyphicon-remove-sign">Remover</span></button></div></div></div></td>
    @elseif($ass->codperiodo == $periodo->codperiodo && $periodo->estperiodo == "I")
    <tr>
    <td><div class="form-row"><div class="form-group col-md-12">
    <select class="selectpicker form-control " name="asignaturas[]" data-live-search="true" required novalidate>
    <option selected value="{{$ass->descasignatura}}">{{$ass->descasignatura}}</option>
    </select></div></td>
    <td><div class="form-row"><div class="form-group col-md-12">
    <select class="selectpicker form-control " name="profesores[]" data-live-search="true" required novalidate>'+
    <option selected value='{{$ass->cedprofesor}}'>{{$ass->nomprofesor}} {{$ass->apeprofesor}}</option>
    <td><div class="form-row"><div class="form-group col-md-12">
    <select class="selectpicker form-control " name="periodos[]" data-live-search="true" required novalidate>
    <option selected value='{{$ass->codperiodo}}'>{{$ass->codperiodo}}</option>
    </select>
    </div></td>
    <td></td>
    @endif
    @endforeach
    
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

$(document).ready(function(){
    /*var estudiantes;
    var carreras;
    var escuelas;
    var facultades;

     <?php if(isset($estudiantes)){
		echo 'estudiantes = '.json_encode($estudiantes, JSON_HEX_TAG).';'; }?>
    <?php if(isset($carreras)){
           echo 'carreras = '.json_encode($carreras, JSON_HEX_TAG).';'; }?>
    <?php if(isset($escuelas)){
		echo 'escuelas = '.json_encode($escuelas, JSON_HEX_TAG).';'; }?>
    <?php if(isset($facultades)){
           echo 'facultades = '.json_encode($facultades, JSON_HEX_TAG).';'; }?>
           



            carreras.forEach(function(carrera) {
                if (carrera.codcarrera == estudiantes.codcarrera)
                {
                    escuelas.forEach(function(escuela){
                        if (escuela.codescuela == carrera.codescuela)
                        {
                            facultades.forEach(function(facultad){
                                if(facultad.codfacultad == escuela.codfacultad)
                                {
                                    document.getElementById('desccarrera').value = carrera.desccarrera;
                                    document.getElementById('descfacultad').value = facultad.descfacultad;
                                    document.getElementById('descescuela').value = escuela.descescuela;
                                }
                            })
                        }
                })
                }
                    
            })
            document.getElementById('nombreapellido').value = estudiantes.nomestudiante + ' ' +
                estudiantes.apeestudiante;*/

        
$('#myTable').DataTable({
        "pageLength": 10
    });


    var counter = 0;

    $('#addasignatura').on('click', function() {

        var tabla = $("#myTable").DataTable();


        var cols =
            '<tr><td><div class="form-row"><div class="form-group col-md-12"><select class="selectpicker form-control " name="asignaturas[]" data-live-search="true" required novalidate>' +
            '<option disabled selected value> -- Seleccione una asignatura -- </option>' +
            '@foreach ($asignaturas as $asig)' +
            '<option value="{{$asig->descasignatura}}">{{$asig->descasignatura}}</option>@endforeach</select></div></td>';
        cols +=
            '<td><div class="form-row"><div class="form-group col-md-12"><select class="selectpicker form-control " name="profesores[]" data-live-search="true" required novalidate>' +
            '<option disabled selected value> -- Seleccione un profesor -- </option>' +
            '@foreach ($profesores as $prof)' +
            '<option value="{{$prof->cedprofesor}}">{{$prof->nomprofesor}} {{$prof->apeprofesor}} </option>@endforeach</select></div></td>';

        cols +=
            '<td><div class="form-row"><div class="form-group col-md-12"><select class="selectpicker form-control " name="periodos[]" data-live-search="true" required novalidate>' +
            '@foreach ($periodos as $periodo)'+
            '@if($periodo->estperiodo == "A")' +
            '<option selected value="{{$periodo->codperiodo}}">{{$periodo->codperiodo}}</option>'+
            '@endif'+
            '@endforeach</select></div></td>';

        cols +=
            '<td><div class="form-group col-md-4"><button type="button" class="btn ibtnDel btn-danger"><span class="glyphicon glyphicon-remove-sign">Remover</span></button></div></div></div></td></tr>';


            tabla.row.add($(cols)).draw();

        counter++;
    });



    $("#myTable").on("click", ".ibtnDel", function(event) {
        var tabla = $("#myTable").DataTable();
        tabla
        .row( $(this).parents('tr') )
        .remove()
        .draw();
        counter -= 1
    });

});

</script>




@stop

