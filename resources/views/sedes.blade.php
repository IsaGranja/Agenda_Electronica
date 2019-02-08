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
                    <a href="/pagUniversidades" class="btn btn-primary"> Volver</a>
                </div>
            </div>                
                <br>
                
            <form method="post" action = "/pagProvincias/crear"> 
                <div class="form-group row">

                
                    <tr>
                        <td>
                            <td> <p>Universidad<span style="color:red;font-weight:bold">*</span></p></td>
                            <td><input type="text" class="form-control" id="descuniversidad"/></td>
                        </td>
                    </tr>   

                    <tr>
                        <td>
                            <td> <p>Sede<span style="color:red;font-weight:bold">*</span></p></td>
                            <td><input type="text" class="form-control" id="categuniversidad"/></td>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <td> <p>Direccion 1</p></td>
                            <td><input type="text" class="form-control" id="dir1universidad"/></td>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <td> <p>Direccion 2</p></td>
                            <td><input type="text" class="form-control" id="dir2universidad"/></td>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <td> <p># Direccion</p></td>
                            <td><input type="text" class="form-control" id="numdiruniversidad"/></td>
                        </td>
                    </tr>    

                        <tr>
                        <td>
                            <td> <p>Tipo<span style="color:red;font-weight:bold">*</span></p></td>
                            <td><select name="select" type="text" class="form-control" id="tipouniversidad">
                                
                                </select></td>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <td> <p>Rector</p></td>
                            <td><input type="text" class="form-control" id="rectuniversidad"/></td>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <td> <p>Vicerrector</p></td>
                            <td><input type="text" class="form-control" id="viserecuniviersidad"/></td>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <td> <p>Secretario General</p></td>
                            <td><input type="text" class="form-control" id="secregenuniversidad"/></td>
                        </td>
                    </tr> 

                        <tr>
                        <td>
                            <td> <p>Ruc<span style="color:red;font-weight:bold">*</span></p></td>
                            <td><input type="text" class="form-control" id="rucuniversidad"/></td>
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
