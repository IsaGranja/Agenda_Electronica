<meta http-equiv="X-UA-Compatible" content="IE=edge">
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
            <label for="comment">Anotaciones: </label><br>
            <label> Caracteres restantes: <span style="color: white;">500</span></label>
            <textarea maxlength="500" class="form-control bordegris" style="margin-bottom: 1rem;" name="anotaciones" id="comentarioEstudiante" rows="19" autofocus></textarea>
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
              <td colspan="2"><center><button onclick="javascript:clearArea();return false;">Limpiar</button></td>
            </tr>
            <tr>
            <td>
                <center>  
                <button onclick="javascript:LoadImage();return false;">Cargar</button>
              </td>
              <td>
                <center>
                <button onclick="javascript:guardar();return false;">Guardar</button>
                <script>
                          function guardar(){
                            var canvas = document.getElementById("myCanvas");
                            var dataURL = canvas.toDataURL();    
                            $.ajax({
                            type: "POST",
                            url: "{{ url('img/script.php') }}",
                            data: { 
                                imgBase64: dataURL
                            }
                            }).done(function(o) {
                            console.log('saved'); 
                            // If you want the file to be visible in the browser 
                            // - please modify the callback in javascript. All you
                            // need is to return the url to the file, you just saved 
                            // and than put the image in your browser.
                            });
                        }
                </script>                
              </td>
            </tr>
          </table>
      </td>
    </tr>
  </table>
@endsection
