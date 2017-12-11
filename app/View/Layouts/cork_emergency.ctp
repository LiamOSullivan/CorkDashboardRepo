<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="Provides access to statistics for Cork ." />
        <meta name="description" content="Provides access to statistics about the crime rate and emergency services response in Dublin." />
        <meta name="keywords" content="Cork Dashboard, Cork, murder, crime, theft, fire, ambulance, police, gardai" />
        <link href="/css/Dashboard/fonts/fonts.css" rel="stylesheet" type="text/css"  />        
        <link href="/css/Dashboard/style.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <!--        <script src="https://cdnjs.cloudflare.com/ajax/libs/skel-layers/2.2.1/skel.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/skel-layers/2.2.1/skel-layers.min.js"></script> 
        <script src="//cdnjs.cloudflare.com/ajax/libs/skel-layers/2.2.1/skel.css"></script> -->
        <!--<script src="js/dashboard_init.js" type="text/javascript"></script>-->
        <!--<link rel="stylesheet" href="//cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />--> 

        <noscript>
        <!--<link href="/css/style.css" rel="stylesheet" type="text/css"/>--> 
        <link href="/css/Dashboard/fonts/fonts.css" rel="stylesheet" type="text/css"  />       
        <link href="/css/Dashboard/style.css" rel="stylesheet" type="text/css"/><!--
        <link href="css/Dashboard/style-desktop.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="/dublindashboard/css/Dashboard/style-desktop.css"/>-->
        </noscript>
        <!--        [if lte IE 9]><link rel="stylesheet" href="/dublindashboard/css/Dashboard/ie9.css" /><![endif]
                [if lte IE 8]><script src="/dublindashboard/js/Dashboard/html5shiv.js"></script><![endif]-->
        <!--<script src="/dublindashboard/js/Dashboard/config.js"></script> 
        <script src="/dublindashboard/js/Dashboard/skel.min.js"></script>
        <script src="/dublindashboard/js/Dashboard/skel-panels.min.js"></script> 
        <script src="/dublindashboard/js/Dashboard/skel-layers.min.js"></script> 
        <script src="/dublindashboard/js/Dashboard/init.js"></script>-->
        <!--<noscript>
        <link rel="stylesheet" href="/dublindashboard/css/Dashboard/skel-noscript.css" />
        <link rel="stylesheet" href="/dublindashboard/css/Dashboard/style.css" />
        <link rel="stylesheet" href="/dublindashboard/css/Dashboard/style-desktop.css" />
        
        </noscript>-->
        <!--[if lte IE 9]><link rel="stylesheet" href="/dublindashboard/css/Dashboard/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><script src="/dublindashboard/js/Dashboard/html5shiv.js"></script><![endif]-->
        <?//php echo $this->Html->script('jquery.min.js'); ?>
        <!-- Stylesheets -->
        <?//php echo $this->Html->css('responsivegridsystem2'); ?> 
        <?//php echo $this->Html->css('tabs'); ?> 
        <?//php echo $this->fetch('content'); ?>

        <?//php echo $this->Html->script('jquery.min.js'); ?>

        <!-- Stylesheets -->
        <?//php echo $this->Html->css('3cols'); ?>
        <?//php echo $this->Html->css('2cols'); ?>
        <?//php echo $this->Html->css('4cols'); ?>
        <?//php echo $this->Html->css('6cols'); ?>
        <?//php echo $this->Html->css('col'); ?>

        <!--<title>The Cork Dashboard | //<//?= //$this->fetch('title') ?></title>-->
        <title>The Cork Dashboard | Crime and Emergency Services Indicators</title>
        <?php $this->layout = false; ?>
    </head>
    <body>
                <?php echo $this->fetch('content') ?>
                <div class="row" style="border-bottom:2px solid #e5e5e5">
                    <div class="col-12" >
