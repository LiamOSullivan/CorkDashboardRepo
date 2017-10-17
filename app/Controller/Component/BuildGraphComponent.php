            <?php
            App::uses('Component', 'Controller');
            class BuildGraphComponent extends Component {
                
                public function returnChartValues($container,$chartTitle,$modelName,$startOfResults,$endOfResults,$yAxis,$tickInterval,$source,$sourceURL,$typeOfChart,$width,$rotation,$legendEnabled,$stackedColumn,$colorArray,$skipColumeNumber){
                    $this->$modelName = ClassRegistry::init($modelName); 
                    $dbLink = $modelName;
                   
                     $tempTemporalArray=array_keys($this->$dbLink->getColumnTypes());//get the field names/column headings 
                foreach($tempTemporalArray as $key => $val) //parse field name array to remoce first two which are not needed here
                {
                    if($key <=$skipColumeNumber) { //2 (in some Cases e.g. crime) //
                        //ignore the first two generally there are the id and measure fileds	
                    }
                    else{
                        $temporalArray[] = $val; //add to a new temporal arrray
                    }
                }	
                //Code for selecting a sequence of row from a table and plotting them.	
                if($startOfResults==$endOfResults)//there is only one row to be returned
                    {
                    $row = $this->$dbLink -> find("all", array('conditions' => array($dbLink.".id = ".$endOfResults)));
                    foreach ( $row as $key => $val )
                        {
                        $nameArray[] = $val[$dbLink ]['measure']; //the measure //the second coulumn in the table
                        }
                    $dataArray[] = $this->extractData($temporalArray,$row,$dbLink ); //call to function to extract data
                    }
                
                else{
                    for ($x=$startOfResults; $x<=$endOfResults; $x++)// the number of items we want plotted
                        {
                        $row = $this->$dbLink -> find("all", array('conditions' => array($dbLink.".id = ".$x)));
                        foreach ( $row as $key => $val )
                                {
                                $nameArray[] = $val[$dbLink ]['measure']; //the measure//the second coulumn in the table
                              
                        }
                        $dataArray[] = $this->extractData($temporalArray,$row,$dbLink ); //call to function to extract data
                        }
                    
                    }
                    
                    
                  
                    //Set up the chart
                  
                    
                    $valueArray = array( //add everythign to an array which will be returned by the function
                    "renderTo" => $container,
                    "type" => $typeOfChart,
                    "width" => $width,
                    "titleText" => $chartTitle,
                    "subtitleText" => $source,
                    "xAxisCategories"=> $temporalArray, 
                    "xAxisLabelsRotation"=> $rotation,
                    "xAxisMinTickInterval"=> $tickInterval,
                    "xAxislabelsFontSize" => '10px',
                    "yAxisTitle" => $yAxis,
                    "legend" => $legendEnabled,
                    "sourceURL" => $sourceURL
                    );
                    
    
                if($stackedColumn==true){
                    $valueArray["columnStacking"] = 'normal';
                    $valueArray["columnLables"] = 'true';
                    $valueArray["columnLablesColours"] = 'white';   
                }
                    
                else{
                    $valueArray["columnStacking"] = 'null';
                    $valueArray["columnLables"] = 'null';
                    $valueArray["columnLablesColours"] = 'null';  
                        
                    }
                    
                
                   
                    $valueArray["exporting"] = 'true';
                    
                if($endOfResults == $startOfResults)
                    {
                    $valueArray["series0Data"] = $dataArray[0];
                    $valueArray["series0Name"] = $nameArray[0];
                    if(!is_null($colorArray)){
                            $valueArray["series0Color"] = $colorArray[0];
                        }
                    }	
                else{
                    $j=0; //chart series counter
                    for ($x=0; $x<=($endOfResults-$startOfResults); $x++)// the number of items we want plotted	
                        {
                         $valueArray["series".$j."Data"] = $dataArray[$x];
                         $valueArray["series".$j."Name"] = $nameArray[$x];
                        if(!is_null($colorArray))
                            {
                            $valueArray["series".$j."Colour"] = $colorArray[$x];
                            }                
                        $j++;
                        }	
                    }
                    
                    //NEED TO PREPARE TEH SERIES ARRAY IN THE CORRECT FORMAT
                    $js_array4 = json_encode($temporalArray);
                    $valueArray["xAxisLabels"] = $js_array4;//actual value used in the JS
                    
                     $outerArray = array();
                    
                    if($endOfResults == $startOfResults)
                    {
                        $dataArray["data"] = $valueArray["series0Data"];
                        $dataArray["name"] = $valueArray["series0Name"];
                        if(!is_null($colorArray))
                            {
                        $dataArray["color"] = $valueArray["series0Colour"];
                        }
                        $outerArray[0] = $dataArray;    
                    
                    
                    }
                    
                   else{
                    for ($x=0; $x<$j; $x++)
                        {                        
                        $dataArray["data"] = $valueArray["series".$x."Data"];
                        $dataArray["name"] = $valueArray["series".$x."Name"];
                        if(!is_null($colorArray))
                            {
                        $dataArray["color"] = $valueArray["series".$x."Colour"];
                        }
                        $outerArray[$x] = $dataArray;    
                        }
                       }
                    $js_array3 = json_encode($outerArray);
                    $valueArray["series"] = $js_array3;//actual value used in the JS
                    
                    $valueArray["function"] = 'Demographics/populationpie2011/containerB';
                   
                    return $valueArray;     
                }
                
               public function buildGraph($container,$chartTitle,$modelName,$startOfResults,$endOfResults,$yAxis,$tickInterval,$source,$typeOfChart,$width,$rotation,$legendEnabled,$stackedColumn,$colorArray){
                   
               
            //$this->loadModel($modelName);
            $this->$modelName = ClassRegistry::init($modelName); 
            $dbLink = $modelName;
         
                  
            $tempTemporalArray=array_keys($this->$dbLink->getColumnTypes());//get the field names/column headings 
                foreach($tempTemporalArray as $key => $val) //parse field name array to remoce first two which are not needed here
                {
                    if($key <=1) {
                        //ignore the first two generally there are the id and measure fileds	
                    }
                    else{
                        $temporalArray[] = $val; //add to a new temporal arrray
                    }
                }	
                //Code for selecting a sequence of row from a table and plotting them.	
                if($startOfResults==$endOfResults)//there is only one row to be returned
                    {
                    $row = $this->$dbLink -> find("all", array('conditions' => array($dbLink.".id = ".$endOfResults)));
                    foreach ( $row as $key => $val )
                        {
                        $nameArray[] = $val[$dbLink ]['measure']; //the measure //the second coulumn in the table
                        }
                    $dataArray[] = $this->extractData($temporalArray,$row,$dbLink ); //call to function to extract data
                    }
                
                else{
                    for ($x=$startOfResults; $x<=$endOfResults; $x++)// the number of items we want plotted
                        {
                        $row = $this->$dbLink -> find("all", array('conditions' => array($dbLink.".id = ".$x)));
                        foreach ( $row as $key => $val )
                                {
                                $nameArray[] = $val[$dbLink ]['measure']; //the measure//the second coulumn in the table
                                }
                        $dataArray[] = $this->extractData($temporalArray,$row,$dbLink ); //call to function to extract data
                        }
                    }
                
                //Set up the chart
                $chart = new Highchart();	
                $chart->chart = array(
                    'renderTo' => $container, // div ID where chart should appear.
                    'type' => $typeOfChart,
                    'width' => $width,
                    'zoomType' => 'xy'
                    );
                    
                                      
               // if($typeOfChart=='area'){
             	//   $chart->title->text = 'no';
             	 //  $chart->subtitle->text = 'yep';
             	  // $chart->plotOptions->marker->radius = '1';
             	
             //	}
           //   else{          
                $chart->title->text = $chartTitle;
                $chart->subtitle->text = $source;
                $chart->xAxis->categories = $temporalArray;
                $chart->xAxis->labels->rotation = $rotation;
                $chart->xAxis->minTickInterval=$tickInterval;
                $chart->xAxis->labels->style->fontSize = '10px';
                $chart->yAxis->title->text = $yAxis;
           //  }
                if($stackedColumn==true){
                $chart->plotOptions->column->stacking = 'normal';
                $chart->plotOptions->column->dataLabels->enabled = true;
                $chart->plotOptions->column->dataLabels->color = 'white';
                
                }
                $chart->legend->enabled = $legendEnabled;
                $chart->exporting->enabled = true;
                
                    
                                       
                //$chart->legend->floating = 'true';
                //$chart->legend->x = -20;
                //$chart->legend->y = -245;
                //$chart->legend->layout = 'vertical';
                
            
                
                
                if($endOfResults == $startOfResults)
                    {
                    $chart->series[0]->data = $dataArray[0];
                    $chart->series[0]->name = $nameArray[0];
                    if(!is_null($colorArray)){
                            $chart->series[$j]->color = $colorArray[$x];
                        }
                
                    }	
                else{
                    $j=0; //chart series counter
            
                    for ($x=0; $x<=($endOfResults-$startOfResults); $x++)// the number of items we want plotted	
                        {
                        $chart->series[$j]->data = $dataArray[$x];
                        $chart->series[$j]->name = $nameArray[$x];
                        if(!is_null($colorArray)){
                            $chart->series[$j]->color = $colorArray[$x];
                        }
                    
                        $j++;
                        }	
                    }
                    
                    //$chart->exporting->buttons->contextButton->menuItems->text = 'Print';
                    //$chart->exporting->buttons->contextButton->menuItems-> onclick = 'function() {this.print();}';
                              
                    return $chart;
            }
            
            function extractData($temporalArray,$result,$dataTableName){
                $dataArray = array();
                foreach($temporalArray as $timeperiod){
                    $dataPoint = array();
                    $dataPoint[] = strval($timeperiod);  //convert to a string value
                    
                    
                    foreach ( $result as $key => $val )
                    {
                    if($val[$dataTableName][$timeperiod] == NULL){  //this is specialised for null values
                    $dataPoint[] = $val[$dataTableName][$timeperiod];
                    }
                    else{
                    $dataPoint[] = (float) $val[$dataTableName][$timeperiod];
                    }
                    
                
                    }
                    $dataArray[] = $dataPoint;
                    
                    }
                   
                    return $dataArray;
                
                
                }        
            
            }
            ?>