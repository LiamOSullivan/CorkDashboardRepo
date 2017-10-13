  <!DOCTYPE HTML>
<!--
	Halcyonic 3.1 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
	<title>Cork Dashboard Home</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Provides access to statistics for Cork ." />
		<meta name="keywords" content="Corkdashboard, Cork, population, travel time, weather, parking, river levels, housing, labour, health, overview" />
		<script src="/dublindashboard/js/Dashboard/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<!-- <script src="/dublindashboard/js/Dashboard/config.js"></script> -->
		
		<script src="/dublindashboard/js/Dashboard/skel.min.js"></script>
		<!-- <script src="/dublindashboard/js/Dashboard/skel-panels.min.js"></script> -->
		<script src="/dublindashboard/js/Dashboard/skel-layers.min.js"></script> 
		<script src="/dublindashboard/js/Dashboard/init.js"></script>

            <link rel="stylesheet" href="//cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" /> 
		<noscript>
			<link rel="stylesheet" href="/dublindashboard/css/Dashboard/skel-noscript.css" />
			<link rel="stylesheet" href="/dublindashboard/css/Dashboard/style.css" />
			<link rel="stylesheet" href="/dublindashboard/css/Dashboard/style-desktop.css" />

		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="/dublindashboard/css/Dashboard/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="/dublindashboard/js/Dashboard/html5shiv.js"></script><![endif]-->
		<!--<?php  echo $this->Html->script('jquery.min.js'); ?>-->
     
         <!-- Stylesheets -->
	<?php echo $this->Html->css('3cols'); ?>
	<?php echo $this->Html->css('2cols'); ?>
	<?php echo $this->Html->css('4cols'); ?>
    <?php echo $this->Html->css('6cols'); ?>
	<?php echo $this->Html->css('col'); ?>



	<!--/*  THIS IS JUST TO GET THE GRID TO SHOW UP.  YOU DONT NEED THIS IN YOUR CODE */

	#maincontent .col {
		background: #ccc;
		background: rgba(255,255,255, 0.3);

	}
	
td {
    white-space: pre-wrap;
}-->

	</style>
	
           
	</head>
	<body onload="myFunction()">

		<!-- Header -->
			<div id="header-wrapper">
			<header id="header" class="container">
					<div class="row">
						<div class="12u">
						
				<!-- Banner -->

                            <?php echo $this->element('dbBanner'); ?>

						</div>
					</div>
				</header>
			
        
                      <div id="band">
					<section>
						<div class="row">
							
							
							<?php echo $this->element('dbNavMenu'); ?>

							
				
						</div>
				</section>
				</div>
                
</div>
		<!-- Content -->
			<div id="content-wrapper">
				<div id="content">
					<div class="container">
						<div class="row">
							<div class="2u">
								
								<!-- Sidebar -->
								<section>
										<header>
											<h2>Other Data Modules</h2>
										</header>
										<ul class="link-list">
                                        <?php echo $this->element('sidebar'); ?>
											
											
										</ul>
									</section>

							</div>				
	
      <script type="text/javascript">

// Current Server Time script (SSI or PHP)- By JavaScriptKit.com (http://www.javascriptkit.com)
// For this and over 400+ free scripts, visit JavaScript Kit- http://www.javascriptkit.com/
// This notice must stay intact for use.

//Depending on whether your page supports SSI (.shtml) or PHP (.php), UNCOMMENT the line below your page supports and COMMENT the one it does not:
//Default is that SSI method is uncommented, and PHP is commented:

//var currenttime = '<!--#config timefmt="%B %d, %Y %H:%M:%S"--><!--#echo var="DATE_LOCAL" -->' //SSI method of getting server date
var currenttime = '<? print date("F d, Y H:i:s", time())?>' // getting server date

///////////Stop editing here/////////////////////////////////

var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
var serverdate=new Date(currenttime)

function padlength(what){
var output=(what.toString().length==1)? "0"+what : what
return output
}

function displaytime(){
serverdate.setSeconds(serverdate.getSeconds()+1)
var datestring=montharray[serverdate.getMonth()]+" "+padlength(serverdate.getDate())+", "+serverdate.getFullYear()
var timestring=padlength(serverdate.getHours())+":"+padlength(serverdate.getMinutes())+":"+padlength(serverdate.getSeconds())
document.getElementById("servertime").innerHTML=datestring+" "+timestring
}

  $( function() {
    $( "#alerts" ).accordion();
  } );

