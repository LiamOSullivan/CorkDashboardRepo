                                                                                                                                                                                                                                                                                                                                                                
<!DOCTYPE html>
<html>
<head>
  <title>Leaflet WMS/WFS Example</title>
  <meta charset="utf-8" />
	
	<!--<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.4.5/leaflet.css" /> -->
        <link rel="stylesheet" href="//cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
  <!--  <link rel="stylesheet" href="/dublindashboard/css/leaflet.css" /> -->
   <!-- <link rel="stylesheet" href="/dublindashboard/css/leaflet-list-markers.css" /> -->
    <!--<link rel="stylesheet" href="/dublindashboard/css/Dashboard/skel-noscript.css" />
			<link rel="stylesheet" href="/dublindashboard/css/Dashboard/style.css" />
			<link rel="stylesheet" href="/dublindashboard/css/Dashboard/style-desktop.css" /> -->
    
      <!-- Stylesheets -->
                <?php echo $this->Html->css('3cols'); ?>
                <?php echo $this->Html->css('2cols'); ?>
                <?php echo $this->Html->css('4cols'); ?>
                <?php echo $this->Html->css('col'); ?>
                <?php echo $this->Html->css('html5reset'); ?>
                <?php echo $this->Html->css('responsivegridsystem'); ?>
    

    
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
    
   
	<div id="map" style="width: 100%; height: 600px"></div>
    <div id="dataSources" style="width: 100%; height: 500px" align="left"></div>

	<!--<script src="http://code.jquery.com/jquery-1.8.1.min.js"></script> -->
  <!-- <script src="/dublindashboard/js/leaflet.js"></script> -->
    <script src="//cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script> 
    <script src="/dublindashboard/js/carparks.js"></script>
     <script src="/dublindashboard/js/soundsites.js"></script>
    <script src="/dublindashboard/js/M50.js"></script>
    <script src="/dublindashboard/js/R1D1.js"></script>
   <!-- <script src="/dublindashboard/js/leaflet_numbered_markers.js"></script> -->
    <script src="/dublindashboard/js/TileLayer.Grayscale.js"></script>
   <!-- <script src="/dublindashboard/js/leaflet-list-markers.js"></script> -->
	<script src="/dublindashboard/js/carParkCapacities.js"></script>
    <script src="/dublindashboard/js/allRoutes.js"></script>
    <script src="/dublindashboard/js/allRoutesSegments.js"></script>
	
    
    <script>
        

        
          //Map Stuff
        //Individual AirQuality Locations
        
            
      
		//var map = new L.Map('map');
		//var map;
       

        //highchart default colours

    		
		var cloudmadeUrl = '//{s}.tile.cloudmade.com/BC9A493B41014CAABB98F0471D759707/997/256/{z}/{x}/{y}.png',
			cloudmadeAttribution = 'Map data &copy; 2011 OpenStreetMap contributors, Imagery &copy; 2011 CloudMade',
			cloudmade = new L.TileLayer(cloudmadeUrl, {maxZoom: 18, attribution: cloudmadeAttribution});
		
		var mapquestUrl = '//otile{s}.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png',
			mapquestAttribution = "Data CC-By-SA by <a href='http://openstreetmap.org/' target='_blank'>OpenStreetMap</a>, Tiles Courtesy of <a href='http://open.mapquest.com' target='_blank'>MapQuest</a>",
			mapquestGrey = new L.TileLayer.Grayscale(mapquestUrl, {maxZoom: 18, attribution: mapquestAttribution, subdomains: ['1','2','3','4'],  bgcolor: '0x80BDE3'}),
            mapquestColour = new L.TileLayer(mapquestUrl, {maxZoom: 18, attribution: mapquestAttribution, subdomains: ['1','2','3','4'],  bgcolor: '0x80BDE3'});
        
        // create the tile layer with correct attribution
	var osmUrl='//{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
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
                ttGrades = [1,1,2,3,4,5,6,6],
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
                
                labels.push('');
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
            
            labels.push('');
            labels.push('<i style="background: url(\'/dublindashboard/img/Dashboard/trafficCam.png\'); background-size: 18px 18px;"></i> '+ ' Traffic Camera');
            
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
    

    iconSize:     [20, 20], // size of the icon
    iconAnchor:   [10, 10], // point of the icon which will correspond to marker's location
    popupAnchor:  [0, 0] // point from which the popup should open relative to the iconAnchor
});
//markers for traffic cams
       
         

   var trafficCam1 = { //Heuston
                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: Heuston Station</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera163.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [-6.298893,53.345569]
                                    }
            };
       var trafficCam2 = { //M50 - Lucan
                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: M50 Lucan</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera82.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [-6.383218 ,53.357036]
                                    }
            }; 
        
           var trafficCam3 = { //M50 - Ballinteer
                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: M50 Ballinteer</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera73.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [ -6.259937,53.26716]
                                    }
            };
                                        
         var trafficCam4 = { //M50 - Edmondstown
                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: M50 Edmondstown</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera74.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [  -6.293781,53.268131]
                                    }
            };
        
        var trafficCam5 = { //M50 - Firhouse
                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: M50 Firhouse</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera75.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [ -6.323389, 53.278395]
                                    }
            };
        
          var trafficCam6 = { //M50 - Tallaght
                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: M50 Tallaght</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera77.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [  -6.331934,53.292516]
                                    }
            };
        
          var trafficCam7 = { //M50 - Red Cow
                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: M50 Red Cow</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera79.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [  -6.364077,53.313702]
                                    }
            };
        
           var trafficCam8 = { //Newlands Cross
                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: Newlands Cross</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera85.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [ -6.390534,  53.312803]
                                    }
            };
        
           var trafficCam9 = { //Blanchardstown
                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: Blanchardstown Roundabout</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera71.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [-6.363118, 53.382870]
                                    }
            };
        
         var trafficCam10 = { //M50 - Finglas
                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: M50 - Finglas</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera87.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [ -6.313282,53.404100]
                                    }
            };
        
          var trafficCam11 = { //M50 - Ballymun
                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: M50 - Ballymun</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera96.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [ -6.266045,53.409265]
                                    }
            };
        
          var trafficCam12 = { //M50 - Port Tunnel  
                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: M50 - Port Tunnel</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera95.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [-6.238549, 53.397545]
                                    }
            };
        
          var trafficCam13 = { //M1/M50 
                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: M1/M50</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera94.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [ -6.226464,53.410535]
                                    }
            };
        
         var trafficCam14 = { // N32 - Malahide Road
                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: N32 - Malahide Road</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera91.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [ -6.179616, 53.403124]
                                    }
            };
        
          var trafficCam15 = { // M1 Airport
                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: M1 Airport</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera110.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [ -6.217730,53.427072]
                                    }
            };
        
         var trafficCam16 = { // John's Road/SCR
                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: John's Road/SCR</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera15.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [  -6.306516,53.343776]
                                    }
            };
        
          var trafficCam17 = { // Pearse Street
                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: Pearse Street</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera23.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [ -6.244606,  53.343192]
                                    }
            };
        
                  var trafficCam18 = { // Samuel Beckett Bridge

                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: Samuel Beckett Bridge</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera136.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [ -6.241125, 53.347631]
                                    }
            };
        
           var trafficCam19 = { // Sir John Rogersons Quay

                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: Sir John Rogersons Quay </b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera137.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [-6.240452, 53.346094]
                                    }
            };
        
              var trafficCam20 = { // Harold's Cross Bridge

                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: Harold's Cross Bridge </b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera31.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [-6.275509,53.329704]
                                    }
            };
        
             var trafficCam21 = { // Longmile Road/Walkinstown Avenue


                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: Longmile Road/Walkinstown Avenue </b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera66.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [ -6.340967,53.323717]
                                    }
            };
        
             var trafficCam22 = { // N11 - Fosters Avenue



                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: N11 - Fosters Avenue </b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera100.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [-6.209670, 53.304456]
                                    }
            };
        
            var trafficCam23 = { // N11 - Mount Merrion Avenue


                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: N11 - Mount Merrion Avenue </b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera101.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [ -6.203974,53.297014]
                                    }
            };
        
           var trafficCam24 = { // N11 -  Trees Road


                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: N11 -  Trees Road </b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera103.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [ -6.201568, 53.293122]
                                    }
            };
        
          var trafficCam25 = { // N11 -  Kilmacud Road


                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: N11 - Kilmacud Road </b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera102.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [-6.195809, 53.289584]
                                    }
            };
        
              var trafficCam26 = { // N11 -   Newtownpark Avenue


                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: N11 - Newtownpark Avenue </b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera104.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [ -6.185634,53.278867]
                                    }
            };
        
         var trafficCam27 = { // N11 -   Foxrock Church


                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: N11 - Foxrock Church </b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera105.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [  -6.173570,53.273730]
                                    }
            };
        
           var trafficCam28 = { // N11 -   Clonkeen Road


                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: N11 - Clonkeen Road</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera106.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates": [ -6.158778, 53.266512]
                                    }
            };
        
           var trafficCam29 = { // N11 -   Johnstown Road


                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: N11 - Johnstown Road</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera107.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates":  [-6.149621,53.261961]
                                    }
            };
        
           var trafficCam30 = { // N11 -   Wyattville Road


                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: N11 - Wyattville Road</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera108.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates":  [ -6.137588,53.247910]
                                    }
            };
        
         var trafficCam31 = { //Cabra Road
                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: Cabra Road</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera32.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates":  [  -6.298239,53.361643]
                                    }
            };
        
        var trafficCam32 = { //Liberty Hall
                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: Liberty Hall</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera10.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates":  [ -6.255407, 53.348476]
                                    }
            };
        
         var trafficCam33 = { //O Connell Bridge

                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: O'Connell Bridge</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera6.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates":  [ -6.259005, 53.347095]

                                    }
            };
        
          var trafficCam34 = { //North Wall Quay


                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: North Wall Quay</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera122.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates":  [ -6.228156, 53.346738]


                                    }
            };
        
        
             var trafficCam35 = { //Dublin Port Toll Plaza



                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: Dublin Port Tunnel Toll Plaza</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera135.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates":  [ -6.225698, 53.355500]

                                    }
            };
        
           var trafficCam36 = { //Mayor Street/Guild Street

                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: Mayor Street/Guild Street</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera127.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates":  [ -6.240945, 53.349081]

                                    }
            };
        
           var trafficCam37 = { //Guild Street/Seville Place

                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: Guild Street/Seville Place</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera139.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates":  [ -6.240726, 53.350590]

                                    }
            };
        
             var trafficCam38 = { //North Strand Road/East Wall Road


                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: North Strand Road/East Wall Road</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera24.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates":  [  -6.239089,53.360681]

                                    }
            };
        
          var trafficCam39 = { //Constitution Hill/Western Way



                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: Constitution Hill/Western Way</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera131.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates":  [ -6.273287,  53.354402]

                                    }
            };
        
         var trafficCam40 = { //M1 - Drynam


                        "type": "Feature",
                        "properties": {
                        "amenity": "Traffic Cam",
                        "popupContent": "<h5><b>Site: M1 - Drynam</b></h5>" + "<table style=\"width:405px\"> <tr> <td><img src=\"http://www.dublincity.ie/dublintraffic/site16Camera111.jpg\" width=\"400px\"> </td></tr> </table> ",
                },
                        "geometry": {
                        "type": "Point",
                        "coordinates":  [  -6.205844,53.443296]

                                    }
            };
        
        
        
       
       
        
        
        
       
    
        
        
        
       
    

	/*	popup = new L.Popup({
			maxWidth: 200
		});*/
    
 function getName(propertyName) {
                return carparks[propertyName];
            }; 



        
 function getJunctionName(propertyName) {
                return M50[propertyName];
            };
        
        var carParks = new L.FeatureGroup();
        var m50North = new  L.FeatureGroup();
        var m50South = new  L.FeatureGroup();
        var trips=   new L.FeatureGroup();
        var trafficCams = new L.FeatureGroup();
        
        L.stamp(carParks);
        L.stamp(m50North);
        L.stamp(m50South);
        L.stamp(trips);
        L.stamp(trafficCams);
        
        var baseMaps = {
    "MQ Greyscale": mapquestGrey,
    "MQ Colour": mapquestColour,
    "OSM Greyscale": osmGrey,
    "OSM Colour": osm
    
};

