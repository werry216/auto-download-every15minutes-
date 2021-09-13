let start, end, estacion;

const climateFilter = () => {
    const start_date = $("#start-date").val();
    const end_date = $("#end-date").val();

    estacion = $("#estacion-filter").val();
    start = start_date;
    end = end_date;

    reportClimateTable.destroy();
    $("#report-climate-loading").loading('circle1');
    $.post("vendor/server/climate.php", { start, end, estacion, type: "climate-filter" }).then((result) => {
        result = JSON.parse(result);
        const { climate_reports } = result;
        climateData = climate_reports;
        renderClimateTable(climate_reports);
        $("#report-climate-loading").loading(false);
    })
}
