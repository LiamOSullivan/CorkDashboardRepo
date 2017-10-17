<?php
App::import('Vendor', 'HighchartsPHP/Highchart');

class CarParksController extends AppController {
	/* Make the new component available */
	public $components = array('BuildGraph', 'Session', 'RequestHandler');
	


public function index() {
   
		//$this->set('title_for_graph', "Employment");
		//$this->set('employments', $this-> Employment-> find("all", array('conditions' => array("Employment.id = 1"))));
       // $this->layout = 'default_1_col';  
     
}
	

	

 public function updateParking(){
   $this->layout = 'dublin_live_1' ;
     //$this->set('Graph3', "M50_north");
     $this->set('dublin_header', "real_time_new_long_skyline_1800.png");
    /*
     //example of reading a csv file
     $CSV = file_get_contents('http://www.dohc.ie/statistics/tw/Tallaght_Hospital.csv');
       
     $CSVARRAY = str_getcsv($CSV,',');
     
     
   */

     
 
 }
    
       public function corkCarparks(){        
    $files = scandir('./cork/carparks', 1);
      $newest_file = $files[0]; 
       $json = file_get_contents('./cork/carparks/'.$newest_file);	
		  	$aContext = array(
    'http' => array(
        'proxy' => 'proxy2.nuim.ie:3128',
        'request_fulluri' => true,
    ),
);
$cxContext = stream_context_create($aContext);

        $this->set('test',  $json);
        $this->render('/Elements/corkcarparksReturn'); // This View is declared at /Elements/ajaxreturn.ctp
        
    }
    
    
     public function corkWaterLevels(){        
    $files = scandir('./cork/waterLevels', 1);
      $newest_file = $files[0]; 
       $json = file_get_contents('./cork/waterLevels/'.$newest_file);	
		  	$aContext = array(
    'http' => array(
        'proxy' => 'proxy2.nuim.ie:3128',
        'request_fulluri' => true,
    ),
);
$cxContext = stream_context_create($aContext);

        $this->set('test',  $json);
        $this->render('/Elements/corkwaterLevelsReturn'); // This View is declared at /Elements/ajaxreturn.ctp
        
    }
    
    
     public function corkBikes(){        
    $files = scandir('./cork/bikes', 1);
      $newest_file = $files[0]; 
       $json = file_get_contents('./cork/bikes/'.$newest_file);	
		  	$aContext = array(
    'http' => array(
        'proxy' => 'proxy2.nuim.ie:3128',
        'request_fulluri' => true,
    ),
);
$cxContext = stream_context_create($aContext);

        $this->set('test',  $json);
        $this->render('/Elements/corkbikesReturn'); // This View is declared at /Elements/ajaxreturn.ctp
        
    }
    
    
    
    public function travelTimes(){        
    $files = scandir('./m50', 1);
      $newest_file = $files[0]; 
       $json = file_get_contents('./m50/'.$newest_file);	
		  	$aContext = array(
    'http' => array(
        'proxy' => 'proxy2.nuim.ie:3128',
        'request_fulluri' => true,
    ),
);
$cxContext = stream_context_create($aContext);

        $this->set('test',  $json);
        $this->render('/Elements/traveltimereturn'); // This View is declared at /Elements/ajaxreturn.ctp
        
    }
    
       public function previousTravelTimes(){        
    $files = scandir('./m50', 1);
      $newest_file = $files[1]; 
       $json = file_get_contents('./m50/'.$newest_file);	
		  	$aContext = array(
    'http' => array(
        'proxy' => 'proxy2.nuim.ie:3128',
        'request_fulluri' => true,
    ),
);
$cxContext = stream_context_create($aContext);

        $this->set('test',  $json);
        $this->render('/Elements/traveltimereturn'); // This View is declared at /Elements/ajaxreturn.ctp
        
    }
    

      public function M50SouthService($fileNumber){ 
        $this->layout= '';       
        $files = scandir('./m50', 1);
          if($fileNumber == 1){
        $newest_file = $files[$fileNumber]; 
        $json = file_get_contents('./m50/'.$newest_file);
        $json_array  = json_decode($json, true);
        $m50s = @$json_array ['M50_southBound']['data'][11]['current_travel_time'];
              $fileCount =2;
              while($m50s == null){ //so that a value is always returned, if its null it finds most rect value for traveltime
                  $newest_file = $files[$fileCount]; 
                    $json = file_get_contents('./m50/'.$newest_file);
                    $json_array  = json_decode($json, true);
                    $m50s = @$json_array ['M50_southBound']['data'][11]['current_travel_time'];
                    $fileCount++;
                              
              }
        $out[] = [$m50s];
        

        $this->set(array(
            'out' => $out,                 //<-- Set the post in the view
            '_serialize' => 'out',        //<-- Tell cake to use that post
            '_jsonp' => true              // <-- And wrap it in the callback function
        ));
      }
    
    else{
           for($i=0;$i<$fileNumber;$i++){
               $newest_file = $files[$i]; 
                $json = file_get_contents('./m50/'.$newest_file);
                $json_array  = json_decode($json, true);
                $m50s = @$json_array ['M50_southBound']['data'][11]['current_travel_time'];
                $out[$i] = $m50s;  
            }
         $reversed = array_reverse($out); //so the data is right order with newest last
         $this->set(array(
            'out' => $reversed,                 //<-- Set the post in the view
            '_serialize' => 'out',   //<-- Tell cake to use that post
            '_jsonp' => true                // <-- And wrap it in the callback function
        ));
    }

        }
    
    public function M50Service($NorthOrSouth, $fileNumber){ 
        $this->layout= '';       
        $files = scandir('./m50', 1);
        if($NorthOrSouth == 'north'){
            $M50 = 'M50_northBound';
            $junctions = 10;
        }
        else{
            $M50 = 'M50_southBound';
            $juntions = 11;
        }
          if($fileNumber == 1){
        $newest_file = $files[$fileNumber]; 
        $json = file_get_contents('./m50/'.$newest_file);
        $json_array  = json_decode($json, true);
        $m50s = @$json_array [$M50]['data'][(int)$junctions]['current_travel_time'];
              $fileCount =2;
              while($m50s == null){ //so that a value is always returned, if its null it finds most rect value for traveltime
                  $newest_file = $files[$fileCount]; 
                    $json = file_get_contents('./m50/'.$newest_file);
                    $json_array  = json_decode($json, true);
                    $m50s = @$json_array [$M50]['data'][11]['current_travel_time'];
                    $fileCount++;
                              
              }
        $out[] = [$m50s];
        

        $this->set(array(
            'out' => $out,                 //<-- Set the post in the view
            '_serialize' => 'out',        //<-- Tell cake to use that post
            '_jsonp' => true              // <-- And wrap it in the callback function
        ));
      }
    
    else{
           for($i=0;$i<$fileNumber;$i++){
               $newest_file = $files[$i]; 
                $json = file_get_contents('./m50/'.$newest_file);
                $json_array  = json_decode($json, true);
                $m50s = @$json_array [$M50]['data'][(int)$junctions]['current_travel_time'];
                $out[$i] = $m50s;  
            }
         $reversed = array_reverse($out); //so the data is right order with newest last
         $this->set(array(
            'out' => $reversed,                 //<-- Set the post in the view
            '_serialize' => 'out',   //<-- Tell cake to use that post
            '_jsonp' => true                // <-- And wrap it in the callback function
        ));
    }

        }
    
    
    
