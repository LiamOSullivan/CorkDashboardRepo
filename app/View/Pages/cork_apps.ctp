                                                                                                                                                                                                                                                                                                <!DOCTYPE HTML>
<!--
	Halcyonic 3.1 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
	<title>CorkDashboard Cork Apps</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Provides a list of android and iOs apps relevant to Cork" />
		<meta name="keywords" content="Corkdashboard,Cork,Dashboard,apps, Travel, Environment, Bikes, Air, Traffic, Tides" />
		<script src="/dublindashboard/js/Dashboard/jquery.min.js"></script>
		<!-- <script src="/dublindashboard/js/Dashboard/config.js"></script> -->
		
		<script src="/dublindashboard/js/Dashboard/skel.min.js"></script>
		<!-- <script src="/dublindashboard/js/Dashboard/skel-panels.min.js"></script> -->
		<script src="/dublindashboard/js/Dashboard/skel-layers.min.js"></script> 
		<script src="/dublindashboard/js/Dashboard/init.js"></script> 
         
		<noscript>
			<link rel="stylesheet" href="/dublindashboard/css/Dashboard/skel.css" />
			<link rel="stylesheet" href="/dublindashboard/css/Dashboard/style.css" />
			<link rel="stylesheet" href="/dublindashboard/css/Dashboard/style-desktop.css" />

		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="/dublindashboard/css/Dashboard/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="/dublindashboard/js/Dashboard/html5shiv.js"></script><![endif]-->
		<?php  echo $this->Html->script('jquery.min.js'); ?>
         <!-- Stylesheets -->
	<?php echo $this->Html->css('3cols'); ?>
	<?php echo $this->Html->css('2cols'); ?>
	<?php echo $this->Html->css('4cols'); ?>
        <?php echo $this->Html->css('6cols'); ?>
	<?php echo $this->Html->css('col'); ?>

	<?php echo $this->Html->css('responsivegridsystem2'); ?> 
        <?php echo $this->Html->css('tabs'); ?> 
        <?php echo $this->fetch('content');?>
     
     <style type="text/css">

	/*  THIS IS JUST TO GET THE GRID TO SHOW UP.  YOU DONT NEED THIS IN YOUR CODE */

	#maincontent .col {
		background: #ccc;
		background: rgba(255,255,255, 0.3);

	}

	</style>
	
           
	</head>
	<body >

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
							<div class="10u important(collapse)">
								
								<!-- Main Content -->
									<section>
									<header>
											<h2>Home - Cork Apps</h2>
											
											<h3>Cork Mobile Applications</h3>
										</header>
					<div id="headcontainer">
                    <header>
               
                    
                </div>
                <div id="maincontentcontainer">
                   
        
 
                     <div class="section group">
   
                            
                            
                        
                   
                     <div class="col span_1_of_4">
                          <center>
                                     <div id ="containerGG">
                       <div class="upper">
                              <table style="width:100%" border="1"  >
                              <tr align="center">
                                        <td style="width:100%"><div id="corkPark"> Cork Park by Phone</div> 
                                        </tr>
                                        <td style="width:100%"><div id="dublinbus"><img width="100%" src="/dublindashboard/img/Dashboard/cork_icons/Cork_City_Park_by_Phone.png" alt="db"></div>
                                       <table style="width:100%"  >
                                      <tr >
                                        <td style="width:50%"><div id="android"><a href="https://play.google.com/store/apps/details?id=com.parkmagic.corkpark"  target="_blank"> <img width="100%" src="/dublindashboard/img/Dashboard/icons/google_play_logo.png"></a></div></td>
                                  	<td style="width:50%"><div id="apple"><a href="https://appsto.re/ie/wVuOab.i"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/apple-store-logo.png"></a></div></td>
                                      </tr>
                                      </table>
                                      </td>
                                       
                                     
                                      
                                    </table>
                                         </div>
                  
                    </div>
                            </center>
                            </div>
                        <div class="col span_1_of_4">
                            <center>
                                 <div id ="containerGG">
                       <div class="upper">
        
                                <table style="width:100%" border="1"  >
                                          <tr align="center">
                                        <td style="width:100%"><div id="journeyPlannerText"> Journey Planner </div> 
                                        </tr>
                                        <td style="width:100%"><div id="journeyPlanner"><img width="100%" src="/dublindashboard/img/Dashboard/icons/app_transport.png" alt="db"></div>
                                       <table style="width:100%"  >
                                      <tr >
                                        <td style="width:50%"><div id="android"><a href="https://play.google.com/store/apps/details?id=com.mdv.IrelandCompanion"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/google_play_logo.png"></a></div></td>
                                  	     	<td style="width:50%"><div id="apple"><a href="https://itunes.apple.com/ie/app/journey-plan/id538331603?mt=8"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/apple-store-logo.png"></a></div></td>
                                      </tr>
                                      </table>
                                      </td>
                                       
                                     
                                      
                                    </table>
                                      </td>
                                       
                                     
                                      
                                    </table>

                              </div>
                
                    </div>
                                    
                            
                            </center>
                                
                            </div>
                                   <div class="col span_1_of_4">
                            <center>
                                 <div id ="containerGG">
                       <div class="upper">
        
                                      
                                      <table style="width:100%" border="1"  >
                                          <tr align="center">
                                        <td style="width:100%"><div id="irishrailtext"> Irish Rail </div> 
                                        </tr>
                                        <td style="width:100%"><div id="irishrail"><img width="100%" src="/dublindashboard/img/Dashboard/icons/app_irish_rail.png" alt="db"></div>
                                       <table style="width:100%"  >
                                      <tr >
                                        <td style="width:50%"><div id="android"><a href="https://play.google.com/store/apps/details?id=de.hafas.android.irishrail"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/google_play_logo.png"></a></div></td>
                                  	<td style="width:50%"><div id="apple"><a href="https://itunes.apple.com/ie/app/iarnrod-eireann-irish-rail/id588339413?mt=8"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/apple-store-logo.png"></a></div></td>
                                      </tr>
                                      </table>
                                      </td>
                                       
                                     
                                      
                                    </table>
                                      </td>
                                       
                                     
                                      
                                    </table>

                              </div>
                
                    </div>
                                    
                            
                            </center>
                                
                            </div>
                            
                             
                            
                             <div class="col span_1_of_4">
                          <center>
                                     <div id ="containerGG">
                       <div class="upper">
                               <table style="width:100%" border="1"  >
                                          <tr align="center">
                                        <td style="width:100%"><div id="dublinairportText"> Cork Airport </div> 
                                        </tr>
                                        <td style="width:100%"><div id="corkairport"><img width="100%" src="/dublindashboard/img/Dashboard/cork_icons/Cork_Airport.png" alt="db"></div>
                                       <table style="width:100%"  >
                                      <tr >
                                        <td style="width:50%"><div id="android"><a href="https://play.google.com/store/apps/details?id=com.cork"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/google_play_logo.png"></a></div></td>
                                  	<td style="width:50%"><div id="apple"><a href="https://appsto.re/ie/ZWFpU.i"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/apple-store-logo.png"></a></div></td>
                                      </tr>
                                      </table>
                                      </td>
                                       
                                     
                                      
                                    </table>
                                         </div>
                  
                    </div>
                            </center>
                            </div>
           
                            
                            
                              <div class="section group">
   
                              <div class="col span_1_of_4">
                          <center>
                                     <div id ="containerGG">
                       <div class="upper">
                               
                                     <table style="width:100%" border="1"  >
                                          <tr align="center">
                                        <td style="width:100%"><div id="cyclePlannerText"> Cycle Planner </div> 
                                        </tr>
                                        <td style="width:100%"><div id="cyclePlanner"><img width="100%" src="/dublindashboard/img/Dashboard/icons/app_cycle.png" alt="db"></div>
                                       <table style="width:100%"  >
                                      <tr >
                                        <td style="width:50%"><div id="android"><a href="https://play.google.com/store/apps/details?id=com.mdv.IrelandCyclePlanner"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/google_play_logo.png"></a></div></td>
                                  	                                  	<td style="width:50%"><div id="apple"><a href="https://itunes.apple.com/ie/app/cycle-planner/id783631654?mt=8"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/apple-store-logo.png"></a></div></td>
                                      </tr>
                                     </div></td>
                                      </table>
                                     
                                       
                                     
                                      
                                    </table>
                                        
                                   
                                         </div>
                  
                    </div>
                            </center>
                            </div>
                        
                                   <div class="col span_1_of_4">
                            <center>
                                 <div id ="containerGG">
                       <div class="upper">
        
    
                                           <table style="width:100%" border="1"  >
                                          <tr align="center">
                                        <td style="width:100%"><div id="corkbikes"> Cork Bikes </div> 
                                        </tr>
                                        <td style="width:100%"><div id="corkbikes"><img width="100%" src="/dublindashboard/img/Dashboard/icons/Coca_Cola_Bikes_Cork.png" alt="db"></div>
                                       <table style="width:100%"  >
                                      <tr >
                                        <td style="width:50%"><div id="android"><a href="https://play.google.com/store/apps/details?id=com.rbsapp.ie"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/google_play_logo.png"></a></div></td>
                                  	     	<td style="width:50%"><div id="apple"><a href="https://appsto.re/ie/3eT61.i"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/apple-store-logo.png"></a></div></td>
                                      </tr>
                                     </div></td>
                                      </table>
                                  
                                            
                                      
                                    </table>

                              </div>
                
                    </div>
                                    
                            
                            </center>
                                
                            </div>
                            
                           
                            
                        
                      <div class="col span_1_of_4">
                            <center>
                  
                                 <div id ="containerGG">
                       <div class="upper">
        
                                <table style="width:100%" border="1"  >
                                          <tr align="center">
                                        <td style="width:100%"><div id="corktaxi"> Cork Taxi</div> 
                                        </tr>
                                        <td style="width:100%"><div id="corktaxi"><img width="100%" src="/dublindashboard/img/Dashboard/cork_icons/Cork_TaxiCoop.png" alt="db"></div>
                                       <table style="width:100%"  >
                                      <tr >
                                        <td style="width:50%"><div id="android"><a href="https://play.google.com/store/apps/details?id=com.icabbi.corktaxicoop"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/google_play_logo.png"></a></div></td>
                                        <td style="width:100%"><div id="apple"><a href="https://appsto.re/ie/qHE6Q.i"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/apple-store-logo.png"></a></div></td>
                                      </tr>
                                      </table>
                                      </td>
                                       
                                     
                                      
                                    </table>
                                    
                                    
                                      </td>
                                       
                                     
                                      
                                    </table>
                         

                              </div>
                
                    </div>
                                    
                            
                            </center>
                                
                        </div> 


