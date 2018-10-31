
<?php
include 'db.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$num_id = $_POST["num_id"];  
$rand=rand();
$carpeta = "uploads/";
opendir($carpeta);
$destino1 = $carpeta.$num_id.'_'.$rand.'_his.pdf';
copy($_FILES['adhistoria'] ['tmp_name'],$destino1);

opendir($carpeta);
$destino2 = $carpeta.$num_id.'_'.$rand.'_doc.pdf';
copy($_FILES['addocumento'] ['tmp_name'],$destino2);

opendir($carpeta);
$destino3 = $carpeta.$num_id.'_'.$rand.'_tiq.pdf';
copy($_FILES['adtiquete'] ['tmp_name'],$destino3);


// Recibimos por POST los datos procedentes del formulario    

$f_atencion = $_POST["f_atencion"];
$pnombre = $_POST["pnombre"]; 
$snombre = $_POST["snombre"];     
$papellido = $_POST["papellido"]; 
$sapellido = $_POST["sapellido"]; 
$edad = $_POST["edad"];   

$t_afiliado = $_POST["t_afiliado"];    
$t_id = $_POST["t_id"];    
  
$tel1 = $_POST["tel1"];    
$tel2 = $_POST["tel2"];    
$email = $_POST["email"];    
$dpto1 = $_POST["dpto1"]; 
$ciudad1 = $_POST["ciudad1"];     
$dpto2 = $_POST["dpto2"];    
$ciudad2 = $_POST["ciudad2"];    
$direccion = $_POST["direccion"];    
$servicio = $_POST["servicio"];    
$ins_medica = $_POST["ins_medica"];    
$municipiomedica = $_POST["municipiomedica"];    
$profesional = $_POST["profesional"];    
$acompanante = $_POST["acompanante"];    
$dacompanante = $_POST["dacompanante"];    
$mtransporte = $_POST["mtransporte"];    
$nombretitular = $_POST["nombretitular"];    
$documentotitular = $_POST["documentotitular"];    
$numerocuenta = $_POST["numerocuenta"];    
$entidadcuenta = $_POST["entidadcuenta"];    
$tipocuenta = $_POST["tipocuenta"];    
$valor = $_POST["valor"];
$adhistoria=$destino1;   
$addocumento=$destino2;   
$adtiquete=$destino3;

include 'array.php';
$valor_apr=$precios[$ciudad1];
if(isset($valor_apr)){
    $valor_aprox = $valor_apr*2;
}else{
    $valor_aprox = 0;
}

$sql = "INSERT INTO s_reintegros (f_atencion, pnombre, snombre, papellido, sapellido, edad, t_afiliado, t_id, num_id, tel1,
                                    tel2, email, dpto1, ciudad1, dpto2, ciudad2, direccion, servicio, ins_medica, municipiomedica,
                                     profesional, acompanante, dacompanante, mtransporte, nombretitular, documentotitular, numerocuenta, 
                                     entidadcuenta, tipocuenta, valor, adhistoria, addocumento, adtiquete, f_creado, valor_aprox)
VALUES ('".$f_atencion."','".$pnombre."','".$snombre."','".$papellido."','".$sapellido."','".$edad."','".$t_afiliado."','".$t_id."','".$num_id."','".$tel1."',
        '".$tel2."','".$email."','".$dpto1."','".$ciudad1."','".$dpto2."','".$ciudad2."','".$direccion."','".$servicio."','".$ins_medica."','".$municipiomedica."',
        '".$profesional."','".$acompanante."','".$dacompanante."','".$mtransporte."','".$nombretitular."','".$documentotitular."','".$numerocuenta."',
        '".$entidadcuenta."','".$tipocuenta."','".$valor."','".$adhistoria."','".$addocumento."','".$adtiquete."', '".date('Y-m-d')."','".$valor_aprox."')";



if ($conn->query($sql) === TRUE) {
    $sql = "SELECT id from s_reintegros order by id desc limit 1";
    $dat=$conn->query($sql);
    $row = $dat->fetch_assoc();
    
   
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


/// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    //$mail->SMTPDebug = 1;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                         // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'reintegros.sumimedical@gmail.com';                 // SMTP username
    $mail->Password = 'reintegros1357';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('reintegros.sumimedical@gmail.com', 'REINTEGROS SUMIMEDICAL');
    $mail->addAddress($email, $pnombre.' '.$papellido);
    $body = '<div style="font-size: 18;font-family: Arial, Helvetica, sans-serif;">
                Cordial Saludo Sr(a) '.$pnombre.' '.$papellido.', los siguiente son los datos de su solicitud de REINTEGRO en Sumimedical S.A.S.<br><br>';
    $body .= ' Número de Radicado: '.$row['id'].'<br>
                Fecha de Radicado: '.date('Y-m-d').'<br>
            Nombres: '.$pnombre.' '.$snombre.'<br>
            Apellidos: '.$papellido.' '.$sapellido.'<br>
            Edad: '.$edad.'<br>   
            Tipo Afiliado: '.$t_afiliado.'<br> 
            Tipo de Documento: '.$t_id.'<br> 
            Número de documento: '.$num_id.'<br>  
            Teléfono1: '.$tel1.'<br>   
            Teléfono2: '.$tel2.'<br>
            Correo: '.$email.'<br>   
            Departamento de Origen: '.$dpto1.'<br>    
            Ciudad Origen: '.$ciudad1.'<br>   
            Departamento de Destino: '.$dpto2.'<br>    
            Ciudad Destino: '.$ciudad2.'<br> 
            Dirección: '.$direccion.'<br>  
            Servicio Médico Atendido: '.$servicio.'<br>  
            Institución Médica: '.$ins_medica.'<br>  
            Municipio de la Institución Médica: '.$municipiomedica.'<br> 
            Nombre del profesional: '.$profesional.'<br> 
            Acompañante: '.$acompanante.'<br>
            Medio de Transporte: '.$mtransporte.'<br>
            Nombre del titular de la cuenta: '.$nombretitular.'<br>
            Documento del titular: '.$documentotitular.'<br>
            Numero de cuenta: '.$numerocuenta.'<br>
            Entidad bancaria: '.$bancos[$entidadcuenta].'<br>
            Tipo de cuenta: '.$t_cuenta[$tipocuenta].'<br>
            Valor solicitado: '.$valor.'<br><br>';
    $body .= '
                Cordialmente: <br>
                Coordinación de Reintegros Sumimedical
                </div><br><br><br>';
    $body .= '<h2>Observación: </h2>
                <h3>Este correo es solo para enviar los datos de solicitud de reintegros a los usarios, por favor no responda sobre el mismo, dado que, esta respuesta no será analizada.
                Para inquietudes o dudas, por favor escribir al correo reintegros@sumimedical.com </h2>
                  </div>';
//Attachments



    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'solicitud de REINTEGRO generada con radicado No. '.$row['id'];
    $mail->Body    = utf8_decode($body);
    $mail->send();


   
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}


$conn->close();

header('Location: respuesta.php?id='.$row['id']);

?>    
    
</body>    

</html>   