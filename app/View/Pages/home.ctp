<?php $this->assign('title', 'Home'); ?>

<div class="middle">
    <div style="border-bottom:2px solid #e5e5e5">
        <header>
            <h1>Cork in Real Time </h1>
            <br>
        </header>
    </div>
    <!--    <div id="timewrapper" style="border-bottom:2px solid #e5e5e5">
                <p><span id="servertime"></span></p>
            
        </div>-->

    <div class="row" style="border-bottom:2px solid #e5e5e5" >
        <h2>Car Parks and Rental Bikes</h2>

        <a href="/pages/CorkTravel" class="bordered-feature-image">
            <img src="/img/Dashboard/cork_real_time_travel.png" alt="travel map image"></a>
        <br>

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
        <div class = "col-4" align="center">
            <iframe target="_blank"  src="http://www.met.ie/widgets/latest-mini.asp" href="http://www.met.ie/widgets/latest-mini.asp" style=" border-width:0 " width="134" height="222" frameborder="0" scrolling="no"></iframe>
        </div>
        <div class = "col-4" align="center">
            <iframe src="http://www.met.ie/widgets/3daysummary.asp" target="_blank" style=" border-width:0 " width="134" height="222" frameborder="0" scrolling="no"></iframe>
        </div>
        <div class = "col-4" align="center">
            <iframe src="http://www.met.ie/widgets/charts-mini.asp" target="_blank" style=" border-width:0 " width="134" height="222" frameborder="0" scrolling="no"></iframe>
                        <!--<img src="img/weather_placeholder.png" style = "width:70%;" alt="weather placeholder"/>-->
        </div>
        <p>Source (opens new): <a href="http://www.met.ie" target="_blank"> Met Eireann</a></p>

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
        <p>Click an image for a larger view</p>
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
        <div class="col-3" >
             <div class="cam_header">
                <h3>N40 Curraheen</h3>
            </div>
        </div>
        <a href="https://cdn.mtcc.ie/static/cctv/0265.jpg" target= "blank">
            <div id="cam163" class="col-3" >
                <div id="cam163"></div>
            </div>
        </a>

        <a href="http://www.jacklynchtunnel.ie/traffic-cameras" target="blank"> 
            <div id="cam6" class="col-3" >
                <div id="cam6"></div>
            </div>
            <div id="cam137" class="col-3" >
                <div id="cam137"></div>
            </div>
        </a>
        <a href="https://cdn.mtcc.ie/static/cctv/0264.jpg" target="blank">
            <div id="cam264" class="col-3" >
                <div id="cam264"></div>
            </div>
        </a>
        
        <p>See all (opens new): <a href="https://www.tiitraffic.ie/cams/" target="blank">Transport Infrastructure Ireland</a>
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
    <div class="col-12" >
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
        <br>
    </div>
    <div class="row" style="border-bottom:2px solid #e5e5e5; ">
        <h2>Average Residential Rent</h2>
        <div style="min-height: 200px">
            <canvas id="cork_residential_rents" width="100%" ></canvas>
        </div>
    </div>
    <div class="row" style="border-bottom:2px solid #e5e5e5;" >
        <h2>Average House Price</h2>
        <div style="min-height: 200px">
            <canvas id="cork_house_prices" width="100%" ></canvas>
        </div>
    </div>    
    <div class="row" style="border-bottom:2px solid #e5e5e5;">
        <h2>Planning Applications</h2>
        <h3>County</h3>
        <div style="min-height: 200px">
            <canvas id="county_planning_applications" width="100%" ></canvas>
        </div>

        <h3>City</h3>
        <div style="min-height: 200px">
            <canvas id="city_planning_applications" width="100%" ></canvas>
        </div>

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
<!--                <div>
                    <a href="https://twitter.com/SmartCork">
                        Smart Cork Twitter Icon Here
                        <img src="img/icons/twitter.png" alt=""/>
                        <img src="img/icons/Twitter_Logo_Blue.png" alt="twitter logo"/>
                        <img src="../Dashboard/images/icons/twitter.png" alt=""/>
                    <img src="../Dashboard/images/icons/twitter.png" alt="Twitter" width="55" height="55" />
                    </a>
                    <br>
                    <a href="https://www.linkedin.com/groups/8460601/profile">
                       Linked in icon here <img title="LinkedIn" src="/dublindashboard/img/Dashboard/icons/linkedin.png" alt="Linkedin" width="55" height="55" />
                    </a>
                    <br>
                    
                    <br>
                </div> 
