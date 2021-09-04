<?php
    include "C:/xampp/php/Classes/PHPExcel/IOFactory.php";
    require_once "../../connect.php";
    
    $type = $_POST["type"];
    ($type=="zafra") && zafraFormat($conn);
    ($type=="get_zafra") && get_zafra($conn);
    ($type=="ro") && roFormat($conn);
    ($type=="get_ro") && get_ro($conn);
    ($type=="ra") && raFormat($conn);
    ($type=="get_ra") && get_ra($conn);
    ($type=="batches") && batchesFormat($conn);
    ($type=="get_batches") && get_batches($conn);

    function zafraFormat($conn)
    {
        $inputFileName = "../../files/report.xls";
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch(Exception $e) {
            die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
        
        $zafra = $objPHPExcel->getSheet(0);
        $zafra_highestRow = $zafra->getHighestRow(); 
        $zafra_highestColumn = $zafra->getHighestColumn();
        
        $delete_query = "DELETE FROM zafra_masters";
        $confirm = $conn->query($delete_query);

        for ($row = 2; $row <= $zafra_highestRow; $row++) {
            $rowData = $zafra->rangeToArray('A' . $row . ':' . 'E' . $row);
            $rowData = $rowData[0];
            $sql = "SELECT ano_mes FROM zafra_masters WHERE ano_mes='$rowData[0]'";
            $result = $conn->query($sql);
            if ($result->num_rows==0) {
                $insert_query = "INSERT INTO zafra_masters (ano_mes, ano, mes, Mes_str, zafra)
                VALUES ('$rowData[0]', '$rowData[1]', '$rowData[2]', '$rowData[3]', '$rowData[4]')";
                $confirm = $conn->query($insert_query);
            }
        }
        echo json_encode(array('success'=>true));
    }

    function get_zafra($conn)
    {
        $sql = "SELECT * FROM zafra_masters ORDER BY ano_mes";
        $result = $conn->query($sql);
        $zafra_masters = array();
        foreach($result as $row) {
            array_push($zafra_masters, $row);
        }
        echo json_encode(array('zafra_masters'=>$zafra_masters));
    }

    function roFormat($conn)
    {
        $inputFileName = "../../files/report.xls";
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch(Exception $e) {
            die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }

        $ro = $objPHPExcel->getSheet(1);
        $ro_highestRow = $ro->getHighestRow(); 
        $ro_highestColumn = $ro->getHighestColumn();

        $delete_query = "DELETE FROM master_ro";
        $confirm = $conn->query($delete_query);

        for ($row = 2; $row <= $ro_highestRow; $row++) {
            $rowData = $ro->rangeToArray('A' . $row . ':' . $ro_highestColumn . $row,
                                            NULL,
                                            TRUE,
                                            FALSE);
            $rowData = $rowData[0];
            $sql = "SELECT * FROM master_ro WHERE Mes='$rowData[1]' AND R_0='$rowData[2]'";
            $result = $conn->query($sql);
            if ($result->num_rows==0) {
                $insert_query = "INSERT INTO master_ro (Mes, R_0) VALUES ('$rowData[1]', '$rowData[2]')";
                $confirm = $conn->query($insert_query);
            }
        }
        $sql = "SELECT * FROM master_ro ORDER BY Mes";
        $result = $conn->query($sql);
        $master_ro = array();

        foreach($result as $row) {
            array_push($master_ro, $row);
        }
        echo json_encode(array(
            'master_ro'=>$master_ro,
        ));
    }
    
    function get_ro($conn)
    {
        $sql = "SELECT * FROM master_ro ORDER BY Mes";
        $result = $conn->query($sql);
        $master_ro = array();
        foreach($result as $row) {
            array_push($master_ro, $row);
        }
        echo json_encode(array('master_ro'=>$master_ro));
    }

    function raFormat($conn)
    {
        $inputFileName = "../../files/master_ra.xls";
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch(Exception $e) {
            die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }

        $ra = $objPHPExcel->getSheet(0);
        $ra_highestRow = $ra->getHighestRow(); 
        $ra_highestColumn = $ra->getHighestColumn();

        $delete_query = "DELETE FROM master_ra";
        $confirm = $conn->query($delete_query);

        for ($row = 2; $row <= $ra_highestRow; $row++) {
            $rowData = $ra->rangeToArray('A' . $row . ':' . 'G' . $row,
                                            NULL,
                                            TRUE,
                                            FALSE);
            $rowData = $rowData[0];
            $sql = "SELECT Fecha FROM master_ra WHERE Fecha='$rowData[0]'";
            $result = $conn->query($sql);
            if ($result->num_rows==0) {
                $insert_query = "INSERT INTO master_ra (Fecha, ANO, MES, DIA, codigo_unico, Rso, ano_biciesto)
                    VALUES ('$rowData[0]', '$rowData[1]', '$rowData[2]', '$rowData[3]', '$rowData[4]', '$rowData[5]', '$rowData[6]')";
                $confirm = $conn->query($insert_query);
            }
        }
        $sql = "SELECT * FROM master_ra ORDER BY ANO";
        $result = $conn->query($sql);
        $master_ra = array();

        foreach($result as $row) {
            array_push($master_ra, $row);
        }
        echo json_encode(array(
            'master_ra'=>$master_ra,
        ));
    }

    function get_ra($conn)
    {
        $sql = "SELECT * FROM master_ra ORDER BY codigo_unico";
        $result = $conn->query($sql);
        $master_ra = array();
        foreach($result as $row) {
            array_push($master_ra, $row);
        }
        echo json_encode(array('master_ra'=>$master_ra));
    }

    function batchesFormat($conn)
    {
        $inputFileName = "../../files/master_batches.xls";
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch(Exception $e) {
            die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }

        $batches = $objPHPExcel->getSheet(0);
        $batches_highestRow = $batches->getHighestRow(); 
        $batches_highestColumn = $batches->getHighestColumn();

        $delete_query = "DELETE FROM master_batches";
        $confirm = $conn->query($delete_query);

        for ($row = 2; $row <= $batches_highestRow; $row++) {
            $rowData = $batches->rangeToArray('A' . $row . ':' . $batches_highestColumn . $row,
                                            NULL,
                                            TRUE,
                                            FALSE);
            $rowData = $rowData[0];
            $insert_query = "INSERT INTO master_batches (ID_COMP, Finca, NOMBRE, NOMBRE1, Cuadrante, Estrato, Region, Lotes, LONGITUD, LATITUD1, REGION_NO, X_Formato_Anterior, Y_Formato_Anterior2, ALTITUD_Utilizar, Aplica)
                VALUES ('$rowData[0]', '$rowData[1]', '$rowData[2]', '$rowData[3]', '$rowData[4]', '$rowData[5]', '$rowData[6]', '$rowData[7]', '$rowData[8]', '$rowData[9]', '$rowData[10]', '$rowData[11]', '$rowData[12]', '$rowData[13]', '$rowData[14]')";
            $confirm = $conn->query($insert_query);
        }
        
        $sql = "SELECT * FROM master_batches ORDER BY ID_COMP";
        $result = $conn->query($sql);
        $master_batches = array();
        foreach($result as $row) {
            array_push($master_batches, $row);
        }
        echo json_encode(array('master_batches'=>$master_batches));
    }

    function get_batches($conn)
    {
        $sql = "SELECT * FROM master_batches ORDER BY ID_COMP";
        $result = $conn->query($sql);
        $master_batches = array();
        foreach($result as $row) {
            array_push($master_batches, $row);
        }
        echo json_encode(array('master_batches'=>$master_batches));
    }
?>
