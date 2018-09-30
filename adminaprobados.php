

<?php
include 'layaut.php';
include 'db.php';
include 'array.php';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * from s_reintegros where estado=1";
$result=$conn->query($sql);
$arr=$result->fetch_all();    
?>
<div class="container">
<div class="row">
<div class="col-sm-8">
  <h3  class="text-center card-header">Solicitudes Aprobadas</h3>
</div>
<div class="col-sm-4">
          <input id="filtrar" type="text" class="form-control" placeholder="Buscar...">
</div>
</div>
</div><br>

<?php
echo

'<div style="margin:0 10px 0 10px">
<table id="datos0" class="table table-bordered table-responsible">
<thead>
  <tr class="table-primary">
    <th class="text-center">Radicado</th>
    <th class="text-center">Nombre</th>
    <th class="text-center">Tipo Id</th>
    <th class="text-center">Numero Id</th>
    <th class="text-center">Email</th>
    <th class="text-center">Banco</th>
    <th class="text-center">Tipo Cuenta</th>
    <th class="text-center">Cuenta</th>
    <th class="text-center">Valor</th>
    <th class="text-center">Valor Aprox.</th>
    <th class="text-center">Diferencia</th>
    <th class="text-center">Aprobado</th>
  </tr>
</thead>
<tbody class="buscar text-center">';

foreach($arr as $row){
    $dif=$row[36]-$row[30];
    echo '<tr>
    <td>'.$row[0].'</td>
    <td>'.$row[2].' '.$row[4].'</td>
    <td>'.$row[8].'</td>
    <td>'.$row[9].'</td>
    <td>'.$row[12].'</td>
    
    <td>'.$bancos[$row[28]].'</td>';

    echo '
    <td>'.$t_cuenta[$row[29]].'</td>
    <td>'.$row[27].'</td>
    <td>'.$row[30].'</td>
    <td>'.$row[36].'</td>';
    if($row[36]==0){
        echo '<td>0</td>';
    }elseif($dif<0){
        echo '<td class="bg-danger">'.$dif.'</td>';
    }else{
        echo '<td class="bg-success">'.$dif.'</td>';
    }
    
   echo ' <td>'.$row[37].'</td>';
}
    echo '</tr>
    </tbody>
    </table>
    </div>';
       
    


   


?>  


</body>
<script>
$(document).ready(function(){
    $('#filtrar').keyup(function () {
 
 var rex = new RegExp($(this).val(), 'i');
 $('.buscar tr').hide();
 $('.buscar tr').filter(function () {
     return rex.test($(this).text());
 }).show();

})
})
</script>
</html>