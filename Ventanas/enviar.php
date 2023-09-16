<?php
session_start();

// Obtener el contenido del array del cuerpo de la solicitud
$jsonData = file_get_contents('php://input');

// Decodificar el JSON a un array
$allProducts = json_decode($jsonData, true);

// Obtener el nombre de usuario de la sesión
$usuario = "";
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
}

// Obtener la información del usuario desde la base de datos
$servername = "localhost";
$username = "id19074660_bddcharycris";
$password = "Asdaspro2018@";
$dbname = "id19074660_bddcharycris";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT email, telefono FROM usuario WHERE user = '$usuario'";
$result = $conn->query($sql);

$correo = "";
$telefono = "";
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $correo = $row["email"];
    $telefono = $row["telefono"];
}

$conn->close();

// Construir el mensaje
$mensaje = "Nombre de usuario: " . $usuario . "\n";
$mensaje .= "Correo: " . $correo . "\n";
$mensaje .= "Teléfono: " . $telefono . "\n";
$mensaje .= "Productos del carrito:\n" . print_r($allProducts, true);

// Enviar el correo electrónico
$to = 'fary_alex@outlook.com';
$subject = 'Productos del carrito';
$headers = 'From: remitente@ejemplo.com' . "\r\n" .
           'Reply-To: remitente@ejemplo.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $mensaje, $headers);

// Enviar una respuesta JSON al cliente
header('Content-Type: application/json');
$response = array('status' => 'ok');
echo json_encode($response);
?>
