@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')
    <br>
    <body>
        <div>
            
            <div class="row">
                <div class="col-sm-11">
                    <h2>Editar Provincia</h2>
                </div>
                <div class="col-sm-1">
                    <a href="/pagProvincias" class="btn btn-primary"> Volver</a>
                </div>
            </div>   

            <br>
  

            <form method="post" action = ""> 
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="cedestudiante" class="col-sm-2 col-form-label">Cédula</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="cedestudiante" id="cedestudiante" maxlength="10" value="{{$estudiante->cedestudiante}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nomestudiante" class="col-sm-2 col-form-label">Nombres</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="nomestudiante" id="nomestudiante" required value="{{$estudiante->nomestudiante}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="apeestudiante" class="col-sm-2 col-form-label">Apellidos</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="apeestudiante" id="apeestudiante" required value="{{$estudiante->apeestudiante }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="correestudiante" class="col-sm-2 col-form-label">Correo</label>
                    <div class="col-sm-2">
                        <input type="email" pattern=".+@puce.edu.ec"   class="form-control" name="correestudiante" id="correestudiante" value="{{$estudiante->correestudiante}}">
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