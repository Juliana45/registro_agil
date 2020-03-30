<?php

include "../conexi/conexion.php";

if(isset($_POST['registro_ele'])) {
    if(strlen($_POST['numero_serial']) >=1 && strlen($_POST['nombre']) >=1 && 
    strlen($_POST['descripcion']) >=1){

        $numero_serial = trim($_REQUEST['numero_serial']);
        $nombre = trim($_REQUEST['nombre']);
        $descripcion = trim($_REQUEST['descripcion']);
        $foto = $_FILES['foto'] ['name'] ;
        $ruta =$_FILES['foto'] ['tmp_name'];
        $destino = "../img/".$foto;
        copy($ruta,$destino);
   
        mysqli_query($conexion,"UPDATE tbl_elementos SET nombre_elemento='$nombre',descripcion_elemento='$descripcion',foto_elemento='$foto'
         WHERE numero_serial_elemento='$numero_serial'");
            echo '<script>alert("Los datos se actualizaron correctamente") ;</script>';
            echo "<script>window.location='../vistas/perfil_usuario.php';</script>";
        }else{
       echo '<script>alert("Complete los campos") ;</script>';
       echo "<script>window.location='../vistas/perfil_usuario.php';</script>";
       }
   
} 
?>