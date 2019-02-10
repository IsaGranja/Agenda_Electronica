@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')
<br>
    <body>
        <div>
            <div class="row">
                <div class="col-sm-11">
                    <h2>Editar Tema</h2>
                </div>
                <div class="col-sm-1">
                    <a href="/pagTemas" class="btn btn-primary"> Volver</a>
                </div>
            </div>   

            <br>
            
            <br>

            <form method="post" action = ""> 
                <div class = "col-md-8">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label>Universidad-Carrera<span style="color:red;font-weight:bold">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control input-lg" id="codcarrera" data-dependent ="codasignatura">
                                <option value="{{$actual->codcarrera}}">{{$actual->descuniversidad}}-{{$actual->descsede}}-{{$actual->descfacultad}}-{{$actual->descescuela}}-{{$actual->desccarrera}}</option>
                                @foreach($test as $t)                      
                                    <option value="{{$t->codcarrera}}">{{$t->descuniversidad}}-{{$t->descsede}}-{{$t->descfacultad}}-{{$t->descescuela}}-{{$t->desccarrera}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label>Asignatura<span style="color:red;font-weight:bold">*</span></label>
                        <div class="col-sm-5">
                            <select class="form-control input-lg dynamic" name="codasignatura" id="codasignatura" data-dependent ="codunidad">              
                                <option value="{{$actual->codasignatura}}">{{$actual->descasignatura}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label>Unidad<span style="color:red;font-weight:bold">*</span></label>
                        <div class="col-sm-2">
                            <select class="form-control input-lg" name="codunidad" id="codunidad">                    
                                <option  value="{{$actual->codunidad}}">{{$actual->numunidad}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2">
                            <button type="button" id="addasignatura" class="btn btn-primary btn-save">Nuevo</button>
                        </div>
                    </div>


                    <div>
                        <table id="tabla" class=" table order-list">
                        <thead class="thead-light">
                            <tr>
                                <th>#Unidad</th>
                                <th>Descripción</th>
                                <th>Comentario</th>
                                @foreach($mas as $det)     
                                    <tr>               
                                        <td><input type="text" class="form-control" name="numtema[]" value="{{$det->numtema}}" ></td>
                                        <td><input type="text" class="form-control" name="desctema[]" value="{{$det->desctema}}"></td>
                                        <td><input type="text" class="form-control" name="comentema[]" value="{{$det->comentema}}"></td>
                                        <td><div class="form-group col-md-4"><button type="button" class="btn ibtnDel btn-danger"><span class="glyphicon glyphicon-remove-sign"></span></button></div></div></div></td></tr>
                                    </tr>  
                                @endforeach
                            </tr>
                        </thead>
                        <tbody id="cuerpo">
                            <tr></tr>
                        </tbody>
                        </table>
                    </div>

                    <div class="col-md-4">
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
                        url:"{{ route('pagTemas.byAsignatura') }}",
                        method: "POST",
                        data:{select:select, value:value, _token:_token, dependent:dependent},
                        success:function(result)
                        {
                            $('#'+dependent).html(result);
                        }
                    })
                }
            });

            $('#codasignatura').change(function(){
                if($(this).val() != '')
                {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{ route('pagTemas.byUnidad') }}",
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
            $('#codasignatura').change(function(){
                $('#codtema').val('');
            });                
            
        });
        var counter = 0;

        $("#addasignatura").on("click", function () {
            var newRow = $("<tr>");
            var cols = "";
            cols += '<td><input type="text" class="form-control" name="numtema[]"></td>';
            cols += '<td><input type="text" class="form-control" name="desctema[]"></td>';
            cols += '<td><input type="text" class="form-control" name="comentema[]"></td>';
            cols += '<td><div class="form-group col-md-4"><button type="button" class="btn ibtnDel btn-danger"><span class="glyphicon glyphicon-remove-sign"></span></button></div></div></div></td></tr>';
            newRow.append(cols);
            $("table.order-list").append(newRow);
            counter++;
        });

        $("table.order-list").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();       
            counter -= 1
        });

    </script>
@endsection
