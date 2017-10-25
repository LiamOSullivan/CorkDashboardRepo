                                                                                                                        <?php
App::import('Vendor', 'HighchartsPHP/Highchart');

class EconomyController extends AppController {
/* Make the new component available */
public $components = array('BuildGraph', 'Session');

public function index() {
   
		$this->set('title_for_graph', "Employment");
		$this->set('employments', $this-> Employment-> find("all", array('conditions' => array("Employment.id = 1"))));
    }
	
public function stats($container) {  //main chart with holders for other charts and graphs
	
	//page setup
	$this->layout = 'cork_economy';
	//$this->set('dublin_header', "new_industry_long_skyline_1200.png");

    
       	$this->set('Graph2', "generic");//this is an element name
	$this->set('Graph3', "generic");
       	$this->set('Graph4', "generic");//this is an element name
	$this->set('Graph5', "generic");//this is an element name
	
	//build the main chart
    //$container = 'tab1';
 
    $chart = $this->BuildGraph->returnChartValues($container,'Numbers in Employment in South-West','Employmentfigs',1,1,'Persons (000s)',1,'Source: CSO','http://www.cso.ie/px/pxeirestat/Statire/SelectVarVal/Define.asp?maintable=QNQ22','line','975',-90,true,false,null,1);
	$this->set( compact( 'chart' ) );
    return $chart;
	}
    
 public function employmentFigsUp($container){ 
     $chart = $this->BuildGraph->returnChartValues($container,'Numbers in Employment','Employmentfigs',1,2,'Persons (000s)',1,'Source: CSO','http://www.cso.ie/px/pxeirestat/Statire/SelectVarVal/Define.asp?maintable=QNQ22','line','975',-90,true,false,null,1);
	$this->set( compact( 'chart' ) );
	return $chart;
	}
	
public function employmentChange($container){
	$chart = $this->BuildGraph->returnChartValues($container,'Numbers in Employment (Quarter-on-Quarter % Change)','Employmentfigs',5,6,'% Change',1,'Source: CSO','http://www.cso.ie/px/pxeirestat/Statire/SelectVarVal/Define.asp?maintable=QNQ22','line','975',-90,true,false,null,1);
	return $chart;
	}
    
public function annualEmploymentChange($container){
	$chart = $this->BuildGraph->returnChartValues($container,'Numbers in Employment (Year-on-Year % Change)','annualemploymentchanges',1,2,'% Change',1,'Source: CSO','http://www.cso.ie/px/pxeirestat/Statire/SelectVarVal/Define.asp?maintable=QNQ22','line','975',-90,true,false,null,1);
	return $chart;
	}
    
public function unemploymentFigs($container){ 
     $chart = $this->BuildGraph->returnChartValues($container,'Numbers Unemployed','Employmentfigs',7,8,'Persons (000s)',1,'Source: CSO','http://www.cso.ie/px/pxeirestat/Statire/SelectVarVal/Define.asp?maintable=QNQ22','line','975',-90,true,false,null,1);
	$this->set( compact( 'chart' ) );
	return $chart;
	}
	
public function unemploymentChange($container){
	$chart = $this->BuildGraph->returnChartValues($container,'Numbers Unemployed (Quarter-on-Quarter % Change)','Employmentfigs',11,12,'% Change',1,'Source: CSO','<http://www.cso.ie/px/pxeirestat/Statire/SelectVarVal/Define.asp?maintable=QNQ22','line','975',-90,true,false,null,1);
	return $chart;
	}
    
public function annualUnemploymentChange($container){
	$chart = $this->BuildGraph->returnChartValues($container,'Numbers Unemployed (Year-on-Year % Change)','annualemploymentchanges',5,6,'% Change',1,'Source: CSO','<http://www.cso.ie/px/pxeirestat/Statire/SelectVarVal/Define.asp?maintable=QNQ22','line','975',-90,true,false,null,1);
	return $chart;
	}
    
public function unemploymentRate($container){
	$chart = $this->BuildGraph->returnChartValues($container,'ILO Unemployment Rate','Employmentfigs',13,14,'%',2,'Source: CSO','http://www.cso.ie/px/pxeirestat/Statire/SelectVarVal/Define.asp?maintable=QNQ22','line','975',-90,true,false,null,1);
	return $chart;
	}
	
public function employmentSectors($container){
	$chart = $this->BuildGraph->returnChartValues($container,'Employment Sectors in South-West','Employmentsectors',1,16,'Source: CSO','http://www.cso.ie/','column','460','0',false,true,null,1);
	return $chart;
	}
    
public function overseasVisitors($container){
	$chart = $this->BuildGraph->returnChartValues($container,'Overseas Visitors to South-West','Overseasvisitors',1,2,'Millions',1,'Source: Failte Ireland/CSO','http://www.failteireland.ie/Research-Insights/Tourism-Facts-and-Figures.aspx','column','460','0',true,false,null,1);
	return $chart;
	}
    
public function grossValueAdded($container){
	$chart = $this->BuildGraph->returnChartValues($container,'Gross Value Added per Capita at Basic Prices','Grossvalueadded',1,2,'€s',1,'Source: CSO ','http://www.cso.ie/px/pxeirestat/Statire/SelectVarVal/Define.asp?maintable=raa01','spline','460',-90,true,false,null,1);
	return $chart;
	}
    
    public function businessSegments($container){
	$chart = $this->BuildGraph->returnChartValues($container,'Numbers by Employment Sector in South-West','Naceindustrysectors',1,15,'Persons (000s)',1,'Source: CSO ','http://www.cso.ie/px/pxeirestat/Statire/SelectVarVal/Define.asp?maintable=QNQ40&PLanguage=0','column','460',-90,false,true,null,1);
	return $chart;
	}
    
       public function silcs($container){
	$chart = $this->BuildGraph->returnChartValues($container,'Survey on Income and Living Conditions for South-West','Silcs',1,1,'€',1,'Source: CSO','http://www.cso.ie/px/pxeirestat/Statire/SelectVarVal/Define.asp?maintable=SIA20&PLanguage=0','column','460','0',true,true,null,1);
	return $chart;
	}
    
         public function poverty($container){
	$chart = $this->BuildGraph->returnChartValues($container,'Survey on Income and Living Conditions for South-West','Silcs',9,11,'%',1,'Source: CSO','http://www.cso.ie/px/pxeirestat/Statire/SelectVarVal/Define.asp?maintable=SIA20&PLanguage=0','column','460','0',true,true,null,1);
	return $chart;
	}
    
public function employeecompanysize($container){
	$chart = $this->BuildGraph->returnChartValues($container,'Number of Employees by Size of Company','employeecompanysizes',1,5,'Persons Engaged',1,'Source: CSO','http://www.cso.ie/px/pxeirestat/Statire/SelectVarVal/Define.asp?maintable=BRA08&PLanguage=0','line','460','0',true,true,null,1);
	return $chart;
	}
        
}


                            
                                    
                            
                            