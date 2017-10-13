                                <!DOCTYPE HTML>
<!--
	Halcyonic 3.1 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>CorkDashboard Cork Coastline</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Provides access to an AIRO mapping module which gives detailed information about the resources of Coark's Coastline. Graphs illustrating trends in relation to the Cork Coastline are provided as well as links to real time marine data" />
		<meta name="keywords" content="CorkDashboard, Cork, Dashboard, Cork Coastline, Digital Ocean, Marine Traffic, Cork, Cargo, Bathing Water Quality, Blue Flag Beaches, Bird Populations." />
	        <script src="/dublindashboard/js/Dashboard/jquery.min.js"></script>
		<!-- <script src="/dublindashboard/js/Dashboard/config.js"></script> -->
		
		<script src="/dublindashboard/js/Dashboard/skel.min.js"></script>
		<!-- <script src="/dublindashboard/js/Dashboard/skel-panels.min.js"></script> -->
		<script src="/dublindashboard/js/Dashboard/skel-layers.min.js"></script> 
		<script src="/dublindashboard/js/Dashboard/init.js"></script>

		<noscript>
			<link rel="stylesheet" href="/dublindashboard/css/skel-noscript.css" />
			<link rel="stylesheet" href="/dublindashboard/css/style.css" />
			<link rel="stylesheet" href="/dublindashboard/css/style-desktop.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="/dublindashboard/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="/dublindashboard/js/Dashboard/html5shiv.js"></script><![endif]-->
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
											<h2>Home - Cork Coastline Dashboard</h2>
											
										</header>
			
			
                   
					
                        
						<div class="row">
							<div class="6u">
							
								<!-- Feature #1 -->
                                
                                   	<section>
										 <a href ="http://www.digitalocean.ie/Dashboard/Cork" target="_blank">
                            <img src="/dublindashboard/img/Dashboard/cork_harbour_dashboard_resized.png" alt="cork_dashboard"></td></a>
										<h2>Digital Ocean - Cork Harbour</h2>
									
									</section>         								
									
                                        <section>
										 <a href ="https://www.tide-forecast.com/locations/Cork/tides/latest" target="_blank"><img src="/dublindashboard/img/Dashboard/cork_tides_medium.png" alt="tides map"></a>
										<h2>Cork Tides Forecast</h2>
			
									</section>
									
		<section>
										 <a href ="https://www.beaches.ie/" target="_blank"><img src="/dublindashboard/img/Dashboard/beaches_cork.png" alt="water quality map"></a>
										<h2>Cork Bathing Water Quality</h2>
			
									</section>							
									
									
								
							</div>
							<div class="6u">
								
								<!-- Feature #2 -->
									<section>
										 <a href ="http://www.digitalocean.ie/Dashboard/SouthWest" target="_blank">
                            <img src="/dublindashboard/img/Dashboard/south_west_dashboard_resized2.png" alt="southwest_dashboard"></td></a>
										<h2>Digital Ocean - Castletownbere</h2>
									
									</section>     
                                					
				 
									
                               <section>
										<a href="https://www.marinetraffic.com/en/ais/home/centerx:-8.9/centery:51.7/zoom:10"  target="_blank" class="bordered-feature-image"><img src="/dublindashboard/img/Dashboard/Cork_Coastal_Dashboard.png" alt="" /></a>
										<h2>Marine Traffic</h2>
			
									</section>
									
				<section>
										<a href="CorkBayMapped" class="bordered-feature-image"><img src="/dublindashboard/img/Dashboard/cork_marine_atlas.png" alt="" /></a>
										<h2>Cork Coastline Mapped</h2>
									
									</section>
									
				 
                                					
                                
                            
              
</div>


							</div>
							
							
							
							
							
							<div class="row">
							
							<div class="12u">
							
                         
                                
                            
              

</div>


							</div>

					
					
				
				
									</section>
                                
                                

							</div>
						</div>
					</div>
				</div>
			</div>

		<!-- Footer -->
				<!-- Footer -->
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
                            