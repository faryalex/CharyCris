<?php include("./Template/cabecera.php"); ?>

<head>
  <title>Ingreso</title>
  <link rel="stylesheet" href="./Style/login.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
  <form id="login-form" method="post" action="Configuraciones/autenticar.php">
    <div class="container d-flex justify-content-center">
      <section class="form-login">
        <h5>INICIAR SESION EN CHARYCRIS</h5>
        <form>
          <div class="form-group">
            <label for="usuario">Usuario</label>
            <input class="form-control" type="text" name="usuario" id="usuario" placeholder="Usuario">
          </div>
          <div class="form-group">
            <label for="contrasena">Contraseña</label>
            <input class="form-control" type="password" name="contrasena" id="contrasena" placeholder="Contraseña">
          </div>
          <button type="submit" class="btn btn-primary">Ingresar</button>
          <p><a href="./Ventanas/recuperarpass.php">¿Olvidastes tu Contraseña?</a></p>
          <p><a href="./registro.php">¿No tienes una cuenta? Registrate</a></p>
          <div id="mensaje"></div>
        </form>
      </section>
    </div>
  </form>

  <script src="js/login.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>