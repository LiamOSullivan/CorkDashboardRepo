<?php $this->assign('title', "Real Time Environment"); ?>
<!--
TODO: enable subresource integrity 

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css"
  integrity="sha512-M2wvCLH6DSRazYeZRIm1JnYyh22purTM+FDB5CsyxtQJYeKq83arPe5wgbNmcFXGqiSH2XR8dT/fJISVA1r/zQ=="
  crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"
  integrity="sha512-lInM/apFSqyy1o6s89K4iQUKg6ppXEgsVxT35HbzUupEVRh2Eu9Wdl4tHj7dZO0s1uvplcYGmt3498TtHq+log=="
  crossorigin=""></script>-->

<!--TODO: load these via PHP-->
<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script> 
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
<script src="/js/TileLayer.Grayscale.js"></script>
<script src="/js/carparks.js"></script>
<script src="/js/carParkCapacities.js"></script>
<!--<script src="/js/soundsites.js"></script>-->
<!--<script src="/dublindashboard/js/M50.js"></script>
<script src="/dublindashboard/js/R1D1.js"></script>
<script src="/dublindashboard/js/leaflet_numbered_markers.js"></script> 
<script src="/dublindashboard/js/leaflet-list-markers.js"></script> -->

<div class="onlyContent">
    <div style="border-bottom:2px solid #e5e5e5; width:90%">
        <header>
            <h1>Real Time Environment Map</h1>
            <br>
        </header>
    </div>

    <!--<body onload="myFunction()">-->
    <div class="homeBlock" style="width: 90%; padding-top:25px; padding-bottom:25px">
        <div id="map" style="width: 100%; height:500px;"></div>
    </div>
    <!--<div id="airQuality" style="width: 100%; height: 55px; font-size: 1.2em; font-weight: 300; text-align: center;"></div>-->
    <div id="dataSources" class="homeBlock" style="width:90%; text-align:justify">
        <h2>Data Sources</h2>
        <p>The Air Quality Data at selected sites is taken from the Environmental Protection Agency (EPA). More information about this data can be found 
            <a href="http://www.epa.ie/air/quality/data/#.U_tPn_ldXh7" target="_blank">here.</a></p>
        <p>The Hydrometric Data (water level) at selected sites is taken from the Environmental Protection Agency (EPA). More information about this data can be found 
            <a href="http://www.epa.ie/hydronet/#Water%20Levels" target="_blank">here.</a></p>
        <p>The River Level Data at selected sites is taken from the Office of Public Works (OPW). More information about this data can be found 
            <a href="http://waterlevel.ie/" target="_blank">here.</a></p>
        <p>Selected Weather Data is taken from Transport Infrastructure Ireland. More information about this data can be found 
            <a href="https://www.nratraffic.ie/weather/" target="_blank" >here</a>.</p>
    </div>
</div>

<script>
    // check browser version type
    function get_browser_info() {
        console.log("***getBrowserINfo***");
        let ua = navigator.userAgent, tem, M = ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
        if (/trident/i.test(M[1])) {
            tem = /\brv[ :]+(\d+)/g.exec(ua) || [];
            return {name: 'IE', version: (tem[1] || '')};
        }
        if (M[1] === 'Chrome') {
            tem = ua.match(/\bOPR\/(\d+)/)
            if (tem != null) {
                return {name: 'Opera', version: tem[1]};
            }
        }
        M = M[2] ? [M[1], M[2]] : [navigator.appName, navigator.appVersion, '-?'];
        if ((tem = ua.match(/version\/(\d+)/i)) != null) {
            M.splice(1, 1, tem[1]);
        }
        return {
            name: M[0],
            version: M[1]
        };
    }

    let browser = get_browser_info();


    //alert(browser.name);

    //EPAOverall Air Quality
    //    $.get("/CarParks/airQuality", function (point) {
    //        obj = JSON.parse(point);
    //        let count = 6; //there are 6 results in the return //change to 2 for cork?
    //        for (let i = 0; i < count; i++) {
    //            if (obj.aqihsummary[i]["aqih-region"] == "Cork_City") {
    //                let airReport = "Current Air Quality Index for Health for " + obj.aqihsummary[i]["aqih-region"] + " is " + obj.aqihsummary[i].aqih
    //
    ////                let div = document.getElementById('airQuality');
    ////                div.innerHTML = div.innerHTML + airReport;
    ////                if (obj.aqihsummary[i].aqih == "1,Good") {
    ////                    div.style.backgroundColor = 'green';
    ////                    div.style.color = 'white';
    ////                } else if (obj.aqihsummary[i].aqih == "2,Good") {
    ////                    div.style.backgroundColor = 'green';
    ////                    div.style.color = 'white';
    ////                } else if (obj.aqihsummary[i].aqih == "3,Good") {
    ////                    div.style.backgroundColor = 'green';
    ////                    div.style.color = 'white';
    ////                } else if (obj.aqihsummary[i].aqih == "4,Fair") {
    ////                    div.style.backgroundColor = 'orange';
    ////                    div.style.color = 'white';
    ////                } else if (obj.aqihsummary[i].aqih == "5,Fair") {
    ////                    div.style.backgroundColor = 'orange';
    ////                    div.style.color = 'white';
    ////                } else if (obj.aqihsummary[i].aqih == "6,Fair") {
    ////                    div.style.backgroundColor = 'orange';
    ////                    div.style.color = 'white';
    ////                } else {
    ////                    div.style.backgroundColor = 'red';
    ////                    div.style.color = 'white';
    ////                }
    //            }
    //        }
    //    }); //END AirQuality


    //Map Styling
    //Individual AirQuality Locations

    let airQualitySite1 = {//Cork Institute of Technology
        "type": "Feature",
        "properties": {
            "amenity": "EPA Environmental Sensor",
            "popupContent": "<h5><b>EPA Site: Cork Institute of Technology </b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://erc.epa.ie/real-time-air/www/images/epaweb/JPEG/Cork_IT_OZONE_past7days_O3.JPG\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-8.534432, 51.885330]
        }
    };
    let airQualitySite2 = {//South Link Road
        "type": "Feature",
        "properties": {
            "amenity": "EPA Environmental Sensor",
            "popupContent": "<h5><b>EPA Site: South Link Road </b></h5>" + "<table style=\"width:405px\"> <tr><td><img src=\"http://erc.epa.ie/real-time-air/www/images/epaweb/JPEG/Kinsale_Rd_past7days_O3_NO2_SO2.JPG\" width=\"400px\" height=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-8.456669, 51.877165]
        }
    };
    let airQualitySiteOptions = {
        radius: 10,
        fillColor: "#5F5293",
        fillOpacity: 1,
        opacity: 1,
        color: "#000"
    };
    let map;
    let groupAir = new L.FeatureGroup();
    let soundSites = new L.FeatureGroup();
    let waterSites = new L.FeatureGroup();
    let weatherSites = new L.FeatureGroup();
