                                                                                                                                <?php
App::import('Vendor', 'HighchartsPHP/Highchart');

class HousingsController extends AppController {
/* Make the new component available */
public $components = array('BuildGraph', 'Session');

public function index() {
   
	//	$this->set('title_for_graph', "Employment");
	//	$this->set('employments', $this-> Employment-> find("all", array('conditions' => array("Employment.id = 1"))));
    }
	
public function stats() {  //main chart with holders for other charts and graphs
	
	//page setup
	$this->layout = 'cork_housing';
	//$this->set('dublin_header', "new_housing_long_skyline_1200.png");
	
	//add other graphs and cahrts to the page
	/*$this->set('Graph2', "employmentstats_1");//this is an element name
	$this->set('Graph3', "employmentStatsPercentage_1");
	$this->set('Graph4', "employmentsectors_1");//this is an element name
	$this->set('Graph5', "employmentchange_1");//this is an element name*/
    	//$this->set('Graph4', "employmentsectors_1");//this is an element name
    
    $this->set('Graph2', "generic");//this is an element name
	$this->set('Graph3', "generic");
    $this->set('Graph4', "generic");//this is an element name
	$this->set('Graph5', "generic");//this is an element name
	
	//build the main chart
    //$container = 'tab1';
 
 /*  $chart = $this->BuildGraph->returnChartValues($container,'Average House Prices in Dublin','Houses',1,4,'Pns (000s)',1,'Source: CSO Quarterly Household Survey','http://www.cso.ie/','line','975',-90,true,false,null,1);
	$this->set( compact( 'chart' ) );
    return $chart;*/
	}
    
 public function housePrices($container){ 
     $chart = $this->BuildGraph->returnChartValues($container,'Average House Prices','Houseprices',1,4,'€s',1,'Source: Department of Housing, Planning, Community and Local Government','http://www.environ.ie/housing/statistics/house-prices-loans-and-profile-borrowers/house-price-statistics','line','975',-90,true,false,null,1);

	$this->set( compact( 'chart' ) );
	return $chart;
	}
	
public function planningApplicationsDublin($container){
	$chart = $this->BuildGraph->returnChartValues($container,'Planning Application Statistics - Cork City Council Council','Planningapplications',1,3,'Number',1,'Source: Department of Housing, Planning, Community and Local Government','http://www.environ.ie/planning/statistics/planning-statistics-1','column','975','0',true,false,null,1);
	return $chart;
	}

    public function planningApplicationsDunL($container){
	$chart = $this->BuildGraph->returnChartValues($container,'Planning Application Statistics - Cork County Council','Planningapplications',4,6,'Number',1,'Source: Department of Housing, Planning, Community and Local Government','http://www.environ.ie/planning/statistics/planning-statistics-1','column','975','0',true,false,null,1);
	return $chart;
	}

public function constructionMonthlies($container){ 
     $chart = $this->BuildGraph->returnChartValues($container,'Monthly House Unit Completions','constructionsmonthlies',1,2,'Units',1,'Source: Department of Housing, Planning, Community and Local Government','http://www.environ.ie/housing/statistics/house-building-and-private-rented/construction-activity-completions','line','975',-90,true,false,null,1);
	$this->set( compact( 'chart' ) );
	return $chart;
	}
	
public function socialPrivateHouses($container){
	$chart = $this->BuildGraph->returnChartValues($container,'Quarterly House Unit Completions (By Type)','socialprivatehouses',1,6,'Units',1,'Source: Department of Housing, Planning, Community and Local Government','http://www.environ.ie/housing/statistics/house-building-and-private-rented/construction-activity-completions','line','975',-90,true,false,null,1);
	return $chart;
	}
	
	public function socialPrivateHouseUnits($container){
	$chart = $this->BuildGraph->returnChartValues($container,'Quarterly House Unit Completions (By Type)','socialprivate15houses',1,12,'Units',1,'Source: Department of Housing, Planning, Community and Local Government','http://www.environ.ie/housing/statistics/house-building-and-private-rented/construction-activity-completions','line','975',-90,true,false,null,1);
	return $chart;
	}
    
public function supplyOfLands($container){
	$chart = $this->BuildGraph->returnChartValues($container,'Available Supply of Housing Land','supplyoflands',3,4,'Hectares',1,'Source: Department of Housing, Planning, Community and Local Government','http://www.environ.ie/search/archived/current?query=residential%20land%20survey','line','975','0',true,false,null,1);
	return $chart;
	}
    
public function supplyOfUnits($container){
	$chart = $this->BuildGraph->returnChartValues($container,'Available Supply of Housing Land for Units','supplyoflands',1,2,'Units',1,'Source: Department of Housing, Planning, Community and Local Government','http://www.environ.ie/housing/statistics/house-building-and-private-rented/private-housing-market-statistics','line','975','0',true,false,null,1);
	return $chart;
	}
    
	
public function developerContributions($container){
	$chart = $this->BuildGraph->returnChartValues($container,'Annual Contributions to Councils from Developers','developercontributions',1,2,'€s',1,'Source: Department of Housing, Planning, Community and Local Government','http://www.environ.ie/planning/statistics/planning-statistics-1','line','460','0',true,false,null,1);
	return $chart;
	}

public function dublinNationalRents($container){
	$chart = $this->BuildGraph->returnChartValues($container,'Average Monthly Rent Prices for Private Dwellings','dublinnationalrents',1,1,'€s',1,'Source: Private Rental Tenancies Board','http://www.cso.ie/px/pxeirestat/Statire/SelectVarVal/Define.asp?maintable=RIQ02&ProductID=DB_RI&PLanguage=0','line','975',-90,true,false,null,1);
	return $chart;
	}
    
public function dublinRentByRooms($container){
	$chart = $this->BuildGraph->returnChartValues($container,'Average Monthly Rent Prices for Private Dwellings in Cork by Number of Bedrooms','dublinbyroomrents',1,4,'€s',1,'Source: Private Rental Tenancies Board','http://www.cso.ie/px/pxeirestat/Statire/SelectVarVal/Define.asp?maintable=RIQ02&ProductID=DB_RI&PLanguage=0','column','460',-90,true,false,null,1);
	return $chart;
	}
    
    public function rentalInspections($container){
	$chart = $this->BuildGraph->returnChartValues($container,'Number of Inspections of Rented Accommodation','rentalinspections',1,2,'Inspections',1,'Source: Department of Housing, Planning, Community and Local Government','http://www.environ.ie/housing/statistics/house-building-and-private-rented/private-housing-market-statistics','column','460','0',true,false,null,1);
	return $chart;
	}
	
    

        
}


                            
                            
                            
                            