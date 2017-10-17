
<!DOCTYPE html>
<html>
<head>
  <title>Leaflet WMS/WFS Example</title>
  <meta charset="utf-8" />
	
	<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.4.5/leaflet.css" /> 
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
	<!-- <script src="https://dl.dropboxusercontent.com/u/37626989/leaflet-src.js"></script> -->
	<!--<script src="http://code.jquery.com/jquery-1.8.1.min.js"></script> -->
    <script src="/dublindashboard/js/leaflet.js"></script>
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
         $.get("/dublindashboard/CarParks/airQuality", function(point){
            obj = JSON.parse(point);
  
            var count = 6; //there are 6 results in the return
          
           for(var i=0;i<count;i++){
               if(obj.aqihsummary[i]["aqih-region"] =="Dublin City"){
                var airReport = "Current Air Quality Index for Health for "+obj.aqihsummary[i]["aqih-region"]+" is "+ obj.aqihsummary[i].aqih 
                    
                  
                    var div = document.getElementById('airQuality');
                     div.innerHTML = div.innerHTML + airReport;
                   if(obj.aqihsummary[i].aqih == "1,Good"){
                   div.style.backgroundColor = 'green';
                   }
                   else{
                    div.style.backgroundColor = 'red';   
                   }
           }
           }

               
           });
        //END AirQuality
        
        //Noise - Ambient Sound
        
                $.get("/dublindashboard/CarParks/ambientSound", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                //alert("Sound at this location measure " + obj.aleq[lastEntry]);
 
           });
        
        
          //Map Stuff
        //Individual AirQuality Locations
        
             var airQualitySite1 = { //DunLaoghaire
                        "type": "Feature",
                        "properties": {
                        "amenity": "EPA Environmental Sensor",
                        "popupContent": "<h2><b>EPA Site: Dún Laoghaire </b></h2>" + "<table style=\"width:505px\"> <tr> <td><img src=\"http://erc.epa.ie/real-time-air/www/images/epaweb/JPEG/Dun_Laoghaire_past7days_NO2.JPG\" width=\"500px\"> </td>></tr> </table> ",
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
                        "popupContent": "<h2><b>EPA Site: Balbriggan </b></h2>" + "<table style=\"width:505px\"> <tr> <td><img src=\"http://erc.epa.ie/real-time-air/www/images/epaweb/JPEG/Trailer_3_past7days_SO2_NO2.JPG\" width=\"500px\" height=\"400px\"> </td>></tr> </table> ",
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
                        "popupContent": "<h2><b>EPA Site: Rathmines </b></h2>" + "<table style=\"width:505px\"> <tr> <td><img src=\"http://erc.epa.ie/real-time-air/www/images/epaweb/JPG/Rathmines_past7days_O3_NO2_SO2.jpg\" width=\"500px\"> </td>></tr> </table> ",
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
                        "popupContent": "<h2><b>EPA Site: Swords </b></h2>" + "<table style=\"width:505px\"> <tr> <td><img src=\"http://erc.epa.ie/real-time-air/www/images/epaweb/JPEG/Swords_O3_Swords_NOX_past7days_O3_NO2.JPG\" width=\"500px\"> </td>></tr> </table> ",
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
                        "popupContent": "<h2><b>EPA Site: Winetavern Street </b></h2>" + "<table style=\"width:505px\"> <tr> <td><img src=\"http://erc.epa.ie/real-time-air/www/images/epaweb/JPG/Winetavern_Street_past7days_NO2_SO2.JPG\" width=\"500px\"> </td>></tr> </table> ",
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
       

        //highchart default colours
        var colours= ['#2f7ed8', '#0d233a', '#8bbc21', '#910000', '#1aadce', '#492970','#f28f43', '#77a1e5', '#c42525', '#a6c96a','#2f7ed8', '#0d233a', '#8bbc21', '#910000', '#1aadce', '#492970','#f28f43', '#77a1e5', '#c42525', '#a6c96a'];
    		
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
                labels.push('Car Parks');
                labels.push('(Free Spaces)');
			for (var i = 0; i < grades.length; i++) {
				from = grades[i];
				to = grades[i + 1];
               
				labels.push('<i style="background: ' + setMarkerColor(from,100) + '"></i> ' +
					from + (to ? '%&ndash;' + to +'%' : '%'+'+'));
			}

			div.innerHTML = labels.join('<br>');
			return div;
		};

		legend.addTo(map);



        
        
        
       
    

	/*	popup = new L.Popup({
			maxWidth: 200
		});*/
    
 function getName(propertyName) {
                return carparks[propertyName];
            }; 

function getSoundSiteName(propertName){
            return soundsites[propertName];
            
        };

        
 function getJunctionName(propertyName) {
                return M50[propertyName];
            };
        
        var carParks = new L.FeatureGroup();
        var m50North = new  L.FeatureGroup();
        var m50South = new  L.FeatureGroup();
        var trips=   new L.FeatureGroup();
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
    "City Centre Carparks": carParks,
    "EPA Monitoring Sites": groupAir,
    "M50 Travel Times - South": m50South,
    "M50 Travel Times - North": m50North,
    "Travel Time to City": trips,
    "Ambient Sound Recording Sites": soundSites

};     
        layerControl = L.control.layers(baseMaps, overlayMaps);
        layerControl.addTo(map);
        var initial = 0;  //check to add everythign initially to first map.
      
        
        function myFunction() {    
             initial++;
        
        carParks.clearLayers(); //car parks
        m50North.clearLayers(); // M50 NORTH
        m50South.clearLayers(); // M50 South
        trips.clearLayers(); // TRIPS Routes
        groupAir.clearLayers();//air quality 
       
    
        $row = 1;
        //Travel Time (TRIPS).
        $.get("/dublindashboard/CarParks/readCSV", function(point){
            obj = JSON.parse(point);
  
            var count = 0;
            for(key in obj) {
                    count++;        
            }
           for(var i=0;i<count;i++){        
            if(obj[i].name == 'R6D1'){
               var geoName = R6D1;
                 geoName.properties.popupContent = "<table style=\"width:300px\"> <tr> <td>The current travel time in-bound is "+obj[i].name+" "+ Math.round(obj[i].travelTime/60) + " minutes and out-bound is "+obj[i+1].name+" "+ Math.round(obj[i+1].travelTime/60) +" minutes</td></tr></table>";
           geoName.properties.travelTime = Math.round(obj[i+1].travelTime/60);
            }
               
                  if(obj[i].name == 'R6D2'){
              
               var geoName = R6D2;
                 geoName.properties.popupContent = "<table style=\"width:300px\"> <tr> <td>The current travel time in-bound is "+obj[i].name+" "+ Math.round(obj[i].travelTime/60) + " minutes and out-bound is "+obj[i+1].name+" "+ Math.round(obj[i+1].travelTime/60) +" minutes</td></tr></table>";
           geoName.properties.travelTime = Math.round(obj[i+1].travelTime/60);
            }
           

            if (obj[i].name == 'R1D1'){
             
             var geoName = R1D1; 
                     geoName.properties.popupContent = "<table style=\"width:300px\"> <tr> <td>The current travel time in-bound is "+obj[i].name+" "+ Math.round(obj[i].travelTime/60) + " minutes and out-bound is "+obj[i+1].name+" "+ Math.round(obj[i+1].travelTime/60) +" minutes</td></tr></table>";
           geoName.properties.travelTime = Math.round(obj[i+1].travelTime/60);
            }
               
               
                 if (obj[i].name == 'R1D2'){
             
             var geoName = R1D2; 
                     geoName.properties.popupContent = "<table style=\"width:300px\"> <tr> <td>The current travel time in-bound is "+obj[i].name+" "+ Math.round(obj[i].travelTime/60) + " minutes and out-bound is "+obj[i+1].name+" "+ Math.round(obj[i+1].travelTime/60) +" minutes</td></tr></table>";
           geoName.properties.travelTime = Math.round(obj[i+1].travelTime/60);
            }
               
                 if (obj[i].name == 'R30D1'){
           
             var geoName = R30D1; 
                  geoName.properties.popupContent = "<table style=\"width:300px\"> <tr> <td>The current travel time in-bound is "+obj[i].name+" "+ Math.round(obj[i].travelTime/60) + " minutes and out-bound is "+obj[i+1].name+" "+ Math.round(obj[i+1].travelTime/60) +" minutes</td></tr></table>";
           geoName.properties.travelTime = Math.round(obj[i+1].travelTime/60);
            }
               
                       if (obj[i].name == 'R30D2'){
           
             var geoName = R30D2; 
                  geoName.properties.popupContent = "<table style=\"width:300px\"> <tr> <td>The current travel time in-bound is "+obj[i].name+" "+ Math.round(obj[i].travelTime/60) + " minutes and out-bound is "+obj[i+1].name+" "+ Math.round(obj[i+1].travelTime/60) +" minutes</td></tr></table>";
           geoName.properties.travelTime = Math.round(obj[i+1].travelTime/60);
            }
            if (obj[i].name == 'R31D1'){
              
             var geoName = R31D1; 
                 geoName.properties.popupContent = "<table style=\"width:300px\"> <tr> <td>The current travel time in-bound is "+obj[i].name+" "+ Math.round(obj[i].travelTime/60) + " minutes and out-bound is "+obj[i+1].name+" "+ Math.round(obj[i+1].travelTime/60) +" minutes</td></tr></table>";
           geoName.properties.travelTime = Math.round(obj[i+1].travelTime/60);
            }
               
                 if (obj[i].name == 'R31D2'){
              
             var geoName = R31D2; 
                 geoName.properties.popupContent = "<table style=\"width:300px\"> <tr> <td>The current travel time in-bound is "+obj[i].name+" "+ Math.round(obj[i].travelTime/60) + " minutes and out-bound is "+obj[i+1].name+" "+ Math.round(obj[i+1].travelTime/60) +" minutes</td></tr></table>";
           geoName.properties.travelTime = Math.round(obj[i+1].travelTime/60);
            }
               
       if (obj[i].name == 'R14D1'){
          
             var geoName = R14D1; 
                       geoName.properties.popupContent = "<table style=\"width:300px\"> <tr> <td>The current travel time in-bound is "+obj[i].name+" "+ Math.round(obj[i].travelTime/60) + " minutes and out-bound is "+obj[i+1].name+" "+ Math.round(obj[i+1].travelTime/60) +" minutes</td></tr></table>";
           geoName.properties.travelTime = Math.round(obj[i+1].travelTime/60);
            }
               
                   if (obj[i].name == 'R14D2'){
          
             var geoName = R14D2; 
                       geoName.properties.popupContent = "<table style=\"width:300px\"> <tr> <td>The current travel time in-bound is "+obj[i].name+" "+ Math.round(obj[i].travelTime/60) + " minutes and out-bound is "+obj[i+1].name+" "+ Math.round(obj[i+1].travelTime/60) +" minutes</td></tr></table>";
           geoName.properties.travelTime = Math.round(obj[i+1].travelTime/60);
            }
               
            if (obj[i].name == 'R13D1'){
       
             var geoName = R13D1; 
                       geoName.properties.popupContent = "<table style=\"width:300px\"> <tr> <td>The current travel time in-bound is "+obj[i].name+" "+ Math.round(obj[i].travelTime/60) + " minutes and out-bound is "+obj[i+1].name+" "+ Math.round(obj[i+1].travelTime/60) +" minutes</td></tr></table>";
           geoName.properties.travelTime = Math.round(obj[i+1].travelTime/60);
            }
                       if (obj[i].name == 'R13D2'){
       
             var geoName = R13D2; 
                       geoName.properties.popupContent = "<table style=\"width:300px\"> <tr> <td>The current travel time in-bound is "+obj[i].name+" "+ Math.round(obj[i].travelTime/60) + " minutes and out-bound is "+obj[i+1].name+" "+ Math.round(obj[i+1].travelTime/60) +" minutes</td></tr></table>";
           geoName.properties.travelTime = Math.round(obj[i+1].travelTime/60);
            }
        if (obj[i].name == 'R40D1'){
        
             var geoName = R40D1; 
                       geoName.properties.popupContent = "<table style=\"width:300px\"> <tr> <td>The current travel time in-bound is "+obj[i].name+" "+ Math.round(obj[i].travelTime/60) + " minutes and out-bound is "+obj[i+1].name+" "+ Math.round(obj[i+1].travelTime/60) +" minutes</td></tr></table>";
           geoName.properties.travelTime = Math.round(obj[i+1].travelTime/60);
            }
               
                       if (obj[i].name == 'R9D1'){
         
             var geoName = R9D1; 
               geoName.properties.popupContent = "<table style=\"width:300px\"> <tr> <td>The current travel time in-bound is "+obj[i].name+" "+ Math.round(obj[i].travelTime/60) + " minutes and out-bound is "+obj[i+1].name+" "+ Math.round(obj[i+1].travelTime/60) +" minutes</td></tr></table>";
           geoName.properties.travelTime = Math.round(obj[i+1].travelTime/60);
            }
               
                                    if (obj[i].name == 'R9D2'){
         
             var geoName = R9D2; 
               geoName.properties.popupContent = "<table style=\"width:300px\"> <tr> <td>The current travel time in-bound is "+obj[i].name+" "+ Math.round(obj[i].travelTime/60) + " minutes and out-bound is "+obj[i+1].name+" "+ Math.round(obj[i+1].travelTime/60) +" minutes</td></tr></table>";
           geoName.properties.travelTime = Math.round(obj[i+1].travelTime/60);
            }
               
               
               
                 if (obj[i].name == 'R15D1'){
        
             var geoName = R15D1; 
                          geoName.properties.popupContent = "<table style=\"width:300px\"> <tr> <td>The current travel time in-bound is "+obj[i].name+" "+ Math.round(obj[i].travelTime/60) + " minutes and out-bound is "+obj[i+1].name+" "+ Math.round(obj[i+1].travelTime/60) +" minutes</td></tr></table>";
           geoName.properties.travelTime = Math.round(obj[i+1].travelTime/60);
            }
               
                                if (obj[i].name == 'R15D2'){
        
             var geoName = R15D2; 
                          geoName.properties.popupContent = "<table style=\"width:300px\"> <tr> <td>The current travel time in-bound is "+obj[i].name+" "+ Math.round(obj[i].travelTime/60) + " minutes and out-bound is "+obj[i+1].name+" "+ Math.round(obj[i+1].travelTime/60) +" minutes</td></tr></table>";
           geoName.properties.travelTime = Math.round(obj[i+1].travelTime/60);
            }
               
                             if (obj[i].name == 'R5D1'){
          
             var geoName = R5D1; 
                         geoName.properties.popupContent = "<table style=\"width:300px\"> <tr> <td>The current travel time in-bound is "+obj[i].name+" "+ Math.round(obj[i].travelTime/60) + " minutes and out-bound is "+obj[i+1].name+" "+ Math.round(obj[i+1].travelTime/60) +" minutes</td></tr></table>";
           geoName.properties.travelTime = Math.round(obj[i+1].travelTime/60);
            }
               
                if (obj[i].name == 'R5D2'){
          
             var geoName = R5D2; 
                         geoName.properties.popupContent = "<table style=\"width:300px\"> <tr> <td>The current travel time in-bound is "+obj[i].name+" "+ Math.round(obj[i].travelTime/60) + " minutes and out-bound is "+obj[i+1].name+" "+ Math.round(obj[i+1].travelTime/60) +" minutes</td></tr></table>";
           geoName.properties.travelTime = Math.round(obj[i+1].travelTime/60);
            }
               
               
      if (obj[i].name == 'R4D1'){
           
             var geoName = R4D1; 
                         geoName.properties.popupContent = "<table style=\"width:300px\"> <tr> <td>The current travel time in-bound is "+obj[i].name+" "+ Math.round(obj[i].travelTime/60) + " minutes and out-bound is "+obj[i+1].name+" "+ Math.round(obj[i+1].travelTime/60) +" minutes</td></tr></table>";
           geoName.properties.travelTime = Math.round(obj[i+1].travelTime/60);
            }
               
                     if (obj[i].name == 'R4D2'){
           
             var geoName = R4D2; 
                         geoName.properties.popupContent = "<table style=\"width:300px\"> <tr> <td>The current travel time in-bound is "+obj[i].name+" "+ Math.round(obj[i].travelTime/60) + " minutes and out-bound is "+obj[i+1].name+" "+ Math.round(obj[i+1].travelTime/60) +" minutes</td></tr></table>";
           geoName.properties.travelTime = Math.round(obj[i+1].travelTime/60);
            }
               
     if (obj[i].name == 'R24D1'){
         
             var geoName = R24D1; 
                          geoName.properties.popupContent = "<table style=\"width:300px\"> <tr> <td>The current travel time in-bound is "+obj[i].name+" "+ Math.round(obj[i].travelTime/60) + " minutes and out-bound is "+obj[i+1].name+" "+ Math.round(obj[i+1].travelTime/60) +" minutes</td></tr></table>";
           geoName.properties.travelTime = Math.round(obj[i+1].travelTime/60);
            }
               
               if (obj[i].name == 'R24D2'){
         
             var geoName = R24D2; 
                          geoName.properties.popupContent = "<table style=\"width:300px\"> <tr> <td>The current travel time in-bound is "+obj[i].name+" "+ Math.round(obj[i].travelTime/60) + " minutes and out-bound is "+obj[i+1].name+" "+ Math.round(obj[i+1].travelTime/60) +" minutes</td></tr></table>";
           geoName.properties.travelTime = Math.round(obj[i+1].travelTime/60);
            }
      
            var lyr = L.geoJson(geoName, {
              
                style: { weight : 1 },
                onEachFeature : function(feature, layer) {
                popup = layer.bindPopup(layer.feature.properties.popupContent);
               // console.log(layer)
                    
                popup.on("popupclose", function(e) {
                    isSelected = 'yes';
                    resetRoadHighlight(e); 
                    //lyr.resetStyle();
                });
                layer.setStyle({
                    weight: 3,
                   // color: 'orange',
                    color:  setTripsColour(Math.round(obj[i+1].travelTime/60)),
                    dashArray: '', 
                    fillOpacity: 0.5    
                });

                layer.on({
                mouseover: highlightRoadFeature,
                mouseout:resetRoadHighlight,
                click: highlightRoadFeature2
        })
    
    
    }
});
            trips.addLayer(lyr); 
                if(initial ==1 || map.hasLayer(trips)){
            trips.addTo(map);    //add layer to the map
                }

           }    
            
            //helper functions
       function highlightRoadFeature(e) {
        isSelected ='yes';
        var layer = e.target;
      
        layer.setStyle({ // highlight the feature
            weight: 10,
            color: 'blue',
            dashArray: '',
            fillOpacity: 1
        });

        if (!L.Browser.ie && !L.Browser.opera) {
            layer.bringToFront();
        }      
}  
       function highlightRoadFeature2(e) {
        isSelected = 'no';
        var layer = e.target;  
        layer.setStyle({ // highlight the feature
            weight: 5,
            color: 'blue',
            dashArray: '',
            fillOpacity: 1
        });

    if (!L.Browser.ie && !L.Browser.opera) {
        layer.bringToFront();
    }
      
}
            
                       
    function resetRoadHighlight(e){ 
       // alert(e.target.feature.properties.travelTime);
        if(isSelected == 'yes'){
        var layer = e.target;
  
           
    layer.setStyle({ // highlight the feature
        weight: 3,
        color: setTripsColour(e.target.feature.properties.travelTime),//e.target.feature.properties.colour,
        // fillColor:'#00FF00',
        dashArray: '',
        fillOpacity: 0.5
    });
                    isSelected = 'no';
                }      
    } 
        
             
     });

            // M50 SOUTHBOUD
        $.get("/dublindashboard/CarParks/travelTimes", function(point){
             obj = JSON.parse(point);
           
        var  numberOfDataPoints = obj.M50_southBound.data.length; //number of junctions
        var  fullTravelTime = Math.round(obj.M50_southBound.data[(numberOfDataPoints) -1].current_travel_time/60);
        var  fullFreeFlowTraveTime = Math.round(obj.M50_southBound.data[(numberOfDataPoints) -1].free_flow_travel_time/60);
            
        for(var i=0;i<numberOfDataPoints;i++){
   
            var isSelected = 'no';
            var popup;
            
            var time = '0';
            var travelTime = Math.round(obj.M50_southBound.data[i].current_travel_time/60);
            var M50_south_1 = '['+time+','+ travelTime+']';

            var from_name = obj.M50_southBound.data[i].from_name;
            var to_name = obj.M50_southBound.data[i].to_name;
            var freeFlowTravelTime = Math.round(obj.M50_southBound.data[i].free_flow_travel_time/60);
            
            var fullText = "The Travel Time from "+obj.M50_southBound.data[0].from_name +" to "+obj.M50_southBound.data[numberOfDataPoints-1].to_name+ " is currently "+fullTravelTime+" minutes";
            
            var text = "<table style=\"width:300px\"><tr><td>The Travel Time from "+obj.M50_southBound.data[i].from_name +" to "+obj.M50_southBound.data[i].to_name+ " is currently "+travelTime+" minutes.  (Freeflow travel time is " +freeFlowTravelTime+ " minutes).<br>"+fullText+"</td></tr></table>";

        
            //load the json objects
            if(from_name == 'J3 (M1/N32)'&& to_name == 'J17 Shankill'){
                var geoFile = FULL; //empty set of coordinates
                }
               
            if(from_name == 'J3 (M1/N32)' && to_name != 'J17 Shankill'){
                var geoFile = J3;
                }
               
            else if (from_name == 'J5 Finglas'){
                var geoFile = J5;
            }
            else if(from_name == 'Blanchardstown'){
                 var geoFile = J6;
                 }
            else if(from_name == 'J7 Palmerstown'){
                 var geoFile = J7;
                 }
            else if(from_name == 'J9 Red Cow'){
                 var geoFile = J9;
                 }
            else if(from_name == 'J11 Balrathory'){
                 var geoFile = J12;
                 }
            else if(from_name == 'J12 Scholarstown'){
                 var geoFile = J11;
                 }
            else if(from_name == 'J13 Ballinteer'){
                 var geoFile = J13;
                 }
            else if(from_name == 'J14 Stillorgan'){
                 var geoFile = J14;
                 }
            else if(from_name == 'J15 Ballyogan'){
                 var geoFile = J15;
                 }
             else if(from_name == 'J16 Cherrywood'){
                 var geoFile = J16;
                 }
            
            var m50SegOptions = {
                //radius: 8,
                //fillColor: colours[i],
                //fillColor: '#FF0000', //setMarkerColor(spaces),
                // color: '#FF0000',
                weight: 800,
                opacity: 1,
                //fillOpacity: setMarkerIntensity(spaces)
        };
            
            
           //colour the road segments according to travel time
            if(travelTime<=freeFlowTravelTime){
                var m50SegOptionsColor = '#00FF00';  //Green
                
                
            }
            else{
                //there is a delay
                var m50SegOptionsColor = '#FF0000'; //Red
                
            }
            
          
            //set the popup text.
            geoFile.properties.popupContent = text;
            geoFile.properties.colour = m50SegOptionsColor;
        
           
            var lyr = L.geoJson(geoFile, {
                style: { weight : 1 },
                onEachFeature : function(feature, layer) {
                popup = layer.bindPopup(layer.feature.properties.popupContent);
                console.log(layer)
                popup.on("popupclose", function(e) {
                    isSelected = 'yes';;
                    resetRoadHighlight(e); 
                    //lyr.resetStyle();
                });
                layer.setStyle({
                    weight: 5,
                    color: m50SegOptionsColor,
                    dashArray: '', 
                    fillOpacity: 0.5    
                });

                layer.on({
                mouseover: highlightRoadFeature,
                mouseout:resetRoadHighlight,
                click: highlightRoadFeature2
        })
    
    
    }
});//.addTo(map);    //add layer to the map
            
  m50South.addLayer(lyr);
   
        } //close for loop 
             if(initial ==1 || map.hasLayer(m50South)){
     m50South.addTo(map);    
             }
    function highlightRoadFeature(e) {
        isSelected ='yes';
        var layer = e.target;
      
        layer.setStyle({ // highlight the feature
            weight: 10,
            color: '#0000FF',
            dashArray: '',
            fillOpacity: 1
        });

        if (!L.Browser.ie && !L.Browser.opera) {
            layer.bringToFront();
        }      
}
            
            
    function highlightRoadFeature2(e) {
        isSelected = 'no';
        var layer = e.target;  
        layer.setStyle({ // highlight the feature
            weight: 10,
            color: '#0000FF',
            dashArray: '',
            fillOpacity: 1
        });

    if (!L.Browser.ie && !L.Browser.opera) {
        layer.bringToFront();
    }
      
}
            
            
    function resetRoadHighlight(e){ 
        //alert(e.target.feature.properties.colour);
        if(isSelected == 'yes'){
        var layer = e.target;
  
           
    layer.setStyle({ // highlight the feature
        weight: 5,
        color: e.target.feature.properties.colour,
        // fillColor:'#00FF00',
        dashArray: '',
        //fillOpacity: setMarkerIntensity(
    });
                    isSelected = 'no';
                }
        
    }      

            


            
        });
      
            //M50 NORTHBOUND
     
        $.get("/dublindashboard/CarParks/travelTimes", function(point){
             obj = JSON.parse(point);
           
        var numberOfDataPoints = obj.M50_northBound.data.length; //number of junctions
        var  fullTravelTime = Math.round(obj.M50_northBound.data[(numberOfDataPoints) -1].current_travel_time/60);
        var  fullFreeFlowTraveTime = Math.round(obj.M50_northBound.data[(numberOfDataPoints) -1].free_flow_travel_time/60);
            
        for(var i=0;i<numberOfDataPoints;i++){
   
              var isSelected = 'no';
            var popup;
            
            var time = '0';
            var travelTime = Math.round(obj.M50_northBound.data[i].current_travel_time/60);
            
            var from_name = obj.M50_northBound.data[i].from_name;
            var to_name = obj.M50_northBound.data[i].to_name;
            var freeFlowTravelTime = Math.round(obj.M50_northBound.data[i].free_flow_travel_time/60);
            
            var fullText = "The Travel Time from "+obj.M50_northBound.data[0].from_name +" to "+obj.M50_northBound.data[numberOfDataPoints-1].to_name+ " is currently "+fullTravelTime+" minutes";
            
            var text = "<table style=\"width:300px\"><tr>The Travel Time from "+obj.M50_northBound.data[i].from_name +" to "+obj.M50_northBound.data[i].to_name+ " is currently "+travelTime+" minutes.  (Freeflow travel time is " +freeFlowTravelTime+ " minutes).<br>"+fullText+"</td></tr></table>";

        
            //load the json objects
            if(to_name == 'J3 M1/N32/DPT' && from_name == 'J17 Shankill'){
                var geoFile = FULL; //empty set of coordinates
               
                }
                    
            else if (from_name == 'J5 Finglas'){
                var geoFile = J5N;
            }
            else if(from_name == 'Blanchardstown'){
                 var geoFile = J6N;
                 }
            else if(from_name == 'J7 Palmerstown'){
                 var geoFile = J7N;
                 }
            else if(from_name == 'J9 Red Cow'){
                 var geoFile = J9N;
                 }
            else if(from_name == 'J11 Balrathory'){
                 var geoFile = J11N;
                 }
            else if(from_name == 'J12 Scholarstown'){
                 var geoFile = J12N;
                 }
            else if(from_name == 'J13 Balinteer'){
                 var geoFile = J13N;
                 }
            else if(from_name == 'J15 Ballyogan'){
                 var geoFile = J15N;
                 }
            else if(from_name == 'J16 Cherrywood'){
                 var geoFile = J16N;
                 }
             else if(from_name == 'J17 Shankill'){
                 var geoFile = J17N;
                 }
        
            
            var m50SegOptions = {
                //radius: 8,
                //fillColor: colours[i],
                //fillColor: '#FF0000', //setMarkerColor(spaces),
                // color: '#FF0000',
                weight: 800,
                opacity: 1,
                //fillOpacity: setMarkerIntensity(spaces)
        };
            
            
           //colour the road segments according to travel time
            if(travelTime<=freeFlowTravelTime){
                var m50SegOptionsColor = '#00FF00';  //Green
                
                
            }
            else{
                //there is a delay
                var m50SegOptionsColor = '#FF0000'; //Red
                
            }
            
          
            //set the popup text.
            geoFile.properties.popupContent = text;
            geoFile.properties.colour = m50SegOptionsColor;
        
            
            var lyr = L.geoJson(geoFile, {
                style: { weight : 1 },
                onEachFeature : function(feature, layer) {
                popup = layer.bindPopup(layer.feature.properties.popupContent);
                console.log(layer)
                popup.on("popupclose", function(e) {
                    isSelected = 'yes';
                    resetRoadHighlight(e); 
                    //lyr.resetStyle();
                });
                layer.setStyle({
                    weight: 5,
                    color: m50SegOptionsColor,
                    dashArray: '', 
                    fillOpacity: 0.5    
                });

                layer.on({
                mouseover: highlightRoadFeature,
                mouseout:resetRoadHighlight,
                click: highlightRoadFeature2
        })
    
    
    }
});//.addTo(map);    //add layer to the map
            
  m50North.addLayer(lyr);
   
        } 
            //close for loop 
          
          if(initial == 1 || map.hasLayer(m50North)){
              m50North.addTo(map);
             }
            
     //m50North.addTo(map);    

    function highlightRoadFeature(e) {
        isSelected ='yes';
        var layer = e.target;
      
        layer.setStyle({ // highlight the feature
            weight: 10,
            color: '#0000FF',
            dashArray: '',
            fillOpacity: 1
        });

        if (!L.Browser.ie && !L.Browser.opera) {
            layer.bringToFront();
        }      
}
            
            
    function highlightRoadFeature2(e) {
        isSelected = 'no';
        var layer = e.target;  
        layer.setStyle({ // highlight the feature
            weight: 10,
            color: '#0000FF',
            dashArray: '',
            fillOpacity: 1
        });

    if (!L.Browser.ie && !L.Browser.opera) {
        layer.bringToFront();
    }
      
}
            
            
    function resetRoadHighlight(e){ 
        //alert(e.target.feature.properties.colour);
        if(isSelected == 'yes'){
        var layer = e.target;
  
          
    layer.setStyle({ // highlight the feature
        weight: 5,
        color: e.target.feature.properties.colour,
        // fillColor:'#00FF00',
        dashArray: '',
        //fillOpacity: setMarkerIntensity(
    });
                    isSelected = 'no';
                }
        
    }      

            


            
        });    
            
            
//sound sites
            //only for a single site
   
  $.get("/dublindashboard/CarParks/ambientSound1", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                var value = obj.aleq[lastEntry];
                var siteId = "Site1";
              
                var text = "<table style=\"width:300px\"><tr><td>Sound Level at "+getSoundSiteName(siteId).name+" is currently " +value+"                          </td></tr></table>"
      
                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                    "name": ""+getSoundSiteName(siteId)+" Centre Car Park",
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
             $.get("/dublindashboard/CarParks/ambientSound2", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                var value = obj.aleq[lastEntry];
                var siteId = "Site2";
              
                var text = "<table style=\"width:300px\"><tr><td>Sound Level at "+getSoundSiteName(siteId).name+" is currently " +value+"                          </td></tr></table>"
      
                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                    "name": ""+getSoundSiteName(siteId)+" Centre Car Park",
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
             $.get("/dublindashboard/CarParks/ambientSound3", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                var value = obj.aleq[lastEntry];
                var siteId = "Site3";
              
                var text = "<table style=\"width:300px\"><tr><td>Sound Level at "+getSoundSiteName(siteId).name+" is currently " +value+"                          </td></tr></table>"
      
                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                    "name": ""+getSoundSiteName(siteId)+" Centre Car Park",
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
             $.get("/dublindashboard/CarParks/ambientSound4", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                var value = obj.aleq[lastEntry];
                var siteId = "Site4";
              
                var text = "<table style=\"width:300px\"><tr><td>Sound Level at "+getSoundSiteName(siteId).name+" is currently " +value+"                          </td></tr></table>"
      
                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                    "name": ""+getSoundSiteName(siteId)+" Centre Car Park",
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
             $.get("/dublindashboard/CarParks/ambientSound5", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                var value = obj.aleq[lastEntry];
                var siteId = "Site5";
              
                var text = "<table style=\"width:300px\"><tr><td>Sound Level at "+getSoundSiteName(siteId).name+" is currently " +value+"                          </td></tr></table>"
      
                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                    "name": ""+getSoundSiteName(siteId)+" Centre Car Park",
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
                    fillColor: "#ff7800",
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
             $.get("/dublindashboard/CarParks/ambientSound6", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                var value = obj.aleq[lastEntry];
                var siteId = "Site6";
              
                var text = "<table style=\"width:300px\"><tr><td>Sound Level at "+getSoundSiteName(siteId).name+" is currently " +value+"                          </td></tr></table>"
      
                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                    "name": ""+getSoundSiteName(siteId)+" Centre Car Park",
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
             $.get("/dublindashboard/CarParks/ambientSound7", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                var value = obj.aleq[lastEntry];
                var siteId = "Site7";
              
                var text = "<table style=\"width:300px\"><tr><td>Sound Level at "+getSoundSiteName(siteId).name+" is currently " +value+"                          </td></tr></table>"
      
                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                    "name": ""+getSoundSiteName(siteId)+" Centre Car Park",
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
             $.get("/dublindashboard/CarParks/ambientSound8", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                var value = obj.aleq[lastEntry];
                var siteId = "Site8";
              
                var text = "<table style=\"width:300px\"><tr><td>Sound Level at "+getSoundSiteName(siteId).name+" is currently " +value+"                          </td></tr></table>"
      
                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                    "name": ""+getSoundSiteName(siteId)+" Centre Car Park",
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
             $.get("/dublindashboard/CarParks/ambientSound9", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                var value = obj.aleq[lastEntry];
                var siteId = "Site9";
              
                var text = "<table style=\"width:300px\"><tr><td>Sound Level at "+getSoundSiteName(siteId).name+" is currently " +value+"                          </td></tr></table>"
      
                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                    "name": ""+getSoundSiteName(siteId)+" Centre Car Park",
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
             $.get("/dublindashboard/CarParks/ambientSound10", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                var value = obj.aleq[lastEntry];
                var siteId = "Site10";
              
                var text = "<table style=\"width:300px\"><tr><td>Sound Level at "+getSoundSiteName(siteId).name+" is currently " +value+"                          </td></tr></table>"
      
                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                    "name": ""+getSoundSiteName(siteId)+" Centre Car Park",
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
             $.get("/dublindashboard/CarParks/ambientSound11", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                var value = obj.aleq[lastEntry];
                var siteId = "Site11";
              
                var text = "<table style=\"width:300px\"><tr><td>Sound Level at "+getSoundSiteName(siteId).name+" is currently " +value+"                          </td></tr></table>"
      
                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                    "name": ""+getSoundSiteName(siteId)+" Centre Car Park",
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
             $.get("/dublindashboard/CarParks/ambientSound12", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                var value = obj.aleq[lastEntry];
                var siteId = "Site12";
              
                var text = "<table style=\"width:300px\"><tr><td>Sound Level at "+getSoundSiteName(siteId).name+" is currently " +value+"                          </td></tr></table>"
      
                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                    "name": ""+getSoundSiteName(siteId)+" Centre Car Park",
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
             $.get("/dublindashboard/CarParks/ambientSound13", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                var value = obj.aleq[lastEntry];
                var siteId = "Site13";
              
                var text = "<table style=\"width:300px\"><tr><td>Sound Level at "+getSoundSiteName(siteId).name+" is currently " +value+"                          </td></tr></table>"
      
                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                    "name": ""+getSoundSiteName(siteId)+" Centre Car Park",
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
             $.get("/dublindashboard/CarParks/ambientSound14", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                var value = obj.aleq[lastEntry];
                var siteId = "Site14";
              
                var text = "<table style=\"width:300px\"><tr><td>Sound Level at "+getSoundSiteName(siteId).name+" is currently " +value+"                          </td></tr></table>"
      
                var ambientSoundSite = {
                    "type": "Feature",
                    "properties": {
                    "name": ""+getSoundSiteName(siteId)+" Centre Car Park",
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
    $.get("/dublindashboard/CarParks/nowParking", function(point){
        obj = JSON.parse(point);
        var date = new Date();
       //var time = date.getTime(); /use this for dynamically chaning events!
        var time = '1';
        
        //count how many variables (carparks) we have
        var key, count = 0;
        for(key in obj) {
        count++;        
        }

         var i = 0;
        for (var prop in obj) {
           
       if (obj.hasOwnProperty(prop)) {
           // alert("OK");
             var name = prop;
                var spaces = obj[prop];
                if(spaces == 'FULL'){ 
                    spaces = 0;
                }
                 
      
                var text = "<table style=\"width:300px\"><tr><td>"+getName(name).name+"Car Park currently has " +spaces+" spaces (Total Spaces:"+getName(name).totalSpaces+") </td></tr></table>"
                if (spaces == ' '){
                var text = 'No Data currently availaibe for '+getName(name).name+" Car Park";
                    spaces = 10000;
                } 
           
          
               
    var carparkSite = {
        "type": "Feature",
        "properties": {
        "name": ""+name+" Centre Car Park",
        "amenity": "Car Park",
        "popupContent": text,
            },
        "geometry": {
        "type": "Point",
        "coordinates": [getName(name).lat,getName(name).lon]
                    }
};
                
    var carparkSiteOptions = {
        radius: 8,
        //fillColor: "#ff7800",
        fillColor: setMarkerColor(spaces, getName(name).totalSpaces ), //colours[i], //
        color: "#000",
        weight: 1,
        opacity: 1,
        fillOpacity: 1 //setMarkerIntensity(spaces)
    };
           
           
   
 /*var marker = new L.Marker(new L.LatLng(getName(name).lon,getName(name).lat), {
     icon:	new L.NumberedDivIcon({number: spaces}),
     "properties": {
        "name": ""+name+" Centre Car Park",
        "amenity": "Car Park",
        "popupContent": text,
            },
});*/
                
                
 
              carParks.addLayer( L.geoJson(carparkSite,{ 
    onEachFeature: onEachFeature,  pointToLayer: function (feature, latlng) {
        return L.circleMarker(latlng, carparkSiteOptions);
    }}));
      
                  
                
            }
            
          i++;  
        }  //close loop looking at json
       
        
         if(initial ==1 || map.hasLayer(carParks)){
        carParks.addTo(map);
        soundSites.addTo(map);
        }
        //carParks.addTo(map);
        
        
        
        //airquality
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
        }
  


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


    //setTimeout(myFunction, 300000); //milliseconds 300000 - 5mins
      
   setTimeout(myFunction, 120000); //milliseconds 120000 - 2mins
       
        

});
    
    
} 
        
        function setMarkerColor(spaces, totalSpaces){
            if(spaces == 10000){ //no data
              return '#000000';  
            }
            var percentageFree = (spaces/totalSpaces)*100;
 
          
            return percentageFree < 10 ? '#fff7ec' :
			       percentageFree < 20  ? '#fee8c8' :
			       percentageFree < 30  ? '#fdd49e' :
			       percentageFree < 40  ? '#fdbb84' :
			       percentageFree < 50   ? '#fc8d59' :
			       percentageFree < 60   ? '#ef6548' :
			       percentageFree < 70   ? '#d7301f' :
                   percentageFree < 80   ? '#b30000' :
                   percentageFree < 90   ? '#8f0000' :
                   percentageFree < 120  ? '#7f0000' :
			                     '#000000';
        }
        
          function setMarkerIntensity(spaces){           
              if(spaces<100){  
                return "0.5";
            }
            else{
              return "1";  
            }
        }
        
         function setAmbientSoundColor(ambientSound){
            var good = 55;
            var bad = 70;
          
          
            return ambientSound < good ? '#fff7ec' :
			       ambientSound > bad  ? '#b30000' :
			                     '#fc8d59';
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
</body>
</html>




