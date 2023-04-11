<?php

    require 'vendor/autoload.php';
    require 'conexion.php';

     $conexion = conexion();
     $idUser = $_REQUEST['id'];
     $query = "SELECT * FROM formulario WHERE id = $idUser;";
     $resultado = $conexion->query($query);

     use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};
     use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
   
    $excel = new Spreadsheet;
    $hojaActiva = $excel->getActivesheet();
    $hojaActiva->setTitle("Visita Técnica");

    $hojaActiva->getColumnDimension('A')->setWidth(47);

    $hojaActiva->setCellValue('A1','FORMATO DE VISTA TÉCNICA');

    $hojaActiva->setCellValue('A2','Nombre del Trabajador');
    $hojaActiva->setCellValue('A3','Fecha de Evaluación');
    
    $hojaActiva->setCellValue('A4','INFORMACIÓN GENERAL DEL TRABAJO');
        $hojaActiva->setCellValue('A5','Descripción de Trabajo');
        $hojaActiva->setCellValue('A6','Objetivo de Trabajo');
        $hojaActiva->setCellValue('A7','Área de trabajo de Cliente');
        $hojaActiva->setCellValue('A8','Persona de Contacto Usuario Final');
        $hojaActiva->setCellValue('A9','Persona de Contacto Logístico');
        $hojaActiva->setCellValue('A10','Ubicación / Localización');
        $hojaActiva->setCellValue('A11','Tiempo de Entrega de Valorización');
        $hojaActiva->setCellValue('A12','Tiempo de Entrega de Trabajo');
        $hojaActiva->setCellValue('A13','Prioridad de Ejecución');
        $hojaActiva->setCellValue('A14','Accesibilidad a área de Trabajo');
        $hojaActiva->setCellValue('A15','Disponibilidad de área, equipo, unidad de trabajo');
        $hojaActiva->setCellValue('A16','Horario de trabajo para trabajo del cliente');
        $hojaActiva->setCellValue('A17','Anticorrupción');
        $hojaActiva->setCellValue('A18','Tipo de Valorización');

    $hojaActiva->setCellValue('A19','INFORMACIÓN ESPECIFICA DEL TRABAJO');
        $hojaActiva->setCellValue('A20','Línea de Negocio');
        $hojaActiva->setCellValue('A21','Tipo de Documentación de alcance de servicio');
        $hojaActiva->setCellValue('A22','Mano de Obra');
        $hojaActiva->setCellValue('A23','Materiales');
        $hojaActiva->setCellValue('A24','Servicios');
        $hojaActiva->setCellValue('A25','Servicios compartidos con Cliente');

    $hojaActiva->setCellValue('A26','SEGURIDAD INDUSTRIAL');
        $hojaActiva->setCellValue('A27','Tipo de Trabajo');
        $hojaActiva->setCellValue('A28','EPP');
        $hojaActiva->setCellValue('A29','Equipos');
        $hojaActiva->setCellValue('A30','Procedimientos Específicos');
        $hojaActiva->setCellValue('A31','Jefe de Seguridad de área y teléfono de contacto');
        $hojaActiva->setCellValue('A32','Riesgos de trabajo específicos');
        $hojaActiva->setCellValue('A33','Observaciones');
    $hojaActiva->setCellValue('A34','APUNTES, MEDIDAS, GRÁFICAS DE CAMPO');


    $rows = $resultado->fetch_assoc();
 
        $hojaActiva->getColumnDimension('B')->setWidth(100);

        $hojaActiva->setCellValue('B1', 'N° '.$rows['id']);

        $hojaActiva->setCellValue('B2', $rows['nombre']);
        $hojaActiva->setCellValue('B3', $rows['fecha']);

        $hojaActiva->setCellValue('B5', $rows['descripcion']);
        $hojaActiva->setCellValue('B6', $rows['objetivo']);
        $hojaActiva->setCellValue('B7', $rows['area']);
        $hojaActiva->setCellValue('B8', $rows['persona']);
        $hojaActiva->setCellValue('B9', $rows['logistico']);
        $hojaActiva->setCellValue('B10', $rows['ubicacion']);
        $hojaActiva->setCellValue('B11', $rows['tiempo']);
        $hojaActiva->setCellValue('B12', $rows['trabajo']);
        $hojaActiva->setCellValue('B13', $rows['prioridad']);
        $hojaActiva->setCellValue('B14', $rows['accesibilidad']);
        $hojaActiva->setCellValue('B15', $rows['disponibilidad']);
        $hojaActiva->setCellValue('B16', $rows['horario']);
        $hojaActiva->setCellValue('B17', $rows['anticorrupcion']);
        $hojaActiva->setCellValue('B18', $rows['valorizacion']);

        $hojaActiva->setCellValue('B20', $rows['negocio']);
        $hojaActiva->setCellValue('B21', $rows['alcance']);
        $hojaActiva->setCellValue('B22', $rows['mano']);
        $hojaActiva->setCellValue('B23', $rows['materiales']);    
        $hojaActiva->setCellValue('B24', $rows['servicios']);
        $hojaActiva->setCellValue('B25', $rows['cliente']);

        $hojaActiva->setCellValue('B27', $rows['tipotrabajo']);
        $hojaActiva->setCellValue('B28', $rows['epp']);
        $hojaActiva->setCellValue('B29', $rows['equipos']);
        $hojaActiva->setCellValue('B30', $rows['procedimientos']);
        $hojaActiva->setCellValue('B31', $rows['jefe']);
        $hojaActiva->setCellValue('B32', $rows['riesgos']);
        $hojaActiva->setCellValue('B33', $rows['observaciones']);
        
        $anchoMaximo = 1030;
        $altoMaximo = 900;
        $imagen_fila = 35;
        
        // Recorrer las columnas imagen1 a imagen10
        for ($i = 1; $i <= 10; $i++) {
            $columnaImagen = 'imagen' . $i;
        
            // Obtener la ruta de la imagen almacenada en la columna correspondiente
            $rutaImagen = $rows[$columnaImagen];
        
            // Si la ruta no está vacía, agregar la imagen a la hoja de cálculo
            if (!empty($rutaImagen)) {
                // Combinar la ruta de la imagen con el directorio actual
                $rutaAbsolutaImagen = getcwd() . '/' . $rutaImagen;
        
                // Verificar si la extensión de la imagen es válida
                $extension = strtolower(pathinfo($rutaAbsolutaImagen, PATHINFO_EXTENSION));
                if (!in_array($extension, ['jpg', 'jpeg', 'png'])) {
                    continue;
                }
        
                // Agregar la imagen a la hoja de cálculo
                $drawing = new Drawing();
                $drawing->setPath($rutaAbsolutaImagen);
                $drawing->setCoordinates('A' . $imagen_fila);
                $drawing->setWorksheet($hojaActiva);
        
                // Obtener las dimensiones originales de la imagen
                $dimensiones = getimagesize($rutaAbsolutaImagen);
                $anchoImagen = $dimensiones[0];
                $altoImagen = $dimensiones[1];
        
                // Si la imagen es más grande que el ancho o alto máximo, ajustar su tamaño manteniendo la proporción
                if ($anchoImagen > $anchoMaximo || $altoImagen > $altoMaximo) {
                    $factorReduccionAncho = $anchoMaximo / $anchoImagen;
                    $factorReduccionAlto = $altoMaximo / $altoImagen;
                    $factorReduccion = min($factorReduccionAncho, $factorReduccionAlto);
                    $anchoImagen = $anchoImagen * $factorReduccion;
                    $altoImagen = $altoImagen * $factorReduccion;
                }
        
                $drawing->setWidth($anchoImagen);
                $drawing->setHeight($altoImagen);
        
                // Incrementar la fila para la próxima imagen
                $imagen_fila += ceil($altoImagen / 20) + 1;
            }
        }
        $for = [
            'font' => [
                'size' => 16,
                'bold' => true,
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'AEB6BF',
                ],
            ],
        ];

        $hojaActiva->getStyle('A1')->applyFromArray($for);

        $for2 = [
            'font' => [
                'size' => 16,
                'bold' => true,
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'AEB6BF',
                ],
            ],
        ];

        $hojaActiva->getStyle('B1')->applyFromArray($for2);

        $let = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'font' => [
                'bold' => true,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => '5DADE2',
                ],
            ],
        ];

        $hojaActiva->getStyle('A4:B4')->applyFromArray($let);
        $hojaActiva->getStyle('A19:B19')->applyFromArray($let);
        $hojaActiva->getStyle('A26:B26')->applyFromArray($let);
        $hojaActiva->getStyle('A34:B34')->applyFromArray($let);

        $borde1 = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ];
        
        $hojaActiva->getStyle('A1:B34')->applyFromArray($borde1);

        $borde2 = [
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ];

        $hojaActiva->getStyle('A35:B500')->applyFromArray($borde2);

        $hojaActiva->mergeCells('A4:B4');
        $hojaActiva->mergeCells('A19:B19');
        $hojaActiva->mergeCells('A26:B26');
        $hojaActiva->mergeCells('A34:B34');
        $hojaActiva->mergeCells('A35:B500');

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Visita Técnica.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = IOFactory::createWriter($excel, 'Xlsx');
    $writer->save('php://output');
    exit;

?>