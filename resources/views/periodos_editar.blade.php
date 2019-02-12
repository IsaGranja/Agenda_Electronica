@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')
    <br>
    <body>
        <div>
            
            <div class="row">
                <div class="col-sm-11">
                    <h2>Editar Periodo</h2>
                </div>
                <div class="col-sm-1">
                    <a href="/pagPeriodos" class="btn btn-primary"> Volver</a>
                </div>
            </div>   

            <br>
  

            <form method="post" action = "/pagPeriodos/crear"> 
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="sedeNombre" class="col-sm-2 col-form-label">Universidad<span style="color:red;font-weight:bold">*</span></label>
                        <div class="col-sm-5">
                            <select name="coduniversidad" class="form-control" type="text" id="coduniversidad" data-dependent="codsede">
                            <option>Selecione una universidad</option>
                                @foreach($universidad as $uni)
                                    <option value="{{$uni->coduniversidad}}">{{$uni->descuniversidad}}</option>


                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sedeNombre" class="col-sm-2 col-form-label">Sede<span style="color:red;font-weight:bold">*</span></label>
                        <div class="col-sm-3">
                            <select name="codsede" class="form-control" type="text" id="codsede">
                            @foreach($sede as $sed)
                                <option value="{{$sed->codsede}}">{{$sed->descsede}}</option>
                            @endforeach
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sedeNombre" class="col-sm-2 col-form-label">Periodo<span style="color:red;font-weight:bold">*</span></label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" name="codperiodo" id="codperiodo">
                        </div>
                        <div> - </div>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" name="codperiodoB" id="codperiodoB">
                        </div>
                    </div>
     
                    <div class="form-group row">
                        <label for="sedeNombre" class="col-sm-2 col-form-label">Fecha de inicio<span style="color:red;font-weight:bold">*</span></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control datepicker" name="fecinicioperiodo" id="fecinicioperiodo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sedeNombre" class="col-sm-2 col-form-label">Fecha de finalización<span style="color:red;font-weight:bold">*</span></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control datepicker" name="fecfinalperiodo" id="fecfinalperiodo">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="sedeNombre" class="col-sm-2 col-form-label">Estado<span style="color:red;font-weight:bold">*</span></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="estperiodo" id="estperiodo" value="Activo" disabled>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>

            <br>
        </div>
    </body>
    <script>
    $('.datepicker').datepicker({
            format: "dd/mm/yyyy",
            language: "es",
            autoclose: true
        });
</script>
@endsection