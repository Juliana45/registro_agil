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
        * @var string  $personas       se esta almacenando la consulta a la base de datos
        *                              donde el documento debe ser igual a la variable
        *                              $documento.
        * 
        */
        $personas = mysqli_query($conexion,"SELECT * FROM tbl_personas WHERE numero_documento_persona= $documento");
         /**
         *  ciclo para mostrar informacion personal del usuario
         * 
         * @var string  $personas       se esta almacenando la consulta a la base de datos
         * @var string  $persona        se esta almacenando el dato de la consulta y se muestra
                                        la foto, nombre y apellido del usuario.
         * 
         */
        foreach ($personas as $persona):
    ?>
        <!-- inicio fotos y botones de menu -->
            <div class="contenedor-foto">
                <?php echo '<img class="foto-perfil" src="'.$persona['foto_persona'].'"> ' ?>
                <button class="editar" id="icono-sticker"><a href="#openModal?persona=<?php echo $persona['numero_documento_persona']; ?>"> 
                    <i class="fas fa-user-edit"></i></a>
                </button>
            </div>

            <h3 class="nombre">
                <?php echo $persona['nombre1_persona'];?>
                <?php echo $persona['apellido1_persona'];?>
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
        include '../conexi/conexion.php';
     /**
     * obtiene la sesion
     *
     * isset            verifica que la sesion si este definida.
     * $_session        contiene el numero de documento del usuario.
     * $_GET            contiene el numero serial del elemento. 
     *            
     */
        if (isset($_SESSION['user'])) {
            if($_GET['elemento']){
    /**
     * consulta a la base de datos
     *
     * @var string $codigo         Contiene el get con la variable elemento envida
     *                             por la url.
     * @var string $sql            Contiene la consulta a la base de datos, donde el
     *                             el numero seria debe ser igual a la variable codigo.    
     *@var string $result          Realiza la consulta a la base de datos.
     *@var string $arraycodigo     Almacena un vector donde se guarda la foto y el numero serial 
     *                             generado.   
     */
                $codigo = $_GET['elemento'];
                $sql = "SELECT * FROM tbl_elementos WHERE numero_serial_elemento = $codigo";
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
                 * @var int $ver               Almacena el resultado de la variable result.
                 * @var string $arraycodigo    Convierte la variable ver en un string.
                 *                                         
                 */
                while($ver=mysqli_fetch_row($result)): 

               
                    $arraycodigo[]=(String)$ver[0];
                ?>

                    <!-- WHERE id = $id  -->
                    <tr>
                        <td> <?php echo $ver[1]; ?></td>
                        <td>
                        <img src="../vistas/barcode.php?text=<?php echo $ver[0];?>&print=true" usemap="#img"/>
                        <map name="img">
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
