@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')
    <br>
    <body>
        <div>
            
            <div class="row">
                <div class="col-sm-11">
                    <h2>Escuela Crear</h2>
                </div>
                <div class="col-sm-1">
                    <a href="/pagEscuelas" class="btn btn-primary"> Volver</a>
                </div>
            </div>   

            <br>
  

            <form method="post" action = "/pagEscuelas/crear"> 
                {{ csrf_field() }}
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Universidad-Sede-Facultad</label>
                    <div class="col-sm-2">
                        <select class="form-control" id="codfacultad" name="codfacultad"  style="width:470px">
                            @foreach ($facultades as $facu)
        +                       <option value="{{$facu->codfacultad}}">{{$facu->descuniversidad}}-{{$facu->descsede}}-{{$facu->descfacultad}} </option>
        +                   @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Escuela</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="descescuela" maxlength="10">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Director</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="directorescuela"  maxlength="10">
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
