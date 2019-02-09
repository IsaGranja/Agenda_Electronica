@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')
@if (Session::has('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ Session::get('success') }}</strong>
                </div>
@endif
    <br>
    <body>
        <div style="    margin-left: 5%">
            
            <div class="row">
                <div class="col-sm-11">
                    <h2>Nuevo Profesor</h2>
                </div>
                <div class="col-sm-1">
                    <a href="/pagProfesores" class="btn btn-primary"> Volver</a>
                </div>
            </div>   

            <br>
  
            
            <form method="post" action = "/pagProfesores/crear"> 
                {{ csrf_field() }}
                <div class="form-group row">
                <label for="sedeNombre" class="col-sm-2 col-form-label">Universidad - Carrera</label>
                <div style="width: 38%;">
                <select class="form-control" id="codcarrera" name="codcarrera">
                        @foreach ($carreras as $carrera)
    +                       <option value="{{$carrera->codcarrera}}">{{$carrera->descuniversidad}} -  {{$carrera->descsede}} -  {{$carrera->descfacultad}} -  {{$carrera->descescuela}}
                           -  {{$carrera->desccarrera}}</option>
    +                   @endforeach
                </select>
                </div>
                    
                </div>
                <div class="form-group row">
                    <label for="cedprofesor" class="col-sm-2 col-form-label">Cédula</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="cedprofesor" id="cedprofesor" maxlength="10"required placeholder="Ingrese su Cédula">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nomprofesor" class="col-sm-2 col-form-label">Nombres</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="nomprofesor" id="nomprofesor" required placeholder="Ingrese sus Nombres">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="apeprofesor" class="col-sm-2 col-form-label">Apellidos</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="apeprofesor" id="apeprofesor" required placeholder="Ingrese sus Apellidos">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="correprofesor" class="col-sm-2 col-form-label">Correo</label>
                    <div class="col-sm-2">
                        <input type="email" pattern=".+@puce.edu.ec"   class="form-control" name="correprofesor" id="correprofesor" placeholder="Correo de la Universidad">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="celuprofesor" class="col-sm-2 col-form-label">Celular</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="celuprofesor" id="celuprofesor" maxlength="10"required placeholder="Ingrese su Celular">
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
