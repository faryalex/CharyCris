<?php
include_once('./conexion_bd.php');

if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['user']) && isset($_POST['password']) && isset($_POST['correo']) && isset($_POST['telefono'])) {
  
  // Recuperar los datos del formulario
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $user = $_POST['user'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT, array("cost"=>5)); // Encriptar la contraseña
  $correo = $_POST['correo'];
  $telefono = $_POST['telefono'];

  // Validar los datos
  if(empty($nombre) || empty($apellido) || empty($user) || empty($password) || empty($correo) || empty($telefono)) {
    echo "<script>alert('Complete todos los campos');</script>"; 
    echo "<script>window.history.back();</script>";
    exit();
  }

  if(!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('correo electronico no es valido');</script>"; 
    echo "<script>window.history.back();</script>";
    exit();
  }

  if(!preg_match("/^[0-9]{10}$/", $telefono)) {
    echo "<script>alert('El numero de telefono no es valido');</script>"; 
    echo "<script>window.history.back();</script>";
    exit();
  }

  // Verificar si el usuario o el correo electrónico ya existen
  $stmt = $conexion->prepare("SELECT * FROM usuario WHERE user = ? OR email = ?");
  $stmt->bind_param("ss", $user, $correo);
  $stmt->execute();
  $result = $stmt->get_result();

  if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if($row['user'] === $user) {
      echo "<script>alert('El nombre de usuario ya se encuentra registrado');</script>"; 
      echo "<script>window.history.back();</script>";
      exit();
    } else if($row['email'] === $correo) {
      echo "<script>alert('El correo electronico ya se encuentra registrado');</script>"; 
      echo "<script>window.history.back();</script>";
      exit();
    }
  }

  // Insertar los datos en la base de datos
  $stmt = $conexion->prepare("INSERT INTO usuario (nombre, apellido, user, pass, email, telefono) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssss", $nombre, $apellido, $user, $password, $correo, $telefono);

  if($stmt->execute()) {
    echo "<script>alert('REGISTRO EXITOSO');</script>"; 
    echo "<script>window.location.href = '../Ventanas/login.php';</script>";
} else {
    echo "Error al registrar usuario: " . $stmt->error;
    
  }

  $stmt->close();
  $conexion->close();

}
?>
