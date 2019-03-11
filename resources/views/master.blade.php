<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Principal</title>
    <base href="{{ URL::asset('/') }}" target="_top">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('js/jquery-3.3.1.slim.min.js') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('css/glyphicon.css') }}" />    
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('js/popper.min.js') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('css/normalize.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('css/bootstrap.min.css') }}" />    
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('css/Proyecto_AgendaElectronica-style.css') }}" />
    <script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('js/Proyecto.js') }}"></script>
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <style>
    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu .dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -1px;
    }
    </style>
</head>
<body class="col-12 colorPUCE" onload="InitThis();">
  {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg col-12 navbar-light colorPUCE">
        <a class="navbar-brand" href='http://www.puce.edu.ec'><img class="logo" src="{{ url('img/puceLogo.jpg') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
                <ul class="navbar-nav ">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Opciones
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ url('/pagProvincias') }}">Provincias</a></li>
                        <li><a class="dropdown-item" href="{{ url('/pagCiudades') }}">Ciudades</a></li>
                        <li><a class="dropdown-item" href="{{ url('/pagUniversidades') }}">Universidades</a></li>
                        <li><a class="dropdown-item" href="{{ url('/pagSedes') }}">Sedes</a></li>
                        <li><a class="dropdown-item" href="{{ url('/pagPeriodos') }}">Períodos</a></li>
                        <li><a class="dropdown-item" href="{{ url('/pagFacultades') }}">Facultades</a></li>
                        <li><a class="dropdown-item" href="{{ url('/pagFacultadesxSede') }}">Facultades por sedes</a></li>
                        <li><a class="dropdown-item" href="{{ url('/pagEscuelas') }}">Escuelas</a></li>
                        <li><a class="dropdown-item" href="{{ url('/pagCarreras') }}">Carreras</a></li>
                        <li><a class="dropdown-item" href="{{ url('/pagProfesores') }}">Profesores</a></li>
                        <li class="dropdown-submenu">
                            <a class="test" tabindex="-1" href="#">Estudiantes </a>
                            <ul class="dropdown-menu" style="margin: none; padding:0;">
                                <li><a class="dropdown-item" tabindex="-1" href="{{ url('/pagEstudiantes') }}">Estudiantes General</a></li>
                                <li><a class="dropdown-item" tabindex="-1" href="{{ url('/pagEstudiantes-excel/create') }}">Estudiantes Excel</a></li>
                            </ul>                            
                        </li>
                        <li class="dropdown-submenu">
                            <a class="test" tabindex="-1" href="#">Asignaturas </a>
                            <ul class="dropdown-menu" style="margin: none; padding:0;">
                                <li><a class="dropdown-item" tabindex="-1" href="{{ url('/pagAsignaturas') }}">Asignaturas General</a></li>
                                <li><a class="dropdown-item" tabindex="-1" href="{{ url('/pagAsigxEstu') }}">Asignaturas por Estudiante</a></li>
                                <li><a class="dropdown-item" tabindex="-1" href="{{ url('/pagAsigxProf') }}">Asignaturas por Profesor</a></li>
                            </ul>                            
                        </li>
                        <li><a class="dropdown-item" href="{{ url('/pagUnidades') }}">Unidades</a></li>
                        <li><a class="dropdown-item" href="{{ url('/pagTemas') }}">Temas</a></li>
                        <li><a class="dropdown-item" href="{{ url('/talleres') }}">Talleres</a></li>
                        <li><a class="dropdown-item" href="{{ url('/pagEvaluaciones') }}">Evaluaciones</a></li>
                        <li><a class="dropdown-item" href="{{ url('/glosarios') }}">Glosario</a></li>
                        <li><a class="dropdown-item" href="{{ url('/contenidos') }}">Contenidos</a></li>
                    </ul>
                    <script>
                        $(document).ready(function(){
                        $('.dropdown-submenu a.test').on("click", function(e){
                            $(this).next('ul').toggle();
                            e.stopPropagation();
                            e.preventDefault();
                        });
                        });
                    </script>
                </li>
                </ul>
                <ul class="navbar-nav ">
                    <li class="nav-item ">
                        <a class="nav-link"  href="{{ url('/') }}">Descargar <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item " style="color: white;">
                        <b>Bienvenido {{ Auth::user()->email }} </b>
                    </li>
                </ul>
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/main/logout') }}">Cerrar Sesión <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
        </div>
    </nav>
    {{-- Body --}}

    <form method="post" action="{{url('anotaciones')}}" class="form-horizontal" data-toggle="validator"
    enctype="multipart/form-data">
    @csrf
    <div class="form-horizontal">


        <input type="hidden" id="codcontenido" class="form-control" name="codcontenido" >

    <section class="row">
        <div class="col-lg-2 fondoizq">@yield('content-izq')</div>
        <div class="col-md-12 col-lg-7 fondocentro">
            <center>
            <table border="0 cuerpo" style="width:100%;" class="tableCanvas">
                <tr class="containerPri1">
                    <td colspan="12">
                    <center>@yield('content')                                    
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
                                            <h1>Imagen</h1>    
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
                                            <h1>Audio</h1>    
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
                                            <h1>Video</h1>    
                                            <button class="close" data-dismiss="modal">&times;</button>                                                
                                        </div>
                                        <div class="modal-body">
                                            <video width="100%" height="100%" controls>
                                                <source src="" class="recibir-video" type="video/mp4" />
                                                
                                                
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
                                            <h1>Evaluaciones</h1>    
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
                        <img class="image-responsive imagen2 static" title="Información Adicional" id="informacion_adicional" src="{{ url('img/iconos/lightbulb/static.png') }}">
                            <img class="image-responsive imagen2" title="Información Adicional" id="informacion_adicional" src="{{ url('img/iconos/lightbulb/animat-lightbulb-color.gif') }}">
                            <div id="mimodal5" class="modal fade" role="dialog">
                                <div id="mimodal5" class="modal-dialog imagen">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1>Información adicional</h1>    
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
                     /*$('#carouselExampleFade').on('slide.bs.carousel', function(e) {
                        var valor = $("#carouselExampleFade div").find("div.active").attr('value'); 
                        alert(valor);

                     });*/ 
                    
                     function replaceAll(str, find, replace) {
                        return str.replace(new RegExp(find, 'g'), replace);
                    }   
                                            
                    $('#carouselExampleFade').on('slid.bs.carousel', function (event) {
                        //var nextactiveslide = $(event.relatedTarget).index();
                        var valor = $(event.relatedTarget).attr('value').toString();
                        alert(valor);
                        anotaciones(valor);
                    });
                    function iconos()
                    {
                        var contenido = null;
                        $('.imagen2').click(function(){
                                var imagenT=$(this).attr('src');
                                var imagenID=$(this).attr('id');
                                $valor = $("#carouselExampleFade div").find("div.active").attr('value').toString();
                                //anotaciones($valor);
                                $.ajax({
                                    type:'get',
                                    url:'{!!URL::to('json-contenidosUnico')!!}',
                                    data:{'codcontenido':$valor},
                                    dataType:'json',
                                    success:function(data){
                                        //$('#mimodal5').empty();
                                        console.log("CONTENIDO");
                                        console.log(data.length);
                                        console.log(data);
                                        contenido=data[0];    
                                },
                                error:function(){
                            }
                            });
                            //var editorVAL=$('#editor').attr('value'); 
                            console.log(contenido); 
                        
                            if(imagenT==""){                                                                    
                                //alert(valor);                    
                                $('.recibir-imagen').attr('src',"img/no_disponible.jpg"); //aqui se coloca la imagen que desea cargar
                                $('#mimodal').modal(); 
                            }else{
                                if(imagenID=="imagen")
                                {            
                                    $('.recibir-imagen').attr('src', "images/"+$valor); //aqui se coloca la imagen que desea cargar
                                    $('#mimodal').modal();     
                                }else if(imagenID=="audio"){
                                    $('.recibir-audio').attr('src',"audio/"+$valor); //aqui se coloca el audio que desea cargar
                                    //$('.recibir-audio').attr('type',"audio/mpeg");
                                    //$('.recibir-audio').attr('type',"audio/ogg");
                                    $('#mimodal2').modal();  
                                }else if(imagenID=="video"){
                                    
                                    $('.recibir-video').attr('src',"video/"+$valor); //aqui se coloca el video que desea cargar
                                    
                                    $('#mimodal3').modal();
                                    //document.getElementById('.recibir-video').play(); 
                                }else if(imagenID=="evaluaciones"){
                                    $('.recibir-evaluaciones').attr('src',"{{ url('img/Question_mark.ico') }}"); //aqui se coloca la evaluacion que desea cargar
                                    $('#mimodal4').modal();  
                                }else if(imagenID=="informacion_adicional"){
                                    $('.recibir-info').attr('src',"{{ url('img/info.ico') }}"); //aqui se coloca la infoAdicional que desea cargar
                                    $('#mimodal5 .modal-body').append(contenido["infoapoyocontenido"]);
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
                    }
                    function evaluaciones(codtema){
                                       
                        $.ajax({
                        type:'get',
                        url:'{!!URL::to('json-evaluaciones')!!}',
                        data:{'codtema':codtema},
                        dataType:'json',
                        success:function(data){
                            console.log("eval");
                            console.log(data.length);
                            console.log(data);
                            // $("#editor").remove();
                            //$("#carousel-indicators").empty();
                            $('.carousel-inner,.carousel-indicators,.carousel-control-prev,.carousel-control-next').empty();
                            for(var i=0;i<data.length ;i++){
                            $('<li data-target="#carouselExampleFade" data-slide-to="'+i+'"></li>').appendTo('.carousel-indicators');
                            $('<div class="carousel-item" value="'+data[i].codpregunta+'"><div class="editor" id="editor" value="'+data[i].codpregunta+'" style="text-align: left; width:100%" contenteditable="false">'+data[i].enunpregevaluacion+'</div><div class="carousel-caption"></div>   </div>').appendTo('.carousel-inner');
                            //$contenidoCombo.append('<div class="editor" id="editor" value="'+data[i].codcontenido+'" style="text-align: left; width:100%" contenteditable="false">'+data[i].textocontenido+'</div>');    
                            }
                            $('.carousel-item').first().addClass('active');
                            $('.carousel-indicators > li').first().addClass('active');
                            $('<a href="#carouselExampleFade" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a>').appendTo('.carousel-control-prev'); 
                            $('<a href="#carouselExampleFade" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a>').appendTo('.carousel-control-next');
                            $('#carouselExampleFade').carousel();
                            glosario();
                            iconos();
                        },
                        error:function(){
                    }
                    });
                    }
                    function anotaciones($codcontenido){
                        console.log("FUNCION ANOTACIONES");
                                $.ajax({
                                type:'get',
                                url:'{!!URL::to('json-anotaciones')!!}',
                                data:{'codcontenido':$codcontenido},
                                dataType:'json',
                                success:function(data){
                                    console.log("anotaciones");
                                    console.log(data.length);
                                    console.log(data);
                                    // $("#editor").remove();
                                    //$("#carousel-indicators").empty();
                                    //$('.altoAnotaciones').empty();
                                    document.getElementById("comentarioEstudiante").value = "";
                                    //comentarioEstudiante.val(data[0].anotestudiante);
                                    $('#comentarioEstudiante').val($('#comentarioEstudiante').val() + data[0].anotestudiante);
                                        //$('#comentarioEstudiante').append(data[i].anotestudiante)
                                
                                },
                                error:function(){
                            }
                            });
                        }
                    </script>
                </tr>
            </table>
        </div>
        <div class="col-lg-3 fondoder"><center>@yield('content-der')</div>
</section>       
</form>

</body>
{{-- Footer --}}
    
<footer class="col-12 colorPUCE ">
        <p>Laboratorios de Tecnologías de Información y Comunicación - Facultad de Ingeniería - Escuela de Sistemas</p>
</footer>
<script src="{{ url('js/bootstrap.min.js') }}"></script>
</html>