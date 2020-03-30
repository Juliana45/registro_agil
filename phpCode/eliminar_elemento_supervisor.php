<?php
include '../conexi/conexion.php';

        
        if (isset($_GET["desactivar"])) {
    
        $id=$_GET['desactivar'];
        $conexion->query("UPDATE tbl_elementos SET estado_elemento ='0' WHERE numero_serial_elemento='$id' ");
        header('Location: ../vistas/perfil_supervisor.php');
    
        }
?>