<?php $this->assign('title', "Data Indicators"); ?>
<div class="onlyContent">
    <!--//<div style="overflow:auto">-->
    <div style="border-bottom:2px solid #e5e5e5">
        <h1>Data Indicators</h1>
    </div>
    <div style="padding-bottom:1vh">
        <h3>See historical trends in Cork for a range of sectors including 
            industry and employment, environment and transport, housing, 
            population, health and education and crime and emergency services. </h3>
        <p>Click on an indicator category to see the information appear below.

        </p>
    </div>

    <form id="MyFormID" style="padding: 5vh 0vw 15vh 0vw">
        <div style="padding: 0vh 1vw 0vh 1vw">
            <div class ="col-2">
                <span style="display:none;">
                    <input 
                        type="radio" 
                        name="thisradio" 
                        id="RadioFieldID1"
                        checked=true>

                </span><img 
                    id="ImageRadioFieldID1" 
                    src="/img/Dashboard/Cork_Indicator_Icons/CrimeEmergencyServicesBlue.png"
                    width="100%" 
                    height="auto" 
                    onclick="RadioClicked('RadioFieldID1', 'thisradio', 'MyFormID', 0)" 
                    style="cursor:pointer;">
            </div>
            <div class ="col-2">

                <span style="display:none;">
                    <input 
                        type="radio" 
                        name="thisradio" 
                        id="RadioFieldID2" 
                        checked=false
                        >
                </span><img 
                    id="ImageRadioFieldID2" 
                    src=  "/img/Dashboard/Cork_Indicator_Icons/Environment_Transport.png"
                    width=100% 
                    height="auto" 
                    onclick="RadioClicked('RadioFieldID2', 'thisradio', 'MyFormID', 1)" 
                    style="cursor:pointer;">
            </div>
            <div class ="col-2">
                <span style="display:none;">
                    <input 
                        type="radio" 
                        name="thisradio" 
                        value="3" 
                        id="RadioFieldID3"
                        checked=false>
                </span><img 
                    id="ImageRadioFieldID3" 
                    src="/img/Dashboard/Cork_Indicator_Icons/Health_Education.png" 
                    width="100%" 
                    height="auto" 
                    onclick="RadioClicked('RadioFieldID3', 'thisradio', 'MyFormID', 2)" 
                    style="cursor:pointer;">
            </div>
            <div class ="col-2">
                <span style="display:none;">
                    <input 
                        type="radio" 
                        name="thisradio" 
                        id="RadioFieldID4"
                        checked=false
                        >
                </span><img 
                    id="ImageRadioFieldID4" 
                    src="/img/Dashboard/Cork_Indicator_Icons/Housing.png"
                    width="100%" 
                    height="auto" 
                    onclick="RadioClicked('RadioFieldID4', 'thisradio', 'MyFormID', 3)" 
                    style="cursor:pointer;">
            </div>
            <div class ="col-2">
                <span style="display:none;">
                    <input 
                        type="radio" 
                        name="thisradio" 
                        id="RadioFieldID5"
                        checked=false
                        >
                </span><img 
                    id="ImageRadioFieldID5" 
                    src=  "/img/Dashboard/Cork_Indicator_Icons/Industry_Employment_Labour_Market.png"
                    width=100% 
                    height="auto" 
                    onclick="RadioClicked('RadioFieldID5', 'thisradio', 'MyFormID', 4)" 
                    style="cursor:pointer;">
            </div>
            <div class ="col-2">
                <span style="display:none;">
                    <input 
                        type="radio" 
                        name="thisradio" 
                        id="RadioFieldID6"
                        checked=false>
                </span><img 
                    id="ImageRadioFieldID6" 
                    src="/img/Dashboard/Cork_Indicator_Icons/Population.png" 
                    width="100%" 
                    height="auto" 
                    onclick="RadioClicked('RadioFieldID6', 'thisradio', 'MyFormID', 5)" 
                    style="cursor:pointer;">
            </div>

        </div>

    </form>
    <div id="indicatorHeader" style="padding:0vh 0vw 5vh 0vw;">
    </div>

    <div style="padding:0vh 1vw 0vh 1vw;">


        <iframe class = "highchartsFrame"  style="height:6000px" 
                id="graphContent" scrolling="no" src="/./CrimeEmergencyServices/stats" name="iframe_indicators">
            <p>Your browser does not support iframes.</p>  </iframe>

    </div>
    
    <div id="indicatorMap" style="padding:0vh 0vw 5vh 0vw;">
    </div>
    
    
    
    <!--    <div style="padding: 0vh 2vw 0vh 2vw">
            <div class="col-2">
                <a href="/./Economy/stats/container">
                <input type='radio' name='content_type' value='1' />
                <img src="/img/Dashboard/Cork_Indicator_Icons/Industry_Employment_Labour_Market.png" 
                     width="90%" max-width = "100%" alt=""/>
                </input>
                </a> 
            </div>
            <div class="col-2" >
                <input type='radio' name='content_type' value='1' />
                <a href="/./EnvironmentTransport/stats"> 
                <img src="/img/Dashboard/Cork_Indicator_Icons/Environment_Transport.png" width="90%" max-width = "100%" alt=""/>
                </a>
                </input>
            </div>
                    <div class="col-2">
                        <a href="/./Housings/stats">
                            <img src="/img/Dashboard/Cork_Indicator_Icons/Housing.png" width="90%" max-width = "100%" alt=""/>
                        </a> 
                    </div>
            
                    <div class="col-2">
                        <a href="/./Demographics/stats">
                            <img src="/img/Dashboard/Cork_Indicator_Icons/Population.png" width="90%" max-width = "100%" alt=""/>
                        </a> 
                    </div>
                    <div class="col-2">
                        <a href="/./HealthEducation/stats">
                            <img src="/img/Dashboard/Cork_Indicator_Icons/Health_Education.png" width="90%" max-width = "100%" alt=""/>
                        </a> 
                    </div>
                    <div class="col-2">
                        <a href="/./CrimeEmergencyServices/stats">
                            <img src="/img/Dashboard/Cork_Indicator_Icons/CrimeEmergencyServices.png" width="90%" max-width = "100%" alt=""/>
                        </a>       
                    </div>
                </div>-->
    <div>

    </div>


    <script type="text/javascript">

        let contentLinks = [];
        contentLinks[0] = "/./CrimeEmergencyServices/stats";
        contentLinks[1] = "/./EnvironmentTransport/stats";
        contentLinks[2] = "/./HealthEducation/stats";
        contentLinks[3] = "/./Housings/stats";
        contentLinks[4] = "/./Economy/stats/container";
        contentLinks[5] = "/./Demographics/stats";

        let headers = [];
        headers[0] = "<div><br>"
                + "<h2>Crime and Emergency Services Indicators</h2></div>"
                + "<div><p>Explore information relating to crime rates in Cork, fire brigade activities and injuries and fatalities on Cork roads.</p></div>";

        headers[1] = "<div><br>"
                + "<h2>Environmental Indicators</h2>"
                + "</div>"
                + "<div><p>Explore information relating to waste, recycling, water quality, Green Schools, Local Agenda 21 Projects and traffic volumes on Cork roads.</p></div>";

        let unchecked = [];
        unchecked[0] = "/img/Dashboard/Cork_Indicator_Icons/CrimeEmergencyServices.png";
        unchecked[1] = "/img/Dashboard/Cork_Indicator_Icons/Environment_Transport.png";
        unchecked[2] = "/img/Dashboard/Cork_Indicator_Icons/Health_Education.png";
        unchecked[3] = "/img/Dashboard/Cork_Indicator_Icons/Housing.png";
        unchecked[4] = "/img/Dashboard/Cork_Indicator_Icons/Industry_Employment_Labour_Market.png";
        unchecked[5] = "/img/Dashboard/Cork_Indicator_Icons/Population.png";

        let checked = [];
        checked[0] = "/img/Dashboard/Cork_Indicator_Icons/CrimeEmergencyServicesBlue.png";
        checked[1] = "/img/Dashboard/Cork_Indicator_Icons/Environment_TransportBlue.png";
        checked[2] = "/img/Dashboard/Cork_Indicator_Icons/Health_EducationBlue.png";
        checked[3] = "/img/Dashboard/Cork_Indicator_Icons/HousingBlue.png";
        checked[4] = "/img/Dashboard/Cork_Indicator_Icons/Industry_Employment_Labour_Market_Blue.png";
        checked[5] = "/img/Dashboard/Cork_Indicator_Icons/PopulationBlue.png";


        //    var RadioCheckedImage = new Image();
        //    var RadioUncheckedImage = new Image();
        //    checked1.src = "https://www.willmaster.com/library/images/checked-radio.jpg";
        //    RadioUncheckedImage.src = "https://www.willmaster.com/library/images/unchecked-radio.jpg";

        function RadioClicked(radioid, radiosetname, formid, val) {
            console.log("clicked: " + radioid + " | " + radiosetname + " | " + formid + " | " + val);
            // - first, uncheck all radio buttons of the set
            let form = document.getElementById(formid);
            for (let i = 0; i < form.length; i++) {
                if (form[i].name == radiosetname) {
                    document.getElementById(form[i].id).checked = false;
                    document.getElementById("Image" + form[i].id).src = unchecked[i];
                }
            }
            // - then, check the clicked button
            document.getElementById(radioid).checked = true;
            document.getElementById("Image" + radioid).src = checked[val];
            document.getElementById("graphContent").src = contentLinks[val];
            document.getElementById("indicatorHeader").innerHTML = headers[val];
            return false;
        }


        function resizeIframe(iframe) {
            iframe.height = iframe.contentWindow.document.body.scrollHeight + "px";
            console.log("resize iframe to " + iframe.height);
        }

        function myFunction() {
            document.getElementById("indicatorHeader").innerHTML = headers[0];
        }

    </script>


<!--<script type="text/javascript">
    $(document).ready(function () {
        $('input[name=content_type]').on('change', function () {
            var n = $(this).val();
            switch (n)
            {
                case '1':
                    $('#show').html("<iframe class = \"highchartsFrame\" src=\"/./Demographics/stats\" scrolling=\"no\"></iframe>");
                    break;
                case '2':
                    $('#show').html("2nd radio button");
                    break;
                case '3':
                    $('#show').html("3rd radio button");
                    break;
            }
        });
    });


</script>-->


