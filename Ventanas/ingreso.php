<?php include("../Template/cabecera.php"); ?>
    <title>Ingreso</title>
    <link rel="stylesheet" href="../Style/login.css" />
</head>
<body>
    <section class="form-login">
        <h5>INICIAR SESION EN CHARYCRIS</h5>
        <input class="controls" type="text" name="usuario" value="" placeholder="Usuario">
        <input class="controls" type="password" name="contrasena" value="" placeholder="Contraseña">
        <input class="buttons" type="submit" name="" value="Ingresar">
        <p><a href="#">¿Olvidastes tu Contraseña?</a></p>
  
      </section>
  
    <?php
    include("../Configuraciones/conexion_bd.php");
    include("../Configuraciones/validarlogin.php");
    ?>
</body>
</html>