<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="Provides access to statistics for Cork ." />
        <meta name="keywords" 
              content="Corkdashboard, Cork, population, travel time, weather, parking, river levels, housing, labour, health, overview" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!--        <script src="https://cdnjs.cloudflare.com/ajax/libs/skel-layers/2.2.1/skel.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/skel-layers/2.2.1/skel-layers.min.js"></script> 
        <script src="//cdnjs.cloudflare.com/ajax/libs/skel-layers/2.2.1/skel.css"></script> -->
        <!--<script src="js/dashboard_init.js" type="text/javascript"></script>-->
        <!--<link rel="stylesheet" href="//cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />--> 
        <link href="/css/Dashboard/fonts/fonts.css" rel="stylesheet" type="text/css"  />        
        <link href="/css/Dashboard/style.css" rel="stylesheet" type="text/css"/>
<!--<link href="/css/Dashboard/w3c.css" rel="stylesheet" type="text/css"/>-->
        <noscript>
        <link href="/css/Dashboard/fonts/fonts.css" rel="stylesheet" type="text/css"  />        
        <link href="/css/Dashboard/style.css" rel="stylesheet" type="text/css"/> 
        <!--<link href="/css/Dashboard/w3c.css" rel="stylesheet" type="text/css"/> 
        
        <!--
        <link href="css/Dashboard/style-desktop.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="/dublindashboard/css/Dashboard/style-desktop.css"/>-->
        </noscript>
        <!--        [if lte IE 9]><link rel="stylesheet" href="/dublindashboard/css/Dashboard/ie9.css" /><![endif]
                [if lte IE 8]><script src="/dublindashboard/js/Dashboard/html5shiv.js"></script><![endif]-->


        <!--        Old dashboard styles 
                <style>
                    canvas{ -moz-user-select: none;
                            -webkit-user-select: none;
                            -ms-user-select: none;
        
                    }
                    .chart-container {
                        width: 800px;
                        margin-left: 20px;
                        margin-right: 20px;
                        margin-bottom: 20px;
                    }
                    .container {
                        display: flex;
                        flex-direction: row;
                        flex-wrap: wrap;
                        justify-content: center;
                    }
        
                </style>-->
        <!--Responsive styles-->     
        <title>The Cork Dashboard | <?= $this->fetch('title') ?></title>
    </head>
    <body onload="myFunction()">

        <!-- Header -->
        <div>
            <?php echo $this->element('dbBanner'); ?>
            <?php echo $this->element('dbNavMenu'); ?>
        </div>

        <!--Responsive content-->
        <div style="overflow:auto">
            <?php echo $this->element('sidebar') ?>
            <?php echo $this->fetch('content') ?>
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
    </body>
</html>