<div class="col span_1_of_4">
                            <center>
                                 <div id ="containerGG">
                       <div class="upper">
        
                                <table style="width:100%" border="1"  >
                                          <tr align="center">
                                        <td style="width:100%"><div id="corkmaps"> Cork Maps </div> 
                                        </tr>
                                        <td style="width:100%"><div id="corkmaps"><img width="100%" src="/dublindashboard/img/Dashboard/cork_icons/Cork_Map_Offline.png" alt="db"></div>
                                       <table style="width:100%"  >
                                      <tr >
                                        <td style="width:50%"><div id="android"><a href="https://play.google.com/store/apps/details?id=com.mobomap.appid1174"  target="_blank"><img width="50%" src="/dublindashboard/img/Dashboard/icons/google_play_logo.png"></a></div></td>
                                  	     	
                                      </tr>
                                      </table>
                                      </td>
                                       
                                     
                                      
                                    </table>
                                    
                                    
                                      </td>
                                       
                                     
                                      
                                    </table>
                         

                              </div>
                
                    </div>
                                    
                            
                            </center>
                                
                            </div>
 </div>


 <div class="section group">

<div class="col span_1_of_4">
                            <center>
                                 <div id ="containerGG">
                       <div class="upper">
        
                                <table style="width:100%" border="1"  >
                                          <tr align="center">
                                        <td style="width:100%"><div id="corkcitynow"> Cork City Now </div> 
                                        </tr>
                                        <td style="width:100%"><div id="luas"><img width="100%" src="/dublindashboard/img/Dashboard/cork_icons/Cork_City_Now.png" alt="db"></div>
                                       <table style="width:100%"  >
                                      <tr >
                                        <td style="width:50%"><div id="android"><a href="https://play.google.com/store/apps/details?id=com.ums.corkcity.notification"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/google_play_logo.png"></a></div></td>
                                  	<td style="width:50%"><div id="apple"><a href="https://appsto.re/ie/iRUWfb.i"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/apple-store-logo.png"></a></div></td>
                                      </tr>
                                      </table>
                                      </td>
                                       
                                     
                                      
                                    </table>

                              </div>
                
                    </div>
                                    
                            
                            </center>
                                
                            </div>

 
                  
    
     <div class="col span_1_of_4">
                            <center>
                                 <div id ="containerGG">
                       <div class="upper">
        
                                <table style="width:100%" border="1"  >
                                          <tr align="center">
                                        <td style="width:100%"><div id="corkpocketguide"> Cork Pocket Guide </div> 
                                        </tr>
                                        <td style="width:100%"><div id="corkpocketguide"><img width="100%" src="/dublindashboard/img/Dashboard/cork_icons/PocketGuide_Cork.png" alt="db"></div>
                                       <table style="width:100%"  >
                                      <tr >
                                        <td style="width:50%"><div id="android"><a href="https://play.google.com/store/apps/details?id=hu.pocketguide.bundle.Cork_lite"  target="_blank"><img width="50%" src="/dublindashboard/img/Dashboard/icons/google_play_logo.png"></a></div></td>
                                     </tr>
                                      </table>
                                      </td>
                                       
                                     
                                      
                                    </table>

                              </div>
                
                    </div>
                                    
                            
                            </center>
                                
                            </div>    
                            
                    <div class="col span_1_of_4">
                            <center>
                                 <div id ="containerGG">
                       <div class="upper">
        
        
                                <table style="width:100%" border="1"  >
                                          <tr align="center">
                                        <td style="width:100%"><div id="corkcity"> Cork City </div> 
                                        </tr>
                                        <td style="width:100%"><div id="corkcity"><img width="100%" src="/dublindashboard/img/Dashboard/cork_icons/Cork_City.png" alt="db"></div>
                                       <table style="width:100%"  >
                                      <tr >
                                        <td style="width:50%"><div id="android"><a href="https://play.google.com/store/apps/details?id=com.cityinformation.cork.android"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/google_play_logo.png"></a></div></td>
                        	     	<td style="width:50%"><div id="apple"><a href="https://appsto.re/ie/f1XW8.i "  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/apple-store-logo.png"></a></div></td>
                                      </tr>
                                      </table>
                                      </td>
                                       
                                     
                                      
                                    </table>

                              </div>
                
                    </div>
                                    
                            
                            </center>
                                
                            </div>
                            

			<div class="col span_1_of_4">
                            <center>
                                 <div id ="containerGG">
                       <div class="upper">
        
                                    
                                        <table style="width:100%" border="1"  >
                                          <tr align="center">
                                        <td style="width:100%"><div id="corkcityguide"> Cork City Guide </div> 
                                        </tr>
                                        <td style="width:100%"><div id="corkcityguide"><img width="100%" src="/dublindashboard/img/Dashboard/cork_icons/Cork_City_Guide.png" alt="db"></div>
                                       <table style="width:100%"  >
                                      <tr >
                                        <td style="width:50%"><div id="android"><a href="https://play.google.com/store/apps/details?id=ssgroup.cork.cityguide"  target="_blank"><img width="50%" src="/dublindashboard/img/Dashboard/icons/google_play_logo.png"></a></div></td>                          	
                                      </tr>
                                      </table>
                                      </td>
                                       
                                      
                                    </table>

                              </div>
                
                    </div>
                                    
                            
                            </center>
                                
                            </div>
                            
                            <div class="section group">

 <div class="col span_1_of_4">
                            <center>
                                 <div id ="containerGG">
                       <div class="upper">
        
                                <table style="width:100%" border="1"  >
                                          <tr align="center">
                                        <td style="width:100%"><div id="westcorkguide"> West Cork Guide </div> 
                                        </tr>
                                        <td style="width:100%"><div id="westcorkguide"><img width="100%" src="/dublindashboard/img/Dashboard/cork_icons/Cork_Unofficial_Guide.png" alt="db"></div>
                                       <table style="width:100%"  >
                                      <tr >
                                  	     	<td style="width:50%"><div id="apple"><a href="https://itunes.apple.com/ie/app/cork-the-unofficial-guide/id622082653?mt=8"  target="_blank"><img width="50%" src="/dublindashboard/img/Dashboard/icons/apple-store-logo.png"></a></div></td>
                                      </tr>
                                      </table>
                                      </td>
                                       
                                     
                                      
                                    </table>
                                    
                                    
                                      </td>
                                       
                                     
                                      
                                    </table>
                         

                              </div>
                
                    </div>
                                    
                            
                            </center>
                                
                            </div>
    
    
     <div class="col span_1_of_4">
                            <center>
                                 <div id ="containerGG">
                       <div class="upper">
        
                                <table style="width:100%" border="1"  >
                                          <tr align="center">
                                        <td style="width:100%"><div id="explorewestcork"> Explore West Cork </div> 
                                        </tr>
                                        <td style="width:100%"><div id="explorewestcork"><img width="100%" src="/dublindashboard/img/Dashboard/cork_icons/Explore_WestCork.png" alt="db"></div>
                                       <table style="width:100%"  >
                                      <tr >
                                        <td style="width:50%"><div id="android"><a href="https://play.google.com/store/apps/details?id=com.cellcode.explorewestcork"  target="_blank"><img width="50%" src="/dublindashboard/img/Dashboard/icons/google_play_logo.png"></a></div></td>
                                      </tr>
                                      </table>
                                      </td>
                                       
                                     
                                      
                                    </table>
                                    
                                    
                                      </td>
                                       
                                     
                                      
                                    </table>
                         

                              </div>
                
                    </div>
                                    
                            
                            </center>
                                
    
