<?php
    require_once "connect.php";
    require_once "C:/xampp/php/Classes/PHPExcel/IOFactory.php";
    $fileName = $_POST["filename"];
    $inputFileName = "files/".$fileName;

    //  Read your Excel workbook
    try {
        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($inputFileName);
    } catch(Exception $e) {
        die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
    }

    //  Get worksheet dimensions
    $sheet = $objPHPExcel->getSheet(0); 
    $highestRow = $sheet->getHighestRow(); 
    $highestColumn = $sheet->getHighestColumn();
    
    //  Loop through each row of the worksheet in turn
    for ($row = 6; $row <= $highestRow-4; $row++){ 
        //  Read a row of data into an array
        $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                        NULL,
                                        TRUE,
                                        FALSE);
        $rowData = $rowData[0];
        $sql = "SELECT Estacion, Fecha FROM excel WHERE Estacion='$rowData[0]' AND Fecha='$rowData[1]'";
        $result = $conn->query($sql);
        if ($result->num_rows==0) {
            $insert_query = "INSERT INTO excel (Estacion, Fecha, temperatura, temperatura_minima, temperatura_maxima, radiacion, radiacion_promedio, humedad_relativa, humedad_relativa_minima, humedad_relativa_maxima, precipitacion, velocidad_viento, velocidad_viento_minima, velocidad_viento_maxima, mojadura, presion_atmosferica, presion_atmosferica_minima, presion_atmosferica_maxima, direccion_viento)
            VALUES ('$rowData[0]', '$rowData[1]', '$rowData[2]', '$rowData[3]', '$rowData[4]', '$rowData[5]', '$rowData[6]', '$rowData[7]', '$rowData[8]', '$rowData[9]', '$rowData[10]', '$rowData[11]', '$rowData[12]', '$rowData[13]', '$rowData[14]', '$rowData[15]', '$rowData[16]', '$rowData[17]', '$rowData[18]')";
            $confirm = $conn->query($insert_query);
        }
        // else {
        //     $update_query = "UPDATE excel SET temperatura='$rowData[2]', temperatura_minima='$rowData[3]', temperatura_maxima='$rowData[4]', radiacion='$rowData[5]', radiacion_promedio='$rowData[6]', humedad_relativa='$rowData[7]', humedad_relativa_minima='$rowData[8]', humedad_relativa_maxima='$rowData[9]', precipitacion='$rowData[10]', velocidad_viento='$rowData[11]', velocidad_viento_minima='$rowData[12]', velocidad_viento_maxima='$rowData[13]', mojadura='$rowData[14]', presion_atmosferica='$rowData[15]', presion_atmosferica_minima='$rowData[16]', presion_atmosferica_maxima='$rowData[17]', direccion_viento='$rowData[18]' 
        //     WHERE Estacion='$rowData[0]' AND Fecha='$rowData[1]'";
        //     $confirm = $conn->query($update_query);
        // }
    }
?>
