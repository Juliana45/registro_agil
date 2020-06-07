<?php

/**
 * Activar o descativar vigilantes
 * 
 * incluye el archivo donde se encuentra la conexion a la base de datos
 */
include '../conexi/conexion.php';

/**
 * obtiene la variable get
 *
 * isset             verifica que una variable si esta definida.
 * $_GET             Obtiene la variable desactivar que se envia por la url desde el archivo lista_vigilantes.php
 * desactivar        almacena el numero de documento del vigilante seleccionado
 *
 * si se resive el numero de documento enviado por la url desde el archivo lista_vigilantes.php          
 */
if (isset($_GET["desactivar"])) {

     /**
      * @var String $id          Almacena el dato enviado por la url desde el archivo lista_vigilantes.php            
      */   
     $id=$_GET['desactivar'];

     /**
     * consulta a la base de datos
     * 
     * @var String $conexion    se estan cambiando el estado del vigilante seleccionado dentro de la plataforma en la 
     *                          base de datos
     */
     $conexion->query("UPDATE tbl_personas SET estado_persona ='Inactivo' WHERE numero_documento_persona='$id' ");
     
     /**
     * se redirecciona al perfil del usuario
     */
     header('Location: ../vistas/perfil_supervisor.php');

/**
 * obtiene la variable get
 *
 * isset             verifica que una variable si esta definida.
 * $_GET             Obtiene la variable activar que se envia por la url desde el archivo lista_vigilantes.php
 * activar           almacena el numero de documento del vigilante seleccionado
 *
 * si se resive el numero de documento enviado por la url desde el archivo lista_vigilantes.php         
 */    
}elseif (isset($_GET["activar"])) {
     /**
      * @var String $id          Almacena el dato enviado por la url desde el archivo lista_vigilantes.php            
      */ 
     $id=$_GET['activar'];
    
     /**
     * consulta a la base de datos
     * 
     * @var String $conexion    se estan cambiando el estado del vigilante seleccionado dentro de la plataforma en la 
     *                          base de datos
     */
     $conexion->query("UPDATE tbl_personas SET estado_persona ='activo' WHERE numero_documento_persona='$id' ");
     
     /**
     * se redirecciona al perfil del usuario
     */
     header('Location: ../vistas/perfil_supervisor.php');
}
?>