</div>

           
    <div class="col span_1_of_4">
                            <center>
                                 <div id ="containerGG">
                       <div class="upper">
        
                                <table style="width:100%" border="1"  >
                                          <tr align="center">
                                        <td style="width:100%"><div id="spikeisland"> Spike Island </div> 
                                        </tr>
                                        <td style="width:100%"><div id="spikeisland"><img width="100%" src="/dublindashboard/img/Dashboard/cork_icons/Cork_Spike_Island.png" alt="db"></div>
                                       <table style="width:100%"  >
                                      <tr >
                                        <td style="width:50%"><div id="android"><a href="https://play.google.com/store/apps/details?id=com.ionicframework.spikeisland929019"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/google_play_logo.png"></a></div></td>
                                  	     	<td style="width:50%"><div id="apple"><a href="https://appsto.re/ie/WGSocb.i"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/apple-store-logo.png"></a></div></td>
                                      </tr>
                                      </table>
                                      </td>
                                       
                                     
                                      
                                    </table>
                                    
                                    
                                      </td>
                                       
                                     
                                      
                                    </table>
                         

                              </div>
                
                    </div>
                                    
                            
                            </center>
                                
                            </div>
                            
                            <div class="col span_1_of_4">
                          <center>
                                     <div id ="containerGG">
                       <div class="upper">
                            
                       
                                      
                                       <table style="width:100%" border="1"  >
                                          <tr align="center">
                                        <td style="width:100%"><div id="discovercork"> Discovering Cork </div> 
                                        </tr>
                                        <td style="width:100%"><div id="discovercork"><img width="100%" src="/dublindashboard/img/Dashboard/cork_icons/Discovering_Cork.png" alt="db"></div>
                                       <table style="width:100%"  >
                                      <tr >
                                        <td style="width:50%"><div id="android"><a href="https://play.google.com/store/apps/details?id=mobi.travelbuddy.travelbuddy.discovercork"  target="_blank"><img width="50%" src="/dublindashboard/img/Dashboard/icons/google_play_logo.png"></a></div></td>      	                                  	
                                      </tr>
                                     </div></td>
                                      </table>
                                      </td>
                                       
                                      
                                    </table>
                                    
                              </div> 
                                         
                                    </div>
                           
                                    </center>
                                
                            </div>
                            <div class="section group">

 <div class="col span_1_of_4">
                            <center>
                                 <div id ="containerGG">
                       <div class="upper">
        
                                <table style="width:100%" border="1"  >
                                          <tr align="center">
                                        <td style="width:100%"><div id="youghal"> Youghal App</div> 
                                        </tr>
                                        <td style="width:100%"><div id="youghal"><img width="100%" src="/dublindashboard/img/Dashboard/cork_icons/Youghal_App.png" alt="db"></div>
                                       <table style="width:100%"  >
                                      <tr >
                                      <td style="width:50%"><div id="android"><a href="https://play.google.com/store/apps/details?id=com.navigatour.youghal"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/google_play_logo.png"></a></div></td>
                                  	     	<td style="width:100%"><div id="apple"><a href="https://appsto.re/ie/6qOpJ.i"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/apple-store-logo.png"></a></div></td>
                                      </tr>
                                      </table>
                                      </td>
                                       
                                     
                                      
                                    </table>
                                    
                                    
                                      </td>
                                       
                                     
                                      
                                    </table>
                         

                              </div>
                
                    </div>
                                    
                            
                            </center>
                                
                            </div>
                            
                             <div class="col span_1_of_4">
                            <center>
                                 <div id ="containerGG">
                       <div class="upper">
        
                                <table style="width:100%" border="1"  >
                                          <tr align="center">
                                        <td style="width:100%"><div id="corktides"> Cork Tides </div> 
                                        </tr>
                                        <td style="width:100%"><div id="corktides"><img width="100%" src="/dublindashboard/img/Dashboard/cork_icons/Cork_Tides.png" alt="db"></div>
                                       <table style="width:100%"  >
                                      <tr >
                                        <td style="width:50%"><div id="android"><a href="https://play.google.com/store/apps/details?id=com.apptoonz.dublintides2015"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/google_play_logo.png"></a></div></td>
                                  	     	<td style="width:50%"><div id="apple"><a href="https://itunes.apple.com/ie/app/dublin-2015/id930798779?mt=8"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/apple-store-logo.png"></a></div></td>
                                      </tr>
                                      </table>
                                      </td>
                                       
                                     
                                      
                                    </table>
                                    
                                    
                                      </td>
                                       
                                     
                                      
                                    </table>
                         

                              </div>
                
                    </div>
                                    
                            
                            </center>
                                
                            </div>

