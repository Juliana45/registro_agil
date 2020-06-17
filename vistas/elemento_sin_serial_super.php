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
    <title>Registro ágil</title>
</head>
<body>

<!--inicio_registro_elemento-->
    <div id="form-registro-elemento">
        <h3 class="registrar-elemento">Registrar Elemento</h3>
        <hr class="linea-ele">
        <div id="registro">
            <form action="../phpCode/insertar_sin_serial_super.php" method="POST" enctype="multipart/form-data" onsubmit="return validar_sinserial();">
                
                <input class="input" type="text" id="nombre" name="nombre" placeholder="Nombre" onkeypress="return Letras(event)" onpaste="return false">
                <input class="input" type="text" id="descripcion" name="descripcion" placeholder ="Descripción" onkeypress="return Letrasynumeros(event)" onpaste="return false">
                    
                <div class="subir-foto">
                    <p class="txt-subir-foto">subir foto</p> 
                    <input class="btn-subir-foto" id="foto_ele" type="file" name="foto" >
                </div>

                <input class="input_btn" type="submit" id="submit" name="registro_ele" value="Guardar">
            </form>
        </div>
    </div>
<!--fin_registro_elemento-->  

</body>
</html>

<?php
}else {
    echo "<script>window.location='../index.php';</script>";
}
?>