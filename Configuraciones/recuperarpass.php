<?php
// incluir aquí la conexión a la base de datos y otras configuraciones necesarias
include_once('./conexion_bd.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"];

    // realizar la consulta para verificar si el correo electrónico existe en la base de datos
    $sql = "SELECT * FROM usuario WHERE email = '$correo'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        // enviar correo electrónico con el enlace para restablecer la contraseña
        // aquí podrías utilizar una librería para enviar correos electrónicos, como PHPMailer o similar
        // luego redireccionar al usuario a una página de éxito
        header("Location: ./recuperar-contrasena-exito.php");
        exit();
    } else {
        // mostrar un mensaje de error si el correo electrónico no existe en la base de datos
        $mensaje = "El correo electrónico ingresado no está registrado en nuestra base de datos.";
        exit();
    }
}
?>

<!-- aquí va el código HTML para el formulario de recuperación de contraseña -->
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="form-group">
        <label for="correo">Ingresa tu correo electrónico registrado:</label>
        <input type="email" class="form-control" id="correo" name="correo" required>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
// mostrar el mensaje de error, si existe
if (!empty($mensaje)) {
    echo '<div id="mensaje-error" class="alert alert-danger mt-3" role="alert">' . $mensaje . '</div>';
}
?>

<script>
    // obtener el elemento HTML que muestra el mensaje de error
    const mensajeError = document.getElementById("mensaje-error");

    // agregar un evento "input" al campo de correo electrónico
    const correoInput = document.getElementById("correo");
    correoInput.addEventListener("input", function() {
        // cambiar el contenido del mensaje de error a una cadena vacía
        mensajeError.innerHTML = "";
    });
</script>
