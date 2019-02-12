@extends('base') {{-- Hereda el header y el footer de la view base --}}

@section('content')
<body>
    <div>
        <div class="row">
            <div class="col-sm-3">
                <div class= "input-group">
                    <input type="text" class="form-control" placeholder="Código del informe"/>
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-info">
                            Buscar
                        </button>
                    </span>
                </div>
            </div>
        <div class="col-md-2"></div>  
            <div class="col-md-6">
                <a href="pagEvaluaciones"><button type="submit" class="btn btn-primary">Nuevo</button></a>
                <a href="pagEvaluaciones/guardar"><button type="submit" class="btn btn-primary">Guardar</button></a>
                <a href="pagEvaluaciones/borrar"><button type="submit" class="btn btn-primary">Borrar</button></a>
            </div>
        <div class = "col-md-1">
            <a href=""><button type="submit" class="btn btn-primary">Salir</button></a>
        </div>
    </div>
    <div class="container">

        <form>
        <div class="form-group">
                <label for="universidad">Universidad - Carrera:</label>
                <select id="universidad">
                    @foreach($universidad as $universidad)
                    <option value="{{ $universidad->coduniversidad }}">{{ $universidad->coduniversidad }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="asignatura">Asignatura:</label>
                <select id="asignatura">
                    @foreach($asignatura as $asignatura)
                    <option value="{{ $asignatura->codasignatura }}">{{ $asignatura->codasignatura }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tema">Tema:</label>
                <select id="tema">
                    @foreach($tema as $tema)
                    <option value="{{ $tema->codtema }}">{{ $tema->codtema }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="pregunta">Pregunta:</label>
                <textarea class="form-control" rows="5" id="pregunta"></textarea>
            </div>
            <div class="form-group">
                <label for="opcion1">Opcion 1:</label>
                <input type="text" class="form-control" id="opcion1">
            </div>
            <div class="form-group">
                <label for="opcion2">Opcion 2:</label>
                <input type="text" class="form-control" id="opcion2">
            </div>
            <div class="form-group">
                <label for="opcion3">Opcion 3:</label>
                <input type="text" class="form-control" id="opcion3">
            </div>
            <div class="form-group">
                <label for="opcion4">Opcion 4:</label>
                <input type="text" class="form-control" id="opcion4">
            </div>
            <div class="form-group">
                <label for="respuesta">Respuesta:</label>
                <input type="text" class="form-control" id="respuesta">
            </div>
            <div class="form-group">
                <label for="retroalimentacion">Retroalimentacion:</label>
                <textarea class="form-control" rows="5" id="retroalimentacion"></textarea>
            </div>
        </form>
        
    </div>
</div>
</body>
@endsection
