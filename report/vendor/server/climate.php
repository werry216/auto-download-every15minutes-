<?php
    require_once "../../../connect.php";
    $type = $_POST["type"];
    ($type==="climate-filter") && climate_filter($conn);

    function climate_filter($conn)
    {
        $start = $_POST["start"];
        $end = $_POST["end"];
        $estacion = $_POST["estacion"];

        $sql_clima = "SELECT * FROM reporte_clima WHERE No <> 0";

        if ($estacion && $estacion!=="All") {
            $sql_clima = $sql_clima . " AND Estacion = '$estacion'";
        }
        if ($start && $end) {
            $sql_clima = $sql_clima . " AND Fecha BETWEEN '$start' AND '$end'";
        } else if (!(!$start && !$end)) {
            if (!$start) $sql_clima = $sql_clima . " AND Fecha <= '$end'";
            if (!$end) $sql_clima = $sql_clima . " AND Fecha >= '$start'";
        }
        
        $sql_clima = $sql_clima . " ORDER BY Fecha";
        $result_clima = $conn->query($sql_clima);
        $climate_reports = array();
        foreach($result_clima as $row) {
            array_push($climate_reports, $row);
        }
        echo json_encode(array(
            'climate_reports' => $climate_reports,
        ));
    }
?>
