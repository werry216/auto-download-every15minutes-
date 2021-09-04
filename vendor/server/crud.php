<?php
    require_once "../../connect.php";
    $type = $_POST["type"];
    ($type=="zafra_add") && zafra_add($conn);
    ($type=="zafra_remove") && zafra_remove($conn);
    ($type=="zafra_edit") && zafra_edit($conn);

    ($type=="ro_add") && ro_add($conn);
    ($type=="ro_remove") && ro_remove($conn);
    ($type=="ro_edit") && ro_edit($conn);

    ($type=="ra_add") && ra_add($conn);
    ($type=="ra_remove") && ra_remove($conn);
    ($type=="ra_edit") && ra_edit($conn);

    function zafra_add($conn)
    {
        $ano_mes = $_POST["ano_mes"];
        $ano = $_POST["ano"];
        $mes = $_POST["mes"];
        $Mes_str = $_POST["Mes_str"];
        $zafra = $_POST["zafra"];

        $insert_query = "INSERT INTO zafra_masters (ano_mes, ano, mes, Mes_str, zafra)
            VALUES ('$ano_mes', '$ano', '$mes', '$Mes_str', '$zafra')";
        $confirm = $conn->query($insert_query);

        $sql = "SELECT * FROM zafra_masters ORDER BY ano_mes";
        $result = $conn->query($sql);
        $zafra_masters = array();

        foreach($result as $row) {
            array_push($zafra_masters, $row);
        }
        echo json_encode(array(
            'zafra_masters'=>$zafra_masters,
        ));
    }

    function zafra_edit($conn)
    {
        $ano_mes = $_POST["ano_mes"];
        $ano = $_POST["ano"];
        $mes = $_POST["mes"];
        $Mes_str = $_POST["Mes_str"];
        $zafra = $_POST["zafra"];
        $No = $_POST["no"];

        $update_query = "UPDATE zafra_masters
            SET ano_mes='$ano_mes', ano='$ano', mes='$mes', Mes_str='$Mes_str', zafra='$zafra'
            WHERE No='$No'";
        $confirm = $conn->query($update_query);

        $sql = "SELECT * FROM zafra_masters ORDER BY ano_mes";
        $result = $conn->query($sql);
        $zafra_masters = array();

        foreach($result as $row) {
            array_push($zafra_masters, $row);
        }
        echo json_encode(array(
            'zafra_masters'=>$zafra_masters,
        ));
    }

    function zafra_remove($conn)
    {
        $no = $_POST["no"];

        $delete_query = "DELETE FROM zafra_masters WHERE No='$no'";
        $confirm = $conn->query($delete_query);

        $sql = "SELECT * FROM zafra_masters ORDER BY ano_mes";
        $result = $conn->query($sql);
        $zafra_masters = array();

        foreach($result as $row) {
            array_push($zafra_masters, $row);
        }
        echo json_encode(array(
            'zafra_masters'=>$zafra_masters,
        ));
    }
    function ro_add($conn)
    {
        $mes = $_POST["mes"];
        $R_0 = $_POST["R_0"];

        $insert_query = "INSERT INTO master_ro (Mes, R_0)
            VALUES ('$mes', '$R_0')";
        $confirm = $conn->query($insert_query);

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

    function ro_edit($conn)
    {
        $mes = $_POST["mes"];
        $R_0 = $_POST["R_0"];
        $No = $_POST["no"];

        $update_query = "UPDATE master_ro
            SET Mes='$mes', R_0='$R_0'
            WHERE No='$No'";
        $confirm = $conn->query($update_query);

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

    function ro_remove($conn)
    {
        $no = $_POST["no"];

        $delete_query = "DELETE FROM master_ro WHERE No='$no'";
        $confirm = $conn->query($delete_query);

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
    function ra_add($conn)
    {
        $fecha = $_POST["fecha"];
        $ano = $_POST["ano"];
        $mes = $_POST["mes"];
        $dia = $_POST["dia"];
        $codigo_unico = $_POST["codigo_unico"];
        $rso = $_POST["rso"];
        $ano_biciesto = $_POST["ano_biciesto"];

        $insert_query = "INSERT INTO master_ra (Fecha, ANO, MES, DIA, codigo_unico, Rso, ano_biciesto)
            VALUES ('$fecha', '$ano', '$mes', '$dia', '$codigo_unico', '$rso', '$ano_biciesto')";
        $confirm = $conn->query($insert_query);

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

    function ra_edit($conn)
    {
        $fecha = $_POST["fecha"];
        $ano = $_POST["ano"];
        $mes = $_POST["mes"];
        $dia = $_POST["dia"];
        $codigo_unico = $_POST["codigo_unico"];
        $rso = $_POST["rso"];
        $ano_biciesto = $_POST["ano_biciesto"];
        $No = $_POST["no"];

        $update_query = "UPDATE master_ra
            SET Fecha='$fecha', ANO='$ano', MES='$mes', DIA='$dia', codigo_unico='$codigo_unico', Rso='$rso', ano_biciesto='$ano_biciesto'
            WHERE No='$No'";
        $confirm = $conn->query($update_query);

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

    function ra_remove($conn)
    {
        $no = $_POST["no"];

        $delete_query = "DELETE FROM master_ra WHERE No='$no'";
        $confirm = $conn->query($delete_query);

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
?>
