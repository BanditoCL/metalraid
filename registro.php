<?php

    include_once('conexion.php');
    $conectar = conexion();
    
date_default_timezone_set("America/Lima");

$fecha = date('Y-m-d H:i:s');

    $nombre = $_POST['nombre'];
    
    $descripcion = $_POST['descripcion'];
    $objetivo = $_POST['objetivo'];
    $area = $_POST['area'];
    $persona =  $_POST['persona']; 
    $logistico =  $_POST['logistico'];
    $ubicacion = $_POST['ubicacion'];
    $tiempo = $_POST['tiempo'];
    $trabajo = $_POST['trabajo'];
    $prioridad = $_POST['prioridad'];
    $accesibilidad = $_POST['accesibilidad'];
    $disponibilidad = $_POST['disponibilidad'];
    $horario = $_POST['horario'];
    $anticorrupcion = $_POST['anticorrupcion'];
    $valorizacion = $_POST['valorizacion'];

    $negocio = $_POST['negocio'];
    $alcance = $_POST['alcance'];
    $mano = $_POST['mano'];
    $materiales = $_POST['materiales'];
    $servicios = $_POST['servicios'];
    $cliente = $_POST['cliente'];

    $tipotrabajo = $_POST['tipotrabajo'];
    $epp = $_POST['epp'];
    $equipos = $_POST['equipos'];
    $procedimientos = $_POST['procedimientos'];
    $jefe = $_POST['jefe'];
    $riesgos = $_POST['riesgos'];
    $observaciones = $_POST['observaciones'];


    // Verificar si se subieron imágenes
    if (!empty($_FILES['imagen']['name'][0])) {
        // Guardar imágenes en la carpeta "imagenes"
        $imagenRuta = array();
        $imagenValida = true;
        foreach ($_FILES['imagen']['name'] as $key => $nombreImagen) {
            $imagenTemporal = $_FILES['imagen']['tmp_name'][$key];
            $imagenTipo = $_FILES['imagen']['type'][$key];
            if ($imagenTipo == "image/jpeg" || $imagenTipo == "image/png") {
                $imagenNombre = uniqid() . "_" . $nombreImagen;
                $imagenRuta[] = "files/" . $imagenNombre;
                move_uploaded_file($imagenTemporal, "files/" . $imagenNombre);
            } else {
                $imagenValida = false;
                break;
            }
        }

        // Si todas las imágenes son válidas, guardar sus rutas en la base de datos
        if ($imagenValida) {
            $numImagenes = count($_FILES['imagen']['name']);
            $columnasImagenes = array();
            for ($i = 1; $i <= $numImagenes; $i++) {
                $columnasImagenes[] = "imagen" . $i;
            }
            $columnasImagenesStr = implode(",", $columnasImagenes);
            $imagenesRutasStr = implode("','", $imagenRuta);
            $sql = "INSERT INTO formulario (nombre, descripcion, fecha, objetivo, area, persona, logistico, ubicacion, tiempo, trabajo, prioridad, accesibilidad, 
            disponibilidad, horario, anticorrupcion, valorizacion, negocio, alcance, mano, materiales, servicios, cliente, tipotrabajo, epp, equipos, procedimientos, jefe, riesgos, observaciones, $columnasImagenesStr) 
                    VALUES ('$nombre','$descripcion','$fecha','$objetivo','$area','$persona', '$logistico', '$ubicacion','$tiempo','$trabajo', '$prioridad', '$accesibilidad', '$disponibilidad', '$horario', '$anticorrupcion', '$valorizacion', '$negocio', '$alcance', '$mano', '$materiales', '$servicios', '$cliente', '$tipotrabajo', '$epp', '$equipos', '$procedimientos', '$jefe', '$riesgos','$observaciones', '$imagenesRutasStr')";
            $resultado = mysqli_query($conectar, $sql);
            if (!$resultado) {
                echo "Error al guardar los datos: " . mysqli_error($conectar);
            } else {
                echo "<script>alert('Formulario Enviado') </script>";
            echo "<script>setTimeout(\"location.href='lista.php'\",1000)</script>";
            }
        } else {
            echo "Error: Las imágenes deben ser de tipo JPEG o PNG.";
        }
    } else {
        // Si no se subió ninguna imagen, insertar solo datos de la tabla
        $sql = "INSERT INTO formulario (nombre, descripcion, fecha, objetivo, area, persona, logistico, ubicacion, tiempo, trabajo, prioridad, accesibilidad, 
         disponibilidad, horario, anticorrupcion, valorizacion, negocio, alcance, mano, materiales, servicios, cliente, tipotrabajo, epp, equipos, procedimientos, jefe, riesgos, observaciones) VALUES ('$nombre','$descripcion','$fecha','$objetivo','$area','$persona', '$logistico', '$ubicacion','$tiempo','$trabajo', '$prioridad', '$accesibilidad', '$disponibilidad', '$horario', '$anticorrupcion', '$valorizacion', '$negocio', '$alcance', '$mano', '$materiales', '$servicios', '$cliente', '$tipotrabajo', '$epp', '$equipos', '$procedimientos', '$jefe', '$riesgos','$observaciones')";
        $resultado = mysqli_query($conectar, $sql);
        if (!$resultado) {
            echo "Error al guardar los datos: " . mysqli_error($conectar);
        } else {
            echo "<script>alert('Formulario Enviado') </script>";
            echo "<script>setTimeout(\"location.href='lista.php'\",1000)</script>";
        }
    }

   
?>