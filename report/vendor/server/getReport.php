<?php
    require_once "../../../connect.php";
    
    $type = $_POST["type"];
    ($type=="getReportClimate") && get_climate_report($conn);

    function get_climate_report($conn)
    {
        $sql = "SELECT * FROM reporte_clima ORDER BY Fecha";
        $result = $conn->query($sql);
        $climate_reports = array();
        foreach($result as $row) {
            array_push($climate_reports, $row);
        }
        echo json_encode(array('climate_reports' => $climate_reports));
    }
?>