// Widgets.js
// ====================================================================
// This file should not be included in your project.
// This is just a sample how to initialize plugins or components.
//
$(document).ready(function() {


    // SITE STATISTICS
    // =================================================================
    // Require Flot Charts
    // -----------------------------------------------------------------
    // http://www.flotcharts.org/
    // =================================================================
    var visitors = [
        ['Jan', 6],
        ['Feb', 10],
        ['March', 8],
        ['April', 14],
        ['May', 8],
        ['June', 10],
        ['July', 8],
        ['Aug', 12],
        ['Sept', 10],
        ['Oct', 10],
        ['Nov', 8],
        ['Dec', 10]
    ];

    var plot = $.plot("#demo-site-statistics", [{
        label: 'New Visitors',
        data: visitors,
    }], {
        series: {
            lines: {
                show: true,
                lineWidth: 2,
                fill: true
            },
            points: {
                show: true,
                lineWidth: 2,
                fill: true,
                fillColor: "#ffffff",
                symbol: "circle",
                radius: 5
            },
            shadowSize: 0 // Drawing is faster without shadows
        },
        colors: ['#666666;'],
        tooltip: true,
        tooltipOpts: {
            defaultTheme: false
        },
        legend: {
            show: true,
            position: 'nw',
            margin: [15]

        },
        grid: {
            hoverable: true,
            clickable: true,
            tickColor: "#eeeeee",
            borderWidth: 1,
            borderColor: "#eeeeee"
        },
        xaxis: {
            mode: "categories"
        }
    });

    // ORDER STATISTICS
    // =================================================================
    // Require Flot Charts
    // -----------------------------------------------------------------
    // http://www.flotcharts.org/
    // =================================================================
    var orders = [
        ['Jan', 6],
        ['Feb', 8],
        ['March', 12],
        ['April', 10],
        ['May', 6],
        ['June', 8],
        ['July', 12],
        ['Aug', 10],
        ['Sept', 8],
        ['Oct', 10],
        ['Nov', 8],
        ['Dec', 10]
    ];

    var plot = $.plot("#demo-order-statistics", [{
        label: 'New Orders',
        data: orders,
    }], {
        series: {
            lines: {
                show: true,
                lineWidth: 2,
                fill: true
            },
            points: {
                show: true,
                lineWidth: 2,
                fill: true,
                fillColor: "#ffffff",
                symbol: "circle",
                radius: 5
            },
            shadowSize: 0 // Drawing is faster without shadows
        },
        colors: ['#E9422E;'],
        tooltip: true,
        tooltipOpts: {
            defaultTheme: false
        },
        legend: {
            show: true,
            position: 'nw',
            margin: [15]

        },
        grid: {
            hoverable: true,
            clickable: true,
            tickColor: "#eeeeee",
            borderWidth: 1,
            borderColor: "#eeeeee"
        },
        xaxis: {
            mode: "categories"
        }
    });


    // SALES STATISTICS
    // =================================================================
    // Require Flot Charts
    // -----------------------------------------------------------------
    // http://www.flotcharts.org/
    // =================================================================
    var sales = [
        ['Jan', 6],
        ['Feb', 12],
        ['March', 10],
        ['April', 8],
        ['May', 12],
        ['June', 10],
        ['July', 8],
        ['Aug', 12],
        ['Sept', 6],
        ['Oct', 8],
        ['Nov', 6],
        ['Dec', 10]
    ];

    var plot = $.plot("#demo-sales-statistics", [{
        label: 'New Orders',
        data: sales,
    }], {
        series: {
            lines: {
                show: true,
                lineWidth: 2,
                fill: true
            },
            points: {
                show: true,
                lineWidth: 2,
                fill: true,
                fillColor: "#ffffff",
                symbol: "circle",
                radius: 5
            },
            shadowSize: 0 // Drawing is faster without shadows
        },
        colors: ['#29b7d3;'],
        tooltip: true,
        tooltipOpts: {
            defaultTheme: false
        },
        legend: {
            show: true,
            position: 'nw',
            margin: [15]

        },
        grid: {
            hoverable: true,
            clickable: true,
            tickColor: "#eeeeee",
            borderWidth: 1,
            borderColor: "#eeeeee"
        },
        xaxis: {
            mode: "categories"
        }
    });

    // FEEDBACK STATISTICS
    // =================================================================
    // Require Flot Charts
    // -----------------------------------------------------------------
    // http://www.flotcharts.org/
    // =================================================================
    var feedback = [
        ['Jan', 12],
        ['Feb', 8],
        ['March', 6],
        ['April', 8],
        ['May', 4],
        ['June', 6],
        ['July', 8],
        ['Aug', 12],
        ['Sept', 6],
        ['Oct', 8],
        ['Nov', 6],
        ['Dec', 10]
    ];

    var plot = $.plot("#demo-feedback-statistics", [{
        label: 'Customer Feedback',
        data: feedback,
    }], {
        series: {
            lines: {
                show: true,
                lineWidth: 2,
                fill: false
            },
            points: {
                show: true,
                lineWidth: 2,
                fill: true,
                fillColor: "#ffffff",
                symbol: "circle",
                radius: 5
            },
            shadowSize: 0 // Drawing is faster without shadows
        },
        colors: ['#fac552'],
        tooltip: true,
        tooltipOpts: {
            defaultTheme: false
        },
        legend: {
            show: true,
            position: 'nw',
            margin: [15]

        },
        grid: {
            hoverable: true,
            clickable: true,
            tickColor: "#eeeeee",
            borderWidth: 1,
            borderColor: "#eeeeee"
        },
        xaxis: {
            mode: "categories"
        }
    });

    // EARNING STATISTICS
    // =================================================================
    // Require Flot Charts
    // -----------------------------------------------------------------
    // http://www.flotcharts.org/
    // =================================================================
    var earning = [
        ['Jan', 5],
        ['Feb', 8],
        ['March', 6],
        ['April', 9],
        ['May', 7],
        ['June', 4],
        ['July', 8],
        ['Aug', 12],
        ['Sept', 6],
        ['Oct', 8],
        ['Nov', 6],
        ['Dec', 10]
    ];

    var plot = $.plot("#demo-earning-statistics", [{
        label: 'Net Earning',
        data: earning,
    }], {
        series: {
            lines: {
                show: true,
                lineWidth: 2,
                fill: false
            },
            points: {
                show: true,
                lineWidth: 2,
                fill: true,
                fillColor: "#ffffff",
                symbol: "circle",
                radius: 5
            },
            shadowSize: 0 // Drawing is faster without shadows
        },
        colors: ['#248aaf'],
        tooltip: true,
        tooltipOpts: {
            defaultTheme: false
        },
        legend: {
            show: true,
            position: 'nw',
            margin: [15]

        },
        grid: {
            hoverable: true,
            clickable: true,
            tickColor: "#eeeeee",
            borderWidth: 1,
            borderColor: "#eeeeee"
        },
        xaxis: {
            mode: "categories"
        }
    });


    // SERVER PERFORMANCE
    // =================================================================
    // Require Flot Charts
    // -----------------------------------------------------------------
    // http://www.flotcharts.org/
    // =================================================================
    var performance = [
        ['Mon', 4],
        ['Tue', 8],
        ['Wed', 10],
        ['Thu', 8],
        ['Fri', 9],
        ['Sat', 7]
    ];

    var plot = $.plot("#demo-performance-statistics", [{
        label: 'Server Performance',
        data: performance,
    }], {
        series: {
            lines: {
                show: true,
                lineWidth: 2,
                fill: false
            },
            points: {
                show: true,
                lineWidth: 2,
                fill: true,
                fillColor: "#ffffff",
                symbol: "circle",
                radius: 5
            },
            shadowSize: 0 // Drawing is faster without shadows
        },
        colors: ['#3cbc8d'],
        tooltip: true,
        tooltipOpts: {
            defaultTheme: false
        },
        legend: {
            show: true,
            position: 'nw',
            margin: [15]

        },
        grid: {
            hoverable: true,
            clickable: true,
            tickColor: "#eeeeee",
            borderWidth: 1,
            borderColor: "#eeeeee"
        },
        xaxis: {
            mode: "categories"
        }
    });

    // EASY PIE CHART
    // =================================================================
    // Require easyPieChart
    // -----------------------------------------------------------------
    // http://rendro.github.io/easy-pie-chart/
    // =================================================================

    $('#demo-pie-2').easyPieChart({
        barColor: '#F3565D',
        scaleColor: false,
        trackColor: '#eee',
        lineCap: 'round',
        size: '70',
        lineWidth: 8,
        onStep: function(from, to, percent) {
            $(this.el).find('.pie-value').text(Math.round(percent) + '%');
        }
    });

    $('#demo-pie-3').easyPieChart({
        barColor: '#F3565D',
        scaleColor: false,
        trackColor: '#eee',
        lineCap: 'round',
        size: '70',
        lineWidth: 8,
        onStep: function(from, to, percent) {
            $(this.el).find('.pie-value').text(Math.round(percent) + '%');
        }
    });

    $('#demo-pie-4').easyPieChart({
        barColor: '#F3565D',
        scaleColor: false,
        trackColor: '#eee',
        lineCap: 'round',
        size: '70',
        lineWidth: 8,
        onStep: function(from, to, percent) {
            $(this.el).find('.pie-value').text(Math.round(percent) + '%');
        }
    });




    // GMAPS
    // =================================================================
    // Require gmaps
    // -----------------------------------------------------------------
    // http://hpneo.github.io/gmaps/
    // =================================================================

    var overlayMap = new GMaps({
        div: '#demo-overlays-map',
        lat: 37.336095,
        lng: -121.8885431
    });
    overlayMap.drawOverlay({
        lat: overlayMap.getCenter().lat(),
        lng: overlayMap.getCenter().lng(),
        content: '<div class="popover top" style="display:block; width:200px"><div class="arrow"></div><div class="popover-content"><strong>You are here</strong><p>86 Washington Sq, San Jose, CA 95192, United States</p></div></div>',
        verticalAlign: 'top',
        horizontalAlign: 'center'
    });




    // MEDIUM WEATHER WIDGET
    // =================================================================
    // Require sckycons
    // -----------------------------------------------------------------
    // http://darkskyapp.github.io/skycons/
    // =================================================================

    // on Android, a nasty hack is needed: {"resizeClear": true}


    skyconsOptions = {
        "color": "#fff",
        "resizeClear": true
    }




    // LARGE WEATHER WIDGET
    // =================================================================
    // Require sckycons
    // -----------------------------------------------------------------
    // http://darkskyapp.github.io/skycons/
    // =================================================================

    /* Main Icon */

    var skycons = new Skycons(skyconsOptions);
    skycons.add("demo-weather-lg-icon-1", Skycons.RAIN);
    skycons.play();

    var skycons2 = new Skycons(skyconsOptions);
    skycons.add("demo-weather-lg-icon-2", Skycons.PARTLY_CLOUDY_DAY);
    skycons.play();




    // SMALL WEATHER WIDGET
    // =================================================================
    // Require sckycons
    // -----------------------------------------------------------------
    // http://darkskyapp.github.io/skycons/
    // =================================================================

    var skycons = new Skycons(skyconsOptions);
    skycons.add("demo-weather-sm-icon", Skycons.RAIN);
    skycons.play();




    // EXTRA SMALL WEATHER WIDGET
    // =================================================================
    // Require sckycons
    // -----------------------------------------------------------------
    // http://darkskyapp.github.io/skycons/
    // =================================================================

    skycons = new Skycons(skyconsOptions);
    skycons.add("demo-weather-xs-icon-1", Skycons.CLEAR_DAY);
    skycons.play();




    // EXTRA SMALL WEATHER WIDGET
    // =================================================================
    // Require sckycons
    // -----------------------------------------------------------------
    // http://darkskyapp.github.io/skycons/
    // =================================================================

    skycons = new Skycons({
        "color": "#00b19d",
        "resizeClear": true
    });

    skycons.add("demo-weather-xs-icon-2", Skycons.PARTLY_CLOUDY_DAY);
    skycons.play();




    // JQUERY TAG IT
    // =================================================================
    // Require jQuery Tag It
    // http://harvesthq.github.io/chosen/
    // =================================================================

    $("#jquery-tagIt-white").tagit({

    });


    // SUMMERNOTE
    // =================================================================
    // Require Summernote
    // http://hackerwins.github.io/summernote/
    // =================================================================
    $('#demo-summernote').summernote({
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
        ],
        height: 143 //set editable area's height
    });

});