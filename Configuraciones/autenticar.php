<?php
include_once('./conexion_bd.php');
// Obtener los dato
$usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];

$response = array();

if ($stmt = $conexion->prepare("SELECT * FROM usuario WHERE user = ?")) {
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if (mysqli_num_rows($resultado) == 1) {
        $fila = mysqli_fetch_assoc($resultado);

        if (password_verify($contrasena, $fila["pass"])) {
            // Inicio de sesión exitoso
            session_start();
            $_SESSION["usuario"] = $usuario;
            $response['success'] = true;
        } else {
            // Contraseña incorrecta
            $response['success'] = false;
            $response['error'] = "Contraseña incorrecta";
        }
    } else {
        // Usuario no encontrado
        $response['success'] = false;
        $response['error'] = "Usuario no existe";
    }

    mysqli_close($conexion);
} else {
    // Error en la consulta SQL
    $response['success'] = false;
    $response['error'] = "Error en la consulta SQL";
}

header('Content-Type: application/json');
echo json_encode($response);


?>