<?php

/**
 * @author azaejae
 * @copyright 2013
 */

if(isset($_GET['getSendStatus'])){
    $getCallback=$_GET['getSendStatus'];
if((!empty($_GET['text']))&&(!empty($_GET['gid']))){
    include("config/koneksi.php");
    $gid=$_GET['gid'];
    $mysqli=new mysqli($server_db,$user_db,$pass_db,$select_db);
    $getNum=$mysqli->query("SELECT * FROM pbk WHERE  GroupID=".$gid."");
   // $getNum->bind_param('s',$gid);
    //$getNum->execute();
    $x=1;
    while($row=$getNum->fetch_assoc()){
        $num[$x]=$row['Number'];
        $x++;
    }
    $text=$_GET['text'];
    for($i=1;$i<$x;$i++){
        //echo $num[$i]."</br>";
        if(!($send=$mysqli->prepare("INSERT INTO outbox(DestinationNumber,TextDecoded,CreatorID) VALUES(?,?,?)"))){
             echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
            
         }
         if(!$send->bind_param('sss',$num[$i],$text,$gid)){
            echo "Binding parameters failed: (" . $send->errno . ") " . $send->error;
   
          }
          if(!$send->execute()){
                  echo "Execute failed: (" . $send->errno . ") " . $send->error;
             }
}
$send->close();
$hasil=array("status"=>"sukses");
   $hasil=json_encode($hasil);
   echo $getCallback."(".$hasil.")";
}else{
    $hasil=array("status"=>"gagal");
    $hasil=json_encode($hasil);
    echo $getCallback."(".$hasil.")";
}

}
?>