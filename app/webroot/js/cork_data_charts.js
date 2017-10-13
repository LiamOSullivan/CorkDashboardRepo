/*jslint browser: true*/
/*global $, jQuery, Chart, alert*/
//let parking_url = "http://149.157.67.17/JsonService/parkingService/100.json";
//let parking_div = "cork_carparks";


window.chartColors = {
    red: 'rgb(255, 99, 132)',
    corkRed: 'rgb(181, 31, 36)',
    orange: 'rgb(255, 159, 64)',
    yellow: 'rgb(255, 205, 86)',
    green: 'rgb(75, 192, 192)',
    blue: 'rgb(54, 162, 235)',
    purple: 'rgb(153, 102, 255)',
    grey: 'rgb(201, 203, 207)'
};


let house_prices_url = "http://149.157.67.17/JsonService/lookService/houses/3/30.json";
let house_prices_div = "cork_house_prices";

let residential_rents_url = "http://149.157.67.17/JsonService/lookService/dublinnationalrents/1/30.json";
let residential_rents_div = "cork_residential_rents";

let air_quality_url = "http://149.157.67.17/JsonService/airQualityService/1/desc.json";
let datum = [];

////Carparks
//$(function () {
//    $.ajax({
//        url: parking_url,
//        context: document.body,
//        dataType: 'jsonp'
//    }).done(function (data) {
//  
//        datum = data;
//        let labels = new Array(datum.length);
//        let config = {
//            type: 'line',
//            data: {
//                labels: labels,
//                datasets: [{
//                    label: "",
//                    borderColor: window.chartColors.red,
//                    borderWidth: 1,
//                    data: datum,
//                    fill: false
//                }]
//            },
//            options: {
//                elements: {
//                    point: {
//                        radius: 1.5
//                    }
//                },
//                tooltips: {
//                    enabled: true,
//                    mode: 'single',
//                    callbacks: {
//                        label: function (tooltipItems, data) {
//                            return tooltipItems.yLabel + ' free spaces';
//                        }
//                    }
//                },
//                responsive: true,
//                title: {
//                    display: false,
//                    text: 'Chart.js Line Chart'
//                },
//                
//                legend: {
//                    display: false
//                },
//                hover: {
//                    mode: 'nearest',
//                    intersect: true
//                },
//                scales: {
//                    xAxes: [{
//                        display: false,
//                        scaleLabel: {
//                            display: true,
//                            labelString: ''
//                        }
//                    }],
//                    yAxes: [{
//                        display: false,
//                        scaleLabel: {
//                            display: true,
//                            labelString: 'Value'
//                        }
//                    }]
//                }
//            }
//        };
//
//  
//        
//            
//        let ctx = document.getElementById(parking_div).getContext("2d");
//        window.myLine = new Chart(ctx, config);
//       
//        
//        
//
//        let colorNames = Object.keys(window.chartColors);
//       
//
//       
//
//    });
//            
//});

//House Prices
$(function () {
    $.ajax({
        url: house_prices_url,
        context: document.body,
        dataType: 'jsonp'
    }).done(function (data) {

        datum = data;
        let labels = new Array(datum.length);
        let config = {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                        label: "",
                        borderColor: window.chartColors.corkRed,
                        backgroundColor: window.chartColors.corkRed,
                        borderWidth: 2,
                        data: datum,
                        fill: true
                    }]
            },
            options: {
                elements: {
                    point: {
                        radius: 0.0
                    }
                },
//                tooltips: {
//                    enabled: true,
//                    mode: 'single',
//                    callbacks: {
//                        label: function (tooltipItems, data) {
//                            return '\u20AC ' + tooltipItems.yLabel;
//                        }
//                    }
//                },
                responsive: true,
                title: {
                    display: false,
                    text: 'House Prices'
                },
                legend: {
                    display: false
                },
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: false,
                                labelString: ''
                            }
                        }],
                    yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'x1000 €'
                            }
                        }]
                }
            }
        };

        let ctx = document.getElementById(house_prices_div).getContext("2d");
        window.myLine = new Chart(ctx, config);

        let colorNames = Object.keys(window.chartColors);

    });

});

//Residential Rent
$(function () {
    $.ajax({
        url: residential_rents_url,
        context: document.body,
        dataType: 'jsonp'
    }).done(function (data) {

        datum = data;
        let labels = new Array(datum.length);
        let config = {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                        label: "",
                        borderColor: window.chartColors.corkRed,
                        borderWidth: 1,
                        data: datum,
                        fill: true,
                        backgroundColor: window.chartColors.corkRed
                    }]
            },
            options: {
                elements: {
                    point: {
                        radius: 0.0
                    }
                },
//                tooltips: {
//                    enabled: true,
//                    mode: 'single',
//                    callbacks: {
//                        label: function (tooltipItems, data) {
//                            return  '\u20AC ' + tooltipItems.yLabel + ' per month';
//                        }
//                    }
//                },
                responsive: true,
                title: {
                    display: false,
                    text: 'Residential Rents'
                },

                legend: {
                    display: false
                },
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: ''
                            }
                        }],
                    yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: '€/month'
                            }
                        }]
                }
            }
        };




        let ctx = document.getElementById(residential_rents_div).getContext("2d");
        window.myLine = new Chart(ctx, config);
//        let colorNames = Object.keys(window.chartColors);
    });

});

//Air Quality
$(function () {
    $.ajax({
        url: air_quality_url,
        context: document.body,
        timeout: 7500,
        dataType: 'jsonp'
    }).done(function (data) {
        let datum = data;
        $("#airquality").text(data);

    }).fail(function () {
        $("#airquality").text("No Data");
    });
});