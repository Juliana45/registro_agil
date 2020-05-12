<?php

include '../conexi/conexion.php';

/**
 * Cambio de clave usuario
 * 
 *'enviar' se esta verificando que si se le haya dadon click en el boton enviar 
 * 
 * se definen tres variables para capturar la informacion del input
 * @var string $documento
 * @var string $clave 
 * @var string $clave2
 */

if (isset($_POST['enviar'])) {
    /**
     * se compara si las claves son iguuales
     */
    if ($_POST['clave'] == $_POST['clave2']) {
        $documento = trim($_REQUEST['documento']);
        $clave = trim($_POST['clave']);
        $clave2= trim($_POST['clave2']);

        /**
         * se realiza la consulta a la base de datos para actualizar los datos
        */    
        mysqli_query($conexion,"UPDATE tbl_personas SET clave_persona=SHA('$clave') WHERE numero_documento_persona='$documento'");

            echo '<script>alert("Los datos se actualizaron correctamente") ;</script>';
            echo "<script>window.location='../vistas/perfil_usuario.php';</script>";  
    }else{
       echo '<script>alert("Las contraseñas deben estar igual") ;</script>';
       echo "<script>window.location='../vistas/perfil_usuario.php';</script>";
    }
}

?>