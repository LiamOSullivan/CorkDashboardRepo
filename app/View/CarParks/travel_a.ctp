                                                                                                
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
                labels.push('Travel Speeds');
                labels.push('<i style="background: #00FF00"></i> '+ ' < 50km/hr');
                labels.push('<i style="background: blue"></i> '+ ' > 50km/hr');
            

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



        
 function getJunctionName(propertyName) {
                return M50[propertyName];
            };
        
        var carParks = new L.FeatureGroup();
        var m50North = new  L.FeatureGroup();
        var m50South = new  L.FeatureGroup();
        var trips=   new L.FeatureGroup();
        
        L.stamp(carParks);
        L.stamp(m50North);
        L.stamp(m50South);
        L.stamp(trips);
        
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
    "Travel Time to City": trips

};     
        layerControl = L.control.layers(baseMaps, overlayMaps);
        layerControl.addTo(map);
        var initial = 0;  //check to add everythign initially to first map.
      
        
        function myFunction() {    
             initial++;
        
           
        carParks.clearLayers(); //car parks
        m50North.clearLayers(); // M50 NORTH
        m50South.clearLayers(); // M50 South
        trips.clearLayers(); // TRIPS Routes*/
       
    
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
                    
                                if(direction ==1){
         
                                    var speed = getSpeed(travelTime, distance);
                                    var iTravelTime = Math.round((travelTime)/60);
                                    var oTravelTime = Math.round((obj[i-1].travelTime)/60);
                                    if (iTravelTime == 0){
                                        iTravelTime = 'less than 1';
                                    }
                                    if (oTravelTime == 0){
                                        oTravelTime = 'less than 1';
                                    }
 
                                    var text = "<table style=\"width:300px\"><tr><td>Inbound Travel time on this segement(R"+route+"D"+direction+"S"+segment+"): "+oTravelTime+"minute(s) <br> Outbound Travel time on this segement(R"+obj[i+1].route+"D"+obj[i+1].direction+"S"+obj[i+1].segment+"): "+iTravelTime+"minute(s)</td></tr></table>";
                
                                    }
                                if(direction ==2){
                                    var speed = getSpeed(obj[i-1].travelTime, distance);
                                    var iTravelTime = Math.round((obj[i-1].travelTime)/60);
                                    var oTravelTime = Math.round((travelTime)/60);
                                    if (iTravelTime == 0){
                                        iTravelTime =  'less than 1';
                                    }
                                    if (oTravelTime == 0){
                                        oTravelTime =  'less than 1';
                                    }
                                    var text = "<table style=\"width:300px\"><tr><td>Inbound Travel time on this segement(R"+obj[i-1].route+"D"+obj[i-1].direction+"S"+obj[i-1].segment+"): "+iTravelTime+"minute(s) <br> Outbound Travel time on this segement(R"+route+"D"+direction+"S"+segment+"): "+oTravelTime+"minute(s)</td></tr></table>"
                                }

                                var roadSeg = {
                                    "type": "Feature",
                                    "properties": {
                                    "fromlat":fromlat,
                                    "fromlon":fromlon,
                                    "tolat":tolat,
                                    "tolon":tolon,
                                    "travelTime":travelTime,
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
                                   
                                    
                                    var theColour = setTripsColourCSV(speed); 
                                    
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
                                        opacity: '0.5'   
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
                opacity: 1,
                //fillOpacity: setMarkerIntensity(spaces)
        };
            
            
           //colour the road segments according to travel time
            if(travelTime<=freeFlowTravelTime){
                var m50SegOptionsColor = 'green';  //Green
                var m50dash = '';
                
                
            }
            else{
                //there is a delay
                var m50SegOptionsColor = 'blue'; //Red
                var m50dash = '';
                
            }
            
          
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
                //fillOpacity: setMarkerIntensity(spaces)
        };
            
            
           //colour the road segments according to travel time
            if(travelTime<=freeFlowTravelTime){
                var m50SegOptionsColor = 'green';  //Green
                var m50dash = '';
                
            }
            else{
                //there is a delay
                var m50SegOptionsColor = 'blue'; //Red
                 var m50dash = '10';
            }
            
          
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
      
                  
                
            }
            
          i++;  
        }  //close loop looking at json
       
        
         if(initial ==1 || map.hasLayer(carParks)){
        carParks.addTo(map);
 
        }
        //carParks.addTo(map);
        
        
        
      
  


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
                                       divData.innerHTML = divData.innerHTML +"<h5>The inter-junction travel times on the M50 are taken from the <a href=\"https://www.nratraffic.ie/travel_times/\" target=\"_blank\">National Roads Authority</a>. We apply the following colour coding to the data: Blue if the travel time is greater than the freeflow travel time and green if it is equal or below. </h5>";
           
             divData.innerHTML = divData.innerHTML +"<h5>The travel time on the main arteries in to Dublin City is taken from Dublin City Council's Travel-time Reporting and Integrated Performance System (TRIPS). We apply the following colour coding to the data: Blue if the estimated travel speed is less han 50km/hour and green if it is equal or below. Further information about this data set can be found <a href=\"http://dublinked.ie/datastore/datasets/dataset-215.php\" target=\"_blank\">here.</a></h5>";
             
              divData.innerHTML = divData.innerHTML +"<h5>The Car Park Data is supplied directly by Dublin City Council. The colour gradient is determined by the percentage of available spaces. More information about this data can be found <a href=\"http://www.dublincity.ie/dublintraffic/carparks.htm\" target=\"_blank\">here.</a></h5>";   
        
     
});
    
    
} 
        
        
            function highlightRoadFeature(e) {
        isSelected ='yes';
        var layer = e.target;
        layer.setStyle({ // highlight the feature
            weight: 10,
            color: 'blue',
            dashArray: '',
            opacity: 1
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
            opacity: 0.5
        });

        if (!L.Browser.ie && !L.Browser.opera) {
            layer.bringToFront();
        }
      
      }
            
    function resetRoadHighlight(e){ 
        if(isSelected == 'yes'){   
            var layer = e.target;
            var theColour = setTripsColourCSV(e.target.feature.properties.speed); 
            
           
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
                opacity:0.5
                //fillOpacity: setMarkerIntensity(
            });
                isSelected = 'no';
        }      
    }

    function onMapClick(e) {

	}

    function setTripsColourCSV(speed){
       
        
        if(speed < 50){
           
            return 'blue';
        }
        else {
         
           return 'green';  
        }  
       
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
        
        
        function setTripsDash(travelTime){
            
            var good = 10;//need the freeflow traveltime
           
          
       
            return travelTime < good ? '' :
			       travelTime > good  ? '10' :
			                     '0';
        }
                        
   

		function onMapClick(e) {
         
          
   
		}
        
     
   
	 
	</script>
    <h5>Other Sources of Real-Time Travel Data for Dublin</h5>  
  <div class="section group">
   
                            
                          
                        
                   
                     <div class="col span_1_of_2">
                          <center>
                                     <div id ="containerGG">
                       <div class="upper">
                             <a href ="http://www.dublinbikes.ie/All-Stations/Station-map" target="_blank">
                            <img src="/dublindashboard/img/dublin_bikes.png" alt="dublin_bikes"></td></a>
                                         </div>
                  
                    </div>
                            </center>
                            </div>
                        
                                   <div class="col span_1_of_2">
                            <center>
                                 <div id ="containerGG">
                       <div class="upper">
        
                            <a href="http://www.irishrail.ie/timetables/live-map-dart" target="_blank"><img src="/dublindashboard/img/irish_rail.png" alt="irish_rail"></td></a>
                              </div>
                
                    </div>
                                    
                            
                            </center>
                                
                            </div>
                            
                            
                        </div>
    
    
      <?php echo $this->element('googleAnalytics'); ?>
</body>
</html>





                            
                            
                            