//    let layerControl = new L.LayerControl();



    let cloudmadeUrl = 'http://{s}.tile.cloudmade.com/BC9A493B41014CAABB98F0471D759707/997/256/{z}/{x}/{y}.png',
            cloudmadeAttribution = 'Map data &copy; 2011 OpenStreetMap contributors, Imagery &copy; 2011 CloudMade',
            cloudmade = new L.TileLayer(cloudmadeUrl, {maxZoom: 18, attribution: cloudmadeAttribution});
    let mapquestUrl = 'http://otile{s}.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png',
            mapquestAttribution = "Data CC-By-SA by <a href='http://openstreetmap.org/' target='_blank'>OpenStreetMap</a>, Tiles Courtesy of <a href='http://open.mapquest.com' target='_blank'>MapQuest</a>",
            mapquestGrey = new L.TileLayer.Grayscale(mapquestUrl, {maxZoom: 18, attribution: mapquestAttribution, subdomains: ['1', '2', '3', '4'], bgcolor: '0x80BDE3'});
    mapquestColour = new L.TileLayer(mapquestUrl, {maxZoom: 18, attribution: mapquestAttribution, subdomains: ['1', '2', '3', '4'], bgcolor: '0x80BDE3'});
    //create the tile layer with correct attribution
    let osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
    let osmAttrib = 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors';
    let osm = new L.TileLayer(osmUrl, {maxZoom: 18, attribution: osmAttrib});
    let osmGrey = new L.TileLayer.Grayscale(osmUrl, {maxZoom: 18, attribution: osmAttrib});
    //alert(browser.version);
    //alert(browser.name);


    if (browser.name == 'MSIE' && browser.version == '9') {
        //alert(browser.version);
        //alert(browser.name);
        //alert('OK');

        map = new L.Map('map', {
            center: new L.LatLng(52.034439, -8.608861),
            zoom: 9,
            layers: [osm],
            zoomControl: true
        });
    } else if (browser.name == 'MSIE' && browser.version == '10') {
        //alert(browser.version);
        //alert(browser.name);
        //alert('OK');

        map = new L.Map('map', {
            center: new L.LatLng(52.034439, -8.608861),
            zoom: 9,
            layers: [osm],
            zoomControl: true
        });
    } else if (browser.name == 'Firefox' && browser.version == '8') {
        //alert(browser.version);
        //alert(browser.name);
        //alert('OK');

        map = new L.Map('map', {
            center: new L.LatLng(52.034439, -8.608861),
            zoom: 9,
            layers: [osm],
            zoomControl: true
        });
    } else if (browser.name == 'Firefox' && browser.version == '7') {
        //alert(browser.version);
        //alert(browser.name);
        //alert('OK');

        map = new L.Map('map', {
            center: new L.LatLng(52.034439, -8.608861),
            zoom: 9,
            layers: [osm],
            zoomControl: true
        });
    } else {
        map = new L.Map('map', {
            center: new L.LatLng(52.034439, -8.608861),
            zoom: 9,
            layers: [osmGrey],
            zoomControl: true
        });
    }
    map.addEventListener('click', onMapClick);
//LEGEND
    let legend = L.control({position: 'bottomright'});
    legend.onAdd = function (map) {
        let div = L.DomUtil.create('div', 'info legend'),
                grades = [0, 10, 20, 30, 40, 50, 60, 70, 80, 90],
                labels = [],
                from, to;
        labels.push('Ambient Sound Level');
        for (let i = 0; i < grades.length; i++) {
            from = grades[i];
            to = grades[i + 1];
            labels.push('<i style="background: ' + setAmbientSoundColor(from) + '"></i> ' +
                    from + (to ? 'db&ndash;' + to + 'db' : 'db' + '+'));
        }
        labels.push('Water Levels');
        labels.push('<i style="background: #deebf7"></i>  Decreasing');
        labels.push('<i style="background: #9ecae1"></i>  No Change');
        labels.push('<i style="background: #3182bd"></i>  Increasing');
        labels.push('EPA Site');
        labels.push('<i style="background: #5F5293"></i>  Site Location');
        div.innerHTML = labels.join('<br>');
        return div;
    };
//    legend.addTo(map);
//
//        function getSoundSiteName(propertName) {
//            return soundsites[propertName];
//    
//        }
//    ;