<div class="col span_1_of_4">
                            <center>
                                 <div id ="containerGG">
                       <div class="upper">
        
                                <table style="width:100%" border="1"  >
                                          <tr align="center">
                                        <td style="width:100%"><div id="corkarts"> Cork Arts Theatre</div> 
                                        </tr>
                                        <td style="width:100%"><div id="corkarts"><img width="100%" src="/dublindashboard/img/Dashboard/cork_icons/Cork_Arts_Theatre.png" alt="db"></div>
                                       <table style="width:100%"  >
                                      <tr >
                                      <td style="width:50%"><div id="android"><a href="https://play.google.com/store/apps/details?id=com.my_theatre.cork"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/google_play_logo.png"></a></div></td>
                                  	     	<td style="width:100%"><div id="apple"><a href="https://appsto.re/ie/ZOIg-.i"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/apple-store-logo.png"></a></div></td>
                                      </tr>
                                      </table>
                                      </td>
                                       
                                     
                                      
                                    </table>
                                    
                                    
                                      </td>
                                       
                                     
                                      
                                    </table>
                         

                              </div>
                
                    </div>
                                    
                            
                            </center>
                                
                            </div>
      <div class="col span_1_of_4">
                            <center>
                                 <div id ="containerGG">
                       <div class="upper">
        
                                <table style="width:100%" border="1"  >
                                          <tr align="center">
                                        <td style="width:100%"><div id="corkoperahouse"> Cork Opera House </div> 
                                        </tr>
                                        <td style="width:100%"><div id="corkoperahouse"><img width="100%" src="/dublindashboard/img/Dashboard/cork_icons/CorkOperaHouse.png" alt="db"></div>
                                       <table style="width:100%"  >
                                      <tr >
                                        <td style="width:50%"><div id="android"><a href="https://play.google.com/store/apps/details?id=com.my_theatre.corkoh"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/google_play_logo.png"></a></div></td>
                                  	     	<td style="width:50%"><div id="apple"><a href="https://appsto.re/ie/Zl7N-.i"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/apple-store-logo.png"></a></div></td>
                                      </tr>
                                      </table>
                                      </td>
                                       
                                     
                                      
                                    </table>
                      
				 </div>
				 
                              </div>
                              
                            </center>
                
                    </div>
    
   
       <div class="section group">
                      
                 
                                   <div class="col span_1_of_4">
                            <center>
                                 <div id ="containerGG">
                       <div class="upper">
        
                                <table style="width:100%" border="1"  >
                                          <tr align="center">
                                        <td style="width:100%"><div id="CorkCountyLibraries"> Cork County Libraries </div> 
                                        </tr>
                                        <td style="width:100%"><div id="CorkCountyLibraries"><img width="100%" src="/dublindashboard/img/Dashboard/cork_icons/Cork_County_Library.png" alt="db"></div>
                                       <table style="width:100%"  >
                                      <tr >
                                        <td style="width:50%"><div id="android"><a href="https://play.google.com/store/apps/details?id=uk.co.solus.corkcounty"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/google_play_logo.png"></a></div></td>
                                  	<td style="width:50%"><div id="apple"><a href="https://appsto.re/ie/wnjX3.i"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/apple-store-logo.png"></a></div></td>
                                      </tr>
                                      </table>
                                      </td>
                                       
                                     
                                      
                                    </table>
                                      </td>
                                       
                                     
                                      
                                    </table>

                              </div>
                
                    </div>
                                    
                            
                            </center>
                                
                            </div>
                            
                             <div class="col span_1_of_4">
                            <center>
                                 <div id ="containerGG">
                       <div class="upper">
        
                                        <table style="width:100%" border="1"  >
                                          <tr align="center">
                                        <td style="width:100%"><div id="CorkPlanning"> Cork County Planning</div> 
                                        </tr>
                                        <td style="width:100%"><div id="CorkPlanning"><img width="100%" src="/dublindashboard/img/Dashboard/cork_icons/Cork_County_Planning_Enquiry_System.png" alt="db"></div>
                                       <table style="width:100%"  >
                                      <tr >
                                        <td style="width:50%"><div id="android"><a href="https://play.google.com/store/apps/details?id=ie.corkcoco.pl.mobile.planningviewer"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/google_play_logo.png"></a></div></td>
                                  	<td style="width:50%"><div id="apple"><a href="https://appsto.re/ie/Q68r4.i"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/apple-store-logo.png"></a></div></td>
                                      </tr>
                                      </table>
                               
                                      </td>
                                       
                                     
                                      
                                    </table>

                              </div>
                
                    </div>
                                    
                            
                            </center>
                                
                            </div>
                            
                             <div class="col span_1_of_4">
                            <center>
                                 <div id ="containerGG">
                       <div class="upper">
        
                                        <table style="width:100%" border="1"  >
                                          <tr align="center">
                                        <td style="width:100%"><div id="CorkCityLibraries"> Cork City Libraries </div> 
                                        </tr>
                                        <td style="width:100%"><div id="CorkCityLibraries"><img width="100%" src="/dublindashboard/img/Dashboard/cork_icons/CorkCity_Libraries.png" alt="db"></div>
                                       <table style="width:100%"  >
                                      <tr >
                                        <td style="width:50%"><div id="android"><a href="https://play.google.com/store/apps/details?id=uk.co.solus.corkcity"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/google_play_logo.png"></a></div></td>
                                  	<td style="width:50%"><div id="apple"><a href="https://appsto.re/ie/F10K1.i"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/apple-store-logo.png"></a></div></td>
                                      </tr>
                                      </table>
                               
                                      </td>
                                       
                                     
                                      
                                    </table>

                              </div>
                
                    </div>
                                    
                            
                            </center>
                                
                            </div>
                            
                             <div class="col span_1_of_4">
                            <center>
                                 <div id ="containerGG">
                       <div class="upper">
        
                                <table style="width:100%" border="1"  >
                                          <tr align="center">
                                        <td style="width:100%"><div id="mapAlerterText"> Map Alerter </div> 
                                        </tr>
                                        <td style="width:100%"><div id="mapAlerter"><img width="100%" src="/dublindashboard/img/Dashboard/cork_icons/Cork_map_alerter.png" alt="db"></div>
                                       <table style="width:100%"  >
                                      <tr >
                                        <td style="width:50%"><div id="android"><a href="https://play.google.com/store/apps/details?id=com.mapalerter"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/google_play_logo.png"></a></div></td>
                                  	     	<td style="width:50%"><div id="apple"><a href="https://itunes.apple.com/ie/app/mapalerter/id732814462?mt=8"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/apple-store-logo.png"></a></div></td>
                                      </tr>
                                      </table>
                                      </td>
                                       
                                     
                                      
                                    </table>
                                    
                                    
                                      </td>
                                       
                                     
                                      
                                    </table>
                         

                              </div>
                
                    </div>
                                    
                            
                            </center>
                                
                            </div>
                                                    
                                  
                            
                                        
                           
 <div class="section group">

                                
                                         
                            

 <div class="col span_1_of_4">
                            <center>
                                 <div id ="containerGG">
                       <div class="upper">
        
                                <table style="width:100%" border="1"  >
                                          <tr align="center">
                                        <td style="width:100%"><div id="fixYourSteetText"> Fix Your Street </div> 
                                        </tr>
                                        <td style="width:100%"><div id="fixYourStreet"><img width="100%" src="/dublindashboard/img/Dashboard/icons/app_fix_your_street.png" alt="db"></div>
                                       <table style="width:100%"  >
                                      <tr >
                                        <td style="width:50%"><div id="android"><a href="https://play.google.com/store/apps/details?id=ie.sdcc.mobile.fms"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/google_play_logo.png"></a></div></td>
                                          <td style="width:50%"><div id="apple"></div></td>
                                  	     
                                      </tr>
                                      </table>
                                      </td>
                                       
                                     
                                      
                                    </table>
                                    
                                    
                                      </td>
                                       
                                     
                                      
                                    </table>
                         

                              </div>
                
                    </div>
                                    
                            
                            </center>
                                
                            </div>


                            

         

    
    
     <div class="col span_1_of_4">
                            <center>
                                 <div id ="containerGG">
                       <div class="upper">
        
                                <table style="width:100%" border="1"  >
                                          <tr align="center">
                                        <td style="width:100%"><div id="Corkuniversityhospital"> Cork Hospital</div> 
                                        </tr>
                                        <td style="width:100%"><div id="Corkuniversityhospital"><img width="100%" src="/dublindashboard/img/Dashboard/cork_icons/Cork_University_Hospital.png" alt="db"></div>
                                       <table style="width:100%"  >
                                      <tr >
                                        <td style="width:50%"><div id="android"><a href="https://play.google.com/store/apps/details?id=com.maithu.cuh_icu_guidelines"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/google_play_logo.png"></a></div></td>
                                        <td style="width:100%"><div id="apple"><a href="https://appsto.re/ie/a37--.i"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/apple-store-logo.png"></a></div></td>
                                      </tr>
                                      </table>
                                      </td>
                                       
                                     
                                      
                                    </table>
                                    
                                    
                                      </td>
                                       
                                     
                                      
                                    </table>
                         

                              </div>
                
                    </div>
                                    
                            
                            </center>
                                
    
