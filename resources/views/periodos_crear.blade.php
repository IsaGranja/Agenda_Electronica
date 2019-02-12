@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')

    <br>
        <body>
            <div>            
                <div class="row">
                    <div class="col-sm-11">
                        <h2>Nuevo Periodo</h2>
                    </div>
                    <div class="col-sm-1">
                        <a href="/pagPeriodos" class="btn btn-primary"> Volver</a>
                    </div>
                </div>                
                    <br>
                    
                <form method="post" action = "/pagPeriodos/crear" > 
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
                    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
                    <!-- Latest compiled and minified CSS -->
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
                    <!-- Optional theme -->
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
                    <!-- Latest compiled and minified JavaScript -->
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
                    <!-- Jquery -->
                    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
                    <!-- Datepicker Files -->
                    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}">
                    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-standalone.css')}}">
                    <script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
                    <!-- Languaje -->
                    <script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
 
                    <div class="form-group row">
                        <label for="sedeNombre" class="col-sm-2 col-form-label">Fecha de inicio<span style="color:red;font-weight:bold">*</span></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control datepicker" name="fecinicioperiodo" id="fecinicioperiodo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sedeNombre" class="col-sm-2 col-form-label">Fecha de fin<span style="color:red;font-weight:bold">*</span></label>
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
                        url:"{{ route('pagPeriodos.fetch') }}",
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