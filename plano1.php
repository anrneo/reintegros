<?php
include 'db.php';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$inicial=$_POST['f_inicial'];
$final=$_POST['f_final'];
$tipo=$_POST['tipo'];
date_default_timezone_set("America/Bogota");



// filename for download

if($tipo==1){
  $sql = "SELECT * from s_reintegros where f_creado>='".$inicial."' and f_creado<='".$final."' and estado=1 GROUP BY numerocuenta order by f_creado";
  $result = $conn->query($sql);
  $data=$result->fetch_all();
  
  // filename for download
$filename = "Inscripcion ".date('Y-m-d')." ".date("h-i-sa").".txt";

$myfile = fopen("planos/$filename", "w") or die("Unable to open file!");

  foreach ($data as $key => $row) {
    $txt = $row[27].','.$row[29].',"'.trim(strtoupper($row[2])).' '.trim(strtoupper($row[4])).'",'.$row[28].'",'.$row[26].',1,"Si","","","",0,0,1'." \r\n";
    fwrite($myfile, $txt);
  }

  $enlace = 'planos/'.$filename;
  header ("Content-Disposition: attachment; filename=".$filename." ");
  header ("Content-Type: application/octet-stream");
  header ("Content-Length: ".filesize($enlace));
  readfile($enlace);
  
}elseif($tipo==2) {
  $sql = "SELECT * from s_reintegros where f_creado>='".$inicial."' and f_creado<='".$final."' and estado=1 GROUP BY numerocuenta order by f_creado";
  $result = $conn->query($sql);
  $data=$result->fetch_all();
  
  $filename = "Pago_reintegros ".date('Y-m-d')." ".date("h-i-sa").".txt";

$myfile = fopen("planos/$filename", "w") or die("Unable to open file!");


  foreach ($data as $key => $row) {
    //cedula titular
    $dif=15-strlen(trim($row[26]));
    $data='6';
    for ($i=0; $i <$dif ; $i++) { 
      $data=$data.'0';
    }
    $data=$data.trim($row[26]);

    //nombre titular
    $data=$data.strtoupper(trim($row[2])).' ';
    $dif=17-strlen(trim($row[2]))-strlen(trim($row[4]));
    $dif1=$dif*(-1);
    $lenape=strlen(trim($row[4]));
    $a=substr_count($row[4],'á')+substr_count($row[4],'é')+substr_count($row[4],'í')+substr_count($row[4],'ó')+substr_count($row[4],'ú')+substr_count($row[4],'ñ');
    $b=substr_count($row[2],'á')+substr_count($row[2],'é')+substr_count($row[2],'í')+substr_count($row[2],'ó')+substr_count($row[2],'ú')+substr_count($row[2],'ñ');
    $c=$a+$b;
    $d=substr_count($row[4],'Á')+substr_count($row[4],'É')+substr_count($row[4],'Í')+substr_count($row[4],'Ó')+substr_count($row[4],'Ú')+substr_count($row[4],'Ñ');
    $e=substr_count($row[2],'Á')+substr_count($row[2],'É')+substr_count($row[2],'Í')+substr_count($row[2],'Ó')+substr_count($row[2],'Ú')+substr_count($row[2],'Ñ');
    $f=$d+$e;
    $g=$c+$f;
    if($dif>=0){
      for ($i=0; $i <$dif+$g ; $i++) { 
        $data=$data.' ';
      }
      $data=$data.strtoupper(trim($row[4]));
    }else{
      for ($i=0; $i<=$dif1+$g ; $i++) { 
      $apellido=substr_replace(trim($row[4])," ",$lenape-$i);
      
    }
    $data=$data.strtoupper(trim($apellido));
  }

    //codigo banco
    $dif=9-strlen(trim($row[28]));
    for ($i=0; $i <$dif ; $i++) { 
      $data=$data.'0';
    }
    $data=$data.trim($row[28]);

    //cuenta
    $dif=17-strlen(trim($row[27]));
    for ($i=0; $i <$dif ; $i++) { 
      $data=$data.'0';
    }
    $data=$data.trim($row[27]).'S37';

    //valor
    $dif=10-strlen(trim($row[37]));
    for ($i=0; $i <$dif ; $i++) { 
      $data=$data.'0';
    }
    $txt = $data.trim($row[37])." \r\n";
    //echo strlen($txt).'<br>';
    fwrite($myfile, $txt);
  }

  $enlace = 'planos/'.$filename;
  header ("Content-Disposition: attachment; filename=".$filename." ");
  header ("Content-Type: application/octet-stream");
  header ("Content-Length: ".filesize($enlace));
  readfile($enlace);
  
}
fclose($myfile);

?>