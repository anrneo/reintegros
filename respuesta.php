
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
<?php
include 'db.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * from s_reintegros where id='".$_GET['id']."'";
    $dat=$conn->query($sql);
    $row = $dat->fetch_assoc();

?>     
<div class="container-fluid">
    <div class="card">
            <img src="assets/images/reintegro.PNG" alt="">
    </div>
    <br><br>
    <div class="alert alert-primary" role="alert">
           <p> Cordual Saludo Sr(a) <?php echo $row['pnombre'].' '.$row['papellido']; ?>,<br> <br>
            Su solicitud fue generada correctamente, su número de radicado es: <?php echo $row['id']; ?>.<br> <br>
            Hemos enviado a su correo los datos de la solicitud.<br> <br> 
            Esperamos que su información este debidamente sustentada, para tramitar su reintegro en la menor brevedad.<br> <br> 
            Muchas gracias.
            </p><br>
        <a href="https://redvitalut.com/" class="alert-link" target="_blank">Continua con nosotros...</a>
    </div>
</div>








</body>
<script>
$(document).ready(function(){

})
</script>
</html>