</script>

<div class="10u important(collapse)">
								
								<!-- Main Content -->
									<section>
									<div id="wrapper">
<header>
											<h3>Cork - Current Time: <span id="servertime"></span></h3>
										</header>
											<div id="headcontainer">
		<header>
		
	
		</header>
	</div>
	<div id="maincontentcontainer">

 <script src="http://www.chartjs.org/dist/2.6.0/Chart.bundle.js"></script>
    <script src="http://www.chartjs.org/samples/2.6.0/utils.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src ="/js/cork_data_charts.js"></script>
    
<br>
</br>

<h2>Traffic Cameras</h2>
                   
        <center>                  
                <div class="section group">
                    <div id="containerA" class="col span_1_of_3" >
                     <!--   <div class="overview"> -->
                           <a href="http://www.jacklynchtunnel.ie/traffic-cameras"> <div id="02a1" height="100%">
                                    <table style="width:100%" bgcolor="#E5E5E5"  >
                                      <tr style="height:100px">
                                        <td style="width:60%"><div id="cam6"></div></td>
                                        
                                        <td style="width:60%">Jack Lynch Tunnel 1</td>
                                        </tr>
                                          
                                 
                                      </tr>
                                      
                                    </table>
                                 <!--   </div> -->
                               </a>
                            
                        </div> 
                    </div>
                    
                     <div id="containerA" class="col span_1_of_3" >
                        <!--   <div class="overview"> -->
                           <a href="http://www.jacklynchtunnel.ie/traffic-cameras"> <div id="02b1" height="100%">
                                    <table style="width:100%" bgcolor="#E5E5E5" >
                                      <tr style="height:100px">
                                          <td style="width:60%"><div id="cam137"></div></td>
                                            <td style="width:50%"><div id ="">Jack Lynch Tunnel 2</div></td>	
                                  
                                       
                                      </tr>
                                      
                                    </table>
                                    <!--   </div> -->
                               </a>
                            
                       </div> 
                    </div>
                    
                     <div id="containerA" class="col span_1_of_3" >
                          <!--   <div class="overview"> -->
                           <a href="http://www.jacklynchtunnel.ie/traffic-cameras"> <div id="01c1" height="100%">
                                    <table style="width:100%" bgcolor="#E5E5E5">
                                      <tr style="height:100px">
                                        <td style="width:60%"><div id="cam163"></div></td>
                                            <td style="width:50%"><div id ="">Dunkettle Interchange</div></td>
                                    
                                     </tr>
                                      
                                    </table>
                                    <!--   </div> -->
                               </a>
                            
                       </div> 
                    </div>
                                
                    
                  
	               </div>    
               </center>
                <!-- ##################################  created iframe from dublin_travel.ctp ###########################################  -->
    
              <h2>Real Time Car Parks and Bikes (View in <a href="http://149.157.67.17/pages/DublinTravel" target="_blank">full screen </a>)| Weather forecast via <a href="https://www.met.ie/forecasts/county.asp" target="_blank">Met Eireann</a></h2>
			 						
            <div style="border: 0px solid rgb(255, 255, 255); overflow: hidden; margin: 0px ; max-width:1500px;">
<iframe scrolling="no" src="http://149.157.67.17/pages/DublinTravel" style="border: 0px none; margin-left: -270px; margin-right: -60px; height: 1000px; margin-top: -460px; width: 1000px; float: left;">
</iframe>    	 						
            <div style="border: 0px solid rgb(255, 255, 255); overflow: hidden; margin: 0px ; max-width: 1000px;">
<iframe scrolling="no" src="https://www.met.ie/forecasts/county.asp" style="border: 0px none; margin-left: -180px; margin-right: -60px; height: 790px; margin-top: -250px; width: 1000px; float: left;">
</iframe>
</div>



