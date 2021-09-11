TweenLite.defaultEase = Expo.easeOut;

// initTimer(`${new Date().getHours()}:${new Date().getMinutes()}`); // other ways --> "0:15" "03:5" "5:2"
// initTimer("00:00"); // other ways --> "0:15" "03:5" "5:2"

var confirm = 1;
var timerEl = document.querySelector('.timer');

function initTimer (t) {
   
    var self = this,
        timerEl = document.querySelector('.timer'),
        minutesGroupEl = timerEl.querySelector('.minutes-group'),
        secondsGroupEl = timerEl.querySelector('.seconds-group'),

        minutesGroup = {
            firstNum: minutesGroupEl.querySelector('.first'),
            secondNum: minutesGroupEl.querySelector('.second')
        },

        secondsGroup = {
            firstNum: secondsGroupEl.querySelector('.first'),
            secondNum: secondsGroupEl.querySelector('.second')
        };

    var time = {
        min: t.split(':')[0],
        sec: t.split(':')[1]
    };

    var timeNumbers;

    function updateTimer() {

        var timestr;
        var date = new Date();

        date.setHours(0);
        date.setMinutes(time.min);
        date.setSeconds(time.sec);

        var newDate = new Date(date.valueOf() + 1000);
        var temp = newDate.toTimeString().split(" ");
        var tempsplit = temp[0].split(':');

        time.min = tempsplit[1];
        time.sec = tempsplit[2];

        timestr = time.min + time.sec;
        timeNumbers = timestr.split('');
        updateTimerDisplay(timeNumbers);

        if(confirm)
            setTimeout(updateTimer, 1000);

    }

    function updateTimerDisplay(arr) {

        animateNum(minutesGroup.firstNum, arr[0]);
        animateNum(minutesGroup.secondNum, arr[1]);
        animateNum(secondsGroup.firstNum, arr[2]);
        animateNum(secondsGroup.secondNum, arr[3]);

    }

    function animateNum (group, arrayValue) {

        TweenMax.killTweensOf(group.querySelector('.number-grp-wrp'));
        TweenMax.to(group.querySelector('.number-grp-wrp'), 1, {
            y: - group.querySelector('.num-' + arrayValue).offsetTop
        });

    }
   
   setTimeout(updateTimer, 1000);

}

let zafra_table, ro_table, ra_table, batches_table;
let zafra_format_request = false, ro_format_request = false, ra_format_request = false, batches_format_request = false;
let product_format_request = false;
let zafra_edit_no, ro_edit_no, ra_edit_no;

const renderZafraTable = (zafras = []) => {
    if (zafras.length!==0) {
        $("#zafra-new-empty-btn").css("display", "none");
    } else {
        $("#zafra-new-empty-btn").css("display", "inline");
    }
    let dataSet = [];
    let no = 1;
    for (const ele of zafras) {
        const { ano_mes, ano, mes, Mes_str, zafra, No } = ele;
        dataSet.push([
            no++,
            ano_mes,
            ano,
            mes,
            Mes_str,
            zafra,
            `
                <button class="btn btn-sm btn-danger" onclick="zafra_remove(${No})">
                    remove
                </button>&nbsp;
                <button onclick='set_zafra_edit_no("${No}", "${ano_mes}", "${ano}", "${mes}", "${Mes_str}", "${zafra}")' class="btn btn-sm btn-primary" data-toggle="modal" data-target="#zafra-edit-modal">
                    edit
                </button>&nbsp;
                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#zafra-add-modal">
                    add
                </button>
            `,
        ]);
    }
    zafra_table = $('#zafra-table').DataTable({
        data: dataSet,
        columns: [
            { title: "No" },
            { title: "ano mes" },
            { title: "ano" },
            { title: "mes" },
            { title: "Mes" },
            { title: "zafra" },
            { title: "Handle" },
        ],
    });
    return;
}

