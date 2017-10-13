    <!DOCTYPE HTML>
    <!--
        Halcyonic 3.1 by HTML5 UP
        html5up.net | @n33co
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
    -->
    <html>
        <head>
            <title>CorkDashboard Cork Housing</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Provides access to tools useful for understanding housing in Cork.  It presents information about homelessness, vacancy rates, house prices and the commuting pattern of workers in Dubin." />
		<meta name="keywords" content="Corkdashboard, Cork, Ireland, commuting, housing, vacancy rates, unfinished estates, property prices, AIRO" />
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
            <!--[if lte IE 8]><script src="/dublindashboard/js/Dashboard/Dashboard/html5shiv.js"></script><![endif]-->
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
                                                <h2>Home - Cork Housing</h2>
                                                <h3>Cork Housing Sites</h3>
                                            </header>
                
                
                       
                        
                            
                            <div class="row">
                                <div class="6u">
                                
                                    <!-- Feature #1 -->
                                    <!--	<section>
                                            <a href="MappedDublinHousing" class="bordered-feature-image"><img src="/dublindashboard/img/Dashboard/housing_atlas.png" alt="" /></a>
                                            <h2>AIRO Housing Module </h2>
                                        
                                        </section> -->
                                        
                                       <section>
                                            <a href="http://airo.maynoothuniversity.ie/external-content/social-housing" class="bordered-feature-image"><img src="/dublindashboard/img/Dashboard/social_housing_monitoring_tool.png" alt="" /></a>
                                            <h2>Social Housing Monitoring Tool</h2>
                                        
                                        </section> 
                                   
                                        <section>
                                            <a href="http://environmentgovie.maps.arcgis.com/apps/webappviewer/index.html?id=58f92f0517fc4ee0956f8933afc40719" target=_"blank" class="bordered-feature-image"><img src="/dublindashboard/img/Dashboard/cork_land_availability.png" alt="" /></a>
                                            <h2>2014 Residential Land Survey</h2>
                                        
                                        </section>
                                
    
                                </div>
                                <div class="6u">
                                    
                                    <!-- Feature #2 -->
                                        <section>
                                            <a href="http://www.myhome.ie/priceregister#mapMode" target=_"blank" class="bordered-feature-image"><img src="/dublindashboard/img/Dashboard/myhome_nw.png" alt="" /></a>
                                            <h2>MyHome Price Register</h2>
                
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