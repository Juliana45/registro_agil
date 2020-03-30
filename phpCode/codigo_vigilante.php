<?php
include "../conexi/conexion.php";

// insset nos permite evaluar si una variable está definida o no
// trim eliminar espacios en blanco u otros caracteres al inicio y final de una cadena de texto
//strlen Obtener la longitud de una cadena string

if (isset($_POST['guardar'])) {
	if (strlen($_POST['nombre1']) >=1 && strlen($_POST['nombre2']) >=1 && strlen($_POST['apellido1']) >=1 && strlen($_POST['apellido2']) >=1 && strlen($_POST['tipo']) >=1 && strlen($_POST['documento']) >=1 && strlen($_POST['clave']) >=1 && strlen($_POST['estado']) >=1) {

		if ($_POST['clave'] == $_POST['clave2']) {
			
			$vigilante = "vigilante";
			$documento = trim($_POST['documento']);
			$nombre1 = trim($_POST['nombre1']);
			$nombre2 = trim($_POST['nombre2']);
			$apellido1 = trim($_POST['apellido1']);
			$apellido2 = trim($_POST['apellido2']);
			$tipo_documento = trim($_POST['tipo']);
			$clave = trim($_POST['clave']);
			$clave2= trim($_POST['clave2']);
			$estado = trim($_POST['estado']);

		$insertar = "INSERT INTO tbl_personas(numero_documento_persona,nombre1_persona,nombre2_persona,apellido1_persona,
		apellido2_persona,tipo_documento_persona,clave_persona,rol_persona,estado_persona) values
		('$documento','$nombre1','$nombre2','$apellido1','$apellido2','$tipo_documento',SHA('$clave'),'$vigilante','$estado')";
  
			$resultado = mysqli_query($conexion,$insertar);

		if ($resultado) {
				echo '<script>alert("Los datos se ingresaron correctamente") ;</script>';
				echo "<script>window.location='../vistas/perfil_supervisor.php';</script>";
		}else{
				echo '<script>alert("¡Ups ha ocurrido un error!") ;</script>';
		}
	}else{
				echo '<script>alert("Las contraseñas no son iguales") ;</script>';
				echo "<script>window.location='../vistas/perfil_supervisor.php';</script>";
			}
		}else{
				echo '<script>alert("Complete los campos") ;</script>';
				echo "<script>window.location='../vistas/perfil_supervisor.php';</script>";
		}

}
?>




