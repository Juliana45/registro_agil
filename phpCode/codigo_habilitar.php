<?php

include '../conexi/conexion.php';
      /**
     * obtiene la variable get
     *
     * isset            verifica que la sesion si este definida.
     * $_GET            Obtiene el numero de documento en la varibale desativar. 
     *            
     */
if (isset($_GET["desactivar"])) {
     /**
     * consulta a la base de datos
     *
     * @var string $id          Almacena el numero de documento.
     * @var string $conexion    Realiza la consulta a la base de datos y cambia el estado 
     *							del elemento a inativo.
     *            
     */   
    $id=$_GET['desactivar'];
    $conexion->query("UPDATE tbl_personas SET estado_persona ='Inactivo' WHERE numero_documento_persona='$id' ");
    header('Location: ../vistas/perfil_supervisor.php');
     /**
     * obtiene la variable get
     *
     * isset            verifica que la sesion si este definida.
     * $_GET            Obtiene el numero de documento en la varibale desativar. 
     *            
     */
}elseif (isset($_GET["activar"])) {
      /**
     * consulta a la base de datos
     *
     * @var string $id          Almacena el numero de documento.
     * @var string $conexion    Realiza la consulta a la base de datos y cambia el estado 
     *							del elemento a activo.
     *            
     */ 
    $id=$_GET['activar'];
    $conexion->query("UPDATE tbl_personas SET estado_persona ='activo' WHERE numero_documento_persona='$id' ");
    header('Location: ../vistas/perfil_supervisor.php');
}
?>