<br>
</br>

 <h2>Indicators!</h2>
 
     <style>
    canvas{
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    .chart-container {
		width: 800px;
		margin-left: 20px;
		margin-right: 20px;
		margin-bottom: 20px;
	}
	.container {
		display: flex;
		flex-direction: row;
		flex-wrap: wrap;
		justify-content: center;
	}
    
    </style>


<body>
   
    <div class="container">
  <div class="row">
    <div class="col-xs-3">
      <canvas id="cork_carparks" width="200" height="200"></canvas>

    </div>
    <div class="col-xs-3">
      <canvas id="cork_house_prices" width="200" height="200"></canvas>
    </div>
    
     <div class="col-xs-3">
      <canvas id="cork_residential_rents" width="200" height="200"></canvas>
    
  </div>
   <div class="col-xs-3">
      <canvas id="airquality" style="width: 200px; height: 200px; margin: 0 auto; font-size:180%"></canvas>
      </div>
  </div>
  <canvas id="canvas"></canvas>
</div>
    
    
</body>    

<!-- Content -->
			<div id="content-wrapper">
				<div id="content">
					<div class="container">
						<div class="row">

							<div class="6u">

								<!-- Box #2 -->
									<section>
										<header>
											<h2>Latest News</h2>
											
										</header>
										<ul class="check-list">
										<li>SEE: New Reporting Tool <a href="https://www.yourcouncil.ie/"> 'Your Council' </a> added to the Cork Dashboard <a href="/pages/DublinReport">here</a></li>
										       <li>SEE: Latest <a href="chrome-extension://oemmndcbldboiebfnladdacbdfmadadm/https://www.corkchamber.ie/UserFiles/file/Q1%202017.pdf">Cork Economic Bulletin</a> Q1 2017</li>
										       <li>New: Explore Real-Time Transport and Environment data for Cork <a href="/pages/DublinRealtime">here</a></li>
										       <li>SEE: Latest Live register figures for Cork using the <a href="http://airo.maynoothuniversity.ie/external-content/live-register-office-monitoring-tool">Social Welfare Monitoring Tool</a></li>
										       <li>SEE: Latest <a href="http://data.corkcity.ie/dataset/planning-permission">Cork City Council Planning Applications </a></li>
										       <li>SEE: Q4 2016 Cork Economic Bulletin <a href="https://www.corkchamber.ie/UserFiles/file/February%20Final%20Economic%20Bulletin.pdf"> here</a></li>
	
										</ul>
									</section>

							</div>
							<div class="6u">
								
								<!-- Box #3 -->
								
								
								<section>
										<header>
											<h2>Connect with Cork Smart Gateway</h2>
					 						<div><a href="https://twitter.com/SmartCork"><img title="Twitter" src="/dublindashboard/img/Dashboard/icons/twitter.png" alt="Twitter" width="55" height="55" /></a> <a href="https://www.linkedin.com/groups/8460601/profile"><img title="LinkedIn" src="/dublindashboard/img/Dashboard/icons/linkedin.png" alt="Linkedin" width="55" height="55" /></a><a href="http://www.corksmartgateway.ie/"><img title="CorkSmartGateway" src="/dublindashboard/img/Dashboard/icons/CSG_icon.png" alt="CorkSmartGateway" width="55" height="55" /></a></div>
					 						
<a class="twitter-timeline" width="520"  height="500" href="https://twitter.com/CorkDashboard/lists/cork-dashboard">A Twitter List by CorkDashboard</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

</div>
							<div class="6u">
							
									</section>
									
			

			
                  
  <script>     
        function myFunction(){
        refreshCams();
            previousParking();
            previousM50North();
            getPreviousAirQuality();
            unemployment();
            employment();
            crimesTheft();
            crimesPublicOrder();
            waterLevels();
            soundLevels();
            weather();
            trolleys();
            housePricesSecond();
            housePrices();
            rents();
          
            
            
            setInterval("displaytime()", 1000);
              setInterval("refreshCams()", 300000);
            setInterval("previousParking()",60000);
            setInterval("previousM50North()",60000);
            setInterval("getPreviousAirQuality()",60000);
            setInterval("unemployment()",600000);
          
            
            setInterval("employment()",600000);
            setInterval("crimesTheft()",600000);
            setInterval("crimesPublicOrder()",600000);
            
            setInterval("waterLevels()",60000);
            setInterval("soundLevels()",60000);
            setInterval("housePrices()",600000);//10 mins
            setInterval("housePricesSecond()",600000);//10 mins
            setInterval("rents()", 600000);//10 mins
            setInterval("trolleys()",600000);
            setInterval("weather()",1200000);//20mins
 

           setInterval("m50South()",60000);
           setInterval("m50North()",60000);
           setInterval("airQuality()",60000);
      }
      
      function refreshCams() {
 	  	    
	    
	    var imgurl6 = "https://cdn.mtcc.ie/static/cctv/0267.jpg?"+ Math.random();
	    var imgurl163 = "https://cdn.mtcc.ie/static/cctv/0265.jpg?"+ Math.random();
	    var imgurl23 = "https://cdn.mtcc.ie/static/cctv/0266.jpg?"+ Math.random();
	    
	    
 	    
 	    document.getElementById("cam163").innerHTML="<img src="+imgurl163+" alt=\"cam\" style=\"width:100%\">"
 	    document.getElementById("cam137").innerHTML="<img src="+imgurl23+" alt=\"cam\" style=\"width:100%\">"
 	    document.getElementById("cam6").innerHTML="<img src="+imgurl6+" alt=\"cam\" style=\"width:100%\">"
 	    
	
	} 
   
      
           function populations(){
      
            
            $.get("/Overview/currentPopulation/1", function(point){ 
             
                values = JSON.parse(point);
                 pop1 = values[values.length-2][1]; //older
                pop2 = values [values.length-1][1]; //newest       
               
                 if(pop1<pop2){
                  document.getElementById("populationarrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                 }
                
                else if(pop2<pop1){
          
                document.getElementById("populationarrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                }
                                   
                 else {
                document.getElementById("populationarrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/no_change_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                }
                                   
                                   
                //inject into the div
                document.getElementById("population").innerHTML="Population of Dublin "+pop2;
                
                });
                
            
            
        }
      
        function unemployment(){
            $.get("/Overview/unemployment/1",  function(point){
                 
                 values = JSON.parse(point);
                 unem1 = values[values.length-2][1]; //older
                 unem2 = values [values.length-1][1]; //newest

                if(unem1<unem2){
                  document.getElementById("unemploymentarrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                 }
       
                else if(unem2<unem1){
                document.getElementById("unemploymentarrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                }
                 
                 else {
                document.getElementById("unemploymentarrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/no_change_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                }
                                                    
                //inject into the div
                document.getElementById("unemployment").innerHTML="Unemployed in Cork: "+unem2+"000";
                
                });
 
        }
        
           function employment(){
            $.get("/Overview/employment/1",  function(point){
                
                 values = JSON.parse(point);
                
                 em1 = values[values.length-2][1]; //older
                 em2 = values [values.length-1][1]; //newest

                if(em1<em2){
                  document.getElementById("employmentarrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                 }
       
                else if(em2<em1){
                document.getElementById("employmentarrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                }
                 
                 else {
                document.getElementById("employmentarrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/no_change_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                }
                                                    
                //inject into the div
                document.getElementById("employment").innerHTML="Employed in Cork: "+em2+"000";
                
                });
 
        }
        
        function crimesTheft(){
       
            $.get("/Overview/crimesTheft/1",  function(point){
                                  values = JSON.parse(point);
       
                 crimes1 = values[values.length-2][1]; //older
                 crimes2 = values [values.length-1][1]; //newest

                if(crimes1 <crimes2 ){
                  document.getElementById("crime1arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                 }
       
                else if(crimes2 <crimes1 ){
                document.getElementById("crime1arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                }
                 
                 else {
                document.getElementById("crime1arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/no_change_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                }
                                                    
                //inject into the div
                document.getElementById("crime1").innerHTML="Number of  Theft  &    Related    Offences in  Cork: "+crimes2 +"";
                
                });
 
        }
        
        
         
        function trolleys(){
      
            $.get("/Overview/trolleys/1",  function(point){
           
                values = JSON.parse(point);
          	 
                 trolleys1 = values[0]; //older
                 trolleys2 = values [1]; //newest

                if(trolleys1 <trolleys2 ){
                  document.getElementById("trolleyarrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                 }
       
                else if(trolleys2 <trolleys1 ){
                document.getElementById("trolleyarrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                }
                 
                 else {
                document.getElementById("trolleyarrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/no_change_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                }
                                                    
                //inject into the div
                document.getElementById("trolley").innerHTML="Number of people waitng on trolleys in Cork Hospitals: "+trolleys2 +"";
                
                });
 
        }
        
        
          function crimesPublicOrder(){
      
            $.get("/Overview/crimesPublicOrder/1",  function(point){
                                  values = JSON.parse(point);
            
                 crimes1 = values[values.length-2][1]; //older
                 crimes2 = values [values.length-1][1]; //newest

                if(crimes1 <crimes2 ){
                  document.getElementById("crime2arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                 }
       
                else if(crimes2 <crimes1 ){
                document.getElementById("crime2arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                }
                 
                 else {
                document.getElementById("crime2arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/no_change_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                }
                                                    
                //inject into the div
                document.getElementById("crime2").innerHTML="Number of Public Order & Social Code Offences in Cork: "+crimes2 +"";
                
                });
 
        }
      
      function housePrices(){
           $.get("/Overview/housing/1/2",  function(point){
                 
                 hvalues = JSON.parse(point);
                 prevPrice = hvalues[hvalues.length-2][1]; //older
                 currentPrice = hvalues [hvalues.length-1][1]; //newest
               
               
           if(prevPrice<currentPrice){
                  document.getElementById("houseprice1arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                 }
       
                else if(currentPrice<prevPrice){
                document.getElementById("houseprice1arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                }
                 
                 else {
                document.getElementById("houseprice1arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/no_change_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                }
                                                    
                //inject into the div
                document.getElementById("houseprice").innerHTML="Average cost of new-build house in Cork €"+currentPrice;
                
                });
    
      }
      
            function housePricesSecond(){
           $.get("/Overview/housing/1/3",  function(point){
                 
                 hvalues = JSON.parse(point);
                 prevPrice = hvalues[hvalues.length-2][1]; //older
                 currentPrice = hvalues [hvalues.length-1][1]; //newest
               
               
           if(prevPrice<currentPrice){
                  document.getElementById("houseprice2arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                 }
       
                else if(currentPrice<prevPrice){
                document.getElementById("houseprice2arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                }
                 
                 else {
                document.getElementById("houseprice2arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/no_change_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                }
                                                    
                //inject into the div
                document.getElementById("houseprice2").innerHTML="Average cost of pre-owned house in Cork €"+currentPrice;
                
                });
    
      }
      
      
           function rents(){
           $.get("/Overview/rents/1",  function(point){
                 
                 hvalues = JSON.parse(point);
                 prevPrice = hvalues[hvalues.length-2][1]; //older
                 currentPrice = hvalues [hvalues.length-1][1]; //newest
               
               
           if(prevPrice<currentPrice){
                  document.getElementById("rentarrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                 }
       
                else if(currentPrice<prevPrice){
                document.getElementById("rentarrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                }
                 
                 else {
                document.getElementById("rentarrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/no_change_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                }
                                                    
                //inject into the div
                document.getElementById("rent").innerHTML="Average monthly residential rent in Cork €"+currentPrice;
                
                });
    
      }
      
        function getPreviousAirQuality(){
            $.get("/CarParks/getPreviousAirQuality").done(function(point){
            obj = JSON.parse(point);
            var count = 6; //there are 6 results in the return
            for(var i=0;i<count;i++){
                if(obj.aqihsummary[i]["aqih-region"] =="Cork_City"){
                    oldAirQual = obj.aqihsummary[i].aqih;
                }
            } 
                 airQuality();
            })
         
          
        }
      
          function airQuality(){
              
            $.get("/CarParks/airQuality", function(point){
             
            obj = JSON.parse(point);
            var count = 6; //there are 6 results in the return
            for(var i=0;i<count;i++){
                if(obj.aqihsummary[i]["aqih-region"] =="Cork_City"){
                var airReport = "Current Air Quality Index for Health for "+obj.aqihsummary[i]["aqih-region"]+" is "+        obj.aqihsummary[i].aqih;
                     newAirQual = obj.aqihsummary[i].aqih;
                }
            }
                
                if(newAirQual == oldAirQual){
                      document.getElementById("airqualarrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/no_change_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">";       
          
                }
                
                else if(newAirQual.charAt(0)>oldAirQual.charAt(0)){ //decreasing
                        document.getElementById("airqualarrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">";
             
                        }
                        
                else if(newAirQual.charAt(0)<oldAirQual.charAt(0)){ //increasing
                        document.getElementById("airqualarrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">";
                    
                        }
                 document.getElementById("airqual").innerHTML=airReport;     
            });
        }
      
      
      
       function previousM50North(){          
            $.get("/CarParks/previousTravelTimes").done(function(point){
                obj = JSON.parse(point);
                var  previousNumberOfDataPoints = obj.M50_northBound.data.length; //number of junctions
                previousFullTravelTime = Math.round(obj.M50_northBound.data[(previousNumberOfDataPoints) -1].current_travel_time/60);
                var  previousFullFreeFlowTraveTime = Math.round(obj.M50_northBound.data[(previousNumberOfDataPoints) -1].free_flow_travel_time/60);
                
                var  previousSouthNumberOfDataPoints = obj.M50_southBound.data.length; //number of junctions
                  previousSouthFullTravelTime = Math.round(obj.M50_southBound.data[(previousSouthNumberOfDataPoints) -1].current_travel_time/60);
                
                var  previousSouthFullFreeFlowTraveTime = Math.round(obj.M50_southBound.data[(previousSouthNumberOfDataPoints) -1].free_flow_travel_time/60);
                
                m50North();
                });
        }
      
      
        function m50North(){          
            $.get("/CarParks/travelTimes", function(point){
                obj = JSON.parse(point);

                var  numberOfDataPoints = obj.M50_northBound.data.length; //number of junctions
                var  fullTravelTime = Math.round(obj.M50_northBound.data[(numberOfDataPoints) -1].current_travel_time/60);
                var  fullFreeFlowTraveTime = Math.round(obj.M50_northBound.data[(numberOfDataPoints) -1].free_flow_travel_time/60);
                
                var  southNumberOfDataPoints = obj.M50_southBound.data.length; //number of junctions
                var  southFullTravelTime = Math.round(obj.M50_southBound.data[(southNumberOfDataPoints) -1].current_travel_time/60);
                var  southFullFreeFlowTraveTime = Math.round(obj.M50_southBound.data[(southNumberOfDataPoints) -1].free_flow_travel_time/60);
                
              
                //North
                if(fullTravelTime == previousFullTravelTime){
                  document.getElementById("m50Northarrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/no_change_white.png\" alt=\"no_change_Arrow\" style=\"width:100%\">"
                }
                
                else if(fullTravelTime < previousFullTravelTime){
                         document.getElementById("m50Northarrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"down_Arrow\" style=\"width:100%\">"
                }
                
                
                else {
                          document.getElementById("m50Northarrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"up_Arrow\" style=\"width:100%\">"
                }
                
                //South
                if(southFullTravelTime == previousSouthFullTravelTime){
                  document.getElementById("m50Southarrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/no_change_white.png\" alt=\"no_change_Arrow\" style=\"width:100%\">"
                }
                
                else if(southFullTravelTime < previousSouthFullTravelTime){
                         document.getElementById("m50Southarrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"down_Arrow\" style=\"width:100%\">"
                }
                
                
                else {
                          document.getElementById("m50Southarrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"up_Arrow\" style=\"width:100%\">"
                }
                
                document.getElementById("m50North").innerHTML="Current Drive Time M50 North "+fullTravelTime+" minutes";
                document.getElementById("m50South").innerHTML="Current Drive Time M50 South "+southFullTravelTime+" minutes";
                });
        }
      
      
     
       /* function previousParking(){          
            $.get("/CarParks/totalParking/1.json").done(function(point){
                previousParking = point[0];
                currentParking = point[1];
              

                currentParking();
            });
        }*/
      
      function previousParking(){          
         //   $.get("/CarParks/totalParking/1").done(function(point2){
           //     currentParking = point2;
             $.get("/CarParks/totalParking/1.json").done(function(point){
                 
                 $obj = JSON.parse(point);
                 
                previousParking = $obj[1];
                currentParking = $obj[0];
              
                if(currentParking<previousParking){
                document.getElementById("carparkarrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"down_Arrow\" style=\"width:100%\">"
                }
                
                else if(currentParking>previousParking){
                document.getElementById("carparkarrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"up_Arrow\" style=\"width:100%\">"
                }
                
                else {
                document.getElementById("carparkarrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/no_change_white.png\" alt=\"no_change_Arrow\" style=\"width:100%\">"
                }
                
                
                document.getElementById("carpark").innerHTML="Current Parking Spaces in Cork "+currentParking ;
             
            });
        }
      
      
      function waterLevels(){
          
          
          
          $.get("/CarParks/hydroLevels", function(point){
                obj = JSON.parse(point);
              
                /*  $waterLevel[0] = "Broadmeadow";
                $waterLevel[1] = 53.475001;
                $waterLevel[2] = -6.231767; 
                $waterLevel[3] = $waterLevelA[sizeOf($waterLevelA)-2]; //current
                $waterLevel[4] = $waterLevelA[sizeOf($waterLevelA)-1]; //current
                $waterLevel[5] = $waterLevelA[sizeOf($waterLevelA)-10]; //previous hour
                $waterLevel[6] = $waterLevelA[sizeOf($waterLevelA)-9]; //previous hour
                  */
                var river0 = obj[0];
                var currentLevel0 = obj[4];
                var prevLevel0 = obj[6];
              
                var river1 = obj[14];
                var currentLevel1 = obj[18];
                var prevLevel1  = obj[20];
              
                var river2 = obj[28];
                var currentLevel2 = obj[32];
                var prevLevel2  = obj[34];
                  
                if(currentLevel0<prevLevel0){ //decrease
                   document.getElementById("river1arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"down_Arrow\" style=\"width:100%\">" 
                }
              
              else if(currentLevel0>prevLevel0){ //increase
                   document.getElementById("river1arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"up_Arrow\" style=\"width:100%\">" 
                }
              
              else{
                  document.getElementById("river1arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/no_change.png\" alt=\"no_change_Arrow\" style=\"width:100%\">" 
              }
                
              document.getElementById("river1").innerHTML="Water level at "+ river0 + " is "+currentLevel0 +"m		";
                      
              
              //river 2
                   if(currentLevel1<prevLevel1){ //decrease
                   document.getElementById("river2arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"down_Arrow\" style=\"width:100%\">" 
                }
              
              else if(currentLevel1>prevLevel1){ //increase
                   document.getElementById("river2arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"up_Arrow\" style=\"width:100%\">" 
                }
              
              else{
                  document.getElementById("river2arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/no_change.png\" alt=\"no_change_Arrow\" style=\"width:100%\">" 
              }
                
              document.getElementById("river2").innerHTML="Water level at "+ river1 + " is "+currentLevel1 +"m";
               
                                      
                        //river 3
                   if(currentLevel2<prevLevel2){ //decrease
                   document.getElementById("river3arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"down_Arrow\" style=\"width:100%\">" 
                }
              
              else if(currentLevel2>prevLevel2){ //increase
                   document.getElementById("river3arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"up_Arrow\" style=\"width:100%\">" 
                }
              
              else{
                  document.getElementById("river3arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/no_change.png\" alt=\"no_change_Arrow\" style=\"width:100%\">" 
              }
                
              document.getElementById("river3").innerHTML="Water  level  at  "+ river2 + "    (Dublin)   is   "+currentLevel2 +"m"
               
              
              
          });
      }
      
      
   
      //sound levels
      function weather(site){         
          
       $.get("/CarParks/weather/1", function(point){
                obj = JSON.parse(point);
             
                var lat = obj.current_observation.display_location.latitude;
                var lon = obj.current_observation.display_location.longitude;
                var name = obj.current_observation.observation_location.city;
                var currentTemp = obj.current_observation.temp_c;
                var currentWeather = obj.current_observation.weather;
                var url = obj.current_observation.ob_url;
                var icon = obj.current_observation.icon_url; 
                
		document.getElementById("weather1Icon").innerHTML="<img src=\""+icon+"\" alt=\"down_Arrow\" style=\"width:100%\">" 
		document.getElementById("weather1").innerHTML="Weather at "+name +" temp: "+currentTemp+" Celcius";  
       });
       
         $.get("/CarParks/weather/2", function(point){
                obj = JSON.parse(point);
             
                var lat = obj.current_observation.display_location.latitude;
                var lon = obj.current_observation.display_location.longitude;
                var name = obj.current_observation.observation_location.city;
                var currentTemp = obj.current_observation.temp_c;
                var currentWeather = obj.current_observation.weather;
                var url = obj.current_observation.ob_url;
                var icon = obj.current_observation.icon_url; 
                
		document.getElementById("weather2Icon").innerHTML="<img src=\""+icon+"\" alt=\"down_Arrow\" style=\"width:100%\">" 
		document.getElementById("weather2").innerHTML="Weather at "+name +" temp: "+currentTemp+" Celcius";  
       });
      
      }
      
      //sound levels
      function soundLevels(site){         
          
       $.get("/CarParks/ambientSound10", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                 var previousValue = obj.aleq[lastEntry-12];
                var previousTime = obj.times[lastEntry-12];
                var previousDate = obj.dates[lastEntry-12];
                var value = obj.aleq[lastEntry];
                var currentTime = obj.times[lastEntry];
                var currentDate = obj.dates[lastEntry];
                
   
           
           if(value<previousValue){ //decrease
                   document.getElementById("sound1arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"down_Arrow\" style=\"width:100%\">" 
                }
              
              else if(value>previousValue){ //increase
                   document.getElementById("sound1arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"up_Arrow\" style=\"width:100%\">" 
                }
              
              else{
                  document.getElementById("sound1arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/no_change.png\" alt=\"no_change_Arrow\" style=\"width:100%\">" 
              }
                
              document.getElementById("sound1").innerHTML="Sound level at Irishtown Stadium is "+value +"db";  
       });
          
          
       $.get("/CarParks/ambientSound11", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                var previousValue = obj.aleq[lastEntry-12];
                var previousTime = obj.times[lastEntry-12];
                var previousDate = obj.dates[lastEntry-12];
                var value = obj.aleq[lastEntry];
                var currentTime = obj.times[lastEntry];
                var currentDate = obj.dates[lastEntry];
                

           
           
           if(value<previousValue){ //decrease
                   document.getElementById("sound2arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"down_Arrow\" style=\"width:100%\">" 
                }
              
              else if(value>previousValue){ //increase
                   document.getElementById("sound2arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"up_Arrow\" style=\"width:100%\">" 
                }
              
              else{
                  document.getElementById("sound2arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/no_change.png\" alt=\"no_change_Arrow\" style=\"width:100%\">" 
              }
                
              document.getElementById("sound2").innerHTML="Sound  level at  Chancery Park (Dublin) is  "+value +"db";  
       });
          
        $.get("/CarParks/ambientSound12", function(point){
                obj = JSON.parse(point);
                var count = Number(obj.entries)
                var lastEntry = count-1;
                 var previousValue = obj.aleq[lastEntry-12];
                var previousTime = obj.times[lastEntry-12];
                var previousDate = obj.dates[lastEntry-12];
                var value = obj.aleq[lastEntry];
                var currentTime = obj.times[lastEntry];
                var currentDate = obj.dates[lastEntry];
                
 
           
           
           if(value<previousValue){ //decrease
                   document.getElementById("sound3arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"down_Arrow\" style=\"width:100%\">" 
                }
              
              else if(value>previousValue){ //increase
                   document.getElementById("sound3arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"up_Arrow\" style=\"width:100%\">" 
                }
              
              else{
                  document.getElementById("sound3arrow").innerHTML="<img src=\"/dublindashboard/img/Dashboard/no_change.png\" alt=\"no_change_Arrow\" style=\"width:100%\">" 
              }
                
              document.getElementById("sound3").innerHTML="Sound level at Blessington Street Basin is "+value +"db";  
       });
             
      }
        </script> 
                            
              
            

            

				
	
</body>		
	
						
                                        
                                        
						
					</div>
				</div>
			</div>

		<!--		<!-- Footer -->
			<div id="footer-wrapper">
                
				<footer id="footer" class="container">

							
					<div class="row">
			
 
                        
            
	<?php echo $this->element('dbFooter'); 
     echo $this->Js->writeBuffer();   
?>
						
						
                          
                        
                        
                        
					</div>
				</footer>
			</div>
		<?php echo $this->element('googleAnalytics'); ?>
		<!-- Copyright -->
			<div id="copyright">
				<?php echo $this->element('copyright'); ?>
			</div>

	</body>
</html>
                                                            
                            
                                                            
                            
                            
                            
                                                            
                            
                            
                                                           
                            