<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="{{ URL::asset('/') }}" target="_top">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen"
        href="{{ url('css/Proyecto_AgendaElectronica-style.css') }}" />
    <script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('js/jquery-3.3.1.slim.min.js') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('js/popper.min.js') }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css"></script>
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: rgb(76, 191, 220);">
        <a class="navbar-brand" href='http://www.puce.edu.ec' style="background-color: rgb(76, 191, 220);"><img
                class="logo" src="{{ url('img/puceLogo.jpg') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="background-color: rgb(76, 191, 220);">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Opciones
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('/pagProvincias') }}">Provincias</a>
                        <a class="dropdown-item" href="{{ url('/pagCiudades') }}">Ciudades</a>
                        <a class="dropdown-item" href="{{ url('/pagUniversidades') }}">Universidades</a>
                        <a class="dropdown-item" href="{{ url('/pagSedes') }}">Sedes</a>
                        <a class="dropdown-item" href="{{ url('/pagPeriodos') }}">Períodos</a>
                        <a class="dropdown-item" href="{{ url('/pagFacultades') }}">Facultades</a>
                        <a class="dropdown-item" href="{{ url('/pagFacxSed') }}">Facultades por sedes</a>
                        <a class="dropdown-item" href="{{ url('/pagEscuelas') }}">Escuelas</a>
                        <a class="dropdown-item" href="{{ url('/pagCarreras') }}">Carreras</a>
                        <a class="dropdown-item" href="{{ url('/pagEstudiantes') }}">Estudiantes</a>
                        <a class="dropdown-item" href="{{ url('/pagEstudiantes-excel') }}">Estudiantes (Excel)</a>
                        <a class="dropdown-item" href="{{ url('/pagProfesores') }}">Profesores</a>
                        <a class="dropdown-item" href="{{ url('/pagAsignaturas') }}">Asignaturas</a>
                        <a class="dropdown-item" href="{{ url('/pagAsigxEstu') }}">Asignaturas por estudiante</a>
                        <a class="dropdown-item" href="{{ url('/pagAsigxProf') }}">Asignaturas por profesor</a>
                        <a class="dropdown-item" href="{{ url('/pagUnidades') }}">Unidades</a>
                        <a class="dropdown-item" href="{{ url('/pagTemas') }}">Temas</a>
                        <a class="dropdown-item" href="{{ url('/pagTalleres') }}">Talleres</a>
                        <a class="dropdown-item" href="{{ url('/pagEvaluaciones') }}">Evaluaciones</a>
                        <a class="dropdown-item" href="{{ url('/pagGlosario') }}">Glosario</a>
                        <a class="dropdown-item" href="{{ url('/pagContenidos') }}">Contenidos</a>

                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Refrescar <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/pagLogin') }}">Cerrar Sesión <span
                            class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    {{-- Body --}}
    <div class="row">
        <div class="col-12">@yield('content')</div>
    </div>
    {{-- Footer --}}
    <div class="card">
        <div class="card-body text-center">
            <p class="micro legible center mb-0">CENTRO DE EDUCACIÓN VIRTUAL Y TECNOLOGÍA EDUCATIVA - CEVTE <br>
                Para soporte comunicarse: <br> Teléfono: (+593) 299 1700 ext. 1509 / 1845 / 1127
                <br> Correo electrónico: cevte@puce.edu.ec</p>
        </div>
        <script src="{{ url('js/bootstrap.min.js') }}"></script>
</body>

</html>