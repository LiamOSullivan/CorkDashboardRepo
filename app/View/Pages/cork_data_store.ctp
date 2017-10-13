                                                                                                <!DOCTYPE HTML>
<!--
	Halcyonic 3.1 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		   <title>CorkDashboard Cork DataStore</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="The Cork Dashboard Datastore provides access to data repositories which contain the data used in The Cork Dahsboard." />
		<meta name="keywords" content="Corkdashboard, Cork, Ireland, data, open data, CSO, statcentral, AIRO" />
			<script src="/dublindashboard/js/Dashboard/jquery.min.js"></script>
		<!-- <script src="/dublindashboard/js/Dashboard/config.js"></script> -->
		
		<script src="/dublindashboard/js/Dashboard/skel.min.js"></script>
		<!-- <script src="/dublindashboard/js/Dashboard/skel-panels.min.js"></script> -->
		<script src="/dublindashboard/js/Dashboard/skel-layers.min.js"></script> 
		<script src="/dublindashboard/js/Dashboard/init.js"></script> 
		<noscript>
			<link rel="stylesheet" href="/dublindashboard/css/Dashboard/skel-noscript.css" />
			<link rel="stylesheet" href="/dublindashboard/css/Dashboard/style.css" />
			<link rel="stylesheet" href="/dublindashboard/css/Dashboard/style-desktop.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="/dublindashboard/css/Dashboard/ie9.css" /><![endif]-->
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
											<h2>Home - Cork Datastore</h2>
											<h3>Cork Data Sites</h3>
										</header>
			
			
                   
					
                        
						<div class="row">
							<div class="6u">
							
								<!-- Feature #1 -->
									<section>
										<a href="http://airo.maynoothuniversity.ie/datastore" target="_blank" class="bordered-feature-image"><img src="/dublindashboard/img/Dashboard/airo_datastore_nw.png" alt="" /></a>
										<h2>AIRO Cork Datastore</h2>
									
									</section>
                                </div>
                                <div class="6u">
                                
                                									<!-- Feature #2 -->
									<section>
										<a href="https://data.gov.ie/data" target="_blank" class="bordered-feature-image"><img src="/dublindashboard/img/Dashboard/DataGov.PNG" alt="" /></a>
										<h2>DATA.GOV.IE</h2>
			
									</section>
							</div>
							<div class="6u">
								
								<!-- Feature #2 -->
									<section>
										<a href="http://data.corkcity.ie/" target="_blank" class="bordered-feature-image"><img src="/dublindashboard/img/Dashboard/Cork_Data_Stores.png" alt="" /></a>
										<h2>Cork Datastore</h2>
			
									</section>

							</div>
                            
                            							<div class="6u">
								
								<!-- Feature #2 -->
									<section>
										<a href="http://www.statcentral.ie/" target="_blank" class="bordered-feature-image"><img src="/dublindashboard/img/Dashboard/stat_central.png" alt="" /></a>
										<h2>StatCentral (CSO)</h2>
			
									</section>

							</div>
                            
                                                        							<div class="6u">
								
								<!-- Feature #2 -->
									<section>
										<a href="http://ec.europa.eu/eurostat/search?p_auth=EIEYuWvZ&p_p_id=estatsearchportlet_WAR_estatsearchportlet&p_p_lifecycle=1&p_p_state=maximized&p_p_mode=view&_estatsearchportlet_WAR_estatsearchportlet_action=search&text=Cork" target="_blank" class="bordered-feature-image"><img src="/dublindashboard/img/Dashboard/eurostat.png" alt="" /></a>
										<h2>EuroStat Urban Audit</h2>
			
									</section>
									
									

							</div>
							
													<div class="6u">
								
							
					

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
                            
                            
                            