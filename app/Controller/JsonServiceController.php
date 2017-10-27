<?php

App::import('Vendor', 'HighchartsPHP/Highchart');
App::uses('Component', 'Controller');

class JsonServiceController extends AppController {
    /* Make the new component available */

    public $components = array('BuildGraph', 'Session', 'RequestHandler');

    public function index() {
        
    }

//   public function M50Service($NorthOrSouth, $fileNumber){ 
//        $this->layout= '';       
//        $files = scandir('./m50', 1);
//        if($NorthOrSouth == 'north'){
//            $M50 = 'M50_northBound';
//            $junctions = 10;
//        }
//        else{
//            $M50 = 'M50_southBound';
//            $junctions = 11;
//        }
//          if($fileNumber == 1){
//        $newest_file = $files[$fileNumber]; 
//        $json = file_get_contents('./m50/'.$newest_file);
//        $json_array  = json_decode($json, true);
//        $m50s = @$json_array [$M50]['data'][(int)$junctions]['current_travel_time'];
//              $fileCount =2;
//              while($m50s == null){ //so that a value is always returned, if its null it finds most rect value for traveltime
//                  $newest_file = $files[$fileCount]; 
//                    $json = file_get_contents('./m50/'.$newest_file);
//                    $json_array  = json_decode($json, true);
//                    $m50s = @$json_array [$M50]['data'][11]['current_travel_time'];
//                    $fileCount++;
//                              
//              }
//        $out[] = [$m50s];
//        
//
//        $this->set(array(
//            'out' => $out,                 //<-- Set the post in the view
//            '_serialize' => 'out',        //<-- Tell cake to use that post
//            '_jsonp' => true              // <-- And wrap it in the callback function
//        ));
//      }
//    
//    else{
//           for($i=0;$i<$fileNumber;$i++){
//               $newest_file = $files[$i]; 
//                $json = file_get_contents('./m50/'.$newest_file);
//                $json_array  = json_decode($json, true);
//                $m50s = @$json_array [$M50]['data'][(int)$junctions]['current_travel_time'];
//                $out[$i] = $m50s;  
//            }
//         $reversed = array_reverse($out); //so the data is right order with newest last
//         $this->set(array(
//            'out' => $reversed,                 //<-- Set the post in the view
//            '_serialize' => 'out',   //<-- Tell cake to use that post
//            '_jsonp' => true                // <-- And wrap it in the callback function
//        ));
//    }
//
//        }





    public function airQualityService($fileNumber, $valueOrDesc) {
        $this->layout = '';


        $files = scandir('./environment', 1);
        if ($fileNumber == 1) {
            $newest_file = $files[$fileNumber];
            $json = file_get_contents('./environment/' . $newest_file);
            $json_array = json_decode($json, true);
            $dubAirQual = @$json_array['aqihsummary'][5]['aqih'];
            $airQualArray = explode(',', $dubAirQual);
            $airQualValue = (int) $airQualArray[0];
            $airQualDesc = $airQualArray[1];
            if ($valueOrDesc == 'desc') {
                $out[] = $airQualDesc;
            } else {
                $out[] = [$airQualValue];
            }
        } else {
            for ($i = 0; $i < $fileNumber; $i++) {
                $newest_file = $files[$i];
                $json = file_get_contents('./environment/' . $newest_file);
                $json_array = json_decode($json, true);
                $airQual = @$json_array['aqihsummary'][5]['aqih'];
                $airQualArray = explode(',', $airQual);
                $airQualValue = (int) $airQualArray[0];
                $airQualDesc = $airQualArray[1];

                $airValues[$i] = $airQualValue;
                $airDescs[$i] = $airQualDesc;
            }
            if ($valueOrDesc == 'desc') {
                $out = array_reverse($airDescs);
            } else {
                $out = array_reverse($airValues);
            }
        }

        $this->set(array(
            'out' => $out, //<-- Set the post in the view
            '_serialize' => 'out', //<-- Tell cake to use that post
            '_jsonp' => true              // <-- And wrap it in the callback function
        ));
    }