const renderBatchesTable = (batches = []) => {
    let dataSet = [];
    let no = 1;
    for (const ele of batches) {
        const {
            ID_COMP, Finca, NOMBRE, NOMBRE1, Cuadrante, Estrato, Region, Lotes, LONGITUD,
            LATITUD1, REGION_NO, X_Formato_Anterior, Y_Formato_Anterior2, ALTITUD_Utilizar, Aplica,
        } = ele;
        dataSet.push([
            no++, ID_COMP, Finca, NOMBRE, NOMBRE1, Cuadrante, Estrato, Region, Lotes, LONGITUD, LATITUD1,
            REGION_NO, X_Formato_Anterior, Y_Formato_Anterior2, ALTITUD_Utilizar, Aplica,
        ]);
    }
    batches_table = zafra_table = $('#batches-table').DataTable({
        data: dataSet,
        columns: [
            { title: "No" },
            { title: "ID COMP" },
            { title: "Finca" },
            { title: "NOMBRE" },
            { title: "NOMBRE1" },
            { title: "Cuadrante" },
            { title: "Estrato" },
            { title: "Region" },
            { title: "Lotes" },
            { title: "LONGITUD" },
            { title: "LATITUD1" },
            { title: "REGION" },
            { title: "X_Formato_Anterior" },
            { title: "Y_Formato_Anterior2" },
            { title: "ALTITUD_Utilizar" },
            { title: "Aplica" },
        ],
        "scrollX": true,
    });
    return;
}

const renderRaTable = (ras = []) => {
    if (ras.length!==0) {
        $("#ra-new-empty-btn").css("display", "none");
    } else {
        $("#ra-new-empty-btn").css("display", "inline");
    }
    let html = "";
    let no = 1;
    for (const data of ras) {
        const { Fecha, ANO, MES, DIA, codigo_unico, Rso, ano_biciesto, No } = data;
        html += `
            <tr>
                <td> ${no++} </td>
                <td> ${Fecha} </td>
                <td> ${ANO} </td>
                <td> ${MES} </td>
                <td> ${DIA} </td>
                <td> ${codigo_unico} </td>
                <td> ${Rso} </td>
                <td> ${ano_biciesto} </td>
                <td>
                    <button onclick="ra_remove(${No})" class="btn btn-sm btn-danger"> remove </button>
                    <button onclick='set_ra_edit_no("${No}", "${Fecha}", "${ANO}", "${MES}", "${DIA}", "${codigo_unico}", "${Rso}", "${ano_biciesto}")' class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ra-edit-modal">
                        edit
                    </button>
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#ra-add-modal">
                        add
                    </button>
                </td>
            </tr>
        `
    }
    $("#ra-table-body").html(html);
    ra_table = $("#ra-table").DataTable();
    return;
}

const renderRoTable = (ros = []) => {
    if (ros.length!==0) {
        $("#ro-new-empty-btn").css("display", "none");
    } else {
        $("#ro-new-empty-btn").css("display", "inline");
    }
    let html = "";
    let no = 1;
    for (const data of ros) {
        const { Mes, R_0, No } = data;
        html += `
            <tr>
                <td> ${no++} </td>
                <td> ${Mes} </td>
                <td> ${R_0} </td>
                <td>
                    <button onclick="ro_remove(${No})" class="btn btn-sm btn-danger"> remove </button>&nbsp;
                    <button onclick='set_ro_edit_no("${No}", "${Mes}", "${R_0}")' class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ro-edit-modal">
                        edit
                    </button>&nbsp;
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#ro-add-modal">
                        add
                    </button>
                </td>
            </tr>
        `
    }
    $("#ro-table-body").html(html);
    ro_table = $("#ro-table").DataTable();
    return;
}

$(document).ready(() => {
    $("#loading").loading('circle1');
    $.post("vendor/server/app.php").then((result) => {
        result = JSON.parse(result);
        const { zafra_masters, master_ro, master_ra, master_batches } = result;
        renderZafraTable(zafra_masters);
        renderRaTable(master_ra);
        renderRoTable(master_ro);
        renderBatchesTable(master_batches);
        $('#loading').loading(false);
    });
    $("#zafra-add-btn").on("click", () => zafra_add());
    $("#zafra-edit-btn").on("click", () => zafra_edit());
    $("#ro-add-btn").on("click", () => ro_add());
    $("#ro-edit-btn").on("click", () => ro_edit());
    $("#ra-add-btn").on("click", () => ra_add());
    $("#ra-edit-btn").on("click", () => ra_edit());
    $("#zafra-initial-btn").on("click", () => zafraFormat(this));
    $("#ra-initial-btn").on("click", () => raFormat(this));
    $("#ro-initial-btn").on("click", () => roFormat(this));
    $("#batches-initial-btn").on("click", () => batchesFormat());
    $("#product-initial-btn").on("click", () => productFormat());
});

