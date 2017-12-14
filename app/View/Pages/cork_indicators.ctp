<?php $this->assign('title', "Data Indicators"); ?>

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




<div class="onlyContent">
    <!--//<div style="overflow:auto">-->
    <div style="border-bottom:2px solid #e5e5e5">
        <h1>Data Indicators</h1>
    </div>
    <div style="padding-bottom:1vh">
        <h3>See historical trends in Cork for a range of sectors including 
            industry and employment, environment and transport, housing, 
            population, health and education and crime and emergency services. </h3>
        <p>Click on an indicator category to see the information appear below.

        </p>
    </div>

    <form id="MyFormID" style="padding: 5vh 0vw 15vh 0vw">
        <div style="padding: 0vh 1vw 0vh 1vw">
            <div class ="col-2">
                <span style="display:none;">
                    <input 
                        type="radio" 
                        name="thisradio" 
                        id="RadioFieldID1"
                        checked=true>

                </span><img 
                    id="ImageRadioFieldID1" 
                    src="/img/Dashboard/Cork_Indicator_Icons/PopulationBlue.png" 
                    width="100%" 
                    height="auto" 
                    onclick="RadioClicked('RadioFieldID1', 'thisradio', 'MyFormID', 0)" 
                    style="cursor:pointer;">
            </div>
            <div class ="col-2">

                <span style="display:none;">
                    <input 
                        type="radio" 
                        name="thisradio" 
                        id="RadioFieldID2" 
                        checked=false
                        >
                </span><img 
                    id="ImageRadioFieldID2" 
                    src=  "/img/Dashboard/Cork_Indicator_Icons/Industry_Employment_Labour_Market.png"

                    width=100% 
                    height="auto" 
                    onclick="RadioClicked('RadioFieldID2', 'thisradio', 'MyFormID', 1)" 
                    style="cursor:pointer;">
            </div>
            <div class ="col-2">
                <span style="display:none;">
                    <input 
                        type="radio" 
                        name="thisradio" 
                        value="3" 
                        id="RadioFieldID3"
                        checked=false>
                </span><img 
                    id="ImageRadioFieldID3" 
                    src="/img/Dashboard/Cork_Indicator_Icons/Housing.png"

                    width="100%" 
                    height="auto" 
                    onclick="RadioClicked('RadioFieldID3', 'thisradio', 'MyFormID', 2)" 
                    style="cursor:pointer;">
            </div>
            <div class ="col-2">
                <span style="display:none;">
                    <input 
                        type="radio" 
                        name="thisradio" 
                        id="RadioFieldID4"
                        checked=false
                        >
                </span><img 
                    id="ImageRadioFieldID4" 
                    src=  "/img/Dashboard/Cork_Indicator_Icons/Environment_Transport.png"
                    width="100%" 
                    height="auto" 
                    onclick="RadioClicked('RadioFieldID4', 'thisradio', 'MyFormID', 3)" 
                    style="cursor:pointer;">
            </div>
            <div class ="col-2">
                <span style="display:none;">
                    <input 
                        type="radio" 
                        name="thisradio" 
                        id="RadioFieldID5"
                        checked=false
                        >
                </span><img 
                    id="ImageRadioFieldID5" 
                    src="/img/Dashboard/Cork_Indicator_Icons/Health_Education.png" 

                    width=100% 
                    height="auto" 
                    onclick="RadioClicked('RadioFieldID5', 'thisradio', 'MyFormID', 4)" 
                    style="cursor:pointer;">
            </div>
            <div class ="col-2">
                <span style="display:none;">
                    <input 
                        type="radio" 
                        name="thisradio" 
                        id="RadioFieldID6"
                        checked=false>
                </span><img 
                    id="ImageRadioFieldID6" 
                    src="/img/Dashboard/Cork_Indicator_Icons/CrimeEmergencyServices.png"
                    width="100%" 
                    height="auto" 
                    onclick="RadioClicked('RadioFieldID6', 'thisradio', 'MyFormID', 5)" 
                    style="cursor:pointer;">
            </div>

        </div>
    </form>
    <div id="indicatorHeader" style="padding:0vh 0vw 5vh 0vw;">
    </div>

    <div style="padding:0vh 1vw 0vh 1vw;">
        <iframe class = "highchartsFrame"  style="height:4000px" 
                id="graphContent" scrolling="no" src="/./Demographics/stats" name="iframe_indicators">
            <p>Your browser does not support iframes.</p>  </iframe>

    </div>

    <div class="col-12" id="indicatorMapTop" style="padding:0vh 0vw 5vh 0vw; display: block "></div>
