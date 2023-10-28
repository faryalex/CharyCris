<?php
include_once('../Configuraciones/conexion_bd.php');
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];
$confirmar_contrasena = $_POST['confirmar_contrasena'];
if ($contrasena !== $confirmar_contrasena) {
    die("Las contraseñas no coinciden. Por favor, inténtalo de nuevo.");
}
$hashed_password = password_hash($contrasena, PASSWORD_BCRYPT);
$sql = "UPDATE usuario SET pass='$hashed_password' WHERE email='$email'";
if ($conexion->query($sql) === TRUE) {
    echo "<script>alert('Contraseña actualizada con exito');</script>";
    echo "<script>window.location.href = '../login.php';</script>";
} else {
    echo "Error al actualizar la contraseña: " . $conexion->error;
}
$conexion->close();
?>