<html>
    <head>
        <title>Cork Environmental Indicators</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="Provides access to indicators concerning environmental awareness in Dublin." />
        <meta name="keywords" content="Corkdashboard, Cork, City Benchmarks, water, waste, Irish Water, green flags, recycling, local agenda 21" />
        <link href="/css/Dashboard/fonts/fonts.css" rel="stylesheet" type="text/css"  />        
        <link href="/css/Dashboard/style.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <noscript>
        <link href="/css/Dashboard/fonts/fonts.css" rel="stylesheet" type="text/css"  />       
        <link href="/css/Dashboard/style.css" rel="stylesheet" type="text/css"/>
        </noscript>
        <!--[if lte IE 9]><link rel="stylesheet" href="/dublindashboard/css/Dashboard/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><script src="/dublindashboard/js/Dashboard/html5shiv.js"></script><![endif]-->
        <?php
        echo $this->Html->script('cCitySites.js');
        echo $this->Html->script('nCitySites.js');
        echo $this->Html->script('sCitySites.js');
        echo $this->Html->script('wCitySites.js');
        ?>	
        <!--<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.4.5/leaflet.css" /> -->
        <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
        <!-- <script src="/dublindashboard/js/leaflet.js"></script> -->
        <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
       <!--  <script src="http://cdn.leafletjs.com/leaflet-0.4.5/leaflet.js"></script> -->
        <script src="http://code.jquery.com/jquery-1.8.1.min.js"></script>
        <?php echo $this->fetch('content'); ?>
    </head>
    <body onload="myFunction()">
        <!-- Header -->
        <div id="header-wrapper">
            <?php echo $this->element('dbBanner'); ?>
            <?php echo $this->element('dbNavMenu'); ?>
        </div>
        <!--Responsive content-->
        <div style="overflow:auto">
            <?php echo $this->element('sidebar') ?>
            <div class="onlyContent">
                <div style="border-bottom:2px solid #e5e5e5">
                        <h1>Environmental Indicators</h1>
                        
                </div>
                <div><h3>Explore information relating to waste, recycling, 
                        water quality, Green Schools, Local Agenda 21 Projects 
                        and traffic volumes on Cork roads.</h3></div>
                <?php echo $this->fetch('content') ?>
                <div class="row" style="border-bottom:2px solid #e5e5e5">
                    <div class="col-9" >
                        <h2>Waste Management</h2>
                        <br>
                        <div class="content" id="tab31"><?php echo $this->element($Graph5, array("function" => "EnvironmentTransport/stats/tab31")); ?></div> 
                        <br>
                        <div class="content" id="tab1"><?php echo $this->element($Graph5, array("function" => "EnvironmentTransport/recycling/tab1")); ?></div> 
                        <br>
                        <div class="content" id="tab14"><?php echo $this->element($Graph5, array("function" => "EnvironmentTransport/organicrecycling/tab14")); ?></div> 
                        <br>
                        <div style="border-bottom:2px solid #e5e5e5">
                        </div>
                        <br>
                        <h2>Water Management</h2>
                        <br>
                        <div class="content" id="tab51"><?php echo $this->element($Graph5, array("function" => "EnvironmentTransport/riverWaterQuality/tab51")); ?></div> 
                        <br>
                        <div style="border-bottom:2px solid #e5e5e5">
                        </div>
                        <br>
                        <h2>Environmental Awareness</h2>
                        <br>
                        <div class="content" id="tab61"><?php echo $this->element($Graph5, array("function" => "EnvironmentTransport/greenFlags/tab61")); ?></div> 
                        <br>
                        <div class="content" id="tab12"><?php echo $this->element($Graph5, array("function" => "EnvironmentTransport/localagenda/tab12")); ?></div> 
                        <br>
                        <div style="border-bottom:2px solid #e5e5e5">
                        </div>
                        <br>
                        <h2>Typical Traffic Volumes in Cork <font size="3"> 
                            (View in <a href="/dublindashboard/ScatsMap.html" target="_blank">full screen)
                            </a></h2>
                        <br>
                        <p><strong>Annual Average Daily Traffic</strong>, abbreviated <strong>AADT</strong>, is a measure used primarily in transportation planning and transportation engineering. Traditionally, it is the total volume of vehicle traffic of a highway or road for a year divided by 365 days.
                        </p><br>
                        <p>Click on a site to see the collected traffic data. See below for more details on the information gathered.</p>
                        <br>
                        <center>  
                            <div class="row">
                                <!--<div id="containerK" class="col-8" >-->
                                <div id="map" style="width: 95%; height: 600px"></div>
                                <!--                                </div>-->
                            </div>
                        </center>
                        <br>
                        <p> The traffic volume data above are taken from 
                            <a href="https://www.nratrafficdata.ie/" target=\"_blank\">
                                Transport Infrastructure Ireland</a>
                            's traffic volume reports.</p> <br>
                        <p> <strong>AADT</strong> is an estimate of the mean daily traffic volume over 
                            the course of a year. An exact computation of AADT involves 
                            dividing the total traffic volume in the year by the number 
                            of days in the year hence it fails to take account of seasonal, 
                            monthly, daily and hourly variations in traffic flow.</p><br>
                        <p> <strong>% HGV</strong> 
                            indicates the percentage of heavy goods vehicles from the 
                            recorded data. Articulated and Rigid trucks are classified 
                            as HGVs, buses and vehicles pulling trailers do not fall under 
                            this category.</p><br>
                        <p> <strong>Coverage</strong> refers to the percentage period in a 
                            given year that data was collected from a particular site.
                        </p>
                        <br>
                    </div>
                </div>
            </div>
            <div id="footer-wrapper">
                <footer id="footer" class="container">
                    <div class="row">
                        <?php echo $this->element('dbFooter'); ?>
                    </div>
                </footer>
            </div>
            <?php echo $this->element('googleAnalytics'); ?>
            <!-- Copyright -->
            <div id="copyright">
                <?php echo $this->element('copyright'); ?>
            </div>
        </div>



        <script type="text/javascript">
