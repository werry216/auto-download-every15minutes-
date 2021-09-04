<?php
    require_once "../../connect.php";
    require_once "C:/xampp/php/Classes/PHPExcel/IOFactory.php";
    require_once "./monthArray.php";

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
    for ($row = 6; $row <= $highestRow-4; $row++) {
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
        
        $yearStr = substr($rowData[1], 0, 4);
        $monthStr = substr($rowData[1], 5, 2);
        $dateStr = substr($rowData[1], 8, 2);
        $year = (int)$yearStr;
        $month = (int)$monthStr;
        $date = (int)$dateStr;
        $mon = $monthArray[$month];
        $dateStr = "0". $date;

        $sql_zafra = "SELECT zafra FROM zafra_masters WHERE ano='$year' AND mes='$month'";
        $result_zafra = $conn->query($sql_zafra);
        $zafra;

        foreach($result_zafra as $row_zafra) {
            $zafra = $row_zafra["zafra"];
        }

        $radiacion = $rowData[5] * 0.00089681;
        $temMax = $rowData[4];
        $temMin = $rowData[3];
        $hum = $rowData[7];
        $humMin = $rowData[8];
        $humMax = $rowData[9];
        $velMin = $rowData[12];
        $velMax = $rowData[13];
        $dir = $rowData[18];
        $ETP;
        $R0;
        $Rso;
        $Rns = $radiacion * 0.77;

        $sql_ro = "SELECT R_0 FROM master_ro WHERE Mes='$mon'";
        $result_master_ro = $conn->query($sql_ro);
        
        foreach($result_master_ro as $row_master_ro) {
            $R0 = $row_master_ro["R_0"];
        }

        $sql_ra = "SELECT Rso FROM master_ra WHERE ANO='$year' AND MES='$month' AND DIA='$dateStr'";
        $result_master_ra = $conn->query($sql_ra);
        
        foreach($result_master_ra as $row_master_ra) {
            $Rso = $row_master_ra["Rso"];
        }

        if ($radiacion > 30) $radiacion = 30;
        if ($temMax > 42) $temMax = 42;
        if ($temMax < 20) $temMax = 20;
        if ($temMin < 12) $temMin = 12;
        if ($temMin > 25) $temMin = 25;
        if ($hum > 100) $hum = 100;
        if ($hum < 15) $hum = 15;
        if ($humMax > 100) $humMax = 100;
        if ($humMax < 75) $humMax = 75;
        if ($humMin > 75) $humMin = 75;
        if ($humMin < 15) $humMin = 15;
        if ($velMin < 0) $velMin = 0;
        if ($velMin > 5) $velMin = 5;
        if ($velMax > 60) $velMax = 60;
        if ($velMax < 5) $velMax = 5;
        if ($dir < 0) $dir = 0;
        if ($dir > 360) $dir = 360;

        $Amplitud_Termica = $temMax - $temMin;

        $sql_clima = "SELECT Fecha FROM reporte_clima WHERE Fecha='$rowData[1]' AND Estacion='$rowData[0]'";
        $clima = $conn->query($sql_clima);
        if ($clima->num_rows==0) {
            $clima_insert_query = "INSERT INTO reporte_clima (
                Estacion, Fecha, temperatura, temperatura_min, temperatura_max, Radiacion,
                Ano, Mes, Dia, R0, Zafra, Amplitud_Termica, radiacion_promedio, humedad_relativa,
                humedad_relativa_minima, humedad_relativa_maxima, precipitacion, velocidad_viento,
                velocidad_viento_minima, velocidad_viento_maxima, mojadura, presion_atmosferica,
                presion_atmosferica_minima, presion_atmosferica_maxima, direccion_viento, Rso, Rns)
            VALUES (
                '$rowData[0]', '$rowData[1]', '$rowData[2]', '$temMin', '$temMax', '$radiacion',
                '$yearStr', '$monthStr', '$dateStr', '$R0', '$zafra', '$Amplitud_Termica', '$rowData[6]', '$hum',
                '$humMin', '$humMax', '$rowData[10]', '$rowData[11]',
                '$velMin', '$velMax', '$rowData[14]', '$rowData[15]',
                '$rowData[16]', '$rowData[17]', '$dir', '$Rso', '$Rns')";
            $confirm_clima = $conn->query($clima_insert_query);
        }
    }
    echo json_encode(array("success"=>true));
?>
