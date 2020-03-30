<?php

require "../conexi/conexion.php";


if(isset($_POST['submit'])){


require "PHPMailer.php";
require "SMTP.php";
require "Exception.php";
require "OAuth.php";


$correo = $_POST['correo'];
$nombre = "Cambio de contraseña";
$ruta = 'localhost/proyecto_20/vistas/formulario.php';
$mensaje = "<a href='$ruta'>Click en el link para cambiar tu contraseña</a>";


$mail = new PHPMailer\PHPMailer\PHPMailer();

$mail->isSMTP();

$mail->SMTPDebug = 0;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "registroagil20@gmail.com";
$mail->Password = "123registro";
$mail->setFrom('registroagil20@gmail.com', 'Registro Agil');
$mail->addAddress($correo);
$mail->Subject =  $nombre;
$mail->Body = $mensaje;
$mail->CharSet = 'UTF-8'; // Con esto ya funcionan los acentos
$mail->IsHTML(true);

if (!$mail->send())
{
	echo "Error al enviar el E-Mail: ".$mail->ErrorInfo;
}
else
{
    
    echo "<script>alert('E-Mail enviado') ;</script>";
    echo "<script> window.location='../index.php';</script>";
}
}
?>