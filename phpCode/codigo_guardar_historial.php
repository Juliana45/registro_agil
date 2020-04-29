<?php

include  "../conexi/conexion.php";
/**
 * Condicional donde define si ingresa el elemento
 * 
 * ingreso se llama el boton que indica el ingreso del elemento
 * 
 */
if(isset($_GET["ingreso"])){

    /**
     * date_default_timezone_set define zona horaria 
     * 
     * @var time $hora          almacena la fecha y hora del ingreso
     * @var string $id          adquiere los datos de ingreso 
     * @var string $conexion    se esta almacenando la insercion de ingreso en la base de datos
     */
    date_default_timezone_set("America/Colombia");
    $hora = time(); 
    $hora=date ("Y-m-d H:i:s",$hora);
    $id = $_GET["ingreso"];
    $conexion->query("INSERT INTO tbl_historial(numero_serial_elemento, hora_ingreso_historial) VALUES ('$id', '$hora')");

    header('Location: ../vistas/verificacion.php');
    /**
     * Condicional donde define la salida el elemento
     * 
     * salida se llama el boton que indica la salida del elemento
     * 
     */
    }elseif(isset($_GET["salida"])){ 
         /**
         * date_default_timezone_set define zona horaria 
         * 
         * @var time $hora          almacena la fecha y hora de la salida
         * @var string $id          adquiere los datos de la salida 
         * @var string $conexion    se esta almacenando la insercion de la salida del elemento en la base de datos
         */
        date_default_timezone_set("America/Colombia");
        $hora = time(); 
        $hora=date ("Y-m-d H:i:s",$hora);
        $id = $_GET["salida"];
        $conexion->query("INSERT INTO tbl_historial(numero_serial_elemento, hora_salida_historial) VALUES ('$id', '$hora')");


        header('Location: ../vistas/verificacion.php');

    }else{ 
        header('Location: ../vistas/verificacion.php');
    
    }


?>