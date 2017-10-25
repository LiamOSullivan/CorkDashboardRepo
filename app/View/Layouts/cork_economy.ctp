<html>
    <head>
        <title>The Cork Dashboard | Economic Indicators</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="Provides access to visual tools showing Dublin's economic performance" />
        <meta name="keywords" content="Corkdashboard, Cork,employment, unemployment, industry, sectors, population" />
        <link href="/css/Dashboard/fonts/fonts.css" rel="stylesheet" type="text/css"  />        
        <link href="/css/Dashboard/style.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<!--                <script src="/dublindashboard/js/Dashboard/jquery.min.js"></script>-->
                <!-- <script src="/dublindashboard/js/Dashboard/config.js"></script> -->
        <!--		
                        <script src="/dublindashboard/js/Dashboard/skel.min.js"></script>
                         <script src="/dublindashboard/js/Dashboard/skel-panels.min.js"></script> 
                        <script src="/dublindashboard/js/Dashboard/skel-layers.min.js"></script> 
                        <script src="/dublindashboard/js/Dashboard/init.js"></script>-->


        <noscript>
        <link href="/css/Dashboard/fonts/fonts.css" rel="stylesheet" type="text/css"  />       
        <link href="/css/Dashboard/style.css" rel="stylesheet" type="text/css"/>
        <!--<link rel="stylesheet" href="/dublindashboard/css/Dashboard/skel-noscript.css" />
            <link rel="stylesheet" href="/dublindashboard/css/Dashboard/style.css" />
            <link rel="stylesheet" href="/dublindashboard/css/Dashboard/style-desktop.css" />-->
        </noscript>
        <!--[if lte IE 9]><link rel="stylesheet" href="/dublindashboard/css/Dashboard/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><script src="/dublindashboard/js/Dashboard/html5shiv.js"></script><![endif]-->
        <?//php echo $this->Html->css('responsivegridsystem2'); ?> 
        <?//php echo $this->Html->css('tabs'); ?> 
        <?//php echo $this->fetch('content'); ?>
    </head>
    <body>
        <!-- Header -->
        <div id="header-wrapper">
            <?php echo $this->element('dbBanner'); ?>
            <?php echo $this->element('dbNavMenu'); ?>
        </div>
        <!--Responsive content-->
        <div style="overflow:auto">
            <?php echo $this->element('sidebar') ?>
            <div class="onlyContent">
                <div style="border-bottom:2px solid #e5e5e5">
                    <header>
                        <h1>Economic Indicators</h1>
                        <br>
                    </header>
                </div>
                <?php echo $this->fetch('content') ?>
                <div class="row" style="border-bottom:2px solid #e5e5e5">
                    <div class="col-9" >
                        <h2>Employment Statistics</h2>
                        <br>
                        <div class="content" id="tab31"><?php echo $this->element($Graph5, array("function" => "Economy/employmentFigsUp/tab31")); ?></div> 
                        <br>
                        <div class="content" id="tab32"><?php echo $this->element($Graph5, array("function" => "Economy/employmentChange/tab32")); ?></div>
                        <br>
                        <div class="content" id="tab33"><?php echo $this->element($Graph5, array("function" => "Economy/annualEmploymentChange/tab33")); ?></div>
                        <br>
                        <div class="content" id="tab1"><?php echo $this->element($Graph5, array("function" => "Economy/unemploymentFigs/tab1")); ?></div> 
                        <br>
                        <div class="content" id="tab2"><?php echo $this->element($Graph5, array("function" => "Economy/unemploymentChange/tab2")); ?></div>
                        <br>
                        <div class="content" id="tab222"><?php echo $this->element($Graph5, array("function" => "Economy/annualUnemploymentChange/tab222")); ?></div>
                        <br>
                        <div class="content" id="tab3"><?php echo $this->element($Graph5, array("function" => "Economy/unemploymentRate/tab3")); ?></div>
                        <br>
                        <div class="content" id="tab51"><?php echo $this->element($Graph5, array("function" => "Economy/grossValueAdded/tab51")); ?></div> 
                        <br>
                        <div style="border-bottom:2px solid #e5e5e5">
                        </div>
                        <br>
                        <h2>Industry Sectors</h2>
                        <br>
                        <div class="content" id="tab81"><?php echo $this->element($Graph5, array("function" => "Economy/employeecompanysize/tab81")); ?></div> 
                        <br>
                        <div class="content" id="tab41"><?php echo $this->element($Graph5, array("function" => "Economy/businessSegments/tab41")); ?></div> 
                        <br>
                        <div class="content" id="tab71"><?php echo $this->element($Graph5, array("function" => "Economy/overseasVisitors/tab71")); ?></div> 
                        <br>

                        <br>

                        <br>
                        <div style="border-bottom:2px solid #e5e5e5">
                        </div>
                        <br>
                        <h2>Income & Poverty</h2>
                        <br>
                        <div class="content" id="tab11"> <?php echo $this->element($Graph5, array("function" => "Economy/silcs/tab11")); ?>  </div>  
                        <br>  
                        <div class="content" id="tab13"><?php echo $this->element($Graph4, array("function" => "Economy/poverty/tab13")); ?> </div> 



                        <br>

                        <br>
                    </div>
                </div>
            </div>
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
        </div>


        <script type="text/javascript">
