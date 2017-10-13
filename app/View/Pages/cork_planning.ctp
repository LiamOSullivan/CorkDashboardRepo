<!DOCTYPE HTML>
<!--
	Halcyonic 3.1 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Cork Dashboard Planning</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Prrovides access to land zoning information and planning applications for Dublin." />
		<meta name="keywords" content="Dublindashboard, Dublin, Dashboard, Ireland, planning applciaitons, myplan, mypp, zoning" />
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
		<!--[if lte IE 9]><link rel="stylesheet" href="/dublindashboard/css/Dashboard/Dashboard/ie9.css" /><![endif]-->
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
											<h2>Home - Cork Planning</h2>
											<h3>Cork Planning Sites</h3>
										</header>
			
			
                  
                     
						<div class="row">
							<div class="6u">
							
								<!-- Feature #1 -->
								
								<section>
										<a href="https://www.corkcoco.ie/planning-enquiry-system/" target="_blank" class="bordered-feature-image"><img src="/dublindashboard/img/Dashboard/Corkcoco_planning_enquiry_system.png" alt="" /></a>
										<h2>Cork County Council Planning Applications</h2>
									
									</section>

							</div>
								<div class="6u">
								
								<section>
										<a href="http://data.corkcity.ie/dataset/planning-permission" target="_blank" class="bordered-feature-image"><img src="/dublindashboard/img/Dashboard/cork_city_planning.png" alt="" /></a>
										<h2>Cork City Council Planning Applications</h2>
										
										   </section>
										   </div>
						                     <!-- Feature #2 -->
						                  <div class="6u"> 
						                  <section>
										<a href="http://www.myplan.ie/viewer" target="_blank" class="bordered-feature-image"><img src="/dublindashboard/img/Dashboard/myplan_cork2.png" alt="" /></a>
										<h2>Myplan </h2>
									
									</section>
						                  
			
			                                                   </div>
				
									<!--</section>
									
									<section>
										<a href="http://mypp.ie/search-map/" target="_blank" class="bordered-feature-image"><img src="/dublindashboard/img/Dashboard/mypp_nw.png" alt="" /></a>
										<h2>mypp</h2>
			
									</section>!-->

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