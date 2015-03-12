<?php

session_start();

/*
 * Script loginuser
 *
 * script que se encarga de valdar que el usuario existe dentro del directorio activo con los datos proporcionados en el formulario de login
 * @author	Christian David Criollo <cdcriollo@icesi.edu.co>
 * @since	2014-06-13
 */


//include_once("../class/AutenticaLdap.php");
//include_once("../class/usuario.php");
//$autentica = new AutenticaLdap();
$log = $_POST['cedula'];
$pass = $_POST['password'];

if ($log == 'prueba' && $pass == 'prueba'):
    $aut = 1;
else:
    $aut = 0;
endif;
//$aut = $autentica->autenticarUsuario($log,$pass);
switch ($aut) {
    case 1:
        $_SESSION['cedula']="1116252516";
        $_SESSION['nombre_completo'] = 'Usuario Prueba';
        $_SESSION['correo_electronico'] = 'prueba@hotmail.com';
        $_SESSION['extension'] = '232';
        $_SESSION['telefono'] = '0000-0000';
        $_SESSION['celular'] = '0000000000';
        $_SESSION['codigo'] = '0000';
        $_SESSION['dn'] = '555555';
        $respuesta= array('error'=> $aut);
        $_SESSION["time"] = time();
        echo json_encode($respuesta);
        break;
    case 0:
        $_SESSION['cedula']="";
        $respuesta = array('error' => $aut);
        echo json_encode($respuesta);
        break;
    default:
        $_SESSION['cedula']="";
        $respuesta = array('error' => $aut);
        echo json_encode($respuesta);
        break;
}
?>
