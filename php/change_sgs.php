
<?php if (isset($_GET['identificacion'])): ?>
    <?php $identificacion = $_GET['identificacion']; ?>
    <?php $enabled = $_GET['enabled']; ?>
    <?php $dbname = 'servicios_adm' ?>
    <?php include '../config/config.php'?>
    <?php $conex = @mysql_connect($server_sgs,$username_sgs,$password_sgs) or die('error al intentar conectarse a la base de Datos'); ?>
    <?php $bd = @mysql_select_db($dbname, $conex) or die('error conexión a ' . $dbname); ?>
    <?php $query = "UPDATE mantis_user_table SET enabled='" . $enabled . "' WHERE username='" . $identificacion . "'" ?>
    <?php $result = mysql_query($query, $conex); ?>
    <?php if ($result): ?>
        <?php if ($enabled == 0): ?>
            <?php print '<span style="font-size: 9pt; color:  #00aff0; ">El usuario con el numero de identificación ' . $identificacion . ' se bloqueo del sistema SGS</span>'; ?>
        <?php else: ?>
            <?php print '<span style="font-size:9pt; color: rgb(0, 97, 170);  ">El usuario con el numero de identificación ' . $identificacion . ' se activo del sistema SGS</span>'; ?>
        <?php endif; ?>
    <?php else: ?>
        <?php print '<span style="font-size: 9pt; color: red">Error al actualizar la información en la base de dartos</span>'; ?>
    <?php endif ?>
<?php endif; ?>