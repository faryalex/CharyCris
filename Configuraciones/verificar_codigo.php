<?php

include_once('../Configuraciones/conexion_bd.php');
// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el código ingresado por el usuario y el correo electrónico asociado
    $codigoIngresado = $_POST["codigo"];
    $email = $_POST["email"];
    // Prevenir ataques de inyección SQL escapando los valores
    $codigoIngresado = $conexion->real_escape_string($codigoIngresado);
    $email = $conexion->real_escape_string($email);

    // Consultar la base de datos para obtener el código almacenado correspondiente al correo electrónico
    $sql = "SELECT codigo_verificacion FROM usuario WHERE email = '$email'";
    $result = $conexion->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $codigoAlmacenadoEncriptado = $row["codigo_verificacion"];

        // Comparar los códigos
        if (password_verify($codigoIngresado, $codigoAlmacenadoEncriptado))  {
            // El código coincide
       
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
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="container mt-5">
        <h2 class="text-center">Crear Contraseña</h2>
        <form method="post" action="verificar_NewContrasena.php">
            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
            </div>
            <div class="mb-3">
                <label for="confirmar_contrasena" class="form-label">Confirmar Contraseña:</label>
                <input type="password" class="form-control" id="confirmar_contrasena" name="confirmar_contrasena" required>
            </div>
            <!-- Agregar un campo oculto para enviar el correo electrónico al procesar el formulario de verificación -->
            <input type="hidden" name="email" value="<?php echo $email; ?>">
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="../Ventanas/login.php" class="btn btn-primary">Regresar</a>
            </div>
        </form>
    </div>

    <!-- Enlace a Bootstrap JS (opcional si necesitas funcionalidades específicas de Bootstrap) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php

        } else {
          
            // El código no coincide
           echo "<script>alert('El codigo ingresado no coincide');</script>"; 
            echo "<script>window.history.back();</script>";
        }
    } else {
        // No se encontró ningún registro para el correo electrónico proporcionado
        echo "El correo electrónico no fue encontrado en la base de datos.";
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
}

?>
