<html>
    <head>
        <title>The Cork Dashboard | Housing Graphs</title>
        <?php $this->layout = false; ?>
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
        </noscript>
        
    </head>
    <body>
   
        <!--Responsive content-->
        <div style="overflow:auto">
                <?php echo $this->fetch('content') ?>
            <h1>Test</h1>
                <div class="row" style="border-bottom:2px solid #e5e5e5">
                    <div class="col-12" >
                        <div class="content" id="tab21"><?php echo $this->element($Graph5, array("function" => "Housings/planningApplicationsDublin/tab21")); ?></div> 
                        <br>
                        <div class="content" id="tab221"><?php echo $this->element($Graph5, array("function" => "Housings/planningApplicationsDunL/tab221")); ?></div> 
                        <br>
                        <div class="content" id="tab11"><?php echo $this->element($Graph5, array("function" => "Housings/housePrices/tab11")); ?></div> 
                        <br>
                        <div class="content" id="tab71"><?php echo $this->element($Graph5, array("function" => "Housings/dublinNationalRents/tab71")); ?></div> 
                        <br>
                    </div>
                </div>
            </div>
    </body>
</html>                                                                                                                                                                                                                                <!DOCTYPE HTML>



