<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>


<div class="onlyContent">
    <div style="border-bottom:2px solid #e5e5e5; width:90%">
        <header>
            <h1>Real Time Environment Map</h1>
            <br>
        </header>
    </div>

    <!--<body onload="myFunction()">-->
    <div class="homeBlock" style="width: 90%; padding-top:25px; padding-bottom:25px">
        <div id="map" style="width: 100%; "></div>
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

<div id="map"></div>
<script>
    function myFunction() {


        let browser = get_browser_info();
        var map;

        let osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        let osmAttrib = 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors';
        let osm = new L.TileLayer(osmUrl, {maxZoom: 18, attribution: osmAttrib});
//        let osmGrey = new L.TileLayer.Grayscale(osmUrl, {maxZoom: 18, attribution: osmAttrib});
        let waterSites = new L.FeatureGroup();


//Initialise Map based on browser
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
//                layers: [osmGrey],
                zoomControl: true
            });
        }

        let baseMaps = {
            //"MQ Greyscale": mapquestGrey,
            // "MQ Colour": mapquestColour,
//            "OSM Greyscale": osmGrey,
            "OSM Colour": osm

        };
        let overlayMaps = {
//        "EPA Monitoring Sites": groupAir,
//        "Ambient Sound Recording Sites": soundSites,
            "EPA Water Level Sites": waterSites
//        "Weather Sites": weatherSites
        };


//                LEGEND
        let legend = L.control({position: 'bottomright'});
        legend.onAdd = function (map) {
            let div = L.DomUtil.create('div', 'info legend'),
                    grades = [0, 10, 20, 30, 40, 50, 60, 70, 80, 90],
                    labels = [],
                    from, to;
//            labels.push('Ambient Sound Level');
//            for (let i = 0; i < grades.length; i++) {
//                from = grades[i];
//                to = grades[i + 1];
//                labels.push('<i style="background: ' + setAmbientSoundColor(from) + '"></i> ' +
//                        from + (to ? 'db&ndash;' + to + 'db' : 'db' + '+'));
//            }
            labels.push('<h2>Water Levels</h2>');
            labels.push('<i style="background: #deebf7"></i>  Decreasing');
            labels.push('<i style="background: #9ecae1"></i>  No Change');
            labels.push('<i style="background: #3182bd"></i>  Increasing');
            labels.push('<h2>EPA Site</h2>');
            labels.push('<i style="background: #5F5293"></i>  Site Location');
            div.innerHTML = labels.join('<br>');
            return div;
        };
        legend.addTo(map);


        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var firefoxIcon = L.icon({
            iconUrl: 'http://joshuafrazier.info/images/firefox.svg',
            iconSize: [38, 95], // size of the icon
            popupAnchor: [0, -15]
        });

//        var customPopup =
//                "Mozilla Toronto Offices <br>" +
//                " <img src='http://joshuafrazier.info/images/maptime.gif' alt='maptime logo gif' width='350px'/>";

        var customOptions =
                {
                    'maxWidth': '10',
                    'className': 'custom'
                };

//        L.marker([52.034439, -8.608861], {icon: firefoxIcon}).bindPopup('Mozilla Toronto Office').addTo(map);



        let previousWaterLevels = null;

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

        $.get("/CarParks/corkWaterLevels/0", function (point) {
            ///get the other file and then compare
            let obj = JSON.parse(point);
            let cnt = 0;
//            console.log("current water levels: " + obj);
            let numOfWaterStations = obj.features.length;
            let previousNumOfWaterStations = obj.features.length;
            console.log("numOfWaterStations: " + numOfWaterStations);
            for (var i = 0; i < numOfWaterStations; i++) {
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
                                + stationName + " is currently"
                                + waterLevel + " </b></td></tr><tr><td><b><font color=\"#0000ff\">"
                                + previousDate + ": </font>The Water Level at "
                                + previousStationName + " was "
                                + previousWaterLevel + " </b></td></tr></table>";
                        // console.log(text);

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
//
//                        waterSites.addLayer(L.geoJson(waterLevelSite, {
//                            onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
//                                return L.circleMarker(latlng, waterLevelSiteOptions);
//                            }}));

//                        waterMarkers.push(L.Marker([52.035439, -8.607861]));
//                        L.marker([lat, lon],{icon: firefoxIcon}).bindPopup(popupTest, customPopupOptions).addTo(map);
//                    L.marker([lat, lon], {icon: firefoxIcon}).bindPopup('test popup').addTo(map);
//                    let m =L.marker([lat, lon], {icon: firefoxIcon}).bindPopup('Mozilla Toronto Office');
//                            m.addTo(map);

                        L.marker([lat, lon], {icon: firefoxIcon}).bindPopup(text).addTo(map); //Too slow!
                        console.log("Added a marker: " + cnt+" for "+stationName);
                        cnt += 1;
                    }
                }
            }
//            waterSites.addTo(map);
//            addMarkersToMap(waterMarkers);

        }); //End of GET for current water levels

    }//////////////////End myFunction()

    function get_browser_info() {
        console.log("***getBrowserINfo***");
        let ua = navigator.userAgent, tem,
                M = ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i)
                || [];
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

    function onMapClick(e) {
//        console.log("Click");

    }

</script>

