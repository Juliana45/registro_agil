<?php

include "../vistas/perfil_vigilante.php";
include  "../conexi/conexion.php";

if(isset($_POST['Guardar'])) {
    if(strlen($_POST['documento']) >=1  && strlen($_POST['numero_serial']) >=1 && strlen($_POST['nombre']) >=1 && strlen($_POST['descripcion'])>=1){

        $documento = $_POST['documento'];
        $numero_serial = trim($_REQUEST['numero_serial']);
        $nombre = trim($_REQUEST['nombre']);
        $descripcion = trim($_REQUEST['descripcion']);
        $foto = $_FILES['foto'] ['name'] ;
        $ruta =$_FILES['foto'] ['tmp_name'];
        $destino = "../img/".$foto;
        copy($ruta,$destino);
   
        $insertar = "INSERT INTO tbl_elementos(numero_serial_elemento,nombre_elemento,descripcion_elemento,foto_elemento,numero_documento_persona) VALUES('$numero_serial','$nombre','$descripcion','$destino','$documento')";
            
        $resultado = mysqli_query($conexion,$insertar);

			if ($resultado) {
                echo '<script>alert("Los datos se ingresaron correctamente") ;</script>';
                echo "<script>window.location='../vistas/verificacion.php#openModal1';</script>";
			}else{
				echo '<script>alert("Ese numero serial ya ha sido registrado") ;</script>';
                echo "<script>window.location='../vistas/verificacion.php#openModal1';</script>";
			}
    }else{
       echo '<script>alert("Complete los campos") ;</script>';
       echo "<script>window.location='../vistas/verificacion.php#openModal1';</script>";
    }
} 
?>