<?php
include "conexion_bd.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del usuario y limpiarlos
    $user = mysqli_real_escape_string($conexion, $_POST["user"]);
    $nombre = mysqli_real_escape_string($conexion, $_POST["nombre"]);
    $apellido = mysqli_real_escape_string($conexion, $_POST["apellido"]);
    $correo = mysqli_real_escape_string($conexion, $_POST["correo"]);
    $password = mysqli_real_escape_string($conexion, $_POST["password"]);
    $telefono = mysqli_real_escape_string($conexion, $_POST["telefono"]);

    // Validar que los campos no estén vacíos
    
        // Hash de la contraseña
        

        // Sentencia preparada
       $stmt = $conexion->prepare("INSERT INTO usuario(nombre, apellido, user, pass, email, telefono) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nombre, $apellido, $user, $password, $correo, $telefono);
            
        

        // Ejecutar la sentencia
if ($stmt->execute()) {
    // Iniciar sesión
    session_start();
    // Establecer la variable de sesión
    $_SESSION['registro_exitoso'] = true;
    // Redirigir al usuario a una nueva página usando GET
    header("Location: ../Ventanas/login.php", true, 303);
    exit;
} else {
    echo "Error de registro";
}

    }

?>
