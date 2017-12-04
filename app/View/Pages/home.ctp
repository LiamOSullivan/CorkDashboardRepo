<?php $this->assign('title', 'Home'); ?>

<div class="middle">
    <div style="border-bottom:2px solid #e5e5e5">
       <h1>Cork in Real Time </h1>
    </div>
    <!--    <div id="timewrapper" style="border-bottom:2px solid #e5e5e5">
                <p><span id="servertime"></span></p>
            
        </div>-->

    <div style="border-bottom:2px solid #e5e5e5" >
        <h2>Traffic & Travel</h2>
        <a href="/pages/CorkTravel" class="bordered-feature-image">
            <img src="/img/Dashboard/cork_real_time_travel.png" alt="travel map image"></a>

    </div>
    <!--    <div class="row" style="border-bottom:2px solid #e5e5e5">
            <div class = "col-9" align="center">
                <iframe height="300px" width="100%" src="demo_iframe.htm" name="iframe_a"></iframe>
    
                <a href="https://www.w3schools.com" target="iframe_a"></a>
                <iframe scrolling="no" src="https://www.met.ie/forecasts/county.asp" style="border: 0px none; margin-left: 0px; margin-right: -60px; height: 790px; margin-top: 0px; width: 100%; float: left;">
                </iframe>
            </div> 
        </div>-->

    <div class="col-12" style="border-bottom:2px solid #e5e5e5">
        <h2>Weather</h2>
        <div>
            <div class = "col-6" align="center">
                <iframe target="_blank"  src="http://www.met.ie/widgets/latest-mini.asp" href="http://www.met.ie/widgets/latest-mini.asp" style=" border-width:0 " width="134" height="222" frameborder="0" scrolling="no"></iframe>
            </div>
            <div class = "col-6" align="center">
                <iframe src="http://www.met.ie/widgets/3daysummary.asp" target="_blank" style=" border-width:0 " width="134" height="222" frameborder="0" scrolling="no"></iframe>
            </div>
            <!--            <div class = "col-4" align="center">
                            <iframe src="http://www.met.ie/widgets/charts-mini.asp" target="_blank" style=" border-width:0 " width="134" height="222" frameborder="0" scrolling="no"></iframe>
                                        <img src="img/weather_placeholder.png" style = "width:70%;" alt="weather placeholder"/>
                        </div>-->

        </div>
        <div>
            <p>Source (opens new): <a href="http://www.met.ie" target="_blank"> Met Eireann</a></p>
        </div>
    </div>  
    <!--                        
                            <p>
                                Fermoy Moorepark
                            </p>
                            <p>
                                Cork Airport
                            </p>
                            <p>
                                Sherkin Island
                            </p>
                            <p>
                                Roches Point
                            </p>-->


    <div class="col-12" style="border-bottom:2px solid #e5e5e5">
        <h2>Live Traffic Cams</h2>
        <div class="col-3" >
            <div class="cam_header">
                <h3>Dunkettle IC</h3>
            </div>
        </div>
        <div class="col-6" >
            <div class="cam_header">
                <h3>Jack Lynch Tunnel</h3>
            </div>
        </div>
        <div  class="col-3" >
            <div class="cam_header">
                <h3>N40 Curraheen</h3>
            </div>
        </div>
        <a href="https://cdn.mtcc.ie/static/cctv/0265.jpg" target= "blank">
            <div id="cam163" class="col-3" style="padding: 1vh 1vh 1vh 1vh">
                <div id="cam163"></div>
            </div>
        </a>
        <a href="http://www.jacklynchtunnel.ie/traffic-cameras" target="blank"> 
            <div id="cam6" class="col-3" style="padding: 1vh 1vh 1vh 1vh">
                <div id="cam6"></div>
            </div>
            <div id="cam137" class="col-3" style="padding: 1vh 1vh 1vh 1vh">
                <div id="cam137"></div>
            </div>
        </a>
        <a href="https://cdn.mtcc.ie/static/cctv/0264.jpg" target="blank">
            <div id="cam264" class="col-3" style="padding: 1vh 1vh 1vh 1vh">
                <div id="cam264"></div>
            </div>
        </a>
        <p>Click an image for a larger view. See all Irish camera locations (opens new): <a href="https://www.tiitraffic.ie/cams/" target="blank">Transport Infrastructure Ireland</a>
        </p>
    </div>

    <div class="col-12" style="border-bottom:2px solid #e5e5e5">
        <h2>Latest News</h2>
        <div id="news">
            <ul style="list-style-type:none; padding-left:0px;">
                <li>SEE: New Reporting Tool <a href="https://www.yourcouncil.ie/"> 'Your Council' </a> added to the Cork Dashboard <a href="/pages/CorkReport">here</a></li>
                <li>SEE: Latest <a href="https://www.corkchamber.ie/UserFiles/file/Q1%202017.pdf">Cork Economic Bulletin</a> Q1 2017</li>
                <li>New: Explore Real-Time Transport and Environment data for Cork <a href="/pages/CorkRealtime">here</a></li>
                <li>SEE: Latest Live register figures for Cork using the <a href="http://airo.maynoothuniversity.ie/external-content/live-register-office-monitoring-tool">Social Welfare Monitoring Tool</a></li>
                <li>SEE: Latest <a href="http://data.corkcity.ie/dataset/planning-permission">Cork City Council Planning Applications </a></li>
                <!--<li>SEE: Q4 2016 Cork Economic Bulletin <a href="https://www.corkchamber.ie/UserFiles/file/February%20Final%20Economic%20Bulletin.pdf"> here</a></li>-->
            </ul>
        </div>
    </div>    
    <div style="border-bottom:2px solid #e5e5e5; padding:0px 0px 4vh 0px" class="col-12" >
        <h2>Connect with Cork Smart Gateway:</h2>
        <div class="col-12" style="display: table" >
            <div align="center" class="icon-cell">
                <a href="http://www.corksmartgateway.ie/">
                    <img title="CorkSmartGateway" src="/img/Dashboard/icons/CSG_icon.png" style="height:100%" alt="Cork Smart Gateway"/>
                </a>
            </div>
            <div align="center" class="icon-cell">
                <a href="https://www.linkedin.com/groups/8460601/profile">
                    <img src="/img/Dashboard/icons/Logo-2C-128px-TM.png" style="height:100%" alt="Linked in logo"/>
                </a>
            </div>
            <div align="center" class="icon-cell">
                <a href="https://twitter.com/SmartCork">
                    <img src="/img/Dashboard/icons/Twitter_Logo_Blue.png" style="height:100%" alt="twitter logo"/>
                </a>
            </div>
        </div>

    </div>
