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
<form method="post" action="{{URL::to('/actualizarTalleres')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-horizontal">


        <!--<button class="btn btn-danger" formmethod ="post" formaction="{{URL::to('/eliminarTaller')}}" type="submit">Eliminar</button>-->
        <input type="hidden" id="codtaller" class="form-control" name="codtaller" value="{{$talleres['codtaller']}}">
        <input type="hidden" id="tema" class="form-control" name="tema" value="{{$tema['codtema']}}">

        <div class="form-group">
            <label class="control-label col-sm-3" for="unies">Universidad-Carrera</label>
            <div class="col-sm-6">
                <select disabled class="form-control" id="codcarrera" name="codcarrera">
                    @foreach ($carreras as $carrera)
                    @if($carrera->codcarrera == $asignaturas['codcarrera'])
                    <option value="{{$carrera->codcarrera}}">{{$carrera->descuniversidad}} - {{$carrera->descsede}} -
                        {{$carrera->descfacultad}} - {{$carrera->descescuela}}
                        - {{$carrera->desccarrera}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="asignatura">Asignatura</label>
            <div class="col-sm-6">
                <select disabled class="form-control" id="asignatura" name="asignatura">
                    <option>{{$asignaturas['descasignatura']}}</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="tema">Tema</label>
            <div class="col-sm-6">
                <select disabled class="form-control" id="selecttema" name="selecttema">
                    <option>{{$tema['desctema']}}</option>
                </select>
            </div>
        </div>



        <div class="form-group" style="width:800px; margin-left: 1%;">
            <h6>Archivo de taller</h6>
            {{ csrf_field() }}
            @if($talleres['archivotaller'] != "")
            <a href="/taller/{{$talleres['archivotaller']}}" width="300">Descargar: {{$talleres['archivotaller']}}</a>
            <br />
            @endif
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
            <h6>Archivo de solucion</h6>
            {{ csrf_field() }}
            @if($talleres['archivosolucion'] != "")
            <a href="/soluciones/{{$talleres['archivosolucion']}}" width="300">Descargar: {{$talleres['archivosolucion']}}</a>
            <br />
            @endif
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

@stop