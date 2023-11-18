<?php

include_once('../Configuraciones/conexion_bd.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigoIngresado = $_POST["codigo"];
    $email = $_POST["email"];
    $codigoIngresado = $conexion->real_escape_string($codigoIngresado);
    $email = $conexion->real_escape_string($email);
    $sql = "SELECT codigo_verificacion FROM usuario WHERE email = '$email'";
    $result = $conexion->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $codigoAlmacenadoEncriptado = $row["codigo_verificacion"];
        if (password_verify($codigoIngresado, $codigoAlmacenadoEncriptado)) {
            $sqldelete = "UPDATE `usuario` SET codigo_verificacion = '000000' WHERE email = '$email' AND codigo_verificacion='$codigoAlmacenadoEncriptado'";
            if ($conexion->query($sqldelete) === TRUE) {

            } else {
                echo "Error al eliminar el código de verificación: " . $conexion->error;

            }
            ?>
            <!DOCTYPE html>
            <html>

            <head>
                <title>Crear Contraseña</title>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                <link rel="stylesheet" href="../Style/ingresa_codigo.css" />
            </head>
            <body class="d-flex justify-content-center align-items-center">
        <div class="container d-flex justify-content-center">
      <section class="form-login">
        <h5>Crear Contraseña</h5>
        <form method="post" action="verificar_NewContrasena.php">
          <div class="form-group">
          <label for="contrasena" class="form-label">Contraseña:</label>
         <input type="password" class="form-control" id="contrasena" name="contrasena" required>
          </div>
          <div class="form-group">
          <label for="confirmar_contrasena" class="form-label">Confirmar Contraseña:</label>
        <input type="password" class="form-control" id="confirmar_contrasena" name="confirmar_contrasena"required>
          </div>
          <input type="hidden" name="email" value="<?php echo $email; ?>">
          <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="../Ventanas/login.php" class="btn btn-primary">Regresar</a>
        </form>
      </section>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>

            </html>

            <?php
        } else {
            echo "<script>alert('El codigo ingresado no coincide');</script>";
            echo "<script>window.history.back();</script>";
        }
    } else {
        echo "El correo electrónico no fue encontrado en la base de datos.";
    }
    $conexion->close();
}

?>