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
            <?php $conex = @mysql_connect($server_encuesta,$username_encuesta,$password_encuesta) or die('error al intentar conectarse a la base de Datos'); ?>
            <?php $bd = @mysql_select_db('phpesp3', $conex) or die('error conexión a la BD: phpesp3'); ?> 
            <?php foreach ($paginas as $pagina): ?>
                <?php $query = "UPDATE phpesp_survey SET owner='adminencuesta' WHERE id='" . $pagina . "'" ?><br>
                <?php $result = mysql_query($query, $conex) ?>
                <?php if ($result): ?>
                    <?php print '<span style="color:#4b8ec3">la encuesta # '.$pagina.' fue trasladada al usuario adminencuesta<br></span>'; ?>
                <?php else: ?>             
                <?php endif ?>
            <?php endforeach ?>
        <?php endif ?>
    </body>
</html>