    public function averageSoundService($numberOfFiles) {


        //gives since midnoght 
        //get every file and the value in each one
        for ($i = 1; $i < 15; $i++) {
            $directory = './ambientSound' . $i;
            $files = scandir($directory, 1);
            $newest_file = $files[0];
            $json = file_get_contents($directory . '/' . $newest_file);
            $json_array = json_decode($json, true);
            $soundArray[$i - 1] = @$json_array['aleq']; //array of arrays
            $numberOfRecords[] = @$json_array['entries']; //can be different number of records need to keep them all and then get max
        }

        $maxnumberOfRecords = max($numberOfRecords);
        $avgarrayConter = 0;
        $flags = [];

        for ($i = 0; $i < $maxnumberOfRecords; $i++) {
            $sum = 0;
            //$divisorArray = [];
            $divisor = 14;

            for ($j = 0; $j < 14; $j++) {
                $flag = false;
                if (isset($soundArray[$j][$i])) { //this is needed because not all sound sensors are up-to-date
                    $sum = $sum + $soundArray[$j][$i];
                } else {
                    $divisor = $divisor - 1; //subtract 1 from divisor if there are missing values for a particular time.
                }
            }
            $average[$avgarrayConter] = (double) $sum / $divisor;

            $avgarrayConter++;
        }

        if ($numberOfFiles == 1) { //if only one value is requested
            $average = $average[$maxnumberOfRecords - 1];
        }

        $this->set(array(
            'out' => $average, //<-- Set the post in the view
            '_serialize' => 'out', //<-- Tell cake to use that post
            '_jsonp' => true              // <-- And wrap it in the callback function
        ));
    }

    /* ParkingService */

    public function parkingService($numberOfFiles) {
        $dublinTime = time(); //current Time
        $files = scandir('./car_parks', 1);
        // $totalParking = [];

        if ($numberOfFiles > 30) {
            $numberOfFiles = 30;
        }

        for ($p = 0; $p < $numberOfFiles; $p++) {
            $newest_file = $files[$p];


            $xmlData = file_get_contents('./car_parks/' . $newest_file);




            $xmlArray = Xml::toArray(Xml::build($xmlData));
            $carparks = array();
            $point = array();

            $spaces = $xmlArray["carparkData"]["Northwest"]["carpark"][1]["@spaces"];
            $space2 = str_replace("\"", "", $spaces);
            $point = array($dublinTime * 1000, $space2 * 1);
            $spaceCount = 0;


            for ($i = 0; $i < sizeof($xmlArray["carparkData"]["Northwest"]["carpark"]); $i++) {

                $carparks[$xmlArray["carparkData"]["Northwest"]["carpark"][$i]["@name"]] = $xmlArray["carparkData"]["Northwest"]["carpark"][$i]["@spaces"];
                $spaceCount = $spaceCount + (int) ( $xmlArray["carparkData"]["Northwest"]["carpark"][$i]["@spaces"]);
            }

            for ($i = 0; $i < sizeof($xmlArray["carparkData"]["Northeast"]["carpark"]); $i++) {
                //ADD to Array
                $carparks[$xmlArray["carparkData"]["Northeast"]["carpark"][$i]["@name"]] = $xmlArray["carparkData"]["Northeast"]["carpark"][$i]["@spaces"];
                $spaceCount = $spaceCount + (int) ( $xmlArray["carparkData"]["Northeast"]["carpark"][$i]["@spaces"]);
            }


            for ($i = 0; $i < sizeof($xmlArray["carparkData"]["Southwest"]["carpark"]); $i++) {
                //ADD to Array
                $name = $xmlArray["carparkData"]["Southwest"]["carpark"][$i]["@name"];
                if (strpos($name, 'CHURCH') !== false) { //handle c\/tchurch
                    $name = 'CCHURCH';
                }
                $carparks[$name] = $xmlArray["carparkData"]["Southwest"]["carpark"][$i]["@spaces"];
                $spaceCount = $spaceCount + (int) ( $xmlArray["carparkData"]["Southwest"]["carpark"][$i]["@spaces"]);
            }

            for ($i = 0; $i < sizeof($xmlArray["carparkData"]["Southeast"]["carpark"]); $i++) {
                //ADD to Array
                $name = $xmlArray["carparkData"]["Southeast"]["carpark"][$i]["@name"];
                if (strpos($name, 'THOMAS') !== false) { //handle B\/thomas
                    $name = 'BTHOMAS';
                }
                $carparks[$name] = $xmlArray["carparkData"]["Southeast"]["carpark"][$i]["@spaces"];
                $spaceCount = $spaceCount + (int) ( $xmlArray["carparkData"]["Southeast"]["carpark"][$i]["@spaces"]);
            }

            $totalParking[] = $spaceCount;
        }

        $reversed = array_reverse($totalParking); //so the data is right order with newest last
        $this->set(array(
            'out' => $reversed, //<-- Set the post in the view
            '_serialize' => 'out', //<-- Tell cake to use that post
            '_jsonp' => true                // <-- And wrap it in the callback function
        ));

        /* $js_spaceCount = json_encode($spaceCount);
          //$js_data = json_encode($data);

          $this->set('test', $js_spaceCount);
          $this->render('/Elements/carparkreturn'); // This View is declared at /Elements/ajaxreturn.ctp */
    }

