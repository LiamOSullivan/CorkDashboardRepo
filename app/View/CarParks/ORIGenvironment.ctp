                                                                                                
<!DOCTYPE html>
<html>
<head>
  <title>Leaflet WMS/WFS Example</title>
  <meta charset="utf-8" />
	
	<!--<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.4.5/leaflet.css" /> -->
        <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
  <!--  <link rel="stylesheet" href="/dublindashboard/css/leaflet.css" /> -->
   <!-- <link rel="stylesheet" href="/dublindashboard/css/leaflet-list-markers.css" /> -->
	<!--[if lte IE 8]>
	    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.4.5/leaflet.ie.css" />
	<![endif]-->
	<style type="text/css">
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
			float: left;
			margin-right: 8px;
			
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
        
	</style>
</head>
<body onload="myFunction()">
    
    <div id="airQuality" style="width: 100%; height: 25px"></div>
	<div id="map" style="width: 100%; height: 600px"></div>
    <div id="dataSources" style="width: 100%; height: 500px" align="left"></div>
 
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
        
        

        
        
        //EPAOverall Air Quality
         $.get("/CarParks/airQuality", function(point){
                var divData = document.getElementById('dataSources');
                    divData.innerHTML = divData.innerHTML +"<h5>Data Sources</h5>";
                                       divData.innerHTML = divData.innerHTML +"<h5>The Air Quality Index is taken directly from the Environmental Protection Agency (EPA). More information about how this index is compiled can be found <a href=\"http://www.epa.ie/air/quality/index/#.U_tMLPldXh4\" target=\"_blank\">here.</a></h5>";
           
             divData.innerHTML = divData.innerHTML +"<h5>The Ambiet Sound Data is taken from Dublin City Council's Ambient Sound Monitoring Network and represents the average sound level over a 5 minute period. More information about how to interpret the sound levels can be found <a href=\"http://dublincitynoise.sonitussystems.com/\" target=\"_blank\">here.</a></h5>";
             
              divData.innerHTML = divData.innerHTML +"<h5>The Air Quality Data at selected sites is taken from the Environmental Protection Agency (EPA). More information about this data can be found <a href=\"http://www.epa.ie/air/quality/data/#.U_tPn_ldXh7\" target=\"_blank\">here.</a></h5>";
             
         
         
         
         
         
         
            obj = JSON.parse(point);
  
            var count = 6; //there are 6 results in the return
          
           for(var i=0;i<count;i++){
               if(obj.aqihsummary[i]["aqih-region"] =="Dublin_City"){
                var airReport = "Current Air Quality Index for Health for "+obj.aqihsummary[i]["aqih-region"]+" is "+ obj.aqihsummary[i].aqih 
                    
                  
                    var div = document.getElementById('airQuality');
                     div.innerHTML = div.innerHTML + airReport;
                   if(obj.aqihsummary[i].aqih == "1,Good"){
                   div.style.backgroundColor = 'green';
                   }
                   else if(obj.aqihsummary[i].aqih == "2,Good"){
                   div.style.backgroundColor = 'green';
                   }
                   else if(obj.aqihsummary[i].aqih == "3,Good"){
                   div.style.backgroundColor = 'green';
                   }
                   else if(obj.aqihsummary[i].aqih == "4,Fair"){
                   div.style.backgroundColor = 'orange';
                   }
                   else if(obj.aqihsummary[i].aqih == "5,Fair"){
                   div.style.backgroundColor = 'orange';
                   }
                   else if(obj.aqihsummary[i].aqih == "6,Fair"){
                   div.style.backgroundColor = 'orange';
                   }
                   else{
                    div.style.backgroundColor = 'red';   
                   }
           }
           }

         
           });
        //END AirQuality
        
   
        
        
        //Map Stuff
        //Individual AirQuality Locations
        
             var airQualitySite1 = { //DunLaoghaire
                        "type": "Feature",
                        "properties": {
                        "amenity": "EPA Environmental Sensor",
                        "popupContent": "<h5><b>EPA Site: Dún Laoghaire </b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://erc.epa.ie/real-time-air/www/images/epaweb/JPEG/Dun_Laoghaire_past7days_NO2.JPG\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [-6.1359474,53.2800596]
                                    }
            };
                                        
                    var airQualitySite2 = { //Balbriggan
                        "type": "Feature",
                        "properties": {
                        "amenity": "EPA Environmental Sensor",
                        "popupContent": "<h5><b>EPA Site: Balbriggan </b></h5>" + "<table style=\"width:405px\"> <tr><td><img src=\"http://erc.epa.ie/real-time-air/www/images/epaweb/JPEG/Trailer_3_past7days_SO2_NO2.JPG\" width=\"400px\" height=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [-6.189215,53.6069949]
                                    }
            };
        
                            var airQualitySite3 = { //Rathmines
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
        
                    var airQualitySite4 = { //Swords
                        "type": "Feature",
                        "properties": {
                        "amenity": "EPA Environmental Sensor",
                        "popupContent": "<h5><b>EPA Site: Swords </b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://erc.epa.ie/real-time-air/www/images/epaweb/JPEG/Swords_O3_Swords_NOX_past7days_O3_NO2.JPG\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [ -6.22428, 53.4578,]
                           
                           
                                    }
            };
                                        
                    var airQualitySite5 = { //winetavern street
                        "type": "Feature",
                        "properties": {
                        "amenity": "EPA Environmental Sensor",
                        "popupContent": "<h5><b>EPA Site: Winetavern Street </b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://erc.epa.ie/real-time-air/www/images/epaweb/JPG/Winetavern_Street_past7days_NO2_SO2.JPG\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [ -6.2718196, 53.3438963]
                            
                           
                           
                                    }
            };
        
                                        
      var airQualitySiteOptions = {
        radius: 15,
        //fillColor: "#ff7800",
        fillColor: "#ff7800", //colours[i], //setMarkerColor(spaces),
        color: "#000",
        weight: 1,
        //opacity: 1,
       // fillOpacity: setMarkerIntensity(spaces)
    };
        
      
		//var map = new L.Map('map');
		var map;
       

 
		var cloudmadeUrl = 'http://{s}.tile.cloudmade.com/BC9A493B41014CAABB98F0471D759707/997/256/{z}/{x}/{y}.png',
			cloudmadeAttribution = 'Map data &copy; 2011 OpenStreetMap contributors, Imagery &copy; 2011 CloudMade',
			cloudmade = new L.TileLayer(cloudmadeUrl, {maxZoom: 18, attribution: cloudmadeAttribution});
		
		var mapquestUrl = 'http://otile{s}.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png',
			mapquestAttribution = "Data CC-By-SA by <a href='http://openstreetmap.org/' target='_blank'>OpenStreetMap</a>, Tiles Courtesy of <a href='http://open.mapquest.com' target='_blank'>MapQuest</a>",
			mapquestGrey = new L.TileLayer.Grayscale(mapquestUrl, {maxZoom: 18, attribution: mapquestAttribution, subdomains: ['1','2','3','4'],  bgcolor: '0x80BDE3'});
        mapquestColour = new L.TileLayer(mapquestUrl, {maxZoom: 18, attribution: mapquestAttribution, subdomains: ['1','2','3','4'],  bgcolor: '0x80BDE3'});
        
        // create the tile layer with correct attribution
	var osmUrl='http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
	var osmAttrib='Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors';
	var osm = new L.TileLayer(osmUrl, {minZoom: 8, maxZoom: 12, attribution: osmAttrib});	
    var osmGrey = new L.TileLayer.Grayscale(osmUrl, {minZoom: 8, maxZoom: 12, attribution: osmAttrib});	    
  

		map = new L.Map('map', {
			center: new L.LatLng(53.3493581,-6.2649011), 
			zoom: 11,
			layers: [mapquestGrey],
			zoomControl: true
		});

		map.addEventListener('click', onMapClick);
        //LEGEND
        var legend = L.control({position: 'bottomright'});
		legend.onAdd = function (map) {

			var div = L.DomUtil.create('div', 'info legend'),
				grades = [0,10,20,30,40,50,60,70,80,90],
				labels = [],
				from, to;
                labels.push('Ambient Sound Level');
            
			for (var i = 0; i < grades.length; i++) {
				from = grades[i];
				to = grades[i + 1];
               
				labels.push('<i style="background: '+setAmbientSoundColor(from)+ '"></i> ' +
					from + (to ? 'db&ndash;' + to +'db' : 'db'+'+'));
			}

			div.innerHTML = labels.join('<br>');
			return div;
		};

		legend.addTo(map);




function getSoundSiteName(propertName){
            return soundsites[propertName];
            
        };

        
 function getJunctionName(propertyName) {
                return M50[propertyName];
            };
        
  
        var groupAir = new L.FeatureGroup();
        var soundSites = new L.FeatureGroup();
        //var layerControl = new L.LayerControl();
       
    
        var baseMaps = {
    "MQ Greyscale": mapquestGrey,
    "MQ Colour": mapquestColour,
    "OSM Greyscale": osmGrey,
    "OSM Colour": osm
    
};

var overlayMaps = {
  
    "EPA Monitoring Sites": groupAir,
    "Ambient Sound Recording Sites": soundSites

};     
        layerControl = L.control.layers(baseMaps, overlayMaps);
        layerControl.addTo(map);
        var initial = 0;  //check to add everythign initially to first map.
      
        
        function myFunction() {    
             initial++;
        
       
        groupAir.clearLayers();//air quality ou
        soundSites.clearLayers(); //ambient sound
       
    
        $row = 1;

 
            
//sound sites
            //only for a single site
   
  $.get("/CarParks/ambientSound1", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                
                var value = obj.aleq[lastEntry];
               
                var siteId = "Site1";
              
                var text = "<table style=\"width:300px\"><tr><td>Sound Level at "+getSoundSiteName(siteId).name+" is currently " +value+"                          </td></tr></table>"
      
                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                    "name": ""+getSoundSiteName(siteId),
                    "amenity": "Ambient Sound Site",
                    "popupContent": text,
                        },
                    "geometry": {
                    "type": "Point",
                    "coordinates": [getSoundSiteName(siteId).lat,getSoundSiteName(siteId).lon]
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
      
               soundSites.addLayer( L.geoJson(ambientSoundSite,{ 
                    onEachFeature: onEachFeature,  pointToLayer: function (feature, latlng) {
                    return L.circleMarker(latlng, ambientSoundSiteOptions);
                }}));
      
  });
            //
             $.get("/CarParks/ambientSound2", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                var value = obj.aleq[lastEntry];
                var siteId = "Site2";
              
                var text = "<table style=\"width:300px\"><tr><td>Sound Level at "+getSoundSiteName(siteId).name+" is currently " +value+"                          </td></tr></table>"
      
                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                    "name": ""+getSoundSiteName(siteId),
                    "amenity": "Ambient Sound Site",
                    "popupContent": text,
                        },
                    "geometry": {
                    "type": "Point",
                    "coordinates": [getSoundSiteName(siteId).lat,getSoundSiteName(siteId).lon]
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
      
               soundSites.addLayer( L.geoJson(ambientSoundSite,{ 
                    onEachFeature: onEachFeature,  pointToLayer: function (feature, latlng) {
                    return L.circleMarker(latlng, ambientSoundSiteOptions);
                }}));
      
  });
            
            //
             $.get("/CarParks/ambientSound3", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                var value = obj.aleq[lastEntry];
                var siteId = "Site3";
              
                var text = "<table style=\"width:300px\"><tr><td>Sound Level at "+getSoundSiteName(siteId).name+" is currently " +value+"                          </td></tr></table>"
      
                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                    "name": ""+getSoundSiteName(siteId),
                    "amenity": "Ambient Sound Site",
                    "popupContent": text,
                        },
                    "geometry": {
                    "type": "Point",
                    "coordinates": [getSoundSiteName(siteId).lat,getSoundSiteName(siteId).lon]
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
      
               soundSites.addLayer( L.geoJson(ambientSoundSite,{ 
                    onEachFeature: onEachFeature,  pointToLayer: function (feature, latlng) {
                    return L.circleMarker(latlng, ambientSoundSiteOptions);
                }}));
      
  });
            
            //
             $.get("/CarParks/ambientSound4", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                var value = obj.aleq[lastEntry];
                var siteId = "Site4";
              
                var text = "<table style=\"width:300px\"><tr><td>Sound Level at "+getSoundSiteName(siteId).name+" is currently " +value+"                          </td></tr></table>"
      
                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                    "name": ""+getSoundSiteName(siteId),
                    "amenity": "Ambient Sound Site",
                    "popupContent": text,
                        },
                    "geometry": {
                    "type": "Point",
                    "coordinates": [getSoundSiteName(siteId).lat,getSoundSiteName(siteId).lon]
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
      
               soundSites.addLayer( L.geoJson(ambientSoundSite,{ 
                    onEachFeature: onEachFeature,  pointToLayer: function (feature, latlng) {
                    return L.circleMarker(latlng, ambientSoundSiteOptions);
                }}));
      
  });
            
            //
             $.get("/CarParks/ambientSound5", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                var value = obj.aleq[lastEntry];
                var siteId = "Site5";
              
                var text = "<table style=\"width:300px\"><tr><td>Sound Level at "+getSoundSiteName(siteId).name+" is currently " +value+"                          </td></tr></table>"
      
                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                    "name": ""+getSoundSiteName(siteId),
                    "amenity": "Ambient Sound Site",
                    "popupContent": text,
                        },
                    "geometry": {
                    "type": "Point",
                    "coordinates": [getSoundSiteName(siteId).lat,getSoundSiteName(siteId).lon]
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
      
               soundSites.addLayer( L.geoJson(ambientSoundSite,{ 
                    onEachFeature: onEachFeature,  pointToLayer: function (feature, latlng) {
                    return L.circleMarker(latlng, ambientSoundSiteOptions);
                }}));
      
  });
            
            //
             $.get("/CarParks/ambientSound6", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                var value = obj.aleq[lastEntry];
                var siteId = "Site6";
              
                var text = "<table style=\"width:300px\"><tr><td>Sound Level at "+getSoundSiteName(siteId).name+" is currently " +value+"                          </td></tr></table>"
      
                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                    "name": ""+getSoundSiteName(siteId),
                    "amenity": "Ambient Sound Site",
                    "popupContent": text,
                        },
                    "geometry": {
                    "type": "Point",
                    "coordinates": [getSoundSiteName(siteId).lat,getSoundSiteName(siteId).lon]
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
      
               soundSites.addLayer( L.geoJson(ambientSoundSite,{ 
                    onEachFeature: onEachFeature,  pointToLayer: function (feature, latlng) {
                    return L.circleMarker(latlng, ambientSoundSiteOptions);
                }}));
      
  });
            
            //
             $.get("/CarParks/ambientSound7", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                var value = obj.aleq[lastEntry];
                var siteId = "Site7";
              
                var text = "<table style=\"width:300px\"><tr><td>Sound Level at "+getSoundSiteName(siteId).name+" is currently " +value+"                          </td></tr></table>"
      
                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                    "name": ""+getSoundSiteName(siteId),
                    "amenity": "Ambient Sound Site",
                    "popupContent": text,
                        },
                    "geometry": {
                    "type": "Point",
                    "coordinates": [getSoundSiteName(siteId).lat,getSoundSiteName(siteId).lon]
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
      
               soundSites.addLayer( L.geoJson(ambientSoundSite,{ 
                    onEachFeature: onEachFeature,  pointToLayer: function (feature, latlng) {
                    return L.circleMarker(latlng, ambientSoundSiteOptions);
                }}));
      
  });
            
            //
             $.get("/CarParks/ambientSound8", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                var value = obj.aleq[lastEntry];
                var siteId = "Site8";
              
                var text = "<table style=\"width:300px\"><tr><td>Sound Level at "+getSoundSiteName(siteId).name+" is currently " +value+"                          </td></tr></table>"
      
                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                    "name": ""+getSoundSiteName(siteId),
                    "amenity": "Ambient Sound Site",
                    "popupContent": text,
                        },
                    "geometry": {
                    "type": "Point",
                    "coordinates": [getSoundSiteName(siteId).lat,getSoundSiteName(siteId).lon]
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
      
               soundSites.addLayer( L.geoJson(ambientSoundSite,{ 
                    onEachFeature: onEachFeature,  pointToLayer: function (feature, latlng) {
                    return L.circleMarker(latlng, ambientSoundSiteOptions);
                }}));
      
  });
            
            //
             $.get("/CarParks/ambientSound9", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                var value = obj.aleq[lastEntry];
                var siteId = "Site9";
              
                var text = "<table style=\"width:300px\"><tr><td>Sound Level at "+getSoundSiteName(siteId).name+" is currently " +value+"                          </td></tr></table>"
      
                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                    "name": ""+getSoundSiteName(siteId),
                    "amenity": "Ambient Sound Site",
                    "popupContent": text,
                        },
                    "geometry": {
                    "type": "Point",
                    "coordinates": [getSoundSiteName(siteId).lat,getSoundSiteName(siteId).lon]
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
      
               soundSites.addLayer( L.geoJson(ambientSoundSite,{ 
                    onEachFeature: onEachFeature,  pointToLayer: function (feature, latlng) {
                    return L.circleMarker(latlng, ambientSoundSiteOptions);
                }}));
      
  });
            
            //
             $.get("/CarParks/ambientSound10", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                var value = obj.aleq[lastEntry];
                var siteId = "Site10";
              
                var text = "<table style=\"width:300px\"><tr><td>Sound Level at "+getSoundSiteName(siteId).name+" is currently " +value+"                          </td></tr></table>"
      
                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                    "name": ""+getSoundSiteName(siteId),
                    "amenity": "Ambient Sound Site",
                    "popupContent": text,
                        },
                    "geometry": {
                    "type": "Point",
                    "coordinates": [getSoundSiteName(siteId).lat,getSoundSiteName(siteId).lon]
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
      
               soundSites.addLayer( L.geoJson(ambientSoundSite,{ 
                    onEachFeature: onEachFeature,  pointToLayer: function (feature, latlng) {
                    return L.circleMarker(latlng, ambientSoundSiteOptions);
                }}));
      
  });
            //
             $.get("/CarParks/ambientSound11", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                var value = obj.aleq[lastEntry];
                var siteId = "Site11";
              
                var text = "<table style=\"width:300px\"><tr><td>Sound Level at "+getSoundSiteName(siteId).name+" is currently " +value+"                          </td></tr></table>"
      
                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                    "name": ""+getSoundSiteName(siteId),
                    "amenity": "Ambient Sound Site",
                    "popupContent": text,
                        },
                    "geometry": {
                    "type": "Point",
                    "coordinates": [getSoundSiteName(siteId).lat,getSoundSiteName(siteId).lon]
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
      
               soundSites.addLayer( L.geoJson(ambientSoundSite,{ 
                    onEachFeature: onEachFeature,  pointToLayer: function (feature, latlng) {
                    return L.circleMarker(latlng, ambientSoundSiteOptions);
                }}));
      
  });
            //
             $.get("/CarParks/ambientSound12", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                var value = obj.aleq[lastEntry];
                var siteId = "Site12";
              
                var text = "<table style=\"width:300px\"><tr><td>Sound Level at "+getSoundSiteName(siteId).name+" is currently " +value+"                          </td></tr></table>"
      
                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                    "name": ""+getSoundSiteName(siteId),
                    "amenity": "Ambient Sound Site",
                    "popupContent": text,
                        },
                    "geometry": {
                    "type": "Point",
                    "coordinates": [getSoundSiteName(siteId).lat,getSoundSiteName(siteId).lon]
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
      
               soundSites.addLayer( L.geoJson(ambientSoundSite,{ 
                    onEachFeature: onEachFeature,  pointToLayer: function (feature, latlng) {
                    return L.circleMarker(latlng, ambientSoundSiteOptions);
                }}));
      
  });
            //
             $.get("/CarParks/ambientSound13", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                var value = obj.aleq[lastEntry];
                var siteId = "Site13";
              
                var text = "<table style=\"width:300px\"><tr><td>Sound Level at "+getSoundSiteName(siteId).name+" is currently " +value+"                          </td></tr></table>"
      
                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                    "name": ""+getSoundSiteName(siteId),
                    "amenity": "Ambient Sound Site",
                    "popupContent": text,
                        },
                    "geometry": {
                    "type": "Point",
                    "coordinates": [getSoundSiteName(siteId).lat,getSoundSiteName(siteId).lon]
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
      
               soundSites.addLayer( L.geoJson(ambientSoundSite,{ 
                    onEachFeature: onEachFeature,  pointToLayer: function (feature, latlng) {
                    return L.circleMarker(latlng, ambientSoundSiteOptions);
                }}));
      
  });
            //
             $.get("/CarParks/ambientSound14", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                var value = obj.aleq[lastEntry];
                var siteId = "Site14";
              
                var text = "<table style=\"width:300px\"><tr><td>Sound Level at "+getSoundSiteName(siteId).name+" is currently " +value+"                          </td></tr></table>"
      
                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                    "name": ""+getSoundSiteName(siteId),
                    "amenity": "Ambient Sound Site",
                    "popupContent": text,
                        },
                    "geometry": {
                    "type": "Point",
                    "coordinates": [getSoundSiteName(siteId).lat,getSoundSiteName(siteId).lon]
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
               soundSites.addLayer( L.geoJson(ambientSoundSite,{ 
                    onEachFeature: onEachFeature,  pointToLayer: function (feature, latlng) {
                    return L.circleMarker(latlng, ambientSoundSiteOptions);
                }}));
                 
                 //airQuality
                   groupAir.addLayer( L.geoJson(airQualitySite1,{ 
                        onEachFeature: onEachFeature,  pointToLayer: function (feature, latlng) {
                        return L.circleMarker(latlng, airQualitySiteOptions);
                    }}));
        groupAir.addLayer( L.geoJson(airQualitySite2,{ 
                        onEachFeature: onEachFeature,  pointToLayer: function (feature, latlng) {
                        return L.circleMarker(latlng, airQualitySiteOptions);
                    }}));
        
        groupAir.addLayer( L.geoJson(airQualitySite3,{ 
                        onEachFeature: onEachFeature,  pointToLayer: function (feature, latlng) {
                        return L.circleMarker(latlng, airQualitySiteOptions);
                    }}));
        groupAir.addLayer( L.geoJson(airQualitySite4,{ 
                        onEachFeature: onEachFeature,  pointToLayer: function (feature, latlng) {
                        return L.circleMarker(latlng, airQualitySiteOptions);
                    }}));
        groupAir.addLayer( L.geoJson(airQualitySite5,{ //winetavern street
                        onEachFeature: onEachFeature,  pointToLayer: function (feature, latlng) {
                        return L.circleMarker(latlng, airQualitySiteOptions);
                    }}));
        
        
        if(initial ==1 || map.hasLayer(groupAir)){
        groupAir.addTo(map);
        soundSites.addTo(map);
        }
    setTimeout(myFunction, 300000); //milliseconds 300000 - 5mins 
                
     // setTimeout(myFunction, 120000); //milliseconds 120000 - 2mins
      
      
  });
            
             function onEachFeature(feature, layer) {
    
          
       layer.on({
            mouseover: highlightFeature,
            mouseout: resetHighlight,
        });
     // }
  }
        


      
        
