<?php
include '../conexi/conexion.php';


if (isset($_POST['iniciar'])) {
    
    $tipo_documento = $_POST['tipo_documento'];
    $documento =$_POST['documento2'];
    $clave = $_POST['clave'];

    $encriptada = sha1($clave);

    $usuario = mysqli_query($conexion,"SELECT * FROM  tbl_personas WHERE tipo_documento_persona ='$tipo_documento'
     AND numero_documento_persona ='$documento' AND clave_persona='$encriptada' AND rol_persona ='usuario'");

    $supervisor = mysqli_query($conexion,"SELECT * FROM tbl_personas WHERE tipo_documento_persona
     ='$tipo_documento' AND numero_documento_persona = '$documento' AND clave_persona = '$clave' AND 
      rol_persona='supervisor'");

    $vigilante = mysqli_query($conexion,"SELECT * FROM tbl_personas WHERE tipo_documento_persona 
    ='$tipo_documento' AND numero_documento_persona = '$documento' AND clave_persona = '$encriptada' 
    AND rol_persona='vigilante' AND estado_persona = 'activo' ");

if(mysqli_num_rows($usuario) == 1) {

    session_start();
        $fila = mysqli_fetch_array($usuario);
        $_SESSION['user'] = $fila['numero_documento_persona'];
        
    echo "<script> window.location='../vistas/perfil_usuario.php'; </script>";

    exit(); 

} else if(mysqli_num_rows($supervisor) == 1) {

    session_start();
    $fila1 = mysqli_fetch_array($supervisor);
    $_SESSION['super'] = $fila1['numero_documento_persona'];
    echo "<script> window.location='../vistas/perfil_supervisor.php'; </script>";

    exit(); 

} else if(mysqli_num_rows($vigilante) == 1)  {

    session_start();
    $fila2 = mysqli_fetch_array($vigilante);
    $_SESSION['vigi'] = $fila2['numero_documento_persona'];

    echo "<script> window.location='../vistas/perfil_vigilante.php'; </script>";

    exit();

}else {
   echo "<script> alert('El usuario y la contraseña son incorrectos.'); </script>";
   echo "<script> window.location='../index.php'; </script>";
}

}
?>