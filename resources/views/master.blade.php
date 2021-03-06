<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Principal</title>
    <base href="{{ URL::asset('/') }}" target="_top">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('js/jquery-3.3.1.slim.min.js') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('css/video-js.css') }}" /> 
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('css/video-js.min.css') }}" />     
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('css/glyphicon.css') }}" />        
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('css/normalize.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('js/popper.min.js') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('js/popper.js') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('js/tooltip.js') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('js/tooltip.min.js') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('css/bootstrap.min.css') }}" />    
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('css/Proyecto_AgendaElectronica-style.css') }}" />
    <script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="{{ url('js/Proyecto.js') }}"></script>
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) 
    <script src="https://vjs.zencdn.net/ie8/ie8-version/videojs-ie8.min.js"></script>-->
    <script src="https://unpkg.com/video.js@6.2.5/dist/video.min.js"></script>
<script src="https://unpkg.com/videojs-flash@2.0.0/dist/videojs-flash.min.js"></script>
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
                                            <audio id="audioclip" controls="controls" style="width:100%;">
                                                <source id="mp3audio" src="" type="audio/mpeg" />
                                            </audio>     
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
                                    <div class="modal-content" >
                                        <div class="modal-header" >
                                            <h1>Video</h1>    
                                            <button class="close" data-dismiss="modal">&times;</button>                                                
                                        </div>
                                        <div class="modal-body">
                                            <center>
                                            <div class="embed-responsive embed-responsive-16by9">                                                                                        
                                            <video id="videoclip" class="video-js vjs-default-skin" controls="controls">
                                                <source id="mp4video" src="" type="video/mp4"  />
                                            </video>
                                            </div>                              
                                        </div>
                                    </div>
                                </div>
                            </div>  
                    </td>
                    <td>
                        <center>
                        <img class="image-responsive imagen2 static" title="Evaluaciones" id="evaluaciones" src="{{ url('img/iconos/evaluacion/evaluacion.png') }}">
                            <img class="image-responsive imagen2" title="Evaluaciones" id="evaluaciones" src="{{ url('img/iconos/evaluacion/evaluacion.gif') }}">
                            <div id="mimodal4" class="modal fade" role="dialog" >
                                <div id="mimodal4" class="modal-dialog imagen">
                                    <div class="modal-content">
                                        <div class="modal-header colorPUCE" style="color: white;">
                                            <h1>Evaluaciones</h1>    
                                            <button class="close" data-dismiss="modal">&times;</button>                                                
                                        </div>
                                        <div class="modal-body" style="background: #f1f1f1;">
                                            <div id="carouselExampleModal" style="width:100%;" class="carousel slide carousel-fade" data-interval="false">
                                                <ol class="carousel-indicators modalIndicators"></ol>
                                                <div class="carousel-inner modalInner" onchange="evaluaciones();"></div>

                                                <a class="carousel-control-prev modalPrev" title="Anterior" href="#carouselExampleModal" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next modalNext" title="Siguiente" href="#carouselExampleModal" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>   
                    </td>
                    <td>
                        <center>
                        <img class="image-responsive imagen2 static" title="Información Adicional" id="informacion_adicional" src="{{ url('img/iconos/lightbulb/static.png') }}">
                            <img class="image-responsive imagen2" title="Información Adicional" id="informacion_adicional" src="{{ url('img/iconos/lightbulb/animat-lightbulb-color.gif') }}">
                            <div id="mimodal5" class="modal fade" role="dialog" width="100%" height="300px">
                                <div id="mimodal5" class="modal-dialog imagen">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1>Información adicional</h1>    
                                            <button class="close" data-dismiss="modal">&times;</button>                                                
                                        </div>
                                        <div class="modal-body ">
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
                                            <h1>Glosario</h1>    
                                            <button class="close" data-dismiss="modal">&times;</button>                                                
                                        </div>
                                        <div class="modal-body">
                                            <center>
                                            <img src="" class="recibir-glosario" width="20%" height="20%">
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
                                <div id="mimodal7" class="modal-dialog imagen" width="960px" height="100%">
                                    <div class="modal-content" width="100%" height="100%">
                                        <div class="modal-header"width="100%" height="100%">
                                            <h1>Talleres</h1>    
                                            <button class="close" data-dismiss="modal">&times;</button>                                                
                                        </div>
                                        <div class="modal-body"width="100%" height="100%" style="overflow-y: scroll;">
                                            <!--<img src="" class="recibir-talleres" width="100%" height="100%"style="overflow-x: scroll; overflow-y: scroll;">-->                                                                            
                                                <center>
                                                <table width="100%" height="100%">
                                                    <tr width="100%" height="100%">
                                                        <td width="100%" height="100%"> 
                                                            <span class="label label-default">Ejercicio:</span>
                                                            <iframe id="talCont" src="" width="100%" height="300px" allowfullscreen></iframe>                                                                                                                                                                                                        
                                                        </td>                                                                                                            
                                                    </tr>
                                                    <tr>
                                                        <td width="100%" height="100%"> 
                                                            <span class="label label-default">Solución:</span>                                                           
                                                            <iframe id="solCont" src="" width="100%" height="300px" allowfullscreen></iframe>                                                                                                            
                                                        </td>    
                                                    </tr>                                                    
                                                </table>                                                                                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </td>
                    <script type="text/javascript">   
                    
                     function replaceAll(str, find, replace) {
                        return str.replace(new RegExp(find, 'g'), replace);
                    }                       
                    $('#mimodal3').on('hidden.bs.modal', function () {
                        var videocontainer = document.getElementById('videoclip');
                        videocontainer.pause();
                    })
                    $('#mimodal2').on('hidden.bs.modal', function () {
                        var audiocontainer = document.getElementById('audioclip');
                        audiocontainer.pause();
                    }) 
                    var actual="";
                    $('#carouselExampleFade').on('slide.bs.carousel', function (event) {  
                        actual = $("#carouselExampleFade div").find("div.active").attr('value').toString();                     
                         
                    });            

                    $('#carouselExampleFade').on('slid.bs.carousel', function (event) {  
                        var valor = $(event.relatedTarget).attr('value').toString(); 
                        //alert(valor);
                        anotaciones(valor);                                            
                        glosarios(valor); 
                        //alert("crear:"+actual);  
                        anotaciones1(actual);    
                    });
                    function iconos()
                    {
                        var contenido = null;
                        $('.imagen2').click(function(){
                                var imagenT=$(this).attr('src');
                                var imagenID=$(this).attr('id');
                                $valor = $("#carouselExampleFade div").find("div.active").attr('value').toString();                            
                                //anotaciones($valor);
                                //alert($valor);
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
                                    $valor=$valor+".jpg";
                                    //alert($valor);         
                                    $('.recibir-imagen').attr('src', "images/"+$valor); //aqui se coloca la imagen que desea cargar
                                    $('#mimodal').modal();     
                                }else if(imagenID=="audio"){
                                    $valor="/audio/"+$valor+".mp3";
                                    //alert($valor);  
                                    var audiocontainer = document.getElementById('audioclip');
                                    var audiosource = document.getElementById('mp3audio');
                                    audiocontainer.pause();
                                    audiosource.setAttribute('src', $valor);
                                    audiocontainer.load();
                                    audiocontainer.play();
                                    $('#mimodal2').modal();  
                                }else if(imagenID=="video"){
                                    $valor="/video/"+$valor+".mp4";
                                    //alert($valor);  
                                    //$('.recibir-video').attr('src', $valor); //aqui se coloca el video que desea cargar     
                                    var videocontainer = document.getElementById('videoclip');
                                    var videosource = document.getElementById('mp4video');
                                    videocontainer.pause();
                                    videosource.setAttribute('src', $valor);
                                    videocontainer.load();
                                    videocontainer.play();
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
                                    //$('.recibir-talleres').attr('src',"{{ url('img/puceLogo.jpg') }}"); //aqui se coloca la infoAdicional que desea cargar
                                    //var x = document.createElement(".recibir-talleres");
                                    //x.setAttribute("type", "file");
                                    $taller="/taller/"+$valor+".pdf";
                                    $solucion="/solucion/"+$valor+".pdf";
                                    //alert($taller);
                                    //alert($solucion);
                                    var tallercontainer = document.getElementById('talCont'); 
                                    var solucioncontainer = document.getElementById('solCont'); 
                                    tallercontainer.setAttribute('src', $taller);
                                    solucioncontainer.setAttribute('src', $solucion);
                                    $('#mimodal7').modal();  
                                }
                            }                                
                        });
                    }
                    $('#carouselExampleModal').on('slid.bs.carousel', function (event) {  
                        //var actual = $("#carouselExampleModal div").find("div.active").attr('id').toString();                     
                        //alert(actual);                      
                        var enunpreg = $(event.relatedTarget).attr('value').toString();
                        var codtema = $(event.relatedTarget).attr('id').toString();                            
                        //alert("enunpreg:"+enunpreg);
                        //alert("codtema:"+codtema);
                        pregxSlide(codtema,enunpreg);                  
                        //anotaciones(valor);                      
                        //glosarios(valor);                  
                        //createAnotaciones(actual);
                    });
                    function pregxSlide(codigoTema,enunPreg){
                        var respR = [];
                        var retroR = [];   
                        var respuestaSel = document.querySelector("input[id=opcionradios]:checked").value;
                        var cont=0; 
                        var dataString = {'codtema':codigoTema, 'enunpregevaluacion':enunPreg};
                        console.log(dataString);                      
                        $.ajax({
                        type:'get',
                        url:'{!!URL::to('json-evaluaciones1')!!}',
                        data: dataString,                                               
                        dataType:'json',
                            success:function(data){
                                for(var i=0;i<data.length ;i++){
                                    respR[i]=data[i].respevaluacion;                                    
                                    retroR[i]=data[i].retroevaluacion; 
                                }
                                //alert('adios');   
                                alert("lol: "+respuestaSel);
                                alert("Real:"+respR[0]);
                                alert("Retrospectiva:"+retroR[0]);
                            },
                            error:function(e){
                                alert('error');
                            }
                        });                                                
                        for (var i = 0; i < respR.length; i++) {                            
                            if (respR[i] === respuestaSel) {
                                alert('felicidades');
                                cont++;    
                                break;
                            }else{
                                alert("Real:"+respR[i]);
                                alert("Retrospectiva:"+retroR[i]);
                                break;
                            }
                        }
                    }
                    function evaluaciones(codtema){     
                        var respR = [];
                        var retroR = []; 
                        var enunpreg = []; 
                        var tema=[];                        
                        $.ajax({
                        type:'get',
                        url:'{!!URL::to('json-evaluaciones')!!}',
                        data:{'codtema':codtema},
                        dataType:'json',
                        success:function(data){
                            console.log("eval");
                            console.log(data.length);
                            console.log(data);
                            //$listas = (array)data;
   
                            //list($keys, $values) = array_divide($listas);

                            $('.modalInner, .modalIndicators, .modalPrev, .modalNext').empty();
                            for(var i=0;i<data.length ;i++){
                                $('<li data-target="#carouselExampleModal" data-slide-to="'+i+'"></li>').appendTo('.modalIndicators');
                                respR[i]=data[i].respevaluacion;
                                //alert("resp:"+respR[i]);
                                retroR[i]=data[i].retroevaluacion; 
                                enunpreg[i]=data[i].enunpregevaluacion; 
                                tema[i]=data[i].codtema;                              
                                //alert("retro:"+data[i].retroevaluacion);
                                $('<div class="carousel-item modalItem" id="'+data[i].codtema+'" value="'+data[i].enunpregevaluacion+'"><div class="editor1" id="'+data[i].codtema+'" value="'+data[i].enunpregevaluacion+'" contenteditable="false">'+data[i].enunpregevaluacion+
                                '<br><input type="radio" class ="evaluaciones" name="optionsRadios'+i+'" id="opcionradios" value="'+data[i].op1evaluacion+'" checked="" onclick="return false;" >'+ data[i].op1evaluacion+'<br>'+
                                '<input type="radio" class ="evaluaciones" name="optionsRadios'+i+'" id="opcionradios" value="'+data[i].op2evaluacion+'" checked="" onclick="return false;" >'+ data[i].op2evaluacion+'<br>'+
                                '<input type="radio" class ="evaluaciones" name="optionsRadios'+i+'" id="opcionradios" value="'+data[i].op3evaluacion+'" checked="" onclick="return false;" >'+ data[i].op3evaluacion+'<br>'+
                                '<input type="radio" class ="evaluaciones" name="optionsRadios'+i+'" id="opcionradios" value="'+data[i].op4evaluacion+'" checked="" onclick="return false;" >'+ data[i].op4evaluacion+
                                '</div></div>').appendTo('.modalInner');                        
                            }
                            $('#carouselExampleModal .modalItem').first().addClass('active');
                            $('#carouselExampleModal .modalIndicators > li').first().addClass('active');
                            $('<a href="#carouselExampleModal" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a>').appendTo('.modalPrev'); 
                            $('<a href="#carouselExampleModal" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a>').appendTo('.modalNext');
                            $('#carouselExampleModal').carousel();
                            /*$( document).ready(function() {
                                document.querySelector('input[name=optionsRadios]:checked').checked = localStorage.checked
                            });*/
                            $("input[id=opcionradios]").click(function(){                               
                                var enunpreg = $("#carouselExampleModal div").find("div.active").attr('value').toString();   
                                var codtema = $("#carouselExampleModal div").find("div.active").attr('id').toString();                              
                                //alert("enunpreg:"+enunpreg);
                                //alert("codtema:"+codtema);
                                pregxSlide(codtema,enunpreg); 
                            });
                             
                        },
                        error:function(){
                    }
                    });
                    }
                    
                    function check1(respuesta, retrospectiva){
                        var respuestaSel = document.querySelector("input[id=opcionradios]:checked").value;
                        var respuestaReal = respuesta;
                        var retrospectivaReal = retrospectiva;
                        var cont=0;
                        //
                        for (var i = 0; i < respuestaReal.length; i++) {                            
                            if (respuestaReal[i] === respuestaSel) {
                                alert('felicidades');
                                cont++;    
                                break;
                            }else{
                                alert("Real:"+respuestaReal[i]);
                                alert("Retrospectiva:"+retrospectivaReal[i]);
                                break;
                            }
                        }
                        ///
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
                                    var i=data.length;
                                    
                                    if(i>0)
                                        if(data[0].anotestudiante==null)
                                        $('#comentarioEstudiante').val($('#comentarioEstudiante').val() + "");
                                        else
                                        $('#comentarioEstudiante').val($('#comentarioEstudiante').val() + data[0].anotestudiante);
                                        //$('#comentarioEstudiante').append(data[i].anotestudiante)
                                
                                },
                                error:function(){
                            }
                            });
                        }
                        function anotaciones1($codcontenido){
                        console.log("FUNCION ANOTACIONES 111111");
                        $anotestudiante=$('#comentarioEstudiante').val();
                        console.log("Anote: "+$anotestudiante);
                                $.ajax({
                                type:'get',
                                url:'{!!URL::to('json-anotaciones1')!!}',
                                data:{'codcontenido':$codcontenido,'anotestudiante':$anotestudiante},
                                
                                success:function(data){
                                    console.log("Createe anotaciones");
                                    console.log(data.length);
                                    console.log(data);
                                    // $("#editor").remove();
                                    //$("#carousel-indicators").empty();
                                    //$('.altoAnotaciones').empty();
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.log(textStatus, errorThrown);
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
<script src='https://vjs.zencdn.net/7.4.1/video.js'></script>
</body>
{{-- Footer --}}
    
<footer class="col-12 colorPUCE ">
        <p>Laboratorios de Tecnologías de Información y Comunicación - Facultad de Ingeniería - Escuela de Sistemas</p>
</footer>
<script src="{{ url('js/bootstrap.min.js') }}"></script>
</html>