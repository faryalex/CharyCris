<?php

if (!empty($_POST["btnregistrar"])) {
    if (empty($_POST["reg_usuario"]) || empty($_POST["reg_password"]) || empty($_POST["reg_email"])  ) {
        echo "Los campos estan vacios";
    } else {
        $Usuario = $_POST["reg_usuario"];
        $Password = $_POST["reg_password"];
        $Email = $_POST["reg_email"];
        $sql = $conexion->query("INSERT INTO usuario(user,password,email) values ('$Usuario','$Password','$Email')");
        if ($sql) {
            echo "Registro exitoso";
            header("location:../Ventanas/inicio.html");
        } else {
            echo "Error de registro";
        }
        
    }
    
    
} 
    

?>