<?php
include 'db.php';
$f_inicio= $_POST['f_inicio'];
$f_final= $_POST['f_final'];

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * from s_reintegros where f_creado>='".$f_inicio."' and f_creado<='".$f_final."'";
$result=$conn->query($sql);
$dat=$result->fetch_all();  

$sql = "SELECT count(id) from s_reintegros where f_creado>='".$f_inicio."' and f_creado<='".$f_final."' and estado=0";
$result=$conn->query($sql);
$nuevos=$result->fetch_all();   

$sql = "SELECT count(id) from s_reintegros where f_creado>='".$f_inicio."' and f_creado<='".$f_final."' and estado=1";
$result=$conn->query($sql);
$aprobados=$result->fetch_all();   

$sql = "SELECT count(id) from s_reintegros where f_creado>='".$f_inicio."' and f_creado<='".$f_final."' and estado=2";
$result=$conn->query($sql);
$noaprobado=$result->fetch_all();  

$sql = "SELECT count(id) from s_reintegros where f_creado>='".$f_inicio."' and f_creado<='".$f_final."'";
$result=$conn->query($sql);
$total=$result->fetch_all();   

$sql = "SELECT sum(valor) from s_reintegros where f_creado>='".$f_inicio."' and f_creado<='".$f_final."'";
$result=$conn->query($sql);
$cantisoli=$result->fetch_all();  

$sql = "SELECT sum(valor_aprobado) from s_reintegros where f_creado>='".$f_inicio."' and f_creado<='".$f_final."'";
$result=$conn->query($sql);
$cantiapro=$result->fetch_all(); 

$sql = "SELECT sum(valor) from s_reintegros where f_creado>='".$f_inicio."' and f_creado<='".$f_final."' and estado=2";
$result=$conn->query($sql);
$cantinoapro=$result->fetch_all();

$sql = "SELECT sum(valor) from s_reintegros where f_creado>='".$f_inicio."' and f_creado<='".$f_final."' and estado=0";
$result=$conn->query($sql);
$cantipend=$result->fetch_all();

if(count($dat)>0){
    echo '<h5 class="text-secondary">Datos Parciales del '.$f_inicio.' al '.$f_final.'</h5>
    <div style="margin:0 10px 0 10px">
       <table id="datos0" class="table table-bordered table-responsible table-sm">
           <thead>
               <tr class="table-warning">
                 <th class="text-center">Radicados Pendientes</th>
                 <th class="text-center">Radicados Aprobados</th>
                 <th class="text-center">Radicados NO Aprobados</th>
                 <th class="text-center">Total</th>
                 <th class="text-center">Cantidad Solicitada</th>
                 <th class="text-center">Cantidad Aprobada</th>
                 <th class="text-center">Cantidad No Aprobada</th>
                 <th class="text-center">Cantidad Pendiente</th>
               </tr>
           </thead>
           <tbody class="buscar text-center">
                 </tr>
                     <td>'.$nuevos[0][0].' Solicitudes</td>
                     <td>'.$aprobados[0][0].' Solicitudes</td>
                     <td>'.$noaprobado[0][0].' Solicitudes</td>
                     <td>'.$total[0][0].' Solicitudes</td>
                     <td>$'.$cantisoli[0][0].'</td>
                     <td>$'.$cantiapro[0][0].'</td>
                     <td>$'.$cantinoapro[0][0].'</td>';
                     if($cantipend[0][0]==null){
                      echo "<td>0</td>";
                    }else{
                      echo '<td>$'.$cantipend[0][0].'</td>';
                    }
                     echo ' 
                </tr>
            </tbody>
        </table>
    </div>
    ';

echo " 
<script type='text/javascript'>
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      ['Pendientes',     ".$nuevos[0][0]."],
      ['Aprobados',      ".$aprobados[0][0]."],
      ['No Aprobados',  ".$noaprobado[0][0]."],
      
    ]);

    var options = {
      title: ' Reintegros Radicados'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
  }
  </script>
  <div class='row'>
    <div class='row-md-6' id='piechart' style='width: 570px; height: 400px;'>
    </div>
 ";
  echo " 
  <script type='text/javascript'>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],";
      if($cantipend[0][0]==null){
        echo "['Pendiente',    0],";
      }else{
        echo "['Pendiente',     ".$cantipend[0][0]."],";
      }
      echo "
      ['Aprobado',      ".$cantiapro[0][0]."],
      ['No Aprobado',      ".$cantinoapro[0][0]."]
      
    ]);

    var options = {
      title: 'Costo de Reintegros',
      pieHole: 0.4,
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    chart.draw(data, options);
  }
</script>
    <div class='row-md-6' id='donutchart' style='width: 570px; height: 400px;'>
    </div>
</div>";
}else{
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Consulta sin datos! </strong> Por favor cambia las fechas de la consulta.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

?>