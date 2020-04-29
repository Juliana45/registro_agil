<?php

include '../conexi/conexion.php';
     /**
     * obtiene la variable get
     *
     * isset            verifica que la sesion si este definida.
     * $_GET            Obtiene el numero de documento del vigilante en la varibale desativar. 
     *            
     */
        if (isset($_GET["desactivar"])) {
     /**
     * consulta a la base de datos
     *
     * @var string $id          Almacena el numero de documento del vigilante.
     * @var string $conexion    Realiza la consulta a la base de datos y cambia el estado 
     *							del elemento a 0.
     *            
     */
        $id=$_GET['desactivar'];
        $conexion->query("UPDATE tbl_elementos SET estado_elemento ='0' WHERE numero_serial_elemento='$id' ");
        header('Location: ../vistas/perfil_vigilante.php');
    
        }

?>