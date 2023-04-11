<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>LISTA - METAL RAID PERU S.A.C</title> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
    h1 {
        font-family: 'Open Sans', sans-serif;
        font-weight: bold;
    }
    table {
        font-family: 'Roboto', sans-serif;
    }
</style>
</head>
<?php 
session_start();
include "header.php";
    // Verificar si el usuario está logueado
    if (!isset($_SESSION['username'])) {
        header("Location: login/login.php");
        exit;
    }

require_once("conexion.php");
$conectar = conexion();
$usuario = $_SESSION['username'];
$resultado = mysqli_query($conectar, "SELECT cargo FROM usuarios WHERE usuario = '$usuario'");

    $sql="SELECT *  FROM formulario";
    $query=mysqli_query($conectar,$sql);

// Verificar si se encontró el registro
if (mysqli_num_rows($resultado) == 1) {
    $fila = mysqli_fetch_assoc($resultado);
    $rol = $fila['cargo'];

    // Verificar si el usuario es administrador
    if ($rol == 'Administrador') {
        // El usuario es administrador
?>
<body>
    <h1 class="text-center mt-4" id="title">REGISTROS</h1>
        <div class="col-md-8 table-responsive mx-auto mt-4">
            <table class="table">
                <thead class="table table-striped table-dark">
                    <tr>
                        <th></th>
                            <th>N°</th>
                            <th>Nombre</th>
                            <th>Fecha</th>
                            <th></th>
                            <th></th>
                    </tr>
                </thead>
                <tbody>
<?php
    while($row=mysqli_fetch_array($query)){ ?>
                        <tr>
                            <th></th>
                            <th id="id"><?php  echo $row['id']?></th>
                            <th><?php  echo $row['nombre']?></th>
                            <th><?php  echo $row['fecha']?></th>
                            <th><a href="#" onclick="return confirmarDescarga(<?php echo $row['id'] ?>)">Descargar</a></th>    
                            <th><a href="#" onclick="return confirmarEliminacion(<?php echo $row['id'] ?>)">Eliminar</a></th>
                        </tr>
    <script>
        function confirmarEliminacion(id) {
            if (confirm("¿Estás seguro que deseas eliminar el reporte #" + id + "?")) {
                window.location.href = "eliminar.php?id=" + id;  eliminar
                return true;
            } else {
                return false;
            }
        }
    </script>

    <script>
        function confirmarDescarga(id) {
            if (confirm("¿Estás seguro que deseas descargar el reporte #" + id + "?")) {
                window.location.href = "reporte.php?id=" + id;  reporte
                return true;
            } else {
                return false;
            }
        }
    </script>
                    <?php 
                        }
                    ?>
                </tbody>
            </table>
        </div>
</body>
    <?php
    } else {
        // El usuario no es administrador
    ?>

<body>
<h1 class="text-center mt-4" id="title">REGISTROS</h1>
        <div class="col-md-8 table-responsive mx-auto mt-4">
            <table class="table">
                <thead class="table table-striped table-dark">
                    <tr>
                        <th></th>
                        <th>N°</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        while($row=mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <th></th>
                        <th id="id"><?php  echo $row['id']?></th>
                        <th><?php  echo $row['nombre']?></th>
                        <th><?php  echo $row['fecha']?></th>
                        <th><a href="#" onclick="return confirmarDescarga(<?php echo $row['id'] ?>)">Descargar</a></th>                            
                    </tr>                                      
    <script>
        function confirmarDescarga(id) {
            if (confirm("¿Estás seguro que deseas descargar el reporte #" + id + "?")) {
                window.location.href = "reporte.php?id=" + id;  reporte
                return true;
            } else {
                return false;
            }
        }
    </script>
            <?php 
                }
            ?>
                </tbody>
            </table>
        </div>
</body>

    <?php
    }
    ?>
    <?php
    }
    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>
