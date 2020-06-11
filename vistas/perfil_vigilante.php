<?php
    /**
    * session_start()  se autoinicia la sesion
    */
    session_start();
    /**
    * se incluye la conexion a la base de datos
    */
    include '../conexi/conexion.php';
    /** 
    * $_SESSION       almacena el numero de documento del vigilante
    */
    if (isset($_SESSION['vigi'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registro ágil</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
    <script type="text/javascript" src="../js/validaciones.js"></script>
    <script type="text/javascript" src="../js/validacion.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/perfil_usuario.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css"
    integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    
   
    <script>
            /**
            * se recarga solo una parte de la pagina
            *
            */
        $(document).ready(function(){
            /**
            * #formulario-elemento      cuando se le da click en el boton regisro elemento
            *                           se activara el id.
            * #contenido                este es el id del contenedor donde se va va a traer 
            *                           otra pagina.
            */
            
            $('#formulario-elemento').click(function(){
            $("#contenido").load("../vistas/formulario-elemento-vigilante.php");
            });

            $('#elemento').click(function(){
            $("#contenido").load("../vistas/elementos_vigilante.php");
            });

            
        });
    </script>
</head>
<body>

<!-- inicio lado izquierdo -->
<div class="contenedor-izquierdo">
    <?php
        /**
        *       Muestra los datos personales del vigilante 
        *  
        * se incluye la conexion a la base de datos
        */
        include '../conexi/conexion.php';
        /**
         * obtener la sesion del vigilante
         *
         * @var int  $documento       Se esta almacenando la sesion del vigilante.
         *           $_SESSION        Almacena el numero de documento del vigilante.
         * 
         */
        $documento=$_SESSION['vigi'];
        /**
         *  consulta a la base de datos la foto y los nombres del vigilante
         * 
         * @var string  $personas       se esta almacenando la consulta a la base de datos
         *                              donde el numero de documento del vigilante debe ser
         *                              al numero de documento registrado enla base de datos.
         */
        $personas = mysqli_query($conexion,"SELECT * FROM tbl_personas WHERE numero_documento_persona= $documento");
         /**
         *  ciclo para mostrar informacion personal del vigilante
         * 
         * foreach                      Recorre estructura que contienen varios elementos
         *                              (como arrays).
         * @var string  $personas       Se esta almacenando la consulta a la base de datos.
         * @var string  $persona        Se esta almacenando el dato de la consulta y se muestra
         *                              la foto y los nombres del vigilante.
         */
        foreach ($personas as $persona):
    ?>
    <!-- inicio fotos y botones de menu -->
        <div class="contenedor-foto">
            <?php
            /**
            * @var string  $persona       Se esta mostrando la foto del vigilante.
            */
             echo '<img class="foto-perfil" src="'.$persona['foto_persona'].'"> ' ?>
            <!-- se esta mandado por la url la variable persona que contiene el numero  
                 de documento del vigilante.-->  
            <button class="editar"><a href="#openModal?persona=<?php echo $persona['numero_documento_persona']; ?>"> <i class="fas fa-user-edit"></i></a></button>
        </div>

        <h3 class="nombre">
            <?php 
            /**
            * @var string  $persona       Se esta mostrando el primer nombre del vigilante.
            */
            echo $persona['nombre1_persona'];?>
            <?php 
            /**
            * @var string  $persona       Se esta mostrando el primer apellido del vigilante.
            */
            echo $persona['apellido1_persona'];?>
        </h3>

        <hr class="linea">

        <div class="conenerdor-items">
            <a href="#" id="formulario-elemento"> <button class="item1">Registrar elementos</button><br></a>
            <a href="#" id="elemento"><button class="item2">Elementos</button><br></a>
            <a href="../vistas/verificacion.php" ><button class="item3">Verificación</button><br></a>
            <a href="../phpCode/salir.php"><button class="item4">Salir <i class="fas fa-door-open"></i></button><br></a>
        </div>
    <!-- fin foto y botones de menu -->

    <!--inicio_actualizar_informacion-->
        <!-- manda por la url la variable persona que contiene el numero del documento del vigilante -->
        <div id="openModal?persona=<?php echo $persona['numero_documento_persona']; ?>" class="modalDialog">
            <form action="../phpCode/codigo_informacion_vigilante.php" method="POST" id="formulario-editar" enctype="multipart/form-data" onsubmit="return validar_info();">
                <a href="#close" title="Cerrar" class="close">X</a>
                <h3 id="titulo-editar">Actualizar información</h3>
                <hr class="linea-ele">
                <div id="contenedor-editar">
                    <input type="text" class="input-editar" id="nombre1" name="nombre1" value="<?php echo $persona['nombre1_persona'];?>"
                    onkeypress="return Letras(event)" onpaste="return false">
                    <input type="text" class="input-editar" id="nombre2" name="nombre2"  value="<?php echo $persona['nombre2_persona'];?>"
                    onkeypress="return Letras(event)" onpaste="return false">
                    <input type="text" class="input-editar" id="apellido1" name="apellido1"  value="<?php echo $persona['apellido1_persona'];?>"
                    onkeypress="return Letras(event)" onpaste="return false">
                    <input type="text" class="input-editar" id="apellido2" name="apellido2"  value="<?php echo $persona['apellido2_persona'];?>"
                    onkeypress="return Letras(event)" onpaste="return false">
                    <input type="text"  id="documento" name="documento" hidden class="input-editar" value="<?php echo $persona['numero_documento_persona'];?>">

                    <select  name="tipo" id="tipo" class="input-editar" required>
                        <option hidden ><?php echo $persona['tipo_documento_persona'];?></option>
                        <option value="cc">Cédula de Ciudadanía</option>
                        <option value="ti">Tarjeta de Identidad</option>
                        <option value="ce">Cédula de Extranjería</option>
                    </select>

                    <div id="subir-foto" class="input-editar">
                        <p id="txt-subir-foto">subir foto</p> 
                        <input id="btn-subir-foto" type="file" name="foto">
                    </div>

                    <input type="submit" class="input-btn-editar" name="guardar" value="Actualizar"> 
                    <!-- manda por la url la variable persona que contiene el numero del documento del vigilante -->
                    <a href="#openModal2?persona=<?php echo $persona['numero_documento_persona']; ?>" id="item-cambia-clave">cambiar clave </a>
                </div>
            </form>
        </div>
    <!--fin_actualizar_informacion-->

    <!--inicio cambiar contraseña-->
        <!-- manda por la url la variable persona que contiene el numero del documento del vigilante -->
        <div id="openModal2?persona=<?php echo $persona['numero_documento_persona']; ?>" class="modalDialog">
            <a href="#close" title="Cerrar" class="close" id="close-clave">X</a>
            <form action="../phpCode/cambiar_clave_vigilante.php" method="POST" id="formulario-clave" onsubmit="return validar_contra();">
                <h3 id="titulo-editar">Cambiar clave</h3>
                <hr class="linea-ele">
                <div id="editar-clave">
                <input type="text" name="documento" hidden class="input" value="<?php echo $persona['numero_documento_persona'];?>">
                <input type="password" class="input" id="clave" name="clave" placeholder="Contraseña nueva" required>
                <input type="password" class="input" id="clave2" name="clave2" placeholder="Confirmar contraseña nueva" required>
                <input type="submit" class="input-btn" name="enviar" value="Enviar">
                <br><br>
                </div>
            </form>
        </div>
    <!--fin cambiar contraseña-->

    <?php
        endforeach
    ?>
</div>
<!-- fin lado izquierdo -->  

<!-- inicio lado derecho -->
<div class="contenedor-derecho">
        <div class="contenerdor-elementos" id="contenido">
    
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