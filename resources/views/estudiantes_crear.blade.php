@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')
@if (Session::has('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ Session::get('error') }}</strong>
                    </div>
                    @endif
    <body>
        <div style="    margin-left: 5%">
            
            <div class="row">
                <div class="col-sm-11">
                    <h2>Nuevo Estudiante</h2>
                </div>
                <div class="col-sm-1">
                    <a href="/pagEstudiantes" class="btn btn-primary"> Volver</a>
                </div>
            </div>   

            <br>
  

            <form method="post" action = "/pagEstudiantes/crear"> 
                {{ csrf_field() }}
                <div class="form-group row">
                <label for="sedeNombre" class="col-sm-2 col-form-label">Universidad - Carrera</label>
                <div  style="width: 38%;">
                <select class="form-control" id="codcarrera" name="codcarrera">
                        @foreach ($carreras as $carrera)
    +                       <option value="{{$carrera->codcarrera}}">{{$carrera->descuniversidad}} -  {{$carrera->descsede}} -  {{$carrera->descfacultad}} -  {{$carrera->descescuela}}
                           -  {{$carrera->desccarrera}}</option>
    +                   @endforeach
                    </select>
                </div>
                    
                </div>
                <div class="form-group row">
                    <label for="cedestudiante" class="col-sm-2 col-form-label">Cédula</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="cedestudiante" id="cedestudiante" maxlength="10"required placeholder="Ingrese su Cédula">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nomestudiante" class="col-sm-2 col-form-label">Nombres</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="nomestudiante" id="nomestudiante" required placeholder="Ingrese sus Nombres">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="apeestudiante" class="col-sm-2 col-form-label">Apellidos</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="apeestudiante" id="apeestudiante" required placeholder="Ingrese sus Apellidos">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="correestudiante" class="col-sm-2 col-form-label">Correo</label>
                    <div class="col-sm-2">
                        <input type="email" pattern=".+@puce.edu.ec"   class="form-control" name="correestudiante" id="correestudiante" placeholder="Correo de la Universidad">
                    </div>
                </div>

                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>

            <br>
        </div>
    </body>
@endsection
