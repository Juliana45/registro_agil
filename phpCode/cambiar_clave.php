<?php

include '../conexi/conexion.php';

/**
 * Recuperar clave
 * 
 *'enviar' se esta verificando que si se le haya dadon click en el boton enviar 
 *
 * se definen tres variables para capturar la informacion del input
 * @var string $clave
 * @var string $clave2
 * @var string $correo
 */

if (isset($_POST['enviar'])) {
    /**
     * se compara si las claves son iguales
     */
    if ($_POST['clave'] == $_POST['clave2']) {
        $clave = trim($_POST['clave']);
        $clave2= trim($_POST['clave2']); 
        $correo= trim($_POST['correo']);

        /**
         * se realiza la consulta a la base de datos para actualizar los datos
        */
        mysqli_query($conexion,"UPDATE tbl_personas SET clave_persona= SHA('$clave') WHERE correo_persona='$correo'");
        
        echo '<script>alert("Los datos se actualizaron correctamente") ;</script>';
        echo "<script>window.location='../index.php';</script>"; 
    }else{
       echo '<script>alert("Complete los campos") ;</script>';
       echo "<script>window.location='../formulario.php';</script>";
    }
}

?>