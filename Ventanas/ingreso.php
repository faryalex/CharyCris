<?php include("../Template/cabecera.php"); ?>
<?php include("../Template/btnWhat.php"); ?>
    <title>Ingreso</title>
    <link rel="stylesheet" href="../Style/login.css" />
</head>
<body>
    <section class="form-login">
        <h5>INICIAR SESION EN CHARYCRIS</h5>
        <form method="POST" action="../Configuraciones/autenticar.php">
        <input class="controls" type="text" name="usuario" placeholder="Usuario">
        <input class="controls" type="password" name="contrasena" placeholder="Contraseña">
        <input class="buttons" type="submit" name="" value="Ingresar">
        </form>
        <p><a href="#">¿Olvidastes tu Contraseña?</a></p>
  
      </section>
</body>
</html>