</div>
<div class="right" id="rightContent">
    <div style="border-bottom:2px solid #e5e5e5;" >
        <h1>Data at a Glance</h1>
    </div>
    <p style="padding-bottom: 0px"> Hover over the charts for data, click to go to the detailed versions<p>
    <div class="row" style="border-bottom:2px solid #e5e5e5; ">
        <h2>Average Residential Rent</h2>
        <a href="/./Housings/stats#tab71">    
            <div style="min-height: 200px">
                <canvas id="cork_residential_rents" width="100%" ></canvas>
            </div>
        </a>
    </div>
    <div class="row" style="border-bottom:2px solid #e5e5e5;" >
        <h2>Average House Price</h2>
        <a href="/./Housings/stats#tab11">    
            <div style="min-height: 200px">
                <canvas id="cork_house_prices" width="100%" ></canvas>
            </div>
        </a>
    </div>    
    <div class="row" style="border-bottom:2px solid #e5e5e5;">
        <h2>Planning Applications</h2>
        <h3>City</h3>
        <a href="/./Housings/stats#tab21"> 
            <div style="min-height: 200px">
                <canvas id="city_planning_applications" width="100%" ></canvas>
            </div>
        </a>

        <h3>County</h3>
        <a href="/./Housings/stats#tab221"> 
            <div style="min-height: 200px">
                <canvas id="county_planning_applications" width="100%" ></canvas>
            </div>
        </a>

    </div>
    <div class="row" style="border-bottom:2px solid #e5e5e5">
        <h2> A Twitter List by <a href="https://twitter.com/CorkDashboard/lists/cork-dashboard">@CorkDashboard</a></h2>
        <div id="twitter_container" height='600px' align="center">

            <a class="twitter-timeline"
               href="https://twitter.com/CorkDashboard/lists/cork-dashboard"
               data-width="80%"
               data-tweet-limit="2"
               data-chrome="noheader nofooter"
               scrollbar = "true">

            </a>
            <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
    </div>
</div>

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
