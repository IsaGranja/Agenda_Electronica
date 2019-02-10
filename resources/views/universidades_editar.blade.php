@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')
    <br>
    <body>
        <div>
            
            <div class="row">
                <div class="col-sm-11">
                    <h2>Editar Universidad</h2>
                </div>
                <div class="col-sm-1">
                    <a href="/pagUniversidades" class="btn btn-primary"> Volver</a>
                </div>
            </div>   

            <br>
  

            <form method="post" action = ""> 
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="sedeNombre" class="col-sm-2 col-form-label">Descripción</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="descuniversidad" value="{{$codigo->descuniversidad}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sedeNombre" class="col-sm-2 col-form-label">Categoria</label>
                    <div class="col-sm-1">
                        <select type="text" class="form-control" name="categuniversidad" id="categuniversidad">
                            <option value="A"<?php if ($codigo->categuniversidad == 'A') echo ' selected="selected"'; ?>>A</option>
                            <option value="B"<?php if ($codigo->categuniversidad == 'B') echo ' selected="selected"'; ?>>B</option>
                            <option value="C"<?php if ($codigo->categuniversidad == 'C') echo ' selected="selected"'; ?>>C</option>
                            <option value="D"<?php if ($codigo->categuniversidad == 'D') echo ' selected="selected"'; ?>>D</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sedeNombre" class="col-sm-2 col-form-label">Direccion 1</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="dir1universidad" id="dir1universidad" value="{{$codigo->dir1universidad}}" >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sedeNombre" class="col-sm-2 col-form-label">Direccion 2</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="dir2universidad" id="dir2universidad" value="{{$codigo->dir2universidad}}" >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sedeNombre" class="col-sm-2 col-form-label"># Direccion</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="numdiruniversidad" id="numdiruniversidad" value="{{$codigo->numdiruniversidad}}" >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sedeNombre" class="col-sm-2 col-form-label">Tipo</label>
                    <div class="col-sm-1">
                        <select type="text" class="form-control" name="tipouniversidad" id="tipouniversidad"> 
                            <option value="PR"<?php if ($codigo->tipouniversidad == 'PR') echo ' selected="selected"'; ?>>PR</option>
                            <option value="PU"<?php if ($codigo->tipouniversidad == 'PU') echo ' selected="selected"'; ?>>PU</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sedeNombre" class="col-sm-2 col-form-label">Rector</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="rectuniversidad" id="rectuniversidad" value="{{$codigo->rectuniversidad}}" >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sedeNombre" class="col-sm-2 col-form-label">Vicerrector</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="viserecuniversidad" id="viserecuniversidad" value="{{$codigo->viserecuniversidad}}" >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sedeNombre" class="col-sm-2 col-form-label">Secretario General</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="secregenuniversidad" id="secregenuniversidad" value="{{$codigo->secregenuniversidad}}" >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sedeNombre" class="col-sm-2 col-form-label">Ruc</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="rucuniversidad" id="rucuniversidad" value="{{$codigo->rucuniversidad}}" >
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