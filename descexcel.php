<?php
include 'db.php';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "select id, f_atencion, pnombre, snombre, papellido, sapellido, edad, t_afiliado, t_id, num_id, tel1,
tel2, email, dpto1, ciudad1, dpto2, ciudad2, direccion, servicio, ins_medica, municipiomedica,
 profesional, acompanante, dacompanante, mtransporte, nombretitular, documentotitular, numerocuenta, 
 entidadcuenta, tipocuenta, valor, f_creado, estado, valor_aprox, valor_aprobado, res_aprobado from s_reintegros";
$result = $conn->query($sql);
$data=$result->fetch_all();

function cleanData(&$str)
  {
    // escape tab characters
    $str = preg_replace("/\t/", "\\t", $str);

    // escape new lines
    $str = preg_replace("/\r?\n/", " ", $str);

    // convert 't' and 'f' to boolean values
    if($str == 't') $str = 'TRUE';
    if($str == 'f') $str = 'FALSE';

    
// escape fields that include double quotes
if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
$str = mb_convert_encoding($str, 'UTF-16LE', 'UTF-8');
  }
  $colnames = [
    0  => "RADICADO",
    1  => "FECHA ATENCION",
    2  => "PRIMER NOMBRE",
    3  => "SEGUNDO NOMBRE",
    4  => "PRIMER APELLIDO",
    5  => "SEGUNDO APELLIDO",
    6  => "EDAD",
    7  => "TIPO DE AFILIADO",
    8  => "TIPO ID",
    9  => "NUMERO ID",
    10 => "TELEFONO1",
    11  => "TELEFONO2",
    12  => "EMAIL",
    13  => "DEPARTAMENTO1",
    14  => "CIUDAD1",
    15  => "DEPARTAMENTO2",
    16  => "CIUDAD2",
    17  => "DIRECCION",
    18  => "SERVICIO",
    19  => "INSTITUCION",
    20 => "MUNICIPIO INST.",
    21 => "PROFESIONAL",
    22 => "ACOMPAÑANTE",
    23 => "NOMBRE ACOMP.",
    24 => "TRANSPORTE",
    25 => "NOMBRE TITULAR",
    26 => "ID TITULAR",
    27 => "No. CUENTA",
    28 => "BANCO",
    29 => "TIPO CUENTA",
    30 => "VALOR",
    
    34 => "FECHA RADICADO",
    35 => "ESTADAO",
    36 => "V. TEORICO",
    37 => "V. APROBADO",
    38 => "RESPUESTA",
  ];

  function map_colnames($input)
  {
    global $colnames;
    return isset($colnames[$input]) ? $colnames[$input] : $input;
  }
  date_default_timezone_set("America/Bogota");
  // filename for download
  $filename = "Radicados ".date('Y-m-d')." ".date("h:i:sa").".xls";

  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: text/csv; charset=UTF-16LE");
  $out = fopen("php://output", 'w');
  $flag = false;
  foreach($data as $row) {
   if(!$flag) {
      // display field/column names as first row
      echo implode("\t", ($colnames)) . "\r\n";
      $flag = true;
    }
    array_walk($row, __NAMESPACE__ . '\cleanData');
    echo implode("\t", array_values($row)) . "\r\n";
  }
  exit;

  
?>