<?php
include_once('./conexion_bd.php');
$response = array();

if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['user']) && isset($_POST['password']) && isset($_POST['correo']) && isset($_POST['telefono'])) {
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $user = $_POST['user'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT, array("cost" => 5)); // Encriptar la contraseña
  $correo = $_POST['correo'];
  $telefono = $_POST['telefono'];
  $stmt = $conexion->prepare("SELECT * FROM usuario WHERE user = ? OR email = ?");
  $stmt->bind_param("ss", $user, $correo);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['user'] === $user) {
      $response['success'] = false;
      $response['error'] = "El nombre de usuario ya se encuentra registrado";
    } else if ($row['email'] === $correo) {
      $response['success'] = false;
      $response['error'] = "El correo electrónico ya se encuentra registrado";
    }
  } else {
    $stmt = $conexion->prepare("SELECT * FROM usuario WHERE telefono = ?");
    $stmt->bind_param("s", $telefono);
    $stmt->execute();
    $telefonoResult = $stmt->get_result();

    if ($telefonoResult->num_rows > 0) {
      $response['success'] = false;
      $response['error'] = "Teléfono se encuentra registrado";
    } else {
      $stmt = $conexion->prepare("INSERT INTO usuario (nombre, apellido, user, pass, email,codigo_verificacion, telefono) VALUES (?, ?, ?, ?, ?, '000000', ?)");
      $stmt->bind_param("ssssss", $nombre, $apellido, $user, $password, $correo, $telefono);

      if ($stmt->execute()) {
        $response['success'] = true;
      } else {
        $response['success'] = false;
        $response['error'] = "Error al registrar usuario: " . $stmt->error;
      }
      $stmt->close();
    }
  }

  $conexion->close();
} else {
  $response['success'] = false;
  $response['error'] = "Todos los campos deben estar completos";
}

header('Content-Type: application/json');
echo json_encode($response);
