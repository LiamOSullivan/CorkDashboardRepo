<?php $this->assign('title', "Data Indicators"); ?>
<div class="onlyContent">
    <!--//<div style="overflow:auto">-->
    <div style="border-bottom:2px solid #e5e5e5">
        <h1>Data Indicators</h1>
    </div>
    <div>
        <h3>See historical trends in Cork for a range of sectors including 
            industry and employment, environment and transport, housing, 
            population, health and education and crime and emergency services. </h3>
    </div>
    <div style="padding: 0vh 2vw 0vh 2vw">
        <div class="col-2">
            <a href="/./Economy/stats/container">
                <img src="/img/Dashboard/Cork_Indicator_Icons/Industry_Employment_Labour_Market.png" width="90%" max-width = "100%" alt=""/>
            </a> 
        </div>
        <div class="col-2" >
            <a href="/./EnvironmentTransport/stats"> 
                <img src="/img/Dashboard/Cork_Indicator_Icons/Environment_Transport.png" width="90%" max-width = "100%" alt=""/>
            </a>
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
    </div>
    <div>
        <p><input type='radio' name='content_type' value='1' />&nbsp;This is content A of request</p>
        <p><input type='radio' name='content_type' value='2' />&nbsp;This is content B of request</p>
        <p><input type='radio' name='content_type' value='3' />&nbsp;This is content C of request</p>
        <div id='show'></div>
    </div>
</div>


<script type="text/javascript">
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


</script>


