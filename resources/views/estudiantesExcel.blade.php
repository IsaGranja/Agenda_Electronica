@extends('base')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Importar Estudiantes Excel</div>

                <div class="card-body">
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

<form   method="post" action="{{route('estudiante.import')}}" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
@csrf
    <div class="form-horizontal">
        

        
    @foreach($datos as $dato)
    <input type="hidden" id="codcarrera" class="form-control" name="codcarrera" value="{{$dato->codcarrera}}">
    <input type="hidden" id="codasignatura" class="form-control" name="codasignatura" value="{{$dato->codasignatura}}">
    @endforeach


    
    @foreach($periodos as $periodo)
    <div class="form-group row">
        <label class="control-label col-sm-3" for="codperiodo">Periodo</label>
        <div class="col-sm-10">
            <input type="text" id="codperiodo" class="form-control" readonly name="codperiodo" value="{{$periodo->codperiodo}}">
            </div>
        </div>
    @endforeach

    <div class="form-group row">
        <label class="control-label col-sm-3" for="unies">Universidad-Carrera</label>
        <div class="col-sm-10">
        <select class="form-control" id="unies" name="unies">
        <option>Seleccionar Carrera</option>
    @foreach ($carreras as $carrera)
    <option value="{{$carrera->codcarrera}}" > {{$carrera->descuniversidad}} -  {{$carrera->descsede}} -  {{$carrera->descfacultad}} -  {{$carrera->descescuela}} -  {{$carrera->desccarrera}}</option>
    @endforeach
        </select>
            </div>
    </div>

    <div class="form-group row">
        <label class="control-label col-sm-3" for="asignatura">Asignatura</label>
        <div class="col-sm-10">
        <select class="form-control" id="asignatura" name="asignatura">
    
        </select>
            </div>
    </div>

    <div class="form-group row">
        <label class="control-label col-sm-3" for="cedprofesor">Cedula del profesor</label>
        <div class="col-sm-10">
            <input type="text" id="cedprofesor" class="form-control" name="cedprofesor">
            </div>
    </div>


    <div class="form-group row">
        <label for="file" class="col-md-3 control-label">Archivo</label>
        <div class="col-md-10">
            <input type="file" id="file" name="file" class="form-control" autofocus required>
        <span class="help-block with-errors"></span>
        </div>
    </div>



   <div class="form-group row">
        
        <div class="col-sm-10">
        <button type="submit" class="btn btn-primary btn-save col-sm-7">Guardar</button>
            </div>
    </div>

       

</form>



                </div>
            </div>
        </div>
    </div>
</div>


  

 <script>

$("#unies").on("change", function () {


    var select = document.getElementById("asignatura");
    var length = select.options.length;
    for (i = 0; i < length; i++) {
        select.remove(i);
    }
   var asignaturas;
    <?php if(isset($asignaturas)){
		echo 'asignaturas = '.json_encode($asignaturas, JSON_HEX_TAG).';'; }?>

    asignaturas.map(function(asignatura){
        console.log(document.getElementById('unies').value)
       if(asignatura.codcarrera==document.getElementById('unies').value) {
        
        $('#asignatura').append("<option value='"+asignatura.codasignatura+"'>"+asignatura.descasignatura+"</option>")
        //document.getElementById('asignatura').value = asignatura.descasignatura;
        
       } 
    })
})
</script> 









@stop
