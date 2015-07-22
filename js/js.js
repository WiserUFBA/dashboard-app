/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    $("#range_6").ionRangeSlider({
        min: 16,
        max: 31,
        type: "single",
        step: 1,
        postfix: "°",
        prettify_enabled: false,
	grid: true,
    	grid_snap: true,
	onFinish: function (data) {
        	console.log("Air released val = " + $("#range_6").val());
		if(air_status == true &&  $("#range_6").val() != last_temp) 
			ajax_air();
    	}
    });

    $('[data-toggle="tooltip"]').tooltip();

    $("[name='my-checkbox-air']").bootstrapSwitch({onText: "Turn OFF", offText: "Turn ON"});

    $("[name='my-checkbox-blinds']").bootstrapSwitch({onText: "Turn OFF", offText: "Turn ON"});

    $("[name='my-checkbox-air']").on('switchChange.bootstrapSwitch', function (event, state) {
        console.log(this); // DOM element
        console.log(event); // jQuery event
        console.log(state); // true | false
        $("#alert-info-lamp").slideToggle();
        if ($("#air-ico").css("color") == "rgb(39, 150, 244)") {
            $("#air-ico").css("color", "rgb(0, 0, 0)");
        } else {
            $("#air-ico").css("color", "rgb(39, 150, 244)");
        }
    });

    var temperature = $("#value-temperature");

    var ajax_temperature = function () {
        $.ajax({
            type: "GET",
            url: "http://service-cache.wisergroup.tk/sensor/temperature",
            contentType: "application/x-www-form-urlencoded",
            crossDomain: true,
            success: function (response) {
                console.log(response.Temperature.degree);
                temperature.html(response.Temperature.degree + "<sup style='font-size: 20px'>°</sup>");

            },
            error: function (error) {

                // Log any error.
                temperature.html("--" + "<sup style='font-size: 20px'>°</sup>");
                console.log("ERROR:", error);

            },
            complete: function () {


            },
            timeout: 5000
        });
    };

    window.setInterval(ajax_temperature, 5000);

    var humidity = $("#value-humidity");

    var ajax_humidity = function () {
        $.ajax({
            type: "GET",
            url: "http://service-cache.wisergroup.tk/sensor/humidity",
            contentType: "application/x-www-form-urlencoded",
            crossDomain: true,
            success: function (response) {
                console.log(response.Humidity.percent);
                humidity.html(response.Humidity.percent + "<sup style='font-size: 20px'>%</sup>");

            },
            error: function (error) {

                // Log any error.
                humidity.html("--" + "<sup style='font-size: 20px'>%</sup>");
                console.log("ERROR:", error);

            },
            complete: function () {


            },
            timeout: 5700
        });
    };

    window.setInterval(ajax_humidity, 5000);

    var update_camera = function () {
	//var random = Math.floor(Math.random() * Math.pow(2, 31));
	$("#camera-image").attr("src", "http://cam1.wisergroup.tk/camera?i=" + Math.random());
        //$("#camera-image").attr("src", "http://camera.wisergroup.tk/devices/actuator/camera");
    };

    window.setInterval(update_camera, 1500);

    $("#update-now-temperature").click(function () {
        ajax_temperature();
    });

    $("#update-now-humidity").click(function () {
        ajax_humidity();
    });

    ///////////////////////////// CAMERA

    $("#camera-position-left").click(function () {
        $("#camera-image").attr("src", "http://camera.wisergroup.tk/devices/actuator/camera?move=left");
    });

    $("#camera-position-up").click(function () {
        $("#camera-image").attr("src", "http://camera.wisergroup.tk/devices/actuator/camera?move=up");
    });

    $("#camera-position-down").click(function () {
        $("#camera-image").attr("src", "http://camera.wisergroup.tk/devices/actuator/camera?move=down");
    });

    $("#camera-position-right").click(function () {
        $("#camera-image").attr("src", "http://camera.wisergroup.tk/devices/actuator/camera?move=right");
    });

    //////////////////// LAMP

    var lamp_status;
    var lamp_html = $("#value-lamp");
    var switch_lamp = $("[name='my-checkbox-lamp']");

    switch_lamp.bootstrapSwitch({onText: "Turn OFF", offText: "Turn ON"});

    // OK
    var ajax_lamp = function () {
        $.ajax({
            type: "POST",
            url: "http://service-rasp1.wisergroup.tk/cxf/lamp/devices/actuator/lamp",
            crossDomain: true,
            data: {status: lamp_status},
            success: function (response) {
                console.log(response);
                if (response.Lamp.status == true) {
                    lamp_html.html("ON");
                } else {
                    lamp_html.html("OFF");
                }
            },
            error: function (error) {
                // Log any error.
                //temperature.html("--" + "<sup style='font-size: 20px'>°</sup>");
                console.log("ERROR:", error);
            },
            complete: function () {
               $.ajax({
                    type: "GET",
                    url: "http://service-cache.wisergroup.tk/update/actuators",
                    contentType: "application/x-www-form-urlencoded",
                    crossDomain: true,
                    success: function (response) {
                        console.log("UPDATED!");
                    },
                    error: function (error) {
                        console.log("ERROR:", error);
                    },
                    complete: function () {},
                    timeout: 5000
                }); 
            },
            timeout: 5000
        });
    };

    var ajax_lamp_get = function () {
        $.ajax({
            type: "GET",
            url: "http://service-cache.wisergroup.tk/actuator/lamp",
            contentType: "application/x-www-form-urlencoded",
            crossDomain: true,
            success: function (response) {
                console.log(response.Lamp.status);
                if (response.Lamp.status == true) {
                    lamp_status = true; // Modificando o estado atual
                    lamp_html.html("ON"); // Modificando o texto de cima
                    switch_lamp.bootstrapSwitch('state', true, true); // Modificando o estado do switch
                    $("#lamp-ico").css("color", "rgb(255, 233, 2)"); // Modificando o icone
                } else {
                    lamp_status = false;
                    lamp_html.html("OFF");
                    switch_lamp.bootstrapSwitch('state', false, true);
                    $("#lamp-ico").css("color", "rgb(0, 0, 0)");
                }
            },
            error: function (error) {

                // Log any error.
                lamp_html.html("--");
                console.log("ERROR:", error);

            },
            complete: function () {


            },
            timeout: 5700
        });
    };

    window.setInterval(ajax_lamp_get, 7000);

    // OK
    switch_lamp.on('switchChange.bootstrapSwitch', function (event, state) {
        //console.log(this); // DOM element
        //console.log(event); // jQuery event
        console.log(state); // true | false
        if (state == true) {
            lamp_status = true;
            $("#lamp-ico").css("color", "rgb(255, 233, 2)");
            ajax_lamp();
        } else if (state == false) {
            lamp_status = false;
            $("#lamp-ico").css("color", "rgb(0, 0, 0)");
            ajax_lamp();
        }
    });

