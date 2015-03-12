<?php

/*
* Script cerrar_sesion
*
* Script encargado de cerrar la sesión del usuario
* @author	Christian David Criollo <cdcriollo@icesi.edu.co>
* @since	2014-06-16
*/

session_start();
 
 // Se destruye la sesión
 session_destroy();
 session_unset('tipo');
 session_unset('nombre_completo');
 session_unset('correo_electronico');
 session_unset('codigo');
 session_unset('telefono');
 session_unset('celular');
 session_unset('dn');
 session_unset('extension');
 session_unset('cedula');
 header('location: ../index.php');
 exit();
?>