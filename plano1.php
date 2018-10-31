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
$sql = "INSERT into pla_reintegros (f_ini, f_fin, archivo, tipo)
        values ( '".$inicial."', '".$final."','".$filename."', 'insc' )";
  $result = $conn->query($sql);
$myfile = fopen("planos/$filename", "w") or die("Unable to open file!");

  foreach ($data as $key => $row) {
    $nom=trim($row[2]).' '.trim($row[4]);
  
  $nom1=str_replace("á","A",$nom);
    $nom2=str_replace("é","E",$nom1);
    $nom3=str_replace("í","I",$nom2);
    $nom4=str_replace("ó","O",$nom3);
    $nom5=str_replace("ú","U",$nom4);
    $nom6=str_replace("Á","A",$nom5);
    $nom7=str_replace("É","E",$nom6);
    $nom8=str_replace("Í","I",$nom7);
    $nom9=str_replace("Ó","O",$nom8);
    $nom10=str_replace("Ú","U",$nom9);
    $nom11=str_replace("ü","U",$nom10);
    $nom12=str_replace("Ü","U",$nom11);
    $nom13=str_replace("ñ","N",$nom12);
    $nom14=str_replace("Ñ","N",$nom13);
    //echo $nom1.' -- '.$nom.'<br>';
    $txt = $row[27].','.$row[29].',"'.trim(strtoupper($nom14)).'",'.$row[28].','.$row[26].',1,"Si","","","",0,0,1'."\r\n";
    fwrite($myfile, $txt);
  }

 $enlace = 'planos/'.$filename;
  header ("Content-Disposition: attachment; filename=".$filename." ");
  header ("Content-Type: application/octet-stream");
  header ("Content-Length: ".filesize($enlace));
  readfile($enlace);
  
}elseif($tipo==2) {
  $sql = "SELECT * from s_reintegros where f_creado>='".$inicial."' and f_creado<='".$final."' and estado=1 and pago=0 group by numerocuenta order by f_creado";
  $result = $conn->query($sql);
  $data1=$result->fetch_all();


 $sql = "SELECT * from s_reintegros where f_creado>='".$inicial."' and f_creado<='".$final."' and estado=1 and pago=0";
  $result = $conn->query($sql);
  $data2=$result->fetch_all();

   foreach ($data2 as $key => $value) {
  $sql = "UPDATE s_reintegros SET pago=1 where id=$value[0] and estado=1";
    $result = $conn->query($sql);
}

  $filename = "Pago_reintegros ".date('Y-m-d')." ".date("h-i-sa").".txt";
  
$sql = "INSERT into pla_reintegros (f_ini, f_fin, archivo, tipo)
        values ( '".$inicial."', '".$final."','".$filename."', 'pago' )";
  $result = $conn->query($sql);

$myfile = fopen("planos/$filename", "w") or die("Unable to open file!");



  foreach ($data1 as $key => $row) {
    
    //cedula titular
    $dif=15-strlen(trim($row[26]));
    $data='6';
    for ($i=0; $i <$dif ; $i++) { 
      $data=$data.'0';
    }
    $data=$data.trim($row[26]);

    //nombre titular
    $nom=trim($row[2]);
    $nom1=str_replace("á","A",$nom);
    $nom2=str_replace("é","E",$nom1);
    $nom3=str_replace("í","I",$nom2);
    $nom4=str_replace("ó","O",$nom3);
    $nom5=str_replace("ú","U",$nom4);
    $nom6=str_replace("Á","A",$nom5);
    $nom7=str_replace("É","E",$nom6);
    $nom8=str_replace("Í","I",$nom7);
    $nom9=str_replace("Ó","O",$nom8);
    $nom10=str_replace("Ú","U",$nom9);
    $nom11=str_replace("ü","U",$nom10);
    $nom12=str_replace("Ü","U",$nom11);
    $nom13=str_replace("ñ","N",$nom12);
    $nom14=str_replace("Ñ","N",$nom13);

    $ape=trim($row[4]);
    $ape1=str_replace("á","A",$ape);
    $ape2=str_replace("é","E",$ape1);
    $ape3=str_replace("í","I",$ape2);
    $ape4=str_replace("ó","O",$ape3);
    $ape5=str_replace("ú","U",$ape4);
    $ape6=str_replace("Á","A",$ape5);
    $ape7=str_replace("É","E",$ape6);
    $ape8=str_replace("Í","I",$ape7);
    $ape9=str_replace("Ó","O",$ape8);
    $ape10=str_replace("Ú","U",$ape9);
    $ape11=str_replace("ü","U",$ape10);
    $ape12=str_replace("Ü","U",$ape11);
    $ape13=str_replace("ñ","N",$ape12);
    $ape14=str_replace("Ñ","N",$ape13);

    $data=$data.strtoupper(trim($nom14)).' ';
    $dif=17-strlen(trim($nom14))-strlen(trim($ape14));
    $dif1=$dif*(-1);
    $lenape=strlen(trim($ape14));
    
    if($dif>=0){
      for ($i=0; $i <$dif ; $i++) { 
        $data=$data.' ';
      }
      $data=$data.strtoupper(trim($ape14));
    }else{
      for ($i=0; $i<=$dif1 ; $i++) { 
      $apellido=substr_replace(trim($ape14)," ",$lenape-$i);
      
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
    $sum=0;
    foreach ($data2 as $key => $value) {
      if ($row[27]==$value[27]) {
        $sum+=trim($value[37]);
      }
    }
    $dif=10-strlen(trim($sum));
    for ($i=0; $i <$dif ; $i++) { 
      $data=$data.'0';
    }
    $txt = $data.trim($sum)."\r\n";
    //echo strlen($txt).'<br>';
    fwrite($myfile, $txt);
  }

  $enlace = 'planos/'.$filename;
  header ("Content-Disposition: attachment; filename=".$filename." ");
  header ("Content-Type: application/octet-stream");
  header ("Content-Length: ".filesize($enlace));
  readfile($enlace);
  fclose($myfile);

}


?>