<?php
  include("conexion.php");

  // Si el usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
  if(!isset($_SESSION["usuario"])){
    header("Location: ./login/login.php");
    exit();
  }
?>