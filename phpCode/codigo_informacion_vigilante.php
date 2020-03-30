<?php
include "../conexi/conexion.php";

if(isset($_POST['guardar'])){
    if (strlen($_POST['documento']) >=1 && strlen($_POST['nombre1']) >=1 && 
    strlen($_POST['nombre2']) >=1 && strlen($_POST['apellido1']) >=1 && 
    strlen($_POST['apellido2']) >=1 && strlen($_POST['tipo']) >=1 ) {

        $numero_documento = trim($_REQUEST['documento']);
        $nombre1 = trim($_REQUEST['nombre1']);
        $nombre2 = trim($_REQUEST['nombre2']);
        $apellido1 = trim($_REQUEST['apellido1']);
        $apellido2 = trim($_REQUEST['apellido2']);
        $tipo_documento = trim($_REQUEST['tipo']);
        $foto = $_FILES['foto'] ['name'] ;
        $ruta =$_FILES['foto'] ['tmp_name'];
    	$destino = "../img/".$foto;
    	copy($ruta,$destino);

        mysqli_query($conexion,"UPDATE tbl_personas SET nombre1_persona='$nombre1',
        nombre2_persona='$nombre2',apellido1_persona='$apellido1',apellido2_persona=
        '$apellido2',tipo_documento_persona='$tipo_documento',foto_persona = '$destino' WHERE 
        numero_documento_persona = '$numero_documento' ");


            echo '<script>alert("Los datos se actualizaron correctamente") ;</script>';
            echo "<script>window.location='../vistas/perfil_vigilante.php';</script>";
        }else{
       echo '<script>alert("Complete los campos") ;</script>';
       echo "<script>window.location='../vistas/perfil_vigilante.php';</script>";
        }
}
?>  