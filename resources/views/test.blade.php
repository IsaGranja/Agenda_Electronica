<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Principal</title>
    <base href="{{ URL::asset('/') }}" target="_top">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('css/glyphicon.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('css/Proyecto_AgendaElectronica-style.css') }}" />
    <script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('js/Proyecto.js') }}"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('js/jquery-3.3.1.slim.min.js') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('js/popper.min.js') }}" />
    
</head>
<body class="col-12 colorPUCE" onload="InitThis();">
  {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg col-12 navbar-light colorPUCE">
        <a class="navbar-brand" href='http://www.puce.edu.ec'><img class="logo" src="{{ url('img/puceLogo.jpg') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Opciones 
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('/pagProvincias') }}">Provincias</a>
                        <a class="dropdown-item" href="{{ url('/pagCiudades') }}">Ciudades</a>
                        <a class="dropdown-item" href="{{ url('/pagUniversidades') }}">Universidades</a>
                        <a class="dropdown-item" href="{{ url('/pagSedes') }}">Sedes</a>
                        <a class="dropdown-item" href="{{ url('/pagPeriodos') }}">Períodos</a>
                        <a class="dropdown-item" href="{{ url('/pagFacultades') }}">Facultades</a>
                        <a class="dropdown-item" href="{{ url('/pagFacultadesxSede') }}">Facultades por sedes</a>
                        <a class="dropdown-item" href="{{ url('/pagEscuelas') }}">Escuelas</a>
                        <a class="dropdown-item" href="{{ url('/pagCarreras') }}">Carreras</a>
                        <a class="dropdown-item" href="{{ url('/pagEstudiantes') }}">Estudiantes</a>
                        <a class="dropdown-item" href="{{ url('/pagEstudiantes-excel/create') }}">Estudiantes (Excel)</a>
                        <a class="dropdown-item" href="{{ url('/pagProfesores') }}">Profesores</a>
                        <a class="dropdown-item" href="{{ url('/pagAsignaturas') }}">Asignaturas</a>
                        <a class="dropdown-item" href="{{ url('/pagAsigxEstu') }}">Asignaturas por estudiante</a>
                        <a class="dropdown-item" href="{{ url('/pagAsigxProf') }}">Asignaturas por profesor</a>
                        <a class="dropdown-item" href="{{ url('/pagUnidades') }}">Unidades</a>
                        <a class="dropdown-item" href="{{ url('/pagTemas') }}">Temas</a>
                        <a class="dropdown-item" href="{{ url('/talleres') }}">Talleres</a>
                        <a class="dropdown-item" href="{{ url('/pagEvaluaciones') }}">Evaluaciones</a>
                        <a class="dropdown-item" href="{{ url('/pagGlosarios') }}">Glosario</a>
                        <a class="dropdown-item" href="{{ url('/contenidos') }}">Contenidos</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link"  href="{{ url('/') }}">Descargar <span class="sr-only">(current)</span></a>
                </li>
                </ul>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active alert alert-danger success-block">
                    <strong>Welcome {{ Auth::user()->email }} </strong>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/main/logout') }}">Cerrar Sesión <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    {{-- Body --}}
    <section class="row">
        <div class="col-lg-2 fondoizq">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <h6 class="dropdown-header colorHeaderToggle">Asignatura</h6>
            <a class= "dropdown-item colorToggle" href="#">Tema 1</a>  
            <a class= "dropdown-item colorToggle" href="#">Tema 2</a>
        </div>
        <div class="col-md-12 col-lg-7 fondocentro">
            <center>
            <table border="0 cuerpo">
                <tr class="containerPri1">
                    <td class="cuerpo" colspan="12">
                    <center>
                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-interval="false">
                        <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="imagen1" src="https://mdbootstrap.com/img/Photos/Slides/img%20(15).jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="imagen1" src="https://mdbootstrap.com/img/Photos/Slides/img%20(16).jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="imagen1" src="https://mdbootstrap.com/img/Photos/Slides/img%20(17).jpg" alt="Third slide">
                        </div>
                        </div>
                        <a class="carousel-control-prev" title="Anterior" href="#carouselExampleFade" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" title="Siguiente" href="#carouselExampleFade" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                        </a>
                    </div>                                  
                    </td>
                </tr>
                <tr class="containerPri2 colorFondoIconos">
                    <center>
                    <td>
                        <center>
                            <img class="image-responsive imagen2 static" title="Imagen" id="imagen" src="{{ url('img/iconos/image/static.png') }}">
                            <img class="image-responsive imagen2" title="Imagen" id="imagen" src="{{ url('img/iconos/image/animat-image-color.gif') }}">
                            <div id="mimodal" class="modal fade" role="dialog">
                                <div id="mimodal" class="modal-dialog imagen">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1>imagen</h1>    
                                            <button class="close" data-dismiss="modal">&times;</button>                                            
                                        </div>
                                        <div class="modal-body">
                                         <img src="" class="recibir-imagen" width="100%" height="100%">                                            
                                        </div>
                                    </div>                            
                                </div>
                            </div>                    
                    </td>
                    <td>
                        <center>
                            <img class="image-responsive imagen2 static" title="Audio" id="audio" src="{{ url('img/iconos/customize/static.png') }}">
                            <img class="image-responsive imagen2" title="Audio" id="audio" src="{{ url('img/iconos/customize/animat-customize-color.gif') }}">
                            <div id="mimodal2" class="modal fade" role="dialog">
                                <div id="mimodal2" class="modal-dialog imagen">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1>audio</h1>    
                                            <button class="close" data-dismiss="modal">&times;</button>                                                
                                        </div>
                                        <div class="modal-body">
                                            <audio controls>
                                                <source src="" class="recibir-audio" type="audio/mpeg">
                                                <source src="" class="recibir-audio" type="audio/ogg">
                                                <!--https://developer.mozilla.org/en-US/docs/Web/Apps/Fundamentals/Audio_and_video_delivery/Cross-browser_audio_basics-->
                                        </div>
                                    </div>
                                </div>
                            </div>                    
                    </td>
                    <td>
                        <center>
                        <img class="image-responsive imagen2 static" title="Video" id="video" src="{{ url('img/iconos/video/static.png') }}">
                            <img class="image-responsive imagen2" title="Video" id="video" src="{{ url('img/iconos/video/animat-video-color.gif') }}">
                            <div id="mimodal3" class="modal fade" role="dialog">
                                <div id="mimodal3" class="modal-dialog imagen">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1>video</h1>    
                                            <button class="close" data-dismiss="modal">&times;</button>                                                
                                        </div>
                                        <div class="modal-body">
                                            <video controls width="100%" height="100%>
                                                <source src="" class="recibir-video" type="video/mp4" />
                                                <source src="" class="recibir-video" type="video/ogg" />
                                                <source src="" class="recibir-video" type="video/webm" />
                                            </video>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>  
                    </td>
                    <td>
                        <center>
                        <img class="image-responsive imagen2 static" title="Evaluaciones" id="evaluaciones" src="{{ url('img/iconos/evaluacion/evaluacion.png') }}">
                            <img class="image-responsive imagen2" title="Evaluaciones" id="evaluaciones" src="{{ url('img/iconos/evaluacion/evaluacion.gif') }}">
                            <div id="mimodal4" class="modal fade" role="dialog">
                                <div id="mimodal4" class="modal-dialog imagen">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1>evaluaciones</h1>    
                                            <button class="close" data-dismiss="modal">&times;</button>                                                
                                        </div>
                                        <div class="modal-body">
                                            <img src="" class="recibir-evaluaciones" width="100%" height="100%">
                                        </div>
                                    </div>
                                </div>
                            </div>   
                    </td>
                    <td>
                        <center>
                        <img class="image-responsive imagen2 static" title="Informacion Adicional" id="informacion_adicional" src="{{ url('img/iconos/lightbulb/static.png') }}">
                            <img class="image-responsive imagen2" title="Informacion Adicional" id="informacion_adicional" src="{{ url('img/iconos/lightbulb/animat-lightbulb-color.gif') }}">
                            <div id="mimodal5" class="modal fade" role="dialog">
                                <div id="mimodal5" class="modal-dialog imagen">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1>informacion adicional</h1>    
                                            <button class="close" data-dismiss="modal">&times;</button>                                                
                                        </div>
                                        <div class="modal-body">
                                            <img src="" class="recibir-info" width="100%" height="100%">
                                        </div>
                                    </div>
                                </div>
                            </div> 
                    </td>
                    <td>
                        <center>
                        <img class="image-responsive imagen2 static" title="Glosario" id="glosario" src="{{ url('img/iconos/search/static.png') }}">
                            <img class="image-responsive imagen2" title="Glosario" id="glosario" src="{{ url('img/iconos/search/animat-search-color.gif') }}">
                            <div id="mimodal6" class="modal fade" role="dialog">
                                <div id="mimodal6" class="modal-dialog imagen">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1>glosario</h1>    
                                            <button class="close" data-dismiss="modal">&times;</button>                                                
                                        </div>
                                        <div class="modal-body">
                                            <img src="" class="recibir-glosario" width="100%" height="100%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </td>
                    <td>
                        <center>
                        <img class="image-responsive imagen2 static" title="Talleres" id="talleres" src="{{ url('img/iconos/pencil/static.png') }}">
                            <img class="image-responsive imagen2" title="Talleres" id="talleres" src="{{ url('img/iconos/pencil/animat-pencil-color.gif') }}">
                            <div id="mimodal7" class="modal fade" role="dialog">
                                <div id="mimodal7" class="modal-dialog imagen">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1>Talleres</h1>    
                                            <button class="close" data-dismiss="modal">&times;</button>                                                
                                        </div>
                                        <div class="modal-body">
                                            <img src="" class="recibir-talleres" width="100%" height="100%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </td>
                    <script type="text/javascript">
                    $(document).ready(function()
                    {
                        $('.imagen2').click(function(){
                                var imagenT=$(this).attr('src');
                                var imagenID=$(this).attr('id'); 
                                $(this).removeData();                            
                            if(imagenT==""){
                                $('.recibir-imagen').attr('src',"{{ url('img/Image-not-found.gif') }}");
                                $('#mimodal').modal();
                            }else{
                                if(imagenID=="imagen")
                                {
                                    $('.recibir-imagen').attr('src',"{{ url('img/beagle.jpg') }}"); //aqui se coloca la imagen que desea cargar
                                    $('#mimodal').modal();     
                                }else if(imagenID=="audio"){
                                    $('.recibir-audio').attr('src',"{{ url('img/avicii_levels.mp3') }}"); //aqui se coloca el audio que desea cargar
                                    //$('.recibir-audio').attr('type',"audio/mpeg");
                                    //$('.recibir-audio').attr('type',"audio/ogg");
                                    $('#mimodal2').modal();  
                                }else if(imagenID=="video"){
                                    $('.recibir-video').attr('src',"{{ url('img/mundos.mp4') }}"); //aqui se coloca el video que desea cargar
                                    $('#mimodal3').modal();  
                                }else if(imagenID=="evaluaciones"){
                                    $('.recibir-evaluaciones').attr('src',"{{ url('img/Question_mark.ico') }}"); //aqui se coloca la evaluacion que desea cargar
                                    $('#mimodal4').modal();  
                                }else if(imagenID=="informacion_adicional"){
                                    $('.recibir-info').attr('src',"{{ url('img/info.ico') }}"); //aqui se coloca la infoAdicional que desea cargar
                                    $('#mimodal5').modal();
                                }else if(imagenID=="glosario"){
                                    $('.recibir-glosario').attr('src',"{{ url('img/glosario.ico') }}"); //aqui se coloca la infoAdicional que desea cargar
                                    $('#mimodal6').modal();  
                                }else if(imagenID=="talleres"){
                                    $('.recibir-talleres').attr('src',"{{ url('img/puceLogo.jpg') }}"); //aqui se coloca la infoAdicional que desea cargar
                                    $('#mimodal7').modal();  
                                }
                            }                                
                        });
                    });
                    </script>
                </tr>
            </table>
        </div>
        <div class="col-lg-3 fondoder"><center>
        <table border='0' style="width: 100%;">
    <tr class="containerDer1">
      <td>
        <div class="colorHeaderToggle" style="font-size:14px">
            <label for="comment">Anotaciones: </label><br>
            <label class="labelC" style="font-size:9px">Caracteres restantes: <span style="color: white;">500</span></label>
            <textarea maxlength="500" class="form-control" style="margin-bottom: 1rem;" name="anotaciones" id="comentarioEstudiante" rows="19" autofocus></textarea>
        </div>
      </td>
    <tr>
    <tr id="contenedorG" class="containerDer2">
      <td>
          <table align="center" style="width: 100%;">
            <tr>
              <td colspan="5"><center><canvas id="myCanvas" style="border:2px solid gray;"></canvas> </td>
            </tr>
            <tr>
            <td>
                <center>
                <label style="color: white;">Tamaño: </label>
                <select id="selWidth">
                  <option value="1">1</option>
                  <option value="3">3</option>
                  <option value="5">5</option>
                  <option value="7">7</option>
                  <option value="9" selected="selected">9</option>
                  <option value="11">11</option>
                </select>
              </td>
              <td>
             <label style="color: white;">Color: </label>
                <select id="selColor">
                  <option value="black">Negro</option>
                  <option value="blue" selected="selected">Azul</option>
                  <option value="red">Rojo</option>
                  <option value="green">Verde</option>
                  <option value="yellow">Amarillo</option>
                  <option value="gray">Gris</option>
                </select>
              </td>              
            </tr>
            <tr>
              <td colspan="2"><center><button style="width: 100%;" type="button" class="btn btn-primary" onclick="javascript:clearArea();return false;">Limpiar</button></td>
            </tr>
            <tr>
            <td>
                <center>  
                <button style="width: 100%;" type="button" class="btn btn-warning" onclick="javascript:LoadImage();return false;">Cargar</button>
                <form>
                <div class="form-group">
                  <label for="exampleFormControlFile1">Example file input</label>
                  <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
              </form>
              </td>
              <td width="10px">
                <center>
                <button type="button" class="btn btn-success" onclick="javascript:download();return false;">Guardar</button>
                <a  id="downloadLnk" onclick="hide()" download="PruebaT.jpg">Descargar Imagen</a>             
              </td>
            </tr>
          </table>
      </td>
    </tr>
    <tr>
      <td>
      <p style="color:white;">adios</p>
      </td>
    </tr>
  </table>
        </div>
</section>       
    {{-- Footer --}}
    <footer class="col-12 colorPUCE">
        <div class="card-body text-center">
        <p class="micro legible center mb-0">Laboratorios de Tecnologías de Información y Comunicación - Facultad de Ingeniería - Escuela de Sistemas</p>
    </footer>
</body>
<script src="{{ url('js/bootstrap.min.js') }}"></script>
</html>