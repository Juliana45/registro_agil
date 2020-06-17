<!DOCTYPE html>
<html>
<head>
	<title>Registro ágil</title>
    <link rel="stylesheet" type="text/css" href="../css/mis_elementos.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
    <script type="text/javascript" src="../js/validacion.js"></script>
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
            * #sin-serial               Cuando se le da click en el boton regisro elemento
            *                           se activara el id.
            * #contenido                Este es el id del contenedor donde se va va a traer 
            *                           otra pagina.
            */
            $('#sin-serial').click(function(){
            $("#contenido").load("../vistas/elemento_sin_serial.php");
            });

        });
    </script>
</head>
<body>
<!-- formulario registro elemento -->
<div id="form-registro-elemento">
    <h3 class="registrar-elemento">Registrar elemento</h3>
    <hr class="linea-ele">
    <div id="registro">
        <form action="../phpCode/codigo_elemento_usuario.php" method="POST" enctype="multipart/form-data" onsubmit="return validar_elemento();">
            <input class="input" type="text" id="input" name="nombre" placeholder="Nombre"
            onkeypress="return Letras(event)" onpaste="return false" required>

            <input class="input" type="text" id="input2" name="descripcion" placeholder ="Descripción" onkeypress="return Letrasynumeros(event)" onpaste="return false" required>

            <input class="input" type="text" id="input3" name="numero_serial" placeholder ="Código serial" onkeypress="return numeros(event)" onpaste="return false" required><br>
            <a href="#" id="sin-serial" class="serial">No tiene código serial</a>

            <div class="subir-foto">
                <p class="txt-subir-foto">subir foto</p> 
                <input class="btn-subir-foto" id="foto_ele" type="file" name="foto" >
            </div>

            <input class="input_btn" type="submit" id="submit" name="registro_ele" value="Guardar">
        </form>
    </div>
</div>
<!-- formulario registro elemento --> 

</body>
</html>