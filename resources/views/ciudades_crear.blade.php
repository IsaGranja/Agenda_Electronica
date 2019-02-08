@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')
    <br>
    <body>
        <div style="    margin-left: 5%">
            
            <div class="row">
                <div class="col-sm-11">
                    <h2>Nueva Ciudad</h2>
                </div>
                <div class="col-sm-1">
                    <a href="/pagCiudades" class="btn btn-primary"> Volver</a>
                </div>
            </div>   

            <br>
  

            <form method="post" action = "/pagCiudades/crear"> 
                {{ csrf_field() }}
                <div class="form-group row" >
                <label for="sedeNombre" class="col-sm-2 col-form-label">Provincia</label>
                <div class="col-sm-2"style="width: 15%;">
                    <select class="form-control" id="provincia" name="provincia">

                        @foreach ($provincias as $provincia)
    +                       <option value="{{$provincia->codprovincia}}">{{$provincia->desprovincia}}</option>
    +                   @endforeach
                    </select>
                </div>
                </div>
                <div class="form-group row">
                    <label for="sedeNombre" class="col-sm-2 col-form-label">Código</label>
                    <div class="col-sm-2">
                        {{$codigo}}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sedeNombre" class="col-sm-2 col-form-label">Descripcion Ciudad</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="descciudad" id="descciudad">
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
