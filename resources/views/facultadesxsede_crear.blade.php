@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')

    <body>
        <div>
            
            <div class="row">
                <div class="col-sm-11">
                    <h2>Nueva Facultad por Sede</h2>
                </div>
                <div class="col-sm-1">
                    <a href="/pagFacultadesxSede" class="btn btn-primary"> Volver</a>
                </div>
            </div>   
            <form method="post" action = "/pagFacultadesxSede/crear"> 
                {{ csrf_field() }}                

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Universidad</label>
                    <select class="form-control" id="universidad" name="universidad"  style="width:220px">
                        @foreach ($unis as $uni)
    +                       <option value="{{$uni->coduniversidad}}">{{$uni->descuniversidad}} </option>
    +                   @endforeach
                    </select>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sede</label>
                    <select class="form-control" id="sede" name="sede"  style="width:220px">
                        @foreach ($sedes as $sed)
    +                       <option value="{{$sed->codsede}}">{{$sed->descsede}} </option>
    +                   @endforeach
                    </select>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Facultad</label>
                    <select class="form-control" id="facultad" name="facultad"  style="width:220px">
                        @foreach ($facus as $facu)
    +                       <option value="{{$facu->codfacultad}}">{{$facu->descfacultad}} </option>
    +                   @endforeach
                    </select>
                </div>             

                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>

            <br>
        </div>
    </body>
@endsection
