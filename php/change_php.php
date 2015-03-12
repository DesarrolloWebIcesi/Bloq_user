<?php if ((isset($_GET['identificacion'])) && isset($_GET('enabled'))):?>
<?php $identificacion=$_GET['identificacion']; ?>
<?php $enabled=$_GET('enabled');?>
<?php $dbname= 'servicios_adm'?>
<?php $conex= @mysql_connect('192.168.220.30', 'servicios', 'MfePayDghK3') or die('error al intentar conectarse a la base de Datos'); ?>
<?php $bd = @mysql_select_db($dbname, $conex) or die('error conexión a ' . $dbname); ?>
<?php print $query="UPDATE mantis_user_table SET enabled='".$enabled."' WHERE username='".$identificacion."'" ?>

    <?php endif; ?>