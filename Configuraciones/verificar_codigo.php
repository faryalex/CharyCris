<?php
// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el código ingresado por el usuario y el correo electrónico asociado
    $codigoIngresado = $_POST["codigo"];
    $email = $_POST["email"];

    // Realizar la conexión a la base de datos (reemplaza los valores con los de tu configuración)
    $servername = "localhost";
    $username = "id19074660_bddcharycris";  
    $password = "Asdaspro2018@";
    $dbname = "id19074660_bddcharycris";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar si la conexión fue exitosa
    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }

    // Prevenir ataques de inyección SQL escapando los valores
    $codigoIngresado = $conn->real_escape_string($codigoIngresado);
    $email = $conn->real_escape_string($email);

    // Consultar la base de datos para obtener el código almacenado correspondiente al correo electrónico
    $sql = "SELECT codigo_verificacion FROM usuario WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $codigoAlmacenado = $row["codigo_verificacion"];

        // Comparar los códigos
        if ($codigoIngresado === $codigoAlmacenado) {
            // El código coincide
            // Eliminar el código de verificación de la base de datos
        // Eliminar el código de verificación de la base de datos
        $sqldelete = "UPDATE `usuario` SET codigo_verificacion = '000000' WHERE email = '$email' AND codigo_verificacion='$codigoAlmacenado'";

        if ($conn->query($sqldelete) === TRUE) {
        
        } else {
         echo "Error al eliminar el código de verificación: " . $conn->error;
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
    $conn->close();
}

?>
