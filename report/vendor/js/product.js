$(document).ready(() => {
    $("#product-add-btn").on("click", () => {
        let new_product_id_com_pims = $("#new_product_id_com_pims").val();
        let new_product_finca = $("#new_product_finca").val();
        let new_product_description = $("#new_product_description").val();
        let new_product_lot = $("#new_product_lot").val();
        let new_product_tc = $("#new_product_tc").val();
        let new_product_area_cosechada = $("#new_product_area_cosechada").val();
        let new_product_TCH_real = $("#new_product_TCH_real").val();
        let new_product_tch_obj = $("#new_product_tch_obj").val();
        let new_product_dif_tch_vs_est = $("#new_product_dif_tch_vs_est").val();
        let new_product_cutoff_date = $("#new_product_cutoff_date").val();
        let new_product_days = $("#new_product_days").val();
        let new_product_pentadas = $("#new_product_pentadas").val();
        let new_product_etapa_fenologica = $("#new_product_etapa_fenologica").val();
        let new_product_no_cortes = $("#new_product_no_cortes").val();
        let new_product_tipo_de_cosecha = $("#new_product_tipo_de_cosecha").val();
        let new_product_edad_cosecha = $("#new_product_edad_cosecha").val();
        let new_product_semana_fiscal = $("#new_product_semana_fiscal").val();
        let new_product_region = $("#new_product_region").val();
        let new_product_variedad_anterior = $("#new_product_variedad_anterior").val();
        let new_product_variedad_cortada = $("#new_product_variedad_cortada").val();
        let new_product_status_para_analizar_la_produccion = $("#new_product_status_para_analizar_la_produccion").val();
        let new_product_edad_al_madurante = $("#new_product_edad_al_madurante").val();
        let new_product_fecha_aplic_madurante = $("#new_product_fecha_aplic_madurante").val();
        let new_product_dosis_producto = $("#new_product_dosis_producto").val();
        let new_product_producto_aplicado = $("#new_product_producto_aplicado").val();
        let new_product_TCH_estimado_madurante = $("#new_product_TCH_estimado_madurante").val();
        let new_product_KG_azcucar_prequema_ant = $("#new_product_KG_azcucar_prequema_ant").val();
        let new_product_KG_azucar_core_ant = $("#new_product_KG_azucar_core_ant").val();
        let new_product_Kg_azucar_Industrial_ant = $("#new_product_Kg_azucar_Industrial_ant").val();
        let new_product_KG_Azucar_prequema_estim = $("#new_product_KG_Azucar_prequema_estim").val();
        let new_product_KG_azucar_core_Estim = $("#new_product_KG_azucar_core_Estim").val();
        let new_product_KG_azucar_industrial_estim = $("#new_product_KG_azucar_industrial_estim").val();
        let new_product_KG_azucar_prequema_real = $("#new_product_KG_azucar_prequema_real").val();
        let new_product_KG_azucar_core_real = $("#new_product_KG_azucar_core_real").val();
        let new_product_KG_azucar_industrial_real = $("#new_product_KG_azucar_industrial_real").val();
        let new_product_Kg_t_core = $("#new_product_Kg_t_core").val();
        let new_product_Kg_t_ind = $("#new_product_Kg_t_ind").val();
        let new_product_Lotes_con_prequema = $("#new_product_Lotes_con_prequema").val();
        let new_product_area_cosechada_ant = $("#new_product_area_cosechada_ant").val();
        let new_product_tons_ant = $("#new_product_tons_ant").val();
        let new_product_TCH_ant = $("#new_product_TCH_ant").val();
        let new_product_area_moler_est = $("#new_product_area_moler_est").val();
        let new_product_tons_estimadas = $("#new_product_tons_estimadas").val();
        let new_product_dif_tons_ant_vrs_tons_est = $("#new_product_dif_tons_ant_vrs_tons_est").val();
        let new_product_dif_TCH_ant_vrs_TCH_est = $("#new_product_dif_TCH_ant_vrs_TCH_est").val();
        let new_product_MES_IDEAL = $("#new_product_MES_IDEAL").val();
        let new_product_VARIEDAD_IDEAL = $("#new_product_VARIEDAD_IDEAL").val();
        let new_product_id_altitud = $("#new_product_id_altitud").val();
        let new_product_tipo_de_suelo = $("#new_product_tipo_de_suelo").val();
        let new_product_TERCIO = $("#new_product_TERCIO").val();
        let new_product_dano_de_chinche = $("#new_product_dano_de_chinche").val();
        let new_product_trash = $("#new_product_trash").val();
        let new_product_cana_seca_podrida = $("#new_product_cana_seca_podrida").val();
        let new_product_f_maxima_corte_siembra = $("#new_product_f_maxima_corte_siembra").val();
        let new_product_sistema_de_riego = $("#new_product_sistema_de_riego").val();
        let new_product_AREA_ENERO = $("#new_product_AREA_ENERO").val();
        let new_product_TONS_ENERO = $("#new_product_TONS_ENERO").val();
        let new_product_KG_CORE_ENERO = $("#new_product_KG_CORE_ENERO").val();
        let new_product_KG_IND_ENERO = $("#new_product_KG_IND_ENERO").val();
        let new_product_brix = $("#new_product_brix").val();
        let new_product_pol = $("#new_product_pol").val();
        let new_product_pza = $("#new_product_pza").val();
        let new_product_jugo = $("#new_product_jugo").val();
        let new_product_ph = $("#new_product_ph").val();
        let new_product_humedad = $("#new_product_humedad").val();
        let new_product_fibra = $("#new_product_fibra").val();
        let new_product_TONS_CLEANER = $("#new_product_TONS_CLEANER").val();
        let new_product_humedad_ant = $("#new_product_humedad_ant").val();
        let new_product_extra1 = $("#new_product_extra1").val();
        let new_product_extra2 = $("#new_product_extra2").val();

        if (new_product_id_com_pims === "" || new_product_finca === "" || new_product_description === "" ||
        new_product_lot === "" || new_product_tc === "" || new_product_area_cosechada === "" ||
        new_product_TCH_real === "" || new_product_tch_obj === "" || new_product_dif_tch_vs_est === "" ||
        new_product_cutoff_date === "" || new_product_days === "" || new_product_pentadas === "" ||
        new_product_etapa_fenologica === "" || new_product_no_cortes === "" || new_product_tipo_de_cosecha === "" ||
        new_product_edad_cosecha === "" || new_product_semana_fiscal === "" || new_product_region === "" ||
        new_product_variedad_anterior === "" || new_product_variedad_cortada === "" || new_product_status_para_analizar_la_produccion === "" ||
        new_product_edad_al_madurante === "" || new_product_fecha_aplic_madurante === "" || new_product_dosis_producto === "" ||
        new_product_producto_aplicado === "" || new_product_TCH_estimado_madurante === "" || new_product_KG_azcucar_prequema_ant === "" ||
        new_product_KG_azucar_core_ant === "" || new_product_Kg_azucar_Industrial_ant === "" || new_product_KG_Azucar_prequema_estim === "" ||
        new_product_KG_azucar_core_Estim === "" || new_product_KG_azucar_industrial_estim === "" || new_product_KG_azucar_prequema_real === "" ||
        new_product_KG_azucar_core_real === "" || new_product_KG_azucar_industrial_real === "" || new_product_Kg_t_core === "" ||
        new_product_Kg_t_ind === "" || new_product_Lotes_con_prequema === "" || new_product_area_cosechada_ant === "" ||
        new_product_tons_ant === "" || new_product_TCH_ant === "" || new_product_area_moler_est === "" ||
        new_product_tons_estimadas === "" || new_product_dif_tons_ant_vrs_tons_est === "" || new_product_dif_TCH_ant_vrs_TCH_est === "" ||
        new_product_MES_IDEAL === "" || new_product_VARIEDAD_IDEAL === "" || new_product_id_altitud === "" ||
        new_product_tipo_de_suelo === "" || new_product_TERCIO === "" || new_product_dano_de_chinche === "" ||
        new_product_trash === "" || new_product_cana_seca_podrida === "" || new_product_f_maxima_corte_siembra === "" ||
        new_product_sistema_de_riego === "" || new_product_AREA_ENERO === "" || new_product_TONS_ENERO === "" ||
        new_product_KG_CORE_ENERO === "" || new_product_KG_IND_ENERO === "" || new_product_brix === "" ||
        new_product_pol === "" || new_product_pza === "" || new_product_jugo === "" ||
        new_product_ph === "" || new_product_humedad === "" || new_product_fibra === "" ||
        new_product_TONS_CLEANER === "" || new_product_humedad_ant === "" || new_product_extra1 === "" ||
        new_product_extra2 === "") {
            $("#product-add-submit-btn").click();
        } else {
            let data = {
                new_product_id_com_pims, new_product_finca, new_product_description,
                new_product_lot, new_product_tc, new_product_area_cosechada,
                new_product_TCH_real, new_product_tch_obj, new_product_dif_tch_vs_est,
                new_product_cutoff_date, new_product_days, new_product_pentadas,
                new_product_etapa_fenologica, new_product_no_cortes, new_product_tipo_de_cosecha,
                new_product_edad_cosecha, new_product_semana_fiscal, new_product_region,
                new_product_variedad_anterior, new_product_variedad_cortada, new_product_status_para_analizar_la_produccion,
                new_product_edad_al_madurante, new_product_fecha_aplic_madurante, new_product_dosis_producto,
                new_product_producto_aplicado, new_product_TCH_estimado_madurante, new_product_KG_azcucar_prequema_ant,
                new_product_KG_azucar_core_ant, new_product_Kg_azucar_Industrial_ant, new_product_KG_Azucar_prequema_estim,
                new_product_KG_azucar_core_Estim, new_product_KG_azucar_industrial_estim, new_product_KG_azucar_prequema_real,
                new_product_KG_azucar_core_real, new_product_KG_azucar_industrial_real, new_product_Kg_t_core,
                new_product_Kg_t_ind, new_product_Lotes_con_prequema, new_product_area_cosechada_ant,
                new_product_tons_ant, new_product_TCH_ant, new_product_area_moler_est,
                new_product_tons_estimadas, new_product_dif_tons_ant_vrs_tons_est, new_product_dif_TCH_ant_vrs_TCH_est,
                new_product_MES_IDEAL, new_product_VARIEDAD_IDEAL, new_product_id_altitud,
                new_product_tipo_de_suelo, new_product_TERCIO, new_product_dano_de_chinche,
                new_product_trash, new_product_cana_seca_podrida, new_product_f_maxima_corte_siembra,
                new_product_sistema_de_riego, new_product_AREA_ENERO, new_product_TONS_ENERO,
                new_product_KG_CORE_ENERO, new_product_KG_IND_ENERO, new_product_brix,
                new_product_pol, new_product_pza, new_product_jugo,
                new_product_ph, new_product_humedad, new_product_fibra,
                new_product_TONS_CLEANER, new_product_humedad_ant, new_product_extra1,
                new_product_extra2, type: "add_product_report",
            }
            $("#report-product-loading").loading("circle1");
            $("#product-add-close-btn").click();
            reportProductTable.destroy();
            $.post("vendor/server/product.php", data).then((result) => {
                result = JSON.parse(result);
                const { product_reports } = result;
                productData = product_reports;
                renderProductTable(product_reports);
                $("#report-product-loading").loading(false);
            })
        }
    })
    $("#product-download-btn").on("click", () => JSONToCSVConvertorProduct(productData, `${new Date().getTime()}`, true))
})

