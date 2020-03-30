<?php

include "../vistas/verificacion.php";
include  "../conexi/conexion.php";

if(isset($_POST['registro_ele'])) {
    if(strlen($_POST['documento']) >=1 && strlen($_POST['nombre']) >=1 && strlen($_POST['descripcion'])>=1){

        $documento = trim($_REQUEST['documento']);
        $estado='1';
        $nombre = trim($_REQUEST['nombre']);
        $descripcion = trim($_REQUEST['descripcion']);
        $foto = $_FILES['foto'] ['name'] ;
        $ruta =$_FILES['foto'] ['tmp_name'];
        $destino = "../img/".$foto;
        copy($ruta,$destino);
        $codigo = date('is');
        
        $insertar = "INSERT INTO tbl_elementos(numero_serial_elemento,nombre_elemento,descripcion_elemento,foto_elemento,
        numero_documento_persona,estado_elemento) VALUES
        ('$codigo','$nombre','$descripcion','$destino','$documento','$estado')";
         
        $resultado = mysqli_query($conexion,$insertar);
        
            if ($resultado) {
                echo '<script>alert("Los datos se ingresaron correctamente") ;</script>';
                echo "<script>window.location='../vistas/verificacion.php';</script>";
			}else{
				echo '<script>alert("Ese numero serial ya ha sido registrado") ;</script>';
                echo "<script>window.location='../vistas/verificacion.php';</script>";
            }        
    }else{
        echo '<script>alert("Complete los campos") ;</script>';
        echo "<script>window.location='../vistas/perfil_usuario.php';</script>";
    }
} 
?>