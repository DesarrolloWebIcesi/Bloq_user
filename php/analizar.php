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
            <?php include '../config/config.php'?>
            <?php $conex = @mysql_connect($server_joomla, $username_joomla,$password_joomla) or die('error al intentar conectarse a la base de Datos'); ?>
            <?php $db_lists = mysql_list_dbs($conex) ?>
            <?php $contador = 0 ?>
            <?php while ($row = mysql_fetch_object($db_lists)): ?>

                <?php $prefijo = NULL ?>
                <?php $dbname = $row->Database ?>
                <?php $prefix = substr($dbname, 0, 6) ?>
                <?php if ($prefix == "joomla" || $prefix == "jommla"): ?>
                                                              <!--<input  type="checkbox" name="bases_datos[]" value="<?php print $dbname ?>" checked> <?php print $dbname ?><br>-->
                    <?php $bd = @mysql_select_db($dbname, $conex) or die('error conexión a ' . $dbname); ?>
                    <?php $tables_query = "SHOW TABLES FROM " . $row->Database ?>
                    <?php $result_tables = mysql_query($tables_query, $conex) ?>
                    <?php while ($fila = mysql_fetch_row($result_tables)): ?>
                       
                        <?php $name_table = explode("_", $fila[0]) ?>
                        <?php $users = array_pop($name_table) ?>
                        <?php if ($users == 'users'): ?>
                            <?php $prefijo[$contador] = implode("_", $name_table) ?>
                            <?php $contador++ ?>
                        <?php endif ?>
                    <?php endwhile ?>
                    <?php $contador = 0 ?>
                    <?php if (isset($_GET['identificacion'])): ?>
                        <?php $name_sub = "Bloquear Usuario" ?>
                        <?php foreach ($prefijo as $prefijo): ?>
                            
                            <?php $query = "SELECT * FROM " . $prefijo . "_users WHERE username='" . $username . "'" ?> 
                            <?php $result = mysql_query($query, $conex) ?>
                
                            <?php if (mysql_num_rows($result) > 0): ?> 

                                <?php //$query_title = "SELECT metatitle FROM " . $prefijo . "_sh404sef_metas" ?>
                                <?php //$result_title = mysql_query($query_title, $conex) ?>
                                <!-- //////////////////////////////////////////////////////////////////////////////////////////////// -->
                                <?php $objHoja = file('../archivo.txt'); ?> 
                                  
                                <?php foreach ($objHoja as $iIndice => $objCelda): ?>
                                
                                    <?php $objCelda = explode('&&', $objCelda) ?>    
                                    <?php $bd = $objCelda[1] ?>
                                
                                    <?php if ($dbname == $bd): ?>
                                        <?php $name = $objCelda[2] ?>
                                        <?php if (isset($name)): ?>
                                            <tr>
                                                <td> <input type="checkbox" name="paginas[]" value="<?php print $dbname . '/' . $prefijo . '_users' ?>" checked></td> <td> <?php print $name . "</td><td>" . $dbname . " </td> <td>" . $prefijo . "_users </td>" ?>
                                            </tr>
                                        <?php else: ?>
                                            <tr>
                                                <td> <input type="checkbox" name="paginas[]" value="<?php print $dbname . '/' . $prefijo . '_users' ?>" checked></td> <td> <?php print "BD INUTILIZABLE </td><td>" . $dbname . " </td> <td>" . $prefijo . "_users </td>" ?>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endif ?>
                                <?php endforeach; ?>
                                <!-- //////////////////////////////////////////////////////////////////////////////////////////////// -->
                            <?php endif ?>
                        <?php endforeach ?>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endwhile; ?>
        </table>
    </body>
</html>