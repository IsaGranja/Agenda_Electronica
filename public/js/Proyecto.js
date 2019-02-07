var inputs = "input[maxlength], textarea[maxlength]";
var mousePressed = false;
var lastX, lastY;
var ctx;
var canvas;
var contL;
var dataURL;
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
                este.removeClass().addClass("borderojo");
                este.val(text.substring(0, maxlength));
                e.preventDefault();
            }
            else if (texto.length < maxlength) {
                este.removeClass().addClass("form-control");
            }   
        }   
    });
    function InitThis() {
        canvas = document.getElementById("myCanvas");
        ctx = document.getElementById('myCanvas').getContext("2d");
        dataURL = canvas.toDataURL()             
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
   /*
    function LoadImage() {
        if (canvas != null) {
            if (canvas.getContext) {
                var img = new Image();
                img.src = "{{ url('img/beagle.jpg') }}";  //moved up for cosmetics
                img.onload = function () {
                    canvas.drawImage(img, 15, 15, 620, 475);                    
                }                    
            }
        }
    }*/

    function LoadImage() {
        if (canvas != null) {
            if (canvas.getContext) {
                var img = new Image();
                img.src = "{{ url('img/beagle.jpg') }}";  //moved up for cosmetics
                img.onload = function () {
                    canvas.drawImage(img, 15, 15, 620, 475);                    
                }                    
            }
        }
    }

    function convertImgToBase64(id, outputFormat){
        var canvas = document.createElement(id);
        var imageDataURL = canvas.toDataURL(outputFormat || 'image/png');
        
        return imageDataURL;
      }

      function convertBase64toImage(id, image64) {
        var canvas = document.createElement(id);
        var context = canvas.getContext('2d');
        
        var baseImage = new Image();
        
        baseImage.onload() = function() {
          context.drawImage(baseImage, 0, 0);
        };
        
        baseImage.src = image64;
      }
      //////
      function download() {
        var canvas = document.getElementById("myCanvas");
        var link = document.getElementById("downloadLnk");
        var dt = canvas.toDataURL();
        this.href = dt;
        link.style.visibility = "visible";
        downloadLnk.addEventListener('click', download, false);                          
    };
    function hide(){
      var link = document.getElementById("downloadLnk");
      link.style.visibility = "hidden";
    };


      