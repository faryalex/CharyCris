<?php
include_once('./conexion_bd.php');
// Obtener los dato
$usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];

//


$sql = "SELECT * FROM usuario WHERE user = '$usuario'";
$resultado = mysqli_query($conexion, $sql);

// Verific
if (mysqli_num_rows($resultado) == 1) {
    $fila = mysqli_fetch_assoc($resultado);

    // Verificar 
    if ($verify = password_verify($contrasena, $fila["pass"])) {
        // Iniciar sesión y redirigir al u
        session_start();
        $_SESSION["usuario"] = $usuario;
        header("Location: ../Ventanas/productos.php");

    } else {

        echo "<script>alert('Contraseña incorrecta');</script>";
        echo "<script>window.history.back();</script>";
    }

} else {

    echo "<script>alert('Usuario no existe');</script>";
    echo "<script>window.history.back();</script>";

}

mysqli_close($conexion);

?>