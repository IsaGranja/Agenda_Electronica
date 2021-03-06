@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')
<br>
    <body>
        <div>
            <div class="row">
                <div class="col-sm-11">
                    <h2>Nueva Unidad</h2>
                </div>
                <div class="col-sm-1">
                    <a href="/pagUnidades" class="btn btn-primary"> Volver</a>
                </div>
            </div>   

            <br>
            
            <br>

            <form method="post" action = "/pagUnidades/crear"> 
            @csrf
                    <div class="form-horizontal">   
 
                    <div class="form-group row">
                        <label class="control-label col-sm-3">Universidad-Carrera<span style="color:red;font-weight:bold">*</span></label>
                        <div class="col-sm-6">
                            <select class="form-control input-lg dynamic" id="codcarrera" data-dependent ="codasignatura">
                                <option value="">Seleccionar Universidad - Carrera</option>
                                @foreach($test as $t)                      
                                    <option value="{{$t->codcarrera}}">{{$t->descuniversidad}}-{{$t->descsede}}-{{$t->descfacultad}}-{{$t->descescuela}}-{{$t->desccarrera}}</option>
                                @endforeach
                            </select>
                            </div>
                    </div>
                    
                    @csrf



                    <div class="form-group row">
                        <label class="control-label col-sm-3">Asignatura<span style="color:red;font-weight:bold">*</span></label>
                        <div class="col-sm-6">
                            <select class="form-control input-lg" name="codasignatura" id="codasignatura">                    
                                <option value="">Seleccionar Asignatura</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-3"> # de Unidad<span style="color:red;font-weight:bold">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="numunidad">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-3">Descripción de Unidad<span style="color:red;font-weight:bold">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="descunidad">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>   
        </div>
        <br>
    </body>

    
    <script>
        $(document).ready(function(){
            $('#codcarrera').change(function(){
                if($(this).val() != '')
                {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{ route('pagUnidades.fetch') }}",
                        method: "POST",
                        data:{select:select, value:value, _token:_token, dependent:dependent},
                        success:function(result)
                        {
                            $('#'+dependent).html(result);
                        }
                    })
                }
            });

            $('#codcarrera').change(function(){
                $('#codasignatura').val('');
            });                
            
        });
    </script>
   
@endsection
