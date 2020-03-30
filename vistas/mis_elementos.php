<?php
    session_start();
    if (isset($_SESSION['user'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registro ágil</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
    <script type="text/javascript" src="../js/validacion_num.js"></script>
    <script type="text/javascript" src="../js/validacion_letra.js"></script>
    <script type="text/javascript" src="../js/validacion_letraynumero.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/mis_elementos.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css"
    integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
   
    <script>
        $(document).ready(function(){

            $('#editar-elemento').click(function(){
            $("#contenido").load("../vistas/editar_elemento_usuario.php");
            });

        });
    </script>
</head>
<body>

<!-- inicio mis elementos -->
<h3 class="letra-elemento">Elementos</h3>
<hr class="linea-ele">
    <?php
        include '../conexi/conexion.php';
        
        $documento=$_SESSION['user'];
        $elementos = mysqli_query($conexion,"SELECT * FROM tbl_elementos 
        WHERE numero_documento_persona = $documento AND estado_elemento<> '0'");

        foreach ($elementos as $elemento):
    ?>
    <div class="contenedor">
        <div class="contenedor-imagen">
             <?php echo '<img class="foto" src="'.$elemento['foto_elemento'].'"> ' ?>
        </div>
        <div class="contenedor-txt"> 
            <?php echo'<h2>'.$elemento['nombre_elemento'].'</h2>'?>    
            <hr>
            <p>
                <?php echo $elemento['descripcion_elemento'];?>
            </p>
            <p class="letra"><?php echo $elemento['numero_serial_elemento'];?></p>

            <a href="../phpCode/codigo_eliminar_usuario.php?desactivar=<?php echo $elemento['numero_serial_elemento']; ?>" 
            onClick="return confirm('¿Estas seguro que desea eliminar?');"><button class="boton"><i class="fas fa-trash-alt"></i></button></a>
            
           <a href="editar_elemento_usuario.php?elemento=<?php echo $elemento['numero_serial_elemento']?>">
           <button class="boton1"><i class="icono-editar fas fa-pencil-alt"></i></button>
            </a>
        </div>
    </div>
    <?php
        endforeach

    ?>
<!--fin_mis_elementos-->      

</body>
</html>

<?php
}else {
    echo "<script>window.location='../index.php';</script>";
}
?>