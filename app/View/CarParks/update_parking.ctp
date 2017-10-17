<?php  // $chart->printScripts();  ?>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->


    
    <?php echo $this->Html->script('rgbcolor.js');
    echo $this->Html->script('canvg.js');
    echo $this->Html->script('highcharts.js');
    echo $this->Html->script('exporting.js'); ?>
 
    


    
 <script type="text/javascript">  
 var chart; // global
 var chart2; // global
 var chart3;
 
    var counter = 0;
    var m50North = []; 
 
    function travelTimes(){
        var link =  'http://dataproxy.mtcc.ie/v1.5/api/traveltimes.json'
        var link2 = 'http://localhost/cakephp-2.4.2/CarParks/travelTimes'
        var link3 = 'http://localhost/cakephp-2.4.2/travel_times.json';
      // var travelTime = 
    $.getJSON(link2, function(data) {
    //data is a JSON object
    //data is a JavaScript object now. Handle it as such
        for(var i=0;i<data.M50_southBound.data.length;i++){
            var time = '0';
            var travelTime = Math.floor(data.M50_southBound.data[i].current_travel_time/60)
            var M50_south_1 = '['+time+','+ travelTime+']';
         
            var series1 = chart2.series[i],
            shift = series1.data.length > 20;
            //alert(chart.legend.allItems[0].legendItem.name);
            $(chart2.legend.allItems[i].legendItem.element.childNodes).text(data.M50_southBound.data[i].from_name+' to '+data.M50_southBound.data[i].to_name);
            chart2.series[i].name = 'From '+data.M50_southBound.data[i].from_name+' to '+data.M50_southBound.data[i].to_name;
            //chart2.series[i].addPoint(eval(M50_south_1), true, shift);
             chart2.series[i].setData(eval(M50_south_1));
            // m50North[i] = data.M50_southBound[i].status;
             //alert(m50North[i]);
   
        }
        
        
        
        for(var i=0;i<data.M50_northBound.data.length;i++){

            var time = '0';
            var travelTime = Math.floor(data.M50_northBound.data[i].current_travel_time/60)
            var M50_north_1 = '['+time+','+ travelTime+']';
         
            var series1 = chart3.series[i],
            shift = series1.data.length > 20;
            //alert(chart.legend.allItems[0].legendItem.name);
            $(chart3.legend.allItems[i].legendItem.element.childNodes).text(data.M50_northBound.data[i].from_name+' to '+data.M50_northBound.data[i].to_name);
            chart3.series[i].name = 'From '+data.M50_northBound.data[i].from_name+' to '+data.M50_northBound.data[i].to_name;
            //chart2.series[i].addPoint(eval(M50_south_1), true, shift);
             chart3.series[i].setData(eval(M50_north_1));
   
        }
        
        
        
        setTimeout(travelTimes, 300000); //milliseconds 300000 - 5mins
        

});
        
      cache: false  
    }
 
    
    
    
    
    
    function myFunction()
    