<!--                        <h2>Crime Statistics</h2>
                        <br>-->
                        <div class="content" id="tab21"><?php echo $this->element($Graph5, array("function" => "EmergencyServices/murderCrimes/tab21")); ?>
                        </div>
                        <br>
                        <div class="content" id="tab221"><?php echo $this->element($Graph5, array("function" => "EmergencyServices/murderCrimeRates/tab221")); ?>
                        </div>
                        <br>
                        <div class="content" id="tab224"><?php echo $this->element($Graph5, array("function" => "EmergencyServices/robberyCrimes/tab224")); ?>
                        </div>
                        <br>
                        <div class="content" id="tab233"><?php echo $this->element($Graph5, array("function" => "EmergencyServices/robberyCrimeRates/tab233")); ?>
                        </div> 
                        <br>    
                        <div class="content" id="tab231"><?php echo $this->element($Graph5, array("function" => "EmergencyServices/burglaryCrimes/tab231")); ?>
                        </div>
                        <br>                         
                        <div class="content" id="tab232"><?php echo $this->element($Graph5, array("function" => "EmergencyServices/burglaryCrimeRates/tab232")); ?>
                        </div>
                        <br> 
                        <div class="content" id="tab241"><?php echo $this->element($Graph5, array("function" => "EmergencyServices/drugCrimes/tab241")); ?>
                        </div>
                        <br> 
                        <div class="content" id="tab242"><?php echo $this->element($Graph5, array("function" => "EmergencyServices/drugCrimeRates/tab242")); ?>
                        </div>
                        <br> 
                        <div class="content" id="tab31"><?php echo $this->element($Graph5, array("function" => "EmergencyServices/theftCrimes/tab31")); ?>
                        </div> 
                        <br> 
                        <div class="content" id="tab32"><?php echo $this->element($Graph5, array("function" => "EmergencyServices/theftCrimeRates/tab32")); ?>
                        </div>
                        <br> 
                        <div style="border-bottom:2px solid #e5e5e5">
                        </div>
                        <br>
<!--                        <h2>Cork Fire Brigade Activity</h2>
                        <br>-->
                        <div class="content" id="tab41"><?php echo $this->element($Graph5, array("function" => "EmergencyServices/totalFireBrigade/tab41")); ?></div> 
                        <br>
                        <div class="content" id="tab51"><?php echo $this->element($Graph5, array("function" => "EmergencyServices/rtaBrigade/tab51")); ?></div> 
                        <br>
                        <div class="content" id="tab61"><?php echo $this->element($Graph5, array("function" => "EmergencyServices/waterBrigade/tab61")); ?></div> 
                        <br>
                        <div class="content" id="tab71"><?php echo $this->element($Graph5, array("function" => "EmergencyServices/falseBrigade/tab71")); ?></div> 
                        <br>
                        <div class="content" id="tab81"><?php echo $this->element($Graph5, array("function" => "EmergencyServices/miscBrigade/tab81")); ?></div> 
                        <br>
                        <div style="border-bottom:2px solid #e5e5e5">
                        </div>
                        <br>
<!--                        <h2>Cork Fire Brigade Ambulance Call Outs</h2>
                        <br>-->
                        <!--<div class="content" id="tab91"><?//php echo $this->element($Graph5, array("function" => "EmergencyServices/ambulanceBrigade/tab91")); ?></div>--> 
                        <!--<br>-->                        
                        <div class="content" id="tab101"><?php echo $this->element($Graph5, array("function" => "EmergencyServices/roadInjuries/tab101")); ?></div> 
                        <br>
                        <div class="content" id="tab111"><?php echo $this->element($Graph5, array("function" => "EmergencyServices/roadDeaths/tab111")); ?></div> 
                        <br>
                    </div>
                </div>

      
        <script type="text/javascript">
            //        $('#menu1').tabify();
            //        $('#menu2').tabify();
            //        $('#menu22').tabify();
            //        $('#menu23').tabify();
            //        $('#menu24').tabify();
            //        $('#menu3').tabify();
            //        $('#menu4').tabify();
            //        $('#menu5').tabify();
            //        $('#menu6').tabify();
            //        $('#menu7').tabify();
            //        $('#menu8').tabify();
            //        $('#menu9').tabify();
            //        $('#menu10').tabify();
            //        $('#menu224').tabify();
            //        $('#menu11').tabify();
        </script>

    </body>
