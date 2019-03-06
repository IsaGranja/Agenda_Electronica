<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
@extends('master')
{{-- Body --}}
@section('content-izq')
<div style="width:100%;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>
    <div class="form-group">
            <div class="col-sm-6">
            <select name="codperiodo" id="periodo" data-dependent="periodo" class="dropdown-item colorHeaderToggle periodo form-control input-lg principal" type="text" onchange="cambioAsignaturas()">
              <option value="0">AÑO ACADÉMICO </option>   
              @foreach($periodos as $periodo)
                    <option value="{{$periodo->codperiodo}}">{{$periodo->codperiodo}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-6">
            <select name="codasignatura" id="asignatura" class="dropdown-item colorHeaderToggle form-control input-lg dynamic asignatura principal" data-dependent="asignatura" type="text" onchange="cambioUnidades()">
            <option value="0">ASIGNATURA </option>   
          </select>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-3" for="unidad"></label>
        <div class="col-sm-6">
            <select class="dropdown-item colorHeaderToggle form-control input-lg dynamic unidad principal" data-dependent="unidad" id="unidad" type="text" onchange="cambioTemas()">
              <option value="0">UNIDAD </option>   
          </select>
        </div>
    </div>

    <h6 class="dropdown-header colorHeaderToggle">TEMAS</h6>
    <div id="listaT" class="list-group" onchange="cambioContenidos()"></div>
</div>
      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">

  function cambioAsignaturas(){
      var $asignaturaCombo = $("#asignatura");
      $('#asignatura option[value!="0"]').remove();

			var codperiodo=$('#periodo').val();
			var op=" ";
			$.ajax({
				type:'get',
				url:'{!!URL::to('json-asignaturas')!!}',
				data:{'codperiodo':codperiodo},
				success:function(data){       
					for(var i=0;i<data.length;i++){
					  $asignaturaCombo.append('<option value="'+data[i].codasignatura+'">'+data[i].descasignatura+'</option>');
				   }
				},
				error:function(){
				}
			});
    }
    function cambioUnidades(){
			console.log("hmm its change");
      var $unidadCombo = $("#unidad");
      $('#unidad option[value!="0"]').remove();
      $('#listaT a[value!="0"]').remove();
      //$unidadCombo.empty();
			var codasignatura=$('#asignatura').val();
			//var div=$('#asignatura').parent();
			$.ajax({
				type:'get',
				url:'{!!URL::to('json-unidades')!!}',
				data:{'codasignatura':codasignatura},
        dataType:'json',
				success:function(data){ 
					console.log('success');
					console.log(data);
					console.log(data.length);
					for(var i=0;i<data.length;i++){
            $unidadCombo.append('<option value="'+data[i].codunidad+'">'+data[i].descunidad+'</option>');
				   }
				},
				error:function(){
				}
			});
  }
  function cambioTemas(){
        console.log("hmm its change");
        var $temaLista = $("#listaT");
        $('#listaT a[value!="0"]').remove();
        var codunidad=$('#unidad').val();
        $.ajax({
          type:'get',
          url:'{!!URL::to('json-temas')!!}',
          data:{'codunidad':codunidad},
          dataType:'json',
          success:function(data){
            console.log('success');
            console.log(data);
            console.log(data.length);
            for(var i=0;i<data.length;i++){
              $temaLista.append('<a class= "list-group-item navHov" style="color: #60b5ee;" id="'+data[i].codtema+'">'+(i+1)+": "+data[i].desctema+'</a>');
            }
          },
          error:function(){
          }
        });
    }
//CAMBIO CONTENIDOS
            $('#listaT').click(function(e){                              
                var codtema= e.target.id;                
                $.ajax({
                  type:'get',
                  url:'{!!URL::to('json-contenidos')!!}',
                  data:{'codtema':codtema},
                  dataType:'json',
                  success:function(data){
                    console.log("CONTENIDOS");
                    console.log(data.length);
                    console.log(data);
                    // $("#editor").remove();
                    //$("#carousel-indicators").empty();
                    $('.carousel-inner,.carousel-indicators,.carousel-control-prev,.carousel-control-next').empty();
                    for(var i=0;i<data.length ;i++){
                      $('<li data-target="#carouselExampleFade" data-slide-to="'+i+'"></li>').appendTo('.carousel-indicators');
                      $('<div class="carousel-item" value="'+data[i].codcontenido+'"><div class="editor" id="editor" value="'+data[i].codcontenido+'" style="text-align: left; width:100%" contenteditable="false">'+data[i].textocontenido+'</div><div class="carousel-caption"></div>   </div>').appendTo('.carousel-inner');
                      //$contenidoCombo.append('<div class="editor" id="editor" value="'+data[i].codcontenido+'" style="text-align: left; width:100%" contenteditable="false">'+data[i].textocontenido+'</div>');    
                    }
                    $('.carousel-item').first().addClass('active');
                    $('.carousel-indicators > li').first().addClass('active');
                    $('<a href="#carouselExampleFade" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a>').appendTo('.carousel-control-prev'); 
                    $('<a href="#carouselExampleFade" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a>').appendTo('.carousel-control-next');
                    $('#carouselExampleFade').carousel();
                    glosario();
                    evaluaciones(codtema);
                    iconos();
                  },
                error:function(){
              }
              });
            }); 
//GLOSARIOS                
        function glosario(){
          var text = $("#editor").text().replace(/[\s]+/g, " ").trim();
            var word = text.split(" ");
            var newHTML = "";

            $.each(word, function(index, value){
                switch(value.toUpperCase()){
                    case "SELECT":
                    case "FROM":
                    case "WHERE":
                    case "LIKE":
                    case "BETWEEN":
                    case "NOTLIKE":
                    case "FALSE":
                    case "NULL":
                    case "ISA":
                    case "TRUE":
                    case "VARIABLE":
                    case "NOTIN":
                        newHTML += "<span class='statement' style='white-space: nowrap;' data-toggle='tooltip' data-placement='right' title='Ola ke ase isa jajaja :v'>" + value + "&nbsp;</span>"              
                        break;
                    default: 
                        newHTML += "<span class='other'>" + value + "&nbsp;</span>";
                }
            });
            $("#editor").html(newHTML);
            /////                   
        }
            $("#editor").ready(function(){
              $('[data-toggle="popover"]').popover();   
            });

            $( document ).ready(function() {
              $('[data-toggle="tooltip"]').tooltip({'placement': 'top'});
            }); 
</script>
@endsection

@section('content')
<div id="carouselExampleFade" style="width:100%;" class="carousel slide carousel-fade" data-interval="false">
    <ol class="carousel-indicators"></ol>
    <div class="carousel-inner" onchange="iconos();"></div>
    <a class="carousel-control-prev" title="Anterior" href="#carouselExampleFade" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" title="Siguiente" href="#carouselExampleFade" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
@endsection

@section('content-der')
<div style="width:100%;">
    <table border='0' style="width: 100%;">
      <tr class="containerDer1">
        <td>
          <div class="colorHeaderToggle" style="font-size:14px;">
              <label for="comment">Anotaciones: </label><br>
              <label class="labelC" style="font-size:9px">Caracteres restantes: <span style="color: white;">500</span></label>
              <textarea maxlength="500" class="altoAnotaciones" style="margin-bottom: 1rem;resize: none;" name="anotaciones" id="comentarioEstudiante" autofocus></textarea>
          </div>
        </td>
      </tr>
      <tr id="contenedorG" class="containerDer2">
        <td>
            <table align="center">
              <tr class="form-group">
                <td colspan="5"><center><canvas id="myCanvas" style="border:2px solid gray;resize: horizontal;"></canvas> </td>
              </tr>
              <tr class="form-group row">
                    <center>
                    <label style="color: white;">Tamaño: </label>
                    <select id="selWidth">
                      <option value="1">1</option>
                      <option value="3">3</option>
                      <option value="5">5</option>
                      <option value="7">7</option>
                      <option value="9" selected="selected">9</option>
                      <option value="11">11</option>
                      <option value="13">13</option>
                      <option value="15">15</option>
                      <option value="17">17</option>
                    </select>
                  <label style="color: white;">Color: </label>
                  <select id="selColor">
                    <option value="black">Negro</option>
                    <option value="blue" selected="selected">Azul</option>
                    <option value="red">Rojo</option>
                    <option value="green">Verde</option>
                    <option value="yellow">Amarillo</option>
                    <option value="gray">Gris</option>
                  </select> 
                  </center>           
              </tr>
              <tr class="form-group row">
              <td>
                  <button type="button" class="btn btn-primary" onclick="javascript:clearArea();return false;">Limpiar</button>
                  <button type="button" class="btn btn-warning" onclick="javascript:LoadImage();return false;">Cargar</button>
                  <button type="button" class="btn btn-success" onclick="javascript:download();return false;">Guardar</button>
                  <label style="color: white;"><input type="checkbox" id="cbox1" value="first_checkbox"> Borrador</label>
                  <!--<input type="file" class="btn btn-warning form-control-file" id="exampleFormControlFile1"  onclick="javascript:LoadImage();return false;">-->
                  <a  id="downloadLnk" onclick="hide()" download="PruebaT.jpg">Descargar Imagen</a>
                  <label for="exampleFormControlFile1">Example file input</label>
                  <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </td>        
              </tr>
            </table>
        </td>
      </tr>
  </table>
</div>
@endsection