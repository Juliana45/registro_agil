<?php
  session_start();
  include 'conexi/conexion.php';

  /**
   * inicia los perfiles 
   * 
   * user  inicia sesion el usuario
   * super inicia sesion el supervisor
   * vigi inicia sesion el vigilante
   * 
   */
  if (isset($_SESSION['user'])) { 

    echo "<script> window.location='perfil_usuario.php'; </script>";
  }else if (isset($_SESSION['super'])) {

    echo "<script> window.location='perfil_supervisor.php'; </script>";
  }else if (isset($_SESSION['vigi'])) {

    echo "<script> window.location='perfil_vigilante.php'; </script>";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/validacion.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/registro.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
   
    <title>Registro agil</title>
</head>
<body>  

<!--inicio_header-->
  <header>
    <a href="#openModal" id="menu">Iniciar Sesión</a>
    <a href="#openModal1" id="menu">Registro </a>
    <div id="espacio-logo">
      <img id="logo" src="img/logoBLANCO.gif">
    </div>
  </header>
<!--Fin_header-->

<div class="fondo">
  <!--inicio ventana modal-->
    <!--inicio_login-->
      <div  id="openModal" class="modalDialog">
      <a href="#close" class="close">X</a>
        <form action="phpCode/codigo_login.php" method="POST" id="formulario-login" onsubmit="return validar_login();">
          <h2 id="titulo-registro">Iniciar Sesión</h2>
          
          <div id="contenedor-registro">
            <select name="tipo_documento" class="input-login" id="select-login">
                  <option hidden>Tipo de Documento</option>
                  <option value="cc">Cédula de Ciudadanía</option>
                  <option value="ti">Tarjeta de Identidad</option>
                  <option value="ce">Cédula de Extrangería</option>
            </select>            

            <input type="text" class="input-login" id="documento2" name="documento2" placeholder="Número de documento" 
            onkeypress="return numeros(event)" onpaste=" return false">

            <input type="password" class="input-login" name="clave" placeholder="Contraseña" >

            <input type="submit" class="input-btn-login" name="iniciar" value="Iniciar sesion">

            <p id="btn-login"> 
              <a class="item-login" href="#openModal1">No tienes cuenta,registrate.</a><br>
              <a class="item-login" href="#openModal2">¿Olvidaste la contraseña?</a>
            </p>
          </div>
        </form>
      </div>
    <!--fin_login-->
    
    <!--inicio_registro-->
      <div  id="openModal1" class="modalDialog">
        <a href="#close" id="close-registro" class="close">X</a>
        <form action="phpCode/codigo_usuario.php" method="POST" id="formulario-registro" enctype="multipart/form-data" onsubmit="return validar_registro();">
          <h2 id="titulo-registro">Registrate</h2>
          
          <div id="contenedor-registro">
            <input type="text" class="input-registro" id="nombre1" name="nombre1" placeholder="Primer Nombre" 
            onkeypress="return Letras(event)" onpaste="return false" required>

            <select  name="tipo" id="tipo_docu" class="input-registro" required>
              <option hidden>Tipo de Documento</option>
              <option value="cc">Cédula de Ciudadanía</option>
              <option value="ti">Tarjeta de Identidad</option>
              <option value="ce">Cédula de Extranjería</option>
            </select>

            <input type="text" class="input-registro" id="nombre2" name="nombre2" placeholder="Segundo Nombre"
            onkeypress="return Letras(event)" onpaste=" return false">
            <input type="text" class="input-registro" id="documento" name="documento_r" placeholder="Número de documento" 
            onkeypress="return numeros(event)" onpaste=" return false" required>
            <input type="text" class="input-registro" id="apellido1" name="apellido1" placeholder="Primer Apellido" 
            onkeypress="return Letras(event)" onpaste=" return false" required>
            <input type="text" class="input-registro" id="correo" name="correo" placeholder="Correo" required>
            <input type="text" class="input-registro" id="apellido2" name="apellido2" placeholder="Segundo Apellido"
            onkeypress="return Letras(event)" onpaste=" return false">
            <input type="password" class="input-registro" id="clave" name="clave_r" placeholder="Contraseña" required>
            <div id="subir-foto" class="input-registro">
                <p  id="txt-subir-foto">subir foto</p> 
                <input id="btn-subir-foto" type="file" name="foto">
            </div>
            <input type="password" class="input-registro" name="clave2" placeholder="Repita su contraseña" required>
            <input type="submit" class="input-btn-registro" name="registro" value="Registrar">

            <p id="btn-login">¿Ya tienes una cuenta?<a href="#openModal" id="a-btn-login">ingresa aqui</a></p>
          </div>
        </form>
      </div>
    <!--fin_registro-->

    <!--inicio olvidaste tu contraseña-->
    <div id="openModal2" class="modalDialog">
      <a href="#close" class="close">X</a>
        <form action="phpCode/codigo_enviar_email.php" method="post" id="formulario-login">
          <h2 id="titulo-recuperar">Recuperar contraseña</h2>
          <div id="contenedor-registro">
            <p id="txt-recuperar">Ingrese el correo con el que se registro:</p>
            <input type="text" class="input-login" name="correo" required>
            <input type="submit" class="input-btn-login" name="submit" value="Enviar">
          </div>
        </form>
    </div>
    <!--fin olvidaste tu contraseña-->
  <!--fin ventana modal-->
</div>

<!--inicio_como funciona-->
<div class="como_funciona">
  <br>
    <h1>¿CÓMO <font color="#0097A7">FUNCIONA?</font></h1><br>
    <div class="grid-container">
      <div class="card">
        <div class="img"><img src="img/registro.png" alt="" class="iconos"></div>
        <div ><br>
          <h2>Registro</h2><br>
          <p>Registrarse en la plataforma como usuario.</p>
        </div>
      </div>
      <div class="card">
        <div class="img"><img src="img/login.png" alt="" class="iconos"></div>
        <div><br>
          <h2>Iniciar sesión</h2><br>
          <p>Some quick example text to build on the card title.</p>
        </div>
      </div>
      <div class="card">
        <div class="img"><img src="img/ele.png" alt="" class="iconos"></div>
        <div><br>
          <h2>Registrar elemento</h2><br>
          <p>Registrar los elementos que va a ingresar al complejo.</p>
        </div>
      </div>
      <div class="card">
        <div class="img"><img src="img/lector.png" alt="" class="iconos"></div>
        <div><br>
          <h2>Lector</h2><br>
          <p>Pasar el código de barras de su carnet por el lector.</p>
        </div>
      </div>
      <div class="card">
        <div class="img"><img src="img/verificacion.png" alt="" class="iconos"></div>
        <div><br>
          <h2>Verificación</h2><br>
          <p>El vigilante verificara su información en la plataforma.</p>
        </div>
      </div>
    </div>
</div>
<!--fin_como funciona-->

<!--inicio linea de tiempo--> 
<br><br><center>
  <div class="linea-tiempo">
    <br><br>
    <div class="momento">
      <h3>¿Quiénes somos?</h3>
      <div class="informacion">
        Registro Ágil es una plataforma especializada en ofrecer un registro de elementos con agilidad, facilidad y eficiencia para el Complejo Norte (Sena Pedregal).
      </div>
    </div>
    <div class="momento">
      <h3>Misión</h3>
      <div class="informacion" id="informacion1">
        Contribuir a una mayor comodidad y agilidad para la comunidad SENA a la hora de realizar el registro e
        ingreso de los elementos,disponiendo de una plataforma que permita registar los elementos desde cualquier lugar y 
        dispositivo que tenga internet,de este modo,al ingresar al complejo solo deba ser verificado por el vigilante.
      </div>
    </div>
    <div class="momento">
      <h3>Visión</h3>
      <div class="informacion">
        Lograr ser una plataforma reconocida por su eficiencia, comodidad y fácil uso, así mismo, ser implemetada en los complejos del Sena a nivel nacional.
      </div>
    </div>
    <br><br><br>
  </div>
</center><br><br>
<!--fin linea de tiempo-->

<!--inicio_footer-->
<div class="footer">
  <center><br><h5> Dirección: Carrera 68 # 104, complejo Norte-SENA Regional Antioquía, Medellín.</h5>
    <h5>Telefono: (4) 444 28 00</h5><br></center>
</div>
<!--fin_footer-->
</body>
</html>