</html>
<!--
Content 
<div id="onlyContent">
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
                                <header>
                                    <div id="menu_items">
                                        <div  class="col span_1_of_6">
                                            <a href="/./Economy/stats/container"><img src="/dublindashboard/img/Industry_Employment_Labour_Market.png" onmouseover="this.src = '/dublindashboard/img/Industry_Employment_Labour_Market_Blue.png'" onmouseout="this.src = '/dublindashboard/img/Industry_Employment_Labour_Market.png'" border="0" alt=""/></a>
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
                                            <a href="/./CrimeEmergencyServices/stats"><img src="/dublindashboard/img/CrimeEmergencyServicesBlue.png" border="0" alt=""/></a>
                                        </div>
                                    </div>
                                </header>
                            </div>
                            <div id="maincontentcontainer">
                                <h4>Crime Statistics</h4>

                                <center>                  
                                    <div class="section group">
                                        <div id="containerA" class="col span_1_of_2" >
                                            <ul class ="menu" id="menu2">
                                                <li class="active"><a href="#tab21">Count</a></li>
                                                <li><a href="#tab221">Rate</a></li> 

                                            </ul>                       

                                            <div class="content" id="tab21"><?//php echo $this->element($Graph5, array("function" => "EmergencyServices/murderCrimes/tab21")); ?></div>
                                            <div class="content" id="tab221"><?//php echo $this->element($Graph5, array("function" => "EmergencyServices/murderCrimeRates/tab221")); ?></div>

                                        </div>

                                        <div id="containerA" class="col span_1_of_2" >
                                            <ul class ="menu" id="menu224">
                                                <li class="active"><a href="#tab224">Count</a></li>
                                                <li><a href="#tab233">Rate</a></li>
                                            </ul>                       
                                            <div class="content" id="tab224"><?//php echo $this->element($Graph5, array("function" => "EmergencyServices/robberyCrimes/tab224")); ?></div>
                                            <div class="content" id="tab233"><?//php echo $this->element($Graph5, array("function" => "EmergencyServices/robberyCrimeRates/tab233")); ?></div> 
                                        </div>
                                    </div>
                                </center> 
                                <center>                  
                                    <div class="section group">
                                        <div id="containerA" class="col span_1_of_2" >
                                            <ul class ="menu" id="menu23">
                                                <li class="active"><a href="#tab231">Count</a></li>
                                                <li><a href="#tab232">Rate</a></li>

                                            </ul>                       
                                            <div class="content" id="tab231"><?//php echo $this->element($Graph5, array("function" => "EmergencyServices/burglaryCrimes/tab231")); ?></div>
                                            <div class="content" id="tab232"><?//php echo $this->element($Graph5, array("function" => "EmergencyServices/burglaryCrimeRates/tab232")); ?></div> 
                                        </div>
                                        <div id="containerA" class="col span_1_of_2" >
                                            <ul class ="menu" id="menu24">
                                                <li class="active"><a href="#tab241">Count</a></li>
                                                <li><a href="#tab242">Rate</a></li>

                                            </ul>                       

                                            <div class="content" id="tab241"><?//php echo $this->element($Graph5, array("function" => "EmergencyServices/drugCrimes/tab241")); ?></div>
                                            <div class="content" id="tab242"><?//php echo $this->element($Graph5, array("function" => "EmergencyServices/drugCrimeRates/tab242")); ?></div> 
                                            <div class="content" id="tab31"><?//php echo $this->element($Graph5, array("function" => "EmergencyServices/theftCrimes/tab31")); ?></div> 
                                            <div class="content" id="tab32"><?//php echo $this->element($Graph5, array("function" => "EmergencyServices/theftCrimeRates/tab32")); ?></div> 

                                        </div>
                                    </div>
                                </center> 
                                <center>                  
                                    <div class="section group">
                                        <div id="containerA" class="col span_2_of_2" >
                                            <ul class ="menu" id="menu3">
                                                <li class="active"><a href="#tab31">Count</a></li>
                                                <li><a href="#tab32">Rate</a></li>

                                            </ul>                       

                                        </div>
                                    </div>
                                </center> 
                                <h4>Dublin Fire Brigade Activity</h4>        
                                <center>                  
                                    <div class="section group">
                                        <div id="containerA" class="col span_2_of_2" >
                                            <ul class ="menu" id="menu4">
                                                <li class="active"><a href="#tab41">Count</a></li>
                                                <li><a href="#tab32">% Change</a></li> 

                                            </ul>                       




                                        </div>
                                    </div>
                                </center> 

                                <center>                  
                                    <div class="section group">
                                        <div id="containerA" class="col span_1_of_2" >
                                            <ul class ="menu" id="menu5">
                                                <li class="active"><a href="#tab51">Count</a></li>
                                                <li><a href="#tab32">% Change</a></li> 

                                            </ul>                       
                                            <div class="content" id="tab51"><?//php echo $this->element($Graph5, array("function" => "EmergencyServices/rtaBrigade/tab51")); ?></div> 
                                        </div>
                                        <div id="containerA" class="col span_1_of_2" >
                                            <ul class ="menu" id="menu6">
                                                <li class="active"><a href="#tab61">Count</a></li>
                                                <li><a href="#tab32">% Change</a></li> 
                                            </ul>                       
                                            <div class="content" id="tab61"><?//php echo $this->element($Graph5, array("function" => "EmergencyServices/waterBrigade/tab61")); ?></div> 


                                        </div>
                                    </div>
                                </center> 

                                <center>                  
                                    <div class="section group">
                                        <div id="containerA" class="col span_1_of_2" >
                                            <ul class ="menu" id="menu7">
                                                <li class="active"><a href="#tab71">Count</a></li>
                                                <li><a href="#tab32">% Change</a></li> 

                                            </ul>                       


                                            <div class="content" id="tab71"><?//php echo $this->element($Graph5, array("function" => "EmergencyServices/falseBrigade/tab71")); ?></div> 


                                        </div>

                                        <div id="containerA" class="col span_1_of_2" >
                                            <ul class ="menu" id="menu8">
                                                <li class="active"><a href="#tab81">Count</a></li>
                                                <li><a href="#tab32">% Change</a></li> 

                                            </ul>                       


                                            <div class="content" id="tab81"><?//php echo $this->element($Graph5, array("function" => "EmergencyServices/miscBrigade/tab81")); ?></div> 


                                        </div>
                                    </div>
                                </center> 


                                <h4>Dublin Fire Brigade Ambulance Call Outs</h4>  

                                <div class="content" id="tab91"><?//php echo $this->element($Graph5, array("function" => "EmergencyServices/ambulanceBrigade/tab91")); ?></div> 
                                <div class="content" id="tab91"><?//php echo $this->element($Graph5, array("function" => "EmergencyServices/ambulanceBrigade/tab91")); ?></div> 
                                <div class="content" id="tab101"><//?php echo $this->element($Graph5, array("function" => "EmergencyServices/roadInjuries/tab101")); ?></div> 
                                <div class="content" id="tab111"><//?php echo $this->element($Graph5, array("function" => "EmergencyServices/roadDeaths/tab111")); ?></div> 


                                <center>                  
                                    <div class="section group">
                                        <div id="containerA" class="col span_2_of_2" >
                                            <ul class ="menu" id="menu9">
                                                <li class="active"><a href="#tab91">Count</a></li>
                                                <li><a href="#tab32">% Change</a></li> 

                                            </ul>                       





                                        </div>
                                    </div>
                                </center>

                                <h4>Road Safety</h4>

                                <center>                  
                                    <div class="section group">
                                        <div id="containerA" class="col span_2_of_2" >
                                            <ul class ="menu" id="menu10">
                                                <li class="active"><a href="#tab101">Count</a></li>
                                                <li><a href="#tab32">% Change</a></li> 

                                            </ul>                       


                                            <div class="content" id="tab101"><//?php echo $this->element($Graph5, array("function" => "EmergencyServices/roadInjuries/tab101")); ?></div> 



                                        </div>
                                    </div>
                                </center>


                                <center>                  
                                    <div class="section group">
                                        <div id="containerA" class="col span_2_of_2" >
                                            <ul class ="menu" id="menu11">
                                                <li class="active"><a href="#tab111">Count</a></li>
                                                <li><a href="#tab32">% Change</a></li> 

                                            </ul>                       


                                            <div class="content" id="tab111"><//?php echo $this->element($Graph5, array("function" => "EmergencyServices/roadDeaths/tab111")); ?></div> 



                                        </div>
                                    </div>
                                </center>

                                <div id="menu_items_lower">
                                    <div  class="col span_1_of_6">
                                        <a href="/./Economy/stats/container"><img src="/dublindashboard/img/Industry_Employment_Labour_Market.png" onmouseover="this.src = '/dublindashboard/img/Industry_Employment_Labour_Market_Blue.png'" onmouseout="this.src = '/dublindashboard/img/Industry_Employment_Labour_Market.png'" border="0" alt=""/></a>
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
                                        <a href="/./CrimeEmergencyServices/stats"><img src="/dublindashboard/img/CrimeEmergencyServicesBlue.png" border="0" alt=""/></a>
                                    </div>



                                </div>



                                </section>



                            </div>
                        </div>
                </div>
            </div>
        </div>

<!-- Footer 
<div id="footer-wrapper">
<footer id="footer" class="container">
<div class="row">
<?//php echo $this->element('dbFooter'); ?>
</div>
</footer>
</div>
<?//php echo $this->element('googleAnalytics'); ?>
Copyright 
<div id="copyright">
<?//php echo $this->element('copyright'); ?>
</div>

</body>
</html>-->








