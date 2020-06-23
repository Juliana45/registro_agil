<?php

/**
 * Editar la informacion de los elementos del vigilante
 * 
 * incluye el archivo donde se encuentra la conexion a la base de datos
 * incluye el archivo del perfil del vigilante
 */
include "../conexi/conexion.php";
include "../vistas/perfil_vigilante.php";

/**
 * si le dio clic en el boton 'registro_ele' del formulario actualizar informacion del elemento 
 * del vigilante, en el archivo editar_elemento_vigilante.php 
 */
if(isset($_POST['registro_ele'])) {
    
    /**
     * strlen    Obtener la longitud de una cadena string
     * 
     * si todos los campos del formulario actualizar informacion del elemento del vigilante, 
     * en el archivo editar_elemento_vigilante.php estan llenos 
     */
    if(strlen($_POST['numero_serial']) >=1 && strlen($_POST['nombre']) >=1 && strlen($_POST['descripcion']) >=1){

        /**
         * trim      eliminar espacios en blanco u otros caracteres al inicio y final de una cadena de texto
         * 
         * se definen las variables para capturar la informacion de los input del formulario 
         * actualizar informacion del elemento del vigilante, en el archivo editar_elemento_vigilante.php
         * @var String $numero_serial
         * @var String $nombre
         * @var String $descripcion
         * @var String $foto            nombre original del archivo en la maquina del usuario
         * @var String $ruta            nombre del archivo en el cual se almacena el archivo subida al servidor
         * @var String $destido         ruta donde se guarda el archivo
         * copy                         se copie lo que se esta almacenando en $ruta y $destino en la base de datos   
         */
        $numero_serial = trim($_REQUEST['numero_serial']);
        $nombre = trim($_REQUEST['nombre']);
        $descripcion = trim($_REQUEST['descripcion']);
        $foto = $_FILES['foto'] ['name'] ;
        $ruta =$_FILES['foto'] ['tmp_name'];
        $destino = "../img/".$foto;
        copy($ruta,$destino);
   
        /**
         * se realiza la consulta a la base de datos para actualizar los datos
         */
        mysqli_query($conexion,"UPDATE tbl_elementos SET nombre_elemento='$nombre',descripcion_elemento='$descripcion',
        foto_elemento='$foto' WHERE numero_serial_elemento='$numero_serial'");
        
            /**
             * se agrega la libreria sweerAlert2
             */
            echo    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>';
            /**
             * se incluye el archivo donde estan las alertas
             */
            echo    '<script src="../js/alertas.js"></script>';
            /**
             * se llama la alerta con la funcion perfilVigilanteActualizar
             */
            echo    "<script language = javascript> perfilVigilanteActualizar(); </script>";
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
         * se llama la alerta con la funcion perfilVigilanteError
         */
        echo    "<script language = javascript> perfilVigilanteError(); </script>";
   }
   
} 
?>