@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')
    <br>
    <body>
        <div>
            
            <div class="row">
                <div class="col-sm-11">
                    <h2>Editar Carrera</h2>
                </div>
                <div class="col-sm-1">
                    <a href="/pagCarreras" class="btn btn-primary"> Volver</a>
                </div>
            </div>   

            <br>
  

            <form method="post" action = "pagCarreras/editar/{id}"> 
                {{ csrf_field() }}
                
                <div class="form-group row">
                    <div class="col-sm-2">
                        <input type="hidden" class="form-control" name="codcarrera" value="{{$edi->codcarrera}}" contentEditable="true">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" >Universidad-Escuela<span style="color:red;font-weight:bold">*</span></label>
                    <div class="col-sm-2">
                        <select class="form-control" id="codescuela" name="codescuela"  style="width:470px">
                            @foreach ($carreras as $carrera)
        +                       <option value="{{$carrera->codescuela}}">{{$carrera->descuniversidad}}-{{$carrera->descsede}}-{{$carrera->descfacultad}}--{{$carrera->descescuela}} </option>
        +                   @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Carrera<span style="color:red;font-weight:bold">*</span></label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="desccarrera" value="{{$edi->desccarrera}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"># Niveles<span style="color:red;font-weight:bold">*</span></label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="nivcarrera" value="{{$edi->nivcarrera}}">
                    </div>
                </div>    

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Director</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="direccarrera" value="{{$edi->direccarrera}}">
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
