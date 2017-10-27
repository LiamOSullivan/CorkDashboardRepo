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
    corkGrey: 'rgb(201, 203, 207)'
};
let house_prices_url = "http://149.157.67.17/JsonService/lookService/houses/2/35.json";
let house_prices_div = "cork_house_prices";
let residential_rents_url = "http://149.157.67.17/JsonService/lookService/dublinnationalrents/1/39.json"; //TODO: Generate #files through query
let residential_rents_div = "cork_residential_rents";
let datum = [];

//House Prices
let prices_col_labels = [
    "2008Q1",
    "2008Q2",
    "2008Q3",
    "2008Q4",
    "2009Q1",
    "2009Q2",
    "2009Q3",
    "2009Q4",
    "2010Q1",
    "2010Q2",
    "2010Q3",
    "2010Q4",
    "2011Q1",
    "2011Q2",
    "2011Q3",
    "2011Q4",
    "2012Q1",
    "2012Q2",
    "2012Q3",
    "2012Q4",
    "2013Q1",
    "2013Q2",
    "2013Q3",
    "2013Q4",
    "2014Q1",
    "2014Q2",
    "2014Q3",
    "2014Q4",
    "2015Q1",
    "2015Q2",
    "2015Q3",
    "2015Q4",
    "2016Q1",
    "2016Q2",
    "2016Q3"];

$(function () {

    $.ajax({
        url: house_prices_url,
        context: document.body,
        dataType: 'jsonp'
    }).done(function (data) {

        datum = data;
        //let labels = new Array(datum.length);

        let config = {
            type: 'line',
            data: {
                labels: prices_col_labels,
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
                            ticks: {
                                beginAtZero: false,
                                min: 200000,
                                max: 340000
                            }
                        }]
                }
            }
        };
        let ctx = document.getElementById(house_prices_div).getContext("2d");
        window.myLine = new Chart(ctx, config);
//        let colorNames = Object.keys(window.chartColors);
    });
});

let rent_col_labels = [
    "2008Q1",
    "2008Q2",
    "2008Q3",
    "2008Q4",
    "2009Q1",
    "2009Q2",
    "2009Q3",
    "2009Q4",
    "2010Q1",
    "2010Q2",
    "2010Q3",
    "2010Q4",
    "2011Q1",
    "2011Q2",
    "2011Q3",
    "2011Q4",
    "2012Q1",
    "2012Q2",
    "2012Q3",
    "2012Q4",
    "2013Q1",
    "2013Q2",
    "2013Q3",
    "2013Q4",
    "2014Q1",
    "2014Q2",
    "2014Q3",
    "2014Q4",
    "2015Q1",
    "2015Q2",
    "2015Q3",
    "2015Q4",
    "2016Q1",
    "2016Q2",
    "2016Q3",
    "2016Q3",
    "2016Q4",
    "2017Q1",
    "2017Q2"
    ];

