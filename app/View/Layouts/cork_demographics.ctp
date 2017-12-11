
<html>
    <head>
        <title>The Cork Dashboard | Demographic Indicators</title>
        <?php $this->layout = false; ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="Provides access to the population statistics for Dublin ." />
        <meta name="keywords" content="Dublindashboard, Dublin, population, female ratio, age profiles" />
        <link href="/css/Dashboard/fonts/fonts.css" rel="stylesheet" type="text/css"  />        
        <link href="/css/Dashboard/style.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

        <noscript>
        <link href="/css/Dashboard/fonts/fonts.css" rel="stylesheet" type="text/css"  />       
        <link href="/css/Dashboard/style.css" rel="stylesheet" type="text/css"/>
        </noscript>

    </head>

    <body>
        <div style="overflow:auto">
            <div class="onlyContent">
                <div style="border-bottom:2px solid #e5e5e5">
                        <h1>Population & Demographic Information</h1>
                    
                </div>
                        <div><h3>
                    Explore historical information relating to Cork’s population, 
                    people born outside the state now living in Cork, Cork’s 
                    age profile and the number of Cork households.
                    </h3></div>
                <div class="col-12" style="display: table; " >
<!--                    <div class="col-2">
                        <a href="/./Economy/stats/container">
                            <img src="//img/Cork_Indicator_Icons/Industry_Employment_Labour_Market.png" width="90%" max-width = "100%" alt=""/>
                        </a> 
                    </div>
                    <div class="col-2" >
                        <a href="/./EnvironmentTransport/stats"> 
                            <img src="/img/Cork_Indicator_Icons/Environment_Transport.png" width="90%" max-width = "100%" alt=""/>
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="/./Housings/stats">
                            <img src="/img/Cork_Indicator_Icons/Housing.png" width="90%" max-width = "100%" alt=""/>
                        </a> 
                    </div>
                    <div class="col-2">
                        <a href="/./Demographics/stats">
                            <img src="/img/Cork_Indicator_Icons/Population.png" width="90%" max-width = "100%" alt=""/>
                        </a> 
                    </div>
                    <div class="col-2">
                        <a href="/./HealthEducation/stats">
                            <img src="/img/Cork_Indicator_Icons/Health_Education.png" width="90%" max-width = "100%" alt=""/>
                        </a> 
                    </div>
                    <div class="col-2">
                        <a href="/./CrimeEmergencyServices/stats">
                            <img src="/img/Cork_Indicator_Icons/CrimeEmergencyServices.png" width="90%" max-width = "100%" alt=""/>
                        </a>       
                    </div>-->
                </div>


                <?php echo $this->fetch('content') ?>
                <div class="row" style="border-bottom:2px solid #e5e5e5">
                    <div class="col-9" >

                        <h2>Population Statistics</h2>
                        <br>
                        <div class="content" id="tab31"><?php echo $this->element($Graph5, array("function" => "Demographics/population/tab31")); ?></div> 
                        <br>
                        <div class="content" id="tab32"><?php echo $this->element($Graph5, array("function" => "Demographics/populationRateChange/tab32")); ?></div>
                        <br>
                        <div class="content" id="tab21"><?php echo $this->element($Graph5, array("function" => "Demographics/females/tab21")); ?></div> 
                        <br>
                        <div class="content" id="tab41"><?php echo $this->element($Graph5, array("function" => "Demographics/popBornOutside/tab41")); ?></div> 
                        <br>
                        <div class="content" id="tab11"><?php echo $this->element($Graph5, array("function" => "Demographics/ageProfiles/tab11")); ?></div>
                        <br>
                        <div class="content" id="tab12"><?php echo $this->element($Graph5, array("function" => "Demographics/ageProfilesState/tab12")); ?></div> 
                        <br>
                        <div style="border-bottom:2px solid #e5e5e5">
                        </div>
                        <br>
                        <h2>Household Statistics</h2>
                        <br>
                        <div class="content" id="tab91"><?php echo $this->element($Graph5, array("function" => "Demographics/numberOfHouseholds/tab91")); ?></div> 
                        <br>
                        <div class="content" id="tab101"><?php echo $this->element($Graph5, array("function" => "Demographics/numberInHouseholds/tab101")); ?></div> 
                        <br>
                        <div class="content" id="tab102"><?php echo $this->element($Graph5, array("function" => "Demographics/stateNumberInHouseholds/tab102")); ?></div> 
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
//            $('#menu1').tabify();
//            $('#menu2').tabify();
//            $('#menu22').tabify();
//            $('#menu23').tabify();
//            $('#menu24').tabify();
//            $('#menu3').tabify();
//            $('#menu4').tabify();
//            $('#menu5').tabify();
//            $('#menu6').tabify();
//            $('#menu7').tabify();
//            $('#menu8').tabify();
//            $('#menu9').tabify();
//            $('#menu10').tabify();
//            $('#menu11').tabify();
        </script>
    </body>
</html>                

<!--<center>                  
    <div class="section group">
        <div id="containerA" class="col span_2_of_2" >
            <ul class ="menu" id="menu3">
                <li class="active"><a href="#tab31">Count</a></li>
                <li><a href="#tab32">Rate</a></li> 
                 <li><a href="#tab33">% Change</a></li>  
            </ul>                       
        </div>
    </div>
</center> 


<center>                  
    <div class="section group">
        <div id="containerA" class="col span_1_of_2" >
            <ul class ="menu" id="menu2">
                <li class="active"><a href="#tab21">Rate</a></li>
                 <li><a href="#tab32">% Change</a></li> 

            </ul>                       





        </div>

        <div id="containerA" class="col span_1_of_2" >
            <ul class ="menu" id="menu4">
                <li class="active"><a href="#tab41">Count</a></li>
                 <li><a href="#tab32">% Change</a></li> 

            </ul>                       





        </div>
    </div>
</center> 


<center>                  
    <div class="section group">
        <div id="containerA" class="col span_2_of_2" >
            <ul class ="menu" id="menu1">
                <li class="active"><a href="#tab11">Cork</a></li>
                <li><a href="#tab12">State</a></li>

            </ul>                       






        </div>
    </div>
</center> 

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



<center>                  
    <div class="section group">
        <div id="containerA" class="col span_2_of_2" >
            <ul class ="menu" id="menu10">
                <li class="active"><a href="#tab101">Cork</a></li>
                <li><a href="#tab102">State</a></li> 

            </ul>                       


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
        <a href="/./Demographics/stats"><img src="/dublindashboard/img/PopulationBlue.png" border="0" alt=""/></a>
    </div>

    <div class="col span_1_of_6">
        <a href="/./HealthEducation/stats"><img src="/dublindashboard/img/Health_Education.png" onmouseover="this.src = '/dublindashboard/img/Health_EducationBlue.png'" onmouseout="this.src = '/dublindashboard/img/Health_Education.png'" border="0" alt=""/></a>    
    </div>

    <div class="col span_1_of_6">
        <a href="/./CrimeEmergencyServices/stats"><img src="/dublindashboard/img/CrimeEmergencyServices.png" onmouseover="this.src = '/dublindashboard/img/CrimeEmergencyServicesBlue.png'" onmouseout="this.src = '/dublindashboard/img/CrimeEmergencyServices.png'" border="0" alt=""/></a>
    </div>



</div>-->










