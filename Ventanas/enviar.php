<?php
include_once('../Configuraciones/conexion_bd.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

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

$sql = "SELECT email, telefono FROM usuario WHERE user = '$usuario'";
$result = $conexion->query($sql);

$correo = "";
$telefono = "";
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $correo = $row["email"];
    $telefono = $row["telefono"];
}

$conexion->close();

// Construir el mensaje
// Suponiendo que $allProducts es el array que contiene tus productos
$mensaje1 .= "Compra realizada en CharyCris :<br>";
$mensaje1 = "Nombre de usuario: " . $usuario . "<br>";
$mensaje1 .= "Correo: " . $correo . "<br>";
$mensaje1 .= "Teléfono: " . $telefono . "<br>";



foreach ($allProducts as $product) {
    $mensaje2 .= "=============================<br>";
    $mensaje2 .= "Producto: " . $product['title'] . "<br>";
    $mensaje2 .= "Cantidad: " . $product['quantity'] . "<br>";
    $mensaje2 .= "Precio: " . $product['price'] . "<br>";
    $mensaje2 .= "=============================<br>"; // Separador entre productos

    $subtotal = (float)$product['quantity'] * (float)str_replace('$', '', $product['price']);
    $total += $subtotal;
}
$mensaje2 .= "Total: $" . number_format($total, 2) . "<br>";

$mensaje = $mensaje1 . $mensaje2;

/////////////////////////////////
try {
    // Configuración de envío al administrador
    $mail->isSMTP();
    $mail->Host       = 'smtp-mail.outlook.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'fary_alex@outlook.com';
    $mail->Password   = '2022Asdaspro';
    $mail->Port       = 587;

    $mail->setFrom('fary_alex@outlook.com', 'CharyCris');
    $mail->addAddress('maurohbdiezc@gmail.com', 'CharyCris');
    $mail->isHTML(true);
    $mail->Subject = 'Compra realizada';
    $mail->CharSet = 'UTF-8';
    $mail->Body    = $mensaje;
    $mail->send();
  
    // Verifica si la dirección de correo del cliente no es igual a la dirección del administrador
    if ($correo !== 'maurohbdiezc@gmail.com') {
        // Configuración de envío al cliente
        $mail->clearAddresses(); // Limpia las direcciones de correo previas
        $mail->addAddress($correo); // Agrega la dirección del cliente
        $mail->Subject = 'Compra realizada (Cliente)';
        $mail->Body = $mensajecliente; // Usar el mensaje para el cliente
        $mail->send();
    }

} catch (Exception $e) {

}

///////////////////////////////

$textCliente = "Haz realizado una compra en CharyCris en unos instantes un asesor se pondrá en contacto contigo." ."<br>";
$mensajecliente =$textCliente . $mensaje2;
try {
    $mail->isSMTP();
    $mail->Host       = 'smtp-mail.outlook.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'fary_alex@outlook.com';
    $mail->Password   = '2022Asdaspro';
    $mail->Port       = 587;

    $mail->setFrom('fary_alex@outlook.com', 'CharyCris');
    $mail->addAddress($correo);
    $mail->isHTML(true);
    $mail->Subject = 'Compra realizada';
    $mail->CharSet = 'UTF-8';
    $mail->Body    = $mensajecliente;
 $mail->send();

} catch (Exception $e) {

}
///////////////////////////////////

// Enviar una respuesta JSON al cliente
header('Content-Type: application/json');
$response = array('status' => 'ok');
echo json_encode($response);
?>
