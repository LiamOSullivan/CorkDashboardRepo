<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="Provides access to information, data and statistics for Cork." />
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
        <link href="/css/Dashboard/grid_style.css" rel="stylesheet" type="text/css"/>
        <!--<link href="/css/Dashboard/style.css" rel="stylesheet" type="text/css"/>-->
        <!--<link href="/css/Dashboard/w3c.css" rel="stylesheet" type="text/css"/>-->
        <noscript>
        <link href="/css/Dashboard/fonts/fonts.css" rel="stylesheet" type="text/css"  />        
        <link href="/css/Dashboard/grid_style.css" rel="stylesheet" type="text/css"/> 
        <!--<link href="/css/Dashboard/w3c.css" rel="stylesheet" type="text/css"/> 
        
        <!--
        <link href="css/Dashboard/style-desktop.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="/dublindashboard/css/Dashboard/style-desktop.css"/>-->
        </noscript>
        <!--Responsive styles-->     
        <title>The Cork Dashboard</title> 
        <!--//| <?//= $this->fetch('title') ?></title>-->
    </head>
    <body onload="myFunction()">
        <section id="page">
            <header>
                <?php echo $this->element('dbBanner') ?>
            </header>
            <nav>
                //<?//php echo $this->element('dbNavMenu') ?>    
            </nav>

            <!--            <div>
                            <h1>Cork in Real Time</h1>
                        </div>-->

            <div class="sidebar">
                //<?//php echo $this->element('sidebar') ?>
            </div>

            <div class="glance">
                //<?//php echo $this->element('glance') ?>
                <div class="chart1">c1</div>
                <div class="chart2">c2</div>
                <div class="chart3">c3</div>
                <div class="chart4">c4</div>
            </div>
            <!--<div class="realtime">In Real Time</div>-->

            <div class="connectCSG">
                //<?//php echo $this->element('connect') ?>
            </div>
            <div class="realtime">
                <div class="traffic">
                    //<?//php echo $this->element('traffic') ?>
                </div>

                <div class="weather">
                    //<?//php echo $this->element('weather') ?>
                </div>

                <div class="twitter">
                    //<?//php echo $this->element('twitter') ?>
                </div>
                <div class="latest">
                    //<?//php echo $this->element('latest') ?>
                </div>
                <div class="cameras">
                    //<?//php echo $this->element('cameras') ?>
                </div>
            </div>
            <div class="mapAlerter"></div>
            <footer>footer
                //<?//php echo $this->element('dbFooter') ?>
            </footer> 
            <div class="copyright">
                //<?//php echo $this->element('copyright') ?></div>
            <!--<analytics>analytics</analytics>--> 
        </section>

        <!--         Header 
                <div>
                    <?//php echo $this->element('dbBanner'); ?>
                    <?//php echo $this->element('dbNavMenu'); ?>
                </div>
        
                Responsive content
                <div style="overflow:auto">
                    <?//php echo $this->element('sidebar') ?>
                    <?//php echo $this->fetch('content') ?>
                </div>
                <div id="footer-wrapper">
                    <?//php echo $this->element('dbFooter'); ?>
                </div>
                <?//php echo $this->element('googleAnalytics'); ?>
                 Copyright 
                <div id="copyright">
                    <?//php echo $this->element('copyright'); ?>        
                </div>-->

    </body>
    <script src="http://www.chartjs.org/dist/2.6.0/Chart.bundle.js"></script>
    <script src="http://www.chartjs.org/samples/2.6.0/utils.js"></script>
    <script src="/js/cork_data_charts.js" type="text/javascript"></script>

    <script type="text/javascript">
        function myFunction() {

            //$('#mapsnapshot').load('http://www.corkdashboard.ie/pages/CorkTravel #map');

            refreshCams();
            setInterval("refreshCams()", 300000);
        }
        function refreshCams() {
            let imgurl6 = "https://cdn.mtcc.ie/static/cctv/0267.jpg?" + Math.random();
            let imgurl163 = "https://cdn.mtcc.ie/static/cctv/0265.jpg?" + Math.random();
            let imgurl23 = "https://cdn.mtcc.ie/static/cctv/0266.jpg?" + Math.random();
            let imgurl264 = "https://cdn.mtcc.ie/static/cctv/0264.jpg";
            document.getElementById("cam163").innerHTML = "<img src=" + imgurl163 + " alt=\"cam\" style=\"width:100%\">";
            document.getElementById("cam137").innerHTML = "<img src=" + imgurl23 + " alt=\"cam\" style=\"width:100%\">";
            document.getElementById("cam6").innerHTML = "<img src=" + imgurl6 + " alt=\"cam\" style=\"width:100%\">";
            document.getElementById("cam264").innerHTML = "<img src=" + imgurl264 + " alt=\"cam\" style=\"width:100%\">";
        }



        // displaytime();
        //    previousParking();
        //    previousM50North();
        //    getPreviousAirQuality();
        //    unemployment();
        //    employment();
        //    crimesTheft();
        //    crimesPublicOrder();
        //    waterLevels();
        //    soundLevels();
        //    weather();
        //    trolleys();
        //    housePricesSecond();
        //    housePrices();
        //    rents();
        //setInterval("displaytime()  ", 1000);

        //                                    / /  setInterval("previousParking()", 60000);
        //  setInterval("previousM50North()", 60000);
        //  setInterval("getPreviousAirQuality()", 60000);
        //  setInterval("unemployment()", 600000);
        //  setInterval("employment()", 600000);
        //  setInterval("crimesTheft()", 600000);
        //  setInterval("crimesPublicOrder()", 600000);

        //    setInterval("waterLevels()", 60000);
        //    setInterval("soundLevels()", 60000);
        //    setInterval("housePrices()", 600000);//10 mins
        //    setInterval("housePricesSecond()", 600000);//10 mins
        //    setInterval("rents()", 600000);//10 mins
        //    setInterval("trolleys()", 600000);
        //    setInterval("weather()", 1200000);//20mins
        //    setInterval("m50South()", 60000);
        //    setInterval("m50North()", 60000);
        //    setInterval("airQuality()", 60000);
        //var currenttime = '<!--#config timefmt="%B %d, %Y %H:%M:%S"--><!--#echo var="DATE_LOCAL" -->' //SSI method of getting server date

//let currenttime
//=   '<?//php print date("F d, Y H:i:s", time()) ?>'; // get server time
//letmontharray = new Array("January", "February", "March","April", "May", "June", "July", "August", "September", "October", "November", "December");
//let serverdate = new Date(currenttime);

//function padlength(what){
//let output=(what.toString().length==1)? "0"+what : what;
//return output;
//}


//function displaytime(){
//serverdate.setSeconds(serverdate.getSeconds()+1);
//let datestring=montharray[serverdate.getMonth()]+" "+padlength(serverdate.getDate())+", "+serverdate.getFullYear();
//let timestring=padlength(serverdate.getHours())+":"+padlength(serverdate.getMinutes())+":"+padlength(serverdate.getSeconds());
//document.getElementById("servertime").innerHTML=datestring+" "+timestring;
//}

//$( function() {
//$( "#alerts" ).accordion();
//} );
    </script>

</html>



