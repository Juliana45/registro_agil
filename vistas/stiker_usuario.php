<?php
    session_start();
    include '../conexi/conexion.php';

    if (isset($_SESSION['user'])) {
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
    /**
     * obtener la sesion
     *
     * @var int  $documento       se esta almacenando la sesion del usuario.
     *           $_SESSION        almacena elnumero de documento del usuario.
     * 
     */
        $documento=$_SESSION['user'];
        /**
         *  consulta a la base de datos 
         * 
         * @var string  $personas       se esta almacenando la consulta a la base de datos.
         * 
         */
        $personas = mysqli_query($conexion,"SELECT * FROM tbl_personas WHERE numero_documento_persona= $documento");
         /**
         *  ciclo para mostrar informacion personal del usuario
         * 
         * @var string  $personas       se esta almacenando la consulta a la base de datos.
         * @var string  $persona        se esta almacenando el dato de la consulta y se muestra
         *                              la foto y los nombres del usuario.
         */
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
            <a href="#" id="formulario-elemento"> <button class="item1" id="item-sticker">Regisrar Elementos</button><br></a>
            <a href="#" id="elemento"><button class="item2" id="item-sticker">Elementos</button><br></a>
            <a href="../phpCode/salir.php"><button class="item3">Salir <i class="fas fa-door-open"></i></button><br></a>
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
    <a href="../vistas/perfil_usuario.php">
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
<<<<<<< HEAD
    /**
     * obetiene la sesion
     *
     * @var int  $documento       se esta almacenando la sesion del usuario.
     *           $_SESSION        almacena elnumero de documento del usuario.
     * 
     */
            $documento=$_SESSION['user'];
        /**
         *  consulta a la base de datos 
         * 
         * @var string  $personas       se esta almacenando la consulta a la base de datos.
         * 
         */
            $elementos = mysqli_query($conexion,"SELECT * FROM tbl_elementos 
            WHERE numero_documento_persona = $documento AND estado_elemento <> '0'");
         /**
         *  ciclo para mostrar el numero serial del elemento
         * 
         * @var string  $personas       se esta almacenando la consulta a la base de datos.
         * @var string  $persona        se esta almacenando el dato de la consulta y se muestra
         *                              el codigo serial del elemento.
         */
=======
            
            $documento = $_SESSION['user'];
            $elementos = mysqli_query($conexion,"SELECT * FROM tbl_elementos 
            WHERE numero_documento_persona = $documento AND estado_elemento <> '0' ");

>>>>>>> cdf31a0ca875609a4b08b6a2228f227cd2fb60c3
            foreach ($elementos as $elemento):
        ?>
        
        <?php
        endforeach
    ?> 
    <!-- manda por la url la variable persona que contiene el numero del documento -->
        <a href="../vistas/generar_usuario.php?elemento=<?php echo $elemento['numero_serial_elemento'];?>">
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