<!--    <div id="map" style= "width: 100%; height: 600px"></div>
    <div id="indicatorMapBottom" style="padding:0vh 0vw 5vh 0vw;"></div>-->



    <!--    <div style="padding: 0vh 2vw 0vh 2vw">
            <div class="col-2">
                <a href="/./Economy/stats/container">
                <input type='radio' name='content_type' value='1' />
                <img src="/img/Dashboard/Cork_Indicator_Icons/Industry_Employment_Labour_Market.png" 
                     width="90%" max-width = "100%" alt=""/>
                </input>
                </a> 
            </div>
            <div class="col-2" >
                <input type='radio' name='content_type' value='1' />
                <a href="/./EnvironmentTransport/stats"> 
                <img src="/img/Dashboard/Cork_Indicator_Icons/Environment_Transport.png" width="90%" max-width = "100%" alt=""/>
                </a>
                </input>
            </div>
                    <div class="col-2">
                        <a href="/./Housings/stats">
                            <img src="/img/Dashboard/Cork_Indicator_Icons/Housing.png" width="90%" max-width = "100%" alt=""/>
                        </a> 
                    </div>
            
                    <div class="col-2">
                        <a href="/./Demographics/stats">
                            <img src="/img/Dashboard/Cork_Indicator_Icons/Population.png" width="90%" max-width = "100%" alt=""/>
                        </a> 
                    </div>
                    <div class="col-2">
                        <a href="/./HealthEducation/stats">
                            <img src="/img/Dashboard/Cork_Indicator_Icons/Health_Education.png" width="90%" max-width = "100%" alt=""/>
                        </a> 
                    </div>
                    <div class="col-2">
                        <a href="/./CrimeEmergencyServices/stats">
                            <img src="/img/Dashboard/Cork_Indicator_Icons/CrimeEmergencyServices.png" width="90%" max-width = "100%" alt=""/>
                        </a>       
                    </div>
                </div>-->
    <!--<div>-->
    <!--        <h2>Typical Traffic Volumes in Cork <font size="3"> 
                (View in <a href="/dublindashboard/ScatsMap.html" target="_blank">full screen)
                </a></h2>
            <br>
            <p><strong>Annual Average Daily Traffic</strong>, abbreviated <strong>AADT</strong>, 
                is a measure used primarily in transportation planning and transportation engineering. Traditionally, it is the total volume of vehicle traffic of a highway or road for a year divided by 365 days.
            </p><br>
            <p>Click on a site to see the collected traffic data. 
                See below for more details on the information gathered.</p>
            <br>
            <div class="col-12" >
                <div id="map" style="width: 95%; height: 600px"></div>
            </div>
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
            <br>-->
    <!--</div>-->

    <script type="text/javascript">

        let contentLinks = [];
        contentLinks[5] = "/./CrimeEmergencyServices/stats";
        contentLinks[3] = "/./EnvironmentTransport/stats";
        contentLinks[4] = "/./HealthEducation/stats";
        contentLinks[2] = "/./Housings/stats";
        contentLinks[1] = "/./Economy/stats/container";
        contentLinks[0] = "/./Demographics/stats";

        let iFrameSizes = [];
        iFrameSizes[5] = "7500px";
        iFrameSizes[3] = "3000px";
        iFrameSizes[4] = "6000px";
        iFrameSizes[2] = "5000px";
        iFrameSizes[1] = "6000px";
        iFrameSizes[0] = "4000px";

        let headers = [];
        headers[5] = "<div><br>"
                + "<h2>Crime and Emergency Services Indicators</h2></div>"
                + "<div><p>Explore information relating to crime rates in Cork, fire brigade activities and injuries and fatalities on Cork roads.</p></div>";
        headers[3] = "<div><br>"
                + "<h2>Environmental Indicators</h2>"
                + "</div>"
                + "<div><p>Explore information relating to waste, recycling, water quality, Green Schools, Local Agenda 21 Projects and traffic volumes on Cork roads.</p></div>";
        headers[4] = "<div><br>"
                + "<h2>Health and Education Indicators</h2></div>"
                + "<div><h3>Explore information relating to the number of people on trolleys in Cork’s hospitals, "
                + "the health of Cork people, the level of education attainment of Cork citizens, "
                + "the number of primary and secondary level pupils attending school in Cork and the number of schools in Cork.</h3></div>"

        headers[2] = "<div><br>"
                + "<h2>Housing Indicators</h2></div>"
                + "<div><p>Explore information relating to planning applications, "
                + "monthly house unit completions, available supply of land "
                + "for housing, annual contributions to Cork councils from "
                + "developers, average house prices, average monthly rent and "
                + "number of inspections of rented accommodation.</p></div>";
        headers[1] = "<div><br>"
                + "<h2>Industry & Employment: Economic Indicators</h2></div>"
                + "<div><p>Explore information relating to employment, unemployment,"
                + "companies and household disposable income for the South West.  </p></div>";
        headers[0] = "<div><br>"
                + "<h2>Population & Demographic Information</h2></div>"
                + "<div><p>Explore historical information relating to Cork’s population,"
                + " people born outside the state now living in Cork, Cork’s "
                + " age profile and the number of Cork households."
                + "</p></div>";
        let unchecked = [];
        unchecked[5] = "/img/Dashboard/Cork_Indicator_Icons/CrimeEmergencyServices.png";
        unchecked[3] = "/img/Dashboard/Cork_Indicator_Icons/Environment_Transport.png";
        unchecked[4] = "/img/Dashboard/Cork_Indicator_Icons/Health_Education.png";
        unchecked[2] = "/img/Dashboard/Cork_Indicator_Icons/Housing.png";
        unchecked[1] = "/img/Dashboard/Cork_Indicator_Icons/Industry_Employment_Labour_Market.png";
        unchecked[0] = "/img/Dashboard/Cork_Indicator_Icons/Population.png";
        let checked = [];
        checked[5] = "/img/Dashboard/Cork_Indicator_Icons/CrimeEmergencyServicesBlue.png";
        checked[3] = "/img/Dashboard/Cork_Indicator_Icons/Environment_TransportBlue.png";
        checked[4] = "/img/Dashboard/Cork_Indicator_Icons/Health_EducationBlue.png";
        checked[2] = "/img/Dashboard/Cork_Indicator_Icons/HousingBlue.png";
        checked[1] = "/img/Dashboard/Cork_Indicator_Icons/Industry_Employment_Labour_Market_Blue.png";
        checked[0] = "/img/Dashboard/Cork_Indicator_Icons/PopulationBlue.png";
        //    
        let transportMapTextTop =
                "<h2>Typical Traffic Volumes in Cork (View in <a href=\"/dublindashboard/ScatsMap.html\" target=\"_blank\">full screen)</a></h2><br>"
                + "<p><strong>Annual Average Daily Traffic</strong>, abbreviated <strong>AADT</strong>,"
                + "is a measure used primarily in transportation planning and transportation engineering. "
                + "Traditionally, it is the total volume of vehicle traffic of a highway or road for a year divided by 365 days.</p><br>"
                + "<p>Click on a site to see the collected traffic data. See below for more details on the information gathered.</p><br>";
        let transportMapTextBottom =
                "<p> The traffic volume data above are taken from <a href=\"https://www.nratrafficdata.ie/\" target=\"_blank\">Transport Infrastructure Ireland</a>'s traffic volume reports.</p> <br>"
                + "<p> <strong>AADT</strong> is an estimate of the mean daily traffic volume over "
                + "the course of a year. An exact computation of AADT involves "
                + "dividing the total traffic volume in the year by the number "
                + "of days in the year hence it fails to take account of seasonal, "
                + "monthly, daily and hourly variations in traffic flow.</p><br>"
                + "<p> <strong>% HGV</strong>"
                + " indicates the percentage of heavy goods vehicles from the "
                + "recorded data. Articulated and Rigid trucks are classified "
                + "as HGVs, buses and vehicles pulling trailers do not fall under "
                + "this category.</p><br>"
                + "<p> <strong>Coverage</strong> refers to the percentage period in a given year that data was collected from a particular site.</p><br>";




        function RadioClicked(radioid, radiosetname, formid, val) {
            console.log("clicked: " + radioid + " | " + radiosetname + " | " + formid + " | " + val);
            // - first, uncheck all radio buttons of the set
            let form = document.getElementById(formid);
            for (let i = 0; i < form.length; i++) {
                if (form[i].name == radiosetname) {
                    document.getElementById(form[i].id).checked = false;
                    document.getElementById("Image" + form[i].id).src = unchecked[i];
                }
            }
            // - then, check the clicked button
            document.getElementById(radioid).checked = true;
            document.getElementById("Image" + radioid).src = checked[val];
            document.getElementById("graphContent").src = contentLinks[val];
            document.getElementById("indicatorHeader").innerHTML = headers[val];
            document.getElementById("graphContent").style.height = iFrameSizes[val];
            if (val == 3) {
                console.log("show");
//                document.getElementById("indicatorMapTop").innerhtml = transportMapTextTop;
//                document.getElementById("indicatorMapTop").style.display= "block";

//                function show(which) {
//                    if (!document.getElementById)
//                        return
//                    if (which.style.display == "block")
//                        which.style.display = "none";
//                    else
//                        which.style.display = "block";
//                }
//               if(document.getElementById("indicatorMapTop")){
//                          .innerHTML = transportMapTextTop;
//               }
//                document.getElementById("indicatorMapBottom").innerHTML = transportMapTextBottom;
////                resizeIframe();
//
////                createMap();
            } else {
                console.log("hide");
//                document.getElementById("indicatorMapTop").style.display="none";
//                document.getElementById("indicatorMapTop").innerHTML = "";
//                document.getElementById("indicatorMapBottom").innerHTML = "";
//               document.getElementById("map").innerHTML = "";
////                document.getElementById("map").style.height = 0px;
            }
            return false;
        }


        var map, popup;
        //highchart default colour array
        var colours = ['#2f7ed8', '#0d233a', '#8bbc21', '#910000', '#1aadce', '#492970', '#f28f43', '#77a1e5', '#c42525', '#a6c96a', '#2f7ed8', '#0d233a', '#8bbc21', '#910000', '#1aadce', '#492970', '#f28f43', '#77a1e5', '#c42525', '#a6c96a'];
        var cloudmadeUrl = 'http://{s}.tile.cloudmade.com/BC9A493B41014CAABB98F0471D759707/997/256/{z}/{x}/{y}.png',
                cloudmadeAttribution = 'Map data &copy; 2011 OpenStreetMap contributors, Imagery &copy; 2011 CloudMade',
                cloudmade = new L.TileLayer(cloudmadeUrl, {maxZoom: 18, attribution: cloudmadeAttribution});
        var osmUrl = 'http://{s}.tile.openstreetmap.org/{z                    }/{x}/{y}.png';
        var osmAttrib = 'Map data © <a href="http://openstreetmap.org">OpenStree                    tMap</a> contributors';
        var osm = new L.TileLayer(osmUrl, {minZoom: 8, maxZoom: 18, attribution: osmAttrib});
        var nexrad = new L.TileLayer.WMS("http://suite.opengeo.org/geoserver/usa/wms", {
            layers: 'usa:states',
            format: 'image/png',
            transparent: true
        });
        map = new L.Map('map', {
            center: new L.LatLng(51.999537, -8.483712),
            zoom: 10,
            // layers: [                    osm],
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
                };


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
            document.getElementById("indicatorMapTop").innerhtml = transportMapTextTop;

//            document.getElementById("map").height = 0px;
            document.getElementById("indicatorHeader").innerHTML = headers[0];
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
                            "popupContent": "<h4><b>Site:" + name
                                    + " </b></h4>" + "<table style=\"width:200px\"> <tr> <td><img src=\"/dublindashboard/img/ImageOutput/wMonday"
                                    + name + ".gif\" width=\"200px\"> </td> <td> <img src=\"/dublindashboard/img/ImageOutput/wTuesday"
                                    + name + ".gif\" width=\"200px\"> </td> <td> <img src=\"/dublindashboard/img/ImageOutput/wWednesday"
                                    + name + ".gif\" width=\"200px\"> </td> <td> <img src=\"/dublindashboard/img/ImageOutput/wThursday"
                                    + name + ".gif\" width=\"200px\"> </td> </tr>  <tr>  <td>  <img src=\"/dublindashboard/img/ImageOutput/wFriday"
                                    + name + ".gif\" width=\"200px\"> </td><td> <img src=\"/dublindashboard/img/ImageOutput/wSaturday"
                                    + name + ".gif\" width=\"200px\"> </td><td> <img src=\"/dublindashboard/img/ImageOutput/wSunday"
                                    + name + ".gif\" width=\"200px\"> </td></tr> </table> ",
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
                    mouseout: resetHighlight
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
                layer.bindPopup(layer.feature.properties.popupContent, popupOptions); //essential

            }


            //s                    etTimeout(myFunction, 300000); //milliseconds 300000 -                    5mins    

        }

        function onMapClick(e) {
        }




    </script>


<!--<script type="text/javascript">
$(document).ready(function () {
$('input[name=content_type]').on('change', function () {
var n = $(this).val();
switch (n)
{
case '1':
$('#show').html("<iframe class = \"highchartsFrame\" src=\"/./Demographics/stats\" scrolling=\"no\"></iframe>");
break;
case '2':
$('#show').html("2nd radio button");
break;
case '3':
$('#show').html("3rd radio button");
break;
}
});
});


</script>-->


