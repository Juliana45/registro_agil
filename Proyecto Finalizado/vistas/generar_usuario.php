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
    * $_SESSION       almacena el numero de documento del usuario
    */
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
    <link rel="stylesheet" type="text/css" href="../css/codigo_barras.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css"
    integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">

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
                <button class="editar" id="icono-sticker"><a href="#openModal?persona=<?php echo $persona['numero_documento_persona']; ?>"> 
                    <i class="fas fa-user-edit"></i></a>
                </button>
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
                <a href="#" id="formulario-elemento"> <button class="item1" id="item-sticker">Registrar Elementos</button><br></a>
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
    
    <!-- inicio codigo barras -->
    <?php
        /**
        *       Se genera el codigo serial
        *  
        * se incluye la conexion a la base de datos
        */
        include '../conexi/conexion.php';
         /**
         * obtiene la sesion del usuario
         *
         * isset            verifica que la sesion si este definida.
         * $_session        contiene el numero de documento del usuario.           
         */
        if (isset($_SESSION['user'])) {
         /**
         * $_GET            obtiene el numero serial del elemento enviada por la url en
         *                  la variable elemento del archivo stiker_usuario.php.          
         */
            if($_GET['elemento']){
            /**
             * @var string $codigo         Guarda la variable elemento. 
             */
                $codigo = $_GET['elemento'];
            /**
             * consulta a la base de datos el numero serial
             *
             * @var string $sql            Contiene la consulta a la base de datos, donde el
             *                             el numero seria debe ser igual a la variable 
             *                             codigo.      
             */
                $sql = "SELECT * FROM tbl_elementos WHERE numero_serial_elemento = $codigo";
            /**  
             * @var string $result         Realiza la consulta a la base de datos.
             * @var string $arraycodigo    Almacena un vector donde se guarda la foto y el
             *                             numero serial generado.   
             */
                $result = mysqli_query($conexion,$sql);
                $arraycodigo = array();?>
                <table>
                    <tr>
                        <td>Nombre elemento</td>
                        <td>Código de barras</td>
                    </tr>
                <?php 
                /**
                 * ciclo que muestra stikers.
                 *
                 * @var int $ver               Almacena el resultado de la variable
                 *                             result.                                       
                 */
                while($ver=mysqli_fetch_row($result)):  
                /**
                 * @var string $arraycodigo    Convierte la variable ver en un 
                 *                             string.                                       
                 */  
                    $arraycodigo[]=(String)$ver[0];
                ?>
                    <!-- WHERE id = $id  -->
                    <tr>
                        <td> <?php
                        /**
                         * @var string $ver     Esta mostrando la posision 1 que contiene
                         *                      el nombre del elemento.               
                         */ 
                         echo $ver[1]; ?></td>
                        <td>
                        <img src="../vistas/barcode.php?text=<?php
                        /**
                         * @var string $ver     Esta mostrando la posision 0 que contiene
                         *                      la imagen con el codigo de 
                         *                      barras.               
                         */ 
                         echo $ver[0];?>&print=true" usemap="#img"/>
                        <map name="img">
                        <!-- se descarga la imagen con el codigo serial -->
                        <area shape="rect" coords="0,0,80,50" download 
                        href="../vistas/barcode.php?text=<?php echo $ver[0];?>&print=true">
                        </map>       
                        </td>
                    </tr>
                <?php endwhile; ?>
                </table>
                <h2 class="sticker">De click en el codigo serial para descargarlo</h2>
        <?php
                }
            } 
        ?>
        <!-- fin codigo barras -->     
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
