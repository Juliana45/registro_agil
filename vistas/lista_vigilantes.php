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
    * $_SESSION       almacena el numero de documento del supervisor
    */
    if (isset($_SESSION['super'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registro ágil</title>
<!--     <script type="text/javascript" src="../js/validacion.js"></script> -->
    <link rel="stylesheet" type="text/css" href="../css/perfil_usuario.css">
    <link rel="stylesheet" type="text/css" href="../css/perfil_supervisor.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css"
    integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
</head>
<body>

<!-- inicio lista -->
<h3 class="letra-elemento">Lista de vigilantes</h1>
<hr class="linea-lis">

<a href="#openModal-vigi"><input type="submit" name="guardar" value="Registrar vigilante" class="registrar-vigi"></a>

    <table>
        <thead>
            <tr>
                <th>N° Documento</th>
                <th>Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <?php
        /**
        *    Muestra todos los vigilante que estan registrados
        *
        * se incluye la conexion a la base de datos
        */
          include '../conexi/conexion.php';
        /**
         *  consulta a la base de datos los datos de vigilante
         * 
         * @var string  $informacion     Se esta almacenando la consulta a la base 
         *                               de datos donde el rol de la persona debe ser 
         *                               igual a vigilante.
         */
        $informacion = mysqli_query($conexion,"SELECT * FROM tbl_personas WHERE rol_persona = 'vigilante'");
         /**
         *  ciclo para listar todos los vigilantes
         * 
         * foreach                      Recorre estructura que contienen varios elementos
         *                              (como arrays).
         * @var string  $informacion     Se esta almacenando la consulta a la base de datos.
         * @var string  $info            Se esta almacenando el dato de la consulta y se
         *                               muestra numero de documento, nombre, apellido y el
         *                               estado del vigilante.
         */
         foreach ($informacion as $info):
        ?>
        <tr>
            <td> <?php
            /**
            * @var string  $info       Se esta mostrando el numero de documento del vigilante.
            */
             echo $info['numero_documento_persona']; ?></td>
            <td> <?php 
            /**
            * @var string  $info       Se esta mostrando el primer nombre del vigilante.
            */
            echo $info['nombre1_persona']; ?></td>
            <td><?php 
            /**
            * @var string  $info       Se esta mostrando el primer apellido del vigilante.
            */
            echo $info['apellido1_persona']; ?></td>
            <td><?php 
            /**
            * @var string  $info       Se esta mostrando el segundo apellido del vigilante.
            */
            echo $info['apellido2_persona']; ?></td>
            <td><?php 
            /**
            * @var string  $info       Se esta mostrando el estado de la persona del vigilante.
            */
            echo $info['estado_persona']; ?></td>      

            <?php

            /**
             * muestra el estado del vigilante
             * 
             * @var string $info            Se almacena el estado del vigilante.
             */
                if ($info['estado_persona'] == 'activo') {
            ?>
            <!-- manda por la url la variable desactivar que contiene el numero de documento del supervisor  -->
            <td><a href="../phpCode/codigo_habilitar.php?desactivar=<?php echo $info['numero_documento_persona']; ?>">
                <button id="boto_ingreso" name="desactivar" value="desactivar">Desactivar</button></a>
            </td>
            <?php

            /**
            * si el estado de vigilante no es = a activo, se mostrara el boton de activar el
            * vigilante.
            */
                }else{
            ?>
            <!-- manda por la url la variable desactivar que contiene el numero de documento del supervisor  -->
            <td><a href="../phpCode/codigo_habilitar.php?activar=<?php echo $info['numero_documento_persona']; ?>">
                <button id="boto_ingreso" name="activar" value="activar">Activar</button></a>
            </td>
            <?php
                }
            ?>
        </tr>
        <?php
            endforeach
        ?>
    </table>
<!-- fin lista -->

<!-- inicio registro vigilante -->
<div  id="openModal-vigi" class="modalDialog">
    <form action="../phpCode/codigo_vigilante.php" method="POST" id="formulario-editar" enctype="multipart/form-data" onsubmit="return validar_visi();">
        <h2 id="titulo-editar">Registrar vigilante</h2>
        <hr class="linea-ele">
        <a href="#close" title="Cerrar" class="close">X</a>
        <div id="contenedor-editar">
            <input class="input-editar" type="text" id="nom1" name="nombre1" placeholder="Primer nombre"
            onkeypress="return Letras(event)" onpaste="return false">

            <select class="input-editar" id="tipo_vi" name="tipo">
                <option hidden>Tipo de Documento</option>
                <option value="cc">Cédula de Ciudadanía</option>
                <option value="ti">Tarjeta de Identidad</option>
                <option value="ce">Cédula de Extranjería</option>
            </select>

            <input class="input-editar" type="text" id="nom2" name="nombre2" placeholder=" Segundo nombre"
            onkeypress="return Letras(event)" onpaste="return false">
            <input class="input-editar" type="text" id="docu" name="documento" placeholder ="Número documento"
            onkeypress="return numeros(event)" onpaste="return false">
            <input class="input-editar" type="text" id="ape1" name="apellido1" placeholder ="Primer apellido"
            onkeypress="return Letras(event)" onpaste="return false">
            <input class="input-editar" type="password" id="clave_e" name="clave" placeholder ="contraseña">
            <input class="input-editar" type="text" id="ape2" name="apellido2" placeholder ="Segundo apellido"
            onkeypress="return Letras(event)" onpaste="return false">
            <input class="input-editar" type="password" name="clave2" placeholder =" Confirmar contraseña">
            <input type="text" class="input-editar" id="correo" name="correo" placeholder="Correo" required>

            <select class="input-editar" name="estado">
                <option hidden>Estado</option>
                <option value="activo">Activo</option>
                <option value="inativo">Inactvio</option>
            </select>
            <input class="input-btn-vigi" type="submit" name="guardar" value="Guardar">  
        </div>
    </form>
</div>
<!-- fin registro vigilante -->
</body>
</html>

<?php
}else {
    echo "<script>window.location='../index.php';</script>";
}
?>