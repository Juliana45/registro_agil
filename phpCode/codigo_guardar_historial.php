<?php

include  "../conexi/conexion.php";


if(isset($_GET["ingreso"])){

    date_default_timezone_set("America/Colombia");
    $hora = time(); 
    $hora=date ("Y-m-d H:i:s",$hora);
    $id = $_GET["ingreso"];
    $conexion->query("INSERT INTO tbl_historial(numero_serial_elemento, hora_ingreso_historial) VALUES ('$id', '$hora')");

    header('Location: ../vistas/verificacion.php');

    }elseif(isset($_GET["salida"])){ 
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