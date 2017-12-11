console.log("****Weather Vis loaded****");

//
//let map_APIToken = "pk.eyJ1IjoibGlhbW9zdWxsaXZhbiIsImEiOiJjajNkYjhyZnAwMDAyMzNsN2FyZnY3cWQzIn0.c1qL12vFZfc2weViolmnTw";
//let canvasMap, canvasBar;
//let mapImg;
//
//var headerSize = 100;
//

let cork_lng = [-8.4863, -8.4863, -8.4863]; //west, centre, east
let cork_lat = [51.8969, 51.8969, 51.8969]; //north, centre, south
//let cx, cy;
//let ww = 400;
//let hh = 200;
//
//let prevTime = 0;
//let zoom = 8; //min 10 - max 20
let sourceData = [];
let sourceLink = "http://metwdb-prod.ichec.ie/metno-wdb2ts/locationforecast?lat=54.7210798611;long=-8.7237392806";
let divideBy = 1; //portion of file to use, given as divisor 
let spots = [];
//weather data
let displayDate, displayTime, startTime, endTime;
let xmlWeather;
let symbolsWeather = [];
let symbolsDay = []; //images for weather symbols
let symbol;
let tod = 'd'; //time of day: day or night

//Parsing weather data///////////////////////////////////
//Momemt: temp, pressure, wind direction, wind speed, wind Beaufort humidity
let t, press, windD, windS, windB, hum;
//Time span: precipitation, 
let precip, symbolNo, desc;
//
//let forecast = {
//    time: -1,
//    temp: -99,
//    pressure: -1,
//    windDirection: -1,
//    windSpeed: -1,
//    windBeaufort: -1,
//    humidity: -1,
//    precip: -1,
//    symbolNo: -1,
//    description: -1
//};
let forecasts = [];

function preload() {
//Get Map
//    let map_url = "https://api.mapbox.com/styles/v1/mapbox/basic-v9/static/" +
//            cork_lng[1] + "," + cork_lat[1] + "," + zoom + "/" +
//            ww + "x" + hh +
//            "?access_token=" + map_APIToken;
//
////    println("Map URL: " + map_url);
//
//    if (fileExists(map_url)) {
////        println("Online map found");
//        mapImg = loadImage(map_url, "png");
//    } else {
//        println("Online map not found");
//        mapImg = loadImage("oops1", "jpg");
//    }
//    if (mapImg !== null) {
////        println("Map loaded");
//    }

//Get weather  data
    xmlWeather = loadXML("../webroot/files/locationforecast.xml");
}

