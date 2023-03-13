<?php 
  $carrito = json_decode($_POST["variable"]);

  // Crear el mensaje del correo electrónico
  $mensaje = "Productos:\n\n";
  foreach ($carrito->productos as $producto) {
    $mensaje .= "- " . $producto->nombre . " ($" . $producto->precio . ")\n";
  }
  $mensaje .= "\nTotal: $" . $carrito->total;

  // Enviar el correo electrónico
  $para = "fary_alex@outlook.com";
  $asunto = "Carrito de compras";
  $cabeceras = "From: remitente@example.com";
  mail($para, $asunto, $mensaje, $cabeceras);
 

?> 
