<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=9" />
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <script src="js/ajax.js"></script>
        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/jquery-ui-1.10.4.min.js"></script>
        <script src="js/login.js"></script>
        <link rel="stylesheet" href='css/estilos.css'>
        <link rel="stylesheet" href='css/style.css'>
        <link rel="stylesheet" href="css/jquery-ui.min.css">
        <link rel="stylesheet" href="css/login.css"> 
        <link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
        <link href="img/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
        <title>Bloqueo de Usuarios de los sitios ICESI - Universidad Icesi, Cali - Colombia</title>
    </head>
    <body>
        <div id='content'>
            <article>

                <?php include_once ('view/header.php'); ?>
                <br><p id="text-form" style="text-align:center"> Bienvenido al sistema de bloqueo de usuarios de los sitios de la universidad Icesi, por favor ingrese su documento de identidad y contraseña de usuario único  para ingresar al sistema.
                </p><br>

                <section id="content_form">
                    <form action="" id="formlogin">
                        <h1>Iniciar sesi&oacuten</h1>
                        <div>
                            <!--<label for="cedula">Cedula</label> -->
                            <input type="text" placeholder="Cédula"  id="cedula" name="cedula" class="required" />
                        </div>
                        <div>
                            <!--<label>ContraseÃ±a</label>-->
                            <input type="password" placeholder="Contraseña"  id="password" class="required" />
                        </div>
                        <div>
                            <input type="button" id="button-login" value="Ingresar" />
                        </div>
                        <script type="text/javascript" src="js/placeholders.jquery.min.js"></script>
                    </form><!-- form -->
                </section><!-- content -->
                <br><p id="info-contraseña"> Si olvidó su contraseña o nunca ha ingresado,  <a href="https://iden.icesi.edu.co/sso/jsp/newpassword.jsp" title="solicite una nueva contraseña ">solicite una nueva contraseña pulsando aquí­</a>. </p>
                <p id="info-contraseña"><a href="http://www.icesi.edu.co/manuales/manual_formulario_reservas.pdf" target="_blamk"> Manual de usuario </a></p>
                <div align="center" style="margin-top:50px;">
                    <p id="text-form">Navegadores Recomendados ultimas versiones</p>
                    <p><img src="img/chrome.png" title="Google Chrome"/> <img src="img/firefox.png" title="Firefox"/> <img src="img/opera.png" title="Opera"/> <img src="img/Internet-explorer.png" title="Internet Explorer"/></p>
                </div>              
                <?php include_once ('view/footer.php'); ?>
        </div> 

        <div id="dialog-message" style="display:none;">
            <span class="ui-icon" style="float:left; margin:0 7px 0 0;" id="dialog-icon"></span>
            <span id="text-message"></span>
        </div> 
    </article>

</body>
</html>
