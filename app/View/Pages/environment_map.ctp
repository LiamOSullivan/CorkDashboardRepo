 
<?php $this->assign('title', "Environment Map"); ?>
<?php $this->layout = false; ?>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="Provides access to real-time, live data about current environment and weather conditions in Dublin" />
<meta name="keywords" content="Corkdashboard, Cork, City Benchmarks, Interactive tools, environment, air quality, water levels, EPA" />
<script src="/dublindashboard/js/Dashboard/jquery.min.js"></script>
<!-- <script src="/dublindashboard/js/Dashboard/config.js"></script> -->

<!--<script src="/dublindashboard/js/Dashboard/skel.min.js"></script>
 <script src="/dublindashboard/js/Dashboard/skel-panels.min.js"></script>
<script src="/dublindashboard/js/Dashboard/skel-layers.min.js"></script> 
<script src="/dublindashboard/js/Dashboard/init.js"></script> -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.css" /> 
<style type="text/css">
    .leaflet-popup-content {
        /*margin: 14px 20px;*/
        /*//overflow: scroll;*/
        min-width: 50px;
        /*//max-Width: 600px;*/
        width:auto !important;
        font-size: 18px;
    }
    .leaflet-control-layers-expanded {
        padding: 6px 10px 6px 6px;
        font: 18px/1.5 "Helvetica Neue", Arial, Helvetica, sans-serif;
        color: #333;
        background: #fff;
        text-align: left;
    }
    .leaflet-div-icon {
        background: transparent;
        border: none;
        color:white;
    }

    .leaflet-marker-icon .number{
        position: relative;
        top: -44px;
        font-size: 14px;
        width: 25px;
        text-align: center;
    }

    .legend {
        text-align: left;
        line-height: 18px;
        color: #555;
        background-color:white;
    }

    .legend i {
        width: 18px;
        height: 18px;
        clear:both;
        float:left;
    }

    .info {
        padding: 2px 8px;

        background: white;
        background: rgba(255,255,255,0.8);
        box-shadow: 0 0 15px rgba(0,0,0,0.2);
        border-radius: 5px;
    }

    .info h4 {
        margin: 0 0 5px;
        color: #777;
    }


    p.intab {
        color: blue;
        padding: 0;
        margin: 0;
        font-size: 1em;
    }

    p.attribution {
        color: blue;
        padding: 0;
        margin: 0;
        font-size: 0.6em;
    }

</style>
    <body onload="myFunction()">

        <div id="map" style="width: 100%; height: 100%"></div>



       <!-- <script src="https://dl.dropboxusercontent.com/u/37626989/leaflet-src.js"></script> -->
       <!--<script src="http://code.jquery.com/jquery-1.8.1.min.js"></script> -->
   <!-- <script src="/dublindashboard/js/leaflet.js"></script> -->
<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script> 
<script src="/dublindashboard/js/carparks.js"></script>
<script src="/dublindashboard/js/soundsites.js"></script>
<script src="/dublindashboard/js/M50.js"></script>
<script src="/dublindashboard/js/R1D1.js"></script>
<!-- <script src="/dublindashboard/js/leaflet_numbered_markers.js"></script> -->
<script src="/dublindashboard/js/TileLayer.Grayscale.js"></script>
<!-- <script src="/dublindashboard/js/leaflet-list-markers.js"></script> -->
<script src="/dublindashboard/js/carParkCapacities.js"></script>

<script>
    
    let cork_lat =51.8196473;
    let cork_lng = -8.8043306;

