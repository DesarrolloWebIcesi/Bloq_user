<?php

require_once('./PHPExcel_1.8.0_doc/Classes/PHPExcel/IOFactory.php');
$objExcel= PHPExcel_IOFactory::load('Sitios Universidad Icesi final.xlsx');
$objHoja= $objExcel->getActiveSheet()->toArray(null,true,true,true);
echo "<table border='1'>";
$contador=1;
foreach($objHoja as $iIndice => $objCelda){
    $url=utf8_decode($objCelda['B']);
    $url= explode('/', $url);
    $url[2]='192.168.220.28';
    $url=  implode("/", $url);
    echo'
        <tr>
            <td>'.$contador.' </td>
            <td>'.utf8_decode($objCelda['A']).'</td>
            <td>'.$url.'</td>    
        
        ';
    $url=  explode("/", $url);
    $dir="../../../";
    for($i=3; $i<count($url);$i++){
        
        $dir.=$url[$i]."/";
    }
    $dir.='configuration.php';
    $dir=  str_replace('//', '/', $dir);
   // $file=  file($url.'/configuration.php');
   // print_r($file);
    //include_once($dir);
    
    $file= file($dir);
    
    $bd=  explode("'", $file[17]);
    if(isset($bd[1])):
        $bd=$bd[1];
    else:
        $bd='BD Inaccesibe';
    endif;
    
    if(isset($file[17])):
    echo '
        <td>
        '.$bd.'
        </td>
        </tr>
        ';
    else:
        echo '
        <td>
        Sitio inaccesible
        </td>
        </tr>
        ';
    endif;
    $contador++;
    
}




echo '</table>';

?>
