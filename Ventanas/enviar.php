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
$jsonData = file_get_contents('php://input');
$allProducts = json_decode($jsonData, true);
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

$mensaje1 .= "Compra realizada en CharyCris :<br>";
$mensaje1 = "Nombre de usuario: " . $usuario . "<br>";
$mensaje1 .= "Correo: " . $correo . "<br>";
$mensaje1 .= "Teléfono: " . $telefono . "<br>";



foreach ($allProducts as $product) {
    $mensaje2 .= "=============================<br>";
    $mensaje2 .= "Producto: " . $product['title'] . "<br>";
    $mensaje2 .= "Cantidad: " . $product['quantity'] . "<br>";
    $mensaje2 .= "Precio: " . $product['price'] . "<br>";
    $mensaje2 .= "=============================<br>";

    $subtotal = (float) $product['quantity'] * (float) str_replace('$', '', $product['price']);
    $total += $subtotal;
}
$mensaje2 .= "Total: $" . number_format($total, 2) . "<br>";

$mensaje = $mensaje1 . $mensaje2;

try {
    $mail->isSMTP();
    $mail->Host = 'mail.charycris.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'compras@charycris.com';
    $mail->Password = 'compracharycris';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('compras@charycris.com', 'CharyCris');
    $mail->addAddress('pedidoscharycris@gmail.com', 'CharyCris');
    $mail->isHTML(true);
    $mail->Subject = 'Compra realizada';
    $mail->CharSet = 'UTF-8';
    $mail->Body = $mensaje;
    $mail->send();

    if ($correo !== 'pedidoscharycris@gmail.com') {
        $mail->clearAddresses();
        $mail->addAddress($correo);
        $mail->Subject = 'Compra realizada (Cliente)';
        $mail->Body = $mensajecliente;
        $mail->send();
    }

} catch (Exception $e) {

}

$textCliente = "Haz realizado una compra en CharyCris en unos instantes un asesor se pondrá en contacto contigo." . "<br>";
$mensajecliente = $textCliente . $mensaje2;
try {
    $mail->isSMTP();
    $mail->Host = 'mail.charycris.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'compras@charycris.com';
    $mail->Password = 'compracharycris';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('compras@charycris.com', 'CharyCris');
    $mail->addAddress($correo);
    $mail->isHTML(true);
    $mail->Subject = 'Compra realizada';
    $mail->CharSet = 'UTF-8';
    $mail->Body = $mensajecliente;
    $mail->send();

} catch (Exception $e) {

}
header('Content-Type: application/json');
$response = array('status' => 'ok');
echo json_encode($response);
?>