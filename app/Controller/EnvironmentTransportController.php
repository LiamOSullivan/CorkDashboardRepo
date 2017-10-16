                                    <?php
    App::import('Vendor', 'HighchartsPHP/Highchart');
    
    class EnvironmentTransportController extends AppController {
        /* Make the new component available */
         public $components = array('BuildGraph', 'Session');
    
        
        public function stats(){
        
        
        //Set up the page
        
        $this->set('dublin_header', "new_environment_long_skyline_1200.png");
       // $this->set('section_1_title',"Housing Completion and Prices");
        //$this->set('section_2_title',"Private Rental Accomodation");
        $this->set( compact( 'chart' ) );
            
            
        $this->set('Graph2', "generic");
            $this->set('Graph5', "generic");
        //$this->set('Graph3', "constructionsmonthly_1");
        //$this->set('Graph4', "rentsByRoom");
        //$this->set('Graph3', "rent33");
        //$this->set('Graph5', "rents_1");
        $this->layout = 'dublin_environment';
        
        //add a particular colour array for hospitals
      //  $colorArray = array('#2f7ed8', '#0d233a', '#8bbc21', '#910000', '#1aadce', '#492970', '#2f7ed8', '#0d233a', '#8bbc21', '#910000', '#1aadce', '#492970');	
        
                  
        //build the chart
            //buildGraph returnChartValues
        $chart = $this->BuildGraph->returnChartValues('tab31','Waste produced per Capita','wastes',1,3,'Kg',1,'Source: EPA','http://www.epa.ie/pubs/reports/waste/stats/#.VrNcerKLTIW','line','1000',0,true,false,null,1);
        $this->set( compact( 'chart' ) );
  return $chart;
        
        }
            
        public function recycling($container){
                $chart = $this->BuildGraph->returnChartValues($container,'Household Recycling Rate-Dry Recyclables','recyclings',1,2,'%',1,'Source: EPA','http://www.epa.ie/pubs/reports/waste/stats/#.VrNz7rKLTIW','column','500',-90,true,false,null,1);
	   return $chart;
	}
	public function organicrecycling($container){
                $chart = $this->BuildGraph->returnChartValues($container,'Household Recycling Rate-Organics','organicrecyclings',1,2,'%',1,'Source: EPA','http://www.epa.ie/pubs/reports/waste/stats/#.VrNz7rKLTIW','column','500',-90,true,false,null,1);
	   return $chart;
	}
        
        public function riverWaterQuality($container){
          $chart = $this->BuildGraph->returnChartValues($container,'Water Quality Trends for Cork River Catchments' ,'Riverqualities',1,4,'% of River Channels',1,'Source: EPA. Data is from four catchments 1) Dunmanus-Bantry-Kenmare, 2) Bandon-Ilen, 3) Lee,Cork Harbour and Youghal Bay and 4) Blackwater-Munster',' https://www.catchments.ie/data/#/?_k=7u0kut','column','1000',0,true,false,null,1);
        $this->set( compact( 'chart' ) );
  return $chart;
        
        }
        
        
        public function greenflags($container){
                $chart = $this->BuildGraph->returnChartValues($container,'Schools Awarded the Green Flag in Cork (National and Secondary)','greenflags',1,2,'Number of Schools',1,'Source: Green Schools ','http://greenschoolsireland.org/','column','500','0',true,false,null,1);
	   return $chart;
	}
        
        
        public function localagenda($container){
                $chart = $this->BuildGraph->returnChartValues($container,'Number of Local Agenda 21 Funded Projects','localagendas',1,2,'Number of Projects',1,'Source: Department of Housing, Planning, Community and Local Government','http://www.environ.ie/search/sub-type/funding-allocation?query=local+agenda+21','line','1000','0',true,false,null,1);
	   return $chart;
	}
        
        
        }
   