//    function getJunctionName(propertyName) {
//        return M50[propertyName];
//    }
//    ;

    let baseMaps = {
        //"MQ Greyscale": mapquestGrey,
        // "MQ Colour": mapquestColour,
        "OSM Greyscale": osmGrey,
        "OSM Colour": osm

    };
    let overlayMaps = {
        "EPA Monitoring Sites": groupAir,
        "Ambient Sound Recording Sites": soundSites,
        "EPA Water Level Sites": waterSites,
        "Weather Sites": weatherSites
    };
    layerControl = L.control.layers(baseMaps, overlayMaps);
    layerControl.addTo(map);
    let initial = 0; //check to add everythign initially to first map.

    function myFunction() {
        console.log("***myFunction()***");
        initial++;
        //        groupAir.clearLayers(); //air quality ou
//        soundSites.clearLayers(); //ambient sound
        waterSites.clearLayers();
//        weatherSites.clearLayers();
        $row = 1;

        let previousWaterLevels = null;

//        This works...
//        $.get("/CarParks/corkWaterLevels/0", function (data) {
//            if (!data) {
//                alert("GET returned null data");
//            } else {
//                let obj = JSON.parse(data, function (key, value) {
//                    if (key === "datetime") {
//                        console.log(key + " ; " + value);
//                    }
//
//                });
//            }
//        });

        //Cork Water Levels Previous index = 1
        $.ajax({
            async: false,
            type: 'GET',
//            url: '/cork/waterLevels/1',
            url: '/CarParks/corkWaterLevels/1',
            success: function (point) {
                previousWaterLevels = JSON.parse(point);
                console.log("Preious water levels: " + previousWaterLevels);
            }
        });

        //Cork Water Levels Current index = 0
        $.get("/CarParks/corkWaterLevels/0", function (point) {
//        $.get("/cork/WaterLevels/0", function (point) {

            ///get the other file and then compare
            //alert(previousWaterLevels);
            let obj = JSON.parse(point);
            console.log("current water levels: " + obj);
            let numOfWaterStations = obj.features.length;
            let previousNumOfWaterStations = obj.features.length;
            console.log("numOfWaterStations: " + numOfWaterStations);
            for (let i = 0; i < numOfWaterStations; i++) {
                //if Cork/Dub Stations{
                if (obj.features[i]["properties"]["station.ref"] < 41000) {
                    if (obj.features[i]["properties"]["station.region_id"] === 8) {

                        //   }
                        let previousDate;
                        let previousStationName;
                        let previousStationRef;
                        let previousWaterLevel;
                        let stationName = obj.features[i]["properties"]["station.name"];
                        let stationRef = obj.features[i]["properties"]["sensor.ref"];
                        let date = obj.features[i]["properties"]["datetime"];
                        let lon = obj.features[i]["geometry"]["coordinates"][0];
                        let lat = obj.features[i]["geometry"]["coordinates"][1];
                        let waterLevel = obj.features[i]["properties"]["value"];
                        let id = obj.features[i]["properties"]["value"];
                        //need to loop through to find matching references
                        for (let j = 0; j < previousNumOfWaterStations; j++) {
                            previousStationName = previousWaterLevels.features[j]["properties"]["station.name"];
                            previousStationRef = previousWaterLevels.features[j]["properties"]["sensor.ref"];
                            if (stationName === previousStationName && stationRef === previousStationRef) {
                                //alert("match");
                                previousWaterLevel = previousWaterLevels.features[j]["properties"]["value"];
                                previousDate = previousWaterLevels.features[j]["properties"]["datetime"];
                                previousStationName = previousWaterLevels.features[j]["properties"]["station.name"];
                                break;
                            }

                        }
                        //add to map
                        let text =
                                "<table style=\"width:300px\"><tr><td><b><font color=\"#0000ff\">"
                                + date + ": </font> The Water Level at "
                                + stationName + " is "
                                + waterLevel + " </b></td></tr><tr><td><b><font color=\"#0000ff\">"
                                + previousDate + ": </font>The Water Level at "
                                + previousStationName + " was "
                                + previousWaterLevel + " </b></td></tr></table>";
                        console.log(text);

                        let waterLevelSite = {
                            "type": "Feature",
                            "properties": {
                                "name": stationName,
                                "amenity": "Water Level",
                                "popupContent": text
                            },
                            "geometry": {
                                "type": "Point",
                                "coordinates": [lon, lat]
                            }
                        };
                        let waterLevelSiteOptions = {
                            radius: 8,
                            fillColor: "#ff7800",
// TO DO: bring this back for indicator color                           fillColor: setWaterColour(waterLevel, previousWaterLevel),
                            color: "#000",
                            weight: 1,
                            opacity: 1,
                            fillOpacity: 1 //setMarkerIntensity(spaces)
                        };
                        waterSites.addLayer(L.geoJson(waterLevelSite, {
                            onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                                return L.circleMarker(latlng, waterLevelSiteOptions);
                            }}));
                    }
                }
            }
            waterSites.addTo(map);
        }); //End of GET for current water levels




        //hydro levels
//        $.get("/CarParks/hydroLevels", function (point) {
//            obj = JSON.parse(point);
//            for (i = 0; i < 30; i = i + 7) {
//                let text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> Water Level at " + obj[i] + "  </p><b> " + obj[i + 3] + ":  " + obj[i + 4] + "m <br>" + obj[i + 5] + ": " + obj[i + 6] + "m </b></td></tr></table>";
//
//                let hydroLevelSite = {
//                    "type": "Feature",
//                    "properties": {
//                        "name": "" + obj[i],
//                        "amenity": "River Level",
//                        "popupContent": text,
//                    },
//                    "geometry": {
//                        "type": "Point",
//                        "coordinates": [obj[i + 2], obj[i + 1]]
//                    }
//                };
//
//                let hydroLevelSiteOptions = {
//                    radius: 8,
//                    fillColor: setWaterGuageColour(obj[i + 4], obj[i + 6]),
//                    color: "#000",
//                    weight: 1,
//                    opacity: 1,
//                    fillOpacity: 1
//                };
//
//                waterSites.addLayer(L.geoJson(hydroLevelSite, {
//                    onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
//                        return L.circleMarker(latlng, hydroLevelSiteOptions);
//                    }}));
//            }
//
//        });


        //water levels     
