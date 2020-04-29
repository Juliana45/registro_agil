<?php

include "../vistas/perfil_supervisor.php";
include  "../conexi/conexion.php";

/**
 * codigo insertar elemento del supervisor
 * 
 * strlen    Obtener la longitud de una cadena string
 * trim      eliminar espacios en blanco u otros caracteres al inicio y final de una cadena de texto
 *'registro_ele'     se esta verificando que si se le haya dado click en el boton registro_ele 
 * 
 * @var int $id     almacena la sesion iniciada
 * @var string $estado     almacena el estado del elemento(activo)
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
    if(strlen($_POST['numero_serial']) >=1 && strlen($_POST['nombre']) >=1 && strlen($_POST['descripcion'])>=1){

        $id = $_SESSION['super'];
        $estado='1';
        $numero_serial = trim($_REQUEST['numero_serial']);
        $nombre = trim($_REQUEST['nombre']);
        $descripcion = trim($_REQUEST['descripcion']);
        $foto = $_FILES['foto'] ['name'] ;
        $ruta =$_FILES['foto'] ['tmp_name'];
        $destino = "../img/".$foto;
        copy($ruta,$destino);

        /**
         * @var $insertar       almacena los datos insertados
         * @var $resultado      realiza la consulta a la base de datos 
        */
        $insertar = "INSERT INTO tbl_elementos(numero_serial_elemento,nombre_elemento,descripcion_elemento,foto_elemento,
        numero_documento_persona,estado_elemento) VALUES('$numero_serial','$nombre','$descripcion','$destino','$id','$estado')";
        $resultado = mysqli_query($conexion,$insertar);
    
            /**
             * si la consulta a la base de datos se hizo correctamente
             */
			if ($resultado) {
                echo '<script>alert("Los datos se ingresaron correctamente") ;</script>';
                echo "<script>window.location='../vistas/perfil_supervisor.php';</script>";
			}else{
				echo '<script>alert("Ese numero serial ya ha sido registrado") ;</script>';
                echo "<script>window.location='../vistas/perfil_supervisor.php';</script>";
			}
    
    }else{
       echo '<script>alert("Complete los campos") ;</script>';
       echo "<script>window.location='../vistas/perfil_supervisor.php';</script>";
    }
} 
?>