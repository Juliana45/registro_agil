<?php

require "../conexi/conexion.php";
/**
 * Condicional donde se define si se envia el correo 
 * 
 * submit se llama el boton de envio del correo
 * 
 */
if(isset($_POST['submit'])){

/**
 * 
 * En cada require se estan llamandos los archivos que componen la libreria de PhpMailer
 * 
 */
require "PHPMailer.php";
require "SMTP.php";
require "Exception.php";
require "OAuth.php";

/**
 * Asunto y datos que se adjuntan al correo
 * 
 * @var string $correo      Se almacena el correo escrito por el usuario
 * @var string $nombre      Se almacena el asunto que se enviará en el correo
 * @var string $ruta        Se almacena la ruta del formulario a enviar para reestablecar la contraseña
 * @var string $mensaje     Se almacena el mensaje y la ruta que se enviara al correo como cuerpo de este
 * 
 */
$correo = $_POST['correo'];
$nombre = "Cambio de contraseña";
$ruta = 'localhost/proyecto_20/vistas/formulario.php';
$mensaje = "<a href='$ruta'>Click en el link para cambiar tu contraseña</a>";

/**
 * Se registran los datos a enviar
 * 
 * @var string $mail    Permite enviar correos electronicos usando un programa
 */
$mail = new PHPMailer\PHPMailer\PHPMailer();

/**
 * Se llama la funcion creada en el archivo SMTP y se iniciliza Debug en 0
 */
$mail->isSMTP();

$mail->SMTPDebug = 0;
/**
 * Se asegura que el correo sea enviado mediante gmail
 */
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
/**
 * Se llama la funcion creada en el archivo SMTP que brinda seguridad (tls)
 */
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "registroagil20@gmail.com";
$mail->Password = "123registro";
$mail->setFrom('registroagil20@gmail.com', 'Registro Agil');
/**
 * Se confirman datos a enviar
 */
$mail->addAddress($correo);
$mail->Subject =  $nombre;
$mail->Body = $mensaje;
$mail->CharSet = 'UTF-8'; // Con esto ya funcionan los acentos
/**
 * Se activa la funcionalidad de html
 */
$mail->IsHTML(true);

/**
 * Si este correo se envía mostrará una alerta en caso contrario un error
 */
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