      public function airQuality(){
	  
	  	$aContext = array(
    'http' => array(
        'proxy' => 'proxy2.nuim.ie:3128',
        'request_fulluri' => true,
    ),
);
$cxContext = stream_context_create($aContext);
        //$this->layout = null;
          
      $files = scandir('./environment', 1);
      $newest_file = $files[0];
      $json = file_get_contents('./environment/'.$newest_file);
        
     
      
       $this->set('test',  $json);
       $this->render('/Elements/airQualityReturn'); // This View is declared in /Elements/
        
    }
    
     public function getPreviousAirQuality(){
	  
	  	$aContext = array(
    'http' => array(
        'proxy' => 'proxy2.nuim.ie:3128',
        'request_fulluri' => true,
    ),
);
$cxContext = stream_context_create($aContext);
        //$this->layout = null;
          
      $files = scandir('./environment', 1);
      $newest_file = $files[1];
      $json = file_get_contents('./environment/'.$newest_file);
        
     
      
       $this->set('test',  $json);
       $this->render('/Elements/airQualityReturn'); // This View is declared in /Elements/
        
    }
    
   
    
 public function airQualityService($fileNumber,$valueOrDesc){
	   $this->layout= ''; 

          
      $files = scandir('./environment', 1);
     if($fileNumber == 1){
      $newest_file = $files[$fileNumber];
      $json = file_get_contents('./environment/'.$newest_file);
      $json_array  = json_decode($json, true);
      $dubAirQual = @$json_array['aqihsummary'][5]['aqih'];
      $airQualArray = explode(',', $dubAirQual);
      $airQualValue = (int)$airQualArray[0];
      $airQualDesc = $airQualArray[1];
     if($valueOrDesc=='desc')  {
         $out[] =  $airQualDesc;
     } 
         else{
           $out[] = [$airQualValue];  
         } 
     }
     
     else{
          for($i=0;$i<$fileNumber;$i++){
               $newest_file = $files[$i]; 
                $json = file_get_contents('./environment/'.$newest_file);
                $json_array  = json_decode($json, true);
                $airQual = @$json_array['aqihsummary'][5]['aqih'];
                $airQualArray = explode(',', $airQual);
                $airQualValue = (int)$airQualArray[0];
                $airQualDesc = $airQualArray[1];
              
                $airValues[$i] = $airQualValue;
                $airDescs[$i] = $airQualDesc;
            }
         if($valueOrDesc=='desc')  {
         $out = array_reverse( $airDescs);
         }
         else{
             $out = array_reverse ($airValues); 
             
         }
     }
        
        $this->set(array(
            'out' => $out,                 //<-- Set the post in the view
            '_serialize' => 'out',        //<-- Tell cake to use that post
            '_jsonp' => true              // <-- And wrap it in the callback function
        ));
     

    }
    
    
    public function averageSound($numberOfFiles){
    
        
        //get every file and the value in each one
         for($i=1;$i<15;$i++){
            $directory = './ambientSound'.$i;
            $files = scandir($directory, 1);
            $newest_file = $files[0]; 
            $json = file_get_contents($directory.'/'.$newest_file);
            $json_array  = json_decode($json, true);
            $soundArray[$i-1] = @$json_array['aleq']; //array of arrays
            $numberOfRecords[] = @$json_array['entries']; //can be different number of records need to keep them all and then get max
         }
       
        $maxnumberOfRecords = max($numberOfRecords);
        $avgarrayConter = 0;
        $flags=[];
         
       for($i=0;$i<$maxnumberOfRecords;$i++){
            $sum = 0;
            //$divisorArray = [];
            $divisor = 14;
            
            for($j=0;$j<14;$j++){
                 $flag = false;
                if (isset($soundArray[$j][$i])){ //this is needed because not all sound sensors are up-to-date
                $sum = $sum+$soundArray[$j][$i]; 
                }
                 else{
                     $divisor = $divisor-1; //subtract 1 from divisor if there are missing values for a particular time.
                }
                
            }
             $average[$avgarrayConter] = (double)$sum/$divisor;
            
            $avgarrayConter++;
}
             
         if($numberOfFiles==1){ //if only one value is requested
             $average = $average[$maxnumberOfRecords-1];
          
      }
    
         $this->set(array(
            'out' => $average,                 //<-- Set the post in the view
            '_serialize' => 'out',        //<-- Tell cake to use that post
            '_jsonp' => true              // <-- And wrap it in the callback function
        ));
        
        
        
    }
    
    
      public function ambientSound1(){
        $directory = './ambientSound1';
        $files = scandir($directory, 1);
        $newest_file = $files[0]; 
        $json = file_get_contents($directory.'/'.$newest_file);
 
        $this->set('test',  $json);
        $this->render('/Elements/ambientSoundReturn'); // This View is declared in /Elements/
        
    }
        public function ambientSound2(){
        $directory = './ambientSound2';
        $files = scandir($directory, 1);
        $newest_file = $files[0]; 
        $json = file_get_contents($directory.'/'.$newest_file);
        $this->set('test',  $json);
        $this->render('/Elements/ambientSoundReturn'); // This View is declared in /Elements/
        
    }
    
         public function ambientSound3(){
        $directory = './ambientSound3';
        $files = scandir($directory, 1);
        $newest_file = $files[0]; 
        $json = file_get_contents($directory.'/'.$newest_file);
        $this->set('test',  $json);
        $this->render('/Elements/ambientSoundReturn'); // This View is declared in /Elements/
        
    }
        public function ambientSound4(){
        $directory = './ambientSound4';
        $files = scandir($directory, 1);
        $newest_file = $files[0]; 
        $json = file_get_contents($directory.'/'.$newest_file);
        $this->set('test',  $json);
        $this->render('/Elements/ambientSoundReturn'); // This View is declared in /Elements/
        
    }
    
         public function ambientSound5(){
        $directory = './ambientSound5';
        $files = scandir($directory, 1);
        $newest_file = $files[0]; 
        $json = file_get_contents($directory.'/'.$newest_file);
        $this->layout = 'noindex';
        $this->set('test',  $json);
        $this->render('/Elements/ambientSoundReturn'); // This View is declared in /Elements/
        
    }
        public function ambientSound6(){
        $directory = './ambientSound6';
        $files = scandir($directory, 1);
        $newest_file = $files[0]; 
        $json = file_get_contents($directory.'/'.$newest_file);
        $this->set('test',  $json);
        $this->render('/Elements/ambientSoundReturn'); // This View is declared in /Elements/
        
    }
    
         public function ambientSound7(){
        $directory = './ambientSound7';
        $files = scandir($directory, 1);
        $newest_file = $files[0]; 
        $json = file_get_contents($directory.'/'.$newest_file);
        $this->set('test',  $json);
        $this->render('/Elements/ambientSoundReturn'); // This View is declared in /Elements/
        
    }
        public function ambientSound8(){
        $directory = './ambientSound8';
        $files = scandir($directory, 1);
        $newest_file = $files[0]; 
        $json = file_get_contents($directory.'/'.$newest_file);
        $this->set('test',  $json);
        $this->render('/Elements/ambientSoundReturn'); // This View is declared in /Elements/
        
    }
    
         public function ambientSound9(){
        $directory = './ambientSound9';
        $files = scandir($directory, 1);
        $newest_file = $files[0]; 
        $json = file_get_contents($directory.'/'.$newest_file);
        $this->set('test',  $json);
        $this->render('/Elements/ambientSoundReturn'); // This View is declared in /Elements/
        
    }
        public function ambientSound10(){
        $directory = './ambientSound10';
        $files = scandir($directory, 1);
        $newest_file = $files[0]; 
        $json = file_get_contents($directory.'/'.$newest_file);
        $this->set('test',  $json);
        $this->render('/Elements/ambientSoundReturn'); // This View is declared in /Elements/
        
    }
    
