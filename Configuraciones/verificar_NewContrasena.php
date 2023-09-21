<?php
// verificar_contrasena.php
$servername = "localhost";
$username = "id19074660_bddcharycris";
$password = "Asdaspro2018@";
$dbname = "id19074660_bddcharycris";
// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

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

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Contraseña actualizada con exito');</script>"; 
    echo "<script>window.location.href = '../login.php';</script>";
    

} else {
    echo "Error al actualizar la contraseña: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
