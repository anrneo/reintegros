
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
    <input class="form-control" type="date" id="f_inicial" name="f_inicial" required>
  </div><br>
  <h6>Fecha Final</h6>
  <div class="input-container">
    <i class="fa fa-calendar-check-o icon"></i>
    <input class="form-control" type="date" id="f_final" name="f_final" required>
  </div><br>
  <?php
    $tipo=$_GET['tipo'];
    echo '<input class="input-field" type="text" id="tipo" name="tipo" hidden value="'.$tipo.'">';
  ?>

  <button type="submit" id="submit" class="btn">Descargar Archivo</button>
</form>
<br><br>
<?php
include 'db.php';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if($tipo==1){
$sql = "SELECT * from pla_reintegros where tipo='insc' order by created desc";
  $result = $conn->query($sql);
  $data=$result->fetch_all();
    $it='inscripción';

}else{
    $sql = "SELECT * from pla_reintegros where tipo='pago' order by created desc";
  $result = $conn->query($sql);
  $data=$result->fetch_all();
  $it='pago';

}

?>
<div class="container">
    <h5>Histórico de archivos descargados para <?php echo $it; ?> de cuentas</h5>
    <table class="table table-sm table-hover">
  <thead>
    <tr>
      <th scope="col">Fecha Inicial</th>
      <th scope="col">Fecha Final</th>
      <th scope="col">Nombre Archivo</th>
      <th scope="col">Ver</th>
    </tr>
  </thead>
  <tbody>
  <?php
    foreach ($data as $key => $val) {
      echo '<tr>
                <td>'.$val[1].'</td>
                <td>'.$val[2].'</td>
                <td>'.$val[3].'</td>
                <td><a href="planos/'.$val[3].'" target="_blank">Ver</a></td>
            </tr>';
          }
      ?>
  </tbody>
</table>
</div>
<script>
$(function(){
    $('#submit').click(function(){
        if($('#tipo').val()==1){
            location.reload('/reintegros/formdesc.php?tipo=1')
        }
    })

    $('#f_inicial').click(function(){
        $('#f_final').val('')
    })

    if($('#tipo').val()==2){
        $('#submit').hide()
    
   $('#f_final').change(function(){
    $('#submit').hide()
            $.ajax({
                method:'POST',
                url: 'ajax/consultapago.php',
                data: {f_inicial : $('#f_inicial').val(), f_final : $('#f_final').val()}
            })
            .done(function(dat){
                if (dat==0) {
                    console.log(dat);
                    toastr.options = { "closeButton": true, "progressBar": true};
                    toastr.warning("los datos suministrados no generaron información, gracias");
                }else{
                    toastr.options = { "closeButton": true, "progressBar": true};
                    toastr.success("los datos suministrados generaron cuentas por pagar, gracias");
                    $('#submit').show()
                    $('#submit').click(function(){
                        $('#submit').hide()
                    })

                }
            })
        
    })
    }
})
</script>
</body>

</html>