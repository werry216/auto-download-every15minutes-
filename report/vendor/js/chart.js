let radiationChart = {}, etoChart = {}, rainChart = {};
let chartYear = new Date().getFullYear().toString();
let etoYear = new Date().getFullYear().toString();
let rainYear = new Date().getFullYear().toString();

let quadrantRadiation = "";
let regionRadiation = "";
let estratoRadiation = "";
let lotRadiation = 0;
let estacionData = "";

let estacionEto = "Bonanza";
let renderRadiationConfirm = false;
let renderEtoConfirm = false;
let renderRainChartConfirm = false;
let RadiationMonth = [];
let EtoMonth = [];
let fechaData = [];

let quadrantData = ["All"];
let regionData = ["All"];
let estratoData = ["All"];
let lotData = [{lot: "All"}];
let lotArray = [];

$(document).ready(() => {
    $("#radiation-year-filter").val(chartYear);
    $("#eto-year-filter").val(etoYear);
    $("#graphicRadiation-item").on("click", () => {
        $("#graphicRadiation").css("display", "block");
        $("#graphicRain").css("display", "none");
        $("#graphicEto").css("display", "none");
        if (!renderRadiationConfirm) {
            renderRadiationConfirm = true;
            setTimeout(() => {
                let radiationChartData = [];
                for (const climate of climateData) {
                    const { Ano, Mes, Dia, Zafra, Radiacion, Estacion, Cuadrante, Fecha, Region, Estrato } = climate;
                    if (Ano === chartYear) radiationChartData.push({ Ano, Mes, Dia, Zafra, Radiacion, Fecha, Estacion, Region });
                    if (!quadrantData.includes(Cuadrante)) quadrantData.push(Cuadrante);
                    if (!regionData.includes(Region)) regionData.push(Region);
                    if (!estratoData.includes(Estrato)) estratoData.push(Estrato);
                }
                for (const product of productData) {
                    const { lot } = product;
                    if (!lotArray.includes(lot)) {
                        let ids = [];
                        lotArray.push(lot);
                        const RLotData = productData.filter((pro) => {
                            const Rlot = pro.lot;
                            return Rlot === lot;
                        });
                        for (const ele of RLotData) {
                            const { id_com_pims } = ele;
                            ids.push(id_com_pims);
                        }
                        lotData.push({ lot, ID_COMP: ids });
                    }
                }
                preRenderRadiationChart(radiationChartData);
                getQuadrant(quadrantData);
                getRegion(regionData);
                getEstrato(estratoData);
                getLot(lotData);
            }, 500);
        }
    })
    $("#graphicEto-item").on("click", () => {
        $("#graphicRadiation").css("display", "none");
        $("#graphicRain").css("display", "none");
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
    $("#graphicRain-item").on("click", () => {
        $("#graphicRain").css("display", "block");
        $("#graphicRadiation").css("display", "none");
        $("#graphicEto").css("display", "none");
        if (!renderRainChartConfirm) {
            $("#rain-year-filter").val(rainYear);
            $("#rain-chart-loading").loading("circle1");
            $.post("vendor/server/rain.php", { type: "get_allrain", year: rainYear }).then((result) => {
                let fechas = [];
                renderRainChartConfirm = true;
                let rainCharts = [];
                result = JSON.parse(result);
                const { rains, rain_masters } = result;
                setTimeout(() => {
                    for (const rain of rains) {
                        let rainAmount = 0;
                        let preRains = [];
                        const { FINCA_LOTE, CD_PLUVIOMETRO, CANT_LLUVIA, FECHA, MES, ANO } = rain;
                        for (const rain_master of rain_masters) {
                            const { Codigo_Nuevo, Codigo_Antiguo } = rain_master;
                            if (FINCA_LOTE === Codigo_Nuevo && CD_PLUVIOMETRO === Codigo_Antiguo) {
                                if (!fechas.includes(FECHA)) {
                                    fechas = [...fechas, FECHA];
                                    preRains = rains.filter((rain)=>{
                                        return rain.FECHA === FECHA && rain.FINCA_LOTE === Codigo_Nuevo && rain.CD_PLUVIOMETRO === Codigo_Antiguo;
                                    })
                                    for (const ele of preRains) {
                                        rainAmount += ele.CANT_LLUVIA;
                                    }
                                    rainCharts = [
                                        ...rainCharts,
                                        { FECHA, CANT_LLUVIA : rainAmount / preRains.length, ANO, MES }
                                    ]
                                }
                                break;
                            }
                        }
                    }
                    renderRainChart(rainCharts);
                    $("#rain-chart-loading").loading(false);
                }, 500);
            })
        }
    })
    $("#climate-item").on("click", () => {
        $("#graphicRadiation").css("display", "none");
        $("#graphicEto").css("display", "none");
        $("#graphicRain").css("display", "none");
    })
    $("#productivity-item").on("click", () => {
        $("#graphicRadiation").css("display", "none");
        $("#graphicEto").css("display", "none");
        $("#graphicRain").css("display", "none");
    })
})

const preRenderRadiationChart = (data = []) => {
    let radiationChartRealData = [];
    fechaData = [];
    for (const element of data) {
        let rData = [];
        const { Ano, Mes, Dia, Zafra, Estacion, Cuadrante, Fecha } = element;
        if (!fechaData.includes(Fecha)) {
            fechaData.push(Fecha);
            rData = data.filter((chartData) => {
                const RFecha = chartData.Fecha;
                return RFecha === Fecha;
            });
            let radiationSum = 0;
            for (const e of rData) {
                radiationSum += Number(e.Radiacion);
            }
            const no = rData.length;
            radiationChartRealData.push({ Ano, Mes, Dia, Zafra, Radiacion: (radiationSum / no), Estacion, Cuadrante, Fecha });
        }
    }
    renderRadiationChart(radiationChartRealData);
}

const radiationChartFilter = () => {
    let query = {};
    
    const year = $("#radiation-year-filter").val();
    const estation = $("#radiation-estation-filter").val();
    const quadrant = $("#radiation-quadrant-filter").val();
    const region = $("#radiation-region-filter").val();
    const estrato = $("#radiation-estrato-filter").val();
    const lot = $("#radiation-lot-filter").val();

    radiationChart.destroy();
    chartYear = year;
    estacionData = estation;
    quadrantRadiation = quadrant;
    regionRadiation = region;
    estratoRadiation = estrato;
    lotRadiation = lot;

    (estacionData!=="All") ? query.Estacion = estacionData : {};
    (quadrantRadiation!=="All") ? query.Cuadrante = quadrantRadiation : {};
    (regionRadiation!=="All") ? query.Region = regionRadiation : {};
    (estratoRadiation!=="All") ? query.Estrato = estratoRadiation : {};
    (lot!=="All") ? query.ID_COMP = lot.split("|") : {};
    query.Ano = chartYear;

    let radiationChartData = [];
    for (const climate of climateData) {
        let confirm = true;
        const { Ano, Mes, Dia, Zafra, Radiacion, Fecha } = climate;
        for (const key in query) {
            if (key!=='ID_COMP') confirm = confirm && (climate[key] === query[key]);
            else {
                let ID_confirm = false;
                for (const e of query[key]) {
                    ID_confirm = ID_confirm || (climate[key] === e);
                }
                confirm = confirm && ID_confirm;
            }
        }
        
        if (confirm) radiationChartData.push({ Ano, Mes, Dia, Zafra, Radiacion, Fecha });
    }
    preRenderRadiationChart(radiationChartData);
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

const getPointBackgroundColor = (ctx) => {
    const { raw } = ctx;
    if (0<=raw && raw<18) return 'rgb(255, 255, 0)';
    else if (18<=raw && raw<=20) return 'rgb(0, 255, 0)';
    else if (raw>20) return 'rgb(0, 100, 0)';
    else return 'rgb(255, 0, 0)';
}

const alternatePointStyles = (ctx) => {
    var index = ctx.dataIndex;
    return index % 2 === 0 ? 'circle' : 'rect';
}

const renderRadiationChart = (data = []) => {
    let zafraData = "";
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
        zafraData = (Zafra) && Zafra;
        Mes = Number(Mes);
        !RadiationMonth.includes(Mes) && RadiationMonth.push(Mes);
        labelData.push(`${Math.round(index / 5) + 1}(${Mes})`);
        dps.push(Radiacion);
    }

    var data  = {
        labels: labelData,
        datasets: [{
            label: 'Radiación',
            backgroundColor: gradient,
            pointBackgroundColor: 'white',
            borderWidth: 1,
            borderColor: '#911215',
            data: dps,
            pointBackgroundColor: getPointBackgroundColor,
            pointRadius: 5,
            pointHoverRadius: 7,
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
                tension: 0.4,
                fill: true,
            },
        },
        legend: {
            display: false
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
                text: `Radiación Chart ${zafraData ? `(Zafra: ${zafraData})` : ''}`,
                font: {
                    size: 30,
                }
            }
        }
    };

    radiationChart = new Chart(chart, { type: 'line', data, options });
}

const renderEtoChart = (data = []) => {
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
        labelData.push(`${Math.round(index / 5)+1}(${Mes})`);
        dps.push(Eto_PENMAN);
        $("#zafra-content-eto").html(Zafra);
    }

    var data  = {
        labels: labelData,
        datasets: [{
            label: 'ETO',
            backgroundColor: gradient,
            pointBackgroundColor: 'white',
            borderWidth: 1,
            borderColor: '#911215',
            data: dps,
            pointRadius: 5,
            pointHoverRadius: 7,
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
                tension: 0.4,
                fill: true,
            }
        },
        legend: { display: false },
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
                font: { size: 30 }
            }
        }
    };

    etoChart = new Chart(chart, { type: 'line', data, options });
}

