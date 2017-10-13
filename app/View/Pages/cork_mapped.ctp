                               <!DOCTYPE HTML>
<!--
	Halcyonic 3.1 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Cork Dashboard Mapping</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Provides access to several AIRO Mapping Modules which provide detailed information from the Irish Census for the Cork region.  Modules which map crime and employment statistics are also provided." />
		<meta name="keywords" content="Cork Dashboard, Cork, Dashboard, Ireland, AIRO, mapping, census, crime, live register." />
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
											<h2>Home - Cork Mapped</h2>
											<h3>Cork Mapping Modules</h3>
										</header>
			
			
                   
					
                        
						<div class="row">
							<div class="6u">
							
								<!-- Feature #1 -->
									<section>
										<a href="http://airo.maynoothuniversity.ie/Instant_Atlas/Mapping%20Resources/AIRO%20Census%20Mapping/Local%20Authority/Cork%20City/atlas.html" class="bordered-feature-image"><img src="/dublindashboard/img/Dashboard/Cork_Census_Mapping.png" alt="" /></a>
										<h2>Cork City Census</h2>
									
									</section>
                                
																	<section>
										<a href="http://airo.maynoothuniversity.ie/external-content/recorded-crime-monitoring-tool" class="bordered-feature-image"><img src="/dublindashboard/img/Dashboard/airo_crime_tool.png" alt="" /></a>
										<h2>Crime Monitoring Tool</h2>
									
									</section>
									
									<!--<section>
										<a href="dublin_deprivation" class="bordered-feature-image"><img src="/dublindashboard/img/Dashboard/dublin_DepIndex.png" alt="" /></a>
										<h2>Dublin Deprivation Index</h2>
									
									</section> -->
                
<section>
										<a href="http://maps.seai.ie/heatdemand/" class="bordered-feature-image" target="_blank"><img src="/dublindashboard/img/Dashboard/cork_heat_demand.png" alt="" /></a>
										<h2>SEAI Heat Demand Map</h2>
								
									</section>	
 <section>

										<a href="https://earthengine.google.com/timelapse/#v=51.8969,-8.4863,10.615,latLng&t=0.01" class="bordered-feature-image" target="_blank"><img src="/dublindashboard/img/Dashboard/corks_growth.png" alt="" /></a>
										<h2>Cork's Growth</h2>
								
									</section>
							</div>
							<div class="6u">
								
								<!-- Feature #2 -->
									<section>
										<a href="http://airo.maynoothuniversity.ie/Instant_Atlas/Mapping%20Resources/AIRO%20Census%20Mapping/Local%20Authority/Cork%20County/atlas.html" class="bordered-feature-image"><img src="/dublindashboard/img/Dashboard/cork_county_census.png" alt="" /></a>
										<h2>Cork County Census</h2>
			
									</section>
                                
                              				
									<section>
										<a href="http://airo.maynoothuniversity.ie/external-content/live-register-office-monitoring-tool" class="bordered-feature-image"><img src="/dublindashboard/img/Dashboard/airo_live_register.png" alt="" /></a>
										<h2>Social Welfare Monitoring Tool</h2>
								
									</section>
									
										<section>
										<a href="http://webgis.buildingsofireland.ie/HistoricEnvironment/index.html" class="bordered-feature-image" target="_blank"><img src="/dublindashboard/img/Dashboard/cork_historic_environment.png" alt="" /></a>
										<h2>Cork's Historic Environment</h2>
								
									</section>			
								 
									<section>
										<a href="http://apps.sentinel-hub.com/sentinel-playground/?lat=51.89693981158017&lng=-8.486251831054688&zoom=12&preset=6_MOISTURE_INDEX&layers=B04,B03,B02&maxcc=20&gain=1&gamma=1&time=2015-01-01|2016-10-18&cloudCorrection=none&atmFilter=&showDates=false&evalscript=" target="_blank"><img src="/dublindashboard/img/Dashboard/cork_sentinel_hub.png" alt="" /></a>
										<h2>Cork Sentinel Hub</h2>
								
									</section>
											
							<section>
									
										<a href="http://startupireland.ie/" class="bordered-feature-image" target="_blank"><img src="/dublindashboard/img/Dashboard/cork_startups.png" alt="" /></a>
										<h2>Cork Startups</h2>
									
									</section>
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
                            