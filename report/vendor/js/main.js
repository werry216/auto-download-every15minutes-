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
