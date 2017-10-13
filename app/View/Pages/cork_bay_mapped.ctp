                                <!DOCTYPE HTML>
<!--
	Halcyonic 3.1 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
			<title>Cork Coastline Mapped</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Provides access to Ireland's Marine Atlas module which gives detailed information about Cork's Coastline and Fishing Activities" />
		<meta name="keywords" content="Dublindashboard, Dublin Bay Mapping" />
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
											<h2><a href="/pages/dublin_bay">Cork Coastline Mapped</a></h2>
											<h3>Cork Coastline Mapped  (View in <a href="http://atlas.marine.ie/#?c=52.0643:-8.6600:9" target="_blank">full screen</a>) </h3>
</header>

                                        <iframe id="idIframe" src="http://atlas.marine.ie/#?c=52.0643:-8.6600:9"  frameborder="0" width="100%" height ="620" ></iframe>

										
               

                   
                             
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
                            