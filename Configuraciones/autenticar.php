<?php
include_once('./conexion_bd.php');
// Obtener los datos enviados por el formulario
$usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];

// Conectar a la base de datos


// Realizar la consulta SQL
$sql = "SELECT * FROM usuario WHERE user = '$usuario'";
$resultado = mysqli_query($conexion, $sql);

// Verificar si se encontró el usuario
if (mysqli_num_rows($resultado) == 1) {
    $fila = mysqli_fetch_assoc($resultado);

    // Verificar si la contraseña es correcta
    if ($verify=password_verify($contrasena, $fila["pass"])) {
        // Iniciar sesión y redirigir al usuario a la página de inicio
        session_start();
        $_SESSION["usuario"] = $usuario;
        header("Location: ../Ventanas/productos.php");
        
    } else {
        // Mostrar un mensaje de error si la contraseña es incorrecta
        echo "<script>alert('Contraseña incorrecta');</script>"; 
        echo "<script>window.history.back();</script>";
    }
   
} else {
    // Mostrar un mensaje de error si el usuario no existe
    echo "<script>alert('Usuario no existe');</script>";
    echo "<script>window.history.back();</script>";
    
}


// Cerrar la conexión a la base de datos
mysqli_close($conexion);

?>
