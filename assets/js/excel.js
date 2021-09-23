const downloadRequest = (type = "") => {
    $("#loading").loading('circle1');
    let today = new Date();
    let next = new Date();
    if (type==="initial") {
        today = new Date("2021-01-01");
    } else {
        today.setMinutes(today.getMinutes() - 30);
        next.setMinutes(today.getMinutes() - 15);
    }
    let hour = today.getHours();
    let minute = today.getMinutes();

    today.setDate(today.getDate());
    txFechaIni = (today.getDate() >= 10 ? today.getDate() : ("0" + today.getDate())) + "/" +
        (((today.getMonth()+1)<10) ? ("0"+(today.getMonth()+1)) : (today.getMonth()+1)) + "/" +
        today.getFullYear() + " " +
        ((hour < 10) ? ("0" + hour) : hour) + ":" +
        ((minute < 10) ? ("0" + minute) : minute);
    txFechaFin = (next.getDate() >= 10 ? next.getDate() : ("0" + next.getDate())) + "/" +
        (((next.getMonth()+1)<10) ? ("0"+(next.getMonth()+1)) : (next.getMonth()+1)) + "/" +
        next.getFullYear() + " " +
        ((next.getHours() < 10) ? ("0" + next.getHours()) : next.getHours()) + ":" +
        ((next.getMinutes() < 10) ? ("0" + next.getMinutes()) : next.getMinutes());
    let params = {
        type: "excel",
        txFechaIni,
        txFechaFin,
        agrupar: (type==="initial") ? "Dia" : "Hora",
        estaciones: "4,26,20,19,33,21,13,31,1,5,8,24,17,23,6,",
        variables: "AVG(temperatura) AS temperatura,MIN(temperatura) AS temperatura_minima,MAX(temperatura) AS temperatura_maxima,SUM(radiacion) AS radiacion,AVG(radiacion) AS radiacion_promedio,AVG(humedad_relativa) AS humedad_relativa,MIN(humedad_relativa) AS humedad_relativa_minima,MAX(humedad_relativa) AS humedad_relativa_maxima,SUM(precipitacion) AS precipitacion,AVG(velocidad_viento) AS velocidad_viento,MIN(velocidad_viento) AS velocidad_viento_minima,MAX(velocidad_viento) AS velocidad_viento_maxima,AVG(mojadura) AS mojadura,AVG(presion_atmosferica) AS presion_atmosferica,MIN(presion_atmosferica) AS presion_atmosferica_minima,MAX(presion_atmosferica) AS presion_atmosferica_maxima,AVG(direccion_viento) AS direccion_viento,",
        raw: "temperatura,radiacion,humedad_relativa,precipitacion,velocidad_viento,mojadura,presion_atmosferica,direccion_viento,",
    }
    
    $.ajax({
        url: "https://redmet.icc.org.gt/redmet/comparativas",
        type: "POST",
        xhrFields: {
            withCredentials: true
        },
        data: params,
        dataType: 'json',
        success: function(data) {
            const href = 'https://redmet.icc.org.gt/tmpxls/' + data.filename;
            window.location.href = href;
            getFileObject(href, function (fileObject) {
                var fd = new FormData();
                fd.append("icc_excel", fileObject);
                fd.append("file_name", data.filename);
                $.ajax({
                    url: 'control.php',
                    type: 'POST',
                    data: fd,
                    success:function () {
                        $.post("vendor/server/icc_excel.php", { fileName: data.filename }).then(()=>{
                            $("#loading").loading(false);
                            $.toast({
                                heading: 'Success',
                                text: 'ICC excel is updated successfully!',
                                position: 'top-right',
                                stack: false,
                                icon: 'success'
                            });
                        })
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            });
        },
        error: function(xhr, status, error) {
            console.log(false);
        }
    });
}

var getFileBlob = function (url, cb) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url);
    xhr.responseType = "blob";
    xhr.addEventListener('load', function() {
        cb(xhr.response);
    });
    xhr.send();
};

var blobToFile = function (blob, name) {
    blob.lastModifiedDate = new Date();
    blob.name = name;
    return blob;
};

var getFileObject = function(filePathOrUrl, cb) {
   getFileBlob(filePathOrUrl, function (blob) {
      cb(blobToFile(blob, 'test.xls'));
   });
};

$(document).ready(() => {
    $("#download-btn").on("click", () => downloadRequest("initial"));
    $("#stop-btn").on("click", () => {
        clearInterval(download);
    });
})

const download = setInterval(downloadRequest, 900000);
