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
        
       
         <?php if (isset($_GET['paginas'])): ?>
            <?php $contador=0 ?>
           
            <?php $paginas = explode(",", $_GET['paginas']) ?>
            <?php $username = $_GET['identificacion'] ?>
           <?php include '../config/config.php'?>
            <?php $conex = @mysql_connect($server_joomla, $username_joomla,$password_joomla) or die('error al intentar conectarse a la base de Datos'); ?>         
            <?php foreach ($paginas as $pagina): ?>
                <?php $dates = explode("/", $pagina) ?>
                <?php $bd = @mysql_select_db($dates[0], $conex) or die('error conexión a ' . $dates[0]); ?>
                <?php $query = "UPDATE " . $dates[1] . " SET block=1 WHERE username='$username'" ?>
                <?php $result = mysql_query($query, $conex) ?>
                <?php require_once('../PHPExcel_1.8.0_doc/Classes/PHPExcel/IOFactory.php'); ?>
                <?php //$objExcel = PHPExcel_IOFactory::load('../Sitios Universidad Icesi final.xlsx'); ?>
                <?php //$objHoja = $objExcel->getActiveSheet()->toArray(null, true, true, true); ?>
                <?php $objHoja = file('../archivo.txt'); ?> 
                <?php foreach ($objHoja as $Indice => $objCelda): ?>
                    <?php $objCelda= explode('&&',$objCelda)?>
                    <?php $url = utf8_decode($objCelda[0]); ?>
                    <?php $url = explode('/', $url); ?>
                    <?php $url[2] = '192.168.220.28'; ?>
                    <?php $url = implode("/", $url); ?>
                    <?php $url = explode("/", $url); ?>
                    <?php $dir = "../../../../"; ?>
                    <?php for ($i = 3; $i < count($url); $i++): ?>
                        <?php if($i==count($url)-1): ?>
                        <?php $dir.=$url[$i]; ?>
                        <?php else: ?>
                        <?php $dir.=$url[$i] . "/"; ?>
                        <?php endif ?>
                    <?php endfor ?>
                   
                    <?php  $dir = str_replace('//', '/', $dir); ?>
                    <?php $dir=substr ($dir, 0, strlen($dir) - 1)?>
                    <?php $file = file($dir); ?>
                 
                    <?php $bd = $objCelda[1] ?>
                    <?php if(!isset($array[$bd])): ?>
                    <?php $array[$bd]=1?>
                    <?php endif ?>
                     <?php unset($url[count($url)-1]); ?>
                     <?php unset($url[0]) ?>
                     <?php unset($url[1]) ?>
                    <?php $url = implode("/", $url) ?>
                    <?php if (isset($bd)): ?>
                        <?php if ($dates[0] == $bd): ?>
                            <?php $contador++ ?>
                            <?php if($array[$bd]==$contador): ?>
                            <?php $urlF = $url . "/administrator"; ?>
                            <?php $array[$bd]+=1 ?>
                            <?php $contador=0 ?>
                            <?php break; ?>
                            <?php endif ?>
                        <?php else: ?>
                            <?php $urlF = 'Base de Datos que No se esta Utilizando'; ?>
                        <?php endif ?>
                    <?php endif  ?>
                <?php endforeach; ?>
                <?php if ($result): ?>
                    <?php print '<span style="color:red">url: <a href="http://' . $urlF . '" target="_new">http://' . $urlF . '</a><br></span>'; ?>
                    <?php if (mysql_affected_rows($result) != -1): ?>
                        <?php print '<span style="color:#4b8ec3">el usuario ' . $username . ' Se bloqueo de la base de datos: ' . $dates[0] . '<br></span>'; ?>
                    <?php else: ?>
                        <?php print '<span style="color:red">el usuario ' . $username . ' presento un error en la BD: ' . $dates[0] . '<br></span>' ?>
                    <?php endif ?>
                <?php else: ?>
                    <?php print '<span style="color:red"> Se presento un error al bloquear el usuario en la tabla ' . $dates[1] . ' de la BD: ' . $dates[0] . '<br></span>' ?>
                <?php endif ?>
                <?php $query = "SELECT id from " . $dates[1] . " where username='$username'" ?>
                <?php $result = mysql_query($query, $conex) ?>
                <?php if ($fila = mysql_fetch_object($result)): ?>
                    <?php $tables_query = "SHOW TABLES FROM " . $dates[0] ?>
                    <?php $result_tables = mysql_query($tables_query, $conex) ?>
                    <?php while ($row = mysql_fetch_row($result_tables)): ?>
                        <?php $name_table = explode("_", $row[0]) ?>
                        <?php $users = array_pop($name_table) ?>
                        <?php $usergroup = array_pop($name_table) ?>
                        <?php if ($usergroup == 'usergroup' && $users == 'map'): ?>
                            <?php $query = "UPDATE " . $row[0] . " SET group_id=2 WHERE user_id=$fila->id" ?>
                            <?php $result = mysql_query($query, $conex) ?>
                            <?php if ($result): ?>
                                <?php if (mysql_affected_rows($result) != -1): ?>
                                    <?php print '<span style="color:#4b8ec3"> el usuario ' . $username . ' Se puso en estado registrado en la tabla: ' . $row[0] . '<br></span>'; ?>
                                <?php else: ?>
                                    <?php print '<span style="color:red"> el usuario ' . $username . ' Se presento un error al pasar a estado registrado en la tabla: ' . $row[0] . '<br></span>'; ?>
                                <?php endif ?>
                            <?php else: ?>
                                <?php '<span style="color:red">La actualización a estado registrado genero un error en la tabla ' . $row[0] . ' de la base de datos ' . $dates[0] . '<br></span>' ?>
                            <?php endif ?>
                        <?php endif ?>
                    <?php endwhile ?>
                <?php endif ?>
            <?php endforeach  ?>
        <?php endif  ?>

    </body>
</html>