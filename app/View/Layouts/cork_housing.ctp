                                                                                                                                                                                                                                <!DOCTYPE HTML>
<!--
	Halcyonic 3.1 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
	<title>CorkDashboard Cork Housing Indicators</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Provides access to several indicators relating to housing in Dublin and IReland" />
		<meta name="keywords" content="Corkdashboard, Cork, City House prices, Rent prices, planning" />
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
									<div id="wrapper">
<header>
											<h2>Home - Cork Doing</h2>
											<h3>Cork Indicators</h3>
										</header>
											<div id="headcontainer">
			<header>
		
		
		
     <div id="menu_items">
       <div  class="col span_1_of_6">
            <a href="/./Economy/stats/container"><img src="/dublindashboard/img/Industry_Employment_Labour_Market.png" onmouseover="this.src='/dublindashboard/img/Industry_Employment_Labour_Market_Blue.png'" onmouseout="this.src='/dublindashboard/img/Industry_Employment_Labour_Market.png'" border="0" alt=""/></a>
         </div>
                            
        <div class="col span_1_of_6">
            <a href ="/./EnvironmentTransport/stats"><img src="/dublindashboard/img/Environment_Transport.png" alt="Environment Icon" onmouseover="this.src='/dublindashboard/img/Environment_TransportBlue.png'" onmouseout="this.src='/dublindashboard/img/Environment_Transport.png'" border="0" alt=""/></a>
            </a>
         </div>
                        
         <div class="col span_1_of_6">
             <a href="/./Housings/stats"><img src="/dublindashboard/img/HousingBlue.png"  border="0" alt=""/></a>
         </div>
        
         <div class="col span_1_of_6">
            <a href="/./Demographics/stats"><img src="/dublindashboard/img/Population.png" onmouseover="this.src='/dublindashboard/img/PopulationBlue.png'" onmouseout="this.src='/dublindashboard/img/Population.png'"  border="0" alt=""/></a>
         </div>
    
       <div class="col span_1_of_6">
           <a href="/./HealthEducation/stats"><img src="/dublindashboard/img/Health_Education.png" onmouseover="this.src='/dublindashboard/img/Health_EducationBlue.png'" onmouseout="this.src='/dublindashboard/img/Health_Education.png'" border="0" alt=""/></a>    
       </div>
                            
   <div class="col span_1_of_6">
       <a href="/./CrimeEmergencyServices/stats"><img src="/dublindashboard/img/CrimeEmergencyServices.png" onmouseover="this.src='/dublindashboard/img/CrimeEmergencyServicesBlue.png'" onmouseout="this.src='/dublindashboard/img/CrimeEmergencyServices.png'" border="0" alt=""/></a>
         </div>
                            
                        
    
