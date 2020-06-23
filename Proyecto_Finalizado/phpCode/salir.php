<?php

/**
 * Cerrar sesion
 * 
 * incluye el archivo donde se encuentra la conexion a la base de datos
 */
include '../conexi/conexion.php';

/**
 * session_start()      inicia o continua una sesion
 */
session_start();

/**
 * session_destroy()    destruye la informacion de la sesion iniciada
 */
session_destroy();

/**
 * direcciona al respectivo index 
 */

echo "<script>window.location='../index.php';</script>"

?>