      public function ambientSound11(){
        $directory = './ambientSound11';
        $files = scandir($directory, 1);
        $newest_file = $files[0]; 
        $json = file_get_contents($directory.'/'.$newest_file);
        $this->set('test',  $json);
        $this->render('/Elements/ambientSoundReturn'); // This View is declared in /Elements/
        
    }
    
      public function ambientSound12(){
        $directory = './ambientSound12';
        $files = scandir($directory, 1);
        $newest_file = $files[0]; 
        $json = file_get_contents($directory.'/'.$newest_file);
        $this->set('test',  $json);
        $this->render('/Elements/ambientSoundReturn'); // This View is declared in /Elements/
        
    }
    
      public function ambientSound13(){
        $directory = './ambientSound13';
        $files = scandir($directory, 1);
        $newest_file = $files[0]; 
        $json = file_get_contents($directory.'/'.$newest_file);
        $this->set('test',  $json);
        $this->render('/Elements/ambientSoundReturn'); // This View is declared in /Elements/
        
    }
    
      public function ambientSound14(){
        $directory = './ambientSound14';
        $files = scandir($directory, 1);
        $newest_file = $files[0]; 
        $json = file_get_contents($directory.'/'.$newest_file);
        $this->set('test',  $json);
        $this->render('/Elements/ambientSoundReturn'); // This View is declared in /Elements/
        
    }
    
        
        public function map(){
            $this->layout = 'default_1_col_map' ;
            $this->set('dublin_header', "live_header_logo.png");
            
        }
    
     public function USMap(){
            $this->layout = 'default_1_col_map' ;
            $this->set('dublin_header', "live_header_logo.png");
            
        }
    
      public function map2(){
            $this->layout = 'default_1_col_map' ;
            $this->set('dublin_header', "live_header_logo.png");
            
        }
    
       public function map3(){
            $this->layout = 'default_1_col_map' ;
            $this->set('dublin_header', "live_header_logo.png");
            
        }
       public function map4(){
            $this->layout = 'default_1_col_map' ;
            $this->set('dublin_header', "live_header_logo.png");
            
        }
    
     public function map6(){
            $this->layout = 'default_1_col_map' ;
            $this->set('dublin_header', "real_time_new_long_skyline_1800");
            
        }
    
     public function environment(){
            $this->layout = 'default_1_col_map' ;
            $this->set('dublin_header', "real_time_new_long_skyline_1800");
            
        }
    
     public function travel(){
            $this->layout = 'default_1_col_map' ;
            $this->set('dublin_header', "real_time_new_long_skyline_1800");
            
        }
    
      
     public function map7(){
            $this->layout = 'default_1_col_map' ;
            $this->set('dublin_header', "live_header_logo.png");
            
        }
    
     public function iframe(){
            $this->layout = 'default_1_col_map' ;
            $this->set('dublin_header', "live_header_logo.png");
            
            
            
            
        }
        
       
       
       //weather
       
       public function weather($num){
        $directory = './weather'.$num;
        $files = scandir($directory, 1);
        $newest_file = $files[0]; 
        $json = file_get_contents($directory.'/'.$newest_file);
 
        $this->set('test',  $json);
        $this->render('/Elements/weatherReturn'); // This View is declared in /Elements/
        
    }
    
    
    
