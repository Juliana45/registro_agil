<?php
session_start();
include '../conexi/conexion.php';

if (isset($_SESSION['super'])) {
    if ($_GET['elemento']) {
            $sola = $_GET['elemento'];
            $query = "SELECT * FROM tbl_elementos where numero_serial_elemento=$sola";

            $consulta=mysqli_query($conexion,$query);
            if (mysqli_num_rows($consulta)==1) {
                $elemento= mysqli_fetch_array($consulta);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Editar Elemento</title>
    <script type="text/javascript" src="../js/validacion_num.js"></script>
    <script type="text/javascript" src="../js/validacion_letra.js"></script>
    <script type="text/javascript" src="../js/validacion_letraynumero.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/mis_elementos.css">
    <link rel="stylesheet" type="text/css" href="../css/perfil_usuario.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css"
    integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <title>Registro ágil</title>

    <script>
        $(document).ready(function(){

            $('#formulario-elemento').click(function(){
            $("#contenido").load("../vistas/formulario-elemento-super.php");
            });

            $('#elemento').click(function(){
            $("#contenido").load("../vistas/elemento_supervisor.php");
            });

            $('#listar').click(function(){
            $("#contenido").load("../vistas/lista_vigilantes.php");
            });
        });
    </script>
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
            <button class="editar">
                <a href="#openModal?persona=<?php echo $persona['numero_documento_persona']; ?>">
                <i class="fas fa-user-edit"></i></a>
            </button>
        </div>

        <h3 class="nombre">
            <?php echo $persona['nombre1_persona'];?>
            <?php echo $persona['apellido1_persona'];?>
        </h3>
        <hr class="linea">

        <div class="conenerdor-items">
            <a href="#" id="formulario-elemento"> <button class="item1">Registrar Elementos</button><br></a>
            <a href="#" id="elemento"><button class="item2">Elementos</button><br></a>
            <a href="#" id="listar"><button class="item3">Vigilantes</button><br></a>
            <a href="../phpCode/salir.php"><button class="item4">Salir <i class="fas fa-door-open"></i></button><br></a>
        </div>
    <!-- fin foto y botones de menu -->

    <!--inicio_actualizar_informacion-->
        <div  id="openModal?persona=<?php echo $persona['numero_documento_persona']; ?>" class="modalDialog">
            <form action="../phpCode/codigo_informacion_supervisor.php" method="POST" id="formulario-editar" enctype="multipart/form-data">
                <h3 id="titulo-editar">Actualizar información</h3>
                <hr class="linea-ele">
                <a href="#close" title="Cerrar" class="close">X</a>
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
                    <a href="#openModal2?persona=<?php echo $persona['numero_documento_persona']; ?>" id="item-login">cambiar clave </a>
                </div>
            </form>
        </div>
    <!--fin_actualizar_informacion-->

    <!--inicio cambiar contraseña-->
    <div id="openModal2?persona=<?php echo $persona['numero_documento_persona'];?>" class="modalDialog">
            <a href="#close" title="Cerrar" class="close" id="close-clave">X</a>
            <form action="../phpCode/cambiar_clave_supervisor.php" method="POST" id="formulario-clave">

                <h3 id="titulo-editar">Recuperar contraseña</h3>
                <hr class="linea-ele">

                <div id="editar-clave">

                <input type="text" name="documento" hidden class="input-login" value="<?php echo $persona['numero_documento_persona'];?>">
                
                <input type="password" class="input" name="clave" placeholder="Contraseña" required>

                <input type="password" class="input" name="clave2" placeholder="Confirmar contraseña" required>

                <input type="submit" class="input-btn" name="enviar" value="Enviar"> 

                </div>
            </form>
        </div>
    <!--fin cambiar contraseña-->

    <?php
        endforeach
    ?>
</div>
<!-- inicio lado derecho -->
<div class="contenedor-derecho">
    <div class="contenerdor-elementos" id="contenido">
    <a href="../vistas/perfil_supervisor.php">
    <button id="atras"><i class="fas fa-arrow-left"></i></button>
    </a>
<!--inicio_actualizar_elemento-->
        <div id="form-registro-elemento">

        <h3 class="registrar-elemento">Actualizar Elemento</h3>
        <hr class="linea-ele">
        <div id="registro">
        <form action="../phpCode/codigo_editar_supervisor.php" method="POST" enctype="multipart/form-data">
            <input class="input" type="text" id="input" name="nombre" value="<?php echo $elemento['nombre_elemento'];?>"
            onkeypress="return Letras(event)" onpaste="return false">
            <input class="input" type="text" id="input2" name="descripcion" value="<?php echo $elemento['descripcion_elemento'];?>"
            onkeypress="return Letrasynumeros(event)" onpaste="return false">
            <input class="input" type="text" id="input3" name="numero_serial" hidden value="<?php echo $elemento['numero_serial_elemento'];?>">

                <div class="subir-foto">
                    <p class="txt-subir-foto">subir foto</p> 
                    <input class="btn-subir-foto" type="file" name="foto" required>
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
