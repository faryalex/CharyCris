<?php

session_start();

if(isset($_POST['usuario']) && isset($_POST['contrasena'])){
  $usuario = $_POST['usuario'];
  $contrasena = $_POST['contrasena'];
  echo "usuario: " . $usuario . "<br>";
  echo "contrasena: " . $contrasena . "<br>";

  include_once('./conexion_bd.php');

  $stmt = $conexion->prepare("SELECT * FROM usuario WHERE user = ?");
  $stmt->bind_param("s", $usuario);
  $stmt->execute();
  $result = $stmt->get_result();

  if($result->num_rows == 1){
    echo "Usuario encontrado en la base de datos.<br>";
    $row = $result->fetch_assoc();
    $password = $row['pass'];
    if($contrasena == $password){
      $_SESSION['usuario'] = $usuario;
      header('Location: ../Ventanas/productos.php');
    } else {
      echo "Contraseña incorrecta.<br>";
    }
  } else {
    echo "Usuario no encontrado en la base de datos.<br>";
  }

  $stmt->close();
  $conexion->close();

}


?>
