let reportClimateTable;
let reportProductTable;
$(document).ready(() => {
    $("#report-climate-loading").loading('circle1');
    $.post("vendor/server/getReport.php").then((result) => {
        result = JSON.parse(result);
        const { climate_reports, product_reports } = result;
        renderClimateTable(climate_reports);
        renderProductTable(product_reports);
        $("#report-climate-loading").loading(false);
    })
})

const renderClimateTable = (climates = []) => {
    let dataSet = [];
    let no = 1;
    for (const ele of climates) {
        const { Zafra, Ano, Mes, Fecha, Dia, Cuadrante, Estrato, Altitude_Use, ETP,
            Radiacion, Amplitud_Termica, R0, Estacion, temperatura, temperatura_min,
            temperatura_max, radiacion_promedio, humedad_relativa, humedad_relativa_minima,
            humedad_relativa_maxima, precipitacion, velocidad_viento, velocidad_viento_minima,
            velocidad_viento_maxima, mojadura, presion_atmosferica, presion_atmosferica_minima,
            presion_atmosferica_maxima, direccion_viento, Rso, Kpa, pendiente_curva,
            presion_de, presion_real_de, deficit_presion, velocidad_estandar, Rns, Rnl, Rn,
            Aplica, Eto_Hargreaves, Eto_PENMAN,
        } = ele;
        dataSet.push([
            no++, Zafra, Ano, Mes, Fecha, Dia, Cuadrante, Estrato, Altitude_Use, ETP, Radiacion,
            Amplitud_Termica, R0, Estacion, temperatura, temperatura_min, temperatura_max, radiacion_promedio, humedad_relativa,
            humedad_relativa_minima, humedad_relativa_maxima, precipitacion, velocidad_viento,velocidad_viento_minima, velocidad_viento_maxima,
            mojadura, presion_atmosferica, presion_atmosferica_minima, presion_atmosferica_maxima,
            direccion_viento, Rso, Kpa, pendiente_curva,
            presion_de, presion_real_de, deficit_presion, velocidad_estandar, Rns, Rnl, Rn,
            Eto_PENMAN, Eto_Hargreaves, Aplica,
        ]);
    }
    reportClimateTable = $('#climate-table').DataTable({
        data: dataSet,
        columns: [
            { title: "No" },
            { title: "Zafra" },
            { title: "Ano" },
            { title: "Mes" },
            { title: "Fecha" },
            { title: "Dia" },
            { title: "Cuadrante" },
            { title: "Estrato" },
            { title: "Altitude Use" },
            { title: "ETP" },
            { title: "Radiacion(MJ/m2)" },
            { title: "Amplitud Termica" },
            { title: "R0" },
            { title: "Estacion" },
            { title: "Tem" },
            { title: "Tem Min" },
            { title: "Tem Max" },
            { title: "radiacion promedio" },
            { title: "humedad relativa" },
            { title: "humedad min" },
            { title: "humedad max" },
            { title: "precipitacion" },
            { title: "velocidad viento" },
            { title: "velocidad min" },
            { title: "velocidad max" },
            { title: "mojadura" },
            { title: "presion" },
            { title: "presion min" },
            { title: "presion max" },
            { title: "direccion viento" },
            { title: "Ra[MJ m-2 day-1](Rso)" },
            { title: "Constante Psicometrica(Kpa)" },
            { title: "Pendiente curva de presion de saturación de vapor (∆)" },
            { title: "Presión de saturación de vapor eS=(eo (Tmax)+eo (Tmin))/2" },
            { title: "presión real de vapor (ea)" },
            { title: "deficit de presión de vapor(es-ea)" },
            { title: "Velocidad del viento a altura estandar (u2)" },
            { title: "Rns" },
            { title: "Rnl" },
            { title: "Rn" },
            { title: "Eto PENMAN MONTEITH(mm/dia)" },
            { title: "Eto(mm/dia) Hargreaves" },
            { title: "APLICA" },
        ],
        scrollX: true,
    });
    return;
}

