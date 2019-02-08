@extends('base')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Asignatura</div>

                <div class="card-body">
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
                @endif

                
<form    method="post" action="{{URL::to('/actualizarAsignatura')}}" enctype="multipart/form-data">
@csrf
    <div class="form-horizontal">
   

    <div class="form-group row">
        <label class="control-label col-sm-3" for="descuniversidad">Universidad</label>
        <div class="col-sm-6">
        <select class="form-control" id="descuniversidad" name="descuniversidad">
        @foreach($universidades as $universidad)
            <option>{{$universidad->descuniversidad}}</option>
        @endforeach
        </select>
            </div>
    </div>


    @foreach($asignaturas as $asignatura)
    
    <div class="form-group row">
        <label class="control-label col-sm-3" for="desccarrera">Carrera</label>
        <div class="col-sm-6">
        <select class="form-control" id="desccarrera" name="desccarrera">
        @foreach($cars as $car)
        <option>{{$car->desccarrera}}</option>
        @endforeach
        @foreach($carreras as $carrera)
             <option>{{$carrera->desccarrera}}</option>
        @endforeach
        </select>
            </div>
    </div>



    <div class="form-group row">
        <label class="control-label col-sm-3" for="codasignatura">Codigo</label>
        <div class="col-sm-6">
            <input type="text" id="desccarrera" class="form-control" name="codasignatura" value="{{$asignatura->codasignatura}}" readonly>
            </div>
    </div>

    <div class="form-group row">
        <label class="control-label col-sm-3" for="descasignatura">Asignatura</label>
        <div class="col-sm-6">
            <input type="text" id="descasignatura" class="form-control" name="descasignatura" value="{{$asignatura->descasignatura}}">
            </div>
    </div>


    <div class="form-group row">
        <label class="control-label col-sm-3" for="credasignatura"># de creditos</label>
        <div class="col-sm-6">
        <select class="form-control" id="credasignatura" name="credasignatura">
            <option>{{$asignatura->credasignatura}}</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
        </select>
            </div>
    </div>

    <div class="form-group row">
    <label class="control-label col-sm-3" for="nivelasignatura">Nivel</label>
    <div class="col-sm-6">
    <select class="form-control" id="nivelasignatura" name="nivelasignatura">
        <option>{{$asignatura->nivelasignatura}}</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
        <option>11</option>
        <option>12</option>
        <option>13</option>
        <option>14</option>
        <option>15</option>
    </select>
        </div>
    </div>


    <div class="form-group row">
        <label class="control-label col-sm-3" for="objeasignatura">Objetivos</label>
        <div class="col-sm-6">
        <textarea class="form-control" rows="5" name="objeasignatura" id='objeasignatura' value="{{$asignatura->objeasignatura}}">{{$asignatura->objeasignatura}}</textarea>
            </div>
    </div>

    <div class="form-group row">
        <label class="control-label col-sm-3" for="resulapreasignatura">Resultados de Apredizaje</label>
        <div class="col-sm-6">
        <textarea class="form-control" rows="5" name="resulapreasignatura" id='resulapreasignatura' value="{{$asignatura->resulapreasignatura}}">{{$asignatura->resulapreasignatura}}</textarea>
            </div>
    </div>

    <div class="form-group row">
        <label class="control-label col-sm-3" for="caracapreasignatura">Caracteristicas de aprendizaje</label>
        <div class="col-sm-6">
        <textarea class="form-control" rows="5" name="caracapreasignatura" id='caracapreasignatura' value="{{$asignatura->caracapreasignatura}}">{{$asignatura->caracapreasignatura}}</textarea>
            </div>
    </div>

    @endforeach



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


  












@stop

