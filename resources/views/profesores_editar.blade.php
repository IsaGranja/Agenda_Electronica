@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')
    <br>
    <body>
        <div>
            
            <div class="row">
                <div class="col-sm-11">
                    <h2>Editar Profesor</h2>
                </div>
                <div class="col-sm-1">
                    <a href="/pagProfesores" class="btn btn-primary"> Volver</a>
                </div>
            </div>   

            <br>
  

            <form method="post" action = ""> 
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="cedprofesor" class="col-sm-2 col-form-label">Cédula</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="cedprofesor" id="cedprofesor" maxlength="10" value="{{$profesor->cedprofesor}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nomprofesor" class="col-sm-2 col-form-label">Nombres</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="nomprofesor" id="nomprofesor" required value="{{$profesor->nomprofesor}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="apeprofesor" class="col-sm-2 col-form-label">Apellidos</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="apeprofesor" id="apeprofesor" required value="{{$profesor->apeprofesor }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="celuprofesor" class="col-sm-2 col-form-label">Apellidos</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="celuprofesor" id="celuprofesor" required value="{{$profesor->celuprofesor }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="correprofesor" class="col-sm-2 col-form-label">Correo</label>
                    <div class="col-sm-2">
                        <input type="email" pattern=".+@puce.edu.ec"   class="form-control" name="correprofesor" id="correprofesor" value="{{$profesor->correprofesor}}">
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