//      
//        $.get("/CarParks/readWaterLevels", function (point) {
//            obj = JSON.parse(point);
//            for (i = 0; i < 27; i = i + 7) {
//                let text =
//                        "<table style=\"width:300px\">\n\
//                         <tr><td><p class=\"intab\"> Water Level at " + obj[i] + " </p><b> "
//                        + obj[i + 3] + ":  " + obj[i + 4] + "m <br>" + obj[i + 5] + ": " + obj[i + 6]
//                        + "m </b></td></tr></table>";
//                let waterLevelSite = {
//                    "type": "Feature",
//                    "properties": {
//                        "name": "" + obj[i + 0],
//                        "amenity": "River Level",
//                        "popupContent": text
//                    },
//                    "geometry": {
//                        "type": "Point",
//                        "coordinates": [obj[i + 2], obj[i + 1]]
//                    }
//                };
//                let waterLevelSiteOptions = {
//                    radius: 8,
//                    fillColor: setWaterGuageColour(obj[i + 4], obj[i + 6]),
//                    color: "#000",
//                    weight: 1,
//                    opacity: 1,
//                    fillOpacity: 1 //setMarkerIntensity(spaces)
//                };
//                waterSites.addLayer(L.geoJson(waterLevelSite, {
//                    onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
//                        
//                        return L.circleMarker(latlng, waterLevelSiteOptions);
//                    }}));
//            }
//       });
//        
//
//
//        //Cork Water Levels Previous
//
//        $.get("/CarParks/corkWaterLevels/1", function(point){
//         previousWaterLevels = JSON.parse(point);
//         // add a delay
//         
//         });
//
//       


        //weather 
        /* for(let j = 1; j<7;j++){ //all the stations that we have
         let action = "/CarParks/weather/"+j;
         $.get(action, function(point){
         obj = JSON.parse(point);
         let lat = obj.current_observation.display_location.latitude;
         let lon = obj.current_observation.display_location.longitude;
         let name = obj.current_observation.observation_location.city;
         let currentTemp = obj.current_observation.temp_c;
         let currentWeather = obj.current_observation.weather;
         let url = obj.current_observation.ob_url;
         
         let weatherIcon = L.Icon.extend({
         options: {
         iconSize:     [36, 45], 
         iconAnchor:   [18, 45],
         popupAnchor:  [-3, -46]
         }
         });
         
         let weatherIcon= new weatherIcon({iconUrl: '/dublindashboard/img/Dashboard/icons/weather_icon.png'});    
         let siteId = "weatehrSite1";
         let text = "<table style=\"width:300px\"><tr><td><p class=\"intab\">Conditions at "+name+"</p><b> Weather: "+ currentWeather +"<br> Temperature: " +currentTemp + " Celcius </b></td></tr><tr><td><p class=\"attribution\">Data obtained from wunderground <a href=\""+url+"\"  target=\"_blank\">(more)</a></p></tr></td></table>";
         
         let weatherSite = {
         "type": "Feature",
         "properties": {
         "name": ""+name,
         "amenity": "weatherStation",
         "popupContent": text,
         },
         "geometry": {
         "type": "Point",
         "coordinates": [lon,lat]
         }
         };
         
         let weatherSiteOptions = {
         radius: 8,
         fillColor: "#228B22",
         color: "#000",
         weight: 1,
         opacity: 1,
         fillOpacity: 1 //setMarkerIntensity(spaces)
         };
         weatherSites.addLayer(L.geoJson(weatherSite ,{ 
         onEachFeature: onEachWeatherFeature, pointToLayer: function (feature, latlng) {
         return L.marker(latlng, {icon:weatherIcon}).bindPopup(weatherSite.popupContent);;
         }}));   
         });
         
         }//end for loop
         
         */
        //NRA weather Stations in Dublin
        //        let action = "/CarParks/nraWeather/" + 1;
        //        $.get(action, function (point) {
        //            obj = JSON.parse(point);
        //            for (let i = 0; i < 86; i++) {
        //                let lat = obj[i].lat[0];
        //                let lon = obj[i].lon[0];
        //                let name = obj[i].siteName[0];
        //                let id = obj[i].siteID[0];
        //                let number = obj[i].number[0];
        //
        //                let currentTemp = obj[i].temp[0];
        //                let windSpeed = obj[i].windSpeed[0];
        //                let windDirection = obj[i].windDirection[0];
        //                let roadTemp = obj[i].roadTemp[0];
        //                let precipitation = obj[i].precipitation[0];
        //                let currentWeather = "";
        //
        //
        //                if (!precipitation) {
        //                    let precipitation = "NA";
        //                }
        //
        //                let weatherIcon = L.Icon.extend({
        //                    options: {
        //                        iconSize: [40, 40],
        //                        iconAnchor: [20, 40],
        //                        popupAnchor: [-3, -41]
        //                    }
        //                });
        //
        //                let weatherIcon = new weatherIcon({iconUrl: '/dublindashboard/img/Dashboard/icons/weather_icon.png'});
        //                let siteId = "weatehrSite1";
        //                let text = "<table style=\"width:300px\"><tr><td><p class=\"intab\">Conditions at " + name + "</p><b> Weather: " + currentWeather + "<br> Air Temperature: " + currentTemp + " Celcius <br> Road Temperature: " + roadTemp + "<br> Wind Speed: " + windSpeed + " <br> Wind Direction: " + windDirection + "<br> Precipitation: " + precipitation + " </b></td></tr><tr><td><p class=\"attribution\">Data obtained from TIF </p></tr></td></table>";
        //
        //                let weatherSite = {
        //                    "type": "Feature",
        //                    "properties": {
        //                        "name": "" + name,
        //                        "amenity": "weatherStation",
        //                        "popupContent": text,
        //                    },
        //                    "geometry": {
        //                        "type": "Point",
        //                        "coordinates": [lon, lat]
        //                    }
        //                };
        //
        //                let weatherSiteOptions = {
        //                    radius: 8,
        //                    fillColor: "#228B22",
        //                    color: "#000",
        //                    weight: 1,
        //                    opacity: 1,
        //                    fillOpacity: 1 //setMarkerIntensity(spaces)
        //                };
        //                weatherSites.addLayer(L.geoJson(weatherSite, {
        //                    onEachFeature: onEachWeatherFeature, pointToLayer: function (feature, latlng) {
        //                        return L.marker(latlng, {icon: weatherIcon}).bindPopup(weatherSite.popupContent);
        //                        ;
        //                    }}));
        //            }//end for
        //        });
        //
        //        function onEachWeatherFeature(feature, layer) {
        //            popup = layer.bindPopup(layer.feature.properties.popupContent);  //essential
        //
        //        }
        //

        //sound sites
        //only for a single site  
