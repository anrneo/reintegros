
<?php
include 'layaut.php';
?>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.input-container {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    width: 100%;
    margin-bottom: 15px;
}

.icon {
    padding: 10px;
    background: dodgerblue;
    color: white;
    min-width: 50px;
    text-align: center;
}

.input-field {
    width: 100%;
    padding: 10px;
    outline: none;
}

.input-field:focus {
    border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
    background-color: dodgerblue;
    color: white;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

.btn:hover {
    opacity: 1;
}
</style>
<br>
<form action="plano1.php" method="post" style="max-width:500px;margin:auto" class="was-validated">
  <h4>Ingresa los datos de la consulta para <?php if($_GET['tipo']==1){ echo 'Inscripción de Cuentas';
                                                    }elseif($_GET['tipo']==2){ echo 'Pago de Reintegros'; }    ?></h4><br>
  <h6>Fecha Inicial</h6>
  <div class="input-container">
    <i class="fa fa-calendar icon"></i>
    <input class="form-control" type="date" name="f_inicial" required>
  </div><br>
  <h6>Fecha Final</h6>
  <div class="input-container">
    <i class="fa fa-calendar-check-o icon"></i>
    <input class="form-control" type="date" name="f_final" required>
  </div><br>
  <?php
    $tipo=$_GET['tipo'];
    echo '<input class="input-field" type="text" name="tipo" hidden value="'.$tipo.'">';
  ?>

  <button type="submit" class="btn">Descargra Archivo</button>
</form>

</body>

</html>