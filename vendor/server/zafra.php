<?php
    require_once "../../connect.php";
    $sql = "SELECT * FROM zafra_masters ORDER BY ano_mes";
    $result = $conn->query($sql);
    $zafra_masters = array();
    $No = 1;

    foreach($result as $row) {
        $ano_mes = $row["ano_mes"];
        $ano = $row["ano"];
        $mes = $row["mes"];
        $Mes_str = $row["Mes_str"];
        $zafra = $row["zafra"];
        array_push($zafra_masters, array(
            'No'=>$No++,
            'ano_mes'=>$ano_mes,
            'ano'=>$ano,
            'mes'=>$mes,
            'Mes_str'=>$Mes_str,
            'zafra'=>$zafra,
        ));
    }
    
    echo json_encode(array(
        'data'=>$zafra_masters,
    ));
?>
