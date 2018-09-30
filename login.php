<?php
  session_start();
  
    $userid = $_GET['id'];
   
    if($userid== 500 ||  $userid == 92 || $userid == 70){
             $_SESSION['id'] = $userid;
             header('Location: admin.php');
    }else{
             header('Location: logout.php');
    }
    
?>