<?php

/**
 * @author azaejae
 * @copyright 2013
 */

$satu=array('nomor'=>'085693881843','text'=>'tes inbox');
$satu=array('nomor'=>'089676875335','text'=>'berhasil');
//echo json_encode($satu);
echo "{\"hasil\":[";
for($i=1;$i<=sizeof($satu);$i++){
    print_r(json_encode($satu));
    if(($i+1)==sizeof($satu)){
        echo",";
    }
}
echo "]}";
?>