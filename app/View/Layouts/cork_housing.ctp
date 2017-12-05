<html>
    <head>
        <title>The Cork Dashboard | Housing Indicators</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="Provides access to several indicators relating to housing in Dublin and IReland" />
        <meta name="keywords" content="Corkdashboard, Cork, City House prices, Rent prices, planning" />
        <link href="/css/Dashboard/fonts/fonts.css" rel="stylesheet" type="text/css"  />        
        <link href="/css/Dashboard/style.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

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
                    <h1>Housing Indicators</h1>
                </div>
                <div>
                    <h3>
                        Explore information relating to planning applications, 
                        monthly house unit completions, available supply of land 
                        for housing, annual contributions to Cork councils from 
                        developers, average house prices, average monthly rent and 
                        number of inspections of rented accommodation.
                    </h3>
                </div>
                <?php echo $this->fetch('content') ?>
                <div class="row" style="border-bottom:2px solid #e5e5e5">
                    <div class="col-12" >
                        <h2>Planning & Completions</h2>
                        <br>
                        <div class="content" id="tab21"><?php echo $this->element($Graph5, array("function" => "Housings/planningApplicationsDublin/tab21")); ?></div> 
                        <br>
                        <div class="content" id="tab221"><?php echo $this->element($Graph5, array("function" => "Housings/planningApplicationsDunL/tab221")); ?></div> 
                        <br>
                        <div class="content" id="tab31"><?php echo $this->element($Graph5, array("function" => "Housings/constructionMonthlies/tab31")); ?></div> 
                        <br>
                        <div class="content" id="tab41"><?php echo $this->element($Graph5, array("function" => "Housings/socialPrivateHouses/tab41")); ?></div> 
                        <br>                        
                        <div class="content" id="tab51"><?php echo $this->element($Graph5, array("function" => "Housings/supplyOfLands/tab51")); ?></div>
                        <br>                        
                        <div class="content" id="tab52"><?php echo $this->element($Graph5, array("function" => "Housings/supplyOfUnits/tab52")); ?></div> 
                        <br>
                        <div class="content" id="tab61"><?php echo $this->element($Graph5, array("function" => "Housings/developercontributions/tab61")); ?></div> 
                        <br>
                        <div style="border-bottom:2px solid #e5e5e5">
                        </div>
                        <br>
                        <h2>Property Costs</h2>
                        <br>
                        <div class="content" id="tab11"><?php echo $this->element($Graph5, array("function" => "Housings/housePrices/tab11")); ?></div> 
                        <br>
                        <div class="content" id="tab71"><?php echo $this->element($Graph5, array("function" => "Housings/dublinNationalRents/tab71")); ?></div> 
                        <br>
                        <div class="content" id="tab81"><?php echo $this->element($Graph5, array("function" => "Housings/dublinRentByRooms/tab81")); ?></div> 
                        <br>
                        <div class="content" id="tab91"><?php echo $this->element($Graph5, array("function" => "Housings/rentalInspections/tab91")); ?></div> 
                        <br>
                        <div class="content" id="tab91"><?php echo $this->element($Graph5, array("function" => "Housings/rentalInspections/tab91")); ?></div> 
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
        </script>

    </body>
</html>                                                                                                                                                                                                                                <!DOCTYPE HTML>


<!--<center>                  
    <div class="section group">
        <div id="containerA" class="col span_2_of_2" >
            <ul class ="menu" id="menu3">
                <li class="active"><a href="#tab31">Count</a></li>
                 <li><a href="#tab32">% Change</a></li> 

            </ul>                       
        </div>
    </div>
</center> 

<center>                  
    <div class="section group">
        <div id="containerA" class="col span_2_of_2" >
            <ul class ="menu" id="menu4">
                <li class="active"><a href="#tab411">Count</a></li>
                 <li><a href="#tab32">% Change</a></li> 

            </ul>                       
        </div>
    </div>
</center> 

<center>                  
    <div class="section group">
        <div id="containerA" class="col span_1_of_2" >
            <ul class ="menu" id="menu2">
                <li class="active"><a href="#tab21">Count</a></li>
                 <li><a href="#tab32">% Change</a></li> 

            </ul>                       
        </div>

        <div id="containerA" class="col span_1_of_2" >
            <ul class ="menu" id="menu22">
                <li class="active"><a href="#tab221">Count</a></li>
                 <li><a href="#tab32">% Change</a></li> 

            </ul>                       




        </div>
    </div>
</center> 


<center>                  
    <div class="section group">
        <div id="containerA" class="col span_1_of_2" >
            <ul class ="menu" id="menu23">
                <li class="active"><a href="#tab231">Count</a></li>
                 <li><a href="#tab32">% Change</a></li> 

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
        </div>
    </div>
</center>

<center>                  
    <div class="section group">
        <div id="containerA" class="col span_2_of_2" >
            <ul class ="menu" id="menu6">
                <li class="active"><a href="#tab61">Count</a></li>
                 <li><a href="#tab32">% Change</a></li> 

            </ul>                       

        </div>
    </div>
</center>
<center>                  
    <div class="section group">
        <div id="containerA" class="col span_2_of_2" >
            <ul class ="menu" id="menu1">
                <li class="active"><a href="#tab11">Count</a></li>
                 <li><a href="#tab32">% Change</a></li> 

            </ul>                       

            



        </div>
    </div>
</center>
<center>                  
    <div class="section group">
        <div id="containerA" class="col span_2_of_2" >
            <ul class ="menu" id="menu7">
                <li class="active"><a href="#tab71">Count</a></li>
                 <li><a href="#tab32">% Change</a></li> 

            </ul>                       


           

        </div>
    </div>
</center>

<center>                  
    <div class="section group">
        <div id="containerA" class="col span_2_of_2" >
            <ul class ="menu" id="menu8">
                <li class="active"><a href="#tab81">Count</a></li>
                 <li><a href="#tab32">% Change</a></li> 

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
</center>-->


