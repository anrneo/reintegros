<?php 
 session_start(); 
 if(isset($_SESSION['id'])){
 session_unset();
 session_destroy(); 
 }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Reintegros Sumimedical</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">       

    <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/popper.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
   

</head>

<body>
<!-- Grey with black text -->
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="#">Modulo Reintegros solo para personal autorizado</a>
    </li>
    
  </ul>
</nav>
<br>
<div class="container-fluid">
    <div class="card">
            <img src="assets/images/reintegro.PNG" alt="">
    </div>
</div>