function  setup() {
//    canvasMap = createCanvas(ww, hh);
//    canvasMap.parent("canvasDiv");
////    canvasMap.translate(width / 2, height / 2);
//    ellipseMode(CENTER);
//    rectMode(CENTER);
////    canvasMap.image(mapImg, 0, 0);
//    cx = mercX(cork_lng[1]);
//    cy = mercY(cork_lat[1]);
////    println("cork_lng: " + cork_lng[1] + " => cx: " + cx + "\tcork_lat: " + cork_lat + " => cy: " + cy);
////    timeSlider = createSlider(0, 5, prevTime);
////    timeSlider.position(0, 10 + canvas.height);
////    timeSlider.size(1024, 36);
//
////    var children = xmlWeather.getChildren("time");
////    println("*** "+xmlWeather.getAttributeCount());
////    println("*** "+xmlWeather.listChildren());
//
//
//    
    let prod = xmlWeather.getChild("product");
    let times = prod.getChildren();

    let count = 0;

    for (let i = 0; i < 16; i += 2) {
        //There are 2 types of forecast data;
        //harmonie at a given time or ec_test_l  spanning an hour 

        //aggregate every 2 forecats into 1 object
        for (let j = 0; j < 2; j += 1) {

            let start = times[i + j].getString("from");
            let splt = start.split('T');
            startTime = splt[1].substring(0, 5);
            if (i == 0) {
                displayDate = splt[0]; //use first date 
                displayTime = startTime;

            }

            let hour = parseInt(startTime.substring(0, 2));
            println("forecast #" + (i + j) + " | startTime: " + startTime);
            let loc = times[(i + j)].getChild("location");

            // harmonie has temperature
            if (loc.getChild("temperature") != null) {
                let temp = loc.getChild("temperature");
                t = temp.getString("value");
                temp = loc.getChild("pressure");
                press = temp.getString("value");
                temp = loc.getChild("windSpeed");
                windS = temp.getString("mps");
                windB = temp.getString("beaufort");
                temp = loc.getChild("windDirection");
                windD = temp.getString("name");
                temp = loc.getChild("humidity");
                hum = temp.getString("value");

            }
            // ec_test_l has precipitation
            else if (loc.getChild("precipitation") != null) {

                let temp = loc.getChild("precipitation");
                precip = temp.getString("value");
                let s = loc.getChild("symbol");
                desc = s.getString("id");
                symbolNo = s.getString("number");
                let sn = parseInt(symbolNo);
                if (sn < 10) {
                    symbolNo = "0" + symbolNo;
                }
                //decide if night or day based on hour
                if (hour > 17 || hour < 6) {
                    tod = 'n';
                } else {
                    tod = 'd';
                }
//           
            }
        }
        println("temperature: " + t);
        println("precip: " + precip + " mm \t " + desc + " symbol #" + symbolNo);


        forecasts.push(
                {"id": count,
                    "time": startTime,
                    "temperature": t,
                    "symbol": symbolNo,
                    "tod": tod,
                    "desc": desc
                });

        console.log("Aggregate forecast #" + count + " : " + JSON.stringify(forecasts[count]));
        count += 1;

    } //End loop through xml weather data
//    document.getElementById("weatherText").innerHTML =
//            "<h2>Weather for today : " + displayDate + " </h2>"
//            + "<h3>Time : " + displayTime + " </h3>"
//            + "<strong>Temperature</strong> : " + t + " C<br>"
//            + "<strong>Precipitation</strong> : " + precip + " mm <br>"
//            + "<strong>Wind: Speed</strong> : " + windS + " mps" + "\t Beaufort Scale: " + windB + "<br>"
//            + "<strong>Wind Direction</strong> : " + windD + "<br>"
//            + "<strong>Pressure</strong> : " + press + " hPa";

    for (let i = 0; i < count; i += 1) {
//        println("Get symbol: " + forecasts[i].symbol + forecasts[i].tod + ".png");
        document.getElementById("weatherImage" + i).innerHTML =
                "<img src=\"" + "/img/Met50v2/" + forecasts[i].symbol + forecasts[i].tod + ".png" + "\"></img>";
        document.getElementById("weatherHead" + i).innerHTML = forecasts[i].time;
        document.getElementById("tableTemp" + i).innerHTML = forecasts[i].temperature+" C";
    
    }

//    if (sourceData != null) {
//        //spots=new Spot[sourceData.length-1]; //ignore first line
//        for (var i = 1; i < floor(sourceData.length / divideBy); i += 1) {
//            let cells = sourceData[i].split("/");
//            let lt = float(cells[2]);
//            let lg = float(cells[3]);
//
//            let yr, m, d;
//            for (let j = 0; j < cells.length; j += 1) {
//                let date = cells[0].split("-");
//                //print("Date has n = "+date.length+"\t");
//                //for (var k=0; k<date.length; k+=1) {
//                //  print("Date "+k+": "+date[k]);
//                //}
//                yr = int(date[0]);
//                m = int(date[1]);
//                d = int(date[2]);
//                //print("\tYear: "+year+"\tMonth: "+month+"\tDay: "+day+"\t");
//                //print("\tLong: "+cork_lng+"\tLat: "+cork_lat);
//
//            }
//            spots[i] = {
//                id: i,
//                string: sourceData[i],
//                cork_lat: lt,
//                long: lg,
//                x: mercX(lg) - cx,
//                y: mercY(lt) - cy,
//                year: yr,
//                month: m,
//                day: d,
//                show: function () {
//                    noStroke();
//                    fill(109, 153, 224, 100);
//                    ellipse(this.x, this.y, 10, 10);
//                }
//            };
//spots[i].show();
//console.log("| Spot #"+spots[i].id+"\t" +spots[i].string);
// console.log("| Spot #"+spots[i].id+"\t" +spots[i].cork_lat+"\t" 
// 	+spots[i].long+"\t" +spots[i].x+"\t" +spots[i].y+"\t"
// +spots[i].year+"\t" +spots[i].month+"\t"+spots[i].day);

//        }
//
//    } else {
//        println("ERROR! No data file found.");
//    }
//console.log("No of occurances in 2013 was "+showYear(2013));
//console.log("No of occurances in 03/2013 was "+showMonth(2013, 3));
//console.log("No of occurances on 01/03/2013 was "+showDay(2013, 3, 1));
}

function draw() {
//    image(mapImg, 0, 0);
//    fill(255, 125);
//    ellipse(width / 2, height / 2, 25, 25);
//    noFill();
//    var t = timeSlider.value();
    //only update on change
//    if (t != prevTime) {
//        console.log("slider: " + t);
//        prevTime = t;
//    }
//    showMonth(2013, t);
}

function mercX(lon) {
    lon = radians(lon);
    var a = (256 / PI) * pow(2, zoom);
    var b = lon + PI;
    return a * b;
}

function mercY(cork_lat) {
    cork_lat = radians(cork_lat);
    var a = (256 / PI) * pow(2, zoom);
    var b = tan(PI / 4 + cork_lat / 2);
    var c = PI - log(b);
    return a * c;
}

function fileExists(map_url) {
    if (map_url) {
        var req = new XMLHttpRequest();
        req.open('GET', map_url, false);
        req.send();
        return req.status == 200;
    } else {
        return false;
    }
}

// function fetchStatus(address) {
//   var client = new XMLHttpRequest();
//   client.onload = function() {
//     // in case of network errors this might not give reliable results
//     returnStatus(this.status);
//   }
//   client.open("HEAD", address);
//   client.send();
// }

function showYear(y_) {
    //var time =millis();
    var count = 0;
    for (var i = 1; i < spots.length; i += 1) {
        if (spots[i].year === y_) {
            count += 1;
            spots[i].show();
        }
    }
    //time=millis()-time;
    //console.log("Year count took "+time+"ms");
    return count;
}

function showMonth(y_, m_) {
    //var time =millis();
    var count = 0;
    for (var i = 1; i < spots.length; i += 1) {
        if (spots[i].year === y_ && spots[i].month === m_) {
            count += 1;
            spots[i].show();
        }
    }
    //time=millis()-time;
    //println("Month count took "+time+"ms");
    return count;
}

function showDay(y_, m_, d_) {
    //var time =millis();
    var count = 0;
    for (var i = 1; i < spots.length; i += 1) {
        if ((spots[i].year === y_) && (spots[i].month === m_) && (spots[i].day === d_)) {
            count += 1;
            spots[i].show();
        }
    }
    //time=millis()-time;
    //println("Day count took "+time+"ms");
    return count;
}
