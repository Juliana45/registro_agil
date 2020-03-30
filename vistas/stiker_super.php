<?php
    session_start();
    include '../conexi/conexion.php';

    if (isset($_SESSION['super'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registro ágil</title>
    <script type="text/javascript" src="../js/validacion_num.js"></script>
    <script type="text/javascript" src="../js/validacion_letra.js"></script>
    <script type="text/javascript" src="../js/validacion_letraynumero.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/mis_elementos.css">
      <link rel="stylesheet" type="text/css" href="../css/perfil_usuario.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css"
    integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
</head>
<body>

<!-- inicio lado izquierdo -->
<div class="contenedor-izquierdo">
    <?php
        include '../conexi/conexion.php';
        
        $documento=$_SESSION['super'];
        $personas = mysqli_query($conexion,"SELECT * FROM tbl_personas WHERE numero_documento_persona= $documento");

        foreach ($personas as $persona):
    ?>
    <!-- inicio fotos y botones de menu -->
        <div class="contenedor-foto">
            <?php echo '<img class="foto-perfil" src="'.$persona['foto_persona'].'"> ' ?>
            <button class="editar" id="icono-sticker"><a href="#openModal?persona=<?php echo $persona['numero_documento_persona']; ?>"> <i class="fas fa-user-edit"></i></a></button>
        </div>

        <h3 class="nombre">
            <?php echo $persona['nombre1_persona'];?>
            <?php echo $persona['apellido1_persona'];?>
        </h3>

        <hr class="linea">

        <div class="conenerdor-items">
            <a href="#" id="formulario-elemento"> <button class="item1" id="item-sticker">Registrar Elementos</button><br></a>
            <a href="#" id="elemento"><button class="item2" id="item-sticker">Elementos</button><br></a>
            <a href="#" id="listar"><button class="item3" id="item-sticker">Vigilantes</button><br></a>
            <a href="../phpCode/salir.php"><button class="item4">Salir <i class="fas fa-door-open"></i></button><br></a>
        </div>
    <!-- fin foto y botones de menu -->
    <?php
        endforeach
    ?>
</div>
<!-- fin lado izquierdo -->

<!-- inicio lado derecho -->
<div class="contenedor-derecho">
    <div class="contenerdor-elementos" id="contenido">
    <a href="../vistas/perfil_supervisor.php">
        <button id="atras"><i class="fas fa-arrow-left"></i></button>
    </a>

    <!-- inicio generar sticker -->
    <div class="codigo-barras">
        <h3 class="registrar-elemento">Generar sticker</h3>
        <hr class="linea-ele">
        <div id="registro">
            <h2 class="generar-serial">De click para generar el código de barras<h2>

        <?php
            include '../conexi/conexion.php';
            
            $documento=$_SESSION['super'];
            $elementos = mysqli_query($conexion,"SELECT * FROM tbl_elementos 
            WHERE numero_documento_persona = $documento AND estado_elemento <> '0'");

            foreach ($elementos as $elemento):
        ?>
        
        <?php
        endforeach
    ?> 
        <a href="../vistas/generar_super.php?elemento=<?php echo $elemento['numero_serial_elemento'];?>">
            <input type="submit" class="input_btn-serial" name="buscar" value="Buscar">
        </a>     
            
        </div>
    </div>
    <!-- inicio generar sticker -->     
    </div>
</div>  
<!-- fin lado derecho --> 
</body>
</html>
<?php
     
}else {
    echo "<script>window.location='../index.php';</script>";
}
?>
