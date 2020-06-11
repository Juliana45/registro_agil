<?php
    /**
    * session_start()  se autoinicia la sesion
    */
    session_start();
    /** 
    * $_SESSION       almacena el numero de documento del usuario
    */
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
   
    <script>
            /**
            * se recarga solo una parte de la pagina
            *
            */
        $(document).ready(function(){
            /**
            * #editar-elemento          Cuando se le da click en el boton regisro elemento
            *                           se activara el id.
            * #contenido                Este es el id del contenedor donde se va va a traer 
            *                           otra pagina.
            */
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
        /**
        *   Muestra todos los elementos que el usuario tiene registrado
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
         *  consulta a la base de datos todos los elementos que tenga registrado el usuario
         * 
         * @var string  $elementos      Se esta almacenando la consulta a la base de datos
         *                              donde el numero de documento del usuario debe ser
         *                              igual al numero de documento registrado en la base 
         *                              de datos y el estado del elemento debe ser 
         *                              diferente a 0.
         */
        $elementos = mysqli_query($conexion,"SELECT * FROM tbl_elementos 
        WHERE numero_documento_persona = $documento AND estado_elemento<> '0'");
         /**
         *  ciclo para mostrar el elemento
         * 
         * foreach                      Recorre estructura que contienen varios elementos
         *                              (como arrays).
         * @var string  $elementos      Se esta almacenando la consulta a la base de datos.
         * @var string  $elemento       Se esta almacenando el dato de la consulta y se muestra
         *                              la foto y el nombre, la descripcion y el numero serial 
         *                              del elemento del usuario.
         */
        foreach ($elementos as $elemento):
    ?>
    <div class="contenedor">
        <div class="contenedor-imagen">
             <?php 
            /**
            * @var string  $elemento       Se esta mostrando la foto del elemento.
            */
             echo '<img class="foto" src="'.$elemento['foto_elemento'].'"> ' ?>
        </div>
        <div class="contenedor-txt"> 
            <?php
            /**
            * @var string  $elemento       Se esta mostrando el nombre del elemento.
            */
             echo'<h2>'.$elemento['nombre_elemento'].'</h2>'?>    
            <hr>
            <p>
                <?php
            /**
            * @var string  $elemento       Se esta mostrando la descripcion del elemento.
            */
                 echo $elemento['descripcion_elemento'];?>
            </p>
            <p class="letra"><?php
            /**
            * @var string  $elemento       Se esta mostrando el numero serial del elemento.
            */
             echo $elemento['numero_serial_elemento'];?></p>
            <!-- manda por la url la variable desactivar que contiene el numero serial del elemento -->
            <a href="../phpCode/codigo_eliminar_usuario.php?desactivar=<?php echo $elemento['numero_serial_elemento']; ?>" 
            onClick="return confirm('¿Estas seguro que desea eliminar?');"><button class="boton"><i class="fas fa-trash-alt"></i></button></a>
            <!-- manda por la url la variable elemento que contiene el numero serial del elemento al archivo editar_elemento_usuario.php-->
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