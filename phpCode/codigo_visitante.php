<?php

/**
 * Registrar visitante
 * 
 * incluye el archivo donde se encuentra la conexion a la base de datos
 * incluye el archivo de la vista de la verificacion
 */
include "../conexi/conexion.php";
include "../vistas/verificacion.php";

/**
 * si le da clic en el boton 'siguiente' del formulario registrar usuario, en el archivo verificacion.php
 */
if (isset($_POST['siguiente'])) {
	
	/**
     * strlen    Obtener la longitud de una cadena string
     * 
     * si todos los campos del formulario registrar usuario, en el archivo verificacion.php estan llenos 
     */
	if (strlen($_POST['nombre1']) >=1 &&  strlen($_POST['apellido1']) >=1 && strlen($_POST['apellido2']) >=1 && 
	strlen($_POST['tipo']) >=1 && strlen($_POST['documento']) >=1 && strlen($_POST['clave_e']) >=1) {
		
		/**
     	 * se compara si las claves ingresadas en el formulario registrar usuario, en el archivo verificacion.php son iguales
     	 */
		if ($_POST['clave_e'] == $_POST['clave2']) {
			
			/**
			 * trim      eliminar espacios en blanco u otros caracteres al inicio y final de una cadena de texto
			 * 
			 * @var String $visitante 	almacena el rol (usuario)
			 * 
			 * se definen las variables para capturar la informacion de los input del formulario registrar 
			 * usuario, en el archivo verificacion.php 
			 * @var String $documento
			 * @var String $nombre1
			 * @var String $nombre2	
			 * @var String $apellido1
			 * @var String $apellido2
			 * @var String $tipo_documento
			 * @var String $clave
			 * @var String $clave2
			 */
			$visitante = "usuario";
			$documento = trim($_POST['documento']) ;
			$nombre1 = trim($_POST['nombre1']);
			$nombre2 = trim($_POST['nombre2']);
			$apellido1 = trim($_POST['apellido1']);
			$apellido2 = trim($_POST['apellido2']);
			$correo = trim($_POST['correo']);
			$tipo_documento = trim($_POST['tipo']);
			$clave = trim($_POST['clave_e']);
			$clave2= trim($_POST['clave2']); 

			/**

        	 * consulta a la base de datos
        	 * 
        	 * @var String $insertar       	se estan insertando los datos ingresados en el formulario registrar 
			 * 								usuario, en el archivo verificacion.php a la base de datos
        	 * @var String $resultado      	verifica si la consulta a la base de datos fue correcta
        	 */
		
			$insertar = "INSERT INTO tbl_personas(numero_documento_persona,nombre1_persona,nombre2_persona,apellido1_persona,apellido2_persona,
			tipo_documento_persona,clave_persona,correo_persona,rol_persona) values('$documento','$nombre1','$nombre2','$apellido1',
			'$apellido2','$tipo_documento',SHA('$clave'),'$correo','$visitante')";

			$resultado = mysqli_query($conexion,$insertar);

			/**
			 * si la consula a la base de datos se hizo correctamente
			 */
			if ($resultado) {
				/**
            	 * se agrega la libreria sweerAlert2
            	 */
				echo    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>';
				/**
                 * se incluye el archivo donde estan las alertas
                 */
				echo    '<script src="../js/alertas.js"></script>';
				/**
            	 * se llama la alerta con la funcion visitante
            	 */
                echo    "<script language = javascript>  visitante(); </script>";
			}else{
				/**
            	 * se agrega la libreria sweerAlert2
            	 */
				echo    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>';
				/**
                 * se incluye el archivo donde estan las alertas
                 */
				echo    '<script src="../js/alertas.js"></script>';
				/**
            	 * se llama la alerta con la funcion visitanteError
            	 */
                echo    "<script language = javascript>  visitanteError(); </script>";
			}
		}else{
			/**
             * se agrega la libreria sweerAlert2
             */
			echo    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>';
			/**
             * se incluye el archivo donde estan las alertas
             */
			echo    '<script src="../js/alertas.js"></script>';
			/**
        	 * se llama la alerta con la funcion visitanteClaveDiferentes
             */
            echo    "<script language = javascript>  visitanteClaveDiferentes(); </script>";
		}
	}else{
		/**
         * se agrega la libreria sweerAlert2
         */
		echo    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>';
		/**
         * se incluye el archivo donde estan las alertas
         */
		echo    '<script src="../js/alertas.js"></script>';
		/**
    	 * se llama la alerta con la funcion visitanteCompleteCampos
         */
		echo    "<script language = javascript>  visitanteCompleteCampos(); </script>";
	}
}
?>




