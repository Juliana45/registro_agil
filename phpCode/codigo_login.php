<?php
include '../conexi/conexion.php';
/**
 * codigo login
 * 
 *'iniciar'     se esta verificando que si se le haya dado click en el boton iniciar
 * 
 * se definen las variables para capturar la informacion de los input
 * @var string $tipo_documento
 * @var string $documento
 * @var string $clave
 */
if (isset($_POST['iniciar'])) { 
    $tipo_documento = $_POST['tipo_documento'];
    $documento =$_POST['documento2'];
    $clave = $_POST['clave'];

    /**
     * se encripta la clave
     */
    $encriptada = sha1($clave);

    /**
     * se realiza la consulta a la base de datos dependiendo el rol
     */
    $usuario = mysqli_query($conexion,"SELECT * FROM  tbl_personas WHERE tipo_documento_persona ='$tipo_documento'
     AND numero_documento_persona ='$documento' AND clave_persona='$encriptada' AND rol_persona ='usuario'");

    $supervisor = mysqli_query($conexion,"SELECT * FROM tbl_personas WHERE tipo_documento_persona='$tipo_documento' 
    AND numero_documento_persona = '$documento' AND clave_persona = '$clave' AND rol_persona='supervisor'");

    $vigilante = mysqli_query($conexion,"SELECT * FROM tbl_personas WHERE tipo_documento_persona ='$tipo_documento'
    AND numero_documento_persona='$documento' AND clave_persona='$encriptada' AND rol_persona='vigilante' AND estado_persona='activo' ");

    /**
     * si la consulta es a un usuario y hay datos
    */
    if(mysqli_num_rows($usuario) == 1) {
        /**
         * inicia una sesion 
         * $fila    alamcena la consulta del usuario
         * 'user'   almacena los datos de un usuario
         * direcciona al perfil respectivo 
        */
        session_start();
            $fila = mysqli_fetch_array($usuario);
            $_SESSION['user'] = $fila['numero_documento_persona'];
            echo "<script> window.location='../vistas/perfil_usuario.php'; </script>";
        exit(); 

    }
    /**
     * si la consulta es a un supervisor y hay datos
    */
    else if(mysqli_num_rows($supervisor) == 1) {
        /**
         * inicia una sesion 
         * $fila1    alamcena la consulta del supervisor
         * 'super'   almacena los datos de un supervisor
         * direcciona al perfil respectivo 
        */
        session_start();
            $fila1 = mysqli_fetch_array($supervisor);
            $_SESSION['super'] = $fila1['numero_documento_persona'];
            echo "<script> window.location='../vistas/perfil_supervisor.php'; </script>";
        exit(); 

    }
    /**
     * si la consulta es a un vigilante y hay datos
    */
    else if(mysqli_num_rows($vigilante) == 1)  {
        /**
         * inicia una sesion 
         * $fila2   alamcena la consulta del vigilante
         * 'vigi'   almacena los datos de un vigilante
         * direcciona al perfil respectivo 
        */
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