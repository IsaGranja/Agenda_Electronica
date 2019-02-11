@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')
    <br>
    <body>
        <div>
            
            <div class="row">
                <div class="col-sm-11">
                    <h2>Editar Facultad</h2>
                </div>
                <div class="col-sm-1">
                    <a href="/pagFacultades" class="btn btn-primary"> Volver</a>
                </div>
            </div>   

            <br>
  

            <form method="post" action = "pagFacultades/editar/{id}"> 
                {{ csrf_field() }}
                
                <div class="form-group row">
                    <div class="col-sm-2">
                        <input type="hidden" class="form-control" name="codfacultad" value="{{$edi->codfacultad}}" >
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Descripción</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="descfacultad" value="{{$edi->descfacultad}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Decano</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="decafacultad" value="{{$edi->decafacultad}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Subdecano</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="subdecfacultad" value="{{$edi->subdecfacultad}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Secretario Abogado</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="secreabogfacultad" value="{{$edi->secreabogfacultad}}">
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