</div>

           
    <div class="col span_1_of_4">
                            <center>
                                 <div id ="containerGG">
                       <div class="upper">
        
                                <table style="width:100%" border="1"  >
                                          <tr align="center">
                                        <td style="width:100%"><div id="UCC"> University College Cork </div> 
                                        </tr>
                                        <td style="width:100%"><div id="UCC"><img width="100%" src="/dublindashboard/img/Dashboard/cork_icons/UCC_app.png" alt="db"></div>
                                       <table style="width:100%"  >
                                      <tr >
                                        <td style="width:50%"><div id="android"><a href="https://play.google.com/store/apps/details?id=ie.ucc.connect"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/google_play_logo.png"></a></div></td>
                                  	     	<td style="width:50%"><div id="apple"><a href="https://appsto.re/ie/EvtD9.i"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/apple-store-logo.png"></a></div></td>
                                      </tr>
                                      </table>
                                      </td>
                                       
                                     
                                      
                                    </table>
                                    
                                    
                                      </td>
                                       
                                     
                                      
                                    </table>
                         

                              </div>
                
                    </div>
                                    
                            
                            </center>
                                
                            </div>
                            
                            
    
     <div class="col span_1_of_4">
                            <center>
                                 <div id ="containerGG">
                       <div class="upper">
        
                                <table style="width:100%" border="1"  >
                                          <tr align="center">
                                        <td style="width:100%"><div id="cit"> Cork IT </div> 
                                        </tr>
                                        <td style="width:100%"><div id="cit"><img width="100%" src="/dublindashboard/img/Dashboard/cork_icons/Cork_Institute_of_Technology.png" alt="db"></div>
                                       <table style="width:100%"  >
                                      <tr >
                                        <td style="width:50%"><div id="android"><a href="https://play.google.com/store/apps/details?id=ocs.CAMSTopup.CIT"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/google_play_logo.png"></a></div></td>
                                  	     	<td style="width:50%"><div id="apple"><a href="https://appsto.re/ie/e4Y15.i"  target="_blank"><img width="100%" src="/dublindashboard/img/Dashboard/icons/apple-store-logo.png"></a></div></td>
                                      </tr>
                                      </table>
                                      </td>
                                       
                                     
                                      
                                    </table>
                      
				 </div>
				 
                              </div>
                              
                            </center>
                
                    </div>
                    
                    
     

 
                        
                            
    
    
           
   
          </body>
						
                                  
				
									</section>
                                
                                

							</div>
						</div>
					</div>
				</div>
			</div>

		<!--		<!-- Footer -->
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

	</body>
</html>
                                                            
                            
                                                            
                            
                            
                            
                            
                            
                                                            
                            
                            
                            