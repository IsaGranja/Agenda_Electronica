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
            <textarea class="form-control" style="margin-bottom: 1rem;" name="anotaciones" id="comentarioEstudiante" rows="19" autofocus></textarea>
        </div>
      </td>
    <tr>
    <tr class="containerDer2">
      <td>
        <div id="paint">
          <canvas class="form-control" id="myCanvas"></canvas>
        </div>
        <script>
            var canvas = document.getElementById('myCanvas');
            var ctx = canvas.getContext('2d');
            
            var painting = document.getElementById('paint');
            var paint_style = getComputedStyle(painting);
            canvas.width = parseInt(paint_style.getPropertyValue('width'));
            canvas.height = parseInt(paint_style.getPropertyValue('height'));

            var mouse = {x: 0, y: 0};
            
            canvas.addEventListener('mousemove', function(e) {
              mouse.x = e.pageX - this.offsetLeft;
              mouse.y = e.pageY - this.offsetTop;
            }, false);

            ctx.lineWidth = 3;
            ctx.lineJoin = 'round';
            ctx.lineCap = 'round';
            ctx.strokeStyle = '#00CC99';
            
            canvas.addEventListener('mousedown', function(e) {
                ctx.beginPath();
                ctx.moveTo(mouse.x, mouse.y);
            
                canvas.addEventListener('mousemove', onPaint, false);
            }, false);
            
            canvas.addEventListener('mouseup', function() {
                canvas.removeEventListener('mousemove', onPaint, false);
            }, false);
            
            var onPaint = function() {
                ctx.lineTo(mouse.x, mouse.y);
                ctx.stroke();
            };
        </script>
      </td>
    </tr>
  </table>
    
@endsection
