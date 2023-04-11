<?php
require_once 'conexion.php';
$conectar = conexion();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ejecutar la consulta SQL para eliminar el registro
    $query = "DELETE FROM formulario WHERE id = $id";
    mysqli_query($conectar, $query);

    // Redireccionar a la página de lista
    header('Location: lista.php');
    exit;
}
?>