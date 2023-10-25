<?php
include_once('../Configuraciones/conexion_bd.php');

// Obtener los datos del formulario
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];
$confirmar_contrasena = $_POST['confirmar_contrasena'];

// Verificar que las contraseñas coinciden
if ($contrasena !== $confirmar_contrasena) {
    die("Las contraseñas no coinciden. Por favor, inténtalo de nuevo.");
}

// Hashear la contraseña antes de almacenarla (ejemplo usando bcrypt)
$hashed_password = password_hash($contrasena, PASSWORD_BCRYPT);

// Actualizar la contraseña del usuario en la base de datos
$sql = "UPDATE usuario SET pass='$hashed_password' WHERE email='$email'";

if ($conexion->query($sql) === TRUE) {
    echo "<script>alert('Contraseña actualizada con exito');</script>"; 
    echo "<script>window.location.href = '../login.php';</script>";
    

} else {
    echo "Error al actualizar la contraseña: " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
