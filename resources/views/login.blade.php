<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="{{ URL::asset('/') }}" target="_top">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('css/glyphicon.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('css/Ayudantes_AgendaElectronica-style.css') }}" />
    <script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('js/jquery.validate.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('js/jquery-3.3.1.slim.min.js') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ url('js/popper.min.js') }}" />
</head>
<body class="col-12 bg-dark">
    {{-- https://www.youtube.com/channel/UCnQ2OeYdBZpe4mBgj_nOVAg/videos --}}
    {{-- https://www.youtube.com/watch?v=pZAPePev0wM --}}
        @if(isset(Auth::user()->email))
            <script>window.location="/main/successlogin";</script>
        @endif
        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert block">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        @if(count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
          </div>  
        @endif
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg col-12 navbar-light colorPUCE">
        <a class="navbar-brand" href='http://www.puce.edu.ec'><img class="logo" height='50px' src="{{ url('img/puceLogo.jpg') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        </nav>
    {{-- Body --}}
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-4 offset-lg-4" id="alert">
                <div class="alert alert-success">
                    <center><strong id="result">Inicio de Sesión Exitoso</strong>
                </div>                
            </div>
        </div>
        {{-- Login Form --}}
        <div class="row">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="login-box">
                <h2 class="text-center mt-2">Iniciar Sesión</h2>
                <form method="post" action="{{ url('/main/checklogin') }}" role="form" class="p-2" id="login-frm" accept-charset="utf-8">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email:" required minlength="5">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Contraseña:" required minlength="3">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <a href="#" id="forgot-btn" class="float-right">Olvidó la Contraseña?</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" id="login" value="Iniciar Sesión" class="btn btn-primary btn-block">
                    </div>
                </form>
            </div>
        </div>
        {{-- Forgot Password Form --}}
        <div class="row">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="forgot-box">
                <h2 class="text-center mt-2">Resetear Contraseña</h2>
                <form action="" method="post" role="form" class="p-2" id="forgot-frm" accept-charset="utf-8">
                    <div class="form-group">
                        <small class="text-muted">
                            Para resetear la contraseña, ingrese el email con el que se registró y nosotros 
                            le envíaremos instrucciones de reseteo a su email.
                        </small>
                    </div>
                    <div class="form-group">
                        <input type="email" name="femail" class="form-control" placeholder="E-Mail" required
                        >
                    </div>
                    <div class="form-group">
                        <input type="submit" name="forgot" id="forgot" value="Resetear" class="btn btn-primary btn-block"
                        >
                    </div>
                    <div class="form-group text-center">
                        <a href="#" id="back-btn">Regresar</a>
                    </div>
                </form>
            </div>
        </div>
    </div> 
    {{-- Footer --}}
    <footer id="footer1" class="col-12 colorPUCE">
        <div class="card-body text-center">
			<p class="micro legible center mb-0">LABORATORIO DE TECNOLOGÍAS DE LA INFORMACIÓN - Facultad de Ingeniería - Escuela de Sistemas
            <br> Teléfono: (+593)  ext.  /  /  - Correo electrónico: @puce.edu.ec</p>
    </footer>
    <script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>    
    <script type="text/javascript">
        $(document).ready(function(){            
            $('#forgot-btn').click(function(){
                $('#login-box').hide();
                $('#forgot-box').show();                 
            });
            $('#back-btn').click(function(){
                $('#forgot-box').hide();
                $('#login-box').show();                 
            });
            $('#login-frm').validate();
            $('#register-frm').validate({
                rules:{
                    cpass:{
                        equalTo:"#pass",
                    }
                }
            });
            $('#forgot-frm').validate();
            /*$('#forgot').click(function(e){
                if(document.getElementById('forgot-frm').checkValidity()){
                    e.preventDefault();
                    $.ajax({
                        url:'/main',
                        method:'post',
                        data:$("#forgot-frm").serialize()+"&/main=register",
                        success:function(response){*/
                            <?php
                            /*$to = "josesalgado7@hotmail.com";
                            $subject = "Lolsito";
                            $txt = "Hello world!";
                            $headers = "From: webmaster@example.com" . "\r\n" .
                            "CC: somebodyelse@example.com";
                            mail($to,$subject,$txt,$headers);*/
                            ?>
                        /*}
                    });
                }
                return true;
            });*/

        }); 
    </script>
</body>
</html>