    public function nraWeather($siteID){ //change to local file via bash downloader
        $directory = './nra';
        $files = scandir($directory, 1);
        $newest_file = $files[0]; 
        
        $directory2 = './nra_static';
        $files2 = scandir($directory2, 1);
        $newest_file2 = $files2[0]; 
       
        
        
        $weatherData=simplexml_load_file('./nra/'.$newest_file) or die("Error: Cannot create object");
        $weatherSites=simplexml_load_file('./nra_static/'.$newest_file2) or die("Error: Cannot create object");
        
      //   $weatherData=simplexml_load_file('http://data.tii.ie/Datasets/Its/DatexII/WeatherData/Content.xml') or die("Error: Cannot create object");
    //    $weatherSites=simplexml_load_file('http://data.tii.ie/Datasets/Its/DatexII/WeatherSites/Content.xml') or die("Error: Cannot create object");

        $nraFullArray = array();
    for($i=0;$i<86;$i++){
        $nraWeather = array();
        $nraWeather["siteName"] = $weatherSites->payloadPublication->measurementSiteTable->measurementSiteRecord[$i]->measurementSiteName->value;
        $nraWeather["lat"] = $weatherSites->payloadPublication->measurementSiteTable->measurementSiteRecord[$i]->measurementSiteLocation->tpegpointLocation->point->pointCoordinates->latitude;
        $nraWeather["lon"] = $weatherSites->payloadPublication->measurementSiteTable->measurementSiteRecord[$i]->measurementSiteLocation->tpegpointLocation->point->pointCoordinates->longitude;
      
        
         $nraWeather["siteID"] = $weatherData->payloadPublication->siteMeasurements[$i]->measurementSiteReference;
         $nraWeather["temp"] = $weatherData->payloadPublication->siteMeasurements[$i]->measuredValue->basicDataValue->temperature->airTemperature;
        $nraWeather["number"] = $siteID;
         $nraWeather["precipitation"] = $weatherData->payloadPublication->siteMeasurements[$i]->measuredValue[1]->basicDataValue->precipitationDetail->precipitationType;
        $nraWeather["roadTemp"] = $weatherData->payloadPublication->siteMeasurements[$i]->measuredValue[3]->basicDataValue->roadSurfaceConditionMeasurements->roadSurfaceTemperature;
        $nraWeather["windSpeed"] = $weatherData->payloadPublication->siteMeasurements[$i]->measuredValue[2]->basicDataValue->wind->windSpeed;
        $nraWeather["windDirection"] = $weatherData->payloadPublication->siteMeasurements[$i]->measuredValue[2]->basicDataValue->wind->windDirectionCompass;

        $nraFullArray[$i] = $nraWeather; 
        
        
             }
        $js_nraWeather = json_encode($nraFullArray); 
        
        
        $this->set('test',  $js_nraWeather);
             
        $this->render('/Elements/nraWeahterReturn'); // This View is declared at /Elements
  
        /*          echo $xml->exchange->supplierIdentification->country;
                    echo $xml->payloadPublication->siteMeasurements[0]->measurementSiteReference."<br>";
                    echo $xml->payloadPublication->siteMeasurements[0]->measuredValue->basicDataValue->temperature->airTemperature."<br>";
                    echo $xml->payloadPublication->siteMeasurements[1]->measurementSiteReference."<br>";
                    echo $xml->payloadPublication->siteMeasurements[2]->measurementSiteReference."<br>";
       */ 
        
        
    }
    
    
     public function nowParking(){
         

         
     //$this->layout = null ;
         $dublinTime = time(); //current Time
        //$data = array($dublinTime,$y);
         
          $files = scandir('./car_parks', 1);
      $newest_file = $files[0]; 


        //$this->layout = null;
      // $latest_filename  = './cached/travel_times/m501406732490.json';
        //$json = file_get_contents('http://dataproxy.mtcc.ie/v1.5/api/traveltimes.json');
       $xmlData  = file_get_contents('./car_parks/'.$newest_file);
		
	
$aContext = array(
    'http' => array(
        'proxy' => 'proxy2.nuim.ie:3128',
        'request_fulluri' => true,
    ),
);
$cxContext = stream_context_create($aContext);
        
       // $xmlData = file_get_contents('http://www.dublincity.ie/dublintraffic/cpdata.xml', False, $cxContext);
		$xmlArray = Xml::toArray(Xml::build($xmlData));
		//$xmlArray = Xml::toArray(Xml::build('http://www.dublincity.ie/dublintraffic/cpdata.xml?'.$dublinTime));
		
		

         //$xmlArray = Xml::toArray(Xml::build('http://www.dublincity.ie/dublintraffic/cpdata.xml?'.$dublinTime));
         // proxy needed to access wget to get latest file and then read it.
         //$xmlArray = Xml::toArray(Xml::build('http://localhost/cakephp-2.4.2/carparks.xml')); //local file
         
          
         $carparks = array();
         $point =array();
            
            $spaces =  $xmlArray["carparkData"]["Northwest"]["carpark"][1]["@spaces"];
            $space2 = str_replace("\"", "", $spaces);
         
            $point = array($dublinTime*1000, $space2*1);
           
                
                for($i=0;$i<sizeof($xmlArray["carparkData"]["Northwest"]["carpark"]);$i++){
                    //ADD to Array
                    $carparks[$xmlArray["carparkData"]["Northwest"]["carpark"][$i]["@name"]] = $xmlArray["carparkData"]["Northwest"]["carpark"][$i]["@spaces"];
            }
            
                for($i=0;$i<sizeof($xmlArray["carparkData"]["Northeast"]["carpark"]);$i++){
                    //ADD to Array
                    $carparks[$xmlArray["carparkData"]["Northeast"]["carpark"][$i]["@name"]] = $xmlArray["carparkData"]["Northeast"]["carpark"][$i]["@spaces"];
            }
            
                for($i=0;$i<sizeof($xmlArray["carparkData"]["Southwest"]["carpark"]);$i++){
                    //ADD to Array
                     $name = $xmlArray["carparkData"]["Southwest"]["carpark"][$i]["@name"];
                    if (strpos( $name, 'CHURCH') !== false){ //handle c\/tchurch
                        $name = 'CCHURCH';
                    }
                    $carparks[$name] = $xmlArray["carparkData"]["Southwest"]["carpark"][$i]["@spaces"];
            }
            
                for($i=0;$i<sizeof($xmlArray["carparkData"]["Southeast"]["carpark"]);$i++){
                    //ADD to Array
                    $name = $xmlArray["carparkData"]["Southeast"]["carpark"][$i]["@name"];
                    if (strpos( $name, 'THOMAS') !== false){ //handle B\/thomas
                        $name = 'BTHOMAS';
                    }
                    $carparks[$name] = $xmlArray["carparkData"]["Southeast"]["carpark"][$i]["@spaces"];
            }

         
         $js_carparks = json_encode($carparks);
         //$js_data = json_encode($data);
   
    $this->set('test',  $js_carparks);
    $this->render('/Elements/carparkreturn'); // This View is declared at /Elements/ajaxreturn.ctp
}
   
    
         public function totalParking($previousOrCurrent){
         $dublinTime = time(); //current Time
         $files = scandir('./car_parks', 1);
             if($previousOrCurrent == "1"){ //current
                $newest_file = $files[0]; 
             }
             else{ //previous
              $newest_file = $files[1];   
             }
         $xmlData  = file_get_contents('./car_parks/'.$newest_file);
        
         $aContext = array(
            'http' => array(
            'proxy' => 'proxy2.nuim.ie:3128',
            'request_fulluri' => true,
            ),
         );
             
        $cxContext = stream_context_create($aContext);
        

		$xmlArray = Xml::toArray(Xml::build($xmlData));
        $carparks = array();
        $point =array();
            
        $spaces =  $xmlArray["carparkData"]["Northwest"]["carpark"][1]["@spaces"];
        $space2 = str_replace("\"", "", $spaces);
        $point = array($dublinTime*1000, $space2*1);
        $spaceCount = "";
           
                
        for($i=0;$i<sizeof($xmlArray["carparkData"]["Northwest"]["carpark"]);$i++){
                   
            $carparks[$xmlArray["carparkData"]["Northwest"]["carpark"][$i]["@name"]] = $xmlArray["carparkData"]["Northwest"]["carpark"][$i]["@spaces"];
              $spaceCount = $spaceCount+(int)( $xmlArray["carparkData"]["Northwest"]["carpark"][$i]["@spaces"]);
            
            }
            
                for($i=0;$i<sizeof($xmlArray["carparkData"]["Northeast"]["carpark"]);$i++){
                    //ADD to Array
                    $carparks[$xmlArray["carparkData"]["Northeast"]["carpark"][$i]["@name"]] = $xmlArray["carparkData"]["Northeast"]["carpark"][$i]["@spaces"];
                       $spaceCount = $spaceCount+(int)( $xmlArray["carparkData"]["Northeast"]["carpark"][$i]["@spaces"]);
            }
            
             
                for($i=0;$i<sizeof($xmlArray["carparkData"]["Southwest"]["carpark"]);$i++){
                    //ADD to Array
                     $name = $xmlArray["carparkData"]["Southwest"]["carpark"][$i]["@name"];
                    if (strpos( $name, 'CHURCH') !== false){ //handle c\/tchurch
                        $name = 'CCHURCH';
                    }
                    $carparks[$name] = $xmlArray["carparkData"]["Southwest"]["carpark"][$i]["@spaces"];
                   $spaceCount = $spaceCount+(int)( $xmlArray["carparkData"]["Southwest"]["carpark"][$i]["@spaces"]);
            }
            
                for($i=0;$i<sizeof($xmlArray["carparkData"]["Southeast"]["carpark"]);$i++){
                    //ADD to Array
                    $name = $xmlArray["carparkData"]["Southeast"]["carpark"][$i]["@name"];
                    if (strpos( $name, 'THOMAS') !== false){ //handle B\/thomas
                        $name = 'BTHOMAS';
                    }
                    $carparks[$name] = $xmlArray["carparkData"]["Southeast"]["carpark"][$i]["@spaces"];
                    $spaceCount = $spaceCount+(int)( $xmlArray["carparkData"]["Southeast"]["carpark"][$i]["@spaces"]);
            }

         
         $js_spaceCount = json_encode($spaceCount);
         //$js_data = json_encode($data);
   
    $this->set('test', $js_spaceCount);
    $this->render('/Elements/carparkreturn'); // This View is declared at /Elements/ajaxreturn.ctp
}
    
    
    /*ParkingService */
    