-->
<!--                                                    <script>!function (d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
if (!d.getElementById(id)) {
js = d.createElement(s);
js.id = id;
js.src = p + "://platform.twitter.com/widgets.js";
fjs.parentNode.insertBefore(js, fjs);
}
}(document, "script", "twitter-wjs");</script>-->



<!--</center>-->
<!--<div class="overview">--> 
<!--                                <a href="http://www.jacklynchtunnel.ie/traffic-cameras"> 
                                    <div id="02a1" height="100%">
                                        <table style="width:100%" bgcolor="#E5E5E5"  >
                                            <tr style="height:100px">
                                                <td style="width:60%"><div id="cam6"></div></td>
                                                 <td style="width:60%">Jack Lynch Tunnel 1</td>
                                            </tr>
                                        </table>
                                </a>-->
<!--</div>--> 
<!--</div>-->
<!--<div id="containerA" class="col span_1_of_3" >-->
<!--<div id="cam137"></div>-->
<!--<div class="overview">--> 
<!--                                <a href="http://www.jacklynchtunnel.ie/traffic-cameras">
                                    <div id="02b1" height="100%">
                                        <table style="width:100%" bgcolor="#E5E5E5" >
                                            <tr style="height:100px">
                                                <td style="width:60%">
                                                    <div id="cam137"></div></td>
                                                <td style="width:50%"><div id ="">Jack Lynch Tunnel 2</div></td>	
                                            </tr>   

                                        </table>
                                    </div> -->

<!--</div>--> 
<!--</a>-->
<!--                        </div>
                            <div id="containerA" class="col span_1_of_3" >-->
<!--<div id="cam163"></div>-->
<!--<div class="overview">--> 
<!--                                    <a href="http://www.jacklynchtunnel.ie/traffic-cameras"> <div id="01c1" height="100%">
                                            <table style="width:100%" bgcolor="#E5E5E5">
                                                <tr style="height:100px">
                                                    <td style="width:60%"><div id="cam163"></div></td>
                                                    <td style="width:50%"><div id ="">Dunkettle Interchange</div></td>

                                                </tr>

                                            </table>
                                        </div> -->
<!--</a>-->
<!--</div>--> 









<!-- Content -->
<!--    <div id="content-wrapper">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="2u">
                         Sidebar 
                        <section>
                            <header>
                                <h2>Other Data Modules</h2>
                            </header>
                            <ul class="link-list">
<?//php //echo $this->element('sidebar'); ?>
                            </ul>
                        </section>
                    </div>
                </div>-->



<!--    <div class="10u important(collapse)">
        Main Content 
        <section>
            <
            <div id="headcontainer">
            </div>
            <div id="maincontentcontainer">
                <script src="http://www.chartjs.org/dist/2.6.0/Chart.bundle.js"></script>
                <script src="http://www.chartjs.org/samples/2.6.0/utils.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                <script src ="/js/cork_data_charts.js"></script>

                <h2>Traffic Cameras</h2>
                <center>                  
                    <div class="section group">
                        <div id="containerA" class="col span_1_of_3" >
                            <div class="overview"> 
                                <a href="http://www.jacklynchtunnel.ie/traffic-cameras"> 
                                    <div id="02a1" height="100%">
                                        <table style="width:100%" bgcolor="#E5E5E5"  >
                                            <tr style="height:100px">
                                                <td style="width:60%"><div id="cam6"></div></td>
                                                <td style="width:60%">Jack Lynch Tunnel 1</td>
                                            </tr>
                                        </table>
                                </a>
                            </div> 
                        </div>
                        <div id="containerA" class="col span_1_of_3" >
                            <div class="overview"> 
                                <a href="http://www.jacklynchtunnel.ie/traffic-cameras">
                                    <div id="02b1" height="100%">
                                        <table style="width:100%" bgcolor="#E5E5E5" >
                                            <tr style="height:100px">
                                                <td style="width:60%"><div id="cam137"></div></td>
                                                <td style="width:50%"><div id ="">Jack Lynch Tunnel 2</div></td>	
                                            </tr>

                                        </table>
                                    </div> 

                            </div> 
                            </a>
                        </div>

                        <div id="containerA" class="col span_1_of_3" >
                            <div class="overview"> 
                                <a href="http://www.jacklynchtunnel.ie/traffic-cameras"> <div id="01c1" height="100%">
                                        <table style="width:100%" bgcolor="#E5E5E5">
                                            <tr style="height:100px">
                                                <td style="width:60%"><div id="cam163"></div></td>
                                                <td style="width:50%"><div id ="">Dunkettle Interchange</div></td>

                                            </tr>

                                        </table>
                                    </div> 
                                </a>
                            </div> 
                        </div>
                    </div>    
                </center>-->
