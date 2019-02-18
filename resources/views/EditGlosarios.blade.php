@extends('base')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Glosarios</div>

                <div class="card-body">
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
                @endif
                @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                
<form    method="post" action="{{URL::to('/actualizarGlosarios')}}" enctype="multipart/form-data">
@csrf
    <div class="form-horizontal">
        
    @foreach($periodos as $periodo)
    <div class="form-group row">
        <label class="control-label col-sm-3" for="codperiodo">Periodo</label>
        <div class="col-sm-6">
            <input type="text" id="codperiodo" class="form-control" name="codperiodo" value="{{$periodo->codperiodo}}" readonly>
            </div>
        </div>
    @endforeach

    @foreach($profesores as $profesor)

    <div class="form-group row">
        <label class="control-label col-sm-3" for="cedprofesor">Cedula del profesor</label>
        <div class="col-sm-6">
            <input type="text" id="cedprofesor" class="form-control" name="cedprofesor" value="{{$profesor->cedprofesor}}">
            </div>
    </div>

    <div class="form-group row">
        <label class="control-label col-sm-3" for="nombreapellido">Nombre</label>
        <div class="col-sm-6">
            <input type="text" id="nombreapellido" class="form-control" name="nombreapellido" readonly value="{{$profesor->nomprofesor}} {{$profesor->apeprofesor}}">
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
            <th>Accion</th>
    </tr>
  </thead>
  <tbody id="cuerpo">
    @foreach($asignaturasxprofesor as $ass)
    <tr>

    <td><div class="form-row"><div class="form-group col-md-12">
    <select class="selectpicker form-control " name="asignaturas[]" data-live-search="true" required novalidate>
    <option value="{{$ass->descasignatura}}">{{$ass->descasignatura}}</option>
    @foreach ($asignaturas as $asig)
    <option value="{{$asig->descasignatura}}">{{$asig->descasignatura}}</option>
    @endforeach
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

$("#cedprofesor").on("change", function () {

    var profesores;
    <?php if(isset($profesores)){
		echo 'profesores = '.json_encode($profesores, JSON_HEX_TAG).';'; }?>

    profesores.forEach(function(profesor){
       if(profesor.cedprofesor==document.getElementById('cedprofesor').value){
        
        document.getElementById('nombreapellido').value = profesor.nomprofesor +' '+ profesor.apeprofesor
        
       }
    })
})
</script>




@stop

