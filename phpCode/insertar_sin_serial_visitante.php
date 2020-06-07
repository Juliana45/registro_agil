<?php

/**
 * Insertar elemento sin serial del visitante
 * 
 * incluye el archivo donde se encuentra la conexion a la base de datos
 * incluye el archivo del formulario para registrar el elemento sin serial del visitante
 */
include  "../conexi/conexion.php";
include "../vistas/verificacion.php";

/**
 * si le dio clic en el boton 'registro_ele' del formulario registro elemento en verificacion.php 
 */
if(isset($_POST['registro_ele'])) {
    
    /**
     * strlen    Obtener la longitud de una cadena string
     * 
     * si todos los campos del formulario registro elemento en verificacion.php estan llenos 
     */
    if(strlen($_POST['documento']) >=1 && strlen($_POST['nombre']) >=1 && strlen($_POST['descripcion'])>=1){

        /**
		 * trim      eliminar espacios en blanco u otros caracteres al inicio y final de una cadena de texto
         * 
         * @var String $estado     almacena el estado del elemento(activo)
         * 
         * se definen las variables para capturar la informacion de los input del formulario 
         * registro elemento en verificacion.php 
         * @var String $documento
         * @var String $nombre
         * @var String $descripcion
         * @var String $foto        nombre original del archivo en la maquina del usuario
         * @var String $ruta        nombre del archivo en el cual se almacena el archivo subida al servidor
         * @var String $destido     ruta donde se guarda el archivo
         * copy                     se copia lo que se esta almacenando en $ruta y $destino en la base de datos
         * 
         * date()                   captura los milisegundos 
         * @var String $codigo      alamacena el dato generado por el date()
         */
        $estado='1';
        $documento = trim($_REQUEST['documento']);
        $nombre = trim($_REQUEST['nombre']);
        $descripcion = trim($_REQUEST['descripcion']);
        $foto = $_FILES['foto'] ['name'] ;
        $ruta =$_FILES['foto'] ['tmp_name'];
        $destino = "../img/".$foto;
        copy($ruta,$destino);
        $codigo = date('is');
        
        /**
         * consulta a la base de datos
         * 
         * @var String $insertar           se estan insertando los datos ingresados en el formulario registro elemento 
         *                                 en verificacion.php a la base de datos
         * @var String $resultado          verifica si la consulta a la base de datos fue correcta
         */
        $insertar = "INSERT INTO tbl_elementos(numero_serial_elemento,nombre_elemento,descripcion_elemento,foto_elemento,
        numero_documento_persona,estado_elemento) VALUES('$codigo','$nombre','$descripcion','$destino','$documento',
        '$estado')";
        $resultado = mysqli_query($conexion,$insertar);
        
            /**
             * si la consulta a la base de datos se hizo correctamente
             */
            if ($resultado) {
                echo '<script>alert("Los datos se ingresaron correctamente") ;</script>';
                echo "<script>window.location='../vistas/verificacion.php#openModal4';</script>";
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