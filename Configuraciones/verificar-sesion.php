<?php
session_start();

if (isset($_SESSION['usuario'])) {
  echo 'ok';
} else {
  echo 'error';
}
?>