//Residential Rent
$(function () {
    $.ajax({
        url: residential_rents_url,
        context: document.body,
        dataType: 'jsonp'
    }).done(function (data) {

        datum = data;
        //let labels = new Array(datum.length);
        let config = {
            type: 'line',
            data: {
                labels: rent_col_labels,
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
                            ticks: {
                                beginAtZero: false,
                                min: 650,
                                max: 1000 //TODO: Use max from data and add amount
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

//Planning Applications
//
let cork_planning_applications_url = "http://149.157.67.17/JsonService/lookService/planningapplications/";
let cork_county_planning = [
    '1/30.json', //received
    "2/30.json", //granted
    "3/30.json"  //refused
];
let cork_city_planning = [
    '4/30.json', //received
    "5/30.json", //granted
    "6/30.json"  //refused
];

let county_planning_applications_div = "county_planning_applications";
let city_planning_applications_div = "city_planning_applications";


///////////////////////////////////////////////////////////////////////////County

//TODO: Pull column names from table rather than hard-coding
$(function () {
    var data = {
        labels: ["2009", "2010", "2011", "2012", "2013", "2014", "2015", "2016"],
        datasets: [
            {
                label: "Received",
                backgroundColor: window.chartColors.corkRed,
                data: [0, 0, 0, 0, 0, 0, 0, 0]
            },
            {
                label: "Granted",
                backgroundColor: "black",
                data: [0, 0, 0, 0, 0, 0, 0, 0]
            },
            {
                label: "Refused",
                backgroundColor: window.chartColors.corkRed,
                data: [0, 0, 0, 0, 0, 0, 0, 0]
            }
        ]
    };
    for (let i = 0; i < 3; i += 1) {
        $.ajax({
            url: cork_planning_applications_url + cork_county_planning[i],
            context: document.body,
            dataType: 'jsonp'
        }).done(function (data_) {
            addData(data_, i);
            //        console.log(">>>data.datasets[0].data = " + data.datasets[0].data);

        });
    }

    let count = 0; //counts to know when the 3 sets of data have been filled
    function addData(d_, i_) {
        data.datasets[i_].data = d_;
        if (count === 2) { //only create graph if 3 datasets have been filled
            createGraph();
        } else {
            count += 1;
        }

    }

    function createGraph() {
        let ctx = document.getElementById(county_planning_applications_div).getContext("2d");
        window.myLine = new Chart(ctx, {
            type: 'bar',
            data: data,
            title: "Cork County",
            options: {
                title: {
                    display: false,
                    fontSize: 24,
                    text: 'Cork County'
                },
                barValueSpacing: 20,
                scales: {
                    yAxes: [{
                            ticks: {
                                min: 0
                            }
                        }]
                }
            }
        });
    }
    ;
});

///////////////////////////////////////////////////////////////////////////City
$(function () {
    var data = {
        labels: ["2009", "2010", "2011", "2012", "2013", "2014", "2015", "2016"],
        datasets: [
            {
                label: "Received",
                backgroundColor: window.chartColors.corkRed,
                data: [0, 0, 0, 0, 0, 0, 0, 0]
            },
            {
                label: "Granted",
                backgroundColor: "black",
                data: [0, 0, 0, 0, 0, 0, 0, 0]
            },
            {
                label: "Refused",
                backgroundColor: window.chartColors.corkRed,
                data: [0, 0, 0, 0, 0, 0, 0, 0]
            }
        ]
    };
    for (let i = 0; i < 3; i += 1) {
        $.ajax({
            url: cork_planning_applications_url + cork_city_planning[i],
            context: document.body,
            dataType: 'jsonp'
        }).done(function (data_) {
            addData(data_, i);
            //        console.log(">>>data.datasets[0].data = " + data.datasets[0].data);

        });
    }

    let count = 0; //counts to know when the 3 sets of data have been filled
    function addData(d_, i_) {
        data.datasets[i_].data = d_;
        if (count === 2) { //only create graph if 3 datasets have been filled
            createGraph();
        } else {
            count += 1;
        }

    }

    function createGraph() {
        let ctx = document.getElementById(city_planning_applications_div).getContext("2d");
        window.myLine = new Chart(ctx, {
            type: 'bar',
            data: data,
            title: "Cork County",
            options: {
                title: {
                    display: false,
                    fontSize: 24,
                    text: 'Cork County'
                },
                barValueSpacing: 20,
                scales: {
                    yAxes: [{
                            ticks: {
                                min: 0
                            }
                        }]
                }
            }
        });
    }
    ;
});





//
//////Air Quality
////$(function () {
////    $.ajax({
////        url: air_quality_url,
////        context: document.body,
////        timeout: 7500,
////        dataType: 'jsonp'
////    }).done(function (data) {
////        let datum = data;
////        $("#airquality").text(data);
////
////    }).fail(function () {
////        $("#airquality").text("No Data");
////    });
////});



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