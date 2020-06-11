<?php

/**
 * Insertar elemento del visitante
 * 
 * incluye el archivo donde se encuentra la conexion a la base de datos
 * incluye el archivo de la vista de la verificacion
 */
include  "../conexi/conexion.php";
include "../vistas/verificacion.php";

/**
 * si le dio clic en el boton 'Guardar' del formulario registro elemento en verificacion.php 
 */
if(isset($_POST['Guardar'])) {
    
    /**
     * strlen    Obtener la longitud de una cadena string
     * 
     * si todos los campos del formulario registro elemento en verificacion.php estan llenos 
     */
    if(strlen($_POST['documento']) >=1  && strlen($_POST['numero_serial']) >=1 && strlen($_POST['nombre']) >=1 &&
    strlen($_POST['descripcion'])>=1){

        /**
         * trim      eliminar espacios en blanco u otros caracteres al inicio y final de una cadena de texto
         * 
         * @var String $estado          almacena el estado del elemento(activo)
         * 
         * se definen las variables para capturar la informacion de los input del formulario 
         * registro elemento en verificacion.php
         * @var String $documento
         * @var String $numero_serial
         * @var String $nombre
         * @var String $descripcion
         * @var String $foto            nombre original del archivo en la maquina del usuario
         * @var String $ruta            nombre del archivo en el cual se almacena el archivo subido al servidor
         * @var String $destido         ruta donde se guarda el archivo
         * copy                         se copie lo que se esta almacenando en $ruta y $destino en la base de datos
         */
        
        $estado='1';
        $documento = $_POST['documento'];
        $numero_serial = trim($_REQUEST['numero_serial']);
        $nombre = trim($_REQUEST['nombre']);
        $descripcion = trim($_REQUEST['descripcion']);
        $foto = $_FILES['foto'] ['name'] ;
        $ruta =$_FILES['foto'] ['tmp_name'];
        $estado='1';
        $destino = "../img/".$foto;
        copy($ruta,$destino);
        
        /**
         * consulta a la base de datos
         * 
         * @var String $insertar        se estan insertando los datos ingresados en el formulario registro elemento en 
         *                              verificacion.php a la base de datos
         * @var String $resultado       verifica si la consulta a la base de datos fue correcta
         */
        $insertar = "INSERT INTO tbl_elementos(numero_serial_elemento,nombre_elemento,descripcion_elemento,foto_elemento,
        numero_documento_persona,estado_elemento) VALUES('$numero_serial','$nombre','$descripcion','$destino','$documento','$estado')";    

        $resultado = mysqli_query($conexion,$insertar);

            /**
             * si la consulta a la base de datos se hizo correctamente
             */
			if ($resultado) {
                echo    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>';
                echo    '<script src="../js/alertas.js"></script>';
                echo    "<script language = javascript>  visitante(); </script>";
			}else{
				echo    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>';
                echo    '<script src="../js/alertas.js"></script>';
                echo    "<script language = javascript>  visitante_serial_registrado(); </script>";
			}
    }else{
        echo    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>';
        echo    '<script src="../js/alertas.js"></script>';
		echo    "<script language = javascript>  visitante_complete_campos(); </script>";
    }
} 
?>