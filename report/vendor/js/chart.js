let radiationChart, etoChart;
let chartYear = new Date().getFullYear().toString();
let etoYear = new Date().getFullYear().toString();
let estacionData = "Bonanza";
let estacionEto = "Bonanza";
let renderRadiationConfirm = false;
let renderEtoConfirm = false;
let RadiationMonth = [];
let EtoMonth = [];
let RadiationMonthString = "";
let EtoMonthString = "";

$(document).ready(() => {
    $("#radiation-year-filter").val(chartYear);
    $("#eto-year-filter").val(etoYear);
    $("#graphicRadiation-item").on("click", () => {
        $("#graphicRadiation").css("display", "block");
        $("#graphicEto").css("display", "none");
        if (!renderRadiationConfirm) {
            renderRadiationConfirm = true;
            setTimeout(() => {
                let radiationChartData = [];
                for (const climate of climateData) {
                    const { Ano, Mes, Dia, Zafra, Radiacion, Estacion } = climate;
                    if (Ano === chartYear && Estacion === estacionData) {
                        radiationChartData.push({
                            Ano, Mes, Dia, Zafra, Radiacion
                        });
                    }                    
                }
                renderRadiationChart(radiationChartData);
            }, 500);
        }
    })
    $("#graphicEto-item").on("click", () => {
        $("#graphicRadiation").css("display", "none");
        $("#graphicEto").css("display", "block");
        if (!renderEtoConfirm) {
            renderEtoConfirm = true;
            setTimeout(() => {
                let etoChartData = [];
                for (const climate of climateData) {
                    const { Ano, Mes, Dia, Zafra, Eto_PENMAN, Estacion } = climate;
                    if (Ano === etoYear && Estacion === estacionEto) {
                        etoChartData.push({
                            Ano, Mes, Dia, Zafra, Eto_PENMAN
                        });
                    }                    
                }
                renderEtoChart(etoChartData);
            }, 500);
        }
    })
    $("#climate-item").on("click", () => {
        $("#graphicRadiation").css("display", "none");
        $("#graphicEto").css("display", "none");
    })
    $("#productivity-item").on("click", () => {
        $("#graphicRadiation").css("display", "none");
        $("#graphicEto").css("display", "none");
    })
})

const radiationChartFilter = () => {
    const year = $("#radiation-year-filter").val();
    const estation = $("#radiation-estation-filter").val();
    radiationChart.destroy();
    chartYear = year;
    estacionData = estation;
    let radiationChartData = [];
    for (const climate of climateData) {
        const { Ano, Mes, Dia, Zafra, Radiacion, Estacion } = climate;
        if (Ano === chartYear && Estacion === estacionData) {
            radiationChartData.push({
                Ano, Mes, Dia, Zafra, Radiacion
            });
        }                    
    }
    renderRadiationChart(radiationChartData);
}

const etoChartFilter = () => {
    const year = $("#eto-year-filter").val();
    const estation = $("#eto-estation-filter").val();
    etoChart.destroy();
    etoYear = year;
    estacionEto = estation;
    let etoChartData = [];
    for (const climate of climateData) {
        const { Ano, Mes, Dia, Zafra, Eto_PENMAN, Estacion } = climate;
        if (Ano === etoYear && Estacion === estacionEto) {
            etoChartData.push({
                Ano, Mes, Dia, Zafra, Eto_PENMAN
            });
        }                    
    }
    renderEtoChart(etoChartData);
}

