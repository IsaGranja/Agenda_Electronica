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
                    <select name="coduniversidad" class="form-control" type="text" id="coduniversidad" data-dependent="codsede" style="width:220px">
                            <option>Select Universidad</option>
                                @foreach($unis as $uni)
                                    <option value="{{$uni->coduniversidad}}">{{$uni->descuniversidad}}</option>
                                @endforeach
                    </select>
                    
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sede</label>
                    <select class="form-control" id="codsede" name="codsede"  style="width:220px">
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
    <script>
        $(document).ready(function(){
            $('#coduniversidad').change(function(){
                if($(this).val() != '')
                {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{ route('pagFacultadesxSede.fetch') }}",
                        method: "POST",
                        data:{select:select, value:value, _token:_token, dependent:dependent},
                        success:function(result)
                        {
                            $('#'+dependent).html(result);
                        }
                    })
                }
            });

            $('#coduniversidad').change(function(){
                $('#codsede').val('');
            });

        });
    </script>
@endsection
