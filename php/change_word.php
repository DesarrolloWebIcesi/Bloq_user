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
            <?php $paginas = explode(",", $_GET['paginas']) ?>
            <?php $username = $_GET['identificacion'] ?>
             <?php include '../config/config.php' ?>
            <?php $conex = @mysql_connect($server_word,$username_word,$password_word) or die('error al intentar conectarse a la base de Datos'); ?>

            <?php foreach ($paginas as $pagina): ?>
                <?php $dates = explode("$", $pagina) ?>
                <?php $bd = @mysql_select_db($dates[0], $conex) or die('error conexión a ' . $dates[0]); ?>
                <?php $query = "UPDATE " . $dates[1] . " SET  meta_value=0 WHERE meta_key='wp_user_level' AND user_id='" .$dates[2] . "'" ?>
                <?php $result = mysql_query($query, $conex) ?>
                <?php $query2 = "UPDATE " . $dates[1] . " SET  meta_value='a:1:{s:10:!\"subscriber\";b:1;}' WHERE meta_key='wp_capabilities' AND user_id='" . $dates[2]. "'" ?>
                <?php $result = mysql_query($query2, $conex) ?>
                    <?php $dates[3].="/wp-admin" ?>
                    <?php if ($result): ?>
                    <?php print '<span style="color:red">url: <a href="http://' . $dates[3] . '" target="_new">' . $dates[3] . '</a><br></span>'; ?>
                    <?php if (mysql_affected_rows($result) != -1): ?>
                        <?php print '<span style="color:#4b8ec3">el usuario ' . $username . ' Se bloqueo de la base de datos: ' . $dates[0] . '<br></span>'; ?>
                    <?php else: ?>
                        <?php print '<span style="color:red">el usuario ' . $username . ' presento un error en la BD: ' . $dates[0] . '<br></span>' ?>
                    <?php endif ?>
                <?php else: ?>
                    <?php print '<span style="color:red"> Se presento un error al bloquear el usuario en la tabla ' . $dates[1] . ' de la BD: ' . $dates[0] . '<br></span>' ?>
                <?php endif ?>
                <?php //$result2 = mysql_query($query, $conex) ?>
            <?php endforeach ?>
        <?php endif; ?>
    </body>
</html>