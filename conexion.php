<?php
function conexion(){
    $host = "localhost";
    $user = "metalrai_admin";
    $psswrd = "administrador1591";
    $db = "metalrai_sistema";

    $mysqli = new mysqli($host, $user, $psswrd, $db);

    // Verificar la conexión
    if ($mysqli->connect_error) {
        die("Error de conexión: " . $mysqli->connect_error);
    }

    return $mysqli;
}
?>