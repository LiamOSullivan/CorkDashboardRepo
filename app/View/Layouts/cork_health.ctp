
<html>
    <head>
        <title>The Cork Dashboard | Health and Education Indicators</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="Provides access to indicators regarding the health, healthcare and education in Dublin." />
        <meta name="keywords" content="Corkdashboard, Cork, health, hospital beds, hosptial trolleys, pupils, schools" />
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
                        <h1>Health and Education Indicators</h1>
                        <br>
                    </header>
                </div>
                <?php echo $this->fetch('content') ?>
                <div class="row" style="border-bottom:2px solid #e5e5e5">
                    <div class="col-12" >

                        <h2>Health Statistics</h2>
                        <br>
                        <div class="content" id="tab37z"><?php echo $this->element($Graph5, array("function" => "Socials/trolleys16/tab37z")); ?></div>                 
                        <br>
                        <div class="content" id="tab36z"><?php echo $this->element($Graph5, array("function" => "Socials/trolleys15/tab36z")); ?></div> 
                        <br>
                        <div class="content" id="tab34z"><?php echo $this->element($Graph5, array("function" => "Socials/trolleys14/tab34z")); ?></div> 
                        <br>
                        <div class="content" id="tab35z"><?php echo $this->element($Graph5, array("function" => "Socials/trolleys13/tab35z")); ?></div>
                        <br>
                        <div class="content" id="tab31"><?php echo $this->element($Graph5, array("function" => "Socials/healths/tab31")); ?></div> 
                        <br>
                        <div class="content" id="tab3z"><?php echo $this->element($Graph5, array("function" => "Socials/healthRate/tab3z")); ?></div> 
                        <br>
                        <div style="border-bottom:2px solid #e5e5e5">
                        </div>
                        <br>
                        <h2>Education Statistics</h2>
                        <br>
                        <div class="content" id="tab1z"><?php echo $this->element($Graph5, array("function" => "Socials/edulevel/tab1z")); ?></div> 
                        <br>
                        <div class="content" id="tab2z"><?php echo $this->element($Graph5, array("function" => "Socials/edulevelRate/tab2z")); ?></div>
                        <br>
                        <div class="content" id="tab1"><?php echo $this->element($Graph5, array("function" => "Socials/primaryschools/tab1")); ?></div> 
                        <br>
                        <div class="content" id="tab11"><?php echo $this->element($Graph5, array("function" => "Socials/secondaryschools/tab11")); ?></div> 
                        <br>
                        <div class="content" id="tab51"><?php echo $this->element($Graph5, array("function" => "Socials/specialprimaryschools/tab51")); ?></div> 
                        <br>
                        <div class="content" id="tab61A"><?php echo $this->element($Graph5, array("function" => "Socials/flschooltypes/tab61A")); ?></div> 
                        <br>
                        <div class="content" id="tab61B"><?php echo $this->element($Graph5, array("function" => "Socials/sdschooltypes/tab61B")); ?></div> 
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
//        $('#menu1z').tabify();
//        $('#menu33').tabify();
//        $('#menu34z').tabify();
        </script>
    </body>
</html>     



<!--<div id="maincontentcontainer">


    <center>   

        <div class="section group">
            <div id="containerA" class="col span_2_of_2" >
                <ul class ="menu" id="menu34z">
                    <li class="active"><a href="#tab37z">2016</a></li>
                    <li><a href="#tab36z">2015</a></li>
                    <li ><a href="#tab34z">2014</a></li>
                    <li><a href="#tab35z">2013</a></li>


                </ul>  





            </div>
        </div>


        <div class="section group">
            <div id="containerA" class="col span_2_of_2" >
                <ul class ="menu" id="menu33">
                    <li class="active"><a href="#tab31">Count</a></li>
                    <li><a href="#tab3z">Rate</a></li>


                </ul>                       





            </div>
        </div>


    </center>







    <center> 





        <div class="section group">
            <div id="containerA" class="col span_2_of_2" >
                <ul class ="menu" id="menu1z">
                    <li class="active"><a href="#tab1z">Count</a></li>
                    <li><a href="#tab2z">Rate</a></li> 

                </ul>                       







            </div>
        </div>

        <div class="section group">
            <div id="containerA" class="col span_2_of_2" >
                <ul class ="menu" id="menu3">
                    <li class="active"><a href="#tab1">Count</a></li>


                </ul>                       





            </div>
        </div>
    </center> 

    <center>                  
        <div class="section group">
            <div id="containerA" class="col span_2_of_2" >
                <ul class ="menu" id="menu4">
                    <li class="active"><a href="#tab11">Count</a></li>


                </ul>                       




            </div>
        </div>
    </center> 

    <center>                  
        <div class="section group">
            <div id="containerA" class="col span_2_of_2" >
                <ul class ="menu" id="menu5">
                    <li class="active"><a href="#tab51">Count</a></li>


                </ul>                       




            </div>
        </div>
    </center>

    <center>                  


        <div class="section group">
            <div id="containerA" class="col span_2_of_2" >
                <ul class ="menu" id="menu8">
                    <li class="active"><a href="#tab61A">Count</a></li> 
                </ul>                       


            </div>

            <div id="containerA" class="col span_2_of_2" >
                <ul class ="menu" id="menu9">
                    <li class="active"><a href="#tab61B">Count</a></li> 
                </ul>                       

            </div>
        </div>
    </center>
-->


