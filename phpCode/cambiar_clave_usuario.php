<?php

include '../conexi/conexion.php';

if (isset($_POST['enviar'])) {

	
		if ($_POST['clave'] == $_POST['clave2']) {

            $documento = trim($_REQUEST['documento']);
            $clave = trim($_POST['clave']);
            $clave2= trim($_POST['clave2']); 
            

            mysqli_query($conexion,"UPDATE tbl_personas SET clave_persona=SHA('$clave') WHERE numero_documento_persona='$documento'");

            echo '<script>alert("Los datos se actualizaron correctamente") ;</script>';
            echo "<script>window.location='../vistas/perfil_usuario.php';</script>";  
        }else{
       echo '<script>alert("Complete los campos") ;</script>';
       echo "<script>window.location='../formulario.php';</script>";
       }
	}

?>