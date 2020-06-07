<?php

/**
 * Login
 * 
 * incluye el archivo donde se encuentra la conexion a la base de datos
 * incluye el archivo del index
 */
include '../conexi/conexion.php';
include "../index.php";

 /**
  * si le da clic en el boton 'iniciar' del formulario login en index.php
  */
if (isset($_POST['iniciar'])) { 

    /**
     * se definen las variables para capturar la informacion de los input del formulario login en index.php
     * @var String $tipo_documento
     * @var String $documento
     * @var String $clave
     */
    $tipo_documento = $_POST['tipo_documento'];
    $documento =$_POST['documento2'];
    $clave = $_POST['clave'];

    /**
     * sha1()                       transforma un dato ingresado en una nueva serie de caracteres(encripta la clave)
     * @var String $encriptada      almacena la clave encriptada 
     */
    $encriptada = sha1($clave);

    /**
     * consulta a la base de datos
     * 
     * se realiza la consulta a la base de datos donde el numero de documento y clave sea igual a la previamente 
     * registrada en la plataforma y el rol sea usuario 
     */
    $usuario = mysqli_query($conexion,"SELECT * FROM  tbl_personas WHERE tipo_documento_persona ='$tipo_documento'
     AND numero_documento_persona ='$documento' AND clave_persona='$encriptada' AND rol_persona ='usuario'");

    /** 
     * se realiza la consulta a la base de datos donde el numero de documento y clave sea igual a la previamente 
     * registrada en la plataforma y el rol sea supervisor 
     */
    $supervisor = mysqli_query($conexion,"SELECT * FROM tbl_personas WHERE tipo_documento_persona='$tipo_documento' 
    AND numero_documento_persona = '$documento' AND clave_persona = '$clave' AND rol_persona='supervisor'");

    /** 
     * se realiza la consulta a la base de datos donde el numero de documento y clave sea igual a la previamente 
     * registrada en la plataforma, estado sea activo y el rol sea vigilante
     */
    $vigilante = mysqli_query($conexion,"SELECT * FROM tbl_personas WHERE tipo_documento_persona ='$tipo_documento'
    AND numero_documento_persona='$documento' AND clave_persona='$encriptada' AND rol_persona='vigilante' 
    AND estado_persona='activo' ");

    /**
     * si la consulta es a un usuario y hay datos
    */
    if(mysqli_num_rows($usuario) == 1) {
        /**
         * session_start        inicia una sesion 
         * @var $fila           almacena la consulta del usuario
         * $_SESSION['user']    almacena el numero de documento del usuario
        */
        session_start();
            $fila = mysqli_fetch_array($usuario);
            $_SESSION['user'] = $fila['numero_documento_persona'];

            /**
             * direcciona al respectivo perfil del usuario  
             */
            echo "<script> window.location='../vistas/perfil_usuario.php'; </script>";
        
        /**
         * finaliza la ejecucion del script
         */
        exit(); 

    }

    /**
     * si la consulta es a un supervisor y hay datos
    */
    else if(mysqli_num_rows($supervisor) == 1) {
        /**
         * session_start        inicia una sesion 
         * @var $fila           almacena la consulta del supervisor
         * $_SESSION['user']    almacena el numero de documento del supervisor
        */
        session_start();
            $fila1 = mysqli_fetch_array($supervisor);
            $_SESSION['super'] = $fila1['numero_documento_persona'];

            /**
             * direcciona al respectivo perfil del usuario  
             */
            echo "<script> window.location='../vistas/perfil_supervisor.php'; </script>";
        
        /**
         * finaliza la ejecucion del script
         */
        exit(); 
    }

    /**
     * si la consulta es a un vigilante y hay datos
    */
    else if(mysqli_num_rows($vigilante) == 1)  {

        /**
         * session_start        inicia una sesion 
         * @var $fila           almacena la consulta del vigilante
         * $_SESSION['user']    almacena el numero de documento del vigilante
        */
        session_start();
            $fila2 = mysqli_fetch_array($vigilante);
            $_SESSION['vigi'] = $fila2['numero_documento_persona'];

            /**
             * direcciona al respectivo perfil del usuario  
             */
            echo "<script> window.location='../vistas/perfil_vigilante.php'; </script>";
        
        /**
         * finaliza la ejecucion del script
         */
        exit();

}else {
    echo    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>';
    echo    '<script src="../js/alertas.js"></script>';
    echo    "<script language = javascript>  login(); </script>";
}

}
?>