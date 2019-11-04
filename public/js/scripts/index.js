// Dashboard.js
// ====================================================================
// This file should not be included in your project.
// This is just a sample how to initialize plugins or components.
//
$(window).on('load', function() {


    // RICKSAW CHART REALTIME
    // =================================================================
    // Require Ricksaw Chart
    // -----------------------------------------------------------------
    // https://github.com/shutterstock/rickshaw
    // =================================================================

    var analyticData = [
        [],
        []
    ];
    var random = new Rickshaw.Fixtures.RandomData(50);

    for (var i = 0; i < 50; i++) {
        random.addData(analyticData);
    }

    analyticgraph = new Rickshaw.Graph({
        element: document.querySelector("#map-chart"),
        height: 250,
        renderer: 'area',
        series: [{
            data: analyticData[0],
            color: 'rgba(0,144,217,0.25)',
            name: 'DB Server'
        }, {
            data: analyticData[1],
            color: '#eceff1',
            name: 'Web Server'
        }]
    });
    var hoverDetail = new Rickshaw.Graph.HoverDetail({
        graph: analyticgraph
    });

    setInterval(function() {
        random.removeData(analyticData);
        random.addData(analyticData);
        analyticgraph.update();

    }, 1000);

    // EASY PIE CHART
    // =================================================================
    // Require easyPieChart
    // -----------------------------------------------------------------
    // http://rendro.github.io/easy-pie-chart/
    // =================================================================

    $('#demo-pie-2').easyPieChart({
        barColor: '#F3565D',
        scaleColor: '#dfe0e0',
        trackColor: '#fff',
        lineCap: 'round',
        size: '80',
        lineWidth: 8,
        onStep: function(from, to, percent) {
            $(this.el).find('.pie-value').text(Math.round(percent) + '%');
        }
    });

    $('#demo-pie-3').easyPieChart({
        barColor: '#F3565D',
        scaleColor: '#dfe0e0',
        trackColor: '#fff',
        lineCap: 'round',
        size: '80',
        lineWidth: 8,
        onStep: function(from, to, percent) {
            $(this.el).find('.pie-value').text(Math.round(percent) + '%');
        }
    });

    $('#demo-pie').easyPieChart({
        barColor: '#F3565D',
        scaleColor: '#dfe0e0',
        trackColor: '#fff',
        lineCap: 'round',
        size: '80',
        lineWidth: 8,
        onStep: function(from, to, percent) {
            $(this.el).find('.pie-value').text(Math.round(percent) + '%');
        }
    });


    // FLOT BAR CHART - NEGATIVE
    // =================================================================
    // Require flot Charts
    // -----------------------------------------------------------------
    // http://www.flotcharts.org/
    // =================================================================

    var negativebar = [
        [0, 0],
        [1, 0.8],
        [2, 0.9],
        [3, 0.1],
        [4, -0.8],
        [5, -1.0],
        [6, -0.3],
        [7, 0.7],
        [8, 1],
        [9, 0.4],
        [10, -0.5],
        [11, -1],
        [12, -0.5],
        [13, 0.4],
        [14, 1],
        [15, 0.7],
        [16, -0.3],
        [17, -1.0],
        [18, -0.8],
        [19, 0.1],
    ];

    var data = [{
        label: "value A",
        data: negativebar
    }, ];

    $.plot($("#demo-negativebar"), data, {
        series: {
            bars: {
                show: true,
                barWidth: 0.5,
                horizontal: false,
                order: 1,
                fillColor: {
                    colors: [{
                        opacity: 0.5
                    }, {
                        opacity: 0.9
                    }]
                }
            }
        },
        legend: {
            show: true
        },
        grid: {
            borderWidth: 1,
            tickColor: "#eeeeee",
            borderColor: "#eeeeee",
            hoverable: true,
            clickable: true
        },
        xaxis: {
            font: {
                color: "#ccc"
            }
        },
        yaxis: {
            font: {
                color: "#ccc"
            }
        },
        colors: ['#29b7d3'],
    });


    // SINGLE FLOT BAR CHART
    // =================================================================
    // Require flot Charts
    // -----------------------------------------------------------------
    // http://www.flotcharts.org/
    // =================================================================

    var singledata = [
        [1, 5],
        [2, 6],
        [3, 7],
        [4, 8],
        [5, 9],
        [6, 12],
        [7, 9],
        [8, 8],
        [9, 7],
        [10, 6],
        [11, 5]
    ];

    var data = [{
        label: "value A",
        data: singledata
    }, ];

    $.plot($("#demo-singlebar"), data, {
        series: {
            bars: {
                show: true,
                barWidth: 0.5,
                horizontal: false,
                order: 1,
                fillColor: {
                    colors: [{
                        opacity: 0.5
                    }, {
                        opacity: 0.9
                    }]
                }
            }
        },
        legend: {
            show: true
        },
        grid: {
            borderWidth: 1,
            tickColor: "#eeeeee",
            borderColor: "#eeeeee",
            hoverable: true,
            clickable: true
        },
        xaxis: {
            font: {
                color: "#ccc"
            }
        },
        yaxis: {
            font: {
                color: "#ccc"
            }
        },
        colors: ['#29b7d3'],
    });

});