    public function totalParkingService($numberOfFiles){
         $dublinTime = time(); //current Time
         $files = scandir('./car_parks', 1);
        // $totalParking = [];
        
        if($numberOfFiles>30){
            $numberOfFiles =30;
        }
          
        for($p=0;$p<$numberOfFiles;$p++){
        $newest_file = $files[$p]; 
         
             
         $xmlData  = file_get_contents('./car_parks/'.$newest_file);
        
     
        

		$xmlArray = Xml::toArray(Xml::build($xmlData));
        $carparks = array();
        $point =array();
            
        $spaces =  $xmlArray["carparkData"]["Northwest"]["carpark"][1]["@spaces"];
        $space2 = str_replace("\"", "", $spaces);
        $point = array($dublinTime*1000, $space2*1);
        $spaceCount = 0;
           
                
        for($i=0;$i<sizeof($xmlArray["carparkData"]["Northwest"]["carpark"]);$i++){
                   
            $carparks[$xmlArray["carparkData"]["Northwest"]["carpark"][$i]["@name"]] = $xmlArray["carparkData"]["Northwest"]["carpark"][$i]["@spaces"];
              $spaceCount = $spaceCount+(int)( $xmlArray["carparkData"]["Northwest"]["carpark"][$i]["@spaces"]);
            
            }
            
                for($i=0;$i<sizeof($xmlArray["carparkData"]["Northeast"]["carpark"]);$i++){
                    //ADD to Array
                    $carparks[$xmlArray["carparkData"]["Northeast"]["carpark"][$i]["@name"]] = $xmlArray["carparkData"]["Northeast"]["carpark"][$i]["@spaces"];
                       $spaceCount = $spaceCount+(int)( $xmlArray["carparkData"]["Northeast"]["carpark"][$i]["@spaces"]);
            }
            
             
                for($i=0;$i<sizeof($xmlArray["carparkData"]["Southwest"]["carpark"]);$i++){
                    //ADD to Array
                     $name = $xmlArray["carparkData"]["Southwest"]["carpark"][$i]["@name"];
                    if (strpos( $name, 'CHURCH') !== false){ //handle c\/tchurch
                        $name = 'CCHURCH';
                    }
                    $carparks[$name] = $xmlArray["carparkData"]["Southwest"]["carpark"][$i]["@spaces"];
                   $spaceCount = $spaceCount+(int)( $xmlArray["carparkData"]["Southwest"]["carpark"][$i]["@spaces"]);
            }
            
                for($i=0;$i<sizeof($xmlArray["carparkData"]["Southeast"]["carpark"]);$i++){
                    //ADD to Array
                    $name = $xmlArray["carparkData"]["Southeast"]["carpark"][$i]["@name"];
                    if (strpos( $name, 'THOMAS') !== false){ //handle B\/thomas
                        $name = 'BTHOMAS';
                    }
                    $carparks[$name] = $xmlArray["carparkData"]["Southeast"]["carpark"][$i]["@spaces"];
                    $spaceCount = $spaceCount+(int)( $xmlArray["carparkData"]["Southeast"]["carpark"][$i]["@spaces"]);
            }
            
            $totalParking[] = $spaceCount;

        }
         
         $reversed = array_reverse($totalParking); //so the data is right order with newest last
         $this->set(array(
            'out' => $reversed,                 //<-- Set the post in the view
            '_serialize' => 'out',   //<-- Tell cake to use that post
            '_jsonp' => true                // <-- And wrap it in the callback function
        ));
        
        /* $js_spaceCount = json_encode($spaceCount);
         //$js_data = json_encode($data);
   
    $this->set('test', $js_spaceCount);
    $this->render('/Elements/carparkreturn'); // This View is declared at /Elements/ajaxreturn.ctp*/
}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     public function hydroLevels(){
         
         $zip = new ZipArchive;
         $res = $zip->open('./water_guages/09037/temp.zip');
         if ($res === TRUE) {
            $zip->extractTo('./water_guages/09037/');
            $zip->close();
  
} else {
  
}

        $waterLevelA= array();
        $waterLevelB= array();
        $waterLevelC= array();
        $c=0;
        $a=0;
        $b = 0;
          //for a single site : Tolka River - Botanic Gardens 53.3741435 -6.2724521 -id:121088
        //if (($handle = fopen("/home/ubuntu/output/output2.csv", "r")) !== FALSE) {
         // if (($handle = fopen("./water_guages/121088/".$newest_121088, "r")) !== FALSE) {
          if (($handle = fopen("./water_guages/121088/121088.csv", "r")) !== FALSE) {
           $i=0;
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                       
                if (! $data[1] == ""){ //else they are missing ones or future ones
                
                $waterLevelA[$i] = $data[0]; //add the time to the variable
                $waterLevelA[$i+1] = $data[1]; //add the time to the variable
                    $i=$i+2;
                }
        }
         
                $waterLevel[0] = "Tolka River - Botanic Gardens"; //add the time to the variable
                $waterLevel[1] = 53.3741435; //add the time to the variable
                $waterLevel[2] = -6.2724521;
                $waterLevel[3] = $waterLevelA[sizeOf($waterLevelA)-2]; //current
                $waterLevel[4] = $waterLevelA[sizeOf($waterLevelA)-1]; //current
                $waterLevel[5] = $waterLevelA[sizeOf($waterLevelA)-10]; //previous hour
                $waterLevel[6] = $waterLevelA[sizeOf($waterLevelA)-9]; //previous hour
            
            
        }
         
            
       