// check browser version type

        function get_browser_info() {
            var ua = navigator.userAgent, tem, M = ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
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

        var browser = get_browser_info();
//alert(browser.name);



        //EPAOverall Air Quality
        $.get("/CarParks/airQuality", function (point) {
            obj = JSON.parse(point);
            var count = 6; //there are 6 results in the return
            for (var i = 0; i < count; i++) {
                if (obj.aqihsummary[i]["aqih-region"] == "Cork_City") {
                    var airReport = "Current Air Quality Index for Health for " + obj.aqihsummary[i]["aqih-region"] + " is " + obj.aqihsummary[i].aqih

                    var div = document.getElementById('airQuality');
                    div.innerHTML = div.innerHTML + airReport;
                    if (obj.aqihsummary[i].aqih == "1,Good") {
                        div.style.backgroundColor = 'green';
                        div.style.color = 'white';
                    } else if (obj.aqihsummary[i].aqih == "2,Good") {
                        div.style.backgroundColor = 'green';
                        div.style.color = 'white';
                    } else if (obj.aqihsummary[i].aqih == "3,Good") {
                        div.style.backgroundColor = 'green';
                        div.style.color = 'white';
                    } else if (obj.aqihsummary[i].aqih == "4,Fair") {
                        div.style.backgroundColor = 'orange';
                        div.style.color = 'white';
                    } else if (obj.aqihsummary[i].aqih == "5,Fair") {
                        div.style.backgroundColor = 'orange';
                        div.style.color = 'white';
                    } else if (obj.aqihsummary[i].aqih == "6,Fair") {
                        div.style.backgroundColor = 'orange';
                        div.style.color = 'white';
                    } else {
                        div.style.backgroundColor = 'red';
                        div.style.color = 'white';
                    }
                }
            }


        }); //END AirQuality


//Map Styling
//Individual AirQuality Locations

        var airQualitySite1 = {//Cork Institute of Technology
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

        var airQualitySite2 = {//South Link Road
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

        var airQualitySite3 = {//Rathmines
            "type": "Feature",
            "properties": {
                "amenity": "EPA Environmental Sensor",
                "popupContent": "<h5><b>EPA Site: Rathmines </b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://erc.epa.ie/real-time-air/www/images/epaweb/JPG/Rathmines_past7days_O3_NO2_SO2.jpg\" width=\"400px\"> </td></tr> </table> ",
            },
            "geometry": {
                "type": "Point",
                "coordinates": [-6.2667394, 53.322065]
            }
        };

        var airQualitySite4 = {//Swords
            "type": "Feature",
            "properties": {
                "amenity": "EPA Environmental Sensor",
                "popupContent": "<h5><b>EPA Site: Swords </b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://erc.epa.ie/real-time-air/www/images/epaweb/JPEG/Swords_O3_Swords_NOX_past7days_O3_NO2.JPG\" width=\"400px\"> </td></tr> </table> ",
            },
            "geometry": {
                "type": "Point",
                "coordinates": [-6.22428, 53.4578, ]
            }
        };

        var airQualitySite5 = {//winetavern street
            "type": "Feature",
            "properties": {
                "amenity": "EPA Environmental Sensor",
                "popupContent": "<h5><b>EPA Site: Winetavern Street </b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://erc.epa.ie/real-time-air/www/images/epaweb/JPG/Winetavern_Street_past7days_NO2_SO2.JPG\" width=\"400px\"> </td></tr> </table> ",
            },
            "geometry": {
                "type": "Point",
                "coordinates": [-6.2718196, 53.3438963]
            }
        };


        var airQualitySiteOptions = {
            radius: 10,
            fillColor: "#5F5293",
            fillOpacity: 1,
            opacity: 1,
            color: "#000"
        };

        var map;



        var cloudmadeUrl = 'http://{s}.tile.cloudmade.com/BC9A493B41014CAABB98F0471D759707/997/256/{z}/{x}/{y}.png',
                cloudmadeAttribution = 'Map data &copy; 2011 OpenStreetMap contributors, Imagery &copy; 2011 CloudMade',
                cloudmade = new L.TileLayer(cloudmadeUrl, {maxZoom: 18, attribution: cloudmadeAttribution});

        var mapquestUrl = 'http://otile{s}.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png',
                mapquestAttribution = "Data CC-By-SA by <a href='http://openstreetmap.org/' target='_blank'>OpenStreetMap</a>, Tiles Courtesy of <a href='http://open.mapquest.com' target='_blank'>MapQuest</a>",
                mapquestGrey = new L.TileLayer.Grayscale(mapquestUrl, {maxZoom: 18, attribution: mapquestAttribution, subdomains: ['1', '2', '3', '4'], bgcolor: '0x80BDE3'});
        mapquestColour = new L.TileLayer(mapquestUrl, {maxZoom: 18, attribution: mapquestAttribution, subdomains: ['1', '2', '3', '4'], bgcolor: '0x80BDE3'});

        //create the tile layer with correct attribution
        var osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        var osmAttrib = 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors';
        var osm = new L.TileLayer(osmUrl, {maxZoom: 18, attribution: osmAttrib});
        var osmGrey = new L.TileLayer.Grayscale(osmUrl, {maxZoom: 18, attribution: osmAttrib});

//alert(browser.version);
//alert(browser.name);


        if (browser.name == 'MSIE' && browser.version == '9') {
//alert(browser.version);
//alert(browser.name);
//alert('OK');

            map = new L.Map('map', {
                center: new L.LatLng(cork_lat, cork_lng),
                zoom: 9,
                layers: [osm],
                zoomControl: true
            });

        } else if (browser.name == 'MSIE' && browser.version == '10') {
//alert(browser.version);
//alert(browser.name);
//alert('OK');

            map = new L.Map('map', {
                center: new L.LatLng(cork_lat, cork_lng),
                zoom: 9,
                layers: [osm],
                zoomControl: true
            });

        } else if (browser.name == 'Firefox' && browser.version == '8') {
//alert(browser.version);
//alert(browser.name);
//alert('OK');

            map = new L.Map('map', {
                center: new L.LatLng(cork_lat, cork_lng),
                zoom: 9,
                layers: [osm],
                zoomControl: true
            });

        } else if (browser.name == 'Firefox' && browser.version == '7') {
//alert(browser.version);
//alert(browser.name);
//alert('OK');

            map = new L.Map('map', {
                center: new L.LatLng(cork_lat, cork_lng),
                zoom: 9,
                layers: [osm],
                zoomControl: true
            });

        } else {
            map = new L.Map('map', {
                center: new L.LatLng(cork_lat, cork_lng),
                zoom: 9,
                layers: [osmGrey],
                zoomControl: true
            });
        }
        map.addEventListener('click', onMapClick);
        //LEGEND
        var legend = L.control({position: 'topleft'});
        legend.onAdd = function (map) {
            var div = L.DomUtil.create('div', 'info legend'),
                    grades = [0, 10, 20, 30, 40, 50, 60, 70, 80, 90],
                    labels = [],
                    from, to;
            /*labels.push('Ambient Sound Level'); 
             for (var i = 0; i < grades.length; i++) {
             from = grades[i];
             to = grades[i + 1];
             labels.push('<i style="background: '+setAmbientSoundColor(from)+ '"></i> ' +
             from + (to ? 'db&ndash;' + to +'db' : 'db'+'+'));
             }*/
            labels.push('Water Levels');
            labels.push('<i style="background: #deebf7"></i>  Decreasing');
            labels.push('<i style="background: #9ecae1"></i>  No Change');
            labels.push('<i style="background: #3182bd"></i>  Increasing');
            labels.push('EPA Site');
            labels.push('<i style="background: #5F5293"></i>  Site Location');
            div.innerHTML = labels.join('<br>');
            return div;
        };

        legend.addTo(map);

        function getSoundSiteName(propertName) {
            return soundsites[propertName];

        }
        ;


        function getJunctionName(propertyName) {
            return M50[propertyName];
        }
        ;


        var groupAir = new L.FeatureGroup();
        var soundSites = new L.FeatureGroup();
        var waterSites = new L.FeatureGroup();
        var weatherSites = new L.FeatureGroup();
        //var layerControl = new L.LayerControl();


        var baseMaps = {
            //"MQ Greyscale": mapquestGrey,
            // "MQ Colour": mapquestColour,
            "OSM Greyscale": osmGrey,
            "OSM Colour": osm

        };

        var overlayMaps = {
            "EPA Monitoring Sites": groupAir,
            // "Ambient Sound Recording Sites": soundSites,
            "EPA Water Level Sites": waterSites,
            "Weather Sites": weatherSites
        };

        layerControl = L.control.layers(baseMaps, overlayMaps);
        layerControl.addTo(map);
        var initial = 0;  //check to add everythign initially to first map.


        function myFunction() {
            initial++;
            groupAir.clearLayers();//air quality ou
            soundSites.clearLayers(); //ambient sound
            waterSites.clearLayers();
            weatherSites.clearLayers();
            $row = 1;

            /*        //hydro levels
             $.get("/CarParks/hydroLevels", function(point){
             obj = JSON.parse(point);
             for(i = 0; i< 30; i=i+7){  
             var text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> Water Level at "+obj[i]+"  </p><b> "+obj[i+3]+":  " +obj[i+4]+"m <br>"+obj[i+5] +": "+obj[i+6] +"m                         </b></td></tr></table>"
             var hydroLevelSite = {
             "type": "Feature",
             "properties": {
             "name": ""+obj[i],
             "amenity": "River Level",
             "popupContent": text,
             },
             "geometry": {
             "type": "Point",
             "coordinates": [obj[i+2],obj[i+1]]
             }
             };
             
             var hydroLevelSiteOptions = {
             radius: 8,
             fillColor: setWaterGuageColour(obj[i+4], obj[i+6]),
             color: "#000",
             weight: 1,
             opacity: 1,
             fillOpacity: 1 
             };
             
             waterSites.addLayer( L.geoJson(hydroLevelSite,{ 
             onEachFeature: onEachFeature,  pointToLayer: function (feature, latlng) {
             return L.circleMarker(latlng, hydroLevelSiteOptions);
             }}));
             }
             
             });
             
             
             //water levels                 
             $.get("/CarParks/readWaterLevels", function(point){
             obj = JSON.parse(point);
             
             for(i = 0; i< 27; i=i+7){     
             var text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> Water Level at "+obj[i]+" </p><b> "+obj[i+3]+":  " +obj[i+4]+"m <br>"+obj[i+5] +": "+obj[i+6] +"m                          </b></td></tr></table>"
             var waterLevelSite = {
             "type": "Feature",
             "properties": {
             "name": ""+obj[i+0],
             "amenity": "River Level",
             "popupContent": text,
             },
             "geometry": {
             "type": "Point",
             "coordinates": [obj[i+2],obj[i+1]]
             }
             };
             
             var waterLevelSiteOptions = {
             radius: 8,
             fillColor: setWaterGuageColour(obj[i+4], obj[i+6]),
             color: "#000",
             weight: 1,
             opacity: 1,
             fillOpacity: 1 //setMarkerIntensity(spaces)
             };
             
             waterSites.addLayer( L.geoJson(waterLevelSite,{ 
             onEachFeature: onEachFeature,  pointToLayer: function (feature, latlng) {
             return L.circleMarker(latlng, waterLevelSiteOptions);
             }}));
             }
             
             });
             */

//weather 
            /* for(var j = 1; j<7;j++){ //all the stations that we have
             var action = "/CarParks/weather/"+j;
             $.get(action, function(point){
             obj = JSON.parse(point);
             var lat = obj.current_observation.display_location.latitude;
             var lon = obj.current_observation.display_location.longitude;
             var name = obj.current_observation.observation_location.city;
             var currentTemp = obj.current_observation.temp_c;
             var currentWeather = obj.current_observation.weather;
             var url = obj.current_observation.ob_url;
             
             var weatherIcon = L.Icon.extend({
             options: {
             iconSize:     [36, 45], 
             iconAnchor:   [18, 45],
             popupAnchor:  [-3, -46]
             }
             });
             
             var weatherIcon= new weatherIcon({iconUrl: '/dublindashboard/img/Dashboard/icons/weather_icon.png'});    
             var siteId = "weatehrSite1";
             var text = "<table style=\"width:300px\"><tr><td><p class=\"intab\">Conditions at "+name+"</p><b> Weather: "+ currentWeather +"<br> Temperature: " +currentTemp + " Celcius </b></td></tr><tr><td><p class=\"attribution\">Data obtained from wunderground <a href=\""+url+"\"  target=\"_blank\">(more)</a></p></tr></td></table>";
             
             var weatherSite = {
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
             
             var weatherSiteOptions = {
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
            var action = "/CarParks/nraWeather/" + 1;
            $.get(action, function (point) {
                obj = JSON.parse(point);
                for (var i = 0; i < 86; i++) {
                    var lat = obj[i].lat[0];
                    var lon = obj[i].lon[0];
                    var name = obj[i].siteName[0];
                    var id = obj[i].siteID[0];
                    var number = obj[i].number[0];

                    var currentTemp = obj[i].temp[0];
                    var windSpeed = obj[i].windSpeed[0];
                    var windDirection = obj[i].windDirection[0];
                    var roadTemp = obj[i].roadTemp[0];
                    var precipitation = obj[i].precipitation[0];
                    var currentWeather = "";


                    if (!precipitation) {
                        var precipitation = "NA";
                    }

                    var weatherIcon = L.Icon.extend({
                        options: {
                            iconSize: [40, 40],
                            iconAnchor: [20, 40],
                            popupAnchor: [-3, -41]
                        }
                    });

                    var weatherIcon = new weatherIcon({iconUrl: '/dublindashboard/img/Dashboard/icons/weather_icon.png'});
                    var siteId = "weatehrSite1";
                    var text = "<table style=\"width:300px\"><tr><td><p class=\"intab\">Conditions at " + name + "</p><b> Weather: " + currentWeather + "<br> Air Temperature: " + currentTemp + " Celcius <br> Road Temperature: " + roadTemp + "<br> Wind Speed: " + windSpeed + " <br> Wind Direction: " + windDirection + "<br> Precipitation: " + precipitation + " </b></td></tr><tr><td><p class=\"attribution\">Data obtained from TIF </p></tr></td></table>";

                    var weatherSite = {
                        "type": "Feature",
                        "properties": {
                            "name": "" + name,
                            "amenity": "weatherStation",
                            "popupContent": text,
                        },
                        "geometry": {
                            "type": "Point",
                            "coordinates": [lon, lat]
                        }
                    };

                    var weatherSiteOptions = {
                        radius: 8,
                        fillColor: "#228B22",
                        color: "#000",
                        weight: 1,
                        opacity: 1,
                        fillOpacity: 1 //setMarkerIntensity(spaces)
                    };
                    weatherSites.addLayer(L.geoJson(weatherSite, {
                        onEachFeature: onEachWeatherFeature, pointToLayer: function (feature, latlng) {
                            return L.marker(latlng, {icon: weatherIcon}).bindPopup(weatherSite.popupContent);
                            ;
                        }}));
                }//end for
            });

            function onEachWeatherFeature(feature, layer) {
                popup = layer.bindPopup(layer.feature.properties.popupContent);  //essential

            }

            var previousWaterLevels = null;

            //Cork Water Levels Previous

            /*$.get("/CarParks/corkWaterLevels/1", function(point){
             previousWaterLevels = JSON.parse(point);
             // add a delay
             });*/

            $.ajax({
                async: false,
                type: 'GET',
                url: '/CarParks/corkWaterLevels/1',
                success: function (point) {
                    previousWaterLevels = JSON.parse(point);

                }
            });


            //Cork Water Levels Current
            $.get("/CarParks/corkWaterLevels/0", function (point) {
                obj = JSON.parse(point);
                ///get the other file and then compare


                // alert(previousWaterLevels);

                //  {"geometry": {"type": "Point", "coordinates": [-9.0763879999999997, 53.387031999999998]}, "type": "Feature", "id": 1640, "properties": {"url": "/0000030083/0001/", "csv_file": "/data/month/30083_0001.csv", "station.name": "Annaghdown Pier", "value": 0.615, "datetime": "2017-06-10 08:15:00+00:00", "sensor.ref": "0001", "station.ref": "0000030083", "station.region_id": 11, "err_code": 99}}      

                var numOfWaterStations = obj.features.length;
                var previousNumOfWaterStations = obj.features.length;

                for (var i = 0; i < numOfWaterStations; i++) {

                    //if Cork/Dub Stations{
                    if (obj.features[i]["properties"]["station.ref"] < 41000) {
                        //   if(obj.features[i]["properties"]["station.region_id"] == 8){

                        //   }


                        var stationName = obj.features[i]["properties"]["station.name"];
                        var stationRef = obj.features[i]["properties"]["sensor.ref"];
                        var date = obj.features[i]["properties"]["datetime"];
                        var lon = obj.features[i]["geometry"]["coordinates"][0];
                        var lat = obj.features[i]["geometry"]["coordinates"][1];
                        var waterLevel = obj.features[i]["properties"]["value"];
                        var id = obj.features[i]["properties"]["value"];

                        //need to loop through to find matching references
                        for (var j = 0; j < previousNumOfWaterStations; j++) {

                            var previousStationName = previousWaterLevels.features[j]["properties"]["station.name"];
                            var previousStationRef = previousWaterLevels.features[j]["properties"]["sensor.ref"];
                            if (stationName == previousStationName && stationRef == previousStationRef) {
                                //alert("match");
                                var previousWaterLevel = previousWaterLevels.features[j]["properties"]["value"];
                                var previousDate = previousWaterLevels.features[j]["properties"]["datetime"];
                                var previousStationName = previousWaterLevels.features[j]["properties"]["station.name"];
                                break;
                            }



                        }
                        //add to map
                        var text = "<table style=\"width:300px\"><tr><td><b><font color=\"#0000ff\">" + date + ": </font> The Water Level at " + stationName + " is " + waterLevel + " </b></td></tr><tr><td><b><font color=\"#0000ff\">" + previousDate + ": </font>The Water Level at " + previousStationName + " was " + +previousWaterLevel + " </b></td></tr></table>";

                        var waterLevelSite = {
                            "type": "Feature",
                            "properties": {
                                "name": stationName,
                                "amenity": "Water Level",
                                "popupContent": text,
                            },
                            "geometry": {
                                "type": "Point",
                                "coordinates": [lon, lat]
                            }
                        };

                        var waterLevelSiteOptions = {
                            radius: 8,
                            //fillColor: "#ff7800",
                            fillColor: setWaterColour(waterLevel, previousWaterLevel),
                            color: "#000",
                            weight: 1,
                            opacity: 1,
                            fillOpacity: 1 //setMarkerIntensity(spaces)
                        };







                        waterSites.addLayer(L.geoJson(waterLevelSite, {
                            onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                                return L.circleMarker(latlng, waterLevelSiteOptions);
                            }}));
                        //}
                    }
                }

            }
            );






//sound sites
//only for a single site  
            $.get("/CarParks/ambientSound1", function (point) {
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count - 1;

                var previousValue = obj.aleq[lastEntry - 12];
                var previousTime = obj.times[lastEntry - 12];
                var previousDate = obj.dates[lastEntry - 12];
                var value = obj.aleq[lastEntry];
                var currentTime = obj.times[lastEntry];
                var currentDate = obj.dates[lastEntry];


                var siteId = "Site1";
                var text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> Sound Level at " + getSoundSiteName(siteId).name + "</p><b> " + currentDate + " " + currentTime + ": " + value + "db<br>" + previousDate + " " + previousTime + ": " + previousValue + "db </b></td></tr></table>"

                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                        "name": "" + getSoundSiteName(siteId),
                        "amenity": "Ambient Sound Site",
                        "popupContent": text,
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [getSoundSiteName(siteId).lat, getSoundSiteName(siteId).lon]
                    }
                };

                var ambientSoundSiteOptions = {
                    radius: 8,
                    fillColor: setAmbientSoundColor(value), //colours[i], //
                    color: "#000",
                    weight: 1,
                    opacity: 1,
                    fillOpacity: 1 //setMarkerIntensity(spaces)
                };

                soundSites.addLayer(L.geoJson(ambientSoundSite, {
                    onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                        return L.circleMarker(latlng, ambientSoundSiteOptions);
                    }}));

            });
            //
            $.get("/CarParks/ambientSound2", function (point) {
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count - 1;
                var previousValue = obj.aleq[lastEntry - 12];
                var previousTime = obj.times[lastEntry - 12];
                var previousDate = obj.dates[lastEntry - 12];
                var value = obj.aleq[lastEntry];
                var currentTime = obj.times[lastEntry];
                var currentDate = obj.dates[lastEntry];
                var siteId = "Site2";

                var text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> Sound Level at " + getSoundSiteName(siteId).name + "</p><b> " + currentDate + " " + currentTime + ": " + value + "db<br>" + previousDate + " " + previousTime + ": " + previousValue + "db </b> </td></tr></table>"

                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                        "name": "" + getSoundSiteName(siteId),
                        "amenity": "Ambient Sound Site",
                        "popupContent": text,
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [getSoundSiteName(siteId).lat, getSoundSiteName(siteId).lon]
                    }
                };

                var ambientSoundSiteOptions = {
                    radius: 8,
                    fillColor: setAmbientSoundColor(value), //colours[i], //
                    color: "#000",
                    weight: 1,
                    opacity: 1,
                    fillOpacity: 1 //setMarkerIntensity(spaces)
                };

                soundSites.addLayer(L.geoJson(ambientSoundSite, {
                    onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                        return L.circleMarker(latlng, ambientSoundSiteOptions);
                    }}));

            });

            //
            $.get("/CarParks/ambientSound3", function (point) {
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count - 1;
                var previousValue = obj.aleq[lastEntry - 12];
                var previousTime = obj.times[lastEntry - 12];
                var previousDate = obj.dates[lastEntry - 12];
                var value = obj.aleq[lastEntry];
                var currentTime = obj.times[lastEntry];
                var currentDate = obj.dates[lastEntry];
                var siteId = "Site3";

                var text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> Sound Level at " + getSoundSiteName(siteId).name + "</p><b> " + currentDate + " " + currentTime + ": " + value + "db<br>" + previousDate + " " + previousTime + ": " + previousValue + "db </b></td></tr></table>"

                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                        "name": "" + getSoundSiteName(siteId),
                        "amenity": "Ambient Sound Site",
                        "popupContent": text,
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [getSoundSiteName(siteId).lat, getSoundSiteName(siteId).lon]
                    }
                };

                var ambientSoundSiteOptions = {
                    radius: 8,
                    //fillColor: "#ff7800",
                    fillColor: setAmbientSoundColor(value), //colours[i], //
                    color: "#000",
                    weight: 1,
                    opacity: 1,
                    fillOpacity: 1 //setMarkerIntensity(spaces)
                };

                soundSites.addLayer(L.geoJson(ambientSoundSite, {
                    onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                        return L.circleMarker(latlng, ambientSoundSiteOptions);
                    }}));

            });

            //
            $.get("/CarParks/ambientSound4", function (point) {
                obj = JSON.parse(point);
                var count = Number(obj.entries);
                var lastEntry = count - 1;
                var previousValue = obj.aleq[lastEntry - 12];
                var previousTime = obj.times[lastEntry - 12];
                var previousDate = obj.dates[lastEntry - 12];
                var value = obj.aleq[lastEntry];
                var currentTime = obj.times[lastEntry];
                var currentDate = obj.dates[lastEntry];
                var siteId = "Site4";

                var text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> Sound Level at " + getSoundSiteName(siteId).name + "</p><b> " + currentDate + " " + currentTime + ": " + value + "db<br>" + previousDate + " " + previousTime + ": " + previousValue + "db </b></td></tr></table>"

                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                        "name": "" + getSoundSiteName(siteId),
                        "amenity": "Ambient Sound Site",
                        "popupContent": text,
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [getSoundSiteName(siteId).lat, getSoundSiteName(siteId).lon]
                    }
                };

                var ambientSoundSiteOptions = {
                    radius: 8,
                    fillColor: setAmbientSoundColor(value), //colours[i], //
                    color: "#000",
                    weight: 1,
                    opacity: 1,
                    fillOpacity: 1 //setMarkerIntensity(spaces)
                };

                soundSites.addLayer(L.geoJson(ambientSoundSite, {
                    onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                        return L.circleMarker(latlng, ambientSoundSiteOptions);
                    }}));

            });

            //
            $.get("/CarParks/ambientSound5", function (point) {
                obj = JSON.parse(point);
                var count = Number(obj.entries);
                var lastEntry = count - 1;
                var previousValue = obj.aleq[lastEntry - 12];
                var previousTime = obj.times[lastEntry - 12];
                var previousDate = obj.dates[lastEntry - 12];
                var value = obj.aleq[lastEntry];
                var currentTime = obj.times[lastEntry];
                var currentDate = obj.dates[lastEntry];
                var siteId = "Site5";

                var text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> Sound Level at " + getSoundSiteName(siteId).name + "</p><b> " + currentDate + " " + currentTime + ": " + value + "db<br>" + previousDate + " " + previousTime + ": " + previousValue + "db </b></td></tr></table>"

                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                        "name": "" + getSoundSiteName(siteId),
                        "amenity": "Ambient Sound Site",
                        "popupContent": text,
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [getSoundSiteName(siteId).lat, getSoundSiteName(siteId).lon]
                    }
                };

                var ambientSoundSiteOptions = {
                    radius: 8,
                    fillColor: setAmbientSoundColor(value),
                    //fillColor: setMarkerColor(spaces), //colours[i], //
                    color: "#000",
                    weight: 1,
                    opacity: 1,
                    fillOpacity: 1 //setMarkerIntensity(spaces)
                };

                soundSites.addLayer(L.geoJson(ambientSoundSite, {
                    onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                        return L.circleMarker(latlng, ambientSoundSiteOptions);
                    }}));

            });

            //
            $.get("/CarParks/ambientSound6", function (point) {
                obj = JSON.parse(point);
                var count = Number(obj.entries);
                var lastEntry = count - 1;
                var previousValue = obj.aleq[lastEntry - 12];
                var previousTime = obj.times[lastEntry - 12];
                var previousDate = obj.dates[lastEntry - 12];
                var value = obj.aleq[lastEntry];
                var currentTime = obj.times[lastEntry];
                var currentDate = obj.dates[lastEntry];
                var siteId = "Site6";

                var text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> <b>Sound Level at " + getSoundSiteName(siteId).name + "</p><b> " + currentDate + " " + currentTime + ": " + value + "db<br>" + previousDate + " " + previousTime + ": " + previousValue + "db </b></td></tr></table>"

                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                        "name": "" + getSoundSiteName(siteId),
                        "amenity": "Ambient Sound Site",
                        "popupContent": text,
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [getSoundSiteName(siteId).lat, getSoundSiteName(siteId).lon]
                    }
                };

                var ambientSoundSiteOptions = {
                    radius: 8,
                    fillColor: setAmbientSoundColor(value), //colours[i], //
                    color: "#000",
                    weight: 1,
                    opacity: 1,
                    fillOpacity: 1 //setMarkerIntensity(spaces)
                };

                soundSites.addLayer(L.geoJson(ambientSoundSite, {
                    onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                        return L.circleMarker(latlng, ambientSoundSiteOptions);
                    }}));

            });

            //
            $.get("/CarParks/ambientSound7", function (point) {
                obj = JSON.parse(point);
                var count = Number(obj.entries);
                var lastEntry = count - 1;
                var previousValue = obj.aleq[lastEntry - 12];
                var previousTime = obj.times[lastEntry - 12];
                var previousDate = obj.dates[lastEntry - 12];
                var value = obj.aleq[lastEntry];
                var currentTime = obj.times[lastEntry];
                var currentDate = obj.dates[lastEntry];
                var siteId = "Site7";

                var text = "<table style=\"width:300px\"><tr><td><p class=\"intab\">  Sound Level at " + getSoundSiteName(siteId).name + "</p><b> " + currentDate + " " + currentTime + ": " + value + "db<br>" + previousDate + " " + previousTime + ": " + previousValue + "db </b> </td></tr></table>"

                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                        "name": "" + getSoundSiteName(siteId),
                        "amenity": "Ambient Sound Site",
                        "popupContent": text,
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [getSoundSiteName(siteId).lat, getSoundSiteName(siteId).lon]
                    }
                };

                var ambientSoundSiteOptions = {
                    radius: 8,
                    fillColor: setAmbientSoundColor(value), //colours[i], //
                    color: "#000",
                    weight: 1,
                    opacity: 1,
                    fillOpacity: 1 //setMarkerIntensity(spaces)
                };

                soundSites.addLayer(L.geoJson(ambientSoundSite, {
                    onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                        return L.circleMarker(latlng, ambientSoundSiteOptions);
                    }}));

            });

            //
            $.get("/CarParks/ambientSound8", function (point) {
                obj = JSON.parse(point);
                var count = Number(obj.entries);
                var lastEntry = count - 1;
                var previousValue = obj.aleq[lastEntry - 12];
                var previousTime = obj.times[lastEntry - 12];
                var previousDate = obj.dates[lastEntry - 12];
                var value = obj.aleq[lastEntry];
                var currentTime = obj.times[lastEntry];
                var currentDate = obj.dates[lastEntry];
                var siteId = "Site8";

                var text = "<table style=\"width:300px\"><tr><td><p class=\"intab\">  Sound Level at " + getSoundSiteName(siteId).name + "</p><b> " + currentDate + " " + currentTime + ": " + value + "db<br>" + previousDate + " " + previousTime + ": " + previousValue + "db </b> </td></tr></table>"

                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                        "name": "" + getSoundSiteName(siteId),
                        "amenity": "Ambient Sound Site",
                        "popupContent": text,
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [getSoundSiteName(siteId).lat, getSoundSiteName(siteId).lon]
                    }
                };

                var ambientSoundSiteOptions = {
                    radius: 8,
                    fillColor: setAmbientSoundColor(value), //colours[i], //
                    color: "#000",
                    weight: 1,
                    opacity: 1,
                    fillOpacity: 1 //setMarkerIntensity(spaces)
                };

                soundSites.addLayer(L.geoJson(ambientSoundSite, {
                    onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                        return L.circleMarker(latlng, ambientSoundSiteOptions);
                    }}));

            });

            //
            $.get("/CarParks/ambientSound9", function (point) {
                obj = JSON.parse(point);
                var count = Number(obj.entries);
                var lastEntry = count - 1;
                var previousValue = obj.aleq[lastEntry - 12];
                var previousTime = obj.times[lastEntry - 12];
                var previousDate = obj.dates[lastEntry - 12];
                var value = obj.aleq[lastEntry];
                var currentTime = obj.times[lastEntry];
                var currentDate = obj.dates[lastEntry];
                var siteId = "Site9";

                var text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> Sound Level at " + getSoundSiteName(siteId).name + "</p><b> " + currentDate + " " + currentTime + ": " + value + "db<br>" + previousDate + " " + previousTime + ": " + previousValue + "db </b></td></tr></table>"

                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                        "name": "" + getSoundSiteName(siteId),
                        "amenity": "Ambient Sound Site",
                        "popupContent": text,
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [getSoundSiteName(siteId).lat, getSoundSiteName(siteId).lon]
                    }
                };

                var ambientSoundSiteOptions = {
                    radius: 8,
                    fillColor: setAmbientSoundColor(value), //colours[i], //
                    color: "#000",
                    weight: 1,
                    opacity: 1,
                    fillOpacity: 1 //setMarkerIntensity(spaces)
                };

                soundSites.addLayer(L.geoJson(ambientSoundSite, {
                    onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                        return L.circleMarker(latlng, ambientSoundSiteOptions);
                    }}));

            });

            //
            $.get("/CarParks/ambientSound10", function (point) {
                obj = JSON.parse(point);
                var count = Number(obj.entries);
                var lastEntry = count - 1;
                var previousValue = obj.aleq[lastEntry - 12];
                var previousTime = obj.times[lastEntry - 12];
                var previousDate = obj.dates[lastEntry - 12];
                var value = obj.aleq[lastEntry];
                var currentTime = obj.times[lastEntry];
                var currentDate = obj.dates[lastEntry];
                var siteId = "Site10";

                var text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> Sound Level at " + getSoundSiteName(siteId).name + "</p> <b>" + currentDate + " " + currentTime + ": " + value + "db<br>" + previousDate + " " + previousTime + ": " + previousValue + "db </td></tr></table>"

                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                        "name": "" + getSoundSiteName(siteId),
                        "amenity": "Ambient Sound Site",
                        "popupContent": text,
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [getSoundSiteName(siteId).lat, getSoundSiteName(siteId).lon]
                    }
                };

                var ambientSoundSiteOptions = {
                    radius: 8,
                    fillColor: setAmbientSoundColor(value), //colours[i], //
                    color: "#000",
                    weight: 1,
                    opacity: 1,
                    fillOpacity: 1 //setMarkerIntensity(spaces)
                };

                soundSites.addLayer(L.geoJson(ambientSoundSite, {
                    onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                        return L.circleMarker(latlng, ambientSoundSiteOptions);
                    }}));

            });
            //
            $.get("/CarParks/ambientSound11", function (point) {
                obj = JSON.parse(point);
                var count = Number(obj.entries);
                var lastEntry = count - 1;
                var previousValue = obj.aleq[lastEntry - 12];
                var previousTime = obj.times[lastEntry - 12];
                var previousDate = obj.dates[lastEntry - 12];
                var value = obj.aleq[lastEntry];
                var currentTime = obj.times[lastEntry];
                var currentDate = obj.dates[lastEntry];
                var siteId = "Site11";

                var text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> Sound Level at " + getSoundSiteName(siteId).name + "</p><b> " + currentDate + " " + currentTime + ": " + value + "db<br>" + previousDate + " " + previousTime + ": " + previousValue + "db </td></tr></table>"

                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                        "name": "" + getSoundSiteName(siteId),
                        "amenity": "Ambient Sound Site",
                        "popupContent": text,
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [getSoundSiteName(siteId).lat, getSoundSiteName(siteId).lon]
                    }
                };

                var ambientSoundSiteOptions = {
                    radius: 8,
                    fillColor: setAmbientSoundColor(value), //colours[i], //
                    color: "#000",
                    weight: 1,
                    opacity: 1,
                    fillOpacity: 1 //setMarkerIntensity(spaces)
                };

                soundSites.addLayer(L.geoJson(ambientSoundSite, {
                    onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                        return L.circleMarker(latlng, ambientSoundSiteOptions);
                    }}));

            });
            //
            $.get("/CarParks/ambientSound12", function (point) {
                obj = JSON.parse(point);
                var count = Number(obj.entries);
                var lastEntry = count - 1;
                var previousValue = obj.aleq[lastEntry - 12];
                var previousTime = obj.times[lastEntry - 12];
                var previousDate = obj.dates[lastEntry - 12];
                var value = obj.aleq[lastEntry];
                var currentTime = obj.times[lastEntry];
                var currentDate = obj.dates[lastEntry];
                var siteId = "Site12";

                var text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> Sound Level at " + getSoundSiteName(siteId).name + "</p><b> " + currentDate + " " + currentTime + ": " + value + "db<br>" + previousDate + " " + previousTime + ": " + previousValue + "db </td></tr></table>"

                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                        "name": "" + getSoundSiteName(siteId),
                        "amenity": "Ambient Sound Site",
                        "popupContent": text,
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [getSoundSiteName(siteId).lat, getSoundSiteName(siteId).lon]
                    }
                };

                var ambientSoundSiteOptions = {
                    radius: 8,
                    fillColor: setAmbientSoundColor(value), //colours[i], //
                    color: "#000",
                    weight: 1,
                    opacity: 1,
                    fillOpacity: 1 //setMarkerIntensity(spaces)
                };

                soundSites.addLayer(L.geoJson(ambientSoundSite, {
                    onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                        return L.circleMarker(latlng, ambientSoundSiteOptions);
                    }}));

            });
            //
            $.get("/CarParks/ambientSound13", function (point) {
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count - 1;
                var previousValue = obj.aleq[lastEntry - 12];
                var previousTime = obj.times[lastEntry - 12];
                var previousDate = obj.dates[lastEntry - 12];
                var value = obj.aleq[lastEntry];
                var currentTime = obj.times[lastEntry];
                var currentDate = obj.dates[lastEntry];
                var siteId = "Site13";

                var text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> Sound Level at " + getSoundSiteName(siteId).name + "</p><b> " + currentDate + " " + currentTime + ": " + value + "db<br>" + previousDate + " " + previousTime + ": " + previousValue + "db </td></tr></table>"

                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                        "name": "" + getSoundSiteName(siteId),
                        "amenity": "Ambient Sound Site",
                        "popupContent": text,
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [getSoundSiteName(siteId).lat, getSoundSiteName(siteId).lon]
                    }
                };

                var ambientSoundSiteOptions = {
                    radius: 8,
                    fillColor: setAmbientSoundColor(value), //colours[i], //
                    color: "#000",
                    weight: 1,
                    opacity: 1,
                    fillOpacity: 1 //setMarkerIntensity(spaces)
                };

                soundSites.addLayer(L.geoJson(ambientSoundSite, {
                    onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                        return L.circleMarker(latlng, ambientSoundSiteOptions);
                    }}));

            });
            //
            $.get("/CarParks/ambientSound14", function (point) {
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count - 1;
                var previousValue = obj.aleq[lastEntry - 12];
                var previousTime = obj.times[lastEntry - 12];
                var previousDate = obj.dates[lastEntry - 12];
                var value = obj.aleq[lastEntry];
                var currentTime = obj.times[lastEntry];
                var currentDate = obj.dates[lastEntry];
                var siteId = "Site14";

                var text = "<table style=\"width:300px\"><tr><td><p class=\"intab\"> Sound Level at " + getSoundSiteName(siteId).name + "</p><b> " + currentDate + " " + currentTime + ": " + value + "db<br>" + previousDate + " " + previousTime + ": " + previousValue + "db </td></tr></table>"

                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                        "name": "" + getSoundSiteName(siteId),
                        "amenity": "Ambient Sound Site",
                        "popupContent": text,
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [getSoundSiteName(siteId).lat, getSoundSiteName(siteId).lon]
                    }
                };

                var ambientSoundSiteOptions = {
                    radius: 8,
                    fillColor: setAmbientSoundColor(value), //colours[i], //
                    color: "#000",
                    weight: 1,
                    opacity: 1,
                    fillOpacity: 1 //setMarkerIntensity(spaces)
                };

                //Ambient Sound
                soundSites.addLayer(L.geoJson(ambientSoundSite, {
                    onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                        return L.circleMarker(latlng, ambientSoundSiteOptions);
                    }}));

                //airQuality
                groupAir.addLayer(L.geoJson(airQualitySite1, {
                    onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                        return L.circleMarker(latlng, airQualitySiteOptions);
                    }}));
                groupAir.addLayer(L.geoJson(airQualitySite2, {
                    onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                        return L.circleMarker(latlng, airQualitySiteOptions);
                    }}));

                groupAir.addLayer(L.geoJson(airQualitySite3, {
                    onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                        return L.circleMarker(latlng, airQualitySiteOptions);
                    }}));
                groupAir.addLayer(L.geoJson(airQualitySite4, {
                    onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                        return L.circleMarker(latlng, airQualitySiteOptions);
                    }}));
                groupAir.addLayer(L.geoJson(airQualitySite5, {//winetavern street
                    onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                        return L.circleMarker(latlng, airQualitySiteOptions);
                    }}));


                if (initial == 1 || map.hasLayer(groupAir)) {
                    groupAir.addTo(map);
                    soundSites.addTo(map);
                    waterSites.addTo(map);
                    weatherSites.addTo(map);
                }
                setTimeout(myFunction, 300000); //milliseconds 300000 - 5mins 



            });

            function onEachFeature(feature, layer) {
                layer.on({
                    mouseover: highlightFeature,
                    mouseout: resetHighlight,
                });

            }





            function resetHighlight(e) {
                var layer = e.target;
                layer.setStyle({// highlight the feature
                    weight: 1,
                    color: '#666',
                    dashArray: '',
                });
            }


            function highlightFeature(e) {
                var layer = e.target;

                layer.setStyle({// highlight the feature
                    weight: 5,
                    color: '#666',
                    dashArray: '',
                });

                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }
                popup = layer.bindPopup(layer.feature.properties.popupContent);  //essential
            }






