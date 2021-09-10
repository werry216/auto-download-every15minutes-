<?php
    include "C:/xampp/php/Classes/PHPExcel/IOFactory.php";
    require_once "../../connect.php";
    
    $type = $_POST["type"];
    ($type == "productivity_report_format") && productivity_report_format($conn);

    function productivity_report_format($conn)
    {
        $inputFileName = "../../files/productivity_report.xls";
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch(Exception $e) {
            die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
        
        $product = $objPHPExcel->getSheet(0);
        $product_highestRow = $product->getHighestRow(); 
        $product_highestColumn = $product->getHighestColumn();
        
        $delete_query = "DELETE FROM reporte_productividad";
        $confirm = $conn->query($delete_query);

        for ($row = 2; $row <= $product_highestRow; $row++) {
            $rowData = $product->rangeToArray('A' . $row . ':' . $product_highestColumn . $row);
            $rowData = $rowData[0];

            $id_com_pims = $rowData[0];
            $finca = $rowData[1];
            $descriptions = $rowData[2];
            $lot = $rowData[3];
            $tc = $rowData[4];
            $area_cosechada = $rowData[5];
            $TCH_real = $rowData[6];
            $TCH_obj = $rowData[7];
            $dif_tch_vs_est = $rowData[8];
            $cutoff_date = $rowData[9];
            $dayer = $rowData[10];
            $pentadas = $rowData[11];
            $etapa_fenologica = $rowData[12];
            $no_cortes = $rowData[13];
            $tipo_de_cosecha = $rowData[14];
            $edad_coseha = $rowData[15];
            $semana_fiscal = $rowData[16];
            $region = $rowData[17];
            $variedad_anterior = $rowData[18];
            $variedad_cortada = $rowData[19];
            $status_para_analizar_la_production = $rowData[20];
            $edad_al_madurante = $rowData[21];
            $fecha_aplic_madurante = $rowData[22];
            $dosis_producto = $rowData[23];
            $producto_aplicado = $rowData[24];
            $tch_estimado_madurante = $rowData[25];
            $kg_azcucar_prequema_ant = $rowData[26];
            $kg_azcucar_core_ant = $rowData[27];
            $kg_azcucar_industrial_ant = $rowData[28];
            $kg_azucar_prequema_estim = $rowData[29];
            $kg_azucar_core_estim = $rowData[30];
            $kg_azucar_industrial_ant = $rowData[31];
            $kg_azucar_prequema_real = $rowData[32];
            $kg_azucar_core_real = $rowData[33];
            $kg_azucar_industrial_real = $rowData[34];
            $kg_t_core = $rowData[35];
            $kg_t_ind = $rowData[36];
            $lotes_con_prequema = $rowData[37];
            $area_cosechada_ant = $rowData[38];
            $tons_ant = $rowData[39];
            $tch_ant = $rowData[40];
            $area_moler_est = $rowData[41];
            $tons_estimadas = $rowData[42];
            $dif_tons_ant_vrs_tons_est = $rowData[43];
            $dif_TCH_ant_vrs_TCH_est = $rowData[44];
            $MES_IDEAL = $rowData[45];
            $VARIEDAD_IDEAL = $rowData[46];
            $id_altitud = $rowData[47];
            $tipo_de_suelo = $rowData[48];
            $TERCIO = $rowData[49];
            $dano_de_chinche = $rowData[50];
            $trash = $rowData[51];
            $cana_seca_podrida = $rowData[52];
            $f_maxima_corte_siembra = $rowData[53];
            $sistema_de_riego = $rowData[54];
            $area_enero = $rowData[55];
            $tons_enero = $rowData[56];
            $kg_core_enero = $rowData[57];
            $kg_ind_enero = $rowData[58];
            $brix = $rowData[59];
            $pol = $rowData[60];
            $pza = $rowData[61];
            $jugo = $rowData[62];
            $ph = $rowData[63];
            $humedad = $rowData[64];
            $fibra = $rowData[65];
            $tons_cleaner = $rowData[66];
            $humedad_ant = $rowData[67];
            $extra1 = $rowData[68];
            $extra2 = $rowData[69];

            $sql = "SELECT id_com_pims FROM reporte_productividad
                WHERE id_com_pims='$id_com_pims[0]' AND cutoff_date='$cutoff_date'";
            
            $result = $conn->query($sql);
            if ($result->num_rows==0) {
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
            }
        }
        echo json_encode(array('success'=>true));
    }

?>
