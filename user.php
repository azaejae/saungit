<?php
    if((isset($_POST['user']))&&(isset($_POST['pass']))){
        
		$user=$_POST['user'];
        $pass=$_POST['pass'];
        $mysqli=new mysqli("localhost","root","rahasia","saungit");
        $kueri="SELECT * FROM user WHERE username='".$user."'AND password='".$pass."'";
        $hasil=$mysqli->query($kueri);
        
        if($hasil->num_rows==1){
            //echo "sukses";
            
        echo json_encode(array('status'=>'sukses'));
        
        exit;
        }else{
          echo json_encode(array("status"=>"gagal"));
        exit;
        }
        }else{
            echo json_encode(array("status"=>"gagal"));
        exit;
        }
        
        

?>