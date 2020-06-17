<?php
include "../conexi/conexion.php";

/**
 * codigo actualizar informacion del usuario
 * 
 * strlen    Obtener la longitud de una cadena string
 * trim      eliminar espacios en blanco u otros caracteres al inicio y final de una cadena de texto
 *'guardar'     se esta verificando que si se le haya dado click en el boton guardar
 * 
 * se definen las variables para capturar la informacion de los input
 * @var string $numero_documento
 * @var string $nombre1
 * @var string $nombre2
 * @var string $apellido1
 * @var string $apellido2
 * @var string $tipo_documento
 * @var string $foto 
 */

if(isset($_POST['guardar'])){
    /**
     * si todos los campos estan llenos 
    */
    if ( strlen($_POST['nombre1']) >=1 && strlen($_POST['apellido1']) >=1 && strlen($_POST['apellido2']) >=1 && 
    strlen($_POST['tipo']) >=1 ) {

        $documento = trim($_REQUEST['documento']);
        $nombre1 = trim($_REQUEST['nombre1']);
        $nombre2 = trim($_REQUEST['nombre2']);
        $apellido1 = trim($_REQUEST['apellido1']);
        $apellido2 = trim($_REQUEST['apellido2']);
        $tipo_documento = trim($_REQUEST['tipo']);
        $foto = $_FILES['foto'] ['name'] ;
        $ruta =$_FILES['foto'] ['tmp_name'];
    	$destino = "../img/".$foto;
    	copy($ruta,$destino);

        /**
         * se realiza la consulta a la base de datos para actualizar los datos
        */
        mysqli_query($conexion,"UPDATE tbl_personas SET nombre1_persona='$nombre1',nombre2_persona='$nombre2',
        apellido1_persona='$apellido1',apellido2_persona='$apellido2',tipo_documento_persona='$tipo_documento',
        foto_persona = '$destino' WHERE numero_documento_persona = '$documento' ");

            echo '<script>alert("Los datos se actualizaron correctamente") ;</script>';
            echo "<script>window.location='../vistas/perfil_usuario.php';</script>";
    }else{
        echo '<script>alert("Complete los campos") ;</script>';
        echo "<script>window.location='../vistas/perfil_usuario.php';</script>";
    }
}
?>  