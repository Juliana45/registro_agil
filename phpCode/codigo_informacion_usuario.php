<?php

/**
 * Actualizar informacion del usuario
 * 
 * incluye el archivo donde se encuentra la conexion a la base de datos
 * incluye el archivo del perfil del usuario
 */
include "../conexi/conexion.php";
include "../vistas/perfil_usuario.php";

/**
 * si le dio clic en el boton 'guardar' del formulario actualizar informacion en perfil_usuario.php 
 */
if(isset($_POST['guardar'])){
    
    /**
<<<<<<< HEAD
     * strlen    Obtener la longitud de una cadena string
     * 
     * si todos los campos del formulario actualizar informacion en perfil_usuario.php estan llenos 
     */
=======
     * si todos los campos estan llenos 
    */
>>>>>>> 82f929c72a75f7128708a6e9fe739d3f61c44ea8
    if ( strlen($_POST['nombre1']) >=1 && strlen($_POST['apellido1']) >=1 && strlen($_POST['apellido2']) >=1 && 
    strlen($_POST['tipo']) >=1 ) {

        /**
         * trim      eliminar espacios en blanco u otros caracteres al inicio y final de una cadena de text
         * 
         * se definen las variables para capturar la informacion de los input del formulario 
         * actualizar informacion en perfil_usuario.php
         * @var String $numero_documento
         * @var String $nombre1
         * @var String $nombre2
         * @var String $apellido1
         * @var String $apellido2
         * @var String $tipo_documento
         * @var String $foto        nombre original del archivo en la maquina del usuario
         * @var String $ruta        nombre del archivo en el cual se almacena el archivo subida al servidor
         * @var String $destido     ruta donde se guarda el archivo
         * copy                     se copie lo que se esta almacenando en $ruta y $destino en la base de datos
         */
        $documento = trim($_REQUEST['documento']);
        $nombre1 = trim($_REQUEST['nombre1']);
        $nombre2 = trim($_REQUEST['nombre2']);
        $apellido1 = trim($_REQUEST['apellido1']);
        $apellido2 = trim($_REQUEST['apellido2']);
        $tipo_documento = trim($_REQUEST['tipo']);
        $foto = $_FILES['foto'] ['name'] ;
        $ruta =$_FILES['foto'] ['tmp_name'];
    	$destino = "../img/".$foto;
    	copy($ruta,$destino);

        /**
         * se realiza la consulta a la base de datos para actualizar la informacion
         */
        mysqli_query($conexion,"UPDATE tbl_personas SET nombre1_persona='$nombre1',nombre2_persona='$nombre2',
        apellido1_persona='$apellido1',apellido2_persona='$apellido2',tipo_documento_persona='$tipo_documento',
        foto_persona = '$destino' WHERE numero_documento_persona = '$documento' ");

        echo    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>';
        echo    '<script src="../js/alertas.js"></script>';
        echo    "<script language = javascript>  perfilUsuario(); </script>";
    }else{
        echo    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>';
        echo    '<script src="../js/alertas.js"></script>';
        echo    "<script language = javascript>  perfilUsuarioCompletarDatos(); </script>";
    }
}
?>  