    //TODO: Pull column names from table
//    public function getColumnNamesService($tableName) {
//        if ($tableName == 'houses') {
//            $tableName = 'houseprices';
//        }
//        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = :table";
//        try {
//            $core = Core::getInstance();
//            $stmt = $core->dbh->prepare($sql);
//            $stmt->bindValue(':table', $table, PDO::PARAM_STR);
//            $stmt->execute();
//            $output = array();
//            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//                $output[] = $row['COLUMN_NAME'];
//            }
//            $this->set(array(
//                'out' => $output, //<-- Set the post in the view
//                '_serialize' => 'out', //<-- Tell cake to use that post
//                '_jsonp' => true                // <-- And wrap it in the callback function
//            ));
//        } catch (PDOException $pe) {
//            trigger_error('Could not connect to MySQL database. ' . $pe->getMessage(), E_USER_ERROR);
//        }
//    }

    public function lookService($tableName, $rowNumber, $numberOfFiles) {
        //work around for houses
        if ($tableName == 'houses') {
            $tableName = 'houseprices';
        }
        $this->layout = '';
        $modelName = $tableName;
        $this->$modelName = ClassRegistry::init($modelName);
        $dbLink = $tableName;
        $row = $this->$dbLink->find("all", array('conditions' => array($dbLink . ".id = " . $rowNumber)));
        $tempTemporalArray = array_keys($this->$dbLink->getColumnTypes());

        //parse the results to a single array of values and add to an array .
        foreach ($tempTemporalArray as $key => $val) { //parse field name array to remoce first two which are not needed here
            if ($key <= 1) {
                //ignore the first two generally there are the id and measure fileds	
            } else {
                $temporalArray[] = $val; //add to a new temporal arrray
            }
        }

        $dataArray = array();
        foreach ($temporalArray as $timeperiod) {
            // $dataPoint = array();
            //$dataPoint[] = strval($timeperiod);  //convert to a string value


            foreach ($row as $key => $val) {
                if ($val[$modelName][$timeperiod] == NULL) {  //this is specialised for null values
                    $dataPoint = $val[$modelName][$timeperiod];
                } else {
                    $dataPoint = (float) $val[$modelName][$timeperiod];
                }
            }
            $dataArray[] = $dataPoint;
        }
        if ($numberOfFiles == 1) { //only return the last one
            $numDataPoints = count($dataArray);
            $output = $dataArray[$numDataPoints - 1];
        } else {
            $output = array_slice($dataArray, -$numberOfFiles);
        }


        $this->set(array(
            'out' => $output, //<-- Set the post in the view
            '_serialize' => 'out', //<-- Tell cake to use that post
            '_jsonp' => true                // <-- And wrap it in the callback function
        ));
    }

}
