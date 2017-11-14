                <?php 
        
                $valueArray = $this->requestAction($function);
                
                  ?>

                


                 <div>
                <script type="text/javascript">
                    
                  
                   <?php   //echo  $charttByRoom->render("charttByRoom");	 //THIS IS WHAT WILL ADD THE CHART TO THE PAGE. REMOVED FOR NOW                   
                  
                    
                    if( $valueArray["columnStacking"] == 'null' ){
                        
                         $stacking =  $valueArray["columnStacking"];
                         $stackEnabled =  $valueArray["columnLables"];
                         $stackColor =  $valueArray["columnLablesColours"];   
                    }
                    else{
                        $stacking = "'" .$valueArray["columnStacking"] ."'";
                        $stackEnabled =  "'" .$valueArray["columnLables"] ."'";
                        $stackColor = "'" .$valueArray["columnLablesColours"] ."'"; 
    
                    }
                   
                    ?>
                    
                     var chart;
                
                /*(function (H) {            
              
                }(Highcharts));	*/
                    
                    
                    
                    ////****/////

                       chartt = new Highcharts.Chart({
                           "chart":{
                               "renderTo":<?php   echo $valueArray["renderTo"] ?>,
                               "type":'<?php   echo $valueArray["type"] ?>',
                               //"width": <?php   echo $valueArray["width"] ?>,
                               "zoomType":"xy",
                                borderColor: '#0E3C60', //'#C0C0C0', //'#0000A0',
                                borderRadius: 0,
                                borderWidth: 2,
                               events:{
                                    load: function() {
                                    this.subtitle.element.onclick = function() {
                                    window.open(
                                    '<?php   echo $valueArray["sourceURL"] ?>',
                                    '_blank' // <- This is what makes it open in a new window.
                                    );
                                }
                                this.subtitle.element.onmouseover = function(){
                                    this.style.cursor='pointer';
                       
                                        }
                                }
                            },
                           },
                           "title":{
                               "text":'<?php   echo $valueArray["titleText"] ?>',
                           },
                           "subtitle":{
                               "text":'<?php   echo $valueArray["subtitleText"] ?>',
                           },
                           "xAxis":{
                               "categories":<?php   echo $valueArray["xAxisLabels"] ?>,
                               "labels":{
                                   "rotation":<?php   echo $valueArray["xAxisLabelsRotation"] ?>,
                                   "style":{
                                       "fontSize":'<?php   echo $valueArray["xAxislabelsFontSize"] ?>'
                                   }
                               },
                               "minTickInterval":<?php   echo $valueArray["xAxisMinTickInterval"] ?>
                           },
                           "yAxis":{
                               "title":{
                                   "text":'<?php   echo $valueArray["yAxisTitle"] ?>'
                               }
                           },
                                        
                                    
                       "plotOptions": {
                        "column": {
                        "stacking": <?php   echo $stacking ?>,
                        "dataLabels": {
                            "enabled": <?php   echo $stackEnabled ?>, 
                            "color":<?php   echo $stackColor ?>  
                        }
                    },
                         //we need to include parameters/options for pie charts!
                          "pie":{
                            "allowPointSelect": true,
                            "dataLabels": {
                            "enabled": false
                                        },
                                 "showInLegend": false
                                }
                },
                                                     
                                                                                        
                   
                         
                            //NOTE this is not fullly operational yet...please monitor it.                         
                           "legend":{
                               "enabled": '<?php   echo $valueArray["legend"] ?>'  
                                          
                                                     
                                                     
                           },
                                                     
                                                               
                    "exporting": {
                         "enabled":<?php   echo $valueArray["exporting"] ?>,
                        "buttons": {
                        "contextButton": {
                            "menuItems": [{
                                "text": 'Print',
                                "onclick": function() {
                                    this.print();
                                }
                            }, 
                             
                                    
                    {
                                text: 'Download (PNG)',
                                onclick: function() {
                                   
                                    this.exportChart({type: 'image/png', filename: '<?php echo str_replace(":", " ", $valueArray["titleText"])?>'});
                                }
                            },
                                {
                                text: 'Download (JPG)',
                                onclick: function() {
        
                                    this.exportChart({type: 'image/jpeg', filename: '<?php echo str_replace(":", " ", $valueArray["titleText"]) ?>'});
                                }
                            }
                    ]
                        }
                }
                },                         
                                                     
                                                     
                          /* "exporting":{
                               "enabled":<?php   echo $valueArray["exporting"] ?>
                           },*/

                           "series":
                               <?php   echo $valueArray["series"] ?>
                                                     
                       
                                                     //******//
                  
                    }
                                                    );   
                       
                    
                   
                </script>
                </div>