<!--##################################  created iframe from dublin_travel.ctp ###########################################-->  

<!--<h2>Real Time Car Parks and Bikes</h2> (View in <a href="http://149.157.67.17/pages/DublinTravel" target="_blank">full screen </a>)| Weather forecast via <a href="https://www.met.ie/forecasts/county.asp" target="_blank">Met Eireann</a></h2>

<div style="border: 0px solid rgb(255, 255, 255); overflow: hidden; margin: 0px ; max-width:1500px;">
<iframe scrolling="no" src="http://149.157.67.17/pages/DublinTravel" style="border: 0px none; margin-left: -270px; margin-right: -60px; height: 1000px; margin-top: -460px; width: 1000px; float: left;">
</iframe>    	 						
<div style="border: 0px solid rgb(255, 255, 255); overflow: hidden; margin: 0px ; max-width: 1000px;">
<iframe scrolling="no" src="https://www.met.ie/forecasts/county.asp" style="border: 0px none; margin-left: -180px; margin-right: -60px; height: 790px; margin-top: -250px; width: 1000px; float: left;">
</iframe>
</div>

<!--                    <h2>Indicators</h2>
                        <body>
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <canvas id="cork_carparks" width="200" height="200"></canvas>
                                    </div>
                                    <div class="col-xs-3">
                                        <canvas id="cork_house_prices" width="200" height="200"></canvas>
                                    </div>

                                    <div class="col-xs-3">
                                        <canvas id="cork_residential_rents" width="200" height="200"></canvas>

                                    </div>
                                    <div class="col-xs-3">
                                        <canvas id="airquality" style="width: 200px; height: 200px; margin: 0 auto; font-size:180%"></canvas>
                                    </div>
                                </div>
                            </div>
                            
                            
                     Content 
                    <div id="content-wrapper">
                        <div id="content">
                            <div class="container">
                                <div class="row">
                                    <div class="6u">
                                         Box #2 
                                        <section>
                                            <header>
                                            <h2>Latest News</h2>
                                            </header>
                                            <ul class="check-list">
                                                <li>SEE: New Reporting Tool <a href="https://www.yourcouncil.ie/"> 'Your Council' </a> added to the Cork Dashboard <a href="/pages/DublinReport">here</a></li>
                                                <li>SEE: Latest <a href="chrome-extension://oemmndcbldboiebfnladdacbdfmadadm/https://www.corkchamber.ie/UserFiles/file/Q1%202017.pdf">Cork Economic Bulletin</a> Q1 2017</li>
                                                <li>New: Explore Real-Time Transport and Environment data for Cork <a href="/pages/DublinRealtime">here</a></li>
                                                <li>SEE: Latest Live register figures for Cork using the <a href="http://airo.maynoothuniversity.ie/external-content/live-register-office-monitoring-tool">Social Welfare Monitoring Tool</a></li>
                                                <li>SEE: Latest <a href="http://data.corkcity.ie/dataset/planning-permission">Cork City Council Planning Applications </a></li>
                                                <li>SEE: Q4 2016 Cork Economic Bulletin <a href="https://www.corkchamber.ie/UserFiles/file/February%20Final%20Economic%20Bulletin.pdf"> here</a></li>

                                            </ul>
                                        </section>
                                    </div>
                                    
                                    <div class="6u">
                                         Box #3 
                                        <section>
                                            <header>
                                            <h2>Connect with Cork Smart Gateway</h2>
                                            <div>
                                                <a href="https://twitter.com/SmartCork">
                                                    Smart Cork Twitter Icon Here
                                                    <img src="../Dashboard/images/icons/twitter.png" alt=""/>
                                                <img src="../Dashboard/images/icons/twitter.png" alt="Twitter" width="55" height="55" />
                                                </a>
                                                <br>
                                                <a href="https://www.linkedin.com/groups/8460601/profile">
                                                   Linked in icon here <img title="LinkedIn" src="/dublindashboard/img/Dashboard/icons/linkedin.png" alt="Linkedin" width="55" height="55" />
                                                </a>
                                                <br>
                                                <a href="http://www.corksmartgateway.ie/">
                                                    CorkSG icon here
                                                    <img title="CorkSmartGateway" src="/dublindashboard/img/Dashboard/icons/CSG_icon.png" alt="CorkSmartGateway" width="55" height="55" />
                                                </a>
                                                <br>
                                            </div>
                                            <a class="twitter-timeline" width="520"  height="500" href="https://twitter.com/CorkDashboard/lists/cork-dashboard">A Twitter List by CorkDashboard</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                                                    <script>!function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
            if (!d.getElementById(id)) {
                js = d.createElement(s);
                js.id = id;
                js.src = p + "://platform.twitter.com/widgets.js";
                fjs.parentNode.insertBefore(js, fjs);
            }
        }(document, "script", "twitter-wjs");</script>
                                             </section>
                                    </div>
                                    
                                    <div class="6u">-->