function resetHighlight(e){
    var layer = e.target;
     layer.setStyle({ // highlight the feature
        weight: 1,
        color: '#666',
        dashArray: '',
        //fillOpacity: setMarkerIntensity(
    });

} 
        
      
         

        
  function highlightFeature(e) {
    var layer = e.target;
      
    layer.setStyle({ // highlight the feature
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
    $.get("/CarParks/nowParking", function(point){        

       
        //carParks.addTo(map);
        
        
        
        //airquality
      
        
  


       function onEachFeature(feature, layer) {
    
          
       layer.on({
            mouseover: highlightFeature,
            mouseout: resetHighlight,
        });
     // }
  }
        


      
        
function resetHighlight(e){
    var layer = e.target;
     layer.setStyle({ // highlight the feature
        weight: 1,
        color: '#666',
        dashArray: '',
        //fillOpacity: setMarkerIntensity(
    });

} 
        
      
         

        
  function highlightFeature(e) {
    var layer = e.target;
      
    layer.setStyle({ // highlight the feature
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
      
    layer.setStyle({ // highlight the feature
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
        
      
        
        
         function setAmbientSoundColor(ambientSound){
            var good = 55;
            var bad = 70;
          
          
             
             return ambientSound < 10 ? '#fff7ec' :
			       ambientSound < 20  ? '#fee8c8' :
			       ambientSound < 30  ? '#fdd49e' :
			       ambientSound < 40  ? '#fdbb84' :
			       ambientSound < 50   ? '#fc8d59' :
			       ambientSound < 60   ? '#ef6548' :
			       ambientSound < 70   ? '#d7301f' :
                   ambientSound < 80   ? '#b30000' :
                   ambientSound < 90   ? '#8f0000' :
                   ambientSound > 90  ? '#7f0000' :
			                     '#000000';
        }
        
            function setTripsColour(travelTime){
  
            var good = 10;//need the freeflow traveltime
           
          
       
            return travelTime < good ? '#00FF00' :
			       travelTime > good  ? '#FF0000' :
			                     '#00FF00';
        }
                        
   

		function onMapClick(e) {
         
          
   
		}
        
     
   
	
	</script>
       <?php echo $this->element('googleAnalytics'); ?>
</body>
</html>





                            
                            
                            