const renderRadiationChart = (data = []) => {
    RadiationMonthString = "";
    RadiationMonth = [];
    $("#zafra-content").html("");
    let labelData = [];
    let dps = [];
    var chart = document.getElementById('chart').getContext('2d');
    gradient = chart.createLinearGradient(0, 0, 0, 400);

    gradient.addColorStop(0, 'rgba(255, 0,0, 0.5)');
    gradient.addColorStop(0.5, 'rgba(255, 0, 0, 0.25)');
    gradient.addColorStop(1, 'rgba(255, 0, 0, 0)');

    for (let index = 1; index < data.length; index+=5) {
        const element = data[index];
        let { Radiacion, Zafra, Mes } = element;
        Mes = Number(Mes);
        !RadiationMonth.includes(Mes) && RadiationMonth.push(Mes);
        labelData.push(Math.round(index / 5) + 1);
        dps.push(Radiacion);
        $("#zafra-content").html(Zafra);
    }

    for (const month of RadiationMonth) RadiationMonthString += `<span> ${monthArray[month]} </span>`;
    $("#radiation-month").html(RadiationMonthString);

    var data  = {
        labels: labelData,
        datasets: [{
                label: 'Radiación',
                backgroundColor: gradient,
                pointBackgroundColor: 'white',
                borderWidth: 1,
                borderColor: '#911215',
                data: dps,
        }]
    };

    var options = {
        responsive: true,
        maintainAspectRatio: true,
        animation: {
            easing: 'easeInOutQuad',
            duration: 520
        },
        scales: {
            xAxes: [{
                gridLines: {
                    color: 'rgba(200, 200, 200, 0.05)',
                    lineWidth: 1
                }
            }],
            yAxes: [{
                gridLines: {
                    color: 'rgba(200, 200, 200, 0.08)',
                    lineWidth: 1
                }
            }]
        },
        elements: {
            line: {
                tension: 0.4
            }
        },
        legend: {
            display: false
        },
        point: {
            backgroundColor: 'white'
        },
        tooltips: {
            titleFontFamily: 'Open Sans',
            backgroundColor: 'rgba(0,0,0,0.3)',
            titleFontColor: 'red',
            caretSize: 5,
            cornerRadius: 2,
            xPadding: 10,
            yPadding: 10
        },
        plugins: {
            title: {
                display: true,
                text: 'Radiación Chart',
                font: {
                    size: 30,
                }
            }
        }
    };

    radiationChart = new Chart(chart, {
        type: 'line',
        data: data,
        options,
    });
}

const renderEtoChart = (data = []) => {
    EtoMonthString = "";
    EtoMonth = [];
    $("#zafra-content-eto").html("");
    let labelData = [];
    let dps = [];
    var chart = document.getElementById('chart-eto').getContext('2d');
    gradient = chart.createLinearGradient(0, 0, 0, 400);

    gradient.addColorStop(0, 'rgba(255, 0,0, 0.5)');
    gradient.addColorStop(0.5, 'rgba(255, 0, 0, 0.25)');
    gradient.addColorStop(1, 'rgba(255, 0, 0, 0)');

    for (let index = 1; index < data.length; index+=5) {
        const element = data[index];
        let { Eto_PENMAN, Zafra, Mes } = element;
        Mes = Number(Mes);
        !EtoMonth.includes(Mes) && EtoMonth.push(Mes);
        labelData.push(Math.round(index / 5)+1);
        dps.push(Eto_PENMAN);
        $("#zafra-content-eto").html(Zafra);
    }

    for (const month of EtoMonth) EtoMonthString += `<span> ${monthArray[month]} </span>`;
    $("#eto-month").html(EtoMonthString);

    var data  = {
        labels: labelData,
        datasets: [{
                label: 'ETO',
                backgroundColor: gradient,
                pointBackgroundColor: 'white',
                borderWidth: 1,
                borderColor: '#911215',
                data: dps,
        }]
    };

    var options = {
        responsive: true,
        maintainAspectRatio: true,
        animation: {
            easing: 'easeInOutQuad',
            duration: 520
        },
        scales: {
            xAxes: [{
                gridLines: {
                    color: 'rgba(200, 200, 200, 0.05)',
                    lineWidth: 1
                }
            }],
            yAxes: [{
                gridLines: {
                    color: 'rgba(200, 200, 200, 0.08)',
                    lineWidth: 1
                }
            }]
        },
        elements: {
            line: {
                tension: 0.4
            }
        },
        legend: {
            display: false
        },
        point: {
            backgroundColor: 'white'
        },
        tooltips: {
            titleFontFamily: 'Open Sans',
            backgroundColor: 'rgba(0,0,0,0.3)',
            titleFontColor: 'red',
            caretSize: 5,
            cornerRadius: 2,
            xPadding: 10,
            yPadding: 10
        },
        plugins: {
            title: {
                display: true,
                text: 'ETO Chart',
                font: {
                    size: 30,
                }
            }
        }
    };

    etoChart = new Chart(chart, {
        type: 'line',
        data,
        options,
    });
}
