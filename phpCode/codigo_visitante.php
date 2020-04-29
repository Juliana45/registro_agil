<?php
include "../conexi/conexion.php";

/**
 * codigo registrar visitante
 * 
 * strlen    Obtener la longitud de una cadena string
 * trim      eliminar espacios en blanco u otros caracteres al inicio y final de una cadena de texto
 *'siguiente'     se esta verificando que si se le haya dado click en el boton siguiente
 * 
 * @var string $visitante 	almacena el rol (usuario)
 * 
 * se definen las variables para capturar la informacion de los input
 * @var string $documento
 * @var string $nombre1
 * @var string $nombre2
 * @var string $apellido1
 * @var string $apellido2
 * @var string $tipo_documento
 * @var string $clave
 * @var string $clave2
 */

if (isset($_POST['siguiente'])) {
	/**
	 * si los campos estan llenos
	 */
	if (strlen($_POST['nombre1']) >=1 &&  strlen($_POST['apellido1']) >=1 && strlen($_POST['apellido2']) >=1 && 
	strlen($_POST['tipo']) >=1 && strlen($_POST['documento_e']) >=1 && strlen($_POST['clave_e']) >=1) {
		/**
		 * se compara que las claves esten iguales
		 */
		if ($_POST['clave_e'] == $_POST['clave2']) {
			
			$visitante = "usuario";
			$documento = trim($_POST['documento_e']) ;
			$nombre1 = trim($_POST['nombre1']);
			$nombre2 = trim($_POST['nombre2']);
			$apellido1 = trim($_POST['apellido1']);
			$apellido2 = trim($_POST['apellido2']);
			$tipo_documento = trim($_POST['tipo']);
			$clave = trim($_POST['clave_e']);
			$clave2= trim($_POST['clave2']); 

			/**
         	 * @var $insertar       almacena los datos insertados
        	 * @var $resultado      realiza la consulta a la base de datos 
        	*/
			$insertar = "INSERT INTO tbl_personas(numero_documento_persona,nombre1_persona,nombre2_persona,apellido1_persona,
			apellido2_persona,tipo_documento_persona,clave_persona,rol_persona) values('$documento','$nombre1','$nombre2','$apellido1',
			$apellido2','$tipo_documento',SHA('$clave'),'$visitante')";
			$resultado = mysqli_query($conexion,$insertar);

			/**
			 * si la consula a la base de datos se hizo correctamente
			 */
			if ($resultado) {
					echo '<script>alert("Los datos se ingresaron correctamente") ;</script>';
					echo "<script>window.location='../vistas/verificacion.php#openModal1';</script>";
			}else{
					echo '<script>alert("¡Ups ha ocurrido un error!") ;</script>';
					echo "<script>window.location='../vistas/verificacion.php#openModal';</script>";
			}
		}else{
			echo '<script>alert("Las contraseñas no son iguales") ;</script>';
			echo "<script>window.location='../vistas/verificacion.php#openModal';</script>";
		}
	}else{
		echo '<script>alert("Complete los campos") ;</script>';
		echo "<script>window.location='../vistas/verificacion.php#openModal';</script>";
	}

}
?>