var overlayMaps = {
    "City Centre Carparks": carParks,
    "M50 Travel Times - South": m50South,
    "M50 Travel Times - North": m50North,
    "Travel Time to City": trips,
    "Traffic Cameras": trafficCams

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
        trafficCams.clearLayers(); // traffic cams
       
    
        $row = 1;
        //Travel Time (TRIPS).
                 
      
          
            var propertyNames = Object.keys(roads);
            $.get("/CarParks/readCSVSegments", function(point){
             
                obj = JSON.parse(point);
                var count =0;
                for(key in obj) {
                    count++; 
                   
                }
                
                for(key in allRoutesSegments) {
                    var route = allRoutesSegments[key].Route;
                    var direction = allRoutesSegments[key].Direction;
                    var segment = allRoutesSegments[key].Link;
                       
                    for(var i=0;i<count;i++){
                        
                        var targetRoute = obj[i].route;
                        var targetDirection = obj[i].direction;
                        var targetSegment = obj[i].segment;
                       
                        if(targetRoute == route && targetDirection == direction && targetSegment == segment){
                        //these are routes and segments that we do no want added.
                            if(targetRoute ==1 /*&& (targetSegment == 1 || targetSegment == 2 || targetSegment == 3 || targetSegment == 4)) */||((targetRoute ==22 && (targetSegment == 1 || targetSegment == 2 || targetSegment == 3 || targetSegment == 4 || targetSegment == 5)) ) ||(targetRoute ==29  && targetSegment ==1)){
                            //do nothing
                            }
                            else{   //set the travel time for the popup
                            
                                var travelTime= obj[i].travelTime;
                                var travelTimeMins = travelTime/60; 
                                var fromlat = allRoutesSegments[key].geometry.coordinates[0][0];
                                var fromlon = allRoutesSegments[key].geometry.coordinates[0][1];           
                                var tolat = allRoutesSegments[key].geometry.coordinates[1][0];
                                var tolon = allRoutesSegments[key].geometry.coordinates[1][1];
                                var distance = getDistance(fromlat,fromlon,tolat,tolon);
                                var speed = getSpeed(travelTime, distance);
                    
         
                                    var speed = getSpeed(travelTime, distance);
                                    var iTravelTime = Math.round((travelTime)/60);
                                    var oTravelTime = Math.round((obj[i-1].travelTime)/60);
                                    if (iTravelTime == 0){
                                        iTravelTime = 'less than 1';
                                    }
                                    if (oTravelTime == 0){
                                        oTravelTime = 'less than 1';
                                    }
 
   
                                var text = "<table style=\"width:300px\"><tr><td>Estimated travel time on this segement (R"+route+"D"+direction+"S"+segment+"): "+iTravelTime+"minute(s) </td></tr></table>";
                
                                  
                                    
                           

                                var roadSeg = {
                                    "type": "Feature",
                                    "properties": {
                                    "fromlat":fromlat,
                                    "fromlon":fromlon,
                                    "tolat":tolat,
                                    "tolon":tolon,
                                    "travelTime":travelTimeMins,
                                    "speed":speed,  
                                    "name": ""+route,
                                    "popupContent": text,  
                                        },
                                    "geometry": {"type": "LineString",
                                                 "coordinates": [[fromlat,fromlon],[tolat,tolon]]
                                                }
                                };
                   
                
                               /* var roadSegOptions = {
                                    fillColor: setTripsColour(speed),
                                    dashArray: '5, 15',
                                    weight: 1,
                                    opacity: 0.5,
                                };*/
           

                    
                            var lyr = L.geoJson(roadSeg, {
                                style: { weight : 1 },
                                onEachFeature : function(feature, layer) {
                                    popup = layer.bindPopup(layer.feature.properties.popupContent);
                                   
                                   
                                    var theColour = setTripsColourCSV(Math.round(travelTimeMins)); 
                                    
                                    /*if( theColour =='blue'){ //if red line should be dashed
                                        var dash = '5, 15';
                                    }
                                    else{
                                        var dash= '';
                                    }*/
    
                                    popup.on("popupclose", function(e) {
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
                    }
                
                }     
            }  
        }); 

            // M50 SOUTHBOUD
        $.get("/CarParks/travelTimes", function(point){
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
              //  opacity: 1,
                //fillOpacity: setMarkerIntensity(spaces)
        };
            
            
           //colour the road segments according to travel time
            
        //set the colour
            var m50SegOptionsColor =  setTripsColourCSV(travelTime);
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
                   // fillOpacity: 0.5    
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
            //fillOpacity: 1
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
        dashArray: '', //e.target.feature.properties.dashArray,
        //fillOpacity: setMarkerIntensity(
    });
                    isSelected = 'no';
                }
        
    }      

            


            
        });
      
            //M50 NORTHBOUND
     
        $.get("/CarParks/travelTimes", function(point){
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
                fillOpacity: 1
        };
            
            
           //colour the road segments according to travel time
            //colour the road segments according to travel time
            
        //set the colour
            var m50SegOptionsColor =  setTripsColourCSV(travelTime);
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
                    fillOpacity: 1   
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
           // fillOpacity: 1
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
            //fillOpacity: 1
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
        dashArray: e.target.feature.properties.dashArray,
        //fillOpacity: setMarkerIntensity(
    });
                    isSelected = 'no';
                }
        
    }      

            


            
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
                 
      
                var text = "<table style=\"width:300px\"><tr><td>"+getName(name).name+" Car Park currently has " +spaces+" spaces (Total Spaces:"+getName(name).totalSpaces+") </td></tr></table>"
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
           
           
   

                
                
 
              carParks.addLayer( L.geoJson(carparkSite,{ 
    onEachFeature: onEachFeature,  pointToLayer: function (feature, latlng) {
        return L.circleMarker(latlng, carparkSiteOptions);
    }}));
           
             trafficCams.addLayer( L.geoJson(trafficCam1,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
           trafficCams.addLayer( L.geoJson(trafficCam2,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
           trafficCams.addLayer( L.geoJson(trafficCam3,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
             trafficCams.addLayer( L.geoJson(trafficCam4,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
             trafficCams.addLayer( L.geoJson(trafficCam5,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
             trafficCams.addLayer( L.geoJson(trafficCam6,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
             trafficCams.addLayer( L.geoJson(trafficCam7,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
             trafficCams.addLayer( L.geoJson(trafficCam8,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
             trafficCams.addLayer( L.geoJson(trafficCam9,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
             trafficCams.addLayer( L.geoJson(trafficCam10,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
             trafficCams.addLayer( L.geoJson(trafficCam11,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                  trafficCams.addLayer( L.geoJson(trafficCam12,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                  trafficCams.addLayer( L.geoJson(trafficCam13,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                  trafficCams.addLayer( L.geoJson(trafficCam14,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                  trafficCams.addLayer( L.geoJson(trafficCam15,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                  trafficCams.addLayer( L.geoJson(trafficCam16,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                  trafficCams.addLayer( L.geoJson(trafficCam17,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                  trafficCams.addLayer( L.geoJson(trafficCam18,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                  trafficCams.addLayer( L.geoJson(trafficCam19,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                  trafficCams.addLayer( L.geoJson(trafficCam20,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                  trafficCams.addLayer( L.geoJson(trafficCam21,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                  trafficCams.addLayer( L.geoJson(trafficCam22,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                  trafficCams.addLayer( L.geoJson(trafficCam23,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                  trafficCams.addLayer( L.geoJson(trafficCam24,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                  trafficCams.addLayer( L.geoJson(trafficCam25,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                  trafficCams.addLayer( L.geoJson(trafficCam26,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                  trafficCams.addLayer( L.geoJson(trafficCam27,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                  trafficCams.addLayer( L.geoJson(trafficCam28,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                  trafficCams.addLayer( L.geoJson(trafficCam29,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                  trafficCams.addLayer( L.geoJson(trafficCam30,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                        trafficCams.addLayer( L.geoJson(trafficCam31,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                        trafficCams.addLayer( L.geoJson(trafficCam32,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                        trafficCams.addLayer( L.geoJson(trafficCam33,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                        trafficCams.addLayer( L.geoJson(trafficCam34,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                        trafficCams.addLayer( L.geoJson(trafficCam35,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                        trafficCams.addLayer( L.geoJson(trafficCam36,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                        trafficCams.addLayer( L.geoJson(trafficCam37,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                        trafficCams.addLayer( L.geoJson(trafficCam38,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                        trafficCams.addLayer( L.geoJson(trafficCam39,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
                              trafficCams.addLayer( L.geoJson(trafficCam40,{ 
    onEachFeature: onEachTrafficCamFeature,  pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon:trafficIcon});
    }}));
      
                  
                
            }
            
          i++;  
        }  //close loop looking at json
       
        
         if(initial ==1 || map.hasLayer(carParks)){
        carParks.addTo(map);
            trafficCams.addTo(map);
 
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


    setTimeout(myFunction, 300000); //milliseconds 300000 - 5mins
      
 //  setTimeout(myFunction, 120000); //milliseconds 120000 - 2mins
     
        var divData = document.getElementById('dataSources');
        divData.innerHTML = "";
                    divData.innerHTML = divData.innerHTML +"<h5>Data Sources</h5>";
                                       divData.innerHTML = divData.innerHTML +"<h5>The inter-junction travel times on the M50 are taken from the <a href=\"https://www.nratraffic.ie/travel_times/\" target=\"_blank\">National Roads Authority</a>. We apply the following colour coding to the data: Blue if the travel time is greater than the freeflow travel time and red if it is equal or below. </h5>";
           
             divData.innerHTML = divData.innerHTML +"<h5>The travel times on the main arteries into Dublin City are taken from Dublin City Council's Travel-Time Reporting and Integrated Performance System (TRIPS). Further information about this data set can be found <a href=\"http://dublinked.ie/datastore/datasets/dataset-215.php\" target=\"_blank\">here.</a></h5>";
             
              divData.innerHTML = divData.innerHTML +"<h5>The Car Park Data is supplied directly by Dublin City Council. The colour gradient is determined by the percentage of available spaces. More information about this data can be found <a href=\"http://www.dublincity.ie/dublintraffic/carparks.htm\" target=\"_blank\">here.</a></h5>";
        
         divData.innerHTML = divData.innerHTML +"<h5>The Traffic Camera Data is supplied directly by Dublin City Council. More information about this data can be found <a href=\"http://www.dublincity.ie/dublintraffic/\" target=\"_blank\">here.</a></h5>";  
        
     
});
    
    
} 
        
        
            function highlightRoadFeature(e) {
        isSelected ='yes';
        var layer = e.target;
        layer.setStyle({ // highlight the feature
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
        layer.setStyle({ // highlight the feature
            weight: 10,
            color: 'blue',
            dashArray: '',
           // opacity: 0.5
        });

        if (!L.Browser.ie && !L.Browser.opera) {
            layer.bringToFront();
        }
      
      }
            
    function resetRoadHighlight(e){ 
        if(isSelected == 'yes'){   
            var layer = e.target;
            var theColour = setTripsColourCSV(Math.round(e.target.feature.properties.travelTime)); 
            
           
          /*  if( theColour =='blue'){
               var dash = '20';
            }
            else{
                var dash= ''; 
            }*/
               
            layer.setStyle({ // highlight the feature
                weight: 3,
                //color: 'orange', // e.target.feature.properties.colour,
                color:theColour,
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
        
        function setTripsColourCSV(travelTime){
     
            
             		return travelTime < 1 ? '#f7fcb9' :
			       travelTime < 2  ? '#d9f0a3' :
			       travelTime < 3  ? '#addd8e' :
			       travelTime < 4  ? '#78c679' :
			       travelTime < 5   ? '#41ab5d' :
			       travelTime < 6   ? '#238443' :
			       travelTime < 7 ? '#006837':
                   
                                '#004529';
                                

      
            
        }
        
    Number.prototype.toRad = function() {
        return this * Math.PI / 180;
    }
        
    function getDistance(fromLat,fromLon,toLat,toLon){
        
        var lat2 = toLat; 
        var lon2 = toLon; 
        var lat1 = fromLat; 
        var lon1 = fromLon; 
        var R = 6371; // km 
        
        var x1 = lat2-lat1;
        var dLat = x1.toRad();  
        var x2 = lon2-lon1;
        var dLon = x2.toRad();  
        var a = Math.sin(dLat/2) * Math.sin(dLat/2) + 
                Math.cos(lat1.toRad()) * Math.cos(lat2.toRad()) * 
                Math.sin(dLon/2) * Math.sin(dLon/2);  
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
        var d = R * c; 
            
        return d;
            
    }
        
    function getSpeed(travelTime, distance){
       
        var speedSecs = distance/travelTime;
        var hour = 3600;
        var travelTimeHours = travelTime/hour;
        var speed = distance/travelTimeHours;
        return speed;  
        
        }
        
        
        function setMarkerColor(spaces, totalSpaces){
            if(spaces == 10000){ //no data
              return '#000000';  
            }
            var percentageFree = (spaces/totalSpaces)*100;
 
          
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
			       percentageFree < 20  ? '#8f0000' :
			       percentageFree < 30  ? '#b30000' :
			       percentageFree < 40  ? '#d7301f' :
			       percentageFree < 50   ? '#ef6548' :
			       percentageFree < 60   ? '#fc8d59' :
			       percentageFree < 70   ? '#fdbb84' :
                   percentageFree < 80   ? '#fdd49e' :
                   percentageFree < 90   ? '#fee8c8' :
                   percentageFree < 120  ? '#fff7ec' :
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
           
          
       
            return travelTime < good ? '#0571b0' :
			       travelTime > good  ? '#FF0000' :
			                     '#0571b0';
        }
        
        
        function setTripsDash(travelTime){
            
            var good = 10;//need the freeflow traveltime
           
          
       
            return travelTime < good ? '' :
			       travelTime > good  ? '10' :
			                     '0';
        }
                        
   

		function onMapClick(e) {
         
          
   
		}
        
     
   
	 
	</script>
   
    
    
      <?php echo $this->element('googleAnalytics'); ?>
</body>
</html>





                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            