@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')
<br>
    <body>
        <div>       
                
            <div class="row">
                <div class="col-sm-11">
                    <h2>Nueva Universidad</h2>
                </div>
                <div class="col-sm-1">
                    <a href="/pagUniversidades" class="btn btn-primary"> Volver</a>
                </div>
            </div>                
                <br>
                
            <form method="post" action = "/pagUniversidades/crear"> 
                {{ csrf_field() }}
                <div class="form-group row">

                
                    <tr>
                        <td>
                            <td> <p>Descripción<span style="color:red;font-weight:bold">*</span></p></td>
                            <td><input type="text" class="form-control" name="descuniversidad"/></td>
                        </td>
                    </tr>   

                    <tr>
                        <td>
                            <td> <p>Categoria<span style="color:red;font-weight:bold">*</span></p></td>
                            <td><input type="text" class="form-control" name="categuniversidad"/></td>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <td> <p>Direccion 1</p></td>
                            <td><input type="text" class="form-control" name="dir1universidad"/></td>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <td> <p>Direccion 2</p></td>
                            <td><input type="text" class="form-control" name="dir2universidad"/></td>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <td> <p># Direccion</p></td>
                            <td><input type="text" class="form-control" name="numdiruniversidad"/></td>
                        </td>
                    </tr>    

                        <tr>
                        <td>
                            <td> <p>Tipo<span style="color:red;font-weight:bold">*</span></p></td>
                            <td><input type="text" class="form-control" name="tipouniversidad"/></td>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <td> <p>Rector</p></td>
                            <td><input type="text" class="form-control" name="rectuniversidad"/></td>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <td> <p>Vicerrector</p></td>
                            <td><input type="text" class="form-control" name="viserecuniviersidad"/></td>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <td> <p>Secretario General</p></td>
                            <td><input type="text" class="form-control" name="secregenuniversidad"/></td>
                        </td>
                    </tr> 

                        <tr>
                        <td>
                            <td> <p>Ruc<span style="color:red;font-weight:bold">*</span></p></td>
                            <td><input type="text" class="form-control" name="rucuniversidad"/></td>
                        </td>
                    </tr> 
                    <br>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>

                </div>   
            </form>
        </div>
    </body>


    
@endsection
