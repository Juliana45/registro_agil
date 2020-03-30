<?php

include '../conexi/conexion.php';

if (isset($_POST['enviar'])) {

	
		if ($_POST['clave'] == $_POST['clave2']) {

            $clave = trim($_POST['clave']);
            $clave2= trim($_POST['clave2']); 
            $correo= trim($_POST['correo']);

            mysqli_query($conexion,"UPDATE tbl_personas SET clave_persona= SHA('$clave')
            WHERE correo_persona='$correo'");
            echo '<script>alert("Los datos se actualizaron correctamente") ;</script>';
            echo "<script>window.location='../index.php';</script>"; 
        }else{
       echo '<script>alert("Complete los campos") ;</script>';
       echo "<script>window.location='../formulario.php';</script>";
       }
	}

?>