const zafra_add = () => {
    let ano_mes = $("#new_ano_mes").val();
    let ano = $("#new_ano").val();
    let mes = $("#new_mes").val();
    let Mes_str = $("#new_mes_str").val();
    let zafra = $("#new_zafra").val();

    let data = { ano_mes, ano, mes, Mes_str, zafra, type: "zafra_add" }

    if (ano_mes==="" || ano==="" || Mes_str==="" || zafra==="" || mes==="") {
        $("#zafra-submit-btn").click();
        return;
    }
    $("#zafra-loading").loading('circle1');
    zafra_table.destroy();
    $("#zafra-add-close-btn").click();
    $.post("vendor/server/crud.php", data).then((res) => {
        res = JSON.parse(res);
        const { zafra_masters } = res;
        renderZafraTable(zafra_masters);
        $("#zafra-loading").loading(false);
        $.toast({
            heading: 'Success',
            text: 'Zafra is saved successfully!',
            position: 'top-right',
            stack: false,
            icon: 'success'
        });
    })
}

const zafra_remove = (no) => {
    let data = { no, type: "zafra_remove" }
    $("#zafra-loading").loading('circle1');
    zafra_table.destroy();
    $.post("vendor/server/crud.php", data).then((res) => {
        res = JSON.parse(res);
        const { zafra_masters } = res;
        renderZafraTable(zafra_masters);
        $("#zafra-loading").loading(false);
        $.toast({
            heading: 'Success',
            text: 'Zafra is removed successfully!',
            position: 'top-right',
            stack: false,
            icon: 'success'
        });
    })
}

const set_zafra_edit_no = (no, ano_mes, ano, mes, Mes_str, zafra) => {
    zafra_edit_no = no;
    $("#edit_ano_mes").val(ano_mes);
    $("#edit_ano").val(ano);
    $("#edit_mes").val(mes);
    $("#edit_mes_str").val(Mes_str);
    $("#edit_zafra").val(zafra);
}

const set_ro_edit_no = (no, mes, R_0) => {
    ro_edit_no = no;
    $("#ro_edit_mes").val(mes);
    $("#ro_edit_r_0").val(R_0);
}

const set_ra_edit_no = (no, fecha, ano, mes, dia, codigo_unico, rso, ano_biciesto) => {
    ra_edit_no = no;
    $("#ra_edit_fecha").val(fecha);
    $("#ra_edit_ano").val(ano);
    $("#ra_edit_mes").val(mes);
    $("#ra_edit_dia").val(dia);
    $("#ra_edit_codigo_unico").val(codigo_unico);
    $("#ra_edit_Rso").val(rso);
    $("#ra_edit_ano_biciesto").val(ano_biciesto);
}

const zafra_edit = () => {
    let ano_mes = $("#edit_ano_mes").val();
    let ano = $("#edit_ano").val();
    let mes = $("#edit_mes").val();
    let Mes_str = $("#edit_mes_str").val();
    let zafra = $("#edit_zafra").val();

    let data = { ano_mes, ano, mes, Mes_str, zafra, type: "zafra_edit", no: zafra_edit_no }

    if (ano_mes==="" || ano==="" || Mes_str==="" || zafra==="" || mes==="") {
        $("#zafra-edit-submit-btn").click();
        return;
    }
    $("#zafra-loading").loading('circle1');
    zafra_table.destroy();
    $("#zafra-edit-close-btn").click();
    $.post("vendor/server/crud.php", data).then((res) => {
        res = JSON.parse(res);
        const { zafra_masters } = res;
        renderZafraTable(zafra_masters);
        $("#zafra-loading").loading(false);
        $.toast({
            heading: 'Success',
            text: 'Zafra is updated successfully!',
            position: 'top-right',
            stack: false,
            icon: 'success'
        });
    })
}

