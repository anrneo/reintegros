<?php
$email = $_POST["email"];    

    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "comunicados@redvitalut.com";
    $to = $email;
    $subject = "Validacion mail";
    $message = $email;
    $headers = "From:" . $from;
    if(mail($to,$subject,$message, $headers)){
        echo 'ok';
    }else{
        echo 'error';
    }
    