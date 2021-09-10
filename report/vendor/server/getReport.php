<?php
    require_once "../../../connect.php";
    get_report($conn);

    function get_report($conn)
    {
        $sql_clima = "SELECT * FROM reporte_clima ORDER BY Fecha";
        $result_clima = $conn->query($sql_clima);
        $climate_reports = array();
        foreach($result_clima as $row) {
            array_push($climate_reports, $row);
        }

        $sql_product = "SELECT * FROM reporte_productividad ORDER BY cutoff_date";
        $result_product = $conn->query($sql_product);
        $product_reports = array();
        foreach($result_product as $row) {
            array_push($product_reports, $row);
        }
        echo json_encode(array(
            'climate_reports' => $climate_reports,
            'product_reports' => $product_reports,
        ));
    }
?>
