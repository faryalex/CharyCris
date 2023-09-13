<?php include("./Template/cabecera.php"); ?>
    <title>Registro</title>
    <link rel="stylesheet" href="./Style/registro.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
<form method="post" action="./Configuraciones/autenticarregistro.php" class="form-register">
  

  <div class="container d-flex justify-content-center">
  <section class="form-login">
    
  <h4>Formulario Registro</h4>
      <div class="form-group">
        <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre">
      </div>
      <div class="form-group">
        <input class="form-control" type="text" name="apellido" id="apellido" placeholder="Ingrese su apellido">
      </div>
      <div class="form-group">
        <input class="form-control" type="text" name="user" id="user" placeholder="Nombre de usuario">
      </div>
      <div class="form-group">
        <input class="form-control" type="password" name="password" id="password" placeholder="Ingrese una Contraseña">
      </div>
      <div class="form-group">
        <input class="form-control" type="text" name="correo" id="correo" placeholder="Ingrese su correo">
      </div>
      <div class="form-group">
        <input class="form-control" type="tel" name="telefono" id="telefono" placeholder="Ingrese su telefono">
      </div>

      <button class="btn btn-primary" type="submit" id="boton-registrar">Registrar</button>
      <p>¿Ya tengo cuenta? <a href="./login.php">Iniciar sesión</a></p>
    
  </section>
  </div>
 
 

  
</form>

<script type="module" src="./js/autenticar.js"></script>
</body>
</html>