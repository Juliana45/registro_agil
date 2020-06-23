<?php
/**
 * Recuperar clave
 * 
 * incluye el archivo donde se encuentra la conexion a la base de datos
 * incluye el archivo con el formulario de recuperar contraseña
 */
include '../conexi/conexion.php';
include "../vistas/formulario.php";

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
        
            /**
             * se agrega la libreria sweerAlert2
             */
            echo    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>';
            /**
             * se incluye el archivo donde estan las alertas
             */
            echo    '<script src="../js/alertas.js"></script>';
            /**
             * se llama la alerta con la funcion recuperarClave
             */
            echo    "<script language = javascript> recuperarClave(); </script>"; 
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
         * se llama la alerta con la funcion recuperarClaveCompleteDatos
         */
        echo    "<script language = javascript> recuperarClaveCompleteDatos(); </script>"; 
    }
}
?>