{

    $.get("http://localhost/cakephp-2.4.2/CarParks/nowParking", function(point){
        //alert(point);
        obj = JSON.parse(point);
        var date = new Date();
       //var time = date.getTime(); /use this for dynamically chaning events!
        var time = '1';
        
        //count how many variables (carparks) we have
        var key, count = 0;
        for(key in obj) {
        count++;        
        }

        
        
        var greenNumb = obj.GREENRCS;
        if(greenNumb == 'FULL' || greenNumb == ' '){
            greenNumb = 0;
        }
  
        var parnellNumb = obj.PARNELL;       
        if(parnellNumb == 'FULL' || parnellNumb == ' '){
            parnellNumb = 0;
        }
        var ilacNumb = obj.ILAC;       
        if(ilacNumb == 'FULL' || ilacNumb == ' '){
            ilacNumb = 0; 
        }
         var jervisNumb = obj.JERVIS;       
        if(jervisNumb == 'FULL' || jervisNumb == ' '){
            jervisNumb = 0;
        }
         var arnottsNumb = obj.ARNOTTS;       
        if(arnottsNumb == 'FULL' || arnottsNumb == ' '){
            arnottsNumb = 0;
        }
         var abbeyNumb = obj.ABBEY;       
        if(abbeyNumb == 'FULL' || abbeyNumb == ' '){
            abbeyNumb = 0;
        }
        var thomasNumb = obj.THOMASST;       
        if(thomasNumb == 'FULL' || thomasNumb == ' '){
            thomasNumb = 0;
        }
        var setantaNumb = obj.SETANTA;       
        if(setantaNumb == 'FULL' || setantaNumb == ' '){
            setantaNumb = 0;
        }
        var dawsonNumb = obj.DAWSON;       
        if(dawsonNumb == 'FULL' || dawsonNumb == ' '){
            dawsonNumb = 0;
        }
        var trinityNumb = obj.TRINITY;       
        if(trinityNumb == 'FULL' || trinityNumb == ' '){
            trinityNumb = 0;
        }
        var druryNumb = obj.DRURY;       
        if(druryNumb == 'FULL' || druryNumb == ' '){
            druryNumb = 0;
        }
        
        var bthomasNumb = obj.BTHOMAS;       
        if(bthomasNumb == 'FULL' || bthomasNumb == ' '){
            bthomasNumb = 0;
        }
        
         var cchurchNumb = obj.CCHURCH;       
        if(cchurchNumb == 'FULL' || cchurchNumb == ' '){
            cchurchNumb = 0;
        }
        
        var marlboroNumb = obj.MARLBORO;       
        if(marlboroNumb == 'FULL' || marlboroNumb == ' '){
            marlboroNumb = 0;
        }
        
        
        var parnell = '['+time+','+ parnellNumb+']';
        var ilac = '['+time+','+ ilacNumb+']';
        var jervis = '['+time+','+ jervisNumb+']';
        var arnotts = '['+time+','+ arnottsNumb+']';
        var marlboro = '['+time+','+ marlboroNumb+']'; 
        var abbey = '['+time+','+abbeyNumb+']';
        var thomas = '['+time+','+ thomasNumb+']';
        var cchurch = '['+time+','+ cchurchNumb +']'; 
        var setanta = '['+time+','+ setantaNumb+']';
        var dawson = '['+time+','+ dawsonNumb+']';
        var trinity = '['+time+','+ trinityNumb+']';
        var greenrcs = '['+time+','+ greenNumb+']';
        var drury = '['+time+','+ druryNumb+']';
       var bthomas = '['+time+','+ bthomasNumb+']' 
      
        
       
        var series0 = chart.series[0],
                shift = series0.data.length > 20; // shift if the series is 
                                                 // longer than 20
        var series1 = chart.series[1],
                shift = series1.data.length > 20; // shift if the series is 
                                                 // longer than 20
     
        
            // add the point
            /*chart.series[0].remove(true);
            chart.series[1].remove(true);
            chart.series[2].remove(true);
            chart.series[3].remove();
            chart.series[4].remove();
            chart.series[5].remove();
            chart.series[6].remove();
            chart.series[7].remove();
            chart.series[8].remove();
            chart.series[9].remove();
            chart.series[10].remove();
            chart.series[11].remove();
            chart.series[12].remove();
            chart.series[13].remove();*/
        
           /* chart.series[0].addPoint(eval(parnell), true, shift);
            chart.series[1].addPoint(eval(ilac), true, shift);
            chart.series[2].addPoint(eval(jervis), true, shift);
            chart.series[3].addPoint(eval(arnotts), true, shift);
            chart.series[4].addPoint(eval(marlboro), true, shift);
            chart.series[5].addPoint(eval(abbey), true, shift);
            chart.series[6].addPoint(eval(thomas), true, shift);
            chart.series[7].addPoint(eval(setanta), true, shift);
            chart.series[8].addPoint(eval(dawson), true, shift);
            chart.series[9].addPoint(eval(trinity), true, shift);
            chart.series[10].addPoint(eval(greenrcs), true, shift);
            chart.series[11].addPoint(eval(drury), true, shift);
            chart.series[12].addPoint(eval(bthomas), true, shift);
            chart.series[13].addPoint(eval(cchurch), true, shift);*/
        
        
            //chart.series[0].addPoint(eval(parnell), true, shift);
            chart.series[0].setData(eval(parnell));
        chart.series[1].setData(eval(ilac));
        chart.series[2].setData(eval(jervis));
        chart.series[3].setData(eval(arnotts));
        chart.series[4].setData(eval(marlboro));
        chart.series[5].setData(eval(abbey));
        chart.series[6].setData(eval(thomas));
        chart.series[7].setData(eval(setanta));
        chart.series[8].setData(eval(dawson));
        chart.series[9].setData(eval(trinity));
        chart.series[10].setData(eval(greenrcs));
        chart.series[11].setData(eval(drury));
        chart.series[12].setData(eval(bthomas));
        chart.series[13].setData(eval(cchurch));
        
        

            /*chart.series[1].addPoint(eval(ilac), true, shift);
            chart.series[2].addPoint(eval(jervis), true, shift);
            chart.series[3].addPoint(eval(arnotts), true, shift);
            chart.series[4].addPoint(eval(marlboro), true, shift);
            chart.series[5].addPoint(eval(abbey), true, shift);
            chart.series[6].addPoint(eval(thomas), true, shift);
            chart.series[7].addPoint(eval(setanta), true, shift);
            chart.series[8].addPoint(eval(dawson), true, shift);
            chart.series[9].addPoint(eval(trinity), true, shift);
            chart.series[10].addPoint(eval(greenrcs), true, shift);
            chart.series[11].addPoint(eval(drury), true, shift);
            chart.series[12].addPoint(eval(bthomas), true, shift);
            chart.series[13].addPoint(eval(cchurch), true, shift);*/
        
            //chart.series[9].addPoint(eval(), true, shift);
         
          // call it again after one second
            /*if(counter == 0){
            //setTimeout(myFunction, 1000);
               ///chart.series[11].removePoint(eval(drury), true, shift);
               myFunction;
            }*/
         // {
         //
    setTimeout(myFunction, 300000); //milliseconds 300000 - 5mins
         // }
      
        

});
    
     cache: false
}  
    

    
    $(document).ready(function() {
    chart = new Highcharts.Chart({
        chart: {
            renderTo: 'container',
            width: 600,
            defaultSeriesType: 'column',
            zoomType: 'xy',
            events: {
                load: myFunction
            }
        },
        
         legend: {
            layout: 'vertical',
              borderWidth: 0,
            align: 'left',
            verticalAlign: 'top',
            x: 50,
            y: 50,
            floating: true
               
        },
        
        title: {
            text: 'Dublin City Car Parks'
        },
        
           subtitle: {
            text: 'Source DCC - Updated at 5 Minute Intervals'
        },
        xAxis: {
            min:1
            //type: 'datetime',
            //tickPixelInterval: 3600 * 1000,
            // tickInterval: 120 * 1000,
           // maxZoom: 20 * 1000
        },
        yAxis: {
            minPadding: 0.2,
            maxPadding: 0.2,
            title: {
                text: 'Spaces',
                margin: 10
            }
        },
        series: [{
            name: 'Parnell Street',
            data: []
        },
            {
            name: 'Ilac',
            data: []
        },
            {
            name: 'Jervis',
            data: []
        },
                 {
            name: 'Arnotts',
            data: []
        },
                 {
            name: 'Marlboro',
            data: []
        },
                 {
            name: 'Abbey Street',
            data: []
        },
                 {
            name: 'Thomas Street',
            data: []
        },
                 {
            name: 'Setanta',
            data: []
        },
                  {
            name: 'Dawson Street',
            data: []
        },
                  {
            name: 'Trinity',
            data: []
        },
                  {
            name: 'St Stephens Green - RCS',
            data: []
        },
                  {
            name: 'Drury Stret',
            data: []
        },
                  {
            name: 'Brown Thomas',
            data: []
        },
                  {
            name: 'Christ Church',
            data: []
        }
            
                
                ]
    }
                                
                                
                                
                                
                                
                                ); 
        
        
        
        
        
      chart2 = new Highcharts.Chart({
        chart: {
            renderTo: 'containerB',
            width: 1000,
            defaultSeriesType: 'column',
            zoomType: 'xy',
            events: {
                load: travelTimes
            }
        },
          
          legend: {
            layout: 'vertical',
              borderWidth: 0,
            align: 'left',
            verticalAlign: 'top',
            x: 125,
            y: 50,
            floating: true
               
        },
        
        title: {
            text: 'M50 Southboud Travel Times'
        },
          subtitle: {
            text: 'Source NRA - Updated at 5 Minute Intervals'
        },
        xAxis: {
            min:1
            //type: 'datetime',
            //tickPixelInterval: 3600 * 1000,
            // tickInterval: 120 * 1000,
           // maxZoom: 20 * 1000
        },
        yAxis: {
            minPadding: 0.2,
            maxPadding: 0.2,
            title: {
                text: 'Minutes',
                margin: 80
            }
        },
        series: [{
            name: 'a',
            data: []
        },
            {
            name: 'b',
            data: []
        },
            {
            name: 'c',
            data: []
        },
                 {
            name: 'd',
            data: []
        },
                 {
            name: 'e',
            data: []
        },
                 {
            name: 'f',
            data: []
        },
                 {
            name: 'g',
            data: []
        },
                 {
            name: 'h',
            data: []
        },
                  {
            name: 'i',
            data: []
        },
                  {
            name: 'j',
            data: []
        },
                  {
            name: 'k',
            data: []
        },
                  {
            name: 'l',
            data: []
        },
         
            
                
                ]
    }
                                
                                
                                
                                
                                
                                ); 
                 
                 
          chart3 = new Highcharts.Chart({
        chart: {
            renderTo: 'containerC',
                  width: 1000,
            defaultSeriesType: 'column',
            zoomType: 'xy',
            events: {
                load: travelTimes
            }
        },
          
          legend: {
            layout: 'vertical',
              borderWidth: 0,
            align: 'left',
            verticalAlign: 'top',
            x: 125,
            y: 50,
            floating: true
               
        },
        
        title: {
            text: 'M50 Northboud Travel Times'
        },
          subtitle: {
            text: 'Source NRA - Updated at 5 Minute Intervals'
        },
        xAxis: {
            min:1
            //type: 'datetime',
            //tickPixelInterval: 3600 * 1000,
            // tickInterval: 120 * 1000,
           // maxZoom: 20 * 1000
        },
        yAxis: {
            minPadding: 0.2,
            maxPadding: 0.2,
            title: {
                text: 'Minutes',
                margin: 80
            }
        },
        series: [{
            name: 'a',
            data: []
        },
            {
            name: 'b',
            data: []
        },
            {
            name: 'c',
            data: []
        },
                 {
            name: 'd',
            data: []
        },
                 {
            name: 'e',
            data: []
        },
                 {
            name: 'f',
            data: []
        },
                 {
            name: 'g',
            data: []
        },
                 {
            name: 'h',
            data: []
        },
                  {
            name: 'i',
            data: []
        },
                  {
            name: 'j',
            data: []
        },
                  {
            name: 'k',
            data: []
        }
                  
         
            
                
                ]
    }
                                
                                
                                
                                
                                
                                );    
        
    
});
    
    
    
    
/*$(document).ready(function() {
    alert('ok');
$.get("http://localhost/cakephp-2.4.2/CarPark/nowParking", function(data){
    alert("Data Loaded: " + data);

});
    )} */
    
    </script>



<div id="container"></div>
<div id="containerB"></div>
<div id="containerC"></div>
<body>
    

</body>
</div>