<!--                                                            function populations() {


                                                                $.get("/Overview/currentPopulation/1", function (point) {

                                                                    values = JSON.parse(point);
                                                                    pop1 = values[values.length - 2][1]; //older
                                                                    pop2 = values [values.length - 1][1]; //newest       

                                                                    if (pop1 < pop2) {
                                                                        document.getElementById("populationarrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                                                                    } else if (pop2 < pop1) {
                                                                        document.getElementById("populationarrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                                                                    } else {
                                                                        document.getElementById("populationarrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/no_change_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                                                                    }
                                                                    //inject into the div
                                                                    document.getElementById("population").innerHTML = "Population of Dublin " + pop2;

                                                                });



                                                            }

                                                            function unemployment() {
                                                                $.get("/Overview/unemployment/1", function (point) {

                                                                    values = JSON.parse(point);
                                                                    unem1 = values[values.length - 2][1]; //older
                                                                    unem2 = values [values.length - 1][1]; //newest

                                                                    if (unem1 < unem2) {
                                                                        document.getElementById("unemploymentarrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                                                                    } else if (unem2 < unem1) {
                                                                        document.getElementById("unemploymentarrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                                                                    } else {
                                                                        document.getElementById("unemploymentarrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/no_change_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                                                                    }

                                                                    //inject into the div
                                                                    document.getElementById("unemployment").innerHTML = "Unemployed in Cork: " + unem2 + "000";

                                                                });

                                                            }

                                                            function employment() {
                                                                $.get("/Overview/employment/1", function (point) {

                                                                    values = JSON.parse(point);

                                                                    em1 = values[values.length - 2][1]; //older
                                                                    em2 = values [values.length - 1][1]; //newest

                                                                    if (em1 < em2) {
                                                                        document.getElementById("employmentarrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                                                                    } else if (em2 < em1) {
                                                                        document.getElementById("employmentarrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                                                                    } else {
                                                                        document.getElementById("employmentarrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/no_change_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                                                                    }

                                                                    //inject into the div
                                                                    document.getElementById("employment").innerHTML = "Employed in Cork: " + em2 + "000";

                                                                });

                                                            }

                                                            function crimesTheft() {

                                                                $.get("/Overview/crimesTheft/1", function (point) {
                                                                    values = JSON.parse(point);

                                                                    crimes1 = values[values.length - 2][1]; //older
                                                                    crimes2 = values [values.length - 1][1]; //newest

                                                                    if (crimes1 < crimes2) {
                                                                        document.getElementById("crime1arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                                                                    } else if (crimes2 < crimes1) {
                                                                        document.getElementById("crime1arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                                                                    } else {
                                                                        document.getElementById("crime1arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/no_change_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                                                                    }

                                                                    //inject into the div
                                                                    document.getElementById("crime1").innerHTML = "Number of  Theft  &    Related    Offences in  Cork: " + crimes2 + "";

                                                                });

                                                            }



                                                            function trolleys() {

                                                                $.get("/Overview/trolleys/1", function (point) {

                                                                    values = JSON.parse(point);

                                                                    trolleys1 = values[0]; //older
                                                                    trolleys2 = values [1]; //newest

                                                                    if (trolleys1 < trolleys2) {
                                                                        document.getElementById("trolleyarrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                                                                    } else if (trolleys2 < trolleys1) {
                                                                        document.getElementById("trolleyarrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                                                                    } else {
                                                                        document.getElementById("trolleyarrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/no_change_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                                                                    }

                                                                    //inject into the div
                                                                    document.getElementById("trolley").innerHTML = "Number of people waitng on trolleys in Cork Hospitals: " + trolleys2 + "";

                                                                });

                                                            }


                                                            function crimesPublicOrder() {

                                                                $.get("/Overview/crimesPublicOrder/1", function (point) {
                                                                    values = JSON.parse(point);

                                                                    crimes1 = values[values.length - 2][1]; //older
                                                                    crimes2 = values [values.length - 1][1]; //newest

                                                                    if (crimes1 < crimes2) {
                                                                        document.getElementById("crime2arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                                                                    } else if (crimes2 < crimes1) {
                                                                        document.getElementById("crime2arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                                                                    } else {
                                                                        document.getElementById("crime2arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/no_change_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                                                                    }

                                                                    //inject into the div
                                                                    document.getElementById("crime2").innerHTML = "Number of Public Order & Social Code Offences in Cork: " + crimes2 + "";

                                                                });

                                                            }

                                                            function housePrices() {
                                                                $.get("/Overview/housing/1/2", function (point) {

                                                                    hvalues = JSON.parse(point);
                                                                    prevPrice = hvalues[hvalues.length - 2][1]; //older
                                                                    currentPrice = hvalues [hvalues.length - 1][1]; //newest


                                                                    if (prevPrice < currentPrice) {
                                                                        document.getElementById("houseprice1arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                                                                    } else if (currentPrice < prevPrice) {
                                                                        document.getElementById("houseprice1arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                                                                    } else {
                                                                        document.getElementById("houseprice1arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/no_change_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                                                                    }

                                                                    //inject into the div
                                                                    document.getElementById("houseprice").innerHTML = "Average cost of new-build house in Cork €" + currentPrice;

                                                                });

                                                            }

                                                            function housePricesSecond() {
                                                                $.get("/Overview/housing/1/3", function (point) {

                                                                    hvalues = JSON.parse(point);
                                                                    prevPrice = hvalues[hvalues.length - 2][1]; //older
                                                                    currentPrice = hvalues [hvalues.length - 1][1]; //newest


                                                                    if (prevPrice < currentPrice) {
                                                                        document.getElementById("houseprice2arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                                                                    } else if (currentPrice < prevPrice) {
                                                                        document.getElementById("houseprice2arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                                                                    } else {
                                                                        document.getElementById("houseprice2arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/no_change_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                                                                    }

                                                                    //inject into the div
                                                                    document.getElementById("houseprice2").innerHTML = "Average cost of pre-owned house in Cork €" + currentPrice;

                                                                });

                                                            }


                                                            function rents() {
                                                                $.get("/Overview/rents/1", function (point) {

                                                                    hvalues = JSON.parse(point);
                                                                    prevPrice = hvalues[hvalues.length - 2][1]; //older
                                                                    currentPrice = hvalues [hvalues.length - 1][1]; //newest


                                                                    if (prevPrice < currentPrice) {
                                                                        document.getElementById("rentarrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                                                                    } else if (currentPrice < prevPrice) {
                                                                        document.getElementById("rentarrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                                                                    } else {
                                                                        document.getElementById("rentarrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/no_change_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">"
                                                                    }

                                                                    //inject into the div
                                                                    document.getElementById("rent").innerHTML = "Average monthly residential rent in Cork €" + currentPrice;

                                                                });

                                                            }

                                                            function getPreviousAirQuality() {
                                                                $.get("/CarParks/getPreviousAirQuality").done(function (point) {
                                                                    obj = JSON.parse(point);
                                                                    var count = 6; //there are 6 results in the return
                                                                    for (var i = 0; i < count; i++) {
                                                                        if (obj.aqihsummary[i]["aqih-region"] == "Cork_City") {
                                                                            oldAirQual = obj.aqihsummary[i].aqih;
                                                                        }
                                                                    }
                                                                    airQuality();
                                                                })


                                                            }

                                                            function airQuality() {

                                                                $.get("/CarParks/airQuality", function (point) {

                                                                    obj = JSON.parse(point);
                                                                    var count = 6; //there are 6 results in the return
                                                                    for (var i = 0; i < count; i++) {
                                                                        if (obj.aqihsummary[i]["aqih-region"] == "Cork_City") {
                                                                            var airReport = "Current Air Quality Index for Health for " + obj.aqihsummary[i]["aqih-region"] + " is " + obj.aqihsummary[i].aqih;
                                                                            newAirQual = obj.aqihsummary[i].aqih;
                                                                        }
                                                                    }

                                                                    if (newAirQual == oldAirQual) {
                                                                        document.getElementById("airqualarrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/no_change_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">";

                                                                    } else if (newAirQual.charAt(0) > oldAirQual.charAt(0)) { //decreasing
                                                                        document.getElementById("airqualarrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">";

                                                                    } else if (newAirQual.charAt(0) < oldAirQual.charAt(0)) { //increasing
                                                                        document.getElementById("airqualarrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"Up_Arrow\" style=\"width:100%\">";

                                                                    }
                                                                    document.getElementById("airqual").innerHTML = airReport;
                                                                });
                                                            }

-->

<!--//                                                            function previousM50North() {
//                                                                $.get("/CarParks/previousTravelTimes").done(function (point) {
//                                                                    obj = JSON.parse(point);
//                                                                    var previousNumberOfDataPoints = obj.M50_northBound.data.length; //number of junctions
//                                                                    previousFullTravelTime = Math.round(obj.M50_northBound.data[(previousNumberOfDataPoints) - 1].current_travel_time / 60);
//                                                                    var previousFullFreeFlowTraveTime = Math.round(obj.M50_northBound.data[(previousNumberOfDataPoints) - 1].free_flow_travel_time / 60);
//
//                                                                    var previousSouthNumberOfDataPoints = obj.M50_southBound.data.length; //number of junctions
//                                                                    previousSouthFullTravelTime = Math.round(obj.M50_southBound.data[(previousSouthNumberOfDataPoints) - 1].current_travel_time / 60);
//
//                                                                    var previousSouthFullFreeFlowTraveTime = Math.round(obj.M50_southBound.data[(previousSouthNumberOfDataPoints) - 1].free_flow_travel_time / 60);
//
//                                                                    m50North();
//                                                                });
//                                                            }
//
//
//                                                            function m50North() {
//                                                                $.get("/CarParks/travelTimes", function (point) {
//                                                                    obj = JSON.parse(point);
//
//                                                                    var numberOfDataPoints = obj.M50_northBound.data.length; //number of junctions
//                                                                    var fullTravelTime = Math.round(obj.M50_northBound.data[(numberOfDataPoints) - 1].current_travel_time / 60);
//                                                                    var fullFreeFlowTraveTime = Math.round(obj.M50_northBound.data[(numberOfDataPoints) - 1].free_flow_travel_time / 60);
//
//                                                                    var southNumberOfDataPoints = obj.M50_southBound.data.length; //number of junctions
//                                                                    var southFullTravelTime = Math.round(obj.M50_southBound.data[(southNumberOfDataPoints) - 1].current_travel_time / 60);
//                                                                    var southFullFreeFlowTraveTime = Math.round(obj.M50_southBound.data[(southNumberOfDataPoints) - 1].free_flow_travel_time / 60);
//
//
//                                                                    //North
//                                                                    if (fullTravelTime == previousFullTravelTime) {
//                                                                        document.getElementById("m50Northarrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/no_change_white.png\" alt=\"no_change_Arrow\" style=\"width:100%\">"
//                                                                    } else if (fullTravelTime < previousFullTravelTime) {
//                                                                        document.getElementById("m50Northarrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"down_Arrow\" style=\"width:100%\">"
//                                                                    } else {
//                                                                        document.getElementById("m50Northarrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"up_Arrow\" style=\"width:100%\">"
//                                                                    }
//
//                                                                    //South
//                                                                    if (southFullTravelTime == previousSouthFullTravelTime) {
//                                                                        document.getElementById("m50Southarrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/no_change_white.png\" alt=\"no_change_Arrow\" style=\"width:100%\">"
//                                                                    } else if (southFullTravelTime < previousSouthFullTravelTime) {
//                                                                        document.getElementById("m50Southarrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"down_Arrow\" style=\"width:100%\">"
//                                                                    } else {
//                                                                        document.getElementById("m50Southarrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"up_Arrow\" style=\"width:100%\">"
//                                                                    }
//
//                                                                    document.getElementById("m50North").innerHTML = "Current Drive Time M50 North " + fullTravelTime + " minutes";
//                                                                    document.getElementById("m50South").innerHTML = "Current Drive Time M50 South " + southFullTravelTime + " minutes";
//                                                                });
//                                                            }



                                                            /* function previousParking(){          
                                                             $.get("/CarParks/totalParking/1.json").done(function(point){
                                                             previousParking = point[0];
                                                             currentParking = point[1];
       
       
                                                             currentParking();
                                                             });
                                                             }*/

                                                            function previousParking() {
                                                                //   $.get("/CarParks/totalParking/1").done(function(point2){
                                                                //     currentParking = point2;
                                                                $.get("/CarParks/totalParking/1.json").done(function (point) {

                                                                    $obj = JSON.parse(point);

                                                                    previousParking = $obj[1];
                                                                    currentParking = $obj[0];

                                                                    if (currentParking < previousParking) {
                                                                        document.getElementById("carparkarrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"down_Arrow\" style=\"width:100%\">"
                                                                    } else if (currentParking > previousParking) {
                                                                        document.getElementById("carparkarrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"up_Arrow\" style=\"width:100%\">"
                                                                    } else {
                                                                        document.getElementById("carparkarrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/no_change_white.png\" alt=\"no_change_Arrow\" style=\"width:100%\">"
                                                                    }


                                                                    document.getElementById("carpark").innerHTML = "Current Parking Spaces in Cork " + currentParking;

                                                                });
                                                            }


                                                            function waterLevels() {



                                                                $.get("/CarParks/hydroLevels", function (point) {
                                                                    obj = JSON.parse(point);

                                                                    /*  $waterLevel[0] = "Broadmeadow";
                                                                     $waterLevel[1] = 53.475001;
                                                                     $waterLevel[2] = -6.231767; 
                                                                     $waterLevel[3] = $waterLevelA[sizeOf($waterLevelA)-2]; //current
                                                                     $waterLevel[4] = $waterLevelA[sizeOf($waterLevelA)-1]; //current
                                                                     $waterLevel[5] = $waterLevelA[sizeOf($waterLevelA)-10]; //previous hour
                                                                     $waterLevel[6] = $waterLevelA[sizeOf($waterLevelA)-9]; //previous hour
                                                                     */
                                                                    var river0 = obj[0];
                                                                    var currentLevel0 = obj[4];
                                                                    var prevLevel0 = obj[6];

                                                                    var river1 = obj[14];
                                                                    var currentLevel1 = obj[18];
                                                                    var prevLevel1 = obj[20];

                                                                    var river2 = obj[28];
                                                                    var currentLevel2 = obj[32];
                                                                    var prevLevel2 = obj[34];

                                                                    if (currentLevel0 < prevLevel0) { //decrease
                                                                        document.getElementById("river1arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"down_Arrow\" style=\"width:100%\">"
                                                                    } else if (currentLevel0 > prevLevel0) { //increase
                                                                        document.getElementById("river1arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"up_Arrow\" style=\"width:100%\">"
                                                                    } else {
                                                                        document.getElementById("river1arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/no_change.png\" alt=\"no_change_Arrow\" style=\"width:100%\">"
                                                                    }

                                                                    document.getElementById("river1").innerHTML = "Water level at " + river0 + " is " + currentLevel0 + "m		";


                                                                    //river 2
                                                                    if (currentLevel1 < prevLevel1) { //decrease
                                                                        document.getElementById("river2arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"down_Arrow\" style=\"width:100%\">"
                                                                    } else if (currentLevel1 > prevLevel1) { //increase
                                                                        document.getElementById("river2arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"up_Arrow\" style=\"width:100%\">"
                                                                    } else {
                                                                        document.getElementById("river2arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/no_change.png\" alt=\"no_change_Arrow\" style=\"width:100%\">"
                                                                    }

                                                                    document.getElementById("river2").innerHTML = "Water level at " + river1 + " is " + currentLevel1 + "m";


                                                                    //river 3
                                                                    if (currentLevel2 < prevLevel2) { //decrease
                                                                        document.getElementById("river3arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"down_Arrow\" style=\"width:100%\">"
                                                                    } else if (currentLevel2 > prevLevel2) { //increase
                                                                        document.getElementById("river3arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"up_Arrow\" style=\"width:100%\">"
                                                                    } else {
                                                                        document.getElementById("river3arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/no_change.png\" alt=\"no_change_Arrow\" style=\"width:100%\">"
                                                                    }

                                                                    document.getElementById("river3").innerHTML = "Water  level  at  " + river2 + "    (Dublin)   is   " + currentLevel2 + "m"



                                                                });
                                                            }



                                                            //sound levels
                                                            function weather(site) {

                                                                $.get("/CarParks/weather/1", function (point) {
                                                                    obj = JSON.parse(point);

                                                                    var lat = obj.current_observation.display_location.latitude;
                                                                    var lon = obj.current_observation.display_location.longitude;
                                                                    var name = obj.current_observation.observation_location.city;
                                                                    var currentTemp = obj.current_observation.temp_c;
                                                                    var currentWeather = obj.current_observation.weather;
                                                                    var url = obj.current_observation.ob_url;
                                                                    var icon = obj.current_observation.icon_url;

                                                                    document.getElementById("weather1Icon").innerHTML = "<img src=\"" + icon + "\" alt=\"down_Arrow\" style=\"width:100%\">"
                                                                    document.getElementById("weather1").innerHTML = "Weather at " + name + " temp: " + currentTemp + " Celcius";
                                                                });

                                                                $.get("/CarParks/weather/2", function (point) {
                                                                    obj = JSON.parse(point);

                                                                    var lat = obj.current_observation.display_location.latitude;
                                                                    var lon = obj.current_observation.display_location.longitude;
                                                                    var name = obj.current_observation.observation_location.city;
                                                                    var currentTemp = obj.current_observation.temp_c;
                                                                    var currentWeather = obj.current_observation.weather;
                                                                    var url = obj.current_observation.ob_url;
                                                                    var icon = obj.current_observation.icon_url;

                                                                    document.getElementById("weather2Icon").innerHTML = "<img src=\"" + icon + "\" alt=\"down_Arrow\" style=\"width:100%\">"
                                                                    document.getElementById("weather2").innerHTML = "Weather at " + name + " temp: " + currentTemp + " Celcius";
                                                                });

                                                            }

                                                            //sound levels
                                                            function soundLevels(site) {

                                                                $.get("/CarParks/ambientSound10", function (point) {
                                                                    obj = JSON.parse(point);
                                                                    var count = Number(obj.entries)
                                                                    var lastEntry = count - 1;
                                                                    var previousValue = obj.aleq[lastEntry - 12];
                                                                    var previousTime = obj.times[lastEntry - 12];
                                                                    var previousDate = obj.dates[lastEntry - 12];
                                                                    var value = obj.aleq[lastEntry];
                                                                    var currentTime = obj.times[lastEntry];
                                                                    var currentDate = obj.dates[lastEntry];



                                                                    if (value < previousValue) { //decrease
                                                                        document.getElementById("sound1arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"down_Arrow\" style=\"width:100%\">"
                                                                    } else if (value > previousValue) { //increase
                                                                        document.getElementById("sound1arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"up_Arrow\" style=\"width:100%\">"
                                                                    } else {
                                                                        document.getElementById("sound1arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/no_change.png\" alt=\"no_change_Arrow\" style=\"width:100%\">"
                                                                    }

                                                                    document.getElementById("sound1").innerHTML = "Sound level at Irishtown Stadium is " + value + "db";
                                                                });


                                                                $.get("/CarParks/ambientSound11", function (point) {
                                                                    obj = JSON.parse(point);
                                                                    var count = Number(obj.entries)
                                                                    var lastEntry = count - 1;
                                                                    var previousValue = obj.aleq[lastEntry - 12];
                                                                    var previousTime = obj.times[lastEntry - 12];
                                                                    var previousDate = obj.dates[lastEntry - 12];
                                                                    var value = obj.aleq[lastEntry];
                                                                    var currentTime = obj.times[lastEntry];
                                                                    var currentDate = obj.dates[lastEntry];




                                                                    if (value < previousValue) { //decrease
                                                                        document.getElementById("sound2arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"down_Arrow\" style=\"width:100%\">"
                                                                    } else if (value > previousValue) { //increase
                                                                        document.getElementById("sound2arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"up_Arrow\" style=\"width:100%\">"
                                                                    } else {
                                                                        document.getElementById("sound2arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/no_change.png\" alt=\"no_change_Arrow\" style=\"width:100%\">"
                                                                    }

                                                                    document.getElementById("sound2").innerHTML = "Sound  level at  Chancery Park (Dublin) is  " + value + "db";
                                                                });

                                                                $.get("/CarParks/ambientSound12", function (point) {
                                                                    obj = JSON.parse(point);
                                                                    var count = Number(obj.entries)
                                                                    var lastEntry = count - 1;
                                                                    var previousValue = obj.aleq[lastEntry - 12];
                                                                    var previousTime = obj.times[lastEntry - 12];
                                                                    var previousDate = obj.dates[lastEntry - 12];
                                                                    var value = obj.aleq[lastEntry];
                                                                    var currentTime = obj.times[lastEntry];
                                                                    var currentDate = obj.dates[lastEntry];




                                                                    if (value < previousValue) { //decrease
                                                                        document.getElementById("sound3arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/down_white.png\" alt=\"down_Arrow\" style=\"width:100%\">"
                                                                    } else if (value > previousValue) { //increase
                                                                        document.getElementById("sound3arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/up_white.png\" alt=\"up_Arrow\" style=\"width:100%\">"
                                                                    } else {
                                                                        document.getElementById("sound3arrow").innerHTML = "<img src=\"/dublindashboard/img/Dashboard/no_change.png\" alt=\"no_change_Arrow\" style=\"width:100%\">"
                                                                    }

                                                                    document.getElementById("sound3").innerHTML = "Sound level at Blessington Street Basin is " + value + "db";
                                                                });

                                                            }
                                                        </script> -->








<!--</body>-->		





<!--                                                    </div>
                                                    </div>
                                                    </div>-->

<!--		<!-- Footer -->
<!--                                                    <div id="footer-wrapper">

                                                        <footer id="footer" class="container">


                                                            <div class="row">


/******************************* what is writeBuffer() ???*************************************/
<?//php
//echo $this->element('dbFooter');
//echo $this->Js->writeBuffer();
?>











