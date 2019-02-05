@extends('master')
{{-- Body --}}
@section('content-izq')
    <h6 class="dropdown-header colorHeaderToggle">Asignatura</h6>
    <a class= "dropdown-item colorToggle" href="#">Tema 1</a>  
    <a class= "dropdown-item colorToggle" href="#">Tema 2</a>
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
            <label for="comment">Anotaciones del Estudiante: </label>
            <textarea class="form-control bordegris" maxlength="500" style="margin-bottom: 1rem;" name="anotaciones" id="comentarioEstudiante" rows="19" autofocus></textarea>
            <label> Caracteres restantes: <span style="color: white;">500</span></label>
            <script>
              var inputs = "textarea[maxlength]";
              $(document).on('keyup', "[maxlength]", function (e) {
                  var este = $(this),
                      maxlength = este.attr('maxlength'),
                      maxlengthint = parseInt(maxlength),
                      textoActual = este.val(),
                      currentCharacters = este.val().length;
                      remainingCharacters = maxlengthint - currentCharacters,
                      espan = este.prev('label').find('span');            
                      // Detectamos si es IE9 y si hemos llegado al final, convertir el -1 en 0 - bug ie9 porq. no coge directamente el atributo 'maxlength' de HTML5
                      if (document.addEventListener && !window.requestAnimationFrame) {
                          if (remainingCharacters <= -1) {
                              remainingCharacters = 0;            
                          }
                      }
                      espan.html(remainingCharacters);
                      if (!!maxlength) {
                          var texto = este.val(); 
                          if (texto.length >= maxlength) {
                              este.val(text.substring(0, maxlength));
                              e.preventDefault();
                          }
                          else if (texto.length < maxlength) {
                              //lols
                          }   
                      }   
                 });
            </script>
        </div>
      </td>
    <tr>
    <tr id="contenedorG" class="containerDer2">
      <td>
          <table align="center">
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
              <center> 
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
              <td colspan="2"><center><button onclick="javascript:clearArea();return false;">Limpiar Contenido</button></td>
            </tr>
            <tr>
            <td>
                <center>  
                <button onclick="javascript:LoadImage();return false;">Cargar Imagen</button>
              </td>
              <td>
                <center>
                <button onclick="#">Guardar Imagen</button>
              </td>
            </tr>
          </table>
        <script>
        var mousePressed = false;
        var lastX, lastY;
        var ctx;
        var canvas;
        var contL;
        function InitThis() {
            canvas = document.getElementById("myCanvas");
            ctx = document.getElementById('myCanvas').getContext("2d");             
            //contL = document.getElementById('contenedorG');
            // parseInt(paint_style.getPropertyValue('height'))---window.innerHeight()
            ctx.canvas.width = 323;
            ctx.canvas.height = 161;           
            $('#myCanvas').mousedown(function (e) {
                mousePressed = true;
                Draw(e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, false);
                
            });

            $('#myCanvas').mousemove(function (e) {
                if (mousePressed) {
                    Draw(e.pageX - $(this).offset().left, e.pageY - $(this).offset().top, true);
                }
            });

            $('#myCanvas').mouseup(function (e) {
                mousePressed = false;
            });
                $('#myCanvas').mouseleave(function (e) {
                mousePressed = false;
            });
            ctx.fillStyle = 'rgba(255,255,255)';
            ctx.fillRect(0,0,window.innerWidth,window.innerHeight);
        }

        function Draw(x, y, isDown) {
            if (isDown) {
                ctx.beginPath();
                ctx.strokeStyle = $('#selColor').val();
                ctx.lineWidth = $('#selWidth').val();
                ctx.lineJoin = "round";
                ctx.moveTo(lastX, lastY);
                ctx.lineTo(x, y);
                ctx.closePath();
                ctx.stroke();
            }
            lastX = x; lastY = y;
        }
            
        function clearArea() {
            // Use the identity matrix while clearing the canvas
            ctx.setTransform(1, 0, 0, 1, 0, 0);
            ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
            ctx.fillStyle = 'rgba(255,255,255)';
            ctx.fillRect(0,0,window.innerWidth,window.innerHeight);
        }
        /*function LoadImage() {
            if (canvas != null) {
                if (canvas.getContext) {
                    var context = canvas.getContext('2d');
                    var img = new Image();
                    img.src = "{{ url('img/photo.ico') }}";  //moved up for cosmetics
                    img.onload = function () {
                        context.drawImage(img, 15, 15, 620, 475);
                        ***DrawMarkedItems();***
                    }                    
                }
            }
        }*/
        </script>
      </td>
    </tr>
  </table>
    
@endsection