//            $('#menu1').tabify();
//            $('#menu2').tabify();
//            $('#menu3').tabify();
//            $('#menu33').tabify();
//            $('#menu43').tabify();
//            $('#menu53').tabify();
//            $('#menu73').tabify();
//            $('#menu83').tabify();
        </script>

    </body>
    <script>
        var map, popup;
        //highchart default colour array
        var colours = ['#2f7ed8', '#0d233a', '#8bbc21', '#910000', '#1aadce', '#492970', '#f28f43', '#77a1e5', '#c42525', '#a6c96a', '#2f7ed8', '#0d233a', '#8bbc21', '#910000', '#1aadce', '#492970', '#f28f43', '#77a1e5', '#c42525', '#a6c96a'];

        var cloudmadeUrl = 'http://{s}.tile.cloudmade.com/BC9A493B41014CAABB98F0471D759707/997/256/{z}/{x}/{y}.png',
                cloudmadeAttribution = 'Map data &copy; 2011 OpenStreetMap contributors, Imagery &copy; 2011 CloudMade',
                cloudmade = new L.TileLayer(cloudmadeUrl, {maxZoom: 18, attribution: cloudmadeAttribution});

        var osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        var osmAttrib = 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors';
        var osm = new L.TileLayer(osmUrl, {minZoom: 8, maxZoom: 18, attribution: osmAttrib});


        var nexrad = new L.TileLayer.WMS("http://suite.opengeo.org/geoserver/usa/wms", {
            layers: 'usa:states',
            format: 'image/png',
            transparent: true
        });

        map = new L.Map('map', {
            center: new L.LatLng(51.999537, -8.483712),
            zoom: 10,
            // layers: [osm],
            zoomControl: true
        });

        map.addLayer(osm);

        map.addEventListener('click', onMapClick);


        popup = new L.Popup({
            //maxWidth: 400,
            //minWidth: 400
        });


        var popupOptions =
                {
                    'minWidth': '415',
                    'maxWidth': '415'
                }


        function getName(propertyName, citySites) {
            if (citySites == "centre") {
                return cCitySites[propertyName];
            } else if (citySites == "south") {
                return sCitySites[propertyName];
            } else if (citySites == "north") {
                return nCitySites[propertyName];
            } else if (citySites == "west") {
                return wCitySites[propertyName];
            }
        }
        ;

        var group = new L.FeatureGroup();
        var group2 = new L.FeatureGroup();


        function myFunction() {
            var i = 0;
            for (var key in cCitySites) { //parse through the locations in the Js sites file

                if (cCitySites.hasOwnProperty(key)) {
                    //alert(key + " -> " + cCitySites[key].lat);
                    var name = key;
                    var scatsSite = {
                        "type": "Feature",
                        "properties": {
                            "amenity": "SCATS Sensor",
                            "popupContent": "<h4><b>Site:" + name + " </b></h4>" + "<table style=\"width:200px\"> <tr> <td><img src=\"/dublindashboard/img/Cork_SCATS/" + name + ".png\" width=\"400px\"> </td> </tr> </table> ",
                        },
                        "geometry": {
                            "type": "Point",
                            "coordinates": [getName(name, "centre").longo, getName(name, "centre").lato]
                        }
                    };

                    var scatsSiteOptions = {
                        radius: 5,
                        //fillColor: "#ff7800",
                        fillColor: "#0000FF", //colours[0], 
                        color: "#000",
                        weight: 1,
                        opacity: 1,
                        fillOpacity: 1
                    };

                    group.addLayer(L.geoJson(scatsSite, {
                        onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                            return L.circleMarker(latlng, scatsSiteOptions);
                        }}));


                    group.addTo(map);

                }
                i++;
            }

            for (var key in nCitySites) { //parse through the locations in the Js sites file

                if (nCitySites.hasOwnProperty(key)) {
                    //alert(key + " -> " + nCitySites[key].lat);
                    var name = key;
                    var scatsSite = {
                        "type": "Feature",
                        "properties": {
                            "amenity": "SCATS Sensor",
                            "popupContent": "<h4><b>Site:" + name + " </b></h4>" + "<table style=\"width:200px\"> <tr> <td><img src=\"/dublindashboard/img/ImageOutput/nMonday" + name + ".gif\" width=\"200px\"> </td> <td> <img src=\"/dublindashboard/img/ImageOutput/nTuesday" + name + ".gif\" width=\"200px\"> </td> <td> <img src=\"/dublindashboard/img/ImageOutput/nWednesday" + name + ".gif\" width=\"200px\"> </td> <td> <img src=\"/dublindashboard/img/ImageOutput/nThursday" + name + ".gif\" width=\"200px\"> </td> </tr>  <tr>  <td>  <img src=\"/dublindashboard/img/ImageOutput/nFriday" + name + ".gif\" width=\"200px\"> </td><td> <img src=\"/dublindashboard/img/ImageOutput/nSaturday" + name + ".gif\" width=\"200px\"> </td><td> <img src=\"/dublindashboard/img/ImageOutput/nSunday" + name + ".gif\" width=\"200px\"> </td></tr> </table> ",
                        },
                        "geometry": {
                            "type": "Point",
                            "coordinates": [getName(name, "north").longo, getName(name, "north").lato]
                        }
                    };

                    var scatsSiteOptions = {
                        radius: 5,
                        //fillColor: "#ff7800",
                        fillColor: "#0000FF", //colours[0], 
                        color: "#000",
                        weight: 1,
                        opacity: 1,
                        fillOpacity: 1
                    };

                    group.addLayer(L.geoJson(scatsSite, {
                        onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                            return L.circleMarker(latlng, scatsSiteOptions);
                        }}));


                    group.addTo(map);

                }
                i++;
            }
            for (var key in sCitySites) { //parse through the locations in the Js sites file

                if (sCitySites.hasOwnProperty(key)) {
                    //alert(key + " -> " + sCitySites[key].lat);
                    var name = key;

                    var scatsSite = {
                        "type": "Feature",
                        "properties": {
                            "amenity": "SCATS Sensor",
                            "popupContent": "<h4><b>Site:" + name + " </b></h4>" + "<table style=\"width:200px\"> <tr> <td><img src=\"/dublindashboard/img/ImageOutput/scMonday" + name + ".gif\" width=\"200px\"> </td> <td> <img src=\"/dublindashboard/img/ImageOutput/scTuesday" + name + ".gif\" width=\"200px\"> </td> <td> <img src=\"/dublindashboard/img/ImageOutput/scWednesday" + name + ".gif\" width=\"200px\"> </td> <td> <img src=\"/dublindashboard/img/ImageOutput/scThursday" + name + ".gif\" width=\"200px\"> </td> </tr>  <tr>  <td>  <img src=\"/dublindashboard/img/ImageOutput/scFriday" + name + ".gif\" width=\"200px\"> </td><td> <img src=\"/dublindashboard/img/ImageOutput/scSaturday" + name + ".gif\" width=\"200px\"> </td><td> <img src=\"/dublindashboard/img/ImageOutput/scSunday" + name + ".gif\" width=\"200px\"> </td></tr> </table> ",
                        },
                        "geometry": {
                            "type": "Point",
                            "coordinates": [getName(name, "south").longo, getName(name, "south").lato]
                        }
                    };

                    var scatsSiteOptions = {
                        radius: 5,
                        //fillColor: "#ff7800",
                        fillColor: "#0000FF", //colours[0], 
                        color: "#000",
                        weight: 1,
                        opacity: 1,
                        fillOpacity: 1
                    };

                    group.addLayer(L.geoJson(scatsSite, {
                        onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                            return L.circleMarker(latlng, scatsSiteOptions);
                        }}));


                    group.addTo(map);

                }
                i++;
            }


            for (var key in wCitySites) { //parse through the locations in the Js sites file

                if (wCitySites.hasOwnProperty(key)) {
                    //alert(key + " -> " + nCitySites[key].lat);
                    var name = key;

                    var scatsSite = {
                        "type": "Feature",
                        "properties": {
                            "amenity": "SCATS Sensor",
                            "popupContent": "<h4><b>Site:" + name + " </b></h4>" + "<table style=\"width:200px\"> <tr> <td><img src=\"/dublindashboard/img/ImageOutput/wMonday" + name + ".gif\" width=\"200px\"> </td> <td> <img src=\"/dublindashboard/img/ImageOutput/wTuesday" + name + ".gif\" width=\"200px\"> </td> <td> <img src=\"/dublindashboard/img/ImageOutput/wWednesday" + name + ".gif\" width=\"200px\"> </td> <td> <img src=\"/dublindashboard/img/ImageOutput/wThursday" + name + ".gif\" width=\"200px\"> </td> </tr>  <tr>  <td>  <img src=\"/dublindashboard/img/ImageOutput/wFriday" + name + ".gif\" width=\"200px\"> </td><td> <img src=\"/dublindashboard/img/ImageOutput/wSaturday" + name + ".gif\" width=\"200px\"> </td><td> <img src=\"/dublindashboard/img/ImageOutput/wSunday" + name + ".gif\" width=\"200px\"> </td></tr> </table> ",
                        },
                        "geometry": {
                            "type": "Point",
                            "coordinates": [getName(name, "west").longo, getName(name, "west").lato]
                        }
                    };

                    var scatsSiteOptions = {
                        radius: 5,
                        //fillColor: "#ff7800",
                        fillColor: "#0000FF", //colours[0], 
                        color: "#000",
                        weight: 1,
                        opacity: 1,
                        fillOpacity: 1
                    };

                    group.addLayer(L.geoJson(scatsSite, {
                        onEachFeature: onEachFeature, pointToLayer: function (feature, latlng) {
                            return L.circleMarker(latlng, scatsSiteOptions);
                        }}));


                    group.addTo(map);

                }
                i++;
            }



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
                layer.bindPopup(layer.feature.properties.popupContent, popupOptions);  //essential

            }


            //setTimeout(myFunction, 300000); //milliseconds 300000 - 5mins    

        }

        function onMapClick(e) {
        }

    </script>
