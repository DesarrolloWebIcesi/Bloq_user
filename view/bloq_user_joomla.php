<?php
session_start();
include_once('../config/configuration.php');
echo "<script> console.log(" . $_SESSION['cedula'] . ")</script>";
if ($_SESSION['cedula'] == "") {
    echo "<script language='javaScript'> location.href='../index.php' </script>";
} else {
    if (time() - $_SESSION['time'] < $time_sesion) {
        // No se realiza ninguna acciÃ³n
    } else {
        header("location: ../view/cerrar_sesion.php");
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=9" />
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <script src="../js/ajax.js"></script>
        <link rel="stylesheet" href='../css/estilos.css'>
        <link rel="stylesheet" href='../css/style.css'>
        <link href="img/favicon.ico" rel="shortcut icon" type="../image/vnd.microsoft.icon" />
        <link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
        <title>Bloqueo de Usuarios de los sitios ICESI - Universidad Icesi, Cali - Colombia</title>
    </head>
    <body>
        <div id='content'>
             <article>
            <header>
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="100%" bgcolor="#0260aa"><div id="cabecera" align="right"><img src="../img/cabezote.jpg" width="970" height="108"></div></td>
                    </tr>

                </table> 
            </header>
           
            <div id='navegacion'>
                <div id='bar_joom' onclick='abrir_joom()' style="background: #0061AA;"><span id="letter_joomla">1. Joomla</span></div> 
                <div id='bar_sgs' onclick='abrir_sgs()' style="background: #eee;"><span id="letter_sgs">2. SGS</span></div>
                <div id='bar_sgc' onclick='abrir_sgc()' style="background: #eee;"><span id="letter_sgc">3. SGC</span></div>
                <div id='bar_wordpress' onclick='abrir_wordpress()' style="background: #eee;"><span id="letter_wordpress">4. Wordpress</span></div>
                <div id='bar_encuesta' onclick='abrir_encuesta()' style="background: #eee;"><span id="letter_encuesta">5. Encuesta</span></div>
            </div>
            
                <div id='inf_user'>
<?php session_start(); ?>
                    <img src="../img/user.png"><br>
<?php print $_SESSION['nombre_completo'] ?><br>
<?php print $_SESSION['correo_electronico'] ?> <br>
                    <?php print $_SESSION['cedula'] ?><br>
                    Actualice sus datos <a href="https://talentoicesi.icesi.edu.co/sse_generico/generico_login.jsp" target="_blank" style="text-decoration:none;">aquí</a><br>
                    <img src="../img/logout.png" style="left:25px; position: absolute;"><a style="text-decoration:none" href="cerrar_sesion.php">Cerrar sesión</a>
                </div>
                <div id='response'>
                    <?php include 'bloq_joomla.php'; ?>
                </div>
                <footer>
                    <div id="footer" class="footer2">
                        <a target="_blank" title="Universidad Icesi" href="http://www.icesi.edu.co">Universidad Icesi</a>, Calle 18 No. 122-135, Cali-Colombia | Tel&eacutefono:555 2334 | Fax: 555 1441<br />
                        Copyright &copy; <?php echo date('Y'); ?><a target="_blank" title="Pol�tica de privacidad" href="http://www.icesi.edu.co/politica_privacidad.php"> Política de privacidad</a>
                    </div>
                </footer>
        </div> 
    </article>

</body>
</html>




