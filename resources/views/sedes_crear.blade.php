@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')
    <br>
        <body>
            <div>       
                    
                <div class="row">
                    <div class="col-sm-11">
                        <h2>Nueva Sede</h2>
                    </div>
                    <div class="col-sm-1">
                        <a href="/pagSedes" class="btn btn-primary"> Volver</a>
                    </div>
                </div>                
                    <br>
                    
                <form method="post" action = "/pagSedes/crear"> 
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="sedeNombre" class="col-sm-2 col-form-label">Universidad<span style="color:red;font-weight:bold">*</span></label>
                        <div class="col-sm-5">
                            <select name="coduniversidad" class="form-control" type="text">
                                @foreach($universidad as $uni)
                                    <option value="{{$uni->coduniversidad}}">{{$uni->descuniversidad}}</option>


                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sedeNombre" class="col-sm-2 col-form-label">Ciudad<span style="color:red;font-weight:bold">*</span></label>
                        <div class="col-sm-3">
                            <select name="codciudad" class="form-control" type="text">
                            @foreach($ciudad as $ciu)
                                    <option value="{{$ciu->codciudad}}">{{$ciu->descciudad}}</option>


                                @endforeach
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sedeNombre" class="col-sm-2 col-form-label">Descripción<span style="color:red;font-weight:bold">*</span></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="descsede" id="descsede">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sedeNombre" class="col-sm-2 col-form-label">Prerector</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="prerectsede" id="prerectsede">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sedeNombre" class="col-sm-2 col-form-label">Secretario General</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="secregensede" id="secregensede">
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