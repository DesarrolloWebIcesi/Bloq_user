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
        <?php if(isset($_GET['identificacion'])):?>
            <?php $identificacion=$_GET['identificacion']; ?>
            <?php $dbname='servicios_adm' ?>
       <center> <table id="table_res" border="1">
            <tr>
                <td> Cedula </td>
                <td> Usuario </td>
                <td> Activado </td>
            </tr>
       <?php include '../config/config.php'?>
            <?php $conex = @mysql_connect($server_sgs, $username_sgs,$password_sgs) or die('error al intentar conectarse a la base de Datos'); ?>
        <?php $bd = @mysql_select_db($dbname, $conex) or die('error conexión a ' . $dbname); ?>
        <?php $query="SELECT username, realname, enabled FROM mantis_user_table WHERE username='".$identificacion."'" ?>
        <?php $result= mysql_query($query, $conex);?> 
            <?php if($result_array=mysql_fetch_array($result)): ?>
            <tr>
                <td><?php print utf8_encode($result_array['username']) ?></td>
                <td><?php print utf8_encode($result_array['realname']) ?></td>
                <td>
                    <?php if($result_array['enabled']==0): ?>
                    <?php print "<input type='checkbox' id='enabled' onclick='change_user_sgs()'>"?>
                    <?php else: ?>
                    <?php print "<input type='checkbox' id='enabled' checked onclick='change_user_sgs()'>"?>
                    <?php endif ?>    
                </td>
            </tr>
            <?php endif ?>
        </table>
           <div id="response2"></div>
       </center>
        <?php endif;?>
    </body>

</html>