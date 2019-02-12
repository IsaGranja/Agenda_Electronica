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
                        <label for="sedeNombre" class="col-sm-2 col-form-label">Descripción<span style="color:red;font-weight:bold">*</span></label>
                        <div class="col-sm-5">
                        <input type="text" class="form-control" name="descuniversidad" id="descuniversidad" minlength="3"required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sedeNombre" class="col-sm-2 col-form-label">Categoria<span style="color:red;font-weight:bold">*</span></label>
                        <div class="col-sm-1">
                            <select name="categuniversidad" class="form-control" type="text">
                                <option value=""selected></option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sedeNombre" class="col-sm-2 col-form-label">Direccion 1</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="dir1universidad" id="dir1universidad">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sedeNombre" class="col-sm-2 col-form-label">Direccion 2</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="dir2universidad" id="dir2universidad">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sedeNombre" class="col-sm-2 col-form-label"># Direccion</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="numdiruniversidad" id="numdiruniversidad">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sedeNombre" class="col-sm-2 col-form-label">Tipo<span style="color:red;font-weight:bold">*</span></label>
                        <div class="col-sm-1">
                            <select name="tipouniversidad" class="form-control" type="text">
                                <option value=""selected></option>
                                <option value="PR">PR</option>
                                <option value="PU">PU</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sedeNombre" class="col-sm-2 col-form-label">Rector</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="rectuniversidad" id="rectuniversidad">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sedeNombre" class="col-sm-2 col-form-label">Vicerrector</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="viserecuniversidad" id="viserecuniversidad">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sedeNombre" class="col-sm-2 col-form-label">Secretario General</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="secregenuniversidad" id="secregenuniversidad">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sedeNombre" class="col-sm-2 col-form-label">Ruc</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" name="rucuniversidad" id="rucuniversidad" maxlength="13">
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