const renderProductTable = (products = []) => {
    let dataSet = [];
    let no = 1;
    for (const ele of products) {
        const { id_com_pims, finca, descriptions, lot,
            tc, area_cosechada, TCH_real, TCH_obj, dif_tch_vs_est, cutoff_date, dayer, pentadas,
            etapa_fenologica, no_cortes, tipo_de_cosecha, edad_coseha, semana_fiscal, region, variedad_anterior,
            variedad_cortada, status_para_analizar_la_production, edad_al_madurante, fecha_aplic_madurante,
            dosis_producto, producto_aplicado, tch_estimado_madurante, kg_azcucar_prequema_ant, kg_azcucar_core_ant,
            kg_azcucar_industrial_ant, kg_azucar_prequema_estim, kg_azucar_core_estim, kg_azucar_industrial_ant, kg_azucar_prequema_real,
            kg_azucar_core_real, kg_azucar_industrial_real, kg_t_core, kg_t_ind, lotes_con_prequema, area_cosechada_ant,
            tons_ant, tch_ant, area_moler_est, tons_estimadas, dif_tons_ant_vrs_tons_est, dif_TCH_ant_vrs_TCH_est,
            MES_IDEAL, VARIEDAD_IDEAL, id_altitud, tipo_de_suelo, TERCIO, dano_de_chinche, trash, cana_seca_podrida,
            f_maxima_corte_siembra, sistema_de_riego, area_enero, tons_enero, kg_core_enero, kg_ind_enero, brix,
            pol, pza, jugo, ph, humedad, fibra, tons_cleaner, humedad_ant, extra1, extra2,
        } = ele;
        dataSet.push([
            no++, id_com_pims, finca, descriptions, lot,
            tc, area_cosechada, TCH_real, TCH_obj, dif_tch_vs_est, cutoff_date, dayer, pentadas,
            etapa_fenologica, no_cortes, tipo_de_cosecha, edad_coseha, semana_fiscal, region, variedad_anterior,
            variedad_cortada, status_para_analizar_la_production, edad_al_madurante, fecha_aplic_madurante,
            dosis_producto, producto_aplicado, tch_estimado_madurante, kg_azcucar_prequema_ant, kg_azcucar_core_ant,
            kg_azcucar_industrial_ant, kg_azucar_prequema_estim, kg_azucar_core_estim, kg_azucar_industrial_ant, kg_azucar_prequema_real,
            kg_azucar_core_real, kg_azucar_industrial_real, kg_t_core, kg_t_ind, lotes_con_prequema, area_cosechada_ant,
            tons_ant, tch_ant, area_moler_est, tons_estimadas, dif_tons_ant_vrs_tons_est, dif_TCH_ant_vrs_TCH_est,
            MES_IDEAL, VARIEDAD_IDEAL, id_altitud, tipo_de_suelo, TERCIO, dano_de_chinche, trash, cana_seca_podrida,
            f_maxima_corte_siembra, sistema_de_riego, area_enero, tons_enero, kg_core_enero, kg_ind_enero, brix,
            pol, pza, jugo, ph, humedad, fibra, tons_cleaner, humedad_ant, extra1, extra2,
        ]);
    }
    reportProductTable = $('#product-table').DataTable({
        data: dataSet,
        columns: [
            { title: "No" },
            { title: "id-com pims" },
            { title: "Finca" },
            { title: "Descripción" },
            { title: "Lot" },
            { title: "TC" },
            { title: "Área cosechada" },
            { title: "TCH Real" },
            { title: "TCH Obj" },
            { title: "dif tch vs est" },
            { title: "cutoff date" },
            { title: "Days" },
            { title: "Pentadas" },
            { title: "Etapa Fenologica" },
            { title: "No. Cortes" },
            { title: "tipo de cosecha" },
            { title: "edad cosecha" },
            { title: "Semana fiscal" },
            { title: "Region" },
            { title: "variedad anterior" },
            { title: "variedad cortada" },
            { title: "Status para analizar la produccion" },
            { title: "edad al madurante" },
            { title: "Fecha aplic. Madurante" },
            { title: "Dosis Producto" },
            { title: "Producto Aplicado" },
            { title: "TCH estimado madurante" },
            { title: "KG azcucar prequema ant" },
            { title: "KG azucar core ant" },
            { title: "Kg azucar Industrial ant" },
            { title: "KG Azucar prequema estim" },
            { title: "KG Azucar Core Estim" },
            { title: "KG Azucar industrial estim" },
            { title: "KG Azucar prequema real" },
            { title: "KG Azucar Core real" },
            { title: "KG Azucar industrial real" },
            { title: "Kg/t Core" },
            { title: "Kg/t Ind" },
            { title: "Lotes con prequema (si o no)" },
            { title: "area cosechada ant" },
            { title: "tons ant" },
            { title: "TCH ant" },
            { title: "Area a moler est" },
            { title: "Tons. Estimadas" },
            { title: "Dif Tons ant Vrs Tons est" },
            { title: "Dif TCH ant Vrs  TCH est" },
            { title: "MES IDEAL" },
            { title: "VARIEDAD IDEAL" },
            { title: "id altitud" },
            { title: "Tipo de suelo" },
            { title: "TERCIO" },
            { title: "Daño de chinche 19-20" },
            { title: "trash" },
            { title: "caña seca + podrida" },
            { title: "f.maxima corte y siembra" },
            { title: "sistema de Riego" },
            { title: "AREA ENERO" },
            { title: "TONS ENERO" },
            { title: "KG CORE ENERO" },
            { title: "KG IND ENERO" },
            { title: "Brix" },
            { title: "Pol" },
            { title: "Pza" },
            { title: "Jugo" },
            { title: "Ph" },
            { title: "humedad" },
            { title: "fibra" },
            { title: "TONS CLEANER" },
            { title: "Humedad ant" },
            { title: "Extra1" },
            { title: "Extra2" },
        ],
        scrollX: true,
    });
    return;
}
