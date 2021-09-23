let renderRainMasterConfirm = false;
let renderRainConfirm = false;
let rainMasterTable = {};
let rainTable = {};
let rainData = [];
let rainMasterData = [];

$(document).ready(() => {
    $("#rain-master-item").on("click", () => {
        $("#graphicAll").css("display", "none");
        $("#graphicRain").css("display", "none");
        $("#graphicEto").css("display", "none");
        if (!renderRainMasterConfirm) {
            $("#rain-master-loading").loading("circle1");
            $.post("vendor/server/rain.php", { type: "get_rain_master" }).then((result) => {
                renderRainMasterConfirm = true;
                $("#rain-master-loading").loading(false);
                result = JSON.parse(result);
                const { rain_masters } = result;
                rainMasterData = rain_masters;
                renderRainMasterTable(rain_masters);
            })
        }
    })
    $("#rain-item").on("click", () => {
        $("#graphicAll").css("display", "none");
        $("#graphicRain").css("display", "none");
        $("#graphicEto").css("display", "none");
        if (!renderRainConfirm) {
            $("#rain-loading").loading("circle1");
            $.post("vendor/server/rain.php", { type: "get_rain" }).then((result) => {
                renderRainConfirm = true;
                $("#rain-loading").loading(false);
                result = JSON.parse(result);
                const { rains } = result;
                rainData = rains;
                renderRainTable(rains);
            })
        }
    })
    $("#rain-master-format-btn").on("click", () => rain_master_format())
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        const file = $(this)[0].files[0];
        const { type } = file;
        if (type==='application/vnd.ms-excel') {
            rainTable.destroy();
            $("#rain-loading").loading('circle1');
            var fd = new FormData();
            var file_name = `${new Date().getTime()}Rain.xls`;

            fd.append("rain", file);
            fd.append("file_name", file_name);
            fd.append("type", "upload_rain_file");
            $.ajax({
                url: 'vendor/server/rain.php',
                type: 'POST',
                data: fd,
                success: function () {
                    $.post("vendor/server/rainExcel.php", { fileName: file_name }).then((response) => {
                        $.post("vendor/server/rain.php", { type: "get_rain" }).then((result) => {
                            $("#rain-loading").loading(false);
                            result = JSON.parse(result);
                            const { rains } = result;
                            rainData = rains;
                            renderRainTable(rains);
                            $.toast({
                                heading: 'Success',
                                text: 'Rain Data is saved successfully!',
                                position: 'top-right',
                                stack: false,
                                icon: 'success'
                            });
                        })
                    })
                },
                cache: false,
                contentType: false,
                processData: false
            });
        } else $.toast({
            heading: 'Warning',
            text: 'Please select the xls file!',
            position: 'top-right',
            stack: false,
            icon: 'warning'
        });
    });
})

const rain_master_format = () => {
    rainMasterTable.destroy();
    $("#rain-master-loading").loading("circle1");
    $.post("vendor/server/rain.php", { type: "rain_master_format" }).then(() => {
        $.post("vendor/server/rain.php", { type: "get_rain_master" }).then((result) => {
            renderRainMasterConfirm = true;
            result = JSON.parse(result);
            const { rain_masters } = result;
            rainMasterData = rain_masters;
            renderRainMasterTable(rain_masters);
            $("#rain-master-loading").loading(false);
            $.toast({
                heading: 'Success',
                text: 'Rain Master is saved successfully!',
                position: 'top-right',
                stack: false,
                icon: 'success'
            });
        })
    })
}

const renderRainMasterTable = (rainMasters = []) => {
    let dataSet = [];
    let no = 1;
    for (const ele of rainMasters) {
        const {
            IDCOME, ABS_Terreno, ID_Pluviometro, UBICACION, Pais, Lotes, Finca, Zona,
            ingenioid, PaisStr, FINCA_Pluv, LOTE_Pluv, Codigo_Nuevo, Codigo_Antiguo,
            X, Y, Lon, Lat
        } = ele;
        dataSet = [
            ...dataSet,
            [no++, IDCOME, ABS_Terreno, ID_Pluviometro, UBICACION, Pais, Lotes, Finca, Zona,
            ingenioid, PaisStr, FINCA_Pluv, LOTE_Pluv, Codigo_Nuevo, Codigo_Antiguo,
            X, Y, Lon, Lat]
        ];
    }
    rainMasterTable = $('#rain-master-table').DataTable({
        data: dataSet,
        columns: [
            { title: "No" },
            { title: "IDCOME" },
            { title: "ABS_Terreno" },
            { title: "ID_Pluviometro" },
            { title: "UBICACIÓN" },
            { title: "Pais" },
            { title: "Lotes" },
            { title: "Finca" },
            { title: "Zona" },
            { title: "ingenioid" },
            { title: "País" },
            { title: "FINCA_Pluv" },
            { title: "LOTE_Pluv" },
            { title: "Codigo_Nuevo" },
            { title: "Codigo Antiguo" },
            { title: "X" },
            { title: "Y" },
            { title: "Lon" },
            { title: "Lat" }
        ],
        scrollX: true
    });
    return;
}

const renderRainTable = (rains = []) => {
    let dataSet = [];
    let no = 1;
    for (const ele of rains) {
        const {
            USUARIO, RECIBIDO, FECHA, ANO, MES, REGION, FINCA_LOTE, DE_FINCA, ESTRATO,
            ESTADO, CD_PLUVIOMETRO, CANT_LLUVIA
        } = ele;

        dataSet = [
            ...dataSet,
            [no++, USUARIO, RECIBIDO, FECHA, ANO, MES, REGION, FINCA_LOTE, DE_FINCA, ESTRATO,
            ESTADO, CD_PLUVIOMETRO, CANT_LLUVIA]
        ];
    }
    rainTable = $('#rain-table').DataTable({
        data: dataSet,
        columns: [
            { title: "No" },
            { title: "USUARIO" },
            { title: "RECIBIDO" },
            { title: "FECHA" },
            { title: "AÑO" },
            { title: "MES" },
            { title: "REGION" },
            { title: "FINCA_LOTE" },
            { title: "DE FINCA" },
            { title: "ESTRATO" },
            { title: "ESTADO" },
            { title: "CD PLUVIOMETRO" },
            { title: "CANT LLUVIA" }
        ],
        scrollX: true
    });
    return;
}
