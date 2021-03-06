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
     * obtiene la sesion 
     *
     * isset            verifica que la sesion si este definida.
     * $_session        contiene el numero de documento del usuario.
     * $_GET            contiene el numero serial del elemento. 
     * 
     * si se le da clik al boton que contiene el icono del lapiz del  archivo
     * mis_elementos.php         
     */
    if (isset($_SESSION['user'])) {
     /**
     * $_GET            contiene el numero serial del elemento enviada por la 
     *                  por la url en la variable elemento del archivo
     *                  mis_elementos.php.        
     */
    if ($_GET['elemento']) {
    /**
     * @var string $sola           Contiene la variable elemento.                  
     */
    $sola = $_GET['elemento'];
    /**
     * consulta a la base de datos 
     *
     * @var string $quey           Contiene la consulta a la base de datos, donde el
     *                             el numero seria debe ser igual a la variable sola.     
     */   
                $query = "SELECT * FROM tbl_elementos where numero_serial_elemento = $sola";
    /**   
     *@var string $consulta        Realiza la consulta a la base de datos.
     *@var string $elemento        Almacena los datos de la consulta.   
     */
                $consulta=mysqli_query($conexion,$query);
                if (mysqli_num_rows($consulta)==1) {
                    $elemento = mysqli_fetch_array($consulta);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript" src="../js/validacion.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/mis_elementos.css">
    <link rel="stylesheet" type="text/css" href="../css/perfil_usuario.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css"
    integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <title>Registro ágil</title>
</head>
<body>

<!-- inicio lado izquierdo -->
<div class="contenedor-izquierdo">
    <?php
        /**
        *       Muestra los datos personales del usuario 
        *  
        * se incluye la conexion a la base de datos
        */
        include '../conexi/conexion.php';
        /**
         * obtener la sesion del usuario
         *
         * @var int  $documento       Se esta almacenando la sesion del usuario.
         *           $_SESSION        Almacena el numero de documento del usuario.
         * 
         */
        $documento=$_SESSION['user'];
        /**
         *  consulta a la base de datos la foto y los nombres del usuario
         * 
         * @var string  $personas       se esta almacenando la consulta a la base de datos
         *                              donde el numero de documento del usuario debe ser
         *                              al numero de documento registrado enla base de datos.
         */
        $personas = mysqli_query($conexion,"SELECT * FROM tbl_personas WHERE numero_documento_persona= $documento");
         /**
         *  ciclo para mostrar informacion personal del usuario
         * 
         * foreach                      Recorre estructura que contienen varios elementos
         *                              (como arrays).
         * @var string  $personas       Se esta almacenando la consulta a la base de datos.
         * @var string  $persona        Se esta almacenando el dato de la consulta y se muestra
         *                              la foto y los nombres del usuario.
         */
        foreach ($personas as $persona):
    ?>
    <!-- inicio fotos y botones de menu -->
        <div class="contenedor-foto">
            <?php
            /**
            * @var string  $persona       Se esta mostrando la foto del usuario.
            */
             echo '<img class="foto-perfil" src="'.$persona['foto_persona'].'"> ' ?>
            <!-- se esta mandado por la url la variable persona que contiene el numero  
                 de documento del usuario.--> 
            <button class="editar" id="icono-sticker"><a href="#openModal?persona=<?php echo $persona['numero_documento_persona']; ?>"> <i class="fas fa-user-edit"></i></a></button>
        </div>

        <h3 class="nombre">
            <?php
            /**
            * @var string  $persona       Se esta mostrando el primer nombre del usuario.
            */
             echo $persona['nombre1_persona'];?>
            <?php 
            /**
            * @var string  $persona       Se esta mostrando el primer apellido del usuario.
            */
            echo $persona['apellido1_persona'];?>
        </h3>

        <hr class="linea">

        <div class="conenerdor-items">
            <a href="#" id="formulario-elemento"> <button class="item1" id="item-sticker">Regisrar Elementos</button><br></a>
            <a href="#" id="elemento"><button class="item2" id="item-sticker">Elementos</button><br></a>
            <a href="../phpCode/salir.php"><button class="item3">Salir <i class="fas fa-door-open"></i></button><br></a>
        </div>
    <!-- fin foto y botones de menu -->

    <!--inicio_actualizar_informacion-->
     <!-- manda por la url la variable persona que contiene el numero de documento -->
        <div  id="openModal?persona=<?php echo $persona['numero_documento_persona']; ?>" class="modalDialog">
            <form action="../phpCode/codigo_informacion_usuario.php" method="POST" id="formulario-editar" enctype="multipart/form-data">
                <a href="#close" title="Cerrar" class="close">X</a>
                <h3 id="titulo-editar">Actualizar información</h3>
                <hr class="linea-ele">
                <div id="contenedor-editar">
                    <input type="text" class="input-editar" name="nombre1" value="<?php echo $persona['nombre1_persona'];?>"
                    onkeypress="return Letras(event)" onpaste="return false">
                    <input type="text" class="input-editar" name="nombre2"  value="<?php echo $persona['nombre2_persona'];?>"
                    onkeypress="return Letras(event)" onpaste="return false">
                    <input type="text" class="input-editar" name="apellido1"  value="<?php echo $persona['apellido1_persona'];?>"
                    onkeypress="return Letras(event)" onpaste="return false">
                    <input type="text" class="input-editar" name="apellido2"  value="<?php echo $persona['apellido2_persona'];?>"
                    onkeypress="return Letras(event)" onpaste="return false">
                    <input type="text" name="documento" hidden class="input-editar" value="<?php echo $persona['numero_documento_persona'];?>">

                    <select  name="tipo" class="input-editar" required>
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
                      <!-- manda por la url la variable persona que contiene el numero de documento -->
                    <a href="#openModal2?persona=<?php echo $persona['numero_documento_persona']; ?>" id="item-login">cambiar clave </a>
                </div>
            </form>
        </div>
    <!--fin_actualizar_informacion-->

    <!--inicio cambiar contraseña-->
        <!-- manda por la url la variable persona que contiene el numero de documento -->
        <div id="openModal2?persona=<?php echo $persona['numero_documento_persona']; ?>" class="modalDialog">
            <a href="#close" title="Cerrar" class="close" id="close-clave">X</a>
            <form action="../phpCode/cambiar_clave_usuario.php" method="POST" id="formulario-clave" >
                <h3 id="titulo-editar">Cambiar clave</h3>
                <hr class="linea-ele">
                <div id="editar-clave">
                <input type="text" name="documento" hidden class="input" value="<?php echo $persona['numero_documento_persona'];?>">
                
                <input type="password" class="input" name="clave" placeholder="Contraseña nueva" required>

                <input type="password" class="input" name="clave2" placeholder="Confirmar contraseña nueva" required>

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
    <a href="../vistas/perfil_usuario.php">
    <button id="atras"><i class="fas fa-arrow-left"></i></button>
    </a>
<!--inicio_actualizar_elemento-->
        <div id="form-registro-elemento">

        <h3 class="registrar-elemento">Actualizar Elemento</h3>
        <hr class="linea-ele">
        <div id="registro">
        <form action="../phpCode/codigo_editar_usuario.php" method="POST" enctype="multipart/form-data" onsubmit="return validar_elemento();">
            <input class="input" type="text" id="input" name="nombre" value="<?php echo $elemento['nombre_elemento'];?>"
            onkeypress="return Letras(event)" onpaste="return false">
            <input class="input" type="text" id="input2" name="descripcion" value="<?php echo $elemento['descripcion_elemento'];?>"
            onkeypress="return Letrasynumeros(event)" onpaste="return false">
            <input class="input" type="text" id="input3" name="numero_serial" hidden value="<?php echo $elemento['numero_serial_elemento'];?>">

                <div class="subir-foto">
                    <p class="txt-subir-foto">subir foto</p> 
                    <input class="btn-subir-foto" id="foto_ele" type="file" name="foto">
                </div>

            <input class="input_btn" type="submit" id="submit" name="registro_ele" value="Guardar">
        </form>
    </div>
<!--fin_actualizar_elemento-->     
    </div>
</div>  
<!-- fin lado derecho --> 
</body>
</html>
<?php
        }
    }
}else {
    echo "<script>window.location='../index.php';</script>";
}
?>
