<?php
    include "C:/xampp/php/Classes/PHPExcel/IOFactory.php";
    require_once "../../../connect.php";
    $type = $_POST["type"];
    ($type==="rain_master_format") && format_rain_master($conn);
    ($type==="get_rain_master") && get_rain_master($conn);
    ($type==="get_rain") && get_rain($conn);
    ($type==="get_allrain") && get_allrain($conn);
    ($type==="upload_rain_file") && upload_rain_file();

    function format_rain_master($conn)
    {
        $inputFileName = "../../../files/rain_master.xls";
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch(Exception $e) {
            die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }

        $rain = $objPHPExcel->getSheet(0);
        $rain_highestRow = $rain->getHighestRow(); 
        $rain_highestColumn = $rain->getHighestColumn();
        
        $delete_query = "DELETE FROM rain_master";
        $confirm = $conn->query($delete_query);

        for ($row = 2; $row < $rain_highestRow; $row++) {
            $rowData = $rain->rangeToArray('A' . $row . ':' . $rain_highestColumn . $row);
            $rowData = $rowData[0];
            $IDCOME = $rowData[0];
            $ABS_Terreno = $rowData[1];
            $ID_Pluviometro = $rowData[2];
            $UBICACION = $rowData[3];
            $Pais = $rowData[4];
            $Lotes = $rowData[5];
            $Finca = $rowData[6];
            $Zona = $rowData[7];
            $ingenioid = $rowData[8];
            $PaisStr = $rowData[9];
            $FINCA_Pluv = $rowData[10];
            $LOTE_Pluv = $rowData[11];
            $Codigo_Nuevo = $rowData[12];
            $Codigo_Antiguo = $rowData[13];
            $X = $rowData[14];
            $Y = $rowData[15];
            $Lon = $rowData[16];
            $Lat = $rowData[17];

            $insert_query = "INSERT INTO rain_master (IDCOME, ABS_Terreno,
                ID_Pluviometro, UBICACION, Pais, Lotes, Finca, Zona, ingenioid,
                PaisStr, FINCA_Pluv, LOTE_Pluv, Codigo_Nuevo, Codigo_Antiguo,
                X, Y, Lon, Lat)
            VALUES ('$IDCOME', '$ABS_Terreno',
                '$ID_Pluviometro', '$UBICACION', '$Pais', '$Lotes', '$Finca', '$Zona', '$ingenioid',
                '$PaisStr', '$FINCA_Pluv', '$LOTE_Pluv', '$Codigo_Nuevo', '$Codigo_Antiguo',
                '$X', '$Y', '$Lon', '$Lat')";

            $insertConfirm = $conn->query($insert_query);
        }
        echo json_encode(array('success'=>true));
    }
    
    function get_rain_master($conn)
    {
        $sql_rain_master = "SELECT * FROM rain_master";
        $result_rain_master = $conn->query($sql_rain_master);
        $rain_masters = array();

        foreach($result_rain_master as $row) array_push($rain_masters, $row);

        echo json_encode(array('rain_masters' => $rain_masters));
    }

    function get_rain($conn)
    {
        $sql_rain = "SELECT * FROM rain";
        $result_rain = $conn->query($sql_rain);
        $rains = array();

        foreach($result_rain as $row) array_push($rains, $row);

        echo json_encode(array('rains' => $rains));
    }

    function get_allrain($conn)
    {
        $sql_rain = "SELECT * FROM rain";
        $result_rain = $conn->query($sql_rain);
        $rains = array();

        foreach($result_rain as $row) array_push($rains, $row);

        $sql_rain_master = "SELECT * FROM rain_master";
        $result_rain_master = $conn->query($sql_rain_master);
        $rain_masters = array();

        foreach($result_rain_master as $row) array_push($rain_masters, $row);

        echo json_encode(array(
            'rains' => $rains,
            'rain_masters' => $rain_masters
        ));
    }

    function upload_rain_file()
    {
        $name = $_POST["file_name"];
        $file_name = $_FILES['rain']['name'];
        $file_tmp =$_FILES['rain']['tmp_name'];

        $file_ext=strtolower(end(explode('.', $_FILES['rain']['name'])));
        
        move_uploaded_file($file_tmp, "../../../files/".$name);
        echo json_encode(array("success"=>true));
    }
?>
