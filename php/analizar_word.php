<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="js/ajax.js"></script>
        <link rel="stylesheet" href='css/estilos.css'>
        <link rel="stylesheet" href='css/style.css'>
        <link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
        <title></title>
    </head>
    <body>
        <?php if (isset($_GET['identificacion'])): ?>
            <?php $username = $_GET['identificacion']; ?>
        <?php else: ?>
            <?php $username = "" ?>   
        <?php endif ?>
        <table id="table_res" border="1">
            <?php if (isset($_GET['identificacion'])): ?>
                <tr>
                    <td>
                        Seleccionar
                    </td>
                    <td>
                        Nombre del Sitio
                    </td>
                    <td>
                        Base De Datos
                    </td>
                    <td>
                        Tabla
                    </td>
                </tr>
            <?php endif ?>
                <?php include '../config/config.php' ?>
            <?php $conex = @mysql_connect($server_word,$username_word,$password_word) or die('error al intentar conectarse a la base de Datos'); ?>
            <?php $db_lists = mysql_list_dbs($conex) ?>
            <?php while ($row = mysql_fetch_object($db_lists)): ?>
                <?php $dbname = $row->Database ?>
                <?php $prefix = substr($dbname, 0, 9) ?>
                <?php if ($prefix == "wordpress"): ?>
                    <?php $bd = @mysql_select_db($dbname, $conex) or die('error conexión a ' . $dbname); ?>
                    <?php $tables_query = "SHOW TABLES FROM " . $row->Database ?>
                    <?php $result_tables = mysql_query($tables_query, $conex) ?>
                    <?php while ($fila = mysql_fetch_row($result_tables)): ?>

                        <?php $name_table = explode("_", $fila[0]) ?>
                        <?php trim($users = array_pop($name_table)) ?>
                        <?php if ($users == 'options'):?> 
                            <?php $query="SELECT option_value FROM ".$fila[0]." WHERE option_name='blogname'"?>
                            <?php $result = mysql_query($query, $conex) ?>
                             <?php if ($row2 = mysql_fetch_object($result)): ?>
                                <?php $name=  utf8_encode($row2->option_value) ?>
                             <?php endif ?>
                             <?php $query="SELECT option_value FROM ".$fila[0]." WHERE option_name='siteurl'"?>
                            <?php $result = mysql_query($query, $conex) ?>
                             <?php if ($row2 = mysql_fetch_object($result)): ?>
                                <?php $url=  utf8_encode($row2->option_value) ?>
                             <?php endif ?>
                        <?php endif ?>
                        <?php if ($users == 'users'): ?>
                            <?php $name_table = $fila[0] ?>
                            <?php $query = "SELECT * FROM " . $name_table . " WHERE user_login='" . $username . "'" ?>
                            <?php $name_table=  str_replace($users, "usermeta", $name_table)?>
                            <?php $result = mysql_query($query, $conex) ?>
                            <?php if ($row2 = mysql_fetch_object($result)): ?> 
                               
                                <?php if($name==""):?>
                                <tr>
                                    <td> <input type="checkbox" name="paginas[]" value="<?php print $dbname . '$' . $name_table.'$'.$row2->ID.'$'.$url ?>" checked></td> <td> <?php print "Nombre del sitio no configurado</td><td>" . $dbname . " </td> <td>" . $name_table . "</td>" ?>
                                </tr>
                                <?php else: ?>
                                <tr>
                                    <td> <input type="checkbox" name="paginas[]" value="<?php print $dbname . '$' . $name_table.'$'.$row2->ID.'$'.$url ?>" checked></td> <td> <?php print $name . "</td><td>" . $dbname . " </td> <td>" . $name_table . "</td>" ?>
                                </tr>
                                <?php endif ?>
                            <?php endif ?>
                       
                               
                        <?php endif ?>
                    <?php endwhile ?>
                <?php endif ?>
            <?php endwhile ?>
        </table>
    </body>
</html>