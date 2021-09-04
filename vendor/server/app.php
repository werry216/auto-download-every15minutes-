<?php
    require_once "../../connect.php";
    $sql = "SELECT * FROM zafra_masters ORDER BY ano_mes";
    $result = $conn->query($sql);
    $zafra_masters = array();
    foreach($result as $row) {
        array_push($zafra_masters, $row);
    }
    
    $sql = "SELECT * FROM master_ro ORDER BY Mes";
    $result = $conn->query($sql);
    $master_ro = array();
    foreach($result as $row) {
        array_push($master_ro, $row);
    }
    
    $sql = "SELECT * FROM master_ra ORDER BY codigo_unico";
    $result = $conn->query($sql);
    $master_ra = array();
    foreach($result as $row) {
        array_push($master_ra, $row);
    }

    $sql = "SELECT * FROM master_batches ORDER BY ID_COMP";
    $result = $conn->query($sql);
    $master_batches = array();
    foreach($result as $row) {
        array_push($master_batches, $row);
    }

    echo json_encode(array(
        'zafra_masters'=>$zafra_masters,
        'master_ro'=>$master_ro,
        'master_ra'=>$master_ra,
        'master_batches'=>$master_batches,
    ));
?>
