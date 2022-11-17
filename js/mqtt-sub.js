let myInterval;

$(document).ready(function () {                     // get sensor data once for test
    $(".btn-once").click(function () {
        var ajaxurl = "mqtt-sub.php",
            data = { action: "once" };

        $.post(ajaxurl, data, function (responseonce) {
            str = JSON.parse(responseonce);
            console.log(str);
            $('.sensid-1').html(str.Humidity + '<span> %</span>');    // I can call value by json.key
            $('.sensid-2').html(str.TempC + '<span> °C</span>');      // or here call value by it posion in json object str
            $('.sensid-3').html(str.IndexC + '<span> °C</span>');
            $('.sensid-4').html(str.TempF + '<span> °F</span>');
            $('.sensid-5').html(str.IndexF + '<span> °F</span>');
            $('.sensid-6').html(str.LDR + '<span> %lux</span>');
        });

        if (myInterval) {
            stopInterval();
        }
    });

    $(document).on("click", ".btn-repeat", function () {        // get sensor data repeatly
        myInterval = setInterval(RepeatMqttReq, 6000);
    });
});

function RepeatMqttReq() {
    var ajaxurl = "mqtt-sub.php",
        data = { action: "repeat" };

    $.post(ajaxurl, data, function (responsed) {
        stred = JSON.parse(responsed);

        $('.sensid-1').html(stred.Humidity + '<span> %</span>');    // I can call value by json.key
        $('.sensid-2').html(stred.TempC + '<span> °C</span>');      // or here call value by it posion in json object str
        $('.sensid-3').html(stred.IndexC + '<span> °C</span>');
        $('.sensid-4').html(stred.TempF + '<span> °F</span>');
        $('.sensid-5').html(stred.IndexF + '<span> °F</span>');
        $('.sensid-6').html(stred.LDR + '<span> %lux</span>');

    });
}

function stopInterval() {
    clearInterval(myInterval);
    // release our intervalID from the variable
    myInterval = null;
}
