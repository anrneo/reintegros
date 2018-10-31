<?php
include '../db.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * from s_reintegros where f_creado>='".$_POST['f_inicial']."' and f_creado<='".$_POST['f_final']."' and estado=1 and pago=0";
$result = $conn->query($sql);
$data1=$result->fetch_all();

echo count($data1);


?>