//        $.get("/CarParks/ambientSound1", function (point) {
//            obj = JSON.parse(point);
//            let count = Number(obj.entries);
//            ;
//            let lastEntry = count - 1;
//            let previousValue = obj.aleq[lastEntry - 12];
//            let previousTime = obj.times[lastEntry - 12];
//            let previousDate = obj.dates[lastEntry - 12];
//            let value = obj.aleq[lastEntry];
//            let currentTime = obj.times[lastEntry];
//            let currentDate = obj.dates[lastEntry];
//            let siteId = "Site1";
//            let text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> Sound Level at " + getSoundSiteName(siteId).name + "</p><b> " + currentDate + " " + currentTime + ": " + value + "db<br>" + previousDate + " " + previousTime + ": " + previousValue + "db </b></td></tr></table>"
//
//            let ambientSoundSite = {
//                "type": "Feature",
//                "properties": {
//                    "name": "" + getSoundSiteName(siteId),
//                    "amenity": "Ambient Sound Site",
//                    "popupContent": text,
//                },
//                "geometry": {
//                    "type": "Point",
//                    "coordinates": [getSoundSiteName(siteId).lat, getSoundSiteName(siteId).lon]
//                }
//            };
//            let ambientSoundSiteOptions = {
//                radius: 8,
//                fillColor: setAmbientSoundColor(value), //colours[i], //
//                color: "#000",
//                weight: 1,
//                opacity: 1,
//                fillOpacity: 1 //setMarkerIntensity(spaces)
//            };
//            soundSites.addLayer(L.geoJson(ambientSoundSite, {
//                onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
//                    return L.circleMarker(latlng, ambientSoundSiteOptions);
//                }}));
//        });
//        //
//        $.get("/CarParks/ambientSound2", function (point) {
//            obj = JSON.parse(point);
//            let count = Number(obj.entries);
//            let lastEntry = count - 1;
//            let previousValue = obj.aleq[lastEntry - 12];
//            let previousTime = obj.times[lastEntry - 12];
//            let previousDate = obj.dates[lastEntry - 12];
//            let value = obj.aleq[lastEntry];
//            let currentTime = obj.times[lastEntry];
//            let currentDate = obj.dates[lastEntry];
//            let siteId = "Site2";
//            let text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> Sound Level at " + getSoundSiteName(siteId).name + "</p><b> " + currentDate + " " + currentTime + ": " + value + "db<br>" + previousDate + " " + previousTime + ": " + previousValue + "db </b> </td></tr></table>"
//
//            let ambientSoundSite = {
//                "type": "Feature",
//                "properties": {
//                    "name": "" + getSoundSiteName(siteId),
//                    "amenity": "Ambient Sound Site",
//                    "popupContent": text,
//                },
//                "geometry": {
//                    "type": "Point",
//                    "coordinates": [getSoundSiteName(siteId).lat, getSoundSiteName(siteId).lon]
//                }
//            };
//            let ambientSoundSiteOptions = {
//                radius: 8,
//                fillColor: setAmbientSoundColor(value), //colours[i], //
//                color: "#000",
//                weight: 1,
//                opacity: 1,
//                fillOpacity: 1 //setMarkerIntensity(spaces)
//            };
//            soundSites.addLayer(L.geoJson(ambientSoundSite, {
//                onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
//                    return L.circleMarker(latlng, ambientSoundSiteOptions);
//                }}));
//        });
//        //
//        $.get("/CarParks/ambientSound3", function (point) {
//            obj = JSON.parse(point);
//            let count = Number(obj.entries);
//            let lastEntry = count - 1;
//            let previousValue = obj.aleq[lastEntry - 12];
//            let previousTime = obj.times[lastEntry - 12];
//            let previousDate = obj.dates[lastEntry - 12];
//            let value = obj.aleq[lastEntry];
//            let currentTime = obj.times[lastEntry];
//            let currentDate = obj.dates[lastEntry];
//            let siteId = "Site3";
//            let text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> Sound Level at " + getSoundSiteName(siteId).name + "</p><b> " + currentDate + " " + currentTime + ": " + value + "db<br>" + previousDate + " " + previousTime + ": " + previousValue + "db </b></td></tr></table>"
//
//            let ambientSoundSite = {
//                "type": "Feature",
//                "properties": {
//                    "name": "" + getSoundSiteName(siteId),
//                    "amenity": "Ambient Sound Site",
//                    "popupContent": text,
//                },
//                "geometry": {
//                    "type": "Point",
//                    "coordinates": [getSoundSiteName(siteId).lat, getSoundSiteName(siteId).lon]
//                }
//            };
//            let ambientSoundSiteOptions = {
//                radius: 8,
//                //fillColor: "#ff7800",
//                fillColor: setAmbientSoundColor(value), //colours[i], //
//                color: "#000",
//                weight: 1,
//                opacity: 1,
//                fillOpacity: 1 //setMarkerIntensity(spaces)
//            };
//            soundSites.addLayer(L.geoJson(ambientSoundSite, {
//                onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
//                    return L.circleMarker(latlng, ambientSoundSiteOptions);
//                }}));
//        });
//        //
//        $.get("/CarParks/ambientSound4", function (point) {
//            obj = JSON.parse(point);
//            let count = Number(obj.entries);
//            let lastEntry = count - 1;
//            let previousValue = obj.aleq[lastEntry - 12];
//            let previousTime = obj.times[lastEntry - 12];
//            let previousDate = obj.dates[lastEntry - 12];
//            let value = obj.aleq[lastEntry];
//            let currentTime = obj.times[lastEntry];
//            let currentDate = obj.dates[lastEntry];
//            let siteId = "Site4";
//            let text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> Sound Level at " + getSoundSiteName(siteId).name + "</p><b> " + currentDate + " " + currentTime + ": " + value + "db<br>" + previousDate + " " + previousTime + ": " + previousValue + "db </b></td></tr></table>"
//
//            let ambientSoundSite = {
//                "type": "Feature",
//                "properties": {
//                    "name": "" + getSoundSiteName(siteId),
//                    "amenity": "Ambient Sound Site",
//                    "popupContent": text,
//                },
//                "geometry": {
//                    "type": "Point",
//                    "coordinates": [getSoundSiteName(siteId).lat, getSoundSiteName(siteId).lon]
//                }
//            };
//            let ambientSoundSiteOptions = {
//                radius: 8,
//                fillColor: setAmbientSoundColor(value), //colours[i], //
//                color: "#000",
//                weight: 1,
//                opacity: 1,
//                fillOpacity: 1 //setMarkerIntensity(spaces)
//            };
//            soundSites.addLayer(L.geoJson(ambientSoundSite, {
//                onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
//                    return L.circleMarker(latlng, ambientSoundSiteOptions);
//                }}));
//        });
//        //
//        $.get("/CarParks/ambientSound5", function (point) {
//            obj = JSON.parse(point);
//            let count = Number(obj.entries);
//            let lastEntry = count - 1;
//            let previousValue = obj.aleq[lastEntry - 12];
//            let previousTime = obj.times[lastEntry - 12];
//            let previousDate = obj.dates[lastEntry - 12];
//            let value = obj.aleq[lastEntry];
//            let currentTime = obj.times[lastEntry];
//            let currentDate = obj.dates[lastEntry];
//            let siteId = "Site5";
//            let text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> Sound Level at " + getSoundSiteName(siteId).name + "</p><b> " + currentDate + " " + currentTime + ": " + value + "db<br>" + previousDate + " " + previousTime + ": " + previousValue + "db </b></td></tr></table>"
//
//            let ambientSoundSite = {
//                "type": "Feature",
//                "properties": {
//                    "name": "" + getSoundSiteName(siteId),
//                    "amenity": "Ambient Sound Site",
//                    "popupContent": text,
//                },
//                "geometry": {
//                    "type": "Point",
//                    "coordinates": [getSoundSiteName(siteId).lat, getSoundSiteName(siteId).lon]
//                }
//            };
//            let ambientSoundSiteOptions = {
//                radius: 8,
//                fillColor: setAmbientSoundColor(value),
//                //fillColor: setMarkerColor(spaces), //colours[i], //
//                color: "#000",
//                weight: 1,
//                opacity: 1,
//                fillOpacity: 1 //setMarkerIntensity(spaces)
//            };
//            soundSites.addLayer(L.geoJson(ambientSoundSite, {
//                onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
//                    return L.circleMarker(latlng, ambientSoundSiteOptions);
//                }}));
//        });
//        //
//        $.get("/CarParks/ambientSound6", function (point) {
//            obj = JSON.parse(point);
//            let count = Number(obj.entries);
//            let lastEntry = count - 1;
//            let previousValue = obj.aleq[lastEntry - 12];
//            let previousTime = obj.times[lastEntry - 12];
//            let previousDate = obj.dates[lastEntry - 12];
//            let value = obj.aleq[lastEntry];
//            let currentTime = obj.times[lastEntry];
//            let currentDate = obj.dates[lastEntry];
//            let siteId = "Site6";
//            let text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> <b>Sound Level at " + getSoundSiteName(siteId).name + "</p><b> " + currentDate + " " + currentTime + ": " + value + "db<br>" + previousDate + " " + previousTime + ": " + previousValue + "db </b></td></tr></table>"
//
//            let ambientSoundSite = {
//                "type": "Feature",
//                "properties": {
//                    "name": "" + getSoundSiteName(siteId),
//                    "amenity": "Ambient Sound Site",
//                    "popupContent": text,
//                },
//                "geometry": {
//                    "type": "Point",
//                    "coordinates": [getSoundSiteName(siteId).lat, getSoundSiteName(siteId).lon]
//                }
//            };
//            let ambientSoundSiteOptions = {
//                radius: 8,
//                fillColor: setAmbientSoundColor(value), //colours[i], //
//                color: "#000",
//                weight: 1,
//                opacity: 1,
//                fillOpacity: 1 //setMarkerIntensity(spaces)
//            };
//            soundSites.addLayer(L.geoJson(ambientSoundSite, {
//                onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
//                    return L.circleMarker(latlng, ambientSoundSiteOptions);
//                }}));
//        });
//        //
//        $.get("/CarParks/ambientSound7", function (point) {
//            obj = JSON.parse(point);
//            let count = Number(obj.entries);
//            let lastEntry = count - 1;
//            let previousValue = obj.aleq[lastEntry - 12];
//            let previousTime = obj.times[lastEntry - 12];
//            let previousDate = obj.dates[lastEntry - 12];
//            let value = obj.aleq[lastEntry];
//            let currentTime = obj.times[lastEntry];
//            let currentDate = obj.dates[lastEntry];
//            let siteId = "Site7";
//            let text = "<table style=\"width:300px\"><tr><td><p class=\"intab\">  Sound Level at " + getSoundSiteName(siteId).name + "</p><b> " + currentDate + " " + currentTime + ": " + value + "db<br>" + previousDate + " " + previousTime + ": " + previousValue + "db </b> </td></tr></table>"
//
//            let ambientSoundSite = {
//                "type": "Feature",
//                "properties": {
//                    "name": "" + getSoundSiteName(siteId),
//                    "amenity": "Ambient Sound Site",
//                    "popupContent": text,
//                },
//                "geometry": {
//                    "type": "Point",
//                    "coordinates": [getSoundSiteName(siteId).lat, getSoundSiteName(siteId).lon]
//                }
//            };
//            let ambientSoundSiteOptions = {
//                radius: 8,
//                fillColor: setAmbientSoundColor(value), //colours[i], //
//                color: "#000",
//                weight: 1,
//                opacity: 1,
//                fillOpacity: 1 //setMarkerIntensity(spaces)
//            };
//            soundSites.addLayer(L.geoJson(ambientSoundSite, {
//                onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
//                    return L.circleMarker(latlng, ambientSoundSiteOptions);
//                }}));
//        });
//        //
//        $.get("/CarParks/ambientSound8", function (point) {
//            obj = JSON.parse(point);
//            let count = Number(obj.entries);
//            let lastEntry = count - 1;
//            let previousValue = obj.aleq[lastEntry - 12];
//            let previousTime = obj.times[lastEntry - 12];
//            let previousDate = obj.dates[lastEntry - 12];
//            let value = obj.aleq[lastEntry];
//            let currentTime = obj.times[lastEntry];
//            let currentDate = obj.dates[lastEntry];
//            let siteId = "Site8";
//            let text = "<table style=\"width:300px\"><tr><td><p class=\"intab\">  Sound Level at " + getSoundSiteName(siteId).name + "</p><b> " + currentDate + " " + currentTime + ": " + value + "db<br>" + previousDate + " " + previousTime + ": " + previousValue + "db </b> </td></tr></table>"
//
//            let ambientSoundSite = {
//                "type": "Feature",
//                "properties": {
//                    "name": "" + getSoundSiteName(siteId),
//                    "amenity": "Ambient Sound Site",
//                    "popupContent": text,
//                },
//                "geometry": {
//                    "type": "Point",
//                    "coordinates": [getSoundSiteName(siteId).lat, getSoundSiteName(siteId).lon]
//                }
//            };
//            let ambientSoundSiteOptions = {
//                radius: 8,
//                fillColor: setAmbientSoundColor(value), //colours[i], //
//                color: "#000",
//                weight: 1,
//                opacity: 1,
//                fillOpacity: 1 //setMarkerIntensity(spaces)
//            };
//            soundSites.addLayer(L.geoJson(ambientSoundSite, {
//                onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
//                    return L.circleMarker(latlng, ambientSoundSiteOptions);
//                }}));
//        });
//        //
//        $.get("/CarParks/ambientSound9", function (point) {
//            obj = JSON.parse(point);
//            let count = Number(obj.entries);
//            let lastEntry = count - 1;
//            let previousValue = obj.aleq[lastEntry - 12];
//            let previousTime = obj.times[lastEntry - 12];
//            let previousDate = obj.dates[lastEntry - 12];
//            let value = obj.aleq[lastEntry];
//            let currentTime = obj.times[lastEntry];
//            let currentDate = obj.dates[lastEntry];
//            let siteId = "Site9";
//            let text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> Sound Level at " + getSoundSiteName(siteId).name + "</p><b> " + currentDate + " " + currentTime + ": " + value + "db<br>" + previousDate + " " + previousTime + ": " + previousValue + "db </b></td></tr></table>"
//
//            let ambientSoundSite = {
//                "type": "Feature",
//                "properties": {
//                    "name": "" + getSoundSiteName(siteId),
//                    "amenity": "Ambient Sound Site",
//                    "popupContent": text,
//                },
//                "geometry": {
//                    "type": "Point",
//                    "coordinates": [getSoundSiteName(siteId).lat, getSoundSiteName(siteId).lon]
//                }
//            };
//            let ambientSoundSiteOptions = {
//                radius: 8,
//                fillColor: setAmbientSoundColor(value), //colours[i], //
//                color: "#000",
//                weight: 1,
//                opacity: 1,
//                fillOpacity: 1 //setMarkerIntensity(spaces)
//            };
//            soundSites.addLayer(L.geoJson(ambientSoundSite, {
//                onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
//                    return L.circleMarker(latlng, ambientSoundSiteOptions);
//                }}));
//        });
//        //
//        $.get("/CarParks/ambientSound10", function (point) {
//            obj = JSON.parse(point);
//            let count = Number(obj.entries);
//            let lastEntry = count - 1;
//            let previousValue = obj.aleq[lastEntry - 12];
//            let previousTime = obj.times[lastEntry - 12];
//            let previousDate = obj.dates[lastEntry - 12];
//            let value = obj.aleq[lastEntry];
//            let currentTime = obj.times[lastEntry];
//            let currentDate = obj.dates[lastEntry];
//            let siteId = "Site10";
//            let text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> Sound Level at " + getSoundSiteName(siteId).name + "</p> <b>" + currentDate + " " + currentTime + ": " + value + "db<br>" + previousDate + " " + previousTime + ": " + previousValue + "db </td></tr></table>"
//
//            let ambientSoundSite = {
//                "type": "Feature",
//                "properties": {
//                    "name": "" + getSoundSiteName(siteId),
//                    "amenity": "Ambient Sound Site",
//                    "popupContent": text,
//                },
//                "geometry": {
//                    "type": "Point",
//                    "coordinates": [getSoundSiteName(siteId).lat, getSoundSiteName(siteId).lon]
//                }
//            };
//            let ambientSoundSiteOptions = {
//                radius: 8,
//                fillColor: setAmbientSoundColor(value), //colours[i], //
//                color: "#000",
//                weight: 1,
//                opacity: 1,
//                fillOpacity: 1 //setMarkerIntensity(spaces)
//            };
//            soundSites.addLayer(L.geoJson(ambientSoundSite, {
//                onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
//                    return L.circleMarker(latlng, ambientSoundSiteOptions);
//                }}));
//        });
//        //
//        $.get("/CarParks/ambientSound11", function (point) {
//            obj = JSON.parse(point);
//            let count = Number(obj.entries);
//            let lastEntry = count - 1;
//            let previousValue = obj.aleq[lastEntry - 12];
//            let previousTime = obj.times[lastEntry - 12];
//            let previousDate = obj.dates[lastEntry - 12];
//            let value = obj.aleq[lastEntry];
//            let currentTime = obj.times[lastEntry];
//            let currentDate = obj.dates[lastEntry];
//            let siteId = "Site11";
//            let text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> Sound Level at " + getSoundSiteName(siteId).name + "</p><b> " + currentDate + " " + currentTime + ": " + value + "db<br>" + previousDate + " " + previousTime + ": " + previousValue + "db </td></tr></table>"
//
//            let ambientSoundSite = {
//                "type": "Feature",
//                "properties": {
//                    "name": "" + getSoundSiteName(siteId),
//                    "amenity": "Ambient Sound Site",
//                    "popupContent": text,
//                },
//                "geometry": {
//                    "type": "Point",
//                    "coordinates": [getSoundSiteName(siteId).lat, getSoundSiteName(siteId).lon]
//                }
//            };
//            let ambientSoundSiteOptions = {
//                radius: 8,
//                fillColor: setAmbientSoundColor(value), //colours[i], //
//                color: "#000",
//                weight: 1,
//                opacity: 1,
//                fillOpacity: 1 //setMarkerIntensity(spaces)
//            };
//            soundSites.addLayer(L.geoJson(ambientSoundSite, {
//                onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
//                    return L.circleMarker(latlng, ambientSoundSiteOptions);
//                }}));
//        });
//        //
//        $.get("/CarParks/ambientSound12", function (point) {
//            obj = JSON.parse(point);
//            let count = Number(obj.entries);
//            let lastEntry = count - 1;
//            let previousValue = obj.aleq[lastEntry - 12];
//            let previousTime = obj.times[lastEntry - 12];
//            let previousDate = obj.dates[lastEntry - 12];
//            let value = obj.aleq[lastEntry];
//            let currentTime = obj.times[lastEntry];
//            let currentDate = obj.dates[lastEntry];
//            let siteId = "Site12";
//            let text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> Sound Level at " + getSoundSiteName(siteId).name + "</p><b> " + currentDate + " " + currentTime + ": " + value + "db<br>" + previousDate + " " + previousTime + ": " + previousValue + "db </td></tr></table>"
//
//            let ambientSoundSite = {
//                "type": "Feature",
//                "properties": {
//                    "name": "" + getSoundSiteName(siteId),
//                    "amenity": "Ambient Sound Site",
//                    "popupContent": text,
//                },
//                "geometry": {
//                    "type": "Point",
//                    "coordinates": [getSoundSiteName(siteId).lat, getSoundSiteName(siteId).lon]
//                }
//            };
//            let ambientSoundSiteOptions = {
//                radius: 8,
//                fillColor: setAmbientSoundColor(value), //colours[i], //
//                color: "#000",
//                weight: 1,
//                opacity: 1,
//                fillOpacity: 1 //setMarkerIntensity(spaces)
//            };
//            soundSites.addLayer(L.geoJson(ambientSoundSite, {
//                onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
//                    return L.circleMarker(latlng, ambientSoundSiteOptions);
//                }}));
//        });
//        //
//        $.get("/CarParks/ambientSound13", function (point) {
//            obj = JSON.parse(point);
//            let count = Number(obj.entries);
//            let lastEntry = count - 1;
//            let previousValue = obj.aleq[lastEntry - 12];
//            let previousTime = obj.times[lastEntry - 12];
//            let previousDate = obj.dates[lastEntry - 12];
//            let value = obj.aleq[lastEntry];
//            let currentTime = obj.times[lastEntry];
//            let currentDate = obj.dates[lastEntry];
//            let siteId = "Site13";
//            let text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> Sound Level at " + getSoundSiteName(siteId).name + "</p><b> " + currentDate + " " + currentTime + ": " + value + "db<br>" + previousDate + " " + previousTime + ": " + previousValue + "db </td></tr></table>"
//
//            let ambientSoundSite = {
//                "type": "Feature",
//                "properties": {
//                    "name": "" + getSoundSiteName(siteId),
//                    "amenity": "Ambient Sound Site",
//                    "popupContent": text,
//                },
//                "geometry": {
//                    "type": "Point",
//                    "coordinates": [getSoundSiteName(siteId).lat, getSoundSiteName(siteId).lon]
//                }
//            };
//            let ambientSoundSiteOptions = {
//                radius: 8,
//                fillColor: setAmbientSoundColor(value), //colours[i], //
//                color: "#000",
//                weight: 1,
//                opacity: 1,
//                fillOpacity: 1 //setMarkerIntensity(spaces)
//            };
//            soundSites.addLayer(L.geoJson(ambientSoundSite, {
//                onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
//                    return L.circleMarker(latlng, ambientSoundSiteOptions);
//                }}));
//        });
//        //
//        
//        $.get("/CarParks/ambientSound14", function (point) {
//            obj = JSON.parse(point);
//            let count = Number(obj.entries);
//            let lastEntry = count - 1;
//            let previousValue = obj.aleq[lastEntry - 12];
//            let previousTime = obj.times[lastEntry - 12];
//            let previousDate = obj.dates[lastEntry - 12];
//            let value = obj.aleq[lastEntry];
//            let currentTime = obj.times[lastEntry];
//            let currentDate = obj.dates[lastEntry];
//            let siteId = "Site14";
//            let text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> Sound Level at " + getSoundSiteName(siteId).name + "</p><b> " + currentDate + " " + currentTime + ": " + value + "db<br>" + previousDate + " " + previousTime + ": " + previousValue + "db </td></tr></table>"
//
//            let ambientSoundSite = {
//                "type": "Feature",
//                "properties": {
//                    "name": "" + getSoundSiteName(siteId),
//                    "amenity": "Ambient Sound Site",
//                    "popupContent": text,
//                },
//                "geometry": {
//                    "type": "Point",
//                    "coordinates": [getSoundSiteName(siteId).lat, getSoundSiteName(siteId).lon]
//                }
//            };
//            let ambientSoundSiteOptions = {
//                radius: 8,
//                fillColor: setAmbientSoundColor(value), //colours[i], //
//                color: "#000",
//                weight: 1,
//                opacity: 1,
//                fillOpacity: 1 //setMarkerIntensity(spaces)
//            };
//            //Ambient Sound
//            soundSites.addLayer(L.geoJson(ambientSoundSite, {
//                onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
//                    return L.circleMarker(latlng, ambientSoundSiteOptions);
//                }}));
//            //airQuality
//            groupAir.addLayer(L.geoJson(airQualitySite1, {
//                onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
//                    return L.circleMarker(latlng, airQualitySiteOptions);
//                }}));
//            groupAir.addLayer(L.geoJson(airQualitySite2, {
//                onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
//                    return L.circleMarker(latlng, airQualitySiteOptions);
//                }}));
//            groupAir.addLayer(L.geoJson(airQualitySite3, {
//                onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
//                    return L.circleMarker(latlng, airQualitySiteOptions);
//                }}));
//            groupAir.addLayer(L.geoJson(airQualitySite4, {
//                onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
//                    return L.circleMarker(latlng, airQualitySiteOptions);
//                }}));
//            groupAir.addLayer(L.geoJson(airQualitySite5, {//winetavern street
//                onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
//                    return L.circleMarker(latlng, airQualitySiteOptions);
//                }}));
//            if (initial === 1 || map.hasLayer(groupAir)) {
//                groupAir.addTo(map);
//                soundSites.addTo(map);
//                waterSites.addTo(map);
//                weatherSites.addTo(map);
//            }
//            setTimeout(myFunction, 300000); //milliseconds 300000 - 5mins 
//
//
//
//        }); //end ambient sound 14
    

    function onEachFeature(feature, layer) {
        layer.on({
            mouseover: highlightFeature,
            mouseout: resetHighlight
        });
    }

    function resetHighlight(e) {
        let layer = e.target;
        layer.setStyle({// highlight the feature
            weight: 1,
            color: '#666',
            dashArray: ''
        });
    }


    function highlightFeature(e) {
        let layer = e.target;
        layer.setStyle({// highlight the feature
            weight: 5,
            color: '#666',
            dashArray: ''
        });
        if (!L.Browser.ie && !L.Browser.opera) {
            layer.bringToFront();
        }
        popup = layer.bindPopup(layer.feature.properties.popupContent); //essential
    }



    //CARPARKS
    $.get("/CarParks/nowParking", function (point) {
        function onEachFeature(feature, layer) {
            layer.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight
            });
        }

        function resetHighlight(e) {
            let layer = e.target;
            layer.setStyle({// highlight the feature
                weight: 1,
                color: '#666',
                dashArray: ''
                //fillOpacity: setMarkerIntensity(
            });
        }

        function highlightFeature(e) {
            let layer = e.target;
            layer.setStyle({// highlight the feature
                weight: 5,
                color: '#666',
                dashArray: ''
                //fillOpacity: 0.6
            });
            if (!L.Browser.ie && !L.Browser.opera) {
                layer.bringToFront();
            }

            popup = layer.bindPopup(layer.feature.properties.popupContent); //essential
        }


        function highlightRoadFeature(e) {
            let layer = e.target;
            layer.setStyle({// highlight the feature
                weight: 10,
                color: '#FF0000',
                dashArray: ''
                //fillOpacity: 0.6
            });
            if (!L.Browser.ie && !L.Browser.opera) {
                layer.bringToFront();
            }

            layer.bindPopup(layer.feature.properties.popupContent); //essential
        }
    });