const ro_add = () => {
    let mes = $("#ro_new_mes").val();
    let R_0 = $("#ro_new_r_0").val();

    let data = { mes, R_0, type: "ro_add" }

    if (R_0==="" || mes==="") {
        $("#ro-add-submit-btn").click();
        return;
    }
    $("#ro-loading").loading('circle1');
    ro_table.destroy();
    $("#ro-add-close-btn").click();
    $.post("vendor/server/crud.php", data).then((res) => {
        res = JSON.parse(res);
        const { master_ro } = res;
        renderRoTable(master_ro);
        $("#ro-loading").loading(false);
        $.toast({
            heading: 'Success',
            text: 'MasterRO is saved successfully!',
            position: 'top-right',
            stack: false,
            icon: 'success'
        });
    })
}

const ro_edit = () => {
    let mes = $("#ro_edit_mes").val();
    let R_0 = $("#ro_edit_r_0").val();

    let data = { mes, R_0, type: "ro_edit", no: ro_edit_no }

    if (R_0==="" || mes==="") {
        $("#ro-edit-submit-btn").click();
        return;
    }
    $("#ro-loading").loading('circle1');
    ro_table.destroy();
    $("#ro-edit-close-btn").click();
    $.post("vendor/server/crud.php", data).then((res) => {
        res = JSON.parse(res);
        const { master_ro } = res;
        renderRoTable(master_ro);
        $("#ro-loading").loading(false);
        $.toast({
            heading: 'Success',
            text: 'MasterRO is updated successfully!',
            position: 'top-right',
            stack: false,
            icon: 'success'
        });
    })
}

const ro_remove = (no) => {
    let data = { no, type: "ro_remove" }
    $("#ro-loading").loading('circle1');
    ro_table.destroy();
    $.post("vendor/server/crud.php", data).then((res) => {
        res = JSON.parse(res);
        const { master_ro } = res;
        renderRoTable(master_ro);
        $("#ro-loading").loading(false);
        $.toast({
            heading: 'Success',
            text: 'MasterRO is removed successfully!',
            position: 'top-right',
            stack: false,
            icon: 'success'
        });
    })
}

const ra_add = () => {
    let fecha = $("#ra_new_fecha").val();
    let ano = $("#ra_new_ano").val();
    let mes = $("#ra_new_mes").val();
    let dia = $("#ra_new_dia").val();
    let codigo_unico = $("#ra_new_codigo_unico").val();
    let rso = $("#ra_new_Rso").val();
    let ano_biciesto = $("#ra_new_ano_biciesto").val();

    let data = { fecha, ano, mes, dia, codigo_unico, rso, ano_biciesto, type: "ra_add" }

    if (fecha==="" || ano==="" || mes==="" || dia==="" || codigo_unico==="" || rso==="" || ano_biciesto==="") {
        $("#ra-add-submit-btn").click();
        return;
    }
    $("#ra-loading").loading('circle1');
    $("#ra-add-close-btn").click();
    ra_table.destroy();
    $.post("vendor/server/crud.php", data).then((res) => {
        res = JSON.parse(res);
        const { master_ra } = res;
        renderRaTable(master_ra);
        $("#ra-loading").loading(false);
        $.toast({
            heading: 'Success',
            text: 'MasterRA is saved successfully!',
            position: 'top-right',
            stack: false,
            icon: 'success'
        });
    })
}

