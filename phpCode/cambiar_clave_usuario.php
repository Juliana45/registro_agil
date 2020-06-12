<?php

/**
 * Cambio de clave en el perfil del usuario
 * 
 * incluye el archivo donde se encuentra la conexion a la base de datos
 * incluye el archivo del perfil del usuario
 */
include '../conexi/conexion.php';
include "../vistas/perfil_usuario.php";

/**
 * si le dio clic en el boton 'enviar' del formulario cambiar clave del perfil del usuario, en el archivo perfil_usuario.php 
 */
if (isset($_POST['enviar'])) {

    /**
     * se compara si las claves ingresadas en el formulario cambiar clave del perfil del usuario, en el archivo perfil_usuario.php son iguuales
     */
    if ($_POST['clave'] == $_POST['clave2']) {

        /**
         * trim         eliminar espacios en blanco u otros caracteres al inicio y final de una cadena de texto
         * 
         * se definen tres variables para capturar la informacion del input del 
         * formulario cambiar clave del perfil del usuario, en el archivo perfil_usuario.php
         * @var String $documento
         * @var String $clave 
         * @var String $clave2 
         */
        $documento = trim($_REQUEST['documento']);
        $clave = trim($_POST['clave']);
        $clave2= trim($_POST['clave2']);

        /**
         * se realiza la consulta a la base de datos para cambiar la clave
         */    
        mysqli_query($conexion,"UPDATE tbl_personas SET clave_persona=SHA('$clave') WHERE 
        numero_documento_persona='$documento'");

        /**
         * se agrega la libreria sweerAlert2
         */
        echo    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>';
        /**
         * se incluye el archivo donde estan las alertas
         */
        echo    '<script src="../js/alertas.js"></script>';
        /**
         * se llama la alerta con la funcion perfilUsuarioActualizar
         */
        echo    "<script language = javascript> perfilUsuarioActualizar(); </script>";
    }else{
        /**
         * se agrega la libreria sweerAlert2
         */
        echo    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>';
        /**
         * se incluye el archivo donde estan las alertas
         */
        echo    '<script src="../js/alertas.js"></script>';
        /**
         * se llama la alerta con la funcion perfilUsuarioCompletarDatos
         */
        echo    "<script language = javascript> perfilUsuarioCompletarDatos(); </script>";
    }
}
?>