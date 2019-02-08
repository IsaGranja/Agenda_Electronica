@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')
<br>
    <body>
        <div>
            <div class="row">

                <div class="col-sm-3">
                    <div class= "input-group">
                        <input type="text" class="form-control" placeholder="Código del informe"/>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </div>

                <div class="col-md-2"></div>  

                <div class="col-md-6">
                    <input type="button"  class="btn btn-primary" id="addrow" value="Nuevo"/>
                    <input type="button"  class="btn btn-primary" value="Guardar"/>
                    <input type="button"  class="btn btn-primary" value="Borrar"/>
                </div>

                <div class = "col-md-1">
                    <button type="submit" class="btn btn-primary">Salir</button>
                </div>

            </div>
            
            <br>

            <div class = "col-md-8">
            
                <div class="form-group row">
                    <label>Universidad-Carrera<span style="color:red;font-weight:bold">*</span></label>
                    <div class="col-sm-10">
                        <select class="form-control" id="carrera" >
                            @foreach($test as $t)                      
                                <option value="{{$t->codcarrera}}">{{$t->descuniversidad}}-{{$t->descsede}}-{{$t->descfacultad}}-{{$t->descescuela}}-{{$t->desccarrera}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label>Asignatura<span style="color:red;font-weight:bold">*</span></label>
                    <div class="col-sm-10">
                        <select class="form-control" id="codasignatura" >                    
                                <option ></option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label># de Unidad<span style="color:red;font-weight:bold">*</span></label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="">
                    </div>
                </div>

                <div class="form-group row">
                    <label>Unidad<span style="color:red;font-weight:bold">*</span></label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="">
                    </div>
                </div>
            </div>

        </div>

        <script>
            $(document).ready(function(){
                var carrera = $('')
                

            });
        </script>

    </body>
   
@endsection