const renderRainChart = (data = []) => {
    // $("#zafra-content-eto").html("");
    let labelData = [];
    let dps = [];
    var chart = document.getElementById('chart-rain').getContext('2d');
    gradient = chart.createLinearGradient(0, 0, 0, 400);

    gradient.addColorStop(0, 'rgba(255, 0,0, 0.5)');
    gradient.addColorStop(0.5, 'rgba(255, 0, 0, 0.25)');
    gradient.addColorStop(1, 'rgba(255, 0, 0, 0)');

    for (let index = 1; index < data.length; index+=5) {
        const element = data[index];
        let { FECHA, CANT_LLUVIA, ANO, MES } = element;
        // MES = Number(MES);
        // !EtoMonth.includes(MES) && EtoMonth.push(MES);
        labelData.push(`${Math.round(index / 5)+1}(${MES})`);
        dps.push(CANT_LLUVIA);
        // $("#zafra-content-eto").html(Zafra);
    }

    var dataSet  = {
        labels: labelData,
        datasets: [{
            label: 'Rain',
            backgroundColor: gradient,
            pointBackgroundColor: 'white',
            borderWidth: 1,
            borderColor: '#911215',
            data: dps,
            pointRadius: 5,
            pointHoverRadius: 7,
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
                tension: 0.4,
                fill: true,
            }
        },
        legend: { display: false },
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
                text: 'Rain Chart',
                font: { size: 30 }
            }
        }
    };

    rainChart = new Chart(chart, { type: 'line', data: dataSet, options });
}

