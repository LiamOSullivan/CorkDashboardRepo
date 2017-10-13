                                                                                                                                                                <!DOCTYPE HTML>
<!--
	Halcyonic 3.1 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>DublinDashboard How's Dublin Doing</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Provides access to resources such as our indicator projects and interactive external benchmarking tools." />
		<meta name="keywords" content="Dublindashboard, Dublin, Dashboard, Indicators, Benchmarking" />
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
											<h2>Home - How's Cork Doing?</h2>
											<h3>Cork Data Reports</h3>
										</header>
			
			
                   
					
                        
						<div class="row">
							<div class="6u">
							
								<!-- Feature #1 -->
									<section>
										<a href="/./DublinDashboard/home" class="bordered-feature-image"><img src="/dublindashboard/img/Dashboard/Cork_Doing3.png" alt="" /></a>
										<h2>Cork Indicators </h2>
									
									</section>
									
									<!-- Feature #2 -->
									<section>
										<a href="CorkSpending" class="bordered-feature-image"><img src="/dublindashboard/img/Dashboard/Cork_county_spending.png" alt="" /></a>
										<h2>Cork Spending</h2>
			
									</section>
									
									<section>
										<a href="https://www.numbeo.com/cost-of-living/in/Cork" target="_blank" class="bordered-feature-image"><img src="/dublindashboard/img/Dashboard/cost_of_living_cork.png" alt=""  /></a>
										<h2>Cost of Living</h2>
			
									</section>
									

							</div>
							<div class="6u">
								
								<!-- Feature #2 -->
									

									 <section>
										<a href="CorkEconomicMonitor" class="bordered-feature-image"><img src="/dublindashboard/img/Dashboard/cork_economic_monitor.png" alt="" /></a>
										<h2>Cork Economic Monitor</h2> 
			
									</section> 
								
								<!-- Feature #2 -->
									<section>
										<a href="CorkBenchMarks" class="bordered-feature-image"><img src="/dublindashboard/img/Dashboard/bm_european_monitor.png" alt="" /></a>
										<h2>City Benchmarks</h2>
			
									</section>
									
									<!-- Feature #2 -->
									<section>
										<a href="https://public.tableausoftware.com/views/GHDI_Indicators_DublinDash/IndexScoresTotal?:embed=y&:display_count=no&:showVizHome=no" target = "_blank" class="bordered-feature-image"><img src="/dublindashboard/img/Dashboard/airo_indicators_nw.png" alt=""  target="_blank"/></a>
										<h2>Cork versus Other Regions</h2>

									</section>
								
                                                                    
							</div>
                            
                


							</div>
                                        
                                        
  
					
					
				
				
							
                                
                                

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
                            
                            
                            
                            
                            
                            