<?php
    require_once "../../../connect.php";
    $type = $_POST["type"];
    ($type==="add_product_report") && add_product_report($conn);
    ($type==="remove_product_report") && remove_product_report($conn);

    function add_product_report($conn)
    {
        $id_com_pims = $_POST["new_product_id_com_pims"];
        $finca = $_POST["new_product_finca"];
        $descriptions = $_POST["new_product_description"];
        $lot = $_POST["new_product_lot"];
        $tc = $_POST["new_product_tc"];
        $area_cosechada = $_POST["new_product_area_cosechada"];
        $TCH_real = $_POST["new_product_TCH_real"];
        $TCH_obj = $_POST["new_product_tch_obj"];
        $dif_tch_vs_est = $_POST["new_product_dif_tch_vs_est"];
        $cutoff_date = $_POST["new_product_cutoff_date"];
        $dayer = $_POST["new_product_days"];
        $pentadas = $_POST["new_product_pentadas"];
        $etapa_fenologica = $_POST["new_product_etapa_fenologica"];
        $no_cortes = $_POST["new_product_no_cortes"];
        $tipo_de_cosecha = $_POST["new_product_tipo_de_cosecha"];
        $edad_coseha = $_POST["new_product_edad_cosecha"];
        $semana_fiscal = $_POST["new_product_semana_fiscal"];
        $region = $_POST["new_product_region"];
        $variedad_anterior = $_POST["new_product_variedad_anterior"];
        $variedad_cortada = $_POST["new_product_variedad_cortada"];
        $status_para_analizar_la_production = $_POST["new_product_status_para_analizar_la_produccion"];
        $edad_al_madurante = $_POST["new_product_edad_al_madurante"];
        $fecha_aplic_madurante = $_POST["new_product_fecha_aplic_madurante"];
        $dosis_producto = $_POST["new_product_dosis_producto"];
        $producto_aplicado = $_POST["new_product_producto_aplicado"];
        $tch_estimado_madurante = $_POST["new_product_TCH_estimado_madurante"];
        $kg_azcucar_prequema_ant = $_POST["new_product_KG_azcucar_prequema_ant"];
        $kg_azcucar_core_ant = $_POST["new_product_KG_azucar_core_ant"];
        $kg_azcucar_industrial_ant = $_POST["new_product_Kg_azucar_Industrial_ant"];
        $kg_azucar_prequema_estim = $_POST["new_product_KG_Azucar_prequema_estim"];
        $kg_azucar_core_estim = $_POST["new_product_KG_azucar_core_Estim"];
        $kg_azucar_industrial_ant = $_POST["new_product_KG_azucar_industrial_estim"];
        $kg_azucar_prequema_real = $_POST["new_product_KG_azucar_prequema_real"];
        $kg_azucar_core_real = $_POST["new_product_KG_azucar_core_real"];
        $kg_azucar_industrial_real = $_POST["new_product_KG_azucar_industrial_real"];
        $kg_t_core = $_POST["new_product_Kg_t_core"];
        $kg_t_ind = $_POST["new_product_Kg_t_ind"];
        $lotes_con_prequema = $_POST["new_product_Lotes_con_prequema"];
        $area_cosechada_ant = $_POST["new_product_area_cosechada_ant"];
        $tons_ant = $_POST["new_product_tons_ant"];
        $tch_ant = $_POST["new_product_TCH_ant"];
        $area_moler_est = $_POST["new_product_area_moler_est"];
        $tons_estimadas = $_POST["new_product_tons_estimadas"];
        $dif_tons_ant_vrs_tons_est = $_POST["new_product_dif_tons_ant_vrs_tons_est"];
        $dif_TCH_ant_vrs_TCH_est = $_POST["new_product_dif_TCH_ant_vrs_TCH_est"];
        $MES_IDEAL = $_POST["new_product_MES_IDEAL"];
        $VARIEDAD_IDEAL = $_POST["new_product_VARIEDAD_IDEAL"];
        $id_altitud = $_POST["new_product_id_altitud"];
        $tipo_de_suelo = $_POST["new_product_tipo_de_suelo"];
        $TERCIO = $_POST["new_product_TERCIO"];
        $dano_de_chinche = $_POST["new_product_dano_de_chinche"];
        $trash = $_POST["new_product_trash"];
        $cana_seca_podrida = $_POST["new_product_cana_seca_podrida"];
        $f_maxima_corte_siembra = $_POST["new_product_f_maxima_corte_siembra"];
        $sistema_de_riego = $_POST["new_product_sistema_de_riego"];
        $area_enero = $_POST["new_product_AREA_ENERO"];
        $tons_enero = $_POST["new_product_TONS_ENERO"];
        $kg_core_enero = $_POST["new_product_KG_CORE_ENERO"];
        $kg_ind_enero = $_POST["new_product_KG_IND_ENERO"];
        $brix = $_POST["new_product_brix"];
        $pol = $_POST["new_product_pol"];
        $pza = $_POST["new_product_pza"];
        $jugo = $_POST["new_product_jugo"];
        $ph = $_POST["new_product_ph"];
        $humedad = $_POST["new_product_humedad"];
        $fibra = $_POST["new_product_fibra"];
        $tons_cleaner = $_POST["new_product_TONS_CLEANER"];
        $humedad_ant = $_POST["new_product_humedad_ant"];
        $extra1 = $_POST["new_product_extra1"];
        $extra2 = $_POST["new_product_extra2"];

        $insert_query = "INSERT INTO reporte_productividad (id_com_pims, finca, descriptions, lot,
        tc, area_cosechada, TCH_real, TCH_obj, dif_tch_vs_est, cutoff_date, dayer, pentadas,
        etapa_fenologica, no_cortes, tipo_de_cosecha, edad_coseha, semana_fiscal, region, variedad_anterior,
        variedad_cortada, status_para_analizar_la_production, edad_al_madurante, fecha_aplic_madurante,
        dosis_producto, producto_aplicado, tch_estimado_madurante, kg_azcucar_prequema_ant, kg_azcucar_core_ant,
        kg_azcucar_industrial_ant, kg_azucar_prequema_estim, kg_azucar_core_estim, kg_azucar_industrial_ant, kg_azucar_prequema_real,
        kg_azucar_core_real, kg_azucar_industrial_real, kg_t_core, kg_t_ind, lotes_con_prequema, area_cosechada_ant,
        tons_ant, tch_ant, area_moler_est, tons_estimadas, dif_tons_ant_vrs_tons_est, dif_TCH_ant_vrs_TCH_est,
        MES_IDEAL, VARIEDAD_IDEAL, id_altitud, tipo_de_suelo, TERCIO, dano_de_chinche, trash, cana_seca_podrida,
        f_maxima_corte_siembra, sistema_de_riego, area_enero, tons_enero, kg_core_enero, kg_ind_enero, brix,
        pol, pza, jugo, ph, humedad, fibra, tons_cleaner, humedad_ant, extra1, extra2)
        VALUES ('$id_com_pims', '$finca', '$descriptions', '$lot',
        '$tc', '$area_cosechada', '$TCH_real', '$TCH_obj', '$dif_tch_vs_est', '$cutoff_date', '$dayer', '$pentadas',
        '$etapa_fenologica', '$no_cortes', '$tipo_de_cosecha', '$edad_coseha', '$semana_fiscal', '$region', '$variedad_anterior',
        '$variedad_cortada', '$status_para_analizar_la_production', '$edad_al_madurante', '$fecha_aplic_madurante',
        '$dosis_producto', '$producto_aplicado', '$tch_estimado_madurante', '$kg_azcucar_prequema_ant', '$kg_azcucar_core_ant',
        '$kg_azcucar_industrial_ant', '$kg_azucar_prequema_estim', '$kg_azucar_core_estim', '$kg_azucar_industrial_ant', '$kg_azucar_prequema_real',
        '$kg_azucar_core_real', '$kg_azucar_industrial_real', '$kg_t_core', '$kg_t_ind', '$lotes_con_prequema', '$area_cosechada_ant',
        '$tons_ant', '$tch_ant', '$area_moler_est', '$tons_estimadas', '$dif_tons_ant_vrs_tons_est', '$dif_TCH_ant_vrs_TCH_est',
        '$MES_IDEAL', '$VARIEDAD_IDEAL', '$id_altitud', '$tipo_de_suelo', '$TERCIO', '$dano_de_chinche', '$trash', '$cana_seca_podrida',
        '$f_maxima_corte_siembra', '$sistema_de_riego', '$area_enero', '$tons_enero', '$kg_core_enero', '$kg_ind_enero', '$brix',
        '$pol', '$pza', '$jugo', '$ph', '$humedad', '$fibra', '$tons_cleaner', '$humedad_ant', '$extra1', '$extra2')";
        
        $confirm = $conn->query($insert_query);
        
        $sql_product = "SELECT * FROM reporte_productividad ORDER BY cutoff_date";
        $result_product = $conn->query($sql_product);
        $product_reports = array();

        foreach($result_product as $row) {
            array_push($product_reports, $row);
        }
        echo json_encode(array(
            'product_reports' => $product_reports,
        ));
    }

    function remove_product_report($conn)
    {
        $no = $_POST["no"];
        
        $sql_remove = "DELETE FROM reporte_productividad WHERE No='$no'";
        $remove_confirm = $conn->query($sql_remove);
        $sql_product_select = "SELECT * FROM reporte_productividad ORDER BY cutoff_date";
        $result_products = $conn->query($sql_product_select);
        $product_reports = array();

        foreach($result_products as $row) {
            array_push($product_reports, $row);
        }
        echo json_encode(array(
            'product_reports' => $product_reports,
        ));
    }
?>
