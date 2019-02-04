@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')
<br>
    <body>
        <div>
            <form action="" method="get">
            
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

                <div class="table-container">

                    <table id="mytable" class="table table-bordred">
                        <tr>
                            <td>
                                <td> <p>Universidad-Carrera<span style="color:red;font-weight:bold">*</span></p></td>
                                <td><input type="text" class="form-control"/></td>
                            </td>
                        </tr>   

                        <tr>
                            <td>
                                <td> <p>Asignatura<span style="color:red;font-weight:bold">*</span></p></td>
                                <td><input type="text" class="form-control"/></td>
                            </td>
                        </tr>    

                         <tr>
                            <td>
                                <td> <p># de unidad<span style="color:red;font-weight:bold">*</span></p></td>
                                <td><input type="text" class="form-control"/></td>
                            </td>
                        </tr> 

                         <tr>
                            <td>
                                <td> <p>Unidad<span style="color:red;font-weight:bold">*</span></p></td>
                                <td><input type="text" class="form-control"/></td>
                            </td>
                        </tr> 

                    </table>   

                </div>
            </form>   
        </div>
    </body>

    
@endsection
