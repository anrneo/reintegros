
<?php
include 'db.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id=$_POST['id'];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"]; 
$email = $_POST["email"]; 
$res_estado = $_POST["res_estado"];     
$valor_aprobado = $_POST["valor_aprobado"]; 
$res_aprobado = $_POST["res_aprobado"]; 
$respuesta = $res_estado.' - '.$res_aprobado;

if($res_estado=='Aprobado'){
$sql = "UPDATE s_reintegros SET estado=1, valor_aprobado='".$valor_aprobado."', res_aprobado='".$respuesta."' where id=$id";
}else{
    $sql = "UPDATE s_reintegros SET estado=2, valor_aprobado=0, res_aprobado='".$respuesta."' where id=$id";
    $valor_aprobado=0;
}
$conn->query($sql);


$sql = "SELECT * from s_reintegros where id=$id";
$dat=$conn->query($sql);
    $row = $dat->fetch_assoc();

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
    $mail->setFrom('reintegros.sumimedical@gmail.com', 'RESPUESTA REINTEGROS SUMIMEDICAL');
    $mail->addAddress($email, $nombre);
    $body = '<div style="font-size: 18;font-family: Arial, Helvetica, sans-serif;">
                Cordial Saludo Sr(a) '.$nombre.', tiene una respuesta a su solicitud de REINTEGRO en Sumimedical S.A.S.<br><br>';
    $body .= ' Número de Radicado: '.$row['id'].'<br>
                Fecha de Radicado: '.$row['f_atencion'].'<br>
            Nombres: '.$nombre.'<br>
            Apellidos: '.$apellidos.'<br>
            Tipo de documento: '.$row['t_id'].'<br>  
            Número de documento: '.$row['num_id'].'<br>  
            Correo: '.$email.'<br>   
            Estado de la Solicitud: '.$res_estado.'<br>   
            Valor Aprobado: '.$valor_aprobado.'<br><br>
            Respuesta: ' .$respuesta.'<br><br><br>';
    $body .= '
                Cordialmente: <br>
                Coordinación de Reintegros Sumimedical
                </div><br><br><br>';
    $body .= '<h1>Observación: </h1>
              <h2>Este correo es solo para enviar los datos de solicitud de reintegros a los usarios, favor no responda sobre el mismo, dado que, esta no sera tenida en cuenta. </h2>
                </div>';
//Attachments



    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Respuesta a solicitud de REINTEGRO generada con radicado No. '.$row['id'];
    $mail->Body    = utf8_decode($body);
    $mail->send();


   
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

header('Location: admin.php');

?>