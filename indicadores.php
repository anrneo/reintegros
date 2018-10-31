

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

$sql = "SELECT count(id) from s_reintegros where estado=0";
$result=$conn->query($sql);
$nuevos=$result->fetch_all();    

$sql = "SELECT count(id) from s_reintegros where estado=1";
$result=$conn->query($sql);
$aprobados=$result->fetch_all();   

$sql = "SELECT count(id) from s_reintegros where estado=2";
$result=$conn->query($sql);
$noaprobado=$result->fetch_all();   

$sql = "SELECT count(id) from s_reintegros";
$result=$conn->query($sql);
$total=$result->fetch_all();   

$sql = "SELECT sum(valor) from s_reintegros";
$result=$conn->query($sql);
$cantisoli=$result->fetch_all();  

$sql = "SELECT sum(valor_aprobado) from s_reintegros";
$result=$conn->query($sql);
$cantiapro=$result->fetch_all(); 

$sql = "SELECT sum(valor) from s_reintegros where estado=2";
$result=$conn->query($sql);
$cantinoapro=$result->fetch_all(); 

$sql = "SELECT sum(valor) from s_reintegros where estado=0";
$result=$conn->query($sql);
$cantipend=$result->fetch_all(); 
?>
  <div class="container">
  <h3 class="text-center card-header">Indicadores de Reintegros</h3><br>
<h6>Consultas Parciales de Indicadores</h6>
<form action="indicaparcial.php" method="post" id="formparcial" class="was-validated">
          <div class="row">
            <div class="col">
              <input type="date" class="form-control form-control-sm" name="f_inicio" id="f_inicio" required>
            </div>
            <div class="col">
              <input type="date" class="form-control form-control-sm" name="f_final" id="f_final" required>
            </div>
            <div class="col">
            <button type="submit" class="btn btn-primary btn-sm">consultar</button>
            </div>
          </div>
          
        </form><br>
        
        <div id="resultado">
        <button class="btn btn-primary btn-sm" id="buttonload">
          <i class="fa fa-spinner fa-spin"></i> Procesando, espere por favor...
        </button>
        </div>
<?php
echo
'<h4 class="text-secondary">Datos Globales</h4>
 <div style="margin:0 10px 0 10px">
    <table id="datos0" class="table table-bordered table-responsible table-sm">
        <thead>
            <tr class="table-primary">
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
 </div>';
       
    
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
        <div class='row-md-6' id='piechart' style='width: 650px; height: 500px;'></div>
     ";
      echo " 
      <script type='text/javascript'>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Pendiente',     ".$cantipend[0][0]."],
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
    <div class='row-md-6' id='donutchart' style='width: 650px; height: 500px;'>
        
      </div>
    </div>";

    $sql = "SELECT * from s_reintegros where estado=1 order by valor_aprobado desc limit 20";
    $result=$conn->query($sql);
    $valores=$result->fetch_all(); 

    
    ?>
      
      
    <div class="container">
    <h5>Mayor costo de valor aprobado por usuario</h5>
    <table class="table table-sm table-hover">
  <thead>
    <tr>
      <th scope="col">Radicado</th>
      <th scope="col">Fecha</th>
      <th scope="col">Nombre</th>
      <th scope="col">N° Identidad</th>
      <th scope="col">Valor Aprobado</th>
      <th scope="col">HC</th>
      <th scope="col">Documento</th>
      <th scope="col">Tiquete</th>
    </tr>
  </thead>
  <tbody>
  <?php
    foreach ($valores as $key => $val) {
      echo '<tr>
                <th scope="row">'.$val[0].'</th>
                <td>'.$val[34].'</td>
                <td>'.strtoupper($val[2]).' '.strtoupper($val[4]).'</td>
                <td>'.$val[9].'</td>
                <td>'.$val[37].'</td>
                <td><a href="https://redvitalut.com/reintegros/'.$val[31].'" target="_blank">Ver</a></td>
                <td><a href="https://redvitalut.com/reintegros/'.$val[32].'" target="_blank">Ver</a></td>
                <td><a href="https://redvitalut.com/reintegros/'.$val[33].'" target="_blank">Ver</a></td>
            </tr>';
          }
      ?>
  
    
  </tbody>
</table>
</div>
        
<br><br>
      
</body>
<script>
$(document).ready(function(){
$('#buttonload').hide()
$('#formparcial').submit(function (event){
  event.preventDefault();
  var parametros = {
                "f_inicio" : $('#f_inicio').val(),
                "f_final" : $('#f_final').val() 
        };
        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'indicaparcial.php', //archivo que recibe la peticion
                type:  'post', //método de envio
                beforeSend: function () {
                        $("#buttonload").show();
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#resultado").html(response);
                }
        });
  })

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