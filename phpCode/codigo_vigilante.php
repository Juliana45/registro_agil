<?php
/**
 * Registrar vigilante
 * 
 * incluye el archivo donde se encuentra la conexion a la base de datos
 * incluye el archivo del perfil del supervisor
 */
include  "../conexi/conexion.php";
include "../vistas/perfil_supervisor.php";

/**
 * si le da clic en el boton 'guardar' del formulario registro vigilante, en el archivo lista_vigilantes.php
 */
if (isset($_POST['guardar'])) {
	
	/**
     * strlen    Obtener la longitud de una cadena string
     * 
     * si todos los campos del formulario registro vigilante, en el archivo lista_vigilantes.php estan llenos 
     */
	if (strlen($_POST['nombre1']) >=1 && strlen($_POST['apellido1']) >=1 && strlen($_POST['apellido2']) >=1 && 
	strlen($_POST['tipo']) >=1 && strlen($_POST['documento']) >=1 && strlen($_POST['clave']) >=1 && 
	strlen($_POST['estado'])  && strlen($_POST['correo']) >=1) {

		/**
     	 * se compara si las claves ingresadas en el formulario registro vigilante, en el archivo lista_vigilantes.php son iguuales
     	 */
		if ($_POST['clave'] == $_POST['clave2']) {
			
			/**
			 * trim      eliminar espacios en blanco u otros caracteres al inicio y final de una cadena de texto
			 * 
			 * @var String $vigilante 	almacena el rol (vigilante)
			 * 
			 * se definen las variables para capturar la informacion de los input del formulario 
			 * registro vigilante, en el archivo lista_vigilantes.php
			 * @var String $documento
			 * @var String $nombre1
			 * @var String $nombre2	
			 * @var String $apellido1
			 * @var String $apellido2
			 * @var String $tipo_documento
			 * @var String $clave
			 * @var String $clave2
			 * @var String $estado
			 */
			$vigilante = "vigilante";
			$documento = trim($_POST['documento']);
			$nombre1 = trim($_POST['nombre1']);
			$nombre2 = trim($_POST['nombre2']);
			$apellido1 = trim($_POST['apellido1']);
			$apellido2 = trim($_POST['apellido2']);
			$tipo_documento = trim($_POST['tipo']);
			$correo=trim($_POST['correo']);
			$clave = trim($_POST['clave']);
			$clave2= trim($_POST['clave2']);
			$estado = trim($_POST['estado']);

			/**
        	 * consulta a la base de datos
        	 * 
        	 * @var String $insertar       	se estan insertando los datos ingresados en el formulario registro vigilante, 
			 * 								en el arrchivo lista_vigilantes.php a la base de datos
        	 * @var String $resultado      	verifica si la consulta a la base de datos fue correcta
        	 */
			$insertar = "INSERT INTO tbl_personas(numero_documento_persona,nombre1_persona,nombre2_persona,apellido1_persona,
			apellido2_persona,tipo_documento_persona,clave_persona,correo_persona,rol_persona,estado_persona) values
			('$documento','$nombre1','$nombre2','$apellido1','$apellido2','$tipo_documento',SHA('$clave'),'$correo','$vigilante','$estado')";
			
  			$resultado = mysqli_query($conexion,$insertar);

			/**
			 * si la consulta a la base de datos se hizo correctamente
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
            	 * se llama la alerta con la funcion perfilSupervisor
            	 */
                echo    "<script language = javascript>  perfilSupervisor(); </script>";
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
            	 * se llama la alerta con la funcion perfilSupervisorError
            	 */
                echo    "<script language = javascript>  perfilSupervisorError(); </script>";
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
             * se llama la alerta con la funcion perfilSupervisorClaveDiferente
        	 */
			echo    "<script language = javascript>  perfilSupervisorClaveDiferente(); </script>";
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
    	 * se llama la alerta con la funcion perfilSupervisorCompletarDatos
         */
        echo    "<script language = javascript>  perfilSupervisorCompletarDatos(); </script>";
	}

}
?>




