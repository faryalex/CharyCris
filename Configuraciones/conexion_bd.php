<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "id19074660_bddcharycris";

$conexion = new mysqli($servername, $username, $password, $dbname);
if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}
/* hosting
  $servername = "localhost:3306";
      $username = "charycri_bdd";
      $password = "charycris2018@";
      $dbname = "charycri_bdd";
      
      $conexion = new mysqli($servername, $username, $password, $dbname);
      $conexion->set_charset("utf8");
      if ($conexion->connect_error) {
          die("Connection failed: " . $conexion->connect_error);
      }
*/


?>