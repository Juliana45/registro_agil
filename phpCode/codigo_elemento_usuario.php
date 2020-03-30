<?php

include "../vistas/perfil_usuario.php";
include  "../conexi/conexion.php";

if(isset($_POST['registro_ele'])) {
    if(strlen($_POST['numero_serial']) >=1 && strlen($_POST['nombre']) >=1 && strlen($_POST['descripcion'])>=1){

        $id = $_SESSION['user'];
        $numero_serial = trim($_REQUEST['numero_serial']);
        $nombre = trim($_REQUEST['nombre']);
        $descripcion = trim($_REQUEST['descripcion']);
        $foto = $_FILES['foto'] ['name'] ;
        $ruta =$_FILES['foto'] ['tmp_name'];
        $destino = "../img/".$foto;
        copy($ruta,$destino);
        $estado='1';
   
        $insertar = "INSERT INTO tbl_elementos(numero_serial_elemento,nombre_elemento,descripcion_elemento,foto_elemento,numero_documento_persona,estado_elemento) VALUES('$numero_serial','$nombre','$descripcion','$destino','$id','$estado')";
            
        $resultado = mysqli_query($conexion,$insertar);

			if ($resultado) {
                echo '<script>alert("Los datos se ingresaron correctamente") ;</script>';
                echo "<script>window.location='../vistas/perfil_usuario.php';</script>";
			}else{
				echo '<script>alert("Ese numero serial ya ha sido registrado") ;</script>';
                echo "<script>window.location='../vistas/perfil_usuario.php';</script>";
            }
            
    }else{
        echo '<script>alert("Complete los campos") ;</script>';
        echo "<script>window.location='../vistas/perfil_usuario.php';</script>";
    }
} 
?>