//            $('#menu1').tabify();
//            $('#menu2').tabify();
//            $('#menu3').tabify();
//            $('#menu33').tabify();
//            $('#menu43').tabify();
//            $('#menu53').tabify();
//            $('#menu73').tabify();
//            $('#menu83').tabify();
        </script>

    </body>
</html>

<!-- Content -->
<!--<div id="content-wrapper">
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="10u important(collapse)">

                     Main Content 
                    <section>
                        <div id="wrapper">
                            <header>
                                <h2>Home - Cork Doing</h2>
                                <h3>Cork Indicators</h3>
                            </header>
                            <div id="headcontainer">






                                <div id="menu_items">
                                    <div  class="col span_1_of_6">
                                        <a href="/./Economy/stats/container"><img src="/dublindashboard/img/Industry_Employment_Labour_Market_Blue.png" border="0" alt=""/></a>
                                    </div>

                                    <div class="col span_1_of_6">
                                        <a href ="/./EnvironmentTransport/stats"><img src="/dublindashboard/img/Environment_Transport.png" alt="Environment Icon" onmouseover="this.src = '/dublindashboard/img/Environment_TransportBlue.png'" onmouseout="this.src = '/dublindashboard/img/Environment_Transport.png'" border="0" alt=""/></a>
                                        </a>
                                    </div>

                                    <div class="col span_1_of_6">
                                        <a href="/./Housings/stats"><img src="/dublindashboard/img/Housing.png" onmouseover="this.src = '/dublindashboard/img/HousingBlue.png'" onmouseout="this.src = '/dublindashboard/img/Housing.png'" border="0" alt=""/></a>
                                    </div>
                                    <div class="col span_1_of_6">
                                        <a href="/./Demographics/stats"><img src="/dublindashboard/img/Population.png" onmouseover="this.src = '/dublindashboard/img/PopulationBlue.png'" onmouseout="this.src = '/dublindashboard/img/Population.png'"  border="0" alt=""/></a>
                                    </div>

                                    <div class="col span_1_of_6">
                                        <a href="/./HealthEducation/stats"><img src="/dublindashboard/img/Health_Education.png" onmouseover="this.src = '/dublindashboard/img/Health_EducationBlue.png'" onmouseout="this.src = '/dublindashboard/img/Health_Education.png'" border="0" alt=""/></a>    
                                    </div>

                                    <div class="col span_1_of_6">
                                        <a href="/./CrimeEmergencyServices/stats"><img src="/dublindashboard/img/CrimeEmergencyServices.png" onmouseover="this.src = '/dublindashboard/img/CrimeEmergencyServicesBlue.png'" onmouseout="this.src = '/dublindashboard/img/CrimeEmergencyServices.png'" border="0" alt=""/></a>
                                    </div>
                                </div>
                            </div>
                        </div>






                        <div id="maincontentcontainer">

                            <h4>Employment Statistics</h4>


                            <center>                  
                                <div class="section group">
                                    <div id="containerA" class="col span_2_of_2" >
                                        <ul class ="menu" id="menu33">
                                            <li class="active"><a href="#tab31">Count</a></li>
                                            <li><a href="#tab32">Quarterly % Change</a></li>
                                            <li><a href="#tab33">Annual % Change</a></li>

                                        </ul>                       




                                    </div>
                                </div>
                            </center> 



                            <center>                  
                                <div class="section group">
                                    <div id="containerA" class="col span_2_of_2" >
                                        <ul class ="menu" id="menu3">
                                            <li class="active"><a href="#tab1">Count</a></li>
                                            <li><a href="#tab2">Quarterly % Change</a></li>
                                            <li><a href="#tab222">Annual % Change</a></li>
                                            <li><a href="#tab3">Rate</a></li>

                                        </ul>                       




                                    </div>
                                </div>
                            </center> 

                            <center>                  
                                <div class="section group">
                                    <div id="containerA" class="col span_2_of_2" >
                                        <ul class ="menu" id="menu53">
                                            <li class="active"><a href="#tab51">Count</a></li>


                                        </ul>                       



                                    </div>
                                </div>
                            </center> 



                            <h4>Income & Poverty</h4> 

                            <center>
                                <div class="section group">		
                                    <div id="containerB" class="col span_1_of_2">

                                        <ul class ="menu" id="menu2">
                                            <li class="active"><a href="#tab11">Count</a></li>

                                        </ul>



                                    </div>

                                    <div id="containerC" class="col span_1_of_2">
                                        <ul class ="menu" id="menu3">
                                            <li class="active"><a>Rate</a></li>
                                        </ul>


                                    </div>       
                                </div>	
                            </center>



                            <h4>Industry Sectors</h4> 


                            <center>                  
                                <div class="section group">
                                    <div id="containerA" class="col span_2_of_2" >
                                        <ul class ="menu" id="menu43">
                                            <li class="active"><a href="#tab41">Count</a></li>


                                        </ul>                       



                                    </div>
                                </div>
                            </center> 

                            <center>                  
                                <div class="section group">
                                    <div id="containerA" class="col span_2_of_2" >
                                        <ul class ="menu" id="menu83">
                                            <li class="active"><a href="#tab81">Count</a></li>


                                        </ul>                       



                                    </div>
                                </div>
                            </center>


                            <center>                  
                                <div class="section group">
                                    <div id="containerA" class="col span_2_of_2" >
                                        <ul class ="menu" id="menu73">
                                            <li class="active"><a href="#tab71">Count</a></li>


                                        </ul>                       



                                    </div>
                                </div>
                            </center> 








                            <center>	
                                <div class="section group">



                                    <div id="containerD" class="col span_1_of_2">
                                                <?//php echo $this->element($Graph4, array("function" => "Economy/employmentSectors/containerD")); ?> 
                                    </div>
                                    <div id="containerE" class="col span_1_of_2">
                                        -	<?//php echo $this->element($Graph5, array("function" => "Economy/employmentChange/containerE")); ?>  
                                    </div>

                                </div>
                            </center>

                            <div id="menu_items_lower">
                                <div  class="col span_1_of_6">
                                    <a href="/./Economy/stats/container"><img src="/dublindashboard/img/Industry_Employment_Labour_Market_Blue.png" border="0" alt=""/></a>
                                </div>

                                <div class="col span_1_of_6">
                                    <a href ="/./EnvironmentTransport/stats"><img src="/dublindashboard/img/Environment_Transport.png" alt="Environment Icon" onmouseover="this.src = '/dublindashboard/img/Environment_TransportBlue.png'" onmouseout="this.src = '/dublindashboard/img/Environment_Transport.png'" border="0" alt=""/></a>
                                    </a>
                                </div>

                                <div class="col span_1_of_6">
                                    <a href="/./Housings/stats"><img src="/dublindashboard/img/Housing.png" onmouseover="this.src = '/dublindashboard/img/HousingBlue.png'" onmouseout="this.src = '/dublindashboard/img/Housing.png'" border="0" alt=""/></a>
                                </div>
                                <div class="col span_1_of_6">
                                    <a href="/./Demographics/stats"><img src="/dublindashboard/img/Population.png" onmouseover="this.src = '/dublindashboard/img/PopulationBlue.png'" onmouseout="this.src = '/dublindashboard/img/Population.png'"  border="0" alt=""/></a>
                                </div>

                                <div class="col span_1_of_6">
                                    <a href="/./HealthEducation/stats"><img src="/dublindashboard/img/Health_Education.png" onmouseover="this.src = '/dublindashboard/img/Health_EducationBlue.png'" onmouseout="this.src = '/dublindashboard/img/Health_Education.png'" border="0" alt=""/></a>    
                                </div>

                                <div class="col span_1_of_6">
                                    <a href="/./CrimeEmergencyServices/stats"><img src="/dublindashboard/img/CrimeEmergencyServices.png" onmouseover="this.src = '/dublindashboard/img/CrimeEmergencyServicesBlue.png'" onmouseout="this.src = '/dublindashboard/img/CrimeEmergencyServices.png'" border="0" alt=""/></a>
                                </div>



                            </div>





                            </body>		








                    </section>






-->
