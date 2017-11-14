                                    
    <!-- <script src="http://canvg.googlecode.com/svn/trunk/rgbcolor.js"></script> 
    <script src="http://canvg.googlecode.com/svn/trunk/canvg.js"></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script> -->
    
    
<!--    <?php
 
  //  $valueArray = $this->requestAction('Housings/employmentfigs/container'); //get the array of values for the highchart.
    //$valueArray = $this->requestAction('Healths/bedstats'); //get the array of values for the highchart.
//    
//    echo $this->Html->script('rgbcolor.js');
//    echo $this->Html->script('canvg.js');
//    echo $this->Html->script('highcharts.js');
//    echo $this->Html->script('exporting.js');
//    echo $this->Html->script('jquery.share.js');      //for the social sharing buttons
//    echo $this->Html->script('jquery.tabify.js');
// 
//   
    ?> -->
    <!-- Facebook stuff --->
  


    <link rel="stylesheet" href="/dublindashboard/css/popup.css" type="text/css" />
    <link rel="stylesheet" href="/dublindashboard/css/jquery.share.css" type="text/css" />
    
    
    <div id="container"></div> 
   <!-- this is the popup div which displays an image of the graph and contians the social sharing buttons -->
    <div id="graph" class="white_content"> 
    
                <a href="javascript:void(0)" onclick="document.getElementById('graph').style.display='none';document.getElementById('fade').style.display='none';document.getElementById('social').innerHTML ='';document.getElementById('graphio').innerHTML ='';"><div style="float: right; clear: left;"><img style="border:0;" src="/dublindashboard/img/exit.png" alt="HTML tutorial" width="20" height="20"></div> 
            </a><div id="elementio">
                    <div id="graphio" align="center"></div>  
                   <!-- <div id="social" align="center"><hr align="center" width="80%"></div> -->
                    <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-type='icon'></div>
                </div>
        </div>
        <div id="fade" class="black_overlay"></div> 
<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
 
    <script type="text/javascript">
        var chart;
                    
                    (function (H) {
                    
                    H.Chart.prototype.createCanvas = function (imageToDisplay) {
                       
                 
                      var svg = this.getSVG(),
                          width = parseInt(svg.match(/width="([0-9]+)"/)[1]),
                          height = parseInt(svg.match(/height="([0-9]+)"/)[1]),
                          canvas = document.createElement('canvas');
                      
                      canvas.setAttribute('width', width);
                      canvas.setAttribute('height', height);
                      
                      if (canvas.getContext && canvas.getContext('2d')) {
                      
                          canvg(canvas, svg);
                          
                          $(this).toggleClass("open");
                          var image = canvas.toDataURL("image/png")
                              .replace("image/png", "image/octet-stream"); 
                            var elem = document.createElement("img");
                          elem.setAttribute("src", image);
                    
                    
                    
                    var elt = $(this).attr('for');
                    $("#" + elt).toggleClass("open");
                          
                            var dataURL = canvas.toDataURL();
                    
                    
                    
                    $.ajax({
                    type: "POST",
                    url: "/dublindashboard/Demographics/imageloaders",
                    data: { 
                    imgBase64: dataURL,
                    fileName: imageToDisplay
                    }
                    }).done(function(o) {
                        
                    });
                     // alert(document.getElementById('social'));

                      var elemt = document.createElement("img");
                          alert(imageToDisplay);
                      //elemt.src = '/dublindashboard/img/'+imageToDisplay; // this is not used at present
                      document.getElementById('graphio').appendChild(elem); //draw image directly on the canvas as its not saved in time
                          
                      document.getElementById('graph').style.display = 'block';
                      document.getElementById('fade').style.display = 'block';
                       //add social sharing buttons to the div
                       /*$('#social').share({
                        networks: ['facebook', 'twitter', 'pinterest', 'googleplus'],
                        urlToShare: 'http://na-srv-1dv.nuim.ie/dublindashboard/img/Dashboard/'

                    });*/
                          
                          
                      }
                    else {
                    alert ("Your browser doesn't support this feature, please use a modern browser");
                      }
                      
                    }
                    }(Highcharts));	  
                            
    </script>
   <?php echo $this->element('googleAnalytics'); ?>
                    
</body>

                            