//CARPARKS
            $.get("/CarParks/nowParking", function (point) {
                function onEachFeature(feature, layer) {
                    layer.on({
                        mouseover: highlightFeature,
                        mouseout: resetHighlight,
                    });

                }

                function resetHighlight(e) {
                    var layer = e.target;
                    layer.setStyle({// highlight the feature
                        weight: 1,
                        color: '#666',
                        dashArray: '',
                        //fillOpacity: setMarkerIntensity(
                    });
                }

                function highlightFeature(e) {
                    var layer = e.target;

                    layer.setStyle({// highlight the feature
                        weight: 5,
                        color: '#666',
                        dashArray: '',
                        //fillOpacity: 0.6
                    });

                    if (!L.Browser.ie && !L.Browser.opera) {
                        layer.bringToFront();
                    }

                    popup = layer.bindPopup(layer.feature.properties.popupContent);  //essential
                }


                function highlightRoadFeature(e) {
                    var layer = e.target;

                    layer.setStyle({// highlight the feature
                        weight: 10,
                        color: '#FF0000',
                        dashArray: '',
                        //fillOpacity: 0.6
                    });

                    if (!L.Browser.ie && !L.Browser.opera) {
                        layer.bringToFront();
                    }

                    layer.bindPopup(layer.feature.properties.popupContent);  //essential
                }
            });


        }

        function setWaterGuageColour(currentVal, previousVal) {
            if (currentVal < previousVal) { //falling

                return '#deebf7'
            } else if (currentVal > previousVal) { //rising

                return '#3182bd'

            } else { //no change
                return '#9ecae1'

            }

        }


        function setWaterColour(current, previous) {

            if (current < previous) {
                return '#deebf7'; //decreasing
            } else if (current > previous) {
                return '#9ecae1'; //increasing
            } else
                return '#9ecae1';//no change


        }

        function setAmbientSoundColor(ambientSound) {
            var good = 55;
            var bad = 70;

            return ambientSound < 10 ? '#fff7ec' :
                    ambientSound < 20 ? '#fee8c8' :
                    ambientSound < 30 ? '#fdd49e' :
                    ambientSound < 40 ? '#fdbb84' :
                    ambientSound < 50 ? '#fc8d59' :
                    ambientSound < 60 ? '#ef6548' :
                    ambientSound < 70 ? '#d7301f' :
                    ambientSound < 80 ? '#b30000' :
                    ambientSound < 90 ? '#8f0000' :
                    ambientSound > 90 ? '#7f0000' :
                    '#000000';
        }

        function setTripsColour(travelTime) {
            var good = 10;//need the freeflow traveltime
            return travelTime < good ? '#00FF00' :
                    travelTime > good ? '#FF0000' :
                    '#00FF00';
        }

        function onMapClick(e) {

        }




</script>



