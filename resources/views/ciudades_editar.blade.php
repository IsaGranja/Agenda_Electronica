@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')
    <br>
    <body>
        <div>
            
            <div class="row">
                <div class="col-sm-11">
                    <h2>Editar Ciudad</h2>
                </div>
                <div class="col-sm-1">
                    <a href="/pagCiudades" class="btn btn-primary"> Volver</a>
                </div>
            </div>   

            <br>
            <form method="post" action = ""> 
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="codciudad" class="col-sm-2 col-form-label">Código</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="codciudad" value="{{$codigo->codciudad}}" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="descciudad" class="col-sm-2 col-form-label">Ciudad</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="descciudad" id="descciudad" value="{{$codigo->descciudad}}" >
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