const JSONToCSVConvertorProduct = (JSONData, ReportTitle, ShowLabel) => {
    //If JSONData is not an object then JSON.parse will parse the JSON string in an Object
    var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;
  
    var CSV = '';
    //Set Report title in first row or line
  
    CSV += "Product Report" + '\r\n\n';
  
    //This condition will generate the Label/Header
    if (ShowLabel) {
        var row = "";
    
        //This loop will extract the label from 1st index of on array
        for (var index in arrData[0]) {
    
            //Now convert each value to string and comma-seprated
            row += index + ',';
        }
    
        row = row.slice(0, -1);
    
        //append Label row with line break
        CSV += row + '\r\n';
    }
  
    //1st loop is to extract each row
    for (var i = 0; i < arrData.length; i++) {
        var row = "";
    
        //2nd loop will extract each column and convert it in string comma-seprated
        for (var index in arrData[i]) {
            row += '"' + arrData[i][index] + '",';
        }
    
        row.slice(0, row.length - 1);
    
        //add a line break after each row
        CSV += row + '\r\n';
    }
  
    if (CSV == '') {
        alert("Invalid data");
        return;
    }
  
    //Generate a file name
    var fileName = "MyProductReport_";
    //this will remove the blank-spaces from the title and replace it with an underscore
    fileName += ReportTitle.replace(/ /g, "_");
  
    //Initialize file format you want csv or xls
    var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);
  
    // Now the little tricky part.
    // you can use either>> window.open(uri);
    // but this will not work in some browsers
    // or you will not get the correct file extension    
  
    //this trick will generate a temp <a /> tag
    var link = document.createElement("a");
    link.href = uri;
  
    //set the visibility hidden so it will not effect on your web-layout
    link.style = "visibility:hidden";
    link.download = fileName + ".csv";
  
    //this part will append the anchor tag and remove it after automatic click
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}
