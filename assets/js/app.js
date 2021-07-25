TweenLite.defaultEase = Expo.easeOut;

initTimer("00:00"); // other ways --> "0:15" "03:5" "5:2"

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

function countdownFinished() {
    setTimeout(function () {
        confirm = 0;
        TweenMax.to(timerEl, 1, { opacity: 0.2 });
    }, 1000);
}

$("#stop-btn").on("click", () => {
    clearInterval(download);
    countdownFinished();
});

$("#restart-btn").on("click", () => {
    window.location.reload();
});

let frequency = 0;

const downloadRequest = () => {
    let today = new Date();
    today.setMinutes(today.getMinutes() - 15);
    let next = new Date();
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
        agrupar: "Hora",
        estaciones: "67,3,37,36,47,33,14,1,17,25,38,31,21,15,40,24,39,22,5,6,11,13,29,30,4,20,9,23,26,10,34,28,8,19,45,46,27,",
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
            window.location.href = 'https://redmet.icc.org.gt/tmpxls/' + data.filename;
            setTimeout(() => {
                $.post("control.php", data).then(()=>{});
            }, 60000);
            setTimeout(() => {
                frequency++;
                $(".frequency-pan").html(frequency);
            }, 1000);
        },
        error: function(xhr, status, error) {
            console.log(false);
        }
    });
}

const download = setInterval(downloadRequest, 900000);
