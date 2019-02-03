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
                    <label for="sedeNombre" class="col-sm-2 col-form-label">Código</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="codprovincia" value="{{$codigo->codprovincia}}" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sedeNombre" class="col-sm-2 col-form-label">Provincia</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="desprovincia" id="desprovincia" value="{{$codigo->desprovincia}}" >
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