<?php
include_once('./conexion_bd.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"];
    $sql = "SELECT * FROM usuario WHERE email = '$correo'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        header("Location: ./recuperar-contrasena-exito.php");
        exit();
    } else {
        $mensaje = "El correo electrónico ingresado no está registrado en nuestra base de datos.";
        exit();
    }
}
?>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="form-group">
        <label for="correo">Ingresa tu correo electrónico registrado:</label>
        <input type="email" class="form-control" id="correo" name="correo" required>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
if (!empty($mensaje)) {
    echo '<div id="mensaje-error" class="alert alert-danger mt-3" role="alert">' . $mensaje . '</div>';
}
?>
<script>
    const mensajeError = document.getElementById("mensaje-error");
    const correoInput = document.getElementById("correo");
    correoInput.addEventListener("input", function () {
        mensajeError.innerHTML = "";
    });
</script>