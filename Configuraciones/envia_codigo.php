<?php
// Conexión a la base de datos (ejemplo con MySQLi)
$servername = "localhost";
$username = "id19074660_bddcharycris";
$password = "Asdaspro2018@";
$dbname = "id19074660_bddcharycris";

$email = $_POST['email'];

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si hay errores en la conexión
if ($conn->connect_error) {
    die('Error en la conexión a la base de datos: ' . $conn->connect_error);
}



$codigoVerificacion = generarCodigoVerificacion();

function generarCodigoVerificacion()
{
    // Genera un código de verificación de 6 dígitos
    return mt_rand(100000, 999999);
}

$sql = "UPDATE usuario SET codigo_verificacion = '$codigoVerificacion' WHERE email = '$email'";

if ($conn->query($sql) === true) {
// Construir el mensaje
$mensaje = "Tu codigo de verificacion es: " . $codigoVerificacion . "\n";

// Enviar el correo electrónico
$to = $email;
$subject = 'Productos del carrito';
$headers = 'From: remitente@ejemplo.com' . "\r\n" .
           'Reply-To: remitente@ejemplo.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $mensaje, $headers);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Verificación de Código</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10">
                <form method="post" action="verificar_codigo.php">
                    <label for="codigo">Ingresa el código que recibiste en tu Correo electrónico:</label>
                    <div class="input-group">
                        <input type="text" id="codigo" name="codigo" class="form-control" required pattern="[0-9]+" title="Ingresa solo números">
                        <!-- Agregar un campo oculto para enviar el correo electrónico al procesar el formulario de verificación -->
                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                    </div>
                    <div class="text-center mt-3"> <!-- Agregamos la clase 'mt-3' para dar espacio en la parte superior -->
                        <button type="submit" class="btn btn-primary">Verificar</button>
                        <a href="../login.php" class="btn btn-primary">Regresar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Enlace a Bootstrap JS (opcional si necesitas funcionalidades específicas de Bootstrap) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<?php 

} else {
    echo 'Error al guardar el código de verificación en la base de datos: ' . $conn->error;
}

$conn->close();

?>