<!DOCTYPE html>
<html>

<head>
    <title>Recuperar/ Cambiar Contraseña</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Style/recuperapass.css" />
</head>

<body>
    <div class="container d-flex justify-content-center">
      <section class="form-login">
        <h5>Recuperar/Cambiar Contraseña</h5>
        <form id="recuperarpass" method="post" action="../Configuraciones/envia_codigo.php">
          <div class="form-group">
            <label for="email">Correo electrónico:</label>
            <input class="form-control" type="email" name="email" id="email">
          </div>
          <button type="submit" class="btn btn-primary">Enviar</button>
          <a href="../login.php" class="btn btn-primary">Regresar</a>
        </form>
      </section>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>