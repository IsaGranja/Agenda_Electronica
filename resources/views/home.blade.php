<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
@extends('master')
{{-- Body --}}
@section('content-izq')
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

    <div class="form-group">
    <label class="control-label col-sm-3" for="periodo"></label>
            <div class="col-sm-6">
            <select name="codperiodo" id="periodo" data-dependent="periodo" class="periodo form-control input-lg principal" type="text" onchange="cambioAsignaturas()">
              <option value="0"> Seleccione el año académico </option>   
              @foreach($periodos as $periodo)
                    <option value="{{$periodo->codperiodo}}">{{$periodo->codperiodo}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
            <label class="control-label col-sm-3" for="asignatura"></label>
            <div class="col-sm-6">
                <select name="codasignatura" id="asignatura" class="form-control input-lg dynamic asignatura principal" data-dependent="asignatura" type="text" onchange="cambioUnidades()">
                <option value="0"> Seleccione la asignatura </option>   
              </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="unidad"></label>
            <div class="col-sm-6">
                <select class="form-control input-lg dynamic unidad principal" data-dependent="unidad" id="unidad" type="text" onchange="cambioTemas()">
                  <option value="0"> Seleccione la unidad </option>   
              </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="tema"></label>
            <div class="col-sm-6">
                <select class="form-control input-lg dynamic tema principal" data-dependent="tema" id="tema" type="text" onchange="cambioContenidos()">
                <option value="0"> Seleccione el tema </option>   
              </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="contenido"></label>
            <div class="col-sm-6">
                <select class="form-control input-lg dynamic contenido principal" data-dependent="contenido" id="contenido" type="text">
                  <option value="0"> Seleccione el contenido </option> 
                </select>
            </div>
        </div>
      <div>

        <h6 class="dropdown-header colorHeaderToggle">Unidades</h6>
          <a class= "dropdown-item colorToggle" href="#">Tema 1</a>  
      </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
    	/*$(document).ready(function(){
        
        $("#perido").change(function(){
          var codperiodo=$('#periodo').val();
          $.ajax({
          type:'get',
          url:'{!!URL::to('json-asignaturas')!!}',
          data:{'codperiodo':codperiodo},
          success:function(data){  
            var opciones='';       
					for(var i=0;i<data.length;i++){
              opciones+='<option value="'+data[i].codasignatura+'">'+data[i].descasignatura+'</option>';
              $("#asignatura").html("");
              $("#asignatura").append(opciones);
            }
          },
          error:function(){
          }
        })
        })
      });

    */
	//$(document).ready(function(){
    /*
    $("#periodo").change(cambioAsignaturas);
    cambioAsignaturas();
    
  });
*/
  function cambioAsignaturas(){
		//$(document).on('change','.periodo',function(){
      var $asignaturaCombo = $("#asignatura");
      $asignaturaCombo.empty();
			var codperiodo=$('#periodo').val();
			//var div=$('#periodo').parent();
			var op=" ";
			$.ajax({
				type:'get',
				url:'{!!URL::to('json-asignaturas')!!}',
				data:{'codperiodo':codperiodo},
				success:function(data){      
          $asignaturaCombo.append('<option value=""> Seleccione la asignatura </option>');    
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
      $unidadCombo.empty();
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
          $unidadCombo.append('<option value=""> Seleccione la unidad </option>'); 
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
        var $temaCombo = $("#tema");
        $temaCombo.empty();
        var codunidad=$('#unidad').val();
        //var div=$('#unidad').parent();
        $.ajax({
          type:'get',
          url:'{!!URL::to('json-temas')!!}',
          data:{'codunidad':codunidad},
          dataType:'json',
          success:function(data){
            console.log('success');
            console.log(data);
            console.log(data.length);
            $temaCombo.append('<option value=""> Seleccione el tema </option>'); 
            for(var i=0;i<data.length;i++){
              $temaCombo.append('<option value="'+data[i].codtema+'">'+data[i].desctema+'</option>');
            }
          },
          error:function(){
          }
        });
    }
    function cambioContenidos(){
        console.log("hmm its change");
        var $contenidoCombo = $("#contenido");
        $contenidoCombo.empty();
        var codtema=$('#tema').val();
        //var div=$('#tema').parent();
        $.ajax({
          type:'get',
          url:'{!!URL::to('json-contenidos')!!}',
          data:{'codtema':codtema},
          dataType:'json',
          success:function(data){
            console.log('success');
            console.log(data);
            console.log(data.length);
            $contenidoCombo.append('<option value=""> Seleccione el contenido </option>'); 
            for(var i=0;i<data.length;i++){
              $contenidoCombo.append('<option value="'+data[i].codcontenido+'">'+data[i].textocontenido+'</option>');
            }
          },
          error:function(){
          }
        });
    }
  
</script>
    
@endsection

@section('content')

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
@endsection

@section('content-der')
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
  </table>
@endsection