<?php

/**
 * Registrar usuario
 * 
 * incluye el archivo donde se encuentra la conexion a la base de datos
 */
include "../conexi/conexion.php";

/**
 * si le da clic en el boton 'registro' del formulario registro en index.php
 */
if (isset($_POST['registro'])) {
	
	/**
     * strlen    Obtener la longitud de una cadena string
     * 
     * si todos los campos del formulario registro en index.php estan llenos 
     */
	if (strlen($_POST['nombre1']) >=1 && strlen($_POST['apellido1']) >=1 && strlen($_POST['apellido2']) >=1 && 
	strlen($_POST['tipo']) >=1 && strlen($_POST['documento_r']) >=1 && strlen($_POST['clave_r']) >=1 && 
	strlen($_POST['correo']) >=1 ) {

		/**
     	 * se compara si las claves ingresadas en el formulario registro en index.php son iguales
     	 */
		if ($_POST['clave_r'] == $_POST['clave2']) {

			/**
			 * trim      eliminar espacios en blanco u otros caracteres al inicio y final de una cadena de texto
			 * 
			 * @var String $usuario 	almacena el rol (usuario)
			 * 
			 * se definen las variables para capturar la informacion de los input del formulario registro en index.php
			 * @var String $documento
			 * @var String $nombre1
			 * @var String $nombre2	
			 * @var String $apellido1
			 * @var String $apellido2
			 * @var String $tipo_documento
			 * @var String $clave
			 * @var String $clave2
			 * @var String $correo 
        	 * @var String $foto    	nombre original del archivo en la maquina del usuario
        	 * @var String $ruta    	nombre del archivo en el cual se almacena el archivo subida al servidor
        	 * @var String $destido     ruta donde se guarda el archivo
        	 * copy     				se copie lo que se esta almacenando en $ruta y $destino en la base de datos 
			 */
			$usuario = "usuario";
			$documento = trim($_POST['documento_r']) ;
			$nombre1 = trim($_POST['nombre1']);
			$nombre2 = trim($_POST['nombre2']);
			$apellido1 = trim($_POST['apellido1']);
			$apellido2 = trim($_POST['apellido2']);
			$tipo_documento = trim($_POST['tipo']);
			$clave = trim($_POST['clave_r']);
			$clave2= trim($_POST['clave2']); 
			$correo=trim($_POST['correo']);
			$foto = $_FILES['foto'] ['name'] ;
        	$ruta =$_FILES['foto'] ['tmp_name'];
        	$destino = "../img/".$foto;
			copy($ruta,$destino);
			
			/**
        	 * consulta a la base de datos
        	 * 
        	 * @var String $insertar       	se estan insertando los datos ingresados en el formulario registro en 
			 * 								index.php a la base de datos
        	 * @var string  $resultado      verifica si la consulta a la base de datos fue correcta
        	 */
			$insertar = "INSERT INTO tbl_personas(numero_documento_persona,nombre1_persona,nombre2_persona,
			apellido1_persona,apellido2_persona,tipo_documento_persona,clave_persona,foto_persona,correo_persona,
			rol_persona) values('$documento','$nombre1','$nombre2','$apellido1','$apellido2','$tipo_documento',
			SHA('$clave'),'$destino','$correo','$usuario')";
			$resultado = mysqli_query($conexion,$insertar);

			/**
			 * si la consula a la base de datos se hizo correctamente
			 */
			if ($resultado) {
					echo '<script>alert("Los datos se ingresaron correctamente") ;</script>';
					echo "<script>window.location='../index.php';</script>";
			}else{
					echo '<script>alert("¡Ups ha ocurrido un error!") ;</script>';
					echo "<script>window.location='../index.php';</script>";
			}
		}else{
				echo '<script>alert("Las contraseñas no son iguales") ;</script>';
				echo "<script>window.location='../index.php';</script>";
		}
	}else{
		echo '<script>alert("Complete los campos") ;</script>';
		echo "<script>window.location='../index.php';</script>";
	}
}
?>




