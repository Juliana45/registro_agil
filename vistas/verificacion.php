<?php
    /**
     *session_start()  se autoinicia una sesión
     * 
     * $_SESSION       almacena el numero de documaneto del vigilante
    */

    session_start();
    include '../conexi/conexion.php';

    if (isset($_SESSION['vigi'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registro ágil</title>
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
    <script type="text/javascript" src="../js/validaciones.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/perfil_usuario.css">
    <link rel="stylesheet" type="text/css" href="../css/verificacion.css">
    <link rel="stylesheet" type="text/css" href="../css/mis_elementos.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css"
    integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">
</head>
<body>

<!-- inicio lado izquierdo -->
<div class="contenedor-izquierdo">
    <?php
        include '../conexi/conexion.php';

    /**
     * obtener la sesion
     *
     * @var int  $documento       se esta almacenando la sesion del vigilante
     *           $_SESSION        almacena elnumero de documento del vigilante
     */

        $documento=$_SESSION['vigi'];
        /**
        *  consulta a la base de datos la foto y los nombres del vigilante
        * 
        * @var string  $personas       se esta almacenando la consulta a la base de datos
        * 
        */

        $personas = mysqli_query($conexion,"SELECT * FROM tbl_personas WHERE numero_documento_persona= $documento");
         /**
         *  ciclo para mostrar informacion personal del vigilante
         * 
         * @var string  $personas       se esta almacenando la consulta a la base de datos.
         * @var string  $persona        se esta almacenando el dato de la consulta y se muestra
         *                              la foto y los nombres del vigilante.
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
            <a class="nombre_verificar">
            <?php echo $persona['nombre1_persona'];?>
            <?php echo $persona['apellido1_persona'];?>
            </a>
        </h3>

        <hr class="linea">

        <div class="conenerdor-items">
            <a> <button class="item1" id="item-sticker">Regisrar Elementos</button><br></a>
            <a><button class="item2" id="item-sticker">Elementos</button><br></a>
            <a href="../vistas/verificacion.php" ><button class="item3">Verificación</button><br></a>
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
    <a href="../vistas/perfil_vigilante.php">
        <button id="atras"><i class="fas fa-arrow-left"></i></button>
    </a>
    <h3 class="letra-elemento">Verificar elementos</h1>
    <hr class="linea-lis">
    <!-- barras -->
    <div id="barra">
        <!-- buscador historial -->
        
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="buscador-fecha">
            <input type="date" name="fecha1" id="bus-fecha" value="<?php echo date("Y-m-d");?>" >
            <input type="submit" name="submit1" id="fecha" value="Buscar">
        </form>
        <!-- fin buscador historial -->

        <!-- buscador elementos -->    
        <form action="#" method="post" class="buscador">
            <input type="search" name="busqueda" id="bus" value=""  placeholder="Buscar"  autocomplete="off" />
            <button type="submit" name="submit" id="buscar-ele"><i class="fas fa-search"></i></button>   
        </form>
        <!-- fin buscador --> 

        <!-- registrar usuario -->
        <a href="#openModal" ><button id="registra-visitante">Registrar visitante</button><br></a>

        <div id="openModal" class="modalDialog">
            <form action="../phpCode/codigo_visitante.php" method="POST" id="formulario-editar" enctype="multipart/form-data">
                <a href="#close" title="Cerrar" class="close">X</a>
                <h3 id="titulo-editar">Registrar visitante</h3>
                <hr class="linea-ele">
                <div id="contenedor-editar">
                    <input type="text" class="input-editar" name="nombre1" placeholder="Primer Nombre" required>
                    <select  name="tipo" class="input-editar" required>
                        <option hidden>Tipo de Documento</option>
                        <option value="cc">Cédula de Ciudadanía</option>
                        <option value="ti">Tarjeta de Identidad</option>
                        <option value="ce">Cédula de Extranjería</option>
                    </select>
                    <input type="text" class="input-editar" name="nombre2" placeholder="Segundo Nombre">
                    <input type="text" class="input-editar" name="documento_e" placeholder="Número de documento" required>
                    <input type="text" class="input-editar" name="apellido1" placeholder="Primer Apellido" required>
                    <input type="password" class="input-editar" name="clave_e" placeholder="Contraseña" required>
                    <input type="text" class="input-editar" name="apellido2" placeholder="Segundo Apellido">
                    <input type="password" class="input-editar" name="clave2" placeholder="Repita su contraseña" required>
                    <input type="submit" class="input-btn-visitante" name="siguiente" value="Siguiente">  
                </div> 
            </form>
        </div>

        <div  id="openModal1" class="modalDialog">
            <form action="../phpCode/codigo_elemento_visitante.php" method="POST" id="formulario-editar" enctype="multipart/form-data">
                <a href="#close" title="Cerrar" class="close">X</a>
                <h3 id="titulo-editar">Registrar elemento</h3>
                <hr class="linea-ele">
                <div id="contenedor-editar">
                    <input type="text" class="input-editar" name="documento" placeholder="Número de documento" required>
                    <input type="text" class="input-editar"  name="nombre" placeholder="Nombre elemento" required>
                    <input type="text" class="input-editar"name="descripcion" placeholder ="Descripción elemento">
                    <input type="text" class="input-editar" name="numero_serial" placeholder ="Código serial" required>
                    <div id="subir-foto" class="input-editar">
                        <p id="txt-subir-foto">subir foto</p> 
                        <input id="btn-subir-foto" type="file" name="foto" required>
                    </div>
                    <input type="submit" class="input-editar" id="elemento-visitante" name="Guardar" value="Guardar"> 
                    <a href="verificacion.php#openModal3" id="sin-serial" class="sin-serial">No tiene codigo serial</a>
                </div>
            </form>
        </div>

        <div  id="openModal3" class="modalDialog">
            <form action="../phpCode/insertar_sin_serial_visitante.php" method="POST" id="formulario-editar" enctype="multipart/form-data">
                <a href="#close" title="Cerrar" class="close">X</a>
                <h3 id="titulo-editar">Registrar Elemento</h3>
                <hr class="linea-ele">
                <div id="contenedor-editar">
                    <input class="input-editar" type="text"  name="documento" placeholder="Número de documento" required>
                    <input class="input-editar" type="text" name="nombre" placeholder="Nombre elemento" onkeypress="return Letras(event)" onpaste="return false">
                    <input class="input-editar" type="text" name="descripcion" placeholder ="Descripción elemento" onkeypress="return Letrasynumeros(event)" onpaste="return false">
                    <div id="subir-foto" class="input-editar">
                        <p class="txt-subir-foto">subir foto</p> 
                        <input class="btn-subir-foto" type="file" name="foto" required>
                    </div>
                    <input class="input-btn-visitante" type="submit" name="registro_ele" value="Guardar">
                </div>           
            </form>
        </div>

        <!-- inicio modal buscar sticker visitante -->
        <div  id="openModal4" class="modalDialog">
            <div id="formulario-editar">
                <a href="#close" title="Cerrar" class="close">X</a>
                <h3 class="registrar-elemento">Generar sticker</h3>
                <hr class="linea-ele">
                <div id="registro">
                    <h2 class="generar-serial">De click para generar el código de barras<h2>

                    <?php
                    /**
                     * se incluye el archivo donde esta la conexion a la base de datos
                     */
                    include '../conexi/conexion.php';
                    
                    /**
                     * obtener la sesion
                     *
                     * @var int  $documento       se esta almacenando la sesion del vigilante
                     *           $_SESSION        almacena elnumero de documento del vigilante
                     * 
                     */
                     $documento=$_SESSION['vigi'];
                   
                     /**
                     *  consulta a la base de datos 
                     * 
                     * @var string  $personas       se esta almacenando la consulta a la base de datos
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
                        foreach ($elementos as $elemento):
                    ?>
        
                    <?php
                        endforeach
                    ?> 
                    
                    <!-- manda por la url la variable persona que contiene el numero del documento -->
                    <a href="verificacion.php#openModal5?elemento=<?php echo $elemento['numero_serial_elemento'];?>">
                        <input type="submit" class="input_btn-serial" name="buscar" value="Buscar">
                    </a>
                </div>
            </div>
        </div>
        <!-- inicio modal buscar sticker visitante -->

        <!-- inicio modal descargar sticker visitante -->

        <!-- fin modal descargar sticker visitante -->
        <div  id="openModal5" class="modalDialog">
            <div id="formulario-editar">
            HOLAA
            </div>
        </div>
        <!-- fin registrar usuario -->
   
    <!--inicio_resultado/buscador-->
    
    <div class="resultado_buscar">
        <?php
            /**
             * El condicional indica si se presionó el boton llamado submit 
             * 
             * @var string $search      almacena los datos ingresados en el campo busqueda
             * @var string $elementos   almacena la consulta a la base de datos
             * 
             */
            if(isset($_POST['submit'])){

            $search = $_POST['busqueda'];

            $elementos = mysqli_query($conexion,"SELECT * FROM tbl_elementos WHERE numero_documento_persona 
            like '%$search%' and estado_elemento = '1'");
            
            /**
             * Buscador de elementos mediante el numero de documento 
             *  WHILE                    Mientras elemento contenga contenido a mostrar recorrer
             * 
             * @var string $elemento     Almacena cada dato entrado en la consulta $elementos
             */
    
            while ($elemento =  mysqli_fetch_array($elementos)) {
        ?>
        
            <div class="contenedor-carta">
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
                    
                    <?php
                        $desactivar = mysqli_query($conexion, "SELECT * FROM tbl_historial");
                        $boton = "";
                        $boton1 = "";
                        while($boton_desactivar = mysqli_fetch_array($desactivar)){
                            if($boton_desactivar['numero_serial_elemento'] == $elemento['numero_serial_elemento'] && $boton_desactivar['estado_boton'] == 0){
                                $boton = " disabled";
                            }else{
                                $boton = " ";
                            }

                            if($boton_desactivar['numero_serial_elemento'] == $elemento['numero_serial_elemento'] && $boton_desactivar['estado_boton'] == 1){
                                $boton1 = " disabled";
                            }else{
                                $boton1 = " ";
                            }
                        }
                    ?>

                    <a href="../phpCode/codigo_guardar_historial.php?ingreso=<?php echo $elemento['numero_serial_elemento']; ?>">
                        <button id="boton_ingreso" name="ingreso" <?php echo $boton; ?>>INGRESO</button>
                    </a>
                    <a href="../phpCode/codigo_guardar_historial.php?salida=<?php echo $elemento['numero_serial_elemento']; ?>">
                        <button id="salida" class="" name="salida" <?php echo $boton1; ?>>SALIDA</button>
                    </a>
                    
                </div>
            </div>   
        <?php
                }

                
            }
        ?>
    </div>
    <!--inicio_resultado/buscador-->
    </div>
    <!-- fin barras --> 

    <!--inicio_historial_fecha-->
    <br><br>
        <table>
            <?php
            /**
             * Buscador del historial por fecha
             * 
             * Condicional que inicia la busqueda al presionar el boton llamado submit1 
             * 
             * @var string $conexion    almacena la conexion a la base de datos
             * @var date $fecha         almacena la fecha en el campo llamado fecha1
             * @var string $historial1  almacena la consulta a la base de datos
             * 
             */
                if(isset($_POST['submit1'])){

                    $conexion = mysqli_connect("localhost","root","","registroagil");

                    $fecha = $_POST['fecha1'];

                    $historial1 = mysqli_query($conexion,"SELECT * FROM tbl_historial,tbl_elementos 
                    WHERE tbl_elementos.numero_serial_elemento=tbl_historial.numero_serial_elemento AND
                    CAST(hora_ingreso_historial AS DATE) =  '$fecha' ");
            ?>
            <thead>
                <tr>
                    <th>Nombre elemento</th>
                    <th>Descripción</th>
                    <th>Hora ingreso</th>
                    <th>Hora salida</th>
                </tr>
            </thead>
                <?php
                    /**
                     * While         mientras la consulta tenga resultados se mostrarán
                     */
                    while($elemento1 =  mysqli_fetch_array($historial1)){
                ?>
            <tr>
                <td> <?php echo $elemento1['nombre_elemento'];?></td>
                <td> <?php echo $elemento1['descripcion_elemento'];?></td>
                <td> <?php echo $elemento1['hora_ingreso_historial'];?></td>
                <td> <?php echo $elemento1['hora_salida_historial'];?></td>      
                    <?php
                                }
                            }  
                        ?> 
            </tr>
        </table>
<!--fin_historial-->





    
<!-- fin lado derecho -->

</body>
</html>

<?php
}else {
    echo "<script>window.location='../index.php';</script>";
}
?>