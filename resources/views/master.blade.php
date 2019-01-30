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
<body class="col-12 colorPUCE">
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg col-12 navbar-light colorPUCE">
        <a class="navbar-brand" href='http://www.puce.edu.ec'><img class="logo" src="{{ url('img/puceLogo.jpg') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Descargar SCORM <span class="sr-only">(current)</span></a>
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
    <section class="row">
        <div class="col-md-3 col-lg-2 d-none d-md-block fondoizq">@yield('content-izq')</div>
        <div class="col-sm-6 col-md-5 col-lg-7 fondocentro">
            <center>
            <table border="0">
                <tr class="containerPri1">
                    <td colspan=5">
                    <center>@yield('content')
                    </td>
                </tr>
                <tr class="containerPri2 colorFondoIconos">
                    <center>
                    <td>
                        <center>
                            <img class="image-responsive imagen2" id="imagen" src="{{ url('img/photo.ico') }}">
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
                            <img class="image-responsive imagen2" id="audio" src="{{ url('img/Music.ico') }}">
                            <div id="mimodal2" class="modal fade" role="dialog">
                                <div id="mimodal" class="modal-dialog imagen">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1>audio</h1>    
                                            <button class="close" data-dismiss="modal">&times;</button>                                                
                                        </div>
                                        <div class="modal-body">
                                            <audio controls>
                                            <source src="" class="recibir-audio" type="audio/mpeg">
                                            </audio>
                                        </div>
                                    </div>
                                </div>
                            </div>                    
                    </td>
                    <td>
                        <center>
                            <img class="image-responsive imagen2" id="video" src="{{ url('img/Video.ico') }}">
                            <div id="mimodal3" class="modal fade" role="dialog">
                                <div id="mimodal" class="modal-dialog imagen">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1>video</h1>    
                                            <button class="close" data-dismiss="modal">&times;</button>                                                
                                        </div>
                                        <div class="modal-body">
                                            <img src="" class="recibir-video" width="100%" height="100%">
                                        </div>
                                    </div>
                                </div>
                            </div>  
                    </td>
                    <td>
                        <center>
                            <img class="image-responsive imagen2" id="evaluaciones" src="{{ url('img/Question_mark.ico') }}">
                            <div id="mimodal4" class="modal fade" role="dialog">
                                <div id="mimodal" class="modal-dialog imagen">
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
                            <img class="image-responsive imagen2" id="informacion_adicional" src="{{ url('img/info.ico') }}">
                            <div id="mimodal5" class="modal fade" role="dialog">
                                <div id="mimodal" class="modal-dialog imagen">
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
                                    $('.recibir-audio').attr('type',"audio/mpeg");
                                    $('#mimodal2').modal();  
                                }else if(imagenID=="video"){
                                    $('.recibir-video').attr('src',"{{ url('img/Video.ico') }}"); //aqui se coloca el video que desea cargar
                                    $('#mimodal3').modal();  
                                }else if(imagenID=="evaluaciones"){
                                    $('.recibir-evaluaciones').attr('src',"{{ url('img/Question_mark.ico') }}"); //aqui se coloca la evaluacion que desea cargar
                                    $('#mimodal4').modal();  
                                }else if(imagenID=="informacion_adicional"){
                                    $('.recibir-info').attr('src',"{{ url('img/info.ico') }}"); //aqui se coloca la infoAdicional que desea cargar
                                    $('#mimodal5').modal();  
                                }
                            }                                
                        });
                    });
                    </script>
                </tr>
            </table>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 fondoder"><center>@yield('content-der')</div>
</section>       
    {{-- Footer --}}
    <footer class="col-12 colorPUCE">
        <div class="card-body text-center">
			<p class="micro legible center mb-0">CENTRO DE EDUCACIÓN VIRTUAL Y TECNOLOGÍA EDUCATIVA - CEVTE <br>
             Para soporte comunicarse: <br> Teléfono: (+593) 299 1700 ext. 1509 / 1845 / 1127 
             <br> Correo electrónico: cevte@puce.edu.ec</p>
    </footer>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
</body>
</html>