</html>


<!--<div id="maincontentcontainer">
    <h4>Waste Management</h4>
    <center>                  
        <div class="section group">
            <div id="containerA" class="col span_2_of_2" >
                <ul class ="menu" id="menu33">
                    <li class="active"><a href="#tab31">Count</a></li>
                </ul>                       
            </div>
        </div>
    </center> 



    <center>                  
        <div class="section group">
            <div id="containerA" class="col span_2_of_2" >
                <ul class ="menu" id="menu3">
                    <li class="active"><a href="#tab1">Rate</a></li>


                </ul>                       

            </div>

            <div class="section group">
                <div id="containerA" class="col span_2_of_2" >
                    <ul class ="menu" id="menu3">
                        <li class="active"><a href="#tab14">Rate</a></li>


                    </ul>                       





                </div>
            </div>
    </center> 
    <h4>Water Management</h4> 


    <center>                  
        <div class="section group">
            <div id="containerA" class="col span_2_of_2" >
                <ul class ="menu" id="menu5">
                    <li class="active"><a href="#tab51">Rate</a></li>
                </ul>                       
            </div>
        </div>
    </center>
    <h4>Environmental Awareness</h4> 
    <center>                  
        <div class="section group">
            <div id="containerA" class="col span_2_of_2" >
                <ul class ="menu" id="menu6">
                    <li class="active"><a href="#tab61">Count</a></li> 
                </ul>                       


            </div>       
        </div>
    </center> 

    <center>  
        <div class="section group">
            <div id="containerA" class="col span_2_of_2" >
                <ul class ="menu" id="menu7">
                    <li class="active"><a href="#tab12">Count</a></li> 
                </ul>                       



            </div>
        </div>
    </center>

    <div id="menu_items_lower">
        <div  class="col span_1_of_6">
            <a href="/./Economy/stats/container"><img src="/dublindashboard/img/Industry_Employment_Labour_Market.png" onmouseover="this.src = '/dublindashboard/img/Industry_Employment_Labour_Market_Blue.png'" onmouseout="this.src = '/dublindashboard/img/Industry_Employment_Labour_Market.png'" border="0" alt=""/></a>
        </div>

        <div class="col span_1_of_6">
            <a href ="/./EnvironmentTransport/stats"><img src="/dublindashboard/img/Environment_TransportBlue.png" border="0" alt=""/></a>
        </div>

        <div class="col span_1_of_6">
            <a href="/./Housings/stats"><img src="/dublindashboard/img/Housing.png" onmouseover="this.src = '/dublindashboard/img/HousingBlue.png'" onmouseout="this.src = '/dublindashboard/img/Housing.png'" border="0" alt=""/></a>
        </div>
        <div class="col span_1_of_6">
            <a href="/./Demographics/stats"><img src="/dublindashboard/img/Population.png" onmouseover="this.src = '/dublindashboard/img/PopulationBlue.png'" onmouseout="this.src = '/dublindashboard/img/Population.png'"  border="0" alt=""/></a>
        </div>

        <div class="col span_1_of_6">
            <a href="/./HealthEducation/stats"><img src="/dublindashboard/img/Health_Education.png" onmouseover="this.src = '/dublindashboard/img/Health_EducationBlue.png'" onmouseout="this.src = '/dublindashboard/img/Health_Education.png'" border="0" alt=""/></a>    
        </div>

        <div class="col span_1_of_6">
            <a href="/./CrimeEmergencyServices/stats"><img src="/dublindashboard/img/CrimeEmergencyServices.png" onmouseover="this.src = '/dublindashboard/img/CrimeEmergencyServicesBlue.png'" onmouseout="this.src = '/dublindashboard/img/CrimeEmergencyServices.png'" border="0" alt=""/></a>
        </div>

    </div>-->