//
//    function setWaterGuageColour(currentVal, previousVal) {
//        if (currentVal < previousVal) { //falling
//
//            return '#deebf7'
//        } else if (currentVal > previousVal) { //rising
//
//            return '#3182bd'
//
//        } else { //no change
//            return '#9ecae1'
//
//        }
//
//    }


//    function setWaterColour(current, previous) {
//
//        if (current < previous) {
//            return '#deebf7'; //decreasing
//        } else if (current > previous) {
//            return '#9ecae1'; //increasing
//        } else
//            return '#9ecae1'; //no change
//
//
//    }

//    function setAmbientSoundColor(ambientSound) {
//        let good = 55;
//        let bad = 70;
//        return ambientSound < 10 ? '#fff7ec' :
//                ambientSound < 20 ? '#fee8c8' :
//                ambientSound < 30 ? '#fdd49e' :
//                ambientSound < 40 ? '#fdbb84' :
//                ambientSound < 50 ? '#fc8d59' :
//                ambientSound < 60 ? '#ef6548' :
//                ambientSound < 70 ? '#d7301f' :
//                ambientSound < 80 ? '#b30000' :
//                ambientSound < 90 ? '#8f0000' :
//                ambientSound > 90 ? '#7f0000' :
//                '#000000';
//    }

//    function setTripsColour(travelTime) {
//        let good = 10; //need the freeflow traveltime
//        return travelTime < good ? '#00FF00' :
//                travelTime > good ? '#FF0000' :
//                '#00FF00';
//    }
//

} //End myFunction()
    function onMapClick(e) {
//        console.log("Click");

    }


</script>




