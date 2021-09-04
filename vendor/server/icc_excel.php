<?php
    require_once "../../connect.php";
    require_once "C:/xampp/php/Classes/PHPExcel/IOFactory.php";
    $fileName = $_POST["fileName"];
    $inputFileName = "../../files/".$fileName;

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
        
        $year = substr($rowData[1], 0, 4);
        $month = substr($rowData[1], 4, 2);
        var_dump($year, $month);
    }
    echo json_encode(array("success"=>true));
?>
