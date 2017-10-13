<!DOCTYPE HTML>
<!--
	Halcyonic 3.1 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
	<title>CorkDashboard City Benchmarks</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Provides access to several tools whcih allow you to compare Dublin's performance against other international cities." />
		<meta name="keywords" content="Dublindashboard, Dublin, City Benchmarks, Interactive tools" />
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
											<h2>Home - How's Cork Doing? - City Benchmarks</h2>
											<h3>City Benchmarking Tools</h3></h3>
										</header>
			
			
                   
					
                        
						<div class="row">
							<div class="6u">
							
								<!-- Feature #1 -->
									<section>
										<a href="http://labs.lsecities.net/eumm/m/metromonitor#9/52.0508/-8.3208" class="bordered-feature-image" target="_blank"><img src="/dublindashboard/img/Dashboard/bm_european_monitor_nw.png"  alt="" /></a>
										<h2>European Metro Monitor </h2>
									
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