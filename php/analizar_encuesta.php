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
            <?php $resultado = $_GET['identificacion'] ?>
        <?php endif ?>
        <?php include '../config/config.php'?>
            <?php $conex = @mysql_connect($server_encuesta, $username_encuesta,$password_encuesta) or die('error al intentar conectarse a la base de Datos'); ?>
        <table id="table_res" border="1">
            <?php if (isset($_GET['identificacion'])): ?>
                <tr>
                    <td>
                        Seleccionar
                    </td>
                    <td>
                        ID
                    </td>
                    <td>
                       Titulo
                    </td>
                    <td>
                        Nombre
                    </td>
                </tr>

            <?php endif ?>
            <?php $bd = @mysql_select_db('phpesp3', $conex) or die('error conexión a la BD: phpesp3'); ?>
            <?php $query = "SELECT id, name, title FROM phpesp_survey WHERE owner='" . $resultado . "' " ?>
            <?php $result_tables = mysql_query($query, $conex) ?>
            <?php while ($fila = mysql_fetch_object($result_tables)): ?>
               <?php $code=mb_detect_encoding($fila->title); ?>
                <?php if($code=='UTF-8'):?>
                <tr>
                    <td> <input type="checkbox" name="paginas[]" value="<?php print $fila->id?>" checked></td> <td> <?php print $fila->id . " </td> <td>" .utf8_decode($fila->title)  . "</td> <td>" . $fila->name . "</td>" ?>
                </tr>
                <?php else: ?>
                 <tr>
                    <td> <input type="checkbox" name="paginas[]" value="<?php print $fila->id?>" checked></td> <td> <?php print $fila->id . " </td> <td>" .$fila->title  . "</td> <td>" . $fila->name . "</td>" ?>
                </tr>
                <?php endif ?>
            <?php endwhile ?>
        </table>
    </body>
</html>