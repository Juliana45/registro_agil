<?php
/**
 * Recuperar clave
 * 
 * incluye el archivo donde se encuentra la conexion a la base de datos
 */
include '../conexi/conexion.php';

/**
 * si le dio clic en el boton 'enviar' del formulario recuperar clave en formulario.php 
 */
 if (isset($_POST['enviar'])) {
    
    /**
     * se compara si las claves ingresadas en el formulario recuperar clave 
     * en formulario.php son iguuales
     */
    if ($_POST['clave'] == $_POST['clave2']) {
        
        /**
         * se definen tres variables para capturar la informacion del input 
         * del formulario recuperar clave en formulario.php
         * 
         * @var string $clave
         * @var string $clave2
         * @var string $correo
         */
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