//    var request = new XMLHttpRequest();
//    var params = "";
//    var url = "http://services.wisergroup.tk/cxf/temp/devices/sensor/temperature";
//    request.open('GET', url, true);
//    request.onreadystatechange = function () {
//        if (request.readyState == 4)
//            console.log(request.toString());
//    };
//    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//    request.send(params);

var air_status = false;
    var air_html = $("#value-air");
    var switch_air = $("[name='my-checkbox-air']");

    var ajax_air_get = function () {
        $.ajax({
            type: "GET",
            url: "http://service-cache.wisergroup.tk/actuator/air",
            contentType: "application/x-www-form-urlencoded",
            crossDomain: true,
            success: function (response) {
                console.log(response.AirConditioner.status);
                if (response.AirConditioner.status == true) {
                    air_status = true; // Modificando o estado atual
                    air_html.html("ON"); // Modificando o texto de cima
                    switch_air.bootstrapSwitch('state', true, true); // Modificando o estado do switch
                    $("#air-ico").css("color", "rgb(39, 150, 244)"); // Modificando o icone
                } else {
                    air_status = false;
                    air_html.html("OFF");
                    switch_air.bootstrapSwitch('state', false, true);
                    $("#air-ico").css("color", "rgb(0, 0, 0)");
                }
            },
            error: function (error) {
                // Log any error.
                air_html.html("--");
                console.log("ERROR:", error);
            },
            complete: function () {},
            timeout: 5700
        });
    };

    window.setInterval(ajax_air_get, 7000);

    var last_temp = 0;

    var ajax_air = function () {
        $.ajax({
            type: "POST",
            url: "http://service-rasp1.wisergroup.tk/cxf/air/devices/actuator/air",
            crossDomain: true,
            data: {status: air_status, value: $("#range_6").val()},
            success: function (response) {
                console.log(response.AirConditioner.status);
		last_temp =  $("#range_6").val();
                if (response.AirConditioner.status == true) {
                    air_status = true; // Modificando o estado atual
                    air_html.html("ON"); // Modificando o texto de cima
                    switch_air.bootstrapSwitch('state', true, true); // Modificando o estado do switch
                    $("#air-ico").css("color", "rgb(39, 150, 244)"); // Modificando o icone
                } else {
                    air_status = false;
                    air_html.html("OFF");
                    switch_air.bootstrapSwitch('state', false, true);
                    $("#air-ico").css("color", "rgb(0, 0, 0)");
                }
            },
            error: function (error) {
                // Log any error.
                air_html.html("--");
                console.log("ERROR:", error);
            },
            complete: function () {},
            timeout: 5000
        });
    };

    switch_air.on('switchChange.bootstrapSwitch', function (event, state) {
        //console.log(this); // DOM element
        //console.log(event); // jQuery event
        console.log(state); // true | false
        if (state == true) {
            air_status = true;
            $("#air-ico").css("color", "rgb(39, 150, 244)");
            ajax_air();
        } else if (state == false) {
            air_status = false;
            $("#air-ico").css("color", "rgb(0, 0, 0)");
            ajax_air();
        }
    });
/*
   $('#line-chart').slider({
	formatter: function(value) {
	     console.log(value);	
	     return value;
	}
   });
*/
});

