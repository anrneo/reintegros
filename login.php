<?php
include 'array.php';
  session_start();
  
    $userid = $_GET['id'];
   
    if($userid == 500 ||  $userid == 92 || $userid == 70 || $userid == 284){
             $_SESSION['id'] = $userid;
             $_SESSION['name'] = $users[$_GET['id']];
             header('Location: admin.php');
    }else{
             header('Location: logout.php');
    }
    
?>