         //for a single site : Owendoher River - Willowbrook Road 53.29476020 -6.28742110 -id:109804
       // if (($handle = fopen("/home/ubuntu/output/output2.csv", "r")) !== FALSE) {
         // if (($handle = fopen("./water_guages/109804/".$newest_109804, "r")) !== FALSE) {
         if (($handle = fopen("./water_guages/109804/109804.csv", "r")) !== FALSE) {
            $i=0;
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                          
                if (! $data[1] == ""){ //else they are missing ones or future ones
               
                $waterLevelB[$i] = $data[0]; //add the time to the variable
                $waterLevelB[$i+1] = $data[1]; //add the time to the variable
                $i=$i+2;
                }
        }
                $waterLevel[7] = "Owendoher River - Willowbrook Road"; //add the time to the variable
                $waterLevel[8] = 53.29476020; //add the time to the variable
                $waterLevel[9] = -6.28742110;
                $waterLevel[10] = $waterLevelB[sizeOf($waterLevelB)-2]; //current
                $waterLevel[11] = $waterLevelB[sizeOf($waterLevelB)-1]; //current
                $waterLevel[12] = $waterLevelB[sizeOf($waterLevelB)-10]; //previous hour
                $waterLevel[13] = $waterLevelB[sizeOf($waterLevelB)-9]; //previous hour
        }
       
        //for a single site : Dodder River - Waldrons Bridge 53.30580450 -6.26680200 -id:110215
      
         
              // if (($handle = fopen("/home/ubuntu/output/output2.csv", "r")) !== FALSE) {
         // if (($handle = fopen("./water_guages/110215/".$newest_110215, "r")) !== FALSE) {
          if (($handle = fopen("./water_guages/110215/110215.csv", "r")) !== FALSE) {
                 $i=0;  
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                  
                if (! $data[1] == ""){ //else they are missing ones or future ones
               
                $waterLevelC[$i] = $data[0]; //add the time to the variable
                $waterLevelC[$i+1] = $data[1]; //add the level to the variable
                $i=$i+2;  
                }
        }
                $waterLevel[14] = "Dodder River - Waldrons Bridge"; //add the time to the variable
                $waterLevel[15] =  53.30580450; //add the time to the variable
                $waterLevel[16] = -16.26680200;
                $waterLevel[17] = $waterLevelC[sizeOf($waterLevelC)-2]; //current
                $waterLevel[18] = $waterLevelC[sizeOf($waterLevelC)-1]; //current
                $waterLevel[19] = $waterLevelC[sizeOf($waterLevelC)-10]; //previous hour
                $waterLevel[20] = $waterLevelC[sizeOf($waterLevelC)-9]; //previous hour
        }
        
  
            
            //for a single site : Santry River - Cadburys 53.39328824368922 -6.1982727849136765 -id: 1042933
           
         
              // if (($handle = fopen("/home/ubuntu/output/output2.csv", "r")) !== FALSE) {
          //if (($handle = fopen("./water_guages/1042933/".$newest_1042933, "r")) !== FALSE) {
            if (($handle = fopen("./water_guages/1042933/1042933.csv", "r")) !== FALSE) {
            
                $i=0;
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                         
                if (! $data[1] == ""){ //else they are missing ones or future ones
             
                $waterLevelD[$i] = $data[0]; //add the time to the variable
                $waterLevelD[$i+1] = $data[1]; //add the time to the variable
                $i= $i+2;
                }
        }
                $waterLevel[21] = "Santry River - Cadburys"; //add the time to the variable
                $waterLevel[22] =  53.393288; //add the time to the variable
                $waterLevel[23] = -6.198272;
                $waterLevel[24] = $waterLevelD[sizeOf($waterLevelD)-2]; //current
                $waterLevel[25] = $waterLevelD[sizeOf($waterLevelD)-1]; //current
                $waterLevel[26] = $waterLevelD[sizeOf($waterLevelD)-10]; //previous hour
                $waterLevel[27] = $waterLevelD[sizeOf($waterLevelD)-9]; //previous hour
        }
       
        
            
              //for a single site : Griffeen River - Lucan 53.35660520 -6.45054730 -id:106931
           
         
              // if (($handle = fopen("/home/ubuntu/output/output2.csv", "r")) !== FALSE) {
          //if (($handle = fopen("./water_guages/106931/".$newest_106931, "r")) !== FALSE) {
          if (($handle = fopen("./water_guages/106931/106931.csv", "r")) !== FALSE) {
            
                $i=0;
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                         
                if (! $data[1] == ""){ //else they are missing ones or future ones
               
                $waterLevelE[$i] = $data[0]; //add the time to the variable
                $waterLevelE[$i+1] = $data[1]; //add the time to the variable
                $i=$i+2;
               
                }
        }
                
                $waterLevel[28] = "Griffeen River - Lucan"; //add the time to the variable
                $waterLevel[29] = 53.35660520; //add the time to the variable
                $waterLevel[30] = -6.45054730;
                $waterLevel[31] = $waterLevelE[sizeOf($waterLevelE)-2]; //current
                $waterLevel[32] = $waterLevelE[sizeOf($waterLevelE)-1]; //current
                $waterLevel[33] = $waterLevelE[sizeOf($waterLevelE)-10]; //previous hour
                $waterLevel[34] = $waterLevelE[sizeOf($waterLevelE)-9]; //previous hour
    
        }
       
        
        $js_csv = json_encode($waterLevel);
        $this->set('test',  $js_csv);
        $this->render('/Elements/csvReturn'); 
        
    }
    
    
    public function readWaterLevels(){ 
    
        $waterLevel= array();
        $waterLevelA= array();
        $waterLevelB= array();
        $waterLevelC= array();
        $waterLevelD= array();
  
        //for a single site : 08008 Broadmeadow nr Swords - 53.475001, -6.231767
         $files = scandir('./water_guages/08008', 1);
            $newest_08008 = $files[0]; 
         
              // if (($handle = fopen("/home/ubuntu/output/output2.csv", "r")) !== FALSE) {
          if (($handle = fopen("./water_guages/08008/".$newest_08008, "r")) !== FALSE) {
            $i = 0;
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { //only adds the latest
              
                $waterLevelA[$i] = $data[0]; //add the time to the variable
                $waterLevelA[$i+1] = $data[1]; //add the water level to the variable
                $i=$i+2;
        }
               
                $waterLevel[0] = "Broadmeadow";
                $waterLevel[1] = 53.475001;
                $waterLevel[2] = -6.231767; 
                $waterLevel[3] = $waterLevelA[sizeOf($waterLevelA)-2]; //current
                $waterLevel[4] = $waterLevelA[sizeOf($waterLevelA)-1]; //current
                $waterLevel[5] = $waterLevelA[sizeOf($waterLevelA)-10]; //previous hour
                $waterLevel[6] = $waterLevelA[sizeOf($waterLevelA)-9]; //previous hour
          
        }
        
        
        
       
         //for a single site : 09001 Leixlip - 53.368636, -6.490621    
          $files = scandir('./water_guages/09001', 1);
            $newest_09001 = $files[0]; 
     
              // if (($handle = fopen("/home/ubuntu/output/output2.csv", "r")) !== FALSE) {
          if (($handle2 = fopen("./water_guages/09001/".$newest_09001, "r")) !== FALSE) {
           
           $i=0;
            while (($data2 = fgetcsv($handle2, 1000, ",")) !== FALSE) {  //only adds the latest
              
                $waterLevelB[$i] = $data2[0]; //add the time to the variable
                $waterLevelB[$i+1] = $data2[1]; //add the water level to the variable
                $i=$i+2;
        }
                $waterLevel[7] = "Leixlip";
                $waterLevel[8] = 53.368636;
                $waterLevel[9] = -6.490621;
                $waterLevel[10] = $waterLevelB[sizeOf($waterLevelB)-2]; //current
                $waterLevel[11] = $waterLevelB[sizeOf($waterLevelB)-1]; //current
                $waterLevel[12] = $waterLevelB[sizeOf($waterLevelB)-10]; //previous hour
                $waterLevel[13] = $waterLevelB[sizeOf($waterLevelB)-9]; //previous hour
            
            
        }
        
        
     
        
        //for a single site :  09036 Kerdiffstown - 53.259309, -6.628123
            
                $files = scandir('./water_guages/09036', 1);
            $newest_09036 = $files[0]; 
         
              // if (($handle = fopen("/home/ubuntu/output/output2.csv", "r")) !== FALSE) {
          if (($handle3 = fopen("./water_guages/09036/".$newest_09036, "r")) !== FALSE) {
                 $i=0;
            while (($data2 = fgetcsv($handle3, 1000, ",")) !== FALSE) { //only adds the latest
               
                $waterLevelC[$i] = $data2[0]; //add the time to the variable
                $waterLevelC[$i+1] = $data2[1]; //add the water level to the variable
                $i=$i+2;
        }
                $waterLevel[14] = "Kerdiffstown";
                $waterLevel[15] = 53.259309;
                $waterLevel[16] = -6.628123;
                $waterLevel[17] = $waterLevelC[sizeOf($waterLevelC)-2]; //current
                $waterLevel[18] = $waterLevelC[sizeOf($waterLevelC)-1]; //current
                $waterLevel[19] = $waterLevelC[sizeOf($waterLevelC)-10]; //previous hour
                $waterLevel[20] = $waterLevelC[sizeOf($waterLevelC)-9]; //previous hour
                
                 
        }
        
        
        //for a single site : 09010 Waldrons Bridge 
         $files = scandir('./water_guages/09010', 1);
            $newest_09010 = $files[0]; 
         
              // if (($handle = fopen("/home/ubuntu/output/output2.csv", "r")) !== FALSE) {
          if (($handle = fopen("./water_guages/09010/".$newest_09010, "r")) !== FALSE) {
            $i = 0;
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { //only adds the latest
              
                $waterLevelD[$i] = $data[0]; //add the time to the variable
                $waterLevelD[$i+1] = $data[1]; //add the water level to the variable
                $i=$i+2;
        }
               
                $waterLevel[21] = "Dodder River - Waldrons Bridge"; //add the time to the variable
                $waterLevel[22] =  53.30580450; //add the time to the variable
                $waterLevel[23] = -6.26680200;
                $waterLevel[24] = $waterLevelD[sizeOf($waterLevelD)-2]; //current
                $waterLevel[25] = $waterLevelD[sizeOf($waterLevelD)-1]; //current
                $waterLevel[26] = $waterLevelD[sizeOf($waterLevelD)-10]; //previous hour
                $waterLevel[27] = $waterLevelD[sizeOf($waterLevelD)-9]; //previous hour
          
        }
        $js_csv = json_encode($waterLevel);
        $this->set('test',  $js_csv);
        $this->render('/Elements/csvReturn');    
        
        
    }
    
    
    
       public function readCSVSegments(){
        $newData = '';//array();
        $segTravelTime = array();
        $output = array();
        $row =0;
        $counter =0;
        $numSegments = 0;
        $oldDirection = 0;
        $oldRoute =0;
        $currentDirection = 0;
        $oldDirection =0;
        
        
      
          $files = scandir('./trips', 1);
        $newest_file = $files[0]; 
 
        
   // if (($handle = fopen("http://www.dublinked.ie/datastore/server/FileServerWeb/FileChecker?metadataUUID=5f2af6992c06455992f3d8f69156e98c&filename=trips.csv", "r")) !== FALSE)
      if (($handle = fopen('./trips/'.$newest_file, "r")) !== FALSE) 
    {
      //   if (($handle = fopen("http://localhost/cakephp-2.4.2/trips.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data); //7 data columns
       
        $simpleCounter = 0;
         $c=0;
         //if($data[$c] == $route && $data[$c+1] ==$segment && $data[$c+2]==$direction){  ///Route 1 & Direction 1
              $newData = $data[3]; //3 is travel time
             // $name = $routeid;
              $temp = array();
              $temp['route'] = $data[0];
              $temp['segment'] = $data[1];
              $temp['direction'] = $data[2]; 
              $temp['travelTime'] = $newData;
              $output[$row] = $temp;  //this is all travel times
              $row++;
          // }
        
    }
     fclose($handle);    
    $js_csv = json_encode($output);
    $this->set('test',  $js_csv);
    $this->render('/Elements/csvReturn');     
    }
    }
    
    
    
    
    public function readCSV(){
        $newData = '';//array();
        $segTravelTime = array();
        $cumulativeTravelTime = array();
        $row =1;
        $counter =0;
        $numSegments = 0;
        $oldDirection = 0;
        $oldRoute =0;
        $currentDirection = 0;
        $oldDirection =0;
        
         
        $files = scandir('./trips', 1);
        $newest_file = $files[0]; 


        //$this->layout = null;
      // $latest_filename  = './cached/travel_times/m501406732490.json';
    //$json = file_get_contents('http://dataproxy.mtcc.ie/v1.5/api/traveltimes.json');
      // $xmlData  = file_get_contents('./trips/'.$newest_file);
       

      //  if (($handle = fopen("http://www.dublinked.ie/datastore/server/FileServerWeb/FileChecker?metadataUUID=5f2af6992c06455992f3d8f69156e98c&filename=trips.csv", "r")) !== FALSE) 
         
        if (($handle = fopen('./trips/'.$newest_file, "r")) !== FALSE) 
        
        {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data); //7 data columns
       $row++;
       $currentDirection = $data[0];
       $CurrentRoute = $data[2];
        $simpleCounter = 0;
        
       //for ($c=0; $c < $num; $c++) { //may not need this loop as positions are fixed
           $c=0;
          if($data[$c] == 1 && $data[$c+2] ==1){  ///Route 1 & Direction 1
              $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
              $name = 'R1D1';
              $temp = array();
              $temp['name'] = $name;
              $temp['travelTime'] = $newData;
              $cumulativeTravelTime[0] = $temp;  //this is all travel times   
           }
           
       
           if($data[$c] == 1 && $data[$c+2] ==2){  ///Route 1 & Direction 2
             $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $name = 'R1D2';
            $temp = array();
            $temp['name'] = $name;
            $temp['travelTime'] = $newData;
            $cumulativeTravelTime[1] = $temp;
           }
           
   
           
          if($data[$c] == 6 && $data[$c+2] ==1){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $name = 'R6D1';
            $temp = array();
            $temp['name'] = $name;
            $temp['travelTime'] = $newData;
            $cumulativeTravelTime[2] = $temp;
           }
         
           if($data[$c] == 6 && $data[$c+2] ==2){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $name = 'R6D2';
            $temp = array();
            $temp['name'] = $name;
            $temp['travelTime'] = $newData;
            $cumulativeTravelTime[3] = $temp;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
           
         /* if($data[$c] == 3 && $data[$c+2] ==2){  ///Route 3 & Direction 2 
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $cumulativeTravelTime['R3D2'] = $newData;
            //Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }*/
           
           if($data[$c] == 8 && $data[$c+2] ==1){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $name = 'R8D1';
            $temp = array();
            $temp['name'] = $name;
            $temp['travelTime'] = $newData;
            $cumulativeTravelTime[4] = $temp;
           }
           
            if($data[$c] == 8 && $data[$c+2] ==2){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $name = 'R8D2';
            $temp = array();
            $temp['name'] = $name;
            $temp['travelTime'] = $newData;
            $cumulativeTravelTime[5] = $temp;
           }
           
           if($data[$c] == 7 && $data[$c+2] ==1){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $name = 'R7D1';
            $temp = array();
            $temp['name'] = $name;
            $temp['travelTime'] = $newData;
            $cumulativeTravelTime[6] = $temp;
           }
           
           if($data[$c] == 7 && $data[$c+2] ==2){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $name = 'R7D2';
            $temp = array();
            $temp['name'] = $name;
            $temp['travelTime'] = $newData;
            $cumulativeTravelTime[7] = $temp;
           }
           
            if($data[$c] == 30 && $data[$c+2] ==1){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $name = 'R30D1';
            $temp = array();
            $temp['name'] = $name;
            $temp['travelTime'] = $newData;
            $cumulativeTravelTime[8] = $temp;
           }
           
              if($data[$c] == 30 && $data[$c+2] ==2){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $name = 'R30D2';
            $temp = array();
            $temp['name'] = $name;
            $temp['travelTime'] = $newData;
            $cumulativeTravelTime[9] = $temp;
           }
           
           if($data[$c] == 31 && $data[$c+2] ==1){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $name = 'R31D1';
            $temp = array();
            $temp['name'] = $name;
            $temp['travelTime'] = $newData;
            $cumulativeTravelTime[10] = $temp;
           }
           
            if($data[$c] == 31 && $data[$c+2] ==2){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $name = 'R31D2';
            $temp = array();
            $temp['name'] = $name;
            $temp['travelTime'] = $newData;
            $cumulativeTravelTime[11] = $temp;
           }
           
            if($data[$c] == 9 && $data[$c+2] ==1){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $name = 'R9D1';
            $temp = array();
            $temp['name'] = $name;
            $temp['travelTime'] = $newData;
            $cumulativeTravelTime[12] = $temp;
           }
        
             if($data[$c] == 9 && $data[$c+2] ==2){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $name = 'R9D2';
            $temp = array();
            $temp['name'] = $name;
            $temp['travelTime'] = $newData;
            $cumulativeTravelTime[13] = $temp;
           }
           
    
        
         if($data[$c] == 14 && $data[$c+2] ==1){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $name = 'R14D1';
            $temp = array();
            $temp['name'] = $name;
            $temp['travelTime'] = $newData;
            $cumulativeTravelTime[14] = $temp;
           }
        
        if($data[$c] == 14 && $data[$c+2] ==2){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $name = 'R14D2';
            $temp = array();
            $temp['name'] = $name;
            $temp['travelTime'] = $newData;
            $cumulativeTravelTime[15] = $temp;
           }
        
           if($data[$c] == 13 && $data[$c+2] ==1){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $name = 'R13D1';
            $temp = array();
            $temp['name'] = $name;
            $temp['travelTime'] = $newData;
            $cumulativeTravelTime[16] = $temp;
           }
        
        if($data[$c] == 13 && $data[$c+2] ==2){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $name = 'R13D2';
            $temp = array();
            $temp['name'] = $name;
            $temp['travelTime'] = $newData;
            $cumulativeTravelTime[17] = $temp;
           }
        
            if($data[$c] == 40&& $data[$c+2] ==1){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $name = 'R40D1';
            $temp = array();
            $temp['name'] = $name;
            $temp['travelTime'] = $newData;
            $cumulativeTravelTime[18] = $temp;
           }
        
        if($data[$c] == 40 && $data[$c+2] ==2){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $name = 'R40D2';
            $temp = array();
            $temp['name'] = $name;
            $temp['travelTime'] = $newData;
            $cumulativeTravelTime[19] = $temp;
           }
        
       
        
                 if($data[$c] == 15 && $data[$c+2] ==1){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $name = 'R15D1';
            $temp = array();
            $temp['name'] = $name;
            $temp['travelTime'] = $newData;
            $cumulativeTravelTime[20] = $temp;
           }
        
        if($data[$c] == 15 && $data[$c+2] ==2){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $name = 'R15D2';
            $temp = array();
            $temp['name'] = $name;
            $temp['travelTime'] = $newData;
            $cumulativeTravelTime[21] = $temp;
           }
         
        if($data[$c] == 5 && $data[$c+2] ==1){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $name = 'R5D1';
            $temp = array();
            $temp['name'] = $name;
            $temp['travelTime'] = $newData;
            $cumulativeTravelTime[22] = $temp;
           }
        
        if($data[$c] == 5 && $data[$c+2] ==2){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $name = 'R5D2';
            $temp = array();
            $temp['name'] = $name;
            $temp['travelTime'] = $newData;
            $cumulativeTravelTime[23] = $temp;
           }
              
        if($data[$c] == 4 && $data[$c+2] ==1){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $name = 'R4D1';
            $temp = array();
            $temp['name'] = $name;
            $temp['travelTime'] = $newData;
            $cumulativeTravelTime[24] = $temp;
           }
        
        if($data[$c] == 4 && $data[$c+2] ==2){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $name = 'R4D2';
            $temp = array();
            $temp['name'] = $name;
            $temp['travelTime'] = $newData;
            $cumulativeTravelTime[25] = $temp;
           }
        
           if($data[$c] == 24 && $data[$c+2] ==1){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $name = 'R24D1';
            $temp = array();
            $temp['name'] = $name;
            $temp['travelTime'] = $newData;
            $cumulativeTravelTime[26] = $temp;
           }
        
        if($data[$c] == 24 && $data[$c+2] ==2){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $name = 'R24D2';
            $temp = array();
            $temp['name'] = $name;
            $temp['travelTime'] = $newData;
            $cumulativeTravelTime[26] = $temp;
           }

        
   
       
           
           /*
           if($data[$c] == 10 && $data[$c+2] ==1){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $cumulativeTravelTime['R10D1'] = $newData;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
           
           if($data[$c] == 10 && $data[$c+2] ==2){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $cumulativeTravelTime['R10D2'] = $newData;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
           
           if($data[$c] == 11 && $data[$c+2] ==1){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $cumulativeTravelTime['R11D1'] = $newData;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
           
           if($data[$c] == 11 && $data[$c+2] ==2){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $cumulativeTravelTime['R11D2'] = $newData;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
           
           if($data[$c] == 12 && $data[$c+2] ==1){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $cumulativeTravelTime['R13D1'] = $newData;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
           
            if($data[$c] == 12 && $data[$c+2] ==2){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            
            $cumulativeTravelTime['R12D2'] = $newData;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
           
             if($data[$c] == 13 && $data[$c+2] ==1){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $cumulativeTravelTime['R13D1'] = $newData;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
           
           if($data[$c] == 13 && $data[$c+2] ==2){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $cumulativeTravelTime['R13D2'] = $newData;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
           
         if($data[$c] == 14 && $data[$c+2] ==1){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $cumulativeTravelTime['R14D1'] = $newData;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
           
           if($data[$c] == 14 && $data[$c+2] ==2){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $cumulativeTravelTime['R14D2'] = $newData;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
           
           
           if($data[$c] == 16 && $data[$c+2] ==1){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $cumulativeTravelTime['R16D1'] = $newData;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
           
           if($data[$c] == 16 && $data[$c+2] ==2){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $cumulativeTravelTime['R16D2'] = $newData;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
           
           
           if($data[$c] == 18 && $data[$c+2] ==1){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $cumulativeTravelTime['R18D1'] = $newData;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
      
           if($data[$c] == 18 && $data[$c+2] ==2){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $cumulativeTravelTime['R18D2'] = $newData;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
           
           if($data[$c] == 19 && $data[$c+2] ==1){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $cumulativeTravelTime['R19D1'] = $newData;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
           
           if($data[$c] == 19 && $data[$c+2] ==2){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $cumulativeTravelTime['R19D2'] = $newData;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
           
            if($data[$c] == 21 && $data[$c+2] ==1){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $cumulativeTravelTime['R21D1'] = $newData;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
           
           if($data[$c] == 21 && $data[$c+2] ==2){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $cumulativeTravelTime['R21D2'] = $newData;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
           
            if($data[$c] == 23 && $data[$c+2] ==1){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $cumulativeTravelTime['R23D1'] = $newData;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
           
           if($data[$c] == 23 && $data[$c+2] ==2){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $cumulativeTravelTime['R23D2'] = $newData;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
           
            if($data[$c] == 27 && $data[$c+2] ==1){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $cumulativeTravelTime['R27D1'] = $newData;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
           
           if($data[$c] == 27 && $data[$c+2] ==2){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $cumulativeTravelTime['R27D2'] = $newData;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
           
           if($data[$c] == 28 && $data[$c+2] ==1){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $cumulativeTravelTime['R28D1'] = $newData;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
           
           if($data[$c] == 28 && $data[$c+2] ==2){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $cumulativeTravelTime['R28D2'] = $newData;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
           
           if($data[$c] == 29 && $data[$c+2] ==1){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $cumulativeTravelTime['R29D1'] = $newData;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
           
           if($data[$c] == 29 && $data[$c+2] ==2){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $cumulativeTravelTime['R29D2'] = $newData;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
           
            if($data[$c] == 30 && $data[$c+2] ==1){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $cumulativeTravelTime['R30D1'] = $newData;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
           
            if($data[$c] == 30 && $data[$c+2] ==2){  ///Route 6 & Direction 2
            $newData = $data[4]; //4 is cumulative travel time..this overwrites each one...the last one is total route travel time
            $cumulativeTravelTime['R30D2'] = $newData;
           // Debugger::log('IN' .$data[$c] .' ' . $data[$c+2] .' ' .$newData);
           }
           
        */
           
          
       
           
           else{
               //$cumulativeTravelTime['R1D2'] = $row;
           }
           
  
           
           
           
          
      // }
       $oldDirection = $data[0];
       $oldRoute = $data[2]; 
        
  }
    
  
    
    fclose($handle);
    }
    $js_csv = json_encode($cumulativeTravelTime);
        
         //$js_data = json_encode($data);
   
    $this->set('test',  $js_csv);
    $this->render('/Elements/csvReturn');    
    
}

    
    
    function is_url_exist($url){
        
    $ch = curl_init($url);    
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($code == 200){
       $status = true;
       
    }else{
      $status = false;
    }
    curl_close($ch);
    
        //DEBUGGER::log($status);
   return $status;
}
     
     
 
}
                            
                            
                            
                            
                            