const ra_edit = () => {
    let fecha = $("#ra_edit_fecha").val();
    let ano = $("#ra_edit_ano").val();
    let mes = $("#ra_edit_mes").val();
    let dia = $("#ra_edit_dia").val();
    let codigo_unico = $("#ra_edit_codigo_unico").val();
    let rso = $("#ra_edit_Rso").val();
    let ano_biciesto = $("#ra_edit_ano_biciesto").val();

    let data = { fecha, ano, mes, dia, codigo_unico, rso, ano_biciesto, type: "ra_edit", no: ra_edit_no }

    if (fecha==="" || ano==="" || mes==="" || dia==="" || codigo_unico==="" || rso==="" || ano_biciesto==="") {
        $("#ra-edit-submit-btn").click();
        return;
    }
    $("#ra-loading").loading('circle1');
    $("#ra-edit-close-btn").click();
    $.post("vendor/server/crud.php", data).then((res) => {
        ra_table.destroy();
        res = JSON.parse(res);
        const { master_ra } = res;
        renderRaTable(master_ra);
        $("#ra-loading").loading(false);
        $.toast({
            heading: 'Success',
            text: 'MasterRA is updated successfully!',
            position: 'top-right',
            stack: false,
            icon: 'success'
        });
    })
}

const ra_remove = (no) => {
    let data = { no, type: "ra_remove" }
    $("#ra-loading").loading('circle1');

    ra_table.destroy();
    $.post("vendor/server/crud.php", data).then((res) => {
        res = JSON.parse(res);
        const { master_ra } = res;
        renderRaTable(master_ra);
        $("#ra-loading").loading(false);
        $.toast({
            heading: 'Success',
            text: 'MasterRA is removed successfully!',
            position: 'top-right',
            stack: false,
            icon: 'success'
        });
    })
}

const zafraFormat = () => {
    $("#loading").loading('circle1');
    if (!zafra_format_request) {
        zafra_format_request = true;
        zafra_table.destroy();
        $.post("vendor/server/format.php", {type: "zafra"}).then(() => {
            $.post("vendor/server/format.php", {type: "get_zafra"}).then((result)=>{
                result = JSON.parse(result);
                const { zafra_masters } = result;
                renderZafraTable(zafra_masters);
                $.toast({
                    heading: 'Success',
                    text: 'Zafra Database is updated successfully!',
                    position: 'top-right',
                    stack: false,
                    icon: 'success'
                });
                zafra_format_request = false;
                $("#loading").loading(false);
            })
        })
    }
}

const raFormat = () => {
    $("#loading").loading('circle1');
    if (!ra_format_request) {
        ra_format_request = true;
        ra_table.destroy();
        $.post("vendor/server/format.php", {type: "ra"}).then(() => {
            $.post("vendor/server/format.php", {type: "get_ra"}).then((result)=>{
                result = JSON.parse(result);
                const { master_ra } = result;
                renderRaTable(master_ra);
                $.toast({
                    heading: 'Success',
                    text: 'MasterRA Database is updated successfully!',
                    position: 'top-right',
                    stack: false,
                    icon: 'success'
                });
                $("#loading").loading(false);
            })
        })
    }
}

const roFormat = () => {
    $("#loading").loading('circle1');
    if (!ro_format_request) {
        ro_format_request = true;
        ro_table.destroy();
        $.post("vendor/server/format.php", {type: "ro"}).then((result) => {
            result = JSON.parse(result);
            const { master_ro } = result;
            renderRoTable(master_ro);
            $.toast({
                heading: 'Success',
                text: 'MasterRO Database is updated successfully!',
                position: 'top-right',
                stack: false,
                icon: 'success'
            });
            $("#loading").loading(false);
        });
    }
}

const batchesFormat = () => {
    $("#loading").loading('circle1');
    if (!batches_format_request) {
        batches_format_request = true;
        batches_table.destroy();
        $.post("vendor/server/format.php", { type: "batches" }).then((result) => {
            result = JSON.parse(result);
            const { master_batches } = result;
            renderBatchesTable(master_batches);
            $.toast({
                heading: 'Success',
                text: 'MasterBatches Database is updated successfully!',
                position: 'top-right',
                stack: false,
                icon: 'success'
            });
            $("#loading").loading(false);
        })
    }
}

const productFormat = () => {
    $("#loading").loading('circle1');
    if (!product_format_request) {
        product_format_request = true;
        $.post("vendor/server/format_productivity.php", { type: "productivity_report_format" }).then((result) => {
            $.toast({
                heading: 'Success',
                text: 'Product Report Database is updated successfully!',
                position: 'top-right',
                stack: false,
                icon: 'success'
            });
            $("#loading").loading(false);
        })
    }
}
