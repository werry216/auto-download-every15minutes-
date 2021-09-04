$(document).ready(() => {
    $("#report-climate-loading").loading('circle1');
    $.post("vendor/server/getReport.php", { type: "getReportClimate" }).then((result) => {
        result = JSON.parse(result);
        const { climate_reports } = result;
        renderClimateTable(climate_reports);
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
            presion_atmosferica_maxima, direccion_viento, Rso, Rns,
        } = ele;
        dataSet.push([
            no++, Zafra, Ano, Mes, Fecha, Dia, Cuadrante, Estrato, Altitude_Use, ETP, Radiacion,
            Amplitud_Termica, R0, Estacion, temperatura, temperatura_min, temperatura_max, humedad_relativa,
            humedad_relativa_minima, humedad_relativa_maxima, velocidad_viento_minima, velocidad_viento_maxima,
            mojadura, presion_atmosferica, presion_atmosferica_minima, presion_atmosferica_maxima,
            direccion_viento, Rso, Rns,
        ]);
    }
    zafra_table = $('#climate-table').DataTable({
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
            { title: "Tem Max" },
            { title: "Tem Min" },
            { title: "humedad relativa" },
            { title: "humedad min" },
            { title: "humedad max" },
            { title: "velocidad min" },
            { title: "velocidad max" },
            { title: "mojadura" },
            { title: "presion" },
            { title: "presion min" },
            { title: "presion max" },
            { title: "direccion viento" },
            { title: "Ra[MJ m-2 day-1](Rso)" },
            { title: "Rns" },
        ],
        scrollX: true,
    });
    return;
}
