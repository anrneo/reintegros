

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
$sql1 = "DELETE FROM `s_reintegros` WHERE f_atencion='0000-00-00'";
$result1=$conn->query($sql1);

$sql = "SELECT * from s_reintegros where estado=0";
$result=$conn->query($sql);
$arr=$result->fetch_all();    
?>
<div class="container">
<div class="row">
<div class="col-sm-8">
  <h3  class="text-center card-header">Solicitudes de Reintegros Pendientes</h3>
</div>
<div class="col-sm-4">
          <input id="filtrar" type="text" class="form-control" placeholder="Buscar...">
</div>
</div>
</div><br>
      
<?php
echo

'<div style="margin:0 10px 0 10px">
<table id="datos0" class="table table-bordered table-responsible table-sm">
<thead>
  <tr class="table-primary">
    <th class="text-center">Radicado</th>
    <th class="text-center">Fecha Atención</th>
    <th class="text-center">dias</th>
    <th class="text-center">Nombre</th>
    <th class="text-center">Numero Id</th>
    <th class="text-center">Email</th>
    <th class="text-center">Banco</th>
    <th class="text-center">Tipo Cuenta</th>
    <th class="text-center">Cuenta</th>
    <th class="text-center">Valor</th>
    <th class="text-center">Valor Aprox.</th>
    <th class="text-center">Diferencia</th>
    <th class="text-center">Opciones</th>
  </tr>
</thead>
<tbody class="buscar text-center">';

foreach($arr as $row){
    $dif=$row[36]-$row[30];
    
    $date1=date_create($row[1]);
    $date2=date_create($row[34]);
    $diff=date_diff($date1,$date2);
    $dias=$diff->format("%a");
   
    echo '<tr>
    <td>'.$row[0].'</td>
    <td>'.$row[1].'</td>';
   if($dias>8){
      echo '<td class="bg-warning">'.$dias.'</td>';
    }else{
      echo '<td>'.$dias.'</td>';
    }
    echo '
    <td>'.$row[2].' '.$row[4].'</td>
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
    
    echo '<td><div class="btn-group">
    <button type="button" class="btn btn-primary btn-sm">Opciones</button>
    <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
      <span class="caret"></span>
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item href="" data-toggle="modal" data-target="#Datosrein'.$row[0].'">Datos</a>
      <a class="dropdown-item href="" data-toggle="modal" data-target="#Aprobarein'.$row[0].'">Aprobar</a>
    </div>
  </div></td>';
}
    echo '</tr>
    </tbody>
    </table>
    </div>';
       
    


   

foreach($arr as $row){
  echo '
<!-- Modal Datos-->
<div class="modal fade" id="Datosrein'.$row[0].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Datos Radicado N° '.$row[0].'</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <b>Fecha de Radicado: </b>'.$row[34].'<br>
        <b>Nombres: </b>'.$row[2].' '.$row[3].'<br>
        <b>Apellidos: </b>'.$row[4].' '.$row[5].'<br>
        <b>Edad: </b>'.$row[6].'<br>   
        <b>Tipo Afiliado: </b>'.$row[7].'<br> 
        <b>Tipo de Documento: </b>'.$row[8].'<br> 
        <b>Número de documento: </b>'.$row[9].'<br>  
        <b>Teléfono1: </b>'.$row[10].'<br>   
        <b>Teléfono2: </b>'.$row[11].'<br>
        <b>Correo: </b>'.$row[12].'<br>   
        <b>Departamento de Origen: </b>'.$row[13].'<br>    
        <b>Ciudad Origen: </b>'.$row[14].'<br>   
        <b>Departamento de Destino: </b>'.$row[15].'<br>    
        <b>Ciudad Destino: </b>'.$row[16].'<br> 
        <b>Dirección: </b>'.$row[17].'<br>  
        <b>Servicio Médico Atendido: </b>'.$row[17].'<br>  
        <b>Institución Médica: </b>'.$row[19].'<br>  
        <b>Municipio de la Institución Médica: </b>'.$row[20].'<br> 
        <b>Nombre del profesional: </b>'.$row[21].'<br> 
        <a href="https://redvitalut.com/reintegros/'.$row[31].'" target="_blank">Historia Clínica</a><br>  
        <a href="https://redvitalut.com/reintegros/'.$row[32].'" target="_blank">Documento de Identidad</a> <br> 
        <a href="https://redvitalut.com/reintegros/'.$row[33].'" target="_blank">Tiquete</a> <br> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>

<!-- Modal Aprobar-->
<div class="modal fade" id="Aprobarein'.$row[0].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Aprobación de Radicado N° '.$row[0].'</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="aprobar.php" method="post" enctype="multipart/form-data">
      <input type="text" hidden class="form-control-plaintext" value="'.$row[0].'" name="id">

      <div class="form-group row">
        <label for="staticEmail" class="col-sm-3 col-form-label">Nombre(s)</label>
        <div class="col-sm-9">
          <input type="text" readonly class="form-control-plaintext" value="'.$row[2].' '.$row[3].'" name="nombre">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-3 col-form-label">Apellido(s)</label>
        <div class="col-sm-9">
          <input type="text" readonly class="form-control-plaintext" value="'.$row[4].' '.$row[5].'" name="apellidos">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9">
          <input type="text" readonly class="form-control-plaintext" value="'.$row[12].'" name="email">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-3 col-form-label">Estado</label>
        <div class="col-sm-9">
          <select id="res_estado" class="form-control" name="res_estado">
            <option>Aprobado</option>
            <option>No Aprobado</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-3 col-form-label">Valor Aprobado</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" value="'.$row[30].'" id="valor_aprobado" name="valor_aprobado">
        </div>
      </div>
      <div class="form-group">
        <label for="staticEmail">Respuesta</label>
        <div>
          <textarea class="form-control" name="res_aprobado" rows="3" required></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Aprobar</button>
      </div>
    </form>
        
      </div>
      
    </div>
  </div>
</div>';
}



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
  valor=$('#valor_aprobado').val()
  $('#res_estado').change(function () {
    if ($(this).val()=='No Aprobado') {
      $('#valor_aprobado').val(0)
    }else{
      $('#valor_aprobado').val(valor)
    }
  })

})
</script>
</html>