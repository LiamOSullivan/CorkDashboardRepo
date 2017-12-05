<?php $this->assign('title', "Real Time Travel"); ?>

<!--		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
                <meta name="description" content="Provides access to real-time, live data about current traffic and travel conditions in Cork.  This includes travel time, car parks, and traffic cams." />
                <meta name="keywords" content="Corkdashboard, Cork, City Benchmarks, Interactive tools" />
<script src="/js//Dashboard/jquery.min.js"></script>
         <script src="/js//Dashboard/config.js"></script> 

<script src="/js//Dashboard/skel.min.js"></script>
 <script src="/js//Dashboard/skel-panels.min.js"></script> 
<script src="/js//Dashboard/skel-layers.min.js"></script> 
<script src="/js//Dashboard/init.js"></script>


<link rel="stylesheet" href="//cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" /> 
<noscript>
<link rel="stylesheet" href="/dublindashboard/css/Dashboard/skel-noscript.css" />
<link rel="stylesheet" href="/dublindashboard/css/Dashboard/style.css" />
<link rel="stylesheet" href="/dublindashboard/css/Dashboard/style-desktop.css" />-->

</noscript>
<!--[if lte IE 9]><link rel="stylesheet" href="/dublindashboard/css/Dashboard/ie9.css" /><![endif]-->
<!--[if lte IE 8]><script src="/js//Dashboard/html5shiv.js"></script><![endif]-->




