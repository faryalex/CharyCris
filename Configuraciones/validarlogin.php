<?php

if (!empty($_POST["btningresar"])) {
    if (empty($_POST["usuario"]) and empty($_POST["password"]) ) {
        echo "Los camps estan vacios";
    } else {
        $Usuario = $_POST["usuario"];
        $Password = $_POST["password"];
        $sql = $conexion->query("select * from usuario where user='$Usuario' and password='$Password'");
        if ($datos=$sql->fetch_object()) {
            header("location:../Ventanas/productos.html");
        } else {
            echo "Acceso denegado";
        }
        
    }
    
    
} 
    

?>