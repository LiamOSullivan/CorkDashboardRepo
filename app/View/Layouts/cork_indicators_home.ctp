                                                                                                                                                                                                                                                                                                    <!DOCTYPE HTML>
<html>
	<head>
	<title>Cork Dashboard Cork Indicators</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Provides access to a suite of indicators to gauge Cork's performance" />
		<meta name="keywords" content="Corkdashboard, Cork,Dashboard,Economy, Jobs, Environment, Education, Health, Housing" />
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
		<?php //  echo $this->Html->script('jquery.min.js'); ?>
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
											<h2>Home - Cork Doing</h2>
											<h3>Cork Indicators</h3>
										</header>
					<div id="headcontainer">
                    <header>
               
                    
                </div>
                <div id="maincontentcontainer">
                   
        
                    
                        
                
            
                        <div class="section group">
                            <div  class="col span_1_of_3">
                            <center>
                                
                                     
                   <div id ="containerGG">
                       <div class="upper">
                          <a href ="/./Economy/stats/container"><img src="/dublindashboard/img/Industry_Employment_Labour_Market.png" alt="Economy Icon"></a>
                       </div>
                     
                    </div>
        
           
                            </center>   
                            </div>
                            
                            
                        
                   
                     <div class="col span_1_of_3">
                          <center>
                                     <div id ="containerGG">
                       <div class="upper">
                             <a href ="/./EnvironmentTransport/stats">
                            <img src="/dublindashboard/img/Environment_Transport.png" alt="environment Icon"></td></a>
                                         </div>
                     
                    </div>
                            </center>
                            </div>
                        
                                   <div class="col span_1_of_3">
                            <center>
                                 <div id ="containerGG">
                       <div class="upper">
        
                            <a href="/./Housings/stats"><img src="/dublindashboard/img/Housing.png" alt="housing Icon"></td></a>
                              </div>
                   
                    </div>
                                    
                            
                            </center>
                                
                            </div>
                            
                            
                        </div>
                        
                        
                        
                        
                            <div class="section group">
                      
                            
                            <div class="col span_1_of_3">
                            <center>
                                 <div id ="containerGG">
                       <div class="upper">
            
                            <a href="/./Demographics/stats"><img src="/dublindashboard/img/Population.png" alt="Demographics Icon"></td></a>
                                       </div>
                 
                    </div>
                            </centre>
                            </div>
                            
                            <div class="col span_1_of_3">
                            <center>
                                 <div id ="containerGG">
                       <div class="upper">
                            <a href="/./HealthEducation/stats">
                            <img src="/dublindashboard/img/Health_Education.png" alt="health Icon"></td>
                                       </div>
                       
                    </div>
                            </center>
                                
                            </div>
                    
                
                  <div class="col span_1_of_3">
                          <center>
                    <div id ="containerGG">
                         <div class="upper">
                            <a href="/./CrimeEmergencyServices/stats"><img src="/dublindashboard/img/CrimeEmergencyServices.png" alt="Emergency Icon"></a></td>
                                  </div>
                  
                    </div>
                               
                            </center>
                            </div>
                            
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
                                                            
                            
                                                            
                            
                            
                            
                            
                            
                                                            
                            
                            
                            