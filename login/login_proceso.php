<?php 
  require "../conexion.php";
  session_start();
  
  $prueba = conexion();
  $usuario = $_POST['usuario'];
  $contrasena = $_POST['contrasena'];
  $sql = ("SELECT COUNT(*) as contar FROM usuarios WHERE usuario='$usuario' and contrasena='$contrasena' ");
  $result = mysqli_query($prueba,$sql);
  $array = mysqli_fetch_array($result);

  if($array['contar']>0){
    $_SESSION['username'] = $usuario;
    echo 'success';
  } else {
    echo 'error'; 
  }
?>