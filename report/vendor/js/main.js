$(document).ready(() => {
    renderClimateTable();
})

const renderClimateTable = (climates = []) => {
    let dataSet = [];
    let no = 1;
    for (const ele of climates) {
        const { ano_mes, ano, mes, Mes_str, zafra, No } = ele;
        dataSet.push([]);
    }
    zafra_table = $('#climate-table').DataTable({
        data: dataSet,
        columns: [
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
            { title: "Tem Max" },
            { title: "Tem Min" },
            { title: "humedad relativa" },
            { title: "humedad min" },
            { title: "humedad max" },
            { title: "velocidad min" },
            { title: "velocidad max" },
            { title: "direccion viento" },
            // { title: "velocidad max" },
            // { title: "velocidad max" },
            // { title: "velocidad max" },
        ],
        scrollX: true,
    });
    return;
}