const rainChartFilter = () => {
    const year = $("#rain-year-filter").val();
    rainChart.destroy();
    rainYear = year;
    $("#rain-chart-loading").loading("circle1");
    $.post("vendor/server/rain.php", { type: "get_allrain", year: rainYear }).then((result) => {
        let fechas = [];
        let rainCharts = [];
        result = JSON.parse(result);
        const { rains, rain_masters } = result;
        for (const rain of rains) {
            let rainAmount = 0;
            let preRains = [];
            const { FINCA_LOTE, CD_PLUVIOMETRO, CANT_LLUVIA, FECHA, MES, ANO } = rain;
            for (const rain_master of rain_masters) {
                const { Codigo_Nuevo, Codigo_Antiguo } = rain_master;
                if (FINCA_LOTE === Codigo_Nuevo && CD_PLUVIOMETRO === Codigo_Antiguo) {
                    if (!fechas.includes(FECHA)) {
                        fechas = [...fechas, FECHA];
                        preRains = rains.filter((rain)=>{
                            return rain.FECHA === FECHA && rain.FINCA_LOTE === Codigo_Nuevo && rain.CD_PLUVIOMETRO === Codigo_Antiguo;
                        })
                        for (const ele of preRains) {
                            rainAmount += ele.CANT_LLUVIA;
                        }
                        rainCharts = [
                            ...rainCharts,
                            { FECHA, CANT_LLUVIA : rainAmount / preRains.length, ANO, MES }
                        ]
                    }
                    break;
                }
            }
        }
        renderRainChart(rainCharts);
        $("#rain-chart-loading").loading(false);
    })
}

const getQuadrant = (data = []) => {
    let quadrantOptionHtml = "";
    for (const ele of data) {
        quadrantOptionHtml += `
            <option value="${ele}"> ${ele==='All' ? 'All ( Quadrant )' : ele} </option>
        `
    }
    $("#radiation-quadrant-filter").html(quadrantOptionHtml);
}

const getRegion = (data = []) => {
    let regionOptionHtml = "";
    for (const ele of data) {
        regionOptionHtml += `
            <option value="${ele}"> ${ele==='All' ? 'All ( Region )' : ele} </option>
        `
    }
    $("#radiation-region-filter").html(regionOptionHtml);
}

const getEstrato = (data = []) => {
    let estratoOptionHtml = "";
    for (const ele of data) {
        estratoOptionHtml += `
            <option value="${ele}"> ${ele==='All' ? 'All ( Estrato )' : ele} </option>
        `
    }
    $("#radiation-estrato-filter").html(estratoOptionHtml);
}

const getLot = (data = []) => {
    let lotOptionHtml = "";
    for (const ele of data) {
        const { lot, ID_COMP } = ele;
        const ids = ID_COMP ? ID_COMP.join("|") : "";
        lotOptionHtml += `
            <option value="${lot==='All' ? 'All' : ids}"> ${lot==='All' ? 'All ( Lot )' : lot} </option>
        `
    }
    $("#radiation-lot-filter").html(lotOptionHtml);
}
