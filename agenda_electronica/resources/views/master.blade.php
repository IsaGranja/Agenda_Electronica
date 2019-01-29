<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Principal</title>
    <base href="{{ URL::asset('/') }}" target="_top">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('css/Proyecto_AgendaElectronica-style.css') }}" />
    <script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('js/jquery-3.3.1.slim.min.js') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('js/popper.min.js') }}" />
</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: rgb(76, 191, 220);">
        <a class="navbar-brand" href='http://www.puce.edu.ec' style="background-color: rgb(76, 191, 220);"><img class="logo" src="{{ url('img/puceLogo.jpg') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="background-color: rgb(76, 191, 220);">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Opciones Multimedia
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('/pagAudio') }}">Audio</a>
                    <a class="dropdown-item" href="{{ url('/pagVideo') }}">Video</a>
                    <a class="dropdown-item" href="{{ url('/pagImagen') }}">Imagen</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Refrescar <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/pagLogin') }}">Cerrar Sesion <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    {{-- Body --}}
    <div class="row">
        <div class="col-md-3 col-lg-2 d-none d-md-block fondoizq">@yield('content-izq')</div>
        <div class="col-sm-6 col-md-5 col-lg-7 fondocentro">
            <center>
            <table border="0">
                <tr class="containerPri1">
                    <td colspan=5">
                    <center>@yield('content')
                    </td>
                </tr>
                <tr class="containerPri2">
                    <center>
                    <td><center><img class="imagen2" src="{{ url('img/photo.ico') }}"></td>
                    <td><center><img class="imagen2" src="{{ url('img/Music.ico') }}"></td>
                    <td><center><img class="imagen2" src="{{ url('img/Video.ico') }}"></td>
                    <td><center><img class="imagen2" src="{{ url('img/Question_mark.ico') }}"></td>
                    <td><center><img class="imagen2" src="{{ url('img/info.ico') }}"></td>
                </tr>
            </table>
        </div>
        <div class="form-group sidenav col-sm-6 col-md-4 col-lg-3 fondoder"><center>@yield('content-der')</div>
    </div>       
    {{-- Footer --}}
    <div class="card">
        <div class="card-body text-center">
            This is my footer
        </div>
    </div>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
</body>
</html>