<?php

/**
 * Eliminar elemento del supervisor
 * 
 * incluye el archivo donde se encuentra la conexion a la base de datos
 */
include '../conexi/conexion.php';
   
   /**
    * obtiene la variable get
    *
    * isset             verifica que una variable si esta definida.
    * $_GET             Obtiene la variable desactivar que se envia por la url desde el archivo elemento_supervisor.php
    * desactivar        almacena el numero serial del elemento
    *
    * si se resive el numero serial del elemento enviado por la url desde el archivo elemento_supervisor.php                    
    */
   if (isset($_GET["desactivar"])) {

      /**
       * @var String $id            Almacena el dato enviado por la url desde el archivo elemento_supervisor.php
       */
      $id=$_GET['desactivar'];

      /**
       * consulta a la base de datos
       *
       * @var String $conexion      Realiza la consulta a la base de datos y cambia el estado del elemento a 0.        
       */
      $conexion->query("UPDATE tbl_elementos SET estado_elemento ='0' WHERE numero_serial_elemento='$id' ");

      /**
       * se redirecciona al perfil del supervisor
       */
      header('Location: ../vistas/perfil_supervisor.php');
    
   }
?>