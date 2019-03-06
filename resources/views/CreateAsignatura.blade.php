@extends('base')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Asignaturas</div>

                <div class="card-body">
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
                @endif
                @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                
<form    method="post" action="{{URL::to('/pagAsignaturas')}}" enctype="multipart/form-data">
@csrf
    <div class="form-horizontal">
   
    <div class="form-group row">
        <label class="control-label col-sm-3" for="codcarrera">Universidad-Carrera</label>
        <div class="col-sm-6">
            <select class="form-control" id="codcarrera" name="codcarrera">
            <option>Seleccionar Universidad - Carrera</option>
                @foreach ($carreras as $carrera)
                <option value="{{$carrera->codcarrera}}" > {{$carrera->descuniversidad}} -  {{$carrera->descsede}} -  {{$carrera->descfacultad}} -  {{$carrera->descescuela}} -  {{$carrera->desccarrera}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="control-label col-sm-3" for="codasignatura">Código</label>
        <div class="col-sm-6">
            <input type="text" id="desccarrera" class="form-control" name="codasignatura">
        </div>
    </div>

    <div class="form-group row">
        <label class="control-label col-sm-3" for="descasignatura">Asignatura</label>
        <div class="col-sm-6">
            <input type="text" id="descasignatura" class="form-control" name="descasignatura">
            </div>
    </div>


    <div class="form-group row">
        <label class="control-label col-sm-3" for="credasignatura"># de créditos</label>
        <div class="col-sm-6">
        <select class="form-control" id="credasignatura" name="credasignatura">
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
        <textarea class="form-control" rows="5" name="objeasignatura" id='objeasignatura' value=""></textarea>
            </div>
    </div>

    <div class="form-group row">
        <label class="control-label col-sm-3" for="resulapreasignatura">Resultados de Apredizaje</label>
        <div class="col-sm-6">
        <textarea class="form-control" rows="5" name="resulapreasignatura" id='resulapreasignatura' value=""></textarea>
            </div>
    </div>

    <div class="form-group row">
        <label class="control-label col-sm-3" for="caracapreasignatura">Características de aprendizaje</label>
        <div class="col-sm-6">
        <textarea class="form-control" rows="5" name="caracapreasignatura" id='caracapreasignatura' value=""></textarea>
            </div>
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


  












@stop