</div>
            
                  
					
            
            
            
              
		  
				

		</header>
	</div>
	<div id="maincontentcontainer">
	


	
           
          <h4>Planning & Completions</h4>
        
        <center>                  
                <div class="section group">
                    <div id="containerA" class="col span_2_of_2" >
                         <ul class ="menu" id="menu3">
                            <li class="active"><a href="#tab31">Count</a></li>
                           <!-- <li><a href="#tab32">% Change</a></li> -->
                            
                        </ul>                       
                      

                        <div class="content" id="tab31"><?php echo $this->element($Graph5, array("function" =>       "Housings/constructionMonthlies/tab31"));?></div> 
                    

					
				</div>
			</div>
                </center> 
            
            <center>                  
                <div class="section group">
                    <div id="containerA" class="col span_2_of_2" >
                         <ul class ="menu" id="menu4">
                            <li class="active"><a href="#tab411">Count</a></li>
                           <!-- <li><a href="#tab32">% Change</a></li> -->
                            
                        </ul>                       
                       
                        <div class="content" id="tab41"><?php echo $this->element($Graph5, array("function" =>       "Housings/socialPrivateHouses/tab41"));?></div> 
                          

					
				</div>
				
			</div>
                </center> 

             <center>                  
                <div class="section group">
                    <div id="containerA" class="col span_1_of_2" >
                         <ul class ="menu" id="menu2">
                            <li class="active"><a href="#tab21">Count</a></li>
                           <!-- <li><a href="#tab32">% Change</a></li> -->
                            
                        </ul>                       
                      

                        <div class="content" id="tab21"><?php echo $this->element($Graph5, array("function" =>       "Housings/planningApplicationsDublin/tab21"));?></div> 
                    

				</div>
                    
                        <div id="containerA" class="col span_1_of_2" >
                         <ul class ="menu" id="menu22">
                            <li class="active"><a href="#tab221">Count</a></li>
                           <!-- <li><a href="#tab32">% Change</a></li> -->
                            
                        </ul>                       
                      

                        <div class="content" id="tab221"><?php echo $this->element($Graph5, array("function" =>       "Housings/planningApplicationsDunL/tab221"));?></div> 
                    

				</div>
			</div>
                </center> 
            
            
                  <center>                  
                <div class="section group">
                    <div id="containerA" class="col span_1_of_2" >
                         <ul class ="menu" id="menu23">
                            <li class="active"><a href="#tab231">Count</a></li>
                           <!-- <li><a href="#tab32">% Change</a></li> -->
                            
                        </ul>                       
                      
                      
				</div>
			</div>
                </center> 
		  

            
                     <center>                  
                <div class="section group">
                    <div id="containerA" class="col span_2_of_2" >
                         <ul class ="menu" id="menu5">
                            <li class="active"><a href="#tab51">Land</a></li>
                            <li><a href="#tab52">Units</a></li>
                            
                        </ul>                       
                      

                        <div class="content" id="tab51"><?php echo $this->element($Graph5, array("function" =>       "Housings/supplyOfLands/tab51"));?></div>
                              <div class="content" id="tab52"><?php echo $this->element($Graph5, array("function" =>       "Housings/supplyOfUnits/tab52"));?></div> 
                    

					
				</div>
			</div>
                </center>
            
                      <center>                  
                <div class="section group">
                    <div id="containerA" class="col span_2_of_2" >
                         <ul class ="menu" id="menu6">
                            <li class="active"><a href="#tab61">Count</a></li>
                           <!-- <li><a href="#tab32">% Change</a></li> -->
                            
                        </ul>                       
                      

                        <div class="content" id="tab61"><?php echo $this->element($Graph5, array("function" =>       "Housings/developercontributions/tab61"));?></div> 
					
				</div>
			</div>
                </center>
             <h4>Property Costs</h4>
            	  <center>                  
                <div class="section group">
                    <div id="containerA" class="col span_2_of_2" >
                         <ul class ="menu" id="menu1">
                            <li class="active"><a href="#tab11">Count</a></li>
                           <!-- <li><a href="#tab32">% Change</a></li> -->
                            
                        </ul>                       
                      
                         <div class="content" id="tab11"><?php echo $this->element($Graph5, array("function" =>       "Housings/housePrices/tab11"));?></div> 
                   


					
				</div>
			</div>
                </center>
                       <center>                  
                <div class="section group">
                    <div id="containerA" class="col span_2_of_2" >
                         <ul class ="menu" id="menu7">
                            <li class="active"><a href="#tab71">Count</a></li>
                           <!-- <li><a href="#tab32">% Change</a></li> -->
                            
                        </ul>                       
                      

                        <div class="content" id="tab71"><?php echo $this->element($Graph5, array("function" =>       "Housings/dublinNationalRents/tab71"));?></div> 
                    

					
				</div>
			</div>
                </center>
            
                     <center>                  
                <div class="section group">
                    <div id="containerA" class="col span_2_of_2" >
                         <ul class ="menu" id="menu8">
                            <li class="active"><a href="#tab81">Count</a></li>
                           <!-- <li><a href="#tab32">% Change</a></li> -->
                            
                        </ul>                       
                      

                        <div class="content" id="tab81"><?php echo $this->element($Graph5, array("function" =>       "Housings/dublinRentByRooms/tab81"));?></div> 
                    

					
				</div>
			</div>
                </center>
            
              <center>                  
                <div class="section group">
                    <div id="containerA" class="col span_2_of_2" >
                         <ul class ="menu" id="menu9">
                            <li class="active"><a href="#tab91">Count</a></li>
                           <!-- <li><a href="#tab32">% Change</a></li> -->
                            
                        </ul>                       
                      

                        <div class="content" id="tab91"><?php echo $this->element($Graph5, array("function" =>       "Housings/rentalInspections/tab91"));?></div> 
                    

					
				</div>
			</div>
                </center>
            		
     <div id="menu_items_lower">
       <div  class="col span_1_of_6">
            <a href="/./Economy/stats/container"><img src="/dublindashboard/img/Industry_Employment_Labour_Market.png" onmouseover="this.src='/dublindashboard/img/Industry_Employment_Labour_Market_Blue.png'" onmouseout="this.src='/dublindashboard/img/Industry_Employment_Labour_Market.png'" border="0" alt=""/></a>
         </div>
                            
        <div class="col span_1_of_6">
            <a href ="/./EnvironmentTransport/stats"><img src="/dublindashboard/img/Environment_Transport.png" alt="Environment Icon" onmouseover="this.src='/dublindashboard/img/Environment_TransportBlue.png'" onmouseout="this.src='/dublindashboard/img/Environment_Transport.png'" border="0" alt=""/></a>
            </a>
         </div>
                        
         <div class="col span_1_of_6">
             <a href="/./Housings/stats"><img src="/dublindashboard/img/HousingBlue.png"  border="0" alt=""/></a>
         </div>
        
         <div class="col span_1_of_6">
            <a href="/./Demographics/stats"><img src="/dublindashboard/img/Population.png" onmouseover="this.src='/dublindashboard/img/PopulationBlue.png'" onmouseout="this.src='/dublindashboard/img/Population.png'"  border="0" alt=""/></a>
         </div>
    
       <div class="col span_1_of_6">
           <a href="/./HealthEducation/stats"><img src="/dublindashboard/img/Health_Education.png" onmouseover="this.src='/dublindashboard/img/Health_EducationBlue.png'" onmouseout="this.src='/dublindashboard/img/Health_Education.png'" border="0" alt=""/></a>    
       </div>
                            
   <div class="col span_1_of_6">
       <a href="/./CrimeEmergencyServices/stats"><img src="/dublindashboard/img/CrimeEmergencyServices.png" onmouseover="this.src='/dublindashboard/img/CrimeEmergencyServicesBlue.png'" onmouseout="this.src='/dublindashboard/img/CrimeEmergencyServices.png'" border="0" alt=""/></a>
         </div>
                            
                        
    
</div>

            
			 <script type="text/javascript">
                $('#menu1').tabify(); 
                $('#menu2').tabify();
                $('#menu22').tabify();
                $('#menu23').tabify();
                $('#menu24').tabify();
                $('#menu3').tabify();
                $('#menu4').tabify();
                $('#menu5').tabify();
                $('#menu6').tabify();
                $('#menu7').tabify();
                $('#menu8').tabify(); 
                $('#menu9').tabify(); 
</script>
			
				
	
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
                                                            
                            
                                                            
                            
                            
                            
                                                            
                            
                            
                            