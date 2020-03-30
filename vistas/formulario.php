<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/registro.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <title>Registro ágil</title>
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
</head>
<body>
    <form action="../phpCode/cambiar_clave.php" method="POST" id="formulario-login" class="recuperar_clave">
    <h2 id="titulo-registro">Recuperar contraseña</h2>
        <div id="contenedor-registro">
            <input type="text" class="input-login" name="correo" placeholder="Correo" required>
            <input type="password" class="input-login" name="clave" placeholder="Contraseña nueva" required>
            <input type="password" class="input-login" name="clave2" placeholder="Confirmar contraseña nueva" required>
            <input type="submit" class="input-btn-login" name="enviar" value="Enviar">
        </div>
    </form>
</body>
</html>