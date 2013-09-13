<?php

/**
 * @author azaejae
 * @copyright 2013
 */

if(isset($_GET['getSendStatus'])){
    $getCallback=$_GET['getSendStatus'];
if((!empty($_GET['number']))&&(!empty($_GET['text']))&&(!empty($_GET['uid']))){
    $num=$_GET['number'];
    $text=$_GET['text'];
    $cid=$_GET['uid'];
   include("config/koneksi.php");
   $mysqli=new mysqli($server_db,$user_db,$pass_db,$select_db);
   if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
   if(!($send=$mysqli->prepare("INSERT INTO outbox(DestinationNumber,TextDecoded,CreatorID) VALUES(?,?,?)"))){
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
   }
   if(!$send->bind_param('sss',$num,$text,$cid)){
    echo "Binding parameters failed: (" . $send->errno . ") " . $send->error;
   }
   if(!$send->execute()){
     echo "Execute failed: (" . $send->errno . ") " . $send->error;
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