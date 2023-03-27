<?php 
    // Obtener el contenido del array del cuerpo de la solicitud
$jsonData = file_get_contents('php://input');

// Decodificar el JSON a un array
$allProducts = json_decode($jsonData, true);

// Convertir el array a una cadena de texto
$mensaje = print_r($allProducts, true);

// Enviar el correo electrónico
$to = 'fary_alex@outlook.com';
$subject = 'Productos del carrito';
$headers = 'From: remitente@ejemplo.com' . "\r\n" .
           'Reply-To: remitente@ejemplo.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $mensaje, $headers);

// Enviar una respuesta JSON al cliente
$response = array('status' => 'ok');
echo json_encode($response);
?> 
