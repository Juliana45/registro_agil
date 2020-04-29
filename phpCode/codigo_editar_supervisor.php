<?php

include "../conexi/conexion.php";

/**
 * Editar la informacion de los elementos del supervisor
 * 
 * strlen    Obtener la longitud de una cadena string
 * trim      eliminar espacios en blanco u otros caracteres al inicio y final de una cadena de texto
 *'registro_ele'     se esta verificando que si se le haya dado click en el boton registro_ele 
 * 
 * se definen las variables para capturar la informacion de los input
 * @var string $numero_serial
 * @var string $nombre
 * @var string $descripcion
 * @var string $foto     
 */

if(isset($_POST['registro_ele'])) {
    /**
     * si todos los campos estan llenos 
     */
    if(strlen($_POST['numero_serial']) >=1 && strlen($_POST['nombre']) >=1 && strlen($_POST['descripcion']) >=1){

        $numero_serial = trim($_REQUEST['numero_serial']);
        $nombre = trim($_REQUEST['nombre']);
        $descripcion = trim($_REQUEST['descripcion']);
        $foto = $_FILES['foto'] ['name'] ;
        $ruta =$_FILES['foto'] ['tmp_name'];
        $destino = "../img/".$foto;
        copy($ruta,$destino);
   
        /**
         * se realiza la consulta a la base de datos para actualizar los datos
        */
        mysqli_query($conexion,"UPDATE tbl_elementos SET nombre_elemento='$nombre',descripcion_elemento='$descripcion',
        foto_elemento='$destino' WHERE numero_serial_elemento='$numero_serial'");
            
            echo '<script>alert("Los datos se actualizaron correctamente") ;</script>';
            header('Location: ../vistas/perfil_supervisor.php');
    }else{
        echo '<script>alert("Complete los campos") ;</script>';
        header('Location: ../vistas/perfil_supervisor.php');
    }
} 
?>