<?php

include '../conexi/conexion.php';
 
if (isset($_GET["desactivar"])) {
    
    $id=$_GET['desactivar'];
    $conexion->query("UPDATE tbl_personas SET estado_persona ='Inactivo' WHERE numero_documento_persona='$id' ");
    header('Location: ../vistas/perfil_supervisor.php');

}elseif (isset($_GET["activar"])) {

    $id=$_GET['activar'];
    $conexion->query("UPDATE tbl_personas SET estado_persona ='activo' WHERE numero_documento_persona='$id' ");
    header('Location: ../vistas/perfil_supervisor.php');
}
?>