<!--                            <style type="text/css">
                                .leaflet-popup-content {
                                    /*margin: 14px 20px;*/
                                    //overflow: scroll;
                                    min-Width: 50px;
                                    //max-Width: 600px;
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
                                    background color:white;
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

                            </style>-->
<div class="onlyContent">
    <div style="border-bottom:2px solid #e5e5e5">
        <h1>Real Time Traffic & Travel</h1>
    </div>
</div>


<div id="map" style="width: 100%; height: 600px"></div>
<div id="dataSources" style="width: 100%; height: 750px" align="left"></div>

        <!--<script src="http://code.jquery.com/jquery-1.8.1.min.js"></script> -->
  <!-- <script src="/js//leaflet.js"></script> -->
<script src="//cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script> 
<script src="/js//carparks.js"></script>
<script src="/js//soundsites.js"></script>
<!--                                <script src="/js//M50.js"></script>-->
<script src="/js//R1D1.js"></script>
<!-- <script src="/js//leaflet_numbered_markers.js"></script> -->
<script src="/js//TileLayer.Grayscale.js"></script>
<!-- <script src="/js//leaflet-list-markers.js"></script> -->
<script src="/js//carParkCapacities.js"></script>
<script src="/js//allRoutes.js"></script>
<script src="/js//allRoutesSegments.js"></script>
<script src="/js//Dashboard/leaflet.markercluster-src.js"></script>
<link rel="stylesheet" href="/dublindashboard/css/Dashboard/MarkerCluster.css" />
<link rel="stylesheet" href="/dublindashboard/css/Dashboard/MarkerCluster.Default.css" />

<script>


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



    //Map Stuff
    //Individual AirQuality Locations



    //var map = new L.Map('map');
    //var map;


    //highchart default colours


    var cloudmadeUrl = '//{s}.tile.cloudmade.com/BC9A493B41014CAABB98F0471D759707/997/256/{z}/{x}/{y}.png',
            cloudmadeAttribution = 'Map data &copy; 2011 OpenStreetMap contributors, Imagery &copy; 2011 CloudMade',
            cloudmade = new L.TileLayer(cloudmadeUrl, {maxZoom: 18, attribution: cloudmadeAttribution});

    /*	var mapquestUrl = '//otile{s}.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png',
     mapquestAttribution = "Data CC-By-SA by <a href='http://openstreetmap.org/' target='_blank'>OpenStreetMap</a>, Tiles Courtesy of <a href='http://open.mapquest.com' target='_blank'>MapQuest</a>",
     mapquestGrey = new L.TileLayer.Grayscale(mapquestUrl, {maxZoom: 18, attribution: mapquestAttribution, subdomains: ['1','2','3','4'],  bgcolor: '0x80BDE3'}),
     mapquestColour = new L.TileLayer(mapquestUrl, {maxZoom: 18, attribution: mapquestAttribution, subdomains: ['1','2','3','4'],  bgcolor: '0x80BDE3'});*/

    // create the tile layer with correct attribution
    var osmUrl = '//{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
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
            center: new L.LatLng(51.898280, -8.473088),
            zoom: 18,
            layers: [osm],
            zoomControl: true
        });

    } else if (browser.name == 'MSIE' && browser.version == '10') {
        //alert(browser.version);
        //alert(browser.name);
        //alert('OK');

        map = new L.Map('map', {
            center: new L.LatLng(51.898280, -8.473088),
            zoom: 16,
            layers: [osm],
            zoomControl: true
        });

    } else if (browser.name == 'Firefox' && browser.version == '8') {
        //alert(browser.version);
        //alert(browser.name);
        //alert('OK');

        map = new L.Map('map', {
            center: new L.LatLng(51.898280, -8.473088),
            zoom: 16,
            layers: [osm],
            zoomControl: true
        });

    } else if (browser.name == 'Firefox' && browser.version == '7') {
        //alert(browser.version);
        //alert(browser.name);
        //alert('OK');

        map = new L.Map('map', {
            center: new L.LatLng(51.898280, -8.473088),
            zoom: 16,
            layers: [osm],
            zoomControl: true
        });

    } else {
        map = new L.Map('map', {
            center: new L.LatLng(51.898280, -8.473088),
            zoom: 16,
            layers: [osmGrey],
            zoomControl: true
        });
    }

    map.addEventListener('click', onMapClick);
    //LEGEND
    var legend = L.control({position: 'bottomright'});
    legend.onAdd = function (map) {


        var div = L.DomUtil.create('div', 'info legend'),
                ttGrades = [1, 1, 2, 3, 4, 5, 6, 6],
                grades = [0, 20, 40, 60, 80],
                bikeGrades = [0, 20, 40, 60, 80],
                labels = [],
                from, to;
        labels.push('Car Parks');
        labels.push('(Available Spaces)');
        for (var i = 0; i < grades.length; i++) {
            from = grades[i];
            to = grades[i + 1];

            labels.push('<i style="background: ' + setMarkerColor(from, 100) + '"></i> ' +
                    from + (to ? '%&ndash;' + to + '%' : '%' + '+'));
        }

        labels.push('Bike Stations');
        labels.push('(Available Bikes)');
        for (var i = 0; i < bikeGrades.length; i++) {
            from = grades[i];
            to = grades[i + 1];

            labels.push('<i style="background: ' + setBikeStationColour(from, 100) + '"></i> ' +
                    from + (to ? '%&ndash;' + to + '%' : '%' + '+'));
        }

        /* labels.push('');
         labels.push('Travel Times'); 
         for (var i = 0; i < ttGrades.length; i++) {
         ttFrom = ttGrades[i];
         
         if(i==0){
         
         labels.push('<i style="background: ' + setTripsColourCSV(i) +  '"></i>  \< 1 minute(s)');
         }
         else if(i>0 && i<7){
         
         labels.push('<i style="background: ' + setTripsColourCSV(i) +  '"></i>  \~ ' + ttFrom +' minute(s)');
         }
         else if(i==7){
         
         labels.push('<i style="background: ' + setTripsColourCSV(i) +  '"></i>  \> ' + ttFrom +' minute(s)');
         
         }
         }
         */
        labels.push('');
        labels.push('<i style="background: url(\'/dublindashboard/img/Dashboard/trafficCam.png\'); background-size: 18px 18px;"></i> ' + ' Traffic Camera');

        /*  labels.push('');
         labels.push('M50 Travel');
         labels.push('<i style="background: #0571b0"></i> '+ ' Free Flow');
         labels.push('<i style="background: #ca0020"></i> '+ ' Sub Free Flow');
         
         */
        div.innerHTML = labels.join('<br>');
        return div;
    };

    legend.addTo(map);


    var trafficIcon = L.icon({
        iconUrl: '/dublindashboard/img/Dashboard/trafficCam.png',

        iconSize: [20, 20], // size of the icon
        iconAnchor: [10, 10], // point of the icon which will correspond to marker's location
        popupAnchor: [0, 0] // point from which the popup should open relative to the iconAnchor
    });
    //markers for traffic cams



    var trafficCam1 = {//Jack Lynch Tunnel 1
        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: Jack Lynch Tunnel 1</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"https://cdn.mtcc.ie/static/cctv/0267.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-8.391706, 51.900792]
        }
    };
    var trafficCam2 = {//Jack Lynch Tunnel 2
        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: Jack Lynch Tunnel 2</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"https://cdn.mtcc.ie/static/cctv/0266.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-8.393056, 51.898561]
        }
    };

    var trafficCam3 = {//Dunkettle Interchange
        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: Dunkettle Interchange</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"https://cdn.mtcc.ie/static/cctv/0265.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-8.387899, 51.904194]
        }
    };

    var trafficCam4 = {//N40 Curraheen
        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: N40 Curraheen</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"https://cdn.mtcc.ie/static/cctv/0264.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-8.545679, 51.872733]
        }
    };

    var trafficCam5 = {//M8 J12 Mitchelstown
        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: M8 J12 Mitchelstown</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"https://cdn.mtcc.ie/static/cctv/0016.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-8.211591, 52.286688]
        }
    };

    var trafficCam6 = {//N20 Charleville
        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: N20 Charleville</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"https://cdn.mtcc.ie/static/cctv/0079.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-8.682617, 52.380474]
        }
    };

    var trafficCam7 = {//N22 Macroom
        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: N22 Macroom</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"https://cdn.mtcc.ie/static/cctv/0077.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-8.677155, 51.882981]
        }
    };

    var trafficCam8 = {//N22 Ballyvourney
        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: N22 Ballyvourney</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"https://cdn.mtcc.ie/static/cctv/0008.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-9.187604, 51.954819]
        }
    };

    var trafficCam9 = {//N25 J3 (Midleton Bypass)
        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: N25 J3 (Midleton Bypass)</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"https://cdn.mtcc.ie/static/cctv/0076.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-8.194000, 51.914162]
        }
    };

    var trafficCam10 = {//N72 Fermoy
        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: N72 Fermoy</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"https://cdn.mtcc.ie/static/cctv/0078.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-8.333915, 52.142829]
        }
    };

    var trafficCam11 = {//M50 - Ballymun
        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: M50 - Ballymun</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera96.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.266045, 53.409265]
        }
    };

    var trafficCam12 = {//M50 - Port Tunnel  
        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: M50 - Port Tunnel</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera95.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.238549, 53.397545]
        }
    };

    var trafficCam13 = {//M1/M50 
        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: M1/M50</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera94.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.226464, 53.410535]
        }
    };

    var trafficCam14 = {// N32 - Malahide Road
        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: N32 - Malahide Road</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera91.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.179616, 53.403124]
        }
    };

    var trafficCam15 = {// M1 Airport
        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: M1 Airport</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera110.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.217730, 53.427072]
        }
    };

    var trafficCam16 = {// John's Road/SCR
        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: John's Road/SCR</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera15.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.306516, 53.343776]
        }
    };

    var trafficCam17 = {// Pearse Street
        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: Pearse Street</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera23.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.244606, 53.343192]
        }
    };

    var trafficCam18 = {// Samuel Beckett Bridge

        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: Samuel Beckett Bridge</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera136.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.241125, 53.347631]
        }
    };

    var trafficCam19 = {// Sir John Rogersons Quay

        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: Sir John Rogersons Quay </b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera137.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.240452, 53.346094]
        }
    };

    var trafficCam20 = {// Harold's Cross Bridge

        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: Harold's Cross Bridge </b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera31.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.275509, 53.329704]
        }
    };

    var trafficCam21 = {// Longmile Road/Walkinstown Avenue


        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: Longmile Road/Walkinstown Avenue </b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera66.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.340967, 53.323717]
        }
    };

    var trafficCam22 = {// N11 - Fosters Avenue



        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: N11 - Fosters Avenue </b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera100.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.209670, 53.304456]
        }
    };

    var trafficCam23 = {// N11 - Mount Merrion Avenue


        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: N11 - Mount Merrion Avenue </b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera101.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.203974, 53.297014]
        }
    };

    var trafficCam24 = {// N11 -  Trees Road


        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: N11 -  Trees Road </b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera103.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.201568, 53.293122]
        }
    };

    var trafficCam25 = {// N11 -  Kilmacud Road


        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: N11 - Kilmacud Road </b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera102.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.195809, 53.289584]
        }
    };

    var trafficCam26 = {// N11 -   Newtownpark Avenue


        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: N11 - Newtownpark Avenue </b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera104.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.185634, 53.278867]
        }
    };

    var trafficCam27 = {// N11 -   Foxrock Church


        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: N11 - Foxrock Church </b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera105.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.173570, 53.273730]
        }
    };

    var trafficCam28 = {// N11 -   Clonkeen Road


        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: N11 - Clonkeen Road</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera106.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.158778, 53.266512]
        }
    };

    var trafficCam29 = {// N11 -   Johnstown Road


        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: N11 - Johnstown Road</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera107.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.149621, 53.261961]
        }
    };

    var trafficCam30 = {// N11 -   Wyattville Road


        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: N11 - Wyattville Road</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera108.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.137588, 53.247910]
        }
    };

    var trafficCam31 = {//Cabra Road
        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: Cabra Road</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera32.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.298239, 53.361643]
        }
    };

    var trafficCam32 = {//Liberty Hall
        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: Liberty Hall</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera10.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.255407, 53.348476]
        }
    };

    var trafficCam33 = {//O Connell Bridge

        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: O'Connell Bridge</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera6.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.259005, 53.347095]

        }
    };

    var trafficCam34 = {//North Wall Quay


        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: North Wall Quay</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera122.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.228156, 53.346738]


        }
    };


    var trafficCam35 = {//Dublin Port Toll Plaza



        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: Dublin Port Tunnel Toll Plaza</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera135.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.225698, 53.355500]

        }
    };

    var trafficCam36 = {//Mayor Street/Guild Street

        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: Mayor Street/Guild Street</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera127.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.240945, 53.349081]

        }
    };

    var trafficCam37 = {//Guild Street/Seville Place

        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: Guild Street/Seville Place</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera139.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.240726, 53.350590]

        }
    };

    var trafficCam38 = {//North Strand Road/East Wall Road


        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: North Strand Road/East Wall Road</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera24.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.239089, 53.360681]

        }
    };

    var trafficCam39 = {//Constitution Hill/Western Way



        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: Constitution Hill/Western Way</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera131.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.273287, 53.354402]

        }
    };

    var trafficCam40 = {//M1 - Drynam


        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: M1 - Drynam</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera111.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.205844, 53.443296]

        }
    };

    /*var trafficCam41 = { //N81 - Whitestown Way
     
     
     "type": "Feature",
     "properties": {
     "amenity": "Traffic Cam",
     "popupContent": "<h4><b>Site: N81 - Whitestown Way</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://traffic.southdublin.ie/TrafficCamImages/N81White/snap.jpg\" width=\"400px\"> </td></tr> </table> ",
     },
     "geometry": {
     "type": "Point",
     "coordinates":  [  -6.375171,53.284588]
     
     }
     };*/
    /*var trafficCam42 = { //Luas Terminus - Tallaght
     
     
     "type": "Feature",
     "properties": {
     "amenity": "Traffic Cam",
     "popupContent": "<h4><b>Site: Luas Terminus - Tallaght</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://traffic.southdublin.ie/TrafficCamImages/TallaghtLuas/snap.jpg\" width=\"400px\"> </td></tr> </table> ",
     },
     "geometry": {
     "type": "Point",
     "coordinates":  [  -6.374881,53.287251]
     
     }
     };*/
    /* var trafficCam43 = { //N4 - Newcastle Road
     
     
     "type": "Feature",
     "properties": {
     "amenity": "Traffic Cam",
     "popupContent": "<h4><b>Site: N4 - Newcastle Road</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://traffic.southdublin.ie/TrafficCamImages/N4newcastle/snap.jpg\" width=\"400px\"> </td></tr> </table> ",
     },
     "geometry": {
     "type": "Point",
     "coordinates":  [  -6.449379,53.350815]
     
     }
     };   */
    var trafficCam44 = {//N7 - City West


        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: N7 - City West</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://traffic.southdublin.ie/TrafficCamImages/N7citywest/snap.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.437651, 53.291897
            ]

        }
    };
    var trafficCam45 = {//ORR - Foxhunters Ramp


        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: ORR - Foxhunters Ramp</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://traffic.southdublin.ie/TrafficCamImages/ORRFox/snap.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.424466, 53.357319
            ]

        }
    };
    var trafficCam46 = {//N81 - Greenhills


        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: N81 - Greenhills</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://traffic.southdublin.ie/TrafficCamImages/N81Greenhills/snap.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.357302, 53.286827]

        }
    };
    var trafficCam47 = {//Firhouse Road - Butterfield


        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: Firhouse Road - Butterfield</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://traffic.southdublin.ie/TrafficCamImages/Firhouse_butterfield/snap.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.308947, 53.29379
            ]

        }
    };
    /*var trafficCam48 = { // ORR - Willsbrook
     
     
     "type": "Feature",
     "properties": {
     "amenity": "Traffic Cam",
     "popupContent": "<h4><b>Site: ORR - Willsbrook</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://traffic.southdublin.ie/TrafficCamImages/Griffeen/snap.jpg\" width=\"400px\"> </td></tr> </table> ",
     },
     "geometry": {
     "type": "Point",
     "coordinates":  [  -6.421223,53.354549]
     
     }
     };  */
    /* var trafficCam49 = { //Fontill Road - Ronanstown
     
     
     "type": "Feature",
     "properties": {
     "amenity": "Traffic Cam",
     "popupContent": "<h4><b>Site: Fontill Road - Ronanstown</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://traffic.southdublin.ie/TrafficCamImages/FonthillRon/snap.jpg\" width=\"400px\"> </td></tr> </table> ",
     },
     "geometry": {
     "type": "Point",
     "coordinates":  [  -6.407617,53.337788]
     
     }
     };    */
    /* var trafficCam50 = { // Belgard Square North
     
     
     "type": "Feature",
     "properties": {
     "amenity": "Traffic Cam",
     "popupContent": "<h4><b>Site: Belgard Square North</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://traffic.southdublin.ie/TrafficCamImages/belgard_north/snap.jpg\" width=\"400px\"> </td></tr> </table> ",
     },
     "geometry": {
     "type": "Point",
     "coordinates":  [  -6.374198,53.289355
     ]
     
     }
     }; */
    var trafficCam51 = {// ORR - Foxhunters Ramp


        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: ORR - Foxhunters Ramp</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://traffic.southdublin.ie/TrafficCamImages/ORRFox/snap.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.424466, 53.357319]

        }
    };
    var trafficCam52 = {// Old Bawn - Seskin


        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: Old Bawn - Seskin</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://traffic.southdublin.ie/TrafficCamImages/Old_bawns/snap.jpg \" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.358631, 53.280309]

        }
    };
    var trafficCam53 = {// N7 - Green Isle


        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: N7 - Green Isle</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://traffic.southdublin.ie/TrafficCamImages/Greenisle/snap.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.398541, 53.311745]

        }
    };
    /*var trafficCam54 = { // Cookstown Way - Alderwood
     
     
     "type": "Feature",
     "properties": {
     "amenity": "Traffic Cam",
     "popupContent": "<h4><b>Site: Cookstown Way - Alderwood</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://traffic.southdublin.ie/TrafficCamImages/cookstownway/snap.jpg\" width=\"400px\"> </td></tr> </table> ",
     },
     "geometry": {
     "type": "Point",
     "coordinates":  [  -6.381254,53.291079]
     
     }
     };    */
    /* var trafficCam55 = { // N7 - Kingswood
     
     
     "type": "Feature",
     "properties": {
     "amenity": "Traffic Cam",
     "popupContent": "<h4><b>Site: N7 - Kingswood</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://traffic.southdublin.ie/TrafficCamImages/Kingswood/snap.jpg\" width=\"400px\"> </td></tr> </table> ",
     },
     "geometry": {
     "type": "Point",
     "coordinates":  [  -6.419432,53.303761]
     
     }
     };      */
    var trafficCam56 = {// Greenhills - Mayberry


        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: Greenhills - Mayberry</b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://traffic.southdublin.ie/TrafficCamImages/Greenhillsmayberry/snap.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.354325, 53.298347]

        }
    };
    var trafficCam57 = {// Nangor Rd. - Yellowmeadows



        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: Nangor Rd. - Yellowmeadows </b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://traffic.southdublin.ie/TrafficCamImages/Yellowmeadows/snap.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.38395, 53.328438]

        }
    };
    var trafficCam58 = {// Longmile/Walkinstown Ave.



        "type": "Feature",
        "properties": {
            "amenity": "Traffic Cam",
            "popupContent": "<h4><b>Site: Longmile/Walkinstown Ave. </b></h4>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera66.jpg\" width=\"400px\"> </td></tr> </table> ",
        },
        "geometry": {
            "type": "Point",
            "coordinates": [-6.341043, 53.323658]

        }
    };



    /*	popup = new L.Popup({
     maxWidth: 200
     });*/

    function getName(propertyName) {
        return carparks[propertyName];
    }
    ;




    function getJunctionName(propertyName) {
        return M50[propertyName];
    }
    ;

    var carParks = new L.FeatureGroup();
    var corkCarParks = new L.FeatureGroup();
    var m50North = new L.FeatureGroup();
    var m50South = new L.FeatureGroup();
    var m4East = new L.FeatureGroup();
    var trips = new L.FeatureGroup();
    var trafficCams = new L.FeatureGroup();
    var bikeStations = new L.MarkerClusterGroup();

    L.stamp(carParks);
    L.stamp(m50North);
    L.stamp(m50South);
    L.stamp(m4East);
    L.stamp(trips);
    L.stamp(trafficCams);
    L.stamp(bikeStations);
    L.stamp(corkCarParks);

    var baseMaps = {
        //"MQ Greyscale": mapquestGrey,
        // "MQ Colour": mapquestColour,
        "OSM Greyscale": osmGrey,
        "OSM Colour": osm

    };

    var overlayMaps = {
        "City Centre Carparks": carParks,
        "M50 Travel Times - South": m50South,
        "M50 Travel Times - North": m50North,
        "M4 Travel Times - East": m4East,
        "Travel Time to City": trips,
        "Traffic Cameras": trafficCams,
        "Bike Stations": bikeStations

    };
    layerControl = L.control.layers(baseMaps, overlayMaps);
    layerControl.addTo(map);
    var initial = 0;  //check to add everythign initially to first map.


    function myFunction() {
        initial++;


        carParks.clearLayers(); //car parks
        m50North.clearLayers(); // M50 NORTH
        m50South.clearLayers(); // M50 South
        m4East.clearLayers(); // M4 East
        trips.clearLayers(); // TRIPS Routes
        trafficCams.clearLayers(); // traffic cams
        bikeStations.clearLayers(); // bike stations
        corkCarParks.clearLayers();

        $row = 1;
        //Travel Time (TRIPS).



        var propertyNames = Object.keys(roads);
        $.get("/CarParks/readCSVSegments", function (point) {

            obj = JSON.parse(point);
            var count = 0;
            for (key in obj) {
                count++;

            }

            for (key in allRoutesSegments) {
                var route = allRoutesSegments[key].Route;
                var direction = allRoutesSegments[key].Direction;
                var segment = allRoutesSegments[key].Link;

                for (var i = 0; i < count; i++) {

                    var targetRoute = obj[i].route;
                    var targetDirection = obj[i].direction;
                    var targetSegment = obj[i].segment;

                    if (targetRoute == route && targetDirection == direction && targetSegment == segment) {
                        //these are routes and segments that we do no want added.
                        if (targetRoute == 1 /*&& (targetSegment == 1 || targetSegment == 2 || targetSegment == 3 || targetSegment == 4)) */ || ((targetRoute == 22 && (targetSegment == 1 || targetSegment == 2 || targetSegment == 3 || targetSegment == 4 || targetSegment == 5))) || (targetRoute == 29 && targetSegment == 1)) {
                            //do nothing
                        } else {   //set the travel time for the popup

                            var travelTime = obj[i].travelTime;
                            var travelTimeMins = travelTime / 60;
                            var fromlat = allRoutesSegments[key].geometry.coordinates[0][0];
                            var fromlon = allRoutesSegments[key].geometry.coordinates[0][1];
                            var tolat = allRoutesSegments[key].geometry.coordinates[1][0];
                            var tolon = allRoutesSegments[key].geometry.coordinates[1][1];
                            var distance = getDistance(fromlat, fromlon, tolat, tolon);
                            var speed = getSpeed(travelTime, distance);


                            var speed = getSpeed(travelTime, distance);
                            var iTravelTime = Math.round((travelTime) / 60);
                            var oTravelTime = Math.round((obj[i - 1].travelTime) / 60);
                            if (iTravelTime == 0) {
                                iTravelTime = 'less than 1';
                            }
                            if (oTravelTime == 0) {
                                oTravelTime = 'less than 1';
                            }


                            var text = "<table style=\"width:300px\"><tr><td><b>Estimated travel time on this segement (R" + route + "D" + direction + "S" + segment + "): " + iTravelTime + "minute(s) </b></td></tr></table>";





                            var roadSeg = {
                                "type": "Feature",
                                "properties": {
                                    "fromlat": fromlat,
                                    "fromlon": fromlon,
                                    "tolat": tolat,
                                    "tolon": tolon,
                                    "travelTime": travelTimeMins,
                                    "speed": speed,
                                    "name": "" + route,
                                    "popupContent": text,
                                },
                                "geometry": {"type": "LineString",
                                    "coordinates": [[fromlat, fromlon], [tolat, tolon]]
                                }
                            };


                            /* var roadSegOptions = {
                             fillColor: setTripsColour(speed),
                             dashArray: '5, 15',
                             weight: 1,
                             opacity: 0.5,
                             };*/



                            var lyr = L.geoJson(roadSeg, {
                                style: {weight: 1},
                                onEachFeature: function (feature, layer) {
                                    popup = layer.bindPopup(layer.feature.properties.popupContent);


                                    var theColour = setTripsColourCSV(Math.round(travelTimeMins));

                                    /*if( theColour =='blue'){ //if red line should be dashed
                                     var dash = '5, 15';
                                     }
                                     else{
                                     var dash= '';
                                     }*/

                                    popup.on("popupclose", function (e) {
                                        isSelected = 'yes';
                                        resetRoadHighlight(e);
                                    });

                                    layer.setStyle({
                                        weight: 3,
                                        color: theColour,
                                        dashArray: '',
                                        opacity: '1'
                                    });

                                    layer.on({
                                        mouseover: highlightRoadFeature,
                                        mouseout: resetRoadHighlight,
                                        click: highlightRoadFeature2
                                    })
                                }
                            });

                            trips.addLayer(lyr);
                            if (initial == 1 || map.hasLayer(trips)) {
                                trips.addTo(map);    //add layer to the map
                            }
                        }
                    }

                }
            }
        });


        //Cork Bikes
        $.get("/CarParks/corkBikes", function (point) {
            obj = JSON.parse(point);
            //alert(obj.data[0].schemeId);
            var numBikeStations = obj.data.length;
            //alert("num "+numBikeStations);
            for (var i = 0; i < numBikeStations; i++) {
                var stationName = obj.data[i].name;
                var stationStands = obj.data[i].docksAvailable;
                var stationBikes = obj.data[i].bikesAvailable;
                var totalStands = obj.data[i].docksCount;
                var stationLat = obj.data[i].latitude;
                var stationLon = obj.data[i].longitude;

                // alert(stationName+", "+stationStands+", "+stationBikes);

                //   {"schemeId":2,"schemeShortName":"Cork","stationId":2001,"name":"Gaol Walk","nameIrish":"Siúlán an Phríosúin","docksCount":29,"bikesAvailable":18,"docksAvailable":8,"status":0,"latitude":51.893604,"longitude":-8.494174,"dateStatus":"24-05-2017 16:40:00"},

                var bikeStation = {//
                    "type": "Feature",
                    "properties": {
                        "amenity": "Bike station",
                        "popupContent": "<table style=\"width:300px\"><tr><td><b>" + stationName + " Bike Station currently has " + stationBikes + " bikes available and " + stationStands + " stands available </b></td></tr></table>",
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [stationLon, stationLat]
                    }
                };


                var bikeStationOptions = {
                    radius: 8,
                    fillColor: "#ff7800",
                    color: "#000",
                    weight: 1,
                    opacity: 1,
                    fillOpacity: 1 //setMarkerIntensity(spaces)

                };



                var bikeIcon = L.Icon.extend({
                    options: {
                        iconSize: [36, 45],
                        iconAnchor: [18, 45],
                        popupAnchor: [-3, -46]
                    }
                });


                bikeStations.addLayer(L.geoJson(bikeStation, {
                    onEachFeature: onEachBikeFeature, pointToLayer: function (feature, latlng) {
                        return L.marker(latlng, {icon: setBikeStationColour(stationBikes, totalStands)}).bindPopup(bikeStation.popupContent);
                        ;
                    }}));






            }

            function onEachBikeFeature(feature, layer) {
                popup = layer.bindPopup(layer.feature.properties.popupContent);  //essential

            }

            function setBikeStationColour(bikes, totalStands) {

                var percentageFree = (bikes / totalStands) * 100;

                var one = new bikeIcon({iconUrl: '/dublindashboard/img/Dashboard/icons/bike20.png'}),
                        two = new bikeIcon({iconUrl: '/dublindashboard/img/Dashboard/icons/bike40.png'}),
                        three = new bikeIcon({iconUrl: '/dublindashboard/img/Dashboard/icons/bike60.png'}),
                        four = new bikeIcon({iconUrl: '/dublindashboard/img/Dashboard/icons/bike80.png'}),
                        five = new bikeIcon({iconUrl: '/dublindashboard/img/Dashboard/icons/bike100.png'}),
                        six = new bikeIcon({iconUrl: '/dublindashboard/img/Dashboard/icons/bike120.png'});


                /*return percentageFree < 20 ? '#eff3ff' :
                 percentageFree < 40  ? '#c6dbef' :
                 percentageFree < 60  ? '#9ecae1' :
                 percentageFree < 80  ? '#6baed6' :
                 percentageFree < 100   ? '#3182bd' :
                 percentageFree < 120   ? '#08519c' :
                 '#000000';*/

                return percentageFree < 20 ? one :
                        percentageFree < 40 ? two :
                        percentageFree < 60 ? three :
                        percentageFree < 80 ? four :
                        percentageFree < 101 ? five :
                        // percentageFree < 120   ? six :
                        'six';


            }

        });








        //Cork Carprks



        $.get("/CarParks/corkCarparks", function (point) {
            obj = JSON.parse(point);

            //  [{"opening_times": "24/7", "identifier": 104, "name": "Saint Finbarr's", "notes": "", "longitude": -8.482056, "date": "2017-05-24T13:04:02.505000", "spaces": 350, "free_spaces": 60, "latitude": 51.896723, "_id": 8},

            var numOfCarparks = obj.result.records.length;

            for (var i = 0; i < numOfCarparks; i++) {

                var cpName = obj.result.records[i].name;
                var cpOpening = obj.result.records[i].opening_times;
                var cplat = obj.result.records[i].latitude;
                var cplon = obj.result.records[i].longitude;
                var cpTotalSpaces = obj.result.records[i].spaces;
                var cpFreeSpaces = obj.result.records[i].free_spaces;
                var cp_date = obj.result.records[i].date;

                //add to map
                var text = "<table style=\"width:300px\"><tr><td><b>" + cpName + " Car Park currently has " + cpFreeSpaces + " spaces (Total Spaces:" + cpTotalSpaces + ") </b></td></tr></table>"

                var carparkSite = {
                    "type": "Feature",
                    "properties": {
                        "name": cpName,
                        "amenity": "Car Park",
                        "popupContent": text,
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [cplon, cplat]
                    }
                };

                var carparkSiteOptions = {
                    radius: 8,
                    //fillColor: "#ff7800",
                    fillColor: setMarkerColor(cpFreeSpaces, cpTotalSpaces), //colours[i], //
                    color: "#000",
                    weight: 1,
                    opacity: 1,
                    fillOpacity: 1 //setMarkerIntensity(spaces)
                };







                carParks.addLayer(L.geoJson(carparkSite, {
                    onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                        return L.circleMarker(latlng, carparkSiteOptions);
                    }}));


            }
        }
        );



        // M50 SOUTHBOUD
        $.get("/CarParks/travelTimes", function (point) {
            obj = JSON.parse(point);

            var numberOfDataPoints = obj.M50_southBound.data.length; //number of junctions
            var fullTravelTime = Math.round(obj.M50_southBound.data[(numberOfDataPoints) - 1].current_travel_time / 60);
            var fullFreeFlowTraveTime = Math.round(obj.M50_southBound.data[(numberOfDataPoints) - 1].free_flow_travel_time / 60);

            for (var i = 0; i < numberOfDataPoints; i++) {

                var isSelected = 'no';
                var popup;

                var time = '0';
                var travelTime = Math.round(obj.M50_southBound.data[i].current_travel_time / 60);
                var M50_south_1 = '[' + time + ',' + travelTime + ']';

                var from_name = obj.M50_southBound.data[i].from_name;
                var to_name = obj.M50_southBound.data[i].to_name;
                var freeFlowTravelTime = Math.round(obj.M50_southBound.data[i].free_flow_travel_time / 60);

                var fullText = "The Travel Time from " + obj.M50_southBound.data[0].from_name + " to " + obj.M50_southBound.data[numberOfDataPoints - 1].to_name + " is currently " + fullTravelTime + " minutes";

                var text = "<table style=\"width:300px\"><tr><td><b>The Travel Time from " + obj.M50_southBound.data[i].from_name + " to " + obj.M50_southBound.data[i].to_name + " is currently " + travelTime + " minutes.  (Freeflow travel time is " + freeFlowTravelTime + " minutes).<br>" + fullText + "</b></td></tr></table>";


                //load the json objects
                if (from_name == 'J3 (M1/N32)' && to_name == 'J17 Shankill') {
                    var geoFile = FULL; //empty set of coordinates
                }

                if (from_name == 'J3 (M1/N32)' && to_name != 'J17 Shankill') {
                    var geoFile = J3;

                } else if (from_name == 'J5 Finglas') {
                    var geoFile = J5;
                } else if (from_name == 'Blanchardstown') {
                    var geoFile = J6;
                } else if (from_name == 'J7 Palmerstown') {
                    var geoFile = J7;
                } else if (from_name == 'J9 Red Cow') {
                    var geoFile = J9;
                } else if (from_name == 'J11 Balrathory') {
                    var geoFile = J12;
                } else if (from_name == 'J12 Scholarstown') {
                    var geoFile = J11;
                } else if (from_name == 'J13 Ballinteer') {
                    var geoFile = J13;
                } else if (from_name == 'J14 Stillorgan') {
                    var geoFile = J14;
                } else if (from_name == 'J15 Ballyogan') {
                    var geoFile = J15;
                } else if (from_name == 'J16 Cherrywood') {
                    var geoFile = J16;
                }
                /* else if (from_name == 'J5 Finglas'){
                 var geoFile = J4N4M50;
                 }*/

                var m50SegOptions = {
                    //radius: 8,
                    //fillColor: colours[i],
                    //fillColor: '#FF0000', //setMarkerColor(spaces),
                    // color: '#FF0000',
                    weight: 800,
                    //  opacity: 1,
                    //fillOpacity: setMarkerIntensity(spaces)
                };


                //colour the road segments according to travel time

                //set the colour
                var m50SegOptionsColor = setTripsColourCSV(travelTime);
                var m50dash = '';

                /*if(travelTime<=freeFlowTravelTime){
                 var m50SegOptionsColor = '#0571b0';  //blue
                 var m50dash = '';
                 
                 
                 }
                 else{
                 //there is a delay
                 var m50SegOptionsColor = '#ca0020'; //Red
                 var m50dash = '';
                 
                 }*/


                //set the popup text.
                geoFile.properties.popupContent = text;
                geoFile.properties.colour = m50SegOptionsColor;
                geoFile.properties.dashArray = m50dash;


                var lyr = L.geoJson(geoFile, {
                    style: {weight: 1},
                    onEachFeature: function (feature, layer) {
                        popup = layer.bindPopup(layer.feature.properties.popupContent);
                        console.log(layer)
                        popup.on("popupclose", function (e) {
                            isSelected = 'yes';
                            ;
                            resetRoadHighlight(e);
                            //lyr.resetStyle();
                        });
                        layer.setStyle({
                            weight: 5,
                            color: m50SegOptionsColor,
                            dashArray: '',
                            // fillOpacity: 0.5    
                        });

                        layer.on({
                            mouseover: highlightRoadFeature,
                            mouseout: resetRoadHighlight,
                            click: highlightRoadFeature2
                        })


                    }
                });//.addTo(map);    //add layer to the map

                m50South.addLayer(lyr);

            } //close for loop 
            if (initial == 1 || map.hasLayer(m50South)) {
                m50South.addTo(map);
            }
            function highlightRoadFeature(e) {
                isSelected = 'yes';
                var layer = e.target;

                layer.setStyle({// highlight the feature
                    weight: 10,
                    color: '#0000FF',
                    dashArray: '',
                    //fillOpacity: 1
                });

                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }
            }


            function highlightRoadFeature2(e) {
                isSelected = 'no';
                var layer = e.target;
                layer.setStyle({// highlight the feature
                    weight: 10,
                    color: '#0000FF',
                    dashArray: '',
                    fillOpacity: 1
                });

                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }

            }


            function resetRoadHighlight(e) {
                //alert(e.target.feature.properties.colour);
                if (isSelected == 'yes') {
                    var layer = e.target;


                    layer.setStyle({// highlight the feature
                        weight: 5,
                        color: e.target.feature.properties.colour,
                        // fillColor:'#00FF00',
                        dashArray: '', //e.target.feature.properties.dashArray,
                        //fillOpacity: setMarkerIntensity(
                    });
                    isSelected = 'no';
                }

            }





        });
        //M4 WESTBOUND

        $.get("/CarParks/travelTimes", function (point) {
            obj = JSON.parse(point);

            var numberOfDataPoints = obj.M4_westBound.data.length; //number of junctions
            var fullTravelTime = Math.round(obj.M4_westBound.data[(numberOfDataPoints) - 1].current_travel_time / 60);
            var fullFreeFlowTraveTime = Math.round(obj.M4_westBound.data[(numberOfDataPoints) - 1].free_flow_travel_time / 60);

            for (var i = 0; i < numberOfDataPoints; i++) {

                var isSelected = 'no';
                var popup;

                var time = '0';
                var travelTime = Math.round(obj.M4_westBound.data[i].current_travel_time / 60);

                var from_name = obj.M4_westBound.data[i].from_name;
                var to_name = obj.M4_westBound.data[i].to_name;
                var freeFlowTravelTime = Math.round(obj.M4_westBound.data[i].free_flow_travel_time / 60);

                var fullText = "The Travel Time from " + obj.M4_westBound.data[0].from_name + " to " + obj.M4_westBound.data[numberOfDataPoints - 1].to_name + " is currently " + fullTravelTime + " minutes";

                var text = "<table style=\"width:300px\"><tr><b>The Travel Time from " + obj.M4_westBound.data[i].from_name + " to " + obj.M4_westBound.data[i].to_name + " is currently " + travelTime + " minutes.  (Freeflow travel time is " + freeFlowTravelTime + " minutes).<br>" + fullText + "</b></td></tr></table>";


                //load the json objects
                if (to_name == 'J11 M6' && from_name == 'J1 M50/N4') {
                    var geoFile = FULL; //empty set of coordinates

                } else if (from_name == 'J1 M50/N4') {
                    var geoFile = J1M50J4N4W;

                } else if (from_name == 'J4 Newcastle Rd') {
                    var geoFile = J4J7MaynoothW;

                } else if (from_name == 'J7 Maynooth') {
                    var geoFile = J9EnfieldJ7W;

                } else {
                    var geoFile = J3;

                }



                var m4SegOptions = {
                    //radius: 8,
                    //fillColor: colours[i],
                    //fillColor: '#FF0000', //setMarkerColor(spaces),
                    // color: '#FF0000',
                    weight: 800,
                    opacity: 1,
                    fillOpacity: 1
                };


                //colour the road segments according to travel time
                //colour the road segments according to travel time

                //set the colour
                var m4SegOptionsColor = setTripsColourCSV(travelTime);
                var m4dash = '';



                //set the popup text.
                geoFile.properties.popupContent = text;
                geoFile.properties.colour = m4SegOptionsColor;
                geoFile.properties.dashArray = m4dash;

                var lyr = L.geoJson(geoFile, {
                    style: {weight: 1},
                    onEachFeature: function (feature, layer) {
                        popup = layer.bindPopup(layer.feature.properties.popupContent);
                        console.log(layer)
                        popup.on("popupclose", function (e) {
                            isSelected = 'yes';
                            resetRoadHighlight(e);
                            //lyr.resetStyle();
                        });
                        layer.setStyle({
                            weight: 5,
                            color: m4SegOptionsColor,
                            dashArray: '',
                            fillOpacity: 1
                        });

                        layer.on({
                            mouseover: highlightRoadFeature,
                            mouseout: resetRoadHighlight,
                            click: highlightRoadFeature2
                        })


                    }
                });//.addTo(map);    //add layer to the map

                m4East.addLayer(lyr);

            }
            //close for loop 

            if (initial == 1 || map.hasLayer(m4East)) {
                m4East.addTo(map);
            }



            function highlightRoadFeature(e) {
                isSelected = 'yes';
                var layer = e.target;

                layer.setStyle({// highlight the feature
                    weight: 10,
                    color: '#0000FF',
                    dashArray: '',
                    // fillOpacity: 1
                });

                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }
            }



            function highlightRoadFeature2(e) {
                isSelected = 'no';
                var layer = e.target;
                layer.setStyle({// highlight the feature
                    weight: 10,
                    color: '#0000FF',
                    dashArray: '',
                    //fillOpacity: 1
                });

                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }

            }


            function resetRoadHighlight(e) {
                //alert(e.target.feature.properties.colour);
                if (isSelected == 'yes') {
                    var layer = e.target;


                    layer.setStyle({// highlight the feature
                        weight: 5,
                        color: e.target.feature.properties.colour,
                        // fillColor:'#00FF00',
                        dashArray: e.target.feature.properties.dashArray,
                        //fillOpacity: setMarkerIntensity(
                    });
                    isSelected = 'no';
                }

            }





        });


        //M4 EASTBOUND
        $.get("/CarParks/travelTimes", function (point) {
            obj = JSON.parse(point);

            var numberOfDataPoints = obj.M4_eastBound.data.length; //number of junctions
            var fullTravelTime = Math.round(obj.M4_eastBound.data[(numberOfDataPoints) - 1].current_travel_time / 60);
            var fullFreeFlowTraveTime = Math.round(obj.M4_eastBound.data[(numberOfDataPoints) - 1].free_flow_travel_time / 60);

            for (var i = 0; i < numberOfDataPoints; i++) {

                var isSelected = 'no';
                var popup;

                var time = '0';
                var travelTime = Math.round(obj.M4_eastBound.data[i].current_travel_time / 60);

                var from_name = obj.M4_eastBound.data[i].from_name;
                var to_name = obj.M4_eastBound.data[i].to_name;
                var freeFlowTravelTime = Math.round(obj.M4_eastBound.data[i].free_flow_travel_time / 60);

                var fullText = "The Travel Time from " + obj.M4_eastBound.data[0].from_name + " to " + obj.M4_eastBound.data[numberOfDataPoints - 1].to_name + " is currently " + fullTravelTime + " minutes";

                var text = "<table style=\"width:300px\"><tr><b>The Travel Time from " + obj.M4_eastBound.data[i].from_name + " to " + obj.M4_eastBound.data[i].to_name + " is currently " + travelTime + " minutes.  (Freeflow travel time is " + freeFlowTravelTime + " minutes).<br>" + fullText + "</b></td></tr></table>";


                //load the json objects
                if (to_name == 'J1 M50/N4' && from_name == 'J12 Kinnegad West') {
                    var geoFile = FULL; //empty set of coordinates

                } else if (from_name == 'J4 Newcastle Rd') {
                    var geoFile = J4N4M50;

                } else if (from_name == 'J7 Maynooth') {
                    var geoFile = J7MaynoothJ4;

                } else if (from_name == 'J9 Enfield') {
                    var geoFile = J9EnfieldJ7;

                } else {
                    var geoFile = J3;

                }



                var m4SegOptions = {
                    //radius: 8,
                    //fillColor: colours[i],
                    //fillColor: '#FF0000', //setMarkerColor(spaces),
                    // color: '#FF0000',
                    weight: 800,
                    opacity: 1,
                    fillOpacity: 1
                };


                //colour the road segments according to travel time
                //colour the road segments according to travel time

                //set the colour
                var m4SegOptionsColor = setTripsColourCSV(travelTime);
                var m4dash = '';
                /*  if(travelTime<=freeFlowTravelTime){
                 var m4SegOptionsColor = '#0571b0';  //blue
                 var m4dash = '';
                 
                 }
                 else{
                 //there is a delay
                 var m4SegOptionsColor = '#ca0020'; //Red
                 var m4dash = '';
                 }*/


                //set the popup text.
                geoFile.properties.popupContent = text;
                geoFile.properties.colour = m4SegOptionsColor;
                geoFile.properties.dashArray = m4dash;

                var lyr = L.geoJson(geoFile, {
                    style: {weight: 1},
                    onEachFeature: function (feature, layer) {
                        popup = layer.bindPopup(layer.feature.properties.popupContent);
                        console.log(layer)
                        popup.on("popupclose", function (e) {
                            isSelected = 'yes';
                            resetRoadHighlight(e);
                            //lyr.resetStyle();
                        });
                        layer.setStyle({
                            weight: 5,
                            color: m4SegOptionsColor,
                            dashArray: '',
                            fillOpacity: 1
                        });

                        layer.on({
                            mouseover: highlightRoadFeature,
                            mouseout: resetRoadHighlight,
                            click: highlightRoadFeature2
                        })


                    }
                });//.addTo(map);    //add layer to the map

                m4East.addLayer(lyr);

            }
            //close for loop 

            if (initial == 1 || map.hasLayer(m4East)) {
                m4East.addTo(map);
            }



            function highlightRoadFeature(e) {
                isSelected = 'yes';
                var layer = e.target;

                layer.setStyle({// highlight the feature
                    weight: 10,
                    color: '#0000FF',
                    dashArray: '',
                    // fillOpacity: 1
                });

                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }
            }




            function highlightRoadFeature2(e) {
                isSelected = 'no';
                var layer = e.target;
                layer.setStyle({// highlight the feature
                    weight: 10,
                    color: '#0000FF',
                    dashArray: '',
                    //fillOpacity: 1
                });

                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }

            }


            function resetRoadHighlight(e) {
                //alert(e.target.feature.properties.colour);
                if (isSelected == 'yes') {
                    var layer = e.target;


                    layer.setStyle({// highlight the feature
                        weight: 5,
                        color: e.target.feature.properties.colour,
                        // fillColor:'#00FF00',
                        dashArray: e.target.feature.properties.dashArray,
                        //fillOpacity: setMarkerIntensity(
                    });
                    isSelected = 'no';
                }

            }


        });

        //M7 EASTBOUND
        $.get("/CarParks/travelTimes", function (point) {
            obj = JSON.parse(point);

            var numberOfDataPoints = obj.M7_eastBound.data.length; //number of junctions
            var fullTravelTime = Math.round(obj.M7_eastBound.data[(numberOfDataPoints) - 1].current_travel_time / 60);
            var fullFreeFlowTraveTime = Math.round(obj.M7_eastBound.data[(numberOfDataPoints) - 1].free_flow_travel_time / 60);

            for (var i = 0; i < numberOfDataPoints; i++) {

                var isSelected = 'no';
                var popup;

                var time = '0';
                var travelTime = Math.round(obj.M7_eastBound.data[i].current_travel_time / 60);

                var from_name = obj.M7_eastBound.data[i].from_name;
                var to_name = obj.M7_eastBound.data[i].to_name;
                var freeFlowTravelTime = Math.round(obj.M7_eastBound.data[i].free_flow_travel_time / 60);

                var fullText = "The Travel Time from " + obj.M7_eastBound.data[0].from_name + " to " + obj.M7_eastBound.data[numberOfDataPoints - 1].to_name + " is currently " + fullTravelTime + " minutes";

                var text = "<table style=\"width:300px\"><tr><b>The Travel Time from " + obj.M7_eastBound.data[i].from_name + " to " + obj.M7_eastBound.data[i].to_name + " is currently " + travelTime + " minutes.  (Freeflow travel time is " + freeFlowTravelTime + " minutes).<br>" + fullText + "</b></td></tr></table>";


                //load the json objects
                if (to_name == 'J1 M50/N7' && from_name == 'J13 Kildare') {
                    var geoFile = FULL; //empty set of coordinates

                } else if (from_name == 'J2 Kingswood') {
                    var geoFile = J2KingswoodJ1M50E;

                } else if (from_name == 'J4 Rathcoole') {
                    var geoFile = J4RathcooleJ2E;

                } else if (from_name == 'J5 Athgoe') {
                    var geoFile = J5AthgoJ4RathcooleE;

                } else if (from_name == 'J8 Johnstown') {
                    var geoFile = J8JohnstownJ5AthgoE;

                } else if (from_name == 'J9 Naas North') {
                    var geoFile = J9NaasJ8JohnstownE;

                } else {
                    var geoFile = J3;

                }



                var m4SegOptions = {
                    //radius: 8,
                    //fillColor: colours[i],
                    //fillColor: '#FF0000', //setMarkerColor(spaces),
                    // color: '#FF0000',
                    weight: 800,
                    opacity: 1,
                    fillOpacity: 1
                };


                //colour the road segments according to travel time
                //colour the road segments according to travel time

                //set the colour
                var m4SegOptionsColor = setTripsColourCSV(travelTime);
                var m4dash = '';
                /*  if(travelTime<=freeFlowTravelTime){
                 var m4SegOptionsColor = '#0571b0';  //blue
                 var m4dash = '';
                 
                 }
                 else{
                 //there is a delay
                 var m4SegOptionsColor = '#ca0020'; //Red
                 var m4dash = '';
                 }*/


                //set the popup text.
                geoFile.properties.popupContent = text;
                geoFile.properties.colour = m4SegOptionsColor;
                geoFile.properties.dashArray = m4dash;

                var lyr = L.geoJson(geoFile, {
                    style: {weight: 1},
                    onEachFeature: function (feature, layer) {
                        popup = layer.bindPopup(layer.feature.properties.popupContent);
                        console.log(layer)
                        popup.on("popupclose", function (e) {
                            isSelected = 'yes';
                            resetRoadHighlight(e);
                            //lyr.resetStyle();
                        });
                        layer.setStyle({
                            weight: 5,
                            color: m4SegOptionsColor,
                            dashArray: '',
                            fillOpacity: 1
                        });

                        layer.on({
                            mouseover: highlightRoadFeature,
                            mouseout: resetRoadHighlight,
                            click: highlightRoadFeature2
                        })


                    }
                });//.addTo(map);    //add layer to the map

                m4East.addLayer(lyr);

            }
            //close for loop 

            if (initial == 1 || map.hasLayer(m4East)) {
                m4East.addTo(map);
            }



            function highlightRoadFeature(e) {
                isSelected = 'yes';
                var layer = e.target;

                layer.setStyle({// highlight the feature
                    weight: 10,
                    color: '#0000FF',
                    dashArray: '',
                    // fillOpacity: 1
                });

                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }
            }




            function highlightRoadFeature2(e) {
                isSelected = 'no';
                var layer = e.target;
                layer.setStyle({// highlight the feature
                    weight: 10,
                    color: '#0000FF',
                    dashArray: '',
                    //fillOpacity: 1
                });

                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }

            }


            function resetRoadHighlight(e) {
                //alert(e.target.feature.properties.colour);
                if (isSelected == 'yes') {
                    var layer = e.target;


                    layer.setStyle({// highlight the feature
                        weight: 5,
                        color: e.target.feature.properties.colour,
                        // fillColor:'#00FF00',
                        dashArray: e.target.feature.properties.dashArray,
                        //fillOpacity: setMarkerIntensity(
                    });
                    isSelected = 'no';
                }

            }

        });

        //M7 WESTBOUND
        $.get("/CarParks/travelTimes", function (point) {
            obj = JSON.parse(point);

            var numberOfDataPoints = obj.M7_westBound.data.length; //number of junctions
            var fullTravelTime = Math.round(obj.M7_westBound.data[(numberOfDataPoints) - 1].current_travel_time / 60);
            var fullFreeFlowTraveTime = Math.round(obj.M7_westBound.data[(numberOfDataPoints) - 1].free_flow_travel_time / 60);

            for (var i = 0; i < numberOfDataPoints; i++) {

                var isSelected = 'no';
                var popup;

                var time = '0';
                var travelTime = Math.round(obj.M7_westBound.data[i].current_travel_time / 60);

                var from_name = obj.M7_westBound.data[i].from_name;
                var to_name = obj.M7_westBound.data[i].to_name;
                var freeFlowTravelTime = Math.round(obj.M7_westBound.data[i].free_flow_travel_time / 60);

                var fullText = "The Travel Time from " + obj.M7_westBound.data[0].from_name + " to " + obj.M7_westBound.data[numberOfDataPoints - 1].to_name + " is currently " + fullTravelTime + " minutes";

                var text = "<table style=\"width:300px\"><tr><b>The Travel Time from " + obj.M7_westBound.data[i].from_name + " to " + obj.M7_westBound.data[i].to_name + " is currently " + travelTime + " minutes.  (Freeflow travel time is " + freeFlowTravelTime + " minutes).<br>" + fullText + "</b></td></tr></table>";


                //load the json objects
                if (to_name == 'J11 M7/M9' && from_name == 'J1 M50/N7') {
                    var geoFile = FULL; //empty set of coordinates

                } else if (from_name == 'J1 M50/N7') {
                    var geoFile = J1M50KingswoodW;

                } else if (from_name == 'J2 Kingswood') {
                    var geoFile = J2KingswoodJ4RathW;

                } else if (from_name == 'J4 Rathcoole') {
                    var geoFile = J4RathJ9NaasW;

                } else {
                    var geoFile = J3;

                }



                var m4SegOptions = {
                    //radius: 8,
                    //fillColor: colours[i],
                    //fillColor: '#FF0000', //setMarkerColor(spaces),
                    // color: '#FF0000',
                    weight: 800,
                    opacity: 1,
                    fillOpacity: 1
                };


                //colour the road segments according to travel time
                //colour the road segments according to travel time

                //set the colour
                var m4SegOptionsColor = setTripsColourCSV(travelTime);
                var m4dash = '';
                /*  if(travelTime<=freeFlowTravelTime){
                 var m4SegOptionsColor = '#0571b0';  //blue
                 var m4dash = '';
                 
                 }
                 else{
                 //there is a delay
                 var m4SegOptionsColor = '#ca0020'; //Red
                 var m4dash = '';
                 }*/


                //set the popup text.
                geoFile.properties.popupContent = text;
                geoFile.properties.colour = m4SegOptionsColor;
                geoFile.properties.dashArray = m4dash;

                var lyr = L.geoJson(geoFile, {
                    style: {weight: 1},
                    onEachFeature: function (feature, layer) {
                        popup = layer.bindPopup(layer.feature.properties.popupContent);
                        console.log(layer)
                        popup.on("popupclose", function (e) {
                            isSelected = 'yes';
                            resetRoadHighlight(e);
                            //lyr.resetStyle();
                        });
                        layer.setStyle({
                            weight: 5,
                            color: m4SegOptionsColor,
                            dashArray: '',
                            fillOpacity: 1
                        });

                        layer.on({
                            mouseover: highlightRoadFeature,
                            mouseout: resetRoadHighlight,
                            click: highlightRoadFeature2
                        })


                    }
                });//.addTo(map);    //add layer to the map

                m4East.addLayer(lyr);

            }
            //close for loop 

            if (initial == 1 || map.hasLayer(m4East)) {
                m4East.addTo(map);
            }



            function highlightRoadFeature(e) {
                isSelected = 'yes';
                var layer = e.target;

                layer.setStyle({// highlight the feature
                    weight: 10,
                    color: '#0000FF',
                    dashArray: '',
                    // fillOpacity: 1
                });

                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }
            }




            function highlightRoadFeature2(e) {
                isSelected = 'no';
                var layer = e.target;
                layer.setStyle({// highlight the feature
                    weight: 10,
                    color: '#0000FF',
                    dashArray: '',
                    //fillOpacity: 1
                });

                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }

            }


            function resetRoadHighlight(e) {
                //alert(e.target.feature.properties.colour);
                if (isSelected == 'yes') {
                    var layer = e.target;


                    layer.setStyle({// highlight the feature
                        weight: 5,
                        color: e.target.feature.properties.colour,
                        // fillColor:'#00FF00',
                        dashArray: e.target.feature.properties.dashArray,
                        //fillOpacity: setMarkerIntensity(
                    });
                    isSelected = 'no';
                }

            }



        });

        //M3 Eastbound
        $.get("/CarParks/travelTimes", function (point) {
            obj = JSON.parse(point);

            var numberOfDataPoints = obj.M3_eastBound.data.length; //number of junctions
            var fullTravelTime = Math.round(obj.M3_eastBound.data[(numberOfDataPoints) - 1].current_travel_time / 60);
            var fullFreeFlowTraveTime = Math.round(obj.M3_eastBound.data[(numberOfDataPoints) - 1].free_flow_travel_time / 60);

            for (var i = 0; i < numberOfDataPoints; i++) {

                var isSelected = 'no';
                var popup;

                var time = '0';
                var travelTime = Math.round(obj.M3_eastBound.data[i].current_travel_time / 60);

                var from_name = obj.M3_eastBound.data[i].from_name;
                var to_name = obj.M3_eastBound.data[i].to_name;
                var freeFlowTravelTime = Math.round(obj.M3_eastBound.data[i].free_flow_travel_time / 60);

                var fullText = "The Travel Time from " + obj.M3_eastBound.data[0].from_name + " to " + obj.M3_eastBound.data[numberOfDataPoints - 1].to_name + " is currently " + fullTravelTime + " minutes";

                var text = "<table style=\"width:300px\"><tr><b>The Travel Time from " + obj.M3_eastBound.data[i].from_name + " to " + obj.M3_eastBound.data[i].to_name + " is currently " + travelTime + " minutes.  (Freeflow travel time is " + freeFlowTravelTime + " minutes).<br>" + fullText + "</b></td></tr></table>";


                //load the json objects
                if (to_name == 'J1 M50/N3' && from_name == 'J6 Dunshaughlin') {
                    var geoFile = FULL; //empty set of coordinates

                } else if (from_name == 'J4 Clonee') {
                    var geoFile = J4CloneeJ1M50E;

                } else if (from_name == 'J6 Dunshaughlin') {
                    var geoFile = J6DunshaughJ4ClonE;

                } else if (from_name == 'J4 Rathcoole') {
                    var geoFile = J4RathJ9NaasW;

                } else {
                    var geoFile = J3;

                }



                var m4SegOptions = {
                    //radius: 8,
                    //fillColor: colours[i],
                    //fillColor: '#FF0000', //setMarkerColor(spaces),
                    // color: '#FF0000',
                    weight: 800,
                    opacity: 1,
                    fillOpacity: 1
                };


                //colour the road segments according to travel time
                //colour the road segments according to travel time

                //set the colour
                var m4SegOptionsColor = setTripsColourCSV(travelTime);
                var m4dash = '';
                /*  if(travelTime<=freeFlowTravelTime){
                 var m4SegOptionsColor = '#0571b0';  //blue
                 var m4dash = '';
                 
                 }
                 else{
                 //there is a delay
                 var m4SegOptionsColor = '#ca0020'; //Red
                 var m4dash = '';
                 }*/


                //set the popup text.
                geoFile.properties.popupContent = text;
                geoFile.properties.colour = m4SegOptionsColor;
                geoFile.properties.dashArray = m4dash;

                var lyr = L.geoJson(geoFile, {
                    style: {weight: 1},
                    onEachFeature: function (feature, layer) {
                        popup = layer.bindPopup(layer.feature.properties.popupContent);
                        console.log(layer)
                        popup.on("popupclose", function (e) {
                            isSelected = 'yes';
                            resetRoadHighlight(e);
                            //lyr.resetStyle();
                        });
                        layer.setStyle({
                            weight: 5,
                            color: m4SegOptionsColor,
                            dashArray: '',
                            fillOpacity: 1
                        });

                        layer.on({
                            mouseover: highlightRoadFeature,
                            mouseout: resetRoadHighlight,
                            click: highlightRoadFeature2
                        })


                    }
                });//.addTo(map);    //add layer to the map

                m4East.addLayer(lyr);

            }
            //close for loop 

            if (initial == 1 || map.hasLayer(m4East)) {
                m4East.addTo(map);
            }



            function highlightRoadFeature(e) {
                isSelected = 'yes';
                var layer = e.target;

                layer.setStyle({// highlight the feature
                    weight: 10,
                    color: '#0000FF',
                    dashArray: '',
                    // fillOpacity: 1
                });

                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }
            }




            function highlightRoadFeature2(e) {
                isSelected = 'no';
                var layer = e.target;
                layer.setStyle({// highlight the feature
                    weight: 10,
                    color: '#0000FF',
                    dashArray: '',
                    //fillOpacity: 1
                });

                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }

            }


            function resetRoadHighlight(e) {
                //alert(e.target.feature.properties.colour);
                if (isSelected == 'yes') {
                    var layer = e.target;


                    layer.setStyle({// highlight the feature
                        weight: 5,
                        color: e.target.feature.properties.colour,
                        // fillColor:'#00FF00',
                        dashArray: e.target.feature.properties.dashArray,
                        //fillOpacity: setMarkerIntensity(
                    });
                    isSelected = 'no';
                }

            }



        });

        //M2 Southbound
        $.get("/CarParks/travelTimes", function (point) {
            obj = JSON.parse(point);

            var numberOfDataPoints = obj.M2_southBound.data.length; //number of junctions
            var fullTravelTime = Math.round(obj.M2_southBound.data[(numberOfDataPoints) - 1].current_travel_time / 60);
            var fullFreeFlowTraveTime = Math.round(obj.M2_southBound.data[(numberOfDataPoints) - 1].free_flow_travel_time / 60);

            for (var i = 0; i < numberOfDataPoints; i++) {

                var isSelected = 'no';
                var popup;

                var time = '0';
                var travelTime = Math.round(obj.M2_southBound.data[i].current_travel_time / 60);

                var from_name = obj.M2_southBound.data[i].from_name;
                var to_name = obj.M2_southBound.data[i].to_name;
                var freeFlowTravelTime = Math.round(obj.M2_southBound.data[i].free_flow_travel_time / 60);

                var fullText = "The Travel Time from " + obj.M2_southBound.data[0].from_name + " to " + obj.M2_southBound.data[numberOfDataPoints - 1].to_name + " is currently " + fullTravelTime + " minutes";

                var text = "<table style=\"width:300px\"><tr><b>The Travel Time from " + obj.M2_southBound.data[i].from_name + " to " + obj.M2_southBound.data[i].to_name + " is currently " + travelTime + " minutes.  (Freeflow travel time is " + freeFlowTravelTime + " minutes).<br>" + fullText + "</b></td></tr></table>";


                //load the json objects
                if (to_name == 'J1 M50' && from_name == 'J3 Ashbourne South') {
                    var geoFile = FULL; //empty set of coordinates
                }

                if (to_name == 'J1 M50' && from_name == 'J3 Ashbourne South') {
                    var geoFile = J3AshbourneJ1M50S;
                } else {
                    var geoFile = J3;

                }



                var m4SegOptions = {
                    //radius: 8,
                    //fillColor: colours[i],
                    //fillColor: '#FF0000', //setMarkerColor(spaces),
                    // color: '#FF0000',
                    weight: 800,
                    opacity: 1,
                    fillOpacity: 1
                };


                //colour the road segments according to travel time
                //colour the road segments according to travel time

                //set the colour
                var m4SegOptionsColor = setTripsColourCSV(travelTime);
                var m4dash = '';
                /*  if(travelTime<=freeFlowTravelTime){
                 var m4SegOptionsColor = '#0571b0';  //blue
                 var m4dash = '';
                 
                 }
                 else{
                 //there is a delay
                 var m4SegOptionsColor = '#ca0020'; //Red
                 var m4dash = '';
                 }*/


                //set the popup text.
                geoFile.properties.popupContent = text;
                geoFile.properties.colour = m4SegOptionsColor;
                geoFile.properties.dashArray = m4dash;

                var lyr = L.geoJson(geoFile, {
                    style: {weight: 1},
                    onEachFeature: function (feature, layer) {
                        popup = layer.bindPopup(layer.feature.properties.popupContent);
                        console.log(layer)
                        popup.on("popupclose", function (e) {
                            isSelected = 'yes';
                            resetRoadHighlight(e);
                            //lyr.resetStyle();
                        });
                        layer.setStyle({
                            weight: 5,
                            color: m4SegOptionsColor,
                            dashArray: '',
                            fillOpacity: 1
                        });

                        layer.on({
                            mouseover: highlightRoadFeature,
                            mouseout: resetRoadHighlight,
                            click: highlightRoadFeature2
                        })


                    }
                });//.addTo(map);    //add layer to the map

                m4East.addLayer(lyr);

            }
            //close for loop 

            if (initial == 1 || map.hasLayer(m4East)) {
                m4East.addTo(map);
            }



            function highlightRoadFeature(e) {
                isSelected = 'yes';
                var layer = e.target;

                layer.setStyle({// highlight the feature
                    weight: 10,
                    color: '#0000FF',
                    dashArray: '',
                    // fillOpacity: 1
                });

                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }
            }




            function highlightRoadFeature2(e) {
                isSelected = 'no';
                var layer = e.target;
                layer.setStyle({// highlight the feature
                    weight: 10,
                    color: '#0000FF',
                    dashArray: '',
                    //fillOpacity: 1
                });

                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }

            }


            function resetRoadHighlight(e) {
                //alert(e.target.feature.properties.colour);
                if (isSelected == 'yes') {
                    var layer = e.target;


                    layer.setStyle({// highlight the feature
                        weight: 5,
                        color: e.target.feature.properties.colour,
                        // fillColor:'#00FF00',
                        dashArray: e.target.feature.properties.dashArray,
                        //fillOpacity: setMarkerIntensity(
                    });
                    isSelected = 'no';
                }

            }



        });


        //M1 Southbound
        $.get("/CarParks/travelTimes", function (point) {
            obj = JSON.parse(point);

            var numberOfDataPoints = obj.M1_southBound.data.length; //number of junctions
            var fullTravelTime = Math.round(obj.M1_southBound.data[(numberOfDataPoints) - 1].current_travel_time / 60);
            var fullFreeFlowTraveTime = Math.round(obj.M1_southBound.data[(numberOfDataPoints) - 1].free_flow_travel_time / 60);

            for (var i = 0; i < numberOfDataPoints; i++) {

                var isSelected = 'no';
                var popup;

                var time = '0';
                var travelTime = Math.round(obj.M1_southBound.data[i].current_travel_time / 60);

                var from_name = obj.M1_southBound.data[i].from_name;
                var to_name = obj.M1_southBound.data[i].to_name;
                var freeFlowTravelTime = Math.round(obj.M1_southBound.data[i].free_flow_travel_time / 60);

                var fullText = "The Travel Time from " + obj.M1_southBound.data[0].from_name + " to " + obj.M1_southBound.data[numberOfDataPoints - 1].to_name + " is currently " + fullTravelTime + " minutes";

                var text = "<table style=\"width:300px\"><tr><b>The Travel Time from " + obj.M1_southBound.data[i].from_name + " to " + obj.M1_southBound.data[i].to_name + " is currently " + travelTime + " minutes.  (Freeflow travel time is " + freeFlowTravelTime + " minutes).<br>" + fullText + "</b></td></tr></table>";


                //load the json objects
                if (to_name == 'J1 (M50)' && from_name == 'NI Border') {
                    var geoFile = FULL; //empty set of coordinates

                } else if (from_name == 'J10 Drogheda North') {
                    var geoFile = J10DroghedaJ1M50S;

                } else {
                    var geoFile = J3;

                }



                var m4SegOptions = {
                    //radius: 8,
                    //fillColor: colours[i],
                    //fillColor: '#FF0000', //setMarkerColor(spaces),
                    // color: '#FF0000',
                    weight: 800,
                    opacity: 1,
                    fillOpacity: 1
                };


                //colour the road segments according to travel time
                //colour the road segments according to travel time

                //set the colour
                var m4SegOptionsColor = setTripsColourCSV(travelTime);
                var m4dash = '';
                /*  if(travelTime<=freeFlowTravelTime){
                 var m4SegOptionsColor = '#0571b0';  //blue
                 var m4dash = '';
                 
                 }
                 else{
                 //there is a delay
                 var m4SegOptionsColor = '#ca0020'; //Red
                 var m4dash = '';
                 }*/


                //set the popup text.
                geoFile.properties.popupContent = text;
                geoFile.properties.colour = m4SegOptionsColor;
                geoFile.properties.dashArray = m4dash;

                var lyr = L.geoJson(geoFile, {
                    style: {weight: 1},
                    onEachFeature: function (feature, layer) {
                        popup = layer.bindPopup(layer.feature.properties.popupContent);
                        console.log(layer)
                        popup.on("popupclose", function (e) {
                            isSelected = 'yes';
                            resetRoadHighlight(e);
                            //lyr.resetStyle();
                        });
                        layer.setStyle({
                            weight: 5,
                            color: m4SegOptionsColor,
                            dashArray: '',
                            fillOpacity: 1
                        });

                        layer.on({
                            mouseover: highlightRoadFeature,
                            mouseout: resetRoadHighlight,
                            click: highlightRoadFeature2
                        })


                    }
                });//.addTo(map);    //add layer to the map

                m4East.addLayer(lyr);

            }
            //close for loop 

            if (initial == 1 || map.hasLayer(m4East)) {
                m4East.addTo(map);
            }



            function highlightRoadFeature(e) {
                isSelected = 'yes';
                var layer = e.target;

                layer.setStyle({// highlight the feature
                    weight: 10,
                    color: '#0000FF',
                    dashArray: '',
                    // fillOpacity: 1
                });

                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }
            }




            function highlightRoadFeature2(e) {
                isSelected = 'no';
                var layer = e.target;
                layer.setStyle({// highlight the feature
                    weight: 10,
                    color: '#0000FF',
                    dashArray: '',
                    //fillOpacity: 1
                });

                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }

            }


            function resetRoadHighlight(e) {
                //alert(e.target.feature.properties.colour);
                if (isSelected == 'yes') {
                    var layer = e.target;


                    layer.setStyle({// highlight the feature
                        weight: 5,
                        color: e.target.feature.properties.colour,
                        // fillColor:'#00FF00',
                        dashArray: e.target.feature.properties.dashArray,
                        //fillOpacity: setMarkerIntensity(
                    });
                    isSelected = 'no';
                }

            }



        });

        //M1 Northbound
        $.get("/CarParks/travelTimes", function (point) {
            obj = JSON.parse(point);

            var numberOfDataPoints = obj.M1_northBound.data.length; //number of junctions
            var fullTravelTime = Math.round(obj.M1_northBound.data[(numberOfDataPoints) - 1].current_travel_time / 60);
            var fullFreeFlowTraveTime = Math.round(obj.M1_northBound.data[(numberOfDataPoints) - 1].free_flow_travel_time / 60);

            for (var i = 0; i < numberOfDataPoints; i++) {

                var isSelected = 'no';
                var popup;

                var time = '0';
                var travelTime = Math.round(obj.M1_northBound.data[i].current_travel_time / 60);

                var from_name = obj.M1_northBound.data[i].from_name;
                var to_name = obj.M1_northBound.data[i].to_name;
                var freeFlowTravelTime = Math.round(obj.M1_northBound.data[i].free_flow_travel_time / 60);

                var fullText = "The Travel Time from " + obj.M1_northBound.data[0].from_name + " to " + obj.M1_northBound.data[numberOfDataPoints - 1].to_name + " is currently " + fullTravelTime + " minutes";

                var text = "<table style=\"width:300px\"><tr><b>The Travel Time from " + obj.M1_northBound.data[i].from_name + " to " + obj.M1_northBound.data[i].to_name + " is currently " + travelTime + " minutes.  (Freeflow travel time is " + freeFlowTravelTime + " minutes).<br>" + fullText + "</b></td></tr></table>";


                //load the json objects
                if (to_name == 'NI Border' && from_name == 'J1 (M50)') {
                    var geoFile = FULL; //empty set of coordinates

                } else if (from_name == 'J1 (M50)') {
                    var geoFile = J1M50NDroghedaJ9;

                } else {
                    var geoFile = J3;

                }



                var m4SegOptions = {
                    //radius: 8,
                    //fillColor: colours[i],
                    //fillColor: '#FF0000', //setMarkerColor(spaces),
                    // color: '#FF0000',
                    weight: 800,
                    opacity: 1,
                    fillOpacity: 1
                };


                //colour the road segments according to travel time
                //colour the road segments according to travel time

                //set the colour
                var m4SegOptionsColor = setTripsColourCSV(travelTime);
                var m4dash = '';
                /*  if(travelTime<=freeFlowTravelTime){
                 var m4SegOptionsColor = '#0571b0';  //blue
                 var m4dash = '';
                 
                 }
                 else{
                 //there is a delay
                 var m4SegOptionsColor = '#ca0020'; //Red
                 var m4dash = '';
                 }*/


                //set the popup text.
                geoFile.properties.popupContent = text;
                geoFile.properties.colour = m4SegOptionsColor;
                geoFile.properties.dashArray = m4dash;

                var lyr = L.geoJson(geoFile, {
                    style: {weight: 1},
                    onEachFeature: function (feature, layer) {
                        popup = layer.bindPopup(layer.feature.properties.popupContent);
                        console.log(layer)
                        popup.on("popupclose", function (e) {
                            isSelected = 'yes';
                            resetRoadHighlight(e);
                            //lyr.resetStyle();
                        });
                        layer.setStyle({
                            weight: 5,
                            color: m4SegOptionsColor,
                            dashArray: '',
                            fillOpacity: 1
                        });

                        layer.on({
                            mouseover: highlightRoadFeature,
                            mouseout: resetRoadHighlight,
                            click: highlightRoadFeature2
                        })


                    }
                });//.addTo(map);    //add layer to the map

                m4East.addLayer(lyr);

            }
            //close for loop 

            if (initial == 1 || map.hasLayer(m4East)) {
                m4East.addTo(map);
            }



            function highlightRoadFeature(e) {
                isSelected = 'yes';
                var layer = e.target;

                layer.setStyle({// highlight the feature
                    weight: 10,
                    color: '#0000FF',
                    dashArray: '',
                    // fillOpacity: 1
                });

                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }
            }




            function highlightRoadFeature2(e) {
                isSelected = 'no';
                var layer = e.target;
                layer.setStyle({// highlight the feature
                    weight: 10,
                    color: '#0000FF',
                    dashArray: '',
                    //fillOpacity: 1
                });

                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }

            }


            function resetRoadHighlight(e) {
                //alert(e.target.feature.properties.colour);
                if (isSelected == 'yes') {
                    var layer = e.target;


                    layer.setStyle({// highlight the feature
                        weight: 5,
                        color: e.target.feature.properties.colour,
                        // fillColor:'#00FF00',
                        dashArray: e.target.feature.properties.dashArray,
                        //fillOpacity: setMarkerIntensity(
                    });
                    isSelected = 'no';
                }

            }



        });

        //M50 NORTHBOUND

        $.get("/CarParks/travelTimes", function (point) {
            obj = JSON.parse(point);

            var numberOfDataPoints = obj.M50_northBound.data.length; //number of junctions
            var fullTravelTime = Math.round(obj.M50_northBound.data[(numberOfDataPoints) - 1].current_travel_time / 60);
            var fullFreeFlowTraveTime = Math.round(obj.M50_northBound.data[(numberOfDataPoints) - 1].free_flow_travel_time / 60);

            for (var i = 0; i < numberOfDataPoints; i++) {

                var isSelected = 'no';
                var popup;

                var time = '0';
                var travelTime = Math.round(obj.M50_northBound.data[i].current_travel_time / 60);

                var from_name = obj.M50_northBound.data[i].from_name;
                var to_name = obj.M50_northBound.data[i].to_name;
                var freeFlowTravelTime = Math.round(obj.M50_northBound.data[i].free_flow_travel_time / 60);

                var fullText = "The Travel Time from " + obj.M50_northBound.data[0].from_name + " to " + obj.M50_northBound.data[numberOfDataPoints - 1].to_name + " is currently " + fullTravelTime + " minutes";

                var text = "<table style=\"width:300px\"><tr><b>The Travel Time from " + obj.M50_northBound.data[i].from_name + " to " + obj.M50_northBound.data[i].to_name + " is currently " + travelTime + " minutes.  (Freeflow travel time is " + freeFlowTravelTime + " minutes).<br>" + fullText + "</b></td></tr></table>";


                //load the json objects
                if (to_name == 'J3 M1/N32/DPT' && from_name == 'J17 Shankill') {
                    var geoFile = FULL; //empty set of coordinates

                } else if (from_name == 'J5 Finglas') {
                    var geoFile = J5N;
                } else if (from_name == 'Blanchardstown') {
                    var geoFile = J6N;
                } else if (from_name == 'J7 Palmerstown') {
                    var geoFile = J7N;
                } else if (from_name == 'J9 Red Cow') {
                    var geoFile = J9N;
                } else if (from_name == 'J11 Balrathory') {
                    var geoFile = J11N;
                } else if (from_name == 'J12 Scholarstown') {
                    var geoFile = J12N;
                } else if (from_name == 'J13 Balinteer') {
                    var geoFile = J13N;
                } else if (from_name == 'J15 Ballyogan') {
                    var geoFile = J15N;
                } else if (from_name == 'J16 Cherrywood') {
                    var geoFile = J16N;
                } else if (from_name == 'J17 Shankill') {
                    var geoFile = J17N;
                }


                var m50SegOptions = {
                    //radius: 8,
                    //fillColor: colours[i],
                    //fillColor: '#FF0000', //setMarkerColor(spaces),
                    // color: '#FF0000',
                    weight: 800,
                    opacity: 1,
                    fillOpacity: 1
                };


                //colour the road segments according to travel time
                //colour the road segments according to travel time

                //set the colour
                var m50SegOptionsColor = setTripsColourCSV(travelTime);
                var m50dash = '';
                /*  if(travelTime<=freeFlowTravelTime){
                 var m50SegOptionsColor = '#0571b0';  //blue
                 var m50dash = '';
                 
                 }
                 else{
                 //there is a delay
                 var m50SegOptionsColor = '#ca0020'; //Red
                 var m50dash = '';
                 }*/


                //set the popup text.
                geoFile.properties.popupContent = text;
                geoFile.properties.colour = m50SegOptionsColor;
                geoFile.properties.dashArray = m50dash;

                var lyr = L.geoJson(geoFile, {
                    style: {weight: 1},
                    onEachFeature: function (feature, layer) {
                        popup = layer.bindPopup(layer.feature.properties.popupContent);
                        console.log(layer)
                        popup.on("popupclose", function (e) {
                            isSelected = 'yes';
                            resetRoadHighlight(e);
                            //lyr.resetStyle();
                        });
                        layer.setStyle({
                            weight: 5,
                            color: m50SegOptionsColor,
                            dashArray: '',
                            fillOpacity: 1
                        });

                        layer.on({
                            mouseover: highlightRoadFeature,
                            mouseout: resetRoadHighlight,
                            click: highlightRoadFeature2
                        })


                    }
                });//.addTo(map);    //add layer to the map

                m50North.addLayer(lyr);

            }
            //close for loop 

            if (initial == 1 || map.hasLayer(m50North)) {
                m50North.addTo(map);
            }



            function highlightRoadFeature(e) {
                isSelected = 'yes';
                var layer = e.target;

                layer.setStyle({// highlight the feature
                    weight: 10,
                    color: '#0000FF',
                    dashArray: '',
                    // fillOpacity: 1
                });

                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }
            }




            function highlightRoadFeature2(e) {
                isSelected = 'no';
                var layer = e.target;
                layer.setStyle({// highlight the feature
                    weight: 10,
                    color: '#0000FF',
                    dashArray: '',
                    //fillOpacity: 1
                });

                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }

            }


            function resetRoadHighlight(e) {
                //alert(e.target.feature.properties.colour);
                if (isSelected == 'yes') {
                    var layer = e.target;


                    layer.setStyle({// highlight the feature
                        weight: 5,
                        color: e.target.feature.properties.colour,
                        // fillColor:'#00FF00',
                        dashArray: e.target.feature.properties.dashArray,
                        //fillOpacity: setMarkerIntensity(
                    });
                    isSelected = 'no';
                }

            }





        });



        //bikes

        $.get("https://api.jcdecaux.com/vls/v1/stations?contract=dublin&apiKey=7189fcb899283cf1b42a97fc627eb7682ae8ff7d", function (point) {
            var key, count = 0;
            for (key in point) {
                var bikeStation = {//
                    "type": "Feature",
                    "properties": {
                        "amenity": "Bike station",
                        "popupContent": "<table style=\"width:300px\"><tr><td><b>" + point[count].name + " Bike Station currently has " + point[count].available_bikes + " bikes available and " + point[count].available_bike_stands + " stands available </b></td></tr></table>",
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [point[count].position.lng, point[count].position.lat]
                    }
                };


                var bikeStationOptions = {
                    radius: 8,
                    fillColor: "#ff7800",
                    color: "#000",
                    weight: 1,
                    opacity: 1,
                    fillOpacity: 1 //setMarkerIntensity(spaces)

                };



                var bikeIcon = L.Icon.extend({
                    options: {
                        iconSize: [36, 45],
                        iconAnchor: [18, 45],
                        popupAnchor: [-3, -46]
                    }
                });


                bikeStations.addLayer(L.geoJson(bikeStation, {
                    onEachFeature: onEachBikeFeature, pointToLayer: function (feature, latlng) {
                        return L.marker(latlng, {icon: setBikeStationColour(point[count].available_bikes, point[count].bike_stands)}).bindPopup(bikeStation.popupContent);
                        ;
                    }}));



                count++;


            } //close bikes



            function onEachBikeFeature(feature, layer) {
                popup = layer.bindPopup(layer.feature.properties.popupContent);  //essential

            }

            function setBikeStationColour(bikes, totalStands) {

                var percentageFree = (bikes / totalStands) * 100;

                var one = new bikeIcon({iconUrl: '/dublindashboard/img/Dashboard/icons/bike20.png'}),
                        two = new bikeIcon({iconUrl: '/dublindashboard/img/Dashboard/icons/bike40.png'}),
                        three = new bikeIcon({iconUrl: '/dublindashboard/img/Dashboard/icons/bike60.png'}),
                        four = new bikeIcon({iconUrl: '/dublindashboard/img/Dashboard/icons/bike80.png'}),
                        five = new bikeIcon({iconUrl: '/dublindashboard/img/Dashboard/icons/bike100.png'}),
                        six = new bikeIcon({iconUrl: '/dublindashboard/img/Dashboard/icons/bike120.png'});


                /*return percentageFree < 20 ? '#eff3ff' :
                 percentageFree < 40  ? '#c6dbef' :
                 percentageFree < 60  ? '#9ecae1' :
                 percentageFree < 80  ? '#6baed6' :
                 percentageFree < 100   ? '#3182bd' :
                 percentageFree < 120   ? '#08519c' :
                 '#000000';*/

                return percentageFree < 20 ? one :
                        percentageFree < 40 ? two :
                        percentageFree < 60 ? three :
                        percentageFree < 80 ? four :
                        percentageFree < 101 ? five :
                        // percentageFree < 120   ? six :
                        'six';


            }
        });


















        function onEachFeature(feature, layer) {


            layer.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight,
            });
            // }
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






        //CARPARKS
        $.get("/CarParks/nowParking", function (point) {
            obj = JSON.parse(point);
            var date = new Date();
            //var time = date.getTime(); /use this for dynamically chaning events!
            var time = '1';

            //count how many variables (carparks) we have
            var key, count = 0;
            for (key in obj) {
                count++;
            }

            var i = 0;
            for (var prop in obj) {

                if (obj.hasOwnProperty(prop)) {
                    // alert("OK");
                    var name = prop;
                    var spaces = obj[prop];
                    if (spaces == 'FULL') {
                        spaces = 0;
                    }


                    var text = "<table style=\"width:300px\"><tr><td><b>" + getName(name).name + " Car Park currently has " + spaces + " spaces (Total Spaces:" + getName(name).totalSpaces + ") </b></td></tr></table>"
                    if (spaces == ' ') {
                        var text = '<b>No Data currently availaibe for ' + getName(name).name + " Car Park</b>";
                        spaces = 10000;
                    }



                    var carparkSite = {
                        "type": "Feature",
                        "properties": {
                            "name": "" + name + " Centre Car Park",
                            "amenity": "Car Park",
                            "popupContent": text,
                        },
                        "geometry": {
                            "type": "Point",
                            "coordinates": [getName(name).lat, getName(name).lon]
                        }
                    };

                    var carparkSiteOptions = {
                        radius: 8,
                        //fillColor: "#ff7800",
                        fillColor: setMarkerColor(spaces, getName(name).totalSpaces), //colours[i], //
                        color: "#000",
                        weight: 1,
                        opacity: 1,
                        fillOpacity: 1 //setMarkerIntensity(spaces)
                    };







                    carParks.addLayer(L.geoJson(carparkSite, {
                        onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                            return L.circleMarker(latlng, carparkSiteOptions);
                        }}));

                }

                i++;
            }  //close loop looking at json

            trafficCams.addLayer(L.geoJson(trafficCam1, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam2, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam3, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam4, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam5, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam6, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam7, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam8, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam9, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam10, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam11, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam12, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam13, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam14, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam15, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam16, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam17, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam18, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam19, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam20, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam21, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam22, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam23, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam24, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam25, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam26, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam27, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam28, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam29, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam30, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam31, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam32, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam33, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam34, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam35, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam36, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam37, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam38, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam39, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));
            trafficCams.addLayer(L.geoJson(trafficCam40, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));

            /*trafficCams.addLayer( L.geoJson(trafficCam41,{ 
             onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
             return L.marker(latlng, {icon:trafficIcon});
             }})); */

            /*trafficCams.addLayer( L.geoJson(trafficCam42,{ 
             onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
             return L.marker(latlng, {icon:trafficIcon});
             }})); */

            /*trafficCams.addLayer( L.geoJson(trafficCam43,{ 
             onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
             return L.marker(latlng, {icon:trafficIcon});
             }})); */

            trafficCams.addLayer(L.geoJson(trafficCam44, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));

            trafficCams.addLayer(L.geoJson(trafficCam45, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));

            trafficCams.addLayer(L.geoJson(trafficCam46, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));

            trafficCams.addLayer(L.geoJson(trafficCam47, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));

            /*trafficCams.addLayer( L.geoJson(trafficCam48,{ 
             onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
             return L.marker(latlng, {icon:trafficIcon});
             }})); */

            /*trafficCams.addLayer( L.geoJson(trafficCam49,{ 
             onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
             return L.marker(latlng, {icon:trafficIcon});
             }}));  */

            /*trafficCams.addLayer( L.geoJson(trafficCam50,{ 
             onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
             return L.marker(latlng, {icon:trafficIcon});
             }}));  */

            trafficCams.addLayer(L.geoJson(trafficCam51, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));

            trafficCams.addLayer(L.geoJson(trafficCam52, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));

            trafficCams.addLayer(L.geoJson(trafficCam53, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));

            /*trafficCams.addLayer( L.geoJson(trafficCam54,{ 
             onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
             return L.marker(latlng, {icon:trafficIcon});
             }}));*/

            /*trafficCams.addLayer( L.geoJson(trafficCam55,{ 
             onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
             return L.marker(latlng, {icon:trafficIcon});
             }}));*/

            trafficCams.addLayer(L.geoJson(trafficCam56, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));

            trafficCams.addLayer(L.geoJson(trafficCam57, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));

            trafficCams.addLayer(L.geoJson(trafficCam58, {
                onEachFeature: onEachTrafficCamFeature, pointToLayer: function (feature, latlng) {
                    return L.marker(latlng, {icon: trafficIcon});
                }}));

            if (initial == 1 || map.hasLayer(carParks)) {
                carParks.addTo(map);
                trafficCams.addTo(map);
                bikeStations.addTo(map);

            }
            //carParks.addTo(map);

            function onEachTrafficCamFeature(feature, layer) {
                popup = layer.bindPopup(layer.feature.properties.popupContent);  //essential

            }


            function onEachFeature(feature, layer) {


                layer.on({
                    mouseover: highlightFeature,
                    mouseout: resetHighlight,
                });
                // }
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


            setTimeout(myFunction, 300000); //milliseconds 300000 - 5mins

            //  setTimeout(myFunction, 120000); //milliseconds 120000 - 2mins

            var divData = document.getElementById('dataSources');
            divData.innerHTML = "";
            divData.innerHTML = divData.innerHTML + "<h5>Data Sources</h5>";
            divData.innerHTML = divData.innerHTML + "<h5>The Car Park Data is supplied via Cork Smart Gateway. The colour gradient is determined by the percentage of available spaces. More information about this data can be found <a href=\"http://data.corkcity.ie/dataset/parking\" target=\"_blank\">here.</a></h5>";

            divData.innerHTML = divData.innerHTML + "<h5>The Traffic Camera Data is supplied directly by Transport Infrastructure Ireland. More information about this data can be found <a href=\"https://www.tiitraffic.ie/cams/\" target=\"_blank\">here.</a></h5>";
            divData.innerHTML = divData.innerHTML + "<h5>The Cork Bikes Data is obtained from the National Transport Authority and Coca-Cola Zero Bikes API. More information about this data can be found <a href=\"https://www.bikeshare.ie/cork.html\" target=\"_blank\">here.</a></h5>";


        });


    }


    function highlightRoadFeature(e) {
        isSelected = 'yes';
        var layer = e.target;
        layer.setStyle({// highlight the feature
            weight: 10,
            color: 'blue',
            dashArray: '',
            // opacity: 1
        });

        if (!L.Browser.ie && !L.Browser.opera) {
            layer.bringToFront();
        }
    }

    function highlightRoadFeature2(e) {
        isSelected = 'no';
        var layer = e.target;
        layer.setStyle({// highlight the feature
            weight: 10,
            color: 'blue',
            dashArray: '',
            // opacity: 0.5
        });

        if (!L.Browser.ie && !L.Browser.opera) {
            layer.bringToFront();
        }

    }

    function resetRoadHighlight(e) {
        if (isSelected == 'yes') {
            var layer = e.target;
            var theColour = setTripsColourCSV(Math.round(e.target.feature.properties.travelTime));


            /*  if( theColour =='blue'){
             var dash = '20';
             }
             else{
             var dash= ''; 
             }*/

            layer.setStyle({// highlight the feature
                weight: 3,
                //color: 'orange', // e.target.feature.properties.colour,
                color: theColour,
                dashArray: '',
                //opacity:0.5
                //fillOpacity: setMarkerIntensity(
            });
            isSelected = 'no';
        }
    }

    function onMapClick(e) {

    }

    /* function setTripsColourCSV(speed){
     
     
     if(speed < 50){
     
     return 'blue';
     }
     else {
     
     return 'green';  
     }  
     
     }*/




    function setBikeStationColour(bikes, totalStands) {

        var percentageFree = (bikes / totalStands) * 100;




        return percentageFree < 20 ? '#eff3ff' :
                percentageFree < 40 ? '#c6dbef' :
                percentageFree < 60 ? '#9ecae1' :
                percentageFree < 80 ? '#6baed6' :
                percentageFree < 101 ? '#3182bd' :
                percentageFree < 120 ? '#08519c' :
                '#000000';


    }

    function setTripsColourCSV(travelTime) {


        return travelTime < 1 ? '#f7fcb9' :
                travelTime < 2 ? '#d9f0a3' :
                travelTime < 3 ? '#addd8e' :
                travelTime < 4 ? '#78c679' :
                travelTime < 5 ? '#41ab5d' :
                travelTime < 6 ? '#238443' :
                travelTime < 7 ? '#006837' :
                '#004529';




    }

    Number.prototype.toRad = function () {
        return this * Math.PI / 180;
    }

    function getDistance(fromLat, fromLon, toLat, toLon) {

        var lat2 = toLat;
        var lon2 = toLon;
        var lat1 = fromLat;
        var lon1 = fromLon;
        var R = 6371; // km 

        var x1 = lat2 - lat1;
        var dLat = x1.toRad();
        var x2 = lon2 - lon1;
        var dLon = x2.toRad();
        var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(lat1.toRad()) * Math.cos(lat2.toRad()) *
                Math.sin(dLon / 2) * Math.sin(dLon / 2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        var d = R * c;

        return d;

    }

    function getSpeed(travelTime, distance) {

        var speedSecs = distance / travelTime;
        var hour = 3600;
        var travelTimeHours = travelTime / hour;
        var speed = distance / travelTimeHours;
        return speed;

    }


    function setMarkerColor(spaces, totalSpaces) {
        if (spaces == 10000) { //no data
            return '#000000';
        }
        var percentageFree = (spaces / totalSpaces) * 100;


        /* return percentageFree < 10 ? '#fff7ec' :
         percentageFree < 20  ? '#fee8c8' :
         percentageFree < 30  ? '#fdd49e' :
         percentageFree < 40  ? '#fdbb84' :
         percentageFree < 50   ? '#fc8d59' :
         percentageFree < 60   ? '#ef6548' :
         percentageFree < 70   ? '#d7301f' :
         percentageFree < 80   ? '#b30000' :
         percentageFree < 90   ? '#8f0000' :
         percentageFree < 120  ? '#7f0000' :
         '#000000';*/

        return percentageFree < 10 ? '#7f0000' :
                percentageFree < 20 ? '#8f0000' :
                percentageFree < 30 ? '#b30000' :
                percentageFree < 40 ? '#d7301f' :
                percentageFree < 50 ? '#ef6548' :
                percentageFree < 60 ? '#fc8d59' :
                percentageFree < 70 ? '#fdbb84' :
                percentageFree < 80 ? '#fdd49e' :
                percentageFree < 90 ? '#fee8c8' :
                percentageFree < 120 ? '#fff7ec' :
                '#000000';
    }

    function setMarkerIntensity(spaces) {
        if (spaces < 100) {
            return "0.5";
        } else {
            return "1";
        }
    }

    function setAmbientSoundColor(ambientSound) {
        var good = 55;
        var bad = 70;


        return ambientSound < good ? '#fff7ec' :
                ambientSound > bad ? '#b30000' :
                '#fc8d59';
    }

    function setTripsColour(travelTime) {

        var good = 10;//need the freeflow traveltime



        return travelTime < good ? '#0571b0' :
                travelTime > good ? '#FF0000' :
                '#0571b0';
    }


    function setTripsDash(travelTime) {

        var good = 10;//need the freeflow traveltime



        return travelTime < good ? '' :
                travelTime > good ? '10' :
                '0';
    }



    function onMapClick(e) {



    }
</script>
</section>



</div>
</div>
</div>
</div>
</div>
