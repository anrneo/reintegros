<?php 
session_start();
if(!isset($_SESSION['id'])){
  header('Location: logout.php');
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
   
    <style> 
#filtrar {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('https://www.w3schools.com/howto/searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

#filtrar:focus {
    width: 95%;
}

/* Style buttons */

</style> 
</head>

<body>
<!-- Grey with black text -->
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="/reintegros/admin.php">Administracion</a>
    </li>
    </li>
    <li class="nav-item active" >
      <a class="nav-link" href="adminaprobados.php">Aprobados</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="adminNOaproba.php">No aprobados</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="admintodos.php">Total</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="indicadores.php">Indicadores</a>
    </li>
    <li class="nav-item">
    <div class="dropdown">
  <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Descargas
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="formdesc.php?tipo=1">Cuentas a Inscribir</a>
    <a class="dropdown-item" href="formdesc.php?tipo=2">Pago Reintegros</a>
    <a class="dropdown-item" href="descexcel.php">Todo en Excel</a>
    
  </div>
</div>
    
    <?php
                if($_SESSION['id']==500){
                  echo '<li class="nav-item">
                          <a class="nav-link" href="#">Carlos Villa</a>
                        </li>';
                }elseif($_SESSION['id']==92){
                   echo '<li class="nav-item">
                            <a class="nav-link" href="#">Alexander Barrera</a>
                          </li>';
                }elseif($_SESSION['id']==70){
                  echo '<li class="nav-item">
                           <a class="nav-link" href="#">Luisa Alzate</a>
                         </li>';
               }
              ?>
   <li class="nav-item">
      <a class="nav-link" href="logout.php">Cerrar sesión</a>
    </li>

  </ul>
</nav>
<br>
