<?php

/**
 * Guardar informacion del elemento en el hsitorial
 * 
 * incluye el archivo donde se encuentra la conexion a la base de datos
 */
include  "../conexi/conexion.php";

/**
 * obtiene la variable get
 *
 * isset             verifica que una variable si esta definida.
 * $_GET             Obtiene la variable ingreso que se envia por la url desde el archivo verificacion.php
 * ingreso           almacena el numero serial del elemento
 *
 * si se resive el numero serial del elemento enviado por la url desde archivo verificacion.php          
 */
if(isset($_GET["ingreso"])){


    /**
     * date_default_timezone_set    define zona horaria 
     * @var String $id      Almacena el dato enviado por la url desde el archivo verificacion.php
     * 
     * time()               devuelve la hora actual medida como el número de segundos desde el 1 de Enero de 1970
     * date()               transformar el time en el formato de fecha que se le idique 
     * 
     * @var date $hora      almacena la fecha y hora generada
     */
    date_default_timezone_set("America/Colombia");
    $id = $_GET["ingreso"];
    $hora = time(); 
    $hora = date ("Y-m-d H:i:s",$hora);
    
    /**
     * consulta a la base de datos
     * 
     * @var String $conexion    se estan insertando los datos generados y el estado del boton(activo) a la base de datos
     */
    $conexion -> query("INSERT INTO tbl_historial(numero_serial_elemento, hora_ingreso_historial, estado_boton) VALUES 
    ('$id', '$hora', 1)");

    /**
     * @var String $conexion    se estan cambiando el estado en el que se encuentra el boton a desactivo en la base de datos
     */
    $conexion -> query("UPDATE tbl_historial SET estado_boton = 0 WHERE numero_serial_elemento = '$id' ");
    
    /**
     * se redirecciona al perfil del usuario
     */
    header('Location: ../vistas/verificacion.php');

/**
 * obtiene la variable get
 *
 * isset             verifica que una variable si esta definida.
 * $_GET             Obtiene la variable ingreso que se envia por la url desde el archivo verificacion.php
 * ingreso           almacena el numero serial del elemento
 *
 *  si se resive el numero serial del elemento enviado por la url desde archivo verificacion.php           
 */
}elseif(isset($_GET["salida"])){ 
    /**
     * date_default_timezone_set    define zona horaria 
     * @var String $id      Almacena el dato enviado por la url desde el archivo verificacion.php
     * 
     * time()               devuelve la hora actual medida como el número de segundos desde el 1 de Enero de 1970
     * date()               transformar el time en el formato de fecha que se le idique 
     * 
     * @var date $hora      almacena la fecha y hora generada
     */
    date_default_timezone_set("America/Colombia");
    $id = $_GET["salida"];
    $hora = time(); 
    $hora=date ("Y-m-d H:i:s",$hora);
        
    /**
     * consulta a la base de datos
     * 
     * @var String $conexion    se estan insertando los datos generados a la base de datos
     */
    $conexion->query("INSERT INTO tbl_historial(numero_serial_elemento, hora_salida_historial) VALUES ('$id', '$hora')");

    /**
     * @var String $conexion    se estan cambiando el estado en el que se encuentra el boton a activo en la basse de datos
     */
    $conexion->query("UPDATE tbl_historial SET estado_boton = 1 WHERE numero_serial_elemento = '$id' ");

        /**
         * se redirecciona a la verificacion
         */
        header('Location: ../vistas/verificacion.php');

}else{ 
        /**
         * se redirecciona a la verificacion
         */
        header('Location: ../vistas/verificacion.php');
    }
?>